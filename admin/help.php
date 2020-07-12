<?php
/**
* Module: Admin
* Licence : GPL
* Authors :
*           - solo (http://www.wolfpackclan.com)
*/

//////////////////////////////////////////////////////////////////////////////////////////////////////
// Sort settings variables tabs in alphabetical order/////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////
// Options ///////////////////////////////////////////////////////////////////////////////////////////

   $display_help      = 0;        // Set to 0 to hide the help menu and instructions.
   $def_menu          = 'tab';    // Set 'tab' or 'select'.
   $def_sub           = 'All';       // Default sub menu.
   $menu_select_max   = 10;       // How many menus before switching to the 'select' mode
   $menu_select_multi = 20;       // How many menus before switching to the 'multi-select' mode.
   $xoops_cp_header   = 0;        // Use or not the xoops_cp_header function. Depends on the modules

//////////////////////////////////////////////////////////////////////////////////////////////////////
// If not, respect the xoops_version.php variable order///////////////////////////////////////////////

   $alpha_sort=0;

//////////////////////////////////////////////////////////////////////////////////////////////////////
// Custom Tab colors//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////
// Set tabs colors from left to right.////////////////////////////////////////////////////////////////

   $colors = array( 'Gold|PaleGoldenRod' );

//  If none is set, default color is set. ////////////////////////////////////////////////////////////

    $default_color = 'LightGrey|WhiteSmoke';

// For more informations about color names, see http://www.w3schools.com/html/html_colornames.asp/////
//////////////////////////////////////////////////////////////////////////////////////////////////////




$ops = array( 'sub' =>  'main' );
include_once('include/admin_op_retrieve.php');

echo helps_sub_menu( $sub );
$sub = 'help/'.$sub.'.php';
file_exists($sub)?include($sub):$error='<h1 style="text-align:center;">'._MODULENOEXIST.'</h1>';
echo isset($error)?$error:'';









 // Functiont to detect the various helps files
function helps_menu_list( $dir='.') {

  $rep=opendir($dir);
  $i=0;

while ( $files = readdir($rep) ){

  if( is_file($dir.'/'.$files) && $files!='index.php' && $files!='index.html' && $files!='menu.php' ) {
            $file     = str_replace('.php','',$files);
            $file_name = admin_define( $file );
            $file_dsc  = admin_define( $file.'dsc' );

            $adminmenu[$i]['title'] = $file_name;
            $adminmenu[$i]['dsc']   = $file_dsc;
            $adminmenu[$i++]['link']= $file;
        }
}
         closedir();
         asort($adminmenu);

  Return $adminmenu;
 }



// Functiont to detect the various settings' variables
function helps_sub_menu_list() {
 Global $xoopsModule, $xoopsConfig, $xoopsModuleConfig, $alpha_sort, $colors, $default_color, $display_help, $def_sub;

$i=0;
// Default : General préférences
 /*
           $sub_menu[$i]['title']   = _PREFERENCES;
           $sub_menu[$i]['link']    = $def_sub?'?admin=settings&sub=All':'?admin=settings';
           $sub_menu[$i]['cat']     = '_';
           $sub_menu[$i]['color']   = isset($colors[$i])?$colors[$i]:$default_color;
*/

// Create category list
$cat_liste='';
$sub_menu_list = helps_menu_list('help/');
$alpha_sort?ksort($sub_menu_list,SORT_STRING):'';
foreach( $sub_menu_list as $sub_menu_list ) {
           $sub_menu[++$i]['title'] = $sub_menu_list['title'];
           $sub_menu[$i]['link']    = '?admin=help&sub='.$sub_menu_list['link'] . '" title="' . $sub_menu_list['dsc'] . '"';
           $sub_menu[$i]['cat']     = $sub_menu_list['title'];
           $sub_menu[$i]['color']   = isset($colors[$i])?$colors[$i]:$default_color;
           $cat_liste .='|'.$sub_menu_list['title'];
  }
  if($display_help) {
           $sub_menu[++$i]['title'] = 'Help';
           $sub_menu[$i]['link']    = '?admin=settings&sub=Help';
           $sub_menu[$i]['cat']     = '_';
           $sub_menu[$i]['color']   = 'Salmon|LightSalmon ';
  }

  Return $sub_menu;
 }



