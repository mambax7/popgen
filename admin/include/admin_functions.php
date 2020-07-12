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

// Define here your operator list + the default values
                $op = array(        'admin'              =>      'index'
                                    );

                foreach( $op as $op_name=>$op_value ) {
                
                                  if (!isset($_POST[$op_name])) {
                                      $$op_name       = isset($_GET[$op_name]) ? $_GET[$op_name] : $op_value;
                                      if( eregi('\|', $$op_name) ) {
                                        $operator_array = explode('|', $$op_name);
                                        $$op_name = $operator_array;
                                      }
                                  } else {
                                        $$op_name       = $_POST[$op_name];
                                  }
                  }



function sup_admin_menu($option=0) {
  Global $xoopsModule, $xoopsConfig, $xoopsModuleConfig;
  $UPDATE   = admin_define( 'update' );
  $HELP     = admin_define( 'help' );

  	$i=0;
  	$headermenu[$i]['title']	= _YOURHOME;
  	$headermenu[$i]['image']	= '../images/icon/home.gif';
	$headermenu[$i++]['link']	= '../';

	$headermenu[$i]['title']	= _PREFERENCES;
       	$headermenu[$i]['image']	= '../images/icon/settings.gif';
	$headermenu[$i++]['link']	= '../../system/admin.php?fct=preferences&amp;op=showmod&amp;mod=' . $xoopsModule->getVar('mid');

	$headermenu[$i]['title']	= $UPDATE;
        $headermenu[$i]['image']	= '../images/icon/update.gif';
	$headermenu[$i++]['link']	= "../../system/admin.php?fct=modulesadmin&op=update&module=" . $xoopsModule->getVar('dirname');

   $ret = '';
   foreach( $headermenu as $header_menu ) {
	$ret .= '<a  class="nobutton"
                    href="' . $header_menu['link'] .'"
                    title="' . $header_menu['title'] .'">
               <img src="' . $header_menu['image'] . '" 
                    alt="' . $header_menu['title'] . '"
                    align="absmiddle" />
               </a> &nbsp;';
	}

         // Page activation selector

	if (file_exists('../language/' . $xoopsConfig['language'] . '/main.php')) {
		include_once ('../language/' . $xoopsConfig['language'] . '/main.php');
	} else {
		include_once ('../language/french/main.php');
	}
if ( $option ) {
         include('../xoops_version.php');
         $i=0;
	 foreach( $modversion['sub'] as $value ) {
           if( $value['url'] != 'item.php' ) {
                  $nav[$i]['title'] = admin_define( $value['name'] );
                  $nav[$i]['dsc']   = admin_define( $value['name'].'DSC' );
                  $nav[$i++]['link']= '../'.$value['url'];
           }
          }
	$ret .= '&nbsp;' . admin_url_selector( 0, $nav,'../item.php?id=','|', 'select', 'popgen_menu|catid|title|status');
}	
Return $ret;
}



