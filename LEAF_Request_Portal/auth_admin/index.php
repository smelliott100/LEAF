<?php
/************************
    Authenticator for domain accounts
    Date Created: March 8, 2013

*/

if(hash('sha256', $_POST['password'] . 'harvey') !== '08a722c6e59ae1bc855c89dce67b3255efa59b1c8645eb183945c1deb8a47c47') {
	echo 'Incorrect password';
	exit();
}

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
	$redirect = htmlspecialchars($redirect);

    list($domain, $user) = explode("\\", $_SERVER['REMOTE_USER']);

    // see if user is valid
    $vars = array(':userName' => $user);
    $res = $db_phonebook->prepared_query('SELECT * FROM employee
    										WHERE userName=:userName
												AND deleted=0', $vars);
    
    if(count($res) > 0) {
    	$_SESSION['userID'] = $user;

		header('Location: ' . $redirect);
    }
    else {
    		// redirect as usual
    		$_SESSION['userID'] = 'Admin';

    		header('Location: ' . $redirect);
    }
}
else {
    echo 'Unable to log in: Domain logon issue';
}