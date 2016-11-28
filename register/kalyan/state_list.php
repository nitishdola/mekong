<?php
ob_start();
session_start();
include("include/globalIncWeb.php");
ini_set("display_errors","0");
?>
<?php

if(isset($_POST['id']))
{
	$id=$_POST['id'];
	echo '<option value="" style="color:#000">Select</option>';
	$sql = "select * from  states where country_id='".$id."'";
	if($cn == false)
	connect3db();
	$res = mysql_query($sql);
	if(mysql_num_rows($res))
	{
	while($row = mysql_fetch_array($res))
	{
	?>
		<option value="<?php echo $row['name'];?>"  style="color:#000"><?php echo $row['name'];?></option>
<?php } }  }?>
