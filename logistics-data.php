<?php
include("include/globalIncWeb.php");
ini_set("display_errors",0);
?>
<!DOCTYPE html>
<html lang="en">


<head>
	<meta charset="UTF-8">
	<title>GMS Logistics Database</title>
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

	<script type="text/javascript" src="jquery.min.js"></script>

	<!-- master stylesheet -->
	<link rel="stylesheet" href="css/style.css">
	<!-- responsive stylesheet -->
	<link rel="stylesheet" href="css/responsive.css">
	<style>
	.service-tag {
		background-color: #19A3B3; 
		color: #fff; 
		width: auto; 
		font-size: 12px; 
		padding: 3px; 
		height: 22px; 
		float: left; 
		margin: 3px 0 4px 5px; 
		border-radius: 3px;

	}

	.clear {
		clear: both;
	}

	.data-box {
		border:1px solid #EFEFEF; border-radius: 3px; padding: 20px; margin-bottom: 10px;
	}

	.data-box:hover {
		-webkit-box-shadow: 0px 0px 16px -13px rgba(0,0,0,0.75);
		-moz-box-shadow: 0px 0px 16px -13px rgba(0,0,0,0.75);
		box-shadow: 0px 0px 16px -13px rgba(0,0,0,0.75);
		background: #EEEEEE;
		border:1px solid #DBD3D3;
	}

	.hit-box {
		border:1px solid #19A3B3; padding: 2px; border-radius: 3px;
	}
	</style>
	<script type="text/javascript">
	  function resizeIframe(obj){
		 obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
	  }
	</script>
	<script type="text/javascript">
	$(document).on('change','.sort_rang',function(){
	   var url = "ajax_search.php";
	   $.ajax({
	     type: "POST",
	     url: url,
	     data: $("#search_form").serialize(),
	     success: function(data)
	     {        
	     	console.log(data);          
	        $('.ajax_result').html(data);
	     }               
	   });
	  return false;
	});

	function get_update_data(data_id) {
		var url = "rest_get_last_update.php";
		$.ajax({
			type: "GET",
			url: url,
			data: "&data_id="+data_id,
			success: function(data)
			{        
				//console.log(data);  
				$('#update_'+data_id).text(data);        
			}               
		});
	}
	</script>
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
/*$sqlC = "select id,name from countries";
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
		if($row1['num']>0){*/
		?>	
