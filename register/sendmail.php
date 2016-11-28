<?php
if(isset($_POST['submit']) && $_POST['submit']=="Send Now"){
	$txtFname = strip_tags(trim($_POST['txtFname']));
	$txtLName =strip_tags(trim($_POST['txtLname']));
	$txtEmail =strip_tags(trim($_POST['txtEmail']));
	$txtPhone =strip_tags(trim($_POST['txtPhone']));
	$txtCity =strip_tags(trim($_POST['txtCity']));
	$txtZipcode =strip_tags(trim($_POST['txtZipcode']));
	$txtZipcode =strip_tags(trim($_POST['txtMessage']));
	$msg = "<table width='600' border='1' cellspacing='2' cellpadding='3'>
  <tr>
    <td colspan='2'><h2>Enquiry</h2></td>
  </tr>
  <tr>
    <td width='129'>First Name</td>
    <td width='447'>$txtFname</td>
  </tr>
  <tr>
    <td>Last Name</td>
    <td>$txtLName</td>
  </tr>
  <tr>
    <td>Email</td>
    <td>$txtEmail</td>
  </tr>
  <tr>
    <td>Phone no</td>
    <td>$txtPhone</td>
  </tr>
  <tr>
    <td>City</td>
    <td>$txtCity</td>
  </tr>
  <tr>
    <td>Zipcode</td>
    <td>$txtZipcode</td>
  </tr>
  <tr>
    <td>Message</td>
    <td>$txtMessage</td>
  </tr>
  </table>";
  require("class.phpmailer.php");
	$mail = new PHPMailer();
	$mail->IsSMTP();                                   // send via SMTP
	$mail->Host     = "mail.aiahs.com"; // SMTP server
	//$mail->Host     = "rdsindia.com"; // SMTP server
	$mail->SMTPAuth = true;     // turn on SMTP authentication
	$mail->Username = "post@aiahs.com";  // SMTP username
	$mail->Password = "Post#123"; // SMTP password
	$mail->From     = "post@aiahs.com";
	$mail->FromName = $name; 
	$mail->AddAddress("shaukathayder@koyelitravels.in","4th Assam International Agri-Horti Show 2017");
	$mail->AddReplyTo($email,"");
	$mail->WordWrap = 100;                              // set word wrap
	//$mail->AddAttachment("Path to Attachment ");      // attachment
	$mail->IsHTML(true);                               // send as HTML
	$mail->Subject  =  "4th Assam International Agri-Horti Show 2017";
	$mail->Body     =  $msg;
	if(!$mail->Send())
	{
		echo "<script>window.parent.location='confirmation.php?msg=fail';</script>";
	}
	else
	{
		echo "<script>window.parent.location='confirmation.php?msg=success'</script>";	
	}
	
}
?>