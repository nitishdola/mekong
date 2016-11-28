<?php $pageUrl = "http://logisticsgms.com/";?>
<header id="header" class="stricky">
	<div class="thm-container clearfix">
		<div class="logo pull-left">
			<a href="index.php">
				<img src="images/logo.png" alt="">
			</a>
		</div>
		<div class="header-info pull-right">
			
			
			<div class="info-box">
				
				<div class="text-box">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="images/facebook.png" width="38" height="38" /></td>
    <td><img src="images/twitter.png" width="38" height="38" /></td>
    <td><img src="images/gplus.png" width="38" height="38" /></td>
    <td><img src="images/skyp.png" width="38" height="38" /></td>
    <td><img src="images/link-in.png" width="38" height="38" /></td>
  </tr>
</table>
				</div>
			</div>
			
		</div>
	</div>
</header>
<!-- End header  -->

<!-- Start mainmenu -->
<nav class="main-menu-wrapper stricky full-width">
	<div class="thm-container menu-gradient ">
		<div class="clearfix">
			<div class="nav-holder pull-left">
				<div class="nav-header">
					<button><i class="fa fa-bars"></i></button>
				</div>
				<div class="nav-footer">
					<ul class="nav">
                    <li><strong>Welcome " <?php echo strtoupper($_SESSION['f_name']).' '.strtoupper($_SESSION['l_name']);?> "</strong></li>
                    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
                    <li class="has-submenu">
                    <div class="btn-group">
                    	<button type="button" class="btn btn-primary">My Organisation</button>
                         <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                          </button>
                           <ul class="dropdown-menu" role="menu">
                                <li><a href="<?php echo $webUrl;?>register/user.php">Company Profile</a></li>
                                <?php
								if($dataList[0][63]=="1"){?>
                                <li><a href="<?php echo $webUrl;?>register/userdata_display.php">Edit Profile</a></li>
                                <?php } ?>
                              </ul>
                     </div>
						</li>
                        
                    <li class="has-submenu">
                    <div class="btn-group">
                    	<button type="button" class="btn btn-primary">My Events</button>
                         <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                          </button>
                           <ul class="dropdown-menu" role="menu">
                                <li><a href="<?php echo $webUrl;?>register/add-event.php">Add Event</a></li>
                                <li><a href="<?php echo $webUrl;?>register/userdata_display.php">Manage Event</a></li>
                              </ul>
                     </div>
							
							<!--<ul class="submenu">
								<li><a href="single-service.html">Service Details</a></li>
								<li><a href="pricing.html">Our Pricing</a></li>
							</ul>-->
						</li>
                    
<li id="notification_li"  style="z-index:9999"><button type="button" class="btn btn-primary" id="notificationLink">Notifications

<?php
	$sqlC = "select count(*) as num from  notification_messages where status!='9' and data_id='".$dataList[0][0]."' and type='admin'";
	if($cn == false)
	connect3db();
	$resC = mysql_query($sqlC);
	$rowC = mysql_fetch_array($resC);
	if($rowC['num']>0)
	{
		echo "<span class='badge'>".$rowC['num']."</span>";
	}
	?></a>

  </button> 
    <div id="notificationContainer">
<div id="notificationTitle">

Notifications</div>
<div id="notificationsBody" class="notifications">
	<?php
	$sqlN = "select * from  notification_messages where status!='9' and data_id='".$dataList[0][0]."' and type='admin' order by msg_id desc";
	if($cn == false)
	connect3db();
	$resN = mysql_query($sqlN);
	if($resN)
	{
		while($rowN=mysql_fetch_array($resN))
		{
		?>
        <div class="alert alert-warning" id="not<?php echo $rowN['msg_id'];?>">
        <strong><?php echo html_entity_decode(htmlspecialchars_decode($rowN['message_txt']));?></strong>
        <button type="button" class="close" data-dismiss="alert" data-id="<?php echo $rowN['msg_id'];?>" id="x<?php echo $rowN['msg_id'];?>">×</button>

        <script>
 $(document).ready(function() {
 $('#x<?php echo $rowN['msg_id'];?>').click(function () {
  var id=$(this).attr("data-id");
      $.ajax({

            type: 'post',
            url: "clear_notification.php",
            data: {
              //table:'tbl_content',
              id:id,
            },
            success: function(data) {
			  // alert(data);
               	$("#not<?php echo $rowN['msg_id'];?>").hide();
			 // document.getElementById('disp_time').innerHTML = data;
            }
        });
   // } 
   // return true;
  });

});

   </script>  	
		<?php }
	}
	?>
	
</div>

</div>
</li>
						<li>
                        <div class="btn-group">
                        
                    	<button type="button" class="btn btn-primary">
                        Account Setting
 </button>
                         <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                          </button>
                           <ul class="dropdown-menu" role="menu">
                                <li><a href="<?php echo $webUrl;?>register/user.php">Edit Profile</a></li>
                                <li><a href="<?php echo $webUrl;?>register/userdata_display.php">Logout</a></li>
                              </ul>
                     </div>
                       </li>

					</ul>
				</div>
			</div>
			
		</div>
	</div>
</nav>