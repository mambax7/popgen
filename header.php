<?php
//  ------------------------------------------------------------------------ 	//
//                XOOPS - PHP Content Management System    				//
//                    Copyright (c) 2004 XOOPS.org                       	//
//                       <http://www.xoops.org/>                              //
//                   										//
//                  Authors :									//
//						- solo (www.wolfpackclan.com)         	//
//                  popgen v2.0								//
//  ------------------------------------------------------------------------ 	//

include_once('../../mainfile.php');
include_once('admin/include/admin_functions.php');
include_once('../../class/xoopslists.php');
if( !function_exists('popgen_create_admin_links') ) { include('admin/include/admin_buttons.php'); }

$myts =& MyTextSanitizer::getInstance();

$uid = isset( $_GET['uid'] )?
              $_GET['uid']:
              ( $xoopsUser ?
              $xoopsUser->uid():
              'all');

$main_dir  = ereg_replace('{UID}/','', $xoopsModuleConfig['edit_dir']);
if( $xoopsUser ) {
$xoopsModuleConfig['edit_dir'] = ereg_replace('{UID}',$uid,$xoopsModuleConfig['edit_dir']);
} else {
$xoopsModuleConfig['edit_dir'] = ereg_replace('{UID}','all',$xoopsModuleConfig['edit_dir']);
}
if( !is_dir( '../../'.$xoopsModuleConfig['edit_dir'].'thumbs' ) ) { admin_create_dir( '../../'.$xoopsModuleConfig['edit_dir'].'thumbs' ); }
if( !is_dir( '../../'.$xoopsModuleConfig['edit_dir'].'images' ) ) { admin_create_dir( '../../'.$xoopsModuleConfig['edit_dir'].'images' ); }
if( !is_dir( '../../'.$xoopsModuleConfig['edit_dir'].'medias/orig' ) ) { admin_create_dir( '../../'.$xoopsModuleConfig['edit_dir'].'medias/orig' ); }
if( !is_dir( '../../'.$xoopsModuleConfig['edit_dir'].'div/orig' ) )    { admin_create_dir( '../../'.$xoopsModuleConfig['edit_dir'].'div/orig' ); }
if( !is_dir( '../../'.$xoopsModuleConfig['edit_dir'].'cache' ) )  { admin_create_dir( '../../'.$xoopsModuleConfig['edit_dir'].'cache' ); }

if( $xoopsModuleConfig['index_description'] ) { 
  $xoopsModuleConfig['index_description'] = explode('|', $xoopsModuleConfig['index_description']);
}  


?>