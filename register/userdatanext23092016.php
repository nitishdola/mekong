<?php
session_start();
ob_start();
/*if(!isset($_SESSION['user_id']) && ($_SESSION['register']==""))
{
	echo "<script>window.location='index.php';</script>";
}
if((!isset($_SESSION['data_id']))||($_SESSION['data_id']==""))
{
	echo "<script>window.location='userdata.php';</script>";
}*/
?>
<?php
include("../include/globalIncWeb.php");
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
		$selTypeOrgType = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['selTypeOrgType']))),ENT_QUOTES);
		if($selTypeOrgType=="Others")
		$selTypeOrgTypeOther = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtOrgTypeOther']))),ENT_QUOTES);
		if($chkMember=="gms")
		{
			$selTypeOrgName = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['selTypeOrgName']))),ENT_QUOTES);
			$selTypeOrgNameOther = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['selTypeOrgNameOther']))),ENT_QUOTES);
			$selCountryBasedIn = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['selCountryBasedIn']))),ENT_QUOTES);
		}
		else
		{
			$selTypeOrgName = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtOrgName']))),ENT_QUOTES);
			$selCountryBasedIn = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['selCountryNon']))),ENT_QUOTES);
		}
		 $sql = "update tbl_user_data set core_services='$chkBusinessCon',core_services_other='$txtBusinessOther',industry_focus='$chkIndustryCon',industry_focus_other='$txtIndustryOther',info_serv='$txtInformation',other_services='$selOtherServiceCon',other_services_other='$selOtherServiceOther',business_area_region='$selAreaCon',business_area_descrip='$txtRegionDetailCon',employee='$txtEmployeeNo',driver='$txtDrivers',trucks='$txtTrucks',warehouse='$txtWarehouse',other_assets='$txtOtherAsset',reg_year='$txtRegYear',reg_authority='$txtRegAuthority',reg_no='$txtRegNo',proprietary_status='$chkProStatus',proprietary_status_other='$proprietary_status_other',reg_capital_txt='$txtRegAmt',annual_turnover='$txtTurnAmt',annual_rev='$txtAnnualRevAmt',membership='$chkMember',country_based='$selCountryBasedIn',org_name='$selTypeOrgName',org_name_other='$selTypeOrgNameOther',org_type='$selTypeOrgType',org_type_other='$selTypeOrgTypeOther',success_story='$txtSuccess',status='1',idustry_focus_des='$txtIndustryCon' where id='".$_SESSION['data_id']."'";
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
    <script type="text/javascript" src="../highslide/highslide-full.js"></script>
<link rel="stylesheet" type="text/css" href="../highslide/highslide.css" />
<script type="text/javascript">
    hs.graphicsDir = '../highslide/graphics/';
    hs.outlineType = 'rounded-white';
    hs.wrapperClassName = 'draggable-header';
	hs.align='center';
	hs.dimmingOpacity = 0.7;
</script>
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
   <div align="center"><img src="images/2.png"></div><br>
<br>

	<div class="thm-container">
		<div class="row">	
		
        <form id="form1" name="form1" action="" method="post" enctype="multipart/form-data">
                    <div class="container callout" style="background-color:#FFF">
						<div class="booking-left" >
                     <div class="fdiv">
                            	  <div class="formtitle">Business Areas</div>
                                  <hr></hr>
                                  <div class="blockFull">
                                  	<div class="blockLeft">Core services<span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Step 1: please select the Business type your company focuses on<br>
