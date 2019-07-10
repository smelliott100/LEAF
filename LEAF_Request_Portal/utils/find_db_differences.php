<?php


include 'src/db_mysql.php';
include 'src/db_mysql2.php';
include 'src/db_config.php';
include 'src/db_config2.php';

define('LF', "\r\n");
ini_set('display_errors', 1);
$db_config = new DB_Config();
$db_config2 = new DB_Config2();


$time_server_brought_offline_for_migration = '';

$firstDB = 'leaf_workflow';
$firstDB_host = $db_config->dbHost;
$firstDB_user = $db_config->dbUser;
$firstDB_pass = $db_config->dbPass;


$secondDB = 'leaf_data';
$secondDB_host = $db_config2->dbHost;
$secondDB_user = $db_config2->dbUser;
$secondDB_pass = $db_config2->dbPass;

#$db = new DB($firstDB_host, $firstDB_user, $firstDB_pass, $firstDB);
#$db2 = new DB($secondDB_host, $secondDB_user, $secondDB_pass, $secondDB);

$dbs_with_changes = file('./dbs_with_changes.txt');
foreach($dbs_with_changes as $name) {
    //$db = new DB($firstDB_host, $firstDB_user, $firstDB_pass, trim($name) . "_on_cloud");
    $db = new DB($firstDB_host, $firstDB_user, $firstDB_pass, trim($name));
    $db2 = new DB2($secondDB_host, $secondDB_user, $secondDB_pass, trim($name));
    $firstDB = trim($name);
    findRecords();
}



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

function findRecords() {
  global $db, $db2, $firstDB;

  $hasDiff = 0;

  // Check differences in records
 //$res = $db->query('SELECT max(date), max(submitted), max(deleted), count(*) FROM records');
 //$res2 = $db2->query('SELECT max(date), max(submitted), max(deleted), count(*) FROM records');
//  if(isResDiff($res, $res2)) {
//      echo $firstDB . LF;
//      $hasDiff = 1;
//  }


  $res = $db->query('SELECT recordID, userID, date FROM records WHERE recordID = (SELECT MAX(recordID) FROM records)');
  $targetID = $res[0]['recordID'];
//  echo "Checking {$targetID}" . LF;
 // var_dump($res[0]);

  $res2 = $db2->query('SELECT recordID, userID, date FROM records WHERE recordID = ' . $targetID);

 //  echo "Checking src" . LF;
 //  var_dump($res[0]);
 //  echo "Checking dest" . LF;
 //  var_dump($res2[0]);

  if(!isset($res2[0])) {
    echo $firstDB . LF;
    $hasDiff = 1;
  } else if($res[0]['userID'] != $res2[0]['userID']) {
     echo $res[0]['userID'] . " != " . $res2[0]['userID'] . LF;
     echo $firstDB . LF;
     $hasDiff = 1;
  } else if($res[0]['date'] != $res2[0]['date']) {
     echo $res[0]['date'] . " != " . $res2[0]['date'] . LF;
     echo $firstDB . LF;
     $hasDiff = 1;
  }
   
  /*
  for ($i = $res[0]['recordID']; $i >= 0 ; $i--) {
 //     echo "Checking {$i}\n";
      $res2 = $db2->query('SELECT recordID, userID, date FROM records WHERE recordID = ' . $targetID);

      //var_dump($res2[0]);

      if($res[0]['userID'] != $res2[0]['userID']) {
        echo $res[0]['userID'] . " != " . $res2[0]['userID'];
        echo $firstDB . LF;
        $hasDiff = 1;
      }
     
      if($res[0]['date'] != $res2[0]['date']) {
        echo $res[0]['date'] . " != " . $res2[0]['date'];
        echo $firstDB . LF;
        $hasDiff = 1;
      }
  }
   */
}

