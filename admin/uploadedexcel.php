<?php
ob_start();
session_start();
if(!isset($_SESSION['countryid']) && $_SESSION['countryid']==""){
	header("Location: login.php");
}
if(!isset($_SESSION['user_id']) && $_SESSION['user_id']!=""){
	header("Location: login.php");
}
?>
<?php
if(!isset($_SESSION['countryid']) && $_SESSION['countryid']==""){
	header("Location: login.php");
}
include("../include/globalIncWeb.php");
ini_set("display_errors",0);
$url="http://";
$url.= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
$urlregex = "^(http?|ftp)\:\/\/([a-z0-9+!*(),;?&=\$_.-]+(\:[a-z0-9+!*(),;?&=\$_.-]+)?@)?[a-z0-9+\$_-]+(\.[a-z0-9+\$_-]+)*(\:[0-9]{2,5})?(\/([a-z0-9+\$_-]\.?)+)*\/?(\?[a-z+&\$_.-][a-z0-9;:@/&=+\$_.-]*)?(#[a-z_.-][a-z0-9+\$_.-]*)?\$";
if (!preg_match($urlregex,$url)) { } 
else 
{ 
		echo "<script>window.location='../pageerror.html';</script>";
}
if($_SESSION['user_id'] == "")
	header("location: login.php");
