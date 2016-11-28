<?php
session_start();
ob_start();
include("../include/globalIncWeb.php");

if(!isset($_SESSION['user_id']) && ($_SESSION['register']!="register"))
{
	echo "<script>window.location='index.php';</script>";

}
$dataList = getUserdata($_SESSION['user_id'],1);
$branchDataList = getUserBranchdata($dataList[0][0],1);
//echo $dataList[0][16]."======================";
if(isset($_POST['update']) && $_POST['update']=="Update")
{
	
		$error=0;
		$name = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtName']))),ENT_QUOTES);
		$txtSlogan = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtSlogan']))),ENT_QUOTES);
		$companyDetails = htmlspecialchars($_POST['FCKeditor'],ENT_QUOTES);
		$ofcType = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['rd1']))),ENT_QUOTES);
		$txtFocalPersonTitle = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtFocalPersonTitle']))),ENT_QUOTES);
		$txtFocalPersonSurname = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtFocalPersonSurname']))),ENT_QUOTES);
		$txtFocalPersonName = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtFocalPersonName']))),ENT_QUOTES);
		$txtPostion = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtPostion']))),ENT_QUOTES);
		$txtDepartment = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtDepartment']))),ENT_QUOTES);
		$txtCompanyAddrCountry = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtCompanyAddrCountry']))),ENT_QUOTES);
	    $txtCompanyAddrProvince = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtCompanyAddrProvince']))),ENT_QUOTES);
		$txtCompanyAddrStreet = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtCompanyAddrStreet']))),ENT_QUOTES);
		$txtCompanyAddrCity = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtCompanyAddrCity']))),ENT_QUOTES);
		$txtPostCode = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtPostCode']))),ENT_QUOTES);
		if(!empty($_POST['txtOffcPhone']))
		{
			foreach($_POST['txtOffcPhone'] as $ofcPhn)
			{
				$ofcPhnCon .= $ofcPhn.",";
			}
			$ofcPhnCon = left($ofcPhnCon,strlen($ofcPhnCon)-1);
		}
		
		if(!empty($_POST['txtFax']))
		{
			foreach($_POST['txtFax'] as $txtFax)
			{
				$txtFaxCon .= $txtFax.",";
			}
			$txtFaxCon = left($txtFaxCon,strlen($txtFaxCon)-1);
		}
		
		if(!empty($_POST['txtMobilePhone']))
		{
			foreach($_POST['txtMobilePhone'] as $txtMobilePhone)
			{
				$txtMobilePhoneCon .= $txtMobilePhone.",";
			}
			$txtMobilePhoneCon = left($txtMobilePhoneCon,strlen($txtMobilePhoneCon)-1);
		}
		$txtEmail = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtEmail']))),ENT_QUOTES);
		$txtCompanyWebsite = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtCompanyWebsite']))),ENT_QUOTES);
		if(!empty($_POST['selEcommerce']))
		{
			foreach($_POST['selEcommerce'] as $selEcommerce)
			{
				$selEcommerceCon .= $selEcommerce.",";
			}
			$selEcommerceCon  = left($selEcommerceCon,strlen($selEcommerceCon)-1);
		}
		
		if(!empty($_POST['txtEcomUrl']))
		{
			foreach($_POST['txtEcomUrl'] as $txtEcomUrl)
			{
				$txtEcomUrlCon .= $txtEcomUrl.",";
			}
			$txtEcomUrlCon  = left($txtEcomUrlCon,strlen($txtEcomUrlCon)-1);
		}
		
		$txtLatitude = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtLatitude']))),ENT_QUOTES);
		$txtLongitude = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtLongitude']))),ENT_QUOTES);
		
		$txtUrl = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtUrl']))),ENT_QUOTES);

		$id = $dataList[0][0];
		$addContacts = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['addContacts']))),ENT_QUOTES);
		$txtCountrylati = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['lati']))),ENT_QUOTES);
		$txtCountrylongi = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['longi']))),ENT_QUOTES);	
		$txtProvinceLati = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['prolati']))),ENT_QUOTES);
		$txtProvincelongi = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['prolongi']))),ENT_QUOTES);
		if($_POST['logo']['size']!=0)
		{	
			$upload_dir = 'uploads/';
			$upload_file = time().basename($_FILES['logo']['name']);
			$imageinfo = getimagesize($_FILES['logo']['tmp_name']);
			if($imageinfo['mime'] != 'image/gif' && $imageinfo['mime'] != 'image/jpeg' && $imageinfo['mime'] != 'image/png' && isset($imageinfo)) 
			{
				$errorMsg[] = "* Only jpeg,png and gif images allowed";
				$error =  1;
			
			}
			$filename = strtolower($_FILES['logo']['name']);
			$whitelist = array('jpg', 'png', 'gif', 'jpeg'); #example of white list
			$backlist = array('php', 'php3', 'php4', 'phtml','exe'); #example of black list
			if(!in_array(end(explode('.', $filename)), $whitelist))
			{
				$errorMsg[] = "* Only jpeg,png and gif images allowed";
				$error =  1;
				
			}
			
			if(in_array(end(explode('.', $filename)), $backlist))
			{
				$errorMsg[] = "* Only jpeg,png and gif images allowed";
				$error =  1;
			}
			
			if($_FILES['logo']['size']>1000000)
			{
				$errorMsg[] = "* Logo size exceeded. Maximum upload size is 1 Mb";
				$error =  1;
			}
		}
		if($error==0)
		{	
		$mv = move_uploaded_file($_FILES['logo']['tmp_name'],$upload_dir.$upload_file);
		echo $sql = "update tbl_user_data set company_name='$name',company_logo='$upload_file',company_slogan='$txtSlogan',company_intro='$companyDetails',offc_type='$ofcType',legal_represent_title='$txtLegalTitle',legal_represent_surname='$txtLegalSurname',legal_represent_name='$txtLegalName',focus_person_title='$txtFocalPersonTitle',focus_person_surname='$txtFocalPersonSurname',focus_person_name='$txtFocalPersonName',position='$txtPostion',department='$txtDepartment',company_addr_country='$txtCompanyAddrCountry',company_addr_province='$txtCompanyAddrProvince',company_addr_city='$txtCompanyAddrCity',company_addr_postcode='$txtPostCode',company_addr_street='$txtCompanyAddrStreet',offc_phone='$ofcPhnCon',fax='$txtFaxCon',mobile_phone='$txtMobilePhoneCon',email='$txtEmail',company_website='$txtCompanyWebsite',plateform='$selEcommerceCon',plateform_url='$txtEcomUrlCon',latitude='$txtLatitude',longitude='$txtLongitude',geo_url='$txtUrl',country_lati='$txtCountrylati',country_longi='$txtCountrylongi',province_lati='$txtProvinceLati',province_longi='$txtProvincelongi' where id='".$dataList[0][0]."'";
		}		
		 if($cn == false)
			connect3db();
		 $res = mysql_query($sql);
		 if($res)
		 {
		 				$_SESSION['data_id'] = $dataList[0][0];
						$sqlMs = "update notification_messages set status='9' where data_id='".$dataList[0][0]."' and type='admin'";
						if($cn == false)
						connect3db();
						mysql_query($sqlMs );
						
						$dt = date('Y-m-d');
						$msID = GenerateIds("msg_id","notification_messages");
						$sqlIs = "insert into notification_messages(msg_id,user_id,user_email,data_id,date,message_txt,status,type) values ($msID,'".$_SESSION['user_id']."','".$_SESSION['user_name']."','".$_SESSION['data_id']."','$dt','The form has been updated','1','user')";
						if($cn == false)
						connect3db();
						mysql_query($sqlIs );
						
						$rev = intval($dataList[0][66]+1);
						$sqlMR = "update tbl_user_data set revision_received='".$rev."' where id='".$dataList[0][0]."'";
						if($cn == false)
						connect3db();
						mysql_query($sqlMR );
						mysql_close();
						echo "<script>window.location='userdatanext_display.php';</script>";
	 }
		
}
?>
<!DOCTYPE html>
<html lang="en">


