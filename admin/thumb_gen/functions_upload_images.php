<?php
/**
* XOOPS - PHP Content Management System
* Copyright (c) 2004 <http://www.xoops.org/>
*
* Module: thumb_gen 1.0
* Licence : GPL
* Authors :
*           - solo (http://www.wolfpackclan.com/wolfactory)
*			- DuGris (http://www.dugris.info)
*/

if (!defined("XOOPS_ROOT_PATH")) { die("XOOPS root path not defined"); }

$thumb_gen_allowed_image = array( 'gif'		=>	'image/gif',
                              'jpg'		=>	'image/jpeg',
                              'jpeg'	        =>	'image/pjpeg',
                              'png'		=>	'image/x-png',
                              'png'		=>	'image/png'
                              ) ;
/*
$thumb_gen_allowed_media = array( 'gif'		=>	'image/gif',
                              'jpg'		=>	'image/jpeg',
                              'jpeg'	        =>	'image/pjpeg',
                              'png'		=>	'image/x-png',
                              'png'		=>	'image/png',
                              
                              'aiff' 	        =>	'audio/aiff',
                              'mid'		=>	'audio/mid',
                              'mpg'		=>	'audio/mpeg',
                              'mpeg'	        =>	'audio/mpeg',
                              'wav'		=>	'audio/wav',
                              'vma'		=>	'audio/x-ms-wma',
                              'asf'		=>	'video/x-ms-asf',
                              'avi'		=>	'video/avi',
                              'wmv'		=>	'video/x-ms-wmv',
                              'vmx'		=>	'video/x-ms-wmx',
                              'mpeg'	        =>	'video/mpeg',
                              'mpg'		=>	'video/mpeg',
                              'mpe'		=>	'video/mpeg',
                              'qt'		=>	'video/quicktime',
                              'swf'		=>	'application/x-shockwave-flash',
                              'ra'		=>	'audio/vnd.rn-realaudio',
                              'ram'		=>	'audio/x-pn-realaudio',
                              'rm'		=>	'application/vnd.rn-realmedia',
                              'rv'		=>	'video/vnd.rn-realvideo'
                              );
*/

// function thumb_gen_uploading( $allowed_mimetypes, $httppostfiles, $redirecturl = "index.php", $num = 0, $dir = "uploads", $redirect = 0 ) {
function thumb_gen_uploading_image( $filename, $upload_dir, $maximgsize ) {
	include_once XOOPS_ROOT_PATH . "/class/uploader.php";
	global $thumb_gen_allowed_image, $error_uploading;

// 	$ext_fileup = thumb_gen_GetExtensionName( $filename['name'] );
        $ext_fileup = 'mage';

       	foreach( $thumb_gen_allowed_image as $type_image) {
		if ( strstr($type_image, $ext_fileup) ) {
			$allowed_mimetypes = $thumb_gen_allowed_image; 
		}
	}


	$image_size = explode('|', $maximgsize);
	$maxfilewidth = $image_size[0];
	$maxfileheight = $image_size[1];
	$maxfilesize = $image_size[2];
	$redirecturl = "index.php";
	$redirect = 0;     

	$uploader = new XoopsMediaUploader( $upload_dir, $allowed_mimetypes, $maxfilesize, $maxfilewidth, $maxfileheight );

	if ( $uploader -> fetchMedia( $filename ) ) {
		if ( !$uploader -> upload() ) {
		//	xoops_error('<font color="#000000">' . $uploader->getErrors() . '</font>');
			return( $uploader->getErrors() );
		} else {
			return( False );
		}
	} else {
	//	xoops_error('<font color="#000000">' . $uploader->getErrors() . '</font>');
		return( $uploader->getErrors() );
	} 
}

function thumb_genreturn_bytes($val) {
   $val = trim($val);
   $last = strtolower($val{strlen($val)-1});
   switch($last) {
       // Le modifieur 'G' est disponible depuis PHP 5.1.0
       case 'g':
           $val *= 1024;
       case 'm':
           $val *= 1024;
       case 'k':
           $val *= 1024;
   }

   return $val;
}
/*
function thumb_gen_GetExtensionName( $file, $dot=false) {
	if ($dot == true) {
		$ext = strtolower(substr($file, strrpos($file, '.')));
	} else {
    	        $ext = strtolower(substr($file, strrpos($file, '.') + 1));
    }
	return $ext;
}
*/

?>