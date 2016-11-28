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
	$conubtryName  = getCountry($_SESSION['countryid']);
	$contryName = $conubtryName[0][2];
	$dataID = $_POST['id'];
	$info = getUserdata($dataID,2);
	$userInfo = getUserInfo($_SESSION['user_id']);
	$userID = $info[0][1];
	$comName = $info[0][2];
	$user_email = $userInfo[0][1];
	$email = "mi@logisticsgms.com";
	$msg = "Dear Sir/Madam,<br> $comName profile has been submitted.<br>
<br>
Best Wishes<br>
Administrator ($contryName)
";
//echo $msg;
	if($cn == false)
    	connect3db();
		$sqlU = "update  tbl_user_data set mi_status='1',operator_id='".$_SESSION['user_id']."' where id='".$dataID."'";
		$resU = mysql_query($sqlU);
		if($resU)
		{
			
			$rev = intval($info[0][68]+1);
			$sqlD="update tbl_user_data set mi_revision='".$rev."' where id='".$dataID."'";
			$resD = mysql_query($sqlD); 
			mysql_close();
			
			$dy = date("Y-m-d");
			$mID = GenerateIds("msg_id","notification_messages");
			$sqlIn = "insert into notification_messages(msg_id,user_id,user_email,data_id,date,message_txt,status,type) values ($mID,'".$_SESSION['user_id']."','$user_email','$dataID','$dy','$comName profile has been submitted.','1','usertomi')";
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
			$mail->AddAddress($email,"GMS Logistics");
			$mail->AddReplyTo($userInfo[0][1],"GMS Logistics");
			$mail->WordWrap = 100; 
			$mail->IsHTML(true);
			$mail->Subject  =  "GMS Logistics Company Profile of $contryName";
			$mail->Body     = $msg;
			if($mail->Send())
			 {
				echo "<span style='color: #7CB342' class='btn-sm'>Sent to MI</span>";
			 }
		
				
		}
	}
	
?>
