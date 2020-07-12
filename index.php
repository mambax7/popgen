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
$op = array(        'mode'           =>      '',
                    'uid'            =>      $uid,
                    'type'           =>      '',
                    'image'          =>      '',
                    'multi_image'    =>      '',
                    'thumb'          =>      '',
                    'media'          =>      '',
                    'media_url'      =>      '',
                    'thumb_dir'      =>      $xoopsModuleConfig['edit_dir'] . 'thumbs/',
                    'image_dir'      =>      $xoopsModuleConfig['edit_dir'] . 'images/',
                    'media_dir'      =>      $xoopsModuleConfig['edit_dir'] . 'medias/',
                    'description'    =>      $xoopsModuleConfig['index_defdesc'],
                    'options'        =>      '',
                    'style'          =>      $xoopsModuleConfig['edit_style'],
                    'width'          =>      $image_max_size[0],
                    'height'         =>      $image_max_size[1],
                    'align'          =>      $xoopsModuleConfig['edit_align'],
                    'cols'           =>      $xoopsModuleConfig['image_cols'],
                    'thumbnav'       =>      0,
                    'imagenav'       =>      0
                    );
include_once('include/op_retrieve.php');

$current_mode = $mode?'popgen_'.$mode.'.html':$xoopsModuleConfig['index_mode'];


// Style sheet && Scripts
$tpl_name    = ereg_replace( '.html', '', $current_mode );
$mode        = ereg_replace( 'popgen_', '', $tpl_name );

if( $mode == 'upload' || $mode == 'div' ) {
                header ('location: '.$mode.'.php');
		exit(); }

foreach( $xoopsModuleConfig['index_display_mode'] as $is_active ) { $xoopsTpl->assign('is_' . $is_active, 	1); }
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
                                 'copy', 
                                 'copy_url',
                                 'url',
                                 'multi',
                                 'media_url',
                                 'cols'
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
                                             $mode, 2,
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
   	  $user_array=array( _POSTANON => 'index.php?mode='.$mode.'&uid=all' );
          foreach( $dir_array as $user_id ) {
                   $user_array[XoopsUser::getUnameFromId($user_id)] = 'index.php?mode='.$mode.'&uid='.$user_id;
          }
   	  $nav  .= popgen_create_admin_links(  $user_array,
                                               'index.php?mode='.$mode.'&uid='.$uid, 2,
                                               'images/icon/',
                                               '.png',
                                               'select',
                                               '48', 'none' );

         $admin_settings = popgen_select_settings();
          }
$thumb_dir = popgen_clean_url( $thumb_dir );
$image_dir = popgen_clean_url( $image_dir );
$media_dir = popgen_clean_url( $media_dir );
// Retrive file list
if( $mode == 'images' ) {

      $media_list = '';
      $thumb_list = is_dir( XOOPS_ROOT_PATH . '/' . $thumb_dir ) ? XoopsLists :: getImgListAsArray( XOOPS_ROOT_PATH . '/' . $thumb_dir ) : array();
      $image_list = is_dir( XOOPS_ROOT_PATH . '/' . $image_dir ) ? XoopsLists :: getImgListAsArray( XOOPS_ROOT_PATH . '/' . $image_dir ) : array();

      rsort($thumb_list);
      rsort($image_list);

      if( $thumb_list!=$image_list ) {
        popgen_make_thumbs($thumb_list, $image_list, XOOPS_ROOT_PATH . '/' . $thumb_dir , XOOPS_ROOT_PATH . '/' . $image_dir);
        $thumb_list = is_dir( XOOPS_ROOT_PATH . '/' . $thumb_dir ) ? XoopsLists :: getImgListAsArray( XOOPS_ROOT_PATH . '/' . $thumb_dir ) : array();
        rsort($thumb_list);
      }


      if( isset($thumb_list[0]) ) {
      $thumb = $thumb?$thumb:$thumb_list[0];
      $image = $image?$image:(isset($multi_image[0])?$multi_image[0]:$image_list[0]);
      }

      $thumb_url = $thumb_dir . $thumb;
      $image_url = XOOPS_URL . '/' . $image_dir . $image;
      
} elseif( $mode == 'medias' ) {

      $media_list = XoopsLists :: getFileListAsArray( XOOPS_ROOT_PATH . '/' . $media_dir );
      $thumb_list = '';
      $image_list = '';

      rsort($media_list);

      $media = $media?$media:$media_list[0];
      $thumb_url = '';
      $image = $media;
      $image_url = $media_url?$media_url:XOOPS_URL . '/' . $media_dir . $image;
      $media_url = $media_url?$media_url:'';
}



