<?php
/**
* Module: Admin
* Licence : GPL
* Authors :
*           - solo (http://www.wolfpackclan.com)
*/


// Define here your operator list + the default values
$ops = array(       'op'            =>      'new',
                    'image_select'   =>      '',
                    'thumb_gen'      =>      '',
                    'width'          =>      0,
                    'height'         =>      0,
                    'text'           =>      '',
                    'backgroundcolor'=>      $xoopsModuleConfig['image_thumb_color'],
                    'image_file'     =>      '',
                    'dir_select'     =>      $xoopsUser->uid(),
                    'dir_type'       =>      'images',
                    'startart'       =>      0
                    );
 include_once('include/admin_op_retrieve.php');

 $image_dir = $main_dir . $dir_select. '/'.$dir_type.'/';
 $thumb_dir = $dir_type!='images'?
              $main_dir . $dir_select. '/'.$dir_type.'/':
              $main_dir . $dir_select. '/thumbs/';
 $media_dir = $main_dir . $dir_select. '/medias/';
 $div_dir   = $main_dir . $dir_select. '/div/';

 $def_menu = $startart?$def_menu.'&startart='.$startart:$def_menu;
 $def_menu = $dir_select!=$xoopsUser->uid()?$def_menu.'&dir_select='.$dir_select.'&dir_type='.$dir_type:$def_menu;

