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

	<!-- flaticon css -->
	<link rel="stylesheet" href="plugins/flaticon/flaticon.css">
	<!-- jQuery ui css -->
	<link href="plugins/jquery-ui-1.11.4/jquery-ui.css" rel="stylesheet">
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
	<link rel="stylesheet" href="css/lightbox.min.css">

	 <style>
	.form-horizontal label{
		
		font-size: 12px  !important; 
		font-weight:normal !important;
		text-align:left !important;
		
	}
	.modal-lg {
    width: 80%; /* respsonsive width */
}
.redmi1{
	font-size: 12px;
	color: #ff0000;
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
		<div class="col-md-4"></div><div class="col-md-4" id="timer"></div><div class="col-md-4"></div>
        <form id="form1" class="form-horizontal row-border" name="form1" action="" method="post" enctype="multipart/form-data">
                    <div >
						<div>
                     <div class="col-md-6">
						<div class="formtitle">Business Areas</div>
                                  <hr></hr>
                            <div class="form-group">
						    <label class="control-label col-md-3"><strong>Core services</strong><span class="redmi1">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />	Multiple options.<br>
 
	Please select your core services. <br>
	Please select ‘others’ if your services are out of the given list and please fill in the details in the box. 
 </span></a></label>
                                    <div class="col-md-7">
                                    
                                    <label class="control-label col-md-12">
                                    <input type="checkbox" name="chkBusiness[]" class="c1" id="chkBusiness[]"  value="Freight forwarders"> Freight forwarders 
                                    </label>
                                    
                                    
                                    <label class="control-label col-md-12">
                                    <input type="checkbox" name="chkBusiness[]" class="c1" id="chkBusiness[]"  value="Truck operator"> Truck operator </label>
                                    

                                    <label class="control-label col-md-12">
                                      <input type="checkbox" name="chkBusiness[]" class="c1" id="chkBusiness[]"  value="Warehouse services"> Warehouse services
                                    </label>
                                     
                                    <label class="control-label col-md-12"> 
                                      <input type="checkbox" name="chkBusiness[]"  class="c1" id="chkBusiness[]"  value="Liner agent air/ocean"> Liner agent air/ocean
                                   </label>
                                   
                                    
                                    <label class="control-label col-md-12">
                                      <input type="checkbox" name="chkBusiness[]" class="c1" id="chkBusiness[]"  value="Customs Broker"> Customs Broker
                                    </label>
                                      
                                     <label class="control-label col-md-12">
                                       <input type="checkbox" name="chkBusiness[]" class="c1" id="chkBusiness[]"  value="Crane / MHE Operator"> Crane/MHE Operator
                                     </label>
                                   
                                   <label class="control-label col-md-12">
                                      <input type="checkbox" name="chkBusiness[]" class="c1" id="chkBusiness[]"  value="Lead Logistics Provider"> Lead Logistics Provider   
                                   </label>

                                  <label class="control-label col-md-12">     
                                       <input type="checkbox" name="chkBusiness[]" class="c1" id="chkBusiness[]"  value="Consolidator"> Consolidator 
                                   </label>
                                   
                                 <label class="control-label col-md-12">   
                                   <input type="checkbox" name="chkBusiness[]" class="c1" id="chkBusiness[]"  value="Inland Container Depot/CY/Dry port operator"> Inland Container Depot/CY/Dry port operator
                                 </label>   
                                 
                                 <label class="control-label col-md-12"> 
                                       <input type="checkbox" name="chkBusiness[]" class="c1" id="chkBusiness[]"  value="Rail-freight Operator"> Rail-freight Operator
                                 </label>  

                              <label class="control-label col-md-12">           
                                   <input type="checkbox" name="chkBusiness[]" class="c1" id="chkBusiness1"  value="Others"> Others                        
                               </label>
                                   
                              
                              
                              <div style="display:none" id="txtBusiDisp">
                              <input type="text" name="txtBusinessOther"  id="txtBusinessOther" class="form-control">
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
                                  	<label class="control-label col-md-3"><strong>Other services offered:</strong>  <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />	Please select your more specific services from the drop-down list<br>
 
	Click + to add more services from the list 
</span></a> </label>

                                    <div class="col-md-7" id="input_fields_wrap_otherservice">
                                    	<select name="selOtherService[]" id="selOtherService[]" class="form-control" style="width:100%; height:30px; font-size:11px;">
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
<option value="Other">Other Special Services</option>
                                        </select>                     
<input type="text"  name="txtOtherServiceOther" id="txtOtherServiceOther" value="" class="form-control" style="display:none" /><script type="text/javascript">
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
                              <div class="col-md-1"> <a href="javascript:void(0)" id="add_field_button_otherservice">  <i class="fa fa-plus-square fa-2x" aria-hidden="true"></i> </a></div>
                           </div>

                                  
                                    <div class="form-group">
                                  	<label class="control-label col-md-3"><strong>Industry Focus</strong><span class="redmi1">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Step 1: please select the industry your company focuses on<br>
Step 2: In line with each industry, please specify the products covered by your business <br>
Click “+” to add more industry focus and products </span></a></label>
                                    <div class="col-md-7" id="input_fields_wrap_industry">
                                    
                                    <label class="control-label col-md-12">
                                    <input type="checkbox" name="chkIndustry[]" id="chkIndustry1"  value="Raw agri-products" class="c2"> Raw agri-products

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
                                 </label>

                                 <label class="control-label col-md-12">
                                 <input type="checkbox" name="chkIndustry[]" id="chkIndustry2" class="c2"  value="Processed agri-products"> Processed agri-products
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
                                 </label>
                                    
                                   <label class="control-label col-md-12">
                                    <input type="checkbox" class="c2" name="chkIndustry[]" id="chkIndustry3"  value="Manufactured items"> Manufactured items
                                    
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
								</label>

                                 <label class="control-label col-md-12">
                                  <input type="checkbox" class="c2" name="chkIndustry[]" id="chkIndustry4"  value="Construction materials"> Construction materials
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
								</label> 
                                    
                                <label class="control-label col-md-12">
                                    <input type="checkbox" class="c2" name="chkIndustry[]" id="chkIndustry5"  value="Consumer products"> Consumer products
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
								</label>
                                    
                               <label class="control-label col-md-12">
                                    <input type="checkbox" class="c2" name="chkIndustry[]" id="chkIndustry7"  value="Minerals"> Minerals
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
								</label>

                               <label class="control-label col-md-12">
                                  <input type="checkbox" class="c2" name="chkIndustry[]" id="chkIndustry8"  value="Dangerous Goods">  Dangerous Goods
                                   
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
                                 </label>   
                                    
                               <label class="control-label col-md-12">
                                    <input type="checkbox" class="c2" name="chkIndustry[]" id="chkIndustry9"  value="Project Cargo"> Project Cargo
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
                                </label>    

                                 <label class="control-label col-md-12">    
                                <input type="checkbox" class="c2" name="chkIndustry[]" id="chkIndustry10"  value="Others"> Others
                                    
                                     <input type="text"  name="txtIndustryOther" id="txtIndustryOther" value="" class="form-control" style="width:100%; display:none" /><script type="text/javascript">
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
                                  	<label class="control-label col-md-3"><strong>Information System Applied in Services</strong> <span class="redmi1">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Please provide the information system which your company has been using to track / manage your logistics services, e.g. GPS, Mobile communication, social network etc.  </span></a> </label>

                                    <div class="col-md-7">
                                       <input type="text"  name="txtInformation" class="form-control" id="txtInformation" required   value="" class="input" />
                                     </div>
                                      
                          		 </div>
                                   
                                  
                                 <div class="form-group">
                                  	<label class="control-label col-md-3"><strong>Business Geographic Coverage</strong> <span class="redmi1">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Please select the Regions and countries, and provinces and cities  where your business are operating <br>
“Region” and “country” are compulsory field, while province and cities are optional 
  </span></a></label>
                                    
                                    <div class="col-md-7" id="input_fields_wrap_area">
                                    <select style="height:30px; width:100%;font-size:11px;" name="selArea[]" id="selArea[]" required>
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
                                    
                                    <input type="text"  name="txtRegionDetail[]" id="txtRegionDetail[]" placeholder="Please specify your business geographic coverage" value="" class="input" style="width: 91%"  />
                                    <a href="javascript:void(0)"  id='add_field_button_area'> <i class="fa fa-plus-square fa-2x" aria-hidden="true"></i></a>
                                     </div>
                      		 </div>
 
                                   <div class="blockFull"><hr/></div>
                                  <div style="clear:both"></div>
                                  <div class="formtitle">Fixed Assets </div>
                                  <br>

                                 <div class="form-group">
                                  	<label class="control-label col-md-3"><strong>Employee</strong> <span class="redmi1">*</span> <a  class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />
                                  	Please provide the number of your employees and add the description<br/><br/> Click on the image icon to upload their image and description</span></a></label>

	                                 <div class="col-md-6">
	                                    <input type="text" name="txtEmployeeNo" id="txtEmployeeNo"  class="form-control" placeholder="Please specify no. of employees" required>
	                                 </div>
                                      
                                </div>
                             
                                  
                                 <div class="form-group">
                                  	<label class="control-label col-md-3"> <strong>Drivers</strong> <a  class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />
                                  Please provide the number of your assets and add its description<br/><br/> Click on the image icon to upload their image and description</span></a></label>

                                 <div class="col-md-6">
                                    <input type="text" name="txtDrivers" class="form-control" id="txtDrivers" placeholder="Please specify no. of drivers" class="input" >
                                 </div>
                                       
                               </div>
                               
                                  
                               <div class="form-group">
                                  	<label class="control-label col-md-3"><strong>Trucks</strong>  <a  class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />
                                  Please provide the number of your trucks and add its description<br/><br/> Click on the image icon to upload their image and description</span></a></label>
                                 
                                 <div class="col-md-6">
                                    <input type="text" name="txtTrucks" class="form-control" id="txtTrucks" class="input"  placeholder="Please specify no. of trucks">
                                  </div>
                                       
                               </div>
                                 
                                  
                                <div class="form-group">
                                  	<label class="control-label col-md-3"><strong>Warehouse</strong> <a  class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />
                                  Please provide the area of your warehouse and add its description<br/><br/> Click on the image icon to upload their image and description</span></a></label>
                                     <div class="col-md-6">
                                    <input type="text" name="txtWarehouse" placeholder="Please specify area of warehouse" id="txtWarehouse" class="form-control">
                                    </div>
                                       
                               </div>
                               

                                  <div class="form-group">
                                  	<label class="control-label col-md-3"><strong>Other Assets</strong>  <a  class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />
                                  Please provide the number of your other assets and add its description<br/><br/> Click on the image icon to upload their image and description</span></a></label>
                                    <div class="col-md-6">
                                    <input type="text" name="txtOtherAsset" placeholder="Please specify no. of other assets"   id="txtOtherAsset" class="form-control">
                                    </div>
                                     
                                  <label class="control-label col-md-12">
                                        <a href="fixed_assets.php"   onclick="return hs.htmlExpand(this, { objectType: 'iframe',height: 450,width: 700 } )">Click to upload photos of fixed assets </a>
                                        </label>
                                

                                  </div>
                               </div>   
                               
                               <div class="col-md-6">
                               <div class="formtitle">Registration Status</div>
                                  <hr></hr>
                               		 <div class="form-group">
                                     
                                  	<label class="control-label col-md-3"><strong>Year of Registration</strong>  <span class="redmi1">*</span> </label>
                                   <div class="col-md-7">
                                   <select name="txtRegYear" id="txtRegYear" style="height:30px; font-size:11px;" required>
                                    <option value="">Select</option>
                                    <?php for($i=1951;$i<=2016;$i++)
									{
										?>
                                     <option value="<?php echo $i;?>"><?php echo $i;?></option>   
                                     <?php } ?>   
                                    </select>
                                    </div>
                                     
                                   </div>
                                
                                  
                               		<div class="form-group">
                                  	<label class="control-label col-md-3"><strong>Registration Authority</strong>   <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Write down the authority where your company is registered 
  </span></a></label>
                                    <div class="col-md-7">
                                    <input type="text" name="txtRegAuthority"   id="txtRegAuthority" class="input" required>
                                    </div>
                                       
                                   </div>
                               
                                 <div class="form-group">
                                  	<label class="control-label col-md-3"><strong>Company Registration No.</strong>   <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Please provide your company’s registration number. 

<br>
Suggest but not mandatory to upload scanned registration file to add credibility to your company
  </span></a></label>
                                   <div class="col-md-7">
                                    <input type="text" name="txtRegNo"   id="txtRegNo" class="input" required>
                                    <label class="control-label col-md-12">
                                    <a href="registration_img.php"   onclick="return hs.htmlExpand(this, { objectType: 'iframe',height: 450,width: 700 } )">Click to upload photos of Company’s Registration </a>
                                    </label>
                                   </div>
                                 </div>
                                  
                                 <div class="form-group">
                                  	<label class="control-label col-md-3"><strong>Company Proprietary Status</strong>  <span class="redmi1">*</span> </label>
                                    <div class="col-md-7">
                                    <label class="control-label col-md-12">
                                    <input type="radio" name="chkProStatus" class="sad"  id="chkProStatus" value="Limited Liabilities "  required>
                                     Limited Liabilities 
                                     </label>
                                    <label class="control-label col-md-12">  
                                   <input type="radio" name="chkProStatus" class="sad" value="Partnership"   id="chkProStatus"  required>Partnership
                                   </label>
                                   
                                   <label class="control-label col-md-12">
<input type="radio" name="chkProStatus" value="Sole Proprietary"   id="chkProStatus" class="sad"  required> Sole Proprietary
								   </label>
								
								<label class="control-label col-md-12">
                                     <input type="radio"  value="Joint Stock  " name="chkProStatus"   id="chkProStatus"  required>Joint Stock  <br>
                                   </label>
                                <label class="control-label col-md-12">
                                     <input type="radio" name="chkProStatus" class="sad" value="Private Enterprise"  id="chkProStatus"  required> Private Enterprise
                                 </label>

                               <label class="control-label col-md-12">
<input type="radio" name="chkProStatus"  value="Joint Venture"  id="chkProStatus" class="sad" required> Joint Venture
								</label>
								<label class="control-label col-md-12">
 <input type="radio" name="chkProStatus"  value="State Owned Enterprises"  id="chkProStatus" class="sad" required> State Owned Enterprises 
 </label>
 <label class="control-label col-md-12">
 <input type="radio" name="chkProStatus"  value="Other"  id="chkProStatus" class="aaq"  required>Other
 </label>
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
 
                                 
                                  
                                  <hr></hr>
                                  <div class="formtitle">Membership  </div>
                                  <br>

                                  <div style="clear:both"></div>
                                  <div class="form-group">
                                  	<label class="control-label col-md-3"><strong>Name of Your Membership Organization / Network</strong>    <span class="redmi1">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Please select the organizations /networks from the drop-down list. 

<br>
Please provide specific information if you are a member of others 
</a></label>
<div class="col-md-7">
<select name="selTypeOrgName" id="selTypeOrgName"  style="height:30px; width:100%;font-size:11px;">
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
                                  	<label class="control-label col-md-3"> <strong>Location of Your Membership Organization / Network</strong> <span class="redmi1"></span>   <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Please input the amount in USD.
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
						    <label class="control-label col-md-3"><strong>Awards</strong>  <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Please list down your awards and upload the scanned awards to add to your credibility. 
  </span></a></label>
                                   <label class="control-label col-md-7">
                                    <a href="awards.php"   onclick="return hs.htmlExpand(this, { objectType: 'iframe',height: 450,width: 700 } )">click to upload scanned copy</a>

                                    </label>
                                       
                                   </div>
                                
                                
                                 <div class="form-group">
						    <label class="control-label col-md-3"><strong>Certifications</strong>  <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Please list down your certifications and upload the scanned certifications to add to your credibility.
  </span></a></label>
                                    <label class="control-label col-md-7">
                                   <a href="certificate.php"   onclick="return hs.htmlExpand(this, { objectType: 'iframe',height: 450,width: 700 } )">click to upload scanned copy</a>

                                    </label>
                                       
                                   </div>
  
                              
                               <hr></hr>
                                  <div class="formtitle">Marketing materials </div> 
                               
                               <div class="form-group">
						    <label class="control-label col-md-3"> <strong>Marketing materials</strong>
                            <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Suggest to upload your company’s marketing materials, including Brochure and Services catalogue in pdf format
  </span></a></label>
                                    <label class="control-label col-md-7">
                                   <a href="marketing.php"   onclick="return hs.htmlExpand(this, { objectType: 'iframe',height: 450,width: 700 } )">click to upload</a>
                                    </label>
                                       
                                   </div>
  
                               
                               
                               <div class="form-group">
						    <label class="control-label col-md-3"><strong>Youtube id</strong>   <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />
                            Suggest to insert your company’s introduction videolink on youtube 
  </span></a></label>
                                    <label class="control-label col-md-7">
                                   	<input type="text" name="txtMarketYoutube" value="" id="txtMarketYoutube" class="form-control">
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
							<button class="thm-btn" type="button" name="btnSubmit1" id="btnSubmit1" data-toggle="modal"  style="float:left; margin-left:10PX;"  title="Click this button to preview and edit the form if required">Preview</button>
                            	
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
<script src="js/lightbox-plus-jquery.min.js"></script>
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