Step 2: In line with each business type, please specify the core services covered by your business <br>
Click “+” to add more business types and core services </span></a></div>
                                    <div class="blockRight">
                                    <div style="float:left;">
                                    <input type="checkbox" name="chkBusiness[]" class="c1" id="chkBusiness[]"  value="Freight forwarders"> Freight forwarders </div>
                                    
                                    <div style="float:left; margin-left:5%;">
                                    <input type="checkbox" name="chkBusiness[]" class="c1" id="chkBusiness[]"  value="Truck operator"> Truck operator </div>
                                    <div style="clear:both"></div>
                                    <div style="float:left;">
                                      <input type="checkbox" name="chkBusiness[]" class="c1" id="chkBusiness[]"  value="Warehouse services"> Warehouse services
                                      </div>
                                     
                                    <div style="float:left;">  
                                      &nbsp;<input type="checkbox" name="chkBusiness[]"  class="c1" id="chkBusiness[]"  value="Liner agent air/ocean"> Liner agent air/ocean
                                   </div>
                                    <div style="clear:both"></div>
                                    
                                     <div style="float:left;">
                                      <input type="checkbox" name="chkBusiness[]" class="c1" id="chkBusiness[]"  value="Customs Broker"> Customs Broker
                                      </div>
                                      
                                       <div style="float:left; margin-left:10%;">
                                       <input type="checkbox" name="chkBusiness[]" class="c1" id="chkBusiness[]"  value="Crane / MHE Operator"> Crane/MHE Operator
                                       </div>
                                    <div style="clear:both"></div>
                                   
                                   
                                    <div style="float:left;">
                                      <input type="checkbox" name="chkBusiness[]" class="c1" id="chkBusiness[]"  value="Lead Logistics Provider"> Lead Logistics Provider   
                                     </div>
                                    <div style="float:left; margin-left:5%;">      
                                       <input type="checkbox" name="chkBusiness[]" class="c1" id="chkBusiness[]"  value="Consolidator"> Consolidator                          </div>
                                   
                                <div style="clear:both"></div>  
                                
                                 <div>
                                   <input type="checkbox" name="chkBusiness[]" class="c1" id="chkBusiness[]"  value="Inland Container Depot/CY/Dry port operator"> Inland Container Depot/CY/Dry port operator
                                   </div>   
                               <div style="clear:both"></div>   
                              <div style="float:left;"> 
                                       <input type="checkbox" name="chkBusiness[]" class="c1" id="chkBusiness[]"  value="Rail-freight Operator"> Rail-freight Operator</div>     
                              <div style="float:left; margin-left:5%;">          
                                   <input type="checkbox" name="chkBusiness[]" class="c1" id="chkBusiness1"  value="Others"> Others                         		</div>
                                   
                              <div style="clear:both"></div>  
                              
                              <div style="display:none" id="txtBusiDisp">
                              <input type="text" name="txtBusinessOther" id="txtBusinessOther" class="input">
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
							 <div style="clear:both"></div>
                             
                             <div class="blockFull">
                                  	<div class="blockLeft">Other services offered:  <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Please provide the information system which your company has been using to track / manage your logistics services   </span></a> </div>
                                    <div class="blockRight"  id="input_fields_wrap_otherservice">
                                    	<select name="selOtherService[]" id="selOtherService[]" style="width:100%; height:30px; font-size:11px;">
                                         <option value="">Select</option>
                                        <option value="General Freight Forwarding">General Freight Forwarding</option>
