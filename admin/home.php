<?php
/**
* Module: Admin
* Licence : GPL
* Authors :
*           - solo (http://www.wolfpackclan.com)
*/

// Menus

                  $ret_menu = '<ul>';

                  $ret_menu .= '<li>';
                  $ret_menu .= ' [<a href="../upload.php" title="'._MD_POPGEN_UPLOAD.'">'._MD_POPGEN_UPLOAD.'</a>] ';
                  $ret_menu .= '</li>';
                  
                  $ret_menu .= '<li>';
                  $ret_menu .= ' [<a href="../index.php?mode=images" title="'._MD_POPGEN_IMAGES.'">'._MD_POPGEN_IMAGES.'</a>] ';
                  $ret_menu .= '</li>';
                  
                  $ret_menu .= '<li>';
                  $ret_menu .= ' [<a href="../index.php?mode=medias" title="'._MD_POPGEN_MEDIAS.'">'._MD_POPGEN_MEDIAS.'</a>] ';
                  $ret_menu .= '</li>';
                  
                  $ret_menu .= '<li>';
                  $ret_menu .= ' [<a href="../div.php" title="'._MD_POPGEN_DIV.'">'._MD_POPGEN_DIV.'</a>] ';
                  $ret_menu .= '</li>';

                  $ret_menu .= '</ul>';

include('include/menu.php');
$ret = Admin_OpenTable();
$ret .= '<ul><dl>';

foreach( $adminmenu as $i=>$infos ) {
  if( $i==1 || $i>=7 ) {
  $menus = $i==1?$ret_menu:'';
  $ret .= '<li style="list-style-type:decimal;">
           <a href="../' . $infos['link'] . '">' . $infos['title'] . '</a>
           <dd style="font-style:italic;">' . $infos['description'] . '
           '.$menus.'</dd><br />
          </li>';
  }
}

$ret .= '</dl></ul>';
$ret .= Admin_CloseTable();
echo $ret;


?>