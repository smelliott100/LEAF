<?php
/*namespace MailReport;

class test extends Report
{

}*/

if (php_sapi_name() != 'cli') {
    exit();
}

$positionIDs = array(1, 8, 12, 13);    // list of positionIDs to email
$siteURL = 'https://vhav05webrm.v05.med.va.gov/ham/resources/';

$timeAgo = 86400; // pull stats from this many seconds ago
// don't email on weekends
if(date('D') == 'Sun'
    || date('D') == 'Sat') {
    exit();
}
if(date('D') == 'Mon') {
    $timeAgo = 3*$timeAgo;
}


include __DIR__ . '/../db_config.php';
include __DIR__ . '/../Email.php';
include __DIR__ . '/../db_mysql.php';
include __DIR__ . '/../Login.php';
include __DIR__ . '/../form.php';
include __DIR__ . '/../View.php';

function secToDays($sec)
{
    return round($sec / 60 / 60 / 24, 1);
}

$db_config = new DB_Config();
$config = new Config();
$db = new DB($db_config->dbHost, $db_config->dbUser, $db_config->dbPass, $db_config->dbName);
$db_phonebook = new DB($config->phonedbHost, $config->phonedbUser, $config->phonedbPass, $config->phonedbName);
$login = new Login($db_phonebook, $db);
$login->setBaseDir('../');
$login->loginUser();

$form = new Form($db, $login);
$view = new View($db, $login);

$res = $form->getCustomData($view->buildViewHumanResources_selectee(''), '230,250,251,252,255,328,354,367');

// strip out continuous recruitment positions
$tres = $res;
$res = array();
$res_contRecruit = array();
foreach($tres as $titem) {
    if(@$titem['s1']['id367'] != 'Yes') {
        $res[] = $titem;
    }
    else {
        $res_contRecruit[] = $titem;
    }
}

// count continuous recruitment fte
$totalFTE_contRecruit = 0;
foreach($res_contRecruit as $item) {
    if(isset($item['s1']['id230'])) {
        $totalFTE_contRecruit += $item['s1']['id230'];
    }
}

$time = time();
$time_lastMonth = strtotime('last month');
$time_lastYear = strtotime('last year');
$total = 0;
$totalFTE = 0;
$totalAnnounced = 0;
$totalNotAnnounced = 0;
$totalFTEAnnounced = 0;
$totalTimeSinceApproval = 0;
$totalClosedWithoutCertToService = 0;
$totalTimeClosedWithoutCertToService = 0;
$totalPositionsWithPendingSelectee = 0;
$announced24hrsAgo = 0;
$subtractFTEnotPending = 0;
$data['announced24hrsago'] = array();
foreach($res as $item) {
    $total++;
//    echo "{$item['s1']['id230']}<br />";
    // check number of FTE
    if(isset($item['s1']['id230'])) {
        $totalFTE += $item['s1']['id230'];
        $tSeriesMax = $item['s1']['id230'] < 1 && $item['s1']['id230'] > 0 ? 1 : ceil($item['s1']['id230']);
        for($series = 1; $series <= $tSeriesMax; $series++) {
            if(@$item['s'.$series]['id255'] != ''
                    && @$item['s'.$series]['id328'] != '') { // subtract fte that are not pending (have selectee and actual eod)
                if($item['s1']['id230'] >= 1) {
                    $totalFTE -= 1;
                    $subtractFTEnotPending -= 1;
                }
                else {
                    $totalFTE -= $item['s1']['id230'];
                    $subtractFTEnotPending -= $item['s1']['id230'];
                }
            }

            if(@$item['s'.$series]['id255'] != '') {
                if($item['s1']['id230'] >= 1) {
                    $totalPositionsWithPendingSelectee += 1;
                }
                else {
                    $totalPositionsWithPendingSelectee += $item['s1']['id230'];
                }
            }

            // check closing date
            if(isset($item['s'.$series]['id251'])
                    && $item['s'.$series]['id251'] != ''
                    && strtotime($item['s'.$series]['id251']) < $time
                    && (!isset($item['s'.$series]['id252']) || $item['s'.$series]['id252'] == '')   // 252=cert to service
            ) {
                $totalClosedWithoutCertToService++;
                $totalTimeClosedWithoutCertToService += ($time - strtotime($item['s'.$series]['id251']));
            }
        }
    }

    if(isset($item['s1']['id354']) && $item['s1']['id354'] != '') {
        $totalFTEAnnounced += $item['s1']['id230'];
        $totalAnnounced++;
        if($item['s1']['id354_timestamp'] > ($time - $timeAgo)) {
            $announced24hrsAgo += $item['s1']['id230'];
            $data['announced24hrsago'][] = $item['recordID'];
        }
    }
    else {  // not announced
        $totalNotAnnounced += $item['s1']['id230'];
        $totalTimeSinceApproval += $time - $item['dirApprovalTime'];
    }
}

