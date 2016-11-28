<?php
session_start();
ob_start();
include("../include/globalIncWeb.php");

if(!isset($_SESSION['user_id']) && ($_SESSION['register']!="register"))
{
	echo "<script>window.location='index.php';</script>";

}
if(isset($_POST['submit'])=="Next")
{
	
		$error=0;
		$name = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtName']))),ENT_QUOTES);
		$txtSlogan = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtSlogan']))),ENT_QUOTES);
		$companyDetails = htmlspecialchars($_POST['FCKeditor'],ENT_QUOTES);
		$ofcType = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['rd1']))),ENT_QUOTES);
		$txtLegalTitle = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtLegalTitle']))),ENT_QUOTES);
		$txtLegalSurname = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtLegalSurname']))),ENT_QUOTES);
		$txtLegalName = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtLegalName']))),ENT_QUOTES);
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

		$id = GenerateIds(id,  tbl_user_data);
		$addContacts = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['addContacts']))),ENT_QUOTES);
		$txtCountrylati = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['lati']))),ENT_QUOTES);
		$txtCountrylongi = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['longi']))),ENT_QUOTES);	
		$txtProvinceLati = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['prolati']))),ENT_QUOTES);
		$txtProvincelongi = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['prolongi']))),ENT_QUOTES);	
		
		if($name=="")
		{
			$errorMsg[] = "* Please provide the company name";
			$error = 1;
		}
		else if($_FILES['logo']['size']==0)
		{
			$errorMsg[] = "* Please upload the company logo";
			$error = 1;
		}
		else
		{
			$upload_dir = 'uploads/';
			$upload_file = time().basename($_FILES['logo']['name']);
			$imageinfo = getimagesize($_FILES['logo']['tmp_name']);
			if($imageinfo['mime'] != 'image/gif' && $imageinfo['mime'] != 'image/jpeg' && $imageinfo['mime'] != 'image/png' && isset($imageinfo)) 
			{
				$errorMsg[] = "* Only jpeg,png and gif images allowed";
				$error =  1;
			
			}
			$filename = strtolower($_FILES['logo']['name']);
			$whitelist = array('jpg', 'png', 'gif', 'jpeg'); #example of white list
			$backlist = array('php', 'php3', 'php4', 'phtml','exe'); #example of black list
			if(!in_array(end(explode('.', $filename)), $whitelist))
			{
				$errorMsg[] = "* Only jpeg,png and gif images allowed";
				$error =  1;
				
			}
			
			if(in_array(end(explode('.', $filename)), $backlist))
			{
				$errorMsg[] = "* Only jpeg,png and gif images allowed";
				$error =  1;
			}
			
			if($_FILES['logo']['size']>1000000)
			{
				$errorMsg[] = "* Logo size exceeded. Maximum upload size is 1 Mb";
				$error =  1;
			}
			
		}
		
		if($companyDetails=="")
		{
			$errorMsg[] = "* Please provide  company details";
			$error =  1;
		}
		else if($ofcType=="")
		{
			$errorMsg[] = "* Please select a office type";
			$error =  1;
		}
		else if($txtLegalTitle=="")
		{
			$errorMsg[] = "* Please select title of Legal Representative";
			$error =  1;
		}
		else if($txtLegalSurname=="")
		{
			$errorMsg[] = "* Please provide surname  of Legal Representative";
			$error =  1;
		}
		else if($txtLegalName=="")
		{
			$errorMsg[] = "* Please provide Name of Legal Representative";
			$error =  1;
		}
		else if($txtFocalPersonTitle=="")
		{
			$errorMsg[] = "* Please select title of Focal person";
			$error =  1;
		}
		else if($txtFocalPersonSurname=="")
		{
			$errorMsg[] = "* Please provide surname  of Focal person";
			$error =  1;
		}
		else if($txtFocalPersonName=="")
		{
			$errorMsg[] = "* Please provide Name of Focal person";
			$error =  1;
		}
		else if($txtPostion=="")
		{
			$errorMsg[] = "* Please provide the position of Focal person";
			$error =  1;
		}
	
		else if($txtDepartment=="")
		{
			$errorMsg[] = "* Please provide the department of Focal person";
			$error =  1;
		}
		else if($txtCompanyAddrStreet=="")
		{
			$errorMsg[] = "* Please provide the company address";
			$error =  1;
		}
		else if($txtCompanyAddrCity=="")
		{
			$errorMsg[] = "* Please provide the city";
			$error =  1;
		}
		else if($txtPostCode=="")
		{
			$errorMsg[] = "* Please provide the postcode";
			$error =  1;
		}
		else if($txtCompanyAddrCountry=="")
		{
			$errorMsg[] = "* Please select country";
			$error =  1;
		}
		else if($txtCompanyAddrProvince=="")
		{
			$errorMsg[] = "* Please select province";
			$error =  1;
		}
		
		if($error==0)
		{	
		$mv = move_uploaded_file($_FILES['logo']['tmp_name'],$upload_dir.$upload_file);
			if($mv)
			{
				
				$sql = "insert into  tbl_user_data(id,user_id,company_name,company_logo,company_slogan,company_intro,offc_type,legal_represent_title,legal_represent_surname,legal_represent_name,focus_person_title,focus_person_surname,focus_person_name,position,department,company_addr_country,company_addr_province,company_addr_city,company_addr_postcode,company_addr_street,offc_phone,fax,mobile_phone,email,company_website,plateform,plateform_url,latitude,longitude,geo_url,country_lati,country_longi,province_lati,province_longi) values ($id,'".$_SESSION['user_id']."','$name','$upload_file','$txtSlogan','$companyDetails','$ofcType','$txtLegalTitle','$txtLegalSurname','$txtLegalName','$txtFocalPersonTitle','$txtFocalPersonSurname','$txtFocalPersonName','$txtPostion','$txtDepartment','$txtCompanyAddrCountry','$txtCompanyAddrProvince','$txtCompanyAddrCity','$txtPostCode','$txtCompanyAddrStreet','$ofcPhnCon','$txtFaxCon','$txtMobilePhoneCon','$txtEmail','$txtCompanyWebsite','$selEcommerceCon','$txtEcomUrlCon','$txtLatitude','$txtLongitude','$txtUrl','$txtCountrylati','$txtCountrylongi','$txtProvinceLati','$txtProvincelongi')";
				 if($cn == false)
					connect3db();
					$res = mysql_query($sql);
					
					if($addContacts==1)
			{
			$idBranch = GenerateIds(branch_id, tbl_branch_data);	
			$txtBranchLegalTitle = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtBranchLegalTitle']))),ENT_QUOTES);
			$txtBranchLegalSurname = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtBranchLegalSurname']))),ENT_QUOTES);
			$txtBranchLegalName = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtBranchLegalName']))),ENT_QUOTES);
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
			$sqlB = "insert into  tbl_branch_data(branch_id,data_id,branch_legal_represent_title,branch_legal_represent_surname,branch_legal_represent_name,branch_focus_person_title,branch_focus_person_surname,branch_focus_person_name,branch_position,branch_department,branch_company_addr_country,branch_company_addr_province,branch_company_addr_city,branch_company_addr_postcode,branch_company_addr_street,branch_offc_phone,branch_fax,branch_mobile_phone,branch_email,branch_company_website,branch_plateform,branch_plateform_url,branch_latitude,branch_longitude,branch_geo_url,branch_country_latitude,branch_country_longitude,branch_province_latitude,branch_province_longitude) values ($idBranch,$id,'$txtBranchLegalTitle','$txtBranchLegalSurname','$txtBranchLegalName','$txtBranchFocalPersonTitle','$txtBranchFocalPersonSurname','$txtBranchFocalPersonName','$txtBranchPostion','$txtBranchDepartment','$txtBranchCompanyAddrCountry','$txtBranchCompanyAddrProvince','$txtBranchCompanyAddrCity','$txtBranchPostCode','$txtBranchCompanyAddrStreet','$ofcBranchPhnCon','$txtBranchFaxCon','$txtBranchMobilePhoneCon','$txtBranchEmail','$txtBranchCompanyWebsite','$selBranchEcommerceCon','$txtBranchEcomUrlCon','$txtBranchLatitude','$txtBranchLongitude','$txtBranchUrl','$txtBranchcountryLati','$txtBranchcountryLongi','$txtBranchprovinceLati','$txtBranchprovinceLongi')";
				 if($cn == false)
					connect3db();
					$resB = mysql_query($sqlB);
			}
					if($res)
					{
						$_SESSION['data_id'] = $id;
						echo "<script>window.location='userdatanext.php';</script>";	
					}
				
			}	
		}
		
}
?>
<!DOCTYPE html>
<html lang="en">