// Function to  generate tabs and selectlist
function helps_sub_menu( $currentoption='' ) {
	global $xoopsConfig, $xoopsModule, $menu, $menu_select_max, $menu_select_multi;
	$sub_menu = helps_sub_menu_list();
        $menu = count($sub_menu)>=$menu_select_max  ? 'select'   :$menu;
        $size = count($sub_menu)>=$menu_select_multi? 'size="5"' :'';
    switch ( $menu )
    {
    case ('tab'):
    Default:

    $ret = '
             <style type="text/css">
              #subbar { text-align:center; font-size: 10px; line-height:normal; margin-left: 10%; margin-bottom: 0px; }
              #subbar ul { margin:0; margin-top: 0px; padding:0px; list-style:none;}
              #subbar li { display:inline; margin:0px; padding:0px;}
              #subbar a  { float:left; baCkground-color: #DDE; margin:0; padding: 5px;
                           text-align: center; text-decoration:none;
                           border: 2px outset #000000; white-space: nowrap; }
              #subbar a span { display:block; white-space: nowrap; }
           /* Commented Backslash Hack hides rule from IE5-Mac \*/
              #subbar a span { float:none; }
           /* End IE5-Mac hack */
              #subbar #current a      { background-color: Beige; border: 2px inset Lightgrey; }
              #subbar #current a span { background-color: Beige; color:#333; }
              ';


            $previous['color']='';
    
          foreach( $sub_menu as $submenu ) {
            $submenu['color'] = explode('|',$submenu['color']);
            $submenu['color'][1] = isset($submenu['color'][1])?$submenu['color'][1]:$submenu['color'][0];
            $color = '
                      #subbar #'.$submenu['color'][0].' a      { background-color: '.$submenu['color'][0].'; border: 2px outset '.$submenu['color'][0].'; }
                      #subbar #'.$submenu['color'][0].' a span { background-color: '.$submenu['color'][0].'; color:#333; }
                      #subbar #'.$submenu['color'][0].' a:hover { background-position:0% -150px; background-color: '.$submenu['color'][1].'; }
                      #subbar #'.$submenu['color'][0].' a:hover span { color:#333; background-position:100% -150px; background-color: '.$submenu['color'][1].'; }
          ';
            $ret.= $submenu['color'][0]==$previous['color']?'':$color;
            $previous['color']=$submenu['color'][0];
          }
            $ret.= '</style>
            ';
            $ret.= '<div id="subbar"><ul>
            ';
          foreach( $sub_menu as $submenu ) {
                $submenu['color'] = explode('|',$submenu['color']);
                $tblColors = eregi( $currentoption?$currentoption:'', $submenu['link'] )?'current':$submenu['color'][0];
            $ret.= '<li id="' . $tblColors . '"><a href="' . $submenu['link'] . '"><span>' . $submenu['title'] . '</span></a></li>
            ';
        	}
            $ret.= '</ul></div>
            ';
            $ret.= '<div style="float: left; width: 100%;">
            ';
    break;
    
    
     case ('select'):
            $i=0; $info='';
            $ret ='<div style="padding-left:36px;">' . _SELECT . ' ' . strtolower(_PREFERENCES) . ' : ';
            $ret.='<select name="select_settings" '.$size.'
                          onchange="location=this.options[this.selectedIndex].value">
                 ';
          foreach( $sub_menu as $submenu ) {
                   $selected = eregi( $currentoption?$currentoption:'', $submenu['link'] )?'selected':'';
                   $info     = $selected=='selected'?@constant( strtoupper('_MD_'. $xoopsModule->dirname() . '_' . $submenu['cat'] . 'DSC') ):$info;
                   $nbsp = $i++?'&nbsp;&deg; ':'';
                   $ret.='<option value="'.$submenu['link'].'"'.$selected.'>' . $nbsp . strip_tags($submenu['title']) . '</option>';
        	}
            $ret.='</select>';
            $ret.='&nbsp;&nbsp;' . $info;
            $ret.='</div>';
            $ret.='<div style="float: left; width: 100%;">
            ';

    break;
    }
 Return $ret;
}




?>