// Render Data
$num_thumb_list =0; $num_image_list=0; $num_image=0; $num_thumb=0; $image_nav=0;
if( isset($image_list[0]) || isset($media_list[0]) ) {
include_once('include/functions_popgen.php');

// Which kind of media?
$media_type = popgen_media_type ( $image_url, 'avi' );

     // http://streaming.newmedia.lu/cita
$opt_type = 'edit_'.$media_type.'_options';
$options = $options?$options:$xoopsModuleConfig[$opt_type];



// Size and options
$height_data = $height?', height='.$height.' ':'';
$width_data  = $width?', width='.$width.' ':'';
$option      = $options . ', align='.$align . $height_data . $width_data;





// Multiple pages
        $num_image_list = $image_list ? count($image_list) : count($media_list);
        $num_thumb_list = $thumb_list ? count($thumb_list) : '';
//        $xoopsModuleConfig['image_perpage'] = $xoopsModuleConfig['image_perpage']*2;
if( $num_image_list    > $xoopsModuleConfig['image_perpage'] ||
    count($media_list) > $xoopsModuleConfig['image_perpage'] || 
    $num_thumb_list    > $xoopsModuleConfig['image_perpage']) {

        include_once (XOOPS_ROOT_PATH . '/class/pagenav.php');

        $image_nav = new XoopsPageNav( $num_image_list, $xoopsModuleConfig['image_perpage'], $imagenav, 'mode='.$mode.'&uid='.$uid.'&thumbnav='.$thumbnav.'&imagenav' );
        $thumb_nav = new XoopsPageNav( $num_thumb_list, $xoopsModuleConfig['image_perpage'], $thumbnav, 'mode='.$mode.'&uid='.$uid.'&imagenav='.$imagenav.'&thumbnav' );

        $image_nav = $image_nav -> renderNav();
        $thumb_nav = $thumb_nav -> renderNav();
        
        $image_list = $image_list?array_slice($image_list, $imagenav, $xoopsModuleConfig['image_perpage'] ):'';
        $thumb_list = $thumb_list?array_slice($thumb_list, $thumbnav, $xoopsModuleConfig['image_perpage'] ):'';
        $media_list = $media_list?array_slice($media_list, $imagenav, $xoopsModuleConfig['image_perpage'] ):'';
}





// Render result
$result = ''; $multi_images = ''; $thumb_urls = ''; $image_urls = ''; $i=0;
if ( count($multi_image)>1) {
  
  $result .= $cols?'<table><tr>':'';


    foreach( $multi_image as $image ) {
      $thumb_url = XOOPS_URL . '/' . $thumb_dir . $image;
    $code = popgen_media( XOOPS_URL . '/' . $image_dir . $image,
                          $thumb_url,
                          $option,
                          $description,
                          $cols?'':$style, $media_type );
    if( (++$i>$cols || $cols==1) && $cols ) {
        $result .= '</tr><tr>';
        $i=1;
    }
    $result .= $cols?'<td width="'.round(100/$cols).'%" style="'.$style.'">':'';
    $result .= $code['data'];
    $result .= $cols?'</td>':'<br />';
    $multi_images .= $image . '|';
    $thumb_urls .= XOOPS_URL . '/' . $thumb_dir . $image . '
';
    $image_urls .= XOOPS_URL . '/' . $image_dir . $image . '
';
    }
        $ii = $i>0?$cols-$i:0;
        for( $ii; $ii>=0; --$ii ) { $result .= $ii?'<td width="'.round(100/$cols).'%">&nbsp;</td>':''; }
  $result .= $cols?'</tr></table>':'';

} elseif( count($multi_image) ) {

    $thumb_url = $thumb_url?XOOPS_URL.'/'.$thumb_url:$image_url;
    $code = popgen_media( $image_url,
                          $thumb_url,
                          $option,
                          $description,
                          $style, 'avi' );
    $result = $code['data'];
    $multi_images = $image;
    $thumb_urls .= XOOPS_URL . '/' . $thumb_dir . $image . '
';
    $image_urls .= $image_url . '
';

}
}