<head>
	<meta charset="UTF-8">
	<title>GMS Logistics</title>
	<!-- viewport meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="plugins/Stroke-Gap-Icons-Webfont/style.css">
	<link rel="stylesheet" href="plugins/revolution/css/navigation.css">
	<link rel="stylesheet" href="plugins/flaticon/flaticon.css">
	<link href="plugins/jquery-ui-1.11.4/jquery-ui.css" rel="stylesheet">
	<link rel="stylesheet" href="plugins/animate.min.css">
	<link rel="stylesheet" href="plugins/fancyapps-fancyBox/source/jquery.fancybox.css">
	<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css">
	<!--/font awesome-->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/jquery-ui.js" type="text/javascript"></script>
	<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<!-- master stylesheet -->
	<link rel="stylesheet" href="css/style.css">
	<!-- responsive stylesheet -->
	<link rel="stylesheet" href="css/responsive.css">
	<script type="text/javascript" src="js/userdata-display.js"></script>
	<link rel="stylesheet" href="css/style-userdata.css" />
	 <style>
	.form-horizontal label{
		
		font-size: 12px  !important; 
		font-weight:normal !important;
		text-align:left !important;
		
	}
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
.nopadding {
   padding: 0 !important;
   margin: 0 !important;
}
    </style>
    <link rel="stylesheet" href="css/form.css">


<script type="text/javascript">
 //$.noConflict();
$(document).ready(function()
{
	$('#FCKeditor').summernote({
	  	height: 200,                 // set editor height
	  	minHeight: null,             // set minimum height of editor
	  	maxHeight: null,             // set maximum height of editor
	  	focus: true
  	}); 
	
	var dataString = "id=<?php echo $dataList[0][15];?>&sname=<?php echo $dataList[0][16];?>";
	$.ajax
	({
	type: "POST",
	url: "state_list_edit.php",
	data: dataString,
	cache: false,
	success: function(html)
	{
		$("#txtCompanyAddrProvince").html(html);
	}
	});
		
});
</script>
<link rel="stylesheet" href="css/notification.css" type="text/css">
</head>
<body>
<div class="loadingOverlay" style="display:none"></div>
<div id="dialog" style="display: none"></div>
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
<div align="center"><img src="images/1.png"></div><br>
<br>

	<div class="thm-container">
		<div class="row">
		 <div class="col-md-4"></div><div class="col-md-4" id="timer"></div><div class="col-md-4"></div>