$totalApprovedThisMonth = 0;
$totalApprovedLastMonth = 0;
$totalApproved2Month = 0;
$totalApprovedLastYear = 0;
$totalTimeApprovalToEODThisMonth = 0;
$totalTimeApprovalToEODLastMonth = 0;
$totalTimeApprovalToEOD2Month = 0;
$totalTimeApprovalToEODLastYear = 0;
$totalToAnnouncement_0M = 0;
$totalTimeToAnnouncement_0M = 0;
$totalCertToService_0M = 0;
$totalTimeCertToService_0M = 0;
$totalToAnnouncement_1M = 0;
$totalTimeToAnnouncement_1M = 0;
$totalCertToService_1M = 0;
$totalTimeCertToService_1M = 0;
$totalToAnnouncement_2M = 0;
$totalTimeToAnnouncement_2M = 0;
$totalCertToService_2M = 0;
$totalTimeCertToService_2M = 0;

$res2 = $form->getCustomData($view->buildViewHumanResources(''), '230,250,251,252,255,328,354');
$currentMonthStamp = strtotime(date('F', strtotime('this month')) . ' 1, ' . date('Y', strtotime('this month')));
$lastMonthStamp = strtotime(date('F', strtotime('last month')) . ' 1, ' . date('Y', strtotime('last month')));
$TwoMonthStamp = strtotime(date('F', strtotime('2 months ago')) . ' 1, ' . date('Y', strtotime('2 months ago')));
foreach($res2 as $item) {
    for($series = 1; $series <= $item['s1']['id230']; $series++) {
        if($currentMonthStamp < $item['dirApprovalTime']) {
            if(isset($item['s'.$series]['id328']) && $item['s'.$series]['id328'] != '') {
                $totalApprovedThisMonth++;
                $totalTimeApprovalToEODThisMonth += strtotime($item['s'.$series]['id328']) - $item['dirApprovalTime'];
            }

            // calculate average time for announcement
            if(isset($item['s1']['id250']) && $item['s1']['id250'] != ''
                && strtotime($item['s1']['id250']) > $item['dirApprovalTime']) {
                $totalToAnnouncement_0M++;
                $totalTimeToAnnouncement_0M += strtotime($item['s1']['id250']) - $item['dirApprovalTime'];
            }
            // calculate average time for cert to service
            if(isset($item['s1']['id252']) && $item['s1']['id252'] != '' && $item['s1']['id251'] != '') {
                if((strtotime($item['s1']['id252']) - strtotime($item['s1']['id251'])) > 0) {
                    $totalCertToService_0M++;
                    $totalTimeCertToService_0M += strtotime($item['s1']['id252']) - strtotime($item['s1']['id251']);
                }
            }
        }
        if($lastMonthStamp < $item['dirApprovalTime'] && $currentMonthStamp > $item['dirApprovalTime']) {
            if(isset($item['s'.$series]['id328']) && $item['s'.$series]['id328'] != '') {
                $totalApprovedLastMonth++;
                $totalTimeApprovalToEODLastMonth += strtotime($item['s'.$series]['id328']) - $item['dirApprovalTime'];
            }

            // calculate average time for announcement
            if(isset($item['s1']['id250']) && $item['s1']['id250'] != ''
                && strtotime($item['s1']['id250']) > $item['dirApprovalTime']) {
                $totalToAnnouncement_1M++;
                $totalTimeToAnnouncement_1M += strtotime($item['s1']['id250']) - $item['dirApprovalTime'];
            }
            // calculate average time for cert to service
            if(isset($item['s1']['id252']) && $item['s1']['id252'] != '' && $item['s1']['id251'] != '') {
                if((strtotime($item['s1']['id252']) - strtotime($item['s1']['id251'])) > 0) {
                    $totalCertToService_1M++;
                    $totalTimeCertToService_1M += strtotime($item['s1']['id252']) - strtotime($item['s1']['id251']);
                }
            }
        }
        if($TwoMonthStamp < $item['dirApprovalTime'] && $lastMonthStamp > $item['dirApprovalTime']) {
            if(isset($item['s'.$series]['id328']) && $item['s'.$series]['id328'] != '') {
                $totalApproved2Month++;
                $totalTimeApprovalToEOD2Month += strtotime($item['s'.$series]['id328']) - $item['dirApprovalTime'];
            }

            // calculate average time for announcement
            if(isset($item['s1']['id250']) && $item['s1']['id250'] != ''
                && strtotime($item['s1']['id250']) > $item['dirApprovalTime']) {
                $totalToAnnouncement_2M++;
                $totalTimeToAnnouncement_2M += strtotime($item['s1']['id250']) - $item['dirApprovalTime'];
            }
            // calculate average time for cert to service
            if(isset($item['s1']['id252']) && $item['s1']['id252'] != '' && $item['s1']['id251'] != '') {
                if((strtotime($item['s1']['id252']) - strtotime($item['s1']['id251'])) > 0) {
                    $totalCertToService_2M++;
                    $totalTimeCertToService_2M += strtotime($item['s1']['id252']) - strtotime($item['s1']['id251']);
                }
            }
        }
        if($time_lastYear < $item['dirApprovalTime']) {
            if(isset($item['s'.$series]['id328']) && $item['s'.$series]['id328'] != '') {
                $totalApprovedLastYear++;
                $totalTimeApprovalToEODLastYear += strtotime($item['s'.$series]['id328']) - $item['dirApprovalTime'];
            }
        }
    }
}

