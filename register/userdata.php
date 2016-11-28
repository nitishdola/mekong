<?php
session_start();
ob_start();
include("../include/globalIncWeb.php");

if(!isset($_SESSION['user_id']) && ($_SESSION['register']!="register"))
{
	echo "<script>window.location='index.php';</script>";

}
$dataList = getUserdata($_SESSION['user_id'],1);
$branchDataList = getUserBranchdata($dataList[0][0],1);
//echo $dataList[0][16]."======================";
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

	<!--summernote-->
	<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
	<!--/summernote-->

	<!-- font awesome-->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css">
	<!--/font awesome-->

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
	.form-horizontal label{
		
		font-size: 12px  !important; 
		font-weight:normal !important;
		text-align:left !important;
		
	}
	.modal-lg {
    width: 80%; /* respsonsive width */
}
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
.nopadding {
   padding: 0 !important;
   margin: 0 !important;
}
    </style>
    <link rel="stylesheet" href="css/form.css">


<script type="text/javascript">
 //$.noConflict();
$(document).ready(function()
{
	
	var dataString = "id=<?php echo $dataList[0][15];?>&sname=<?php echo $dataList[0][16];?>";
	$.ajax
	({
	type: "POST",
	url: "state_list_edit.php",
	data: dataString,
	cache: false,
	success: function(html)
	{
		$("#txtCompanyAddrProvince").html(html);
	}
	});
		
});
</script>
<style>
input[type='text'] {
	font-size:12px !important;
}
input[type='file'] {
	font-size:12px !important;
}
select{
	font-size:12px !important;
}
textarea{
	font-size:12px !important;
}
.form-control{
	font-size:12px !important;
	
}
.redmi1{
	font-size: 12px;
	color: #ff0000;
}

</style>
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
		 <div class="col-md-4"></div><div class="col-md-4" id="timer"></div><div class="col-md-4"></div>
<br/><br/>

    		<form class="form-horizontal row-border" id="form1" name="form1" action="" method="post" enctype="multipart/form-data">
                <div class="col-md-6">
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
				 		<div style="margin-top:4%"></div>
                       	<div class="form-group">
						    <label class="control-label col-md-3"> <strong>Company Name</strong> <span class="redmi">*</span></label>
						    <div class="col-md-7">
						    	<input type="text" name="txtName" id="txtName"required onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" class="form-control" value="<?php echo htmlspecialchars_decode(html_entity_decode($dataList[0][2]));?>">
						    </div>
						</div>

						<div class="form-group">
						    <label class="control-label col-md-3"> <strong>Logo of Company</strong> <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Logo Format: JPG / PNG / GIF; <br>Size: < 1MB; Pixel : 314*235 < logo 1024*768<<br> </span></a></label>
						    <div class="col-md-7">
						    	<input type="file" class="input" name="logo" required  id="logo" onchange="readURL(this);" accept="image/gif, image/jpeg, image/png">
                            	<textarea id="sad" style="display:none"></textarea>

						    </div>
						</div>

						<div class="form-group">
						    <label class="control-label col-md-3"> <strong>Business Slogan</strong> <span class="redmi">*</span></label>
						    <div class="col-md-7">
						    	<input type="text" class="form-control" name="txtSlogan"  id="txtSlogan" onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" value="<?php echo html_entity_decode(htmlspecialchars_decode($dataList[0][4]));?>">
						    </div>
						</div>

						<div class="form-group">
                        	<label class="control-label col-md-4"> <strong>Company Introduction</strong> <span class="redmi">*</span><a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Please input company introduction here in the format of text, photo and video. 

