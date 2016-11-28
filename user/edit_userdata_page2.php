<?php
session_start();
ob_start();
include("../include/globalIncWeb.php");

if(!isset($_SESSION['user_id']) && ($_SESSION['register']!="register"))
{
	echo "<script>window.location='../register/index.php';</script>";

}
$dataList = getUserdata($_SESSION['user_id'],1);
?>
<?php
$branchDataList = getUserBranchdata($dataList[0][0],1);

 ?>
<?php 
if(isset($_POST['update']) && $_POST['update']=="Update")
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
						echo "<script>window.location='edit_userdata_page2.php';</script>";
					}
		}
}		
?>					
<?php
$branchDataList = getUserBranchdata($dataList[0][0],1);
 ?>
<!DOCTYPE html>
<html>
		<meta charset="UTF-8">
		<title>Logistics GMS</title>
        <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">

        <!-- bootstrap framework -->
		<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="all">
		
        <!-- icon sets -->
            <!-- elegant icons -->
                <link href="assets/icons/elegant/style.css" rel="stylesheet" media="all">
            <!-- elusive icons -->
                <link href="assets/icons/elusive/css/elusive-webfont.css" rel="stylesheet" media="all">
            <!-- flags -->
                <link rel="stylesheet" href="assets/icons/flags/flags.css" media="all">
            <!-- scrollbar -->
                <link rel="stylesheet" href="assets/lib/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">


        <!-- google webfonts -->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>

        <!-- main stylesheet -->
		<link href="assets/css/main.min.css" rel="stylesheet" media="all" id="mainCss">

        <!-- print stylesheet -->
        <link href="assets/css/print.css" rel="stylesheet" media="print">
        <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">

        <!-- moment.js (date library) -->
<script src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/userdata.js"></script>
<script src="assets/js/moment-with-langs.min.js"></script>
<link rel="stylesheet" href="assets/css/lightbox.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">     
<style>   
.redmi{
color:#FF0000;
font-size:20px;
}
.col-md-7
{
	text-align:left !important;
}
</style>
    </head>
    <body class="side_menu_active side_menu_expanded">
        <div id="page_wrapper">

            <!-- header -->
            <?php include("include/main_header.php");?>
            <div id="main_wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <img class="user_profile_img" src="<?php echo $webUrl;?>register/uploads/<?php echo $dataList[0][3];?>" alt="" width="76" height="76" />
                            <h1 class="user_profile_name"> <?php echo $dataList[0][2];?></h1>
                            <p class="user_profile_info"><?php echo $dataList[0][4];?></p>
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" role="form">    
                                <h3 class="heading_a"><span class="heading_text">Edit Profile Page 2</span></h3>
                                <div class="col-md-6">
						<div class="formtitle">Business Areas</div>
                                  <hr></hr>
                            <div class="form-group">
						    <label class="control-label col-md-3">Core services<span class="redmi">*</span> </label>
                                    <div class="col-md-7">
                                    <?php
									$area = explode(",",$dataList[0][28]);
									?>
                                    <label class="control-label col-md-12">
                                    <input type="checkbox" name="chkBusiness[]" class="c1" id="chkBusiness[]"  value="Freight forwarders" <?php for($x=0;$x<count($area);$x++){ if($area[$x]=="Freight forwarders") echo "checked"; break; };?>> Freight forwarders 
                                    </label>
                                    
                                    
                                    <label class="control-label col-md-12">
                                    <input type="checkbox" name="chkBusiness[]" class="c1" id="chkBusiness[]"  value="Truck operator" <?php for($x=0;$x<count($area);$x++){ if($area[$x]=="Truck operator") echo "checked"; break; };?>> Truck operator </label>
                                    

                                    <label class="control-label col-md-12">
                                      <input type="checkbox" name="chkBusiness[]" class="c1" id="chkBusiness[]"  value="Warehouse services" <?php for($x=0;$x<count($area);$x++){ if($area[$x]=="Warehouse services") echo "checked"; break; };?>> Warehouse services
                                    </label>
                                     
                                    <label class="control-label col-md-12"> 
                                      <input type="checkbox" name="chkBusiness[]"  class="c1" id="chkBusiness[]"  value="Liner agent air/ocean" <?php for($x=0;$x<count($area);$x++){ if($area[$x]=="Liner agent air/ocean") echo "checked"; break; };?>> Liner agent air/ocean
                                   </label>
                                   
                                    
                                    <label class="control-label col-md-12">
                                      <input type="checkbox" name="chkBusiness[]" class="c1" id="chkBusiness[]"  value="Customs Broker"  <?php for($x=0;$x<count($area);$x++){ if($area[$x]=="Customs Broker") echo "checked"; break; };?>> Customs Broker
                                    </label>
                                      
                                     <label class="control-label col-md-12">
                                       <input type="checkbox" name="chkBusiness[]" class="c1" id="chkBusiness[]"  value="Crane / MHE Operator" <?php for($x=0;$x<count($area);$x++){ if($area[$x]=="Crane/MHE Operator") echo "checked"; break; };?>> Crane/MHE Operator
                                     </label>
                                   
                                   <label class="control-label col-md-12">
                                      <input type="checkbox" name="chkBusiness[]" class="c1" id="chkBusiness[]"  value="Lead Logistics Provider" <?php for($x=0;$x<count($area);$x++){ if($area[$x]=="Lead Logistics Provider") echo "checked"; break; };?>> Lead Logistics Provider   
                                   </label>

                                  <label class="control-label col-md-12">     
                                       <input type="checkbox" name="chkBusiness[]" class="c1" id="chkBusiness[]"  value="Consolidator" <?php for($x=0;$x<count($area);$x++){ if($area[$x]=="Consolidator") echo "checked"; break; };?>> Consolidator 
                                   </label>
                                   
                                 <label class="control-label col-md-12">   
                                   <input type="checkbox" name="chkBusiness[]" class="c1" id="chkBusiness[]"  value="Inland Container Depot/CY/Dry port operator" <?php for($x=0;$x<count($area);$x++){ if($area[$x]=="Inland Container Depot/CY/Dry port operator") echo "checked"; break; };?>> Inland Container Depot/CY/Dry port operator
                                 </label>   
                                 
                                 <label class="control-label col-md-12"> 
                                       <input type="checkbox" name="chkBusiness[]" class="c1" id="chkBusiness[]"  value="Rail-freight Operator" <?php for($x=0;$x<count($area);$x++){ if($area[$x]=="Rail-freight Operator") echo "checked"; break; };?>> Rail-freight Operator
                                 </label>  

                              <label class="control-label col-md-12">           
                                   <input type="checkbox" name="chkBusiness[]" class="c1" id="chkBusiness1"  value="Others" <?php for($x=0;$x<count($area);$x++){ if($area[$x]=="Others") { $z= 1; echo "checked"; break; } };?>> Others                        
                               </label>
                                   
                              
                              
                              <div <?php if($z!=1){?> style="display:none" <?php }  ?> id="txtBusiDisp">
                              <input type="text" name="txtBusinessOther" id="txtBusinessOther" class="input" value="<?php echo $dataList[0][29];?>">
                              </div>
                              <script type="text/javascript">
								(function($) {
									$("#chkBusiness1").click(function() {
										if($("#txtBusiDisp").is(':hidden'))
										{
											$("#txtBusiDisp").slideDown("normal");
										}
										else
										{
											$("#txtBusiDisp").slideUp("normal");
										}
									});
									
								})(jQuery);
								</script>        
                             </div>
                            </div>
                                 
                            <div class="form-group">
                                  	<label class="control-label col-md-3">Detailed services offered:  </label>
