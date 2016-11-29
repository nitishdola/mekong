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

                        <div class="col-sm-6">

                            <img class="user_profile_img" src="<?php echo $webUrl;?>register/uploads/<?php echo $dataList[0][3];?>" alt="" width="76" height="76" />

                            <h1 class="user_profile_name"> <?php echo $dataList[0][2];?></h1>

                            <p class="user_profile_info"><?php echo $dataList[0][4];?></p>

                        </div>

                    </div>

                    <hr/>

                    <div class="row">
                        <?php if(isset($_SESSION['errors'])){ ?>
                        <div class="errors">
                            <?php var_dump($_SESSION['errors']); ?>
                        </div>
                        <?php } ?>

                        <?php if($_SESSION['insert_success'] != ''): ?>
                        <div class="alert alert-success">
                          <strong><?php echo $_SESSION['insert_success']; $_SESSION['insert_success'] = ''; ?></strong>
                        </div>
                        <?php endif; ?>

                        <form action="post_add_event.php" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">    
                            <div class="col-md-6">
                                <h3 class="heading_a"><span class="heading_text">Event Details</span></h3>

                                <div class="form-group">

                                    <label for="profile_skype" class="col-sm-3 control-label">Event Title*</label>

                                    <div class="col-sm-9">
                                         <input type="text" name="event_title" required="required" class="form-control" id="inputWarning" placeholder="Event Title">
                                    </div>

                                </div>

                                <div class="form-group">

                                    <label for="profile_fb" class="col-sm-3 control-label">Event Desription*</label>

                                    <div class="col-sm-9">
                                       <textarea class="form-control" name="event_description" required="required" rows="3" placeholder="Event Desription"></textarea>
                                    </div>

                                </div>

                                <div class="form-group">

                                    <label for="profile_fb" class="col-sm-3 control-label">Event Poster*</label>

                                    <div class="col-sm-9">
                                       <input type="file" class="form-control" name="event_poster" required="required" />
                                    </div>

                                </div>

                                <div class="form-group date" data-provide="datepicker">

                                    <label for="profile_email" class="col-sm-3 control-label">Event Date From*</label>

                                    <div class="col-sm-9">
                                        <input type="text" name="event_date_from" required="required" class="datepicker
                                        form-control" id="inputWarning">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="profile_email" required="required" class="col-sm-3 control-label">Event Date To*</label>

                                    <div class="col-sm-9">
                                        <input type="text" name="event_date_to"   class="datepicker form-control" id="inputWarning">
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-6">
                                <h3 class="heading_a"><span class="heading_text">Organiser</span></h3>

                                <div class="form-group">

                                    <label for="profile_skype" class="col-sm-3 control-label">Address *</label>

                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="organiser_address" required="required" rows="3" placeholder="Address"></textarea>
                                    </div>

                                </div>

                                <div class="form-group">

                                    <label for="profile_skype" class="col-sm-3 control-label">Country *</label>

                                    <div class="col-sm-9">
                                        <select name="organiser_country_id" required="required" class="form-control">
                                            <option value="-1">Select Country*</option>
                                            <?php
                                            $sql = "SELECT id,name from countries";
                                            if($cn == false)
                                            connect3db();
                                            $res = mysql_query($sql);
                                            $i = 0;
                                            while($r = mysql_fetch_array($res)){
                                            ?>
                                            <option value="<?php echo $r['id']; ?>"><?php echo ucwords($r['name']); ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                </div>

                                <div class="form-group">

                                    <label for="profile_skype" class="col-sm-3 control-label">Contact Name*</label>

                                    <div class="col-sm-9">
                                         <input type="text" class="form-control" id="inputWarning" name="organiser_contact_name" required="required" placeholder="Contact Name">
                                    </div>

                                </div>

                                <div class="form-group">

                                    <label for="profile_skype" class="col-sm-3 control-label">Position*</label>

                                    <div class="col-sm-9">
                                         <input type="text" name="organiser_position" required="required" class="form-control" id="inputWarning" placeholder="Position">
                                    </div>

                                </div>

                                <div class="form-group">

                                    <label for="profile_skype" class="col-sm-3 control-label">Telephone*</label>

                                    <div class="col-sm-9">
                                         <input type="text" name="organiser_telephone" required="required" class="form-control" id="inputWarning" placeholder="Contact Telephone Number">
                                    </div>

                                </div>

                                <div class="form-group">

                                    <label for="profile_skype" class="col-sm-3 control-label">Mobile*</label>

                                    <div class="col-sm-9">
                                         <input type="text" name="organiser_mobile" required="required" class="form-control" id="inputWarning" placeholder="Contact Mobile Number">
                                    </div>

                                </div>

                                <div class="form-group">

                                    <label for="profile_skype" class="col-sm-3 control-label">Contact Email*</label>

                                    <div class="col-sm-9">
                                         <input type="email" name="organiser_email" required="required" class="form-control" id="inputWarning">
                                    </div>

                                </div>

                            </div>  
                            <div class="col-md-6">
                                <h3 class="heading_a"><span class="heading_text">Event Location</span></h3>
                           

                                <div class="form-group">

                                    <label for="profile_skype" class="col-sm-3 control-label">Country *</label>

                                    <div class="col-sm-9">
                                        <select name="event_country_id" required="required" class="form-control">
                                            <option  value="-1">Select Country</option>
                                            <?php
                                            $sql = "SELECT id,name from countries";
                                            if($cn == false)
                                            connect3db();
                                            $res = mysql_query($sql);
                                            $i = 0;
                                            while($r = mysql_fetch_array($res)){
                                            ?>
                                            <option value="<?php echo $r['id']; ?>"><?php echo ucwords($r['name']); ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                </div>

                                <div class="form-group">

                                    <label for="profile_skype" class="col-sm-3 control-label">Province*</label>

                                    <div class="col-sm-9">
                                         <input name="event_province" required="required" type="text" class="form-control" id="inputWarning" placeholder="Province">
                                    </div>

                                </div>

                                <div class="form-group">

                                    <label for="profile_skype" class="col-sm-3 control-label">City*</label>

                                    <div class="col-sm-9">
                                         <input name="event_city" required="required" type="text" class="form-control" id="inputWarning" placeholder="City">
                                    </div>

                                </div>

                                <div class="form-group">

                                    <label for="profile_skype" class="col-sm-3 control-label">Address*</label>

                                    <div class="col-sm-9">
                                        <textarea name="event_address" required="required" class="form-control" rows="3" placeholder="Event Address"></textarea>
                                    </div>

                                </div>

                                <div class="form-group">

                                    <label for="profile_skype" class="col-sm-3 control-label"></label>

                                    <button type="submit" class="btn btn-success">SUBMIT</button>
                                </div>
                            </div>
                        </form>
                    </div>      
                </div>
            </div>

            

            <!-- main menu -->

             <?php include("include/nav.php");?>



        </div>

		

        <footer>
            <?php include_once('common/footer.php'); ?>
        </footer>

    </body>



<!-- Mirrored from yukon.tzdthemes.com/html/pages-user_profile2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Jun 2016 10:23:41 GMT -->

</html>

