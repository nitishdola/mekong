<?php
ob_start();
session_start();
if(isset($_SESSION['countryid']) && $_SESSION['countryid']!=""){
	echo "<script>window.location='dashboard.php'; </script>";
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
<script type="text/javascript">
var jQuery_1_7 = $.noConflict(true);
</script>
<SCRIPT type="text/javascript">
jQuery_1_7(document).ready(function(){
jQuery_1_7("#logBtn").click(function() { 
var usr = jQuery_1_7("#txtLogUser").val();
var pass = jQuery_1_7("#txtLogPass").val();
var rem = jQuery_1_7("#login_page_stay_signed").val();
//alert(usr);
jQuery_1_7("#logStatus").html('<img src="assets/img/loader.gif" align="absmiddle">');

    jQuery_1_7.ajax({  
    type: "POST",  
    url: "login_check.php",  
    data: "logUser="+ usr + "&logPass="+ pass+ "&rem="+rem, 
    success: function(msg){  
		//alert(msg);
		//jQuery_1_7("#logStatus").show();
		jQuery_1_7("#logStatus").fadeIn();
		jQuery_1_7("#logStatus").html(msg);
		setTimeout(function(){$('#logStatus').fadeOut();}, 3000);
	 } 
  }); 
});
});
//-->
</SCRIPT> 

</head>
<body>

<!-- Start header -->
<?php include("../include/top.php"); ?>
<!-- End mainmenu -->

<section class="inner-banner">
	<div class="thm-container">
		<h2>Sign in</h2>
		<ul class="breadcumb">
			<li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
			<li><span>Sign in</span></li>
		</ul>
	</div>
</section>

<section class="sec-padding">
	<div class="thm-container">
		<div class="sec-title">
			<h2><span>Administrative Login</span></h2>
			
		</div>
		<div class="row">
			<div class="col-md-6 col-sm-12 col-xs-12 pull-left">
<form class="contact-form">
					<div class="form-grp full">	
						<h3>Sign in </h3>
                    </div>
					<div class="form-grp full">
						<input type="text" id="txtLogUser" class="form-control" placeholder="Email address"  autofocus style="width:85%">
							</div>
                            
                           <div class="form-grp full">
								<input type="password" id="txtLogPass" class="form-control" placeholder="Password"   style="width:85%">
							</div>

						<button type="button" class="thm-btn" id="logBtn">Sign in <i class="fa fa-arrow-circle-right"></i></button>
					</form>
                     <div id="logStatus" style="display:none; color:#F00"></div>

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