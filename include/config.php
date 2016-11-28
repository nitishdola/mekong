<?php
$webUrl = "http://localhost/mikong_nitish/";
$dsn 		= 'mysql: host=localhost; dbname=logistk7_db';
$user 		= 'root';
$password 	= '';
try {
$pdo = new PDO($dsn, $user, $password);
$pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo -> exec("set names utf8");
}
catch (PDOException $e) {
echo 'Connection failed: ' . $e->getMessage();
}
//functions

function GetYearYYYYMMDD($val)
{
	$dateMArray = explode("-", $val);
	$val = $dateMArray[2]."-".$dateMArray[1]."-".$dateMArray[0];
	return $val;
}

function getDateDDMMYYYY($val)
{
	$myDateArray = explode("-", $val);
	$val = ($myDateArray[2]."-".$myDateArray[1]."-".$myDateArray[0]);
	return $val;
}

function charReplaceDash($t)
	{
		$t = str_replace("--------","-",$t);
		$t = str_replace("-------","-",$t);	
		$t = str_replace("------","-",$t);	
		$t = str_replace("-----","-",$t);
		$t = str_replace("----","-",$t);
		$t = str_replace("---","-",$t);		
		$t = str_replace("--","-",$t);
		$t = str_replace("'","-",$t);
		$t = str_replace('%','-',$t);
		$t = str_replace('%u202C','-',$t);
		$t = str_replace('%u200B','-',$t);	
		return $t;
	} 
function charReplace($t)

	{

		$t = str_replace("'","&acute;",$t);

		$t = str_replace('"','&quot;',$t);	

		$t = str_replace('’','&quot;',$t);	

		return $t;

	}
	

function GenerateIds($f,$t)
		{
			$sql = "Select ifnull(max(".$f."),0) from ".$t;
			if($cn == false)
				connect3db();
			$res = mysql_query($sql);
			$row = mysql_fetch_array($res);
			$n = $row[0] + 1;
			mysql_close();
			return $n;		
		}


?>