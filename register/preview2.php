<?php
session_start();
ob_start();
include("../include/globalIncWeb.php");
?>

<div class="thm-container">
		<div class="row">	
		<div class="col-md-4"></div><div class="col-md-4" id="timer"></div><div class="col-md-4"></div>
        <form id="form1" class="form-horizontal row-border" name="form1" action="" method="post" enctype="multipart/form-data">
                    <div >
						<div>
                     <div class="col-md-6">
						<div class="formtitle">Business Areas</div>
                                  <hr></hr>
                            <div class="form-group">
						    <label class="control-label col-md-3"><strong>Core services</strong><span class="redmi1">*</span></label>
						    <?php 
							$chkBusiness = left(urldecode($_POST['chkBusiness']),strlen(urldecode($_POST['chkBusiness']))-1);
							$chkBusiness1 =  explode(",",urldecode($chkBusiness));
							for($i=0;$i<count($chkBusiness1);$i++)
							{
								if($i==0){
							?>
                             <label class="control-label col-md-7"><?php echo $chkBusiness1[$i];?></label>
                            <?php } else if($i>0) { ?>
                             <label class="control-label col-md-3"></label>
                             <label class="control-label col-md-7"><?php echo $chkBusiness1[$i];?></label>
                             <?php } ?>
                             <?php if($chkBusiness1[$i]=="Others"){?>
                             	 <label class="control-label col-md-3"></label>
                             	  <label class="control-label col-md-7"><?php echo $_POST['selOtherService'];?></label>
                             <?php } ?>

                             <?php } ?>

                            </div>
                                 
                            <div class="form-group">
                                  	<label class="control-label col-md-3"><strong>Other services offered: </strong></label>
                                  	<?php 
                                  	if($_POST['selOtherService']!=""){
										$selOtherService = left(urldecode($_POST['selOtherService']),strlen(urldecode($_POST['selOtherService']))-1);
										$selOtherService1 =  explode(",",urldecode($selOtherService));
										for($i=0;$i<count($selOtherService1);$i++)
										{
											if($i==0){
										?>	
                                     <label class="control-label col-md-7"> <?php echo $selOtherService1[$i];?></label>
                                     	<?php } else { ?>
                                     	<label class="control-label col-md-3"></label>
                                     	<label class="control-label col-md-7"> <?php echo $selOtherService1[$i];?></label>
                                     	<?php } ?>
                                  <?php } } ?>
                           </div>

                                  
                                    <div class="form-group">
                                  	<label class="control-label col-md-3"><strong>Industry Focus</strong><span class="redmi1">*</span> </label>
	                                    <div class="col-md-7" id="input_fields_wrap_industry">
	                                    <?php 
	                                    if($_POST['chkIndustry']!=""){
	                                    $chkIndustry = left(urldecode($_POST['chkIndustry']),strlen(urldecode($_POST['chkIndustry']))-1);
	                                    $chkIndustry1 =  explode(",",urldecode($chkIndustry));
										$txtIndustry = left($_POST['txtIndustry'],strlen($_POST['txtIndustry'])-1);
										$txtIndustry1 =  explode("#",urldecode($txtIndustry));
										for($i=0;$i<count($chkIndustry1);$i++)
										{
										?>
	                               		<?php if($chkIndustry1[$i]=="Others"){?>
	                               		 <label class="control-label col-md-7">
	                                    <?php echo $chkIndustry1[$i];?>
	                               		</label>

	                               		<label class="control-label col-md-7">
	                                    [<?php echo $_POST['chkOther'];?>]
	                               		</label>
	                               		<?php } else { ?>
	                               		 <label class="control-label col-md-7">
	                                    <?php echo $chkIndustry1[$i];?>
	                               		</label>
	                               		<label class="control-label col-md-7">
	                                    [<?php echo $txtIndustry1[$i];?>]
	                               		</label>
	                               		<?php } ?>	
	                                    <?php } } ?>
	                          			 </div>
                         			 </div>
                                  
                                  <div class="form-group">
                                  	<label class="control-label col-md-3">
                                  	<strong>Information System Applied in Services</strong> <span class="redmi1">*</span> </label>

                                    <label class="control-label col-md-7">
                                       <?php echo $_POST['txtInformation'];?>
                                     </label>
                                      
                          		 </div>
                                   
                                  
                                 <div class="form-group">
                                  	<label class="control-label col-md-3"><strong>Business Geographic Coverage</strong> <span class="redmi1">*</span> </label>
                                    <?php
									if($_POST['selArea']!=""){
                                   		$selArea = left($_POST['selArea'],strlen($_POST['selArea'])-1);
										$selArea1 = explode("#",$selArea);
										$txtRegionDetail = left($_POST['txtRegionDetail'],strlen($_POST['txtRegionDetail'])-1);
										$txtRegionDetail1 = explode("#",$txtRegionDetail);
										for($i=0;$i<count($selArea1);$i++)
										{
										if($i==0){
										?>			
                                    <label class="control-label col-md-7">
                                    <?php echo "Region : ".$selArea1[$i]."<br/>";
                                    echo "[".$txtRegionDetail1[$i]."]"."<br/><br/>";
                                    ?>
                                    </label>
                                    <?php } else { ?>
                                    <label class="control-label col-md-3"> </label>
                                    <label class="control-label col-md-7">
                                    <?php echo "Region : ".$selArea1[$i]."<br/>";
                                    echo "[".$txtRegionDetail1[$i]."]"."<br/><br/>";
                                    ?>
                                    </label>
                                    <?php } } } ?>

                      		 </div>
 
                                   <div class="blockFull"><hr/></div>
                                  <div style="clear:both"></div>
                                  <div class="formtitle">Fixed Assets </div>
                                  <br>

                                 <div class="form-group">
                                  	<label class="control-label col-md-3"><strong>Employee</strong> <span class="redmi1">*</span> </label>

	                                <label class="control-label col-md-7">
	                                   <?php echo $_POST['txtEmployeeNo'];?>
	                                 </label>
                                      
                                </div>
                             
                                  
                                 <div class="form-group">
                                  	<label class="control-label col-md-3"> <strong>Drivers</strong> </label>

                                <label class="control-label col-md-7">
                                    <?php echo $_POST['txtDrivers'];?>
                                 </label>
                                       
                               </div>
                               
                                  
                               <div class="form-group">
                                  	<label class="control-label col-md-3"><strong>Trucks</strong> </label>
                                 
                                  <label class="control-label col-md-7">
                                    <?php echo $_POST['txtTrucks'];?>
                                  </label>
                                       
                               </div>
                                 
                                  
                                <div class="form-group">
                                  	<label class="control-label col-md-3"><strong>Warehouse</strong> </label>
                                    <label class="control-label col-md-7">
                                    <?php echo $_POST['txtWarehouse'];?>
                                    </label> 
                                </div>
                               

                               <div class="form-group">
                                  	<label class="control-label col-md-3"><strong>Other Assets</strong> </label>
                                    <label class="control-label col-md-7">
                                    	<?php echo $_POST['txtOtherAsset'];?>
                                    </label>

                               </div>  

								<div class="form-group">
                               	<label class="control-label col-md-12"><strong  style="font-size: 15px;"> photos of fixed assets</strong></label>
                               	</div>

                               	 <div class="form-group"> 
                                   <?Php $getPics = getPics($_SESSION['data_id'],"fixed_asset");
	                                if(count($getPics)>0)
	                                {
	                                for($i=0;$i<count($getPics);$i++)
	                                {
	                                 ?>  
                                   <div class="col-md-2">
                                   <a class="example-image-link" href="images/fixed_asset/<?php echo $getPics[$i][2];?>" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
                                   	<img src="images/fixed_asset/<?php echo $getPics[$i][2];?>" style="max-width: 100%; height: 100%">
                                   </a>	
                                   	<br/>
                                   <label>	<?php echo $getPics[$i][3];?></label>

                                   </div> 
                                   <?php } } else {?>
                                   <label style="color: #ff0000">No Picture has been uploaded yet</label>
                                   <?php } ?> 
                                  </div> 	

                               </div>		
                                
                               
                               <div class="col-md-6">
                               <div class="formtitle">Registration Status</div>
                                  <hr></hr>
                               		 <div class="form-group">
                                     
                                  	<label class="control-label col-md-5"><strong>Year of Registration</strong>  <span class="redmi1">*</span> </label>
                                   <label class="control-label col-md-6">
                                   <?php echo $_POST['txtRegYear'];?>
                                    </label>
                                     
                                   </div>
                                
                                  
                               		<div class="form-group">
                                  	<label class="control-label col-md-5"><strong>Registration Authority</strong>   <span class="redmi1">*</span> </label>
                                   <label class="control-label col-md-6">
                                   	<?php echo $_POST['txtRegAuthority'];?>
                                    </label>
                                       
                                   </div>
                               
                                 <div class="form-group">
                                  	<label class="control-label col-md-5"><strong>Company Registration No.</strong>   <span class="redmi1">*</span></label>
                                   <label class="control-label col-md-6">
                                   	<?php echo $_POST['txtRegNo'];?>
                                    </label>
                                 </div>

                                 <div class="form-group">
                               	<label class="control-label col-md-12"><strong  style="font-size: 12px;">Photos of company registration certificate</strong></label>
                               	</div>

                               	 <div class="form-group"> 
                                   <?Php $getPics = getPics($_SESSION['data_id'],"reg_no");
	                                if(count($getPics)>0)
	                                {
	                                for($i=0;$i<count($getPics);$i++)
	                                {
	                                 ?>  
                                   <div class="col-md-2">
                                   <a class="example-image-link" href="images/registration_img/<?php echo $getPics[$i][2];?>" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
                                   	<img src="images/registration_img/<?php echo $getPics[$i][2];?>" style="max-width: 100%; height: 100%">
                                   </a>	
                                   	<br/>
                                   <label>	<?php echo $getPics[$i][3];?></label>

                                   </div> 
                                   <?php } } else {?>
                                   <label  style="color: #ff0000">No Picture has been uploaded yet</label>
                                   <?php } ?> 
                                  </div> 	
                                  
                                 <div class="form-group">
                                  	<label class="control-label col-md-5"><strong>Company Proprietary Status</strong>  <span class="redmi1">*</span> </label>
                                    <div class="col-md-6">

	                                    <label class="control-label col-md-12">
	                                    	 <?php
	                                    	 if($_POST['chkProStatus']!="undefined"){
												if($_POST['chkProStatus']!="Other")
												{
													echo $_POST['chkProStatus'];
												}
												else
												{
													echo $_POST['txtProOthers'];
												}
											}	
			                                    ?>
	                                     </label>
                              
                                    </div>
                                 </div> 
 
                                 
                                  
                                  <hr></hr>
                                  <div class="formtitle">Membership  </div>
                                  <br>

                                  <div style="clear:both"></div>
                                  <div class="form-group">
                                  	<label class="control-label col-md-5"><strong>Name of Your Membership Organization / Network
                                  	</strong>  <span class="redmi1">*</span> </label>
									<label class="control-label col-md-6">
									
										<?php echo $_POST['selTypeOrgName'];?>
                                    </label>
                                   </div> 
                                    
 								<div class="form-group">
                                  	<label class="control-label col-md-5"> <strong>Location of Your Membership Organization / Network
                                  	</strong> <span class="redmi1"></span> </label>
                                  	<?php 
										$selLocation = left(urldecode($_POST['selLocation']),strlen(urldecode($_POST['selLocation']))-1);									
										$selLocation =  explode("#",urldecode($selLocation));
										for($i=0;$i<count($selLocation);$i++)
										{
											if($i<1){
										?>	
										<label class="control-label col-md-6"> <?php echo $selLocation[$i]; ?>  </label> 
										<?php } else { ?>
										<label class="control-label col-md-5"></label>
										<label class="control-label col-md-6"> <?php echo $selLocation[$i]; ?>  </label> 
                                       <?php } ?>
                                       <?php } ?>
                                                        
                                </div>       
  
									  <div class="form-group">
									<label class="control-label col-md-5"><strong>Awards</strong></label>
									  <label class="control-label col-md-6">
									        <div class="form-group"> 
			                                   <?Php $getPics = getPics($_SESSION['data_id'],"awards");
				                                if(count($getPics)>0)
				                                {
				                                for($i=0;$i<count($getPics);$i++)
				                                {
				                                 ?>  
			                                   <div class="col-md-5">
			                                   <a class="example-image-link" href="images/awards/<?php echo $getPics[$i][2];?>" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
			                                   	<img src="images/awards/<?php echo $getPics[$i][2];?>" style="max-width: 100%; height: 100%">
			                                   </a>	
			                                   	<br/>
			                                   <label>	<?php echo $getPics[$i][3];?></label>

			                                   </div> 
			                                   <?php } } else {?>
			                                   <label style="color: #ff0000">No Picture has been uploaded yet</label>
			                                   <?php } ?> 
			                                  </div> 	
									       </label>
									 </div>
                                
                                
                                 <div class="form-group">
						    <label class="control-label col-md-5"><strong>Certifications</strong></label>
                                    <label class="control-label col-md-6">
                                  		<div class="form-group"> 
			                                   <?Php $getPics = getPics($_SESSION['data_id'],"certificate");
				                                if(count($getPics)>0)
				                                {
				                                for($i=0;$i<count($getPics);$i++)
				                                {
				                                 ?>  
			                                   <div class="col-md-5">
			                                   <a class="example-image-link" href="images/certificate/<?php echo $getPics[$i][2];?>" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
			                                   	<img src="images/certificate/<?php echo $getPics[$i][2];?>" style="max-width: 100%; height: 100%">
			                                   </a>	
			                                   	<br/>
			                                   <label>	<?php echo $getPics[$i][3];?></label>

			                                   </div> 
			                                   <?php } } else {?>
			                                   <label style="color: #ff0000">No Picture has been uploaded yet</label>
			                                   <?php } ?> 
			                              </div> 
                                    </label>
                                       
                                   </div>
  
                              
                               <hr></hr>
                                  <div class="formtitle">Marketing materials </div> 
                               
                               <div class="form-group">
						    <label class="control-label col-md-5"> <strong>Marketing materials</strong>
                           </label>
                                    <label class="control-label col-md-6">
                                  		<div class="form-group"> 
			                                   <?Php $getPics = getPics($_SESSION['data_id'],"marketing");
				                                if(count($getPics)>0)
				                                {
				                                for($i=0;$i<count($getPics);$i++)
				                                {
				                                 ?>  
			                                   <div class="col-md-5">
			                                   <a class="example-image-link" href="images/marketing/<?php echo $getPics[$i][2];?>" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
			                                   	<img src="images/marketing/<?php echo $getPics[$i][2];?>" style="max-width: 100%; height: 100%">
			                                   </a>	
			                                   	<br/>
			                                   <label>	<?php echo $getPics[$i][3];?></label>

			                                   </div> 
			                                   <?php } } else {?>
			                                   <label style="color: #ff0000">No Picture has been uploaded yet</label>
			                                   <?php } ?> 
			                              </div> 
                                    </label>
                                       
                                   </div>
  
                               
                               
                            <div class="form-group">
						    <label class="control-label col-md-5"><strong>Youtube id</strong>  </label>
                                    <label class="control-label col-md-6">
                                   		<?php echo $_POST['txtMarketYoutube'];?>
                                    </label>
                                       
                                   </div>
  								</div>
                              
                               
                               
                                <div class="col-md-12">
                                <hr></hr>
                                  <div class="formtitle" style="width:48%">Success Story </div><br>
                                	<label> <?php echo stripslashes($_POST['sstory']);?> </label>
                                 </div>
                                   
    
				<div class="clear"></div>                           
                   
                               
				
			</div>
		</div>
        </form>
        
        
		</div>
	</div>

<br>
<br>
<br>
<br>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div style="background: #F7BE3D; width: 95%; padding: 5px; color: #000; font-size: 16px;">PREVIEW</div>
      </div>
      <div class="modal-body" id="preview">
        <div align="center"><img src="../images/loading.gif"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Edit</button>
      </div>
    </div>

  </div>
</div>