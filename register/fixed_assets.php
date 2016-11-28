<?php
session_start();
include("../include/globalIncWeb.php");
$data_id = $_SESSION['data_id'];
//echo $session_id = $_SESSION['id']."==========================";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script src="js/jquery.min.js"></script>
<script src="js/jquery.wallform.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript" src="../highslide/highslide-with-gallery.js"></script>
<link rel="stylesheet" type="text/css" href="../highslide/highslide.css" />
<script type="text/javascript">
	hs.graphicsDir = '../highslide/graphics/';
	hs.align = 'center';
	hs.transitions = ['expand', 'crossfade'];
	hs.fadeInOut = true;
	hs.dimmingOpacity = 0.8;
	hs.outlineType = 'rounded-white';
	hs.captionEval = 'this.thumb.alt';
	hs.marginBottom = 105 // make room for the thumbstrip and the controls
	hs.numberPosition = 'caption';

	// Add the slideshow providing the controlbar and the thumbstrip
	hs.addSlideshow({
		//slideshowGroup: 'group1',
		interval: 5000,
		repeat: false,
		useControls: true,
		overlayOptions: {
			className: 'text-controls',
			position: 'bottom center',
			relativeTo: 'viewport',
			offsetY: -60

		},
		thumbstrip: {
			position: 'bottom center',
			mode: 'horizontal',
			relativeTo: 'viewport'
		}
	});
</script>

<script>
 $(document).ready(function() { 
		
            $('#photoimg').die('click').live('change', function()			{ 
			           //$("#preview").html('');
			    
				$("#imageform").ajaxForm({target: '#preview', 
				     beforeSubmit:function(){ 
					
					console.log('ttest');
					$("#imageloadstatus").show();
					 $("#imageloadbutton").hide();
					 }, 
					success:function(){ 
				    console.log('test');
					 $("#imageloadstatus").hide();
					 $("#imageloadbutton").show();
					}, 
					error:function(){ 
					console.log('xtest');
					 $("#imageloadstatus").hide();
					$("#imageloadbutton").show();
					} }).submit();
					
		
			});
        }); 
</script>

<script>
 $(document).on("click","a#xx", function () {
// alert("xxxxxxxx");
 var id=$(this).attr("data-id");
  
	alert(id);
   $.ajax({
            type: 'post',
            url: "fixed_assetDel.php",
            data: {
              id:id,
            },
            success: function(data) {
			//alert(data);
			  if(jQuery.trim(data)=="success")
			    {
               	 	document.getElementById(id).style.display = "none";
				}
			 // document.getElementById('disp_time').innerHTML = data;
            }
        });
    return true;
   });

//});

   </script>
   
<script>
 $(document).on("click","a#up", function () {
// alert("xxxxxxxx");
 var id=$(this).attr("data-id");
 var c = "cap"+id;
 //var cap = "txtCaption"+id;
 var caption = $('input[name="txtCaption'+id+'"]').val();
 //alert(caption);
   $.ajax({
            type: 'post',
            url: "updateEmployeeCaption.php",
            data: {
              id:id,
			  caption: caption,
            },
            success: function(data) {
			alert(data);
			
			 // document.getElementById('disp_time').innerHTML = data;
            }
        });
    return true;
   });

//});

   </script>

<style>
#preview
{
color:#cc0000;
font-size:12px
}
.imgList 
{
max-height:70px;
margin-left:5px;
border:1px solid #dedede;
padding:4px;	
float:left;	
}
.ln{
font-family:Arial, Helvetica, sans-serif;
color:#FF0000;
font-size:12px;
text-decoration:none;
}

.aI{
background-color: #C0C0C0;padding:3px;font-family:georgia;font-size:11px; color:#fff; text-decoration:none; border-radious:3px;
}

.style1 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
}
</style>

</head>

<body>

        <div class="col-md-12">
            <div class="row">
            	<?php
				$sql = "select * from tbl_img where status='1' and data_id='".$data_id."' and category='fixed_asset'";
				if($cn == false)
				connect3db();
				$res = mysql_query($sql);
				if(mysql_num_rows($res))
				{
				while($row = mysql_fetch_array($res))
				{
				?>
                <div class="col-md-2" style="max-width:110px; float:left" id="div<?php echo $row['id'];?>">
               <a href="images/fixed_asset/<?php echo $row['file_name'];?>" class="highslide"  onclick="return hs.expand(this)"> <img src="images/fixed_asset/<?php echo $row['file_name'];?>" style="max-width:100%; height:100%; border:2px solid #000;" /></a><br />
				 <?php echo $row['caption'];?><br />
                <a href="javascript:void(0)" data-id="<?php echo $row['id'];?>" id="delPic<?php echo $row['id'];?>"><img src="images/del.png" /></a>  
                <script>
 				$(document).on("click","a#delPic<?php echo $row['id'];?>", function () {
				 var id=$(this).attr("data-id");
  				 $.ajax({
					type: 'post',
					url: "imgdel.php",
					data: {
					  id:id,
					},
           		 success: function(data) {
				  if(jQuery.trim(data)=="success")
					{
						$("#div<?php echo $row['id'];?>").hide();
					}
            	}
        		});
    		return true;
   			});
   			</script>
            </div>
                <?php } } ?>
            </div>
        </div>

<form id="imageform" class="form-horizontal" action="fixed_assetImgUplaod.php" method="post" enctype="multipart/form-data">
<br />
<div id='imageloadbutton'><span class="style1">Click on the browse button to upload photos</span><input type="file" name="photos[]" id="photoimg" multiple="true" /><span id="c"></span>
</div>
<div id='imageloadstatus' style='display:none'><img src="loader.gif" alt="Uploading...."/></div>
<br />
<div id='preview'></div>

</form>

</body>
</html>
