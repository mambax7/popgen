<?php
// $Id: index.php,v 1.19 2005/09/02 07:05:47 zoullou Exp $
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2000 XOOPS.org                           //
//                       <http://www.xoops.org/>                             //
// ------------------------------------------------------------------------- //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  You may not change or alter any portion of this comment or credits       //
//  of supporting developers from this source code or any supporting         //
//  source code which is considered copyrighted (c) material of the          //
//  original comment or credit authors.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
//  ------------------------------------------------------------------------ //




$code = 'function gd_info() {
       $array = Array(
                       "GD Version" => "",
                       "FreeType Support" => 0,
                       "FreeType Support" => 0,
                       "FreeType Linkage" => "",
                       "T1Lib Support" => 0,
                       "GIF Read Support" => 0,
                       "GIF Create Support" => 0,
                       "JPG Support" => 0,
                       "PNG Support" => 0,
                       "WBMP Support" => 0,
                       "XBM Support" => 0
                     );
       $gif_support = 0;

       ob_start();
       eval("phpinfo();");
       $info = ob_get_contents();
       ob_end_clean();

       foreach(explode("\n", $info) as $line) {
           if(strpos($line, "GD Version")!==false)
               $array["GD Version"] = trim(str_replace("GD Version", "", strip_tags($line)));
           if(strpos($line, "FreeType Support")!==false)
               $array["FreeType Support"] = trim(str_replace("FreeType Support", "", strip_tags($line)));
           if(strpos($line, "FreeType Linkage")!==false)
               $array["FreeType Linkage"] = trim(str_replace("FreeType Linkage", "", strip_tags($line)));
           if(strpos($line, "T1Lib Support")!==false)
               $array["T1Lib Support"] = trim(str_replace("T1Lib Support", "", strip_tags($line)));
           if(strpos($line, "GIF Read Support")!==false)
               $array["GIF Read Support"] = trim(str_replace("GIF Read Support", "", strip_tags($line)));
           if(strpos($line, "GIF Create Support")!==false)
               $array["GIF Create Support"] = trim(str_replace("GIF Create Support", "", strip_tags($line)));
           if(strpos($line, "GIF Support")!==false)
               $gif_support = trim(str_replace("GIF Support", "", strip_tags($line)));
           if(strpos($line, "JPG Support")!==false)
               $array["JPG Support"] = trim(str_replace("JPG Support", "", strip_tags($line)));
           if(strpos($line, "PNG Support")!==false)
               $array["PNG Support"] = trim(str_replace("PNG Support", "", strip_tags($line)));
           if(strpos($line, "WBMP Support")!==false)
               $array["WBMP Support"] = trim(str_replace("WBMP Support", "", strip_tags($line)));
           if(strpos($line, "XBM Support")!==false)
               $array["XBM Support"] = trim(str_replace("XBM Support", "", strip_tags($line)));
       }

       if($gif_support==="enabled") {
           $array["GIF Read Support"]  = 1;
           $array["GIF Create Support"] = 1;
       }

       if($array["FreeType Support"]==="enabled"){
           $array["FreeType Support"] = 1;    }

       if($array["T1Lib Support"]==="enabled")
           $array["T1Lib Support"] = 1;

       if($array["GIF Read Support"]==="enabled"){
           $array["GIF Read Support"] = 1;    }

       if($array["GIF Create Support"]==="enabled")
           $array["GIF Create Support"] = 1;

       if($array["JPG Support"]==="enabled")
           $array["JPG Support"] = 1;

       if($array["PNG Support"]==="enabled")
           $array["PNG Support"] = 1;

       if($array["WBMP Support"]==="enabled")
           $array["WBMP Support"] = 1;

       if($array["XBM Support"]==="enabled")
           $array["XBM Support"] = 1;

       return $array;
   }';
   if( !function_exists('gd_info') ) { eval($code); }

function thumb_gen_is_writable($path) {
	//will work in despite of Windows ACLs bug
	//NOTE: use a trailing slash for folders!!!
	//see http://bugs.php.net/bug.php?id=27609
	//see http://bugs.php.net/bug.php?id=30931

	if ($path{strlen($path)-1}=='/') // recursively return a temporary file path
		return thumb_gen_is_writable($path.uniqid(mt_rand()).'.tmp');
	else if (is_dir($path))
		return thumb_gen_is_writable($path.'/'.uniqid(mt_rand()).'.tmp');
	// check tmp file for read/write capabilities
	$rm = file_exists($path);
	$f = @fopen($path, 'a');
	if ($f===false)
		return false;
	fclose($f);
	if (!$rm)
		unlink($path);
	return true;
}


