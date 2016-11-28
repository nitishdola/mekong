<?php
ob_start();
session_start();
include("include/globalIncWeb.php");
ini_set("display_errors","0");
ob_start();

if($cn == false)
			connect3db();
if(isset($_GET['data_id']) && $_GET['data_id'] != '') {
	$data_id = $_GET['data_id'];

	$res = mysql_query("
			SELECT date FROM  notification_messages 
			WHERE data_id = $data_id
			ORDER BY msg_id DESC
	") or die(mysql_error());
	if(mysql_num_rows($res)) {
		while($r = mysql_fetch_array($res))
		{
			echo date('d-m-Y', strtotime($r[0])); exit;
		}	
	}else{
		//reg_date
		$res_reg_date = mysql_query("
				SELECT reg_date FROM   tbl_user_data 
				WHERE id = $data_id
		") or die(mysql_error());

		while($r_reg_date = mysql_fetch_array($res_reg_date))
		{	
			if($r_reg_date[0] != NULL) {
				echo date('d-m-Y', strtotime($r_reg_date[0])); exit;
			}
			echo 'No update since registration'; exit;
		}	
	}
	
}