<br/><br/>

    		<form class="form-horizontal row-border" id="form1" name="form1" action="" method="post" enctype="multipart/form-data">
                <div class="col-md-6">
                	  <div class="formtitle">Company Introduction</div>
                       <?php
					   if(isset($_POST['submit'])=="Next")
						{
						if(!empty($errorMsg))
						{
							?>
						<div class="blockFull" style="color:#F00"><?php foreach($errorMsg as $e){ echo $e."<br/>"; } ?></div>
						<?php } ?>    
				 <?php } ?>
				 		<div style="margin-top:4%"></div>
                       	<div class="form-group">
						    <label class="control-label col-md-3"> Company Name <span class="redmi">*</span></label>
						    <div class="col-md-7">
						    	<input type="text" name="txtName" id="txtName"required onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" class="form-control" value="<?php echo htmlspecialchars_decode(html_entity_decode($dataList[0][2]));?>">
						    </div>
						</div>

						<div class="form-group">
						    <label class="control-label col-md-3"> Logo of Company <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Logo Format: JPG / PNG / GIF; <br>Size: < 1MB; Pixel : 314*235 < logo 1024*768<<br> </span></a></label>
						    <div class="col-md-7">
						    	<input type="file" class="input" name="logo"  id="logo" onchange="readURL(this);" accept="image/gif, image/jpeg, image/png">
                            	<textarea id="sad" style="display:none"></textarea>

						    </div>
						</div>

						<div class="form-group">
						    <label class="control-label col-md-3"> Business Slogan <span class="redmi">*</span></label>
						    <div class="col-md-7">
						    	<input type="text" class="form-control" name="txtSlogan"  id="txtSlogan" onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" value="<?php echo html_entity_decode(htmlspecialchars_decode($dataList[0][4]));?>">
						    </div>
						</div>

						<div class="form-group">
                        	<label class="control-label col-md-4"> Company Introduction <span class="redmi">*</span><a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Please input company introduction here in the format of text, photo and video. 

