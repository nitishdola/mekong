<?php
include("include/globalIncWeb.php");
if($_POST['id']!="")
{
	$sql = "delete from tbl_img where id='".$_POST['id']."'";
	if($cn == false)
	connect3db();
	$res = mysql_query($sql);
    echo "success";
}
?>