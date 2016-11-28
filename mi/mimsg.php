<?php
ob_start();
session_start();
include("../include/globalIncWeb.php");
ini_set("display_errors",0);

$sqlSel = "select message_txt,date from notification_messages where type='mi' order by msg_id desc";
if($cn == false)
	connect3db();
$resSel = mysql_query($sqlSel);
$rowSel = mysql_fetch_array($resSel);
echo '<span style="font-family:arial; font-size: 12px;">'.html_entity_decode(htmlspecialchars_decode($rowSel['message_txt'])). '&nbsp;on&nbsp;' .getDateDDMMYYYY($rowSel['date']).'</span>';

 $sql = "update notification_messages set status='9' where data_id='".base64_decode($_GET['ID'])."' and type='mi'";
if($cn == false)
	connect3db();
$res = mysql_query($sql);
?>