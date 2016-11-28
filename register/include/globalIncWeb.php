<?php 
global $websiteTitle;
$websiteTitle = "Rangdhali";
ini_set("display_errors",0);
include("common.php");
include("commonLib.php");
require("dbcWeb.php");
include("dbHandler.php");
if((!isset($_SESSION['user_id']))||($_SESSION['user_id']==""))
{
	$lnk = "registration.html";
}
else
{
	$lnk = "userdata.php";
}
?>