<br>
The introduction could include following information: 
<br>
•	History
<br>
•	Scope of business areas and geographic coverage 
<br>
•	Highlights: e.g. list down your unique services, cooperation partners, and outstanding achievements etc.
  </span></a></label>
                        	<div class="col-md-11">
                        		 <textarea name="FCKeditor" id="FCKeditor"><?php echo htmlspecialchars_decode(html_entity_decode($dataList[0][5]));?></textarea>
							</div>
                        </div>
                	</div>
                    <div class="col-md-6"> 
                        <div class="formtitle">Company Contacts</div>
                        <div style="margin-top:4%"></div>
                        <div class="form-group">
                        	<label class="control-label col-md-3"> <strong>Office Type</strong><span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Please select office before provide detailed contact information    </span></a></label>
                            <div class="col-md-7">
                            	<label class="radio-inline" for="radios-0">
                            		<input name="rd1" class="of_rad1" id="rd1" type="radio" value=" Headquarter" checked="checked" <?php if($dataList[0][6]=="Headquarter") echo "checked";?>  required /> Headquarter
                            	</label>
                            	<label class="radio-inline" for="radios-0">
									<input name="rd1" class="of_rad1" id="rd1" type="radio" value="Branch office" required <?php if($dataList[0][6]=="Branch office") echo "checked";?>/> Branch office
								</label>
                            </div>
                        </div>

                       

						<div class="form-group">
						    <label class="control-label col-md-3"> <strong>Focal Person</strong> <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />The person who is in charge of company’s public relations or marketing    </span></a></label>
						    <div class="col-md-2">
						    	<select class="form-control" name="txtFocalPersonTitle" id="txtFocalPersonTitle" required>
                                   <option value="">--</option>
                                       <option value="Dr." <?php if($dataList[0][10]=="Dr.") echo "selected";?>>Dr.</option>
                                       <option value="Mr." <?php if($dataList[0][10]=="Mr.") echo "selected";?>>Mr.</option>
                                       <option value="Mrs." <?php if($dataList[0][10]=="Mrs.") echo "selected";?>>Mrs.</option>
                                       
                                       <option value="Miss." <?php if($dataList[0][10]=="Miss.") echo "selected";?>>Miss.</option>
                                       <option value="Prof." <?php if($dataList[0][10]=="Prof.") echo "selected";?>>Prof.</option>
                               	</select>
						    </div>
						</div>

						<div class="form-group">
						    <label class="control-label col-md-3">&nbsp;</label>
						    <div class="col-md-7">
						    	<input type="text"  name="txtFocalPersonSurname" id="txtFocalPersonSurname" required value="<?php echo $dataList[0][11];?>" class="form-control" placeholder="Surname"  onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')"/>
						    </div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3">&nbsp;</label>
						    <div class="col-md-7">
						    	<input type="text"  name="txtFocalPersonName" id="txtFocalPersonName" required  value="<?php echo $dataList[0][12];?>" class="form-control" placeholder="Name"  onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" />
						    </div>
						</div>

						<div class="form-group">
						    <label class="control-label col-md-3"> <strong>Position</strong> <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />The focal person’s position    </span></a></label>
						    <div class="col-md-7">
						    	<input type="text" class="form-control" name="txtPostion"  id="txtPostion" onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" placeholder="The focal person’s position" value="<?php echo $dataList[0][13];?>">
						    </div>
						</div>
                        
                        <div class="form-group">
						    <label class="control-label col-md-3"> <strong>Department</strong> <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />What department is the focal person working in?   </span></a></label>
						    <div class="col-md-7">
						    	<input type="text" class="form-control" name="txtDepartment"  id="txtDepartment" onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" placeholder="The Department Name" value="<?php echo htmlspecialchars_decode(html_entity_decode($dataList[0][14]));?>">
						    </div>
						</div>

						<div class="form-group">
						    <label class="control-label col-md-3"> <strong>Company Address</strong>  <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Company Address    </span></a></label>
						    <div class="col-md-7">
						    	<input type="text" class="form-control" name="txtCompanyAddrStreet" id="txtCompanyAddrStreet"  onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" placeholder="Street, District" value="<?php echo htmlspecialchars_decode(html_entity_decode($dataList[0][17]));?>">
						    </div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">&nbsp;</label>
						    <div class="col-md-7">
						    	<input type="text" class="form-control" name="txtCompanyAddrCity" id="txtCompanyAddrCity"  onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" placeholder="City"  value="<?php echo htmlspecialchars_decode(html_entity_decode($dataList[0][59]));?>">
						 	</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">&nbsp;</label>
						    <div class="col-md-7">
						    	<input type="text" class="form-control" name="txtPostCode" id="txtPostCode"  onKeyUp="this.value=this.value.replace(/[^0-9+-/?+ ]+/g,'')" placeholder="Postal Code" value="<?php echo $dataList[0][60];?>">
						    </div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3">&nbsp;</label>
						    <div class="col-md-7">
						    	<select  name="txtCompanyAddrCountry" id="txtCompanyAddrCountry" class="form-control" required>
                                	<option value="">Select Country</option>
                                            <option value="36" <?php if($dataList[0][15]=="36")  echo "selected";?>>Cambodia</option>
                                            <option value="119" <?php if($dataList[0][15]=="119")  echo "selected";?>>Lao PDR</option>
                                            <option value="150" <?php if($dataList[0][15]=="150")  echo "selected";?>>Myanmar</option>
                                            <option value="217" <?php if($dataList[0][15]=="217")  echo "selected";?>>Thailand</option>
                                            <option value="238" <?php if($dataList[0][15]=="238")  echo "selected";?>>Vietnam</option>
                                </select>
						    </div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-md-3">&nbsp;</label>    
						    <div class="col-md-7">
						    	<select  name="txtCompanyAddrProvince" id="txtCompanyAddrProvince" class="form-control" required>
                                	<option value="">Select Province</option>
                                </select>
						    </div>
						</div>

						<div class="form-group">
						    <label class="control-label col-md-3"> <strong>Office Phone</strong> <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Click “+” to add more     </span></a></label>
						    <div class="col-md-6" id="input_fields_wrap">
						    	<input type="text" class="form-control" name="txtOffcPhone[]" id="txtOffcPhone" onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" placeholder="Office phone no">
						    </div>
						    <div class="col-md-1">
						    	<a href="javascript:void(0)"  id='add_field_button'>  <i class="fa fa-plus-square fa-2x" aria-hidden="true"></i> </a>
						    </div>
						</div>

						<div class="form-group">
						    <label class="control-label col-md-3"> <strong>Fax </strong><a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Click “+” to add more     </span></a></label>
						    <div class="col-md-6" id="input_fields_wrap_fax">
						    	<input type="text" class="form-control" name="txtFax[]" id="txtFax" onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" placeholder="Fax no">
						    </div>
						    <div class="col-md-1">
						    	<a href="javascript:void(0)"  id='add_field_button_fax'>  <i class="fa fa-plus-square fa-2x" aria-hidden="true"></i> </a>
						    </div>
						</div>

						<div class="form-group">
						    <label class="control-label col-md-3"> <strong>Mobile Phone</strong> <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Important! Focal person’s contact</span></a></label>
						    <div class="col-md-6" id="input_fields_wrap_mobile">
						    	<input type="text" class="form-control" name="txtMobilePhone[]" id="txtMobilePhone" onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" placeholder="Mobile no" required>
						    </div>
						    <div class="col-md-1">
						    	<a href="javascript:void(0)"  id='add_field_button_mobile'>  <i class="fa fa-plus-square fa-2x" aria-hidden="true"></i> </a>
						    </div>
						</div>

						<div class="form-group">
						    <label class="control-label col-md-3"> <strong>E-mail</strong>  <span class="redmi">*</span><a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Please provide the permanent email and / or working email address  of the company used for public relations or marketing<br>
