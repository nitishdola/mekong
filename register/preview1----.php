<?php
include("../include/globalIncWeb.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" href="css/form.css" />
<link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css" type="text/css">
<script src="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/jquery-ui.js" type="text/javascript"></script>
<link href="css/jquery-ui.css" rel="stylesheet" type="text/css" />
<style>
.bdr{
	border:1px solid #999;
}
body{
	font-size:12px !important;
}
</style>
</head>

<body>
<div class="container">
    <div class="row">
    	<div class="col-md-5 bdr">
        	<div class="row">
                <div class="col-md-12" style="background:#CCC; padding:4px;">
                    <strong>Company Introduction</strong>
                </div>
                <div class="col-md-6">
                    <strong>Company Name</strong>
                </div>
                <div class="col-md-6">
                   <?php echo $_POST['name'];?>
                </div>
                <p>&nbsp;</p>
                <div class="col-md-6">
                    <strong>Logo</strong>
                </div>
                <div class="col-md-6">
                   <img src="<?php echo $_POST['imgPrev'];?>" style="max-height:100px">
                </div>
                <p>&nbsp;</p> 
                <div class="col-md-6">
                    <strong>Business Slogan </strong>
                </div>
                <div class="col-md-6">
                  <?php echo $_POST['slogan'];?>
                </div>
                 <p>&nbsp;</p>
                <div class="col-md-6">
                    <strong>Company Introduction </strong>
                </div>
                <div class="col-md-6">
                 <?php echo stripslashes($_POST['introd']);?>
                </div>
                
            </div>
        </div>
        <div class="col-md-2"></div>
        
        <div class="col-md-5">
        	<div class="row">
                <div class="col-md-12" style="background:#CCC; padding:4px;">
                    <strong>Company Contacts</strong>
                </div>
             </div>   
        </div>
    </div>
</div>
</body>
</html>