<head>
	<meta charset="UTF-8">
	<title>GMS Logistics</title>
	<!-- viewport meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- styles -->
	<!-- helpers -->
	<link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
	<!-- fontawesome css -->
	<link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
	<!-- strock gap icons -->
	<link rel="stylesheet" href="plugins/Stroke-Gap-Icons-Webfont/style.css">
	<!-- revolution slider css -->
	<link rel="stylesheet" href="plugins/revolution/css/settings.css">
	<link rel="stylesheet" href="plugins/revolution/css/layers.css">
	<link rel="stylesheet" href="plugins/revolution/css/navigation.css">
	<!-- flaticon css -->
	<link rel="stylesheet" href="plugins/flaticon/flaticon.css">
	<!-- jQuery ui css -->
	<link href="plugins/jquery-ui-1.11.4/jquery-ui.css" rel="stylesheet">
	<!-- owl carousel css -->
	<link rel="stylesheet" href="plugins/owl.carousel-2/assets/owl.carousel.css">
	<link rel="stylesheet" href="plugins/owl.carousel-2/assets/owl.theme.default.min.css">
	<!-- animate css -->
	<link rel="stylesheet" href="plugins/animate.min.css">
	<!-- fancybox -->
	<link rel="stylesheet" href="plugins/fancyapps-fancyBox/source/jquery.fancybox.css">