<br>
The introduction could include following information: 
<br>
•	History
<br>
•	Scope of business areas and geographic coverage 
<br>
•	Highlights: e.g. list down your unique services, cooperation partners, and outstanding achievements etc.
  </span></a></label>
                        	<div class="col-md-11">
                        		 <textarea name="FCKeditor" id="FCKeditor"><?php echo htmlspecialchars_decode(html_entity_decode($dataList[0][5]));?></textarea>
							</div>
                        </div>
                	</div>
                    <div class="col-md-6"> 
                        <div class="formtitle">Company Contacts</div>
                        <div style="margin-top:4%"></div>
                        <div class="form-group">
                        	<label class="control-label col-md-3"> Office Type<span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Please select office before provide detailed contact information    </span></a></label>
                            <div class="col-md-7">
                            	<label class="radio-inline" for="radios-0">
                            		<input name="rd1" class="of_rad1" id="rd1" type="radio" value=" Headquarter" checked="checked" <?php if($dataList[0][6]=="Headquarter") echo "checked";?>  required /> Headquarter
                            	</label>
                            	<label class="radio-inline" for="radios-0">
									<input name="rd1" class="of_rad1" id="rd1" type="radio" value="Branch office" required <?php if($dataList[0][6]=="Branch office") echo "checked";?>/> Branch office
								</label>
                            </div>
                        </div>

                        
						<div class="form-group">
						    <label class="control-label col-md-3"> Focal Person <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />The person who is in charge of company’s public relations or marketing    </span></a></label>
						    <div class="col-md-2">
						    	<select class="form-control" name="txtFocalPersonTitle" id="txtFocalPersonTitle" required>
                                   <option value="">--</option>
                                       <option value="Dr." <?php if($dataList[0][10]=="Dr.") echo "selected";?>>Dr.</option>
                                       <option value="Mr." <?php if($dataList[0][10]=="Mr.") echo "selected";?>>Mr.</option>
                                       <option value="Mrs." <?php if($dataList[0][10]=="Mrs.") echo "selected";?>>Mrs.</option>
                                       
                                       <option value="Miss." <?php if($dataList[0][10]=="Miss.") echo "selected";?>>Miss.</option>
                                       <option value="Prof." <?php if($dataList[0][10]=="Prof.") echo "selected";?>>Prof.</option>
                               	</select>
						    </div>
						</div>

						<div class="form-group">
						    <label class="control-label col-md-3">&nbsp;</label>
						    <div class="col-md-7">
						    	<input type="text"  name="txtFocalPersonSurname" id="txtFocalPersonSurname" required value="<?php echo $dataList[0][11];?>" class="form-control" placeholder="Surname"  onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')"/>
						    </div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3">&nbsp;</label>
						    <div class="col-md-7">
						    	<input type="text"  name="txtFocalPersonName" id="txtFocalPersonName" required  value="<?php echo $dataList[0][12];?>" class="form-control" placeholder="Name"  onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" />
						    </div>
						</div>

						<div class="form-group">
						    <label class="control-label col-md-3"> Position <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />The focal person’s position    </span></a></label>
						    <div class="col-md-7">
						    	<input type="text" class="form-control" name="txtPostion"  id="txtPostion" onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" placeholder="The focal person’s position" value="<?php echo $dataList[0][13];?>">
						    </div>
						</div>
                        
                        <div class="form-group">
						    <label class="control-label col-md-3"> Department <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />What department is the focal person working in?   </span></a></label>
						    <div class="col-md-7">
						    	<input type="text" class="form-control" name="txtDepartment"  id="txtDepartment" onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" placeholder="The Department Name" value="<?php echo htmlspecialchars_decode(html_entity_decode($dataList[0][14]));?>">
						    </div>
						</div>

						<div class="form-group">
						    <label class="control-label col-md-3"> Company Address  <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Company Address    </span></a></label>
						    <div class="col-md-7">
						    	<input type="text" class="form-control" name="txtCompanyAddrStreet" id="txtCompanyAddrStreet"  onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" placeholder="Street, District" value="<?php echo htmlspecialchars_decode(html_entity_decode($dataList[0][17]));?>">
						    </div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">&nbsp;</label>
						    <div class="col-md-7">
						    	<input type="text" class="form-control" name="txtCompanyAddrCity" id="txtCompanyAddrCity"  onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" placeholder="City"  value="<?php echo htmlspecialchars_decode(html_entity_decode($dataList[0][59]));?>">
						 	</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">&nbsp;</label>
						    <div class="col-md-7">
						    	<input type="text" class="form-control" name="txtPostCode" id="txtPostCode"  onKeyUp="this.value=this.value.replace(/[^0-9+-/?+ ]+/g,'')" placeholder="Postal Code" value="<?php echo $dataList[0][60];?>">
						    </div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3">&nbsp;</label>
						    <div class="col-md-7">
						    	<select  name="txtCompanyAddrCountry" id="txtCompanyAddrCountry" class="form-control" required>
                                	<option value="">Select Country</option>
                                            <option value="36" <?php if($dataList[0][15]=="36")  echo "selected";?>>Cambodia</option>
                                            <option value="119" <?php if($dataList[0][15]=="119")  echo "selected";?>>Lao PDR</option>
                                            <option value="150" <?php if($dataList[0][15]=="150")  echo "selected";?>>Myanmar</option>
                                            <option value="217" <?php if($dataList[0][15]=="217")  echo "selected";?>>Thailand</option>
                                            <option value="238" <?php if($dataList[0][15]=="238")  echo "selected";?>>Vietnam</option>
                                </select>
						    </div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-md-3">&nbsp;</label>    
						    <div class="col-md-7">
						    	<select  name="txtCompanyAddrProvince" id="txtCompanyAddrProvince" class="form-control" required>
                                	<option value="">Select Province</option>
                                </select>
						    </div>
						</div>
						    
                            <?php 
							$offcPhn = explode(",",$dataList[0][18]);
							for($i=0;$i<count($offcPhn);$i++){ ?>                     
                            <?php
							if($i==0){?>
                            <div class="form-group"> 
                            <label class="control-label col-md-3"> Office Phone <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Click “+” to add more     </span></a></label>  
						    <div class="col-md-7" id="input_fields_wrap">
						    	<input type="text" class="form-control" name="txtOffcPhone[]" id="txtOffcPhone" onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" placeholder="Office phone no" value="<?php echo $offcPhn[$i];?>"  style="float:left; width:85%">
						    	<a href="javascript:void(0)"  id='add_field_button' style="float:left; margin-left:15px">  <i class="fa fa-plus-square fa-2x" aria-hidden="true"></i> </a>
                            </div>  
                            </div>
                           <?php } else { ?>
                           <div class="form-group"> 
                           <label class="control-label col-md-3"> </label>
                           <div class="col-md-7" id="input_fields_wrap_x_<?php echo $i;?>">
						    	<input type="text" class="form-control" name="txtOffcPhone[]" id="txtOffcPhone" onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" placeholder="Office phone no" value="<?php echo $offcPhn[$i];?>"  style="float:left; width:85%">
						    	<a href="javascript:void(0)"  class="remove_field" style="float:left; margin-left:15px">  <i class="fa fa-minus-square fa-2x" aria-hidden="true"></i> </a>
							 </div> 
                           <script>
                           $("#input_fields_wrap_x_<?php echo $i;?>").on("click",".remove_field", function(e){ //user click on remove text
									e.preventDefault(); $(this).parent('div').remove(); p--;
								})
                           </script>
                           	</div>
                           <?php } ?>
                         	
                            <?php } ?>
						
					
						<?php 
							$fax = explode(",",$dataList[0][19]);
							for($i=0;$i<count($fax);$i++){ ?>                     
                            <?php
							if($i==0){?>
                            <div class="form-group"> 
                            <label class="control-label col-md-3"> fax <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Click “+” to add more     </span></a></label>  
						    <div class="col-md-7" id="input_fields_wrap_fax">
						    	<input type="text" class="form-control" name="txtFax[]" id="txtFax" onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" placeholder="Fax no" value="<?php echo $fax[$i];?>"  style="float:left; width:85%">
						    	<a href="javascript:void(0)"  id='add_field_button_fax' style="float:left; margin-left:15px">  <i class="fa fa-plus-square fa-2x" aria-hidden="true"></i> </a>
                            </div>  
                            </div>
                           <?php } else { ?>
                           <div class="form-group"> 
                           <label class="control-label col-md-3"> </label>
                           <div class="col-md-7" id="input_fields_wrap_y_<?php echo $i;?>">
						    	<input type="text" class="form-control" name="txtFax[]" id="txtFax" onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" placeholder="Fax no" value="<?php echo $fax[$i];?>"  style="float:left; width:85%">
						    	<a href="javascript:void(0)"  class="remove_field" style="float:left; margin-left:15px">  <i class="fa fa-minus-square fa-2x" aria-hidden="true"></i> </a>
							 </div> 
                           <script>
                           $("#input_fields_wrap_y_<?php echo $i;?>").on("click",".remove_field", function(e){ //user click on remove text
									e.preventDefault(); $(this).parent('div').remove(); p--;
								})
                           </script>
                           	</div>
                           <?php } ?>
                         	
                            <?php } ?>

						<?php 
							$mobile = explode(",",$dataList[0][20]);
							for($i=0;$i<count($mobile);$i++){ ?>                     
                            <?php
							if($i==0){?>
                            <div class="form-group"> 
                            <label class="control-label col-md-3"> Mobile Phone <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Click “+” to add more     </span></a></label>  
						    <div class="col-md-7" id="input_fields_wrap_mobile">
						    	<input type="text" class="form-control" name="txtMobilePhone[]" id="txtMobilePhone" onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" placeholder="Mobile no" value="<?php echo $mobile[$i];?>"  style="float:left; width:85%">
						    	<a href="javascript:void(0)"  id='add_field_button_mobile' style="float:left; margin-left:15px">  <i class="fa fa-plus-square fa-2x" aria-hidden="true"></i> </a>
                            </div>  
                            </div>
                           <?php } else { ?>
                           <div class="form-group"> 
                           <label class="control-label col-md-3"> </label>
                           <div class="col-md-7" id="input_fields_wrap_z_<?php echo $i;?>">
						    	<input type="text" class="form-control" name="txtMobilePhone[]" id="txtMobilePhone" onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" placeholder="Fax no" value="<?php echo $mobile[$i];?>"  style="float:left; width:85%">
						    	<a href="javascript:void(0)"  class="remove_field" style="float:left; margin-left:15px">  <i class="fa fa-minus-square fa-2x" aria-hidden="true"></i> </a>
							 </div> 
                           <script>
                           $("#input_fields_wrap_z_<?php echo $i;?>").on("click",".remove_field", function(e){ //user click on remove text
									e.preventDefault(); $(this).parent('div').remove(); p--;
								})
                           </script>
                           	</div>
                           <?php } ?>
                         	
                            <?php } ?>

						<div class="form-group">
						    <label class="control-label col-md-3"> E-mail  <span class="redmi">*</span><a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Please provide the permanent email and / or working email address  of the company used for public relations or marketing<br>
