<?php
#################################################################################################################
#                                                                                                               #
#  Admin manager for Xoops 2.0.x	                                                                        #
#  						                                                                #
#  © 2007, Solo ( wolfactory.wolfpackclan.com )                                                                 #
#  Special thanks to Hervé and DuGris for their suggestions     	                                        #
#  Licence : GPL 	         		                                                                #
#                                                                                                               #
#################################################################################################################


include_once ("include/admin_header.php");
include_once ("include/admin_functions.php");

$main_dir = ereg_replace('{UID}/','', $xoopsModuleConfig['edit_dir']);
if( !is_dir( '../../../'.$main_dir.'cache' ) )  { admin_create_dir( '../../../'.$main_dir.'cache' ); }

$anonymous_dir = ereg_replace('{UID}','all',$xoopsModuleConfig['edit_dir']);
if( !is_dir( '../../../'.$anonymous_dir.'thumbs' ) ) { admin_create_dir( '../../../'.$anonymous_dir.'thumbs' ); }
if( !is_dir( '../../../'.$anonymous_dir.'images' ) ) { admin_create_dir( '../../../'.$anonymous_dir.'images' ); }
if( !is_dir( '../../../'.$anonymous_dir.'medias' ) ) { admin_create_dir( '../../../'.$anonymous_dir.'medias/orig' ); }
if( !is_dir( '../../../'.$anonymous_dir.'div' ) )    { admin_create_dir( '../../../'.$anonymous_dir.'div/orig' ); }

$xoopsModuleConfig['edit_dir'] = ereg_replace('{UID}',$xoopsUser->uid(),$xoopsModuleConfig['edit_dir']);
if( !is_dir( '../../../'.$xoopsModuleConfig['edit_dir'].'thumbs' ) ) { admin_create_dir( '../../../'.$xoopsModuleConfig['edit_dir'].'thumbs' ); }
if( !is_dir( '../../../'.$xoopsModuleConfig['edit_dir'].'images' ) ) { admin_create_dir( '../../../'.$xoopsModuleConfig['edit_dir'].'images' ); }
if( !is_dir( '../../../'.$xoopsModuleConfig['edit_dir'].'medias/orig' ) ) { admin_create_dir( '../../../'.$xoopsModuleConfig['edit_dir'].'medias/orig' ); }
if( !is_dir( '../../../'.$xoopsModuleConfig['edit_dir'].'div/orig' ) )    { admin_create_dir( '../../../'.$xoopsModuleConfig['edit_dir'].'div/orig' ); }

$def_menu = '?admin='.$admin;

// Select operation
          $op = isset($_GET['op']) ? $_GET['op'] : '';
          $op = isset($_POST['op']) ? $_POST['op'] : $op;

      if( $op!='update'
        &&$op!='post'
        &&$op!='delete'
        &&$op!='dup'
        &&$op!='status'
        &&$op!='save'
        &&$op!=_MD_POPGEN_UPLOAD
        &&$op!=_MD_POPGEN_DELETE
        &&$op!=_MD_POPGEN_UPDATE ) {

          xoops_cp_header();

          echo admin_menu($admin, $admin.'DSC', 0);

          }
          if( $admin=='index' ) {
           // echo '<h1 style="text-align:center;">' . $xoopsModule -> getVar('name') . '</h1>';
             $def_menu = 'index.php?admin=home';
             include('home.php');
             } else {
             file_exists($admin.'.php')?include($admin.'.php'):$error='<h1 style="text-align:center;">'._MODULENOEXIST.'</h1>';
             echo isset($error)?$error:'';
          }
          echo '<p />';
          echo admin_footer();
       xoops_cp_footer();

?>