// selected, file|file,
// destination, caption, display, size, options
function admin_url_selector( $sel=0,
                             $files='',
                             $destination='',
                             $caption='',
                             $display='select',
                             $sql='',
                             $size=1,
                             $target='self'
                             )
{
         Global $xoopsDB, $myts;

         $operator=''; $i=1; $selected[0] = '';
          if($target!='self') { $target=' target="_'.$target.'" '; } else { $target=''; }
          if($sql) { $mysql = explode('|', $sql);}
          if($caption) { $caption = explode('|', $caption);}
// Drop down list
if($display=='select' || $display=='box') {

// List of the latest datas edited
        $selected[$sel] = 'selected';
        $select = '<select size="'.$size.'" name="select"
                           onchange="location=this.options[this.selectedIndex].value">
                     <option value=""'.$selected[0].'>'.$caption[0].'</option>';
	$select .= '<optgroup label="'._YOURHOME.'">
	          ';


    foreach($files as $file) {
	 $select_tmp = $select;
          if( !isset($selected[$i]) ) { $selected[$i] = ''; }
          $select .= '<option value="'.$file['link'].'"'.$selected[$i++].'>'.admin_short_title(strip_tags($myts->makeTareaData4Show($file['title']))).'</option>
          ';}
          $select .= '</optgroup>';


if($sql) {
        $select .= '<optgroup label="'._LIST.'">
                   ';
	$result = "SELECT ".$mysql[1].", ".$mysql[2].", ".$mysql[3]."
		    FROM ".$xoopsDB->prefix($mysql[0])."
		    ORDER BY ".$mysql[3]." DESC";
        $list = $xoopsDB->queryF($result, 10, 0);
        $on   = ' </optgroup>
                  <optgroup label="&nbsp;&nbsp;'.admin_define('online').'">';
        $off  = ' </optgroup>
                  <optgroup label="&nbsp;&nbsp;'.admin_define('offline').'">';
        $hidden = ' </optgroup>
                    <optgroup label="&nbsp;&nbsp;'.admin_define('hidden').'">';
        $last_status = 10; $ii = 0;
    	while(list( $id, $title, $status ) = $xoopsDB->fetchRow($list))
    	{
          $ii = $status==$last_status?$i++:0;
          $select .= $status==0&&!$ii?$off:'';
          $select .= $status==2&&!$ii?$hidden:'';
          $select .= $status==1&&!$ii?$on:'';
          $last_status = $status;
          $selected = $sel==$id?' selected ':'';
          $select .= '<option value="'.$destination.$id.'"'.$selected.'>'.admin_short_title(strip_tags($myts->makeTareaData4Show($title))).'</option>
                   ';}
          $select .= '</optgroup>';
}
          $select .= '</select> 
          ';
 }
 
 

// Unordered list
if($display=='list' ) {

  // List of the latest datas edited

        $select  = '<ul>';
        if($caption) {
        $select .= '<li><a href="'.$caption[1].'" title="'.$caption[0].'"'.$target.'>'.$caption[0].'</li>
          '; }
    foreach($files as $file) {
          $select_tmp = $select;
          $select .= '<li><a href="'.$destination.$file['link'].'" title="'.strip_tags($file['dsc']).'"'.$target.'>'.admin_short_title($myts->makeTareaData4Show($file['title']), 42).'</li>
          ';}
          $select .= '</ul>
          ';

if($sql) {
          $select .= '<ul>
          ';
	$result = "SELECT ".$mysql[1].", ".$mysql[2]."
		    FROM ".$xoopsDB->prefix($mysql[0])."
		    ORDER BY ".$mysql[1]." DESC";
        $list = $xoopsDB->queryF($result, 0, 1);

    	while(list( $id, $title ) = $xoopsDB->fetchRow($list))
     	{
                   $select .= '<li><a href="'.$url.$destination.'?id='.$id.'" title="'.strip_tags($title).'"'.$target.'>'.admin_short_title($myts->makeTareaData4Show($title), 42).'</li>
                   ';}
          $select .= '</ul>
          ';
}
 }




 // Align
if($display=='tab' ) {
        $colors_a='#888';
        $colors_txt='#008';
        $colors_bck='#DDD';
        $colors_bck_current='#FFF';
        $colors_bck_hover='#EEE';
        $select = "
    	<style type='text/css'>
    	#admin_tabs { float:left; font-size: 10px; line-height:normal; margin-bottom: 0px; }
    	#admin_tabs ul { margin:0px; margin-top: -11px; padding:0px 0px; list-style:none; }
		#admin_tabs li { display:inline; margin-bottom:16px; padding:0px;}
		#admin_tabs a  { float:left; background-color: ".$colors_bck."; margin:0px; padding: 5px; text-align: center; text-decoration:none;
                              border: 1px outset ".$colors_txt."; border-bottom: 0px; white-space: nowrap}
		#admin_tabs a span { display:block; white-space: nowrap; color:".$colors_a.";}
		/* Commented Backslash Hack hides rule from IE5-Mac \*/
		#admin_tabs a span {float:none;}
		/* End IE5-Mac hack */
		#admin_tabs a:hover span { color:".$colors_txt."; }
		#admin_tabs #current a { background-color: ".$colors_bck_current."; border: 1px inset ".$colors_txt."; border-bottom: 0px;}
		#admin_tabs #current a span { background-color: ".$colors_bck_current."; color:".$colors_txt."; }
		#admin_tabs a:hover { background-position:0% -150px; background-color: ".$colors_bck_hover."; 
                                   border: 1px inset ".$colors_txt."; border-bottom: 0px;}
		#admin_tabs a:hover span { background-position:100% -150px; background-color: ".$colors_bck_hover."; }
		</style>
    ";
        $select .= '<br /><div id="admin_tabs"><ul>
        ';
        $selected[$sel] = 'current';
        if( $caption) {
        $select .= '<li id="' . $selected[0] . '">
                      <a href="'.$caption[1].'" title="'.$caption[0].'"'.$target.'>
                      <span>'.$caption[0].'</span>
                      </a>
                      </li>
          ';
        }
    if( $files ) {
    foreach($files as $file) {
	  $select_tmp = $select;
          if( !isset($selected[$i]) ) { $selected[$i] = ''; }
          $select .= '<li id="' . $selected[$i++] . '">
                      <a href="'.$destination.$file['link'].'" title="'.strip_tags($file['dsc']).'"'.$target.'>
                      <span>'.admin_short_title($myts->makeTareaData4Show($file['title']), 42).'</span>
                      </a>
                      </li>
          ';
          }
          $select .= '</ul></div><br />
          ';
      }
          
   if($sql) {
	$result = "SELECT ".$mysql[1].", ".$mysql[2]."
		    FROM ".$xoopsDB->prefix($mysql[0])."
		    ORDER BY ".$mysql[1]." DESC";
        $list = $xoopsDB->queryF($result, 0, 1);

    	while(list( $id, $title ) = $xoopsDB->fetchRow($list))
     	{
          $selected = $sel==$id?'current':'';
          $select .= '<li id="' . $selected . '">
                      <a href="'.$destination.$id.'" title="'.strip_tags($title).'"'.$target.'>
                      <span>'.admin_short_title($myts->makeTareaData4Show($title), 42).'</span>
                      </a>
                      </li>';

                   }
          $select .= '</ul> </div><br />
          ';
          }


 }


Return $select;
}

function admin_short_title( $title='', $length=32, $tiddle='[...]' )
{
//     $myts =& MyTextSanitizer::getInstance();
     $tiddle_length=round(strlen($tiddle)/4,1);
     $length=round($length-$tiddle_length,1);
     $part2=round($length/4,1);
     $part1=$part2*3;
     $length=round($length);
//     $title = $myts->makeTareaData4Show( $title );
 if( strlen($title) > $length )
   { $title_01 = substr($title,0,$part1).$tiddle;
     $title_02 = substr($title,-$part2);
     $title=$title_01.$title_02;
   }
   Return $title;
}



 // Functiont to detect the various settings variables
function admin_menu_list( $dir='.') {

  $rep=opendir($dir);
  $i=0;

while ( $files = readdir($rep) ){

  if( is_file($dir.'/'.$files) && !eregi('index',$files) && !eregi('home',$files) ) {
            $file     = str_replace('.php','',$files);
            $file_name = admin_define( $file );
            $file_dsc  = admin_define( $file.'dsc' );

            $adminmenu[$i]['dsc'] = $file_dsc;
            $adminmenu[$i]['link']  = $file;
            $adminmenu[$i++]['title'] = $file_name;

        }
}
         closedir();
         asort($adminmenu);

  Return $adminmenu;
 }



// Function to  generate tabs and selectlist
function admin_menu($currentoption=0, $breadcrumb, $option=0) {
	global $xoopsConfig, $xoopsModule, $module, $xoopsModuleConfig;
	if (file_exists('../language/' . $xoopsConfig['language'] . '/modinfo.php')) {
		include_once '../language/' . $xoopsConfig['language'] . '/modinfo.php';
		include_once '../language/' . $xoopsConfig['language'] . '/admin.php';
	} else {
		include_once '../language/english/modinfo.php';
		include_once '../language/english/admin.php';
	}

$breadcrumb = admin_define( $breadcrumb ); // @constant(strtoupper('_MD_' . $xoopsModule->dirname() . '_' . $breadcrumb));

	$ret = "<style type='text/css'>
                                        #buttontop { float:left;
                                                     width:100%;
                                                     background: #e7e7e7; 
                                                     font-size:93%; 
                                                     line-height:normal; 
                                                     border-top: 1px solid black; 
                                                     border-left: 1px solid black; 
                                                     border-right: 1px solid black; 
                                                     margin: 0px;
                                                     padding-top:10px; }
                              
                                        #buttonbar { float:left; 
                                                     width:100%; 
                                                     background: #e7e7e7 url('../images/bg.gif') repeat-x left bottom; 
                                                     font-size: 10px; line-height:normal; 
                                                     border-left: 1px solid black; 
                                                     border-right: 1px solid black; 
                                                     margin-bottom: 10px; }
                              
                                        #buttonbar ul { margin:0px; 
                                                        margin-top: 15px; 
                                                        padding:0px 3px 0;
                                                        list-style:none; }
                              
                                        #buttonbar li { display:inline; 
                                                        margin:0;
                                                        padding:0; }
                              
                                        #buttonbar a { float:left; 
                                                       background:url('../images/left_both.gif') no-repeat left top;
                                                       margin:0;
                                                       padding:0px 3px 0px 9px;
                                                       border-bottom:1px solid #000;
                                                       text-decoration:none;
                                                       white-space: nowrap; }
                              
                                        #buttonbar a span { float:left; 
                                                            display:block; 
                                                            background:url('../images/right_both.gif') no-repeat right top; 
                                                            padding:5px 15px 4px 6px; 
                                                            font-weight:bold; color:#765; 
                                                            white-space: nowrap; }
                              
                                        /* Commented Backslash Hack hides rule from IE5-Mac \*/
                                        #buttonbar a span { float:none; }
                              
                                        /* End IE5-Mac hack */
                              
                                        #buttonbar a:hover span { color:#333; }
                                        #buttonbar #current a { background-position:0 -150px; 
                                                                border-width:0px; }
                              
                                        #buttonbar #current a span { background-position:100% -150px; 
                                                                     padding-bottom:5px; color:#333; }
                              
                                        #buttonbar a:hover { background-position:0% -150px; }
                              
                                        #buttonbar a:hover span { background-position:100% -150px; }

          </style>";



	$ret .= '<div id="buttontop">';
	$ret .= '<table style="width: 100%; padding: 0px;" cellspacing="0"><tr>';
	$ret .= '<td style="font-size: 10px; text-align: left; color: #2F5376; padding: 0 6px; line-height: 18px; width:40%;">';
 // Header main module menu
        $ret .= sup_admin_menu($option);

	$ret .= '</td>';
	$ret .= '<td style="font-size: 18px; text-align: left; color: Black;
                         padding: 0 6px; line-height: 18px; width:20%;
                         font-weight: bold;"><a href="../" title="' . $xoopsModule->dirname() . '"  />' . $xoopsModule->name() . '</a></td>';
	$ret .= '<td style="font-size: 12px; text-align: right; color: #CC0000;
                         padding: 0 6px; line-height: 18px;  width:40%;
                         font-weight: bold;">' . $breadcrumb . '</td>';
	$ret .= '</tr></table>';
	$ret .= '</div>';

	$ret .= '<div id="buttonbar">';
	$ret .= '<ul>';

        $i=0;
        $admin_menu_list = admin_menu_list();
        if( $admin_menu_list ) {
                foreach( $admin_menu_list as $adminmenu ) {
                $current = $adminmenu['link']==$currentoption?'current':'null';
                $help = eregi('help',$adminmenu['link'])?'style="cursor:help;"':'';
        	$ret .= '<li id="' . $current . '">
                             <a href="index.php?admin=' . $adminmenu['link'] . '"
                                title="' . $adminmenu['dsc'] . '"
                                '.$help.'>
                             <span>
                             ' . $adminmenu['title'] . '
                             </span>
                             </a>
                      </li>';
                }
       	} else {$ret .= _ERRORS; }
	     
	$ret .= '</ul></div>';
	$ret .= '<div style="float: left; width: 100%;">';
