<?php
//  ------------------------------------------------------------------------ 	//
//                XOOPS - PHP Content Management System    				//
//                    Copyright (c) 2004 XOOPS.org                       	//
//                       <http://www.xoops.org/>                              //
//                   										//
//                  Authors :									//
//						- solo (www.wolfpackclan.com)         	//
//                  Popgen v2.0								//
//  ------------------------------------------------------------------------ 	//

// General settings
include_once('header.php');

/* ----------------------------------------------------------------------- */
/*                    Redirect index to a specific page                    */
/* ----------------------------------------------------------------------- */

include_once('include/functions_common.php');
// $settings = popgen_group_access();
//            $xoopsModuleConfig['redir_search']?popgen_referer_search():'';
// $mode     = $xoopsModuleConfig['index_mode']?$xoopsModuleConfig['index_mode']:'popgen_image.html';
$xoopsOption['template_main'] = 'popgen_index.html';
include_once(XOOPS_ROOT_PATH . '/header.php');
$image_max_size = explode('|', $xoopsModuleConfig['image_max_size']);
$op = array(
                    'op'             =>      '',
                    'uid'            =>      $uid,
                    'dir'            =>      'images',
                    'image_name'     =>      '',
                    'random_name'    =>      '',
                    'thumb_width'    =>      isset($image_max_size[0])?$image_max_size[0]:'',
                    'thumb_height'   =>      isset($image_max_size[1])?$image_max_size[1]:'',
                    'image_width'    =>      isset($image_max_size[2])?$image_max_size[2]:'',
                    'image_height'   =>      isset($image_max_size[3])?$image_max_size[3]:''
                    );
include_once('include/op_retrieve.php');


$image_dir = XOOPS_ROOT_PATH . '/' . $xoopsModuleConfig['edit_dir'] . $dir;
$thumb_dir = XOOPS_ROOT_PATH . '/' . $xoopsModuleConfig['edit_dir'] . 'thumbs';
$images_weight = 800000;
$images_width  = 4096;
$images_height = 4096;
$allowed_mimetype = array('image/gif', 'image/jpeg', 'image/pjpeg', 'image/x-png', 'image/png');


    if ( $op == 'addfile' ) {
 //       include_once (XOOPS_ROOT_PATH.'/class/mimetypes.inc.php');
        include_once (XOOPS_ROOT_PATH.'/class/uploader.php');
        $uploader = new XoopsMediaUploader($image_dir, $allowed_mimetype, $images_weight, $images_width, $images_height );
        $err = array();
        $ucount = count($_POST['xoops_upload_file']);
      for ($i = 0; $i < $ucount; $i++) {
            if ($uploader->fetchMedia($_POST['xoops_upload_file'][$i])) {

                if( $random_name ) {
                  $image_name = $xoopsModuleConfig['index_prefix']?date("Y-m-d") . '_' . $image_name:$image_name;
                  $uploader->setPrefix( $image_name );
                } elseif( $image_name ) {
                  $file_name = explode('.', $uploader->getMediaName() );
                  $image_name = $image_name . '.'.$file_name[1];
                  $image_name = popgen_convert( $image_name );
                  $image_name = $xoopsModuleConfig['index_prefix']?date("Y-m-d") . '_' .  $image_name:$image_name;
                  $uploader->setTargetFileName( $image_name );
                } else {
                  $image_name = popgen_convert( $uploader->getMediaName() );
                  $image_name = $xoopsModuleConfig['index_prefix']?date("Y-m-d") . '_' . $image_name:$image_name;
                  $uploader->setTargetFileName( $image_name );
                }

                if( file_exists($image_dir . '/' . $image_name) ) { $replaced = 1;  }

                if (!$uploader->upload()) {
                    $err[] = $uploader->getErrors();
                } else {
                    $avt_handler =& xoops_gethandler('image');
                    $image =& $avt_handler->create();

                    if (!$avt_handler->insert($image)) {
                        $err[] = sprintf(_FAILSAVEIMG, $image->getVar('image_name'));
                    }
                }
            } else {
                $err[] = sprintf(_FAILFETCHIMG, $i);
                $err = array_merge($err, $uploader->getErrors(false));
            }
        }
        
// Resize File
        if (count($err) > 0) {
            $message = xoops_error($err);
            redirect_header('upload.php', 2, $message);
//            exit();
        } elseif( $dir == 'images' ) {
            $image_file = $image_dir . '/' . $image_name;
            $thumb_file = $thumb_dir . '/' . $image_name;
            popgen_resizePicture( $image_file, $thumb_file, $thumb_width, $thumb_height, true);
            popgen_resizePicture( $image_file, $image_file, $image_width, $image_height, true);
            $message = isset($replaced)?_POPGEN_UPDATED:_POPGEN_UPLOADED;
        } else { 
            $message = isset($replaced)?_POPGEN_UPDATED:_POPGEN_UPLOADED;
        }
$red_dir = $dir=='images'?'image':'media';
$red_dir = $dir=='div'?'div':$red_dir;
$redirect = $dir=='div'?
            $dir.'.php?image='.$image_name:
            'index.php?mode='.$dir.'&uid='.$uid.'&'.$red_dir.'='.$image_name.'&thumb='.$image_name.'&width='.$thumb_width.'&height='.$thumb_height;

        redirect_header($redirect,2, $message);
    }
    
    
    
    
    
    

    
    
    



