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
$xoopsOption['template_main'] = 'popgen_index.html';
include_once(XOOPS_ROOT_PATH . '/header.php');


$op = array(
                  'description'     => _POPGEN_DEF_CONTENT,
                  'type'            => '',
                  'image'           => '',
                  'uid'             => $uid,
                  'filenav'         => 0,
                  'id'               => 0
                  );
include_once('include/op_retrieve.php');


$current_mode = 'popgen_div.html';

// Style sheet && Scripts
$tpl_name    = ereg_replace( '.html', '', $current_mode );
$mode        = ereg_replace( 'popgen_', '', $tpl_name );
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
                                'style',
                                'description',
                                'see',
                                'copy',
                                'options',

                                'divmode',
                                'fieldsetmode',
                                'stylesheetmode',

                                'auto',
                                'visible',
                                'hidden',
                                'dotted',
                                'dashed',
                                'solid',
                                'double',
                                'groove',
                                'ridge',
                                'inset',
                                'outset',

                                'size',
                                'borders',
                                'background',
                                'scrollbar',
                                'content',

                                'absolute',
                                'relative',

                                'scroll',
                                'fixed',

                                'norepeat',
                                'x',
                                'y',
                                'repeat',

                                'top',
                                'middle',
                                'bottom',

                                'stylesheetmode',
                                'fieldsetmode',
                                'divmode',

                                'font',
                                'italic',
                                'small_caps',
                                'bold',
                                'justify',
                                'lowercase',
                                'capitalize',
                                'uppercase',
                                'overline',
                                'line_through',
                                'underline',
                                'blink',
                                'under_overline',

                                'files'
                                 );

 	foreach ($item_lg_array as $item_lg) {
                 $xoopsTpl->assign('lg_' . $item_lg, 	constant( strtoupper('_'. $xoopsModule->dirname() . '_' . $item_lg) ));
	}


/*                                'overflow',
                                'width',
                                'height',
                                'top',
                                'left',
                                'margin',
                                'padding',
                                'border_style',
                                'border_width',
                                'border_color',
                                'font_family',
                                'font_size',
                                'font_style',
                                'font_variant',
                                'font_weight',
                                'text_align',
                                'text_transform',
                                'text_decoration',
                                'text_indent',
                                'vertical_align',
                                'line_height',
                                'background',
                                'background-color',
                                'background-position',
                                'background-repeat',
                                'background_attachement',
                                'scrollbar',
                                'scrollbar_base_color',
                                'scrollbar_3dlight_color',
                                'scrollbar_arrow_color',
                                'scrollbar_darkshadow_color',
                                'scrollbar_face_color',
                                'scrollbar_highlight_color',
                                'scrollbar_shadow_color',
                                'scrollbar_track_color',
                                
                                */

// Render Data

if( $type != 'is_div' && (!isset($class_name) || !$class_name) ) {
  include_once('include/functions_randomizer.php');
  $class_name = popgen_word_generator(); 
  } else { $class_name = ''; }

$xoopsModuleConfig['edit_div_options'] = explode(',',$xoopsModuleConfig['edit_div_options']);
$values = array();
foreach( $xoopsModuleConfig['edit_div_options'] as $div_options ) {
         $div_option = explode( '=', $div_options);
         $name  = trim($div_option[0]);
         $value = trim($div_option[1]);
         $$name  = $value;
}

