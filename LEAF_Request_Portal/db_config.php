<?php
/************************
    Database config
    Date Created: November 23, 2009

    Central place to put database login information
    This should be kept outside of web accessible directories
*/

// require '../../../db_config.php';

ini_set('display_errors', 1); // Set to 1 to display errors

class DB_Config
{
    public $dbHost = 'localhost';
    public $dbName = 'leaf_data';
    public $dbUser = 'user';
    public $dbPass = '';
}

class Config
{
    public $title = 'Resources';
    public $city = 'Anytown, USA';
    public $adminLogonName = 'myAdmin';    // Administrator's logon name
    public $adPath = array('OU=myOU,DC=domain,DC=tld'); // Active directory path

    public static $uploadDir = './UPLOADS/'; // Directory for user uploads
                                             // using backslashes (/), with trailing slash
    public static $orgchartPath = '../LEAF_Nexus'; // HTTP Path to orgchart with no trailing slash
    public static $orgchartImportTags = array('resources_site_access'); // Import org chart groups if they match these tags

    public $enforceHTTPS = false;
    public $descriptionID = 16;    // indicator ID for description field
    
    public static $emailPrefix = 'Resources: ';              // Email prefix
    public static $emailCC = array();    // CCed for every email
    public static $emailBCC = array();    // BCCed for every email

    public $phonedbHost = 'localhost';
    public $phonedbName = 'leaf_users';
    public $phonedbUser = 'user';
    public $phonedbPass = '';
}
