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

if( !$xoopsUser || !$xoopsUser->isAdmin($xoopsModule->mid()) )
{
	redirect_header('./', 2, _POPGEN_NOTACTIVE);
	exit();
}

$op = array(
                  'tpl'            => 0,
                  'cache'          => 0
                  );
include_once('include/op_retrieve.php');

if( $tpl || $cache ) {
          $tpl_infos   = $tpl?xoops_unlink_tpl_files( $tpl ):0;
          $cache_infos = $cache?xoops_unlink_cache_files( $cache ):0;

              $texte = $cache_infos?_POPGEN_ALRENEWEDCACHE:_POPGEN_ALRENEWEDTPL;
              $texte = $tpl_infos['count']?(($tpl_infos['count']?$tpl_infos['count']:_POPGEN_NONE) . _POPGEN_RENEWEDTPL . '<br /><br />' . $tpl_infos['list']):$texte;
              $texte = $cache_infos['count']?(($cache_infos['count']?$cache_infos['count']:_POPGEN_NON) . _POPGEN_RENEWEDTPL . '<br /><br />' . $cache_infos['list']):$texte;

               redirect_header(XOOPS_URL.'/modules/popgen/cacheman.php', 2, $texte );
              exit();
}





$current_mode = 'popgen_cacheman.html';

// Style sheet && Scripts
$tpl_name    = ereg_replace( '.html', '', $current_mode );
$mode        = ereg_replace( 'popgen_', '', $tpl_name );
// foreach( $xoopsModuleConfig['index_display_mode'] as $is_active ) { $xoopsTpl->assign('is_' . $is_active, 	1); }

// Metagen
include_once('include/metagen.php');

// Language defines
  	$item_lg_array = array(
                                'submit',
                                'modulecache',
                                'blockcache',
                                'templatecache',
                                'all',
                                'block',
                                'module',
                                'template'
                                 );

 	foreach ($item_lg_array as $item_lg) {
                 $xoopsTpl->assign('lg_' . $item_lg, 	constant( strtoupper('_'. $xoopsModule->dirname() . '_' . $item_lg) ));
	}



// Render Data




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

           $nav_buttons = array(
                                  'upload'         =>      'upload.php',
                                  'images'         =>      'index.php?mode=images',
                                  'medias'         =>      'index.php?mode=medias',
                                  'div'            =>      'div.php'
                       );

          if( $xoopsUser && $xoopsUser->isAdmin($xoopsModule->mid()) ) { $nav_buttons_admin = array('cacheman'       =>      'cacheman.php');
                                                                         $nav_buttons = array_merge( $nav_buttons, $nav_buttons_admin );}

          $nav  = popgen_create_admin_links( $nav_buttons,
                                             'cacheman.php', 2,
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

         $admin_settings = popgen_select_settings();
          }


// Render datas
    $installed_mods =& $module_handler->getObjects();
    $module_datas = array();
    foreach ( $installed_mods as $module ) {

      if(  $module->getVar('isactive') && ($module->getInfo('blocks') || $module->getVar('hasmain')) ) {

              $module_datas[$module->getVar('dirname')]['dirname'] = $module->getVar('dirname');
              $module_datas[$module->getVar('dirname')]['image']   = $module->getInfo('image');
              $module_datas[$module->getVar('dirname')]['name']    = $module->getVar('name', 'E');
              $module_datas[$module->getVar('dirname')]['hasmain'] = $module->getVar('hasmain')?1:0;
              $module_datas[$module->getVar('dirname')]['hasblock']= $module->getInfo('blocks')?1:0;

      }
    }


// Other values
  //      $myts =& MyTextSanitizer::getInstance();
  	$item_val_array = array( 
  	                         'module_datas'          =>          $module_datas,

  	                         'css_link'       => popgen_check_script_file( $tpl_name, 1, 'uploads/popgen/cache/', 'css' ),
                                 'script_link'    => popgen_check_script_file( $tpl_name, 1, 'uploads/popgen/cache/', 'js' ),

  	                         'banner'         => $banner,
  	                         'background'     => $xoopsModuleConfig['index_background']?'../../' . $xoopsModuleConfig['index_background']:'',
  	                         'nav'            => $nav,
  	                         'admin'          => $admin,
  	                         'mode'           => 'include/'.$current_mode,

                                 'admin_settings' => $admin_settings,
  	                         'texte'          => isset($xoopsModuleConfig['index_description'][3])?$myts->makeTareaData4Show( $xoopsModuleConfig['index_description'][3]):''
                                 );


 	foreach ($item_val_array as $item_lg=>$item_val) {
                 $xoopsTpl->assign($item_lg, 	$item_val );
	}

// Datas
include_once(XOOPS_ROOT_PATH."/footer.php");



















function xoops_unlink_tpl_files( $tpl=0 ) {
  Global $xoopsConfig;

  include XOOPS_ROOT_PATH."/class/xoopslists.php";
        $file_array  = XoopsLists :: getFileListAsArray( XOOPS_ROOT_PATH . '/templates_c' );
//$files['list'] .= '';
$files['count'] = 0; $files['list']='';
foreach( $file_array as $i=>$file_data ) {
         if( ereg($tpl, $file_data) && ereg($xoopsConfig['template_set'], $file_data) )   {
             unlink( XOOPS_ROOT_PATH . '/templates_c/'.$file_data );
             $files['list'] .= $file_data . '<br />';
             $files['count']++;
         }
}
Return $files;
}

                        
function xoops_unlink_cache_files( $cache=0, $template_set='defaut' ) {
  Global $xoopsConfig;
  include XOOPS_ROOT_PATH."/class/xoopslists.php";
        $file_array  = XoopsLists :: getFileListAsArray( XOOPS_ROOT_PATH . '/cache' );
//$files['list'] .= '';
$files['count'] = 0; $files['list']='';
foreach( $file_array as $i=>$file_data ) {
         if( ereg($cache, $file_data) && ereg($xoopsConfig['template_set'], $file_data) )   {
             unlink( XOOPS_ROOT_PATH . '/cache/'.$file_data );
             $files['list'] .= $file_data . '<br />';
             $files['count']++;
         }
}
Return $files;
}



?>