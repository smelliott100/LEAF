<?php
header('X-UA-Compatible: IE=edge');

include '../db_mysql.php';
include '../db_config.php';
$config = new Config();
$db_config = new DB_Config();
$db = new DB($db_config->dbHost, $db_config->dbUser, $db_config->dbPass, $db_config->dbName);
$settings = $db->query_kv('SELECT * FROM settings', 'setting', 'data');
$settings['heading'] = $settings['heading'] == '' ? $config->title : $settings['heading'];
$settings['subheading'] = $settings['subheading'] == '' ? $config->city : $settings['subheading'];

function getBaseDir() {
	$dir = dirname($_SERVER['PHP_SELF']);
	return str_replace('login', '', $dir);
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Secure Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css" media="screen">
        @import "../css/style.css";
    </style>
    <link rel="icon" href="vafavicon.ico" type="image/x-icon" />
</head>
<body>
<div id="header">
    <div>
      <span style="position: absolute"><img src="../images/VA_icon_small.png" style="width: 80px" alt="VA logo" /></span>
      <span id="headerLabel"><?php echo $settings['subheading']; ?></span>
      <span id="headerDescription"><?php echo $settings['heading']; ?></span>
    </div>
    <span id="headerTab">Login</span>
    <span id="headerTabImg"><img src="../images/tab.png" alt="tab" /></span>
</div>

<div class="card" style="max-width: 500px; padding: 16px; margin: auto">

    <form method="POST" action="../auth_new_profile/">
    First Name<br />
    <input name="firstName" style="font-size: 150%; width: 75%" type="text"></input><br />
    <br />
    Last Name<br />
    <input name="lastName" style="font-size: 150%; width: 75%" type="text"></input><br />
    <br />
    Email<br />
    <input name="email" style="font-size: 150%; width: 75%" type="email"></input><br />
    <br /><br />
    <div style="text-align: center">
    <button class="buttonNorm" style="text-align: center">Sign up as a Volunteer <img src="../../libs/dynicons/?img=system-users.svg&amp;w=32" style="padding-left: 8px" alt="Icon for Volunteers" title="Icon for Volunteers" /></button>
    </div>
    <br /><br />
    <a href="<?php echo 'https://' . $_SERVER['SERVER_NAME'] . getBaseDir() . 'auth_domain/?' . htmlentities($_SERVER['QUERY_STRING']); ?>">I have already signed up</a>


    </form>
</div>

</body>
</html>