Use comma ‘,’ to add more email address    </span></a></label>
						    <div class="col-md-7">
						    	<input type="text" class="form-control" name="txtEmail" id="txtEmail" required placeholder="Valid Email ID">
						    </div>
						</div>

						<div class="form-group">
						    <label class="control-label col-md-3"> <strong>Company Website</strong> <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />If your company has no website, please fill ‘N/A’ in the field to complete the registration procedure. </span></a></label>
						    <div class="col-md-7">
						    	<input type="text" class="form-control" name="txtCompanyWebsite" id="txtCompanyWebsite" placeholder="Company Website(if any)" required>
						    </div>
						</div>
						<!--begin social field-->
						<div id="social_plugings">
							<div class="form-group">
							    <label class="control-label col-md-3"> <strong>Social/ecom Platform</strong> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />if you have no company website, please do provide information of this field. 

Select your company’s social network / e-commerce platform first and then provide URL or ID in the box beside
      </span></a></label>
							    <div class="col-md-2">
							    	<select class="form-control" name="selEcommerce[]" id="selEcommerce">
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
							    </div>

							    <div class="col-md-3"  id="">
							    	<input type="text" class="form-control" name="txtEcomUrl[]" id="txtEcomUrl" placeholder="">
							    </div>

							    <div class="col-md-3" id="other" style="display:none">
	                        		<input type="text" class="form-control" name="txtOtherPlatform" id="txtOtherPlatform">
	                       		</div>

	                       		<div class="col-md-1">
	                       			<a href="javascript:void(0)" id="add_field_button_sel"> <i class="fa fa-plus-square fa-2x" aria-hidden="true"></i>  </a>
	                       		</div>  
	                       		<script type="text/javascript">
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
								</script>
							</div>
						</div>
						<!--/social-->
						<div class="form-group">
                        	<label class="control-label col-md-3"> <strong>Google Map</strong></label>
                            <div class="col-md-4">
                            		<label><input type="radio" name="rd2" id="geo_cord" class="x" value="Coordinates"> Geo. coordinates</label>
                            		<a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" /><strong>1.</strong>Enter the name and area of the organisation in search input box of google map.<br>

									<strong>2.</strong> Click on the search icon.This will highlight the location of the organisation on the map<br>

									<strong>3.</strong> Right click on the red marker and select "What's here?" option.<br>

									<strong>4.</strong>From the pop up menu select the latitude and longitude. </span></a><br>
                                    <div id="x1" style="display:none;" class="form-group">
                                        <div class="col-md-12">
                                            <label>Latitude <input type="text"  name="txtLatitude" id="txtLatitude" class="form-control"   value="" class="input" /></label>
                                        </div>  
           
                                        <div class="col-md-12">       
                                        <label>Longitude <input type="text"  name="txtLongitude" id="txtLongitude"   value="" class="form-control" /></label>
                                        </div>
                                    </div>
                                    
                             </div>
                              <div class="col-md-4">
									<label><input type="radio" name="rd2" id="geo_url" class="y" value="Geographic URL"> Geo. URL </label>
									<a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" /><strong>1.</strong>Enter the name and area of the organisation in search input box of google map.<br>

									<strong>2.</strong> Click on the search icon.<br>

									<strong>3.</strong>  Click on the share icon. A pop up menu will appear. <br>

									<strong>4.</strong> Click on the "Embed Map" option on the top of the pop up.

									<strong>5.</strong> A url will appear. Copy this url and place it in this text box. </span></a>
                               </div>
                            </div>

                       <div id="y1" style="display:none;">
                       		<div class="form-group">
	                        	<label class="control-label col-md-3"></label> 
	                        	<div class="col-md-7"> 
                            	<input type="text"  name="txtUrl" id="txtUrl" class="form-control" />
                            	</div>
                            </div>
                        </div>
                        <script type="text/javascript">
							$(".x").click(function() {
								$("#x1").slideDown("normal");
								$("#y1").slideUp("normal");
							});
							
							$(".y").click(function() {
								$("#y1").slideDown("normal");
								
								$("#x1").slideUp("normal");
								
							});
						</script>
                               
                                  <div class="blockFull">
                                  <input type="hidden" name="lati" id="lati">
                <input type="hidden" name="longi" id="longi">
                <input type="hidden" name="prolati" id="prolati">
                <input type="hidden" name="prolongi" id="prolongi">
                                  <hr></div>

                     <div class="form-group">
	                    <div class="col-md-1">  <input type="checkbox" id="addContacts" name="addContacts" value="1">
	                    </div>
	                      <div class="col-md-9"> 
                          <label> <strong>Add more branch contacts</strong></label> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />please add more contacts if you have other branch office / subsidiary corporations in another province or country   </span></a>
                          </div>
                     </div> 
                     
                     <div id="branch" style="display:none">    

						<div class="form-group">
						    <label class="control-label col-md-3"> <strong>Focal Person</strong> <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />The person who is in charge of company’s public relations or marketing    </span></a></label>
						    <div class="col-md-2">
						    	<select class="form-control" name="txtBranchFocalPersonTitle" id="txtBranchFocalPersonTitle">
                                   <option value="">--</option>
                                   <option value="Dr.">Dr.</option>
                                   <option value="Mr.">Mr.</option>
                                   <option value="Mrs.">Mrs.</option>
                                   
                                   <option value="Miss.">Miss.</option>
                                   <option value="Prof.">Prof.</option>
                               	</select>
						    </div>
						</div>

						<div class="form-group">
						    <label class="control-label col-md-3">&nbsp;</label>
						    <div class="col-md-7">
						    	<input type="text"  name="txtBranchFocalPersonSurname" id="txtBranchFocalPersonSurname" value="" class="form-control" placeholder="Surname"  onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')"/>
						    </div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3">&nbsp;</label>
						    <div class="col-md-7">
						    	<input type="text"  name="txtBranchFocalPersonName" id="txtBranchFocalPersonName"  value="" class="form-control" placeholder="Name"  onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" />
						    </div>
						</div>

						<div class="form-group">
						    <label class="control-label col-md-3"> <strong>Position</strong> <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />The focal person’s position    </span></a></label>
						    <div class="col-md-7">
						    	<input type="text" class="form-control" name="txtBranchPostion"  id="txtBranchPostion" onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" placeholder="The focal person’s position">
						    </div>
						</div>
                        
                        <div class="form-group">
						    <label class="control-label col-md-3"> <strong>Department</strong> <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />What department is the focal person working in?    </span></a></label>
						    <div class="col-md-7">
						    	<input type="text" class="form-control" name="txtBranchDepartment"  id="txtBranchDepartment" onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" placeholder="The Department Name">
						    </div>
						</div>

						<div class="form-group">
						    <label class="control-label col-md-3"> <strong>Company Address</strong>  <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Company Address    </span></a></label>
						    <div class="col-md-7">
						    	<input type="text" class="form-control" name="txtBranchCompanyAddrStreet" id="txtBranchCompanyAddrStreet"  onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" placeholder="Street, District">
						    </div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">&nbsp;</label>
						    <div class="col-md-7">
						    	<input type="text" class="form-control" name="txtBranchCompanyAddrCity" id="txtBranchCompanyAddrCity"  onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" placeholder="City">
						 	</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">&nbsp;</label>
						    <div class="col-md-7">
						    	<input type="text" class="form-control" name="txtBranchPostCode" id="txtBranchPostCode"  onKeyUp="this.value=this.value.replace(/[^0-9+-/?+ ]+/g,'')" placeholder="Postal Code">
						    </div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3">&nbsp;</label>
						    <div class="col-md-7">
						    	<select  name="txtBranchCompanyAddrCountry" id="txtBranchCompanyAddrCountry" class="form-control">
                                	<option value="">Select Country</option>
                                    <option value="36">Cambodia</option>
                                    <option value="119">Lao PDR</option>
                                    <option value="150">Myanmar</option>
                                    <option value="217">Thailand</option>
                                    <option value="238">Vietnam</option>
                                </select>
						    </div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-md-3">&nbsp;</label>    
						    <div class="col-md-7">
						    	<select  name="txtBranchCompanyAddrProvince" id="txtBranchCompanyAddrProvince" class="form-control" >
                                	<option value="">Select Province</option>
                                </select>
						    </div>
						</div>

						<div class="form-group">
						    <label class="control-label col-md-3"> <strong>Office Phone</strong> <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Click “+” to add more     </span></a></label>
						    <div class="col-md-6" id="input_fields_wrapBranch">
						    	<input type="text" class="form-control" name="txtBranchOffcPhone[]" id="txtBranchOffcPhone" onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" placeholder="The focal person’s position">
						    </div>
						    <div class="col-md-1">
						    	<a href="javascript:void(0)"  id='add_field_buttonBranch'>  <i class="fa fa-plus-square fa-2x" aria-hidden="true"></i> </a>
						    </div>
						</div>

						<div class="form-group">
						    <label class="control-label col-md-3"> <strong>Fax</strong> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Click “+” to add more     </span></a></label>
						    <div class="col-md-6" id="input_fields_wrap_faxBranch">
						    	<input type="text" class="form-control" name="txtBranchFax[]" id="txtBranchFax" onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" placeholder="The focal person’s position">
						    </div>
						    <div class="col-md-1">
						    	<a href="javascript:void(0)"  id='add_field_button_faxBranch'>  <i class="fa fa-plus-square fa-2x" aria-hidden="true"></i> </a>
						    </div>
						</div>

						<div class="form-group">
						    <label class="control-label col-md-3"> <strong>Mobile Phone</strong> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Important! Focal person’s contact</span></a></label>
						    <div class="col-md-6" id="input_fields_wrap_mobileBranch">
						    	<input type="text" class="form-control" name="txtBranchMobilePhone[]" id="txtBranchMobilePhone" onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" placeholder="The focal person’s mobile no">
						    </div>
						    <div class="col-md-1">
						    	<a href="javascript:void(0)"  id='add_field_button_mobileBranch'>  <i class="fa fa-plus-square fa-2x" aria-hidden="true"></i> </a>
						    </div>
						</div>

						<div class="form-group">
						    <label class="control-label col-md-3"> <strong>E-mail</strong>  <span class="redmi">*</span><a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Please provide the permanent email and / or working email address  of the company used for public relations or marketing.<br>