<option value="Air-freight forwarding">Air-freight forwarding</option>
<option value="a/f FOB Handling">a/f FOB Handling</option>
<option value="Courier services">Courier services</option>
<option value="Express service">Express service</option>
<option value="Hand-carry service">Hand-carry service</option>
<option value="Air-freight consolidation">Air-freight consolidation</option>
<option value="Air-freight deconsolidation (breakbulk)">Air-freight deconsolidation (breakbulk)</option>
<option value="Aircraft chartering (broking)">Aircraft chartering (broking)</option>
<option value="Airport customs brokerage">Airport customs brokerage</option>
<option value="Door-to-door cargo delivery">Door-to-door cargo delivery</option>
<option value="Perishable cargo">Perishable cargo</option>
<option value="Marine Parts logistics">Marine Parts logistics</option>
<option value="Pets and animal forwarding">Pets and animal forwarding</option>
<option value="Valuable cargo">Valuable cargo</option>
<option value="Airline agency (CSA)">Airline agency (CSA)</option>
<option value="Travel and ticketing services">Travel and ticketing services</option>
<option value="Airport cargo handling services">Airport cargo handling services</option>
<option value="Airport warehousing">Airport warehousing</option>
<option value="Mechanical handling equipment">Mechanical handling equipment</option>
<option value="Ocean freight forwarding">Ocean freight forwarding</option>
<option value="o/f FOB Handling">o/f FOB Handling</option>
<option value="Full container load">Full container load</option>
<option value="Less than container load">Less than container load</option>
<option value="Breakbulk and special cargo">Breakbulk and special cargo</option>
<option value="Seaport customs brokerage">Seaport customs brokerage</option>
<option value="Ocean-freight consolidations">Ocean-freight consolidations</option>
<option value="Ocean-freight deconsolidation (breakbulk)">Ocean-freight deconsolidation (breakbulk)</option>
<option value="Ship-chartering (broking)">Ship-chartering (broking)</option>
<option value="Door-to-door deliveries">Door-to-door deliveries</option>
<option value="Liner agency">Liner agency</option>
<option value="Port Agency">Port Agency</option>
<option value="Stevedores / port cargo handling services">Stevedores / port cargo handling services</option>
<option value="Port warehouse management">Port warehouse management</option>
<option value="Container depot management">Container depot management</option>
<option value="Container trucking">Container trucking</option>
<option value="Project forwarding">Project forwarding</option>
<option value="Project management">Project management</option>
<option value="Heavy-lift forwarding">Heavy-lift forwarding</option>
<option value="Offshore support">Offshore support</option>
<option value="Intermodal and Multi Modal Transport">Intermodal and Multi Modal Transport</option>
<option value="Rail-freight forwarding">Rail-freight forwarding</option>
<option value="Road Freight">Road Freight</option>
<option value="International / cross border trucking">International / cross border trucking</option>
<option value="International parcels / consolidation">International parcels / consolidation</option>
<option value="Cross-border customs brokerage">Cross-border customs brokerage</option>
<option value="Domestic trucking">Domestic trucking</option>
<option value="Domestic distribution">Domestic distribution</option>
<option value="Domestic parcels / consolidation">Domestic parcels / consolidation</option>
<option value="Trucking of liquid tankers / bulk powder / silo trucks">Trucking of liquid tankers / bulk powder / silo trucks</option>
<option value="Trucking of hazardous chemicals and fuel">Trucking of hazardous chemicals and fuel</option>
<option value="Trucking of containers">Trucking of containers</option>
<option value="Trucking of minerals, building materials or bulk agricultural products">Trucking of minerals, building materials or bulk agricultural products</option>
<option value="Other specialised trucking e.g. car carriers,  etc">Other specialised trucking e.g. car carriers,  etc</option>
<option value="Heavy-lift trucking">Heavy-lift trucking</option>
<option value="Heavy-lift positioning and Installation">Heavy-lift positioning and Installation</option>
<option value="Cranage and mechanical handling equipment ">Cranage and mechanical handling equipment </option>
<option value="Warehousing">Warehousing</option>
<option value="Bulk storage">Bulk storage</option>
<option value="Racked warehouse">Racked warehouse</option>
<option value="Cross-docking warehouse">Cross-docking warehouse</option>
<option value="Distribution warehouse">Distribution warehouse</option>
<option value="Inbound warehouse">Inbound warehouse</option>
<option value="Bonded warehouse">Bonded warehouse</option>
<option value="Temperature-controlled warehouse">Temperature-controlled warehouse</option>
<option value="Hazardous cargo warehouse">Hazardous cargo warehouse</option>
<option value="Tank, silo  or other specialized storage facilities">Tank, silo  or other specialized storage facilities</option>
<option value="Distribution logistics">Distribution logistics</option>
<option value="Sourcing logistics">Sourcing logistics</option>
<option value="Reverse Logistics">Reverse Logistics</option>
<option value="Inventory management">Inventory management</option>
<option value="Warehouse management systems">Warehouse management systems</option>
<option value="Kitting and assembly">Kitting and assembly</option>
<option value="Cargo handling, loading and unloading">Cargo handling, loading and unloading</option>
<option value="Labelling">Labelling</option>
<option value="Re-packaging">Re-packaging</option>
<option value="Pre-inspection">Pre-inspection</option>
<option value="Document preparation">Document preparation</option>
<option value="3PL / Lead Logistics Provider">3PL / Lead Logistics Provider</option>
<option value="4PL / Consultancy services">4PL / Consultancy services</option>
<option value="Chemicals and hazardous cargo logistics">Chemicals and hazardous cargo logistics</option>
<option value="Fine Arts and Museum Logistics">Fine Arts and Museum Logistics</option>
<option value="Fairs and Events Logistics">Fairs and Events Logistics</option>
<option value="Household movers">Household movers</option>
<option value="Temperature-controlled logistics">Temperature-controlled logistics</option>
<option value="Hazardous cargo specialists">Hazardous cargo specialists</option>
<option value="Valuable cargo/bullion/cash/secured transport">Valuable cargo/bullion/cash/secured transport</option>
<option value="Green Logistics">Green Logistics</option>
<option value="Animal transport services">Animal transport services</option>
<option value="Survey agent">Survey agent</option>
<option value="International Trade Documentation Management">International Trade Documentation Management</option>
<option value="Import and Export Management">Import and Export Management</option>
<option value="Import license management">Import license management</option>
<option value="Certificate of Origin (C/O) Applications">Certificate of Origin (C/O) Applications</option>
<option value="Logistics manpower staff provision">Logistics manpower staff provision</option>
<option value="Other">Other</option>
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
                                   </div>
                                <div class="blockImg">
                                        <a href="javascript:void(0)" id="add_field_button_otherservice"> <img src="images/plus_add_blue.png" > </a></div>
                                      
                                
                           </div>
                                   
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                  	<div class="blockLeft">Industry Focus<span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Step 1: please select the industry your company focuses on<br>
Step 2: In line with each industry, please specify the products covered by your business <br>
Click “+” to add more industry focus and products </span></a></div>
                                    <div class="blockRight" id="input_fields_wrap_industry">
                                  
                                    <div>
                                    <input type="checkbox" name="chkIndustry[]" id="chkIndustry1"  value="Raw agri-products" class="c2"> Raw agri-products </div>
                                    <input type="text" name="txtIndustry[]" value="" id="txtIndustry1" class="input" style="display:none">
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
                                 
                                    <div>
                                 <input type="checkbox" name="chkIndustry[]" id="chkIndustry2" class="c2"  value="Processed agri-products"> Processed agri-products</div>
                                <input type="text" name="txtIndustry[]" value="" id="txtIndustry2" class="input" style="display:none">
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
                                
                                    
                                    <div>
                                    <input type="checkbox" class="c2" name="chkIndustry[]" id="chkIndustry3"  value="Manufactured items"> Manufactured items</div>
                                    
                                    <input type="text" name="txtIndustry[]" value="" id="txtIndustry3" class="input" style="display:none">
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
                                    <div>
                                  <input type="checkbox" class="c2" name="chkIndustry[]" id="chkIndustry4"  value="Construction materials"> Construction materials</div>
                                    <input type="text" name="txtIndustry[]" value="" id="txtIndustry4" class="input" style="display:none">
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
                                    
                                     <div>
                                    <input type="checkbox" class="c2" name="chkIndustry[]" id="chkIndustry5"  value="Consumer products"> Consumer products</div>
                                    <input type="text" name="txtIndustry[]" value="" id="txtIndustry5" class="input" style="display:none">
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
                                    <div>
                                  <input type="checkbox" class="c2" name="chkIndustry[]" id="chkIndustry6"  value="Inland Container Depot"> Inland Container Depot</div>
                                   <input type="text" name="txtIndustry[]" value="" id="txtIndustry6" class="input" style="display:none">
                                 <script type="text/javascript">
								(function($) {
									$("#chkIndustry6").click(function() {
										if($("#txtIndustry6").is(':hidden'))
										{
											$("#txtIndustry6").slideDown("normal");
										}
										else
										{
											$("#txtIndustry6").slideUp("normal");
										}
									});
									
								})(jQuery);
								</script>  
                                   
                                    
                                    <div>
                                    <input type="checkbox" class="c2" name="chkIndustry[]" id="chkIndustry7"  value="Minerals"> Minerals</div>
                                     <input type="text" name="txtIndustry[]" value="" id="txtIndustry7" class="input" style="display:none">
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
                                    <div>
                                  <input type="checkbox" class="c2" name="chkIndustry[]" id="chkIndustry8"  value="Dangerous Goods">  Dangerous Goods</div>
                                   
                                   <input type="text" name="txtIndustry[]" value="" id="txtIndustry8" class="input" style="display:none">
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
                                    
                                    
                                     <div>
                                    <input type="checkbox" class="c2" name="chkIndustry[]" id="chkIndustry9"  value="Project Cargo"> Project Cargo</div>
                                    <div>
                                    <input type="text" name="txtIndustry[]" value="" id="txtIndustry9" class="input" style="display:none">
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
                                    
                                    
                                <input type="checkbox" class="c2" name="chkIndustry[]" id="chkIndustry10"  value="Others"> Others</div>
                                    
                                     <input type="text"  name="txtIndustryOther" id="txtIndustryOther" value="" class="input" style="width:100%; display:none" /><script type="text/javascript">
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
                                       
                                       </div>
                                      
                           </div>
                                   
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                  	<div class="blockLeft">Information System Applied in Services <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Please provide the information system which your company has been using to track / manage your logistics services   </span></a> </div>
                                    <div class="blockRight">
                                       <input type="text"  name="txtInformation" id="txtInformation" required   value="" class="input" /></div>
                                      
                           </div>
                                   
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                  	<div class="blockLeft">Business Areas <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Please select the Regions and countries, and provinces and cities  where your business are operating <br>
“Region” and “country” are compulsory field, while province and cities are optional 
  </span></a></div>
                                    
                                    <div class="blockRight" id="input_fields_wrap_area">
                                    <select style="height:30px; width:100%" name="selArea[]" id="selArea[]" required>
                                    <option value="">Select Region</option>
                                    <optgroup label="Africa"></optgroup>
                                    <option value="Eastern Africa">Eastern Africa</option>
                                    <option value="Middle Africa">Middle Africa</option>
                                    <option value="Northern Africa">Northern Africa</option>
                                    <option value="Southern Africa">Southern Africa</option>
                                    <option value="Western Africa">Western Africa</option>
                                    
                                    <optgroup label="Americas"></optgroup>
                                    <option value="Latin America">Latin America</option>
                                    <option value="Northern America">Northern America</option>
                                    
                                    <optgroup label="Asia"></optgroup>
                                    <option value="Central Asia">Central Asia</option>
                                    <option value="Eastern Asia">Eastern Asia</option>
                                    <option value="Southern Asia">Southern Asia</option>
                                    <option value="South-Eastern Asia">South-Eastern Asia</option>
                                   <option value="Western Asia">Western Asia</option>
                                   
                                    <optgroup label="Europe"></optgroup>
                                    <option value="Eastern Europe">Eastern Europe</option>
                                    <option value="Northern Europe">Northern Europe</option>
                                    <option value="Southern Europe">Southern Europe</option>
                                    <option value="Western Europe">Western Europe</option>
                                    
                                    <optgroup label="Oceania"></optgroup>
                                    <option value="Australia/New Zealand">Australia/New Zealand</option>
                                    <option value="Melanesia">Melanesia</option>
                                    <option value="Micronesia">Micronesia</option>
                                    <option value="Polynesia">Polynesia</option>
                                    </select>
                                    
                                    <input type="text"  name="txtRegionDetail[]" id="txtRegionDetail[]" placeholder="Please specify your business area"    value="" class="input"  />
                                       </div>
                                    
                                    <div class="blockImg">
                                        <a href="javascript:void(0)"> <img src="images/plus_add_blue.png" id='add_field_button_area'> </a></div>
                                      
                           </div>
                                   
                                  <div style="clear:both"></div>
                                   <div class="blockFull"><hr/></div>
                                  <div style="clear:both"></div>
                                  <div class="formtitle">Fixed Assets </div>
                                  
                                  <div class="blockFull">
                                  	<div class="blockLeft">Employee <span class="redmi">*</span> <a  class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />
                                  Please provide the number of your employees and add the description<br/><br/> Click on the image icon to upload their image and description</span></a></div>
                                    <div class="blockRight">
                                   
                                    <input type="text" name="txtEmployeeNo" id="txtEmployeeNo"  class="input" placeholder="Please specify no. of employees" required>
                                    </div>
                                      
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                  	<div class="blockLeft">Drivers <a  class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />
                                  Please provide the number of your assets and add its description<br/><br/> Click on the image icon to upload their image and description</span></a></div>
                                    <div class="blockRight">
                                    <input type="text" name="txtDrivers" id="txtDrivers" placeholder="Please specify no. of drivers" class="input" >
                                   
                                    </div>
                                       
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                  	<div class="blockLeft">Trucks  <a  class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />
                                  Please provide the number of your trucks and add its description<br/><br/> Click on the image icon to upload their image and description</span></a></div>
                                    <div class="blockRight" id="input_fields_wrap_industry">
                                    <input type="text" name="txtTrucks" id="txtTrucks" class="input"  placeholder="Please specify no. of trucks">
                                  </div>
                                       
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                   <div class="blockFull">
                                  	<div class="blockLeft">Warehouse <a  class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />
                                  Please provide the area of your warehouse and add its description<br/><br/> Click on the image icon to upload their image and description</span></a></div>
                                    <div class="blockRight">
                                    <input type="text" name="txtWarehouse" placeholder="Please specify area of warehouse" id="txtWarehouse" class="input" >
                                    </div>
                                       
                                   </div>
                                  <div style="clear:both"></div>

                                  <div class="blockFull">
                                  	<div class="blockLeft">Other Assets  <a  class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />
                                  Please provide the number of your other assets and add its description<br/><br/> Click on the image icon to upload their image and description</span></a></div>
                                    <div class="blockRight" >
                                    <input type="text" name="txtOtherAsset" placeholder="Please specify no. of other assets"   id="txtOtherAsset" class="input">
                                   
                                    
                                    </div>
                                      <div style="clear:both"></div>
                                    <br>
                                       <div>
                                        <a href="fixed_assets.php"   onclick="return hs.htmlExpand(this, { objectType: 'iframe',height: 450,width: 700 } )">Click to upload photos of fixed assets </a>
                                        </div>
                                   </div>
                                  <div style="clear:both"></div>
                                  
                               </div>   
                               
                               <div class="sdiv">
                               <div class="formtitle">Registration Status</div>
                                  <hr></hr>
                               		 <div class="blockFull">
                                     
                                  	<div class="blockLeft">Year of Registration  <span class="redmi">*</span> </div>
                                    <div class="blockRight">
                                   <select name="txtRegYear" id="txtRegYear" style="height:30px;" required>
                                    <option value="">Select</option>
                                    <?php for($i=1951;$i<=2016;$i++)
									{
										?>
                                     <option value="<?php echo $i;?>"><?php echo $i;?></option>   
                                     <?php } ?>   
                                    </select>
                                    </div>
                                     
                                   </div>
                                  <div style="clear:both"></div>
                                  
                               		<div class="blockFull">
                                  	<div class="blockLeft">Registration Authority   <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Write down the authority where your company registered 
  </span></a></div>
                                    <div class="blockRight">
                                    <input type="text" name="txtRegAuthority"   id="txtRegAuthority" class="input" required>
                                    </div>
                                       
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                  	<div class="blockLeft">Company’s Registration No.   <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />click to upload scanned Registration Certificate or Verified Business License
  </span></a></div>
                                    <div class="blockRight">
                                    <input type="text" name="txtRegNo"   id="txtRegNo" class="input" required>
                                    </div>
                                    <br><br>
                                    <div><a href="registration_img.php"   onclick="return hs.htmlExpand(this, { objectType: 'iframe',height: 450,width: 700 } )">Click to upload photos of Company’s Registration </a></div>
                                       
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                  	<div class="blockLeft">Company Proprietary Status  <span class="redmi">*</span> </div>
                                    <div class="blockRight">
                                    <input type="radio" name="chkProStatus" class="sad"  id="chkProStatus" value="Limited Liabilities "  required>
                                     Limited Liabilities  
                                   <input type="radio" name="chkProStatus" class="sad" value="Partnership"   id="chkProStatus"  required>Partnership
                                    <br>
