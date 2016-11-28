<?php
include("include/globalIncWeb.php");
ini_set("display_errors",0);
$id = $_GET['id'];
$dataList = getUserdata($id,2); //var_dump($dataList);
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



	<!-- master stylesheet -->
	<link rel="stylesheet" href="css/style.css">
	<!-- responsive stylesheet -->
	<link rel="stylesheet" href="css/responsive.css">
<link href="css/theme.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow" rel="stylesheet"> 
  <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.9.0/css/lightbox.min.css" rel="stylesheet">
<style>
  label{
    line-height: 15px;
  }
  .caption {
    font-size: 11px;
    color: #444;
    font-family: 'PT Sans Narrow', sans-serif;
  }
</style>

</head>
<body>

<!-- Start header -->
<header id="header" class="stricky">
	<div class="thm-container clearfix">
		<div class="logo pull-left">
			<a href="index.php">
				<img src="images/logo.png" alt="">
			</a>
		</div>
		<div class="header-info pull-right">
			
			
			<div class="info-box">
				
				<div class="text-box">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="images/facebook.png" width="38" height="38" /></td>
    <td><img src="images/twitter.png" width="38" height="38" /></td>
    <td><img src="images/gplus.png" width="38" height="38" /></td>
    <td><img src="images/skyp.png" width="38" height="38" /></td>
    <td><img src="images/link-in.png" width="38" height="38" /></td>
  </tr>
</table>
				</div>
			</div>
			<div class="info-box search-box-wrapper">
				<div class="icon-box">
					<i class="flaticon-search51"></i>
				</div>
				<form action="#" class="search-box-holder">
					<div class="search-box">
						<div class="form">
							<input type="text" placeholder="Search">
							<button type="submit"><span>GO</span></button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</header>
<!-- End header  -->

<!-- Start mainmenu -->
<nav class="main-menu-wrapper stricky full-width">
	<div class="thm-container menu-gradient ">
		<div class="clearfix">
			<div class="nav-holder pull-left">
				<div class="nav-header">
					<button><i class="fa fa-bars"></i></button>
				</div>
				<div class="nav-footer">
					<ul class="nav">
                    	<li class="has-submenu">
							<a href="http://logisticsgms.com/">Home</a>
							<!--<ul class="submenu">
								<li><a href="single-service.html">Service Details</a></li>
								<li><a href="pricing.html">Our Pricing</a></li>
							</ul>-->
						</li>

						<li class="has-submenu">
							<a href="#">About us</a>
							<ul class="submenu">
								<li><a href="gms-logistics-database.php">GMS Logistics Database</a></li>
                                <li><a href="logistics-project.php">Logistics Dev. Project</a></li>
                                <li><a href="project-partners.php">Project Partners</a></li>
                                <li><a href="related-websites.php">Related Websites</a></li>
                                <li><a href="mekong-institute.php">Mekong Institute</a></li>
							</ul> 
						</li>

						<li class="has-submenu"><a href="logistics-data.php">Company Database</a></li>
                        <li class="has-submenu"><a href="forum.php">Forum</a></li>
						<li class="has-submenu"><a href="regulation.php">Regulation</a></li>
                        
                         <li><a href="#">Events</a>
                        	<ul  class="submenu">
                                <li style="background-color:#CDCDCE" ><a href="#">Cambodia</a></li>
                                <li style="background-color:#CDCDCE"><a href="#">Lao PDR</a></li>
                                <li style="background-color:#CDCDCE"><a href="#">Myanmar</a></li>
                                <li style="background-color:#CDCDCE"><a href="#">Vietnam</a></li>
                                <li style="background-color:#CDCDCE"><a href="#">Thailand</a></li>
                                <li style="background-color:#CDCDCE"><a href="#">Others</a></li>
                            </ul>
                        </li>
                        
						<li><a href="http://logisticsgms.com/signup.php">Login</a></li>
					</ul>
				</div>
			</div>
			
		</div>
	</div>
</nav><!-- End mainmenu -->

<section class="inner-banner">
	<div class="thm-container">
		<h2>Company Profile </h2>
		<?php //var_dump($dataList); ?>
	</div>
</section>

<section class="sec-padding page-title">
	<div class="thm-container">
		<div class="sec-title">
			<h2><span><?php echo $dataList[0][2];?></span></h2>
		</div>
	</div>