// So, what are we doing now?
switch( $op )
  {
   case ( $op=='new' ):
  	include (XOOPS_ROOT_PATH.'/class/xoopsformloader.php');
        include_once('thumb_gen/thumb_gen_infos.php');

 	  $dir_array = XoopsLists :: getDirListAsArray(XOOPS_ROOT_PATH . '/' . $main_dir);
   	  $dir_array = array_filter($dir_array, "is_numeric");
   	  $user_array=array( 'dir_select=all&dir_type=images' => _POSTANON . ' [' . _MD_POPGEN_IMAGES . ']',
                             'dir_select=all&dir_type=medias' => _POSTANON . ' [' . _MD_POPGEN_MEDIAS . ']',
                             'dir_select=all&dir_type=div'    => _POSTANON . ' [' . _MD_POPGEN_DIV . ']');
          foreach( $dir_array as $user_id ) {
                   $user_array['dir_select='.$user_id.'&dir_type=images'] = XoopsUser::getUnameFromId($user_id) . ' [' . _MD_POPGEN_IMAGES . ']';
                   $user_array['dir_select='.$user_id.'&dir_type=medias'] = XoopsUser::getUnameFromId($user_id) . ' [' . _MD_POPGEN_MEDIAS . ']';
                   $user_array['dir_select='.$user_id.'&dir_type=div']    = XoopsUser::getUnameFromId($user_id) . ' [' . _MD_POPGEN_DIV . ']';
          }

	$form = new XoopsThemeForm(_MD_POPGEN_IMAGEDIR . ' [<a href="../../../userinfo.php?uid='.$dir_select.'">'.XoopsUser::getUnameFromId($dir_select).'</a>]: ' . $image_dir, '', '');
        $select_form = new XoopsFormSelect( _MD_POPGEN_DIRSELECT, 'dir_select', 'dir_select='.$dir_select.'&dir_type='.$dir_type, count($dir_array)>=10?5:1 );
        $select_form->setExtra( 'onchange="location=\'index.php?admin=images&\'+this.options[this.selectedIndex].value"' );
        $select_form->addOptionArray( $user_array );
        $form->addElement( $select_form );

	include ('form/imageform.inc.php');
        $form->display();
    break;


  case ( $op && !$image_select && !$_FILES['image_file'] ):
     default:
        redirect_header($def_menu, 1, _MD_POPGEN_NODATA );
        exit();
   break;


  case ( $op==_MD_POPGEN_UPLOAD && $_FILES['image_file'] ):
  
             include_once('thumb_gen/functions_upload_images.php');
             foreach ($_FILES as $keyname => $fileup) {
               if( $keyname) {
               $error = thumb_gen_uploading_image( $keyname, XOOPS_ROOT_PATH . '/'.$image_dir, '1024|2048|100000' );
               $upload = $error?$error:_MD_POPGEN_UPLOADED;
               redirect_header($def_menu, 2, $upload );
               }
             }

        exit();
    break;


// Delete a data
  case ( $op==_MD_POPGEN_DELETE && $image_select ):

       foreach( $image_select as $image ) {
        unlink( XOOPS_ROOT_PATH . '/'.$image_dir.$image );
        if( file_exists(XOOPS_ROOT_PATH . '/'.$thumb_dir.$image )) {
            unlink( XOOPS_ROOT_PATH . '/'.$thumb_dir.$image );
        }
        if( file_exists(XOOPS_ROOT_PATH . '/'.$thumb_dir.'orig/'.$image )) {
            unlink( XOOPS_ROOT_PATH . '/'.$thumb_dir.'orig/'.$image );
        }
       }

        redirect_header($def_menu, 1, _MD_POPGEN_DELETED );
        exit();
    break;



// Resize a data
  case ( $op==_MD_POPGEN_UPDATE ):

       if( $image_select ) {
       include('thumb_gen/thumb_gen_'.$thumb_gen.'.php');

       foreach( $image_select as $image ) {
       if( ereg('.jpg', $image) ||
           ereg('.jpeg',$image) ||
           ereg('.gif', $image) ||
           ereg('.png', $image)  ) {
                $image_url = '../../../'.$image_dir.$image;
                $thumb_url = '../../../'.$thumb_dir.$image;
                $image_orig_url = '../../../'.$image_dir.'orig/'.$image;

             if( !file_exists($image_orig_url) && ($dir_type=='medias' || $dir_type=='div') ) {
                     copy($image_url, $image_orig_url); } elseif ($dir_type=='medias' || $dir_type=='div') {
                     copy($image_orig_url, $image_url); }
             $image_url = $dir_type=='medias' || $dir_type=='div'?$image_orig_url:$image_url;

             if( $width || $height || $thumb_gen!='normal' ) {

                if($thumb_gen=='normal')        { $i = new imagethumbnail(); }
        	if($thumb_gen=='rounded')       { $i = new imagethumbnail_corners(); }
        	if($thumb_gen=='blackandwhite') { $i = new imagethumbnail_blackandwhite(); }
        	if($thumb_gen=='dropshadow')    { $i = new imagethumbnail_dropshadow(); }
        	if($thumb_gen=='grad')          { $i = new imagethumbnail_grad(); }
	        if($thumb_gen=='info')          { $i = new imagethumbnail_info(); }

                $i->open( $image_url );
        	if( $width )  { $i->setX($width);  } else { $i->setX(0); }
        	if( $height ) { $i->setY($height); } else { $i->setY(0); }

//	        if($thumb_gen=='normal')
        	if($thumb_gen=='rounded')       { $i->setColor(ereg_replace('#','',$backgroundcolor)); $i->clipcorners(); }
        	if($thumb_gen=='blackandwhite') { $i->blackandwhite(); }
        	if($thumb_gen=='dropshadow')    { $i->setColor(ereg_replace('#','',$backgroundcolor)); $i->dropshadow(); }
        	if($thumb_gen=='grad')          { $i->setColor(ereg_replace('#','',$backgroundcolor)); $i->grad(); }
	        if($thumb_gen=='info')          { $i->setColor(ereg_replace('#','',$backgroundcolor)); $i->info($text); }

         	$i->imagejpeg($thumb_url);
          } else { copy($image_url, $thumb_url); }
          }

        }


        redirect_header($def_menu, 1, _MD_POPGEN_UPDATED );
        exit(); 
        } else {
          redirect_header($def_menu, 1, _MD_POPGEN_NODATA );
          exit();
        }
    break;
}

?>