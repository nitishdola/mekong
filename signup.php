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

<script type="text/javascript">
$(document).ready(function() {
        // Tooltip only Text
        $('#getIt').click(function(){
			 var r1 = $("input[name='r1']:checked").val();
              if(r1=="companyAC")
			  {
				  window.location='register/';	
			  }
              else if(r1=="adminAC")
			  {
				  window.location='admin/login.php';	
			  }	
			  else if(r1=="mi")
			  {
				  window.location='mi/login.php';	
			  }				  
			  
        });
});
</script>

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
				 <div class="col-sm-1"><input style="width: 20px;height: 20px; -webkit-user-select: none; color:#03C" type="radio" name="r1" id="r1" value="companyAC"></div>
                                    <div class="col-sm-11"><p style=" font-size:24px; color:#2A2B2C">Company Account</p>
This account is for companies to login and upload their information to the GMS Logistics Database. <br>
<br>
</div>
<br>

<div class="clearfix"></div>

<div class="col-sm-1"><input style="width: 20px;height: 20px; -webkit-user-select: none; color:#03C" name="r1" id="r2" type="radio" value="adminAC"></div>
 <div class="col-sm-11"><p style=" font-size:24px; color:#2A2B2C">Administrator Account</p>
This account is for the data collectors in the 6 GMS countries to upload the data they have collected to the GMS Logistics Database.<br>
<br>
 </div>
<div class="clearfix"></div>

<div class="col-sm-1"><input style="width: 20px;height: 20px; -webkit-user-select: none; color:#03C" type="radio" name="r1" id="r3" value="mi"></div>
 <div class="col-sm-11"><p style=" font-size:24px; color:#2A2B2C">MI Account</p>
This account is for MI to login to the GMS Logistics System. <br>
<br>
</div>
									
                                   
									<button type="button"class="thm-btn"id="getIt"><strong>Get it now</strong></button>
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