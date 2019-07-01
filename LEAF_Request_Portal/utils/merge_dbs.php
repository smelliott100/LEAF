<?php
// Merges databases from firstDB to secondDB
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

// Return last record index that match between the two databases
function findDivergedRecordID($res1, $res2) {
    $countRes1 = count($res1);
    $countRes2 = count($res2);
    $maxCount = $countRes1 > $countRes2 ? $countRes1 : $countRes2;
    $keys = [];
    for($i = 0; $i < $maxCount; $i++) {
        if(!isset($res1[$i]) || !isset($res2[$i])) {
            return $i;
        }
        if(empty($keys)) {
            $keys = array_keys($res1[0]);
        }
        foreach($keys as $key) {
            if($res1[$i][$key] != $res2[$i][$key]) {
                return $i;
            }
        }
    }
}

function mergeRecordFromIndex() {
    
}

// Load records
$res = $db->query('SELECT * FROM records');
$res2 = $db2->query('SELECT * FROM records');

echo findDivergedRecordID($res, $res2);

// Load action_history
$res = $db->query('SELECT max(time) action_history');
$res2 = $db2->query('SELECT max(time) action_history');



// Load data
$res = $db->query('SELECT max(timestamp) `data`');
$res2 = $db2->query('SELECT max(timestamp) `data`');
