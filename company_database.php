<?php
include("include/globalIncWeb.php");
ini_set("display_errors",0);
?>
<html>
<head>
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
	<script>
		$(window).load(function() {
			$(".se-pre-con").fadeOut("slow");
		});
	</script>
	<style>
	.no-js #loader { display: none;  }
	.js #loader { display: block; position: absolute; left: 100px; top: 0; }
	.se-pre-con {
		position: fixed;
		left: 0px;
		top: 0px;
		width: 100%;
		height: 100%;
		z-index: 9999;
		background: url(images/loader-64x/Preloader_21.gif) center no-repeat #fff;
	}
	</style>
	</head>
	<body>
	<!--<div class="se-pre-con"></div>-->
	<?php
	$sql = "select * from tbl_user_data";
	if($cn == false)
	connect3db();
	$res = mysql_query($sql);
	$i = 0;
	while($r = mysql_fetch_array($res))
	{
	?>
	<div style="width: 100%; border:1px solid #EFEFEF; border-radius: 3px; padding: 20px;">
		<font style="color: #032C5A; font-size: 16px;"><strong><?php echo $r['company_name']; ?></strong></font><br>
		<div style="height: 10px; margin-top: 10px;">
			<p style="float: left;">Core Services : </p>
			<?php
			$myString = $r['core_services'];
			$myArray = explode(',', $myString);
			$strCount = substr_count($myString, ",");
			for($j=0;$j<=$strCount;$j++){
			?>
			<div style="block; background-color: #19A3B3; color: #fff; width: auto; font-size: 12px; padding: 3px; height: 22px; float: left; margin-left: 5px; border-radius: 3px;"><?php print_r($myArray[$j]); ?></div>
			<?php } ?>
		</div>
		<br>
		Country / Province : Laos / Yunnan Province</div>
	</div><br>
	<?php $i++; }?>
</body>
</html>
