<?php
include("include/globalIncWeb.php");
ini_set("display_errors",0);
$id = $_GET['id'];

$hit_check_sql = "SELECT hits FROM tbl_user_data WHERE id = $id";
$hits = mysql_query($hit_check_sql);
$hit_values = mysql_fetch_assoc($hits);
$no_of_hits = $hit_values['hits']; 

$updated_hit = $no_of_hits+1;

$sqlUp = "update `tbl_user_data` set `hits`='".$updated_hit."' where id ='".$id."'";
mysql_query($sqlUp); 


$sql = "SELECT 
  user_data.*, c.id as countryId, c.name as countryName, c.sortname as countryShortName
FROM 
  tbl_user_data as user_data, countries as c
WHERE
  user_data.company_addr_country = c.id
AND
  user_data.id = $id
";
if($cn == false)
connect3db();
$res = mysql_query($sql);

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
		<h2>Company Profile (CAMBODIA)</h2>
		
	</div>
</section>


<section class="sec-padding page-title">
	<div class="thm-container">
		<div class="sec-title">
			<h2><span>GLOBAL LINK SERVICE PTE LTD Profile</span></h2>
			
		</div>
	</div>
</section>

	<div class="thm-container">
		<div class="row">
       
 		<div class="row">
              <div class="col-sm-3">
                <div class="panel widget light-widget panel-bd-top">
                  <div class="panel-heading no-title"> </div>
                  <div class="panel-body">
                    <div class="text-center vd_info-parent"><img src="register/uploads/comlogo.png" style="max-width:206px;"></div>
                    
                    <h2 class="font-semibold mgbt-xs-5"></h4>
                    
                    <div class="mgtp-20">
                      <table class="table table-striped table-hover">
                        <tbody>
                          <tr>
                            <td style="width:60%;">Status</td>
                            <td><span class="label label-success">Active</span></td>
                          </tr>
                          <!--<tr>
                            <td>User Rating</td>
                            <td><i class="fa fa-star vd_yellow fa-fw"></i><i class="fa fa-star vd_yellow fa-fw"></i><i class="fa fa-star vd_yellow fa-fw"></i><i class="fa fa-star vd_yellow fa-fw"></i><i class="fa fa-star vd_yellow fa-fw"></i></td>
                          </tr>-->
                          <tr>
                            <td>Member Since</td>
                            <td> Jan 07, 2014 </td>
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
    
    <li> <a data-toggle="tab" href="#photos-tab"> Events & News <span class="menu-active"><i class="fa fa-caret-up"></i></span> </a></li>

    <li> <a data-toggle="tab" href="#photos-tab">Connect <span class="menu-active"><i class="fa fa-caret-up"></i></span> </a></li>
    
        
   
  </ul>
  <div class="tab-content">
    <div id="profile-tab" class="tab-pane active">
      <div class="pd-20">    
        <h4 class="mgbt-xs-15 mgtp-10 font-semibold"><img src="http://logisticsgms.com/images/icon1.jpg"> ABOUT</h4>
        <div class="pd-20">
        <div class="row">
         COMPANY PROFILE

GLOBAL LINK SERVICE PTE LTD was incorporated in 2003 as an
international freight forwarder. It was diversified a wide range of
transportation and logistics services provider with mainstream activities
by air freight, sea freight (FCL/LCL), shipping, project cargo, inland
transportation and custom clearance.

Through many years experience in the field of shipping and freight
forwarding, we are committed to using our knowledge and professional
skill in multi modal services to fit the requirement of local and
international transportation services, that GLOBAL LINK SERVICE PTE
LTD is steadily growing up with full support from potential customers
and continue to expand our services.

MISSION AND COOPERATION

Goal of our mission is to conduct the global business to customers&#039; highest satisfaction. We provide a full integrated transportation and logistics services with the most efficient methods, flexible, high service level and quality to meet customers’ needs and requirements.

Link to our worldwide networks that we have established to enable providing services to customers and keep them reassured and confidence of our total quality services.

Service activities of our business are consisting on:
        International Air & Sea Freight Forwarding
        FCL & LCL Cargo Services
        Inland Transportation
        Custom Broker & Cargo Door Delivery
        Projects Cargo
        Vessel Chartering
        Shipping Agency
        Cargo Insurance
        Cargo Inspection Service 