<?php
									$selOtherService = explode("#",$dataList[0][32]);
									for($i=0;$i<count($selOtherService);$i++)
									{
										if($i==0){	
									?>
                                    <div class="col-md-7" id="input_fields_wrap_otherservice">
                                    	<select name="selOtherService[]" id="selOtherService[]" style="width:91%; height:30px; font-size:11px;">
<option value="General Freight Forwarding" <?php if($selOtherService[$i]=="General Freight Forwarding") echo "selected";?>>General Freight Forwarding</option>
<option value="Air-freight forwarding" <?php if($selOtherService[$i]=="Air-freight forwarding") echo "selected";?>>Air-freight forwarding</option>
<option value="a/f FOB Handling" <?php if($selOtherService[$i]=="a/f FOB Handling") echo "selected";?>>a/f FOB Handling</option>
<option value="Courier services" <?php if($selOtherService[$i]=="Courier services") echo "selected";?>>Courier services</option>
<option value="Express service" <?php if($selOtherService[$i]=="Express service") echo "selected";?>>Express service</option>
<option value="Hand-carry service" <?php if($selOtherService[$i]=="Hand-carry service") echo "selected";?>>Hand-carry service</option>
<option value="Air-freight consolidation" <?php if($selOtherService[$i]=="Air-freight consolidation") echo "selected";?>>Air-freight consolidation</option>
<option value="Air-freight deconsolidation (breakbulk)" <?php if($selOtherService[$i]=="Air-freight deconsolidation (breakbulk)") echo "selected";?>>Air-freight deconsolidation (breakbulk)</option>
<option value="Aircraft chartering (broking)" <?php if($selOtherService[$i]=="Aircraft chartering (broking)") echo "selected";?>>Aircraft chartering (broking)</option>
<option value="Airport customs brokerage" <?php if($selOtherService[$i]=="Airport customs brokerage") echo "selected";?>>Airport customs brokerage</option>
<option value="Door-to-door cargo delivery" <?php if($selOtherService[$i]=="Door-to-door cargo delivery") echo "selected";?>>Door-to-door cargo delivery</option>
<option value="Perishable cargo" <?php if($selOtherService[$i]=="Perishable cargo") echo "selected";?>>Perishable cargo</option>
<option value="Marine Parts logistics" <?php if($selOtherService[$i]=="Marine Parts logistics") echo "selected";?>>Marine Parts logistics</option>
<option value="Pets and animal forwarding" <?php if($selOtherService[$i]=="Pets and animal forwarding") echo "selected";?>>Pets and animal forwarding</option>
<option value="Valuable cargo" <?php if($selOtherService[$i]=="Valuable cargo") echo "selected";?>>Valuable cargo</option>
<option value="Airline agency (CSA)" <?php if($selOtherService[$i]=="Airline agency (CSA)") echo "selected";?>>Airline agency (CSA)</option>
<option value="Travel and ticketing services" <?php if($selOtherService[$i]=="Travel and ticketing services") echo "selected";?>>Travel and ticketing services</option>
<option value="Airport cargo handling services" <?php if($selOtherService[$i]=="Airport cargo handling services") echo "selected";?>>Airport cargo handling services</option>
<option value="Airport warehousing" <?php if($selOtherService[$i]=="Airport warehousing") echo "selected";?>>Airport warehousing</option>
<option value="Mechanical handling equipment" <?php if($selOtherService[$i]=="Mechanical handling equipment") echo "selected";?>>Mechanical handling equipment</option>
<option value="Ocean freight forwarding" <?php if($selOtherService[$i]=="Ocean freight forwarding") echo "selected";?>>Ocean freight forwarding</option>
<option value="o/f FOB Handling" <?php if($selOtherService[$i]=="o/f FOB Handling") echo "selected";?>>o/f FOB Handling</option>
<option value="Full container load" <?php if($selOtherService[$i]=="Full container load") echo "selected";?>>Full container load</option>
<option value="Less than container load" <?php if($selOtherService[$i]=="Less than container load") echo "selected";?>>Less than container load</option>
<option value="Breakbulk and special cargo" <?php if($selOtherService[$i]=="Breakbulk and special cargo") echo "selected";?>>Breakbulk and special cargo</option>
<option value="Seaport customs brokerage" <?php if($selOtherService[$i]=="Seaport customs brokerage") echo "selected";?>>Seaport customs brokerage</option>
<option value="Ocean-freight consolidations" <?php if($selOtherService[$i]=="Ocean-freight consolidations") echo "selected";?>>Ocean-freight consolidations</option>
<option value="Ocean-freight deconsolidation (breakbulk)" <?php if($selOtherService[$i]=="Ocean-freight deconsolidation (breakbulk)") echo "selected";?>>Ocean-freight deconsolidation (breakbulk)</option>
<option value="Ship-chartering (broking)" <?php if($selOtherService[$i]=="Ship-chartering (broking)") echo "selected";?>>Ship-chartering (broking)</option>
<option value="Door-to-door deliveries" <?php if($selOtherService[$i]=="Door-to-door deliveries") echo "selected";?>>Door-to-door deliveries</option>
<option value="Liner agency" <?php if($selOtherService[$i]=="Liner agency") echo "selected";?>>Liner agency</option>
<option value="Port Agency" <?php if($selOtherService[$i]=="Port Agency") echo "selected";?>>Port Agency</option>
<option value="Stevedores / port cargo handling services"  <?php if($selOtherService[$i]=="Stevedores / port cargo handling services") echo "selected";?>>Stevedores / port cargo handling services</option>
<option value="Port warehouse management" <?php if($selOtherService[$i]=="Port warehouse management") echo "selected";?>>Port warehouse management</option>
<option value="Container depot management" <?php if($selOtherService[$i]=="Container depot management") echo "selected";?>>Container depot management</option>
<option value="Container trucking" <?php if($selOtherService[$i]=="Container trucking") echo "selected";?>>Container trucking</option>
<option value="Project forwarding" <?php if($selOtherService[$i]=="Project forwarding") echo "selected";?>>Project forwarding</option>
<option value="Project management" <?php if($selOtherService[$i]=="Project management") echo "selected";?>>Project management</option>
<option value="Heavy-lift forwarding" <?php if($selOtherService[$i]=="Heavy-lift forwarding") echo "selected";?>>Heavy-lift forwarding</option>
<option value="Offshore support" <?php if($selOtherService[$i]=="Offshore support") echo "selected";?>>Offshore support</option>
<option value="Intermodal and Multi Modal Transport" <?php if($selOtherService[$i]=="Intermodal and Multi Modal Transport") echo "selected";?>>Intermodal and Multi Modal Transport</option>
<option value="Rail-freight forwarding"  <?php if($selOtherService[$i]=="Rail-freight forwarding") echo "selected";?>>Rail-freight forwarding</option>
<option value="Road Freight" <?php if($selOtherService[$i]=="Road Freight") echo "selected";?>>Road Freight</option>
<option value="International / cross border trucking" <?php if($selOtherService[$i]=="International / cross border trucking") echo "selected";?>>International / cross border trucking</option>
<option value="International parcels / consolidation" <?php if($selOtherService[$i]=="International parcels / consolidation") echo "selected";?>>International parcels / consolidation</option>
<option value="Cross-border customs brokerage"  <?php if($selOtherService[$i]=="Cross-border customs brokerage") echo "selected";?>>Cross-border customs brokerage</option>
<option value="Domestic trucking"  <?php if($selOtherService[$i]=="Domestic trucking") echo "selected";?>>Domestic trucking</option>
<option value="Domestic distribution" <?php if($selOtherService[$i]=="Domestic distribution") echo "selected";?>>Domestic distribution</option>
<option value="Domestic parcels / consolidation" <?php if($selOtherService[$i]=="Domestic parcels / consolidation") echo "selected";?>>Domestic parcels / consolidation</option>
<option value="Trucking of liquid tankers / bulk powder / silo trucks" <?php if($selOtherService[$i]=="Trucking of liquid tankers / bulk powder / silo trucks") echo "selected";?>>Trucking of liquid tankers / bulk powder / silo trucks</option>
<option value="Trucking of hazardous chemicals and fuel" <?php if($selOtherService[$i]=="Trucking of hazardous chemicals and fuel") echo "selected";?>>Trucking of hazardous chemicals and fuel</option>
<option value="Trucking of containers" <?php if($selOtherService[$i]=="Trucking of containers") echo "selected";?>>Trucking of containers</option>
<option value="Trucking of minerals, building materials or bulk agricultural products" <?php if($selOtherService[$i]=="Trucking of minerals, building materials or bulk agricultural products") echo "selected";?>>Trucking of minerals, building materials or bulk agricultural products</option>
<option value="Other specialised trucking e.g. car carriers,  etc" <?php if($selOtherService[$i]=="Other specialised trucking e.g. car carriers,  etc") echo "selected";?>>Other specialised trucking e.g. car carriers,  etc</option>
<option value="Heavy-lift trucking" <?php if($selOtherService[$i]=="Heavy-lift trucking") echo "selected";?>>Heavy-lift trucking</option>
<option value="Heavy-lift positioning and Installation" <?php if($selOtherService[$i]=="Heavy-lift positioning and Installation") echo "selected";?>>Heavy-lift positioning and Installation</option>
<option value="Cranage and mechanical handling equipment" <?php if($selOtherService[$i]=="Cranage and mechanical handling equipment") echo "selected";?>>Cranage and mechanical handling equipment </option>
<option value="Warehousing" <?php if($selOtherService[$i]=="Warehousing") echo "selected";?>>Warehousing</option>
<option value="Bulk storage" <?php if($selOtherService[$i]=="Bulk storage") echo "selected";?>>Bulk storage</option>
<option value="Racked warehouse" <?php if($selOtherService[$i]=="Racked warehouse") echo "selected";?>>Racked warehouse</option>
<option value="Cross-docking warehouse"  <?php if($selOtherService[$i]=="Cross-docking warehouse") echo "selected";?>>Cross-docking warehouse</option>
<option value="Distribution warehouse" <?php if($selOtherService[$i]=="Distribution warehouse") echo "selected";?>>Distribution warehouse</option>
<option value="Inbound warehouse" <?php if($selOtherService[$i]=="Inbound warehouse") echo "selected";?>>Inbound warehouse</option>
<option value="Bonded warehouse" <?php if($selOtherService[$i]=="Bonded warehouse") echo "selected";?>>Bonded warehouse</option>
<option value="Temperature-controlled warehouse" <?php if($selOtherService[$i]=="Temperature-controlled warehouse") echo "selected";?>>Temperature-controlled warehouse</option>
<option value="Hazardous cargo warehouse" <?php if($selOtherService[$i]=="Hazardous cargo warehouse") echo "selected";?>>Hazardous cargo warehouse</option>
<option value="Tank, silo  or other specialized storage facilities" <?php if($selOtherService[$i]=="Tank, silo  or other specialized storage facilities") echo "selected";?>>Tank, silo  or other specialized storage facilities</option>
<option value="Distribution logistics" <?php if($selOtherService[$i]=="Distribution logistics") echo "selected";?>>Distribution logistics</option>
<option value="Sourcing logistics" <?php if($selOtherService[$i]=="Sourcing logistics") echo "selected";?>>Sourcing logistics</option>
<option value="Reverse Logistics"  <?php if($selOtherService[$i]=="Reverse Logistics") echo "selected";?>>Reverse Logistics</option>
<option value="Inventory management" <?php if($selOtherService[$i]=="Inventory management") echo "selected";?>>Inventory management</option>
<option value="Warehouse management systems" <?php if($selOtherService[$i]=="Warehouse management systems") echo "selected";?>>Warehouse management systems</option>
<option value="Kitting and assembly" <?php if($selOtherService[$i]=="Kitting and assembly") echo "selected";?>>Kitting and assembly</option>
<option value="Cargo handling, loading and unloading" <?php if($selOtherService[$i]=="Cargo handling, loading and unloading") echo "selected";?>>Cargo handling, loading and unloading</option>
<option value="Labelling" <?php if($selOtherService[$i]=="Labelling") echo "selected";?>>Labelling</option>
<option value="Re-packaging" <?php if($selOtherService[$i]=="Re-packaging") echo "selected";?>>Re-packaging</option>
<option value="Pre-inspection" <?php if($selOtherService[$i]=="Pre-inspection") echo "selected";?>>Pre-inspection</option>
<option value="Document preparation" <?php if($selOtherService[$i]=="Document preparation") echo "selected";?>>Document preparation</option>
<option value="3PL / Lead Logistics Provider" <?php if($selOtherService[$i]=="3PL / Lead Logistics Provider") echo "selected";?>>3PL / Lead Logistics Provider</option>
<option value="4PL / Consultancy services" <?php if($selOtherService[$i]=="4PL / Consultancy services") echo "selected";?>>4PL / Consultancy services</option>
<option value="Chemicals and hazardous cargo logistics" <?php if($selOtherService[$i]=="Chemicals and hazardous cargo logistics") echo "selected";?>>Chemicals and hazardous cargo logistics</option>
<option value="Fine Arts and Museum Logistics" <?php if($selOtherService[$i]=="Fine Arts and Museum Logistics") echo "selected";?>>Fine Arts and Museum Logistics</option>
<option value="Fairs and Events Logistics" <?php if($selOtherService[$i]=="Fairs and Events Logistics") echo "selected";?>>Fairs and Events Logistics</option>
<option value="Household movers" <?php if($selOtherService[$i]=="Household movers") echo "selected";?>>Household movers</option>
<option value="Temperature-controlled logistics" <?php if($selOtherService[$i]=="Temperature-controlled logistics") echo "selected";?>>Temperature-controlled logistics</option>
<option value="Hazardous cargo specialists" <?php if($selOtherService[$i]=="Hazardous cargo specialists") echo "selected";?>>Hazardous cargo specialists</option>
<option value="Valuable cargo/bullion/cash/secured transport" <?php if($selOtherService[$i]=="Valuable cargo/bullion/cash/secured transport") echo "selected";?>>Valuable cargo/bullion/cash/secured transport</option>
<option value="Green Logistics" <?php if($selOtherService[$i]=="Green Logistics") echo "selected";?>>Green Logistics</option>
<option value="Animal transport services" <?php if($selOtherService[$i]=="Animal transport services") echo "selected";?>>Animal transport services</option>
<option value="Survey agent" <?php if($selOtherService[$i]=="Survey agent") echo "selected";?>>Survey agent</option>
<option value="International Trade Documentation Management" <?php if($selOtherService[$i]=="International Trade Documentation Management") echo "selected";?>>International Trade Documentation Management</option>
<option value="Import and Export Management" <?php if($selOtherService[$i]=="Import and Export Management") echo "selected";?>>Import and Export Management</option>
<option value="Import license management" <?php if($selOtherService[$i]=="Import license management") echo "selected";?>>Import license management</option>
<option value="Certificate of Origin (C/O) Applications"  <?php if($selOtherService[$i]=="Certificate of Origin (C/O) Applications") echo "selected";?>>Certificate of Origin (C/O) Applications</option>
<option value="Logistics manpower staff provision" <?php if($selOtherService[$i]=="Logistics manpower staff provision") echo "selected";?>>Logistics manpower staff provision</option>
<option value="Other" <?php if($selOtherService[$i]=="Other") echo "selected";?>>Other</option>
                                        </select> 

<input type="text"  name="txtOtherServiceOther" id="txtOtherServiceOther" value="" class="input" style="width:100%; display:none" /><script type="text/javascript">
								(function($) {
									$('select[name="selOtherService[]"]').change(function() {
										if($('select[name="selOtherService[]"]').val()=="Other")
										{
											$('input[name="txtOtherServiceOther"]').slideDown("normal");
										}
										else
										{
											$('input[name="txtOtherServiceOther"]').slideUp("normal");
										}
									});
									
								})(jQuery);
								</script>                                      
                                        <a href="javascript:void(0)" id="add_field_button_otherservice">  <i class="fa fa-plus-square fa-2x" aria-hidden="true"></i> </a>

                              </div>
                              <?php } else { ?>
                              <div class="col-md-3"></div>
                              <div class="col-md-7" id="input_fields_wrap_otherservice">
                                    	<select name="selOtherService[]" id="selOtherService[]" style="width:91%; height:30px; font-size:11px;">
<option value="General Freight Forwarding" <?php if($selOtherService[$i]=="General Freight Forwarding") echo "selected";?>>General Freight Forwarding</option>
<option value="Air-freight forwarding" <?php if($selOtherService[$i]=="Air-freight forwarding") echo "selected";?>>Air-freight forwarding</option>
<option value="a/f FOB Handling" <?php if($selOtherService[$i]=="a/f FOB Handling") echo "selected";?>>a/f FOB Handling</option>
<option value="Courier services" <?php if($selOtherService[$i]=="Courier services") echo "selected";?>>Courier services</option>
<option value="Express service" <?php if($selOtherService[$i]=="Express service") echo "selected";?>>Express service</option>
<option value="Hand-carry service" <?php if($selOtherService[$i]=="Hand-carry service") echo "selected";?>>Hand-carry service</option>
<option value="Air-freight consolidation" <?php if($selOtherService[$i]=="Air-freight consolidation") echo "selected";?>>Air-freight consolidation</option>
<option value="Air-freight deconsolidation (breakbulk)" <?php if($selOtherService[$i]=="Air-freight deconsolidation (breakbulk)") echo "selected";?>>Air-freight deconsolidation (breakbulk)</option>
<option value="Aircraft chartering (broking)" <?php if($selOtherService[$i]=="Aircraft chartering (broking)") echo "selected";?>>Aircraft chartering (broking)</option>
<option value="Airport customs brokerage" <?php if($selOtherService[$i]=="Airport customs brokerage") echo "selected";?>>Airport customs brokerage</option>
<option value="Door-to-door cargo delivery" <?php if($selOtherService[$i]=="Door-to-door cargo delivery") echo "selected";?>>Door-to-door cargo delivery</option>
<option value="Perishable cargo" <?php if($selOtherService[$i]=="Perishable cargo") echo "selected";?>>Perishable cargo</option>
<option value="Marine Parts logistics" <?php if($selOtherService[$i]=="Marine Parts logistics") echo "selected";?>>Marine Parts logistics</option>
<option value="Pets and animal forwarding" <?php if($selOtherService[$i]=="Pets and animal forwarding") echo "selected";?>>Pets and animal forwarding</option>
<option value="Valuable cargo" <?php if($selOtherService[$i]=="Valuable cargo") echo "selected";?>>Valuable cargo</option>
<option value="Airline agency (CSA)" <?php if($selOtherService[$i]=="Airline agency (CSA)") echo "selected";?>>Airline agency (CSA)</option>
<option value="Travel and ticketing services" <?php if($selOtherService[$i]=="Travel and ticketing services") echo "selected";?>>Travel and ticketing services</option>
<option value="Airport cargo handling services" <?php if($selOtherService[$i]=="Airport cargo handling services") echo "selected";?>>Airport cargo handling services</option>
<option value="Airport warehousing" <?php if($selOtherService[$i]=="Airport warehousing") echo "selected";?>>Airport warehousing</option>
<option value="Mechanical handling equipment" <?php if($selOtherService[$i]=="Mechanical handling equipment") echo "selected";?>>Mechanical handling equipment</option>
<option value="Ocean freight forwarding" <?php if($selOtherService[$i]=="Ocean freight forwarding") echo "selected";?>>Ocean freight forwarding</option>
<option value="o/f FOB Handling" <?php if($selOtherService[$i]=="o/f FOB Handling") echo "selected";?>>o/f FOB Handling</option>
<option value="Full container load" <?php if($selOtherService[$i]=="Full container load") echo "selected";?>>Full container load</option>
<option value="Less than container load" <?php if($selOtherService[$i]=="Less than container load") echo "selected";?>>Less than container load</option>
<option value="Breakbulk and special cargo" <?php if($selOtherService[$i]=="Breakbulk and special cargo") echo "selected";?>>Breakbulk and special cargo</option>
<option value="Seaport customs brokerage" <?php if($selOtherService[$i]=="Seaport customs brokerage") echo "selected";?>>Seaport customs brokerage</option>
<option value="Ocean-freight consolidations" <?php if($selOtherService[$i]=="Ocean-freight consolidations") echo "selected";?>>Ocean-freight consolidations</option>
<option value="Ocean-freight deconsolidation (breakbulk)" <?php if($selOtherService[$i]=="Ocean-freight deconsolidation (breakbulk)") echo "selected";?>>Ocean-freight deconsolidation (breakbulk)</option>
<option value="Ship-chartering (broking)" <?php if($selOtherService[$i]=="Ship-chartering (broking)") echo "selected";?>>Ship-chartering (broking)</option>
<option value="Door-to-door deliveries" <?php if($selOtherService[$i]=="Door-to-door deliveries") echo "selected";?>>Door-to-door deliveries</option>
<option value="Liner agency" <?php if($selOtherService[$i]=="Liner agency") echo "selected";?>>Liner agency</option>
<option value="Port Agency" <?php if($selOtherService[$i]=="Port Agency") echo "selected";?>>Port Agency</option>
<option value="Stevedores / port cargo handling services"  <?php if($selOtherService[$i]=="Stevedores / port cargo handling services") echo "selected";?>>Stevedores / port cargo handling services</option>
<option value="Port warehouse management" <?php if($selOtherService[$i]=="Port warehouse management") echo "selected";?>>Port warehouse management</option>
<option value="Container depot management" <?php if($selOtherService[$i]=="Container depot management") echo "selected";?>>Container depot management</option>
<option value="Container trucking" <?php if($selOtherService[$i]=="Container trucking") echo "selected";?>>Container trucking</option>
<option value="Project forwarding" <?php if($selOtherService[$i]=="Project forwarding") echo "selected";?>>Project forwarding</option>
<option value="Project management" <?php if($selOtherService[$i]=="Project management") echo "selected";?>>Project management</option>
<option value="Heavy-lift forwarding" <?php if($selOtherService[$i]=="Heavy-lift forwarding") echo "selected";?>>Heavy-lift forwarding</option>
<option value="Offshore support" <?php if($selOtherService[$i]=="Offshore support") echo "selected";?>>Offshore support</option>
<option value="Intermodal and Multi Modal Transport" <?php if($selOtherService[$i]=="Intermodal and Multi Modal Transport") echo "selected";?>>Intermodal and Multi Modal Transport</option>
<option value="Rail-freight forwarding"  <?php if($selOtherService[$i]=="Rail-freight forwarding") echo "selected";?>>Rail-freight forwarding</option>
<option value="Road Freight" <?php if($selOtherService[$i]=="Road Freight") echo "selected";?>>Road Freight</option>
<option value="International / cross border trucking" <?php if($selOtherService[$i]=="International / cross border trucking") echo "selected";?>>International / cross border trucking</option>
<option value="International parcels / consolidation" <?php if($selOtherService[$i]=="International parcels / consolidation") echo "selected";?>>International parcels / consolidation</option>
<option value="Cross-border customs brokerage"  <?php if($selOtherService[$i]=="Cross-border customs brokerage") echo "selected";?>>Cross-border customs brokerage</option>
<option value="Domestic trucking"  <?php if($selOtherService[$i]=="Domestic trucking") echo "selected";?>>Domestic trucking</option>
<option value="Domestic distribution" <?php if($selOtherService[$i]=="Domestic distribution") echo "selected";?>>Domestic distribution</option>
<option value="Domestic parcels / consolidation" <?php if($selOtherService[$i]=="Domestic parcels / consolidation") echo "selected";?>>Domestic parcels / consolidation</option>
<option value="Trucking of liquid tankers / bulk powder / silo trucks" <?php if($selOtherService[$i]=="Trucking of liquid tankers / bulk powder / silo trucks") echo "selected";?>>Trucking of liquid tankers / bulk powder / silo trucks</option>
<option value="Trucking of hazardous chemicals and fuel" <?php if($selOtherService[$i]=="Trucking of hazardous chemicals and fuel") echo "selected";?>>Trucking of hazardous chemicals and fuel</option>
<option value="Trucking of containers" <?php if($selOtherService[$i]=="Trucking of containers") echo "selected";?>>Trucking of containers</option>
<option value="Trucking of minerals, building materials or bulk agricultural products" <?php if($selOtherService[$i]=="Trucking of minerals, building materials or bulk agricultural products") echo "selected";?>>Trucking of minerals, building materials or bulk agricultural products</option>
<option value="Other specialised trucking e.g. car carriers,  etc" <?php if($selOtherService[$i]=="Other specialised trucking e.g. car carriers,  etc") echo "selected";?>>Other specialised trucking e.g. car carriers,  etc</option>
<option value="Heavy-lift trucking" <?php if($selOtherService[$i]=="Heavy-lift trucking") echo "selected";?>>Heavy-lift trucking</option>
<option value="Heavy-lift positioning and Installation" <?php if($selOtherService[$i]=="Heavy-lift positioning and Installation") echo "selected";?>>Heavy-lift positioning and Installation</option>
<option value="Cranage and mechanical handling equipment" <?php if($selOtherService[$i]=="Cranage and mechanical handling equipment") echo "selected";?>>Cranage and mechanical handling equipment </option>
<option value="Warehousing" <?php if($selOtherService[$i]=="Warehousing") echo "selected";?>>Warehousing</option>
<option value="Bulk storage" <?php if($selOtherService[$i]=="Bulk storage") echo "selected";?>>Bulk storage</option>
<option value="Racked warehouse" <?php if($selOtherService[$i]=="Racked warehouse") echo "selected";?>>Racked warehouse</option>
<option value="Cross-docking warehouse"  <?php if($selOtherService[$i]=="Cross-docking warehouse") echo "selected";?>>Cross-docking warehouse</option>
<option value="Distribution warehouse" <?php if($selOtherService[$i]=="Distribution warehouse") echo "selected";?>>Distribution warehouse</option>
<option value="Inbound warehouse" <?php if($selOtherService[$i]=="Inbound warehouse") echo "selected";?>>Inbound warehouse</option>
<option value="Bonded warehouse" <?php if($selOtherService[$i]=="Bonded warehouse") echo "selected";?>>Bonded warehouse</option>
<option value="Temperature-controlled warehouse" <?php if($selOtherService[$i]=="Temperature-controlled warehouse") echo "selected";?>>Temperature-controlled warehouse</option>
<option value="Hazardous cargo warehouse" <?php if($selOtherService[$i]=="Hazardous cargo warehouse") echo "selected";?>>Hazardous cargo warehouse</option>
<option value="Tank, silo  or other specialized storage facilities" <?php if($selOtherService[$i]=="Tank, silo  or other specialized storage facilities") echo "selected";?>>Tank, silo  or other specialized storage facilities</option>
<option value="Distribution logistics" <?php if($selOtherService[$i]=="Distribution logistics") echo "selected";?>>Distribution logistics</option>
<option value="Sourcing logistics" <?php if($selOtherService[$i]=="Sourcing logistics") echo "selected";?>>Sourcing logistics</option>
<option value="Reverse Logistics"  <?php if($selOtherService[$i]=="Reverse Logistics") echo "selected";?>>Reverse Logistics</option>
<option value="Inventory management" <?php if($selOtherService[$i]=="Inventory management") echo "selected";?>>Inventory management</option>
<option value="Warehouse management systems" <?php if($selOtherService[$i]=="Warehouse management systems") echo "selected";?>>Warehouse management systems</option>
<option value="Kitting and assembly" <?php if($selOtherService[$i]=="Kitting and assembly") echo "selected";?>>Kitting and assembly</option>
<option value="Cargo handling, loading and unloading" <?php if($selOtherService[$i]=="Cargo handling, loading and unloading") echo "selected";?>>Cargo handling, loading and unloading</option>
<option value="Labelling" <?php if($selOtherService[$i]=="Labelling") echo "selected";?>>Labelling</option>
<option value="Re-packaging" <?php if($selOtherService[$i]=="Re-packaging") echo "selected";?>>Re-packaging</option>
<option value="Pre-inspection" <?php if($selOtherService[$i]=="Pre-inspection") echo "selected";?>>Pre-inspection</option>
<option value="Document preparation" <?php if($selOtherService[$i]=="Document preparation") echo "selected";?>>Document preparation</option>
<option value="3PL / Lead Logistics Provider" <?php if($selOtherService[$i]=="3PL / Lead Logistics Provider") echo "selected";?>>3PL / Lead Logistics Provider</option>
<option value="4PL / Consultancy services" <?php if($selOtherService[$i]=="4PL / Consultancy services") echo "selected";?>>4PL / Consultancy services</option>
<option value="Chemicals and hazardous cargo logistics" <?php if($selOtherService[$i]=="Chemicals and hazardous cargo logistics") echo "selected";?>>Chemicals and hazardous cargo logistics</option>
<option value="Fine Arts and Museum Logistics" <?php if($selOtherService[$i]=="Fine Arts and Museum Logistics") echo "selected";?>>Fine Arts and Museum Logistics</option>
<option value="Fairs and Events Logistics" <?php if($selOtherService[$i]=="Fairs and Events Logistics") echo "selected";?>>Fairs and Events Logistics</option>
<option value="Household movers" <?php if($selOtherService[$i]=="Household movers") echo "selected";?>>Household movers</option>
<option value="Temperature-controlled logistics" <?php if($selOtherService[$i]=="Temperature-controlled logistics") echo "selected";?>>Temperature-controlled logistics</option>
<option value="Hazardous cargo specialists" <?php if($selOtherService[$i]=="Hazardous cargo specialists") echo "selected";?>>Hazardous cargo specialists</option>
<option value="Valuable cargo/bullion/cash/secured transport" <?php if($selOtherService[$i]=="Valuable cargo/bullion/cash/secured transport") echo "selected";?>>Valuable cargo/bullion/cash/secured transport</option>
<option value="Green Logistics" <?php if($selOtherService[$i]=="Green Logistics") echo "selected";?>>Green Logistics</option>
<option value="Animal transport services" <?php if($selOtherService[$i]=="Animal transport services") echo "selected";?>>Animal transport services</option>
<option value="Survey agent" <?php if($selOtherService[$i]=="Survey agent") echo "selected";?>>Survey agent</option>
<option value="International Trade Documentation Management" <?php if($selOtherService[$i]=="International Trade Documentation Management") echo "selected";?>>International Trade Documentation Management</option>
<option value="Import and Export Management" <?php if($selOtherService[$i]=="Import and Export Management") echo "selected";?>>Import and Export Management</option>
<option value="Import license management" <?php if($selOtherService[$i]=="Import license management") echo "selected";?>>Import license management</option>
<option value="Certificate of Origin (C/O) Applications"  <?php if($selOtherService[$i]=="Certificate of Origin (C/O) Applications") echo "selected";?>>Certificate of Origin (C/O) Applications</option>
<option value="Logistics manpower staff provision" <?php if($selOtherService[$i]=="Logistics manpower staff provision") echo "selected";?>>Logistics manpower staff provision</option>
<option value="Other" <?php if($selOtherService[$i]=="Other") echo "selected";?>>Other</option>
                                        </select> 

<input type="text"  name="txtOtherServiceOther" id="txtOtherServiceOther" value="" class="input" style="width:100%; display:none" /><script type="text/javascript">
								(function($) {
									$('select[name="selOtherService[]"]').change(function() {
										if($('select[name="selOtherService[]"]').val()=="Other")
										{
											$('input[name="txtOtherServiceOther"]').slideDown("normal");
										}
										else
										{
											$('input[name="txtOtherServiceOther"]').slideUp("normal");
										}
									});
									
								})(jQuery);
								</script>                                      
                                        <a href="javascript:void(0)" id="add_field_button_otherservice">  <i class="fa fa-plus-square fa-2x" aria-hidden="true"></i> </a>

                              </div>
                              <?php } ?>



                              <?php } ?> 
                           </div>

                                  
                                    <div class="form-group">
                                  	<label class="control-label col-md-3">Industry Focus<span class="redmi">*</span> </label>
                                    <div class="col-md-7" id="input_fields_wrap_industry">
                                     <?php
									  $industry = explode(",",$dataList[0][30]);
	                                  $industryDes = explode("#",$dataList[0][72]);
									  ?>
                                    <label class="control-label col-md-12">
                                    <input type="checkbox" name="chkIndustry[]" id="chkIndustry1"  value="Raw agri-products" class="c2" <?php for($i=0;$i<count($industry);$i++){ if($industry[$i]=="Raw agri-products") { $a = 1; echo "checked"; break; } };?>> Raw agri-products

                                    <input type="text" name="txtIndustry[]" id="txtIndustry1" class="input" value="<?php if($a==1) echo $industryDes[$i]; ?>"  <?php if($a!=1){ echo "style='display:none'";} ?>>
                                    <script type="text/javascript">
								(function($) {
									$("#chkIndustry1").click(function() {
										if($("#txtIndustry1").is(':hidden'))
										{
											$("#txtIndustry1").slideDown("normal");
										}
										else
										{
											$("#txtIndustry1").slideUp("normal");
										}
									});
									
								})(jQuery);
								</script>  
                                 </label>

                                 <label class="control-label col-md-12">
                                 <input type="checkbox" name="chkIndustry[]" id="chkIndustry2" class="c2"  value="Processed agri-products" <?php for($i=0;$i<count($industry);$i++){ if($industry[$i]=="Processed agri-products") { $b = 1; echo "checked"; break; } };?>> Processed agri-products
                                <input type="text" name="txtIndustry[]" id="txtIndustry2" class="input" value="<?php if($b==1) echo $industryDes[$i]; ?>"  <?php if($b!=1){ echo "style='display:none'";} ?>>
                                 <script type="text/javascript">
								(function($) {
									$("#chkIndustry2").click(function() {
										if($("#txtIndustry2").is(':hidden'))
										{
											$("#txtIndustry2").slideDown("normal");
										}
										else
										{
											$("#txtIndustry2").slideUp("normal");
										}
									});
									
								})(jQuery);
								</script>  
                                 </label>
                                    
                                   <label class="control-label col-md-12">
                                    <input type="checkbox" class="c2" name="chkIndustry[]" id="chkIndustry3"  value="Manufactured items" <?php for($i=0;$i<count($industry);$i++){ if($industry[$i]=="Manufactured items") { $c = 1; echo "checked"; break; } };?>> Manufactured items
                                    
                                    <input type="text" name="txtIndustry[]" value="" id="txtIndustry3" class="input" style="display:none" value="<?php if($c==1) echo $industryDes[$i]; ?>"  <?php if($c!=1){ echo "style='display:none'";} ?>>
                                 <script type="text/javascript">
								(function($) {
									$("#chkIndustry3").click(function() {
										if($("#txtIndustry3").is(':hidden'))
										{
											$("#txtIndustry3").slideDown("normal");
										}
										else
										{
											$("#txtIndustry3").slideUp("normal");
										}
									});
									
								})(jQuery);
								</script>  
								</label>

                                 <label class="control-label col-md-12">
                                  <input type="checkbox" class="c2" name="chkIndustry[]" id="chkIndustry4"  value="Construction materials" <?php for($i=0;$i<count($industry);$i++){ if($industry[$i]=="Construction materials") { $d = 1; echo "checked"; break; } };?>> Construction materials
                                    <input type="text" name="txtIndustry[]"  id="txtIndustry4" class="input" value="<?php if($d==1) echo $industryDes[$i]; ?>"  <?php if($d!=1){ echo "style='display:none'";} ?>>
                                 <script type="text/javascript">
								(function($) {
									$("#chkIndustry4").click(function() {
										if($("#txtIndustry4").is(':hidden'))
										{
											$("#txtIndustry4").slideDown("normal");
										}
										else
										{
											$("#txtIndustry4").slideUp("normal");
										}
									});
									
								})(jQuery);
								</script> 
								</label> 
                                    
                                <label class="control-label col-md-12">
                                    <input type="checkbox" class="c2" name="chkIndustry[]" id="chkIndustry5"  value="Consumer products" <?php for($i=0;$i<count($industry);$i++){ if($industry[$i]=="Consumer products") { $e = 1; echo "checked"; break; } };?>> Consumer products
                                    <input type="text" name="txtIndustry[]" id="txtIndustry5" class="input" value="<?php if($e==1) echo $industryDes[$i]; ?>"  <?php if($e!=1){ echo "style='display:none'";} ?>>
                                 <script type="text/javascript">
								(function($) {
									$("#chkIndustry5").click(function() {
										if($("#txtIndustry5").is(':hidden'))
										{
											$("#txtIndustry5").slideDown("normal");
										}
										else
										{
											$("#txtIndustry5").slideUp("normal");
										}
									});
									
								})(jQuery);
								</script> 
								</label>
                                    
                               <label class="control-label col-md-12">
                                    <input type="checkbox" class="c2" name="chkIndustry[]" id="chkIndustry7"  value="Minerals" <?php for($i=0;$i<count($industry);$i++){ if($industry[$i]=="Minerals") { $g = 1; echo "checked";  break; } };?>> Minerals
                                     <input type="text" name="txtIndustry[]" id="txtIndustry7" class="input" <?php if($g!=1){ echo "style='display:none'";} ?>>
                                 <script type="text/javascript">
								(function($) {
									$("#chkIndustry7").click(function() {
										if($("#txtIndustry7").is(':hidden'))
										{
											$("#txtIndustry7").slideDown("normal");
										}
										else
										{
											$("#txtIndustry7").slideUp("normal");
										}
									});
									
								})(jQuery);
								</script>  
								</label>

                               <label class="control-label col-md-12">
                                  <input type="checkbox" class="c2" name="chkIndustry[]" id="chkIndustry8"  value="Dangerous Goods" <?php for($i=0;$i<count($industry);$i++){ if($industry[$i]=="Dangerous Goods") { $h = 1; echo "checked"; break; } };?>>  Dangerous Goods
                                   
                                   <input type="text" name="txtIndustry[]"  id="txtIndustry8" class="input" value="<?php if($h==1) echo $industryDes[$i]; ?>"  <?php if($h!=1){ echo "style='display:none'";} ?>>
                                 <script type="text/javascript">
								(function($) {
									$("#chkIndustry8").click(function() {
										if($("#txtIndustry8").is(':hidden'))
										{
											$("#txtIndustry8").slideDown("normal");
										}
										else
										{
											$("#txtIndustry8").slideUp("normal");
										}
									});
									
								})(jQuery);
								</script>  
                                 </label>   
                                    
                               <label class="control-label col-md-12">
                                    <input type="checkbox" class="c2" name="chkIndustry[]" id="chkIndustry9"  value="Project Cargo" <?php for($i=0;$i<count($industry);$i++){ if($industry[$i]=="Project Cargo") { $j = 1; echo "checked"; break; } };?>> Project Cargo
                                    <input type="text" name="txtIndustry[]" id="txtIndustry9" class="input" value="<?php if($j==1) echo $industryDes[$i]; ?>"  <?php if($j!=1){ echo "style='display:none'";} ?>>
                                 <script type="text/javascript">
								(function($) {
									$("#chkIndustry9").click(function() {
										if($("#txtIndustry9").is(':hidden'))
										{
											$("#txtIndustry9").slideDown("normal");
										}
										else
										{
											$("#txtIndustry9").slideUp("normal");
										}
									});
									
								})(jQuery);
								</script>  
                                </label>    

                                 <label class="control-label col-md-12">    
                                <input type="checkbox" class="c2" name="chkIndustry[]" id="chkIndustry10"  value="Others" <?php for($i=0;$i<count($industry);$i++){ if($industry[$i]=="Others") { echo $k = 1; "checked"; break; } };?>> Others
                                    
                                     <input type="text"  name="txtIndustryOther" id="txtIndustryOther" value="<?php echo $dataList[0][31];?>" class="input" <?php if($k!=1){ echo "style='display:none'";} ?> /><script type="text/javascript">
								(function($) {
									$("#chkIndustry10").click(function() {
										if($("#txtIndustryOther").is(':hidden'))
										{
											$("#txtIndustryOther").slideDown("normal");
										}
										else
										{
											$("#txtIndustryOther").slideUp("normal");
										}
									});
									
								})(jQuery);
								</script>   
                                       
                                       </label>
                                      
                           </div>
                           </div>
                                  
                                  <div class="form-group">
                                  	<label class="control-label col-md-3">Information System Applied in Services <span class="redmi">*</span> </label>

                                    <div class="col-md-7">
                                       <input type="text"  name="txtInformation" id="txtInformation" required   class="input" value="<?php echo $dataList[0][34];?>"/>
                                     </div>
                                      
                          		 </div>
                                   
                                  
                                 <div class="form-group">
                                  	<label class="control-label col-md-3">Business Geographic Coverage <span class="redmi">*</span> </label>
                                    <?php
									$busRegion = explode(",",$dataList[0][35]);
									for($i=0;$i<count($busRegion);$i++)
									{
										$busDes = explode(",",$dataList[0][36]);
									?>
									<?php if($i==0)
									{
									?>
                                    <div class="col-md-7" id="input_fields_wrap_area">
                                    <select style="height:30px; width:100%;font-size:11px;" name="selArea[]" id="selArea[]" required>
                                    <option value="">Select Region</option>
                                    <optgroup label="Africa"></optgroup>
                                    <option value="Eastern Africa" <?php if($busRegion[$i]=="Eastern Africa") echo "selected";?> >Eastern Africa</option>
                                    <option value="Middle Africa" <?php if($busRegion[$i]=="Middle Africa") echo "selected";?>>Middle Africa</option>
                                    <option value="Northern Africa" <?php if($busRegion[$i]=="Northern Africa") echo "selected";?>>Northern Africa</option>
                                    <option value="Southern Africa" <?php if($busRegion[$i]=="Southern Africa") echo "selected";?>>Southern Africa</option>
                                    <option value="Western Africa" <?php if($busRegion[$i]=="Western Africa") echo "selected";?>>Western Africa</option>
                                    
                                    <optgroup label="Americas" <?php if($busRegion[$i]=="Americas") echo "selected";?>></optgroup>
                                    <option value="Latin America" <?php if($busRegion[$i]=="Latin America") echo "selected";?>>Latin America</option>
                                    <option value="Northern America" <?php if($busRegion[$i]=="Northern America") echo "selected";?>>Northern America</option>
                                    
                                    <optgroup label="Asia"></optgroup>
                                    <option value="Central Asia" <?php if($busRegion[$i]=="Central Asia") echo "selected";?>>Central Asia</option>
                                    <option value="Eastern Asia" <?php if($busRegion[$i]=="Eastern Asia") echo "selected";?>>Eastern Asia</option>
                                    <option value="Southern Asia" <?php if($busRegion[$i]=="Southern Asia") echo "selected";?>>Southern Asia</option>
                                    <option value="South-Eastern Asia" <?php if($busRegion[$i]=="South-Eastern Asia") echo "selected";?>>South-Eastern Asia</option>
                                   <option value="Western Asia" <?php if($busRegion[$i]=="Western Asia") echo "selected";?>>Western Asia</option>
                                   
                                    <optgroup label="Europe"></optgroup>
                                    <option value="Eastern Europe"  <?php if($busRegion[$i]=="Eastern Europe") echo "selected";?>>Eastern Europe</option>
                                    <option value="Northern Europe" <?php if($busRegion[$i]=="Northern Europe") echo "selected";?>>Northern Europe</option>
                                    <option value="Southern Europe" <?php if($busRegion[$i]=="Southern Europe") echo "selected";?>>Southern Europe</option>
                                    <option value="Western Europe" <?php if($busRegion[$i]=="Western Europe") echo "selected";?>>Western Europe</option>
                                    
                                    <optgroup label="Oceania"></optgroup>
                                    <option value="Australia/New Zealand" <?php if($busRegion[$i]=="Australia/New Zealand") echo "selected";?>>Australia/New Zealand</option>
                                    <option value="Melanesia" <?php if($busRegion[$i]=="Melanesia") echo "selected";?>>Melanesia</option>
                                    <option value="Micronesia" <?php if($busRegion[$i]=="Micronesia") echo "selected";?>>Micronesia</option>
                                    <option value="Polynesia" <?php if($busRegion[$i]=="Polynesia") echo "selected";?>>Polynesia</option>
                                    </select>
                                    <input type="text"  name="txtRegionDetail[]" id="txtRegionDetail[]"  class="input" style="width: 91%" value="<?php echo $busDes[$i];?>"  />
                                    <a href="javascript:void(0)"  id='add_field_button_area'> <i class="fa fa-plus-square fa-2x" aria-hidden="true"></i></a>
                                     </div>
                                    <?php } else { ?>
                                    <label class="control-label col-md-3"></label>
                                    <div class="col-md-7" id="input_fields_wrap_x<?php echo $i;?>">
                                    <select style="height:30px; width:100%;font-size:11px;" name="selArea[]" id="selArea[]" required>
                                    <option value="">Select Region</option>
                                    <optgroup label="Africa"></optgroup>
                                    <option value="Eastern Africa" <?php if($busRegion[$i]=="Eastern Africa") echo "selected";?> >Eastern Africa</option>
                                    <option value="Middle Africa" <?php if($busRegion[$i]=="Middle Africa") echo "selected";?>>Middle Africa</option>
                                    <option value="Northern Africa" <?php if($busRegion[$i]=="Northern Africa") echo "selected";?>>Northern Africa</option>
                                    <option value="Southern Africa" <?php if($busRegion[$i]=="Southern Africa") echo "selected";?>>Southern Africa</option>
                                    <option value="Western Africa" <?php if($busRegion[$i]=="Western Africa") echo "selected";?>>Western Africa</option>
                                    
                                    <optgroup label="Americas" <?php if($busRegion[$i]=="Americas") echo "selected";?>></optgroup>
                                    <option value="Latin America" <?php if($busRegion[$i]=="Latin America") echo "selected";?>>Latin America</option>
                                    <option value="Northern America" <?php if($busRegion[$i]=="Northern America") echo "selected";?>>Northern America</option>
                                    
                                    <optgroup label="Asia"></optgroup>
                                    <option value="Central Asia" <?php if($busRegion[$i]=="Central Asia") echo "selected";?>>Central Asia</option>
                                    <option value="Eastern Asia" <?php if($busRegion[$i]=="Eastern Asia") echo "selected";?>>Eastern Asia</option>
                                    <option value="Southern Asia" <?php if($busRegion[$i]=="Southern Asia") echo "selected";?>>Southern Asia</option>
                                    <option value="South-Eastern Asia" <?php if($busRegion[$i]=="South-Eastern Asia") echo "selected";?>>South-Eastern Asia</option>
                                   <option value="Western Asia" <?php if($busRegion[$i]=="Western Asia") echo "selected";?>>Western Asia</option>
                                   
                                    <optgroup label="Europe"></optgroup>
                                    <option value="Eastern Europe"  <?php if($busRegion[$i]=="Eastern Europe") echo "selected";?>>Eastern Europe</option>
                                    <option value="Northern Europe" <?php if($busRegion[$i]=="Northern Europe") echo "selected";?>>Northern Europe</option>
                                    <option value="Southern Europe" <?php if($busRegion[$i]=="Southern Europe") echo "selected";?>>Southern Europe</option>
                                    <option value="Western Europe" <?php if($busRegion[$i]=="Western Europe") echo "selected";?>>Western Europe</option>
                                    
                                    <optgroup label="Oceania"></optgroup>
                                    <option value="Australia/New Zealand" <?php if($busRegion[$i]=="Australia/New Zealand") echo "selected";?>>Australia/New Zealand</option>
                                    <option value="Melanesia" <?php if($busRegion[$i]=="Melanesia") echo "selected";?>>Melanesia</option>
                                    <option value="Micronesia" <?php if($busRegion[$i]=="Micronesia") echo "selected";?>>Micronesia</option>
                                    <option value="Polynesia" <?php if($busRegion[$i]=="Polynesia") echo "selected";?>>Polynesia</option>
                                    </select>
                                    <input type="text"  name="txtRegionDetail[]" id="txtRegionDetail[]" placeholder="Please specify your business geographic coverage" class="input" style="width: 91%" value="<?php echo $busDes[$i];?>"  />
                                    <a href="javascript:void(0)" class="remove_field"  id='add_field_button_area'> <i class="fa fa-minus-square fa-2x" aria-hidden="true"></i></a>

                                     </div>
                                      <script>
                           $("#input_fields_wrap_x<?php echo $i;?>").on("click",".remove_field", function(e){ //user click on remove text
									e.preventDefault(); $(this).parent('div').remove(); p--;
								})
                           </script>
                                    <?php } ?>
                                    <?php } ?>
                      		 </div>
 
                                   <div class="blockFull"><hr/></div>
                                  <div style="clear:both"></div>
                                  <div class="formtitle">Fixed Assets </div>
                                  <br>

                                 <div class="form-group">
                                  	<label class="control-label col-md-3">Employee <span class="redmi">*</span>
                                    </label>

	                                 <div class="col-md-6">
	                                    <input type="text" name="txtEmployeeNo" id="txtEmployeeNo"  class="input" placeholder="Please specify no. of employees" required value="<?php echo $dataList[0][37];?>">
	                                 </div>
                                      
                                </div>
                             
                                  
                                 <div class="form-group">
                                  	<label class="control-label col-md-3"> Drivers</label>

                                 <div class="col-md-6">
                                    <input type="text" name="txtDrivers" id="txtDrivers" placeholder="Please specify no. of drivers" class="input" value="<?php echo $dataList[0][38];?>">
                                 </div>
                                       
                               </div>
                               
                                  
                               <div class="form-group">
                                  	<label class="control-label col-md-3">Trucks </label>
                                 
                                 <div class="col-md-6">
                                    <input type="text" name="txtTrucks" id="txtTrucks" class="input"  placeholder="Please specify no. of trucks" value="<?php echo $dataList[0][39];?>">
                                  </div>
                                       
                               </div>
                                 
                                  
                                <div class="form-group">
                                  	<label class="control-label col-md-3">Warehouse</label>
                                     <div class="col-md-6">
                                    <input type="text" name="txtWarehouse" placeholder="Please specify area of warehouse" id="txtWarehouse" class="input" value="<?php echo $dataList[0][40];?>" >
                                    </div>
                                       
                               </div>
                               

                                  <div class="form-group">
                                  	<label class="control-label col-md-3">Other Assets </label>
                                    <div class="col-md-6">
                                    <input type="text" name="txtOtherAsset" placeholder="Please specify no. of other assets"   id="txtOtherAsset" class="input"  value="<?php echo $dataList[0][40];?>">
                                    </div>
                                     
                                  <label class="control-label col-md-12">
                                 <a href="fixed_assets.php"   onclick="return hs.htmlExpand(this, { objectType: 'iframe',height: 450,width: 700 } )">Click to upload photos of fixed assets</a>
                                        
                                        </label>

                                  </div>
                               </div>
                                
                     
              <div class="booking-complete" align="center"> 
							<button class="btn btn-primary" name="btnNext" id="btnNext" type="button"  style="float:left; margin-left:10PX;" value="Next"   title="Click this button to go to the next" onClick="javascript:window.location='edit_userdata_page2.php'">Next</button>
                             
                            <button class="btn btn-primary" name="update" id="update" type="submit" style="float:left; margin-left:10PX;" value="Update"   title="Click this button to update data" onClick="return xx()">Update</button>
                         
                              
                               
							</div>              
                                       
                                
                            </form>
                        </div>
                    </div>                </div>
            </div>
            
            <!-- main menu -->
             <?php include("include/nav.php");?>

        </div>
		
        <!-- jQuery -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/lightbox-plus-jquery.min.js"></script>
        <!-- jQuery Cookie -->
        <script src="assets/js/jqueryCookie.min.js"></script>
        <!-- Bootstrap Framework -->
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <!-- retina images -->
        <script src="assets/js/retina.min.js"></script>
        <!-- switchery -->
        <script src="assets/lib/switchery/dist/switchery.min.js"></script>
        <!-- typeahead -->
        <script src="assets/lib/typeahead/typeahead.bundle.min.js"></script>
        <!-- fastclick -->
        <script src="assets/js/fastclick.min.js"></script>
        <!-- match height -->
        <script src="assets/lib/jquery-match-height/jquery.matchHeight-min.js"></script>
        <!-- scrollbar -->
        <script src="assets/lib/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
         <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBS7ngGD4Xesm8Ec9EArp0qG7dD-x11mT8"></script>
        <script src="assets/js/scripts.js"></script>
        <script src="assets/js/scripts_province.js"></script>
        <!-- Yukon Admin functions -->
        <script src="assets/js/yukon_all.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
        
        <script>
        $(document).ready(function() {
			$('#FCKeditor').summernote({
				height: 200,                 // set editor height
				minHeight: null,             // set minimum height of editor
				maxHeight: null,             // set maximum height of editor
				focus: true
			});                  // set focus to editable area after initializing summernote
		
			//initialize save data function
			//saveFormData(60);
		});
        </script>
        
    </body>

<!-- Mirrored from yukon.tzdthemes.com/html/pages-user_profile2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Jun 2016 10:23:41 GMT -->
</html>
