<?php
session_start();
ob_start();
include("../include/globalIncWeb.php");
if(!isset($_SESSION['user_id']) && ($_SESSION['register']!="register"))
{
	echo "<script>window.location='index.php';</script>";

}
$id = strip_tags($_POST['id']);
$sql = "update tbl_user_data set user_approval_flag='2' where id='$id'";
if($cn == false)
connect3db();
$res = mysql_query($sql);
if($res)
{
						$dt = date('Y-m-d');
						$msID = GenerateIds("msg_id","notification_messages");
						$msg = "Company has been varified successfully";
						$sqlIs = "insert into notification_messages(msg_id,user_id,user_email,data_id,date,message_txt,status,type) values ($msID,'".$_SESSION['user_id']."','".$_SESSION['user_name']."','".$_SESSION['data_id']."','$dt','The form has been updated','1','user')";
						if($cn == false)
						connect3db();
						mysql_query($sqlIs);
						echo "Verified successfully";
}
?>