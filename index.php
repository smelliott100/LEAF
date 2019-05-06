<?php
/*
* As a work of the United States government, this project is in the public domain within the United States.
*/

error_reporting(E_ALL & ~E_NOTICE);

include 'globals.php';

if (!class_exists('XSSHelpers'))
{
    include_once dirname(__FILE__) . '/libs/php-commons/XSSHelpers.php';
}

$proto = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? 'https://' : 'http://';

if (isset($_SERVER['REMOTE_USER'])){

    list($domain, $user) = explode('\\', $_SERVER['REMOTE_USER']);
	
	setUserCookie($user);
    header('Location: ' . $proto . SITE_BASE_URL . base64_decode($_GET['r']));
    exit();

}else{
    //if no remote user redirect to PIV Login
    header('Location: ' . $proto . $_SERVER['HTTP_HOST'] . '/Login/?r=' . $_GET['r']);
    exit();
}

function setUserCookie($user){
    $https = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? true : false;
    setcookie('REMOTE_USER', $user, time() + 2592000, '/', COOKIE_DOMAIN, $https , true);
}