<script type="text/javascript" src="js/jquery.min.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/jquery-ui.js" type="text/javascript"></script>
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<!-- master stylesheet -->
	<link rel="stylesheet" href="css/style.css">
	<!-- responsive stylesheet -->
	<link rel="stylesheet" href="css/responsive.css">
	<script type="text/javascript" src="js/userdata.js"></script>
	<link rel="stylesheet" href="css/style-userdata.css" />
	 <style>
   .tooltip1 {
	display:none;
	position:absolute;
	border:1px solid #333;
	background-color:#161616;
	border-radius:5px;
	padding:10px;
	color:#fff;
	font-size:12px Arial;
}  

  .loadingOverlay {
    display:    none;
    position:   fixed;
    z-index:    1000;
    top:        0;
    left:       0;
    height:     100%;
    width:      100%;
    background: rgba( 255, 255, 255, .8 ) 
                url('images/loading2.gif') 
                50% 50%
                no-repeat;
}

    </style>
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
<div class="loadingOverlay" style="display:none"></div>
<div id="dialog" style="display: none"></div>
<!-- Start header -->
<?php include("include/top_user.php"); ?>
<!-- End mainmenu -->

<section class="inner-banner">
	<div class="thm-container">
		<h2>Company database </h2>
		
	
	</div>
</section>


<section class="sec-padding page-title">
	<div class="thm-container">
		<div class="sec-title">
			<h2><span>Company Profile</span></h2>
			
		</div>
	</div>