Return $ret;
}

 function Admin_OpenTable( $width='99%', $style='border:Black solid 1px') {
    $ret = '
    <div class="bg4"
         style="text-align: left;
                padding:6px 6px 6px 6px;
                width:'.$width.';
                '.$style.';"
    >
    ';
Return $ret;
}

function Admin_CloseTable() {
    $ret  = '</div>
    ';
    $ret .= '<p />
    ';
Return $ret;
}


function admin_footer() {
  Global $xoopsModule;
    $ret  = Admin_OpenTable();
    $ret .= '<img src="../images/logo-48.png"
                  width="48"
                  border="0"
                  align="absmiddle" />';
    $ret .= sprintf(admin_define( 'credit' ),'Popgen', '<a href="http://www.comptoir-des-medias.com" target="_blank">Comptoir des Médias</a>' );
    $ret .= Admin_CloseTable();
Return $ret;
}

function admin_define( $name='', $prefix='_MD' ) {
  Global $xoopsModule;
  
  $define_name   = str_replace( '_', ' ',  $name);
  $constant_name = str_replace( ' ', '_',  $name); 

  Return constant( strtoupper( $prefix . '_'. $xoopsModule->dirname() . '_' . $constant_name) )?@constant( strtoupper( $prefix . '_'. $xoopsModule->dirname() . '_' . $constant_name) ):ucfirst( $define_name ) . ' *';
}


