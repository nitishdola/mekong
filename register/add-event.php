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
<!DOCTYPE html>
<html lang="en">


<head>
	<meta charset="UTF-8">
	<title>GMS Logistics</title>
	<!-- viewport meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
	<!-- fontawesome css -->
	<link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
	<!-- strock gap icons -->
	<link rel="stylesheet" href="plugins/Stroke-Gap-Icons-Webfont/style.css">
	<!-- revolution slider css -->
	

	<!-- master stylesheet -->

	<!-- responsive stylesheet -->
	<link rel="stylesheet" href="<?php echo $webUrl;?>css/responsive.css">
	<link href="<?php echo $webUrl;?>css/theme.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet"> 
	<style>
	.fa-facebook-square {
		color: #4862A3;
	}
	.fa-twitter-square {
		color:#55ACEE;
	}
	.fa-linkedin-sqaure {
		color:#0077B5;
	}
	</style>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/jquery-ui.js" type="text/javascript"></script>
	<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<!-- master stylesheet -->
	<link rel="stylesheet" href="css/style.css">
	<!-- responsive stylesheet -->
	<link rel="stylesheet" href="css/responsive.css">
	<script type="text/javascript" src="js/userdata.js"></script>

    <link rel="stylesheet" href="css/form.css" />
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

  .loadingOverlay {
    display:    none;
    position:   fixed;
    z-index:    1000;
    top:        0;
    left:       0;
    height:     100%;
    width:      100%;
    background: rgba( 255, 255, 255, .8 ) 
                url('images/loading2.gif') 
                50% 50%
                no-repeat;
}
.col-md-6{
	padding-left: 0px !important;
}
.form-group{
	font-size: 11px;
}
.sec-title{
	padding: 0px;
	margin: 0px;

}
    </style>
    <link rel="stylesheet" href="css/form.css">
 
<script type="text/javascript">
 //$.noConflict();
$(document).ready(function()
{
$('#txtCountry').change(function()
{
var id=$(this).val();
var dataString = 'id='+ id;
	$.ajax
	({
	type: "POST",
	url: "state_list.php",
	data: dataString,
	cache: false,
	success: function(html)
	{
		//alert(msg);
	$("#txtState").html(html);
	
	}
	});		
});
});
</script>
<style type="text/css">
	.rd{
		color: #ff0000;
	}
</style>

<script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>
<link href="css/bootstrap-datetimepicker.css" rel="stylesheet">
<script src="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/jquery-ui.js" type="text/javascript"></script>
<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="js/moment-with-locales.js"></script>
<script src="js/bootstrap-datetimepicker.js"></script>
<link href="css/jquery-ui.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/notification.css" type="text/css">
</head>
<body style="background: #EDF1F2;">
<!-- Start header -->
<?php include("include/top_user_notification.php"); ?>
<!-- End mainmenu -->



<section class="sec-padding page-title">
	<div class="thm-container">
		<div class="sec-title">
			<h2><span>Add New Event</span></h2>
		</div>
	</div>
</section>


