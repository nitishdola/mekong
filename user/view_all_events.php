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


$sql1 = "select id from tbl_user_data where user_id = '".$_SESSION['user_id']."'";
if($cn == false)
connect3db();
$res1 = mysql_query($sql1);
if(mysql_num_rows($res1))
{
    $row1= mysql_fetch_array($res1);
    $user_data_id = $row1['id'];
}
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

                        <?php

                            //get the data
                            $sql = "SELECT events.*, countries.name as organising_country, event_c.name as event_country
                                    FROM events as events, countries as countries , countries as event_c
                                    WHERE events.organiser_country_id = countries.id
                                    AND event_c.id = events.event_country_id
                                    AND events.user_data_id = '".$user_data_id."'";

                            $res = mysql_query($sql);
                            if(mysql_num_rows($res))
                            {
                                $i = 1;
                        ?>
                        <!-- List all Events added bt the user-->
                        <table id="datatable_events" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Event Title</th>
                                    <th>Event Date From</th>
                                    <th>Event Date To</th>
                                    <th>Organiser Address</th>
                                    <th>Organiser Country</th>
                                    <th>Organiser Contact Name</th>
                                    <th>Organiser Position</th>
                                    <th>Organiser Mobile</th>
                                    <th>Event Country</th>
                                    <th>Event City</th>
                                    <th>Event Address</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php while($r = mysql_fetch_array($res)){ ?>

                                <tr>
                                    <td> <?php echo $i++; ?></td>
                                    <td> <?php echo $r['event_title']; ?> </td>
                                    <td> <?php echo $r['event_date_from']; ?> </td>
                                    <td> <?php echo $r['event_date_to']; ?> </td>
                                    <td> <?php echo $r['organiser_address']; ?> </td>
                                    <td> <?php echo $r['organising_country']; ?> </td>
                                    <td> <?php echo $r['organiser_contact_name']; ?> </td>
                                    <td> <?php echo $r['organiser_position']; ?> </td>
                                    <td> <?php echo $r['organiser_mobile']; ?> </td>
                                    <td> <?php echo $r['event_country']; ?> </td>
                                    <td> <?php echo $r['event_city']; ?> </td>
                                    <td> <?php echo $r['event_address']; ?> </td>
                                    
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <?php } ?>
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

