<?php

$firstName = filter_var($_POST['firstName']);
$lastName = filter_var($_POST['lastName']);
$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

if($firstName === false
    || $lastName === false
    || $email === false) {
    echo 'Error parsing input.';
    exit();
}

/************************
    Authenticator for domain accounts
    Date Created: March 8, 2013

*/

include '../globals.php';
include '../Login.php';
include '../db_mysql.php';
include '../db_config.php';

$db_config = new DB_Config();
$config = new Config();
$db = new DB($db_config->dbHost, $db_config->dbUser, $db_config->dbPass, $db_config->dbName);
$db_phonebook = new DB($config->phonedbHost, $config->phonedbUser, $config->phonedbPass, $config->phonedbName);

// Enforce HTTPS
if(isset($config->enforceHTTPS) && $config->enforceHTTPS == true) {
	if(!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != 'on') {
		header('Location: https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
		exit();
	}
}

$login = new Login($db_phonebook, $db);

if(true) {
	$protocol = 'http://';
	if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
		$protocol = 'https://';
	}
	$redirect = '';
	if(isset($_GET['r'])) {
        $redirect = $protocol . $_SERVER['HTTP_HOST'] . base64_decode($_GET['r']);
    }
    else {
        $redirect = $protocol . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/../';
    }

    $user = $email;

    // see if user is valid
    $vars = array(':userName' => $user);
    $res = $db_phonebook->prepared_query('SELECT * FROM employee
    										WHERE userName=:userName
												AND deleted=0', $vars);
    
    if(false) {
    	$_SESSION['userID'] = $user;

		header('Location: ' . $redirect);
    }
    else {
    	// add user to local DB
    	if(true) {
    		$vars = array(':firstName' => $firstName,
    				':lastName' => $lastName,
    				':middleName' => '',
    				':userName' => $email,
    				':phoFirstName' => metaphone($firstName),
    				':phoLastName' => metaphone($lastName),
    				':domain' => '',
    				':lastUpdated' => time());
    		$db_phonebook->prepared_query('INSERT INTO employee (firstName, lastName, middleName, userName, phoneticFirstName, phoneticLastName, domain, lastUpdated)
        							VALUES (:firstName, :lastName, :middleName, :userName, :phoFirstName, :phoLastName, :domain, :lastUpdated)
    								ON DUPLICATE KEY UPDATE deleted=0', $vars);
    		$empUID = $db_phonebook->getLastInsertID();

			if($empUID == 0) {
                $vars = array(':userName' => $res[0]['userName']);
                $empUID = $db_phonebook->prepared_query('SELECT empUID FROM employee
                                                            WHERE userName=:userName', $vars)[0]['empUID'];
            }

    		$vars = array(':empUID' => $empUID,
    				':indicatorID' => 6,
    				':data' => $email,
    				':author' => 'viaLogin',
    				':timestamp' => time()
    		);
    		$db_phonebook->prepared_query('INSERT INTO employee_data (empUID, indicatorID, data, author, timestamp)
											VALUES (:empUID, :indicatorID, :data, :author, :timestamp)
                                            ON DUPLICATE KEY UPDATE data=:data', $vars);
    			
    		// redirect as usual
    		$_SESSION['userID'] = $res[0]['userName'];

    		header('Location: ' . $redirect);
    	}
    	else {
    		echo 'Unable to log in: User not found in global database.';
    	}
    }
}
else {
    echo 'Unable to log in: Domain logon issue';
}