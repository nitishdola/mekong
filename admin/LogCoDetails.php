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
$sqlUp = "update tbl_user_data set revision_status='0' where id ='".$_SESSION['CoID']."'";
if($cn == false)
	connect3db();
mysql_query($sqlUp);

	$sqlCoDetails = "Select * from  tbl_user_data where id ='".$_SESSION['CoID']."'";
	if($cn == false)
	connect3db();					
	$resCoDetails = mysql_query($sqlCoDetails);
	$rowC = mysql_fetch_array($resCoDetails);		
?>

<?php
$dataList = getUserdata($_SESSION['CoID'],2);
?>
<?php
$branchDataList = getUserBranchdata($_SESSION['CoID'],2);
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
    <link rel="stylesheet" href="bower_components/uikit/css/uikit.almost-flat.min.css" media="all">
    <link rel="stylesheet" href="assets/icons/flags/flags.min.css" media="all">
    <link rel="stylesheet" href="assets/css/main.min.css" media="all">
    <link rel="stylesheet" href="css/form.css" media="all">
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
<?php include("include/top_admin.php"); ?>
<!-- End mainmenu -->

<section class="inner-banner">
	<div class="thm-container">
		<h2>Logistics Data</h2>
		
	</div>
</section>

<section class="sec-padding">
	<div class="thm-container">
		<div class="sec-title">
			<h2><span><strong>Administrative Panel</strong></span></h2>
			
		</div>
		<div class="row">
