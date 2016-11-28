 <?php
error_reporting(0);
session_start();
$session_id = $_SESSION['user_id'];
$data_id = $_SESSION['data_id'];
include("../include/globalIncWeb.php");

if($_POST['id']!=""){
	$sql = "update notification_messages set status='9' where msg_id ='".$_POST['id']."'";
	if($cn == false)
		connect3db();
	$res = mysql_query($sql);
	if($res)
	{
		mysql_close();
		//echo "deleted";
	}
}
	$sqlC = "select count(*) as num from  notification_messages where status!='9' and data_id='".$_POST['pid']."' and type='admin'";
	if($cn == false)
	connect3db();
	$resC = mysql_query($sqlC);
	$rowC = mysql_fetch_array($resC);
	if($rowC['num']>0)
		echo $rowC['num'];
	else
		echo "0";
?>