<input type="radio" name="chkProStatus" value="Sole Proprietary"   id="chkProStatus" class="sad"  required> Sole Proprietary
                                     <input type="radio"  value="Joint Stock  " name="chkProStatus"   id="chkProStatus"  required>Joint Stock  <br>

                                     <input type="radio" name="chkProStatus" class="sad" value="Private Enterprise"  id="chkProStatus"  required> Private Enterprise
<input type="radio" name="chkProStatus"  value="Joint Venture"  id="chkProStatus" class="sad" required> Joint Venture  <br>
 <input type="radio" name="chkProStatus"  value="State Owned Enterprises"  id="chkProStatus" class="sad" required> State Owned Enterprises 
 &nbsp; &nbsp;
 <input type="radio" name="chkProStatus"  value="Other"  id="chkProStatus" class="aaq"  required>Other
 <input type="text" name="txtProOthers" id="txtProOthers" class="input" style="display:none">
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
                                  
                                  <div style="clear:both"></div>
                                    
                                  <div class="blockFull">
                                  	<div class="blockLeft">Registered Capital  <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Please input the amount in USD. If not available, please select your currency and it will be auto converted into USD
  </span></a></div>
                                    <div class="blockRight">
                                    <input type="text" name="txtRegAmt"   id="txtRegAmt" class="input" style="width:55%" >
                                    USD

                                    </div>
                                       
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                  	<div class="blockLeft">Annual Turn Over   <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Please input the amount in USD. If not available, please select your currency and it will be auto converted into USD
  </span></a></div>
                                    <div class="blockRight">
                                    <input type="text" name="txtTurnAmt"   id="txtTurnAmt" class="input" style="width:55%" >
                                    USD

                                    </div>
                                       
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                  	<div class="blockLeft">Annual Revenue   <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Please input the amount in USD. If not available, please select your currency and it will be auto converted into USD
  </span></a></div>
                                    <div class="blockRight">
                                    <input type="text" name="txtAnnualRevAmt"   id="txtAnnualRevAmt" class="input" style="width:55%" >
                                  USD                                 </div>
                                       
                                   </div>
                                  <div style="clear:both"></div>
                                  <hr></hr>
                                  <div class="formtitle">Membership  </div>
                                  
                                  <div style="clear:both"></div>
                                  <div class="blockFull">
                                  	<div class="blockLeft">Membership    <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" /><strong> Membership:</strong> It refer to the organizations which your company are member of. <br>
