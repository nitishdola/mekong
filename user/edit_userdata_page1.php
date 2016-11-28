<?php
session_start();
ob_start();
include("../include/globalIncWeb.php");

if(!isset($_SESSION['user_id']) && ($_SESSION['register']!="register"))
{
	echo "<script>window.location='../register/index.php';</script>";

}
$dataList = getUserdata($_SESSION['user_id'],1);
?>
<?php
$branchDataList = getUserBranchdata($dataList[0][0],1);

 ?>
<?php 
if(isset($_POST['update']) && $_POST['update']=="Update")
{
	
	
		$error=0;
		$name = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtName']))),ENT_QUOTES);
		$txtSlogan = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtSlogan']))),ENT_QUOTES);
		$companyDetails = htmlspecialchars($_POST['FCKeditor'],ENT_QUOTES);
		$ofcType = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['rd1']))),ENT_QUOTES);
		$txtLegalTitle = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtLegalTitle']))),ENT_QUOTES);
		$txtLegalSurname = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtLegalSurname']))),ENT_QUOTES);
		$txtLegalName = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['txtLegalName']))),ENT_QUOTES);
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

		//$id = GenerateIds(id,  tbl_user_data);
		$addContacts = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['addContacts']))),ENT_QUOTES);
		$txtCountrylati = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['lati']))),ENT_QUOTES);
		$txtCountrylongi = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['longi']))),ENT_QUOTES);	
		$txtProvinceLati = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['prolati']))),ENT_QUOTES);
		$txtProvincelongi = htmlspecialchars(htmlentities(strip_tags(cleanInputs($_POST['prolongi']))),ENT_QUOTES);	
		
		if($name=="")
		{
			$errorMsg[] = "* Please provide the company name";
			$error = 1;
		}
		if($_FILES['logo']['size']!=0)
		{
			$upload_dir = '../register/uploads/';
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
			if($error==0)
			{
				$mv = move_uploaded_file($_FILES['logo']['tmp_name'],$upload_dir.$upload_file);
			}
		
			
		}
		else
		{
			$upload_file = $dataList[0][3];
		}
		
		if($companyDetails=="")
		{
			$errorMsg[] = "* Please provide  company details";
			$error =  1;
		}
		else if($ofcType=="")
		{
			$errorMsg[] = "* Please select a office type";
			$error =  1;
		}
		
		else if($txtFocalPersonTitle=="")
		{
			$errorMsg[] = "* Please select title of Focal person";
			$error =  1;
		}
		else if($txtFocalPersonSurname=="")
		{
			$errorMsg[] = "* Please provide surname  of Focal person";
			$error =  1;
		}
		else if($txtFocalPersonName=="")
		{
			$errorMsg[] = "* Please provide Name of Focal person";
			$error =  1;
		}
		else if($txtPostion=="")
		{
			$errorMsg[] = "* Please provide the position of Focal person";
			$error =  1;
		}
	
		else if($txtDepartment=="")
		{
			$errorMsg[] = "* Please provide the department of Focal person";
			$error =  1;
		}
		else if($txtCompanyAddrStreet=="")
		{
			$errorMsg[] = "* Please provide the company address";
			$error =  1;
		}
		else if($txtCompanyAddrCity=="")
		{
			$errorMsg[] = "* Please provide the city";
			$error =  1;
		}
		else if($txtPostCode=="")
		{
			$errorMsg[] = "* Please provide the postcode";
			$error =  1;
		}
		else if($txtCompanyAddrCountry=="")
		{
			$errorMsg[] = "* Please select country";
			$error =  1;
		}
		else if($txtCompanyAddrProvince=="")
		{
			$errorMsg[] = "* Please select province";
			$error =  1;
		}
		if($error==0)
		{	
				
				$sql = "update tbl_user_data set company_name='$name',company_logo='$upload_file',company_slogan='$txtSlogan',company_intro='$companyDetails',offc_type='$ofcType',legal_represent_title='$txtLegalTitle',legal_represent_surname='$txtLegalSurname',legal_represent_name='$txtLegalName',focus_person_title='$txtFocalPersonTitle',focus_person_surname='$txtFocalPersonSurname',focus_person_name='$txtFocalPersonName',position='$txtPostion',department='$txtDepartment',company_addr_country='$txtCompanyAddrCountry',company_addr_province='$txtCompanyAddrProvince',company_addr_city='$txtCompanyAddrCity',company_addr_postcode='$txtPostCode',company_addr_street='$txtCompanyAddrStreet',offc_phone='$ofcPhnCon',fax='$txtFaxCon',mobile_phone='$txtMobilePhoneCon',email='$txtEmail',company_website='$txtCompanyWebsite',plateform='$selEcommerceCon',plateform_url='$txtEcomUrlCon',latitude='$txtLatitude',longitude='$txtLongitude',geo_url='$txtUrl',country_lati='$txtCountrylati',country_longi='$txtCountrylongi',province_lati='$txtProvinceLati',province_longi='$txtProvincelongi',revision_status='2' where id='".$dataList[0][0]."' and user_id='".$_SESSION['user_id']."'";
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
						echo "<script>window.location='update_success.php';</script>";
					}
		}
}		
?>					
<?php
$branchDataList = getUserBranchdata($dataList[0][0],1);
 ?>
