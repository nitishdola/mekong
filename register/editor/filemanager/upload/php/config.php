<?php

global $Config ;

// SECURITY: You must explicitelly enable this "uploader".
$Config['Enabled'] = true ;

// Set if the file type must be considere in the target path.
// Ex: /userfiles/image/ or /userfiles/file/
$Config['UseFileType'] = true ;

// Path to uploaded files relative to the document root.
$Config['UserFilesPath'] = '/userfiles/' ;

// Fill the following value it you prefer to specify the absolute path for the
// user files directory. Usefull if you are using a virtual directory, symbolic
// link or alias. Examples: 'C:\\MySite\\userfiles\\' or '/root/mysite/userfiles/'.
// Attention: The above 'UserFilesPath' must point to the same directory.
$Config['UserFilesAbsolutePath'] = '' ;

// Due to security issues with Apache modules, it is reccomended to leave the
// following setting enabled.
$Config['ForceSingleExtension'] = true ;

$Config['AllowedExtensions']['File']	= array() ;
$Config['DeniedExtensions']['File']		= array('html','htm','php','php2','php3','php4','php5','phtml','pwml','inc','asp','aspx','ascx','jsp','cfm','cfc','pl','bat','exe','com','dll','vbs','js','reg','cgi','htaccess','asis','sh','shtml','shtm','phtm') ;

$Config['AllowedExtensions']['Image']	= array('jpg','gif','jpeg','png') ;
$Config['DeniedExtensions']['Image']	= array() ;

$Config['AllowedExtensions']['Flash']	= array('swf','fla') ;
$Config['DeniedExtensions']['Flash']	= array() ;

?>