</section>

	<div class="thm-container" style="margin-top: -50px;">
		<div class="row">
       
 		<div class="row">
              <div class="col-sm-3">
                <div class="panel widget light-widget panel-bd-top">
                  <div class="panel-heading no-title"> </div>
                  <div class="panel-body">
                    <div class="text-center vd_info-parent">
                      <img class="user_profile_img" src="<?php echo $webUrl;?>register/uploads/<?php echo $dataList[0][3];?>" alt="" width="76" height="76" />
                    </div>
                    
                    <h3 class="font-semibold mgbt-xs-5"><?php echo $dataList[0][2];?></h3>
                    <h5><?php echo $dataList[0][4];?></h5>
                    
                    <div class="mgtp-20">
                      <table class="table table-striped table-hover">
                        <tbody>
                          <tr>
                            <td style="width:60%;">Status</td>
                            <td><span class="label label-success">Active</span></td>
                          </tr>
                          <tr>
                            <td> Published On</td>
                            <td> 
                            <?php if($dataList[0][77] != NULL){ ?>
                            <?php echo date('d M Y', strtotime($dataList[0][77]));?> </td>
                            <?php }else{ echo '<i>Publish date not available</i>'; } ?>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-9">


                <div class="tabs widget">
  <ul class="nav nav-tabs widget">
    <li class="active"> <a data-toggle="tab" href="#profile-tab"> Company Profile <span class="menu-active"><i class="fa fa-caret-up"></i></span> </a></li>
    <li> <a data-toggle="tab" href="#profile-tab1"> Services <span class="menu-active"><i class="fa fa-caret-up"></i></span> </a></li>
    <li> <a data-toggle="tab" href="#photos-tab"> Business interaction <span class="menu-active"><i class="fa fa-caret-up"></i></span> </a></li>
    <li> <a data-toggle="tab" href="#photos-tab1"> News & Events <span class="menu-active"><i class="fa fa-caret-up"></i></span> </a></li>
    
        
   
  </ul>
  <div class="tab-content">
    <div id="profile-tab" class="tab-pane active">
      <div class="pd-10">    
        <h4 class="mgbt-xs-15 mgtp-10 font-semibold" style="background-color: #2E6FAB; border-radius: 5px; color: #fff; padding: 10px;"><img src="images/icon1.jpg"> COMPANY PROFILE</h4>
        <div class="pd-10">
        <div class="row" style="border-radius: 5px; padding: 10px; color: #666;" align="justify">
         <?php if($dataList[0][5]!="") echo htmlspecialchars_decode(html_entity_decode($dataList[0][5])); else echo "Not available";?></div>
        </div>
        
        <div class="pd-10">
        <div class="row">
          <div>
            <h4 class="mgbt-xs-15 font-semibold" style="background-color: #2E6FAB; border-radius: 5px; color: #fff; padding: 6px;"><img src="images/icon2.jpg"> COMPANY CONTACTS</h4>
            <div class="content-list content-menu">
            <div class="pd-10">
              <div class="row" style="padding: 10px;">
                    <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-6 control-label" style="color: #666;">Office Type :</label>
              <div class="col-xs-6 controls"> <?php if($dataList[0][6]!="") echo htmlspecialchars_decode(html_entity_decode($dataList[0][6])); else echo "Not available";?></div>
              <!-- col-sm-10 --> 
            </div>
                      <div class="row mgbt-xs-0">
              <label class="col-xs-6 control-label" style="color: #666;">Focal Person : </label>
              <div class="col-xs-6 controls"> <?php if($dataList[0][10]!="") echo htmlspecialchars_decode(html_entity_decode($dataList[0][10]));?>

                      <?php if($dataList[0][12]!="") echo htmlspecialchars_decode(html_entity_decode($dataList[0][12]));?>

                      <?php if($dataList[0][11]!="") echo htmlspecialchars_decode(html_entity_decode($dataList[0][11]));?></div>
            </div>
            
            <div class="row mgbt-xs-0">
                    <label class="col-xs-6 control-label" style="color: #666;">Position : </label>
                    <div class="col-xs-6 controls"> <?php if($dataList[0][13]!="") echo htmlspecialchars_decode(html_entity_decode($dataList[0][13]));?></div>
                    <!-- col-sm-10 --> 
                  </div>
            
            <div class="row mgbt-xs-0">
                    <label class="col-xs-6 control-label" style="color: #666;">Department : </label>
                    <div class="col-xs-6 controls"> <?php if($dataList[0][14]!="") echo htmlspecialchars_decode(html_entity_decode($dataList[0][14]));?></div>
                    <!-- col-sm-10 --> 
                  </div>

                <div class="row mgbt-xs-0">
                        <label class="col-xs-6 control-label" style="color: #666;">Company Address:</label>
                        <div class="col-xs-6 controls">

                        <?php echo htmlspecialchars_decode(html_entity_decode($dataList[0][17]));?></div>
                        <!-- col-sm-10 --> 
                      </div>
                
          <div class="row mgbt-xs-0">
                        <label class="col-xs-6 control-label" style="color: #666;">City : </label>
                        <div class="col-xs-6 controls"><?php echo htmlspecialchars_decode(html_entity_decode($dataList[0][59]));?></div>
                        <!-- col-sm-10 --> 
                      </div>
                
                 <div class="row mgbt-xs-0">
                        <label class="col-xs-6 control-label" style="color: #666;">Postcode :</label>
                        <div class="col-xs-6 controls"> <?php echo htmlspecialchars_decode(html_entity_decode($dataList[0][60]));?></div>
                        <!-- col-sm-10 --> 
                      </div>
                
                <div class="row mgbt-xs-0">
                        <label class="col-xs-6 control-label" style="color: #666;">Country :</label>
                        <div class="col-xs-6 controls"><?php $country =  getCountry($dataList[0][15]); echo $country[0][2]; ?></div>
                        <!-- col-sm-10 --> 
                      </div>

                      <div class="row mgbt-xs-0">
              <label class="col-xs-6 control-label" style="color: #666;">Province :</label>
              <div class="col-xs-6 controls"><?php echo htmlspecialchars_decode(html_entity_decode($dataList[0][16]));?></div>
              <!-- col-sm-10 --> 
            </div>
         

          </div>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-6 control-label" style="color: #666;">Office Phone :</label>
              <div class="col-xs-6 controls"> 
			        <?php if($dataList[0][18]!="") echo htmlspecialchars_decode(html_entity_decode($dataList[0][18]));?><br>
              </div>
              <!-- col-sm-10 --> 
            </div>
          </div>
                    
            
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-6 control-label" style="color: #666;">Fax :</label>
              <div class="col-xs-6 controls"> 
                <?php if($dataList[0][19]!="") echo htmlspecialchars_decode(html_entity_decode($dataList[0][19]));?><br>
              </div>
              <!-- col-sm-10 --> 
            </div>
          </div>
                    
           
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-6 control-label" style="color: #666;">Mobile Phone : </label>
              <div class="col-xs-6 controls"> 
			       <?php if($dataList[0][20]!="") echo htmlspecialchars_decode(html_entity_decode($dataList[0][20]));?><br>
              </div>
              <!-- col-sm-10 --> 
            </div>
          </div>
                    
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-6 control-label" style="color: #666;">E-mail :</label>
              <div class="col-xs-6 controls"><?php if($dataList[0][21]!="") echo htmlspecialchars_decode(html_entity_decode($dataList[0][21]));?></div>
              <!-- col-sm-10 --> 
            </div>
          </div>
                    
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-6 control-label" style="color: #666;">Company Website :</label>
              <div class="col-xs-6 controls"><a href="<?php if($dataList[0][22]!="") echo htmlspecialchars_decode(html_entity_decode($dataList[0][22]));?>" target="_blank"><?php if($dataList[0][22]!="") echo htmlspecialchars_decode(html_entity_decode($dataList[0][22]));?>h</a></div>
              <!-- col-sm-10 --> 
            </div>
          </div>
                    
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-6 control-label" style="color: #666;">Social/ecommerce Platform :</label>
              <?php
              $ecom = explode(",",$dataList[0][23]);
              $ecomUrl = explode(",",$dataList[0][24]);
              for($i=0;$i<count($ecom);$i++){ ?> 
              <div class="col-xs-6 controls"><?php echo $ecom[$i];?>   <?php echo $ecomUrl[$i];?><br></div>
              <?php } ?>
              <!-- col-sm-10 --> 
            </div>
          </div>
        </div>
          
          </div>
        </div>
            </div>
          </div>
          
        </div>
        <!-- row -->
        
        <div class="row">
          <div class="pd-10">
            <h4 class="mgbt-xs-15 font-semibold" style="background-color: #2E6FAB; border-radius: 5px; color: #fff; padding: 10px;"><img src="images/icon3.jpg"> Marketing Materials</h4>
            <div class="">
              <div class="content-list">
                
                   <div class="form-group">
                      <div class="col-sm-10">
                        <?Php $getPics = getPics($dataList[0][0],"marketing");
                          if(count($getPics)>0)
                          {
                          for($i=0;$i<count($getPics);$i++)
                          {
                           ?>  
                           <!-- <div class="col-md-2">
                           <a class="example-image-link" href="<?php echo $webUrl;?>register/images/marketing/<?php echo $getPics[$i][2];?>" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
                            <img src="<?php echo $webUrl;?>register/images/marketing/<?php echo $getPics[$i][2];?>" style="max-width: 100%; height: 100%">
                           </a> 
                            <br/>
                           <label>  <?php echo $getPics[$i][3];?></label>

                           </div> --> 

                           <div class="col-md-4" style="margin-bottom: 5px;">
                              <a class="example-image-link" href="<?php echo $webUrl;?>register/images/marketing/<?php echo $getPics[$i][2];?>" alt="<?php echo $getPics[$i][3];?>" data-lightbox="example-3">

                                <img src="<?php echo $webUrl;?>register/images/marketing/<?php echo $getPics[$i][2];?>" class="img-responsive" alt=" <?php echo $getPics[$i][3];?>">
                              </a>
                              <div class="caption">
                                  <?php echo $getPics[$i][3];?>
                              </div>
                            </div>

                           <?php } } else {?>
                           <label style="color: #ff0000" class="col-md-5">No Picture Uploaded</label>
                           <?php } ?> 
                         </div>        
                      </div>
                      
                      
                    <div class="form-group" style="padding-top: 8px;">
                      <div class="col-sm-10">
                      <label class="col-xs-6 control-label" style="color: #666;">YouTube Video :</label>
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
          <!-- col-sm-6 --> 
          
          <!-- col-sm-6 -->           
        </div>


        <div class="row">
          <div class="pd-10">
            <h4 class="mgbt-xs-15 font-semibold" style="background-color: #2E6FAB; border-radius: 5px; color: #fff; padding: 10px;"><img src="images/icon3.jpg"> LOCATION</h4>
            <div class="">
              <div class="content-list">
                
                   <?php if(($dataList[0][25]!="")&&($dataList[0][26]!="")){?>
                                 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBS7ngGD4Xesm8Ec9EArp0qG7dD-x11mT8"></script>
                                  <script type="text/javascript">
                                       function initialize(){
                     var myLatlng = new google.maps.LatLng(<?php echo $dataList[0][25];?>,<?php echo $dataList[0][26];?>);
                     var myOptions = {
                       zoom: 18,
                       center: myLatlng,
                       mapTypeId: google.maps.MapTypeId.ROADMAP
                       }
                      map = new google.maps.Map(document.getElementById("map"), myOptions);
                      var marker = new google.maps.Marker({
                        position: myLatlng, 
                        map: map,
                      title:"Fast marker"
                     });
                  } 
                  google.maps.event.addDomListener(window,'load', initialize);
                                      </script>
                                  <div id="map" style="width: 100%; height: 450px;"></div>
                                      <?php } elseif($dataList[0][27]!="") { ?>
                                      <iframe src="<?php echo $dataList[0][27];?>" width="100%" height="550" frameborder="0" style="border:0" allowfullscreen></iframe>
                                      <?php } ?> 
              </div>    
         
            </div>
          </div>
          <!-- col-sm-6 --> 
          
          <!-- col-sm-6 -->           
        </div>
        <!-- row --> 
      </div>
      <!-- pd-10 --> 
    </div>
    <!-- home-tab -->
    
    <div id="projects-tab" class="tab-pane">
    	<div class="pd-10">
				         
				<h4 class="mgbt-xs-15 mgtp-10 font-semibold"><img src="images/icon.jpg"> ADDITIONAL BRANCH</h4>        
				<div class="row">
          <div class="pd-10">
            
            <div class="content-list content-menu">
              <div class="row">
                                
       
                   
                   
                    
                    
           
          
            
          
		           
                    
                    
                   
                      
                     
         		
          <div class="pd-10">
           <h4 class="mgbt-xs-15 font-semibold"><img src="images/icon3.jpg"> LOCATION</h4>
            <div class="">
              <div class="content-list">
                </div>      
          </div>
          <!-- col-sm-6 --> 
          
          <!-- col-sm-6 -->           
        </div>
          
        </div>
            </div>
          </div>
          
        </div>
                         <div class="">
                         </div>        
        </div>
    </div>
    
    <div id="profile-tab1" class="tab-pane">
   	 <div class="pd-10">
        	
            <div class="row">
            
          <div class="col-sm-6 mgbt-xs-20" style="margin-top:6px;">
            <h4 class="mgbt-xs-15 font-semibold" style="background-color: #2E6FAB; border-radius: 5px; color: #fff; padding: 10px;"><img src="images/icon4.jpg"> BUSINESS AREAS</h4>
            <div class="content-list content-menu">
              <div class="row" style="padding: 10px;">
                        <div>
              <label class="col-xs-6 control-label" style="color: #666;">Core services :</label>
              <div class="col-xs-6 controls">
                <?php 
                if($dataList[0][28]!=""){
                  $exp = explode(',', $dataList[0][28]);
                  for($x=0;$x<count($exp);$x++)
                  {
                      echo htmlspecialchars_decode(html_entity_decode($exp[$x]))."<br> ";
     
                  }
                }else{
                  echo '--';
                }

                ?>
              </div>
              <!-- col-sm-10 --> 
          </div>
          
                    
          <div style="clear:both"></div>
                      <div>
              <label class="col-xs-6 control-label" style="color: #666;">Other services offered:</label>
              <div class="col-xs-6 controls">  <?php if(($dataList[0][32]!="")){
                        $exp = explode('#', $dataList[0][32]);
                        for($x=0;$x<count($exp);$x++)
                        {
                            echo htmlspecialchars_decode(html_entity_decode($exp[$x])).", ";
                            }
                        }else{
                          echo '--';
                        }
                        ?>
                        <?php if($dataList[0][33]!="") {
                          echo htmlspecialchars_decode(html_entity_decode($dataList[0][33]));
                        }
                        ?><br/></div>
              <!-- col-sm-10 --> 
          </div>
          <div style="clear:both"></div>
                    
          
          
          
                    <div>
              <label class="col-xs-6 control-label" style="color: #666;">Industry Focus :</label>
              <div class="col-xs-6 controls">
                
                <?php if($dataList[0][30] != "") { 
                  $expIndus = explode(",",$dataList[0][30]);
                  $txtIndus = explode("#",$dataList[0][72]);
                    for($w=0;$w<count($expIndus);$w++)
                    {
                      echo $expIndus[$w].'<br>';
                      echo $txtIndus[$w];
                    }
                  }
                  ?>

              </div>
              <!-- col-sm-10 --> 
          </div>
          <div style="clear:both"></div>
                    
          
          
                    <div>
              <label class="col-xs-6 control-label" style="color: #666;">Information System Applied in Services :</label>
              <div class="col-xs-6 controls">    <?php if($dataList[0][34]!="") echo htmlspecialchars_decode(html_entity_decode($dataList[0][34])); else echo "Not available";?></div>
              <!-- col-sm-10 --> 
          </div>
          <div style="clear:both"></div>
                    
          
                    <div>
              <label class="col-xs-6 control-label" style="color: #666;">Business Geographic Coverage :</label>
              <div class="col-xs-6 controls">                                         
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
              <!-- col-sm-10 --> 
          </div>
          <div style="clear:both"></div>
                    
          
          
          
        </div>
            </div>
          </div>
          <div class="col-sm-6">
            <h4 class="mgbt-xs-15 font-semibold" style="background-color: #2E6FAB; border-radius: 5px; color: #fff; padding: 10px; margin-top: 5px;"><img src="images/icon5.jpg"> REGISTRATION STATUS</h4>
            <div class="content-list content-menu" style="padding: 10px;">
                          <div>
              <label class="col-xs-6 control-label" style="color: #666;">Year of Registration :</label>
              <div class="col-xs-6 controls">   
									<?php echo $dataList[0][42];?>               </div>
              <!-- col-sm-10 --> 
          	</div>
          <div style="clear:both"></div>
                    
                         <div>
              <label class="col-xs-6 control-label" style="color: #666;">Registration Authority :</label>
              <div class="col-xs-6 controls">   
									 <?php echo $dataList[0][43];?>               </div>
              <!-- col-sm-10 --> 
          	</div>
          <div style="clear:both"></div>
                    
                         <div>
              <label class="col-xs-6 control-label" style="color: #666;">Registration No. :</label>
              <div class="col-xs-6 controls">   
									<?php echo $dataList[0][44];?>              </div>
              <!-- col-sm-10 --> 
          	</div>
          <div style="clear:both"></div>
                    
                        <div>
              <label class="col-xs-6 control-label" style="color: #666;">Company Proprietary Status :</label>
              <div class="col-xs-6 controls"> 
                                         <?php if($dataList[0][45]=="Other"){?>
                                         <?php echo $dataList[0][61];?>
                                         <?php } else { ?>
                                         <?php echo htmlspecialchars_decode(html_entity_decode($dataList[0][45]));?>
                                         <?php } ?>            </div>
              <!-- col-sm-10 --> 
          	</div>
          <div style="clear:both"></div>
                    
            </div>            
          </div>
        </div>
            
            
            
    </div>  
    

     <div class="pd-10">
          
            <div class="row">
          
          <div class="col-sm-6">
            <h4 class="mgbt-xs-15 font-semibold" style="background-color: #2E6FAB; border-radius: 5px; color: #fff; padding: 10px;"><img src="images/icon6.jpg"> MEMBERSHIP</h4>
            <div class="content-list content-menu" style="padding: 10px;">          
              <div>
                <label class="col-xs-6 control-label" style="color: #666;">Name of the Membership Organization/Network :</label>
                <div class="col-xs-6 controls">   
                    <?php echo $dataList[0][51];?>               
                </div>
                <!-- col-sm-10 --> 
              </div>
          <div style="clear:both"></div>
                    
                        <div>
              <label class="col-xs-6 control-label" style="color: #666;">Location of the Membership Organization/Network:</label>
              <div class="col-xs-6 controls">   
                  <?php echo $dataList[0][74]; ?>              </div>
              <!-- col-sm-10 --> 
            </div>
          <div style="clear:both"></div>
                    
          
          
            </div>            
          </div>
          
          <div class="col-sm-6 mgbt-xs-20">
            <h4 class="mgbt-xs-15 font-semibold" style="background-color: #2E6FAB; border-radius: 5px; color: #fff; padding: 10px;"><img src="images/icon7.jpg"> FIXED ASSETS</h4>
            <div class="content-list content-menu">
              <div class="row" style="padding: 10px;">
                        <div>
              <label class="col-xs-6 control-label" style="color: #666;">Employee :</label>
              <div class="col-xs-6 controls">  <?php if($dataList[0][37]!="") echo htmlspecialchars_decode(html_entity_decode($dataList[0][37])); else echo "Not available";?></div>
              <!-- col-sm-10 --> 
          </div>
          <div style="clear:both"></div>
          <?php if($dataList[0][38] != ''): ?>        
          <div>
              <label class="col-xs-6 control-label" style="color: #666;">Drivers : </label>
              <div class="col-xs-6 controls"> <?php if($dataList[0][38]!="") echo htmlspecialchars_decode(html_entity_decode($dataList[0][38])); else echo "Not available";?></div>
              <!-- col-sm-10 --> 
          </div>
          <div style="clear:both"></div>            
          <?php endif; ?>

          <?php if($dataList[0][39]!=""): ?>
          <div>
              <label class="col-xs-6 control-label" style="color: #666;">Trucks : </label>
              <div class="col-xs-6 controls"> <?php if($dataList[0][39]!="") echo htmlspecialchars_decode(html_entity_decode($dataList[0][39])); else echo "Not available";?> </div>
              <!-- col-sm-10 --> 
          </div>
          <div style="clear:both"></div>   
          <?php endif; ?>
              
              <?php if($dataList[0][40]!=""): ?>
              <div>
                <label class="col-xs-6 control-label" style="color: #666;">Warehouse : </label>
                <div class="col-xs-6 controls">   <?php if($dataList[0][40]!="") echo htmlspecialchars_decode(html_entity_decode($dataList[0][40])); else echo "Not available";?></div>
                <!-- col-sm-10 --> 
                </div>
              
                <div style="clear:both"></div>
                <?php endif; ?>

              <?php if($dataList[0][41]!=""): ?>
                      <div>
              <label class="col-xs-6 control-label" style="color: #666;">Other Assets : </label>
              <div class="col-xs-6 controls"> <?php if($dataList[0][41]!="") echo htmlspecialchars_decode(html_entity_decode($dataList[0][41])); else echo "Not available";?></div>
              <!-- col-sm-10 --> 
          </div>
          <div style="clear:both"></div>
                <?php endif; ?>

                <!--IMG-->
                <div class="form-group">

                <label for="profile_email" class="col-sm-12 control-label"> Photos</label>

                <div>

                  <?Php $getPics = getPics($dataList[0][0],"fixed_asset");

                            if(count($getPics)>0)

                            {

                            for($i=0;$i<count($getPics);$i++)

                            {

                             ?>  

                              <div class="col-md-4" style="margin-bottom: 5px;">
                                <a class="example-image-link" href="<?php echo $webUrl;?>register/images/fixed_asset/<?php echo $getPics[$i][2];?>" alt="<?php echo $getPics[$i][3];?>" data-lightbox="example-4">

                                  <img src="<?php echo $webUrl;?>register/images/fixed_asset/<?php echo $getPics[$i][2];?>" class="img-responsive" alt="<?php echo $getPics[$i][3];?>">
                                </a>
                                <div class="caption">
                                    <?php echo $getPics[$i][3];?>
                                </div>
                              </div>
                           <!-- <div class="col-md-2">

                           <a class="example-image-link" href="<?php echo $webUrl;?>register/images/fixed_asset/<?php echo $getPics[$i][2];?>" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">

                            <img src="<?php echo $webUrl;?>register/images/fixed_asset/<?php echo $getPics[$i][2];?>" style="display: block; width: 100%; height: auto; max-width: 100%; max-height: 100%;">

                           </a> 

                            <br/>

                           <label>  <?php echo $getPics[$i][3];?></label> -->



                           </div> 

                           <?php } } else {?>

                           <label style="color: #ff0000" class="col-md-5">No Picture Uploaded</label>

                           <?php } ?> 

                   </div>        

                </div>
                <!--/IMG--> 
          
        </div>
            </div>
          </div>
          

        </div>
            
            
            
    </div> 



    <div class="pd-10">
          
            <div class="row">
          
          <div class="col-sm-6">
            <h4 class="mgbt-xs-15 font-semibold" style="background-color: #2E6FAB; border-radius: 5px; color: #fff; padding: 10px;"><img src="images/icon6.jpg"> AWARDS</h4>
            <div class="content-list content-menu" style="padding: 10px;">
                 <?Php $getPics = getPics($dataList[0][0],"awards");
                                        if(count($getPics)>0)
                                        {
                                        for($i=0;$i<count($getPics);$i++)
                                        {
                                         ?>  
                                        
                                        <div class="col-md-4" style="margin-bottom: 5px;">
                                          <a class="example-image-link" href="<?php echo $webUrl;?>register/images/awards/<?php echo $getPics[$i][2];?>" alt="<?php echo $getPics[$i][3];?>" data-lightbox="example-1">

                                            <img src="<?php echo $webUrl;?>register/images/awards/<?php echo $getPics[$i][2];?>" class="img-responsive" alt="Flying Kites">
                                          </a>
                                          <div class="caption">
                                              <?php echo $getPics[$i][3];?>
                                          </div>
                                        </div> 
                                         <?php } } else {?>
                                         <label style="color: #ff0000" class="col-md-5">No Picture Uploaded</label>
                                         <?php } ?>
          
            </div>            
          </div>
          
          <div class="col-sm-6 mgbt-xs-20">
            <h4 class="mgbt-xs-15 font-semibold" style="background-color: #2E6FAB; border-radius: 5px; color: #fff; padding: 10px;"><img src="images/icon7.jpg"> CERTIFICATIONS</h4>
            <?Php $getPics = getPics($dataList[0][0],"certificate");
                  if(count($getPics)>0)
                  {
                  for($i=0;$i<count($getPics);$i++)
                  {
                   ?>  
                   <!-- <div class="col-md-2">
                   <a class="example-image-link" href="<?php echo $webUrl;?>register/images/certificate/<?php echo $getPics[$i][2];?>" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
                    <img src="<?php echo $webUrl;?>register/images/certificate/<?php echo $getPics[$i][2];?>" style="max-width: 100%; height: 100%">
                   </a> 
                    <br/>
                   <label>  <?php echo $getPics[$i][3];?></label>

                   </div>  -->

                    <div class="col-md-4" style="margin-bottom: 5px;">
                      <a class="example-image-link" href="<?php echo $webUrl;?>register/images/certificate/<?php echo $getPics[$i][2];?>" alt="<?php echo $getPics[$i][3];?>" data-lightbox="example-1">

                        <img src="<?php echo $webUrl;?>register/images/certificate/<?php echo $getPics[$i][2];?>" class="img-responsive" alt="<?php echo $getPics[$i][3];?>">
                      </a>
                      <div class="caption">
                          <?php echo $getPics[$i][3];?>
                      </div>
                    </div> 
                   <?php } } else {?>
                   <label style="color: #ff0000" class="col-md-5">No Picture Uploaded</label>
                   <?php } ?> 
          </div>
          

        </div>
            
            
            
    </div>


    <div class="pd-10">
          
            <div class="row">
          
          <div class="col-sm-12">
            <h4 class="mgbt-xs-15 font-semibold" style="background-color: #2E6FAB; border-radius: 5px; color: #fff; padding: 10px;"><img src="images/icon6.jpg"> SUCCESS STORY</h4>
            <div class="content-list content-menu" style="padding: 10px;">
                          
                 <?php echo htmlspecialchars_decode(html_entity_decode($dataList[0][53]));?>   
                        
                        
            </div>            
          </div>
        </div>
            
    </div>





    </div>
    
