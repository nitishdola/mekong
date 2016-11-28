<?php
include("../include/config.php");
if(isset($_POST['submit'])=="Next")
{
		
		$error=0;
		$name = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtName']))),ENT_QUOTES);
		$txtSlogan = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtSlogan']))),ENT_QUOTES);
		$companyDetails = htmlspecialchars($_POST['FCKeditor'],ENT_QUOTES);
		$ofcType = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['rd1']))),ENT_QUOTES);
		$txtFocalPersonTitle = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtFocalPersonTitle']))),ENT_QUOTES);
		$txtFocalPersonSurname = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtFocalPersonSurname']))),ENT_QUOTES);
		$txtFocalPersonName = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtFocalPersonName']))),ENT_QUOTES);
		$txtPostion = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtPostion']))),ENT_QUOTES);
		$txtDepartment = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtDepartment']))),ENT_QUOTES);
		$txtCompanyAddrCountry = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtCompanyAddrCountry']))),ENT_QUOTES);
	    $txtCompanyAddrProvince = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtCompanyAddrProvince']))),ENT_QUOTES);
		$txtCompanyAddrStreet = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtCompanyAddrStreet']))),ENT_QUOTES);
		$txtCompanyAddrCity = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtCompanyAddrCity']))),ENT_QUOTES);
		$txtPostCode = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtPostCode']))),ENT_QUOTES);
		if(!empty($_POST['txtOffcPhone']))
		{
			foreach($_POST['txtOffcPhone'] as $ofcPhn)
			{
				$ofcPhnCon .= $ofcPhn.",";
			}
			$ofcPhnCon = left($ofcPhnCon,strlen($ofcPhnCon)-1);
		}
		
		if(!empty($_POST['txtFax']))
		{
			foreach($_POST['txtFax'] as $txtFax)
			{
				$txtFaxCon .= $txtFax.",";
			}
			$txtFaxCon = left($txtFaxCon,strlen($txtFaxCon)-1);
		}
		
		if(!empty($_POST['txtMobilePhone']))
		{
			foreach($_POST['txtMobilePhone'] as $txtMobilePhone)
			{
				$txtMobilePhoneCon .= $txtMobilePhone.",";
			}
			$txtMobilePhoneCon = left($txtMobilePhoneCon,strlen($txtMobilePhoneCon)-1);
		}
		$txtEmail = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtEmail']))),ENT_QUOTES);
		$txtCompanyWebsite = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtCompanyWebsite']))),ENT_QUOTES);
		if(!empty($_POST['selEcommerce']))
		{
			foreach($_POST['selEcommerce'] as $selEcommerce)
			{
				$selEcommerceCon .= $selEcommerce.",";
			}
			$selEcommerceCon  = left($selEcommerceCon,strlen($selEcommerceCon)-1);
		}
		
		if(!empty($_POST['txtEcomUrl']))
		{
			foreach($_POST['txtEcomUrl'] as $txtEcomUrl)
			{
				$txtEcomUrlCon .= $txtEcomUrl.",";
			}
			$txtEcomUrlCon  = left($txtEcomUrlCon,strlen($txtEcomUrlCon)-1);
		}
		
		$txtLatitude = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtLatitude']))),ENT_QUOTES);
		$txtLongitude = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtLongitude']))),ENT_QUOTES);
		
		$txtUrl = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtUrl']))),ENT_QUOTES);

		$sess_data_id = GenerateIds(id,  tbl_user_data);
		$addContacts = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['addContacts']))),ENT_QUOTES);
		$txtCountrylati = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['lati']))),ENT_QUOTES);
		$txtCountrylongi = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['longi']))),ENT_QUOTES);	
		$txtProvinceLati = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['prolati']))),ENT_QUOTES);
		$txtProvincelongi = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['prolongi']))),ENT_QUOTES);	
		
		if($name=="")
		{
			$_SESSION['errmsg'][] =  "* Please provide the company name";
			$error = 1;
		}
		else if($_FILES['logo']['size']==0)
		{
			$_SESSION['errmsg'][] = "* Please upload the company logo";
			$error = 1;
		}
		else
		{
			$upload_dir = 'uploads/';
			$upload_file = time().basename($_FILES['logo']['name']);
			$imageinfo = getimagesize($_FILES['logo']['tmp_name']);
			if($imageinfo['mime'] != 'image/gif' && $imageinfo['mime'] != 'image/jpeg' && $imageinfo['mime'] != 'image/png' && isset($imageinfo)) 
			{
				$_SESSION['errmsg'][] = "* Only jpeg,png and gif images allowed";
				$error =  1;
			
			}
			$filename = strtolower($_FILES['logo']['name']);
			$whitelist = array('jpg', 'png', 'gif', 'jpeg'); #example of white list
			$backlist = array('php', 'php3', 'php4', 'phtml','exe'); #example of black list
			if(!in_array(end(explode('.', $filename)), $whitelist))
			{
				$_SESSION['errmsg'][] = "* Only jpeg,png and gif images allowed";
				$error =  1;
				
			}
			
			if(in_array(end(explode('.', $filename)), $backlist))
			{
				$_SESSION['errmsg'][] = "* Only jpeg,png and gif images allowed";
				$error =  1;
			}
			
			if($_FILES['logo']['size']>1000000)
			{
				$_SESSION['errmsg'][] = "* Logo size exceeded. Maximum upload size is 1 Mb";
				$error =  1;
			}
			
		}
		
		if($companyDetails=="")
		{
			$_SESSION['errmsg'][] = "* Please provide  company details";
			$error =  1;
		}
		else if($ofcType=="")
		{
			$_SESSION['errmsg'][] = "* Please select a office type";
			$error =  1;
		}
		
		else if($txtFocalPersonTitle=="")
		{
			$_SESSION['errmsg'][] = "* Please select title of Focal person";
			$error =  1;
		}
		else if($txtFocalPersonSurname=="")
		{
			$_SESSION['errmsg'][] = "* Please provide surname  of Focal person";
			$error =  1;
		}
		else if($txtFocalPersonName=="")
		{
			$_SESSION['errmsg'][] = "* Please provide Name of Focal person";
			$error =  1;
		}
		else if($txtPostion=="")
		{
			$_SESSION['errmsg'][] = "* Please provide the position of Focal person";
			$error =  1;
		}
	
		else if($txtDepartment=="")
		{
			$_SESSION['errmsg'][] = "* Please provide the department of Focal person";
			$error =  1;
		}
		else if($txtCompanyAddrStreet=="")
		{
			$_SESSION['errmsg'][] = "* Please provide the company address";
			$error =  1;
		}
		else if($txtCompanyAddrCity=="")
		{
			$_SESSION['errmsg'][] = "* Please provide the city";
			$error =  1;
		}
		else if($txtPostCode=="")
		{
			$_SESSION['errmsg'][] = "* Please provide the postcode";
			$error =  1;
		}
		else if($txtCompanyAddrCountry=="")
		{
			$_SESSION['errmsg'][] = "* Please select country";
			$error =  1;
		}
		else if($txtCompanyAddrProvince=="")
		{
			$_SESSION['errmsg'][] = "* Please select province";
			$error =  1;
		}
		
		if($error==0)
		{	
		$mv = move_uploaded_file($_FILES['logo']['tmp_name'],$upload_dir.$upload_file);
			if($mv)
			{
				$sqlCheck = "select * from tbl_user_data where user_id='".$_SESSION['user_id']."'";
				if($cn == false)
				connect3db();
				$resCheck = mysql_query($sqlCheck);
				if(mysql_num_rows($resCheck))
				{
					$rowCheck = mysql_fetch_array($resCheck);
					$sess_data_id = $rowCheck['id'];
					$sql = "update tbl_user_data set company_name='$name',company_logo='$upload_file',company_slogan='$txtSlogan',company_intro='$companyDetails',offc_type='$ofcType',legal_represent_title='$txtLegalTitle',legal_represent_surname='$txtLegalSurname',legal_represent_name='$txtLegalName',focus_person_title='$txtFocalPersonTitle',focus_person_surname='$txtFocalPersonSurname',focus_person_name='$txtFocalPersonName',position='$txtPostion',department='$txtDepartment',company_addr_country='$txtCompanyAddrCountry',company_addr_province='$txtCompanyAddrProvince',company_addr_city='$txtCompanyAddrCity',company_addr_postcode='$txtPostCode',company_addr_street='$txtCompanyAddrStreet',offc_phone='$ofcPhnCon',fax='$txtFaxCon',mobile_phone='$txtMobilePhoneCon',email='$txtEmail',company_website='$txtCompanyWebsite',plateform='$selEcommerceCon',plateform_url='$txtEcomUrlCon',latitude='$txtLatitude',longitude='$txtLongitude',geo_url='$txtUrl',country_lati='$txtCountrylati',country_longi='$txtCountrylongi',province_lati='$txtProvinceLati',province_longi='$txtProvincelongi' where id='".$sess_data_id."'";
				}	
				else{

					$sql = "insert into  tbl_user_data(id,user_id,company_name,company_logo,company_slogan,company_intro,offc_type,legal_represent_title,legal_represent_surname,legal_represent_name,focus_person_title,focus_person_surname,focus_person_name,position,department,company_addr_country,company_addr_province,company_addr_city,company_addr_postcode,company_addr_street,offc_phone,fax,mobile_phone,email,company_website,plateform,plateform_url,latitude,longitude,geo_url,country_lati,country_longi,province_lati,province_longi) values ($sess_data_id,'".$_SESSION['user_id']."','$name','$upload_file','$txtSlogan','$companyDetails','$ofcType','$txtLegalTitle','$txtLegalSurname','$txtLegalName','$txtFocalPersonTitle','$txtFocalPersonSurname','$txtFocalPersonName','$txtPostion','$txtDepartment','$txtCompanyAddrCountry','$txtCompanyAddrProvince','$txtCompanyAddrCity','$txtPostCode','$txtCompanyAddrStreet','$ofcPhnCon','$txtFaxCon','$txtMobilePhoneCon','$txtEmail','$txtCompanyWebsite','$selEcommerceCon','$txtEcomUrlCon','$txtLatitude','$txtLongitude','$txtUrl','$txtCountrylati','$txtCountrylongi','$txtProvinceLati','$txtProvincelongi')";

				}
				
				 if($cn == false)
					connect3db();
					$res = mysql_query($sql);
					
					if($addContacts==1)
			{
			$idBranch = GenerateIds(branch_id, tbl_branch_data);	
			$txtBranchFocalPersonTitle = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtBranchFocalPersonTitle']))),ENT_QUOTES);
			$txtBranchFocalPersonSurname = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtBranchFocalPersonSurname']))),ENT_QUOTES);
			$txtBranchFocalPersonName = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtBranchFocalPersonName']))),ENT_QUOTES);
			$txtBranchPostion = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtBranchPostion']))),ENT_QUOTES);
			$txtBranchDepartment = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtBranchDepartment']))),ENT_QUOTES);
			$txtBranchCompanyAddrCountry = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtBranchCompanyAddrCountry']))),ENT_QUOTES);
			$txtBranchCompanyAddrProvince = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtBranchCompanyAddrProvince']))),ENT_QUOTES);
			$txtBranchCompanyAddrStreet = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtBranchCompanyAddrStreet']))),ENT_QUOTES);
			$txtBranchCompanyAddrCity = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtBranchCompanyAddrCity']))),ENT_QUOTES);
			$txtBranchPostCode = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtBranchPostCode']))),ENT_QUOTES);
			
			if(!empty($_POST['txtBranchOffcPhone']))
			{
				foreach($_POST['txtBranchOffcPhone'] as $ofcBranchPhn)
				{
					$ofcBranchPhnCon .= $ofcBranchPhn.",";
				}
				$ofcBranchPhnCon = left($ofcBranchPhnCon,strlen($ofcBranchPhnCon)-1);
			}
			
			if(!empty($_POST['txtBranchFax']))
			{
				foreach($_POST['txtBranchFax'] as $txtBranchFax)
				{
					$txtBranchFaxCon .= $txtBranchFax.",";
				}
				$txtBranchFaxCon = left($txtBranchFaxCon,strlen($txtBranchFaxCon)-1);
			}
			
			if(!empty($_POST['txtBranchMobilePhone']))
			{
				foreach($_POST['txtBranchMobilePhone'] as $txtBranchMobilePhone)
				{
					$txtBranchMobilePhoneCon .= $txtBranchMobilePhone.",";
				}
				$txtBranchMobilePhoneCon = left($txtBranchMobilePhoneCon,strlen($txtBranchMobilePhoneCon)-1);
			}
			$txtBranchEmail = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtBranchEmail']))),ENT_QUOTES);
			$txtBranchCompanyWebsite = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtBranchCompanyWebsite']))),ENT_QUOTES);
			if(!empty($_POST['selBranchEcommerce']))
			{
				foreach($_POST['selBranchEcommerce'] as $selBranchEcommerce)
				{
					$selBranchEcommerceCon .= $selBranchEcommerce.",";
				}
				$selBranchEcommerceCon  = left($selBranchEcommerceCon ,strlen($selBranchEcommerceCon)-1);
			}
			
			if(!empty($_POST['txtBranchEcomUrl']))
			{
				foreach($_POST['txtBranchEcomUrl'] as $txtBranchEcomUrl)
				{
					$txtBranchEcomUrlCon .= $txtBranchEcomUrl.",";
				}
				$txtBranchEcomUrlCon  = left($txtEcomUrlCon ,strlen($txtBranchEcomUrlCon)-1);
			}
			
			$txtBranchLatitude = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtBranchLatitude']))),ENT_QUOTES);
			$txtBranchLongitude = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtBranchLongitude']))),ENT_QUOTES);
			$txtBranchUrl = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtBranchUrl']))),ENT_QUOTES);	
			$txtBranchcountryLati = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['branchlati']))),ENT_QUOTES);
			$txtBranchcountryLongi = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['branchlongi']))),ENT_QUOTES);
			$txtBranchprovinceLati = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['branchprolati']))),ENT_QUOTES);
			$txtBranchprovinceLongi = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['branchprolongi']))),ENT_QUOTES);
			$sqlB = "insert into  tbl_branch_data(branch_id,data_id,branch_legal_represent_title,branch_legal_represent_surname,branch_legal_represent_name,branch_focus_person_title,branch_focus_person_surname,branch_focus_person_name,branch_position,branch_department,branch_company_addr_country,branch_company_addr_province,branch_company_addr_city,branch_company_addr_postcode,branch_company_addr_street,branch_offc_phone,branch_fax,branch_mobile_phone,branch_email,branch_company_website,branch_plateform,branch_plateform_url,branch_latitude,branch_longitude,branch_geo_url,branch_country_latitude,branch_country_longitude,branch_province_latitude,branch_province_longitude) values ($idBranch,$sess_data_id,'$txtBranchLegalTitle','$txtBranchLegalSurname','$txtBranchLegalName','$txtBranchFocalPersonTitle','$txtBranchFocalPersonSurname','$txtBranchFocalPersonName','$txtBranchPostion','$txtBranchDepartment','$txtBranchCompanyAddrCountry','$txtBranchCompanyAddrProvince','$txtBranchCompanyAddrCity','$txtBranchPostCode','$txtBranchCompanyAddrStreet','$ofcBranchPhnCon','$txtBranchFaxCon','$txtBranchMobilePhoneCon','$txtBranchEmail','$txtBranchCompanyWebsite','$selBranchEcommerceCon','$txtBranchEcomUrlCon','$txtBranchLatitude','$txtBranchLongitude','$txtBranchUrl','$txtBranchcountryLati','$txtBranchcountryLongi','$txtBranchprovinceLati','$txtBranchprovinceLongi')";
				 if($cn == false)
					connect3db();
					$resB = mysql_query($sqlB);
			}
					if($res)
					{
						$_SESSION['data_id'] = $sess_data_id;
						echo "<script>window.location='userdatanext.php';</script>";	
					}
				
			}	
		}
		
}
?>
