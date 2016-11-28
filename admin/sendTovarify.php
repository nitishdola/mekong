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
if(base64_decode($_POST['id'])!="")
{
	$dy = date("Y-m-d");
	$conubtryName  = getCountry($_SESSION['countryid']);
	$contryName = $conubtryName[0][2];
	$dataID = base64_decode($_POST['id']);
	$info = getUserdata($dataID,2);
	$userInfo = getUserInfo($_SESSION['user_id']);
	$userID = $info[0][1];
	$memberInfo = getMemberInfo($userID);
	$userEmail = $memberInfo[0][0];
	
	$comName = $info[0][2];
	$email = $info[0][21];
	$msg = "Dear Sir/Madam,<br> $comName's profile is awaiting your verification and authorisation for publishing on www.logisticsgms.com. Kindly log into your account and authorise permission to publish.<br>
<br>
Best Wishes<br>
Administrator
";
//echo $msg;
	if($cn == false)
    	connect3db();
		$sqlU = "update  tbl_user_data set 	user_approval_flag='1' where id='".$dataID."'";
		if($cn == false)
    	connect3db();
		$resU = mysql_query($sqlU);
		if($resU)
		{
			$mID = GenerateIds("msg_id","notification_messages");
			$sqlIn = "insert into notification_messages(msg_id,user_id,user_email,data_id,date,message_txt,status,type) values ($mID,$userID,'$email','$dataID','$dy','Authorisation button is now activated. Click on the button to verify and authorise the data','1','admin')";
			if($cn == false)
    		connect3db();
			$resIn = mysql_query($sqlIn);
			require("class.phpmailer.php");
			$mail = new PHPMailer();
			$mail->IsSMTP();                            
			$mail->Host     = "mail.webcomipl.net"; 
			$mail->SMTPAuth = true;  
			$mail->Username = "post@webcomipl.net"; 
			$mail->Password = "post#123";
			$mail->From     = "info@logisticsgms.com";
			$mail->FromName = "Administrator".$userInfo[0][3]; 
			$mail->AddAddress($userEmail,"GMS Logistics");
			$mail->AddReplyTo($userInfo[0][1],"GMS Logistics");
			$mail->WordWrap = 100; 
			$mail->IsHTML(true);
			$mail->Subject  =  "GMS Logistics Company Verification";
			$mail->Body     = $msg;
			if($mail->Send())
			 {
				echo "<span class='btn-sm'>Sent for Authorisation</span>";
			 }
		
				
		}
	}
	
?>
