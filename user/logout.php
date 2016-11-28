<?php
session_start();
ob_start();
include("../include/globalIncWeb.php");
unset($_SESSION['user_id']);
unset($_SESSION['user_name']);
unset($_SESSION['data_id']);
session_destroy();
header("location: ../signup.php");
ob_end_flush();

?>