<div id="photos-tab" class="tab-pane">
      <div class="pd-10">
        <h3 class="mgbt-xs-15 mgtp-10 font-semibold"><img src="images/icon8.jpg"> Place your business requirements here</h3>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/inq/inquiry-form.css">
        <link rel="stylesheet" href="css/inq/inquiry-form-blue.css">

                <div class="isotope js-isotope vd_gallery">
                
                      <form id="enquiry_form" name="enquiry_form" class="sky-form">
                          <fieldset>          
                            <div class="row">
                              <section class="col col-6">
                                <label class="input">
                                  <i class="icon-append icon-user"></i>
                                  <input type="text" id="enqName" placeholder="Name*">
                                </label>
                              </section>
                              <section class="col col-6">
                                <label class="input">
                                  <i class="icon-append icon-hashtag"></i>
                                  <input type="text" id="enqCompany" placeholder="Company*">
                                </label>
                              </section>
                            </div>
                            
                            <div class="row">
                              <section class="col col-6">
                                <label class="input">
                                  <i class="icon-append icon-envelope-alt"></i>
                                  <input type="email" id="enqEmail" placeholder="E-mail*">
                                </label>
                              </section>
                              <section class="col col-6">
                                <label class="input">
                                  <i class="icon-append icon-phone"></i>
                                  <input type="tel" id="enqPhone" placeholder="Phone*">
                                </label>
                              </section>
                            </div> 
                            <div class="row">
                              <section class="col col-6">
                                <label class="input">
                                  <i class="icon-append icon-globe" aria-hidden="true"></i>

                                  <input type="url" id="enqWebsite" placeholder="Website">
                                </label>
                              </section>
                              <section class="col col-6">
                                <label class="select">
                                  <select id="enqCountry">
                                    <option value="0" selected disabled>Select Country*</option>
                                    <option value="Combodia">
                                    Combodia</option>
                                    <option value="Lao Pdr">Lao Pdr</option>
                                    <option value="Myanmar">Myanmar</option>
                                    <option value="Vietnam">Vietnam</option>
                                    <option value="Thailand">Thailand</option>
                                  </select>
                                  <i></i>
                                </label>

                              </section>
                            </div>
                            
                            <section>
                              <label class="textarea">
                                <i class="icon-append icon-comment"></i>
                                <textarea id="enqComments" rows="5" placeholder="Tell us about your requirements"></textarea>
                              </label>
                            </section>  

                            <section>
                            <i>* Compulsory Field</i>
                            </section>        
                          </fieldset>

                          <footer>
                            <button type="button" id="submitEnquiry" class="button">Send request</button>
                          </footer>
                        </form> 
                </div>
                
                <div class="clearfix"></div>       
        
      </div>
      <!-- pd-10 -->       
    </div> <!-- photos tab -->


    <div id="photos-tab1" class="tab-pane">
      <div class="pd-10">
        <h4 class="mgbt-xs-15 mgtp-10 font-semibold" style="background-color: #2E6FAB; border-radius: 5px; color: #fff; padding: 10px;"><img src="images/icon8.jpg"> NEWS & EVENTS</h4>
                <div class="isotope js-isotope vd_gallery">
                
                    <div style="width: 100%; background-color: #F0F0F0; height: 400px;">            
		                <div id="one" style="width: 60%; float: left; padding: 10px; height: 380px; margin: 1%; background-color: #fff;">
		                <font style="font-size: 16px;">Headline</font><br>
		                <font style="color: #2E6FAB; font-size: 20px;">Logistics Seminar in India</font><br>
		                <font style="font-size: 10px;">[27 Dec 2016 | One Comment | 481 views]</font><br>
		                	<div>
		                	<div id="left" style="width: 60%; float: left; display: inline-block;">
		                	<img src="images/news/hygene.jpg" height="280px;" />
		                	</div>
		                	<div id="right" style="width: 40%; float: right; padding-left: 3px; display: inline-block;" align="justify">
		                	Logistics Seminar Logistics Seminar quis vestas at pede ac orci. Eufamet in aenean sed eu nam morbi dui velis sus phasellus. Insapien condum eget habitur orci nullamcorper lacus purus nam eu dapientum. Orcivel tempus quam nam id nullam proin vestique fauctor fuscing quis..<br><br>
		                	<a href="#">Read the full story...</a>
		                	</div>
		                	</div>
		                </div>
		                <div id="two" style="width: 37%; float: left; padding: 10px; height: 380px; margin-right: 1%; margin-top: 1%; margin-bottom: 1%; background-color: #fff;">
		                <font style="font-size: 16px;">Featured</font><br><br>
		                <img src="images/news/fashion.jpg" /> Hrkjkjo<br>
		                <hr>
		                <img src="images/news/fashion.jpg" /><br>
		                <hr>
		                <img src="images/news/fashion.jpg" /><br>
		                <hr>
		                </div>
	                </div>
                  
                </div>
                
                <div class="clearfix"></div>       
        
      </div>
      <!-- pd-10 -->       
    </div> 
      <!-- photos tab -->  
      <!-- groups tab -->   
    
  </div>
  <!-- tab-content --> 
