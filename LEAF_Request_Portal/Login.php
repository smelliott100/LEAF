<?php
/************************
    Login class and session handler
    Date Created: September 11, 2007

*/

ini_set('session.gc_maxlifetime', 2592000);

// Sanitize all $_GET input
if(count($_GET) > 0) {
    $keys = array_keys($_GET);
    foreach($keys as $key) {
    	if(is_string($_GET[$key])) {
    		$_GET[$key] = htmlentities($_GET[$key], ENT_QUOTES);
    	}
    }
}

class Session implements SessionHandlerInterface
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function close()
    {
        return true;
    }
    
    public function destroy($sessionID)
    {
        $vars = array(':sessionID' => $sessionID);
        $this->db->prepared_query('DELETE FROM sessions
                                            WHERE sessionKey=:sessionID', $vars);
        return true;        
    }
    
    public function gc($maxLifetime)
    {
        $vars = array(':time' => time() - $maxLifetime);
        $this->db->prepared_query('DELETE FROM sessions
                                            WHERE lastModified < :time', $vars);
        return true;        
    }
    
    public function open($savePath, $sessionID)
    {
        return true;
    }
    
    public function read($sessionID)
    {
        $vars = array(':sessionID' => $sessionID);
        $res = $this->db->prepared_query('SELECT * FROM sessions
                                            WHERE sessionKey=:sessionID', $vars);
        
        return isset($res[0]['data']) ? $res[0]['data'] : '';  
    }
    
    public function write($sessionID, $data)
    {
        $vars = array(':sessionID' => $sessionID,
                      ':data' => $data,
                      ':time' => time());
        $this->db->prepared_query('INSERT INTO sessions (sessionKey, data, lastModified)
                                            VALUES (:sessionID, :data, :time)
                                            ON DUPLICATE KEY UPDATE data=:data, lastModified=:time', $vars);
        return true;
    }
}

class Login
{
    private $db;
    private $userDB;
    private $isLogin = false;
    private $name = 'default';
    private $userID = 'default';
    private $empUID = null;
    private $isInDB = true;
    private $baseDir = '';
    private $cache = array();

    function __construct($phonebookDB, $userDB)
    {
        $this->db = $phonebookDB;
        $this->userDB = $userDB;

        if(session_id() == '') {
            $sessionHandler = new Session($this->db);
            session_set_save_handler($sessionHandler, true);
            session_start();
            $cookie = session_get_cookie_params();
            $id = session_id();
            
            $https = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? true : false;
            setcookie('PHPSESSID', $id, time()+2592000, $cookie['path'], $cookie['domain'], $https, true);
        }
    }

    function register()
    {
        return false;
    }

    public function isInDB()
    {
        return $this->isInDB;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getUserID()
    {
        return $this->userID;
    }

    public function getEmpUID()
    {
    	return $this->empUID;
    }

    public function setBaseDir($baseDir)
    {
        $this->baseDir = "/{$baseDir}";
    }

    public function parseURL($in) {
        $paths = explode('/', $in);
        $out = array();

        foreach($paths as $path) {
            if($path != '') {
                if($path == '..') {
                    array_pop($out);
                }
                else {
                    $out[] = $path;
                }
            }
        }
        $buffer = '';
        foreach($out as $path) {
            $buffer .= "/{$path}";
        }
        return $buffer;
    }

    private function setSession()
    {
        $_SESSION['name'] = $this->name;
        $_SESSION['userID'] = $this->userID;
        $_SESSION['CSRFToken'] = isset($_SESSION['CSRFToken']) ? $_SESSION['CSRFToken'] : sha1($this->userID . mt_rand());
    }

    public function loginUser()
    {
        if(!isset($_SESSION['userID']) || $_SESSION['userID'] == '') {
            if(php_sapi_name() != 'cli') {
                $protocol = 'http://';
                if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
                    $protocol = 'https://';
                }

                header('Location: ' . $protocol . $_SERVER['HTTP_HOST'] . $this->parseURL(dirname($_SERVER['PHP_SELF']) . $this->baseDir) . '/login/?r=' . base64_encode($_SERVER['REQUEST_URI']));
                exit();
            }
            else {
                $_SESSION['userID'] = 'SYSTEM';
            }
        }

        $var = array(':userID' => $_SESSION['userID']);
        $result = $this->db->prepared_query('SELECT * FROM employee WHERE userName=:userID AND deleted = 0', $var);

        if(isset($result[0]['userName'])) {
            $this->name = "{$result[0]['firstName']} {$result[0]['lastName']}";
            $this->userID = $result[0]['userName'];
            $this->empUID = $result[0]['empUID'];
            $this->setSession();

            $this->isLogin = true;
            return true;
        }
        else {
            $this->name = "Guest: {$_SESSION['userID']}";
            $this->userID = $_SESSION['userID'];
            $this->isLogin = true;
            $this->isInDB = false;
            $this->setSession();
            return true;
        }

        return false;
    }

    public function logout()
    {
        $keys = array_keys($_SESSION);
        foreach($keys as $key) {
            unset($_SESSION[$key]);
        }
    }

    public function isLogin()
    {
        return $this->isLogin;
    }

    /**
     * Checks if the current user is part of a group
     * @param int $groupID Group ID number
     * @return boolean
     */
    public function checkGroup($groupID)
    {
        if(!isset($this->cache['checkGroup'])) {
            $var = array(':userID' => $this->userID);
            $result = $this->userDB->prepared_query('SELECT * FROM users WHERE userID=:userID', $var);
            
            foreach($result as $group) {
                $this->cache['checkGroup'][$group['groupID']] = true;
            }
        }

        // special case for "Everyone" groupID 2, workaround until Orgchart is more integrated
        if($groupID == 2) {
        	$this->cache['checkGroup'][2] = true;
        }

        if(!isset($this->cache['checkGroup'])) {
        	$this->cache['checkGroup'] = array();
        }
        
        return isset($this->cache['checkGroup'][$groupID]);
    }

    /**
     * Checks if the current user has service chief access for a particular service
     * @param int $groupID Service ID number
     * @return boolean
     */
    public function checkService($groupID)
    {
        if(isset($this->cache["isInService$groupID"])) {
            return $this->cache["isInService$groupID"];
        }

        $var = array(':userID' => $this->userID,
                     ':groupID' => $groupID);
        $result = $this->userDB->prepared_query('SELECT * FROM service_chiefs WHERE userID=:userID
        											AND serviceID=:groupID
        											AND active=1', $var);

        if(isset($result[0])) {
            $this->cache["isInService$groupID"] = true;
            return true;
        }
        $this->cache["isInService$groupID"] = false;
        return false;
    }

    public function isServiceChief()
    {
        if(isset($this->cache['isServiceChief'])) {
            return $this->cache['isServiceChief'];
        }

        $var = array(':userID' => $this->userID);
        $result = $this->userDB->prepared_query('SELECT * FROM service_chiefs
                                            WHERE userID=:userID
        										AND active=1', $var);

        if(isset($result[0])) {
            $this->cache['isServiceChief'] = true;
            return true;
        }
        $this->cache['isServiceChief'] = false;
        return false;
    }

    public function getQuadradGroupID()
    {
        if(isset($this->cache['getQuadradGroupID'])) {
            return $this->cache['getQuadradGroupID'];
        }
        $var = array(':userID' => $this->userID);
        $result = $this->userDB->prepared_query('SELECT * FROM groups
                                            LEFT JOIN users USING (groupID)
                                            WHERE parentGroupID=-1
                                                AND userID=:userID', $var);

        $buffer = '';
        foreach($result as $group) {
            $buffer .= $group['groupID'] . ',';
        }
        $buffer = trim($buffer, ',');

        if(isset($result[0])) {
            $this->cache['getQuadradGroupID'] = $buffer;
            return $buffer;
        }
        $this->cache['getQuadradGroupID'] = 0;
        return 0;
    }

    // quadrad groupID = -1
    public function isQuadrad()
    {
        if(isset($this->cache['isQuadrad'])) {
            return $this->cache['isQuadrad'];
        }

        $var = array(':userID' => $this->userID);
        $result = $this->userDB->prepared_query('SELECT * FROM groups
                                            LEFT JOIN users USING (groupID)
                                            WHERE parentGroupID=-1
                                                AND userID=:userID', $var);

        if(isset($result[0])) {
            $this->cache['isQuadrad'] = true;
            return true;
        }
        $this->cache['isQuadrad'] = false;
        return false;
    }

    /**
     * Retrieves the positions and groups the current user is a member of
     * @return array
     */
    public function getMembership()
    {
    	$empUID = $this->empUID;

        if(isset($this->cache['getMembership_'.$empUID])) {
            return $this->cache['getMembership_'.$empUID];
        }

        $membership = array();
		// inherit permissions if employee is a backup for someone else
        $vars = array(':empUID' => $empUID);
        $res = $this->db->prepared_query('SELECT * FROM relation_employee_backup
                                            WHERE backupEmpUID=:empUID
        										AND approved=1', $vars);
        $temp = (int)$empUID;		
		if(count($res) > 0) {
			foreach($res as $item) {
				$temp .= ",{$item['empUID']}";
				$membership['inheritsFrom'][] = $item['empUID'];
			}
			$vars = array(':empUID' => $temp);
		}

        $res = $this->db->query("SELECT positionID, empUID, 
                                                relation_group_employee.groupID as employee_groupID, 
                                                relation_group_position.groupID as position_groupID FROM employee
                                            LEFT JOIN relation_position_employee USING (empUID)
                                            LEFT JOIN relation_group_employee USING (empUID)
                                            LEFT JOIN relation_group_position USING (positionID)
                                            WHERE empUID IN ({$temp})");
		if(count($res) > 0) {
	        foreach($res as $item) {
	            if(isset($item['positionID'])) {
	                $membership['positionID'][$item['positionID']] = 1; 
	            }
/*	            if(isset($item['employee_groupID'])) {
	                $membership['groupID'][$item['employee_groupID']] = 1;
	            }
	            if(isset($item['position_groupID'])) {
	                $membership['groupID'][$item['position_groupID']] = 1;
	            }*/
	        }
		}
        $membership['employeeID'][$empUID] = 1;
        $membership['empUID'][$empUID] = 1;

		// incorporate groups from local DB
		$vars = array(':userName' => $this->userID);
		$res = $this->userDB->prepared_query('SELECT * FROM users
												WHERE userID = :userName', $vars);
		if(count($res) > 0) {
			foreach($res as $item) {
				 $membership['groupID'][$item['groupID']] = 1;
			}
		}
		$vars = array(':userName' => $this->userID);
		$res = $this->userDB->prepared_query('SELECT * FROM service_chiefs
												WHERE userID = :userName
													AND active=1', $vars);
		if(count($res) > 0) {
			foreach($res as $item) {
				$membership['groupID'][$item['serviceID']] = 1;
			}
		}

        // Add special membership groups
        $membership['groupID'][2] = 1;    // groupID 2 = "Everyone"

        $this->cache['getMembership_'.$empUID] = $membership;

        return $this->cache['getMembership_'.$empUID];
    }
}
