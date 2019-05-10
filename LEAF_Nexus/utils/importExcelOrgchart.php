<?php

include '../config.php';
include '../sources/Login.php';
include '../db_mysql.php';
include '../sources/Employee.php';
include '../sources/Position.php';
require '../sources/Exception.php';


$config = new Orgchart\Config;
$db = new DB($config->dbHost, $config->dbUser, $config->dbPass, $config->dbName);

$login = new Orgchart\Login($db, $db);
$login->setBaseDir('../');
$login->loginUser();
if(!$login->isLogin() || !$login->isInDB()) {
	echo 'Your computer login is not recognized. Is your account managed by IRM? If you are looking for the Resource Site demo, please visit: https://vhawasweb1.v05.med.va.gov/resource_demo/';
	exit;
}

$userID = $login->getUserID();
$employee = new Orgchart\Employee($db, $login);
//$employee = $employee->getSummary($employee->lookupLogin($userID)[0]['empUID']);

$position = new Orgchart\Position($db, $login);

$searchTerm = 'Michael.Gao@va.gov';

$posCache = array();
$res = $position->search($searchTerm, '', 1);
if(count($res) > 0) {
	$posCache[$searchTerm] = $res;
}
else {
	//echo "{$searchTerm} not found <br />";
}

importFile('echcs.csv', $position, $employee);

