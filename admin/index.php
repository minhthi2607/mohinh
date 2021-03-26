<?php
session_start();
define ('BASEPATH','ltw');
require_once('../system/core.php');
if(!isset($_SESSION['useradmin']))
{
    redirect('login.php');
}
date_default_timezone_set('Asia/Ho_Chi_Minh');
require_once('../system/load.php');
require_once('../Config.php');//1
require_once('../system/Database.php');// sau 1
loadPage('admin');