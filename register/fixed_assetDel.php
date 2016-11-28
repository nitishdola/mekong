 <?php
error_reporting(0);
session_start();
include("../include/globalIncWeb.php");
if($_POST['id']!=""){
	$sql = "select * from  tbl_img where file_name='".$_POST['id']."'";
	if($cn == false)
		connect3db();
	$res = mysql_query($sql);
	if(mysql_num_rows($res))
	{
		
		$row = mysql_fetch_array($res);
		$rr = unlink('images/fixed_asset/'.$row['file_name']);
		if($rr)
		{
			//echo "ssss";
			$sqlD = "delete from  tbl_img where file_name='".$_POST['id']."'";	
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