</section>
<div align="center"><img src="images/1.png"></div><br>
<br>

	<div class="thm-container">
		<div class="row">	
		
        <form id="form1" name="form1" action="" method="post" enctype="multipart/form-data">
                            <div class="fdiv">
                            	  <div class="formtitle">Company Introduction</div>
                                   <?php
								   if(isset($_POST['submit'])=="Next")
									{
									if(!empty($errorMsg))
									{
										?>
									<div class="blockFull" style="color:#F00"><?php foreach($errorMsg as $e){ echo $e."<br/>"; } ?></div>
									<?php } ?>    
							 <?php } ?>	
                                  <div class="blockFull">
                                  	<div class="blockLeft">Company Name <span class="redmi">*</span></div>
                                    <div class="blockRight"><input type="text" class="input" name="txtName"  id="txtName" required onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')"></div>
                                   </div>
                                  <div style="clear:both"></div>
                   
                                	<div class="blockFull">
                                        <div class="blockLeft">Logo of Company <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Logo Format: JPG / PNG / GIF; <br>Size: < 1MB <br> </span></a></div>
                                        <div class="blockRight"><input type="file" class="input" name="logo" required  id="logo" onchange="readURL(this);" accept="image/gif, image/jpeg, image/png">
                                        <textarea id="sad" style="display:none"></textarea>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    
                                    <div class="blockFull">
                                        <div class="blockLeft">Business Slogan <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Suggest to input intensive and attractive slogan of your company  </span></a></div>
                                        <div class="blockRight"><input type="text" class="input" name="txtSlogan"  id="txtSlogan" onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')"></div>
                                    </div>
                                    <div class="clear"></div>
                                    
                                    <div class="blockFull">
                                        <div class="blockLeft">Company Introduction <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Please input company introduction here in the format of text, photo and video    </span></a></div>
                                      <div class="clear"></div>  
                                        <div>
										<?php
											include("fckeditor.php");
											$sBasePath = $_SERVER['PHP_SELF'];
											$sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "_samples" ) ) ;
											$oFCKeditor = new FCKeditor('FCKeditor');
											$oFCKeditor->BasePath   = $sBasePath ;
											$oFCKeditor->Height = '440';
											//$oFCKeditor->Value  = $_POST["FCKeditor"];
											$oFCKeditor->Create() ;
											?> 
                                    </div>
                                    </div>
                                    <div class="clear"></div>
                            </div>
                            <div class="sdiv"> 
                            	<div class="formtitle">Company Contacts</div>
                                <div class="blockFull">
                                  	<div class="blockLeft">Office Type <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Please select office before provide detailed contact information    </span></a></div>
                                    <div class="blockRight">
                                    <input name="rd1" id="rd1" type="radio" value="Headquarter"  required class="radio-custom" /> &nbsp;Headquarter &nbsp;  &nbsp;
										<input name="rd1" id="rd1" type="radio" value="Branch office" required  class="radio-custom" /> &nbsp;Branch office </span>
                                    </div>
                                   </div>
                                  <div style="clear:both"></div>
                                   <div class="blockFull">
                                      <div class="blockLeft">Legal Representative <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />The legal representative shown on Company Registration Certificate     </span></a></div>
                                        <div class="blockRight">
                                      
                                       <select name="txtLegalTitle" id="txtLegalTitle" style="height:30px" required>
                                       <option value="">--</option>
                                       <option value="Dr.">Dr.</option>
                                       <option value="Mr.">Mr.</option>
                                       <option value="Mrs.">Mrs.</option>
                                       
                                       <option value="Miss.">Miss.</option>
                                       <option value="Prof.">Prof.</option>
                                       </select><input type="text"  name="txtLegalSurname" id="txtLegalSurname" required  value="" class="input" placeholder="Surname"  onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" style="width:33%"/>
                                       <input type="text"  name="txtLegalName" id="txtLegalName" required  value="" class="input" placeholder="Name"  onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" style="width:47%"/>
                                        </div>
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                      <div class="blockLeft">Focal Person <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />The person who is in charge of company’s public relations or marketing    </span></a></div>
                                        <div class="blockRight">
                                       <select name="txtFocalPersonTitle" id="txtFocalPersonTitle" style="height:30px" required>
                                       <option value="">--</option>
                                       <option value="Dr.">Dr.</option>
                                       <option value="Mr.">Mr.</option>
                                       <option value="Mrs.">Mrs.</option>
                                       
                                       <option value="Miss.">Miss.</option>
                                       <option value="Prof.">Prof.</option>
                                       <input type="text"  name="txtFocalPersonSurname" id="txtFocalPersonSurname" required  value="" class="input" placeholder="Surname"  onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" style="width:33%"/>
                                       <input type="text"  name="txtFocalPersonName" id="txtFocalPersonName" required  value="" class="input" placeholder="Name"  onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" style="width:47%"/>
                                        </div>
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                      <div class="blockLeft">Position <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />The focal person’s position    </span></a></div>
                                        <div class="blockRight">
                                        <input type="text"  name="txtPostion" id="txtPostion"   value="" class="input" required onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" />
                                        
                                        
                                        </div>
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                      <div class="blockLeft">Department  <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />The focal person’s position    </span></a></div>
                                        <div class="blockRight">
                                        <input type="text"  name="txtDepartment" id="txtDepartment"   value="" class="input" required onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" />
                                        </div>
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                      <div class="blockLeft">Company Address <span class="redmi">*</span> </div>
                                        <div class="blockRight">
                                        <input type="text"  name="txtCompanyAddrStreet" id="txtCompanyAddrStreet"   value="" class="input" required onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" placeholder="Street, District" /><br>
                                        </div>
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                   <div class="blockLeft">&nbsp;</div>
                                   <div class="blockRight">
                                        <input type="text"  name="txtCompanyAddrCity" id="txtCompanyAddrCity"  value="" class="input" onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" style="width:49%" placeholder="City"/>
                                        <input type="text"  name="txtPostCode" id="txtPostCode"  value="" class="input" onKeyUp="this.value=this.value.replace(/[^0-9+-/?+ ]+/g,'')" style="width:49%" placeholder="Postcode"/>
                                        
                                    </div>    
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                   <div class="blockFull">
                                   <div class="blockLeft">&nbsp;</div>
                                   <div class="blockRight">
                                        <select name="txtCompanyAddrCountry" id="txtCompanyAddrCountry" required style="height:30px;">
                                        	<option value="">Select Country</option>
                                            <option value="36">Cambodia</option>
                                            <option value="119">Lao PDR</option>
                                            <option value="150">Myanmar</option>
                                            <option value="217">Thailand</option>
                                            <option value="238">Vietnam</option>
                                        </select>
                                         <select name="txtCompanyAddrProvince" id="txtCompanyAddrProvince" required style="height:30px; font-size:11px; width:59%">
                                         <option value="">Select Province</option>
                                         </select>
                                    </div>    
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                      <div class="blockLeft">Office Phone <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Click “+” to add more     </span></a></div>
                                        <div class="blockRight" id="input_fields_wrap">
                                        <input type="text"  name="txtOffcPhone[]" id="txtOffcPhone" value="" class="input" onKeyUp="this.value=this.value.replace(/[^0-9+-/?+ ]+/g,'')"  required/>
                                        </div>
                                        <div class="blockImg">
                                        <a href="javascript:void(0)"  id='add_field_button'>  <img src="images/plus_add_blue.png"> </a></div>
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                      <div class="blockLeft">Fax <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Click “+” to add more     </span></a></div>
                                        <div class="blockRight"  id="input_fields_wrap_fax">
                                       <input type="text" name="txtFax[]" id="txtFax" value="" class="input" onKeyUp="this.value=this.value.replace(/[^0-9+-/?+ ]+/g,'')"  />
                                        </div>
                                        <div class="blockImg">
                                        <a href="javascript:void(0)"> <img src="images/plus_add_blue.png" id='add_field_button_fax'> </a></div>
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                      <div class="blockLeft">Mobile Phone <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Not compulsory, but suggest to provide and keep updating for better communication    </span></a></div>
                                        <div class="blockRight"  id="input_fields_wrap_mobile">
                                       <input type="text"  name="txtMobilePhone[]" id="txtMobilePhone" value="" class="input" onKeyUp="this.value=this.value.replace(/[^0-9+-/?+ ]+/g,'')" />
                                        </div>
                                        <div class="blockImg">
                                        <a href="javascript:void(0)"> <img src="images/plus_add_blue.png" id='add_field_button_mobile'> </a></div>
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                      <div class="blockLeft">E-mail  <span class="redmi">*</span><a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Please provide the permanent email and / or working email address  of the company used for public relations or marketing    </span></a></div>
                                        <div class="blockRight">
                                      <input type="email" name="txtEmail" id="txtEmail" required  value="" class="input" />
                                        </div>
                                       
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                      <div class="blockLeft">Company Website  <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Not compulsory, but suggest to provide if you have.     </span></a></div>
                                        <div class="blockRight">
                                      <input type="url" name="txtCompanyWebsite" id="txtCompanyWebsite" placeholder="http://"    value="" class="input" />
                                        </div>
                                       
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                      <div class="blockLeft">Social/ecommerce Platform <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Select your company’s social network first and then provide the URL or ID in the box beside      </span></a></div>
                                        <div class="blockRight" id="input_fields_wrap_sel">
                                      <select name="selEcommerce[]" id="selEcommerce" style="height:30px;">
                                      <option value=" ">Select</option>
                                     <option value="Twitter">Twitter </option>
                                       <option value="Facebook">Facebook </option>
                                       <option value="Line">Line </option>
                                       <option value="LinkedIn">LinkedIn </option>
                                       <option value="Amazon">Amazon </option>
                                       <option value="Alibaba">Alibaba </option>
                                       <option value="eBay">eBay</option>
                                       <option value="Other">Other</option>
                                        
                                       </select>
                                        <input type="text"  name="txtEcomUrl[]" id="txtEcomUrl[]"   value="" class="input" style="width:69%" />								<div id="other" style="display:none">
                                        		<input type="text" name="txtOtherPlatform" id="txtOtherPlatform" class="input" style="width:30%">
                                       		 </div>
                                             <script type="text/javascript">
												(function($) {
													$("#selEcommerce").change(function() {
														if($("#selEcommerce").val()=="Other")
														{
															$("#other").slideDown("normal");
														}
														else
														{
															$("#other").slideUp("normal");
														}
													});

												})(jQuery);
										</script>
                                        </div>
                                        <div class="blockImg"><a href="javascript:void(0)"> <img src="images/plus_add_blue.png" id='add_field_button_sel'> </a></div>  
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                      <div class="blockLeft">Google Map</div>
                                        <div class="blockRight">
                                      <input type="radio" name="rd2" id="rd2" class="x" value="Coordinates"> Geographic coordinates
                                            <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" /><strong>1.</strong>Enter the name and area of the organisation in search input box of google map.<br>

