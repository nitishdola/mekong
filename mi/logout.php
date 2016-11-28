<?php
session_start();
ob_start();
include("../include/globalIncWeb.php");
unset($_SESSION['user_id']);
unset($_SESSION['user_name']);
unset($_SESSION['countryid']);
$_SESSION['user_id'] = "";
$_SESSION['user_name'] = "";
$_SESSION['mi'] = "";
session_destroy();
header("location: index.php");
ob_end_flush();

?>