// Other values
  //      $myts =& MyTextSanitizer::getInstance();
  	$item_val_array = array(
                                 'result'         =>          isset($result)?$result:'',

                                 'thumb_list'     =>          isset($thumb_list)?$thumb_list:'',
                                 'image_list'     =>          isset($image_list)?$image_list:'',
                                 'media_list'     =>          isset($media_list)?$media_list:'',

                                 'thumb_dir'      =>          $thumb_dir,
  	                         'image_dir'      =>          $image_dir,
  	                         'media_dir'      =>          $media_dir,

                                 'thumb_url'      =>          isset($thumb_urls)?$thumb_urls:'',
  	                         'image_url'      =>          isset($image_urls)?$image_urls:'',
  	                         'media_url'      =>          isset($media_url)?$media_url:'',

  	                         'media'          =>          $media,
  	                         'media_type'     =>          isset($media_type)?$media_type:'',
  	                         'image'          =>          $image,
  	                         'multi_image'    =>          isset($multi_images)?$multi_images:'',
  	                         'thumb'          =>          $thumb,
  	                         'align'          =>          $align,
  	                         'width'          =>          $width,
  	                         'height'         =>          $height,
  	                         'options'        =>          $options,
  	                         'style'          =>          $style,
  	                         'cols'           =>          $cols,
  	                         'description'    =>          $description,

  	                         'css_link'       => popgen_check_script_file( $tpl_name, 1, 'uploads/popgen/cache/', 'css' ),
                                 'script_link'    => popgen_check_script_file( $tpl_name, 1, 'uploads/popgen/cache/', 'js' ),

  	                         'banner'         => $banner,
  	                         'background'     => $xoopsModuleConfig['index_background']?'../../' . $xoopsModuleConfig['index_background']:'',
  	                         'texte'          => isset($xoopsModuleConfig['index_description'][1])?
                                                     $myts->makeTareaData4Show( $xoopsModuleConfig['index_description'][1] ):
                                                     $myts->makeTareaData4Show( $xoopsModuleConfig['index_description'] ),
  	                         'nav'            => $nav,

  	                         'thumbnum'       => ($thumbnav+$xoopsModuleConfig['image_perpage'])<=$num_thumb_list?$thumbnav+$xoopsModuleConfig['image_perpage']:$num_thumb_list,
  	                         'thumbtotal'          => isset($num_thumb_list)?$num_thumb_list:'',
  	                         'thumbnav'            => isset($thumb_nav)?$thumb_nav:'',
  	                         'imagenum'       => ($imagenav+$xoopsModuleConfig['image_perpage'])<=$num_image_list?$imagenav+$xoopsModuleConfig['image_perpage']:$num_image_list,
  	                         'imagetotal'          => $num_image_list,
  	                         'imagenav'            => $image_nav,

  	                         'admin'          => $admin,
  	                         'mode'           => 'include/'.$current_mode,
                                 'admin_settings' => $admin_settings
                                 );


 	foreach ($item_val_array as $item_lg=>$item_val) {
                 $xoopsTpl->assign($item_lg, 	$item_val );
	}
	
// Datas
include_once(XOOPS_ROOT_PATH."/footer.php");
?>