<?php
ob_start();
session_start();
include("../include/globalIncWeb.php");
ini_set("display_errors","0");
?>
<?php
	$id=$_POST['id'];
	$sname = $_POST['sname'];
	echo '<option value="">Select</option>';
	$sql = "select * from  states where country_id='".$id."'";
	if($cn == false)
	connect3db();
	$res = mysql_query($sql);
	if(mysql_num_rows($res))
	{
	while($row = mysql_fetch_array($res))
	{
	?>
		<option value="<?php echo $row['name'];?>" <?php if($row['name']==$sname) echo "selected";?> ><?php echo $row['name'];?></option>
<?php }   }?>
