 <?php
error_reporting(0);
session_start();
$session_id = $_SESSION['user_id'];
$data_id = $_SESSION['CoID'];
include("../include/globalIncWeb.php");

if(!isset($_SESSION['CoID'];))
{
	echo "Access Forbiddden";
}
if($_POST['id']!=""){
	$sql = "select * from  tbl_user_data where company_logo='".$_POST['id']."'";
	if($cn == false)
		connect3db();
	$res = mysql_query($sql);
	if(mysql_num_rows($res))
	{
		
		$row = mysql_fetch_array($res);
		$rr = unlink('images/logo/'.$row['company_logo']);
		if($rr)
		{
			//echo "ssss";
			$sqlD = "update tbl_user_data set company_logo = NULL where company_logo='".$_POST['id']."'";	
			$resD = mysql_query($sqlD);
			if($resD)
			{
				mysql_close();
				echo "success";
			}
		}	
	}
}
?>