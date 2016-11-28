<?php
	ob_start();
	session_start();
	include("include/globalIncWeb.php");
	ini_set("display_errors","0");
	ob_start();

	$insert = true;
	if($_GET['enqName'] == '') {
		$insert = false;
		echo 'Name can not be empty !'; exit;
	}
	if($_GET['enqPhone'] == '') {
		$insert = false;
		echo 'Phone can not be empty !'; exit;
	}
	if($_GET['enqCompany'] == '') {
		$insert = false;
		echo 'Company can not be empty !'; exit;
	}
	if (filter_var(trim($_GET['enqEmail']), FILTER_VALIDATE_EMAIL) === false) {
		$insert = false;
		echo $_GET['enqEmail'].' is not valid email id !'; exit;
	}
	if($_GET['enqWebsite'] != '') {
		if (filter_var($_GET['enqWebsite'], FILTER_VALIDATE_URL) === false) {
			$insert = false;
			echo 'URL is not valid !'; exit;
		}
	}
	if($_GET['enqCountry'] == '') {
		$insert = false;
		echo 'Country can not be empty !'; exit;
	}
	if($_GET['enqComments'] == '') {
		$insert = false;
		echo 'Comments can not be empty !'; exit;
	}
var_dump($_GET);
	if($insert){

	$name = strip_tags(trim($_GET['enqName']));
	$company = strip_tags(trim($_GET['enqCompany']));
	$email = strip_tags(trim($_GET['enqEmail']));
	$phone = strip_tags(trim($_GET['enqPhone']));
	$website = strip_tags(trim($_GET['enqWebsite']));
	$country = strip_tags(trim($_GET['enqCountry']));
	$comment = strip_tags(trim($_GET['enqComments']));

	$msg_date = date('Y-m-d H:i:s');

	$enqSl = GenerateIds("enqSlno","enquiry_messages");

	$enqID = rand(0,9999999);
	connect3db();
	$newURL = 'company_details.php';
	$sql = mysql_query("INSERT INTO enquiry_messages(enqSlno,enqID,enqName,enqCompany,enqEmail,enqPhone,enqWebsite,enqCountry,enqComments,msg_date,status) VALUES($enqSl,'$enqID','$name','$company','$email','$phone','$website','$country', '$comment', '$msg_date',1)") or die(mysql_error());
	if($sql){

		//send mail to customer
		$to = $email;
		$subject = 'GMS Logistics - Thank You For Your Query';
		$from = 'no-reply@logisticsgms.com';
		// To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		// Create email headers
		$headers .= 'From: '.$from."\r\n".
		    'Reply-To: '.$from."\r\n" .
		    'X-Mailer: PHP/' . phpversion();

		// Compose a simple HTML email message

		$message = '<html><body>';

		$message .= '<h2 style="color:#f40;">Hi '.ucfirst($name).' !</h2>';

		$message .= '<p style="color:#080;font-size:18px;">'.'Thank you for enquiry!! We will get back to you soon !! Your Enquiry Reference No :'.$enqID;.'</p>';

		$message .= '</body></html>';

		// Sending email
		mail($to, $subject, $message, $headers);
		echo 'Thank you for enquiry!! We will get back to you soon !! Your Enquiry Reference No :'.$enqID;
		}else{
			echo 'unable to insert !';
		}
	}
?>
