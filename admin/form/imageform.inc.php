<?php
/**
* XOOPS - PHP Content Management System
* Copyright (c) 2001 - 2006 <http://www.xoops.org/>
*
* Module: popgen 2.x
* Licence : GPL
* Authors :
*           - solo (http://www.wolfpackclan.com/wolfactory)
*/

        $image  = explode('|', $xoopsModuleConfig['image_max_size']);
        $width  = $image[0]?$image[0]:'';
        $height = $image[1]?$image[1]:'';

        $image_array  = $dir_type=='medias'?
                        XoopsLists :: getFileListAsArray( XOOPS_ROOT_PATH . '/' . $image_dir):
                        XoopsLists :: getImgListAsArray( XOOPS_ROOT_PATH . '/' . $image_dir);

    $formimages = '<tr><td colspan="2">
                  <script type="text/javascript">
                  	function checkUncheckAll(theElement) {
                                 var theForm = theElement.form, z = 0;
	                         for(z=0; z<theForm.length;z++){
                                          if(theForm[z].type == "checkbox" && theForm[z].name != "checkall"){
	                                     theForm[z].checked = theElement.checked;
	                                  }
                                 }
                         }
                    </script>
                  <div style="height:380px;
                        overflow:auto;
                        margin:0px;
                        border:1px solid #c2cdd6;
                        background: url(../images/background.gif) white no-repeat center center;">
                   <table width="100%" class="outer" cellspacing="1"><tr class="odd">
                   ';

	$div_width  = $width&&$width<=260?$width+28 :'260';
	$div_heigth = $height&&$height<=260?$height+28:'260';
	$i=0; $ii=0; $class = 'odd'; $cols = $xoopsModuleConfig['image_cols']; $limit=$xoopsModuleConfig['image_perpage'];
        include_once (XOOPS_ROOT_PATH . '/class/pagenav.php');
        $pagenav = new XoopsPageNav( count($image_array), $xoopsModuleConfig['image_perpage'], $startart, 'admin=images&dir_select='.$dir_select.'&dir_type='.$dir_type.'&startart' );
        
        $array=0;