$values = array(
                  'id'          => $id,
                  'class_name'  => $class_name,
                  'overflow'    => isset($overflow)?$overflow:'',
                  'width'       => isset($width)?$width:'',
                  'height'      => isset($height)?$height:'',
                  'align'       => isset($align)?$align:'',
                  'padding'     => isset($padding)?$padding:'',
                  'margin'      => isset($margin)?$margin:'',
                  'left'        => isset($left)?$left:'',
                  'top'         => isset($top)?$top:'',

                  'border_style'          => isset($border_style)?$border_style:'',
                  'border_width'          => isset($border_width)?$border_width:'',
                  'border_color'          => isset($border_color)?$border_color:'',

                  'file'                  => $image,
                  'background'            => $xoopsModuleConfig['edit_dir'] . 'div/',
                  'background_color'      => isset($background_color)?$background_color:'',
                  'background_repeat'     => isset($background_repeat)?$background_repeat:'',
                  'background_position'   => isset($background_position)?$background_position:'',
                  'background_attachement'=> isset($background_attachement)?$background_attachement:'',
                  
                  'font_family'           => isset($font_family)?$font_family:'',
                  'font_size'             => isset($font_size)?$font_size:'',
                  'color'                 => isset($color)?$color:'',
                  'font_style'            => isset($font_style)?$font_style:'',
                  'font_variant'          => isset($font_variant)?$font_variant:'',
                  'font_weight'           => isset($font_weight)?$font_weight:'',
                  
                  'text_align'            => isset($text_align)?$text_align:'',
                  'text_transform'        => isset($text_transform)?$text_transform:'',
                  'text_decoration'       => isset($text_decoration)?$text_decoration:'',
                  'text_indent'           => isset($text_indent)?$text_indent:'',
                  'vertical_align'        => isset($vertical_align)?$vertical_align:'',
                  'line_height'           => isset($line_height)?$line_height:'',

                  'scrollbar_base_color'         => isset($scrollbar_base_color)?$scrollbar_base_color:'',
                  'scrollbar_3dlight_color'      => isset($scrollbar_3dlight_color)?$scrollbar_3dlight_color:'',
                  'scrollbar_arrow_color'        => isset($scrollbar_arrow_color)?$scrollbar_arrow_color:'',
                  'scrollbar_darkshadow_color'   => isset($scrollbar_darkshadow_color)?$scrollbar_darkshadow_color:'',
                  'scrollbar_face_color'         => isset($scrollbar_face_color)?$scrollbar_face_color:'',
                  'scrollbar_highlight_color'    => isset($scrollbar_highlight_color)?$scrollbar_highlight_color:'',
                  'scrollbar_shadow_color'       => isset($scrollbar_shadow_color)?$scrollbar_shadow_color:'',
                  'scrollbar_track_color'        => isset($scrollbar_track_color)?$scrollbar_track_color:''
                  );



$css = ''; $datas = '';
foreach($values as $css_name=>$css_value) {

                  if (!isset($_POST[$css_name])) {
                     $$css_name = isset($_GET[$css_name]) ? $_GET[$css_name] : $css_value;
                  } else {
                      $$css_name = $_POST[$css_name];
                  }

                  // Description
                  if( $$css_name  ) {

                    $name =  str_replace('_', '-', $css_name);
                    if( ereg('_num',$css_name) ) { $num = $$css_name; } else { $num = ''; }
                    if( $css_name == 'file' ) {  $file = $$css_name; }
                    if( $css_name == 'background'  && $file ) {
                        $$css_name = popgen_clean_url( $$css_name );
                        $xoops_url = eregi('http',$$css_name)?'':XOOPS_URL.'/';
                        $css .= $name .":url('".$xoops_url.$$css_name.$file."');";
                        } elseif( $css_name != 'align' && $css_name != 'file' && $css_name != 'background' ) {
                        $css .= $name .':'.$num.$$css_name.'; '; }
                  }

//                 $datas .= $css_name.'~'.$$css_name.'|';

                  $name =  str_replace('scrollbar_', '', $css_name);
                  $name =  str_replace('background_', '', $name);
                  $name =  str_replace('_', ' ', $name);
                  $name_v =  str_replace(' ', '_', $$css_name);
                  $xoopsTpl->assign('n_'.$css_name, 		ucfirst( $name ).'<br />');
                  $xoopsTpl->assign('v_'.$css_name, 		$$css_name);
//                  $value_display .= $css_name .'=' . $$css_name.',
//                  <br />';
                  // Select boxes
                    $name_v = ereg_replace('-', '_', $name_v);
                  if( $$css_name ) {
                         $xoopsTpl->assign('s_'.$css_name.'_'.$name_v,            " selected");   
                  } else {
                         $xoopsTpl->assign('s_'.$css_name.'_'.$name_v,            "");
                         }
}

// echo $value_display;



// Retrive file list
      $file_list = XoopsLists :: getImgListAsArray( XOOPS_ROOT_PATH . '/' . $background );
      rsort($file_list);
      
      
