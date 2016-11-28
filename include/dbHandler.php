<?php

require_once("class.inputfilter_clean.php");

$dispArray = array();

$today = date("Y-m-d");

$todayLong = date("l, j M Y");

//$sessID = session_id();

$ip = $_SERVER['REMOTE_ADDR'];

//require('newconn.php');

	$tday = date("Y-m-d");

	$yday = gmdate("Y-m-d",strtotime(' -1 day'));



function connect3db()

{

$cn=mysql_connect(DB_HOST,DB_USER,DB_PASS);
if(!$cn){die("Could not connect to MySQL");}
mysql_select_db(DB_NAME,$cn) or die ("could not open db".mysql_error());
return $cn;
}

function GetYearYYYYMMDD1($val)
{
	$dateMArray = explode("-", $val);
	$val = ($dateMArray[2]."-".$dateMArray[1]."-".$dateMArray[0]);
	return $val;
}		


function imagecreatefromfile( $filename ) {
    if (!file_exists($filename)) {
           throw new InvalidArgumentException('File "'.$filename.'" not found.');
    }
    switch ( strtolower( pathinfo( $filename, PATHINFO_EXTENSION ))) {
        case 'jpeg':
        case 'jpg':
            return imagecreatefromjpeg($filename);
        break;
        case 'png':
            return imagecreatefrompng($filename);
        break;
        case 'gif':
            return imagecreatefromgif($filename);
        break;
        default:
            throw new InvalidArgumentException('File "'.$filename.'" is not valid jpg, png or gif image.');
        break;

    }

}		

