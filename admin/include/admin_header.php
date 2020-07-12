<?php
#######################################################
#  Popgen version 1.1 pour Xoops 2.0.x		#
#  							#
#  © 2005-2007, Solo ( www.wolfpackclan.com/wolfactory )#
#  							#
#  Licence : GPL 					#
#######################################################

include_once("../../../mainfile.php");
include_once("../../../include/cp_header.php");
include_once XOOPS_ROOT_PATH."/class/xoopsmodule.php";
include_once('../include/functions_common.php');
include_once('include/admin_buttons.php');

	if (file_exists('../language/' . $xoopsConfig['language'] . '/main.php')) {
		include_once '../language/' . $xoopsConfig['language'] . '/main.php';
	} else {
		include_once '../language/english/main.php';
	}
	
	if (file_exists('../language/' . $xoopsConfig['language'] . '/modinfo.php')) {
		include_once '../language/' . $xoopsConfig['language'] . '/modinfo.php';
	} else {
		include_once '../language/english/modinfo.php';
	}
	
	if (file_exists('../language/' . $xoopsConfig['language'] . '/help.php')) {
		include_once '../language/' . $xoopsConfig['language'] . '/help.php';
	} else {
		include_once '../language/english/help.php';
	}

$myts =& MyTextSanitizer::getInstance();

?>