<section class="comapny-info">
	<div class="thm-container">
		
 		<?php
		if(count($dataList)>0)
		{
		?>
			
			<form method="post" action="">
              	<div class="col-sm-5" style="background-color: #EEE; padding:5px;">
                	<div class="row">
                    
                    	<div  class="form-group">
                			<label class="control-label">Event Title <span class="rd">*</span></label>
                    		<input type="text" name="txtEventTitle" id="txtEventTitle" value="" required="required">
                        </div>
                        
                        <div  class="form-group">
                			<label>Event Desription <span class="rd">*</span> </label>
                    		<textarea name="txtDes" required="required"></textarea>
                        </div>
                        
                        <div  class="form-group">
                			<label>Event Website <span class="rd">*</span></label>
                    		<input type="text" name="txtEventWebsite" id="txtEventWebsite" value="" required="required">
                        </div>
                        
                        
                        <div  class="form-group">
		                	<label>From Date <span class="rd">*</span></label>
		                    <input type='text' class="form-control" name="txtFromDate" id='datetimepicker1' required="required" />
			                <script type="text/javascript">
					            $(function () {
					                $('#datetimepicker1').datetimepicker();
					            });
					        </script>    
                        </div>

                        <div  class="form-group">
		                	<label>To Date </label>
		                    <input type='text' class="form-control" id='datetimepicker2'  name="txtToDate"/>
			                <script type="text/javascript">
					            $(function () {
					                $('#datetimepicker2').datetimepicker();
					            });
					        </script>    
                        </div>

                         <div  class="form-group">
                			<label><u style='font-size: 17px;'>Event Location</u>  </label>
                        </div>

                        <div  class="form-group">
                			<label class="col-md-6">Country <span class="rd">*</span>  </label>
                			<label class="col-md-6">Province   </label>
                        </div>

                         <div  class="form-group">
                			<label class="col-md-6"><select class="myselect" required="required" name="txtCountry" id="txtCountry" >
									<option value="">Country </option>
                                            <option value="36">Cambodia</option>
                                            <option value="119">Lao PDR</option>
                                            <option value="150">Myanmar</option>
                                            <option value="217">Thailand</option>
                                            <option value="238">Vietnam</option>
								</select>
								 </label>
                			<label class="col-md-6"><select class="myselect" name="txtState" id="txtState"  >
									<option value="">Select</option>
								</select>  
							</label>
                        </div>

                        <div  class="form-group">
                			<label>City  </label>
                			<input type="text" name="txtCity" id="txtCity" value="">
                        </div>

                        <div  class="form-group">
                			<label>Address <span class="rd">*</span>  </label>
                			<input type="text" name="txtAddr" id="txtAddr" value="" required="required">
                        </div>
						
						 <div  class="form-group">
                			<button type="submit" class="btn btn-primary" name="submit" value="Add Event"> Add Event </button>
                        </div>

                    </div>
				</div>
				<div class="col-sm-1"></div>
				<div class="col-sm-5" style="background-color: #EEE; padding:5px;">
				 <div  class="form-group">
                			<label><u style='font-size: 17px;'>Organiser</u>  </label>
                        </div>

                	<div class="row">
	                	<div  class="form-group">
	                			<label>Address <span class="rd">*</span></label>
	                    		<input type="text" name="txtOrgAddr" id="txtOrgAddr" value="" required="required">
	                    </div>

	                    <div  class="form-group">
	                			<label>Country *</label>
	                    		<select class="myselect" name="txtOrgCountry" id="txtOrgCountry" required="required">
									<option value="">Country </option>
                                            <option value="36">Cambodia</option>
                                            <option value="119">Lao PDR</option>
                                            <option value="150">Myanmar</option>
                                            <option value="217">Thailand</option>
                                            <option value="238">Vietnam</option>
								</select>
	                    </div>

	                    <div  class="form-group">
	                			<label>Contact Name *</label>
	                    		<input type="text" name="txtOrgContactName" id="txtOrgContactName" value=""  required="required">
	                    </div>

	                    <div  class="form-group">
	                			<label>Contact Position *</label>
	                    		<input type="text" name="txtOrgContactPosition" id="txtOrgContactPosition" value=""  required="required">
	                    </div>

	                     <div  class="form-group">

                			<div class="col-md-6" align="left">
                			<label>Contact Telephone *  </label>
                			</div>
                			<label class="col-md-6">Contact Mobile *  </label>
                        </div>

                         <div class="form-group">
                			<label class="col-md-6">
                			<input type="text" name="txtOrgContactTele" id="txtOrgContactTele" value=""  required="required">
								 </label>
                			<label class="col-md-6">
                			<input type="text" name="txtOrgContactMobile" id="txtOrgContactMobile" value=""  required="required">
							</label>
                        </div>

                        <div  class="form-group">
	                			<label>Contact Email *</label>
	                    		<input type="text" name="txtOrgContactEmail" id="txtOrgContactEmail" value=""  required="required">
	                    </div>
                	</div>
                </div>	
                  </form>   
  				<!-- tab-content --> 
			
			<!-- tabs-widget -->              
<?php } ?>  
 		
 	</div>
</section>
<div class="clearfix"></div> 
<?php include("include/footer.php"); ?>
<!-- theme custom js  -->
<script src="js/main.js"></script>


</body>


</html>