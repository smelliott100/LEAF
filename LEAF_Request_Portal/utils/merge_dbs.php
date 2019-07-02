<?php
// Merges databases from firstDB to secondDB
include '../db_mysql.php';
include '../db_config.php';
define('LF', "\r\n");
$db_config = new DB_Config();

$time_server_brought_offline_for_migration = '';

$firstDB = 'leaf_workflow';
$firstDB_host = $db_config->dbHost;
$firstDB_user = $db_config->dbUser;
$firstDB_pass = $db_config->dbPass;

$secondDB = 'leaf_data_temp';
$secondDB_host = $db_config->dbHost;
$secondDB_user = $db_config->dbUser;
$secondDB_pass = $db_config->dbPass;

$db = new DB($firstDB_host, $firstDB_user, $firstDB_pass, $firstDB);
$db2 = new DB($secondDB_host, $secondDB_user, $secondDB_pass, $secondDB);

// Return the first index that differs between the two databases
function findDivergedIndex($res1, $res2) {
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
            if($key == 'lastStatus'
                || $key == 'submitted'
                || $key == 'deleted') {
                continue;
            }
            if($res1[$i][$key] != $res2[$i][$key]) {
                return $i;
            }
        }
    }
}

function copyTableByRecordID($table, $oldRecordID, $newRecordID = 0) {
    global $db, $db2;
    $vars = [':recordID' => $oldRecordID];
    $res = $db->prepared_query('SELECT * FROM '. $table .' WHERE recordID=:recordID', $vars);
    foreach($res as $item) {
        $keys = array_keys($item);
        $vars = [];
        $cols = [];
        foreach($keys as $key) {
            if($table == 'records'
                && ($key == 'recordID'
                    || $key == 'actionID')
            ) {
                continue;
            }
            elseif($key == 'recordID') {
                $vars[':' . $key] = $newRecordID;
            }
            else {
                $vars[':' . $key] = $item[$key];
            }
            
            $cols[] = $key;
        }
        
        $keys = array_keys($vars);
        $paraSQL = implode(',', $keys);
        $colSQL = implode(',', $cols);
        $db2->prepared_query('INSERT INTO '. $table .' ('. $colSQL .') VALUES ('. $paraSQL .')', $vars);
        if($table == 'records') {
            return $db2->getLastInsertID();
        }
    }

    return true;
}

function mergeRecordFromIndex($res1, $res2, $index) {
    global $db;
    $diffs = array_slice($res1, $index);
    foreach($diffs as $diff) {
        $recordID = $diff['recordID'];
        // add records
        $newRecordID = copyTableByRecordID('records', $recordID);
        echo "Copying {$recordID} to new ID {$newRecordID}" . LF;

        // add data
        copyTableByRecordID('data', $recordID, $newRecordID);

        // add data_history
        copyTableByRecordID('data_history', $recordID, $newRecordID);

        // add action_history
        copyTableByRecordID('action_history', $recordID, $newRecordID);

        // add category_count
        copyTableByRecordID('category_count', $recordID, $newRecordID);

        // add records_dependencies
        copyTableByRecordID('records_dependencies', $recordID, $newRecordID);

        // add records_step_fulfillment
        copyTableByRecordID('records_step_fulfillment', $recordID, $newRecordID);

        // add records_workflow_state
        copyTableByRecordID('records_workflow_state', $recordID, $newRecordID);
    }
}

// find records point of divergence
$resR = $db->query('SELECT * FROM records');
$resR2 = $db2->query('SELECT * FROM records');

$divRecordID = findDivergedIndex($resR, $resR2);

// merge records
if($divRecordID != false) {
    mergeRecordFromIndex($resR, $resR2, $divRecordID);
}