function thumb_gen_check_server( $dir ) {
$gd = gd_info();
$display = ($gd['JPG Support']&&$gd['GIF Read Support']&&$gd['GIF Create Support']&&$gd['PNG Support'])?0:1;

  $ret = '<!-- flooble Expandable thumb_gen_infos box start -->
               <script language="JavaScript" 
                       type="text/javascript" 
                       src="../script/expandable.js"></script>
               <style type="text/css">
                       td .head     { width: 25%; }
                       td .header a { color:yellow; padding-left:3px; }
               </style>
              ';

   $ret .= '
                <div align="right" style="font-weight:bold; text-align:rigth;">

                 <a title="show/hide"
                    id="select_thumb_gen_infos_link"
                    href="javascript: void(0);"
                    onclick="toggle(this, \'select_thumb_gen_infos\');">[-]</a>['._MD_POPGEN_SERVER_CONF.']
                 </div>

                 <div id="select_thumb_gen_infos"><br />';

$ret .= Admin_OpenTable();

$ret .= '<h2>'._MD_POPGEN_SERVER_CONF.'</h2>';

(str_replace('.','',substr(XOOPS_VERSION,6)) >= 2015) ? $test = '<span style="color:#33CC33;"><b>OK</b></span>' : $test = '<span style="color:#FF0000;"><b>KO</b></span>' ;
$ret .= _MD_POPGEN_XOOPS_VERSION." : <b>".XOOPS_VERSION." (".$test.")</b><br /><br />";

// if($xoopsModuleConfig['graphic_lib'] == 'GD') {
	// GD graphic lib
	$test = ($gd['GD Version'] == "") ? "<span style=\"color:#FF0000;\"><b>KO</b></span>" : $gd['GD Version'];
	$ret .= _MD_POPGEN_GRAPH_GD_LIB_VERSION." : <b>".$test."</b><br />";

	($gd['GIF Read Support'] && $gd['GIF Create Support']) ? $test = "<span style=\"color:#33CC33;\"><b>OK</b></span>" : $test = "<span style=\"color:#FF0000;\"><b>KO</b></span>" ;
	$ret .= _MD_POPGEN_GIF_SUPPORT." : ".$test."<br />";

	($gd['JPG Support']) ? $test = "<span style=\"color:#33CC33;\"><b>OK</b></span>" : $test = "<span style=\"color:#FF0000;\"><b>KO</b></span>";
	$ret .= _MD_POPGEN_JPEG_SUPPORT." : ".$test."<br />";

	($gd['PNG Support']) ? $test = "<span style=\"color:#33CC33;\"><b>OK</b></span>" : $test = "<span style=\"color:#FF0000;\"><b>KO</b></span>";
	$ret .= _MD_POPGEN_PNG_SUPPORT." : ".$test."<br /><br />";
// }


$isError = false;
$errors = array();

if( !is_dir(XOOPS_ROOT_PATH.'/'.$dir) ) {
	$isError = true;
	$errors[] = "<b>"._MD_POPGEN_DIR."</b> (".XOOPS_ROOT_PATH.'/'.$dir.") : <span style=\"color:#FF0000;\"><b>"._MD_POPGEN_NOT_CREATED."</b></span>";
} else if(!thumb_gen_is_writable(XOOPS_ROOT_PATH.'/'.$dir)) {
	$isError = true;
	$errors[] = "<b>"._MD_POPGEN_DIR."</b> (".XOOPS_ROOT_PATH.'/'.$dir.") : <span style=\"color:#FF0000;\"><b>"._MD_POPGEN_NOT_WRITABLE."</b></span>";
} else { $ret .= _MD_POPGEN_DIR." : ".$dir." <span style=\"color:#33CC33;\"><b>OK</b></span><br />"; }


if($isError) {
	foreach($errors as $error) {
		$ret .= $error."<br />";
	}
	$ret .= "<br />";
}
  $ret .= Admin_CloseTable();
  $ret .= '</div>';

  $ret .= $display||$isError?'':'<script type="text/javascript" language="javascript">
                         toggle(getObject(\'select_thumb_gen_infos_link\'), \'select_thumb_gen_infos\');
                 </script>';
  $ret .= '
  <!-- flooble Expandable thumb_gen_infos box end  -->';

$return['infos'] = $ret;
$return['error'] = $display||$isError?1:0;

Return $return;
}


        $return = thumb_gen_check_server( $image_dir );

        if( $return['error'] ) {
          echo '<img src="../images/icon/important.gif" align="left">';
          echo $return['infos'];
        } else {
          echo $return['infos'];

        }

?>