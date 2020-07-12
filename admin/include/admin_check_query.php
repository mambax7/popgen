<?php
########################################################
#  popgen version 2.x pour Xoops 2.0.x	       #
#  						       #
#  © 2005, Solo ( www.wolfpackclan.com/wolfactory )    #
#  						       #
#  Licence : GPL 	         		       #
########################################################

include_once("../../../../mainfile.php");


	if (file_exists('../../language/' . $xoopsConfig['language'] . '/admin.php')) {
		include_once '../../language/' . $xoopsConfig['language'] . '/admin.php';
	} else {
		include_once '../../language/english/admin.php';
	}

$id       = isset($_GET['id']) ? $_GET['id'] : '';

if(!$id) {
	redirect_header('index.php', 2, _POPGEN_PL_SELECT);
	exit();
}



include_once ("admin_functions.php");
include_once ("../../include/functions_query.php");
$myts =& MyTextSanitizer::getInstance();
$datas = popgen_query( $id );

$list=''; $i=1; $class='odd';
foreach($datas['result'] as $data)
     	{
         $image = $data['image']?'<img src="'.$data['image'].'" align="absmiddle" widht="40">':'';
         $title = $myts->makeTareaData4Show($data['title']);
         $alt_title = $myts->makeTareaData4Show($data['alt_title']);
         $class = $class=='odd'?'even':'odd';

         $list .= '
                  <tr>';

         $list .= '<td class="'.$class.'" align="center">
                  '.$i++.'
                  </td>
                   ';

         $list .= '<td class="'.$class.'" align="center">
                  <a href="'.$data['link'].'"
                     title="'.strip_tags($title).'"
                     target="_blank">
                  '.$image.'
                  </td>
                   ';
         $list .= '<td class="'.$class.'">
                  <a href="'.$data['link'].'"
                     title="'.strip_tags($title).'"
                     target="_blank">
                  '.$title.'
                  </td>
                   ';
         $list .= '<td class="'.$class.'">
                  '.$alt_title.'
                  </td>
                   ';
         $list .= '
                  </tr>';
         }

        $ret  = '';
        $ret .= '<link rel="stylesheet" 
                       type="text/css" 
                       media="all" 
                       href="../../../../xoops.css" />
                 <link rel="stylesheet"
                       type="text/css" 
                       media="all" 
                       href="../../../../modules/system/style.css" />';

        $ret .= Admin_OpenTable();
        $ret .= '<h3 align="center">'.$datas['title'].'</h3>';
        $ret .= '<div align="center">
                 <table class="outer" width="90%">
                 <tr class="header">
                 <th width="10%">'._MD_POPGEN_N.'</th>
                 <th width="40%">'._MD_POPGEN_IMAGE.'</th>
                 <th width="50%">'._MD_POPGEN_TITLE.'</th>
                 <th width="50%">'._MD_POPGEN_ALT_TITLE.'</th>
                 </tr>
          ';
        $ret .= $list;
        $ret .= '</div></table>';
        $ret .=  Admin_CloseTable();
        $ret .=  '<div align="center">
                   <form action="0" align="center">
	           <input type="button" value="'._MD_POPGEN_CLOSE.'" onclick="self.close()">
                   </form>
                   </div>
                   ';
                 
// Display result
   echo $ret;
                 
?>