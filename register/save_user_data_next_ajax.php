<?php
session_start();
ob_start();
include("../include/globalIncWeb.php");
ini_set("display_errors",0);
if(!isset($_SESSION['user_id']) && ($_SESSION['register']!="register"))
{
	echo "<script>window.location='index.php';</script>";
}
	if(isset($_POST)) {

		$chkBusiness = htmlspecialchars(htmlentities(strip_tags(trim($_POST['chkBusiness']))),ENT_QUOTES);
		$txtBusinessOther = htmlspecialchars(htmlentities(strip_tags(trim($_POST['txtBusinessOther']))),ENT_QUOTES);
		$sql = "update tbl_user_data set core_services='$chkBusiness',core_services_other='$txtBusinessOther' where id='".$_SESSION['data_id']."' and user_id='".$_SESSION['user_id']."'";
			if($cn == false)
				connect3db();
				$res = mysql_query($sql);
		
	}
	return true;
?>