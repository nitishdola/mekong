<?php
include("../include/globalIncWeb.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>GMS Logistics</title>
	<!-- viewport meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

	<div class="thm-container">
		<div class="row">
		 <div class="col-md-4"></div><div class="col-md-4" id="timer"></div><div class="col-md-4"></div>
<br/><br/>

    		<form class="form-horizontal row-border" id="form1" name="form1" action="" method="post" enctype="multipart/form-data">
                <div class="col-md-6">
                	  <div class="formtitle">Company Introduction</div>
                       	<div class="form-group">
						    <label class="control-label col-md-3"> <strong>Company Name</strong> <span class="redmi1">*</span></label>
						    <label class="control-label col-md-7">
						    	<?php echo $_POST['name'];?>
						    </label>
						</div>

						<div class="form-group">
						    <label class="control-label col-md-3"> <strong>Logo of Company</strong> <span class="redmi1">*</span></label>
						    <div class="col-md-7">
						    	<img src="<?php echo $_POST['imgPrev'];?>" style="max-height:100px">

						    </div>
						</div>

						<div class="form-group">
						    <label class="control-label col-md-3"> <strong>Business Slogan</strong> <span class="redmi1">*</span></label>
						    <label class="control-label col-md-7">
						    	<?php echo $_POST['slogan'];?>
						    </label>
						</div>

						<div class="form-group">
                        	<label class="control-label col-md-3"> <strong>Company Introduction</strong> <span class="redmi1">*</span></label>
                        	 <label class="control-label col-md-7">
                        		<?php echo stripslashes($_POST['introd']);?>
							</label>
                        </div>
                	</div>
                    <div class="col-md-6"> 
                        <div class="formtitle">Company Contacts</div>
                        <div style="margin-top:4%"></div>
                        <div class="form-group">
                        	<label class="control-label col-md-3"> <strong>Office Type</strong><span class="redmi1">*</span></label>
                             <label class="control-label col-md-7">
                            		<?php if($_POST['offcType']!="undefined"){ echo $_POST['offcType']; }?> 
                             </label>
                        </div>

                       

						<div class="form-group">
						    <label class="control-label col-md-3"> <strong>Focal Person</strong> <span class="redmi1">*</span> </label>
						    <label class="control-label col-md-7">
						    	<?php echo $_POST['focusTitle'];?> &nbsp;
                                        <?php echo $_POST['focusSurname'];?> &nbsp;
                                         <?php echo $_POST['focusName'];?>
						   </label>
						</div>

						

						<div class="form-group">
						    <label class="control-label col-md-3"> <strong>Position</strong> <span class="redmi1">*</span>
						     </label>
						    <label class="control-label col-md-7">
						    	 <?php echo $_POST['position'];?>
						    </label>
						</div>
                        
                        <div class="form-group">
						    <label class="control-label col-md-3"> <strong>Department</strong> <span class="redmi1">*</span> </label>
						    <label class="control-label col-md-7">
						    	<?php echo $_POST['department'];?>
						    </label>
						</div>

						<div class="form-group">
						    <label class="control-label col-md-3"> <strong>Company Address</strong>  <span class="redmi1">*</span></label>
						    <label class="control-label col-md-7">
						    	<?php if($_POST['street']!=""){ echo "Street, DIstrict : ".$_POST['street']; }?>             
						    </label>
						</div>
						<?php if($_POST['city']!=""){ ?>
						<div class="form-group">
							<label class="control-label col-md-3">&nbsp;</label>
						    <label class="control-label col-md-7">
						    	<?php if($_POST['city']!=""){ echo "City : ".$_POST['city']; }?>
						 	</label>
						</div>
						<?php } ?>
						<?php if($_POST['postcode']!=""){ ?>
						<div class="form-group">
							<label class="control-label col-md-3">&nbsp;</label>
						    <label class="control-label col-md-7">
						    	<?php if($_POST['postcode']!=""){ echo "Postcode : ".$_POST['postcode']; }?>
						    </label>
						</div>
						<?php } ?>
						<?php if($_POST['country']!=""){ ?>
						<div class="form-group">
							<label class="control-label col-md-3">&nbsp;</label>
						   <label class="control-label col-md-7">
						    	<?php  $sql = "select name from countries where id='".$_POST['country']."'";
										if($cn == false)
											connect3db();
										$res = mysql_query($sql);
										$row = mysql_fetch_array($res);
										if($_POST['country']!=""){
                                        echo "Country :  ".ucfirst($row['name']); }?>
						    </label>
						</div>
						<?php } ?>
						<?php if($_POST['province']!=""){?>
						<div class="form-group">
							<label class="control-label col-md-3">&nbsp;</label>    
						    <label class="control-label col-md-7">
						    	<?php if($_POST['province']!=""){ echo "Province : ".$_POST['province']; }?>
						    </label>
						</div>
						<?php } ?>

						<div class="form-group">
						    <label class="control-label col-md-3"> <strong>Office Phone</strong> <span class="redmi1">*</span></label>
						    <?php 
							$x = left($_POST['offcPhone'],strlen($_POST['offcPhone'])-1);
							$y = explode("#",$x);
							for($i=0;$i<count($y);$i++)
							{
								if($i==0){
							?>
						   <label class="control-label col-md-7">
						    	<?php echo $y[$i];?>
						    </label>
						   <?php } else { ?>
						    <label class="control-label col-md-3"> </label>
						   <label class="control-label col-md-7">
						    	<?php echo $y[$i];?>
						    </label>
						    <?php } } ?>

						</div>

						<div class="form-group">
						    <label class="control-label col-md-3"> <strong>Fax</strong></label>
						    <?php 
							$r = left($_POST['fax'],strlen($_POST['fax'])-1);
							$f = explode("#",$r);
							for($i=0;$i<count($f);$i++)
							{
								if($i==0){
							?>
						    <label class="control-label col-md-7">
						    <?php echo $f[$i];?>
						    </label>
						    <?php } else { ?>
						   <label class="control-label col-md-3"> </label>
						   <label class="control-label col-md-7">
						    <?php echo $f[$i];?>
						    </label>
						    <?php } } ?>
						</div>

						<div class="form-group">
						    <label class="control-label col-md-3"> <strong>Mobile Phone</strong> <span class="redmi1">*</span> </label>
						    <?php 
							$m = left($_POST['mobile'],strlen($_POST['mobile'])-1);
							$p = explode("#",$m);
							for($i=0;$i<count($p);$i++)
							{
							if($i==0){	
							?>
						     <label class="control-label col-md-7"><?php echo $p[$i];?></label>
						    <?php } else { ?>
						     <label class="control-label col-md-3"></label>
 							 <label class="control-label col-md-7"><?php echo $p[$i];?></label>
						    <?php } ?>
						    <?php } ?>
						</div>

						<div class="form-group">
						    <label class="control-label col-md-3"> <strong>E-mail</strong>  <span class="redmi1">*</span>
						    </label>
						   <label class="control-label col-md-7">
						    	<?php echo $_POST['email'];?>
						    </label>
						</div>

						<div class="form-group">
						    <label class="control-label col-md-3"> <strong>Company Website</strong> <span class="redmi1">*</span> </label>
						   <label class="control-label col-md-7">
						    	<?php echo $_POST['companyweb'];?>
						   </label>
						</div>
						<!--begin social field-->
						<div id="social_plugings">
							<div class="form-group">
							    <label class="control-label col-md-3"> <strong>Social/ecommerce Platform</strong> </label>
							    <?php 
								$ecom = left($_POST['selEcommerce'],strlen($_POST['selEcommerce'])-1);
								$ecom1 = explode("#",$ecom);
								$ecomUrl = left($_POST['txtEcomUrl'],strlen($_POST['txtEcomUrl'])-1);
								$ecomUrl1 = explode("#",$ecomUrl);
								for($i=0;$i<count($ecom1);$i++)
								{
								?>
							   <label class="control-label col-md-2">
							   	<?php echo $ecom1[$i];?>
							    </label>
							    <label class="control-label col-md-6">
							    <?php echo $ecomUrl1[$i];?>
							    </label>

							<?php } ?>
							   

							    
							</div>
						</div>
						<!--/social-->
						<div class="form-group">
                        	<label class="control-label col-md-3"> <strong>Google Map</strong></label>
                            <div class="col-md-4">
                            <?php 
							if($_POST['gmap']!="undefined")
							{
							?>
							<?php if($_POST['gmap']=="Coordinates"){?>
                            		<label> Geographic coordinates </label>
                                    <div class="form-group">
                                        <label class="control-label col-md-12">
                                            Latitude : <?php echo $_POST['latitude'];?>
                                        </label>  
           								
                                        <label class="control-label col-md-12">    
                                        Longitude : <?php echo $_POST['longitude'];?>
                                        </label>
                                    </div>
                                 <?php } else if($_POST['gmap']=="Geographic URL"){ ?>
                                 	<label> Geographic URL </label>
                                    <div class="form-group">
                                        <label class="control-label col-md-12">
                                            <?php echo $_POST['gurl'];?>
                                        </label>  
                                    </div>
                                    <?php } ?>
                              <?php } ?>      
                        </div>
                       </div> 

                     <?php if($_POST['addContacts']=="1") { ?>

                     <div id="branch">    
                     	<div class="form-group">
	                      <div class="col-md-12"> 
                          	<div class="formtitle">More Contacts</div> 
                          </div>
                       </div> 
						<div class="form-group">
						    <label class="control-label col-md-3"> <strong>Focal Person</strong> <span class="redmi1">*</span> </label>
						    <label class="control-label col-md-7"> 
						    	 <?php echo $_POST['branchfocusTitle'];?>&nbsp;
                                      <?php echo $_POST['branchfocusSurname'];?>&nbsp;
                                      <?php echo $_POST['branchfocusName'];?>
						    </label>
						</div>

						<div class="form-group">
						    <label class="control-label col-md-3"> <strong>Position</strong> <span class="redmi1">*</span> </label>
						    <label class="control-label col-md-7"> 
						    	<?php echo $_POST['branchposition'];?>
						    </label>
						</div>
                        
                        <div class="form-group">
						    <label class="control-label col-md-3"> <strong>Department</strong> <span class="redmi1">*</span></label>
						    <label class="control-label col-md-7">
						    	<?php echo $_POST['branchdepartment'];?>
						    </label>
						</div>

						<div class="form-group">
						    <label class="control-label col-md-3"> <strong>Company Address</strong>  <span class="redmi1">*</span> </label>
						    <label class="control-label col-md-7">
						    	<?php if($_POST['branchstreet']!=""){ echo "Street, DIstrict : ".$_POST['branchstreet']; }?>
						    </label>
						</div>
						 <?php if($_POST['branchcity']!=""){?>
						<div class="form-group">
							<label class="control-label col-md-3">&nbsp;</label>
						    <label class="control-label col-md-7">
						    	  <?php if($_POST['branchcity']!=""){ echo "City : ".$_POST['branchcity']; }?>
						 	</label>
						</div>
						<?php } ?>
						<?php if($_POST['branchpostcode']!=""){ ?> 
						<div class="form-group">
							<label class="control-label col-md-3">&nbsp;</label>
						     <label class="control-label col-md-7">
						    	<?php if($_POST['branchpostcode']!=""){ echo "Postcode : ".$_POST['branchpostcode']; }?> 
						    </label>
						</div>
						<?php } ?>

						<?php if($_POST['branchcountry']!=""){ ?> 
						<div class="form-group">
							<label class="control-label col-md-3">&nbsp;</label>
						    <label class="control-label col-md-7">
						    	<?php  $sql = "select name from countries where id='".$_POST['branchcountry']."'";
										if($cn == false)
											connect3db();
										$res = mysql_query($sql);
										$row = mysql_fetch_array($res);
										if($_POST['branchcountry']!=""){
                                        echo "Country :  ".ucfirst($row['name']); }?>
						    </label>
						</div>
						<?php } ?>

						<?php if($_POST['branchprovince']!=""){?>
						<div class="form-group">
							<label class="control-label col-md-3">&nbsp;</label>    
						    <label class="control-label col-md-7">
						    	<?php if($_POST['branchprovince']!=""){ echo "Province : ".$_POST['branchprovince']; }?>
						    </label>
						</div>
						<?php } ?>

						<div class="form-group">
						    <label class="control-label col-md-3"> <strong>Office Phone</strong> <span class="redmi1">*</span> </label>
						    <?php 
										$x1 = left($_POST['branchoffcPhone'],strlen($_POST['branchoffcPhone'])-1);
										$y1 = explode("#",$x1);
										for($i=0;$i<count($y1);$i++)
										{
											if($i==0){
										?>				
						    <label class="control-label col-md-7">
						    	<?php echo $y1[$i];?>
						    </label>
						   	<?php } else {
						   	?>	
						   	<label class="control-label col-md-3"></label>
						   	<label class="control-label col-md-7">
						    	<?php echo $y1[$i];?>
						    </label>	
						   	 <?php } } ?>
						</div>

						<div class="form-group">
						    <label class="control-label col-md-3"> <strong>Fax</strong> </label>
						    <?php 
							$r1 = left($_POST['branchfax'],strlen($_POST['branchfax'])-1);
							$f1 = explode("#",$r1);
							for($i=0;$i<count($f1);$i++)
							{
								if($i==0){
							?>
						    <label class="control-label col-md-7">
						    <?php echo $f1[$i];?>	
						    </label>
						    <?php } else { ?>
						    <label class="control-label col-md-3"></label>
						    <label class="control-label col-md-7">
						    <?php echo $f1[$i];?>	
						    </label>
						    <?php } } ?>
						</div>

						<div class="form-group">
						    <label class="control-label col-md-3"> <strong>Mobile Phone</strong> </label>
						    <?php 
							$s1 = left($_POST['branchmobile'],strlen($_POST['branchmobile'])-1);
							$l1 = explode("#",$s1);
							for($i=0;$i<count($l1);$i++)
							{
									if($i==0){
							?>
						    <label class="control-label col-md-7">
						    	<?php echo $l1[$i];?>
						    </label>
						   <?php } else { ?>
						   <label class="control-label col-md-3"></label>
						   <label class="control-label col-md-7">
						    	<?php echo $l1[$i];?>
						    </label>
						   <?php } ?>
						   <?php } ?>
						</div>

						<div class="form-group">
						    <label class="control-label col-md-3"> <strong>E-mail</strong>  <span class="redmi1">*</span></label>
						     <label class="control-label col-md-7">
						    	<?php echo $_POST['branchemail'];?>
						    </label>
						</div>

						<div class="form-group">
						    <label class="control-label col-md-3"> <strong>Company Website</strong> <span class="redmi1">*</span> </label>
						     <label class="control-label col-md-7">
						    	<?php echo $_POST['branchcompanyweb'];?>
						    </label>
						</div>
						<!--begin social field-->
						<div id="social_plugings1">
							<div class="form-group">
							    <label class="control-label col-md-3"> <strong>Social/ecommerce Platform</strong></label>
							    <?php 
										$ecombranch = left($_POST['selbranchEcommerce'],strlen($_POST['selbranchEcommerce'])-1);
										$ecom1branch = explode("#",$ecombranch);
										$ecomUrlbranch = left($_POST['txtbranchEcomUrl'],strlen($_POST['txtbranchEcomUrl'])-1);
										$ecomUrl1branch = explode("#",$ecomUrlbranch);
										for($i=0;$i<count($ecom1branch);$i++)
											{
												if($i==0){
								?>				
							  	<label class="control-label col-md-3">
							    	<?php echo $ecom1branch[$i];?>	
							    </label>

								<label class="control-label col-md-3">
							    	<?php echo $ecomUrl1branch[$i];?>
							    </label>
							    <?php } else {  ?>
							    <label class="control-label col-md-3">
							    	<?php echo $ecom1branch[$i];?>	
							    </label>

								<label class="control-label col-md-3">
							    	<?php echo $ecomUrl1branch[$i];?>
							    </label>
							    <?php } } ?>
							    
							</div>
						</div>
						<!--/social-->
						<div class="form-group">
                        	<label class="control-label col-md-3"> <strong>Google Map</strong></label>
                            <div class="col-md-4">
                            <?php 
							if($_POST['branchgmap']!="undefined")
							{
							?>
							<?php if($_POST['branchgmap']=="Coordinates"){?>
                            		<label> Geographic coordinates </label>
                                    <div class="form-group">
                                        <label class="control-label col-md-12">
                                            Latitude : <?php echo $_POST['branchlatitude'];?>
                                        </label>  
           								
                                        <label class="control-label col-md-12">    
                                        Longitude : <?php echo $_POST['branchlongitude'];?>
                                        </label>
                                    </div>
                                 <?php } else if($_POST['branchgmap']=="Geographic URL"){ ?>
                                 	<label> Geographic URL </label>
                                    <div class="form-group">
                                        <label class="control-label col-md-12">
                                            <?php echo $_POST['branchgurl'];?>
                                        </label>  
                                    </div>
                                    <?php } ?>
                              <?php } ?>      
                        </div>
                       </div> 
					<?php } ?>			
                                
                            </div>
                            
				<div class="clear"></div>
                
			
            </form>
        
        
		</div>
	</div>


</body>


</html>