<section class="sec-padding page-title">
	<div class="thm-container" style="margin-bottom: 640px;">
			<form id="search_form">
			<div class="col-md-4">
				<div style="width: 100%; border:1px solid #EFEFEF; border-radius: 3px; padding: 20px;">
					<label>SEARCH BY :</label>
					<hr>
					<div>
					<label>Country :</label><br>
					<?php
					$country_id = $core_services = '';
					if(isset($_GET['country_id']) && $_GET['country_id'] != '') {
			        	$country_id = $_GET['country_id'];
			        } 

			        if(isset($_GET['core_services']) && $_GET['core_services'] != '') {
			        	$core_services = $_GET['core_services'];
			        }
			        ?>
					<?php
					$sql = "SELECT id,name from countries";
					if($cn == false)
					connect3db();
					$res = mysql_query($sql);
					$i = 0;
					while($r = mysql_fetch_array($res))
					{
					?>
					<input class="country" value="<?php echo $r['id']; ?>" type="checkbox" <?php if($country_id == $r['id']){ ?> checked="checked" <?php } ?>>&nbsp;<?php echo ucwords($r['name']); ?><br>
					<?php } ?>
					<hr>
					<label>Core Services :</label><br>
					<input class="core_services" type="checkbox" class="sort_rang" value="Freight forwarders" name="size[]" <?php if($core_services == 'Freight forwarders'){ ?> checked="checked" <?php } ?>>&nbsp;Freight forwarders<br>
					<input  class="core_services" type="checkbox" class="sort_rang" value="Truck operator" <?php if($core_services == 'Truck operator'){ ?> checked="checked" <?php } ?> name="size[]">&nbsp;Truck operator<br>
					<input class="core_services" type="checkbox" class="sort_rang" value="Warehouse services" <?php if($core_services == 'Warehouse services'){ ?> checked="checked" <?php } ?> name="size[]">&nbsp;Warehouse services<br>
					<input class="core_services" type="checkbox" class="sort_rang" value="Liner agent air/ocean" <?php if($core_services == 'Liner agent air/ocean'){ ?> checked="checked" <?php } ?> name="size[]">&nbsp;Liner agent air/ocean<br>
					<input class="core_services" type="checkbox" class="sort_rang" value="Customs broker" <?php if($core_services == 'Customs broker'){ ?> checked="checked" <?php } ?> name="size[]">&nbsp;Customs broker<br>
					
					<input class="core_services" type="checkbox" class="sort_rang" value="Crane/ MHE operator" <?php if($core_services == 'Crane/ MHE operator'){ ?> checked="checked" <?php } ?> name="size[]">&nbsp;Crane/ MHE operator<br>

					<input class="core_services" type="checkbox" class="sort_rang" value="Consolidator" <?php if($core_services == 'Consolidator'){ ?> checked="checked" <?php } ?> name="size[]">&nbsp;Consolidator<br>

					<input class="core_services" type="checkbox" class="sort_rang" value="Inland container depot/CY/Dry port operator" <?php if($core_services == 'Inland container depot/CY/Dry port operator'){ ?> checked="checked" <?php } ?> name="size[]">&nbsp;Inland container depot/CY/Dry port operator<br>

					<input class="core_services" type="checkbox" class="sort_rang" value="Rail-freight operator" <?php if($core_services == 'Rail-freight operator'){ ?> checked="checked" <?php } ?> name="size[]">&nbsp;Rail-freight operator<br>
					<input class="core_services" type="checkbox" class="sort_rang" value="Others" <?php if($core_services == 'Others'){ ?> checked="checked" <?php } ?> name="size[]">&nbsp;Others<br>
					</div>
				</div>
			</div>
			</form>
			<div class="col-md-8">
				
				<div class="ajax_result">

					<?php

					if(isset($_GET['country_id']) && $_GET['country_id'] != '') {
			        	$country_id = $_GET['country_id'];
			        	$where .= " AND user_data.company_addr_country = $country_id";
			        } 

			        if(isset($_GET['core_services']) && $_GET['core_services'] != '') {
			        	$core_services = $_GET['core_services'];
			        	$where .= " AND user_data.core_services LIKE '%".$core_services."%'";
			        }

					$sql = "SELECT 
								user_data.*, c.id as countryId, c.name as countryName, c.sortname as countryShortName
							FROM 
								tbl_user_data as user_data, countries as c
							WHERE
								user_data.publish_status = 1
							AND
								user_data.company_addr_country = c.id
							$where
							";
					if($cn == false)
					connect3db();
					$res = mysql_query($sql);
					$i = 0;

					if(mysql_num_rows($res)) {
						while($r = mysql_fetch_array($res))
						{

						?>
						
						<div class="data-box">
							<div class="row" style="padding: 14px 0;">
								<div class="col-md-10">
									<font style="color: #032C5A; font-size: 16px;">
										<strong>
											<a href="company_details.php?id=<?php echo $r['id']; ?>"><?php echo $r['company_name']; ?></a>
										</strong>
									</font>
								</div>

								<div class="col-md-2 pull-right"> <span class="hit-box"><?php if(isset($r['hits'])) { echo $r['hits']; }else{ echo 0; }; ?> Hits</span> </div>
							</div>

							<div class="clear"></div>

							<div class="row" style="padding: 5px;">
								<div style="width: 13.5%; float: left; margin-left:2%">Core Services : </div>

								<!--Core Services-->
								<?php
								$myString = $r['core_services'];
								$myArray = explode(',', $myString);
								$strCount = substr_count($myString, ",");
								
								?>
								<div style="width: 84.5%; float: left;">
									<?php if($strCount){ ?>
										<?php for($j=0;$j<=$strCount;$j++){ ?>
										<span class="service-tag"><?php print_r($myArray[$j]); ?></span>
										<?php } ?>
									<?php }else{ echo 'None'; } ?>
								</div>
							</div>

							<div class="row" style="padding: 5px;">
								<div class="col-md-8">
								Country / Province : 
								<img src="images/flag/<?php echo$r['countryId']; ?>.png" width="20px" style="margin-top: -3px; border-radius: 2px;" />

								&nbsp;<?php echo $r['countryName']; ?></div>

								<div class="col-md-4">
									<script> get_update_data(<?php echo $r['id'] ?>);</script>
									<div style="display: inline-block; float: right;">Last Updated : <i><span id="update_<?php echo $r['id']; ?>">
										<img src="images/ajax-loader.gif" />
									</span></i></div>
								</div>
							</div>
						</div>

						<?php $i++; }?>
					<?php }else{ ?>
						<div class="alert alert-warning">
						  <strong>Oops !</strong> No results found !
						</div>
					<?php } ?>

				</div>
			</div>
	</div>
