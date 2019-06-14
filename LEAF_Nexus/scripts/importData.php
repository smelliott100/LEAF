<?php

$currDir = dirname(__FILE__);

include_once $currDir . '/../config.php';
$config = new Orgchart\Config();

require $currDir . '/VAMC_directory_maintenance2_AD.php';
$dir = new VAMC_Directory_maintenance_AD();

define('LF', "\r\n");
define('ONLY_IMPORT_EXTRAS', false);

set_time_limit(0);
ini_set('default_socket_timeout', 240);

$stime = microtime(true);
echo "Requesting updated AD list... ";

foreach($config->adPath as $adPath) {
    // try to resolve the domain controller from AD path
    $dc = '';
    $dcSrc = explode(',', $adPath);
    foreach($dcSrc as $adElement) {
        if(strpos($adElement, 'DC=') !== false) {
            $dc .= substr($adElement, 3) . '.';
        }
    }
    $dc = trim($dc, '.');
    
    $tmpFile = sys_get_temp_dir() . '/' . md5($adPath);
    system('csvde -r "(&(objectCategory=User)(!userAccountControl:1.2.840.113556.1.4.803:=2))" -l "sn,givenName,initials,title,description,telephoneNumber,mail,sAMAccountName,objectGUID,mobile,physicalDeliveryOfficeName" -d "'
            . $adPath .'" -s '. $dc .' -f ' . $tmpFile);
    if(file_exists($tmpFile)) {
    	$dir->importADData($tmpFile);
    }
}

echo "Done." . LF;