<strong>GMS Countries:</strong> refer to the organizations/ networks based in China, Cambodia, Lao PDR, Myanmar, Vietnam, Thailand
<br>
<strong>Non-GMS Countries:</strong> refer to the international organizations /networks based outside of the six GMS Countries. 
<br>
<strong>Country based in: </strong>country where the organizations bases in. Please select  “n/a” if it is hardly to identify the location

  </span></a></div>
                                    <div class="blockRight">
                                    <input type="radio" id="chkMember" name="chkMember" value="gms" required> GMS Countries  
                                    &nbsp;&nbsp; <input type="radio"  name="chkMember" id="chkMemberNon" value="non-gms" required> Non-GMS Countries 
                                    
<div id="xz" style="display:none">
<br>
<div>Country based in<br>
<div id="country" style="display:none">
<select name="selCountryBasedIn" id="selCountryBasedIn"  style="height:30px; width:100%">
	<option value="">Select</option>
    <option value="Cambodia">Cambodia</option>
    <option value="Myanmar">Myanmar</option>
    <option value="Laos">Laos</option>
    <option value="Vietnam">Vietnam</option>
    <option value="Thailand">Thailand</option>
    <option value="P.R. China">P.R. China</option>
</select>
</div>

<div id="countryRegion" style="display:none">
 <select style="height:30px; width:100%" name="selCountryNon" id="selCountryNon" >
                                    <option value="">Select Region</option>
                                    <optgroup label="Africa"></optgroup>
                                    <option value="Eastern Africa">Eastern Africa</option>
                                    <option value="Middle Africa">Middle Africa</option>
                                    <option value="Northern Africa">Northern Africa</option>
                                    <option value="Southern Africa">Southern Africa</option>
                                    <option value="Western Africa">Western Africa</option>
                                    
                                    <optgroup label="Americas"></optgroup>
                                    <option value="Latin America">Latin America</option>
                                    <option value="Northern America">Northern America</option>
                                    
                                    <optgroup label="Asia"></optgroup>
                                    <option value="Central Asia">Central Asia</option>
                                    <option value="Eastern Asia">Eastern Asia</option>
                                    <option value="Southern Asia">Southern Asia</option>
                                    <option value="South-Eastern Asia">South-Eastern Asia</option>
                                   <option value="Western Asia">Western Asia</option>
                                   
                                    <optgroup label="Europe"></optgroup>
                                    <option value="Eastern Europe">Eastern Europe</option>
                                    <option value="Northern Europe">Northern Europe</option>
                                    <option value="Southern Europe">Southern Europe</option>
                                    <option value="Western Europe">Western Europe</option>
                                    
                                    <optgroup label="Oceania"></optgroup>
                                    <option value="Australia/New Zealand">Australia/New Zealand</option>
                                    <option value="Melanesia">Melanesia</option>
                                    <option value="Micronesia">Micronesia</option>
                                    <option value="Polynesia">Polynesia</option>
                                    </select>
