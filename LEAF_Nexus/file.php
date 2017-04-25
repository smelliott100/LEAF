<?php
include 'db_mysql.php';
include 'config.php';
include './sources/Login.php';

$config = new Orgchart\Config();

// Enforce HTTPS
if(isset($config->enforceHTTPS) && $config->enforceHTTPS == true) {
	if(!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != 'on') {
		header('Location: https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
		exit();
	}
}

$db = new DB($config->dbHost, $config->dbUser, $config->dbPass, $config->dbName);

$login = new Orgchart\Login($db, $db);
$login->loginUser();

$type = null;
switch($_GET['categoryID']) {
    case 1:    // employee
        include './sources/Employee.php';
        $type = new OrgChart\Employee($db, $login);
        break;
    case 2:    // position
        include './sources/Position.php';
        $type = new OrgChart\Position($db, $login);
        break;
    case 3:    // group
        include './sources/Group.php';
        $type = new OrgChart\Group($db, $login);
        break;
    default:
        return false;
        break;
}

$data = $type->getAllData($_GET['UID'], $_GET['indicatorID']);

$value = $data[$_GET['indicatorID']]['data'];

$inputFilename = html_entity_decode($type->sanitizeInput($_GET['file']));

$filename = Orgchart\Config::$uploadDir . $type->getFileHash($_GET['categoryID'], $_GET['UID'], $_GET['indicatorID'], $inputFilename);

if(is_array($value)
	&& array_search($inputFilename, $value) === false) {
	echo 'Error: File does not exist or access may be restricted.';
	exit();
}
else if(!is_array($value)
			&& $value != $inputFilename) {
	echo 'Error: File does not exist or access may be restricted.';
	exit();
}

if(file_exists($filename)) {
    header('Content-Disposition: attachment; filename="'.addslashes(html_entity_decode($inputFilename)).'"');
    header("Content-Length: " . filesize($filename));
    header("Cache-Control: maxage=1"); //In seconds
    header("Pragma: public");
    
    readfile($filename);
    exit();
}
else {
    echo 'Error: File does not exist or access may be restricted.';
}