<strong>2.</strong> Click on the search icon.This will highlight the location of the organisation on the map<br>

<strong>3.</strong> Right click on the red marker and select "What's here?" option.<br>

<strong>4.</strong>From the pop up menu select the latitude and longitude. </span></a><br>

                                      <input type="radio" name="rd2" id="rd2" class="y" value="Geographic URL"> Geographic URL  <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" /><strong>1.</strong>Enter the name and area of the organisation in search input box of google map.<br>

<strong>2.</strong> Click on the search icon.<br>

<strong>3.</strong>  Click on the share icon. A pop up menu will appear. <br>

<strong>4.</strong> Click on the "Embed Map" option on the top of the pop up.

<strong>5.</strong> A url will appear. Copy this url and place it in this text box. </span></a>
                                      <div style="display:none" id="x1">Latitude <input type="text"  name="txtLatitude" id="txtLatitude"   value="" class="input" style="width:28%" />
                                            
                                            Longitude <input type="text"  name="txtLongitude" id="txtLongitude"   value="" class="input" style="width:28%"  />  </div>
                                             <div style="display:none" id="y1">
                                             <input type="text"  name="txtUrl" id="txtUrl"   value="" class="input" style="width:100%" /></div>
                                             <script type="text/javascript">
												(function($) {
													$(".x").click(function() {
														$("#x1").slideDown("normal");
														$("#y1").slideUp("normal");
													});
													
													$(".y").click(function() {
														$("#y1").slideDown("normal");
														
														$("#x1").slideUp("normal");
														
													});
												})(jQuery);
												</script>
                                        
                                     </div>   
                                   </div>
                                  <div style="clear:both"></div>
                                  <div class="blockFull">
                                  <input type="hidden" name="lati" id="lati">
                <input type="hidden" name="longi" id="longi">
                <input type="hidden" name="prolati" id="prolati">
                <input type="hidden" name="prolongi" id="prolongi">
                                  <hr></div>
                                 
                                  <div class="blockFull">
                                    <input type="checkbox" id="addContacts" name="addContacts" value="1"> Add more branch contacts <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />please add more contacts if you have other branch office / subsidiary corporations in another province or country   </span></a>
                                  </div>
                                  
                                  
                                  
                                  
                              <div id="branch" style="display:none">
                                  <div class="blockFull">
                                      <div class="blockLeft">Legal Representative </div>
                                        <div class="blockRight">
                                      
                                       <select name="txtBranchLegalTitle" id="txtBranchLegalTitle" style="height:30px" >
                                       <option value="">--</option>
                                       <option value="Dr.">Dr.</option>
                                       <option value="Mr.">Mr.</option>
                                       <option value="Mrs.">Mrs.</option>
                                       <option value="Miss.">Miss.</option>
                                       <option value="Prof.">Prof.</option>
                                       </select><input type="text"  name="txtBranchLegalSurname" id="txtBranchLegalSurname"   value="" class="input" placeholder="Surname"  onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" style="width:33%"/>
                                       
                                       <input type="text"  name="txtBranchLegalName" id="txtBranchLegalName"   value="" class="input" placeholder="Name"  onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" style="width:47%"/>
                                        </div>
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                      <div class="blockLeft">Focal Person <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />The person who is in charge of company’s public relations or marketing    </span></a></div>
                                        <div class="blockRight">
                                       <select name="txtBranchFocalPersonTitle" id="txtBranchFocalPersonTitle" style="height:30px" >
                                       <option value="">--</option>
                                       <option value="Dr.">Dr.</option>
                                       <option value="Mr.">Mr.</option>
                                       <option value="Mrs.">Mrs.</option>
                                       <option value="Miss.">Miss.</option>
                                       <option value="Prof.">Prof.</option><input type="text"  name="txtBranchFocalPersonSurname" id="txtBranchFocalPersonSurname"   value="" class="input" placeholder="Surname"  onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" style="width:33%"/>
                                       <input type="text"  name="txtBranchFocalPersonName" id="txtBranchFocalPersonName"   value="" class="input" placeholder="Name"  onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" style="width:47%"/>
                                        </div>
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                      <div class="blockLeft">Position <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />The focal person’s position    </span></a></div>
                                        <div class="blockRight">
                                        <input type="text"  name="txtBranchPostion" id="txtBranchPostion"   value="" class="input"  onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" />
                                        
                                        
                                        </div>
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                      <div class="blockLeft">Department  <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />The focal person’s position    </span></a></div>
                                        <div class="blockRight">
                                        <input type="text"  name="txtBranchDepartment" id="txtBranchDepartment"   value="" class="input"  onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')"  />
                                        </div>
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                      <div class="blockLeft">Company Address <span class="redmi">*</span> </div>
                                        <div class="blockRight">
                                        <input type="text" name="txtBranchCompanyAddrStreet" id="txtBranchCompanyAddrStreet" class="input"  placeholder="Street, District">                 
                                       
                                         
                                        </div>
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                   <div class="blockFull">
                                   <div class="blockLeft">&nbsp;</div>
                                   <div class="blockRight">
                                        <input type="text"  name="txtBranchCompanyAddrCity" id="txtBranchCompanyAddrCity"  value="" class="input" onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" style="width:49%" placeholder="City"/>
                                        <input type="text"  name="txtBranchPostCode" id="txtBranchPostCode"  value="" class="input" onKeyUp="this.value=this.value.replace(/[^0-9+-/?+ ]+/g,'')" style="width:49%" placeholder="Postcode"/>
                                    
                                    </div>    
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                      <div class="blockLeft">&nbsp;</div>
                                        <div class="blockRight">
                                      
                                        <select name="txtBranchCompanyAddrCountry" id="txtBranchCompanyAddrCountry"  style="height:30px;">										<option value="">Select Country</option>
                                            <option value="36">Cambodia</option>
                                            <option value="119">Lao PDR</option>
                                            <option value="150">Myanmar</option>
                                            <option value="217">Thailand</option>
                                            <option value="238">Vietnam</option>
                                        </select>
                                         <select name="txtBranchCompanyAddrProvince" id="txtBranchCompanyAddrProvince"  style="height:30px; font-size:11px; width:59%">
                                         <option value="">Select Province</option>
                                         </select>
                                         
                                        </div>
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  
                                  <div class="blockFull">
                                      <div class="blockLeft">Office Phone <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Click “+” to add more     </span></a></div>
                                        <div class="blockRight" id="input_fields_wrapBranch">
                                        <input type="text"  name="txtBranchOffcPhone[]" id="txtBranchOffcPhone" value="" class="input" onKeyUp="this.value=this.value.replace(/[^0-9+-/?+ ]+/g,'')"  />
                                        </div>
                                        <div class="blockImg">
                                        <a href="javascript:void(0)"> <img src="images/plus_add_blue.png" id='add_field_buttonBranch'> </a></div>
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                      <div class="blockLeft">Fax <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Click “+” to add more     </span></a></div>
                                        <div class="blockRight"  id="input_fields_wrap_faxBranch">
                                       <input type="text" name="txtBranchFax[]" id="txtBranchFax" value="" class="input" onKeyUp="this.value=this.value.replace(/[^0-9+-/?+ ]+/g,'')"  />
                                        </div>
                                        <div class="blockImg">
                                        <a href="javascript:void(0)"> <img src="images/plus_add_blue.png" id='add_field_button_faxBranch'> </a></div>
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                      <div class="blockLeft">Mobile Phone <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Not compulsory, but suggest to provide and keep updating for better communication    </span></a></div>
                                        <div class="blockRight"  id="input_fields_wrap_mobileBranch">
                                       <input type="text"  name="txtBranchMobilePhone[]" id="txtBranchMobilePhone" value="" class="input" onKeyUp="this.value=this.value.replace(/[^0-9+-/?+ ]+/g,'')" />
                                        </div>
                                        <div class="blockImg">
                                        <a href="javascript:void(0)"> <img src="images/plus_add_blue.png" id='add_field_button_mobileBranch'> </a></div>
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                      <div class="blockLeft">E-mail  <span class="redmi">*</span><a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Please provide the permanent email and / or working email address  of the company used for public relations or marketing    </span></a></div>
                                        <div class="blockRight">
                                      <input type="email" name="txtBranchEmail" id="txtBranchEmail"    value="" class="input" />
                                        </div>
                                       
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                      <div class="blockLeft">Company Website  <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Not compulsory, but suggest to provide if you have.     </span></a></div>
                                        <div class="blockRight">
                                      <input type="url" name="txtBranchCompanyWebsite" id="txtBranchCompanyWebsite" placeholder="http://"    value="" class="input" />
                                        </div>
                                       
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                      <div class="blockLeft">Social/ecommerce Platform <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Select your company’s social network first and then provide the URL or ID in the box beside      </span></a></div>
                                        <div class="blockRight" id="input_fields_wrap_selBranch">
                                      <select name="selBranchEcommerce[]" id="selBranchEcommerce" style="height:30px;">
                                      <option value="">Select</option>
                                       <option value="Twitter">Twitter </option>
                                       <option value="Facebook">Facebook </option>
                                       <option value="Line">Line </option>
                                       <option value="LinkedIn">LinkedIn </option>
                                       <option value="Amazon">Amazon </option>
                                       <option value="Alibaba">Alibaba </option>
                                       <option value="eBay">eBay</option>
                                       <option value="Other">Other</option>
                                       </select>
                                        <input type="text"  name="txtBranchEcomUrl[]" id="txtBranchEcomUrl[]"   value="" class="input" style="width:69%" /><div id="otherBranch" style="display:none">
                                        		<input type="text" name="txtBranchOtherPlatform" id="txtBranchOtherPlatform" class="input" style="width:30%">
                                       		 </div>
                                             <script type="text/javascript">
												(function($) {
													$("#selBranchEcommerce").change(function() {
														if($("#selBranchEcommerce").val()=="Other")
														{
															$("#otherBranch").slideDown("normal");
														}
														else
														{
															$("#selBranchEcommerce").slideDown("normal");
														}
													});

												})(jQuery);
										</script>
                                        </div>
                                        <div class="blockImg"><a href="javascript:void(0)"><img src="images/plus_add_blue.png" id='add_field_button_selBranch'> </a></div>  
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                      <div class="blockLeft">Google Map </div>
                                        <div class="blockRight">
                                      <input type="radio" name="rd2Branch" id="rd2Branch" class="xBranch" value="Coordinates"> Geographic coordinates
                                     <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" /><strong>1.</strong>Enter the name and area of the organisation in search input box of google map.<br>