Use comma ‘,’ to add more email address    </span></a></label>
						    <div class="col-md-7">
						    	<input type="text" class="form-control" name="txtEmail" id="txtEmail" placeholder="Valid Email ID" value="<?php echo $dataList[0][21];?>">
						    </div>
						</div>

						<div class="form-group">
						    <label class="control-label col-md-3"> Company Website <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />If your company has no website, please fill ‘N/A’ in the field to complete the registration procedure. </span></a></label>
						    <div class="col-md-7">
						    	<input type="text" class="form-control" name="txtCompanyWebsite" id="txtCompanyWebsite" placeholder="Company Website(if any)" value="<?php echo $dataList[0][22];?>">
						    </div>
						</div>
						<!--begin social field-->
						<div id="social_plugings">
							<div class="form-group">
							    <label class="control-label col-md-3"> Social/ecommerce Platform <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />if you have no company website, please do provide information of this field. 

Select your company’s social network / e-commerce platform first and then provide URL or ID in the box beside
      </span></a></label>
						      <?php
						      $ecom = explode(",",$dataList[0][23]);
						      $ecomUrl = explode(",",$dataList[0][24]);
							  for($i=0;$i<count($ecom);$i++){ ?> 
							    <div class="col-md-2">
							    	<select class="form-control" name="selEcommerce[]" id="selEcommerce">
										<option value=" ">Select</option>
										<option value="Twitter" <?php if($ecom[$i]=="Twitter") echo "selected";?>>Twitter </option>
										<option value="Facebook" <?php if($ecom[$i]=="Facebook") echo "selected";?>>Facebook </option>
										<option value="Line" <?php if($ecom[$i]=="Line") echo "selected";?>>Line </option>
										<option value="LinkedIn" <?php if($ecom[$i]=="LinkedIn") echo "selected";?>>LinkedIn </option>
										<option value="Amazon" <?php if($ecom[$i]=="Amazon") echo "selected";?>>Amazon </option>
										<option value="Alibaba" <?php if($ecom[$i]=="Alibaba") echo "selected";?>>Alibaba </option>
										<option value="eBay" <?php if($ecom[$i]=="eBay") echo "selected";?>>eBay</option>
										<option value="Other"  <?php if($ecom[$i]=="Other") echo "selected";?>>Other</option>  
	                                </select>
							    </div>

							    <div class="col-md-3"  id="">
							    	<input type="text" class="form-control" name="txtEcomUrl[]" id="txtEcomUrl" placeholder="" value="<?php echo $ecomUrl[$i];?>" >
							    </div>

							    <div class="col-md-3" id="other" style="display:none">
	                        		<input type="text" class="form-control" name="txtOtherPlatform" id="txtOtherPlatform">
	                       		</div>

	                       		<div class="col-md-1">
	                       			<a href="javascript:void(0)" id="add_field_button_sel"> <i class="fa fa-plus-square fa-2x" aria-hidden="true"></i>  </a>
	                       		</div>  
	                       		<script type="text/javascript">
									$("#selEcommerce").change(function() {
										if($("#selEcommerce").val()=="Other")
										{
											$("#other").slideDown("normal");
										}
										else
										{
											$("#other").slideUp("normal");
										}
									});
								</script>
								<?php } ?>
							</div>
						</div>
						<!--/social-->
						<div class="form-group">
                        	<label class="control-label col-md-3"> Google Map</label>
                            <div class="col-md-6">
                            		<input type="radio" name="rd2" id="geo_cord" class="x" value="Coordinates" <?php if($dataList[0][25]!="" && $dataList[0][26]!="") echo "checked";?>> Geographic coordinates
                            		<a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" /><strong>1.</strong>Enter the name and area of the organisation in search input box of google map.<br>

									<strong>2.</strong> Click on the search icon.This will highlight the location of the organisation on the map<br>

									<strong>3.</strong> Right click on the red marker and select "What's here?" option.<br>

									<strong>4.</strong>From the pop up menu select the latitude and longitude. </span></a><br>
                                    <div id="x1" <?php if($dataList[0][25]=="" && $dataList[0][26]=="") {?>style="display:none;" <?php } ?> class="form-group">
                                        <div class="col-md-12">
                                            Latitude <input type="text"  name="txtLatitude" id="txtLatitude" class="form-control"   value="<?php echo $dataList[0][25];?>" />
                                        </div>  
           
                                        <div class="col-md-12">       
                                        Longitude <input type="text"  name="txtLongitude" id="txtLongitude"  value="<?php echo $dataList[0][26];?>" class="form-control" />
                                        </div>
                                    </div>
                                    
                             </div>
                              <div class="col-md-6">
									<input type="radio" name="rd2" id="geo_url" class="y" value="Geographic URL"  <?php if($dataList[0][27]!="") echo "selected";?>
									> Geographic URL  
									<a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" /><strong>1.</strong>Enter the name and area of the organisation in search input box of google map.<br>

									<strong>2.</strong> Click on the search icon.<br>

									<strong>3.</strong>  Click on the share icon. A pop up menu will appear. <br>

									<strong>4.</strong> Click on the "Embed Map" option on the top of the pop up.

									<strong>5.</strong> A url will appear. Copy this url and place it in this text box. </span></a>
                               </div>
                            </div>

                       <div id="y1" <?php if($dataList[0][27]==""){?>style="display:none;"<?php } ?>>
                       		<div class="form-group">
	                        	<label class="control-label col-md-3"></label> 
	                        	<div class="col-md-7"> 
                            	<input type="text"  name="txtUrl" id="txtUrl"  class="form-control" value="<?php echo $dataList[0][27];?>"  />
                            	</div>
                            </div>
                        </div>
                        <script type="text/javascript">
							$(".x").click(function() {
								$("#x1").slideDown("normal");
								$("#y1").slideUp("normal");
							});
							
							$(".y").click(function() {
								$("#y1").slideDown("normal");
								
								$("#x1").slideUp("normal");
								
							});
						</script>
                               
                                  <div class="blockFull">
                                  <input type="hidden" name="lati" id="lati">
                <input type="hidden" name="longi" id="longi">
                <input type="hidden" name="prolati" id="prolati">
                <input type="hidden" name="prolongi" id="prolongi">
                                  <hr></div>

                     <div class="form-group">
	                    <div class="col-md-1">  <input type="checkbox" id="addContacts" name="addContacts" value="1">
	                    </div>
	                      <div class="col-md-9"> 
                          <label> Add more branch contacts</label> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />please add more contacts if you have other branch office / subsidiary corporations in another province or country   </span></a>
                          </div>
                     </div> 
                     
                     <div id="branch" style="display:none">    
                     <!--<div class="form-group">
						    <label class="control-label col-md-3"> Legal Representative <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />The legal representative shown on Company Registration Certificate     </span></a></label>
						    <div class="col-md-2">
						    	<select name="txtBranchLegalTitle" class="form-control" id="txtBranchLegalTitle">
                                   <option value="">--</option>
                                   <option value="Dr.">Dr.</option>
                                   <option value="Mr.">Mr.</option>
                                   <option value="Mrs.">Mrs.</option>
                                   <option value="Miss.">Miss.</option>
                                   <option value="Prof.">Prof.</option>
                               	</select>
						    </div>
						</div>-->
						<!--<div class="form-group">
							<label class="control-label col-md-3">&nbsp;</label>
						    <div class="col-md-7">
						    	<input type="text"  name="txtBranchLegalSurname" id="txtBranchLegalSurname"   value="" class="form-control" placeholder="Surname"  onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')"/>
						    </div>
						</div>
						<div class="form-group">
						    <label class="control-label col-md-3">&nbsp;</label>
						    <div class="col-md-7">
						    	<input type="text"  name="txtBranchLegalName" id="txtBranchLegalName"  value="" class="form-control" placeholder="Name"  onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')"/>
						    </div>
						</div>-->

						<div class="form-group">
						    <label class="control-label col-md-3"> Focal Person <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />The person who is in charge of company’s public relations or marketing    </span></a></label>
						    <div class="col-md-2">
						    	<select class="form-control" name="txtBranchFocalPersonTitle" id="txtBranchFocalPersonTitle">
                                   <option value="">--</option>
                                   <option value="Dr.">Dr.</option>
                                   <option value="Mr.">Mr.</option>
                                   <option value="Mrs.">Mrs.</option>
                                   
                                   <option value="Miss.">Miss.</option>
                                   <option value="Prof.">Prof.</option>
                               	</select>
						    </div>
						</div>

						<div class="form-group">
						    <label class="control-label col-md-3">&nbsp;</label>
						    <div class="col-md-7">
						    	<input type="text"  name="txtBranchFocalPersonSurname" id="txtBranchFocalPersonSurname" value="" class="form-control" placeholder="Surname"  onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')"/>
						    </div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3">&nbsp;</label>
						    <div class="col-md-7">
						    	<input type="text"  name="txtBranchFocalPersonName" id="txtBranchFocalPersonName"  value="" class="form-control" placeholder="Name"  onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" />
						    </div>
						</div>

						<div class="form-group">
						    <label class="control-label col-md-3"> Position <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />The focal person’s position    </span></a></label>
						    <div class="col-md-7">
						    	<input type="text" class="form-control" name="txtBranchPostion"  id="txtBranchPostion" onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" placeholder="The focal person’s position">
						    </div>
						</div>
                        
                        <div class="form-group">
						    <label class="control-label col-md-3"> Department <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />What department is the focal person working in?    </span></a></label>
						    <div class="col-md-7">
						    	<input type="text" class="form-control" name="txtBranchDepartment"  id="txtBranchDepartment" onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" placeholder="The Department Name">
						    </div>
						</div>

						<div class="form-group">
						    <label class="control-label col-md-3"> Company Address  <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Company Address    </span></a></label>
						    <div class="col-md-7">
						    	<input type="text" class="form-control" name="txtBranchCompanyAddrStreet" id="txtBranchCompanyAddrStreet"  onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" placeholder="Street, District">
						    </div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">&nbsp;</label>
						    <div class="col-md-7">
						    	<input type="text" class="form-control" name="txtBranchCompanyAddrCity" id="txtBranchCompanyAddrCity"  onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" placeholder="City">
						 	</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">&nbsp;</label>
						    <div class="col-md-7">
						    	<input type="text" class="form-control" name="txtBranchPostCode" id="txtBranchPostCode"  onKeyUp="this.value=this.value.replace(/[^0-9+-/?+ ]+/g,'')" placeholder="Postal Code">
						    </div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3">&nbsp;</label>
						    <div class="col-md-7">
						    	<select  name="txtBranchCompanyAddrCountry" id="txtBranchCompanyAddrCountry" class="form-control">
                                	<option value="">Select Country</option>
                                    <option value="36">Cambodia</option>
                                    <option value="119">Lao PDR</option>
                                    <option value="150">Myanmar</option>
                                    <option value="217">Thailand</option>
                                    <option value="238">Vietnam</option>
                                </select>
						    </div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-md-3">&nbsp;</label>    
						    <div class="col-md-7">
						    	<select  name="txtBranchCompanyAddrProvince" id="txtBranchCompanyAddrProvince" class="form-control" >
                                	<option value="">Select Province</option>
                                </select>
						    </div>
						</div>

						<div class="form-group">
						    <label class="control-label col-md-3"> Office Phone <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Click “+” to add more     </span></a></label>
						    <div class="col-md-6" id="input_fields_wrapBranch">
						    	<input type="text" class="form-control" name="txtBranchOffcPhone[]" id="txtBranchOffcPhone" onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" placeholder="The focal person’s position">
						    </div>
						    <div class="col-md-1">
						    	<a href="javascript:void(0)"  id='add_field_buttonBranch'>  <i class="fa fa-plus-square fa-2x" aria-hidden="true"></i> </a>
						    </div>
						</div>

						<div class="form-group">
						    <label class="control-label col-md-3"> Fax <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Click “+” to add more     </span></a></label>
						    <div class="col-md-6" id="input_fields_wrap_faxBranch">
						    	<input type="text" class="form-control" name="txtBranchFax[]" id="txtBranchFax" onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" placeholder="The focal person’s position">
						    </div>
						    <div class="col-md-1">
						    	<a href="javascript:void(0)"  id='add_field_button_faxBranch'>  <i class="fa fa-plus-square fa-2x" aria-hidden="true"></i> </a>
						    </div>
						</div>

						<div class="form-group">
						    <label class="control-label col-md-3"> Mobile Phone <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Important! Focal person’s contact</span></a></label>
						    <div class="col-md-6" id="input_fields_wrap_mobileBranch">
						    	<input type="text" class="form-control" name="txtBranchMobilePhone[]" id="txtBranchMobilePhone" onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" placeholder="The focal person’s mobile no">
						    </div>
						    <div class="col-md-1">
						    	<a href="javascript:void(0)"  id='add_field_button_mobileBranch'>  <i class="fa fa-plus-square fa-2x" aria-hidden="true"></i> </a>
						    </div>
						</div>

						<div class="form-group">
						    <label class="control-label col-md-3"> E-mail  <span class="redmi">*</span><a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />Please provide the permanent email and / or working email address  of the company used for public relations or marketing.<br>
