<?php
ob_start();
session_start();
include("../include/globalIncWeb.php");
ini_set("display_errors",0);
$sql = "update notification_messages set status='9' where data_id='".$_GET['ID']."' and type='user'";
if($cn == false)
	connect3db();
$res = mysql_query($sql);

$sqlSel = "select message_txt,date from notification_messages where type='user' order by msg_id desc";
if($cn == false)
	connect3db();
$resSel = mysql_query($sqlSel);
$rowSel = mysql_fetch_array($resSel);
echo '<span style="font-family:arial; font-size: 12px;">'.$rowSel['message_txt']. '&nbsp;on&nbsp;' .getDateDDMMYYYY($rowSel['date']).'</span>';
?>