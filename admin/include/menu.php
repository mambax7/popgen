<?php
#######################################################
#  Popgen version 1.1 pour Xoops 2.0.x	      #
#  						      #
#  © 2005, Solo ( www.wolfpackclan.com/wolfactory )   #
#  						      #
#  Licence : GPL 				      #
#######################################################

// Nav box admin Menu
$i=0;
    $adminmenu[++$i]['title'] = _MI_POPGEN_INDEX;
    $adminmenu[$i]['link'] = "./";
    $adminmenu[$i]['description'] = _MI_POPGEN_INDEX_DSC;
    
    $adminmenu[++$i]['title'] = _MI_POPGEN_UPLOAD;
    $adminmenu[$i]['link'] = "upload.php";
    $adminmenu[$i]['description'] = '';
    
    $adminmenu[++$i]['title'] = _MI_POPGEN_IMAGES;
    $adminmenu[$i]['link'] = "index.php?mode=images";
    $adminmenu[$i]['description'] = '';
    
    $adminmenu[++$i]['title'] = _MI_POPGEN_MEDIAS;
    $adminmenu[$i]['link'] = "index.php?mode=medias";
    $adminmenu[$i]['description'] = '';
    
    $adminmenu[++$i]['title'] = _MI_POPGEN_DIV;
    $adminmenu[$i]['link'] = "div.php";
    $adminmenu[$i]['description'] = '';
    
    $adminmenu[++$i]['title'] = _MI_POPGEN_CACHEMAN.'</a><hr />'._MI_POPGEN_ADMIN.':<a>';
    $adminmenu[$i]['link'] = "cacheman.php";
    $adminmenu[$i]['description'] = '';

    $adminmenu[++$i]['title'] = _MI_POPGEN_SETTINGS;
    $adminmenu[$i]['link'] = "admin/index.php?admin=settings";
    $adminmenu[$i]['description'] = _MI_POPGEN_SETTINGS_DSC;

    $adminmenu[++$i]['title'] = _MI_POPGEN_TEMPLATES;
    $adminmenu[$i]['link'] = "admin/index.php?admin=templates";
    $adminmenu[$i]['description'] = _MI_POPGEN_TEMPLATES_DSC;

    $adminmenu[++$i]['title'] = _MI_POPGEN_IMAGE;
    $adminmenu[$i]['link'] = "admin/index.php?admin=images";
    $adminmenu[$i]['description'] = _MI_POPGEN_IMAGE_DSC;

    $adminmenu[++$i]['title'] = _MI_POPGEN_PERM;
    $adminmenu[$i]['link'] = "admin/index.php?admin=blocks";
    $adminmenu[$i]['description'] = _MI_POPGEN_PERM_DSC;

    $adminmenu[++$i]['title'] = _MI_POPGEN_UTILS;
    $adminmenu[$i]['link'] = "admin/index.php?admin=utils";
    $adminmenu[$i]['description'] = _MI_POPGEN_UTILS_DSC;

    $adminmenu[++$i]['title'] = _MI_POPGEN_HELP;
    $adminmenu[$i]['link'] = "admin/index.php?admin=help";
    $adminmenu[$i]['description'] = _MI_POPGEN_HELP_DSC;

?>