$totalFTEAnnounced += $subtractFTEnotPending;

$isYesterday = date('D') == 'Mon' ? 'Friday' : 'yesterday';
$output = '<table style="border: 1px solid black; border-collapse: collapse; font-family: verdana; font-size: 12px">
            <tr><td style="border: 1px solid black; padding: 8px; width: 200px">Number of positions announced '. $isYesterday .' (<a href="'.$siteURL.'utils/showFTE_announced.php">Details</a>)</td><td style="border: 1px solid black; padding: 8px">' . $announced24hrsAgo . '*</td></tr>
            <tr><td style="border: 1px solid black; padding: 8px">Percentage of positions announced</td><td style="border: 1px solid black; padding: 8px"> '.$totalFTEAnnounced.' of ' . $totalFTE . ' FTE (' . round(($totalFTEAnnounced / $totalFTE)*100, 1) . '%)</td></tr>
            <tr><td style="border: 1px solid black; padding: 8px">Number of positions not announced (<a href="'.$siteURL.'?a=table_human_resources_selectee_notAnnounced">Details</a>)</td><td style="border: 1px solid black; padding: 8px">' . $totalNotAnnounced . ' FTE</td></tr>
            <tr><td style="border: 1px solid black; padding: 8px">Average Time since approval for current non-announced FTE</td>
                <td style="border: 1px solid black; padding: 8px">' . round(($totalTimeSinceApproval / $totalNotAnnounced)/86400, 1) . ' days</td>
            </tr>
            <tr><td style="border: 1px solid black; padding: 8px">Total number of positions with pending selectee</td><td style="border: 1px solid black; padding: 8px">' . $totalPositionsWithPendingSelectee . ' FTE</td></tr>
           </table>';

$output .= '<br />
            <table style="border: 1px solid black; border-collapse: collapse; font-family: verdana; font-size: 12px">
            <tr><td style="border: 1px solid black; padding: 8px; width: 200px">Positions marked as Continuous Recruitment (<a href="'.$siteURL.'utils/showFTE_continuousRecruitment.php">Details</a>)</td><td style="border: 1px solid black; padding: 8px">' . $totalFTE_contRecruit . ' FTE</td></tr>
           </table>';

$output .= '<br />Positions with a closing date prior to today, without cert to service date
            <table style="border: 1px solid black; border-collapse: collapse; font-family: verdana; font-size: 12px">
            <tr><td style="border: 1px solid black; padding: 8px; width: 200px">Number of Positions (<a href="'.$siteURL.'?a=table_human_resources_selectee_onlywith_closing_date">Details</a>)</td>
                <td style="border: 1px solid black; padding: 8px">' . $totalClosedWithoutCertToService . '</td>
            </tr>
            <tr><td style="border: 1px solid black; padding: 8px">Average Time since position closing date</td>
                <td style="border: 1px solid black; padding: 8px">' . secToDays($totalTimeClosedWithoutCertToService / $totalClosedWithoutCertToService) . ' days</td>
                </tr>
           </table>';

