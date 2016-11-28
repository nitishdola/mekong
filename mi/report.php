<?php
ob_start();
session_start();
if(!isset($_SESSION['mi']) && $_SESSION['mi']=="mik"){
	echo "<script>window.location='login.php'; </script>";
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
$sql = "SELECT  * FROM tbl_user_data where status!='9' and mi_revision!='0'";									
if($cn == false)
connect3db();												
$result = mysql_query($sql);
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
			<h2><span><strong>MI Panel</strong></span></h2>
			
		</div>
		<div class="row">
			
            <div class="md-card" id="login_card">
            		<div class="md-card-content large-padding" id="login_form">
													<div align="right"><a href="dashboard.php">Back to Dashboard</a></div>
													.
													<div id="page_content">
        <div id="page_content_inner">
            <div class="md-card uk-margin-medium-bottom">
                <div class="md-card-content">
                    <table id="dt_default" class="uk-table" cellspacing="0" width="100%">
                        <thead>
                            <!--<tr>
                                <th rowspan="2">Sl</th>
                                <th colspan="5"><strong>Registered Company Information</strong></th>
                            </tr>-->
                            <tr>
                                <th>Sl</th>
								<th>COMPANY NAME</th>							
                                <th>CONTACT PERSON</th>
                                <th>EMAIL ID</th>
                                <th>MOBILE NO</th>
                                <th>ACTIONS</th>
                            </tr>
                        </thead>
                        

                        <tbody>
						<?php 
						$ctr=0;
						while($rowD = mysql_fetch_array($result)) { 
								if($ctr % 2 == 0)
									$bgColor = "#F5F5F5";
								else
									$bgColor = "#FFFFFF";
						?>
                        <tr bgcolor="<?php echo $bgColor?>" style="color:#000">
                            <td><?php echo $ctr+1;?></td>
                            <td><?php echo $rowD['company_name'];?></td>
                            <td><?php echo $rowD['legal_represent_title']." ".$rowD['legal_represent_surname']." ".$rowD['legal_represent_name'];?></td>
                            <td><?php echo $rowD['email'];?></td>
                            <td><?php echo $rowD['mobile_phone'];?></td>
                            <td><a href="pageRedirect.php?Action=V&ID=<?php echo $rowD['id'];?>">Details</a> | 
                            <?php
							if($rowD['mi_status']==0)
							{
							?>
                            <span style="color: #F00">Sent for Revision</span> |
                          <?php } else { ?>
                          <a href="revision.php?dataID=<?php echo base64_encode($rowD['id']);?>" onclick="return hs.htmlExpand(this, { objectType: 'iframe',height: 350,width: 500 } )">Revise</a> |
                          <?php } ?>
                          
                           <?php
							if($rowD['publish_status']==1)
							{
							?>
                            <span style="color: #F00">Already published</span> |
                          <?php } else { ?>
                         <span id="miSpan<?php echo $rowD['id'];?>"> <a href="javascript: void(0)" class="mi_pub<?php echo $rowD['id'];?>" data-id="<?php echo $rowD['id'];?>">publish</a></span>
                          <script>
 //$(document).ready(function() {
 //$('.approve').click(function () {
 $(document).on("click","a.mi_pub<?php echo $rowD['id'];?>", function () {
 // var ele=$(this).closest('tr');
  var id=$(this).attr("data-id");
  var isGood = confirm('Are you sure you want to publish this profile?'); 

  if (isGood) {
	  $("#miSpan<?php echo $rowD['id'];?>").html("<img src='images/fbloader.gif'>");
      $.ajax({
            type: 'post',
            url: "sendToPublish.php",
            data: {
              //table:'tbl_content',
              id:id,
            },
            success: function(data) {
			  $("#miSpan<?php echo $rowD['id'];?>").html(data);
			 // document.getElementById('disp_time').innerHTML = data;
            }
        });
    } 
    return true;
   });

//});

   </script> 
                          
                          <?php } ?>
                          
                          <br><?php if($rowD['mi_revision']>1){?>
		<?php $sqlN = "select * from notification_messages where data_id='".$rowD['id']."' and status='1' and type='usertomi'";
        if($cn == false)
        connect3db();
        $resN = mysql_query($sqlN);
        if(mysql_num_rows($resN))
        {
        ?>
                          <a href="adminmsg.php?Action=N&ID=<?php echo $rowD['id'];?>" style="color:#F00" onclick="return hs.htmlExpand(this, { objectType: 'iframe',height: 100,width: 300} )">Revision Received from Administrator(<?php echo $rowD['mi_revision'];?>)</a><?php } else {  ?>
<a href="adminmsg.php?Action=N&ID=<?php echo $rowD['id'];?>" style="color:#000" onclick="return hs.htmlExpand(this, { objectType: 'iframe',height: 100,width: 300} )">Revision Received from Administrator(<?php echo $rowD['mi_revision'];?>)</a>
         <?php } ?>                  
                          
         <?php } ?>
                              </td>
                        </tr>
                        <?php $ctr++;} 
						mysql_close();
						?>
                        </tbody>
                    </table>
                </div>
            </div>

            

        </div>
    </div>
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