<?php
session_start();
ob_start();
include("../include/globalIncWeb.php");

if(!isset($_SESSION['user_id']) && ($_SESSION['register']!="register"))
{
	echo "<script>window.location='index.php';</script>";

}
$dataList = getUserdata($_SESSION['user_id'],1);
?>
<?php
$branchDataList = getUserBranchdata($dataList[0][0],1);

 ?>
<?php 
if(isset($_POST['update'])=="Update")
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

		//$id = GenerateIds(id,  tbl_user_data);
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
		if($_FILES['logo']['size']!=0)
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
			if($error==0)
			{
				$mv = move_uploaded_file($_FILES['logo']['tmp_name'],$upload_dir.$upload_file);
			}
		
			
		}
		else
		{
			$upload_file = $dataList[0][3];
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
				
				$sql = "update tbl_user_data set company_name='$name',company_logo='$upload_file',company_slogan='$txtSlogan',company_intro='$companyDetails',offc_type='$ofcType',legal_represent_title='$txtLegalTitle',legal_represent_surname='$txtLegalSurname',legal_represent_name='$txtLegalName',focus_person_title='$txtFocalPersonTitle',focus_person_surname='$txtFocalPersonSurname',focus_person_name='$txtFocalPersonName',position='$txtPostion',department='$txtDepartment',company_addr_country='$txtCompanyAddrCountry',company_addr_province='$txtCompanyAddrProvince',company_addr_city='$txtCompanyAddrCity',company_addr_postcode='$txtPostCode',company_addr_street='$txtCompanyAddrStreet',offc_phone='$ofcPhnCon',fax='$txtFaxCon',mobile_phone='$txtMobilePhoneCon',email='$txtEmail',company_website='$txtCompanyWebsite',plateform='$selEcommerceCon',plateform_url='$txtEcomUrlCon',latitude='$txtLatitude',longitude='$txtLongitude',geo_url='$txtUrl',country_lati='$txtCountrylati',country_longi='$txtCountrylongi',province_lati='$txtProvinceLati',province_longi='$txtProvincelongi',revision_status='2' where id='".$dataList[0][0]."' and user_id='".$_SESSION['user_id']."'";
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
			 $sqlB = "update tbl_branch_data set branch_legal_represent_title='$txtBranchLegalTitle',branch_legal_represent_surname='$txtBranchLegalSurname',branch_legal_represent_name='$txtBranchLegalName',branch_focus_person_title='$txtBranchFocalPersonTitle',branch_focus_person_surname='$txtBranchFocalPersonSurname',branch_focus_person_name='$txtBranchFocalPersonName',branch_position='$txtBranchPostion',branch_department='$txtBranchDepartment',branch_company_addr_country='$txtBranchCompanyAddrCountry',branch_company_addr_province='$txtBranchCompanyAddrProvince',branch_company_addr_city='$txtBranchCompanyAddrCity',branch_company_addr_postcode='$txtBranchPostCode',branch_company_addr_street='$txtBranchCompanyAddrStreet',branch_offc_phone='$ofcBranchPhnCon',branch_fax='$txtBranchFaxCon',branch_mobile_phone='$txtBranchMobilePhoneCon',branch_email='$txtBranchEmail',branch_company_website='$txtBranchCompanyWebsite',branch_plateform='$selBranchEcommerceCon',branch_plateform_url='$txtBranchEcomUrlCon',branch_latitude='$txtBranchLatitude',branch_longitude='$txtBranchLongitude',branch_geo_url='$txtBranchUrl',branch_country_latitude='$txtBranchcountryLati',branch_country_longitude='$txtBranchcountryLongi',branch_province_latitude='$txtBranchprovinceLati',branch_province_longitude='$txtBranchprovinceLongi' where data_id='".$dataList[0][0]."'";
				 if($cn == false)
					connect3db();
					$resB = mysql_query($sqlB);
			}
					if($res)
					{
						$_SESSION['data_id'] = $dataList[0][0];
						$sqlMs = "update notification_messages set status='9' where data_id='".$dataList[0][0]."' and type='admin'";
						if($cn == false)
						connect3db();
						mysql_query($sqlMs );
						
						$dt = date('Y-m-d');
						$msID = GenerateIds("msg_id","notification_messages");
						$sqlIs = "insert into notification_messages(msg_id,user_id,user_email,data_id,date,message_txt,status,type) values ($msID,'".$_SESSION['user_id']."','".$_SESSION['user_name']."','".$_SESSION['data_id']."','$dt','The form has been updated','1','user')";
						if($cn == false)
						connect3db();
						mysql_query($sqlIs );
						
						$rev = intval($dataList[0][66]+1);
						$sqlMR = "update tbl_user_data set revision_received='".$rev."' where id='".$dataList[0][0]."'";
						if($cn == false)
						connect3db();
						mysql_query($sqlMR );
						mysql_close();
						echo "<script>window.location='userdatanext_display.php';</script>";	
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
    <link rel="stylesheet" href="css/form.css" />
<script type="text/javascript">
$(document).ready(function() {
        // Tooltip only Text
        $('.booking-complete-btn').hover(function(){
                // Hover over code
                var title = $(this).attr('title');
                $(this).data('tipText', title).removeAttr('title');
                $('<p class="tooltip1"></p>')
                .text(title)
                .appendTo('body')
                .fadeIn('slow');
        }, function() {
                // Hover out code
                $(this).attr('title', $(this).data('tipText'));
                $('.tooltip1').remove();
        }).mousemove(function(e) {
                var mousex = e.pageX + 20; //Get X coordinates
                var mousey = e.pageY + 10; //Get Y coordinates
                $('.tooltip1')
                .css({ top: mousey, left: mousex })
        });
});
</script>

<script>
 $(document).ready(function() {
 $('#variButton').click(function () {
$("#vari").html("<img src='images/fbloader.gif'>");
  var id=<?php echo $dataList[0][0];?>;

      $.ajax({

            type: 'post',
            url: "varify.php",
            data: {
              //table:'tbl_content',
              id:id,
            },
            success: function(data) {
			   //alert(data);
               	$("#vari").html(data);
			 // document.getElementById('disp_time').innerHTML = data;
            }
        });
   // } 
   // return true;
  });

});

   </script>

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

<script type="text/javascript">
 //$.noConflict();
$(document).ready(function()
{
	
	var dataString = "id=<?php echo $branchDataList[0][10];?>&sname=<?php echo $branchDataList[0][11];?>";
	
	$.ajax
	({
	type: "POST",
	url: "state_list_edit_branch.php",
	data: dataString,
	cache: false,
	success: function(html)
	{
		$("#txtBranchCompanyAddrProvince").html(html);
	}
	});
		
});
</script>


<script src="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/jquery-ui.js" type="text/javascript"></script>
<link href="css/jquery-ui.css" rel="stylesheet" type="text/css" />
  
<link rel="stylesheet" href="css/notification.css" type="text/css">
    
<script>
$(document).ready(function()
{
 $("#submit").click(function () {
	 		window.location='userdatanext_display.php';
			$(".loadingOverlay").show();
 });
});
</script>
<link rel="stylesheet" href="css/notification.css" type="text/css">
</head>
<body>
<div class="loadingOverlay" style="display:none"></div>
<div id="dialog" style="display: none"></div>
<!-- Start header -->
<?php include("include/top_user_notification.php"); ?>
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
		<?php if($dataList[0][71]=="1") { ?> 
                 <div style="background-color:#EDEDDC; padding:4px; font-weight:bold; width:100%">      
				<div style="float:left; font-weight:bold; width:70%; margin-top:6px;">
                <span id="vari">Click on the Authorisation button to authorise publishing of your company data on www.logisticsgms.com  </span>
                </div>
                <div style="float:left; margin-left:5px; margin-top:-25px;"><input type="button" name="variButton" id="variButton" value="Authorise" class="booking-complete-btn"></div>
               
                <div style="clear:both"></div>
                 </div>
                <?php } ?>
        <form id="form1" name="form1" action="" method="post" enctype="multipart/form-data">
                            <div class="fdiv">
                            	  <div class="formtitle">Company Introduction</div>
                                   <?php
								   if(isset($_POST['update'])=="Update")
									{
									if(!empty($errorMsg))
									{
										?>
									<div class="blockFull" style="color:#F00"><?php foreach($errorMsg as $e){ echo $e."<br/>"; } ?></div>
									<?php } ?>    
							 <?php } ?>	
                                  <div class="blockFull">
                                  	<div class="blockLeft">Company Name <span class="redmi">*</span></div>
                                    <div class="blockRight"><input type="text" class="input" name="txtName"  id="txtName" required onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" value="<?php echo htmlspecialchars_decode(html_entity_decode($dataList[0][2]));?>"></div>
                                   </div>
                                  <div style="clear:both"></div>
                   
                                	<div class="blockFull">
                                        <div class="blockLeft">Logo of Company <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Logo Format: JPG / PNG / GIF; <br>Size: < 1MB <br> </span></a></div>
                                        <div class="blockRight">
                                        <img style="max-width:150px;" id="lg" src="uploads/<?php echo $dataList[0][3];?>">
                                        <?php if($dataList[0][63]=="1"){?>
                                        <input type="file" class="input" name="logo"  id="logo" onchange="readURL(this);" accept="image/gif, image/jpeg, image/png">
                                        <textarea id="sad" style="display:none"></textarea>
                                        <?php } ?>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    
                                    <div class="blockFull">
                                        <div class="blockLeft">Business Slogan <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Suggest to input intensive and attractive slogan of your company  </span></a></div>
                                        <div class="blockRight"><input type="text" class="input" name="txtSlogan"  id="txtSlogan" onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" value="<?php echo html_entity_decode(htmlspecialchars_decode($dataList[0][4]));?>"></div>
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
											$oFCKeditor->Value  = htmlspecialchars_decode(html_entity_decode($dataList[0][5]));
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
                                    <input name="rd1" id="rd1" type="radio" <?php if($dataList[0][6]=="Headquarter") echo "checked";?> value="Headquarter"  required class="radio-custom" /> &nbsp;Headquarter &nbsp;  &nbsp;
										<input name="rd1" id="rd1" type="radio" <?php if($dataList[0][6]=="Branch office") echo "checked";?> value="Branch office" required  class="radio-custom" /> &nbsp;Branch office </span>
                                    </div>
                                   </div>
                                  <div style="clear:both"></div>
                                   <div class="blockFull">
                                      <div class="blockLeft">Legal Representative <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />The legal representative shown on Company Registration Certificate     </span></a></div>
                                        <div class="blockRight">
                                      
                                       <select name="txtLegalTitle" id="txtLegalTitle" style="height:30px" required>
                                       <option value="">--</option>
                                       <option value="Dr." <?php if($dataList[0][7]=="Dr.") echo "selected";?>>Dr.</option>
                                       <option value="Mr." <?php if($dataList[0][7]=="Mr.") echo "selected";?>>Mr.</option>
                                       <option value="Mrs." <?php if($dataList[0][7]=="Mrs.") echo "selected";?>>Mrs.</option>
                                       
                                       <option value="Miss." <?php if($dataList[0][7]=="Miss.") echo "selected";?>>Miss.</option>
                                       <option value="Prof." <?php if($dataList[0][7]=="Prof.") echo "selected";?>>Prof.</option>
                                       </select><input type="text"  name="txtLegalSurname" id="txtLegalSurname" required  value="<?php echo $dataList[0][8];?>" class="input" placeholder="Surname"  onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" style="width:33%"/>
                                       <input type="text"  name="txtLegalName" id="txtLegalName" required  value="<?php echo $dataList[0][9];?>" class="input" placeholder="Name"  onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" style="width:47%"/>
                                        </div>
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                      <div class="blockLeft">Focal Person <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />The person who is in charge of company’s public relations or marketing    </span></a></div>
                                        <div class="blockRight">
                                       <select name="txtFocalPersonTitle" id="txtFocalPersonTitle" style="height:30px" required>
                                       <option value="">--</option>
                                       <option value="Dr." <?php if($dataList[0][10]=="Dr.") echo "selected";?>>Dr.</option>
                                       <option value="Mr." <?php if($dataList[0][10]=="Mr.") echo "selected";?>>Mr.</option>
                                       <option value="Mrs." <?php if($dataList[0][10]=="Mrs.") echo "selected";?>>Mrs.</option>
                                       
                                       <option value="Miss." <?php if($dataList[0][10]=="Miss.") echo "selected";?>>Miss.</option>
                                       <option value="Prof." <?php if($dataList[0][10]=="Prof.") echo "selected";?>>Prof.</option>
                                       <input type="text"  name="txtFocalPersonSurname" id="txtFocalPersonSurname" required  value="<?php echo $dataList[0][11];?>" class="input" placeholder="Surname"  onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" style="width:33%"/>
                                       <input type="text"  name="txtFocalPersonName" id="txtFocalPersonName" required  value="<?php echo $dataList[0][12];?>" class="input" placeholder="Name"  onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" style="width:47%"/>
                                        </div>
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                      <div class="blockLeft">Position <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />The focal person’s position    </span></a></div>
                                        <div class="blockRight">
                                        <input type="text"  name="txtPostion" id="txtPostion"   value="<?php echo $dataList[0][13];?>" class="input" required onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" />
                                        
                                        
                                        </div>
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                      <div class="blockLeft">Department  <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />The focal person’s position    </span></a></div>
                                        <div class="blockRight">
                                        <input type="text"  name="txtDepartment" id="txtDepartment"   value="<?php echo htmlspecialchars_decode(html_entity_decode($dataList[0][14]));?>" class="input" required onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" />
                                        </div>
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                      <div class="blockLeft">Company Address <span class="redmi">*</span> </div>
                                        <div class="blockRight">
                                        <input type="text"  name="txtCompanyAddrStreet" id="txtCompanyAddrStreet"   value="<?php echo htmlspecialchars_decode(html_entity_decode($dataList[0][17]));?>" class="input" required onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" placeholder="Street, District" /><br>
                                        </div>
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                   <div class="blockLeft">&nbsp;</div>
                                   <div class="blockRight">
                                        <input type="text"  name="txtCompanyAddrCity" id="txtCompanyAddrCity"  value="<?php echo htmlspecialchars_decode(html_entity_decode($dataList[0][59]));?>" class="input" onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" style="width:49%" placeholder="City"/>
                                        <input type="text"  name="txtPostCode" id="txtPostCode"  value="<?php echo $dataList[0][60];?>" class="input" onKeyUp="this.value=this.value.replace(/[^0-9+-/?+ ]+/g,'')" style="width:49%" placeholder="Postcode"/>
                                        
                                    </div>    
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                   <div class="blockFull">
                                   <div class="blockLeft">&nbsp;</div>
                                   <div class="blockRight">
                                        <select name="txtCompanyAddrCountry" id="txtCompanyAddrCountry" required style="height:30px;">
                                        	<option value="">Select Country</option>
                                            <option value="36" <?php if($dataList[0][15]=="36")  echo "selected";?>>Cambodia</option>
                                            <option value="119" <?php if($dataList[0][15]=="119")  echo "selected";?>>Lao PDR</option>
                                            <option value="150" <?php if($dataList[0][15]=="150")  echo "selected";?>>Myanmar</option>
                                            <option value="217" <?php if($dataList[0][15]=="217")  echo "selected";?>>Thailand</option>
                                            <option value="238" <?php if($dataList[0][15]=="238")  echo "selected";?>>Vietnam</option>
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
                                        <?php
										$offcPhone = $dataList[0][18];
										$ofcPh = explode(",",$offcPhone);
										for($r=0;$r<count($ofcPh);$r++)
										{
											?>
                                        <input type="text"  name="txtOffcPhone[]" id="txtOffcPhone" value="<?php echo $ofcPh[$r];?>" class="input" onKeyUp="this.value=this.value.replace(/[^0-9+-/?+ ]+/g,'')"  required/>
                                        <?php } ?>
                                        </div>
                                        <div class="blockImg" <?php
							if($dataList[0][63]!="1"){?>style="display:none"<?php } ?>>
                                        <a href="javascript:void(0)"> <img src="images/plus_add_blue.png" id='add_field_button'> </a></div>
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                      <div class="blockLeft">Fax <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Click “+” to add more     </span></a></div>
                                        <div class="blockRight"  id="input_fields_wrap_fax">
                                      <?php
										$offcFax = $dataList[0][19];
										$offcFax1 = explode(",",$offcFax);
										for($s=0;$s<count($offcFax1);$s++)
										{
											?>
                                       <input type="text" name="txtFax[]" id="txtFax"  class="input" onKeyUp="this.value=this.value.replace(/[^0-9+-/?+ ]+/g,'')" value="<?php echo $offcFax1[$s];?>" />
                                       <?php } ?>
                                        </div>
                                        <div class="blockImg" <?php
							if($dataList[0][63]!="1"){?>style="display:none"<?php } ?>>
                                        <a href="javascript:void(0)"> <img src="images/plus_add_blue.png" id='add_field_button_fax'> </a></div>
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                      <div class="blockLeft">Mobile Phone <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Not compulsory, but suggest to provide and keep updating for better communication    </span></a></div>
                                        <div class="blockRight"  id="input_fields_wrap_mobile">
                                        <?php
										$offcM = $dataList[0][20];
										$offcM1 = explode(",",$offcM);
										for($s=0;$s<count($offcM);$s++)
										{
											?>
                                       <input type="text"  name="txtMobilePhone[]" id="txtMobilePhone" value="<?php echo $offcM1[$s];?>" class="input" onKeyUp="this.value=this.value.replace(/[^0-9+-/?+ ]+/g,'')" />
                                       <?php } ?>
                                        </div>
                                        <div class="blockImg"  <?php
							if($dataList[0][63]!="1"){?>style="display:none"<?php } ?>>
                                        <a href="javascript:void(0)"> <img src="images/plus_add_blue.png" id='add_field_button_mobile'> </a></div>
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                      <div class="blockLeft">E-mail  <span class="redmi">*</span><a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Please provide the permanent email and / or working email address  of the company used for public relations or marketing    </span></a></div>
                                        <div class="blockRight">
                                      <input type="email" name="txtEmail" id="txtEmail" required    value="<?php echo $dataList[0][21];?>" class="input" />
                                        </div>
                                       
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                      <div class="blockLeft">Company Website  <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Not compulsory, but suggest to provide if you have.     </span></a></div>
                                        <div class="blockRight">
                                      <input type="url" name="txtCompanyWebsite" id="txtCompanyWebsite" placeholder="http://"    value="<?php echo htmlspecialchars_decode(html_entity_decode($dataList[0][22]));?>" class="input" />
                                        </div>
                                       
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                      <div class="blockLeft">Social/ecommerce Platform <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Select your company’s social network first and then provide the URL or ID in the box beside      </span></a></div>
                                        <div class="blockRight" id="input_fields_wrap_sel">
                                        <?php
										$selEcm = explode(",",$dataList[0][23]);
										for($d=0;$d<count($selEcm);$d++)
										{?>
                                      <select name="selEcommerce[]" id="selEcommerce" style="height:30px;">
                                      <option value=" ">Select</option>
                                     <option value="Twitter" <?php if($selEcm[$d]=="Twitter") echo "selected";?>>Twitter </option>
                                <option value="Facebook" <?php if($selEcm[$d]=="Facebook") echo "selected";?>>Facebook </option>
                                <option value="Line" <?php if($selEcm[$d]=="Line") echo "selected";?>>Line </option>
                                <option value="LinkedIn" <?php if($selEcm[$d]=="LinkedIn") echo "selected";?>>LinkedIn </option>
                                       <option value="Amazon" <?php if($selEcm[$d]=="Amazon") echo "selected";?>>Amazon </option>
                                       <option value="Alibaba" <?php if($selEcm[$d]=="Alibaba") echo "selected";?>>Alibaba </option>
                                       <option value="eBay" <?php if($selEcm[$d]=="eBay") echo "selected";?>>eBay</option>
                                       <option value="Other"  <?php if($selEcm[$d]=="Other") echo "selected";?>>Other</option>
                                        
                                       </select>
                                      <?php
                                      $selEcmU = explode(",",$dataList[0][24]);
									  ?>
                                        <input type="text"  name="txtEcomUrl[]" id="txtEcomUrl[]"   value="<?php echo $selEcmU[$d];?>" class="input" style="width:69%" />				
                                        <?php } ?>
                                        				<div id="other" style="display:none">
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
                                        <div class="blockImg" <?php
							if($dataList[0][63]!="1"){?>style="display:none"<?php } ?>><a href="javascript:void(0)"> <img src="images/plus_add_blue.png" id='add_field_button_sel'> </a></div>  
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                      <div class="blockLeft">Google Map</div>
                                        <div class="blockRight">
                                      <input type="radio" name="rd2" id="rd2" class="x" value="Coordinates" <?php if($dataList[0][25]!="") echo "checked";?>> Geographic coordinates
                                            <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" /><strong>1.</strong>Enter the name and area of the organisation in search input box of google map.<br>

<strong>2.</strong> Click on the search icon.This will highlight the location of the organisation on the map<br>

<strong>3.</strong> Right click on the red marker and select "What's here?" option.<br>

<strong>4.</strong>From the pop up menu select the latitude and longitude. </span></a><br>

                                      <input type="radio" name="rd2" id="rd2" class="y" value="Geographic URL" <?php if($dataList[0][27]!="") echo "checked";?>> Geographic URL  <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" /><strong>1.</strong>Enter the name and area of the organisation in search input box of google map.<br>

<strong>2.</strong> Click on the search icon.<br>

<strong>3.</strong>  Click on the share icon. A pop up menu will appear. <br>

<strong>4.</strong> Click on the "Embed Map" option on the top of the pop up.

<strong>5.</strong> A url will appear. Copy this url and place it in this text box. </span></a>
                                      <div <?php if($dataList[0][25]==""){?>style="display:none"<?php } ?> id="x1">Latitude <input type="text"  name="txtLatitude" id="txtLatitude"   value="<?php echo $dataList[0][25];?>" class="input" style="width:28%" />
                                            
                                            Longitude <input type="text"  name="txtLongitude" id="txtLongitude"   value="<?php echo $dataList[0][26];?>" class="input" style="width:28%"  />  </div>
                                             <div <?php if($dataList[0][27]==""){?> style="display:none"<?php } ?> id="y1">
                                             <input type="text"  name="txtUrl" id="txtUrl"   value="<?php echo $dataList[0][27];?>" class="input" style="width:100%" /></div>
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
                                    <input type="checkbox" id="addContacts" name="addContacts" value="1" 
									<?php if(count($branchDataList)>0) echo "checked";?>> Add more branch contacts <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />please add more contacts if you have other branch office / subsidiary corporations in another province or country   </span></a>
                                  </div>
                                  
                                  
                                  
                                  
                              <div id="branch" <?php if(count($branchDataList)==0){?> style="display:none" <?php } ?>>
                                  <div class="blockFull">
                                      <div class="blockLeft">Legal Representative </div>
                                        <div class="blockRight">
                                      
                                       <select name="txtBranchLegalTitle" id="txtBranchLegalTitle" style="height:30px" >
                                       <option value="">--</option>
                                       <option value="Dr." <?php if($branchDataList[0][2]=="Dr.") echo "selected";?>>Dr.</option>
                                       <option value="Mr." <?php if($branchDataList[0][2]=="Mr.") echo "selected";?>>Mr.</option>
                                       <option value="Mrs." <?php if($branchDataList[0][2]=="Mrs.") echo "selected";?>>Mrs.</option>
                                       <option value="Miss." <?php if($branchDataList[0][2]=="Miss.") echo "selected";?> >Miss.</option>
                                       <option value="Prof." <?php if($branchDataList[0][2]=="Prof.") echo "selected";?>>Prof.</option>
                                       </select><input type="text"  name="txtBranchLegalSurname" id="txtBranchLegalSurname"   value="<?php echo $branchDataList[0][3];?> " class="input" placeholder="Surname"  onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" style="width:33%"/>
                                       
                                       <input type="text"  name="txtBranchLegalName" id="txtBranchLegalName"   value="<?php echo $branchDataList[0][4];?>" class="input" placeholder="Name"  onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" style="width:47%"/>
                                        </div>
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                      <div class="blockLeft">Focal Person <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />The person who is in charge of company’s public relations or marketing    </span></a></div>
                                        <div class="blockRight">
                                       <select name="txtBranchFocalPersonTitle" id="txtBranchFocalPersonTitle" style="height:30px" >
                                       <option value="">--</option>
                                        <option value="Dr." <?php if($branchDataList[0][5]=="Dr.") echo "selected";?>>Dr.</option>
                                       <option value="Mr." <?php if($branchDataList[0][5]=="Mr.") echo "selected";?>>Mr.</option>
                                       <option value="Mrs." <?php if($branchDataList[0][5]=="Mrs.") echo "selected";?>>Mrs.</option>
                                       <option value="Miss." <?php if($branchDataList[0][5]=="Miss.") echo "selected";?> >Miss.</option>
                                       <option value="Prof." <?php if($branchDataList[0][5]=="Prof.") echo "selected";?>>Prof.</option><input type="text"  name="txtBranchFocalPersonSurname" id="txtBranchFocalPersonSurname"   value="<?php echo $branchDataList[0][6];?> " class="input" placeholder="Surname"  onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" style="width:33%"/>
                                       <input type="text"  name="txtBranchFocalPersonName" id="txtBranchFocalPersonName"   value="<?php echo $branchDataList[0][7];?> " class="input" placeholder="Name"  onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" style="width:47%"/>
                                        </div>
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                      <div class="blockLeft">Position <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />The focal person’s position    </span></a></div>
                                        <div class="blockRight">
                                        <input type="text"  name="txtBranchPostion" id="txtBranchPostion" value="<?php echo htmlspecialchars_decode(html_entity_decode($branchDataList[0][8]));?>" class="input" onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" />
                                        
                                        
                                        </div>
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                      <div class="blockLeft">Department  <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />The focal person’s position    </span></a></div>
                                        <div class="blockRight">
                                        <input type="text"  name="txtBranchDepartment" id="txtBranchDepartment"   value="<?php echo htmlspecialchars_decode(html_entity_decode($branchDataList[0][9]));?> " class="input" onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" />
                                        </div>
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                      <div class="blockLeft">Company Address <span class="redmi">*</span> </div>
                                        <div class="blockRight">
                                        <input type="text" name="txtBranchCompanyAddrStreet" id="txtBranchCompanyAddrStreet" class="input"  placeholder="Street, District" value="<?php echo htmlspecialchars_decode(html_entity_decode($branchDataList[0][14]));?> ">                 
                                       
                                         
                                        </div>
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                   <div class="blockFull">
                                   <div class="blockLeft">&nbsp;</div>
                                   <div class="blockRight">
                                        <input type="text"  name="txtBranchCompanyAddrCity" id="txtBranchCompanyAddrCity"  value="<?php echo $branchDataList[0][12];?> " class="input" onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" style="width:49%" placeholder="City"/>
                                        <input type="text"  name="txtBranchPostCode" id="txtBranchPostCode"  value="<?php echo $branchDataList[0][13];?> " class="input" onKeyUp="this.value=this.value.replace(/[^0-9+-/?+ ]+/g,'')" style="width:49%" placeholder="Postcode"/>
                                    
                                    </div>    
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                      <div class="blockLeft">&nbsp;</div>
                                        <div class="blockRight">
                                      
                                        <select name="txtBranchCompanyAddrCountry" id="txtBranchCompanyAddrCountry"  style="height:30px;">										<option value="">Select Country</option>
                                            <option value="36" <?php if($branchDataList[0][10]=="36")  echo "selected";?>>Cambodia</option>
                                            <option value="119" <?php if($branchDataList[0][10]=="119")  echo "selected";?>>Lao PDR</option>
                                            <option value="150" <?php if($branchDataList[0][10]=="150")  echo "selected";?>>Myanmar</option>
                                            <option value="217" <?php if($branchDataList[0][10]=="217")  echo "selected";?>>Thailand</option>
                                            <option value="238" <?php if($branchDataList[0][10]=="238")  echo "selected";?>>Vietnam</option>
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
                                        <?php
										$branchoffcphn = explode(",",$branchDataList[0][15]);
										for($s=0;$s<count($branchoffcphn);$s++)
										{
											?>
                                        <input type="text"  name="txtBranchOffcPhone[]" id="txtBranchOffcPhone" value="<?php echo $branchoffcphn[$s];?>" class="input" onKeyUp="this.value=this.value.replace(/[^0-9+-/?+ ]+/g,'')"  />
                                        <?php } ?>
                                        </div>
                                        <div class="blockImg"  <?php
							if($dataList[0][63]!="1"){?>style="display:none"<?php } ?>>
                                        <a href="javascript:void(0)"> <img src="images/plus_add_blue.png" id='add_field_buttonBranch'> </a></div>
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                      <div class="blockLeft">Fax <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Click “+” to add more     </span></a></div>
                                        <div class="blockRight"  id="input_fields_wrap_faxBranch">
                                        <?php
										$branchoffcFax = explode(",",$branchDataList[0][16]);
										for($s=0;$s<count($branchoffcFax);$s++)
										{
											?>
                                       <input type="text" name="txtBranchFax[]" id="txtBranchFax" value="<?php echo $branchoffcFax[$s];?>" class="input" onKeyUp="this.value=this.value.replace(/[^0-9+-/?+ ]+/g,'')"  />
                                       <?php } ?>
                                        </div>
                                        <div class="blockImg"  <?php
							if($dataList[0][63]!="1"){?>style="display:none"<?php } ?>>
                                        <a href="javascript:void(0)"> <img src="images/plus_add_blue.png" id='add_field_button_faxBranch'> </a></div>
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                      <div class="blockLeft">Mobile Phone <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Not compulsory, but suggest to provide and keep updating for better communication    </span></a></div>
                                        <div class="blockRight"  id="input_fields_wrap_mobileBranch">
                                        <?php
										$branchoffcM = explode(",",$branchDataList[0][17]);
										for($k=0;$k<count($branchoffcM);$k++)
										{
										?>
                                       <input type="text"  name="txtBranchMobilePhone[]" id="txtBranchMobilePhone" value="<?php echo $branchoffcM[$k];?>" class="input" onKeyUp="this.value=this.value.replace(/[^0-9+-/?+ ]+/g,'')" />
                                       <?php } ?>
                                        </div>
                                        <div class="blockImg" <?php
							if($dataList[0][63]!="1"){?>style="display:none"<?php } ?>>
                                        <a href="javascript:void(0)"> <img src="images/plus_add_blue.png" id='add_field_button_mobileBranch'> </a></div>
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                      <div class="blockLeft">E-mail  <span class="redmi">*</span><a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Please provide the permanent email and / or working email address  of the company used for public relations or marketing    </span></a></div>
                                        <div class="blockRight">
                                      <input type="email" name="txtBranchEmail" id="txtBranchEmail"    value="<?php echo $branchDataList[0][18];?>" class="input" />
                                        </div>
                                       
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                      <div class="blockLeft">Company Website  <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Not compulsory, but suggest to provide if you have.     </span></a></div>
                                        <div class="blockRight">
                                      <input type="url" name="txtBranchCompanyWebsite" id="txtBranchCompanyWebsite" placeholder="http://"    value="<?php echo $branchDataList[0][19];?>" class="input" />
                                        </div>
                                       
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                      <div class="blockLeft">Social/ecommerce Platform <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Select your company’s social network first and then provide the URL or ID in the box beside      </span></a></div>
                                        <div class="blockRight" id="input_fields_wrap_selBranch">
                                        <?php
										$selBEcm = explode(",",$branchDataList[0][20]);
										for($d=0;$d<count($selBEcm);$d++)
										{?>
                                      <select name="selBranchEcommerce[]" id="selBranchEcommerce" style="height:30px;">
                                      <option value="">Select</option>
                                        <option value="Twitter" <?php if($selEcm[$d]=="Twitter") echo "selected";?>>Twitter </option>
                                <option value="Facebook" <?php if($selBEcm[$d]=="Facebook") echo "selected";?>>Facebook </option>
                                <option value="Line" <?php if($selBEcm[$d]=="Line") echo "selected";?>>Line </option>
                                <option value="LinkedIn" <?php if($selBEcm[$d]=="LinkedIn") echo "selected";?>>LinkedIn </option>
                                       <option value="Amazon" <?php if($selBEcm[$d]=="Amazon") echo "selected";?>>Amazon </option>
                                       <option value="Alibaba" <?php if($selBEcm[$d]=="Alibaba") echo "selected";?>>Alibaba </option>
                                       <option value="eBay" <?php if($selBEcm[$d]=="eBay") echo "selected";?>>eBay</option>
                                       <option value="Other"  <?php if($selBEcm[$d]=="Other") echo "selected";?>>Other</option>
                                       </select>
   
                                       <?php
										$selBEcmU = explode(",",$branchDataList[0][21]);
										?>
                                        <input type="text"  name="txtBranchEcomUrl[]" id="txtBranchEcomUrl[]"   value="<?php echo $selBEcmU[$d];?>" class="input" style="width:69%" />
                                        <?php } ?>
                                        <div id="otherBranch" style="display:none">
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
                                        <div class="blockImg"  <?php
							if($dataList[0][63]!="1"){?>style="display:none"<?php } ?>><a href="javascript:void(0)"><img src="images/plus_add_blue.png" id='add_field_button_selBranch'> </a></div>  
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                      <div class="blockLeft">Google Map </div>
                                        <div class="blockRight">
                                      <input type="radio" name="rd2Branch" id="rd2Branch" class="xBranch" value="Coordinates" <?php if($branchDataList[0][22]!="") echo "checked";?>> Geographic coordinates
                                     <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" /><strong>1.</strong>Enter the name and area of the organisation in search input box of google map.<br>

<strong>2.</strong> Click on the search icon.This will highlight the location of the organisation on the map<br>

<strong>3.</strong> Right click on the red marker and select "What's here?" option.<br>

<strong>4.</strong>From the pop up menu select the latitude and longitude. </span></a>
<br>

                                      <input type="radio" name="rd2Branch" id="rd2Branch" class="yBranch" value="Geographic URL" <?php if($branchDataList[0][24]!="") echo "checked";?>> Geographic URL
                                      <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" /><strong>1.</strong>Enter the name and area of the organisation in search input box of google map.<br>

<strong>2.</strong> Click on the search icon.<br>

<strong>3.</strong>  Click on the share icon. A pop up menu will appear. <br>

<strong>4.</strong> Click on the "Embed Map" option on the top of the pop up.

<strong>5.</strong> A url will appear. Copy this url and place it in this text box. </span></a>
                                      <div <?php if($branchDataList[0][22]==""){?>style="display:none"<?php } ?> id="x1Branch">Latitude <input type="text"  name="txtBranchLatitude" id="txtBranchLatitude"   value="<?php echo $branchDataList[0][22];?>" class="input" style="width:28%" />
                                            
                                            Longitude <input type="text"   name="txtBranchLongitude" id="txtBranchLongitude"   value="<?php echo $branchDataList[0][23];?>" class="input" style="width:28%"  />  </div>
                                             <div <?php if($branchDataList[0][24]==""){?>style="display:none"<?php } ?> id="y1Branch">
                                             <input type="text"  name="txtBranchUrl" id="txtBranchUrl"   value="<?php echo $branchDataList[0][24];?>" class="input" style="width:100%" /></div>
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
                            <div  align="center">
							<div align="center">
                            
                           <?php
							if($dataList[0][63]=="1"){?>
                            <button class="thm-btn" name="update" id="update" type="submit" style="float:left; margin-left:10PX;" value="Update"   title="Click this button to update data">Update</button>
                         <?php } ?>
                            
                            <button class="thm-btn" name="submit" id="submit" type="button" style="float:left; margin-left:10PX;" value="Next"   title="Click this button to view the next page">Next</button></div>
                               
                              
                               
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
<script>
document.querySelector('.xx').onclick = function(){
	
	swal({
		title: "Are you sure?",
		text: "You will not be able to recover this imaginary file!",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: '#DD6B55',
		confirmButtonText: 'Yes, delete it!',
		closeOnConfirm: false
	},
	function(){
		alert("sadhuni");
		$("form" ).submit();
		///swal("Deleted!", "Your imaginary file has been deleted!", "success");
	});
	return false;
};


</script>
</body>


</html>