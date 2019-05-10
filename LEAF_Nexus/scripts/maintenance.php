<?php

$currDir = dirname(__FILE__);

include_once $currDir . '/../db_mysql.php';
include_once $currDir . '/../config.php';
require $currDir . '/importData.php';

require $currDir . '/syncSVNrevision.php';
