<br>
<br>
<nav id="main_menu">
                <div class="menu_wrapper">
                    <ul>
                        <li class="first_level">
                            <a href="dashboard.php">
                                <span class="icon_house_alt first_level_icon"></span>
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </li>
                        <?php
						if($dataList[0][63]=="1"){?>
                        <li class="first_level">
                           <a href="edit_userdata_page1.php">
                                <span class="icon_document_alt first_level_icon"></span>
                                <span class="menu-title">Edit Company Profile <img src="<?php echo $webUrl;?>user/assets/img/new10.gif"></span>
                        		</a>        
                         </li>  
                         <?php } ?>     
                        <li class="first_level">
                            <a href="javascript:void(0)">
                                <span class="icon_document_alt first_level_icon"></span>
                                <span class="menu-title">My Company Profile</span>
                            </a>
                            <ul>
                                <li class="submenu-title">Forms</li>
                                <li><a href="company_profile.php">Company Overview</a></li>
                                <li><a href="registration_status.php">Registration Status</a></li>
                                <li><a href="membership.php">Membership</a></li>
                                <li><a href="photogallary.php">Photo Gallery</a></li>
                                 <li><a href="success_story.php">Success Story</a></li>
                                 
                            </ul>
                        </li>
                        
                        <li class="first_level">
                            <a href="javascript:void(0)">
                                <span class="icon_document_alt first_level_icon"></span>
                                <span class="menu-title">My Services</span>
                            </a>
                            <ul>
                                <li class="submenu-title">Forms</li>
                                <li><a href="business_area.php">Business Area</a></li>
                                <li><a href="fixed_assets.php">Fixed Assets</a></li>
                                
 
                            </ul>
                        </li>
                        
                        <li class="first_level">
                            <a href="javascript:void(0)">
                                <span class="icon_document_alt first_level_icon"></span>
                                <span class="menu-title">My Business Interaction</span>
                            </a>
                             <ul>
                                <li class="submenu-title">Forms</li>
                                <li><a href="company_profile.php">Whom I have viewed</a></li>
                                <li><a href="registration_status.php">Who viewed me</a></li>
 
                            </ul>
                        </li>
                        
                        <li class="first_level">
                            <a href="javascript:void(0)">
                                <span class="icon_document_alt first_level_icon"></span>
                                <span class="menu-title">My Events & News</span>
                            </a>
                            <ul>
                                <li class="submenu-title">Forms</li>
                                <li><a href="add_new_event.php">Add new event</a></li>
                                <li><a href="registration_status.php">Manage event</a></li>
 
                            </ul>
                        </li>

                        <?php if($dataList[0][71]=="1") { ?> 
                        <li class="first_level">
                            <a href="javascript:void(0)"  data-toggle="modal" data-target="#myModal"  style="color: #ff0000">
                                <span class="icon_document_alt first_level_icon"></span>
                                <span class="menu-title">Authorise</span>
                            </a>
                        </li>
                        <?php } ?>     

                       
                    </ul>
                </div>
                <div class="menu_toggle">
                    <span class="icon_menu_toggle">
                        <i class="arrow_carrot-2left toggle_left"></i>
                        <i class="arrow_carrot-2right toggle_right" style="display:none"></i>
                    </span>
                </div>
            </nav>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Authorisation</h4>
      </div>
      <div class="modal-body">
        <p id="vari">I hereby authorise the GMS Logistics database to publish my company's profile for marketing purpose. I affirm that all the information provided here is valid.</p>
      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-primary" id="variButton">Authorise </button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<script>
 $(document).ready(function() {
 $('#variButton').click(function () {
$("#vari").html("<img src='assets/img/loading.gif'>");
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
                $("#variButton").hide();
             // document.getElementById('disp_time').innerHTML = data;
            }
        });
   // } 
   // return true;
  });

});
 </script>