<div class="md-card" id="login_card">
												<div class="md-card-content large-padding" id="login_form">
												 <div align="right"><a href="dashboard.php">Back to Dashboard</a> &nbsp;|&nbsp;<a href="report.php">Back to Reports</a> &nbsp;|&nbsp;
                                                 <?php if(($dataList[0][63]=='1')||($dataList[0][63]=='2')){?>
                                                 <strong style="color:#FF0000">Sent for Revision</strong>
                                                 <?php } else { ?>
                                                 <a href="revision.php?dataID=<?php echo base64_encode($dataList[0][0]);?>" onclick="return hs.htmlExpand(this, { objectType: 'iframe',height: 350,width: 500 } )">Send for Revision</a>
                                                 <?php } ?>
                                                 </div><br />
												 <!--This part is the display part-->
												 <div class="user_heading">
												  <div class="user_heading_avatar">
													
												</div>
                                                <!--<div><a href="warehouse.php" onClick="return hs.htmlExpand(this, { objectType: 'iframe',height: 450,width: 700 } )"><img src="images/add.png" width="14" height="14" border="0"></a></div>-->
												<div class="user_heading_content">
													<h2 class="heading_b uk-margin-bottom"><span class="uk-text-truncate"><?php echo $rowC['company_name']?></span><span class="sub-heading"><?php echo htmlspecialchars_decode(html_entity_decode($rowC['company_slogan']));?></span></h2>
												</div>

												<!--<a class="md-fab md-fab-small md-fab-accent" href="#">
													<i class="material-icons">&#xE150;</i>
												</a>-->
												</div>
												<div class="user_content">
													<ul id="user_profile_tabs" class="uk-tab" data-uk-tab="{connect:'#user_profile_tabs_content', animation:'slide-horizontal'}">
														<li class="uk-active"><a href="javascript:void(0)">Basic Information & Company Contacts</a></li>
														<li style="margin-left:15%"><a href="javascript:void(0)">Business Areas & Registration Status</a></li>
													</ul>
													<ul id="user_profile_tabs_content" class="uk-switcher uk-margin">
														<li>
                                                            <div class="fdiv">
															<h4 class="heading_c uk-margin-small-bottom"><strong>Basic Information</strong></h4>
                                                            <div class="blockFull">
                                  	<div class="blockLeft">Company Name </div>
                                    <div class="blockRight"><?php echo $dataList[0][2];?></div>
                                   </div>
                                  <div style="clear:both"></div> 
                                  
                                  							<div class="blockFull">
                                        <div class="blockLeft">Logo of Company</div>
                                        <div class="blockRight">
                                         <a class="example-image-link" href="<?php echo $webUrl;?>register/uploads/<?php echo $dataList[0][3];?>" data-lightbox="example-set6"><img style="max-width:150px;" src="<?php echo $webUrl;?>register/uploads/<?php echo $dataList[0][3];?>"></a>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    
                                    <div class="blockFull">
                                        <div class="blockLeft">Business Slogan </div>
                                        <div class="blockRight"><?php echo htmlspecialchars_decode(html_entity_decode($dataList[0][4]));?></div>
                                    </div>
                                    <div class="clear"></div>
                                    
                                    <div class="blockFull">
                                        <div class="blockLeft">Company Introduction </div><br>

                                        <div class="clear"></div> 
                                        <div><?php echo html_entity_decode($dataList[0][5]);?></div>
                                    </div> 
                                    <div class="clear"></div>  
                                   
                                  </div>  
                                   <!-- End of first column --> 
                                   
                        <div class="sdiv"> 
                            	<h4 class="heading_c uk-margin-small-bottom"><strong>Company Contacts</strong></h4>
                                <div class="blockFull">
                                  	<div class="blockLeft">Office Type </div>
                                    <div class="blockRight">
                                    <?php echo $dataList[0][6];?>
                                    </div>
                                </div>
                                  <div style="clear:both"></div> 
                                  
                                 <div class="blockFull">
                                      <div class="blockLeft">Legal Representative</div>
                                      <div class="blockRight"> <?php echo $dataList[0][7]." ".$dataList[0][8]." ".$dataList[0][9];?>
                                      </div>
                                 </div>     
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                      <div class="blockLeft" align="left">Focal Person </div>
                                       <div class="blockRight"> <?php echo $dataList[0][10]." ".$dataList[0][11]." ".$dataList[0][12];?></div>  						  </div>
                                  <div style="clear:both"></div>     	
                                       
                                  <div class="blockFull">
                                      <div class="blockLeft">Position</div>
                                        <div class="blockRight">
                                       <?php echo $dataList[0][13];?>
                                       
                                        </div>
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                      <div class="blockLeft">Department</div>
                                        <div class="blockRight">
                                       <?php echo $dataList[0][14];?>
                                        </div>
                                  </div>
                                  <div style="clear:both"></div>
                                  
                                 <div class="blockFull">
                                      <div class="blockLeft">Company Address</div>
                                      <div class="blockRight">Street & District : <?php echo $dataList[0][17];?><br>
										City :  <?php echo $dataList[0][59];?><br>
                                       Postcode : <?php echo $dataList[0][60];?><br>
										Country : <?php $r=getCountry($dataList[0][15]); echo $r[0][2];?><br>
										Province : <?php echo $dataList[0][16];?>
										</div>
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                   <div class="blockFull">
                                      <div class="blockLeft">Office Phone</div>
                                      <div class="blockRight">
                                      <?php
										$offcPhone = $dataList[0][18];
										$ofcPh = explode(",",$offcPhone);

										for($r=0;$r<count($ofcPh);$r++)
										{
											?>
                                      <?php echo $ofcPh[$r];?><br>
                                        <?php } ?>
                                      </div>
                                  </div>    
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                      <div class="blockLeft">Fax</div>
                                      <div class="blockRight">
                                      <?php
										$fax = explode(",",$dataList[0][19]);
										for($r=0;$r<count($fax);$r++)
										{
											?>
                                      <?php echo $fax[$r];?><br>
                                        <?php } ?>
                                      </div>
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                      <div class="blockLeft">Mobile Phone</div>
                                      <div class="blockRight">
                                      <?php
										$mphn = explode(",",$dataList[0][20]);
										for($r=0;$r<count($mphn);$r++)
										{
											?>
                                      <?php echo $mphn[$r];?><br>
                                        <?php } ?>
                                      </div>
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                 <div class="blockFull">
                                      <div class="blockLeft">E-mail </div>
                                       <div class="blockRight"><?php echo $dataList[0][21];?></div>
                                       
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                      <div class="blockLeft">Company Website </div>
                                       <div class="blockRight"><?php echo $dataList[0][22];?></div>
                                       
                                   </div>
                                  <div style="clear:both"></div> 
                                  
                                  <div class="blockFull">
                                      <div class="blockLeft">Social/ecommerce Platform </div>
                                        <div class="blockRight">
                                        <?php
										$selEcm = explode(",",$dataList[0][23]);
										$selEcmU = explode(",",$dataList[0][24]);
										for($d=0;$d<count($selEcm);$d++)
										{
										echo "(".$selEcm[$d].")".$selEcmU[$d]."<br>";	
										}
										?>
                                       </div> 
                                   </div>
                                  <div style="clear:both"></div>  
                                  
                                 <div class="blockFull">
                                      <div class="blockLeft">Google Map</div>
                                       <div class="blockRight">
                                       <?php if($dataList[0][25]!=""){?> Latitude : <?php echo $dataList[0][25]."<br>"; } ?>
                                       
                                       <?php if($dataList[0][26]!=""){?> Longitude : <?php echo $dataList[0][26]."<br>";} ?>
                                       
                                       <?php if($dataList[0][27]!=""){?> Geographic URL : <?php echo $dataList[0][27]; } ?>
                                       </div> 
                                  </div>
                                  <div style="clear:both"></div>     
                                <?php if(count($branchDataList)>0){?>
                                	<h4 class="heading_c uk-margin-small-bottom"><strong>Additional branch contacts</strong></h4>
                                     <div class="blockFull">
                                      <div class="blockLeft">Legal Representative </div>
                                        <div class="blockRight">
                                      
                                      <?php echo $branchDataList[0][2]." ".$branchDataList[0][3]." ".$branchDataList[0][4];?>
                                        </div>
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                      <div class="blockLeft">Focal Person</div>
                                        <div class="blockRight">
                                      
                                      <?php echo $branchDataList[0][5]." ".$branchDataList[0][6]." ".$branchDataList[0][7];?>
                                        </div>
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                      <div class="blockLeft">Position </div>
                                        <div class="blockRight">
                                        <?php echo $branchDataList[0][8];?>
                                        </div>
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                      <div class="blockLeft">Department </div>
                                        <div class="blockRight">
                                        <?php echo $branchDataList[0][9];?>
                                        </div>
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                      <div class="blockLeft">Company Address</div>
                                      <div class="blockRight">Street & District : <?php echo $branchDataList[0][14];?><br>
										City :  <?php echo $branchDataList[0][12];?><br>
                                       Postcode : <?php echo $branchDataList[0][13];?><br>
										Country : <?php $x=getCountry($branchDataList[0][10]); echo $x[0][2];?><br>
										Province : <?php echo $dataList[0][11];?>
										</div>
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                      <div class="blockLeft">Office Phone</div>
                                      <div class="blockRight">
                                      <?php
										$BoffcPhone = $branchDataList[0][15];
										$BofcPh = explode(",",$BoffcPhone);
										for($r=0;$r<count($BofcPh);$r++)
										{
											?>
                                      <?php echo $BofcPh[$r];?><br>
                                        <?php } ?>
                                      </div>
                                  </div>    
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                      <div class="blockLeft">Fax</div>
                                      <div class="blockRight">
                                      <?php
										$bfax = explode(",",$branchDataList[0][16]);
										for($r=0;$r<count($bfax);$r++)
										{
											?>
                                      <?php echo $bfax[$r];?><br>
                                        <?php } ?>
                                      </div>
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                      <div class="blockLeft">Mobile Phone</div>
                                      <div class="blockRight">
                                      <?php
										$bmob = explode(",",$branchDataList[0][17]);
										for($r=0;$r<count($bmob);$r++)
										{
										?>
                                      <?php echo $bmob[$r];?><br>
                                        <?php } ?>
                                      </div>
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                      <div class="blockLeft">E-mail</div>
                                        <div class="blockRight">
                                     <?php echo $branchDataList[0][18];?>
                                        </div>
                                       
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  
                                  <div class="blockFull">
                                      <div class="blockLeft">Company Website</div>
                                        <div class="blockRight">
                                     <?php echo $branchDataList[0][19];?>
                                        </div>
                                       
                                   </div>
                                  <div style="clear:both"></div>
                                   
                                  <div class="blockFull">
                                      <div class="blockLeft">Social/ecommerce Platform </div>
                                      <div class="blockRight">
                                        <?php
										$BselEcm = explode(",",$branchDataList[0][20]);
										$BselEcmU = explode(",",$branchDataList[0][21]);
										for($d=0;$d<count($selEcm);$d++)
										{
										echo "(".$BselEcm[$d].")".$BselEcmU[$d]."<br>";	
										}
										?>
                                       </div> 
                                   </div>
                                  <div style="clear:both"></div>  
                                  
                                  <div class="blockFull">
                                      <div class="blockLeft">Google Map</div>
                                       <div class="blockRight">
                                       <?php if($branchDataList[0][22]!=""){?> Latitude : <?php echo $branchDataList[0][22]."<br>"; } ?>
                             
                                       <?php if($branchDataList[0][23]!=""){?> Longitude : <?php echo $branchDataList[0][23]."<br>";} ?>
                                       
                                       <?php if($branchDataList[0][24]!=""){?> Geographic URL : <?php echo $branchDataList[0][24]; } ?>
                                       </div> 
                                  </div>
                                  <div style="clear:both"></div>  
                                <?Php } ?>    
                                  
                                  
                        </div>  
														
																												
														</li>
														<li>
														<div id="user_profile_gallery1" data-uk-check-display class="uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4" data-uk-grid="{gutter: 4}">
                                                        
                                                        <div class="fdiv">
                            	  <h4 class="heading_c uk-margin-small-bottom"><strong>Business Areas</strong></h4>
                                  <hr/>
                                  <div class="blockFull">
                                  	<div class="blockLeft">Core services</div>
                                    <div class="blockRight">  
                                    <?php
									$area = explode(",",$dataList[0][28]);
									for($i=0;$i<count($area);$i++)
									{
										echo $area[$i]." , ";
										if($area[$i]=="Others")
										{
											echo "<br> Others is - ".$dataList[0][29];
										}
									}
									?>
                                    </div>
                                   </div>
                                   <div style="clear:both"></div> 
                                   
                                   <div class="blockFull">
                                  	<div class="blockLeft">Other services offered</div>
                                    <div class="blockRight">  
                                    <?php
								
									$ser = explode("#",$dataList[0][32]);
									for($x=0;$x<count($ser);$x++)
									{
										echo $ser[$x]."<br/>";
										if($dataList[0][32]=="Other")
										{
											echo $dataList[0][32];
										}
									}
									?>
 
                                    </div>
                                   </div>
                                   <div style="clear:both"></div> 
                                   
                                   <div class="blockFull">
                                  	<div class="blockLeft">Industry Focus</div>
                                    <div class="blockRight">  
                                    <?php
									$ind = explode(",",$dataList[0][30]);
									for($i=0;$i<count($ind);$i++)
									{
										echo $ind[$i]." , ";
										if($ind[$i]=="Others")
										{
											echo "<br> Others is - ".$dataList[0][31];
										}
									}
									?>
                                    </div>
                                   </div>
                                   <div style="clear:both"></div> 
                                   
								  <div class="blockFull">
                                  	<div class="blockLeft">Information System Applied in Services </div>
                                    <div class="blockRight">
                                      <?php echo $dataList[0][34];?>
                                      </div>
                                      
                          		 </div>
                                   
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                  	<div class="blockLeft">Business Areas </div>
                                    <div class="blockRight">
                                      <?php
									$busRegion = explode(",",$dataList[0][35]);
									for($i=0;$i<count($busRegion);$i++)
									{
										$busDes = explode(",",$dataList[0][36]);
										
									?>
                                    Region : <?php echo $busRegion[$i];?><br>
									description : <?php echo $busDes[$i];?><br><br>
                                    <?php } ?>
                                    
                                      </div>
                                      
                          		 </div>
                                   
                                  <div style="clear:both"></div>
                                  <h4 class="heading_c uk-margin-small-bottom"><strong>Fixed Assets</strong></h4>
                                  <hr/>
                                  <div class="blockFull">
                                  	<div class="blockLeft">Employee</div>
                                    <div class="blockRight">
                                   <?php echo $dataList[0][37];?>
                                    </div>
                                      
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                  	<div class="blockLeft">Drivers </div>
                                    <div class="blockRight">
                                    <?php echo $dataList[0][38];?>
                                   
                                    </div>
                                       
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                  	<div class="blockLeft">Trucks</div>
                                    <div class="blockRight">
                                    <?php echo $dataList[0][39];?>
                                  </div>
                                       
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                   <div class="blockFull">
                                  	<div class="blockLeft">Warehouse</div>
                                    <div class="blockRight">
                                    <?php echo $dataList[0][40];?>
                                    </div>
                                       
                                   </div>
                                  <div style="clear:both"></div>

                                  <div class="blockFull">
                                  	<div class="blockLeft">Other Assets </div>
                                    <div class="blockRight" >
                                   <?php echo $dataList[0][41];?>
                                    </div>
                                      <div style="clear:both"></div>
                                      
                                     <?php
                                       	$im = getPics($dataList[0][0],"fixed_asset");
                                        for($r=0;$r<count($im);$r++)
										{
										?>
										<div style="width:150px; float:left">
                                       <a class="example-image-link" href="<?php echo $webUrl;?>register/images/fixed_asset/<?php echo $im[$r][2];?>" data-lightbox="example-set" data-title="<?php echo $im[$r][3];?>"> <img src="<?php echo $webUrl;?>register/images/fixed_asset/<?php echo $im[$r][2];?>" style="max-width:100px;" /></a><br>
										<?php echo $im[$r][3];?>
                                        </div>
										<?php } ?>
                                        
                                   </div>
                                  <div style="clear:both"></div>
                                  </div>
                                  <div class="sdiv">
                              <h4 class="heading_c uk-margin-small-bottom"><strong>Registration Status</strong></h4>
                                  <hr></hr>
                               		 <div class="blockFull">
                                     
                                  	<div class="blockLeft">Year of Registration</div>
                                    <div class="blockRight"><?php echo $dataList[0][42];?></div>
                                     
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                  	<div class="blockLeft">Registration Authority</div>
                                    <div class="blockRight">
                                    <?php echo $dataList[0][43];?>
                                    </div>
                                       
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                  	<div class="blockLeft">Company’s Registration No.</div>
                                    <div class="blockRight">
                                    <?php echo htmlspecialchars_decode(html_entity_decode($dataList[0][44]));?>
                                    <?php
                                       	$im = getPics($dataList[0][0],"reg_no");
                                        for($r=0;$r<count($im);$r++)
										{
										?>
										<div style="width:100px; float:left">
                                        <a class="example-image-link" href="<?php echo $webUrl;?>register/images/registration_img/<?php echo $im[$r][2];?>" data-lightbox="example-set1" data-title="<?php echo $im[$r][3];?>"> <img src="<?php echo  $webUrl;?>register/images/registration_img/<?php echo $im[$r][2];?>" style="max-width:80px;" /></a><br>
										<?php echo $im[$r][3];?>
                                        </div>
										<?php } ?>
                                    </div>
                                       
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  
                                  <div class="blockFull">
                                  	<div class="blockLeft">Company Proprietary Status </div>
                                    <div class="blockRight">
									<?php if($dataList[0][45]=="Other") echo $dataList[0][61];  else echo $dataList[0][45]; ?>

                                    </div>
                                   </div> 
                                  
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                  	<div class="blockLeft">Registered Capital</div>
                                    <div class="blockRight">
                                   <?php echo $dataList[0][46];?> USD

                                    </div>
                                       
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                  	<div class="blockLeft">Annual Turn Over</div>
                                    <div class="blockRight">
                                   <?php echo $dataList[0][47];?> USD

                                    </div>
                                       
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                  	<div class="blockLeft">Annual Revenue </div>
                                    <div class="blockRight">
                                    <?php echo $dataList[0][48];?>  USD</div>
                                       
                                   </div>
                                  <div style="clear:both"></div>
                                  <br>
