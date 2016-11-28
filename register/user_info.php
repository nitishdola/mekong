<?php
session_start();
ob_start();
include("../include/globalIncWeb.php");
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

<script type="text/javascript" src="js/jquery.min.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/jquery-ui.js" type="text/javascript"></script>
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<!-- master stylesheet -->
	<link rel="stylesheet" href="css/style.css">
	<!-- responsive stylesheet -->
	<link rel="stylesheet" href="css/responsive.css">
	<script type="text/javascript" src="js/userdata.js"></script>
	<link rel="stylesheet" href="css/style-userdata.css" />
    <link rel="stylesheet" href="css/form.css" />
<script type="text/javascript">
$(document).ready(function() {
        // Tooltip only Text
        $('.booking-complete-btn').hover(function(){
                // Hover over code
                var title = $(this).attr('title');
                $(this).data('tipText', title).removeAttr('title');
                $('<p class="tooltip1"></p>')
                .text(title)
                .appendTo('body')
                .fadeIn('slow');
        }, function() {
                // Hover out code
                $(this).attr('title', $(this).data('tipText'));
                $('.tooltip1').remove();
        }).mousemove(function(e) {
                var mousex = e.pageX + 20; //Get X coordinates
                var mousey = e.pageY + 10; //Get Y coordinates
                $('.tooltip1')
                .css({ top: mousey, left: mousex })
        });
});
</script>