</div>
<!-- tabs-widget -->              </div>
            </div>



<a id="back-top" href="#" data-action="backtop" class="vd_back-top visible"> <i class="fa  fa-angle-up"> </i> </a>
  
 
		
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


﻿<footer id="footer" class="sec-padding">
	<div class="thm-container">
		<div class="row">
			<div class="col-md-31 col-sm-6 footer-widget">
				<div class="pl-30">
					<div class="title">
						<h3><span>NAVIGATION</span></h3>
					</div>
					<ul class="link-list">
						<li><a href="index.php">Home</a></li>
						<li><a href="logistics-data.php">Company Database</a></li>
						<li><a href="forum.php">Forum</a></li>
						<li><a href="regulation.php">Regulation</a></li>  
                        <li><a href="#">Events</a></li>
                        <li><a href="signup.php">Login</a></li>
						
					</ul>
                  
				</div>
			</div>
			<div class="col-md-31 col-sm-6 footer-widget">
				<div class="pl-30">
					<div class="title">
						<h3><span>ABOUT US</span></h3>
					</div>
					<ul class="link-list">
						<li><a href="gms-logistics-database.php">GMS Logistics Database</a></li>
						<li><a href="logistics-project.php">Logistics Dev. project</a></li>
						<li><a href="project-partners.php">Project Partners</a></li>
						<li><a href="related-websites.php">Related Website</a></li>
						<li><a href="mekong-institute.php">Mekong Institute</a></li>
						
					</ul>
				</div>
                
			</div>
			<div class="col-md-2 col-sm-6 footer-widget">
			  <div class="title">
					<h3><span>IMPLEMENTED BY</span></h3>
				</div>
				<P><img src="images/01.png" width="89" height="87"></P>
               
                <div class="title">
					<h3><span>FUNDED BY </span></h3>
				</div>
                <P><img src="images/02.png" width="89" height="100"></P>
			</div>
			<div class="col-md-4 col-sm-6 footer-widget">
				<div class="title">
					<h3><span>CONTACT US</span></h3>
				</div>
				<ul class="contact-infos">
					<li>
						<div class="icon-box">
							<i class="fa fa-map-marker"></i>
						</div>
						<div class="text-box">
							<p><b>Mekong Institute</b> <br> 123 Khon Kaen University