If( $image_array ) {
  
  $array = $startart;  $end_array = ($startart+$limit) >= count($image_array)?count($image_array):($startart+$limit);

//        foreach( $image_array as $image ) {
  sort($image_array);
          for( $array; $array<$end_array; $array++) {
        if( $i++>= $cols ) { $class = $class=='odd'?'even':'odd'; $formimages .= '</tr><tr class="'.$class.'">'; $i=1; }
        $image_size = @getimagesize('../../../'.$image_dir.$image_array[$array]);
        $thumb_size = @getimagesize('../../../'.$thumb_dir.$image_array[$array]);
        if( isset($image_size[0]) ) { $image_size[0]=$image_size[0]+25; $image_size[1]=$image_size[1]+25; }
                               else { $image_size[0]=''; $image_size[1]=''; }
                               
        if( isset($thumb_size[0]) ) { $thumb_dir_dyn = $thumb_dir; } else { $thumb_dir_dyn = $image_dir; }

        $formimages .= '<td align="center" width="'.round(100/$cols).'%">';
        $formimages .='<div style="margin: 3px; overflow: auto; text-align: center; height: '.$div_heigth.'px; width: '.$div_width.'px;">';
        if( isset($thumb_size[2]) ) {
        $orig_link = '
                        <a onclick="pop=window.open(\'\', \'wclose\', \'width='.$image_size[0].', height='.$image_size[1].', dependent=yes, toolbar=no, scrollbars=yes, status=no, resizable=yes, fullscreen=no, titlebar=no, left=100, top=30\', \'false\'); pop.focus(); "
                           href="../../../'.$image_dir.$image_array[$array].'"
                           target="wclose">'; } else { $orig_link = ''; }
        $formimages .= $orig_link;
        $formimages .= isset($image_size[2])?
                       '<img src="../../../'.$thumb_dir_dyn.$image_array[$array].'" alt="'.$image_array[$array].'">':
                       '<img src="../images/icon/medias.png" alt="'.$image_array[$array].'"><br />'.$image_array[$array];
        $formimages .= $thumb_size[2]?'</a>':'';
        $formimages .= '</div>
                        <div align="center">
                        <input name="image_select[]" value="'.$image_array[$array].'" type="checkbox" />'.admin_short_title( $image_array[$array], 36, '[...]' ).' ['.$thumb_size[0].'*'.$thumb_size[1].']
                        </div>
                        </td>
                 ';
          if( $ii==$limit ) { break; }

        } // Foreach

        $ii = $cols-$i;
        for( $ii; $ii>=0; --$ii ) { $formimages .= $ii?'<td width="'.round(100/$cols).'%"></td>':''; }
 } // if images
    $formimages .= '</tr></table>
                    </div>['.$array.'/'.count($image_array).']&nbsp;
                    <input type="checkbox" name="checkall" onclick="checkUncheckAll(this);" />'._MD_POPGEN_CHECK_ALL.'
                    &nbsp;&nbsp;&nbsp;&nbsp;' . $pagenav -> renderNav() . '

    ';

        
        $image_box = new XoopsFormFile(_MD_POPGEN_NEWIMAGE, "image_file", '10000');
        $image_box->setExtra( 'size="80"');

// Options
// Thumb generator
	$formthumbgen = new XoopsFormSelect( _MD_POPGEN_THUMBGEN, 'thumb_gen', $thumb_gen );
        $formthumbgen->addOption( 'normal', _MD_POPGEN_NORMAL );
	$formthumbgen->addOption( 'rounded', _MD_POPGEN_ROUNDED );
        $formthumbgen->addOption( 'blackandwhite', _MD_POPGEN_BW );
	$formthumbgen->addOption( 'dropshadow', _MD_POPGEN_SHADOW );
	$formthumbgen->addOption( 'grad', _MD_POPGEN_GRAD );
	$formthumbgen->addOption( 'info', _MD_POPGEN_INFO );
	
// Text
        $formtext  = new XoopsFormText(_MD_POPGEN_TEXT,  "text", 60, 60, $text);

// Thumb size
        $formwidth  = new XoopsFormText(_MD_POPGEN_WIDTH,  "width", 5, 5, $width);
        $formheight = new XoopsFormText(_MD_POPGEN_HEIGHT, "height", 5, 5, $height);
        
/*      $formsubmit = new XoopsFormRadio(_MD_POPGEN_OPERATION, "op", $op);
        $formsubmit->addOption( 'del', _MD_POPGEN_DELETE );
        $formsubmit->addOption( 'resize', _MD_POPGEN_RESIZE );
*/        
        
// Thumb background color
        $formcolor = new XoopsFormColorPicker( _MD_POPGEN_BCKCOLOR, 'backgroundcolor', $backgroundcolor );

// Submit
        $button_upload = new XoopsFormButton('', 'op', _MD_POPGEN_UPLOAD, 'submit');

// Render Form
    include('java.help.php');
    $options = popgen_drop_form( _MD_POPGEN_OPTIONS, _HLP_POPGEN_IMAGE, _MD_POPGEN_HELP );


        $form->setExtra('enctype="multipart/form-data"');
        $form->addElement($image_box);
        $form->addElement($button_upload);
        $form->addElement($drop['in']);
        $form -> addElement( $options['in'] );
        $form->addElement($formthumbgen);
        $form->addElement($formtext);
        $form->addElement($formwidth);
        $form->addElement($formheight);
        $form->addElement($formcolor);
     $form -> addElement( $options['out'] );
        $form->addElement($formimages);
	$form->addElement(new XoopsFormHidden('dir_select',  $dir_select));

	$button_tray = new XoopsFormElementTray( '', '' );


		$butt_update = new XoopsFormButton( '', 'op', _MD_POPGEN_UPDATE, 'submit' );
//	 	$butt_update->setExtra('onclick="this.form.elements.operator.value=\'update\'"');
		$button_tray->addElement( $butt_update );

		$butt_delete = new XoopsFormButton( '', 'op', _MD_POPGEN_DELETE, 'submit' );
//		$butt_delete->setExtra('onclick="this.form.elements.operator.value=\'del\'"');
		$button_tray->addElement( $butt_delete );

		$butt_clear = new XoopsFormButton( '', '', _MD_POPGEN_CANCEL, 'reset' );
		$button_tray->addElement( $butt_clear );
/*
		$butt_cancel = new XoopsFormButton( '', '', _MD_POPGEN_CANCEL, 'button' );
		$butt_cancel->setExtra('onclick="history.go(-1)"');
		$button_tray->addElement( $butt_cancel );
*/
        $form -> addElement( $button_tray );
	

?>