Use comma ‘,’ to add more email addresses    </span></a></label>
						    <div class="col-md-7">
						    	<input type="text" class="form-control" name="txtBranchEmail" id="txtBranchEmail"  placeholder="Email ID">
						    </div>
						</div>

						<div class="form-group">
						    <label class="control-label col-md-3"> Company Website <span class="redmi">*</span> <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />If your company has no website, please fill ‘N/A’ in the field to complete the register procedure.      </span></a></label>
						    <div class="col-md-7">
						    	<input type="text" class="form-control" name="txtBranchCompanyWebsite" id="txtBranchCompanyWebsite" placeholder="Company Website(if any)"
                               >
						    </div>
						</div>
						<!--begin social field-->
						<div id="social_plugings1">
							<div class="form-group">
							    <label class="control-label col-md-3"> Social/ecommerce Platform <a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" />if you have no company website, please do provide information of this field. 

Select your company’s social network / e-commerce platform first and then provide URL or ID in the box beside
     </span></a></label>
							    <div class="col-md-2"  id="input_fields_wrap_selBranch">
							    	<select class="form-control" name="selBranchEcommerce[]" id="selBranchEcommerce">
										<option value=" ">Select</option>
										<option value="Twitter">Twitter </option>
										<option value="Facebook">Facebook </option>
										<option value="Line">Line </option>
										<option value="LinkedIn">LinkedIn </option>
										<option value="Amazon">Amazon </option>
										<option value="Alibaba">Alibaba </option>
										<option value="eBay">eBay</option>
										<option value="Other">Other</option>  
	                                </select>
							    </div>

							    <div class="col-md-3"  id="">
							    	<input type="text" class="form-control" name="txtBranchEcomUrl[]" id="txtBranchEcomUrl" placeholder="">
							    </div>

							    <div class="col-md-3" id="otherBranch" style="display:none">
	                        		<input type="text" class="form-control" name="txtBranchOtherPlatform" id="txtBranchOtherPlatform">
	                       		</div>

	                       		<div class="col-md-1">
	                       			<a href="javascript:void(0)" id="add_field_button_selBranch"> <i class="fa fa-plus-square fa-2x" aria-hidden="true"></i>  </a>
	                       		</div>  
	                       		<script type="text/javascript">
									$("#selBranchEcommerce").change(function() {
										if($("#selBranchEcommerce").val()=="Other")
										{
											$("#otherBranch").slideDown("normal");
										}
										else
										{
											$("#txtBranchOtherPlatform").slideUp("normal");
										}
									});
								</script>
							</div>
						</div>
						<!--/social-->
						<div class="form-group">
                        	<label class="control-label col-md-3"> Google Map</label>
                            <div class="col-md-6">
                            		<input type="radio" name="rd2Branch" id="geo_cord" class="xBranch" value="Coordinates"> Geographic coordinates
                            		<a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" /><strong>1.</strong>Enter the name and area of the organisation in search input box of google map.<br>

									<strong>2.</strong> Click on the search icon.This will highlight the location of the organisation on the map<br>

									<strong>3.</strong> Right click on the red marker and select "What's here?" option.<br>

									<strong>4.</strong>From the pop up menu select the latitude and longitude. </span></a><br>
                                    <div id="x1Branch" style="display:none;" class="form-group">
                                        <div class="col-md-12">
                                            Latitude <input type="text"  name="txtBranchLatitude" id="txtBranchLatitude" class="form-control"   value="" />
                                        </div>  
           
                                        <div class="col-md-12">       
                                        Longitude <input type="text"  name="txtBranchLongitude" id="txtBranchLongitude"   value="" class="form-control" />
                                        </div>
                                    </div>
                                    
                             </div>
                              <div class="col-md-6">
									<input type="radio" name="rd2Branch" id="geo_url" class="yBranch" value="Geographic URL"> Geographic URL  
									<a class="tooltip" href="javascript:void(0)"><strong>(?)</strong> <span class="custom help"><img src="images/Help.png" id="img" alt="Help" height="48" width="48" /><strong>1.</strong>Enter the name and area of the organisation in search input box of google map.<br>

									<strong>2.</strong> Click on the search icon.<br>

									<strong>3.</strong>  Click on the share icon. A pop up menu will appear. <br>

									<strong>4.</strong> Click on the "Embed Map" option on the top of the pop up.

									<strong>5.</strong> A url will appear. Copy this url and place it in this text box. </span></a>
                               </div>
                            </div>

                       <div id="y1Branch" style="display:none;">
                       		<div class="form-group">
	                        	<label class="control-label col-md-3"></label> 
	                        	<div class="col-md-7"> 
                            	<input type="text"  name="txtBranchUrl" id="txtBranchUrl" class="form-control" />
                            	</div>
                            </div>
                        </div>
                        <script type="text/javascript">
							$(".xBranch").click(function() {
								$("#x1Branch").slideDown("normal");
								$("#y1Branch").slideUp("normal");
							});
							
							$(".yBranch").click(function() {
								$("#y1Branch").slideDown("normal");
								
								$("#x1Branch").slideUp("normal");
								
							});
						</script>
                               
                                  <div class="blockFull">
                                  <input type="hidden" name="branchlati" id="branchlati">
                <input type="hidden" name="branchlongi" id="branchlongi">
                <input type="hidden" name="branchprolati" id="branchprolati">
                <input type="hidden" name="branchprolongi" id="branchprolongi">
                                  <hr></div>
                                  <script type="text/javascript">
												(function($) {
													$("#addContacts").click(function() {
														if($("#branch").is(':hidden'))
														{
															$("#branch").slideDown("normal");
														}
														else
														{
															$("#branch").slideUp("normal");
														}
													});

												})(jQuery);
												</script>
					</div>
								
                                
                            </div>
                            <div class="booking-complete" align="center">
                             <button class="thm-btn" type="button" name="btnSubmit" id="btnSubmit"  style="float:left; margin-left:10PX;"  title="Click this button to preview and edit the form if required">Preview</button>
                             
								<button class="thm-btn" name="submit" type="reset"  style="float:left; margin-left:10PX;" title="Click this button to reset all the values of the form">Reset</button>
							<button class="thm-btn" name="btnNext" id="btnNext" type="button"  style="float:left; margin-left:10PX;" value="Next"   title="Click this button to go to the next" onClick="javascript:window.location='userdatanext_display.php'">Next</button>
                             <?php
							if($dataList[0][63]=="1"){?>
                            <button class="thm-btn" name="update" id="update" type="submit" style="float:left; margin-left:10PX;" value="Update"   title="Click this button to update data" onClick="return xx()">Update</button>
                         <?php } ?>  
                              
                               
							</div>
				<div class="clear"></div>
                
			
            </form>
        
        
		</div>
	</div>

<br>
<br>
<br>
<br>




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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCO9mP9qiJZTfy3uOhHiKG5k6_c1bchXHA"
    async defer></script>
<script src="js/scripts.js"></script> 
<script src="js/scripts_province.js"></script> 
<script src="js/scripts_branchprovince.js"></script> 
<script src="js/scripts_branchcountry.js"></script> 
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>

</body>


</html>