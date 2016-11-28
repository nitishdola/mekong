<?php
session_start();
include("../include/globalIncWeb.php");
$sql = "select * from tbl_img where data_id='".$_SESSION['CoID']."' AND category = 'reg_no'";
if($cn == false)
	connect3db();
$res = mysql_query($sql);
while($row=mysql_fetch_array($res))
{
	?>
    <div style="float:left; width:800px">
    <img src="images/registration_img/<?php echo $row['file_name'];?>" width="100" height="100">
    <div><br /><?php echo $row['caption'];?></div><br />
    </div>
    
    <?php }
?>