Please other business activities of our companies through www.gls.com.kh        </div>
        </div>
        <hr class="pd-10"  />
        <div class="pd-20">
        <div class="row">
          <div>
            <h4 class="mgbt-xs-15 font-semibold"><img src="images/icon2.jpg"> COMPANY CONTACTS</h4>
            <div class="content-list content-menu">
              <div class="row">
                    <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Office Type :</label>
              <div class="col-xs-7 controls"> Headquarter</div>
              <!-- col-sm-10 --> 
            </div>
          </div>
                              <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Legal Representative :  </label>
              <div class="col-xs-7 controls">Mr. Por Sour</div>
              <!-- col-sm-10 --> 
            </div>
          </div>
                      
             <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Focal Person : </label>
              <div class="col-xs-7 controls">Mr. Por Sour</div>
              <!-- col-sm-10 --> 
            </div>
          </div>
         
       
          
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Position : </label>
              <div class="col-xs-7 controls"> Managing Director</div>
              <!-- col-sm-10 --> 
            </div>
          </div>
                       
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Department : </label>
              <div class="col-xs-7 controls"> Management</div>
              <!-- col-sm-10 --> 
            </div>
          </div>
                               <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Street & District :</label>
              <div class="col-xs-7 controls">No. 168KA, Street 598, Sangkat Toul Sangke, Khan Russey Keo,</div>
              <!-- col-sm-10 --> 
            </div>
          </div>
                  
          
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">City : </label>
              <div class="col-xs-7 controls">Phnom Penh</div>
              <!-- col-sm-10 --> 
            </div>
          </div>
                    
           
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Postcode :</label>
              <div class="col-xs-7 controls"> 12105</div>
              <!-- col-sm-10 --> 
            </div>
          </div>
           
          
                     <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Country :</label>
              <div class="col-xs-7 controls">cambodia</div>
              <!-- col-sm-10 --> 
            </div>
          </div>
           
          
		            <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Province :</label>
              <div class="col-xs-7 controls">Phnum Penh</div>
              <!-- col-sm-10 --> 
            </div>
          </div>
                    
                    <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Office Phone :</label>
              <div class="col-xs-7 controls"> 
			        +855 23 998 805/6<br>
              </div>
              <!-- col-sm-10 --> 
            </div>
          </div>
                    
            
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Fax :</label>
              <div class="col-xs-7 controls"> 
			                   +855 23 998 807<br>
                                                       </div>
              <!-- col-sm-10 --> 
            </div>
          </div>
                    
           
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Mobile Phone : </label>
              <div class="col-xs-7 controls"> 
			        +855 11 465 555<br>
              </div>
              <!-- col-sm-10 --> 
            </div>
          </div>
                    
                     <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">E-mail :</label>
              <div class="col-xs-7 controls">por-sour@gls.com.kh</div>
              <!-- col-sm-10 --> 
            </div>
          </div>
                    
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Company Website :</label>
              <div class="col-xs-7 controls"><a href="http://www.gls.com.kh" target="_blank">http://www.gls.com.kh</a></div>
              <!-- col-sm-10 --> 
            </div>
          </div>
                    
                    <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Social/ecommerce Platform :</label>
              <div class="col-xs-7 controls">Facebook-<br></div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          		</div>
          
          
        </div>
            </div>
          </div>
          
        </div>
        <!-- row -->
        <hr class="pd-10"  />
        <div class="row">
          <div class="pd-20">
            <h4 class="mgbt-xs-15 font-semibold"><img src="images/icon3.jpg"> LOCATION</h4>
            <div class="">
              <div class="content-list">
                
                   <iframe src="https://www.google.com.kh/?gws_rd=cr,ssl&amp;amp;amp;ei=tVIwV7fVEcfAmAXok7iwDQ#q=map+address+No.+168KA%2C+Street+598%2C+Sangkat+Toul+Sangke%2C+Khan+Russey+Keo%2C+Phnom+Penh%2C+Cambodia" width="100%" height="550" frameborder="0" style="border:0" allowfullscreen></iframe>
                  </div>    
         
            </div>
          </div>
          <!-- col-sm-7 --> 
          
          <!-- col-sm-7 -->           
        </div>
        <!-- row --> 
      </div>
      <!-- pd-20 --> 
    </div>
    <!-- home-tab -->
    
    <div id="projects-tab" class="tab-pane">
    	<div class="pd-20">
				         
				<h4 class="mgbt-xs-15 mgtp-10 font-semibold"><img src="images/icon.jpg"> ADDITIONAL BRANCH</h4>        
				<div class="row">
          <div class="pd-20">
            
            <div class="content-list content-menu">
              <div class="row">
                                
       
                   
                   
                    
                    
           
          
            
          
		           
                    
                    
                   
                      
                     
         		<hr class="pd-10"  />
          <div class="pd-20">
           <h4 class="mgbt-xs-15 font-semibold"><img src="images/icon3.jpg"> LOCATION</h4>
            <div class="">
              <div class="content-list">
                </div>      
          </div>
          <!-- col-sm-7 --> 
          
          <!-- col-sm-7 -->           
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
   	 <div class="pd-20">
        	
            <div class="row">
            
          <div class="col-sm-7 mgbt-xs-20" style="margin-top:6px;">
            <h4 class="mgbt-xs-15 font-semibold"><img src="images/icon4.jpg"> BUSINESS AREAS</h4>
            <div class="content-list content-menu">
              <div class="row">
                        <div>
              <label class="col-xs-5 control-label">Core services :</label>
              <div class="col-xs-7 controls">  Freight forwarders,Warehouse services,Customs Broker,Lead Logistics Provider,Others,</div>
              <!-- col-sm-10 --> 
          </div>
          
                    
          <div style="clear:both"></div>
                      <div>
              <label class="col-xs-5 control-label">Other services offered :</label>
              <div class="col-xs-7 controls">  Survey agent<br/></div>
              <!-- col-sm-10 --> 
          </div>
          <div style="clear:both"></div>
                    
          
          
          
                    <div>
              <label class="col-xs-5 control-label">Industry Focus :</label>
              <div class="col-xs-7 controls">   Processed agri-products<br><div style='margin-bottom:10px;'></div>Manufactured items<br><div style='margin-bottom:10px;'></div>Construction materials<br><div style='margin-bottom:10px;'></div>Consumer products<br><div style='margin-bottom:10px;'></div>Project Cargo<br><div style='margin-bottom:10px;'></div>Others<br><div style='margin-bottom:10px;'></div><br>International insurance companies and P&amp;I Clubs</div>
              <!-- col-sm-10 --> 
          </div>
          <div style="clear:both"></div>
                    
          
          
                    <div>
              <label class="col-xs-5 control-label">Information System Applied in Services :</label>
              <div class="col-xs-7 controls">    http://agency.lloyds.com/AgentDetails/444</div>
              <!-- col-sm-10 --> 
          </div>
          <div style="clear:both"></div>
                    
          
                    <div>
              <label class="col-xs-5 control-label">Business Areas :</label>
              <div class="col-xs-7 controls">                                         Southern Asia<br>
									<div style="margin-bottom:10px;">Cambodia and Lao</div>
                                    </div>
              <!-- col-sm-10 --> 
          </div>
          <div style="clear:both"></div>
                    
          
          
          
        </div>
            </div>
          </div>
          <div class="col-sm-5">
            <h4 class="mgbt-xs-15 font-semibold"><img src="images/icon5.jpg"> REGISTRATION STATUS</h4>
            <div class="content-list content-menu">
                          <div>
              <label class="col-xs-7 control-label">Year of Registration :</label>
              <div class="col-xs-5 controls">   
									2003               </div>
              <!-- col-sm-10 --> 
          	</div>
          <div style="clear:both"></div>
                    
                         <div>
              <label class="col-xs-7 control-label">Registration Authority :</label>
              <div class="col-xs-5 controls">   
									Ministry of Commerce               </div>
              <!-- col-sm-10 --> 
          	</div>
          <div style="clear:both"></div>
                    
                         <div>
              <label class="col-xs-7 control-label">Registration No. :</label>
              <div class="col-xs-5 controls">   
									CO.6456KH/2003               </div>
              <!-- col-sm-10 --> 
          	</div>
          <div style="clear:both"></div>
                    
                        <div>
              <label class="col-xs-7 control-label">Proprietary Status :</label>
              <div class="col-xs-5 controls">   
									Sole Proprietary               </div>
              <!-- col-sm-10 --> 
          	</div>
          <div style="clear:both"></div>
                    
                        <div>
              <label class="col-xs-7 control-label">Registered Capital :</label>
              <div class="col-xs-5 controls">   
									100,000               </div>
              <!-- col-sm-10 --> 
          	</div>
          <div style="clear:both"></div>
                    
                        <div>
              <label class="col-xs-7 control-label">Annual Turn Over :</label>
              <div class="col-xs-5 controls">   
									700,000-1,000,000               </div>
              <!-- col-sm-10 --> 
          	</div>
          <div style="clear:both"></div>
                    
                         <div>
              <label class="col-xs-7 control-label">Annual Revenue :</label>
              <div class="col-xs-5 controls">   
									200,000               </div>
              <!-- col-sm-10 --> 
          	</div>
          <div style="clear:both"></div>
                    
            </div>            
          </div>
        </div>
            
            
            
    </div>  
    
    
    <div class="pd-20">
        	
            <div class="row">
          
          <div class="col-sm-7">
            <h4 class="mgbt-xs-15 font-semibold"><img src="images/icon6.jpg"> MEMBERSHIP</h4>
            <div class="content-list content-menu">
                          <div>
              <label class="col-xs-5 control-label">Membership :</label>
              <div class="col-xs-7 controls">   
									gms               </div>
              <!-- col-sm-10 --> 
          	</div>
          <div style="clear:both"></div>
                    
                         <div>
              <label class="col-xs-5 control-label">Country based in :</label>
              <div class="col-xs-7 controls">   
									Cambodia               </div>
              <!-- col-sm-10 --> 
          	</div>
          <div style="clear:both"></div>
                    
          
                        <div>
              <label class="col-xs-5 control-label">Name of the Organization :</label>
              <div class="col-xs-7 controls">   
									Cambodia Freight Forwarders Association (CAMFFA)               </div>
              <!-- col-sm-10 --> 
          	</div>
          <div style="clear:both"></div>
                    
                        <div>
              <label class="col-xs-5 control-label">Type of the Organization:</label>
              <div class="col-xs-7 controls">   
									Business Associations               </div>
              <!-- col-sm-10 --> 
          	</div>
          <div style="clear:both"></div>
                    
          
          
            </div>            
          </div>
          
          <div class="col-sm-5 mgbt-xs-20">
            <h4 class="mgbt-xs-15 font-semibold"><img src="images/icon7.jpg"> FIXED ASSETS</h4>
            <div class="content-list content-menu">
              <div class="row">
                        <div>
              <label class="col-xs-7 control-label">Employee :</label>
              <div class="col-xs-5 controls">  13</div>
              <!-- col-sm-10 --> 
          </div>
          <div style="clear:both"></div>
                    
          
                      
          
                      
     
                      <div>
              <label class="col-xs-7 control-label">Warehouse : </label>
              <div class="col-xs-5 controls">  800sqm</div>
              <!-- col-sm-10 --> 
          </div>
          <div style="clear:both"></div>
                    
                      <div>
              <label class="col-xs-7 control-label">Other Assets : </label>
              <div class="col-xs-5 controls">  Own office building</div>
              <!-- col-sm-10 --> 
          </div>
          <div style="clear:both"></div>
                    
          
          
          
          
          
          
          
          
          
        </div>
            </div>
          </div>
          
        </div>
            
            
            
    </div>      
    </div>
    
    <div id="photos-tab" class="tab-pane">
      <div class="pd-20">
        <h3 class="mgbt-xs-15 mgtp-10 font-semibold"><img src="images/icon8.jpg"> Enquiry</h3>
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
      <!-- pd-20 -->       
    </div> <!-- photos tab -->
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

  url += 'rest_insert_enquiry.php';

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
      }
    });
  }else{
    alert('Please enter the compulsory fields !');
  }
});
</script>

</body>


</html>