<?php
session_start();
ob_start();
include("../include/globalIncWeb.php");
ini_set("display_errors",0);
if(!isset($_SESSION['user_id']) && ($_SESSION['register']!="register"))
{
	echo "<script>window.location='index.php';</script>";
}
	if(isset($_POST['txtName']) && $_POST['txtName'] != '') {
		$id = GenerateIds(id,tbl_user_data);
		$txtName = htmlspecialchars(htmlentities(strip_tags(trim($_POST['txtName']))),ENT_QUOTES);
		$txtSlogan = htmlspecialchars(htmlentities(strip_tags(trim($_POST['txtSlogan']))),ENT_QUOTES);
		$FCKeditor = htmlspecialchars(htmlentities(strip_tags(trim($_POST['FCKeditor']))),ENT_QUOTES);
		$offcType = htmlspecialchars(htmlentities(strip_tags(trim($_POST['rd1']))),ENT_QUOTES);
		$txtFocalPersonTitle = htmlspecialchars(htmlentities(strip_tags(trim($_POST['txtFocalPersonTitle']))),ENT_QUOTES);
		$txtFocalPersonSurname = htmlspecialchars(htmlentities(strip_tags(trim($_POST['txtFocalPersonSurname']))),ENT_QUOTES);
		$txtFocalPersonName = htmlspecialchars(htmlentities(strip_tags(trim($_POST['txtFocalPersonName']))),ENT_QUOTES);
		$txtPostion = htmlspecialchars(htmlentities(strip_tags(trim($_POST['txtPostion']))),ENT_QUOTES);
		$txtDepartment = htmlspecialchars(htmlentities(strip_tags(trim($_POST['txtDepartment']))),ENT_QUOTES);
		$txtCompanyAddrStreet = htmlspecialchars(htmlentities(strip_tags(trim($_POST['txtCompanyAddrStreet']))),ENT_QUOTES);
		$txtPostCode = htmlspecialchars(htmlentities(strip_tags(trim($_POST['txtPostCode']))),ENT_QUOTES);
       	$txtCompanyAddrCountry = htmlspecialchars(htmlentities(strip_tags(trim($_POST['txtCompanyAddrCountry']))),ENT_QUOTES);

       	 $txtCompanyAddrProvince = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtCompanyAddrProvince']))),ENT_QUOTES);

       	 $txtCompanyAddrCity = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtCompanyAddrCity']))),ENT_QUOTES);

       	 $txtOffcPhone = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtOffcPhone']))),ENT_QUOTES);
       	 $txtOffcPhone = left($txtOffcPhone,strlen($txtOffcPhone)-1);

       	 $txtFax = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtFax']))),ENT_QUOTES);
       	 $txtFax = left($txtFax,strlen($txtFax)-1);

       	 $txtMobilePhone = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtMobilePhone']))),ENT_QUOTES);
       	 $txtMobilePhone = left($txtMobilePhone,strlen($txtMobilePhone)-1);

		 $txtEmail = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtEmail']))),ENT_QUOTES);
		if($txtEmail!="")
		{
			if (!filter_var($txtEmail, FILTER_VALIDATE_EMAIL)) 
			{
				$txtEmail = "";
			}
		}
		$txtCompanyWebsite = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtCompanyWebsite']))),ENT_QUOTES);
		$selEcommerce = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['selEcommerce']))),ENT_QUOTES);
		$selEcommerce = left($selEcommerce,strlen($selEcommerce)-1);
		$txtEcomUrl = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtEcomUrl']))),ENT_QUOTES);
		$txtEcomUrl = left($txtEcomUrl,strlen($txtEcomUrl)-1);
		$txtLatitude = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtLatitude']))),ENT_QUOTES);
		$txtLongitude = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtLongitude']))),ENT_QUOTES);
		$txtUrl = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtUrl']))),ENT_QUOTES);
		$addContacts = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['addContacts']))),ENT_QUOTES);
		$txtLati = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtLati']))),ENT_QUOTES);
		$txtLongi = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtLongi']))),ENT_QUOTES);	
		$proLati = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['proLati']))),ENT_QUOTES);
		$proLongi = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['proLongi']))),ENT_QUOTES);	
		 $sql = "select * from tbl_user_data where user_id='".$_SESSION['user_id']."'";
		if($cn == false)
		connect3db();
		$res = mysql_query($sql);
		if(mysql_num_rows($res))
		{
			$row = mysql_fetch_array($res);
			$dataID = $row['id'];
			echo $sqlU = "update tbl_user_data set user_id='".$_SESSION['user_id']."',company_name='$txtName',company_slogan='$txtSlogan',company_intro='$FCKeditor',offc_type='$offcType',focus_person_title='$txtFocalPersonTitle',focus_person_surname='$txtFocalPersonSurname',focus_person_name='$txtFocalPersonName',position='$txtPostion',department='$txtDepartment',company_addr_country='$txtCompanyAddrCountry',company_addr_province='$txtCompanyAddrProvince',company_addr_city='$txtCompanyAddrCity',company_addr_postcode='$txtPostCode',company_addr_street='$txtCompanyAddrStreet',offc_phone='$txtOffcPhone',fax='$txtFax',mobile_phone='$txtMobilePhone',email='$txtEmail',company_website='$txtCompanyWebsite',plateform='$selEcommerce',plateform_url='$txtEcomUrl',latitude='$txtLatitude',longitude='$txtLongitude',geo_url='$txtUrl',country_lati='$txtLati',country_longi='$txtLongi',	province_lati='$proLati',province_longi='$proLongi' where user_id='".$_SESSION['user_id']."'";
			if($cn == false)
			connect3db();
			$resU = mysql_query($sqlU);
		}
		else
		{
			echo $sqlI = "insert into tbl_user_data(id,user_id,company_name,company_slogan,company_intro,offc_type,focus_person_title,focus_person_surname,focus_person_name,position,department,company_addr_country,company_addr_province,company_addr_city,company_addr_postcode,company_addr_street,offc_phone,fax,mobile_phone,email,company_website,plateform,plateform_url,latitude,longitude,geo_url,country_lati,country_longi,province_lati,province_longi) values ('$id','".$_SESSION['user_id']."','$txtName','$txtSlogan','$FCKeditor','$offcType','$txtFocalPersonTitle','$txtFocalPersonSurname','$txtFocalPersonName','$txtPosition','$txtDepartment','$txtCompanyAddrCountry','$txtCompanyAddrProvince','$txtCompanyAddrCity','$txtPostCode','$txtCompanyAddrStreet','$txtOffcPhone','$txtFax','$txtMobilePhone','$txtEmail','$txtCompanyWebsite','$selEcommerce','$txtEcomUrl','$txtLatitude','$txtLongitude','$txtUrl','$txtLati','$txtLongi','$proLati','$proLongi')";
			if($cn == false)
			connect3db();
			$res = mysql_query($sqlI);
		}
		
	}
	return true;
?>