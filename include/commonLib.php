<?php
//Current Date
$today = gmdate("Y-m-d");
$filetoday=gmdate("Ymd");
date_default_timezone_set('Asia/Kolkata');
$currTime = date('H:m:s');

$datetime = mktime(date("H"),date("i"),date("s"),date("m"),date("d"),date("Y"));
$datetime = date('Y-m-d H:i:s',$datetime);
//Current Year
$CurrYear = gmdate("Y");

//Last Year
$LastYear = gmdate("Y")-1;

//Financial Year
$FinYear=gmdate("y");

// Current Financial year
function FinancialYr()
	{
		if ((gmdate("y")+1) < 10)
			{
			$FnYear = "0".(gmdate("y")+1);
			}
		else
			{
			$FnYear = (gmdate("y")+1);
			}
		  $FinancialYear=gmdate("Y")."-".$FnYear;
		  return $FinancialYear;
	}

// Current Financial year
function LastFinancialYr()
	{
	/*	if ((gmdate("y")) < 10)
			{
			$FnYear =(gmdate("y"));
			}
		else
			{
			$FnYear = (gmdate("y"));
			}*/
		  $LastFinancialYear=(gmdate("Y")-1)."-".(gmdate("y"));
		  return $LastFinancialYear;
	}

//Current Time
function getLocalTime()
{
	$currenttime = localtime(); 
	$mytime = $currenttime[2] . ":" . $currenttime[1] . ":" . $currenttime[0];
	return $mytime;
}

//Current Month by name
function getMyMonthName($n)
{
	$mymonthArray = array("01" => "January", "02" => "February", "03" => "March", "04" => "April", "05" => "May", "06" => "June", "07" => "July", "08" => "August", "09" => "September", "10" => "October", "11" => "November", "12" => "December");
	return $mymonthArray[$n];
}

function GetYearYYYYMMDD($val)
{
	$dateMArray = explode("-", $val);
	$val = ($dateMArray[2]."-".$dateMArray[1]."-".$dateMArray[0]);
	return $val;
}

function getDateDDMMYYYY($val)
{
	$myDateArray = explode("-", $val);
	$val = ($myDateArray[2]."-".$myDateArray[1]."-".$myDateArray[0]);
	return $val;
}

// format the date so that it looks prettier(dd-MMM-yy)
function fixDate($val)
{
	$dateArray = explode("-", $val);
	$val = date("d F Y", mktime(0,0,0, $dateArray[1], $dateArray[2],$dateArray[0]));
	return $val;
}

function fixDateDay($val)
{
	$dateArray = explode("-", $val);
	$val = date("l, d F Y", mktime(0,0,0, $dateArray[1], $dateArray[2],$dateArray[0]));
	return $val;
}

// format the date so that it prints month and year(MMM/YY)
function fixMonthYear($val)
{
	$monthYearArray = explode("-", $val);
	$val = date("M/Y", mktime(0,0,0, $monthYearArray[1], $monthYearArray[2], $monthYearArray[0]));
	return $val;
}

//Get no of days between two given dates in dd-mm-yy format(1-0-2)
function getDateDiff($ad,$dd)
{
	$arrdateArray = explode("-", $ad);
	$adate = mktime(0,0,0, $arrdateArray[1], $arrdateArray[0],$arrdateArray[2]);
	
	$depdateArray = explode("-", $dd);
	$ddate = mktime(0,0,0, $depdateArray[1], $depdateArray[0],$depdateArray[2]);
	
	$val = floor(($ddate - $adate)/60/60/24);
	return $val;
}

//Get the Rights assigned to a user
function myrights($no)
{
	$n = $no;
	if($n == 0)
		$rights = "None";
	if($n == 1)
		$rights = "Add";
	if($n == 2)
		$rights = "Edit";
	if($n == 3)
		$rights = "Delete";
	if($n == 9)
		$rights = "All";
	return $rights;
}

	
	//Decode character
	function decodeMe($sText)
	{
		$sEncText = "";
		for ($i = 0; $i <= strlen($sText) - 1; $i++)
		{
			// Get the character we are going to work on
			$sChar = substr($sText, $i, 1);
			// Get the ASCII value of that of that charater
			$iASCII = ord($sChar);
			
			if( ($iASCII >= 192) && ($iASCII <= 217) )
				$sNewChar = chr($iASCII - 127);
			if( ($iASCII >= 218) && ($iASCII <= 243) )
				$sNewChar = chr($iASCII - 121);				
			if( ($iASCII >= 244) && ($iASCII <= 253) )
				$sNewChar = chr($iASCII - 196);
			if( ($iASCII == 32) )
				$sNewChar = chr($iASCII);					

			$sEncText = $sEncText . $sNewChar;
        }
		return $sEncText;
	}
	
	//Encode character
	function encodeMe($sText)
	{
		$sEncText = "";
		for ($i = 0; $i <= strlen($sText) - 1; $i++)
		{
			// Get the character we are going to work on
			$sChar = substr($sText, $i, 1);
			// Get the ASCII value of that of that charater
			$iASCII = ord($sChar);
			
			if( ($iASCII >= 65) && ($iASCII <= 90) )
				$sNewChar = chr($iASCII + 127);
			if( ($iASCII >= 97) && ($iASCII <= 122) )
				$sNewChar = chr($iASCII + 121);				
			if( ($iASCII >= 48) && ($iASCII <= 57) )
				$sNewChar = chr($iASCII + 196);
			if( ($iASCII == 32) )
				$sNewChar = chr($iASCII);								

			$sEncText = $sEncText . $sNewChar;
        }
		return $sEncText;
	}
function left($str, $length) {
return substr($str, 0, $length);
}

function right($str, $length) {
return substr($str, -$length);
}

function charReplace($t)
{

	//$t = str_replace("’","&rsquo;",$t);
	$t = str_replace("'","&rsquo;",$t);
	$t = str_replace('"','&quot;',$t);	
	$t = str_replace("‘","&rsquo;",$t);
	$t = str_replace("‘‘","&quot;",$t);
	$t = str_replace("’","&rsquo;",$t);
	$t = str_replace('’','&quot;',$t);	
	return $t;
	
	//echo ">>>".addslashes($t);	
	return $t;
}
	
?>