$output .= '<br /><table style="border: 1px solid black; border-collapse: collapse; font-family: verdana; font-size: 12px">
            <tr><td style="border: 1px solid black; padding: 8px">Month of FTE approval</td>
                <td style="border: 1px solid black; padding: 8px">' . date('F', $TwoMonthStamp) . '</td>
                <td style="border: 1px solid black; padding: 8px">' . date('F', $lastMonthStamp) . '</td>
                <td style="border: 1px solid black; padding: 8px">' . date('F', $currentMonthStamp) . '</td>
            </tr>
            <tr><td style="border: 1px solid black; padding: 8px">Average Time in Days between Approval and Actual EOD</td>
                <td style="border: 1px solid black; padding: 8px">' . ($totalApproved2Month == 0 ? '-' : round(($totalTimeApprovalToEOD2Month / $totalApproved2Month)/86400, 1)) . '</td>
                <td style="border: 1px solid black; padding: 8px">' . ($totalApprovedLastMonth == 0 ? '-' : round(($totalTimeApprovalToEODLastMonth / $totalApprovedLastMonth)/86400, 1)) . '</td>
                <td style="border: 1px solid black; padding: 8px">' . ($totalApprovedThisMonth == 0 ? '-' : round(($totalTimeApprovalToEODThisMonth / $totalApprovedThisMonth)/86400, 1)) . '</td>
            </tr>
            <tr><td style="border: 1px solid black; padding: 8px">Average Days from Approval to Announcement</td>
                <td style="border: 1px solid black; padding: 8px">' . ($totalToAnnouncement_2M == 0 ? '-' : round(($totalTimeToAnnouncement_2M / $totalToAnnouncement_2M)/86400, 1)) . '</td>
                <td style="border: 1px solid black; padding: 8px">' . ($totalToAnnouncement_1M == 0 ? '-' : round(($totalTimeToAnnouncement_1M / $totalToAnnouncement_1M)/86400, 1)) . '</td>
                <td style="border: 1px solid black; padding: 8px">' . ($totalToAnnouncement_0M == 0 ? '-' : round(($totalTimeToAnnouncement_0M / $totalToAnnouncement_0M)/86400, 1)) . '</td>
            </tr>
            <tr><td style="border: 1px solid black; padding: 8px">Average Days Cert to Service from Closing date</td>
                <td style="border: 1px solid black; padding: 8px">' . ($totalCertToService_2M == 0 ? '-' : round(($totalTimeCertToService_2M / $totalCertToService_2M)/86400, 1)) . '</td>
                <td style="border: 1px solid black; padding: 8px">' . ($totalCertToService_1M == 0 ? '-' : round(($totalTimeCertToService_1M / $totalCertToService_1M)/86400, 1)) . '</td>
                <td style="border: 1px solid black; padding: 8px">' . ($totalCertToService_0M == 0 ? '-' : round(($totalTimeCertToService_0M / $totalCertToService_0M)/86400, 1)) . '</td>
            </tr>
           </table>';

$output .= '<br /><table style="border: 1px solid black; border-collapse: collapse; font-family: verdana; font-size: 12px">
            <tr><td style="border: 1px solid black; padding: 8px">Average Time between Approval and Actual EOD for the past year</td>
                <td style="border: 1px solid black; padding: 8px">' . round(($totalTimeApprovalToEODLastYear / $totalApprovedLastYear)/86400, 1) . ' days</td>
            </tr>
           </table>';

$output .= '<br /><span style="font-family: verdana; font-size: 12px">* Request ID(s) for Announced Positions: ';
foreach($data['announced24hrsago'] as $requestID) {
    $output .= '<a href="'.$siteURL.'?a=printview&recordID='.$requestID.'">#'. $requestID .'</a> ';
}
$output .= '</span>';

//echo $output;

$email = new Email();

$email->setSubject('Position Announcement Summary - ' . date("F j, Y"));
$email->setBody($output);


foreach($positionIDs as $positionID) {
    $employees = $form->position->getEmployees($positionID);
    foreach($employees as $emp) {
        $res = $form->employee->getAllData($emp['empUID']);
        $email->addRecipient($res[6]['data']);
    }
}

//$email->addRecipient($requester[0]['Email']);
//$email->addRecipient($author[0]['Email']);
//echo $output;
$email->sendMail();
