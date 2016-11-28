<?php

session_start();

ob_start();

include("../include/globalIncWeb.php");


if(!isset($_SESSION['user_id']) && ($_SESSION['register']!="register"))

{
	echo "<script>window.location='index.php';</script>";
}

$errors = array();

$insert = true;

$event_title = htmlspecialchars($_POST['event_title']);
$event_description = htmlspecialchars($_POST['event_description']);

$event_date_from = htmlspecialchars($_POST['event_date_from']);
$event_date_to = htmlspecialchars($_POST['event_date_to']);

$organiser_address = htmlspecialchars($_POST['organiser_address']);
$organiser_country_id = htmlspecialchars($_POST['organiser_country_id']);

$organiser_contact_name = htmlspecialchars($_POST['organiser_contact_name']);
$organiser_position = htmlspecialchars($_POST['organiser_position']);

$organiser_telephone = htmlspecialchars($_POST['organiser_telephone']);
$organiser_mobile = htmlspecialchars($_POST['organiser_mobile']);

$organiser_email = htmlspecialchars($_POST['organiser_email']);
$event_country_id = htmlspecialchars($_POST['event_country_id']);

$event_province = htmlspecialchars($_POST['event_province']);
$event_city = htmlspecialchars($_POST['event_city']);

$event_address = htmlspecialchars($_POST['event_address']);

if(trim($event_title) == '') {
	$errors['event_title'] = 'Event Title is required';
	$insert = false;
}

if(trim($event_description) == '') {
	$errors['event_description'] = 'Event Description is required';
	$insert = false;
}

if(trim($event_date_from) == '') {
	$errors['event_date_from'] = 'Event Date From is required';
	$insert = false;
}

if(trim($event_date_to) == '') {
	$errors['event_date_to'] = 'Event Date To is required';
	$insert = false;
}

if(trim($organiser_address) == '') {
	$errors['organiser_address'] = 'Organiser address is required';
	$insert = false;
}

if(trim($organiser_country_id) == '') {
	$errors['organiser_country_id'] = 'Organiser Country is required';
	$insert = false;
}

if(trim($organiser_contact_name) == '') {
	$errors['organiser_contact_name'] = 'Organiser contact name is required';
	$insert = false;
}

if(trim($organiser_position) == '') {
	$errors['organiser_position'] = 'Organiser Position is required';
	$insert = false;
}

if(trim($organiser_telephone) == '') {
	$errors['organiser_telephone'] = 'Organizer Telephone is required';
	$insert = false;
}

if(trim($organiser_mobile) == '') {
	$errors['organiser_mobile'] = 'Organizer mobile number is required';
	$insert = false;
}

if(trim($organiser_email) == '') {
	$errors['organiser_email'] = 'Organizer email address is required';
	$insert = false;
}

if(trim($event_country_id) == '') {
	$errors['event_country_id'] = 'Event Country is required';
	$insert = false;
}

if(trim($event_province) == '') {
	$errors['event_province'] = 'Event Province is required';
	$insert = false;
}

if(trim($event_city) == '') {
	$errors['event_city'] = 'Event City is required';
	$insert = false;
}

if(trim($event_address) == '') {
	$errors['event_address'] = 'Event Address is required';
	$insert = false;
}

if($insert == true) {
	//get data id
	$sql1 = "select id from tbl_user_data where user_id = '".$_SESSION['user_id']."'";
	if($cn == false)
	connect3db();
	$res1 = mysql_query($sql1);
	if(mysql_num_rows($res1))
	{
	    $row1= mysql_fetch_array($res1);
	    $user_data_id = $row1['id'];
	}
	
	//insert to database
	$created_at = date('Y-m-d H:i:s');
	$sql = 
				"INSERT INTO  events(user_data_id,event_title,event_description,event_date_from,event_date_to,organiser_address,organiser_country_id,organiser_contact_name,organiser_position,organiser_telephone,organiser_mobile, 	organiser_email,event_country_id,event_province,event_city,event_address,created_at) 
				VALUES(
				'$user_data_id',
				'$event_title',
				'$event_description',
				'$event_date_from',
				'$event_date_to',
				'$organiser_address',
				'$organiser_country_id',
				'$organiser_contact_name',
				'$organiser_position',
				'$organiser_telephone',
				'$organiser_mobile',
				'$organiser_email',
				'$event_country_id',
				'$event_province',
				'$event_city',
				'$event_address',
				'$created_at'
				)
	";

	$res = mysql_query($sql);
	if($res) {
		$_SESSION['insert_success'] = 'Event Added Successfully ! ';
		header('location:add_new_event.php');
		exit;
		
	}else{
		$errors['insert_failed'] = 'Unable to insert ! Please try again .';
		header('location:add_new_event.php');
		exit;
	}
}else{
	$_SESSION['errors'] = '';
	$_SESSION['errors'] = $errors;
	header('location:add_new_event.php');
	exit;
}
?>
