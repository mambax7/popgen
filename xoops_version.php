<?php

//  ------------------------------------------------------------------------ 	//
//                XOOPS - PHP Content Management System    			//
//                    Copyright (c) 2004 XOOPS.org                       	//
//                       <http://www.xoops.org/>                                //
//                   								//
//                  Authors :							//
//						- solo (www.wolfpackclan.com)   //
//                  Popgen v2.0						//
//  ------------------------------------------------------------------------ 	//

    Global $xoopsModule, $xoopsModuleConfig;

$modversion['name']        = _MI_POPGEN_NAME;
$modversion['version']     = 2.11;
$modversion['description'] = _MI_POPGEN_DSC;
$modversion['credits']     = "Comptoir des Médias (www.comptoir-des-medias.com)";
$modversion['author']      = "Solo";
$modversion['help']        = "";
$modversion['license']     = "GPL see LICENSE";
$modversion['official']    = 0;
$modversion['image']       = "images/popgen_slogo.png";
$modversion['dirname']     = "popgen";

$max=isset($xoopsModuleConfig['edit_num'])?$xoopsModuleConfig['edit_num']:4;

// Templates
$i=0;

// if( isset($module) ) {
include_once(XOOPS_ROOT_PATH . '/class/xoopslists.php' );
        $tpl_list = XoopsLists :: getHtmlListAsArray( XOOPS_ROOT_PATH . '/modules/popgen/templates/' );
      foreach($tpl_list as $ii=>$data) {

        if( $data != 'index.html' ) {
            $value = str_replace('.html','',$data);
            $value = str_replace($modversion['dirname'].'_','',$value);
            $file_name = @constant(strtoupper('_MI_EDITO_TPL_' . $value));
            $value = str_replace('_',' ',$value);
            $file  = $data;
            $name  = $file_name?$file_name:ucfirst($value);
        $modversion['templates'][$i]['file']      = $file;
        $modversion['templates'][$i++]['description'] = $name;
//        $options_tpl[$name] = $file;
       }
      }
      
        $tpl_list = XoopsLists :: getHtmlListAsArray( XOOPS_ROOT_PATH . '/modules/popgen/templates/include/' );
      foreach($tpl_list as $ii=>$data) {

        if( $data != 'index.html' ) {
            $value = str_replace('.html','',$data);
            $value = str_replace($modversion['dirname'].'_','',$value);
            $file_name = @constant(strtoupper('_MI_EDITO_TPL_' . $value));
            $value = str_replace('_',' ',$value);
            $file  = $data;
            $name  = $file_name?$file_name:ucfirst($value);
        $modversion['templates'][$i]['file']      = 'include/'.$file;
        $modversion['templates'][$i++]['description'] = $name;
        $options_tpl[$name] = $file;
       }
      }


//}
// Blocks
$max=1;
for($i;$i<=$max;$i++) {
$modversion['templates'][++$i]['file']      = 'blocks/popgen_block_'.$i.'.html';
$modversion['templates'][$i]['description'] = '';
}

// Admin
// Admin things
$i=0;
$modversion['hasAdmin']                     = 1;
$modversion['adminindex']                   = "admin/";
$modversion['adminmenu']                    = "admin/include/menu.php";

// Main
$modversion['hasMain'] = 1;


for($i=1;$i<=$max;$i++) {
  $modversion['blocks'][$i]['file']        = 'block.php';
  $modversion['blocks'][$i]['name']        = _MI_POPGEN_MENU . ' ' . $i;
  $modversion['blocks'][$i]['description'] = '';
  $modversion['blocks'][$i]['show_func']   = 'a_popgen_menu_show';
  $modversion['blocks'][$i]['edit_func']   = 'a_popgen_menu_edit';
  $modversion['blocks'][$i]['options']     = 'select|is_admin|';
  $modversion['blocks'][$i]['template']    = 'popgen_block_'.$i.'.html';
}


// Options
// User side settings
if ( $xoopsModule && $xoopsModule->getVar( 'dirname' ) == 'system' ) {
$i=0;
$modversion['config'][$i]['name']        = 'index_banner';
$modversion['config'][$i]['title']       = '_MI_POPGEN_BANNER';
$modversion['config'][$i]['description'] = '_MI_POPGEN_BANNERDSC';
$modversion['config'][$i]['help']        = '_MI_POPGEN_BANNERHLP';
$modversion['config'][$i]['formtype']    = 'textbox';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i++]['default']   = 'modules/popgen/images/popgen_banner.png';

