<?php
include("include/globalIncWeb.php");
if($_POST['username']!="")
{
	$sql = "select reg_email from tbl_member_reg where reg_email='".$_POST['username']."'";
	if($cn == false)
	connect3db();
	$res = mysql_query($sql);
	if(mysql_num_rows($res))
	{
		if($res)
		{
			echo "The email is already in use";
			echo "<input type='hidden' name='emailTxt' id='emailTxt' value='1'>";
		}
	}
}
?>