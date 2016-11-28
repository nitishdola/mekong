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
<!DOCTYPE html>
<html lang="en">


<head>
	<meta charset="UTF-8">
	<title>GMS Logistics</title>
	<!-- viewport meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
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


	<!-- master stylesheet -->
	<link rel="stylesheet" href="<?php echo $webUrl;?>css/style.css">
	<!-- responsive stylesheet -->
	<link rel="stylesheet" href="<?php echo $webUrl;?>css/responsive.css">
	<link href="<?php echo $webUrl;?>css/theme.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet"> 
	<style>
	.fa-facebook-square {
		color: #4862A3;
	}
	.fa-twitter-square {
		color:#55ACEE;
	}
	.fa-linkedin-sqaure {
		color:#0077B5;
	}
	</style>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/jquery-ui.js" type="text/javascript"></script>
	<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<!-- master stylesheet -->
	<link rel="stylesheet" href="css/style.css">
	<!-- responsive stylesheet -->
	<link rel="stylesheet" href="css/responsive.css">
	<script type="text/javascript" src="js/userdata.js"></script>

    <link rel="stylesheet" href="css/form.css" />

<script>
 $(document).ready(function() {
 $('#variButton').click(function () {
$("#variButton").html("<img src='images/fbloader.gif'>");
  var id=<?php echo $dataList[0][0];?>;
 $('#variButton').addClass('disabled').attr('disabled', true);
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
<link rel="stylesheet" href="css/lightbox.min.css">
</head>
<body style="background: #EDF1F2;">
<div class="loadingOverlay" style="display:none"></div>
<div id="dialog" style="display: none"></div>
<!-- Start header -->
<?php include("include/top_user_notification.php"); ?>
<!-- End mainmenu -->



<section class="sec-padding page-title">
	<div class="thm-container">
		<div class="sec-title">
			<h2><span>Company Profile</span></h2>
		</div>
	</div>
</section>


<section class="comapny-info">
	<div class="thm-container">
		<div class="row">
 		<?php
		if(count($dataList)>0)
		{
		?>
			<div class="row">
              	<div class="col-sm-3">
                	<div class="panel widget light-widget panel-bd-top">
                  		<div class="panel-heading no-title"> </div>
                  		<div class="panel-body">
                    		<div class="text-center vd_info-parent">
                    			<img src="<?php echo $webUrl;?>register/uploads/<?php echo $dataList[0][3];?>" style="max-width:206px;">
                    		</div><br>
                    		<h3><strong><?php echo strtoupper($dataList[0][2]);?></strong></h3>
                    		<h4  style="font-family: 'Lora', serif; font-size: 13px; line-height: 18px;"><?php echo html_entity_decode($dataList[0][4]);?></h4>
                    		<div class="mgtp-20">
                      			<table class="table table-striped table-hover">
                        			<tbody>
										<tr>
											<td style="width:60%;">Status</td>
											<td>
                                            <?php
											if($dataList[0][54]==1){?>
                                            <span class="label label-warning">Completed</span>
                                            <?php } else if(($dataList[0][54]==1) && ($dataList[0][71]==1)){ ?>
                                            <span class="label label-warning">Verified</span>
                                            <?php } else if(($dataList[0][54]==1) && ($dataList[0][71]==2)){ ?>
                                            <span class="label label-warning">Authorised</span>
                                            <?php } else if(($dataList[0][54]==1) && ($dataList[0][71]==2) && ($dataList[0][73]==1)){ ?>
                                             <span class="label label-success">Finalized</span>
                                             <?php } ?>
                                            </td>
										</tr>
										
                        			</tbody>
                      			</table>
                                <?php
								if($dataList[0][63]=="1"){?>
                      			<a href="userdata_display.php" class="btn btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit Details</a>
                    			<?php } ?>
                            </div>
                  		</div>
                	</div>
              	</div>


              	<div class="col-sm-9">
                <?php if($dataList[0][71]=="1") { ?> 
                 <div class="alert alert-info">      
				<div style="float:left; font-weight:bold; width:70%; margin-top:6px;">
                <span id="vari">Click on the Authorisation button to authorise publishing of your company data on www.logisticsgms.com  </span>
                </div>
                <div style="float:left; margin-left:5px; margin-top:-25px;"><input type="button" name="variButton" id="variButton" value="Authorise" class="booking-complete-btn"></div>
               
                <div style="clear:both"></div>
                 </div>
                <?php } ?>
	                <div class="tabs widget">
	  					<ul class="nav nav-tabs widget">
	    					<li class="active"> <a data-toggle="tab" href="#profile-tab"> Basic Information <span class="menu-active"><i class="fa fa-caret-up"></i></span> </a></li>
	     					<li> <a data-toggle="tab" href="#company-contacts">Company Contacts <span class="menu-active"><i class="fa fa-caret-up"></i></span> </a></li>
	     					
	     					<!-- <li> <a data-toggle="tab" href="#branch-data">Branch <span class="menu-active"><i class="fa fa-caret-up"></i></span> </a></li> -->

	     					<li> <a data-toggle="tab" href="#business-areas">Business Areas <span class="menu-active"><i class="fa fa-caret-up"></i></span> </a></li>

	     					<li> <a data-toggle="tab" href="#fixed-assets">Fixed Assets <span class="menu-active"><i class="fa fa-caret-up"></i></span> </a></li>  

	     					<li> <a data-toggle="tab" href="#registration-status">Registration Status<span class="menu-active"><i class="fa fa-caret-up"></i></span> </a></li>

	     					<li> <a data-toggle="tab" href="#membership">Membership <span class="menu-active"><i class="fa fa-caret-up"></i></span> </a></li> 
	  					</ul>
	  				</div>

	  				<div class="tab-content" style="font-size: 13px; background: #FFF; ">
	    				<div id="profile-tab" class="tab-pane active">
	      					<div class="pd-20">    
	        					<h3><img src="<?php echo $webUrl;?>images/icon1.jpg"> <strong>COMPANY INTRODUCTION</strong></h3>
	        				</div>

	        				<div class="pd-20">
	        					<div class="row">
	        						<label class="col-sm-3"> Company Name </label>
	        						<div class="col-sm-9"> <?php if($dataList[0][2]!="") echo htmlspecialchars_decode(html_entity_decode($dataList[0][2])); else echo "Not available";?></div>
	        					</div>

	        					<div class="row">
	        						<label class="col-sm-3"> Business Slogan</label>
	        						<div class="col-sm-9"> <?php if($dataList[0][4]!="") echo htmlspecialchars_decode(html_entity_decode($dataList[0][4])); else echo "Not available";?></div>
	        					</div>

						        <div class="row">
							        <label class="col-sm-3"> Company Introduction</label>
							        <div class="col-sm-9"> 
							        <?php if($dataList[0][5]!="") echo htmlspecialchars_decode(html_entity_decode($dataList[0][5])); else echo "Not available";?>
							        </div>
							    </div> 

							    
	        				</div>
	        			</div>


	        			<div id="company-contacts" class="tab-pane active">
	      					<div class="pd-20">    
	        					<h3><img src="<?php echo $webUrl;?>images/icon2.jpg"><strong> COMPANY CONTACTS</strong></h3>
	        				</div>

	        				<div class="pd-20">
						        <div class="row">
						         <label class="col-sm-3"> Office Type</label>
							        <div class="col-sm-9"> 
							        <?php if($dataList[0][6]!="") echo htmlspecialchars_decode(html_entity_decode($dataList[0][6])); else echo "Not available";?>
							        </div>
						        </div>

						        <div class="row">
						         	<label class="col-sm-3"> Focal Person </label>
							        <div class="col-sm-9"> 
							        <?php if($dataList[0][10]!="") echo htmlspecialchars_decode(html_entity_decode($dataList[0][10]));?>

							        <?php if($dataList[0][12]!="") echo htmlspecialchars_decode(html_entity_decode($dataList[0][12]));?>

							        <?php if($dataList[0][11]!="") echo htmlspecialchars_decode(html_entity_decode($dataList[0][11]));?>
							        </div>
						        </div>


						        <div class="row">
						         	<label class="col-sm-3"> Position </label>
							        <div class="col-sm-9"> 
							        <?php if($dataList[0][13]!="") echo htmlspecialchars_decode(html_entity_decode($dataList[0][13]));?>
							        </div>
						        </div>

						        <div class="row">
						         	<label class="col-sm-3"> Department </label>
							        <div class="col-sm-9"> 
							        <?php if($dataList[0][14]!="") echo htmlspecialchars_decode(html_entity_decode($dataList[0][14]));?>
							        </div>
						        </div>

						        <div class="row">
						         	<label class="col-sm-3"> Company Address  </label>
							        <div class="col-sm-9"> 
							        	<?php 
								        	//if($dataList[0][50]!="") echo htmlspecialchars_decode(html_entity_decode($dataList[0][50]));

								        	if($dataList[0][16]!="") echo htmlspecialchars_decode(html_entity_decode($dataList[0][16]));

								        	if($dataList[0][17]!="") echo htmlspecialchars_decode(html_entity_decode($dataList[0][17]));
							        	?>
							        </div>
						        </div>

						        <div class="row">
						         	<label class="col-sm-3"> Office Phone </label>
							        <div class="col-sm-5"> 
							        <?php if($dataList[0][18]!="") echo htmlspecialchars_decode(html_entity_decode($dataList[0][18]));?>
							        </div>
							    </div>

							    <div class="row">
							        <label class="col-sm-3"> Fax </label>
							        <div class="col-sm-9"> 
							        <?php if($dataList[0][19]!="") echo htmlspecialchars_decode(html_entity_decode($dataList[0][19]));?>
							        </div>
						        </div>

						        <div class="row">
						         	<label class="col-sm-3"> Mobile </label>
							        <div class="col-sm-9"> 
							        <?php if($dataList[0][20]!="") echo htmlspecialchars_decode(html_entity_decode($dataList[0][20]));?>
							        </div>
						        </div>

						        <div class="row">
						         	<label class="col-sm-3"> E-mail </label>
							        <div class="col-sm-3"> 
							        <?php if($dataList[0][21]!="") echo htmlspecialchars_decode(html_entity_decode($dataList[0][21]));?>
							        </div>
							    </div>

							    <div class="row">
							        <label class="col-sm-3"> Company Website </label>
							        <div class="col-sm-3"> 
							        <?php if($dataList[0][22]!="") echo htmlspecialchars_decode(html_entity_decode($dataList[0][22]));?>
							        </div>
						        </div>


						        <div class="row">
						         	<label class="col-sm-3"> Geo URL </label>
							        <div class="col-sm-3"> 
							        <?php if($dataList[0][27]!="") { echo htmlspecialchars_decode(html_entity_decode($dataList[0][27])); } else {
										echo "Latitude ". $dataList[0][25]."<br/> Longitude ".$dataList[0][26]; }
										?>
							        </div>

							        
						        </div>   

						        <div class="row">
                                <label class="col-sm-3"> Social/ecommerce Platform </label>
							        <?php if($dataList[0][23]!="") 

							        if($dataList[0][23] == "Facebook") { ?>
							        <label class="col-sm-1"> <i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></label>
							        <?php }else if( $dataList[0][23] == "Twitter"){ ?>
							        <label class="col-sm-1"> <i class="fa fa-twitter-square" aria-hidden="true"></i></label>
							        <?php }else if( $dataList[0][23] == "LinkedIn"){ ?>
							        <label class="col-sm-1"> <i class="fa fa-linkedin-sqaure" aria-hidden="true"></i></label>
							        <?php }else if( $dataList[0][23] == "Amazon"){ ?>
							        <label class="col-sm-1"> <i class="fa fa-amazon" aria-hidden="true"></i></label>
							        <?php }else if( $dataList[0][23] == "Alibaba"){ ?>
							        <label class="col-sm-1"> ALibaba</label>
							        <?php }else if( $dataList[0][23] == "eBay"){ ?>
							        <label class="col-sm-1"> Ebay</label>
							        <?php }else if( $dataList[0][23] == "Other"){ ?>
							        <label class="col-sm-1"> Other</label>
							        <?php } ?>

							        <div class="col-sm-3">
							        <?php echo $dataList[0][24]; ?>
							        </div>
						        </div>
<br>
<br>

						        
	        					<h3><img src="<?php echo $webUrl;?>images/icon2.jpg"><strong> BRANCH DATA CONTACT</strong></h3><br>


	        				<?php if(count($branchDataList)): ?>
						        <div class="row">
						         	<label class="col-sm-3"> Focal Person </label>
							        <div class="col-sm-9"> 
							        <?php if($branchDataList[0][5]!="") echo htmlspecialchars_decode(html_entity_decode($branchDataList[0][5]));?> &nbsp;

							        <?php if($branchDataList[0][6]!="") echo htmlspecialchars_decode(html_entity_decode($branchDataList[0][6]));?> &nbsp;

							        <?php if($branchDataList[0][7]!="") echo htmlspecialchars_decode(html_entity_decode($branchDataList[0][7]));?>
							        </div>
						        </div>


						        <div class="row">
						         	<label class="col-sm-3"> Position </label>
							        <div class="col-sm-9"> 
							        <?php if($branchDataList[0][8]!="") echo htmlspecialchars_decode(html_entity_decode($branchDataList[0][8]));?>
							        </div>
						        </div>

						        <div class="row">
						         	<label class="col-sm-3"> Department </label>
							        <div class="col-sm-9"> 
							        <?php if($branchDataList[0][9]!="") echo htmlspecialchars_decode(html_entity_decode($branchDataList[0][9]));?>
							        </div>
						        </div>

						        <div class="row">
						         	<label class="col-sm-3"> Company Address  </label>
							        <div class="col-sm-9"> 
                                    <strong>Country :</strong> 
							        	<?php 
								        	if($branchDataList[0][10]!="") echo htmlspecialchars_decode(html_entity_decode($branchDataList[0][10]));
											else echo "Not Available"; ?><br>
                                    <strong>Province :</strong>         
										<?php
								        	if($branchDataList[0][11]!="") echo htmlspecialchars_decode(html_entity_decode($branchDataList[0][11]));
							        	?><br>
                                     <strong>City   :   </strong>    
										<?php
								        	if($branchDataList[0][12]!="") echo htmlspecialchars_decode(html_entity_decode($branchDataList[0][12]));
							        	?><br>
 									<strong>Postcode   : </strong>      
										<?php
								        	if($branchDataList[0][13]!="") echo htmlspecialchars_decode(html_entity_decode($branchDataList[0][13]));
							        	?>
                                    <strong> Street    : </strong>     
										<?php
								        	if($branchDataList[0][14]!="") echo htmlspecialchars_decode(html_entity_decode($branchDataList[0][14]));
							        	?>
                                        
							        </div>
						        </div>

						        <div class="row">
						         	<label class="col-sm-3"> Office Phone </label>
							        <div class="col-sm-9"> 
							        <?php if($branchDataList[0][15]!="") echo htmlspecialchars_decode(html_entity_decode($branchDataList[0][15]));?>
							        </div>
								</div>
                                <div class="row">
							        <label class="col-sm-3"> Fax </label>
							        <div class="col-sm-9"> 
							        <?php if($branchDataList[0][16]!="") echo htmlspecialchars_decode(html_entity_decode($branchDataList[0][16]));?>
							        </div>
						        </div>

						        <div class="row">
						         	<label class="col-sm-3"> Mobile </label>
							        <div class="col-sm-9"> 
							        <?php if($branchDataList[0][17]!="") echo htmlspecialchars_decode(html_entity_decode($branchDataList[0][17]));?>
							        </div>
						        </div>

						        <div class="row">
						         	<label class="col-sm-3"> E-mail </label>
							        <div class="col-sm-9"> 
							        <?php if($branchDataList[0][18]!="") echo htmlspecialchars_decode(html_entity_decode($branchDataList[0][18]));?>
							        </div>
								</div>
                                <div class="row">
							        <label class="col-sm-3"> Company Website </label>
							        <div class="col-sm-9"> 
							        <?php if($branchDataList[0][19]!="") echo htmlspecialchars_decode(html_entity_decode($branchDataList[0][19]));?>
							        </div>
						        </div>

						       

						        <div class="row">
						         	<label class="col-sm-3"> Social/ecommerce Platform </label>
							        <div class="col-sm-9"> 
                                    <?php if($branchDataList[0][20]!="") 

							        if($branchDataList[0][20] == "Facebook") { ?>
							        <label class="col-sm-1"> <i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></label>
							        <?php }else if( $branchDataList[0][20] == "Twitter"){ ?>
							        <label class="col-sm-1"> <i class="fa fa-twitter-square" aria-hidden="true"></i></label>
							        <?php }else if( $branchDataList[0][20] == "LinkedIn"){ ?>
							        <label class="col-sm-1"> <i class="fa fa-linkedin-sqaure" aria-hidden="true"></i></label>
							        <?php }else if( $branchDataList[0][20] == "Amazon"){ ?>
							        <label class="col-sm-1"> <i class="fa fa-amazon" aria-hidden="true"></i></label>
							        <?php }else if( $branchDataList[0][20] == "Alibaba"){ ?>
							        <label class="col-sm-1"> ALibaba</label>
							        <?php }else if( $branchDataList[0][20] == "eBay"){ ?>
							        <label class="col-sm-1"> Ebay</label>
							        <?php }else if( $branchDataList[0][20] == "Other"){ ?>
							        <label class="col-sm-1"> Other</label>
							        <?php } ?>
							        <?php if($branchDataList[0][21]!="") echo htmlspecialchars_decode(html_entity_decode($branchDataList[0][21]));?>
							        </div>
							        
						        </div>
						    <?php else: ?>
						    	<div class="alert alert-danger">
	                                <button type="button" class="close" data-dismiss="alert">×</button>
	                                No Data Found !
	                            </div>
						    <?php endif; ?>

	        				</div>
	        			</div>

	        			<div id="business-areas" class="tab-pane active">
	      					<div class="pd-20">    
	        					<h3><img src="<?php echo $webUrl;?>images/icon3.jpg"> <strong>BUSINESS AREAS</strong></h3>
	        				</div>

	        				<div class="pd-20">
	        					<div class="row">
	        						<label class="col-sm-3"> Core Services</label>
	        						<div class="col-sm-9"> <?php if($dataList[0][28]!="") echo htmlspecialchars_decode(html_entity_decode($dataList[0][28])); else echo "Not available";?>
	        						</div>
	        					</div>

	        					<div class="row">
	        						<label class="col-sm-3"> Detailed Services offered</label>
	        						<div class="col-sm-9"> 
	        						<?php if(($dataList[0][32]!="")){
	        							$exp = explode('#', $dataList[0][32]);
	        							for($x=0;$x<count($exp);$x++)
	        							{
	        							echo htmlspecialchars_decode(html_entity_decode($exp[$x])).", ";
	        							}
	        						}
	        						
	        						?>
	        						<?php if($dataList[0][33]!="") {
	        							echo htmlspecialchars_decode(html_entity_decode($dataList[0][33]));
	        						}
	        						?>
	        						</div>

	        					</div>

						        <div class="row">
							        <label class="col-sm-3"> Industry Focus</label>
							        <div class="col-sm-9"> 
							        <?php if($dataList[0][30] != "") { 
									$expIndus = explode(",",$dataList[0][30]);
									$txtIndus = explode("#",$dataList[0][72]);
										for($w=0;$w<count($expIndus);$w++)
										{
											echo $expIndus[$w]."<br>";
											echo $txtIndus[$w]."<br><br>";
										}
									}
									?>
							        </div>
							    </div>

							 

							    <div class="row">
							        <label class="col-sm-3"> Information System Applied in Services</label>
							        <div class="col-sm-9"> 
							        <?php if($dataList[0][34]!="") echo htmlspecialchars_decode(html_entity_decode($dataList[0][34])); else echo "Not available";?>
							        </div>
							    </div>

							    <div class="row">
							        <label class="col-sm-3"> Business Areas</label>
							        <div class="col-sm-9"> 
							        <?php if($dataList[0][35]!="") {
										$businessArea = explode(",",$dataList[0][35]);
										$businessAreaDes = explode(",",$dataList[0][36]);
										for($q=0;$q<count($businessAreaDes);$q++)
										{
											echo $businessArea[$q]."<br>";
											echo $businessAreaDes[$q]."<br><br>";
										}
									}
									?>
							        </div>
							    </div>


	        				</div>
	        			</div>


	        			<div id="fixed-assets" class="tab-pane active">
	      					<div class="pd-20">    
	        					<h3><img src="<?php echo $webUrl;?>images/icon5.jpg"> <strong>FIXED ASSETS</strong></h3>
	        				</div>

	        				<div class="pd-20">
	        					<div class="row">
	        						<label class="col-sm-3"> Employee </label>
	        						<div class="col-sm-9"> <?php if($dataList[0][37]!="") echo htmlspecialchars_decode(html_entity_decode($dataList[0][37])); else echo "Not available";?>
	        						</div>
	        					</div>

	        					<div class="row">
	        						<label class="col-sm-3"> Drivers </label>
	        						<div class="col-sm-9"> <?php if($dataList[0][38]!="") echo htmlspecialchars_decode(html_entity_decode($dataList[0][38])); else echo "Not available";?></div>
	        					</div>

						        <div class="row">
							        <label class="col-sm-3"> Trucks</label>
							        <div class="col-sm-9"> 
							        <?php if($dataList[0][39]!="") echo htmlspecialchars_decode(html_entity_decode($dataList[0][39])); else echo "Not available";?>
							        </div>
							    </div>

							 

							    <div class="row">
							        <label class="col-sm-3"> Warehouse </label>
							        <div class="col-sm-9"> 
							        <?php if($dataList[0][40]!="") echo htmlspecialchars_decode(html_entity_decode($dataList[0][40])); else echo "Not available";?>
							        </div>
							    </div>

							    <div class="row">
							        <label class="col-sm-3"> Other Assets</label>
							        <div class="col-sm-9"> 
							        <?php if($dataList[0][41]!="") echo htmlspecialchars_decode(html_entity_decode($dataList[0][41])); else echo "Not available";?>
							        </div>
							    </div>


							    <div class="row">
							        <label class="col-sm-3"> Success Story</label>
							        <div class="col-sm-9"> 
							        <?php if($dataList[0][53]!="") echo htmlspecialchars_decode(html_entity_decode($dataList[0][53])); else echo "Not available";?>
							        </div>
							    </div>

	        				</div>
	        			</div>


	        			<div id="registration-status" class="tab-pane active">
	      					<div class="pd-20">    
	        					<h3><img src="<?php echo $webUrl;?>images/icon5.jpg"> <strong>REGISTRATION STATUS</strong></h3>
	        				</div>

	        				<div class="pd-20">
	        					<div class="row">
	        						<label class="col-sm-3"> Year of Registration </label>
	        						<div class="col-sm-9"> <?php if($dataList[0][42]!="") echo htmlspecialchars_decode(html_entity_decode($dataList[0][42])); else echo "Not available";?>
	        						</div>
	        					</div>

	        					<div class="row">
	        						<label class="col-sm-3"> Registration Authority  </label>
	        						<div class="col-sm-9"> <?php if($dataList[0][43]!="") echo htmlspecialchars_decode(html_entity_decode($dataList[0][43])); else echo "Not available";?></div>
	        					</div>

						        <div class="row">
							        <label class="col-sm-3"> Company’s Registration No</label>
							        <div class="col-sm-9"> 
							        <?php if($dataList[0][44]!="") echo htmlspecialchars_decode(html_entity_decode($dataList[0][44])); else echo "Not available";?>
							        </div>
							    </div>

							 

							    <div class="row">
							        <label class="col-sm-3"> Company Proprietary Status </label>
							        <div class="col-sm-9"> 
							        <?php if($dataList[0][45]!="") echo htmlspecialchars_decode(html_entity_decode($dataList[0][45])); else echo "Not available";?>
							        </div>
							    </div>

							   


	        				</div>
	        			</div>


	        			<div id="membership" class="tab-pane active">
	      					<div class="pd-20">    
	        					<h3><img src="<?php echo $webUrl;?>images/icon4.jpg"> <strong>MEMBERSHIP</strong></h3>
	        				</div>

	        				<div class="pd-20">
	        					<div class="row">
	        						<label class="col-sm-3"> Name of Your Membership Organization / Network   </label>
	        						<div class="col-sm-9"> <?php if($dataList[0][51]!="") echo htmlspecialchars_decode(html_entity_decode($dataList[0][51])); else echo htmlspecialchars_decode(html_entity_decode($dataList[0][64]));?>
                                    
                                    </div>
	        					</div>

	        					<div class="row">
	        						<label class="col-sm-3"> Location of Your Membership Organization / Network   </label>
	        						<div class="col-sm-9">
                                     <?php if($dataList[0][74]!="") echo htmlspecialchars_decode(html_entity_decode($dataList[0][74])); else echo "Not available";?>
                                    </div>
	        					</div>

	        					<div class="row">
							        <label class="col-sm-3"> Awards </label>
							        <div class="col-sm-9"> 
                                    	<div class="row">
							        	<?php $awards = getAllPictures('',$dataList[0][0],'awards',1);
											if(count($awards)>0){
												for($i=0;$i<count($awards);$i++)
												{
												?>
                                                <div class="col-sm-2 highslide-gallery">
                                                <a href="<?php echo $webUrl.'register/images/awards/'.$awards[$i][0];?>" class="example-image-link" data-lightbox="example-1"><img src="images/awards/<?php echo $awards[$i][0];?>" style="max-width:100%; height:100%"></a>
                                                </div>
										  <?php }
											}
											?>
                                         </div>   
							        </div>
							    </div>

						        <div class="row">
							        <label class="col-sm-3"> Certifications </label>
							        <div class="col-sm-9"> 
							        		<div class="row">
							        		<?php $certificate = getAllPictures('',$dataList[0][0],'certificate',1);
											if(count($certificate)>0){
												for($i=0;$i<count($certificate);$i++)
												{
												?>
                                                <div class="col-sm-2 highslide-gallery">
                                                <a href="<?php echo $webUrl.'register/images/certificate/'.$certificate[$i][0];?>" class="example-image-link" data-lightbox="example-1"><img src="images/certificate/<?php echo $certificate[$i][0];?>" style="max-width:100%; height:100%"></a>
                                                </div>
										  <?php }
											}
											?>
                                         </div>   
							        </div>
							    </div>
							    <br/>
							 <div class="row">
								 <div class="pd-20">    
		        					<h3><img src="<?php echo $webUrl;?>images/icon4.jpg"> <strong>MARKETING MATERIALS</strong></h3>
		        				</div>
	        				</div>

	        				<div class="pd-20">
	        					<div class="row">
	        						<label class="col-sm-3"> Pictures </label>
	        						<div class="col-sm-9">
	        						 	<div class="row">
							        		<?php $marketing = getAllPictures('',$dataList[0][0],'marketing',1);
											if(count($marketing)>0){
												for($i=0;$i<count($marketing);$i++)
												{
												?>
                                                <div class="col-sm-2 highslide-gallery">
                                                <a href="<?php echo $webUrl.'register/images/marketing/'.$marketing[$i][0];?>" class="example-image-link" data-lightbox="example-1"><img src="images/marketing/<?php echo $marketing[$i][0];?>" style="max-width:100%; height:100%"></a>
                                                </div>
										  <?php }
											}
											?>
                                         </div>   
                                    </div>
	        					</div>
	        				</div>	


	        				<div class="row">
							        <label class="col-sm-3"> Youtube Video </label>
							        <div class="col-sm-9"> 
							        <?php if($dataList[0][75]!=""){?>
							        		<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $dataList[0][75];?>" frameborder="0" allowfullscreen></iframe>  
							        <?php } else { ?>
							        Not available
							        <?php } ?>		
							        </div>
							    </div>	


	        				</div>
	        			</div>

	        		</div>
					<!-- photos tab -->  
					<!-- groups tab -->   
  				</div>
  				<!-- tab-content --> 
			</div>
			<!-- tabs-widget -->              
<?php } ?>  
 		</div>
 	</div>
</section>

<div class="clearfix"></div> 

<?php include("include/footer.php"); ?>


<!-- jQuery js -->
<script src="plugins/jquery/jquery-1.11.3.min.js"></script>
<!-- bootstrap js -->
<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- jQuery ui js -->
<script src="plugins/jquery-ui-1.11.4/jquery-ui.js"></script>
<!-- theme custom js  -->
<script src="js/main.js"></script>
<script src="js/bootstrap-notify.min.js"></script>
<?php
if($dataList[0][63]=="1"){?>
<script> $.notify("Your edit button is now activated under my organisation. Click on the link to update company profile.");</script>
<?php } ?>
<!--<script src="js/lightbox-plus-jquery.min.js"></script>-->
</body>


</html>