Use comma ‘,’ to add more email addresses    </span></a></label>
						    <div class="col-md-7">
						    	<input type="text" class="form-control" name="txtBranchEmail" id="txtBranchEmail"  placeholder="Email ID">
						    </div>
						</div>

						<div class="form-group">
						    <label class="control-label col-md-3"> <strong>Company Website</strong> <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />If your company has no website, please fill ‘N/A’ in the field to complete the register procedure.      </span></a></label>
						    <div class="col-md-7">
						    	<input type="text" class="form-control" name="txtBranchCompanyWebsite" id="txtBranchCompanyWebsite" placeholder="Company Website(if any)"
                               >
						    </div>
						</div>
						<!--begin social field-->
						<div id="social_plugings1">
							<div class="form-group">
							    <label class="control-label col-md-3"> <strong>Social/ecom Platform</strong> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />if you have no company website, please do provide information of this field. 

Select your company’s social network / e-commerce platform first and then provide URL or ID in the box beside
     </span></a></label>
							    <div class="col-md-2"  id="input_fields_wrap_selBranch">
							    	<select class="form-control" name="selBranchEcommerce[]" id="selBranchEcommerce">
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
							    </div>

							    <div class="col-md-3"  id="">
							    	<input type="text" class="form-control" name="txtBranchEcomUrl[]" id="txtBranchEcomUrl" placeholder="">
							    </div>

							    <div class="col-md-3" id="otherBranch" style="display:none">
	                        		<input type="text" class="form-control" name="txtBranchOtherPlatform" id="txtBranchOtherPlatform">
	                       		</div>

	                       		<div class="col-md-1">
	                       			<a href="javascript:void(0)" id="add_field_button_selBranch"> <i class="fa fa-plus-square fa-2x" aria-hidden="true"></i>  </a>
	                       		</div>  
	                       		<script type="text/javascript">
									$("#selBranchEcommerce").change(function() {
										if($("#selBranchEcommerce").val()=="Other")
										{
											$("#otherBranch").slideDown("normal");
										}
										else
										{
											$("#txtBranchOtherPlatform").slideUp("normal");
										}
									});
								</script>
							</div>
						</div>
						<!--/social-->
						<div class="form-group">
                        	<label class="control-label col-md-3"> <strong>Google Map</strong></label>
                            <div class="col-md-4">
                            		<label><input type="radio" name="rd2Branch" id="geo_cord" class="xBranch" value="Coordinates"> Geo. coordinates</label>
                            		<a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" /><strong>1.</strong>Enter the name and area of the organisation in search input box of google map.<br>

									<strong>2.</strong> Click on the search icon.This will highlight the location of the organisation on the map<br>

									<strong>3.</strong> Right click on the red marker and select "What's here?" option.<br>

									<strong>4.</strong>From the pop up menu select the latitude and longitude. </span></a><br>
                                    <div id="x1Branch" style="display:none;" class="form-group">
                                        <div class="col-md-12">
                                            <label>Latitude <input type="text"  name="txtBranchLatitude" id="txtBranchLatitude" class="form-control"   value="" /></label>
                                        </div>  
           
                                        <div class="col-md-12">       
                                        <label>Longitude <input type="text"  name="txtBranchLongitude" id="txtBranchLongitude"   value="" class="form-control" /></label>
                                        </div>
                                    </div>
                                    
                             </div>
                              <div class="col-md-4">
									<label><input type="radio" name="rd2Branch" id="geo_url" class="yBranch" value="Geographic URL"> Geo. URL  </label>
									<a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" /><strong>1.</strong>Enter the name and area of the organisation in search input box of google map.<br>

									<strong>2.</strong> Click on the search icon.<br>

									<strong>3.</strong>  Click on the share icon. A pop up menu will appear. <br>

									<strong>4.</strong> Click on the "Embed Map" option on the top of the pop up.

									<strong>5.</strong> A url will appear. Copy this url and place it in this text box. </span></a>
                               </div>
                            </div>

                       <div id="y1Branch" style="display:none;">
                       		<div class="form-group">
	                        	<label class="control-label col-md-3"></label> 
	                        	<div class="col-md-7"> 
                            	<input type="text"  name="txtBranchUrl" id="txtBranchUrl" class="form-control" />
                            	</div>
                            </div>
                        </div>
                        <script type="text/javascript">
							$(".xBranch").click(function() {
								$("#x1Branch").slideDown("normal");
								$("#y1Branch").slideUp("normal");
							});
							
							$(".yBranch").click(function() {
								$("#y1Branch").slideDown("normal");
								
								$("#x1Branch").slideUp("normal");
								
							});
						</script>
                               
                                  <div class="blockFull">
                                  <input type="hidden" name="branchlati" id="branchlati">
                <input type="hidden" name="branchlongi" id="branchlongi">
                <input type="hidden" name="branchprolati" id="branchprolati">
                <input type="hidden" name="branchprolongi" id="branchprolongi">
                                  <hr></div>
                                  <script type="text/javascript">
												(function($) {
													$("#addContacts").click(function() {
														//$('#myModal').modal('hide');
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
					</div>
								
                                
                            </div>
                            <div class="booking-complete" align="center">
                             <button class="thm-btn" type="button" name="btnSubmit" id="previewButton"  style="float:left; margin-left:10PX;" data-toggle="modal" data-target="#myModal"  title="Click this button to preview and edit the form if required">Preview</button>
                             
								<button class="thm-btn" name="submit" type="reset"  style="float:left; margin-left:10PX;" title="Click this button to reset all the values of the form">Reset</button>
							<button class="thm-btn" name="submit" id="submit" type="submit" onClick="return xx()" style="float:left; margin-left:10PX;" value="Next"   title="Click this button to submit this page and go to the next">Next</button>
                               
                              
                               
							</div>
				<div class="clear"></div>
                
			
            </form>
        
        
		</div>
	</div>

<br>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div style="background: #F7BE3D; width: 95%; padding: 5px; color: #000; font-size: 16px;">PREVIEW</div>
      </div>
      <div class="modal-body" id="preview">
        <div align="center"><img src="../images/loading.gif"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Edit</button>
      </div>
    </div>

  </div>
</div>
<!--<section class="footer-top">
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
</section>-->


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
<!-- mixit up -->
<script src="plugins/jquery.mixitup.min.js"></script>
<script src="js/jquery.blockUI.js"></script>
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCO9mP9qiJZTfy3uOhHiKG5k6_c1bchXHA"
    async defer></script>
<script src="js/scripts.js"></script> 
<script src="js/scripts_province.js"></script> 
<script src="js/scripts_branchprovince.js"></script> 
<script src="js/scripts_branchcountry.js"></script> 
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
<script src="js/autosave.js"></script>
</body>


</html>