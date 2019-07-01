<?php

include '../db_mysql.php';
include '../db_config.php';

$db_config = new DB_Config();

$time_server_brought_offline_for_migration = '';

$firstDB = 'leaf_workflow';
$firstDB_host = $db_config->dbHost;
$firstDB_user = $db_config->dbUser;
$firstDB_pass = $db_config->dbPass;

$secondDB = 'leaf_data';
$secondDB_host = $db_config->dbHost;
$secondDB_user = $db_config->dbUser;
$secondDB_pass = $db_config->dbPass;

$db = new DB($firstDB_host, $firstDB_user, $firstDB_pass, $firstDB);
$db2 = new DB($secondDB_host, $secondDB_user, $secondDB_pass, $secondDB);

// Return FALSE if no diff, otherwise show num diff
function isResDiff($arr1, $arr2) {
    $diff = array_diff($arr1[0], $arr2[0]);
    if(count($diff) == 0) {
        return false;
    }
    else {
        return count($diff) . ' differences';
    }
}

// Check differences in records
$res = $db->query('SELECT max(date), max(submitted), max(deleted), count(*) FROM records');
$res2 = $db2->query('SELECT max(date), max(submitted), max(deleted), count(*) FROM records');

if(isResDiff($res, $res2)) {
    // merge dbs
}

// Check differences in action_history
$res = $db->query('SELECT max(time) FROM action_history');
$res2 = $db2->query('SELECT max(time) FROM action_history');

isResDiff($res, $res2);

// Check differences in data
$res = $db->query('SELECT max(timestamp) FROM `data`');
$res2 = $db2->query('SELECT max(timestamp) FROM `data`');

isResDiff($res, $res2);
