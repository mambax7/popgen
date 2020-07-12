<?php
#######################################################
#  popgen version 1.1 pour Xoops 2.0.x		#
#  							#
#  © 2005, Solo ( www.wolfpackclan.com/wolfactory )	#
#  							#
#  Licence : GPL 					#
#######################################################


// Metagens

function popgen_meta_description( $meta_description='', $description='' ) {
       $myts =& MyTextSanitizer::getInstance();
       $description = strip_tags($myts->displayTarea($description));
       Return $description?$description:($meta_description?$meta_description:'');
}

// Assure compatibility with < Xoops 2.0.14
// Meta Description
     $meta_description = popgen_meta_description($xoopsModuleConfig['meta_description'], isset($description)?$description:'');
if ( $meta_description ) {
	if ( is_file(XOOPS_ROOT_PATH . '/class/theme.php') ) {
		$xoTheme->addMeta( 'meta', 'description',  	$meta_description);
	} else {
		$xoopsTpl->assign('xoops_meta_description',	$meta_description);
	}
}

// Meta Keywords
if ( $xoopsModuleConfig['meta_keywords'] ) {
	if ( is_file(XOOPS_ROOT_PATH . '/class/theme.php') ) {
		$xoTheme->addMeta( 'meta', 'keywords',  	$xoopsModuleConfig['meta_keywords']);
   	} else {
		$xoopsTpl->assign('xoops_meta_keywords',        $xoopsModuleConfig['meta_keywords']);
	}
}

// Meta Title
                $xoopsTpl->assign('xoops_pagetitle',   	$xoopsModule -> getVar('name') . (isset($title)?' : ' . $title:'') );
?>