// Style sheet && Scripts
$current_mode = 'popgen_upload.html';
$tpl_name     = ereg_replace( '.html', '', $current_mode );
$mode         = ereg_replace( 'popgen_', '', $tpl_name );
// Metagen
include_once('include/metagen.php');

// Language defines
  	$item_lg_array = array(
                                 'medias',
                                 'images',
                                 'thumbs',
                                 'submit',
                                 'size',
                                 'align',
                                 'left',
                                 'center',
                                 'right',
                                 'options',
                                 'style',
                                 'description',
                                 'see',
                                 'copy'
                                 );

 	foreach ($item_lg_array as $item_lg) {
                 $xoopsTpl->assign('lg_' . $item_lg, 	constant( strtoupper('_'. $xoopsModule->dirname() . '_' . $item_lg) ));
	}

// Module Banner
if ( eregi('.swf', $xoopsModuleConfig['index_banner']) ) {
	$banner = '<object
    			classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
                        codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/ swflash.cab#version=6,0,40,0" ;=""
                        height="60"
                        width="468">
                <param  name="movie"
                value="' . trim($xoopsModuleConfig['index_banner']) . '">
                <param name="quality" value="high">
                <embed src="' . trim($xoopsModuleConfig['index_banner']) . '"
                quality="high"
                pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" ;=""
                type="application/x-shockwave-flash"
                height="60"
                width="468">
                </object>';
} elseif ( $xoopsModuleConfig['index_banner'] ) {
	$banner = '
                   <img src="../../'.trim($xoopsModuleConfig['index_banner']).'"
                        alt="'.$xoopsModule -> getVar('name').'" />
                  ';
} else {
	$banner = '';
}

// Module navigation

                        $uid_display_01 = $uid?'?uid='.$uid:'';
                        $uid_display_02 = $uid?'&uid='.$uid:'';
           $nav_buttons = array(
                                  'upload'         =>      'upload.php'            . $uid_display_01,
                                  'images'         =>      'index.php?mode=images' . $uid_display_02,
                                  'medias'         =>      'index.php?mode=medias' . $uid_display_02,
                                  'div'            =>      'div.php'               . $uid_display_01
                       );

          if( $xoopsUser && $xoopsUser->isAdmin($xoopsModule->mid()) ) { $nav_buttons_admin = array('cacheman'       =>      'cacheman.php');
                                                                         $nav_buttons = array_merge( $nav_buttons, $nav_buttons_admin );}
          $nav  = popgen_create_admin_links( $nav_buttons,
                                             'upload.php', 2,
                                             'images/icon/',
                                             '.png',
                                             $xoopsModuleConfig['edit_button'],
                                             '64' );