function cleanInputs($input)
		{
		$tags = explode(',', $tg);
		for ($i = 0; $i < count($tags); $i++) $tags[$i] = trim($tags[$i]);
		// attr array
		$attr = explode(',', $at);
		for ($i = 0; $i < count($attr); $i++) $attr[$i] = trim($attr[$i]);	
		$myFilter = new InputFilter($tags, $attr, 0, 0, 1);
		$result = $myFilter->process($input);
		$result = htmlentities($result);
		return $result;
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

function mainMenu($t){
if($cn == false)
			connect3db();
			if($t==1)
			{
				  $sqlV = "Select * from  tbl_mainmenu where status!='9'  order by list_order ASC";
			}
			$resV = mysql_query($sqlV);
			$r = 0;
					while($row = mysql_fetch_array($resV)){
						$newsArray[$r][0] = $row['id'];
						$newsArray[$r][1] = $row['name'];
						$newsArray[$r][2] = $row['link_name'];
						$newsArray[$r][3] = $row['post_link_name'];
						$newsArray[$r][4] = $row['status'];
						$newsArray[$r][5] = $row['list_order'];
						$r++;
					}		
			mysql_close();	
			return $newsArray;	
		}	

function subMenu($id,$t){
if($cn == false)
			connect3db();
			if($t==1)
			{
				  $sqlV = "Select * from  tbl_submenu where status!='9' and parent_id='$id'  order by list_order ASC";
			}
			$resV = mysql_query($sqlV);
			$r = 0;
					while($row = mysql_fetch_array($resV)){
						$newsArray[$r][0] = $row['parent_id'];
						$newsArray[$r][1] = $row['id'];
						$newsArray[$r][2] = $row['name'];
						$newsArray[$r][3] = $row['link_name'];
						$newsArray[$r][4] = $row['post_link_name'];
						$newsArray[$r][5] = $row['status'];
						$newsArray[$r][6] = $row['list_order'];
						$newsArray[$r][7] = $row['fld_descrip'];
						$r++;
					}		
			mysql_close();	
			return $newsArray;	
		}	
		
function subsubMenu($id,$t){
if($cn == false)
			connect3db();
			if($t==1)
			{
				  $sqlV = "Select * from  tbl_subsubmenu where status!='9' and sub_id='$id'  order by list_order ASC";
			}
			$resV = mysql_query($sqlV);
			$r = 0;
					while($row = mysql_fetch_array($resV)){
						$newsArray[$r][0] = $row['sub_id'];
						$newsArray[$r][1] = $row['id'];
						$newsArray[$r][2] = $row['name'];
						$newsArray[$r][3] = $row['link_name'];
						$newsArray[$r][4] = $row['post_link_name'];
						$newsArray[$r][5] = $row['status'];
						$newsArray[$r][6] = $row['list_order'];
						$newsArray[$r][7] = $row['fld_descrip'];
						$r++;
					}		
			mysql_close();	
			return $newsArray;	
		}	
		
		function getPics($id,$t){
			if($cn == false)
			connect3db();
				   $sqlV = "Select * from   tbl_img where data_id='$id' and category='$t'  order by id desc";
			$resV = mysql_query($sqlV);
			$r = 0;
					while($row = mysql_fetch_array($resV)){
						$newsArray[$r][0] = $row['id'];
						$newsArray[$r][1] = $row['data_id'];
						$newsArray[$r][2] = $row['file_name'];
						$newsArray[$r][3] = $row['caption'];
						$newsArray[$r][4] = $row['status'];
						$newsArray[$r][5] = $row['category'];
						$r++;
					}		
			mysql_close();	
			return $newsArray;	
		}

	function GetAdminName($f)
		{
			$sql = "Select ".$f." from countries";
			if($cn == false)
				connect3db();
			$res = mysql_query($sql);
			$row = mysql_fetch_array($res);
			$n = $row[0];
			mysql_close();
			return $n;		
		}
		
	function getUserdata($id,$c){
	if($cn == false)
	connect3db();
	if($c==1)
	   $sqlV = "Select * from  tbl_user_data where user_id='$id'";
	else if($c==2)   
	   $sqlV = "Select * from  tbl_user_data where id='$id'";
	else if($c==3)   
	   $sqlV = "Select * from  tbl_user_data where id='$id' and publish_status='1'";
			$resV = mysql_query($sqlV);
			$r = 0;
					while($row = mysql_fetch_array($resV)){
						$newsArray[$r][0] = $row['id'];
						$newsArray[$r][1] = $row['user_id'];
						$newsArray[$r][2] = $row['company_name'];
						$newsArray[$r][3] = $row['company_logo'];
						$newsArray[$r][4] = $row['company_slogan'];
						$newsArray[$r][5] = $row['company_intro'];
						$newsArray[$r][6] = $row['offc_type'];
						$newsArray[$r][7] = $row['legal_represent_title'];
						$newsArray[$r][8] = $row['legal_represent_surname'];
						$newsArray[$r][9] = $row['legal_represent_name'];
						$newsArray[$r][10] = $row['focus_person_title'];
						$newsArray[$r][11] = $row['focus_person_surname'];
						$newsArray[$r][12] = $row['focus_person_name'];
						$newsArray[$r][13] = $row['position'];
						$newsArray[$r][14] = $row['department'];
						$newsArray[$r][15] = $row['company_addr_country'];
						$newsArray[$r][16] = $row['company_addr_province'];
						$newsArray[$r][17] = $row['company_addr_street'];
						$newsArray[$r][18] = $row['offc_phone'];
						$newsArray[$r][19] = $row['fax'];
						$newsArray[$r][20] = $row['mobile_phone'];
						$newsArray[$r][21] = $row['email'];
						$newsArray[$r][22] = $row['company_website'];
						$newsArray[$r][23] = $row['plateform'];
						$newsArray[$r][24] = $row['plateform_url'];
						$newsArray[$r][25] = $row['latitude'];
						$newsArray[$r][26] = $row['longitude'];
						$newsArray[$r][27] = $row['geo_url'];
						$newsArray[$r][28] = $row['core_services'];
						$newsArray[$r][29] = $row['core_services_other'];
						$newsArray[$r][30] = $row['industry_focus'];
						$newsArray[$r][31] = $row['industry_focus_other'];
						$newsArray[$r][32] = $row['other_services'];
						$newsArray[$r][33] = $row['other_services_other'];
						$newsArray[$r][34] = $row['info_serv'];
						$newsArray[$r][35] = $row['business_area_region'];
						$newsArray[$r][36] = $row['business_area_descrip'];
						$newsArray[$r][37] = $row['employee'];
						$newsArray[$r][38] = $row['driver'];
						$newsArray[$r][39] = $row['trucks'];
						$newsArray[$r][40] = $row['warehouse'];
						$newsArray[$r][41] = $row['other_assets'];
						$newsArray[$r][42] = $row['reg_year'];
						$newsArray[$r][43] = $row['reg_authority'];
						$newsArray[$r][44] = $row['reg_no'];
						$newsArray[$r][45] = $row['proprietary_status'];
						$newsArray[$r][46] = $row['reg_capital_txt'];
						$newsArray[$r][47] = $row['annual_turnover'];
						$newsArray[$r][48] = $row['annual_rev'];
						$newsArray[$r][49] = $row['membership'];
						$newsArray[$r][50] = $row['country_based'];
						$newsArray[$r][51] = $row['org_name'];
						$newsArray[$r][52] = $row['org_type'];
						$newsArray[$r][53] = $row['success_story'];
						$newsArray[$r][54] = $row['status'];
						$newsArray[$r][55] = $row['country_lati'];
						$newsArray[$r][56] = $row['country_longi'];
						$newsArray[$r][57] = $row['province_lati'];
						$newsArray[$r][58] = $row['province_longi'];
						$newsArray[$r][59] = $row['company_addr_city'];
						$newsArray[$r][60] = $row['company_addr_postcode'];
						$newsArray[$r][61] = $row['proprietary_status_other'];
						$newsArray[$r][62] = $row['membership'];
						$newsArray[$r][63] = $row['revision_status'];
						$newsArray[$r][64] = $row['org_name_other'];
						$newsArray[$r][65] = $row['org_type_other'];
						$newsArray[$r][66] = $row['revision_received'];
						$newsArray[$r][67] = $row['mi_status'];
						$newsArray[$r][68] = $row['mi_revision'];
						$newsArray[$r][69] = $row['mi_revision_received'];
						$newsArray[$r][70] = $row['operator_id'];
						$newsArray[$r][71] = $row['user_approval_flag'];
						$newsArray[$r][72] = $row['idustry_focus_des'];	
						$newsArray[$r][73] = $row['publish_status'];
						$newsArray[$r][74] = $row['membership_location'];
						$newsArray[$r][75] = $row['youtube_id'];	
						$newsArray[$r][76] = $row['reg_date'];	
						$newsArray[$r][77] = $row['publish_date'];	  
						$r++;
					}		
			mysql_close();	
			return $newsArray;	
		}	
		
function getUserBranchdata($id,$c){
	if($cn == false)
	connect3db();
	if($c==1)
	   $sqlV = "Select * from  tbl_branch_data where data_id='$id'";
	else if($c==2)
	    $sqlV = "Select * from  tbl_branch_data where data_id='$id'";   
			$resV = mysql_query($sqlV);
			$r = 0;
					while($row = mysql_fetch_array($resV)){
						$newsArray[$r][0] = $row['branch_id'];
						$newsArray[$r][1] = $row['data_id'];
						$newsArray[$r][2] = $row['branch_legal_represent_title'];
						$newsArray[$r][3] = $row['branch_legal_represent_surname'];
						$newsArray[$r][4] = $row['branch_legal_represent_name'];
						$newsArray[$r][5] = $row['branch_focus_person_title'];
						$newsArray[$r][6] = $row['branch_focus_person_surname'];
						$newsArray[$r][7] = $row['branch_focus_person_name'];
						$newsArray[$r][8] = $row['branch_position'];
						$newsArray[$r][9] = $row['branch_department'];
						$newsArray[$r][10] = $row['branch_company_addr_country'];
						$newsArray[$r][11] = $row['branch_company_addr_province'];
						$newsArray[$r][12] = $row['branch_company_addr_city'];
						$newsArray[$r][13] = $row['branch_company_addr_postcode'];
						$newsArray[$r][14] = $row['branch_company_addr_street'];
						$newsArray[$r][15] = $row['branch_offc_phone'];
						$newsArray[$r][16] = $row['branch_fax'];
						$newsArray[$r][17] = $row['branch_mobile_phone'];
						$newsArray[$r][18] = $row['branch_email'];
						$newsArray[$r][19] = $row['branch_company_website'];
						$newsArray[$r][20] = $row['branch_plateform'];
						$newsArray[$r][21] = $row['branch_plateform_url'];
						$newsArray[$r][22] = $row['branch_latitude'];
						$newsArray[$r][23] = $row['branch_longitude'];
						$newsArray[$r][24] = $row['branch_geo_url'];
						$newsArray[$r][25] = $row['branch_country_latitude'];
						$newsArray[$r][26] = $row['branch_country_longitude'];
						$newsArray[$r][27] = $row['branch_province_latitude'];
						$newsArray[$r][28] = $row['branch_province_longitude'];
						$r++;
					}		
			mysql_close();	
			return $newsArray;	
		}			


function getCountry($id){
	if($cn == false)
	connect3db();
	   $sqlV = "Select * from  countries where id='$id'";
 	  $resV = mysql_query($sqlV);
	  $r = 0;
		while($row = mysql_fetch_array($resV)){
		$newsArray[$r][0] = $row['id'];
		$newsArray[$r][1] = $row['sortname'];
		$newsArray[$r][2] = $row['name'];
		$newsArray[$r][3] = $row['lat'];
		$newsArray[$r][4] = $row['lng'];
		$r++;
		mysql_close();	
		return $newsArray;	
		}	
}

function getUserInfo($id){
	if($cn == false)
	connect3db();
	  $sqlV = "Select * from  users where id='$id'";
 	  $resV = mysql_query($sqlV);
	  $r = 0;
		while($row = mysql_fetch_array($resV)){
		$newsArray[$r][0] = $row['id'];
		$newsArray[$r][1] = $row['email'];
		$newsArray[$r][2] = $row['countryid'];
		$newsArray[$r][3] = $row['name'];
		$r++;
		mysql_close();	
		return $newsArray;	
		}	
}


function getMemberInfo($id){
	if($cn == false)
	connect3db();
	  $sqlV = "Select * from  tbl_member_reg where reg_id='$id'";
 	  $resV = mysql_query($sqlV);
	  $r = 0;
		while($row = mysql_fetch_array($resV)){
		$newsArray[$r][0] = $row['reg_email'];
		$r++;
		mysql_close();	
		return $newsArray;	
		}	
}

function getAllPictures($id,$dataID,$cat_name,$c){
	if($c==1)
	   $sqlV = "Select * from  tbl_img where data_id='$dataID' and category='$cat_name' and status='1'";
	else if($c==2)
	   $sqlV = "Select * from  tbl_img where id='$id' and data_id='$dataID' and category='$cat_name' and status='1'";	
		if($cn == false)
		connect3db();
 	  $resV = mysql_query($sqlV);
	  $r = 0;
		while($row = mysql_fetch_array($resV)){
		$newsArray[$r][0] = $row['file_name'];
		$newsArray[$r][1] = $row['caption'];
		$r++;
		}
		mysql_close();	
		return $newsArray;	
			
}

//Created by Shaukat on 24 Nov 2016

	function CheckforRegEmail($id){
	if($cn == false)
	connect3db();
	  $sqlV = "Select count(*) from tbl_member_reg  where reg_email ='$id'";
 	  $resV = mysql_query($sqlV);
	  $r = 0;
	  $row = mysql_fetch_array($resV);
	  $r = $row[0];
	  mysql_close();	
	  return $r;	
	}
	
	function CheckForCountryCode($c){
	  if($cn == false)
	  	connect3db();
	  $sqlV = "Select id from countries where sortname ='".strtoupper($c)."' OR upper(name) = '".strtoupper($c)."'";
 	  $resV = mysql_query($sqlV);
	  $r = 0;
	  if(mysql_num_rows($resV))
	  	{
		$row = mysql_fetch_array($resV);
	  	$r = $row[0];			
		}
	  else
		$r = 0;
	  
	  mysql_close();	
	  return $r;	
	}	
	
		function insertExcelLog($dataID,$userID,$loaderID,$exl)
				{
					$f = 0;	
					$sqlXLInsert = "INSERT into tbl_excel_data_log (log_user_data_id, log_user_id, log_uploaded_id, log_ExclFile,
					 log_UploadedOn, log_UploadedTime, log_Status) VALUES('".$dataID."','".$userID."','".$loaderID."','".$exl."','".
					 date("Y-m-d")."','".date('H:i:s')."',1)";
			if($cn == false)
	  			connect3db();
				
			$f = mysql_query($sqlXLInsert);
			return $f;
		}
		
	function checkForExcelData($i)
		{
		if($cn == false)
	  	connect3db();
		  $sqlV = "Select count(*) from tbl_excel_data_log where log_user_data_id ='".$i."'";
		  $resV = mysql_query($sqlV);
		  $r = 0;
		  if(mysql_num_rows($resV))
			{
			$row = mysql_fetch_array($resV);
			$r = $row[0];			
			}
		  mysql_close();	
		  return $r;	
		}	
?>