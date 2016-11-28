<?php
ob_start();
session_start();
include("../include/globalIncWeb.php");
ini_set("display_errors",0);
$url="http://";
$url.= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
$urlregex = "^(http?|ftp)\:\/\/([a-z0-9+!*(),;?&=\$_.-]+(\:[a-z0-9+!*(),;?&=\$_.-]+)?@)?[a-z0-9+\$_-]+(\.[a-z0-9+\$_-]+)*(\:[0-9]{2,5})?(\/([a-z0-9+\$_-]\.?)+)*\/?(\?[a-z+&\$_.-][a-z0-9;:@/&=+\$_.-]*)?(#[a-z_.-][a-z0-9+\$_.-]*)?\$";
if (!preg_match($urlregex,$url)) { } 
else 
{ 
		echo "<script>window.location='../pageerror.html';</script>";
}
if($_SESSION['user_id'] == "")
	header("location: login.php");
?>
<?php

	if($_GET['Action'] == "V")
		{
			$_SESSION['CoID'] = $_GET['ID'];
			header("location: LogCoDetails.php");
		}
	elseif($_GET['Action'] == "N")
		{
			$_SESSION['CoID'] = $_GET['ID'];
			$sqlUp = "update notification_messages set status='9' where data_id='".$_SESSION['CoID']."' and type='user'";
			if($cn == false)
			connect3db();
			$resUp = mysql_query($sqlUp);
			if($resUp)
			{
				header("location: LogCoDetails.php");
			}
		}
?>
<?php ob_end_flush();?>