<?php
session_start();
ob_start();
include("../include/globalIncWeb.php");
$dateToday = date("Y-m-d");
if(isset($_GET['id']))
	$id = base64_decode(trim(strip_tags($_GET['id'])));
if(isset($_GET['token']))
	$token = trim(strip_tags($_GET['token']));
$sql = "select * from tbl_member_reg where reg_id='".$id."' and activaton_code='".$token."'";
if($cn == false)
connect3db();
$res = mysql_query($sql);
if(mysql_num_rows($res))
{
	$row = mysql_fetch_array($res);
	$status = $row['status'];
	$activation_date = $row['activation_link_expiry_date'];
	if(($status==0) && ($activation_date==""))
	{
		$upd = "update  tbl_member_reg set status='1',activation_link_expiry_date='$dateToday' where reg_id='".$id."' and activaton_code='".$token."'";		
		if($cn == false)
		connect3db();
		$resUpd = mysql_query($upd);
		if($resUpd)
			{
				$_SESSION['user_id'] = $id;
				$_SESSION['f_name'] = $row['f_name'];
				$_SESSION['l_name'] = $row['l_name'];
				$_SESSION['register'] = "register";
				echo $_SESSION['activation'] = "Your account has been activated successfully!<br/>You can try login now";
				header("Location: userdata.php");
			}
	}
	else
			{
				echo $_SESSION['activation'] = "You have already activated your account or may be activation link has been expired!";
				//header("Location: signup.php");
			}	
}
else
{
	echo $_SESSION['activation'] = "Invalid access";
}
?>