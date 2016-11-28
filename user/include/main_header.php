<header id="main_header">
                <div class="container-fluid">
                    <div class="brand_section">
                        <a href="dashboard.php"><img src="../images/logo1.png" alt="site_logo" width="151" height="50"></a>
                    </div>
                    <ul class="header_notifications clearfix">
                       
                        <li class="dropdown">
                            <span class="label label-primary">
   <label id="cmsg">                        
	<?php
	$sqlC = "select count(*) as num from  notification_messages where status!='9' and data_id='".$dataList[0][0]."' and type='admin'";
	if($cn == false)
	connect3db();
	$resC = mysql_query($sqlC);
	$rowC = mysql_fetch_array($resC);
	if($rowC['num']>0)
		echo $rowC['num'];
	else
		echo "0";
	?>
    </label>
    </span>
   
                            <a data-toggle="dropdown" href="#" class="dropdown-toggle"><i class="el-icon-bell"></i></a>
                            <div class="dropdown-menu">
                                <ul>
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
                                    <li id="not<?php echo $rowN['msg_id'];?>">
                                        <p><?php echo html_entity_decode(htmlspecialchars_decode($rowN['message_txt']));?></p>
                                        <small class="text-muted"><?php echo date('d-M-Y',strtotime($rowN['date']));?></small>
                                        <button type="button" class="close" data-dismiss="alert" data-id="<?php echo $rowN['msg_id'];?>" id="x<?php echo $rowN['msg_id'];?>">×</button>
                                    </li>
                                    <script>
 $(document).ready(function() {
 $('#x<?php echo $rowN['msg_id'];?>').click(function () {
  var id=$(this).attr("data-id");
  var pid=<?php echo $dataList[0][0];?>;
      $.ajax({

            type: 'post',
            url: "clear_notification.php",
            data: {
              //table:'tbl_content',
              id:id,
			  pid:pid 
            },
            success: function(data) {
			  // alert(data);
               	$("#not<?php echo $rowN['msg_id'];?>").hide();
				$("#cmsg").html(data);
			 // document.getElementById('disp_time').innerHTML = data;
            }
        });
   // } 
   // return true;
  });

});

   </script>  	
                                    <?php } } ?>
                                </ul>
                            </div>
                        </li>
                    </ul>
                    <div class="header_user_actions dropdown">
                        <div data-toggle="dropdown" class="dropdown-toggle user_dropdown">
                            <div class="user_avatar">
                                <img src="assets/img/avatars/avatar08_tn.png" alt="" title="Carrol Clark (carrol@example.com)" width="38" height="38">
                            </div>
                            <span class="caret"></span>
                        </div>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="#">User Profile</a></li>
                            <li><a href="logout.php">Log Out</a></li>
                        </ul>
                    </div>
                   
                </div>
            </header>