$modversion['config'][$i]['name']        = 'index_background';
$modversion['config'][$i]['title']       = '_MI_POPGEN_BACKGROUND';
$modversion['config'][$i]['description'] = '_MI_POPGEN_BACKGROUNDDSC';
$modversion['config'][$i]['help']        = '_MI_POPGEN_BANNERHLP';
$modversion['config'][$i]['formtype']    = 'textbox';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i++]['default']   = 'modules/popgen/images/popgen_background.png';

            $options = array(  '_MI_POPGEN_INDEX'         =>     'index',
                               '_MI_POPGEN_ITEM'          =>     'item',
                               '_MI_POPGEN_SITEMAP'       =>     'sitemap'
                               );

$modversion['config'][$i]['name']         = 'index_description';
$modversion['config'][$i]['title']        = '_MI_POPGEN_DESC';
$modversion['config'][$i]['description']  = '_MI_POPGEN_DESCDSC';
$modversion['config'][$i]['help']         = '_MI_POPGEN_DESCHLP';
$modversion['config'][$i]['formtype']     = 'textarea';
$modversion['config'][$i]['valuetype']    = 'text';
$modversion['config'][$i++]['default']    = _MI_POPGEN_WELCOME;

$modversion['config'][$i]['name']         = 'index_defdesc';
$modversion['config'][$i]['title']        = '_MI_POPGEN_DDESC';
$modversion['config'][$i]['description']  = '_MI_POPGEN_DDESCDSC';
$modversion['config'][$i]['help']         = '_MI_POPGEN_DDESCHLP';
$modversion['config'][$i]['formtype']     = 'textarea';
$modversion['config'][$i]['valuetype']    = 'text';
$modversion['config'][$i++]['default']    = _MI_POPGEN_CLICK;

            $options = array(  '_MI_POPGEN_NONE'        =>     'none',
                               '_MI_POPGEN_URL'         =>     'url',
                               '_MI_POPGEN_CODE'        =>     'code',
                               '_MI_POPGEN_OPTIONS'     =>     'options'
                               );

$modversion['config'][$i]['name']         = 'index_display_mode';
$modversion['config'][$i]['title']        = '_MI_POPGEN_DISPLAY';
$modversion['config'][$i]['description']  = '_MI_POPGEN_DISPLAYDSC';
$modversion['config'][$i]['help']         = '_MI_POPGEN_DISPLAYHLP';
$modversion['config'][$i]['formtype']     = 'select_multi';
$modversion['config'][$i]['valuetype']    = 'array';
$modversion['config'][$i]['default']      = 'options';
$modversion['config'][$i++]['options']    = $options;

$modversion['config'][$i]['name']         = 'index_prefix';
$modversion['config'][$i]['title']        = '_MI_POPGEN_PREFIX';
$modversion['config'][$i]['description']  = '_MI_POPGEN_PREFIXDSC';
$modversion['config'][$i]['help']         = '_MI_POPGEN_PREFIXHLP';
$modversion['config'][$i]['formtype']     = 'yesno';
$modversion['config'][$i]['valuetype']    = 'int';
$modversion['config'][$i++]['default']    = 1;

$modversion['config'][$i]['name']         = 'index_mode';
$modversion['config'][$i]['title']        = '_MI_POPGEN_MODE';
$modversion['config'][$i]['description']  = '_MI_POPGEN_MODEDSC';
$modversion['config'][$i]['help']         = '_MI_POPGEN_MODEHLP';
$modversion['config'][$i]['formtype']     = 'select';
$modversion['config'][$i]['valuetype']    = 'text';
$modversion['config'][$i]['default']      = 'popgen_upload.html';
$modversion['config'][$i++]['options']    = isset($options_tpl)?$options_tpl:'';

$modversion['config'][$i]['name']         = 'edit_dir';
$modversion['config'][$i]['title']        = '_MI_POPGEN_DIR';
$modversion['config'][$i]['description']  = '_MI_POPGEN_DIRDSC';
$modversion['config'][$i]['help']         = '_MI_POPGEN_DIRHLP';
$modversion['config'][$i]['formtype']     = 'textbox';
$modversion['config'][$i]['valuetype']    = 'text';
$modversion['config'][$i++]['default']    = 'uploads/popgen/{UID}/';


$modversion['config'][$i]['name']         = 'edit_style';
$modversion['config'][$i]['title']        = '_MI_POPGEN_STYLE';
$modversion['config'][$i]['description']  = '_MI_POPGEN_STYLEDSC';
$modversion['config'][$i]['help']         = '_MI_POPGEN_STYLEHLP';
$modversion['config'][$i]['formtype']     = 'textbox';
$modversion['config'][$i]['valuetype']    = 'text';
$modversion['config'][$i++]['default']    = 'border:1px inset; padding:3px; margin: 3px;';

