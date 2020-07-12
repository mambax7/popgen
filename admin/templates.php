<?php
/**
* Module: Admin
* Licence : GPL
* Authors :
*           - solo (http://www.wolfpackclan.com)
*/
defined( 'XOOPS_ROOT_PATH' )?'':header('Location: ./');
// Define here your operator list + the default values

$file = popgen_tpl_rename ( $xoopsModuleConfig['index_mode'] );

$ops = array(       'op'             =>      'new',
                    'tpl'            =>      $file['file_name'],
                    'tpl_id'         =>      '',
                    'tpl_source'     =>      '',
                    'template_set'   =>      '',
                    'css_file'       =>      '',
                    'css'            =>      '',
                    'script'         =>      '',
                    'script_file'    =>      ''
                    );
include_once('include/admin_op_retrieve.php');
include_once('../include/functions_common.php');
$xoopsModuleConfig['edit_dir'] = ereg_replace('{UID}/','', $xoopsModuleConfig['edit_dir']);
if( !is_dir( '../../../'.$xoopsModuleConfig['edit_dir'].'cache' ) ) { admin_create_dir( '../../../'.$xoopsModuleConfig['edit_dir'].'cache' ); }


function popgen_select_tpl ( $def_menu, $tpl='' ) {
  Global $xoopsModuleConfig;
  $list ='';$css_file ='';
  include XOOPS_ROOT_PATH."/class/xoopslists.php";
  $css_array  = XoopsLists :: getFileListAsArray( XOOPS_ROOT_PATH . '/' . $xoopsModuleConfig['edit_dir'] . 'cache' );
  foreach( $css_array as $i=>$file_data ) {
                             $file = popgen_tpl_rename ( $file_data );
                             $css_file .= $file['file_name']!='index'?' | ' . $file['file_name'] :'';
                             }

  $list .= '<option value=""></option>';
  $xoopsModuleConfig['item_selectmode'] = XoopsLists :: getHtmlListAsArray( XOOPS_ROOT_PATH . '/modules/popgen/templates/include' );
  foreach( $xoopsModuleConfig['item_selectmode'] as $i=>$file_data ) {
    if( $file_data != 'index.html' ) {
                          $file     = popgen_tpl_rename ( $file_data );
                          $selected =$file['file_name']==$tpl?' selected':'';
                          $has_css  = eregi($file['file_name'], $css_file)?'EDIT':'NEW';
                          $font_weight = $has_css=='EDIT'?'bold':'normal';
                          $list .= '<option style="font-weight:'.$font_weight.';" value="'.$def_menu.'&tpl='.$file['file_name'].'"'.$selected.'">['.$has_css.'] '.$file['name']. '</option>';
    }
 }


// Render form
          $tpl_list = '
                      <select size="<{if $count_list >= 8}>5<{/if}>"
                              name="select"
                              onchange="location=this.options[this.selectedIndex].value">
                              ';
          $tpl_list .= $list;
          $tpl_list .= '</select>';
          
          Return $tpl_list;
}

function popgen_write_file( $file, $data ) {
        Global $xoopsModuleConfig;
       	$handle = fopen($file, 'w+');
		if ($handle) {
			if ( fwrite($handle, $data) ) {
                        include (XOOPS_ROOT_PATH.'/class/xoopsformloader.php');
                          $file_array  = XoopsLists :: getFileListAsArray( '../../../'.$xoopsModuleConfig['edit_dir'].'cache' );
                          $file_reg    = explode( '0', basename ($file) );
                          foreach( $file_array as $files ) {
                            if( ereg( $file_reg[0], $files ) && !ereg($file_reg[0].'0', $files) ) { 
                                unlink( '../../../'.$xoopsModuleConfig['edit_dir'].'cache/'.$files );   // Delete temp files
                                }
                          }
                          return true; }

        }
        return false;
}

function popgen_read_file( $file ) {
        $handle = fopen ($file, "rb");
        $css = fread ($handle, filesize ($file));
        fclose ($handle);
Return $css;
}

function popgen_unlink_cache_files( $tpl ) {
  include XOOPS_ROOT_PATH."/class/xoopslists.php";              
        $file_array  = XoopsLists :: getFileListAsArray( XOOPS_ROOT_PATH . '/templates_c' );
foreach( $file_array as $i=>$file_data ) { if( eregi($tpl . '.html', $file_data) ) { unlink( XOOPS_ROOT_PATH . '/templates_c/'.$file_data ); Return True; } }
Return False;
}


// So, what are we doing now?
switch( $op )
  {
// Update a data
  case ( $op=='post' ):
  $i=0;
        // CSS
        $css_text  = '<p />' . _MD_POPGEN_CSS . ' : ';
        if( $css ) {
        $css_text .= popgen_write_file( $css_file, $css )?_MD_POPGEN_UPDATED:_MD_POPGEN_NOTUPDATED;
        $i++;
        } elseif( file_exists($css_file) && !$css  ) {
        $css_text .= unlink( $css_file )?_MD_POPGEN_DELETED:_MD_POPGEN_NOTDELETED;
        $i++;
        } else { $css_text = ''; }

        // Script
        $script_text = '<p />' . _MD_POPGEN_SCRIPT . ' : ';
        if( $script ) {
        $script_text .= popgen_write_file( $script_file, $script )?_MD_POPGEN_UPDATED:_MD_POPGEN_NOTUPDATED;
        $i++;
        } elseif( file_exists($script_file) && !$script  ) {
        $script_text .= unlink( $script_file )?_MD_POPGEN_DELETED:_MD_POPGEN_NOTDELETED;
        $i++;
        } else { $script_text = ''; }
        
        
        // Template
        $template_text = '<p />' . _MD_POPGEN_TEMPLATE . ' : ';
        if( $template_set != 'default' && $tpl_source ) {
        $tpl_source      = $myts->AddSlashes($tpl_source);
       	$sql = "UPDATE ".$xoopsDB->prefix('tplsource')."
	        SET tpl_source = '$tpl_source'
	        WHERE tpl_id   = '$tpl_id'";
// 	$xoopsDB->queryF($sql)?_MD_POPGEN_UPDATED:_MD_POPGEN_NOTUPDATED;
        if( $xoopsDB->queryF($sql) ) { popgen_unlink_cache_files( $tpl );
                                                     $template_text .= _MD_POPGEN_UPDATED; }
 	$i++;
 	} else { $template_text = ''; }

        redirect_header($def_menu.'&tpl='.$tpl, $i, $css_text . $script_text . $template_text );
        exit();
    break;


  default:
  	include XOOPS_ROOT_PATH."/class/xoopsformloader.php";
	$form = new XoopsThemeForm(_MD_POPGEN_CSS . popgen_select_tpl( $def_menu, $tpl ), "newform", $def_menu."&op=post");
	include 'form/templateform.inc.php';
	$form->display();

    break;
}


?>