Mittraphap Rd., Muang District, Khon Kaen 40002, THAILAND</p>
						</div>
					</li>
					<li>
						<div class="icon-box">
							<i class="fa fa-phone"></i>
						</div>
						<div class="text-box">
							<p>+66 (0) 43 202 411-2/+66 (0) 43 203 656-7</p>
						</div>
					</li>
					<li>
						<div class="icon-box">
							<i class="fa fa-envelope-o"></i>
						</div>
						<div class="text-box">
							<p>information@mekonginstitute.org</p>
						</div>
					</li>
					<li>
						<div class="icon-box">
							<i class="icon icon-Timer"></i>
						</div>
						<div class="text-box">
							<p>www.mekonginstitute.org</p>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
</footer>

<section class="bottom-bar">
	<div class="thm-container clearfix">
		<div class="pull-left">
			<p>Copyright © GMS Logistics 2016. All rights reserved.</p>
		</div>
		<div class="pull-right">
			<p>Powered by: <a href="http://webcomindia.biz/" target="_blank">Web.Com (India) Pvt. Ltd.</a></p>
		</div>
	</div>
</section>

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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.9.0/js/lightbox.min.js"></script>
<!-- theme custom js  -->
<script src="js/main.js"></script>

<script type="text/javascript">
$(document).ready(function() {
	"use strict";
		
  // init Isotope
  var $container = $('.isotope').isotope({
    itemSelector: '.gallery-item',
    layoutMode: 'fitRows'
  });
  

	$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
	  $container.isotope('layout');
	});

  // bind filter button click
  $('#filters').on( 'click', 'a', function() {
    var filterValue = $( this ).attr('data-filter');
	$('#filters li').removeClass('active');
	$(this).parent().addClass('active');	
    $container.isotope({ filter: filterValue });
  });

	
});

