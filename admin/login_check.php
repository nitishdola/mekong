<?php
ob_start();
session_start();
include("../include/globalIncWeb.php");
ini_set("display_errors","0");
ob_start();
$loginOK = true;
//echo "=====".$_POST['logUser'];
/*foreach($_POST as $key => $value) {
$data[$key] = filter($value);
} 
	echo ">>>>".$logUser = strip_tags($data['logUser']);
	echo ">>".$logPass = strip_tags($data['logPass']);*/
if (($_POST['logUser'] =="") || ($_POST['logPass']==""))
{
 		echo 'Blank is not Allowed in mandatory Field';
  		exit();
}
else
{
	$logUser = strip_tags($_POST['logUser']);
	$logPass = strip_tags($_POST['logPass']);
	$rem = strip_tags($data['rem']);
	$regdate= date("Y/m/d");
	$ip = $_SERVER['REMOTE_ADDR'];
	$sql_stime = "select count(*) as tlock from `lastlogin` where `user` ='$logUser' and status ='failed' and date='$regdate'";
	if($cn == false)
	connect3db();
	$rs_stime = mysql_query($sql_stime);
	list($tlock ) = mysql_fetch_row($rs_stime);
	if($tlock >= '5')
    {
		if($cn == false)
		connect3db();
		$rs_ltime = mysql_query("select ltime from `lastlogin` where `user` ='$logUser' and status ='failed' and date='$regdate' order by id desc limit 1 ") or die(mysql_error());
		list($ltime ) = mysql_fetch_row($rs_ltime);
		if(time()-$ltime < 60*10)
		{
			echo 'Locked for 10 Minutes due to incorrect logon attempts.';
			exit();
		}
    }
	
	$user1=array("$logUser");
	$symb1= array("`","~","!","#","$","%","^","&","*","(",")","+","=","{","}","[","]","|",":",";","\"","'","<",">",",","?","\\");
	foreach($user1 AS $user2)
	{
		foreach($symb1 AS $try1)
		{
			$pos1 = strpos($user2,$try1 );
			if($pos1 !== false)
			{
				 echo 'Special charecters are not allowed in username';
				 $ltime = time();
				if($cn == false)
				connect3db();
				mysql_query("INSERT INTO lastlogin(user,date,ip,atmpt,status,ltime) VALUES('$user' ,'$regdate','$ip','1','failed','$ltime')") or die(mysql_error());			echo 'Incorrect User name and Password not allowed';
				 exit();
		 	}
			
		}
	} 
	$sql = "select * from users where username = '".$logUser."'";
	if($cn == false)
	connect3db();
	$res = mysql_query($sql);
	if(mysql_num_rows($res))
	{
                $row = mysql_fetch_array($res);
				$check_password = hash('sha256', $_POST['logPass'] . $row['salt']); 
				for($round = 0; $round < 65536; $round++) 
				{ 
					$check_password = hash('sha256', $check_password . $row['salt']); 
				} 
			
				if($check_password === $row['password']) 
				{ 
					unset($row['salt']); 
					unset($row['password']); 
					$_SESSION['user_name'] = $row['username']; 
					$_SESSION['user_id'] = $row['id'];
					$_SESSION['countryid'] = $row['countryid'];
					
					mysql_close();
					 if(isset($_POST['login_page_stay_signed'])==1) 
					 {
							$month = time() + (60 * 60 * 24 * 30);
							setcookie('remember', $_POST['username'], $month);
							setcookie('username', $logUser, $month);
							setcookie('password', $logPass, $month);
					}
					echo 'Success.... Redirecting';
					echo "<script>window.parent.location='dashboard.php';</script>";
				} 
				else
				{
					echo "Username and password do not match";
					$ltime = time();
					if($cn == false)
					connect3db();
					mysql_query("INSERT INTO lastlogin(user,date,ip,atmpt,status,ltime) VALUES('$logUser','$regdate','$ip','1','failed','$ltime')") or die(mysql_error());				exit();
					
				}
				
    } 
	else
	{
		echo "Username and paasword do not match";
		$ltime = time();
		if($cn == false)
		connect3db();
		mysql_query("INSERT INTO lastlogin(user,date,ip,atmpt,status,ltime) VALUES('$logUser','$regdate','$ip','1','failed','$ltime')") or die(mysql_error());		
		exit();	
	}
	
		
}
ob_end_flush();

?>