function importFile($file, $position, $employee)
{
	$rawdata = file($file);
	// extract table headings
	$rawheaders = trim(array_shift($rawdata));
	$headers = explode(',', $rawheaders);
	$idx = 0;
	$csvdeIdx = array();
	foreach($headers as $header) {
		$csvdeIdx[$header] = $idx;
		$idx++;
	}

	$count = 0;

	$notFoundData = array();
	foreach($rawdata as $line) {
		$t = splitWithEscape($line);
		array_walk($t, 'trim');
	/*
		$lname = trim($t[$csvdeIdx['sn']]);
		$fname = trim($t[$csvdeIdx['givenName']]);
		$midIni = trim($t[$csvdeIdx['initials']]);
		$email = $t[$csvdeIdx['mail']] ? $t[$csvdeIdx['mail']] : null;
		$phone = $t[$csvdeIdx['telephoneNumber']] ? $t[$csvdeIdx['telephoneNumber']] : null;*/
		$searchTerm = $t[$csvdeIdx['Employee Supervisor Login Name']];
		$posCache = array();
		$res = null;
		if(strlen($searchTerm) > 0) {
			$res = $position->search($searchTerm, '', 1);
		}
		$resSupervisor = $res;
		if(count($res) > 0) {
			$posCache[$searchTerm] = $res;
			//echo "Supervisor: {$res[0]['positionTitle']} - {$res[0]['employeeList'][0]['firstName']} {$res[0]['employeeList'][0]['lastName']}<br />";
			$res = $position->search($t[$csvdeIdx['Employee Login Name']], '', 1);
			if(count($res) > 0) {
				// employee is already assigned
				// echo "{$t[$csvdeIdx['Employee Login Name']]} already assigned.<br />";
			}
			else {
				echo "{$t[$csvdeIdx['Employee Login Name']]} needs assignment.<br />";
				
				// check if the employee exists in AD
				$empRes = $employee->lookupEmail($t[$csvdeIdx['Employee Login Name']]);
				if(count($empRes) > 0) {
					// do work to create position
					// find out if the position exists
					$resPDnum = $position->searchPDnumber($t[$csvdeIdx['PD Number']]);
					if(count($resPDnum) == 0) {
						// create position
						// rough validate PD#
						if(is_numeric(substr($t[$csvdeIdx['PD Number']], 0, 4))) {
							echo "-- Creating {$t[$csvdeIdx['Classification Title']]} for PD#{$t[$csvdeIdx['PD Number']]} with supervisor: {$resSupervisor[0]['positionID']} ({$resSupervisor[0]['positionTitle']})<br />";
							$newPositionID = $position->addNew($t[$csvdeIdx['Classification Title']], $resSupervisor[0]['positionID']);
							$_POST = array();
							$_POST['CSRFToken'] = $_SESSION['CSRFToken'];	// ignore CSRF check
							$_POST[2] = $t[$csvdeIdx['PayPlan']];
							$_POST[13] = $t[$csvdeIdx['Series']];
							$_POST[14] = $t[$csvdeIdx['Pay Grade']];
							$_POST[11] = $t[$csvdeIdx['FTE Ceiling']];
							$_POST[17] = $t[$csvdeIdx['Current FTE']];
							$_POST[19] = $t[$csvdeIdx['Total Head Count']];
							$_POST[12] = $t[$csvdeIdx['Classification Title']];
							$_POST[9] = $t[$csvdeIdx['PD Number']];
							$position->modify($newPositionID);
							$position->addEmployee($newPositionID, $empRes[0]['empUID']);
						}
						else {
							echo "-- Creating position with blank PD with supervisor: {$resSupervisor[0]['positionID']} ({$resSupervisor[0]['positionTitle']})<br />";
						}
						// $posCache[$searchTerm][0]['services'][0]['groupID']
						// $posCache[$searchTerm][0]['positionID']
						
					}
					else if($t[$csvdeIdx['PD Number']] != '') {
					// position already exists? then add employee to position
						echo "PD#{$t[$csvdeIdx['PD Number']]} already exists: Attaching employee {$empRes[0]['userName']} - {$empRes[0]['empUID']}<br />";
						$position->addEmployee($resPDnum[0]['positionID'], $empRes[0]['empUID']);
					}
					else {
						echo "-- Creating position with blank (false match) PD with supervisor: {$resSupervisor[0]['positionID']} ({$resSupervisor[0]['positionTitle']})<br />";
						$newPositionID = $position->addNew($t[$csvdeIdx['Classification Title']], $resSupervisor[0]['positionID']);
						$_POST = array();
						$_POST['CSRFToken'] = $_SESSION['CSRFToken'];	// ignore CSRF check
						$_POST[2] = $t[$csvdeIdx['PayPlan']];
						$_POST[13] = $t[$csvdeIdx['Series']];
						$_POST[14] = $t[$csvdeIdx['Pay Grade']];
						$_POST[11] = $t[$csvdeIdx['FTE Ceiling']];
						$_POST[17] = $t[$csvdeIdx['Current FTE']];
						$_POST[19] = $t[$csvdeIdx['Total Head Count']];
						$_POST[12] = $t[$csvdeIdx['Classification Title']];
						$position->modify($newPositionID);
						$position->addEmployee($newPositionID, $empRes[0]['empUID']); 
					}
				}
				else {
					echo "{$t[$csvdeIdx['Employee Login Name']]} (employee) not found in employee DB.<br />";
					$notFoundData[] = $t;					
				}
			}
		}
		else {
			//echo "{$searchTerm} not found <br />";
			$empRes = $employee->lookupEmail($searchTerm);
			if(count($empRes) == 0) {
				$empRes = $employee->search($t[$csvdeIdx['DirectSupervisor']]);
				if(count($empRes) == 0) {
					echo "{$t[$csvdeIdx['DirectSupervisor']]} (supervisor) not found in employee DB <br />";
					$notFoundData[] = $t;
				}				
			}
		}
	}
	
	$out = '';
	foreach($headers as $header) {
		$out .= "{$header}\t";
	}
	$out .= "\r\n";
//	print_r($notFoundData);
	foreach($notFoundData as $notFound) {
		$line = '';
		foreach($notFound as $item) {
			$item = trim($item);
			$line .= "{$item}\t";
		}
		$out .= "{$line}\r\n";
	}
	file_put_contents('out.txt', $out);
}

// workaround for excel
// author: tajhlande at gmail dot com
function splitWithEscape ($str, $delimiterChar = ',', $escapeChar = '"') {
	$len = strlen($str);
	$tokens = array();
	$i = 0;
	$inEscapeSeq = false;
	$currToken = '';
	while ($i < $len) {
		$c = substr($str, $i, 1);
		if ($inEscapeSeq) {
			if ($c == $escapeChar) {
				// lookahead to see if next character is also an escape char
				if ($i == ($len - 1)) {
					// c is last char, so must be end of escape sequence
					$inEscapeSeq = false;
				} else if (substr($str, $i + 1, 1) == $escapeChar) {
					// append literal escape char
					$currToken .= $escapeChar;
					$i++;
				} else {
					// end of escape sequence
					$inEscapeSeq = false;
				}
			} else {
				$currToken .= $c;
			}
		} else {
			if ($c == $delimiterChar) {
				// end of token, flush it
				array_push($tokens, $currToken);
				$currToken = '';
			} else if ($c == $escapeChar) {
				// begin escape sequence
				$inEscapeSeq = true;
			} else {
				$currToken .= $c;
			}
		}
		$i++;
	}
	// flush the last token
	array_push($tokens, $currToken);
	return $tokens;
}