// Functions to generate directories
function admin_create_dir( $directory='' )
{
$thePath = $directory;

	if(@is_writable($thePath)){
		admin_chmod($thePath, $mode = 0777);
        Return $thePath;
	} elseif(!@is_dir($thePath)) {
    	        admin_mkdir($thePath);
        Return $thePath;
	} else {
        Return 0;
        }
}

function admin_mkdir($target)
{
	// http://www.php.net/manual/en/function.mkdir.php
	// saint at corenova.com
	// bart at cdasites dot com
	$final_target = $target;
	if (is_dir($target) || empty($target)) {
		Return true; // best case check first
	}

	if (file_exists($target) && !is_dir($target)) {
		Return false;
	}

	if (admin_mkdir(substr($target,0,strrpos($target,'/')))) {
		if (!file_exists($target)) {
			$res = mkdir($target, 0777); // crawl back up & create dir tree
			admin_chmod($target);
			Global $xoopsModule;
		  $logo_file = XOOPS_ROOT_PATH . '/modules/'.$xoopsModule->dirname().'/images/index.html';
		  copy($logo_file, $final_target.'/index.html');
	  	Return $res;
	  }
	}
    $res = is_dir($target);

	Return $res;
}

function admin_chmod($target, $mode = 0777)
{
	Return @chmod($target, $mode);
}