</section>
<?php //} } ?>
<section class="services-section sec-padding">
	<div class="thm-container">
		<div class="row">
        <?php

        $country_id = '';
        $where = '';
		
		$sql = "SELECT tbl_user_data.*
        		FROM tbl_user_data
        		WHERE 
        			tbl_user_data.publish_status='1' 
        		

        		";
		if($cn == false)
			connect3db();
		$res = mysql_query($sql);
			if(mysql_num_rows($res))
			{
				$c=0;
				while($row = mysql_fetch_array($res)) {
					$c++;
		?>	

			<div class="col-md-4 col-sm-6" style="height:360px;">
				<div class="single-services img-cap-effect">
					<div class="img-box">
						
						<div class="img-caption">
							<div class="box-holder">
							</div>
						</div>
					</div>
					<a href="company-profile/<?php echo $row['id'];?>/"><h3><span><strong> <?php echo strtoupper($row['company_name']);?></strong></span></h3> </a>
                    <div style="border:#DBDBDB 3px solid; padding:0px; width:150px; height:auto" >
					  <div style="border:#999 0px solid; padding:5px"><img src="<?php echo $webUrl;?>register/uploads/<?php echo $row['company_logo'];?>" width="150" height="98"></div></div><p><strong>Core Services :</strong></p>
                    <p><?php echo $row['core_services'];?></p>
                    <p><strong>Country :</strong><?php $country = getCountry($row['company_addr_country']); echo $country[0][2];?></p>
                    <p><strong>Province:</strong><?php echo $row['company_addr_province'];?></p>
				</div>
			</div>

		<?php } } ?>	
		
		</div>
	</div>
</section>


<?php// } } ?>

<section class="footer-top">
	<div class="thm-container">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-6">
					<h3>Register for free! </h3>
					<p>Simple registration via 3 Steps <br>
Visit www.logisticsgms.com, click “LOGIN”</p>
				</div>
				<div class="col-md-6">
					
			    <a class="thm-btn" href="contact.php">Contact Us <i class="fa fa-arrow-circle-right"></i></a>				</div>
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

<script>
$('.country').click(function() {

	$this = $(this);
	if($($this).prop('checked') == true){
		var country_id = $this.val();
		insertParam('country_id', country_id);
	}else{
		insertParam('country_id', '');
	}
});

$('.core_services').click(function() {
	$this = $(this);
	if($($this).prop('checked') == true){
		var core_services = $this.val();
		insertParam('core_services', core_services);
	}else{
		insertParam('core_services', '');
	}
});

function insertParam(key, value) {
    key = escape(key); value = escape(value);

    var kvp = document.location.search.substr(1).split('&');
    if (kvp == '') {
        document.location.search = '?' + key + '=' + value;
    }
    else {

        var i = kvp.length; var x; while (i--) {
            x = kvp[i].split('=');

            if (x[0] == key) {
                x[1] = value;
                kvp[i] = x.join('=');
                break;
            }
        }

        if (i < 0) { kvp[kvp.length] = [key, value].join('='); }

        //this will reload the page, it's likely better to store this until finished
        document.location.search = kvp.join('&');
    }
}

</script> 

</body>


</html>