$modversion['config'][$i]['name']         = 'edit_image_options';
$modversion['config'][$i]['title']        = '_MI_POPGEN_IMGOPTIONS';
$modversion['config'][$i]['description']  = '_MI_POPGEN_IMGOPTIONSDSC';
$modversion['config'][$i]['help']         = '_MI_POPGEN_IMGOPTIONSHLP';
$modversion['config'][$i]['formtype']     = 'textarea';
$modversion['config'][$i]['valuetype']    = 'text';
$modversion['config'][$i++]['default']    = 'toolbar=0, scrollbars=0, status=0, resizable=0, fullscreen=0, titlebar=0';

$modversion['config'][$i]['name']         = 'edit_wmp_options';
$modversion['config'][$i]['title']        = '_MI_POPGEN_DEFAULT_WMP';
$modversion['config'][$i]['description']  = '_MI_POPGEN_DEFAULT_WMP_DSC';
$modversion['config'][$i]['formtype']     = 'textarea';
$modversion['config'][$i]['valuetype']    = 'text';
$modversion['config'][$i++]['default']    = 'AutoStart=1, Loop=1, ShowControls=1, ShowTracker=1, AnimationAtStart=1, TransparentAtStart=0, enableContextMenu=0, BufferingProgress=1, PreBuffer=1, VideoDelay=999, VideoBufferSize=9';

$modversion['config'][$i]['name']         = 'edit_qt_options';
$modversion['config'][$i]['title']        = '_MI_POPGEN_DEFAULT_QT';
$modversion['config'][$i]['description']  = '_MI_POPGEN_DEFAULT_QT_DSC';
$modversion['config'][$i]['formtype']     = 'textarea';
$modversion['config'][$i]['valuetype']    = 'text';
$modversion['config'][$i++]['default']    = 'autoStart=1, rate=1, balance=1, volume=100, enableContextMenu=1, bgcolor=#FF0000, invokeURLs=1, uiMode=1, windowlessVideo=1, scale=tofit';

$modversion['config'][$i]['name']         = 'edit_ram_options';
$modversion['config'][$i]['title']        = '_MI_POPGEN_DEFAULT_RAM';
$modversion['config'][$i]['description']  = '_MI_POPGEN_DEFAULT_RAM_DSC';
$modversion['config'][$i]['formtype']     = 'textarea';
$modversion['config'][$i]['valuetype']    = 'text';
$modversion['config'][$i++]['default']    = 'autostart=1, controls=all, console=one';

$modversion['config'][$i]['name']         = 'edit_flash_options';
$modversion['config'][$i]['title']        = '_MI_POPGEN_DEFAULT_FL';
$modversion['config'][$i]['description']  = '_MI_POPGEN_DEFAULT_FL_DSC';
$modversion['config'][$i]['formtype']     = 'textarea';
$modversion['config'][$i]['valuetype']    = 'text';
$modversion['config'][$i++]['default']    = 'play=1, loop=1, menu=1,
quality=low|autolow|high|autohigh,
bgcolor=#FF0000,
wmode=transparent|opaque|window,
scale=noscale|exactfit|noborder|showall,
align=left|right|top|bottom,
salign=left|rights|ttop|bottom|topleft|topright|bottomleft|bottomright';

$modversion['config'][$i]['name']         = 'edit_div_options';
$modversion['config'][$i]['title']        = '_MI_POPGEN_DEFAULT_DIV';
$modversion['config'][$i]['description']  = '_MI_POPGEN_DEFAULT_DIV_DSC';
$modversion['config'][$i]['formtype']     = 'textarea';
$modversion['config'][$i]['valuetype']    = 'text';
$modversion['config'][$i++]['default']    = '
overflow=auto,
width=300px,
height=210px,
align=center,
padding=6px,
margin=6px,
left=,
top=,
border_style=inset,
border_width=4px,
border_color=grey,
background_color=white,
background_repeat=no-repeat,
background_position=,
background_attachement=,
font_family=,
font_size=,
color=darkyellow,
font_style=italic,
font_variant=,
font_weight=,
text_align=left,
text_transform=,
text_decoration=,
text_indent=,
vertical_align=,
line_height=,
scrollbar_base_color=,
scrollbar_3dlight_color=,
scrollbar_arrow_color=,
scrollbar_darkshadow_color=,
scrollbar_face_color=,
scrollbar_highlight_color=,
scrollbar_shadow_color=,
scrollbar_track_color=';

            $options = array( '_MI_POPGEN_NONE'   => 0,
                              '_MI_POPGEN_LEFT'   => 'left',
                              '_MI_POPGEN_CENTER' => 'center',
                              '_MI_POPGEN_RIGHT'  => 'right'  );