<strong>2.</strong> Click on the search icon.This will highlight the location of the organisation on the map<br>

<strong>3.</strong> Right click on the red marker and select "What's here?" option.<br>

<strong>4.</strong>From the pop up menu select the latitude and longitude. </span></a>
<br>

                                      <input type="radio" name="rd2Branch" id="rd2Branch" class="yBranch" value="Geographic URL"> Geographic URL
                                      <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" /><strong>1.</strong>Enter the name and area of the organisation in search input box of google map.<br>

<strong>2.</strong> Click on the search icon.<br>

<strong>3.</strong>  Click on the share icon. A pop up menu will appear. <br>

<strong>4.</strong> Click on the "Embed Map" option on the top of the pop up.

<strong>5.</strong> A url will appear. Copy this url and place it in this text box. </span></a>
                                      <div style="display:none" id="x1Branch">Latitude <input type="text"  name="txtBranchLatitude" id="txtBranchLatitude"   value="" class="input" style="width:28%" />
                                            
                                            Longitude <input type="text"  name="txtBranchLongitude" id="txtBranchLongitude"   value="" class="input" style="width:28%"  />  </div>
                                             <div style="display:none" id="y1Branch">
                                             <input type="text"  name="txtBranchUrl" id="txtBranchUrl"   value="" class="input" style="width:100%" /></div>
                                             <script type="text/javascript">
												(function($) {
													$(".xBranch").click(function() {
														$("#x1Branch").slideDown("normal");
														$("#y1Branch").slideUp("normal");
													});
													
													$(".yBranch").click(function() {
														$("#y1Branch").slideDown("normal");
														
														$("#x1Branch").slideUp("normal");
														
													});
												})(jQuery);
											 </script>
                                        
                                     </div>   
                                   </div>
                                    <script type="text/javascript">
												(function($) {
													$("#addContacts").click(function() {
														if($("#branch").is(':hidden'))
														{
															$("#branch").slideDown("normal");
														}
														else
														{
															$("#branch").slideUp("normal");
														}
													});

												})(jQuery);
												</script>
                                  <div style="clear:both"></div>
                                  <input type="hidden" name="branchlati" id="branchlati">
                <input type="hidden" name="branchlongi" id="branchlongi">
                <input type="hidden" name="branchprolati" id="branchprolati">
                <input type="hidden" name="branchprolongi" id="branchprolongi">
                                  </div>
                                  
  
                                
                            </div>
                            <div class="booking-complete" align="center">
                             <button class="thm-btn" type="button" name="btnSubmit" id="btnSubmit"  style="float:left; margin-left:10PX;"  title="Click this button to preview and edit the form if required">Preview</button>
                             
								<button class="thm-btn" name="submit" type="reset"  style="float:left; margin-left:10PX;" title="Click this button to reset all the values of the form">Reset</button>
							<button class="thm-btn" name="submit" id="submit" type="submit" onClick="return xx()" style="float:left; margin-left:10PX;" value="Next"   title="Click this button to submit this page and go to the next">Next</button>
                               
                              
                               
							</div>
				<div class="clear"></div>
                
			</div>
            </form>
        
        
		</div>
	</div>