?>
<?php
function full_url()
{
    $s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : "";
    $sp = strtolower($_SERVER["SERVER_PROTOCOL"]);
    $protocol = substr($sp, 0, strpos($sp, "/")) . $s;
    $port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]);
    return $protocol . "://" . $_SERVER['SERVER_NAME'] . $port . $_SERVER['REQUEST_URI'];
}
$actual_link = full_url(); 
?>
<?php
	$msg = "";
	$today = date("Y-m-d");
	//$today1 = getDateDDMMYYYY($today);
	date_default_timezone_set('Asia/Calcutta');
	$server_time = date('H-i-s');
	$msg = "";
	if(isset($_POST['logBtn']))
		{
			
			$fldr = "document/";
			if($_FILES['ufile']['size'][0] != 0)
			{
			$sz = $sz + $_FILES['ufile']['size'][0];
			$ext = right($_FILES['ufile']['name'][0],3);
			$flname = $today1."_".$server_time.basename($_FILES['ufile']['name'][0]);
			if(strtoupper($ext) == "XLS" || strtoupper($ext) == "LSX")
				$flg2 = "Y";
			else
				$flg2 = "N";						
			$path1= $fldr.$flname;
			}
			
		if($flg2 == "Y") {
			if((strtoupper($ext) == "XLS")) {
			$c = copy($_FILES['ufile']['tmp_name'][0], $path1);
				if($c == 1 && $flg2 == "Y") {
					//echo "=======".$_FILES['ufile']['name'][0];
					require_once 'Excel/reader.php';
					$data = new Spreadsheet_Excel_Reader();
					$data->setOutputEncoding('CP1251');
					$data->read($path1);
					//$sqlEmpty = "TRUNCATE TABLE loanuserdetails";
					//mysql_query($sqlEmpty);
					
					$userUploading = $_SESSION['user_id'];
					$totalRecords = 0;
					$totalInserts = 0;
					for ($x=2; $x <= count($data->sheets[0]["cells"]); $x++) {
						$totalRecords++;
						$LogID = $data->sheets[0]["cells"][$x][1]; // to maintain error
						$CoName = $data->sheets[0]["cells"][$x][3];
						$BusinessSlogan = $data->sheets[0]["cells"][$x][5];
						$CoIntro = $data->sheets[0]["cells"][$x][6];
						$OffType = $data->sheets[0]["cells"][$x][7];
						$LegalTitle = $data->sheets[0]["cells"][$x][8];
						$LegalSurname = $data->sheets[0]["cells"][$x][9];												
						$LegalName = $data->sheets[0]["cells"][$x][10];
						$FocalTitle = $data->sheets[0]["cells"][$x][11];
						$FocalSurname = $data->sheets[0]["cells"][$x][12];
						$FocalName = $data->sheets[0]["cells"][$x][13];
						$CoPosition = $data->sheets[0]["cells"][$x][14];
						
						$CoDept = $data->sheets[0]["cells"][$x][15];
						$CoCountry = $data->sheets[0]["cells"][$x][19];
						$CoProvince = $data->sheets[0]["cells"][$x][20];
						$CoCity = $data->sheets[0]["cells"][$x][17];
						
						$CoPostCode = $data->sheets[0]["cells"][$x][18];
						$CoStreet = $data->sheets[0]["cells"][$x][16];
						$OffPhone = $data->sheets[0]["cells"][$x][21];
						
						$OffFax = $data->sheets[0]["cells"][$x][22];
						$MobileNo = $data->sheets[0]["cells"][$x][23];
						$CoEmail = $data->sheets[0]["cells"][$x][24];
						
						$CoWebsite = $data->sheets[0]["cells"][$x][25];
						$PlatFrm = $data->sheets[0]["cells"][$x][26];
						
						$PlatFrmUrl = $data->sheets[0]["cells"][$x][27];
						$MLat = $data->sheets[0]["cells"][$x][28];
						$Mlong = $data->sheets[0]["cells"][$x][29];
						$GeoURL = $data->sheets[0]["cells"][$x][30];
						
						
						//Branch Data
							$AddlBr = $data->sheets[0]["cells"][$x][31];	
							$AddlBrTitle = $data->sheets[0]["cells"][$x][32];
							$AddlBrSurname = $data->sheets[0]["cells"][$x][33];
							$AddlBrName = $data->sheets[0]["cells"][$x][34];	
							
							$AddlBrFocaltitle = $data->sheets[0]["cells"][$x][35];
							$AddlBrFocalSurname = $data->sheets[0]["cells"][$x][36];
							$AddlBrFocalName = $data->sheets[0]["cells"][$x][37];
							$AddlBrPosition = $data->sheets[0]["cells"][$x][38];
							$AddlBrDept = $data->sheets[0]["cells"][$x][39];
							$AddlBrStreet = $data->sheets[0]["cells"][$x][40];
							$AddlBrCity = $data->sheets[0]["cells"][$x][41];
							$AddlBrPostCode = $data->sheets[0]["cells"][$x][42];
							$AddlBrCountry = $data->sheets[0]["cells"][$x][43];
							$AddlBrProvince = $data->sheets[0]["cells"][$x][44];							
							$AddlBrPhone = $data->sheets[0]["cells"][$x][45];			
							
							$AddlBrFax = $data->sheets[0]["cells"][$x][46];
							$AddlBrMobile = $data->sheets[0]["cells"][$x][47];
							$AddlBrEmail = $data->sheets[0]["cells"][$x][48];
							$AddlBrWebsite = $data->sheets[0]["cells"][$x][49];							
							$AddlBrSocialMedia = $data->sheets[0]["cells"][$x][50];
							
							$AddlBrSocialMediaURL = $data->sheets[0]["cells"][$x][51];
							$AddlBrLongitude = $data->sheets[0]["cells"][$x][52];
							$AddlBrLatitude = $data->sheets[0]["cells"][$x][53];
							$AddlBrGeo = $data->sheets[0]["cells"][$x][54];
						
						//End of Branch Data
						
						
						$BusinessType = $data->sheets[0]["cells"][$x][55];
						
						$CoreServices = $data->sheets[0]["cells"][$x][56];
						$IndFocus = $data->sheets[0]["cells"][$x][57];
						$IndFocusText = $data->sheets[0]["cells"][$x][58];		
						
						$infoServices = $data->sheets[0]["cells"][$x][59];
						
						$BARegion = $data->sheets[0]["cells"][$x][60];
						$BACountry = $data->sheets[0]["cells"][$x][61];	
						
						$BAProvince = $data->sheets[0]["cells"][$x][62];
						$BACity = $data->sheets[0]["cells"][$x][63];
						$EmpNos = $data->sheets[0]["cells"][$x][64];	
						$EmpNames = $data->sheets[0]["cells"][$x][65];
						$DriverNos = $data->sheets[0]["cells"][$x][66];
						$DriverDesc = $data->sheets[0]["cells"][$x][67];							
						
						$TruckNos = $data->sheets[0]["cells"][$x][68];	
						$TruckDesc = $data->sheets[0]["cells"][$x][69];
						$WareHouseNos = $data->sheets[0]["cells"][$x][70];
						$WareHouseDesc = $data->sheets[0]["cells"][$x][71];
						
						$EqipNos = $data->sheets[0]["cells"][$x][72];	
						$EqipDesc = $data->sheets[0]["cells"][$x][73];
						$OtherAssetsNos = $data->sheets[0]["cells"][$x][74];
						$OtherAssetsDesc = $data->sheets[0]["cells"][$x][75];
						
						$RegYear = $data->sheets[0]["cells"][$x][76];	
						$RegAuthority = $data->sheets[0]["cells"][$x][77];
						$RegNo = $data->sheets[0]["cells"][$x][78];
						$CoProStatus = $data->sheets[0]["cells"][$x][79];
						
						$RegCapital = $data->sheets[0]["cells"][$x][80];	
						$AnnualTurnOver = $data->sheets[0]["cells"][$x][81];
						$AnnualRev = $data->sheets[0]["cells"][$x][82];
						$CoMemberOf = $data->sheets[0]["cells"][$x][83];
						
						$CountryBasedOn = $data->sheets[0]["cells"][$x][84];	
						$OrgName = $data->sheets[0]["cells"][$x][85];
						$OrgType = $data->sheets[0]["cells"][$x][86];
						$TypeofMember = $data->sheets[0]["cells"][$x][87];
						$SuccessStory = $data->sheets[0]["cells"][$x][88];
						
																																						
																						
						$sl = GenerateIds(id,tbl_user_data);
					    $sql = "INSERT INTO  tbl_user_data (id, user_id, company_name, company_slogan, company_intro, offc_type, legal_represent_title, 
					 		legal_represent_surname, legal_represent_name, focus_person_title, focus_person_surname, focus_person_name , position , 
							department, company_addr_country, company_addr_province, company_addr_city, company_addr_postcode, company_addr_street, offc_phone, fax, mobile_phone,
							email, company_website, plateform, plateform_url, latitude, longitude, geo_url, business_type_sel, business_type_txt,
							industry_focus_sel, industry_focus_txt,info_serv, business_area_region, business_area_country, business_area_province, business_area_city, 
							employee_region, employee, driver, driver_des, trucks, trucks_des, warehouse, warehouse_des, equipment, equipment_des, other_assets, 
							other_assets_des, reg_year, reg_authority, reg_no, proprietary_status, reg_capital_txt, annual_turnover, annual_rev, membership, country_based,
							org_name,org_type,type_of_member,success_story,status) 
							VALUES ('".$sl."','".$userUploading."','".addslashes($CoName)."','".addslashes($BusinessSlogan)."','".addslashes($CoIntro)."','".
							addslashes($OffType)."','".addslashes($LegalTitle)."','".addslashes($LegalSurname)."','".addslashes($LegalName)."','".
							addslashes($FocalTitle)."','".addslashes($FocalSurname)."','".addslashes($FocalName)."','".addslashes($CoPosition)."','".
							addslashes($CoDept)."','".addslashes($CoCountry)."','".addslashes($CoProvince)."','".addslashes($CoCity)."','".
							addslashes($CoPostCode)."','".addslashes($CoStreet)."','".addslashes($OffPhone)."','".addslashes($OffFax)."','".addslashes($MobileNo)."','".
							addslashes($CoEmail)."','".addslashes($CoWebsite)."','".addslashes($PlatFrm)."','".addslashes($PlatFrmUrl)."','".addslashes($MLat)."','"
							.addslashes($Mlong)."','".addslashes($GeoURL)."','".addslashes($BusinessType)."','".addslashes($CoreServices)."','".addslashes($IndFocus)."','"
							.addslashes($IndFocusText)."','".addslashes($infoServices)."','".addslashes($BARegion)."','".addslashes($BACountry)."','".
							addslashes($BAProvince)."','".addslashes($BACity)."','".addslashes($EmpNos)."','".addslashes($EmpNames)."','".
							addslashes($DriverNos)."','".addslashes($DriverDesc)."','".addslashes($TruckNos)."','".addslashes($TruckDesc)."','".
							addslashes($WareHouseNos)."','".addslashes($WareHouseDesc)."','".addslashes($EqipNos)."','".addslashes($EqipDesc)."','"
							.addslashes($OtherAssetsNos)."','".addslashes($OtherAssetsDesc)."','".addslashes($RegYear)."','".addslashes($RegAuthority)."','"
							.addslashes($RegNo)."','".addslashes($CoProStatus)."','".addslashes($RegCapital)."','".addslashes($AnnualTurnOver)."','"
							.addslashes($AnnualRev)."','".addslashes($CoMemberOf)."','".addslashes($CountryBasedOn)."','".addslashes($OrgName)."','"
							.addslashes($OrgType)."','".addslashes($TypeofMember)."','".addslashes($SuccessStory)."',1)";
							//.addslashes($WareHouseDesc)."','".addslashes($WareHouseDesc)."','".addslashes($WareHouseDesc)."','".addslashes($WareHouseDesc)."')";
						//echo $sql."<br />";
						if($cn == false)
						connect3db();						
						//$res = mysql_query($sql);
						//echo ">>>".$LogID."----->".$res."<br />";
					if(mysql_query($sql))
						{
						//$msg = "Import completed successfully!!!";
						//echo "entered";
						$logInsert = "INSERT into tblImportLog VALUES ('".$LogID."','".$userUploading."','".$today."','Success','NIL','Main')";
						//echo $logInsert."<br />";
							if($cn == false)
							connect3db();						
							$res = mysql_query($logInsert);						
							$totalInserts++;
							
							//Branch Data Entry
							if(strtoupper($AddlBr) == "Y")
								{
									$slBr = GenerateIds("branch_id","tbl_branch_data");
									$sqlBrInsert = "INSERT into  tbl_branch_data(branch_id, data_id, branch_legal_represent_title, branch_legal_represent_surname,
									branch_legal_represent_name, branch_focus_person_title, branch_focus_person_surname, branch_focus_person_name, branch_position, 
									branch_department, branch_company_addr_country, branch_company_addr_province, branch_company_addr_city, branch_company_addr_postcode ,
									branch_company_addr_street, branch_offc_phone, branch_fax, branch_mobile_phone, branch_email, branch_company_website, branch_plateform, 
									branch_plateform_url, branch_latitude, branch_longitude, branch_geo_url) VALUES('".$slBr."','".$sl."','".addslashes($AddlBrTitle)."','".addslashes($AddlBrSurname)."','".
									addslashes($AddlBrName)."','".addslashes($AddlBrFocaltitle)."','".addslashes($AddlBrFocalSurname)."','".addslashes($AddlBrFocalName)."','".
									addslashes($AddlBrPosition)."','".addslashes($AddlBrDept)."','".addslashes($AddlBrCountry)."','".addslashes($AddlBrProvince).
									"','".addslashes($AddlBrCity)."','".addslashes($AddlBrPostCode)."','".addslashes($AddlBrStreet)."','".addslashes($AddlBrPhone)
									."','".addslashes($AddlBrFax)."','".addslashes($AddlBrMobile)."','".addslashes($AddlBrEmail)."','".addslashes($AddlBrWebsite)
									."','".addslashes($AddlBrSocialMedia)."','".addslashes($AddlBrSocialMediaURL)."','".addslashes($AddlBrLongitude)."','".addslashes($AddlBrLatitude)
									."','".addslashes($AddlBrGeo)."')";
									if($cn == false)
									connect3db();			
									//echo $sqlBrInsert."<br />";							
									if(mysql_query($sqlBrInsert))
										{
											$logInsertBr = "INSERT into tblImportLog VALUES ('".$LogID."','".$userUploading."','".$today."','Success','NIL','Branch')";
											if($cn == false)
											connect3db();						
											$res = mysql_query($logInsertBr);										
										}
									else
										{
										$err =  mysql_error();
										$logInsert = "INSERT into tblImportLog VALUES('".$LogID."','".$userUploading."','".$today."','Failure','".addslashes($err)."','Branch')";
										if($cn == false)
										connect3db();						
										$res = mysql_query($logInsert);											
										}	
								}
							
							//End of Branch Data Entry
						}
					else
						{
						$err =  mysql_error();
						//echo "entered 2";
						$logInsert = "INSERT into tblImportLog VALUES('".$LogID."','".$userUploading."','".$today."','Failure','".addslashes($err)."','Main')";
						//echo $logInsert."<br />";
							if($cn == false)
							connect3db();						
							$res = mysql_query($logInsert);						
						}	
						mysql_close();
					}
					$totRec = 0;
					$sqlTotRec = "Select count(*) as totRec from tbl_user_data where user_id ='".$userUploading."'";
					if($cn == false)
					connect3db();	
					$resTotRec = mysql_query($sqlTotRec);
					$rowTotRec = mysql_fetch_array($resTotRec);
					$totRec = $rowTotRec[0];
					
					//$totRec = floatval($totRec) - floatval($totalInserts);
					mysql_close();
					$msg =  "Records successfully imported<br /><br />";
					$msg .=  "Total Records Imported from excel : ".$totalInserts." (Records Available in Excel : ".$totalRecords.")<br /><br />";
					$msg .= "<a href='report.php'>Total Available Records : ".abs($totRec)."</a>";
				}	
			  }				
		
		
		}	
		else
				$msg = "Only Excel file with extension (.xls / .xlsx) is allowed";		
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


	<!-- master stylesheet -->
	<link rel="stylesheet" href="css/style.css">
	<!-- responsive stylesheet -->
	<link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="assets/css/login_page.min.css" />
</head>
<body>

<!-- Start header -->
<?php include("include/top_admin.php"); ?>
<!-- End mainmenu -->

<section class="inner-banner">
	<div class="thm-container">
		<h2>Upload Excel</h2>
		
	</div>
</section>

<section class="sec-padding">
	<div class="thm-container">
		<div class="sec-title">
			<h2><span><strong>Administrative Panel</strong></span></h2>
			
		</div>
		<div class="row">
			<div class="col-md-6 col-sm-12 col-xs-12 pull-left">

									<h2>Upload Excel</h2><br>
<br>

<form name="form1" method="post" action="" enctype="multipart/form-data">
									
											<div class="md-card" id="login_card">
												<div class="md-card-content large-padding" id="login_form">
										 <div align="right"><a href="dashboard.php">Back to Dashboard</a></div><br />
											   <div class="uk-form-row">
													<label for="login_username">Upload File (.xls / .xlsx)</label>
													<input name="ufile[]" type="file" class="md-input" id="ufile[]" size="60">
												</div>
												
												<div class="uk-margin-medium-top">
													<button class="thm-btn" id="logBtn"  size="60" type="submit" name="logBtn">Upload Now</button>
												</div>					
												</div>
 
											</div>

									
								<div class="clearfix"></div>												
	
														</form>	
                                                        
                                  <?php if($msg != "") {?>						
								
								<!--<h3 class="heading_b uk-margin-bottom">Message </h3>-->
									<div class="md-card" id="login_card">
												<div class="md-card-content large-padding" id="login_form">
										 
											   <div class="uk-form-row">
													<label for="login_username"><?php echo $msg?></label>
												</div>
												
																	
												</div>
											</div>
									
												
								<?php } ?>	

								</div>
			<div style=" border-left:1px solid #BCBCBB " class="col-md-6 hidden-sm text-right pull-right">
           
				<img src="images/request-qoute-man.jpg" alt="Awesome Image"/>
			</div>
		</div>
	</div>
</section>





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


<?php include("../include/footer.php"); ?>


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
<?php ob_end_flush();?>