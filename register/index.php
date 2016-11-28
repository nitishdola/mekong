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

<script type="text/javascript" src="js/jquery.min.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script> 
<script type="text/javascript" src="js/register.js"></script> 
<style>
.myselect{
    border: 1px solid #EAEAEA;
border-radius:5px;
height: 41px;
padding-left:10px;
color: #999;
    
width:100%;

}
</style>
</head>
<body>

<!-- Start header -->
<?php include("include/top.php"); ?>
<!-- End mainmenu -->

<section class="inner-banner">
	<div class="thm-container">
		<h2>Sign up</h2>
		<ul class="breadcumb">
			<li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
			<li><span>Sign up</span></li>
		</ul>
	</div>
</section>

<section class="sec-padding">
	<div class="thm-container">
		<div class="sec-title">
			<h2><span>Sign up for GMS Logistics, it's free</span></h2>
			
		</div>
		<div class="row">
			<div class="col-md-6 col-sm-12 col-xs-12 pull-left">
				 <form class="contact-form">
					<div class="form-grp full">	
						<h3>Already Registered </h3>
                    </div>
					<div class="form-grp full">
						<input type="email" id="txtLogUser" class="form-control" placeholder="Email address"  autofocus style="width:85%">
							</div>
                            
                           <div class="form-grp full">
								<input type="password" id="txtLogPass" class="form-control" placeholder="Password"   style="width:85%">
							</div>

						<button type="button" class="thm-btn" id="sign1">Sign in <i class="fa fa-arrow-circle-right"></i></button>
					</form>
                     <div id="logStatus" style="display:none; color:#F00"></div>
<br>

<div class="clearfix"></div>



			</div>
			<div style=" border-left:1px solid #BCBCBB " class="col-md-6 hidden-sm text-right pull-right">
					<form class="contact-form">
                    <div class="form-grp full" align="left">	
						<h3>New User </h3>
                 </div>
                     <div id="err" align="left"  class="form-grp full"  style="padding:3px; color:#F00; display:none">sadsad</div>
						<div class="form-grp-box">
							<div class="form-grp half">
								<input type="text" class="form-control" placeholder="First Name" name="txtFName" id="txtFName"  onKeyUp="this.value=this.value.replace(/[^a-zA-Z ]+/g,'')">
							</div>
                            <div class="form-grp half">
								<input type="text" class="form-control" name="txtLName" id="txtLName"  placeholder="Last Name" onKeyUp="this.value=this.value.replace(/[^a-zA-Z ]+/g,'')">
							</div>
                            </div>
                            
                            <div class="form-grp-box">
							<div class="form-grp half">
								<input type="email" class="form-control" name="txtEmail" placeholder="Email ID" id="txtEmail">
							</div>
                            <div class="form-grp half">
								<input type="text" class="form-control" name="txtPhone" id="txtPhone" placeholder="Phone No"  onKeyUp="this.value=this.value.replace(/[^+ 0-9 -]/g,'')">
							</div>
                            </div>
						
                        
                         
						<div class="form-grp-box">
							<div class="form-grp half">
								<select class="myselect" name="txtCountry" id="txtCountry" >
									<option value="">Country </option>
                                            <option value="36">Cambodia</option>
                                            <option value="119">Lao PDR</option>
                                            <option value="150">Myanmar</option>
                                            <option value="217">Thailand</option>
                                            <option value="238">Vietnam</option>
								</select>
							</div>
                            <div class="form-grp half">
								<select class="myselect" name="txtState" id="txtState"  >
									<option value="">Select</option>
								</select>
							</div>
                            </div>
							<div class="form-grp full">
								<input type="text" placeholder="City" class="form-control" name="txtCity" id="txtCity"  onKeyUp="this.value=this.value.replace(/[^a-zA-Z ]+/g,'')">
							</div>
                            
                            <div class="form-grp-box">
							<div class="form-grp half">
								<input type="password" class="form-control" name="txtPassword" placeholder="Password" id="txtPassword" >
							</div>
                            <div class="form-grp half">
								<input type="password" class="form-control" name="txtRePassword" placeholder="Re-enter"  id="txtRePassword">
							</div>
                            </div>
						
						<div class="form-grp">
							<div class="g-recaptcha" data-sitekey="6LcRjSITAAAAAIfr2nqH8g3wbI7AdtCiBE3TEzBn"></div>
						</div>
                        <div style="clear:both"></div>
 							<br>
<br>

                          <div class="form-grp full" style="background-color: #F9F9F9; padding: 5px; text-align:left">
                            The GMS Logistics Database is one of Mekong Institute’s development projects. In the event of any disputes between the companies registered in the database and the users, the Mekong Institute will not be take any legal responsibility.
                            </div>
                           <div class="clearfix"></div> 
                          <div class="col-md-1">
							 <input type="checkbox" name="chkAgree" id="chkAgree">
                             </div>
                             
                              <div class="col-md-10" style="text-align:left">
                           		 I have read the above and I am fully agreeable. 
                             </div>  
                            <div class="clearfix"></div>   

<div align="left">
						<button type="button" class="thm-btn"  id="submit">Submit Now <i class="fa fa-arrow-circle-right"></i></button></div>
					</form>
                
                
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