$('#submitEnquiry').click(function(e) {
  e.preventDefault();

  var enqName     = $('#enqName').val();
  var enqCompany  = $('#enqCompany').val();
  var enqEmail    = $('#enqEmail').val();
  var enqPhone    = $('#enqPhone').val();
  var enqWebsite  = $('#enqWebsite').val();
  var enqCountry  = $('#enqCountry').val();
  var enqComments = $('#enqComments').val();

  var data = '';
  var url  = '';

  data += '&enqName='+enqName+'&enqCompany='+enqCompany+'&enqEmail='+enqEmail+'&enqPhone='+enqPhone+'&enqWebsite='+enqWebsite+'&enqCountry='+enqCountry+'&enqComments='+enqComments;
  url += '<?php echo $webUrl;?>rest_insert_enquiry.php';

  if( (enqName.trim() != '') && (enqCompany.trim() != '') && (enqPhone.trim() != '') && (enqCountry.trim() != '') ) {
    $.ajax({
      data : data,
      url : url,
      type : 'get',
      error : function(resp) {
        alert('oops ! something went wrong.')
        console.log(resp);
      },
      success : function(resp) {
        alert(resp);
         //$("#enquiry_form").reset();
         $("#enquiry_form")[0].reset();
      }
    });
  }else{
    alert('Please check the compulsory fields !');
  }
});
</script>

</body>


</html>