function admin_icon_legend( $width=48 ) {
 $legend = '<div class="outer" style="overflow:auto; height:120px;">
 <ul style="font-style:italic;">
     <li style="display:inline;"><img src="../images/icon/on.gif" alt="on" align="absmiddle" /> '._MD_POPGEN_ONLINE.' |</li>
     <li style="display:inline;"><img src="../images/icon/hidden.gif" alt="hidden" align="absmiddle" /> '._MD_POPGEN_HIDDEN.' |</li>
     <li style="display:inline;"><img src="../images/icon/off.gif" alt="off" align="absmiddle" width="18" /> '._MD_POPGEN_OFFLINE.'</li>
     <br />
     <li style="display:inline;"><img src="../images/icon/menu.png" alt="menus" align="absmiddle" width="'.$width.'" /> '._MD_POPGEN_MENU.' |</li>
     <li style="display:inline;"><img src="../images/icon/link.png" alt="links" align="absmiddle" /> '._MD_POPGEN_LINK.' |</li>
     <li style="display:inline;"><img src="../images/icon/images.png" alt="images" align="absmiddle" /> '._MD_POPGEN_IMAGE.' |</li>
     <li style="display:inline;"><img src="../images/icon/templates.png" alt="template" align="absmiddle" width="'.$width.'" /> '._MD_POPGEN_TEMPLATE.' </li>
     <br />
     <li style="display:inline;"><img src="../images/icon/permanent.png" alt="permanent" align="absmiddle" width="'.$width.'" /> '._MD_POPGEN_PERMANENT.' |</li>
     <li style="display:inline;"><img src="../images/icon/relative.png" alt="relative" align="absmiddle" width="'.$width.'" /> '._MD_POPGEN_RELATIVE.' |</li>
     <li style="display:inline;"><img src="../images/icon/link_in.png" alt="in" align="absmiddle" width="'.$width.'" /> '._MD_POPGEN_LINKIN.' |</li>
     <li style="display:inline;"><img src="../images/icon/link_out.png" alt="out" align="absmiddle" width="'.$width.'" /> '._MD_POPGEN_LINKOUT.' |</li>
     <li style="display:inline;"><img src="../images/icon/query.png" alt="query" align="absmiddle" width="'.$width.'" /> '._MD_POPGEN_QUERY.'</li>
     <br />
     <li style="display:inline;"><img src="../images/icon/_self.png" alt="self" align="absmiddle" width="'.$width.'" /> '._MD_POPGEN_SELF.' |</li>
     <li style="display:inline;"><img src="../images/icon/_blank.png" alt="blank" align="absmiddle" width="'.$width.'" /> '._MD_POPGEN_BLANK.'</li>
     <br />
     <li style="display:inline;"><img src="../images/icon/bulle.png" alt="infobulle" align="absmiddle" width="'.$width.'" /> '._MD_POPGEN_INFOBULLE.' |</li>
     <li style="display:inline;"><img src="../images/icon/css.png" alt="css" align="absmiddle" /> '._MD_POPGEN_CSS.' |</li>
     <li style="display:inline;"><img src="../images/icon/none.png" alt="trouble" align="absmiddle" /> '._MD_POPGEN_TROUBLE.'</li>
     <br />
     <li style="display:inline;"><img src="../images/icon/edit.png" alt="edit" align="absmiddle" /> '._MD_POPGEN_EDIT.' |</li>
     <li style="display:inline;"><img src="../images/icon/clone.png" alt="clone" align="absmiddle" /> '._MD_POPGEN_CLONE.' |</li>
     <li style="display:inline;"><img src="../images/icon/delete.png" alt="delete" align="absmiddle" /> '._MD_POPGEN_DELETE.'</li>

     </ul>
     </div>';

Return $legend;
}