</div>
</div><br>

Name of the Organization<br>
<div id="gmsOrgName">
<select name="selTypeOrgName" id="selTypeOrgName"  style="height:30px; width:100%">
<option value="">Select</option>
<optgroup label="Cambodia"></optgroup>
<option value="Cambodia Freight Forwarders Association (CAMFFA)">Cambodia Freight Forwarders Association (CAMFFA)</option>
<option value="Cambodia Trucking Association (CAMTA)">Cambodia Trucking Association (CAMTA)</option>
<option value="Young Entrepreneurs Association of Cambodia">Young Entrepreneurs Association of Cambodia</option>
<option value="Cambodia Women Entrepreneurs Association">Cambodia Women Entrepreneurs Association </option>
<option value="Cambodia Chamber of Commerce">Cambodia Chamber of Commerce</option>
<option value="Others">Other </option>

<optgroup label="Laos"> </optgroup>
<option value="Lao National Chamber of Commerce and Industry">Lao National Chamber of Commerce and Industry</option>
<option value="Lao International Freight Forwarders Association (LIFFA)">Lao International Freight Forwarders Association (LIFFA)</option>
<option value="Others">Others </option>

<optgroup label="Myanmar"> </optgroup>
<option value="UMFCCI">UMFCCI </option>
<option value="Myanmar International Freight Forwarders Association">Myanmar International Freight Forwarders Association</option>
<option value="Myanmar Highway Truck Transportation Association">Myanmar Highway Truck Transportation Association </option>
<option value="Myanmar Container Truck Association">Myanmar Container Truck Association </option>
<option value="Myanmar Customs Broker Association">Myanmar Customs Broker Association </option>
<option value="Myanmar Inland water Vessels Owners' Association">Myanmar Inland water Vessels Owners' Association</option>
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
<div id="nonGmsOrgName" style="display:none">
	<input type="text" value="" name="txtOrgName" id="txtOrgName" class="input">
