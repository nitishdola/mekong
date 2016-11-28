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


if($insert){

$name = strip_tags(trim($_GET['enqName']));
$company = strip_tags(trim($_GET['enqCompany']));
$email = strip_tags(trim($_GET['enqEmail']));
$phone = strip_tags(trim($_GET['enqPhone']));
$website = strip_tags(trim($_GET['enqWebsite']));
$country = strip_tags(trim($_GET['enqCountry']));
$comment = strip_tags(trim($_GET['enqComments']));

$msg_date = date('Y-m-d H:i:s');
connect3db();
mysql_query("INSERT INTO enquiry_messages(name,company,email,phone,website,country,comment,msg_date,status) VALUES('$company','$email','$phone','$website','$country', '$comment', '$msg_date',1)") or die(mysql_error());

echo 'Message sent successfully !';
}else{
	echo 'unable to insert !';
}


