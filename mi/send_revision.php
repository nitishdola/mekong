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
	if($info[0][15]=="36")
	{
	 	$email = "admin_cambodia@logisticsgms.com";
	}
	else if($info[0][15]=="119")
	{
	 	$email = "admin_laos@logisticsgms.com";
	}
	else if($info[0][15]=="150")
	{
	 	$email = "admin_myanmar@logisticsgms.com";
	}
	else if($info[0][15]=="217")
	{
	 	 $email = "admin_thailand@logisticsgms.com";
	}
	else if($info[0][15]=="238")
	{
	 	$email = "admin_vietnam@logisticsgms.com";
	}
    $userID = $info[0][1];
	$operator = getUserInfo($userID);



	//$operatorEmail = $operator[0][1];
	$dateM = date('Y-m-d');
	$msg = $_POST['remark'];
	$msgID = GenerateIds("msg_id","notification_messages");
	$remarks = htmlspecialchars(htmlentities(strip_tags($_POST['remark'])),ENT_QUOTES);
	 $sql = "insert into notification_messages(msg_id,user_id,user_email,data_id,date,message_txt,status,type) values($msgID,$userID,'$email',$dataID,'$dateM','$remarks',1,'mi')";
	if($cn == false)
    connect3db();
	$res = mysql_query($sql);
	if($res)
	{
		$rev = intval($info[0][69]+1);
		$sqlU = "update  tbl_user_data set mi_status='0',mi_revision_received='".$rev."' where id='".$dataID."'";
		if($cn == false)
    	connect3db();
		$resU = mysql_query($sqlU);
		if($resU)
		{
			
			$sqlAd = "update  tbl_user_data set user_approval_flag='0' where id='".$dataID."'";
			if($cn == false)
			connect3db();
			$resAd = mysql_query($sqlAd);
			
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
			$mail->AddAddress($email,"GMS Logistics");
			$mail->AddReplyTo("mi@logisticsgms.com","GMS Logistics");
			$mail->WordWrap = 100; 
			$mail->IsHTML(true);
			$mail->Subject  =  "GMS Logistics MI Revision";
			$mail->Body     = $msg;
			if($mail->Send())
			 {
				echo "<div align='center'><br/><br/><br/>The company profile has been successfully sent back for revision to data collector</div>";
			 }
		
				
		}
	}
	
}
?>
