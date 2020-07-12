<?php
//  ------------------------------------------------------------------------ 	//
//                XOOPS - PHP Content Management System    				//
//                    Copyright (c) 2004 XOOPS.org                       	//
//                       <http://www.xoops.org/>                              //
//                   										//
//                  Authors :									//
//						- solo (www.wolfpackclan.com)         	//
//                  Popgen v2.x								//
//  ------------------------------------------------------------------------ 	//


function a_popgen_menu_show( $options ) {

Global $xoopsUser, $xoopsModule;
$myts =& MyTextSanitizer::getInstance();
include_once(XOOPS_ROOT_PATH.'/modules/popgen/include/functions_common.php');
if( !function_exists('popgen_create_admin_links') ) { include_once(XOOPS_ROOT_PATH.'/modules/popgen/admin/include/admin_buttons.php'); }
      $module_options = popgen_getmoduleAlloption(); 
      $settings       = popgen_group_access( $module_options, ereg('is_redirection', $options[2]) );
                        ereg('is_search', $options[2])?popgen_referer_search():'';
      $background     = popgen_getmoduleoption('index_background');
      $admin          = $xoopsUser && $xoopsUser->isAdmin()&&ereg('is_admin', $options[2])&&$options[0]?'
                                   <a  href="'.XOOPS_URL.'/modules/popgen/admin/blocks/admin.php?fct=blocksadmin&op=edit&bid='.$options[0].'" title="'._MB_POPGEN_EDIT.'">
                                   '._MB_POPGEN_EDIT.'
                                   </a> |
                                   <a  href="'.XOOPS_URL.'/modules/popgen/admin/" title="'._MB_POPGEN_ADMIN.'">
                                   '._MB_POPGEN_ADMIN.'
                                   </a>
                                   ':'';
      $admin .= ereg('is_settings', $options[2])?popgen_select_settings( 16, $module_options ):'';

// Popgen links
           $nav_buttons = array(
                                  'upload'         =>      XOOPS_URL.'/modules/popgen/upload.php',
                                  'images'         =>      XOOPS_URL.'/modules/popgen/index.php?mode=images',
                                  'medias'         =>      XOOPS_URL.'/modules/popgen/index.php?mode=medias',
                                  'div'            =>      XOOPS_URL.'/modules/popgen/div.php'
                       );
           if( isset($xoopsUser) ) { $nav_buttons_admin = array('cacheman'       =>      XOOPS_URL.'/modules/popgen/cacheman.php');
                                                            $nav_buttons = array_merge( $nav_buttons, $nav_buttons_admin );}


          $nav  = popgen_create_admin_links( $nav_buttons,
                                             0, 2,
                                             XOOPS_URL.'/modules/popgen/images/icon/',
                                             '.png',
                                             $options[1],
                                             '64', '_MB', 'vertical' );



// Send datas to templates
      	$item_val_array = array(
                                 'background'   => $background&&ereg('is_background', $options[2])?XOOPS_URL.'/'.$background:'',
                                 'admin'        => $admin,
                                 'nav'          => $nav,
                                 'image'        => $settings['image']&&ereg('is_image', $options[2])?XOOPS_URL.'/'.$module_options['edit_dir'].$settings['image']:'',
                                 'description'  => $options[3]&&ereg('is_description', $options[2])?$myts->displayTarea( $options[3] ):''

                                 );

 	foreach ($item_val_array as $item_lg=>$item_val) {
                 $data_list[$item_lg] = $item_val;
	}

Return $data_list;
}




function a_popgen_menu_edit( $options ) {
  
  $i=0;
        $form = '<style>a.info {cursor:selector; color:black; }</style>';
        $form .= '<table class="bg2">';
        
        $form .= '<tr>
                  <th width="30%">'._MB_POPGEN_OPTION.'</th>
                  <th width="70%">'._MB_POPGEN_SETTINGS.'</th>
                  </tr>
        ';

        $form .= '<tr>';

        $td       = '</td>         <td class="even">';
        $tr       = '</td></tr><tr><td class="odd">';
        $td_end   = '</td>';

        $form .= '<td class="odd">';
        

        $form .= '<input type="hidden"
                         name="options['.$i.']"
                         value="' . $_GET['bid'] . '"
                   />';
// Select
  	$select = array(  _MB_POPGEN_IMAGE   => 'image',
    	                  _MB_POPGEN_BUTTON  => 'button',
    	                  _MB_POPGEN_SELECT  => 'select',
    	                  _MB_POPGEN_TEXT    => 'text',
                        );

           $sel_n= count($select);

        $i++; $ii=0; $selected = " selected='selected'";

        $form.= '<b>';
        $form.= '<a title="Option n° '.$i.'" class="info">'._MB_POPGEN_ADLINKS.'</a>';
        $form .= '</b> <p />';
        $form .= _MB_POPGEN_ADLINKSDSC;
        $form .= $td;
        $form.= '
                <select name="options['.$i.']">';
        $form .= '<optgroup label="'._MB_POPGEN_OPTIONS.'">';

 	foreach ($select as $item_lg=>$item_val) {
        $sel =  $options[$i]==$item_val?$selected:'';
        $form .= $ii++==$sel_n?$optgroup:'';
        $form .= '
                   <option value="'.$item_val.'"
                         '.$sel.'
                   >'
                  . $item_lg .
                  '</option>';
	}
	$form.= '</optgroup>';
	$form.= '</select>';

	$form .= $tr;
	


// Check box
  	$radio = array(
  	                _MB_POPGEN_ADMINS       => "is_admin",
  	                _MB_POPGEN_SETTINGS     => "is_settings",
                        _MB_POPGEN_DESCRIPTION  => "is_description",
  	                _MB_POPGEN_BACKGROUND   => "is_background"
                       );
        $i++; $ii = 0; $max=round(count($radio)/2);  $checked = " checked='checked'";
        $form.= '<b>';
        $form  .= '<a title="Option n° '.$i.'" class="info">'._MB_POPGEN_DISPLAY.'</a>';
        $form .= '</b> <p />';
        $form .= _MB_POPGEN_DISPLAYDSC;
        $form .= $td;
        $form .= '<table><tr><td width="50%">';
        $form .= '<input type="hidden"
                         id="options['.$i.']"
                         name="options['.$i.'][]"
                         value=""
                         checked="checked"
                   />';

 	foreach ($radio as $item_lg=>$item_val) {
          if($ii>=$max){ $tdd = '</td><td width="50%"><br />'; $ii=0; } else { $tdd=''; $ii++; }
        $form .= $tdd;
        $check =  ereg($item_val,$options[$i])?$checked:'';
        $form .= '<input type="checkbox"
                        id="options['.$i.']"
                        name="options['.$i.'][]"
                        value="'.$item_val.'"
                        '.$check.'
                   />
                  '
                  . $item_lg .
                  '<br />';
	} 
	for($ii;$ii<$max;$ii++) { $form .= '<br />'; }
	$form .= '</td></tr></table>';

	$form .= $tr;

// Textarea
        $i++;
        $form.= '<b>';
        $form .= '<a title="Option n° '.$i.'" class="info">'._MB_POPGEN_DESCRIPTION.'</a>';
        $form .= '</b> <p />';
        $form .= _MB_POPGEN_DESCRIPTIONDSC;
        $form .= $td;
        $form .= '<textarea  
                         cols="4"
                         rows="10"
                         name="options['.$i.']"
                   />';
        $form .= $options[$i];
        $form .= '</textarea>';


        $form .= '</td>';
        $form .= '</tr>';
        $form .= '</table>';

	
Return $form;
}
?>