<?php
session_start();
include("../include/globalIncWeb.php");
$sql = "select * from tbl_img where data_id='".$_SESSION['CoID']."' AND category = 'member_certificate'";
if($cn == false)
	connect3db();
$res = mysql_query($sql);
while($row=mysql_fetch_array($res))
{
	?>
    <!--<div style="float:left; width:150px"">-->
    <img src="images/member_certificate/<?php echo $row['file_name'];?>" width="150" height="150">
    <div><?php echo $row['caption'];?></div>
    <!--</div>-->
    
    <?php }
?>