// Admin buttons
$admin=''; $admin_settings='';
if( $xoopsUser && $xoopsUser->isAdmin($xoopsModule->mid()) ) {
          $admin_buttons = array(
                                  'settings'       =>      'admin/index.php?admin=settings',
                                  'images'         =>      'admin/index.php?admin=images',
                                  'templates'      =>      'admin/index.php?admin=templates',
                                  'blocks'         =>      'admin/index.php?admin=blocks',
                                  'utils'          =>      'admin/index.php?admin=utils',
                                  'help'           =>      'admin/index.php?admin=help'
                       );

          $admin  = popgen_create_admin_links( $admin_buttons,
                                               0, 2,
                                               'images/icon/',
                                               '.png',
                                               $xoopsModuleConfig['edit_button'],
                                               '48' );

  	  $dir_array = XoopsLists :: getDirListAsArray(XOOPS_ROOT_PATH . '/' . $main_dir);
   	  $dir_array = array_filter($dir_array, "is_numeric");
   	  $user_array=array( _POSTANON => '?uid=all' );
          foreach( $dir_array as $user_id ) {
                   $user_array[XoopsUser::getUnameFromId($user_id)] = '?uid='.$user_id;
          }
   	  $nav  .= popgen_create_admin_links( $user_array,
                                               '?uid='.$uid, 2,
                                               'images/icon/',
                                               '.png',
                                               'select',
                                               '48', 'none' );

         $admin_settings = popgen_select_settings();
          }

// Form
        include_once XOOPS_ROOT_PATH.'/class/xoopsformloader.php';
        $form = new XoopsThemeForm(_POPGEN_IMAGES, 'image_form', 'upload.php?uid='.$uid, "post", true);
        $form->setExtra('enctype="multipart/form-data"');
        $form->addElement(new XoopsFormFile(_IMAGEFILE, 'image_file', 500000));
        $form->addElement(new XoopsFormText(_IMAGENAME, 'image_name', 50, 255), false);
        $form->addElement(new XoopsFormRadioYN(_POPGEN_RANDNAME, 'random_name', 0, _YES, _NO));

//        $form->insertBreak(_POPGEN_DIR . ' : [' . $xoopsModuleConfig['edit_dir'] . ']', 'head');
        $form_dir = new XoopsFormRadio(_POPGEN_DIR . ' : [' . $xoopsModuleConfig['edit_dir'] . ']', 'dir', $dir);
	$form_dir->addOption('images', _POPGEN_IMAGES . '  ' );
	$form_dir->addOption('medias', _POPGEN_MEDIAS . '  ' );
	$form_dir->addOption('div',    _POPGEN_DIV );
	$form->addElement($form_dir, true);

        $form->insertBreak(_POPGEN_OPTIONS . ' ' . _POPGEN_THUMBS, 'head');
        $form->addElement(new XoopsFormText(_POPGEN_THUMBWIDTH, 'thumb_width', 5, 5, $thumb_width), false);
        $form->addElement(new XoopsFormText(_POPGEN_THUMBHEIGHT, 'thumb_height', 5, 5, $thumb_height), false);

        $form->insertBreak(_POPGEN_OPTIONS . ' ' . _POPGEN_IMAGES, 'head');
        $form->addElement(new XoopsFormText(_POPGEN_IMAGEWIDTH, 'image_width', 5, 5, $image_width), false);
        $form->addElement(new XoopsFormText(_POPGEN_IMAGEHEIGHT, 'image_height', 5, 5, $image_height), false);

        $form->addElement(new XoopsFormHidden('op', 'addfile'));
        $form->addElement(new XoopsFormHidden('uid',$uid));
        $form->addElement(new XoopsFormButton('', 'img_button', _SUBMIT, 'submit'));


// Other values

  	$item_val_array = array(
                                 'upload'         =>  $form->render(),

  	                         'banner'         => $banner,
  	                         'background'     => $xoopsModuleConfig['index_background']?'../../' . $xoopsModuleConfig['index_background']:'',
  	                         'nav'            => $nav,
  	                         'admin'          => $admin,
  	                         'mode'           => 'include/'.$current_mode,
                                 'admin_settings' => $admin_settings,
  	                         'texte'          => isset($xoopsModuleConfig['index_description'][0])?$myts->makeTareaData4Show( $xoopsModuleConfig['index_description'][0] ):$myts->makeTareaData4Show( $xoopsModuleConfig['index_description'] )
                                 );


 	foreach ($item_val_array as $item_lg=>$item_val) {
                 $xoopsTpl->assign($item_lg, 	$item_val );
	}
	
// Datas
include_once(XOOPS_ROOT_PATH."/footer.php");




























function popgen_convert( $file_name ) {

   $file_name = ereg_replace(' ', '_', $file_name);
   $file_name = strtolower( $file_name );
   $file_name = strtr($file_name, 'àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ\'"',
                                  'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY--');

   Return $file_name;

}

?>