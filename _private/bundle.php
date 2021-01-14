<?php

session_start();
ob_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');

use \Database\Init as DB;

require_once('database.php');
require_once('config.php');
require_once('function.php');
if ($DB_using)
    $DB = new DB($DB_host, $DB_user, $DB_pass, $DB_name);

$_loggedIn=false;

$_loggedIn=$DB->get("select * from users where id =1");
unset($_loggedIn['password']);