<br>
<br>
<br>
<br>

<section class="footer-top">
	<div class="thm-container">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-6">
					<h3>Logistic and cargo</h3>
					<p>Contact us now to get quote for all your global <br>shipping and cargo need.</p>
				</div>
				<div class="col-md-6">
					<a class="thm-btn" href="contact.html">Contact Us <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
		</div>
	</div>
</section>


<?php include("include/footer.php"); ?>


<!-- jQuery js -->
<script src="plugins/jquery/jquery-1.11.3.min.js"></script>
<!-- bootstrap js -->
<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- jQuery ui js -->
<script src="plugins/jquery-ui-1.11.4/jquery-ui.js"></script>
<!-- owl carousel js -->
<script src="plugins/owl.carousel-2/owl.carousel.min.js"></script>
<!-- jQuery appear -->
<script src="plugins/jquery-appear/jquery.appear.js"></script>
<!-- jQuery countTo -->
<script src="plugins/jquery-countTo/jquery.countTo.js"></script>
<!-- jQuery validation -->
<script src="plugins/jquery-validation/dist/jquery.validate.min.js"></script>
<!-- gmap.js helper -->
<script src="http://maps.google.com/maps/api/js"></script>
<!-- gmap.js -->
<script src="plugins/gmap.js"></script>
<!-- mixit up -->
<script src="plugins/jquery.mixitup.min.js"></script>

<!-- revolution slider js -->
<script src="plugins/revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="plugins/revolution/js/jquery.themepunch.revolution.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.migration.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.video.min.js"></script>

<!-- fancy box -->
<script src="plugins/fancyapps-fancyBox/source/jquery.fancybox.pack.js"></script>
<!-- type script -->
<script src="plugins/typed.js-master/dist/typed.min.js"></script>

<!-- theme custom js  -->
<script src="js/main.js"></script>


<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script src="js/scripts.js"></script> 
    <script src="js/scripts_province.js"></script> 
    <script src="js/scripts_branchprovince.js"></script> 
    <script src="js/scripts_branchcountry.js"></script> 
</body>


</html>