function  admin_display_tip( $tip=0 ) {

        Global $xoopsConfig;
  	if (file_exists('../language/' . $xoopsConfig['language'] . '/tips.php')) {
		include_once '../language/' . $xoopsConfig['language'] . '/tips.php';
	} else {
		include_once '../language/french/tips.php';
	}

        $rand = $tip?$tip:rand(1, $tips_count);
        $tip_text = constant( '_TI_POPGEN_'.$rand );
        $tip = explode( '|', $tip_text );
        $tip_icon = eregi('Astuce', $tip[0])?'astuce':'info';
        $ret  = '<div align="center">';
        $ret .= Admin_OpenTable( '480px', 'overflow:Auto; background-color:LightYellow; height:110px; border: Black 2px Inset; margin:12px;' );
        $ret .= '<img src="../images/icon_buff/'.$tip_icon.'.png" width="64" align="right" />';
        $ret .= isset($tip[2])?'<h3><a href="'.$tip[2].'">[!]</a> ':'<h3>';
        $ret .= $tip[0].'</h3>';
        $ret .= $tip[1];
        $ret .= '<div style="text-align:right;font-size:70%;"><br />'.$rand. '/'.$tips_count. '
                 <a href="index.php?admin=help&sub=tips">[?]</a>
                 <a href="index.php?admin=settings&num=23">[X]</a>
                 </div>';
        $ret .= Admin_CloseTable();
        $ret  .= '</div>';


Return $ret;
}

?>