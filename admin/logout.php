<?php
session_start();
require_once('../system/core.php');
unset($_SESSION["useradmin"]);
unset($_SESSION['userid']);
unset($_SESSION['fullname']);
unset($_SESSION['img']);
redirect("login.php");