<script>
 $(document).ready(function() {
 $('#variButton').click(function () {
$("#vari").html("<img src='images/fbloader.gif'>");
  var id=<?php echo $dataList[0][0];?>;

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

    </style>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/jquery-ui.js" type="text/javascript"></script>
<link href="css/jquery-ui.css" rel="stylesheet" type="text/css" />
  
<link rel="stylesheet" href="css/notification.css" type="text/css">
</head>
<body>
<!-- Start header -->
<?php include("include/top_user_notification.php"); ?>
<!-- End mainmenu -->

<section class="inner-banner">
	<div class="thm-container">
		<h2>Company database </h2>
		
	
	</div>
</section>


<section class="sec-padding page-title">
	<div class="thm-container">
		<div class="sec-title">
			<h2><span>Company Profile</span></h2>
			
		</div>
	</div>
</section>
<div class="thm-container">
<div class="row">
              <div class="col-sm-3">
                <div class="panel widget light-widget panel-bd-top">
                  <div class="panel-heading no-title"> </div>
                  <div class="panel-body">
                    <div class="text-center vd_info-parent"><img src="<?php echo $webUrl;?>register/uploads/<?php echo $dataList[0][3];?>" style="max-width:206px;"></div>
                    
                    <h2 class="font-semibold mgbt-xs-5"><?php echo strtoupper($dataList[0][2]);?></h2>
                    <h4><?php echo $dataList[0][4];?></h4>
                    
                    <div class="mgtp-20">
                      <table class="table table-striped table-hover">
                        <tbody>
                          <tr>
                            <td style="width:60%;">Status</td>
                            <td><span class="label label-success">Active</span></td>
                          </tr>
                          <tr>
                            <td>User Rating</td>
                            <td><i class="fa fa-star vd_yellow fa-fw"></i><i class="fa fa-star vd_yellow fa-fw"></i><i class="fa fa-star vd_yellow fa-fw"></i><i class="fa fa-star vd_yellow fa-fw"></i><i class="fa fa-star vd_yellow fa-fw"></i></td>
                          </tr>
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
    <li class="active"> <a data-toggle="tab" href="#profile-tab"> Basic Information <span class="menu-active"><i class="fa fa-caret-up"></i></span> </a></li>
     <li> <a data-toggle="tab" href="#profile-tab1">Business Areas <span class="menu-active"><i class="fa fa-caret-up"></i></span> </a></li>
    
    <li> <a data-toggle="tab" href="#photos-tab"> Photos <span class="menu-active"><i class="fa fa-caret-up"></i></span> </a></li>
    
    <?php if(count($branchDataList)>0)
	{
		?>
    <li> <a data-toggle="tab" href="#projects-tab"> Additional Branch <span class="menu-active"><i class="fa fa-caret-up"></i></span> </a></li>    
    <?php } ?>
    
   
  </ul>
  <div class="tab-content">
    <div id="profile-tab" class="tab-pane active">
      <div class="pd-20">    
        <h4 class="mgbt-xs-15 mgtp-10 font-semibold"><img src="<?php echo $webUrl;?>images/icon1.jpg"> ABOUT</h4>
        <div class="pd-20">
        <div class="row">
         <?php if($dataList[0][5]!="") echo htmlspecialchars_decode(html_entity_decode($dataList[0][5])); else echo "Not available";?>
        </div>
        </div>
        <hr class="pd-10"  />
        <div class="pd-20">
        <div class="row">
          <div>
            <h4 class="mgbt-xs-15 font-semibold"><img src="<?php echo $webUrl;?>images/icon2.jpg"> COMPANY CONTACTS</h4>
            <div class="content-list content-menu">
              <div class="row">
          <?php if($dataList[0][6]!=""){?>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Office Type :</label>
              <div class="col-xs-7 controls"> <?php echo $dataList[0][6];?></div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <?php } ?>
          <?php if(($dataList[0][7]!="")||($dataList[0][8]!="")||($dataList[0][9]!="")){?>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Legal Representative :  </label>
              <div class="col-xs-7 controls"><?php echo $dataList[0][7]." ".$dataList[0][8]." ".$dataList[0][9];?></div>
              <!-- col-sm-10 --> 
            </div>
          </div>
           <?php } ?>
           
   <?php if(($dataList[0][10]!="")||($dataList[0][11]!="")||($dataList[0][12]!="")){?>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Focal Person : </label>
              <div class="col-xs-7 controls"><?php echo $dataList[0][10]." ".$dataList[0][11]." ".$dataList[0][12];?></div>
              <!-- col-sm-10 --> 
            </div>
          </div>
       <?php } ?>  
       
         <?php if($dataList[0][13]!=""){?> 
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Position : </label>
              <div class="col-xs-7 controls"> <?php echo $dataList[0][13];?></div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <?php } ?>
           <?php if($dataList[0][14]!=""){?>  
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Department : </label>
              <div class="col-xs-7 controls"> <?php echo $dataList[0][14];?></div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <?php } ?>
           <?php if($dataList[0][17]!=""){?>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Street & District :</label>
              <div class="col-xs-7 controls"><?php echo $dataList[0][17];?></div>
              <!-- col-sm-10 --> 
            </div>
          </div>
         <?php } ?>
         
         <?php if($dataList[0][59]!=""){?> 
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">City : </label>
              <div class="col-xs-7 controls"><?php echo $dataList[0][59];?></div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <?php } ?>
          
          <?php if($dataList[0][60]!=""){?> 
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Postcode :</label>
              <div class="col-xs-7 controls"> <?php echo $dataList[0][60];?></div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <?php } ?> 
          
           <?php if($dataList[0][15]!=""){?>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Country :</label>
              <div class="col-xs-7 controls"><?php $r=getCountry($dataList[0][15]); echo $r[0][2];?></div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <?php } ?> 
          
		  <?php if($dataList[0][16]!=""){?>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Province :</label>
              <div class="col-xs-7 controls"><?php echo $dataList[0][16];?></div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <?php } ?>
          
          <?php if($dataList[0][18]!=""){?>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Office Phone :</label>
              <div class="col-xs-7 controls"> 
			  <?php
										$offcPhone = $dataList[0][18];
										$ofcPh = explode(",",$offcPhone);
										for($r=0;$r<count($ofcPh);$r++)
										{
											?>
                                      <?php echo $ofcPh[$r];?><br>
                                        <?php } ?>
                                        </div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <?php } ?>
          
          <?php if($dataList[0][19]!=""){?>  
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Fax :</label>
              <div class="col-xs-7 controls"> 
			   <?php
				$fax = explode(",",$dataList[0][19]);
				for($r=0;$r<count($fax);$r++)
				{
				?>
                <?php echo $fax[$r];?><br>
               <?php } ?>
                                        </div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <?php } ?>
          
          <?php if($dataList[0][20]!=""){?> 
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Mobile Phone : </label>
              <div class="col-xs-7 controls"> 
			    <?php
										$mphn = explode(",",$dataList[0][20]);
										for($r=0;$r<count($mphn);$r++)
										{
											?>
                                      <?php echo $mphn[$r];?><br>
                                        <?php } ?>
                                        </div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <?php } ?>
          
           <?php if($dataList[0][21]!=""){?>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">E-mail :</label>
              <div class="col-xs-7 controls"><?php echo $dataList[0][21];?></div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <?php } ?>
          
          <?php if($dataList[0][22]!=""){?>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Company Website :</label>
              <div class="col-xs-7 controls"><a href="<?php echo $dataList[0][22];?>" target="_blank"><?php echo $dataList[0][22];?></a></div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <?php } ?>
          
          <?php if($dataList[0][23]!=""){?>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Social/ecommerce Platform :</label>
              <div class="col-xs-7 controls"><?php
										$selEcm = explode(",",$dataList[0][23]);
										$selEcmU = explode(",",$dataList[0][24]);
										for($d=0;$d<count($selEcm);$d++)
										{
										echo "".$selEcm[$d]."-".$selEcmU[$d]."<br>";	
										}
										?></div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <?php } ?>
		</div>
          
          
        </div>
            </div>
          </div>
          
        </div>
        <!-- row -->
        <hr class="pd-10"  />
        <div class="row">
          <div class="pd-20">
            <h4 class="mgbt-xs-15 font-semibold"><img src="<?php echo $webUrl;?>images/icon3.jpg"> LOCATION</h4>
            <div class="">
              <div class="content-list">
                
                 <?php if(($dataList[0][25]!="")&&($dataList[0][26]!="")){?>
    <div id="map" style="width: 100%; height: 450px;"></div>
    <script type="text/javascript">
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 18,
      center: new google.maps.LatLng(<?php echo $dataList[0][25];?>,<?php echo $dataList[0][26];?>),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });
	
    var usa = new google.maps.LatLng(<?php echo $dataList[0][25];?>, <?php echo $dataList[0][26];?>);
   // var brasil = new google.maps.LatLng(-14.235004, -51.92528);
    //var argentina = new google.maps.LatLng(-38.416097, -63.616672);

    var markers = [];

	markers[0] = new google.maps.Marker({
		position: usa,
		//url: '/destinos/exibir/pais_id/3',
		title: '<?php echo $dataList[0][2];?>',
		map: map
	});
	
	

  </script>
  <?php } elseif($dataList[0][27]!="") { ?>
  <iframe src="<?php echo $dataList[0][27];?>" width="100%" height="550" frameborder="0" style="border:0" allowfullscreen></iframe>
  <?php } ?>
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
				         
				<h4 class="mgbt-xs-15 mgtp-10 font-semibold"><img src="<?php echo $webUrl;?>images/icon.jpg"> ADDITIONAL BRANCH</h4>        
				<div class="row">
          <div class="pd-20">
            
            <div class="content-list content-menu">
              <div class="row">
           <?php if(($branchDataList[0][2]!="")||($branchDataList[0][3]!="")||($branchDataList[0][4]!="")){?>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Legal Representative :</label>
              <div class="col-xs-7 controls"> <?php echo $branchDataList[0][2]." ".$branchDataList[0][3]." ".$branchDataList[0][4];?></div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <?php } ?>
          <?php if(($branchDataList[0][5]!="")||($branchDataList[0][6]!="")||($branchDataList[0][7]!="")){?> 
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Focal Person :  </label>
              <div class="col-xs-7 controls"><?php echo $branchDataList[0][5]." ".$branchDataList[0][6]." ".$branchDataList[0][7];?></div>
              <!-- col-sm-10 --> 
            </div>
          </div>
           <?php } ?>
           
       
         <?php if($branchDataList[0][8]!=""){?> 
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Position : </label>
              <div class="col-xs-7 controls">  <?php echo $branchDataList[0][8];?></div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <?php } ?>
          
         <?php if($branchDataList[0][9]!=""){?>   
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Department : </label>
              <div class="col-xs-7 controls"><?php echo $branchDataList[0][9];?></div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <?php } ?>
          
           <?php if($branchDataList[0][14]!=""){?>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Street & District :</label>
              <div class="col-xs-7 controls"><?php echo $branchDataList[0][14];?></div>
              <!-- col-sm-10 --> 
            </div>
          </div>
         <?php } ?>
         
          <?php if($branchDataList[0][12]!=""){?>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">City : </label>
              <div class="col-xs-7 controls"><?php echo $branchDataList[0][12];?></div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <?php } ?>
          
          <?php if($branchDataList[0][13]!=""){?> 
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Postcode :</label>
              <div class="col-xs-7 controls"> <?php echo $branchDataList[0][13];?></div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <?php } ?> 
          
           <?php if($branchDataList[0][10]!=""){?>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Country :</label>
              <div class="col-xs-7 controls"><?php $x=getCountry($branchDataList[0][10]); echo $x[0][2];?></div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <?php } ?> 
          
		 <?php if($branchDataList[0][11]!=""){?>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Province :</label>
              <div class="col-xs-7 controls"><?php echo $dataList[0][11];?></div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <?php } ?>
          
          <?php if($branchDataList[0][15]!=""){?>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Office Phone :</label>
              <div class="col-xs-7 controls"> 
			  <?php
										$BoffcPhone = $branchDataList[0][15];
										$BofcPh = explode(",",$BoffcPhone);
										for($r=0;$r<count($BofcPh);$r++)
										{
											?>
                                      <?php echo $BofcPh[$r];?><br>
                                      <?php } ?>
                                        </div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <?php } ?>
          
          <?php if($branchDataList[0][16]!=""){?>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Fax:</label>
              <div class="col-xs-7 controls"> 
			  <?php
										$bfax = explode(",",$branchDataList[0][16]);
										for($r=0;$r<count($bfax);$r++)
										{
											?>
                                      <?php echo $bfax[$r];?><br>
                                        <?php } ?>
                                        </div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <?php } ?>
          
         <?php if($branchDataList[0][17]!=""){?>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Mobile Phone : </label>
              <div class="col-xs-7 controls"> 
			     <?php
										$bmob = explode(",",$branchDataList[0][17]);
										for($r=0;$r<count($bmob);$r++)
										{
										?>
                                      <?php echo $bmob[$r];?><br>
                                        <?php } ?>
                                        </div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <?php } ?>
          
            <?php if($branchDataList[0][18]!=""){?> 
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">E-mail :</label>
              <div class="col-xs-7 controls"> <?php echo $branchDataList[0][18];?></div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <?php } ?>
          
           <?php if($branchDataList[0][19]!=""){?>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Company Website :</label>
              <div class="col-xs-7 controls"><a href="<?php echo $branchDataList[0][19];?>" target="_blank"><?php echo $branchDataList[0][19];?></a></div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <?php } ?>
          
         <?php if($branchDataList[0][20]!=""){?>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Social/ecommerce Platform :</label>
              <div class="col-xs-7 controls"><?php
										$BselEcm = explode(",",$branchDataList[0][20]);
										$BselEcmU = explode(",",$branchDataList[0][21]);
										for($d=0;$d<count($selEcm);$d++)
										{
										echo "(".$BselEcm[$d].")".$BselEcmU[$d]."<br>";	
										}
										?></div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <?php } ?>
		<hr class="pd-10"  />
          <div class="pd-20">
           <h4 class="mgbt-xs-15 font-semibold"><img src="<?php echo $webUrl;?>images/icon3.jpg"> LOCATION</h4>
            <div class="">
              <div class="content-list">
       <?php if(($branchDataList[0][22]!="")&&($branchDataList[0][23]!="")){?>
    <div id="map" style="width: 100%; height: 450px;"></div>
    <script type="text/javascript">
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 18,
      center: new google.maps.LatLng(<?php echo $branchDataList[0][22];?>,<?php echo $branchDataList[0][23];?>),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });
	
    var usa = new google.maps.LatLng(<?php echo $branchDataList[0][22];?>,<?php echo $branchDataList[0][23];?>);
   // var brasil = new google.maps.LatLng(-14.235004, -51.92528);
    //var argentina = new google.maps.LatLng(-38.416097, -63.616672);

    var markers = [];

	markers[0] = new google.maps.Marker({
		position: usa,
		//url: '/destinos/exibir/pais_id/3',
		title: '',
		map: map
	});
	
	

  </script>
  <?php } elseif($branchDataList[0][24]!="") { ?>
  <iframe src="<?php echo $branchDataList[0][24];?>" width="100%" height="550" frameborder="0" style="border:0" allowfullscreen></iframe>
  <?php } ?>
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
            <h4 class="mgbt-xs-15 font-semibold"><img src="<?php echo $webUrl;?>images/icon4.jpg"> BUSINESS AREAS</h4>
            <div class="content-list content-menu">
              <div class="row">
              <?php if($dataList[0][28]!=""){?>
          <div>
              <label class="col-xs-5 control-label">Core services :</label>
              <div class="col-xs-7 controls">  <?php
			  						
									$area = explode(",",$dataList[0][28]);
									for($i=0;$i<count($area);$i++)
									{
										$ar .=  $area[$i].",";
										if($area[$i]=="Others")
										{
											 $areaOther = ",".$dataList[0][29];
										}
									}
									echo left($ar, strlen($ar)-1).$areaOther;
									?></div>
              <!-- col-sm-10 --> 
          </div>
          
          <?php } ?>
          
          <div style="clear:both"></div>
            <?php if($dataList[0][32]!=""){?>
          <div>
              <label class="col-xs-5 control-label">Other services offered :</label>
              <div class="col-xs-7 controls">  <?php
			  						
									$otherServe = explode("#",$dataList[0][32]);
									for($i=0;$i<count($otherServe);$i++)
									{
										echo $othSer =  $otherServe[$i]."<br/>";
										if($otherServe[$i]=="Other")
										{
											echo $serveOther = "<br>".$dataList[0][33];
										}
									}
									
									?></div>
              <!-- col-sm-10 --> 
          </div>
          <div style="clear:both"></div>
          <?php } ?>
          
          
          
          
          <?php if($dataList[0][30]!=""){?>
          <div>
              <label class="col-xs-5 control-label">Industry Focus :</label>
              <div class="col-xs-7 controls">   <?php
									$ind = explode(",",$dataList[0][30]);
									$indDes = explode("#",$dataList[0][72]);
									for($i=0;$i<count($ind);$i++)
									{
										
										echo $ind[$i]."<br>";
										echo "<div style='margin-bottom:10px;'>".$indDes[$i]."</div>";
										if($ind[$i]=="Others")
										{
											echo "<br>".$dataList[0][31];
										}
									}
									?></div>
              <!-- col-sm-10 --> 
          </div>
          <div style="clear:both"></div>
          <?php } ?>
          
          
          
          <?php if($dataList[0][34]!=""){?>
          <div>
              <label class="col-xs-5 control-label">Information System Applied in Services :</label>
              <div class="col-xs-7 controls">    <?php echo $dataList[0][34];?></div>
              <!-- col-sm-10 --> 
          </div>
          <div style="clear:both"></div>
          <?php } ?>
          
          
          <?php if($dataList[0][35]!=""){?>
          <div>
              <label class="col-xs-5 control-label">Business Areas :</label>
              <div class="col-xs-7 controls">     <?php
									$busRegion = explode(",",$dataList[0][35]);
									for($i=0;$i<count($busRegion);$i++)
									{
										$busDes = explode(",",$dataList[0][36]);
										
									?>
                                    <?php echo $busRegion[$i];?><br>
									<div style="margin-bottom:10px;"><?php echo $busDes[$i];?></div>
                                    <?php } ?></div>
              <!-- col-sm-10 --> 
          </div>
          <div style="clear:both"></div>
          <?php } ?>
          
          
          
          
        </div>
            </div>
          </div>
          <div class="col-sm-5">
            <h4 class="mgbt-xs-15 font-semibold"><img src="<?php echo $webUrl;?>images/icon5.jpg"> REGISTRATION STATUS</h4>
            <div class="content-list content-menu">
            <?php if($dataList[0][42]!=""){?>
              <div>
              <label class="col-xs-7 control-label">Year of Registration :</label>
              <div class="col-xs-5 controls">   
									<?php echo $dataList[0][42];?>
               </div>
              <!-- col-sm-10 --> 
          	</div>
          <div style="clear:both"></div>
          <?php } ?>
          
           <?php if($dataList[0][43]!=""){?>
              <div>
              <label class="col-xs-7 control-label">Registration Authority :</label>
              <div class="col-xs-5 controls">   
									<?php echo $dataList[0][43];?>
               </div>
              <!-- col-sm-10 --> 
          	</div>
          <div style="clear:both"></div>
          <?php } ?>
          
           <?php if($dataList[0][44]!=""){?>
              <div>
              <label class="col-xs-7 control-label">Registration No. :</label>
              <div class="col-xs-5 controls">   
									<?php echo $dataList[0][44];?>
               </div>
              <!-- col-sm-10 --> 
          	</div>
          <div style="clear:both"></div>
          <?php } ?>
          
          <?php if($dataList[0][45]!=""){?>
              <div>
              <label class="col-xs-7 control-label">Proprietary Status :</label>
              <div class="col-xs-5 controls">   
									<?php if($dataList[0][45]=="Other") echo $dataList[0][61];  else echo $dataList[0][45]; ?>
               </div>
              <!-- col-sm-10 --> 
          	</div>
          <div style="clear:both"></div>
          <?php } ?>
          
          <?php if($dataList[0][46]!=""){?>
              <div>
              <label class="col-xs-7 control-label">Registered Capital :</label>
              <div class="col-xs-5 controls">   
									<?php  echo $dataList[0][46];?>
               </div>
              <!-- col-sm-10 --> 
          	</div>
          <div style="clear:both"></div>
          <?php } ?>
          
          <?php if($dataList[0][47]!=""){?>
              <div>
              <label class="col-xs-7 control-label">Annual Turn Over :</label>
              <div class="col-xs-5 controls">   
									<?php  echo $dataList[0][47];?>
               </div>
              <!-- col-sm-10 --> 
          	</div>
          <div style="clear:both"></div>
          <?php } ?>
          
           <?php if($dataList[0][48]!=""){?>
              <div>
              <label class="col-xs-7 control-label">Annual Revenue :</label>
              <div class="col-xs-5 controls">   
									<?php  echo $dataList[0][48];?>
               </div>
              <!-- col-sm-10 --> 
          	</div>
          <div style="clear:both"></div>
          <?php } ?>
          
            </div>            
          </div>
        </div>
            
            
            
    </div>  
    
    
    <div class="pd-20">
        	
            <div class="row">
          
          <div class="col-sm-7">
            <h4 class="mgbt-xs-15 font-semibold"><img src="<?php echo $webUrl;?>images/icon6.jpg"> MEMBERSHIP</h4>
            <div class="content-list content-menu">
            <?php if($dataList[0][62]!=""){?>
              <div>
              <label class="col-xs-5 control-label">Membership :</label>
              <div class="col-xs-7 controls">   
									<?php echo $dataList[0][62];?>
               </div>
              <!-- col-sm-10 --> 
          	</div>
          <div style="clear:both"></div>
          <?php } ?>
          
           <?php if($dataList[0][50]!=""){?>
              <div>
              <label class="col-xs-5 control-label">Country based in :</label>
              <div class="col-xs-7 controls">   
									<?php echo $dataList[0][50];?>
               </div>
              <!-- col-sm-10 --> 
          	</div>
          <div style="clear:both"></div>
          <?php } ?>
          
          
          <?php if($dataList[0][51]!=""){?>
              <div>
              <label class="col-xs-5 control-label">Name of the Organization :</label>
              <div class="col-xs-7 controls">   
									<?php  echo $dataList[0][51]; ?>
               </div>
              <!-- col-sm-10 --> 
          	</div>
          <div style="clear:both"></div>
          <?php } ?>
          
          <?php if($dataList[0][52]!=""){?>
              <div>
              <label class="col-xs-5 control-label">Type of the Organization:</label>
              <div class="col-xs-7 controls">   
									<?php  echo $dataList[0][52];?>
               </div>
              <!-- col-sm-10 --> 
          	</div>
          <div style="clear:both"></div>
          <?php } ?>
          
          
          
            </div>            
          </div>
          
          <div class="col-sm-5 mgbt-xs-20">
            <h4 class="mgbt-xs-15 font-semibold"><img src="<?php echo $webUrl;?>images/icon7.jpg"> FIXED ASSETS</h4>
            <div class="content-list content-menu">
              <div class="row">
              <?php if($dataList[0][37]!=""){?>
          <div>
              <label class="col-xs-7 control-label">Employee :</label>
              <div class="col-xs-5 controls">  <?php echo $dataList[0][37];?></div>
              <!-- col-sm-10 --> 
          </div>
          <div style="clear:both"></div>
          <?php } ?>
          
          
            <?php if($dataList[0][38]!=""){?>
          <div>
              <label class="col-xs-7 control-label">Drivers : </label>
              <div class="col-xs-5 controls">  <?php echo $dataList[0][38];?></div>
              <!-- col-sm-10 --> 
          </div>
          <div style="clear:both"></div>
          <?php } ?>
          
          
            <?php if($dataList[0][39]!=""){?>
          <div>
              <label class="col-xs-7 control-label">Trucks : </label>
              <div class="col-xs-5 controls">  <?php echo $dataList[0][39];?></div>
              <!-- col-sm-10 --> 
          </div>
          <div style="clear:both"></div>
          <?php } ?>
          
     
            <?php if($dataList[0][40]!=""){?>
          <div>
              <label class="col-xs-7 control-label">Warehouse : </label>
              <div class="col-xs-5 controls">  <?php echo $dataList[0][40];?></div>
              <!-- col-sm-10 --> 
          </div>
          <div style="clear:both"></div>
          <?php } ?>
          
            <?php if($dataList[0][41]!=""){?>
          <div>
              <label class="col-xs-7 control-label">Other Assets : </label>
              <div class="col-xs-5 controls">  <?php echo $dataList[0][41];?></div>
              <!-- col-sm-10 --> 
          </div>
          <div style="clear:both"></div>
          <?php } ?>
          
          
          
          
          
          
          
          
          
          
        </div>
            </div>
          </div>
          
        </div>
            
            
            
    </div>      
    </div>
    
    <div id="photos-tab" class="tab-pane">
      <div class="pd-20">
        <h3 class="mgbt-xs-15 mgtp-10 font-semibold"><img src="<?php echo $webUrl;?>images/icon8.jpg"> PHOTOS</h3>
        <ul id="filters" class="nav nav-pills">
          <li class="active"><a  href="#photos-1" data-filter="*">All</a></li>
          <li><a  href="#photos-2" data-filter=".filter-1">Fixed Assets</a></li>
          <li><a  href="#photos-3" data-filter=".filter-2">Awards</a></li>
          <li><a  href="#photos-4" data-filter=".filter-3">Certificates</a></li>
           <li><a  href="#photos-5" data-filter=".filter-4">Registration Certificate</a></li>             
        </ul>
        <br/>
                <div class="isotope js-isotope vd_gallery">
                
                <?php
                 $im = getPics($dataList[0][0],"fixed_asset");
                 for($r=0;$r<count($im);$r++)
				{
				?>
                  <div class="gallery-item  filter-1">                    	 
                  	<a href="<?php echo $webUrl;?>register/images/fixed_asset/<?php echo $im[$r][2];?>" data-rel="prettyPhoto[2]"> 
                    		<img alt="example image" src="<?php echo $webUrl;?>register/images/fixed_asset/<?php echo $im[$r][2];?>">
                            <div class="bg-cover"></div> 
                    </a> 
                         <div class="vd_info">
                              <h3 class="mgbt-xs-15"><span class="font-semibold"><?php echo $im[$r][3];?></span> </h3>
                              <a class="vd_bg-green vd_white mgr-10 btn vd_round-btn btn-xs" role="button" href="<?php echo $webUrl;?>register/images/fixed_asset/<?php echo $im[$r][2];?>"  data-rel="prettyPhoto[1]"><i class="fa fa-search"></i></a>   
                                                                      
                         </div>
                      
                  </div>
                <?php } ?>
                
                
                  <?php
                 $im = getPics($dataList[0][0],"awards");
                 for($r=0;$r<count($im);$r++)
				{
				?>
                  <div class="gallery-item  filter-2">                    	 
                  	<a href="<?php echo $webUrl;?>register/images/awards/<?php echo $im[$r][2];?>" data-rel="prettyPhoto[2]"> 
                    		<img alt="example image" src="<?php echo $webUrl;?>register/images/awards/<?php echo $im[$r][2];?>">
                            <div class="bg-cover"></div> 
                    </a> 
                         <div class="vd_info">
                              <h3 class="mgbt-xs-15"><span class="font-semibold"><?php echo $im[$r][3];?></span> </h3>
                              <a class="vd_bg-green vd_white mgr-10 btn vd_round-btn btn-xs" role="button" href="<?php echo $webUrl;?>register/images/awards/<?php echo $im[$r][2];?>"  data-rel="prettyPhoto[1]"><i class="fa fa-search"></i></a>   
                                                                      
                         </div>
                      
                  </div>
                <?php } ?>

                   <?php
                 $im = getPics($dataList[0][0],"certificate");
                 for($r=0;$r<count($im);$r++)
				{
				?>
                  <div class="gallery-item  filter-3">                    	 
                  	<a href="<?php echo $webUrl;?>register/images/certificate/<?php echo $im[$r][2];?>" data-rel="prettyPhoto[2]"> 
                    		<img alt="example image" src="<?php echo $webUrl;?>register/images/certificate/<?php echo $im[$r][2];?>">
                            <div class="bg-cover"></div> 
                    </a> 
                         <div class="vd_info">
                              <h3 class="mgbt-xs-15"><span class="font-semibold"><?php echo $im[$r][3];?></span> </h3>
                              <a class="vd_bg-green vd_white mgr-10 btn vd_round-btn btn-xs" role="button" href="<?php echo $webUrl;?>register/images/certificate/<?php echo $im[$r][2];?>"  data-rel="prettyPhoto[1]"><i class="fa fa-search"></i></a>   
                                                                      
                         </div>
                      
                  </div>
                <?php } ?>
                
                 <?php
                	$im = getPics($dataList[0][0],"reg_no");
                 for($r=0;$r<count($im);$r++)
				{
				?>
                  <div class="gallery-item  filter-4">                    	 
                  	<a href="<?php echo $webUrl;?>register/images/registration_img/<?php echo $im[$r][2];?>" data-rel="prettyPhoto[2]"> 
                    		<img alt="example image" src="<?php echo $webUrl;?>register/images/registration_img/<?php echo $im[$r][2];?>">
                            <div class="bg-cover"></div> 
                    </a> 
                         <div class="vd_info">
                              <h3 class="mgbt-xs-15"><span class="font-semibold"><?php echo $im[$r][3];?></span> </h3>
                              <a class="vd_bg-green vd_white mgr-10 btn vd_round-btn btn-xs" role="button" href="<?php echo $webUrl;?>register/images/registration_img/<?php echo $im[$r][2];?>"  data-rel="prettyPhoto[1]"><i class="fa fa-search"></i></a>   
                                                                      
                         </div>
                      
                  </div>
                <?php } ?>
                
                
                  
                   

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


<?php include("include/footer.php"); ?>


<!-- jQuery js -->
<script src="plugins/jquery/jquery-1.11.3.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/jquery-ui-1.11.4/jquery-ui.js"></script>
<!-- gmap.js -->
<script src="plugins/gmap.js"></script>
<!-- mixit up -->
<!-- theme custom js  -->
<script src="js/main.js"></script>
</body>


</html>