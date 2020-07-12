<?php
########################################################
#  popgen version 2.x pour Xoops 2.0.x	       #
#  						       #
#  © 2005, Solo ( www.wolfpackclan.com/wolfactory )    #
#  						       #
#  Licence : GPL 	         		       #
########################################################


include_once("../../../../mainfile.php");
include_once("../../include/functions_common.php");
include_once ("admin_functions.php");

	if (file_exists('../../language/' . $xoopsConfig['language'] . '/admin.php')) {
		include_once '../../language/' . $xoopsConfig['language'] . '/admin.php';
	} else {
		include_once '../../language/english/admin.php';
	}

$table       = isset($_GET['table']) ? $_GET['table'] : '';


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
        $ret .= popgen_query_display_table_rows( $table );
        $ret .= Admin_CloseTable();
        $ret .= '<div align="center">
                  <form action="0" align="center">
	          <input type="button" value="'._MD_POPGEN_CLOSE.'" onclick="self.close()">
                  </form>
                  </div>
                  ';
echo $ret;
?>