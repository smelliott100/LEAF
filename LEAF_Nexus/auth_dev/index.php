<?php
/*
 * As a work of the United States government, this project is in the public domain within the United States.
 */

/*
    Authenticator
    Date: March 8, 2013

*/

include '../globals.php';
include '../sources/Login.php';
include '../db_mysql.php';
include '../config.php';

// Enforce HTTPS
include_once '../enforceHTTPS.php';

$config = new Orgchart\Config();
$db = new DB($config->dbHost, $config->dbUser, $config->dbPass, $config->dbName);

$login = new Orgchart\Login($db, $db);

$res = $db->query('SELECT * FROM employee
					   WHERE empUID = 1');

$_SESSION['userID'] = $res[0]['userName'];
$protocol = 'http://';
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
    $protocol = 'https://';
}

header('Location: ' . $protocol . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/../');