// Multiple pages
        $num_file_list = count($file_list);
        $file_nav=0;
//        $xoopsModuleConfig['image_perpage'] = $xoopsModuleConfig['image_perpage']*2;
if( $num_file_list    > $xoopsModuleConfig['image_perpage'] ) {
        include_once (XOOPS_ROOT_PATH . '/class/pagenav.php');
        $file_nav = new XoopsPageNav( $num_file_list, $xoopsModuleConfig['image_perpage'], $filenav, 'uid='.$uid.'&filenav' );
        $file_nav = $file_nav -> renderNav();
        $file_list = $file_list?array_slice($file_list, $filenav, $xoopsModuleConfig['image_perpage'] ):'';
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
                                             'div.php', 2,
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




  

if(  $type == 'is_fieldset' ) { $style = 'fieldset'; 
                                $xoopsTpl->assign('s_fieldset',      " selected");
} elseif( $type == 'is_css' ) { $style = 'div';
                                $xoopsTpl->assign('s_css',           " selected");
} else {                        $style = 'div';
                                $xoopsTpl->assign('s_div',           " selected"); }
$class_name_web = ereg_replace(' ', '_', strtolower($class_name));

$code = '';

if( $align == 'relative' || $align == 'absolute' ) { $css .= 'position:'.$align.';
'; }
if( $type == 'is_css' ) {
      $code  .= '
      <style type="text/css">
      '.$style.' .'.$class_name_web.' { '. $css . ' }
      </style>

      ';
      $code_alt  = '
      <'.$style.' class="'.$class_name_web.'">
';
} else {
      $code_alt  = '
      <'.$style.' style="'.$css.'">
    ';
}


if( $align && $align != 'relative' ) { $code .= '
    <div align="'.$align.'">'; }
$code .= $code_alt;
if( $type == 'is_fieldset' ) { $code .= '
    <legend style="border:'.$border_width.' '.$border_style.' '.$border_color.';background-color:'.$background_color.';padding:'.$padding.';font-weight:bold;font-style:normal;text-indent:0px;">
                   '.ucfirst($class_name).'
    </legend>

'; }


$end  = '
      </'.$style.'>';
if( $align ) { $end .= '
    </div>'; }

$description_content = $description;
$code_display = $code . $myts->makeTareaData4Show( ereg_replace('{id}', $id, $description) ) . $end;
$code_copy    = $myts->makeTareaData4Edit($code . $description_content . $end);


// Other values
  //      $myts =& MyTextSanitizer::getInstance();
  	$item_val_array = array( 


  	                         'style'          =>          '',
  	                         'description'    =>          $description_content,
                                 'file_list'      =>          $file_list,
                                 'code_display'   =>          $code_display,
                                 'code_copy'      =>          $code_copy,
                                 'file'           =>          $file,

  	                         'css_link'       => popgen_check_script_file( $tpl_name, 1, 'uploads/popgen/cache/', 'css' ),
                                 'script_link'    => popgen_check_script_file( $tpl_name, 1, 'uploads/popgen/cache/', 'js' ),

  	                         'banner'         => $banner,
  	                         'background'     => $xoopsModuleConfig['index_background']?'../../' . $xoopsModuleConfig['index_background']:'',
  	                         'nav'            => $nav,
  	                         'admin'          => $admin,
  	                         'mode'           => 'include/'.$current_mode,
  	                         'filenum'       => ($filenav+$xoopsModuleConfig['image_perpage'])<=$num_file_list?$filenav+$xoopsModuleConfig['image_perpage']:$num_file_list,
  	                         'filetotal'      => $num_file_list,
  	                         'filenav'        => $file_nav,
                                 'admin_settings' => $admin_settings,
  	                         'texte'          => isset($xoopsModuleConfig['index_description'][2])?$myts->makeTareaData4Show( $xoopsModuleConfig['index_description'][2]):$myts->makeTareaData4Show($xoopsModuleConfig['index_description'])
                                 );


 	foreach ($item_val_array as $item_lg=>$item_val) {
                 $xoopsTpl->assign($item_lg, 	$item_val );
	}
	
// Datas
include_once(XOOPS_ROOT_PATH."/footer.php");
?>