$modversion['config'][$i]['name']        = 'edit_align';
$modversion['config'][$i]['title']       = '_MI_POPGEN_ALIGN';
$modversion['config'][$i]['description'] = '_MI_POPGEN_ALIGNDSC';
$modversion['config'][$i]['help']        = '_MI_POPGEN_ALIGNHLP';
$modversion['config'][$i]['formtype']    = 'select';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i]['options']     = $options;
$modversion['config'][$i++]['default']   = '';

    	$options = array( _MI_POPGEN_IMAGE   => 'image',
    	                  _MI_POPGEN_BUTTON  => 'button',
    	                  _MI_POPGEN_SELECT  => 'select',
    	                  _MI_POPGEN_TEXT    => 'text',
                              );
$modversion['config'][$i]['name']         = 'edit_button';
$modversion['config'][$i]['title']        = '_MI_POPGEN_BUTTONS';
$modversion['config'][$i]['description']  = '_MI_POPGEN_BUTTONSDSC';
$modversion['config'][$i]['help']         = '_MI_POPGEN_BUTTONSHLP';
$modversion['config'][$i]['formtype']     = 'select';
$modversion['config'][$i]['valuetype']    = 'text';
$modversion['config'][$i]['default']      = 'text';
$modversion['config'][$i++]['options']    = $options;

$modversion['config'][$i]['name']        = 'image_max_size';
$modversion['config'][$i]['title']       = '_MI_POPGEN_THUMBMW';
$modversion['config'][$i]['description'] = '_MI_POPGEN_THUMBMWDSC';
$modversion['config'][$i]['help']        = '_MI_POPGEN_THUMBMWHLP';
$modversion['config'][$i]['formtype']    = 'textbox';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i++]['default']   = '200|150|800|600';

            $options = array( '5'  => 5,
                              '8'  => 8,
                              '10' => 10,
                              '12' => 12,
                              '15' => 15,
                              '20' => 20,
                              '30' => 30,
                              '50' => 50,
                              '100'=> 100,
                              '_MI_POPGEN_ALL'=> 100000  );

$modversion['config'][$i]['name']        = 'image_perpage';
$modversion['config'][$i]['title']       = '_MI_POPGEN_PERPAGE';
$modversion['config'][$i]['description'] = '_MI_POPGEN_PERPAGEDSC';
$modversion['config'][$i]['help']        = '_MI_POPGEN_PERPAGEHLP';
$modversion['config'][$i]['formtype']    = 'select';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i]['options']      = $options;
$modversion['config'][$i++]['default']     = '12';

$modversion['config'][$i]['name']        = 'image_thumb_color';
$modversion['config'][$i]['title']       = '_MI_POPGEN_COLOR';
$modversion['config'][$i]['description'] = '_MI_POPGEN_COLORDSC';
$modversion['config'][$i]['help']        = '_MI_POPGEN_COLORHLP';
$modversion['config'][$i]['formtype']    = 'color';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i++]['default']   = '#FFFFFF';

            $options = array( '1' => 1,
                              '2' => 2,
                              '3' => 3,
                              '4' => 4,
                              '5' => 5  );

$modversion['config'][$i]['name']        = 'image_cols';
$modversion['config'][$i]['title']       = '_MI_POPGEN_COLS';
$modversion['config'][$i]['description'] = '_MI_POPGEN_COLSDSC';
$modversion['config'][$i]['help']        = '_MI_POPGEN_COLSHLP';
$modversion['config'][$i]['formtype']    = 'select';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i]['options']      = $options;
$modversion['config'][$i++]['default']     = '4';

// Meta settings
$modversion['config'][$i]['name']         = 'meta_keywords';
$modversion['config'][$i]['title']        = '_MI_POPGEN_METAKEYWORD';
$modversion['config'][$i]['description']  = '_MI_POPGEN_METAKEYWORDDSC';
$modversion['config'][$i]['help']         = '_MI_POPGEN_METAKEYWORDHLP';
$modversion['config'][$i]['formtype']     = 'textarea';
$modversion['config'][$i]['valuetype']    = 'text';
$modversion['config'][$i++]['default']    = _MI_POPGEN_METAKEYWORDS;

$modversion['config'][$i]['name']         = 'meta_description';
$modversion['config'][$i]['title']        = '_MI_POPGEN_METADESC';
$modversion['config'][$i]['description']  = '_MI_POPGEN_METADESCDSC';
$modversion['config'][$i]['help']         = '_MI_POPGEN_METADESCHLP';
$modversion['config'][$i]['formtype']     = 'textarea';
$modversion['config'][$i]['valuetype']    = 'text';
$modversion['config'][$i++]['default']    = _MI_POPGEN_METADESCRIPTION;

}
?>