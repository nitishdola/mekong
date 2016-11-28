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

        <!-- moment.js (date library) -->
        <script src="assets/js/moment-with-langs.min.js"></script>
<script src="assets/js/jquery.min.js"></script>
        <link rel="stylesheet" href="assets/css/lightbox.min.css">

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
                            <form class="form-horizontal" role="form">    
                                <h3 class="heading_a"><span class="heading_text">Business Areas</span></h3>
                                <div class="form-group">
                                    <label for="profile_skype" class="col-sm-2 control-label">Core services</label>
                                    <div class="col-sm-10">
                                       <label  class="form-control"><?php if($dataList[0][28]!="") echo htmlspecialchars_decode(html_entity_decode($dataList[0][28])); else echo "Not available";?></label> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="profile_fb" class="col-sm-2 control-label"> Other Services offered </label>
                                    <div class="col-sm-10">
                                       <label  class="form-control">
                                        <?php if(($dataList[0][32]!="")){
	        							$exp = explode('#', $dataList[0][32]);
	        							for($x=0;$x<count($exp);$x++)
	        							{
	        							echo htmlspecialchars_decode(html_entity_decode($exp[$x])).", ";
	        							}
										}
										?>
										<?php if($dataList[0][33]!="") {
											echo htmlspecialchars_decode(html_entity_decode($dataList[0][33]));
										}
										?>
                                       </label> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="profile_email" class="col-sm-2 control-label">Industry Focus</label>
                                    <div class="col-sm-10">
                                         <label  class="form-control">
                                        <?php if($dataList[0][30] != "") { 
									$expIndus = explode(",",$dataList[0][30]);
									$txtIndus = explode("#",$dataList[0][72]);
										for($w=0;$w<count($expIndus);$w++)
										{
											echo $expIndus[$w]."<br>";
											echo $txtIndus[$w]."<br><br>";
										}
									}
									?>
                                         </label>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="profile_email" class="col-sm-2 control-label">Information System Applied in Services </label>
                                    <div class="col-sm-10">
                                         <label  class="form-control">
                                         <?php if($dataList[0][34]!="") echo htmlspecialchars_decode(html_entity_decode($dataList[0][34])); else echo "Not available";?>
                                         </label>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="profile_email" class="col-sm-2 control-label">Business Geographic Coverage </label>
                                    <div class="col-sm-10">
                                         <label  class="form-control">
                                         <?php if($dataList[0][35]!="") {
										$businessArea = explode(",",$dataList[0][35]);
										$businessAreaDes = explode(",",$dataList[0][36]);
										for($q=0;$q<count($businessAreaDes);$q++)
										{
											echo $businessArea[$q]."<br>";
											echo $businessAreaDes[$q]."<br><br>";
										}
									}
									?>
                                         </label>
                                    </div>
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

        <!-- Yukon Admin functions -->
        <script src="assets/js/yukon_all.js"></script>
    </body>

<!-- Mirrored from yukon.tzdthemes.com/html/pages-user_profile2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Jun 2016 10:23:41 GMT -->
</html>
