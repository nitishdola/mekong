<?php

session_start();

ob_start();

include("../include/globalIncWeb.php");


if(!isset($_SESSION['user_id']) && ($_SESSION['register']!="register"))

{

	echo "<script>window.location='index.php';</script>";



}

$dataList = getUserdata($_SESSION['user_id'],1);

?>

<?php

$branchDataList = getUserBranchdata($dataList[0][0],1);

 ?>

<?php

$sqlH = "select count(*) as num from tbl_user_hits where data_id='".$dataList[0][0]."'";

if($cn == false)

connect3db();

$resH = mysql_query($sqlH);

$rowH =  mysql_fetch_array($resH);

?> 

 

<?php

$sqlE = "select count(*) as num from tbl_events where event_user_id='".$dataList[0][1]."'";

if($cn == false)

connect3db();

$resE = mysql_query($sqlE);

$rowE =  mysql_fetch_array($resE);

?>

<!DOCTYPE html>

<html>

<head>

<?php include('common/head.php'); ?>
</head>

    <body class="side_menu_active side_menu_expanded">

        <div id="page_wrapper">
            <!-- header -->
            <?php include("include/main_header.php");?>

            <!-- main content -->

            <div id="main_wrapper">

                <div class="container-fluid">

                    <div class="row">

                        <div class="col-lg-3 col-sm-6">

                            <div class="info_box_var_1 box_bg_a">

                                <div class="info_box_body">

                                    <span class="info_box_icon icon_group"></span>

                                    <span class="countUpMe" data-endVal="<?php echo $rowH['num'];?>"><?php echo $rowH['num'];?></span>

                                </div>

                                <div class="info_box_footer">

                                  Total Hits

                                </div>

                            </div>

                        </div>

                        <div class="col-lg-3 col-sm-6">

                            <div class="info_box_var_1 box_bg_b">

                                <div class="info_box_body">

                                    <span class="info_box_icon icon_profile"></span>

											<?php if($dataList[0][71]==1 && $dataList[0][73]==2){?>

                                            <div class="label label-success">Finalized</div>

                                            <?php } else if($dataList[0][54]==1 && $dataList[0][71]==2){ ?>

                                            <div class="label label-info">Authorised</div>

                                            <?php } elseif($dataList[0][54]==1 && $dataList[0][71]==2){?>

                                            <div class="label label-primary">Verified</div>

                                            <?php } elseif($dataList[0][54]==1){ ?>

                                            <div class="label label-warning">Completed</div>

                                            <?php } ?>

                           	  </div>

                                <div class="info_box_footer">

                                   Profile  Status

                                </div>

                            </div>

                        </div>

                        <div class="col-lg-3 col-sm-6">

                            <div class="info_box_var_1 box_bg_c">

                                <div class="info_box_body">

                                    <span class="info_box_icon icon_wallet"></span>

                                   <span class="countUpMe" data-endVal="<?php echo $rowE['num'];?>"><?php echo $rowE['num'];?></span>

                                </div>

                                <div class="info_box_footer">

                                   My Events

                                </div>

                            </div>

                        </div>

                        <div class="col-lg-3 col-sm-6">

                            <div class="info_box_var_1 box_bg_d">

                                <div class="info_box_body">

                                    <span class="info_box_icon icon_mail_alt"></span>

                                    <span class="countUpMe" data-endVal="0">0</span>

                                </div>

                                <div class="info_box_footer">

                                    Business Interaction

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="row row_full mHeight">

                        <div class="col-lg-4">

                        

                            <div class="easy_chart_wrapper mHeight-item">

                                

                                <div class="easy_chart_info">

                                    <h4 class="easy_chart_heading">My Company Overview</h4><br>

                                    <div  class="form-group">

                			 	<label class="control-label col-sm-6"><strong>Company Name :</strong></label>

                			 	<label class="control-label col-sm-6"><?php echo $dataList[0][2];?></label>

                                 </div>	

                                 <div class="clearfix"></div>

                                 <div  class="form-group">

                                    <label class="control-label col-sm-6"><strong>Contact Person :</strong></label>

                                    <label class="control-label col-sm-6"><?php echo $dataList[0][10];?> &nbsp; <?php echo $dataList[0][11];?> &nbsp; <?php echo $dataList[0][12];?> </label>

                                 </div>	

                                 <div class="clearfix"></div>

                                 <div  class="form-group">

                                    <label class="control-label col-sm-6"><strong>Registered on :</strong></label>

                                    <label class="control-label col-sm-6"><?php echo date('d-M-Y',strtotime($dataList[0][73]));?>	

    

                                    </label>

                                 </div>	

    

                                

                                </div>

                            </div>

                        </div>

                        <div class="col-lg-4">

                            <div class="easy_chart_wrapper mHeight-item">

                                

                                <div class="easy_chart_info">

                                    <h4 class="easy_chart_heading">My Latest Events & News</h4>

                                    <?php

									$sqlEv = "select * from tbl_events where event_user_id='".$_SESSION['user_id']."' order by 	event_id desc limit 1 ";

									if($cn == false)

									connect3db();

									$resEv = mysql_query($resEv);

									if(mysql_num_rows($resEv))

									{

										$rowEv = mysql_fetch_array($resEv);

									?>

                                    <p> <?php echo $rowEv['event_title'];?> <a href="eventlist.php">More</a></p>	

                                  

									<?php } else { ?>

                                    <p> There are no current events </p>

                                    <?php } ?>

                                </div>

                            </div>

                        </div>

                        <div class="col-lg-4">

                            <div class="easy_chart_wrapper mHeight-item">

                                <div class="easy_chart_info">

                                    <h4 class="easy_chart_heading">Business Interactions</h4>

                                    <p>There are no current interactions.</p>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-12">

                            <div class="heading_a"><span class="heading_text">My Location </span></div>

                            <div class="row">

                                <div class="col-md-8"> 

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

                                <div class="col-md-4">

                                    <table class="table table-yuk">

                                        <thead>

                                        <tr>

                                          <th>Location</th>

                                            <th>Visits</th>

                                        </tr>

                                        </thead>

                                        <tbody>

                                        <?php

										$sqlHits = "select * from tbl_user_hits where data_id='".$dataList[0][0]."' group by country";

										if($cn == false)

										connect3db();

										$resHits = mysql_query($sqlHits);

										if(mysql_num_rows($resHits))

										{

											while($rowHits = mysql_fetch_array($resHits)){

										?>		

                                        <tr>

                                        	

                                          <td><?php echo $rowHits['country'];?></td>

                                            <td><?php

                                            $sqlNum = "select count(*) as num from tbl_user_hits where country='".$rowHits['country']."'";

											if($cn == false)

											connect3db();

											$resNum = mysql_query($sqlNum);

											$rowNum = mysql_fetch_array($resNum);

											echo $rowNum['num'];

											?></td>

                                        </tr>

                                        <?php } } ?>

                                        </tbody>

                                    </table>

                                </div>

                            </div>

                        </div>

                    </div>



                </div>

            </div>

            

            <!-- main menu -->

            <?php include("include/nav.php");?>



        </div>


        <footer>
            <?php include_once('common/footer.php'); ?>
            <script src="<?php echo $webUrl;?>user/assets/js/bootstrap-notify.min.js"></script>
        </footer>

        <!-- style switcher -->    

    </body>





<?php

if($dataList[0][63]=="1"){?>

<script> $.notify("Your edit button is now activated on your dashboard. Click on the link to update company data.");</script>

<?php } ?>

</html>

