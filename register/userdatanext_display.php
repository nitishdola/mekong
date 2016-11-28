<?php
session_start();
ob_start();

if(!isset($_SESSION['user_id']) && ($_SESSION['register']==""))
{
	//echo "<script>window.location='index.php';</script>";
}
if((!isset($_SESSION['data_id']))||($_SESSION['data_id']==""))
{
	//echo "<script>window.location='userdata.php';</script>";
}
?>
<?php
include("../include/globalIncWeb.php");
if(!isset($_SESSION['user_id']) && ($_SESSION['register']!="register"))
{
	echo "<script>window.location='index.php';</script>";

}
$dataList = getUserdata($_SESSION['user_id'],1);
?>
<?php
if(isset($_POST['submit'])=="Submit")
{
	
		$valid = 1;
		if(!empty($_POST['chkBusiness']))
		{
			
			foreach($_POST['chkBusiness'] as $chkBusiness)
			{
				$chkBusinessCon .= $chkBusiness.",";
				if($chkBusiness=="Others")
					{
						$txtBusinessOther = trim(htmlspecialchars($_POST['txtBusinessOther']),ENT_QUOTES);
					}
					else
					{
						$txtBusinessOther = "";
					}
			}
			$chkBusinessCon = left($chkBusinessCon,strlen($chkBusinessCon)-1);
		}

		
		if(!empty($_POST['chkIndustry']))
		{
			foreach($_POST['chkIndustry'] as $chkIndustry)
			{
				$chkIndustryCon .= $chkIndustry.",";
				if($chkIndustry=="Others")
					{
						$txtIndustryOther = trim(htmlspecialchars($_POST['txtIndustryOther']),ENT_QUOTES);
					}
				else
					{
						$txtIndustryOther = "";
					}
			}
			$chkIndustryCon = left($chkIndustryCon,strlen($chkIndustryCon)-1);
			if($_POST['txtIndustry']!="")
			{
			$txtIndustry = "";
				foreach($_POST['txtIndustry'] as $txtIndustry1)
				{
						if($txtIndustry1!="")
						{
						 $txtIndustry .= $txtIndustry1."#";
						}
					
				}
			$txtIndustryCon = left($txtIndustry,strlen($txtIndustry)-1);
			}
		}
		
		if(!empty($_POST['selOtherService']))
		{
			foreach($_POST['selOtherService'] as $selOtherService)
			{
				$selOtherServiceCon .= $selOtherService."#";
				if($selOtherService=="Other")
				{
				$selOtherServiceOther =  htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtOtherServiceOther']))),ENT_QUOTES);	
				}
				else
				{
					$selOtherServiceOther = "";
				}
			}
			$selOtherServiceCon = left($selOtherServiceCon,strlen($selOtherServiceCon)-1);
		}
		
		//$selOtherService = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['selOtherService']))),ENT_QUOTES);	
		if($selOtherService=="Other")
		{
			$selOtherServiceOther =  htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtOtherServiceOther']))),ENT_QUOTES);	
		}
		else
		{
			$selOtherServiceOther = "";
		}
		
		$txtInformation = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtInformation']))),ENT_QUOTES);
		
		if(!empty($_POST['selArea']))
		{
			foreach($_POST['selArea'] as $selArea)
			{
				$selAreaCon .= $selArea.",";
			}
			$selAreaCon = left($selAreaCon,strlen($selAreaCon)-1);
		}
		
		if(!empty($_POST['txtRegionDetail']))
		{
			foreach($_POST['txtRegionDetail'] as $txtRegionDetail)
			{
				$txtRegionDetailCon .= $txtRegionDetail.",";
			}
			$txtRegionDetailCon = left($txtRegionDetailCon,strlen($txtRegionDetailCon)-1);
		}
		
		if(!empty($_POST['selLocation']))
		{
			foreach($_POST['selLocation'] as $selLocation)
			{
				$selLocation .= $selLocation.",";
			}
			$selLocationM = left($selLocation,strlen($selLocation)-1);
		}
		
		$txtEmployeeNo = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtEmployeeNo']))),ENT_QUOTES);
		$txtDrivers = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtDrivers']))),ENT_QUOTES);
		$txtTrucks = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtTrucks']))),ENT_QUOTES);
		$txtWarehouse = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtWarehouse']))),ENT_QUOTES);
		$txtEquipment = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtEquipment']))),ENT_QUOTES);
		$txtOtherAsset = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtOtherAsset']))),ENT_QUOTES);
		$txtRegYear = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtRegYear']))),ENT_QUOTES);
		$txtRegNo = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtRegNo']))),ENT_QUOTES);
		$txtRegAuthority = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtRegAuthority']))),ENT_QUOTES);
		$chkProStatus = trim(htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['chkProStatus']))),ENT_QUOTES));
		$proprietary_status_other = trim(htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtProOthers']))),ENT_QUOTES));
		$txtRegAmt = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtRegAmt']))),ENT_QUOTES);
		$txtTurnAmt = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtTurnAmt']))),ENT_QUOTES);
		$txtAnnualRevAmt = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtAnnualRevAmt']))),ENT_QUOTES);
		$chkMember = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['chkMember']))),ENT_QUOTES);
		$txtOrganisation = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtOrganisation']))),ENT_QUOTES);
		$selTypeOrg = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['selTypeOrg']))),ENT_QUOTES);
		$employeeRegion = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['employeeRegion']))),ENT_QUOTES);
		$txtSuccess = htmlspecialchars($_POST['FCKeditor'],ENT_QUOTES);
		$selTypeOrgName = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['selTypeOrgName']))),ENT_QUOTES);
		$youtube_id = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtMarketYoutube']))),ENT_QUOTES);
		if($selTypeOrgName=="Others")
		$selTypeOrgNameOther = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtOrgTypeOther']))),ENT_QUOTES);
		$sql = "update tbl_user_data set core_services='$chkBusinessCon',core_services_other='$txtBusinessOther',industry_focus='$chkIndustryCon',industry_focus_other='$txtIndustryOther',info_serv='$txtInformation',other_services='$selOtherServiceCon',other_services_other='$selOtherServiceOther',business_area_region='$selAreaCon',business_area_descrip='$txtRegionDetailCon',employee='$txtEmployeeNo',driver='$txtDrivers',trucks='$txtTrucks',warehouse='$txtWarehouse',other_assets='$txtOtherAsset',reg_year='$txtRegYear',reg_authority='$txtRegAuthority',reg_no='$txtRegNo',proprietary_status='$chkProStatus',proprietary_status_other='$proprietary_status_other',org_name='$selTypeOrgName',org_name_other='$selTypeOrgNameOther',membership_location='$selLocationM',youtube_id='$youtube_id',success_story='$txtSuccess',status='1',idustry_focus_des='$txtIndustryCon' where id='".$_SESSION['data_id']."'";
			if($cn == false)
				connect3db();
				$res = mysql_query($sql);
				if($res)
				{
					$sqlu = "update tbl_img set status='1' where data_id='".$_SESSION['data_id']."'";
					$resu = mysql_query($sqlu);
					unset($_SESSION['data_id']);
					$_SESSION['data_id']=="";
					echo "<script>window.location='confirm.php';</script>";
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
	<script type="text/javascript" src="js/usernextdata.js"></script>
	<link rel="stylesheet" href="css/style-userdata.css" />
	<link href="css/uploadfile.css" rel="stylesheet">
	<script src="js/jquery.uploadfile.min.js"></script>
	 <style>
	 .form-horizontal label{
		
		font-size: 12px  !important; 
		font-weight:normal !important;
		text-align:left !important;
		
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

    </style>
    <link rel="stylesheet" href="css/form.css">
    <script type="text/javascript" src="../highslide/highslide-full.js"></script>
<link rel="stylesheet" type="text/css" href="../highslide/highslide.css" />
<script type="text/javascript">
    hs.graphicsDir = '../highslide/graphics/';
    hs.outlineType = 'rounded-white';
    hs.wrapperClassName = 'draggable-header';
	hs.align='center';
	hs.dimmingOpacity = 0.7;
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
   <div align="center"><img src="images/2.png"></div><br>
<br>

	<div class="thm-container">
		<div class="row">	
		<div class="col-md-4"></div><div class="col-md-4" id="timer"></div><div class="col-md-4"></div>
        <form id="form1" class="form-horizontal row-border" name="form1" action="" method="post" enctype="multipart/form-data">
                    <div >
						<div>
                     <div class="col-md-6">
						<div class="formtitle">Business Areas</div>
                                  <hr></hr>
                            <div class="form-group">
						    <label class="control-label col-md-3">Core services<span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />	Multiple options.<br>
 
	Please select your core services. <br>
	Please select ‘others’ if your services are out of the given list and please fill in the details in the box. 
 </span></a></label>
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
                                  	<label class="control-label col-md-3">Detailed services offered:  <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />	Please select your more specific services from the drop-down list<br>
 
	Click + to add more services from the list 
</span></a> </label>
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
                                  	<label class="control-label col-md-3">Industry Focus<span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Step 1: please select the industry your company focuses on<br>
Step 2: In line with each industry, please specify the products covered by your business <br>
Click “+” to add more industry focus and products </span></a></label>
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
                                  	<label class="control-label col-md-3">Information System Applied in Services <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Please provide the information system which your company has been using to track / manage your logistics services, e.g. GPS, Mobile communication, social network etc.  </span></a> </label>

                                    <div class="col-md-7">
                                       <input type="text"  name="txtInformation" id="txtInformation" required   class="input" value="<?php echo $dataList[0][34];?>"/>
                                     </div>
                                      
                          		 </div>
                                   
                                  
                                 <div class="form-group">
                                  	<label class="control-label col-md-3">Business Geographic Coverage <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Please select the Regions and countries, and provinces and cities  where your business are operating <br>
“Region” and “country” are compulsory field, while province and cities are optional 
  </span></a></label>
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
                                  	<label class="control-label col-md-3">Employee <span class="redmi">*</span> <a  class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />
                                  	Please provide the number of your employees and add the description<br/><br/> Click on the image icon to upload their image and description</span></a></label>

	                                 <div class="col-md-6">
	                                    <input type="text" name="txtEmployeeNo" id="txtEmployeeNo"  class="input" placeholder="Please specify no. of employees" required value="<?php echo $dataList[0][37];?>">
	                                 </div>
                                      
                                </div>
                             
                                  
                                 <div class="form-group">
                                  	<label class="control-label col-md-3"> Drivers <a  class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />
                                  Please provide the number of your assets and add its description<br/><br/> Click on the image icon to upload their image and description</span></a></label>

                                 <div class="col-md-6">
                                    <input type="text" name="txtDrivers" id="txtDrivers" placeholder="Please specify no. of drivers" class="input" value="<?php echo $dataList[0][38];?>">
                                 </div>
                                       
                               </div>
                               
                                  
                               <div class="form-group">
                                  	<label class="control-label col-md-3">Trucks  <a  class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />
                                  Please provide the number of your trucks and add its description<br/><br/> Click on the image icon to upload their image and description</span></a></label>
                                 
                                 <div class="col-md-6">
                                    <input type="text" name="txtTrucks" id="txtTrucks" class="input"  placeholder="Please specify no. of trucks" value="<?php echo $dataList[0][39];?>">
                                  </div>
                                       
                               </div>
                                 
                                  
                                <div class="form-group">
                                  	<label class="control-label col-md-3">Warehouse <a  class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />
                                  Please provide the area of your warehouse and add its description<br/><br/> Click on the image icon to upload their image and description</span></a></label>
                                     <div class="col-md-6">
                                    <input type="text" name="txtWarehouse" placeholder="Please specify area of warehouse" id="txtWarehouse" class="input" value="<?php echo $dataList[0][40];?>" >
                                    </div>
                                       
                               </div>
                               

                                  <div class="form-group">
                                  	<label class="control-label col-md-3">Other Assets  <a  class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />
                                  Please provide the number of your other assets and add its description<br/><br/> Click on the image icon to upload their image and description</span></a></label>
                                    <div class="col-md-6">
                                    <input type="text" name="txtOtherAsset" placeholder="Please specify no. of other assets"   id="txtOtherAsset" class="input"  value="<?php echo $dataList[0][40];?>">
                                    </div>
                                     
                                  <label class="control-label col-md-12">
                                 <a href="fixed_assets.php"   onclick="return hs.htmlExpand(this, { objectType: 'iframe',height: 450,width: 700 } )">Click to upload photos of fixed assets</a>
                                        
                                        </label>

                                  </div>
                               </div>   
                               
                               <div class="col-md-6">
                               <div class="formtitle">Registration Status</div>
                                  <hr></hr>
                               		 <div class="form-group">
                                     
                                  	<label class="control-label col-md-3">Year of Registration  <span class="redmi">*</span> </label>
                                   <div class="col-md-7">
                                   <select name="txtRegYear" id="txtRegYear" style="height:30px; font-size:11px;" required>
                                    <option value="">Select</option>
                                    <?php for($i=1951;$i<=2016;$i++)
									{
										?>
                                     <option value="<?php echo $i;?>" <?php if($dataList[0][42]==$i) echo "selected";?>><?php echo $i;?></option>   
                                     <?php } ?>   
                                    </select>
                                    </div>
                                     
                                   </div>
                                
                                  
                               		<div class="form-group">
                                  	<label class="control-label col-md-3">Registration Authority   <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Write down the authority where your company is registered 
  </span></a></label>
                                    <div class="col-md-7">
                                    <input type="text" name="txtRegAuthority"   id="txtRegAuthority" class="input" required value="<?php echo $dataList[0][43];?>">
                                    </div>
                                       
                                   </div>
                               
                                 <div class="form-group">
                                  	<label class="control-label col-md-3">Company’s Registration No.   <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Please provide your company’s registration number. 

<br>
Suggest but not mandatory to upload scanned registration file to add credibility to your company
  </span></a></label>
                                   <div class="col-md-7">
                                    <input type="text" name="txtRegNo"   value="<?php echo $dataList[0][44];?>" id="txtRegNo" class="input" required>
                                    <label class="control-label col-md-12">
                                    <a href="registration_img.php"   onclick="return hs.htmlExpand(this, { objectType: 'iframe',height: 450,width: 700 } )">Click to upload photos of Company’s Registration </a>
                                    </label>
                                   </div>
                                 </div>
                                  
                                 <div class="form-group">
                                  	<label class="control-label col-md-3">Company Proprietary Status  <span class="redmi">*</span> </label>
                                    <div class="col-md-7">
                                    <label class="control-label col-md-12">
                                    <input type="radio" name="chkProStatus" class="sad"  id="chkProStatus" value="Limited Liabilities "  required <?php if($dataList[0][45]=="Limited Liabilities") echo "checked";?>>
                                     Limited Liabilities 
                                     </label>
                                    <label class="control-label col-md-12">  
                                   <input type="radio" name="chkProStatus" class="sad" value="Partnership"   id="chkProStatus"  required <?php if($dataList[0][45]=="Partnership") echo "checked";?>>Partnership
                                   </label>
                                   
                                   <label class="control-label col-md-12">
<input type="radio" name="chkProStatus" value="Sole Proprietary"   id="chkProStatus" class="sad"  required <?php if($dataList[0][45]=="Sole Proprietary") echo "checked";?>> Sole Proprietary
								   </label>
								
								<label class="control-label col-md-12">
                                     <input type="radio"  value="Joint Stock  " name="chkProStatus"   id="chkProStatus"  required <?php if($dataList[0][45]=="Joint Stock") echo "checked";?>>Joint Stock  <br>
                                   </label>
                                <label class="control-label col-md-12">
                                     <input type="radio" name="chkProStatus" class="sad" value="Private Enterprise"  id="chkProStatus"  required <?php if($dataList[0][45]=="Private Enterprise") echo "checked";?>> Private Enterprise
                                 </label>

                               <label class="control-label col-md-12">
<input type="radio" name="chkProStatus"  value="Joint Venture"  id="chkProStatus" class="sad" required <?php if($dataList[0][45]=="Joint Venture") echo "checked";?>> Joint Venture
								</label>
								<label class="control-label col-md-12">
 <input type="radio" name="chkProStatus"  value="State Owned Enterprises"  id="chkProStatus" class="sad" required <?php if($dataList[0][45]=="State Owned Enterprises") echo "checked";?>> State Owned Enterprises 
 </label>
 <label class="control-label col-md-12">
 <input type="radio" name="chkProStatus"  value="Other"  id="chkProStatus" class="aaq"  required <?php if($dataList[0][45]=="Other") echo "checked";?>>Other
 </label>
 <input type="text" name="txtProOthers" id="txtProOthers" class="input" <?php if($dataList[0][45]!="Other"){?>style="display:none"<?php } ?> value="<?php echo $dataList[0][61];?>">
 <script type="text/javascript">
(function($) {
	$(".aaq").click(function() {
		$("#txtProOthers").slideDown("normal");
	});
	$(".sad").click(function() {
		$("#txtProOthers").slideUp("normal");
		
	});
	
})(jQuery);
</script>	
                                    </div>
                                   </div> 
 
                                 
                                  
                                  <hr></hr>
                                  <div class="formtitle">Membership  </div>
                                  <br>

                                  <div style="clear:both"></div>
                                  <div class="form-group">
                                  	<label class="control-label col-md-3">Name of Your Membership Organization / Network    <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Please select the organizations /networks from the drop-down list. 

<br>
Please provide specific information if you are a member of others 
</a></label>
<div class="col-md-7">
<select name="selTypeOrgName" id="selTypeOrgName"  style="height:30px; width:100%;font-size:11px;">
<option value="">Select</option>
<optgroup label="Cambodia"></optgroup>
<option value="Cambodia Freight Forwarders Association (CAMFFA)" <?php if($dataList[0][52]=="Cambodia Freight Forwarders Association (CAMFFA)") echo "selected";?>>Cambodia Freight Forwarders Association (CAMFFA)</option>
<option value="Cambodia Trucking Association (CAMTA)" <?php if($dataList[0][52]=="Cambodia Trucking Association (CAMTA)") echo "selected";?>>Cambodia Trucking Association (CAMTA)</option>
<option value="Young Entrepreneurs Association of Cambodia" <?php if($dataList[0][52]=="Young Entrepreneurs Association of Cambodia") echo "selected";?>>Young Entrepreneurs Association of Cambodia</option>
<option value="Cambodia Women Entrepreneurs Association" <?php if($dataList[0][52]=="Cambodia Women Entrepreneurs Association") echo "selected";?>>Cambodia Women Entrepreneurs Association </option>
<option value="Cambodia Chamber of Commerce" <?php if($dataList[0][52]=="Cambodia Chamber of Commerce") echo "selected";?>>Cambodia Chamber of Commerce</option>
<option value="Others" <?php if($dataList[0][52]=="Others") echo "selected";?>>Other </option>

<optgroup label="Laos"> </optgroup>
<option value="Lao National Chamber of Commerce and Industry"  <?php if($dataList[0][52]=="Lao National Chamber of Commerce and Industry") echo "selected";?>>Lao National Chamber of Commerce and Industry</option>
<option value="Lao International Freight Forwarders Association (LIFFA)"  <?php if($dataList[0][52]=="Lao International Freight Forwarders Association (LIFFA)") echo "selected";?>>Lao International Freight Forwarders Association (LIFFA)</option>
<option value="Others" <?php if($dataList[0][52]=="Others") echo "selected";?>>Others </option>

<optgroup label="Myanmar"> </optgroup>
<option value="UMFCCI" <?php if($dataList[0][52]=="UMFCCI") echo "selected";?>>UMFCCI </option>
<option value="Myanmar International Freight Forwarders Association" <?php if($dataList[0][52]=="Myanmar International Freight Forwarders Association") echo "selected";?>>Myanmar International Freight Forwarders Association</option>
<option value="Myanmar Highway Truck Transportation Association" <?php if($dataList[0][52]=="Myanmar Highway Truck Transportation Association") echo "selected";?>>Myanmar Highway Truck Transportation Association </option>
<option value="Myanmar Container Truck Association" <?php if($dataList[0][52]=="Myanmar Container Truck Association") echo "selected";?>>Myanmar Container Truck Association </option>
<option value="Myanmar Customs Broker Association" <?php if($dataList[0][52]=="Myanmar Customs Broker Association") echo "selected";?>>Myanmar Customs Broker Association </option>
<option value="Myanmar Inland water Vessels Owners' Association"  <?php if($dataList[0][52]=="Myanmar Inland water Vessels Owners' Association") echo "selected";?>>Myanmar Inland water Vessels Owners' Association</option>
<option value="Myanmar Coastal Ship Owners' Association">Myanmar Coastal Ship Owners' Association</option>
<option value="Others">Others </option>

<optgroup label="Vietnam"> </optgroup>
<option value="UMFCCI">UMFCCI </option>
<option value="Vietnam Logistics Business Association(VLA)">Vietnam Logistics Business Association(VLA)</option>
<option value="Vietnam Automobile Truck Association (VATA)">Vietnam Automobile Truck Association (VATA) </option>
<option value="Vietnam Chamber of Commerce and Industry (VCCI)">Vietnam Chamber of Commerce and Industry (VCCI)</option>
<option value="Others">Others </option>

<optgroup label="Thailand"> </optgroup>
<option value="Thai International Freight Forwarders Association (TIFFA)">Thai International Freight Forwarders Association (TIFFA)</option>
<option value="Land Transport Federation of Thailand">Land Transport Federation of Thailand</option>
<option value="Thai Chamber of Commerce ">Thai Chamber of Commerce </option>
<option value="Federation of Thai Industries (FTI)">Federation of Thai Industries (FTI)</option>
<option value="Board of Trade Thailand (BoT)">Board of Trade Thailand (BoT)</option>
<option value="Others">Others</option>
</select>
<input type="text" name="selTypeOrgNameOther" id="selTypeOrgNameOther" class="input" style="display:none">
</div>
                                       
<script type="text/javascript">
(function($) {
	$("#selTypeOrgName").change(function() {
		if($("#selTypeOrgName").val()=="Others")
		{
			$("#selTypeOrgNameOther").slideDown();
		}
		else
		{
			$("#selTypeOrgNameOther").slideUp();
		}
	});
	
	
	
})(jQuery);
</script>	
                                    </div>
                                    
 <div class="form-group">
                                  	<label class="control-label col-md-3"> Location of Your Membership Organization / Network <span class="redmi"></span>   <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Please input the amount in USD.
  </span></a></label>
                                   <div class="col-md-7" id="locationMember">
                                    <select style="height:30px; width:91%;font-size:11px;" name="selLocation[]" id="selLocation">
                                    <option value="">Select</option>
    <option value="Afghanistan">Afghanistan</option>
    <option value="Albania">Albania</option>
    <option value="Algeria">Algeria</option>
    <option value="American Samoa">American Samoa</option>
    <option value="Andorra">Andorra</option>
    <option value="Angola">Angola</option>
    <option value="Anguilla">Anguilla</option>
    <option value="Antartica">Antarctica</option>
    <option value="Antigua and Barbuda">Antigua and Barbuda</option>
    <option value="Argentina">Argentina</option>
    <option value="Armenia">Armenia</option>
    <option value="Aruba">Aruba</option>
    <option value="Australia">Australia</option>
    <option value="Austria">Austria</option>
    <option value="Azerbaijan">Azerbaijan</option>
    <option value="Bahamas">Bahamas</option>
    <option value="Bahrain">Bahrain</option>
    <option value="Bangladesh">Bangladesh</option>
    <option value="Barbados">Barbados</option>
    <option value="Belarus">Belarus</option>
    <option value="Belgium">Belgium</option>
    <option value="Belize">Belize</option>
    <option value="Benin">Benin</option>
    <option value="Bermuda">Bermuda</option>
    <option value="Bhutan">Bhutan</option>
    <option value="Bolivia">Bolivia</option>
    <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
    <option value="Botswana">Botswana</option>
    <option value="Bouvet Island">Bouvet Island</option>
    <option value="Brazil">Brazil</option>
    <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
    <option value="Brunei Darussalam">Brunei Darussalam</option>
    <option value="Bulgaria">Bulgaria</option>
    <option value="Burkina Faso">Burkina Faso</option>
    <option value="Burundi">Burundi</option>
    <option value="Cambodia">Cambodia</option>
    <option value="Cameroon">Cameroon</option>
    <option value="Canada">Canada</option>
    <option value="Cape Verde">Cape Verde</option>
    <option value="Cayman Islands">Cayman Islands</option>
    <option value="Central African Republic">Central African Republic</option>
    <option value="Chad">Chad</option>
    <option value="Chile">Chile</option>
    <option value="China">China</option>
    <option value="Christmas Island">Christmas Island</option>
    <option value="Cocos Islands">Cocos (Keeling) Islands</option>
    <option value="Colombia">Colombia</option>
    <option value="Comoros">Comoros</option>
    <option value="Congo">Congo</option>
    <option value="Congo">Congo, the Democratic Republic of the</option>
    <option value="Cook Islands">Cook Islands</option>
    <option value="Costa Rica">Costa Rica</option>
    <option value="Cota D'Ivoire">Cote d'Ivoire</option>
    <option value="Croatia">Croatia (Hrvatska)</option>
    <option value="Cuba">Cuba</option>
    <option value="Cyprus">Cyprus</option>
    <option value="Czech Republic">Czech Republic</option>
    <option value="Denmark">Denmark</option>
    <option value="Djibouti">Djibouti</option>
    <option value="Dominica">Dominica</option>
    <option value="Dominican Republic">Dominican Republic</option>
    <option value="East Timor">East Timor</option>
    <option value="Ecuador">Ecuador</option>
    <option value="Egypt">Egypt</option>
    <option value="El Salvador">El Salvador</option>
    <option value="Equatorial Guinea">Equatorial Guinea</option>
    <option value="Eritrea">Eritrea</option>
    <option value="Estonia">Estonia</option>
    <option value="Ethiopia">Ethiopia</option>
    <option value="Falkland Islands">Falkland Islands (Malvinas)</option>
    <option value="Faroe Islands">Faroe Islands</option>
    <option value="Fiji">Fiji</option>
    <option value="Finland">Finland</option>
    <option value="France">France</option>
    <option value="France Metropolitan">France, Metropolitan</option>
    <option value="French Guiana">French Guiana</option>
    <option value="French Polynesia">French Polynesia</option>
    <option value="French Southern Territories">French Southern Territories</option>
    <option value="Gabon">Gabon</option>
    <option value="Gambia">Gambia</option>
    <option value="Georgia">Georgia</option>
    <option value="Germany">Germany</option>
    <option value="Ghana">Ghana</option>
    <option value="Gibraltar">Gibraltar</option>
    <option value="Greece">Greece</option>
    <option value="Greenland">Greenland</option>
    <option value="Grenada">Grenada</option>
    <option value="Guadeloupe">Guadeloupe</option>
    <option value="Guam">Guam</option>
    <option value="Guatemala">Guatemala</option>
    <option value="Guinea">Guinea</option>
    <option value="Guinea-Bissau">Guinea-Bissau</option>
    <option value="Guyana">Guyana</option>
    <option value="Haiti">Haiti</option>
    <option value="Heard and McDonald Islands">Heard and Mc Donald Islands</option>
    <option value="Holy See">Holy See (Vatican City State)</option>
    <option value="Honduras">Honduras</option>
    <option value="Hong Kong">Hong Kong</option>
    <option value="Hungary">Hungary</option>
    <option value="Iceland">Iceland</option>
    <option value="India">India</option>
    <option value="Indonesia">Indonesia</option>
    <option value="Iran">Iran (Islamic Republic of)</option>
    <option value="Iraq">Iraq</option>
    <option value="Ireland">Ireland</option>
    <option value="Israel">Israel</option>
    <option value="Italy">Italy</option>
    <option value="Jamaica">Jamaica</option>
    <option value="Japan">Japan</option>
    <option value="Jordan">Jordan</option>
    <option value="Kazakhstan">Kazakhstan</option>
    <option value="Kenya">Kenya</option>
    <option value="Kiribati">Kiribati</option>
    <option value="Democratic People's Republic of Korea">Korea, Democratic People's Republic of</option>
    <option value="Korea">Korea, Republic of</option>
    <option value="Kuwait">Kuwait</option>
    <option value="Kyrgyzstan">Kyrgyzstan</option>
    <option value="Lao">Lao People's Democratic Republic</option>
    <option value="Latvia">Latvia</option>
    <option value="Lebanon">Lebanon</option>
    <option value="Lesotho">Lesotho</option>
    <option value="Liberia">Liberia</option>
    <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
    <option value="Liechtenstein">Liechtenstein</option>
    <option value="Lithuania">Lithuania</option>
    <option value="Luxembourg">Luxembourg</option>
    <option value="Macau">Macau</option>
    <option value="Macedonia">Macedonia, The Former Yugoslav Republic of</option>
    <option value="Madagascar">Madagascar</option>
    <option value="Malawi">Malawi</option>
    <option value="Malaysia">Malaysia</option>
    <option value="Maldives">Maldives</option>
    <option value="Mali">Mali</option>
    <option value="Malta">Malta</option>
    <option value="Marshall Islands">Marshall Islands</option>
    <option value="Martinique">Martinique</option>
    <option value="Mauritania">Mauritania</option>
    <option value="Mauritius">Mauritius</option>
    <option value="Mayotte">Mayotte</option>
    <option value="Mexico">Mexico</option>
    <option value="Micronesia">Micronesia, Federated States of</option>
    <option value="Moldova">Moldova, Republic of</option>
    <option value="Monaco">Monaco</option>
    <option value="Mongolia">Mongolia</option>
    <option value="Montserrat">Montserrat</option>
    <option value="Morocco">Morocco</option>
    <option value="Mozambique">Mozambique</option>
    <option value="Myanmar">Myanmar</option>
    <option value="Namibia">Namibia</option>
    <option value="Nauru">Nauru</option>
    <option value="Nepal">Nepal</option>
    <option value="Netherlands">Netherlands</option>
    <option value="Netherlands Antilles">Netherlands Antilles</option>
    <option value="New Caledonia">New Caledonia</option>
    <option value="New Zealand">New Zealand</option>
    <option value="Nicaragua">Nicaragua</option>
    <option value="Niger">Niger</option>
    <option value="Nigeria">Nigeria</option>
    <option value="Niue">Niue</option>
    <option value="Norfolk Island">Norfolk Island</option>
    <option value="Northern Mariana Islands">Northern Mariana Islands</option>
    <option value="Norway">Norway</option>
    <option value="Oman">Oman</option>
    <option value="Pakistan">Pakistan</option>
    <option value="Palau">Palau</option>
    <option value="Panama">Panama</option>
    <option value="Papua New Guinea">Papua New Guinea</option>
    <option value="Paraguay">Paraguay</option>
    <option value="Peru">Peru</option>
    <option value="Philippines">Philippines</option>
    <option value="Pitcairn">Pitcairn</option>
    <option value="Poland">Poland</option>
    <option value="Portugal">Portugal</option>
    <option value="Puerto Rico">Puerto Rico</option>
    <option value="Qatar">Qatar</option>
    <option value="Reunion">Reunion</option>
    <option value="Romania">Romania</option>
    <option value="Russia">Russian Federation</option>
    <option value="Rwanda">Rwanda</option>
    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option> 
    <option value="Saint LUCIA">Saint LUCIA</option>
    <option value="Saint Vincent">Saint Vincent and the Grenadines</option>
    <option value="Samoa">Samoa</option>
    <option value="San Marino">San Marino</option>
    <option value="Sao Tome and Principe">Sao Tome and Principe</option> 
    <option value="Saudi Arabia">Saudi Arabia</option>
    <option value="Senegal">Senegal</option>
    <option value="Seychelles">Seychelles</option>
    <option value="Sierra">Sierra Leone</option>
    <option value="Singapore">Singapore</option>
    <option value="Slovakia">Slovakia (Slovak Republic)</option>
    <option value="Slovenia">Slovenia</option>
    <option value="Solomon Islands">Solomon Islands</option>
    <option value="Somalia">Somalia</option>
    <option value="South Africa">South Africa</option>
    <option value="South Georgia">South Georgia and the South Sandwich Islands</option>
    <option value="Span">Spain</option>
    <option value="SriLanka">Sri Lanka</option>
    <option value="St. Helena">St. Helena</option>
    <option value="St. Pierre and Miguelon">St. Pierre and Miquelon</option>
    <option value="Sudan">Sudan</option>
    <option value="Suriname">Suriname</option>
    <option value="Svalbard">Svalbard and Jan Mayen Islands</option>
    <option value="Swaziland">Swaziland</option>
    <option value="Sweden">Sweden</option>
    <option value="Switzerland">Switzerland</option>
    <option value="Syria">Syrian Arab Republic</option>
    <option value="Taiwan">Taiwan, Province of China</option>
    <option value="Tajikistan">Tajikistan</option>
    <option value="Tanzania">Tanzania, United Republic of</option>
    <option value="Thailand">Thailand</option>
    <option value="Togo">Togo</option>
    <option value="Tokelau">Tokelau</option>
    <option value="Tonga">Tonga</option>
    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
    <option value="Tunisia">Tunisia</option>
    <option value="Turkey">Turkey</option>
    <option value="Turkmenistan">Turkmenistan</option>
    <option value="Turks and Caicos">Turks and Caicos Islands</option>
    <option value="Tuvalu">Tuvalu</option>
    <option value="Uganda">Uganda</option>
    <option value="Ukraine">Ukraine</option>
    <option value="United Arab Emirates">United Arab Emirates</option>
    <option value="United Kingdom">United Kingdom</option>
    <option value="United States">United States</option>
    <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
    <option value="Uruguay">Uruguay</option>
    <option value="Uzbekistan">Uzbekistan</option>
    <option value="Vanuatu">Vanuatu</option>
    <option value="Venezuela">Venezuela</option>
    <option value="Vietnam">Viet Nam</option>
    <option value="Virgin Islands (British)">Virgin Islands (British)</option>
    <option value="Virgin Islands (U.S)">Virgin Islands (U.S.)</option>
    <option value="Wallis and Futana Islands">Wallis and Futuna Islands</option>
    <option value="Western Sahara">Western Sahara</option>
    <option value="Yemen">Yemen</option>
    <option value="Yugoslavia">Yugoslavia</option>
    <option value="Zambia">Zambia</option>
    <option value="Zimbabwe">Zimbabwe</option>
</select><a href="javascript:void(0)"  id='locationMemberButton'> <i class="fa fa-plus-square fa-2x" aria-hidden="true"></i></a>
                                   </div>                            
                                   </div>       
  
  <div class="form-group">
						    <label class="control-label col-md-3">Awards  <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Please list down your awards and upload the scanned awards to add your credibility. 
  </span></a></label>
                                   <label class="control-label col-md-7">
                                    <a href="awards.php"   onclick="return hs.htmlExpand(this, { objectType: 'iframe',height: 450,width: 700 } )">click to upload scanned copy</a>

                                    </label>
                                       
                                   </div>
                                
                                
                                 <div class="form-group">
						    <label class="control-label col-md-3">Certifications  <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Please list down your certifications and upload the scanned certifications to add your credibility.
  </span></a></label>
                                    <label class="control-label col-md-7">
                                   <a href="certificate.php"   onclick="return hs.htmlExpand(this, { objectType: 'iframe',height: 450,width: 700 } )">click to upload scanned copy</a>

                                    </label>
                                       
                                   </div>
  
                              
                               <hr></hr>
                                  <div class="formtitle">Marketing materials </div> 
                               
                               <div class="form-group">
						    <label class="control-label col-md-3"> Marketing materials
                            <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Suggest to upload your company’s marketing materials, including Brochure and Services catalogue in pdf format
  </span></a></label>
                                    <label class="control-label col-md-7">
                                   <a href="marketing.php"   onclick="return hs.htmlExpand(this, { objectType: 'iframe',height: 450,width: 700 } )">click to upload</a>
                                    </label>
                                       
                                   </div>
  
                               
                               
                               <div class="form-group">
						    <label class="control-label col-md-3">Youtube id   <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />
                            Suggest to insert your company’s introduction videolink on youtube 
  </span></a></label>
                                    <label class="control-label col-md-7">
                                   	<input type="text" name="txtMarketYoutube" value="" id="txtMarketYoutube" class="input">
                                    </label>
                                       
                                   </div>
  								</div>
                              
                               
                               
                                <div class="col-md-12">
                                <hr></hr>
                                  <div class="formtitle" style="width:48%">Success Story </div><br>
                                 
                                 
                                   <?php
											include("fckeditor.php");
											$sBasePath = $_SERVER['PHP_SELF'];
											$sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "_samples" ) ) ;
											$oFCKeditor = new FCKeditor('FCKeditor');
											$oFCKeditor->BasePath   = $sBasePath ;
											$oFCKeditor->Height = '330';
											//$oFCKeditor->Value  = $_POST["FCKeditor"];
											$oFCKeditor->Create() ;
											?> 
<br><br>

                                 <div class="row">
                                   		<div class="col-md-1" style="text-align:right"><input type="checkbox" id="chkAccept" name="chkAccept"></div>
                               			<div class="col-md-6"  style="background-color:#F2F2F2; padding:5px;">
                                        I authorize the GMS Logistics Database to publish my company profile for marketing purpose. I affirm that all the information provided here is valid and true. 
                                        </div>
                                   </div> 
                                       <br>
<br>

                                   </div>
                                   
    <div class="booking-complete" align="center">
							<button class="thm-btn" type="button" name="btnSubmit1" id="btnSubmit1"  style="float:left; margin-left:10PX;"  title="Click this button to preview and edit the form if required">Preview</button>
                            	
								<button class="thm-btn" name="submit" type="reset"  style="float:left; margin-left:10PX;">Reset</button>
                                
                                <button class="thm-btn" onClick="return xx()" name="submit" type="submit" style="float:left; margin-left:10PX;" value="Submit">Submit</button>
							</div>
				<div class="clear"></div>                           
                   
                               
				
			</div>
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



</body>


</html>