<br>
                                  <h4 class="heading_c uk-margin-small-bottom"><strong>Membership</strong></h4>
                                  <hr/>
                                  <div class="blockFull">
                                  	<div class="blockLeft">Membership</div>
                                    <div class="blockRight">
                                    <?php echo $dataList[0][62];?>
                                    </div>
                                  </div> 
                                   <div style="clear:both"></div> 
                                   
                                   <div class="blockFull">
                                  	<div class="blockLeft">Country based in</div>
                                    <div class="blockRight">
                                    <?php echo $dataList[0][50];?>
                                    </div>
                                  </div> 
                                   <div style="clear:both"></div> 
                                   
                                   <div class="blockFull">
                                  	<div class="blockLeft">Name of the Organization</div>
                                    <div class="blockRight">
                                    <?php echo $dataList[0][51];?>
                                    </div>
                                  </div> 
                                   <div style="clear:both"></div>
                                    
                                  <div class="blockFull">
                                  	<div class="blockLeft">Type of the Organization</div>
                                    <div class="blockRight">
                                    <?php echo $dataList[0][52];?><br>
									<?php
                                       	$im = getPics($dataList[0][0],"member_certificate");
                                        for($r=0;$r<count($im);$r++)
										{
										?>
										<div style="width:100px; float:left">
                                        <a class="example-image-link" href="<?php echo $webUrl;?>register/images/member_certificate/<?php echo $im[$r][2];?>" data-lightbox="example-set2" data-title="<?php echo $im[$r][3];?>"> 
                                        <img src="<?php echo  $webUrl;?>register/images/member_certificate/<?php echo $im[$r][2];?>" style="max-width:80px;" />
                                        </a><br>
										<?php echo $im[$r][3];?>
                                        </div>
										<?php } ?>
                                    </div>
                                  </div> 
									 <div style="clear:both"></div>
                                     
                                    <div class="blockFull">
                                  	<div class="blockLeft">Awards</div>
                                    <div class="blockRight">
									<?php
                                       	$im = getPics($dataList[0][0],"awards");
                                        for($r=0;$r<count($im);$r++)
										{
										?>
										<div style="width:100px; float:left">
                                        <a class="example-image-link" href="<?php echo $webUrl;?>register/images/awards/<?php echo $im[$r][2];?>" data-lightbox="example-set3" data-title="<?php echo $im[$r][3];?>"> 
                                        <img src="<?php echo  $webUrl;?>register/images/awards/<?php echo $im[$r][2];?>" style="max-width:80px;" /></a><br>
										<?php echo $im[$r][3];?>
                                        </div>
										<?php } ?>
                                    </div>
                                  </div> 
								<div style="clear:both"></div>
                                
                                <div class="blockFull">
                                  	<div class="blockLeft">Certificate</div>
                                    <div class="blockRight">
									<?php
                                       	$im = getPics($dataList[0][0],"certificate");
                                        for($r=0;$r<count($im);$r++)
										{
										?>
										<div style="width:100px; float:left">
                                        <a class="example-image-link" href="<?php echo $webUrl;?>register/images/certificate/<?php echo $im[$r][2];?>" data-lightbox="example-set4" data-title="<?php echo $im[$r][3];?>"> 
                                        <img src="<?php echo  $webUrl;?>register/images/certificate/<?php echo $im[$r][2];?>" style="max-width:80px;" /></a><br>
										<?php echo $im[$r][3];?>
                                        </div>
										<?php } ?>
                                    </div>
                                  </div> 
								<div style="clear:both"></div>
                                     
                                  
                                     
                                     
                                     					</div>
                                                        
                                         
														
														</li>
                                                                                   
													</ul>												
												</div>	


												<!--End of Display-->
												</div>
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
<script src="bower_components/moment/min/moment.min.js"></script>

    <!-- common functions -->
    <script src="assets/js/common.min.js"></script>
    <!-- uikit functions -->
    <script src="assets/js/uikit_custom.min.js"></script>
    <!-- altair common functions/helpers -->
    <script src="assets/js/altair_admin_common.min.js"></script>
<script src="bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <!-- datatables colVis-->
    <script src="bower_components/datatables-colvis/js/dataTables.colVis.js"></script>
    <!-- datatables tableTools-->
    <script src="bower_components/datatables-tabletools/js/dataTables.tableTools.js"></script>
    <!-- datatables custom integration -->
    <script src="assets/js/custom/datatables_uikit.min.js"></script>

    <!--  datatables functions -->
    <script src="assets/js/pages/plugins_datatables.min.js"></script>
    
    <!-- enable hires images -->
    <script>
        $(function() {
            altair_helpers.retina_images();
        });
    </script>	


</body>


</html>
<?php ob_end_flush();?>