</div>

<div> <br>Type of the Organization <br>
<select name="selTypeOrgType" id="selTypeOrgType"  style="height:30px; width:100%">
	<option value="">Select</option>
	<option value="Governmental Agencies">Governmental Agencies</option>
    <option value="Business Associations">Business Associations </option>
    <option value="Business Network">Business Network</option>
    <option value="Others">Others</option>
</select>

<div id="orgOth" style="display:none">
<input type="text" value="" name="txtOrgTypeOther" id="txtOrgTypeOther" class="input">
</div>



</div>
<br>

<div><a href="member_certificate.php"  onclick="return hs.htmlExpand(this, { objectType: 'iframe',height: 450,width: 700 } )">Click to upload membership certificate</a> <br>
</div>
<div style="clear:both"></div><br>


</label>
</div>
<script type="text/javascript">
(function($) {
	$("#chkMember").click(function() {
		$("#xz").slideDown("normal");
		$("#gmsOrgName").show();
		$("#nonGmsOrgName").hide();
		$("#country").show();
		$("#countryRegion").hide();
		

	});
	$("#chkMemberNon").click(function() {
		$("#xz").slideDown("normal");
		$("#gmsOrgName").hide();
		$("#nonGmsOrgName").show();
		$("#countryRegion").show();
		$("#country").hide();
		
	});
	
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
	
	$("#selTypeOrgType").change(function() {
		if($("#selTypeOrgType").val()=="Others")
		{
			$("#orgOth").slideDown();
		}
		else
		{
			$("#orgOth").slideUp();
		}
	});
	
})(jQuery);
</script>	
                                    </div>
                                       
                                   </div>
                                  <div style="clear:both"></div>
  
  <div class="blockFull">
                                  	<div class="blockLeft">Awards  <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Please list down your awards and upload the scanned awards to add your credibility. 
  </span></a></div>
                                    <div class="blockRight">
                                    <a href="awards.php"   onclick="return hs.htmlExpand(this, { objectType: 'iframe',height: 450,width: 700 } )">click to upload scanned copy</a>

                                    </div>
                                       
                                   </div>
                                  <div style="clear:both"></div>
                                
                                  <div class="blockFull">
                                   <div class="blockLeft">Certifications  <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Please list down your certifications and upload the scanned certifications to add your credibility.
  </span></a></div>
                                    <div class="blockRight">
                                   <a href="certificate.php"   onclick="return hs.htmlExpand(this, { objectType: 'iframe',height: 450,width: 700 } )">click to upload scanned copy</a>

                                    </div>
                                       
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull"></div>
                                  <div style="clear:both"></div>
  
  
                               </div>
                               
                                <div class="blockFull">
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



</body>


</html>