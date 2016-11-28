<?php
include("include/globalIncWeb.php");
ini_set("display_errors",0);
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



</head>
<body>

<!-- Start header -->
<?php include("include/top.php"); ?>
<!-- End mainmenu -->

<section class="inner-banner">
	<div class="thm-container">
		<h2>Company database </h2>
		
	
	</div>
</section>

<?php
$sqlC = "select id,name from countries";
if($cn == false)
	connect3db();
$resC = mysql_query($sqlC);
if(mysql_num_rows($resC))
{
	while($rowC = mysql_fetch_array($resC)){
		 $sql1 = "select count(*) as num from tbl_user_data where publish_status='1' and company_addr_country='".$rowC['id']."'";
		if($cn == false)
			connect3db();
		$res1 = mysql_query($sql1);
		while($row1 = mysql_fetch_array($res1)){
		if($row1['num']>0){
		?>	
<section class="sec-padding page-title">
	<div class="thm-container">
		<div class="sec-title">
			<h2><span><?php echo $rowC['name'];?></span></h2>
			
		</div>
	</div>
</section>
<?php } } ?>
<section class="services-section sec-padding">
	<div class="thm-container">
		<div class="row">
        <?php
        $sql = "select * from tbl_user_data where publish_status='1' and company_addr_country='".$rowC['id']."'";
		if($cn == false)
			connect3db();
		$res = mysql_query($sql);
			if(mysql_num_rows($res))
			{
				$c=0;
				while($row = mysql_fetch_array($res)) {
					$c++;
		?>			
			<div class="col-md-4 col-sm-6" style="height:310px;">
				<div class="single-services img-cap-effect">
					<div class="img-box">
						
						<div class="img-caption">
							<div class="box-holder">
							</div>
						</div>
					</div>
					<a href="company-profile/<?php echo $row['id'];?>/"><h3><span><strong> <?php echo strtoupper($row['company_name']);?></strong></span></h3> </a>
					<div style="border:#999 1px solid; padding:5px"><img src="<?php echo $webUrl;?>register/uploads/<?php echo $row['company_logo'];?>" width="63" height="41"></div></div><p><strong>Core Services :</strong></p>
                    <p><?php echo $row['core_services'];?></p>
                    <p><strong>Country :</strong><?php $country = getCountry($row['company_addr_country']); echo $country[0][2];?></p>
                    <p><strong>Province:</strong><?php echo $row['company_addr_province'];?></p>
				</div>
			</div>

		<?php } } ?>	
		
		</div>
	</div>
</section>


<?php } } ?>

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