<?php
	include("include/globalIncWeb.php");
	session_start();
	if((!empty($_POST['fname']))&&(!empty($_POST['lname']))&&(!empty($_POST['email'])))
	{
		$id = GenerateIds(reg_id,  tbl_member_reg);
		$reg_id_encode = base64_encode($id);
		
		$fname = charReplace(htmlspecialchars(htmlentities(strip_tags(cleanInputs(urlencode($_POST['fname']))),ENT_QUOTES)));
		$fname = addslashes(urldecode($fname));
	
		$lname = charReplace(htmlspecialchars(htmlentities(strip_tags(cleanInputs(urlencode($_POST['lname']))),ENT_QUOTES)));
		$lname = addslashes(urldecode($lname));
	
		$email = charReplace(htmlspecialchars(htmlentities(strip_tags(cleanInputs(urlencode($_POST['email']))),ENT_QUOTES)));
		$email = addslashes(urldecode($email));
	
		$phone = charReplace(htmlspecialchars(htmlentities(strip_tags(cleanInputs(urlencode($_POST['phone']))),ENT_QUOTES)));
		$phone = addslashes(urldecode($phone));
	
		$country = charReplace(htmlspecialchars(htmlentities(strip_tags(cleanInputs(urlencode($_POST['country']))),ENT_QUOTES)));
		$country = addslashes(urldecode($country));
	
		$state = charReplace(htmlspecialchars(htmlentities(strip_tags(cleanInputs(urlencode($_POST['state']))),ENT_QUOTES)));
		$state = addslashes(urldecode($state));
	
		$city = charReplace(htmlspecialchars(htmlentities(strip_tags(cleanInputs(urlencode($_POST['city']))),ENT_QUOTES)));
		$city = addslashes(urldecode($city));

		$ip = $_SERVER['REMOTE_ADDR'];
		$date = date("Y-m-d");
		
		$activation_key     = rand(0,9999999);
		$salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647)); 
		$password = hash('sha256', $_POST['password'] . $salt); 
		
		 for($round = 0; $round < 65536; $round++) 
			{ 
				$password = hash('sha256', $password . $salt); 
			} 

	$sqlI = "insert into  tbl_member_reg(reg_id,f_name,l_name,reg_email,reg_password,salt,reg_date,activaton_code,status,reg_phone,reg_country,reg_state,reg_city,ip_addr) values ($id,'$fname','$lname','$email','$password','$salt','$date','$activation_key','0','$phone','$country','$state','$city','$ip')";
	if($cn == false)
	connect3db();
	$resI = mysql_query($sqlI);
	if($resI)
	{
		mysql_close();
		$msg = "Dear $fname $lname, <br/>
	Please click on the below link to activate your account.<br /><br /><br /><br />
	<a href='http://logisticsgms.com/register/check_member_activation.php?id=$reg_id_encode&token=$activation_key' target='_blank' style='font-family:arial; font-size:24px; color: #fff; padding:8px; background-color: #006F8A; text-decoration:none'>Activate Now</a>";
		require("class.phpmailer.php");
			$mail = new PHPMailer();
			$mail->IsSMTP();                            
			$mail->Host     = "mail.webcomipl.net"; 
			$mail->SMTPAuth = true;  
			$mail->Username = "post@webcomipl.net"; 
			$mail->Password = "post#123";
			$mail->From     = "info@logisticsgms.com";
			$mail->FromName = "GMS Logistics"; 
			$mail->AddAddress($email,"GMS Logistics ");
			$mail->AddReplyTo("wakibulh@gmail.com","GMS Logistics");
			$mail->WordWrap = 100; 
			$mail->IsHTML(true); 
			$mail->Subject  =  "GMS Logistics Member Activation";
			$mail->Body     =  $msg;
			if($mail->Send())
			 {
				echo "success";
			 }
	}
}
	
	
?>