<?php
session_start();
include("../include/globalIncWeb.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" href="css/form.css" />

</head>

<body>
<div class="container callout" style="background-color:#FFF">
						<div class="booking-left" >
							
                            <div align="center"><img src="images/2.png"></div><br>
<br>
                            <div class="fdiv">
                            	  <div class="formtitle">Business Areas</div>
                                  <hr></hr>
                                  <div class="blockFull">
                                  	<div class="blockLeft"><strong>Core services</strong></div>
                                    <div class="blockRight" id="input_fields_wrap_business"><?php 
										$chkBusiness = left(urldecode($_POST['chkBusiness']),strlen(urldecode($_POST['chkBusiness']))-1);										$chkBusiness1 =  explode(",",urldecode($chkBusiness));
										for($i=0;$i<count($chkBusiness1);$i++)
										{
												echo $chkBusiness1[$i]."<br/>";
										}
										?>
                                     </div>
                                       
                           </div>
                           
                           <div class="blockFull">
                                  	<div class="blockLeft"><strong>Detailed services offered</strong></div>
                                    <div class="blockRight"> 
									<?php 
										$selOtherService = left(urldecode($_POST['selOtherService']),strlen(urldecode($_POST['selOtherService']))-1);
										$selOtherService1 =  explode(",",urldecode($selOtherService));
										for($i=0;$i<count($selOtherService1);$i++)
										{
												echo $selOtherService1[$i]."<br/>";
										}
									?>
									</div>
                                       
                           </div>
                           
                         
                                   
                                  <div style="clear:both"></div>
                                  <div class="blockFull">
                                  	<div class="blockLeft"><strong>Industry Focus</strong></div>
                                    <div class="blockRight" id="input_fields_wrap_industry"><?php 
										$chkIndustry = left(urldecode($_POST['chkIndustry']),strlen(urldecode($_POST['chkIndustry']))-1);									$chkIndustry1 =  explode(",",urldecode($chkIndustry));
										$txtIndustry = left($_POST['txtIndustry'],strlen($_POST['txtIndustry'])-1);
										
										$txtIndustry1 =  explode("#",urldecode($txtIndustry));
										for($i=0;$i<count($chkIndustry1);$i++)
										{
												echo $chkIndustry1[$i]."<br/>";
												echo $txtIndustry1[$i]."<br/><br/>";
										}
										?></div>
                                       
                           </div>
                                   
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                  	<div class="blockLeft"><strong>Information System Applied in Services </strong></div>
                                    <div class="blockRight">
                                      <?php echo $_POST['txtInformation'];?>
                                      </div>
                                      
                           </div>
                                   
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                  	<div class="blockLeft"><strong>Business Geographic Coverage </strong></div>
                                    
                                    <div class="blockRight" id="input_fields_wrap_area">
                                    <?php
									
                                   		$selArea = left($_POST['selArea'],strlen($_POST['selArea'])-1);
										$selArea1 = explode("#",$selArea);
										$txtRegionDetail = left($_POST['txtRegionDetail'],strlen($_POST['txtRegionDetail'])-1);
										$txtRegionDetail1 = explode("#",$txtRegionDetail);
											for($i=0;$i<count($selArea1);$i++)
											{
												echo "Region : ".$selArea1[$i]."<br/>";
												echo $txtRegionDetail1[$i]."<br/><br/>";
											}
									?>		
                                       </div>
                                   
                                   
                                      
                           </div>
                                   
                                  <div style="clear:both"></div>
                                   <div class="blockFull"><hr/></div>
                                  <div style="clear:both"></div>
                                  <div class="formtitle">Fixed Assets </div>
                                  
                                  <div class="blockFull">
                                  	<div class="blockLeft"><strong>Employee</strong></div>
                                    
                                    <div class="blockRight">
                                    <?php echo $_POST['txtEmployeeNo'];?><br><br>
                                    </div>
                                       
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                  	<div class="blockLeft"><strong>Drivers</strong></div>
                                    <div class="blockRight">
                                     <?php echo $_POST['txtDrivers'];?>
                                    </div>
                                  </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                  	<div class="blockLeft"><strong>Trucks</strong></div>
                                    <div class="blockRight" id="input_fields_wrap_industry">
									   <?php echo $_POST['txtTrucks'];?>
                                    </div>
                                       
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                   <div class="blockFull">
                                  	<div class="blockLeft"><strong>Warehouse</strong></div>
                                    <div class="blockRight">
                                    <?php echo $_POST['txtWarehouse'];?>
                                    </div>
                                       
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  

                                  <div class="blockFull">
                                  	<div class="blockLeft"><strong>Other Assets </strong></div>
                                    <div class="blockRight" >
                                    <div class="blockRight">
                                     	<?php echo $_POST['txtOtherAsset'];?>
                                        
                                    </div>
                                    
                                    </div>
                                      
                                   </div>
                                  <div style="clear:both"></div>

                                  <div class="blockFull">
                                  	<?Php $getPics = getPics($_SESSION['data_id'],"fixed_asset");
                                                                            if(count($getPics)>0)
                                                                            {
                                                                                for($i=0;$i<count($getPics);$i++)
                                                                            {
                                                                                ?>
                                                                             <div style="float:left; margin-right:5px;">
                                                                           <a class="example-image-link" href="images/fixed_asset/<?php echo $getPics[$i][2];?>" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
  
                                                                             <img src="images/fixed_asset/<?php echo $getPics[$i][2];?>" style="width:80px; height:60px;"></a><br>
                                        <?php echo $getPics[$i][3];?>
                                        </div>
                                                                            <?php } } ?>  
                                   </div>
                                  <div style="clear:both"></div>
                                  
                               </div>   
                               
                               <div class="sdiv">
                               <div class="formtitle">Registration Status</div>
                                  <hr></hr>
                               		 <div class="blockFull">
                                     
                                  	<div class="blockLeft"><strong>Year of Registration</strong></div>
                                    <div class="blockRight">
                                   <?php echo $_POST['txtRegYear'];?>
                                    </div>
                                     
                                   </div>
                                  <div style="clear:both"></div>
                                  
                               		<div class="blockFull">
                                  	<div class="blockLeft"><strong>Registration Authority </strong></div>
                                    <div class="blockRight">
                                    <?php echo $_POST['txtRegAuthority'];?>
                                    </div>
                                       
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                  	<div class="blockLeft"><strong>Company’s Registration No</strong>.</div>
                                    <div class="blockRight">
                                     <?php echo $_POST['txtRegNo'];?><br><br>
                                     <?Php $getPics = getPics($_POST['data_id'],"reg_no");
                                                                            if(count($getPics)>0)
                                                                            {
                                                                                for($i=0;$i<count($getPics);$i++)
                                                                            {
                                                                                ?>
                                                                             <div style="float:left; margin-right:5px;"><img src="images/registration_img/<?php echo $getPics[$i][2];?>" style="width:80px; height:60px;"><br>
                                        <?php echo $getPics[$i][3];?>
                                        </div>
                                                                            <?php } } ?>  
                                    </div>
                                   </div> 
                                    
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                  	<div class="blockLeft"><strong>Company Proprietary Status</strong></div>
                                    <div class="blockRight">
                                    <?php
									if($_POST['chkProStatus']!="Other")
									{
										echo $_POST['chkProStatus'];
									}
									else
									{
										echo $_POST['txtProOthers'];
									}
                                    ?>
                                    </div>
                                   </div> 
                                  
                                  <div style="clear:both"></div>
                                    
                                  <div class="blockFull">
                                  	<div class="blockLeft"><strong>Registered Capital</strong></div>
                                    <div class="blockRight">
                                    <?php echo $_POST['txtRegAmt'];?>
                                    USD

                                    </div>
                                       
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                  	<div class="blockLeft"><strong>Annual Turn Over</strong></div>
                                    <div class="blockRight">
                                     <?php echo $_POST['txtTurnAmt'];?>
                                    USD

                                    </div>
                                       
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                  	<div class="blockLeft"><strong>Annual Revenue</strong></div>
                                    <div class="blockRight">
                                  <?php echo $_POST['txtAnnualRevAmt'];?>
                                  USD                                 </div>
                                       
                                   </div>
                                  <div style="clear:both"></div>
                                  <hr></hr>
                                  <div class="formtitle">Membership  </div>
                                  <div style="clear:both"></div>
                                  <div class="blockFull">
                                  	<div class="blockLeft"><strong>Name of Your Membership Organization / Network </strong></div>
                                    <div class="blockRight"><?php echo $_POST['selTypeOrgName'];?></div>
                                  </div>
                                  
                                  
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull">
                                  	<div class="blockLeft"><strong>Location of Your Membership Organization / Network</strong></div>
                                    <div class="blockRight"><?php 
										$selLocation = left(urldecode($_POST['selLocation']),strlen(urldecode($_POST['selLocation']))-1);									
		
										$selLocation =  explode("#",urldecode($selLocation));
										for($i=0;$i<count($selLocation);$i++)
										{
												echo $selLocation[$i]."<br/>";
										}
										?></div>
                                  </div>
                                  
                                  
                                  <div style="clear:both"></div>
									 <div class="blockFull">
                                  	<div class="blockLeft"><strong>Awards</strong></div>
                                    <div class="blockRight">
                                    <?Php $getPics = getPics($_POST['data_id'],"awards");
                                                                            if(count($getPics)>0)
                                                                            {
                                                                                for($i=0;$i<count($getPics);$i++)
                                                                            {
                                                                                ?>
                                                                             <div style="float:left; margin-right:5px;"><img src="images/awards/<?php echo $getPics[$i][2];?>" style="width:80px; height:60px;"><br>
                                        <?php echo $getPics[$i][3];?>
                                        </div>
                                                                            <?php } } ?>  
                                    </div>
                                       
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  
                                  <div class="blockFull">
                                  	<div class="blockLeft"><strong>Certifications</strong></div>
                                    <div class="blockRight">
                                    <?Php $getPics = getPics($_POST['data_id'],"certificate");
                                                                            if(count($getPics)>0)
                                                                            {
                                                                                for($i=0;$i<count($getPics);$i++)
                                                                            {
                                                                                ?>
                                                                             <div style="float:left; margin-right:5px;"><img src="images/certificate/<?php echo $getPics[$i][2];?>" style="width:80px; height:60px;"><br>
                                        <?php echo $getPics[$i][3];?>
                                        </div>
                                                                            <?php } } ?>  
                                    </div>
                                       
                                   </div>
                                  <div style="clear:both"></div>
                                  
                                  <div class="blockFull"></div>
                                  <div style="clear:both"></div>
  
  
                               </div>
                               
                                <div class="blockFull">
                                <hr></hr>
                                  <div class="formtitle" style="width:48%">Success Story </div><br>
                                 <?php echo stripslashes($_POST['sstory']);?>      
                                  </div>
                               
   
				<div class="clear"></div>                           
                   
                               
				
			</div>
		</div>
        
</body>
</html>