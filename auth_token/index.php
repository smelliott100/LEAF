<?php

/*
* As a work of the United States government, this project is in the public domain within the United States.
*/

include '../globals.php';
include 'db_mysql.php';

$proto = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? 'https://' : 'http://';

if ($_SERVER['CERT_FLAGS'] == 1){

	$email = extract_emails($_SERVER['CERT_SUBJECT']);

	$globalDB = new DB(DIRECTORY_HOST, DIRECTORY_USER, DIRECTORY_PASS, DIRECTORY_DB);
	$vars = array(':email' => $email[0]);
	$res = $globalDB->prepared_query('SELECT * FROM employee_data
										LEFT JOIN employee USING (empUID)
										WHERE indicatorID = 6
											AND data = :email
											AND deleted=0', $vars);

	if (count($res) > 0)
    {
		$username = $res[0]['userName'];
        setUserCookie($username);
        header('Location: ' . $proto . SITE_BASE_URL . base64_decode($_GET['r']));
        exit();
    }else{
		    header('Refresh: 4;URL= ' . $proto . $_SERVER['HTTP_HOST'] . '/Login/?r=' . $_GET['r']);
		    echo 'Unable to log in: ' . $email . ' not found in database.  Redirecting back to PIV login screen.';
		    exit();
	}
}else{
     header('Refresh: 4;URL= ' . $proto . $_SERVER['HTTP_HOST'] . '/Login/?r=' . $_GET['r']);
     echo 'Unable to log in: Client Verification issue.  Redirecting back to PIV login screen.';
	 exit();
}

function extract_emails($str){
    // This regular expression extracts all emails from a string:
    $regexp = '/([a-z0-9_\.\-])+\@(([a-z0-9\-])+\.)+([a-z0-9]{2,4})+/i';
    preg_match_all($regexp, $str, $m);

    return isset($m[0]) ? $m[0] : array();
}

function setUserCookie($email){
    $https = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? true : false;
    setcookie('REMOTE_USER', $email, time() + 2592000, '/', COOKIE_DOMAIN , $https , true);
}
