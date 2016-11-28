 <?php
error_reporting(0);
session_start();
$session_id = $_SESSION['user_id'];
include("../include/globalIncWeb.php");

if(!isset($_SESSION['user_id']))
{
	echo "Access Forbiddden";
}
if($_POST['id']!=""){
	
	$cap =  htmlspecialchars($_POST['caption'],ENT_QUOTES);
	$sql = "update  tbl_img set caption='$cap' where file_name='".$_POST['id']."'";
	if($cn == false)
		connect3db();
	$res = mysql_query($sql);
	if($res)
		{
			mysql_close();
			echo "Caption Updated";
		}
}
?>