<?php
ob_start();
session_start();
include("include/globalIncWeb.php");
ini_set("display_errors","0");
ob_start();
$loginOK = true;

if (empty($_POST['logUser']) || (empty($_POST['logPass'])))
{
 		echo 'Blank is not allowed in mandatory fields';
  		exit();
}
else
{
	$logUser = strip_tags($_POST['logUser']);
	$logPass = strip_tags($_POST['logPass']);
	//$rem = strip_tags($_POST['rem']);
	$regdate= date("Y/m/d");
	$ip = $_SERVER['REMOTE_ADDR'];
	$sql_stime = "select count(*) as tlock from `lastlogin_users` where `user` ='$logUser' and status ='failed' and date='$regdate'";
	if($cn == false)
	connect3db();
	$rs_stime = mysql_query($sql_stime);
	list($tlock ) = mysql_fetch_row($rs_stime);
	if($tlock >= '5')
    {
		if($cn == false)
		connect3db();
		$rs_ltime = mysql_query("select ltime from `lastlogin_users` where `user` ='$logUser' and status ='failed' and date='$regdate' order by id desc limit 1 ") or die(mysql_error());
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
				mysql_query("INSERT INTO lastlogin_users(user,date,ip,atmpt,status,ltime) VALUES('$user' ,'$regdate','$ip','1','failed','$ltime')") or die(mysql_error());			echo 'Incorrect User name and Password not allowed';
				 exit();
		 	}
			
		}
	} 
	$sql = "select * from tbl_member_reg where reg_email = '".$logUser."' and status='1'";
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
			
				if($check_password === $row['reg_password']) 
				{ 
					unset($row['salt']); 
					unset($row['password']); 
					$_SESSION['user_name'] = $row['reg_email']; 
					$_SESSION['user_id'] = $row['reg_id'];
					$_SESSION['f_name'] = $row['f_name'];
					$_SESSION['l_name'] = $row['l_name'];
					$_SESSION['register'] = "register";
					$sqlSe = "select * from  tbl_user_data  where user_id='".$_SESSION['user_id']."'";
					if($cn == false)
					connect3db();
					$resSe = mysql_query($sqlSe);
					if(mysql_num_rows($resSe))
					{
						mysql_close();
						echo "success1";
					}
					else
					{
						mysql_close();
						echo "success";
					}
				} 
				else
				{
					echo "Username and password do not match";
					$ltime = time();
					if($cn == false)
					connect3db();
					mysql_query("INSERT INTO lastlogin_users(user,date,ip,atmpt,status,ltime) VALUES('$logUser','$regdate','$ip','1','failed','$ltime')") or die(mysql_error());				exit();
					
				}
				
    } 
	else
	{
		echo "Username and password do not match";
		$ltime = time();
		if($cn == false)
		connect3db();
		mysql_query("INSERT INTO lastlogin_users(user,date,ip,atmpt,status,ltime) VALUES('$logUser','$regdate','$ip','1','failed','$ltime')") or die(mysql_error());		
		exit();	
	}
	
		
}
ob_end_flush();

?>

