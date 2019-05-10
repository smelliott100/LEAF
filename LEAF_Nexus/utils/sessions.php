<?php

echo 'Current sessions:<br /><br />';

class SessionDecoder {
  // from http://stackoverflow.com/a/9843773
    public static function unserialize($session_data) {
        $method = ini_get("session.serialize_handler");
        switch ($method) {
            case "php":
                return self::unserialize_php($session_data);
                break;
            case "php_binary":
                return self::unserialize_phpbinary($session_data);
                break;
            default:
                throw new Exception("Unsupported session.serialize_handler: " . $method . ". Supported: php, php_binary");
        }
    }

    private static function unserialize_php($session_data) {
        $return_data = array();
        $offset = 0;
        while ($offset < strlen($session_data)) {
            if (!strstr(substr($session_data, $offset), "|")) {
                throw new Exception("invalid data, remaining: " . substr($session_data, $offset));
            }
            $pos = strpos($session_data, "|", $offset);
            $num = $pos - $offset;
            $varname = substr($session_data, $offset, $num);
            $offset += $num + 1;
            $data = unserialize(substr($session_data, $offset));
            $return_data[$varname] = $data;
            $offset += strlen(serialize($data));
        }
        return $return_data;
    }

    private static function unserialize_phpbinary($session_data) {
        $return_data = array();
        $offset = 0;
        while ($offset < strlen($session_data)) {
            $num = ord($session_data[$offset]);
            $offset += 1;
            $varname = substr($session_data, $offset, $num);
            $offset += $num;
            $data = unserialize(substr($session_data, $offset));
            $return_data[$varname] = $data;
            $offset += strlen(serialize($data));
        }
        return $return_data;
    }
}

include '../config.php';
include '../sources/Login.php';
include '../db_mysql.php';


$config = new Orgchart\Config;
$db = new DB($config->dbHost, $config->dbUser, $config->dbPass, $config->dbName);

$login = new Orgchart\Login($db, $db);
$login->setBaseDir('../');
$login->loginUser();

$memberships = $login->getMembership();
if(!isset($memberships['groupID'][1])) {
	echo 'Admin only';
	exit();
}

$res = $db->prepared_query('SELECT data, lastModified FROM sessions WHERE data != ""', []);

$data = [];
foreach($res as $session) {
    $tmp = SessionDecoder::unserialize($session['data']);

    if($tmp['userID'] != 'SYSTEM') {
        $data[$tmp['userID']]['name'] = $tmp['name'];

        if(isset($data[$tmp['userID']]['lastModifed'])) {
            if($data[$tmp['userID']]['lastModified'] < $session['lastModified']) {
                $data[$tmp['userID']]['lastModified'] = $session['lastModified'];
            }
        }
        else {
            $data[$tmp['userID']]['lastModified'] = $session['lastModified'];
        }
    }
}

echo '<table><tr><td>Name</td><td>Recent Access</td></tr>';
foreach($data as $name) {
    echo '<tr><td>' . $name['name'] . '</td><td>' . date(DATE_RFC2822, $name['lastModified']) . '</td></tr>';
}
echo '</table>';
