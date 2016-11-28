<?php
ob_start();
session_start();
include("../include/globalIncWeb.php");
ini_set("display_errors",0);
$url="http://";
$url.= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
$urlregex = "^(http?|ftp)\:\/\/([a-z0-9+!*(),;?&=\$_.-]+(\:[a-z0-9+!*(),;?&=\$_.-]+)?@)?[a-z0-9+\$_-]+(\.[a-z0-9+\$_-]+)*(\:[0-9]{2,5})?(\/([a-z0-9+\$_-]\.?)+)*\/?(\?[a-z+&\$_.-][a-z0-9;:@/&=+\$_.-]*)?(#[a-z_.-][a-z0-9+\$_.-]*)?\$";
if (!preg_match($urlregex,$url)) { } 
else 
{ 
		echo "<script>window.location='../pageerror.html';</script>";
}
if($_SESSION['user_id'] == "")
	header("location: login");
?>

<?php
if(isset($_POST['id'])!="")
{
	$dataID = $_POST['id'];
	$info = getUserdata($dataID,2);
	$comName = $info[0][2];
    	$userID = $info[0][1];
	$memberInfo = getMemberInfo($userID);
	$operatorEmail = $memberInfo[0][0];
	$dateM = date('Y-m-d');
	$msgID = GenerateIds("msg_id","notification_messages");

	 $sql = "insert into notification_messages(msg_id,user_id,user_email,data_id,date,message_txt,status,type) values($msgID,'MI','$email',$dataID,'$dateM','$comName Profile has been published',1,'mi')";
	if($cn == false)
    connect3db();
	$res = mysql_query($sql);
	if($res)
	{
		$rev = intval($info[0][69]+1);
		$sqlU = "update  tbl_user_data set publish_status='1',mi_revision_received='".$rev."' where id='".$dataID."'";
		if($cn == false)
    	connect3db();
		$resU = mysql_query($sqlU);
		if($resU)
		{
			mysql_close();
			require("class.phpmailer.php");
			$mail = new PHPMailer();
			$mail->IsSMTP();                            
			$mail->Host     = "mail.webcomipl.net"; 
			$mail->SMTPAuth = true;  
			$mail->Username = "post@webcomipl.net"; 
			$mail->Password = "post#123";
			$mail->From     = "info@logisticsgms.com";
			$mail->FromName = "GMS Logistics"; 
			$mail->AddAddress($operatorEmail,"GMS Logistics");
			$mail->AddReplyTo("mi@logisticsgms.com","GMS Logistics");
			$mail->WordWrap = 100; 
			$mail->IsHTML(true);
			$mail->Subject  =  "GMS Logistics";
			$mail->Body     = $msg;
			if($mail->Send())
			 {
				echo "Published sucessfully";
			 }
		
				
		}
	}
	
}
?>
