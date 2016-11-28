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
	header("location: login");
?>

<?php
if(isset($_POST['id'])!="")
{
	$dataID = $_POST['id'];
	$sql = "update notification_messages_mi set status='9' where msg_id='$dataID'";
	if($cn == false)
    connect3db();
	$res = mysql_query($sql);
	if($res)
	{
		
		echo "<a href='javascript:void(0)' data-id='<?php echo $dataID;?>' style='color:#000'>Revision received from MI </a>";
		
	}
	
}
?>
