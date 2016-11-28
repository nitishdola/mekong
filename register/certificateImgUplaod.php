<?php
error_reporting(0);
session_start();
$session_id = $_SESSION['user_id'];
$data_id = $_SESSION['data_id'];
include("../include/globalIncWeb.php");
define ("MAX_SIZE","100000"); 
function getExtension($str)
{
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
}


$valid_formats = array("jpg", "png", "gif", "bmp","jpeg");
if(!isset($_POST['submit1'])=="Confirm") 
{
	
    $uploaddir = "images/certificate/"; //a directory inside
    foreach ($_FILES['photos']['name'] as $name => $value)
    {
	
        $filename = stripslashes($_FILES['photos']['name'][$name]);
        $size=filesize($_FILES['photos']['tmp_name'][$name]);
        //get the extension of the file in a lower case format
          $ext = getExtension($filename);
          $ext = strtolower($ext);
     	
         if(in_array($ext,$valid_formats))
         {
	       if ($size < (MAX_SIZE*1024))
	       {
		   $image_name=time().$filename;
		   //echo "<img src='".$uploaddir.$image_name."' class='imgList'>";
		   echo "<div id='$image_name' style='margin-top:30px'>";
		   echo "<img src='".$uploaddir.$image_name."' class='imgList' id='".$uploaddir.$image_name."'>";
		  
		   //echo "<div style='clear:both'></div>";
		    echo "<div style='margin-left:20px;'> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<font color='#000' face='arial' size='2'>Certificate</font> <input type='text' name='txtCaption$image_name' id='txtCaption$image_name'>
			<a href='javascript:void(0)' class='aI' id='up' data-id='".$image_name."'>Save</a>
			</div>";
			 echo "<div style='clear:both'></div>";
			  echo "<div id='cap$image_name' style='font-family:arial;font-size:11px; color:green'></div>";
			   echo "<a href='javascript: void(0)' class='imgList' id='xx' data-id='".$image_name."' style='font-family:verdana; font-size:12px; color:#ff0000; text-decoration:none'>Delete</a><br/>";
		   echo "</div>";
		   
		  
		   //echo "<input type='text' name='t1[]' value='".$uploaddir.$image_name."'>";
		   $newname=$uploaddir.$image_name;
           
           if (move_uploaded_file($_FILES['photos']['tmp_name'][$name], $newname)) 
           {
		   $sl = GenerateIds(id,tbl_img);
	       $time=time();
		   if($cn == false)
			connect3db();
		   $sq = "INSERT INTO tbl_img(id,data_id,file_name,status,category) VALUES($sl,$data_id,'$image_name','0','certificate')";
	       mysql_query($sq);
	       }
	       else
	       {
	        echo '<span class="imgList">You have exceeded the size limit! so moving unsuccessful! </span>';
            }

	       }
		   else
		   {
			echo '<span class="imgList">You have exceeded the size limit!</span>';
          
	       }
       
          }
          else
         { 
	     	echo '<span class="imgList">Unknown extension!</span>';
           
	     }
           
     }
}
?>