<?php
 ini_set("display_errors","0");
 ini_set("session.cookie_httponly",1); 
 $url="http://";
 $url.= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 $urlregex = "^(http?|ftp)\:\/\/([a-z0-9+!*(),;?&=\$_.-]+(\:[a-z0-9+!*(),;?&=\$_.-]+)?@)?[a-z0-9+\$_-]+(\.[a-z0-9+\$_-]+)*(\:[0-9]{2,5})?(\/([a-z0-9+\$_-]\.?)+)*\/?(\?[a-z+&\$_.-][a-z0-9;:@/&=+\$_.-]*)?(#[a-z_.-][a-z0-9+\$_.-]*)?\$";

if (!preg_match($urlregex,$url)) 
{ } 
else 
{ 
		ob_start();
		session_start();
		unset($_SESSION['nonce']);
		unset($_SESSION['user_id']);
		unset($_SESSION['user_name']);

		unset($_SESSION['HTTP_USER_AGENT']);
		unset($_SESSION['token_time']);
		session_unset();
		
		$_SESSION['nonce'] = "";
		$_SESSION['user_id'] = "";
		$_SESSION['user_name'] = "";
		$_SESSION['HTTP_USER_AGENT'] = "";
		$_SESSION['token_time'] = "";
		session_destroy(); 
		echo "<script>alert('Invalid Access');window.location='../pageerror.html';</script>";
		//header("location: ../index.php");
?>
<?php  
 exit(); 
 } 

if (isset($_SESSION['HTTP_USER_AGENT']))
{
    if ($_SESSION['HTTP_USER_AGENT'] != md5($_SERVER['HTTP_USER_AGENT']))
    {
        logout();
        exit;
    }
}
 //global $db;

function isstr($string)
{
	if (preg_match('/[^-(),/_.@. 0-9A-Za-z]/', $string)) {
		return true;
	} else {
		return false;
	}
 }

 function isValidMd5($md5)
{
    return !empty($md5) && preg_match('/^[a-f0-9]{32}$/', $md5);
}
 
function isnum($abc)
{
	if (preg_match('/[^0-9]/', $abc)) {
		return true;
	} else {
		return false;
	}
 }
 function alphanum($alpha)
{
	if (preg_match('/^[a-z\d]{1,100}$/i', $alpha)) {
		return true;
	} else {
		return false;
	}
 }	
  function isalpha($alpha)
{ 
	if (preg_match('/^[a-z\_,.()]+$/i', $alpha)) {
		return true;
	} else {
		return false;
	}
 }	

$validation_type = 1;

if($validation_type == 1)
{
	$mime = array('image/gif' => 'gif',
                  'image/jpeg' => 'jpeg',
				  'image/jpg' => 'jpg',
                  'image/png' => 'png',
                  'application/x-shockwave-flash' => 'swf',
                  'image/psd' => 'psd',
                  'image/bmp' => 'bmp',
                  'image/tiff' => 'tiff',
                  'image/tiff' => 'tiff',
                  'image/jp2' => 'jp2',
                  'image/iff' => 'iff',
                  'image/vnd.wap.wbmp' => 'bmp',
                  'image/xbm' => 'xbm',
                 'image/vnd.microsoft.icon' => 'ico');
}
else if($validation_type == 2) // Second choice? Set the extensions
{
	$image_extensions_allowed = array('jpg', 'jpeg', 'png', 'gif','bmp','pdf');
 }
 

 ?>