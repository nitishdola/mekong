<?php
ob_start();
session_start();
include("../include/globalIncWeb.php");
ini_set("display_errors",0);
$url="http://";
$url.= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
$urlregex = "^(http?|ftp)\:\/\/([a-z0-9+!*(),;?&=\$_.-]+(\:[a-z0-9+!*(),;?&=\$_.-]+)?@)?[a-z0-9+\$_-]+(\.[a-z0-9+\$_-]+)*(\:[0-9]{2,5})?(\/([a-z0-9+\$_-]\.?)+)*\/?(\?[a-z+&\$_.-][a-z0-9;:@/&=+\$_.-]*)?(#[a-z_.-][a-z0-9+\$_.-]*)?\$";
if (!preg_match($urlregex,$url)) { } 
else 
{ 
		echo "<script>window.location='../pageerror.html';</script>";
}
if($_SESSION['user_id'] == "")
	header("location: login.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<style>
.btn {
  background: #3465d9;
  background-image: -webkit-linear-gradient(top, #3465d9, #2c56b8);
  background-image: -moz-linear-gradient(top, #3465d9, #2c56b8);
  background-image: -ms-linear-gradient(top, #3465d9, #2c56b8);
  background-image: -o-linear-gradient(top, #3465d9, #2c56b8);
  background-image: linear-gradient(to bottom, #3465d9, #2c56b8);
  -webkit-border-radius: 12;
  -moz-border-radius: 12;
  border-radius: 12px;
  font-family: Georgia;
  color: #ffffff;
  font-size: 16px;
  padding: 6px 14px 6px 14px;
  text-decoration: none;
}

.btn:hover {
  background: #3cb0fd;
  background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
  background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
  text-decoration: none;
  cursor:pointer;
}

.ta4 {
	background-image: url(images/bg.png);
	border: 1px solid #6297BC;
	width: 440px;
	height: 160px;
}
  .loadingOverlay {
    display:    none;
    position:   fixed;
    z-index:    1000;
    top:        0;
    left:       0;
    height:     100%;
    width:      100%;
    background: rgba( 255, 255, 255, .8 ) 
                url('images/loader_seq.gif') 
                50% 50%
                no-repeat;
}

</style>
<script src="js/jquery.min.js"></script>
<script>
 $(document).on("click",".btn", function () {
     var id=<?php echo base64_decode($_GET['dataID']);?>;
	 var remark = $('#txtRemark').val();
	 if(remark=="")
	 {
		 $('#ms').html("Please enter the remarks");
		 return false;
	 }
	 else
	 {
		 $(".loadingOverlay").show();
      $.ajax({
            type: 'post',
            url: "send_revision.php",
            data: {
              //table:'tbl_content',
              id:id,
			  remark:remark, 
            },
            success: function(data) 
			{	 
					    $("#fm").hide();
						 $("#ms").html(data);
				 		 window.parent.location.reload();
						 $(".loadingOverlay").hide();
            }
        });
	 }
    return true;
   });

   </script>   

</head>

<body>
<div class="loadingOverlay" style="display:none"></div>
<div id="fm">
<h4>Revision Remarks</h4>
<textarea class="ta4" id="txtRemark"></textarea>
<input type="button" value="Send Request" class="btn">
</div>
<span id="ms" style="font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif; color:#000; font-size:12px;"></span>
</body>
</html>