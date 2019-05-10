<?php

include '../config.php';
include '../sources/Login.php';
include '../db_mysql.php';


$config = new Orgchart\Config;
$db = new DB($config->dbHost, $config->dbUser, $config->dbPass, $config->dbName);

$login = new Orgchart\Login($db, $db);
$login->setBaseDir('../');
$login->loginUser();

$memberships = $login->getMembership();

if($memberships['groupID'][1] != 1) {
	exit();
}


header('Content-type: application/json');

$vars = array(':lastUpdated' => strtotime('2 weeks ago'));
$res = $db->prepared_query('SELECT * FROM employee
								LEFT JOIN relation_position_employee USING (empUID)
								WHERE positionID IS NULL
									AND lastUpdated >= :lastUpdated', $vars);

echo json_encode($res);