<!DOCTYPE html>
<html>
		<meta charset="UTF-8">
		<title>Logistics GMS</title>
        <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">

        <!-- bootstrap framework -->
		<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="all">
		
        <!-- icon sets -->
            <!-- elegant icons -->
                <link href="assets/icons/elegant/style.css" rel="stylesheet" media="all">
            <!-- elusive icons -->
                <link href="assets/icons/elusive/css/elusive-webfont.css" rel="stylesheet" media="all">
            <!-- flags -->
                <link rel="stylesheet" href="assets/icons/flags/flags.css" media="all">
            <!-- scrollbar -->
                <link rel="stylesheet" href="assets/lib/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">


        <!-- google webfonts -->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>

        <!-- main stylesheet -->
		<link href="assets/css/main.min.css" rel="stylesheet" media="all" id="mainCss">

        <!-- print stylesheet -->
        <link href="assets/css/print.css" rel="stylesheet" media="print">
        <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">

        <!-- moment.js (date library) -->
<script src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/userdata.js"></script>
<script src="assets/js/moment-with-langs.min.js"></script>
<link rel="stylesheet" href="assets/css/lightbox.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 <script type="text/javascript">
 //$.noConflict();
$(document).ready(function()
{
	
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
<style>   
.redmi{
color:#FF0000;
font-size:20px;
}
</style>
    </head>
    <body class="side_menu_active side_menu_expanded">
        <div id="page_wrapper">

            <!-- header -->
            <?php include("include/main_header.php");?>

            <!-- breadcrumbs -->
            

            <!-- main content -->
            <div id="main_wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <img class="user_profile_img" src="<?php echo $webUrl;?>register/uploads/<?php echo $dataList[0][3];?>" alt="" width="76" height="76" />
                            <h1 class="user_profile_name"> <?php echo $dataList[0][2];?></h1>
                            <p class="user_profile_info"><?php echo $dataList[0][4];?></p>
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" role="form" action="" method="POST" enctype="multipart/form-data">    
                                <h3 class="heading_a"><span class="heading_text">Edit Profile Page 1</span></h3>
                                <div class="col-md-6">
                	  Company Introduction
                       <?php
					   if(isset($_POST['update'])=="Update")
						{
						if(!empty($errorMsg))
						{
							?>
						<div  style="color:#F00"><?php foreach($errorMsg as $e){ echo $e."<br/>"; } ?></div>
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
						    <label class="control-label col-md-3"> Logo of Company <span class="redmi">*</span></label>
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
                        	<label class="control-label col-md-4"> Company Introduction <span class="redmi">*</span></label>
                        	<div class="col-md-11">
                        		 <textarea name="FCKeditor" id="FCKeditor"><?php echo htmlspecialchars_decode(html_entity_decode($dataList[0][5]));?></textarea>
							</div>
                        </div>
                	</div>
                                
                     <div class="col-md-6"> 
                        <div class="formtitle">Company Contacts</div>
                        <div style="margin-top:4%"></div>
                        <div class="form-group">
                        	<label class="control-label col-md-3"> Office Type<span class="redmi">*</span> </label>
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
						    <label class="control-label col-md-3"> Focal Person <span class="redmi">*</span> </label>
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
						    <label class="control-label col-md-3"> Position <span class="redmi">*</span></label>
						    <div class="col-md-7">
						    	<input type="text" class="form-control" name="txtPostion"  id="txtPostion" onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" placeholder="The focal person’s position" value="<?php echo $dataList[0][13];?>">
						    </div>
						</div>
                        
                        <div class="form-group">
						    <label class="control-label col-md-3"> Department <span class="redmi">*</span></label>
						    <div class="col-md-7">
						    	<input type="text" class="form-control" name="txtDepartment"  id="txtDepartment" onKeyUp="this.value=this.value.replace(/[^a-zA-Z-_&.,0-9/?+ ]+/g,'')" placeholder="The Department Name" value="<?php echo htmlspecialchars_decode(html_entity_decode($dataList[0][14]));?>">
						    </div>
						</div>

						<div class="form-group">
						    <label class="control-label col-md-3"> Company Address  <span class="redmi">*</span> </label>
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
                            <label class="control-label col-md-3"> Office Phone <span class="redmi">*</span></label>  
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
                            <label class="control-label col-md-3"> fax <span class="redmi">*</span> </label>  
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
                            <label class="control-label col-md-3"> Mobile Phone <span class="redmi">*</span></label>  
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
						    <label class="control-label col-md-3"> E-mail  <span class="redmi">*</span></label>
						    <div class="col-md-7">
						    	<input type="text" class="form-control" name="txtEmail" id="txtEmail" placeholder="Valid Email ID" value="<?php echo $dataList[0][21];?>">
						    </div>
						</div>

						<div class="form-group">
						    <label class="control-label col-md-3"> Company Website <span class="redmi">*</span> 
						    </label>
						    <div class="col-md-7">
						    	<input type="text" class="form-control" name="txtCompanyWebsite" id="txtCompanyWebsite" placeholder="Company Website(if any)" value="<?php echo $dataList[0][22];?>">
						    </div>
						</div>

						
							<div class="form-group">
							    <label class="control-label col-md-3"> Social/ecommerce Platform 
							    </label>
						      <?php
						      $ecom = explode(",",$dataList[0][23]);
						      $ecomUrl = explode(",",$dataList[0][24]);
							  //for($i=0;$i<count($ecom);$i++){ ?> 
							    <div class="col-md-2">
							    	<select class="form-control" name="selEcommerce[]" id="selEcommerce">
										<option value=" ">Select</option>
										<option value="Twitter" <?php if($ecom[0]=="Twitter") echo "selected";?>>Twitter </option>
										<option value="Facebook" <?php if($ecom[0]=="Facebook") echo "selected";?>>Facebook </option>
										<option value="Line" <?php if($ecom[0]=="Line") echo "selected";?>>Line </option>
										<option value="LinkedIn" <?php if($ecom[0]=="LinkedIn") echo "selected";?>>LinkedIn </option>
										<option value="Amazon" <?php if($ecom[0]=="Amazon") echo "selected";?>>Amazon </option>
										<option value="Alibaba" <?php if($ecom[0]=="Alibaba") echo "selected";?>>Alibaba </option>
										<option value="eBay" <?php if($ecom[0]=="eBay") echo "selected";?>>eBay</option>
										<option value="Other"  <?php if($ecom[0]=="Other") echo "selected";?>>Other</option>  
	                                </select>
							    </div>

							    <div class="col-md-5">
							    	<input type="text" class="form-control" name="txtEcomUrl[]" id="txtEcomUrl" placeholder="" value="<?php echo $ecomUrl[0];?>" >
							    </div>
								<?php //} ?>
							</div>
						
						
						<!--/social-->
						<div class="form-group">
                        	<label class="control-label col-md-3"> Google Map</label>
                            <div class="col-md-6">
                            		<input type="radio" name="rd2" id="geo_cord" class="x" value="Coordinates" <?php if($dataList[0][25]!="" && $dataList[0][26]!="") echo "checked";?>> Geographic coordinates
                            		<br>
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
                                 </div>
                                
                            </div>
              <div class="booking-complete" align="center"> 
                            <button class="btn btn-primary" name="update" id="update" type="submit" style="float:left; margin-left:10PX;" value="Update"   title="Click this button to update data" onClick="return xx()">Update</button>
                               
							</div>              
                                       
                                
                            </form>
                        </div>
                    </div>                </div>
            </div>
            
            <!-- main menu -->
             <?php include("include/nav.php");?>

        </div>
		
        <!-- jQuery -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/lightbox-plus-jquery.min.js"></script>
        <!-- jQuery Cookie -->
        <script src="assets/js/jqueryCookie.min.js"></script>
        <!-- Bootstrap Framework -->
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <!-- retina images -->
        <script src="assets/js/retina.min.js"></script>
        <!-- switchery -->
        <script src="assets/lib/switchery/dist/switchery.min.js"></script>
        <!-- typeahead -->
        <script src="assets/lib/typeahead/typeahead.bundle.min.js"></script>
        <!-- fastclick -->
        <script src="assets/js/fastclick.min.js"></script>
        <!-- match height -->
        <script src="assets/lib/jquery-match-height/jquery.matchHeight-min.js"></script>
        <!-- scrollbar -->
        <script src="assets/lib/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
         <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBS7ngGD4Xesm8Ec9EArp0qG7dD-x11mT8"></script>
        <script src="assets/js/scripts.js"></script>
        <script src="assets/js/scripts_province.js"></script>
        <!-- Yukon Admin functions -->
        <script src="assets/js/yukon_all.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
        
        <script>
        $(document).ready(function() {
			$('#FCKeditor').summernote({
				height: 200,                 // set editor height
				minHeight: null,             // set minimum height of editor
				maxHeight: null,             // set maximum height of editor
				focus: true
			});                  // set focus to editable area after initializing summernote
		
			//initialize save data function
			//saveFormData(60);
		});
        </script>
        
    </body>

<!-- Mirrored from yukon.tzdthemes.com/html/pages-user_profile2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Jun 2016 10:23:41 GMT -->
</html>
