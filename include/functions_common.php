<?php
/**
* XOOPS - PHP Content Management System
* Copyright (c) 2004 <http://www.xoops.org/>
*
* Licence : GPL
* Authors :
*           - solo (http://www.wolfpackclan.com/wolfactory)
*/

if (!defined("XOOPS_ROOT_PATH")) { die("XOOPS root path not defined"); }

// Check redirections
function popgen_group_access( $settings='', $is_redir=1 ) {
  Global $xoopsModuleConfig, $xoopsUser;

        $user_group  = is_object($xoopsUser) ? $xoopsUser->getGroups() : array(XOOPS_GROUP_ANONYMOUS);
        $settings    = $settings?$settings:$xoopsModuleConfig;

  foreach( $settings as $name => $value ) { if(ereg('redir_grps', $name)) { if( $user_group == $value ) {

           $i=explode('_', $name);
           $url   = 'redir_url_'.$i[2];
           $text  = 'redir_msg_'.$i[2];
           $image = 'redir_image_'.$i[2];

                     if( $settings[$url]=='index.php'
                      || $settings[$url]=='.'
                      ||!$settings[$url] 
                      ||!$is_redir ) { 
                        
                        $settings['text']  = $settings[$text];
                        $settings['image'] = $settings[$image];
                        Return $settings; };

           $settings[$url] = ereg('http', $settings[$url])?$settings[$url]:XOOPS_URL.'/'.$settings[$url];
           if( $settings[$text] ) {
                    redirect_header($settings[$url], $settings['index_transition'], $settings[$text] );
                    exit;
           } {
                    header('Location: ' . $settings[$url]);
                    exit;
           }
    }}}
                        $settings['text']  = $xoopsModuleConfig['index_description'];
                        $settings['image'] = '';
Return $settings;
}

// Referers
function popgen_referer_search() {
 Global $xoopsModule;
	$module  = isset($xoopsModule)?$xoopsModule->getVar('dirname'):'';

   // Get Referers'query if any
   	$url_array = parse_url( getenv("HTTP_REFERER") );
        parse_str($url_array['query'], $variables);

   // Retrieve query's keywords
   	$keywords  =  isset($variables['q'])    ?urldecode($variables['q']):'';
   	$keywords .=  isset($variables['p'])    ?urldecode($variables['p']):'';
   	$keywords .=  isset($variables['query'])?urldecode($variables['query']):'';
   	$keywords  = ereg_replace(' ', '+' , $keywords);

//	$redirect = $keywords?XOOPS_URL.'/search.php?query='.$keywords.'&andor=AND&action=results':FALSE;

	if( $keywords && 
           !ereg('search.php', $_SERVER['PHP_SELF']) && 
           !ereg(XOOPS_URL, getenv("HTTP_REFERER")) ) {
                 header('Status : 301 Moved Permanently');
        	 header('Location: '.XOOPS_URL.'/search.php?query='.$keywords.'&andor=AND&action=results');
        	 exit();
	}

Return False;
}


// Generate Settings drop list
function popgen_select_settings( $max=0, $settings='' ) {
 Global $xoopsModuleConfig;
$i=0; $set=''; $prev_prefix='';
$count = count( $xoopsModuleConfig );
$height= $max&&$count>$max?5:1;
      $set .= '
               <form action="">
               <select size="'.$height.'"
                       name="popgen_settings"
                       onchange="location=this.options[this.selectedIndex].value"
                       style="width:160px;"
               >
               <option value="" selected="selected"></option>
              ';
              
       $settings    = $settings?$settings:$xoopsModuleConfig;
      // ksort( $xoopsModuleConfig );
      foreach( $settings as $name => $value ) {
      
       $prefix = explode('_', $name);

        $set .= $prefix[0]!=$prev_prefix?'
                </optgroup>
                <optgroup label="'.popgen_define( $prefix[0], '_MI' ).'">
                <option value="'.XOOPS_URL.'/modules/popgen/admin/index.php?admin=settings&sub='.$prefix[0].'"
                        style="font-weight:bold;">
                [' . popgen_define( $prefix[0], '_MI' ) . ']
                </option>
                ':'';

        $number = isset($prefix[2])?' ' . $prefix[2]:'';
        $set .= '
        <option value="'.XOOPS_URL.'/modules/popgen/admin/index.php?admin=settings&sub='.$prefix[0].'&num='.$i++.'">';
        $set .= ' - ' . popgen_define( $prefix[1], '_MI' ) . $number;
        $set .= '</option>';
      
        $prev_prefix = $prefix[0];   
      }
        $set .= '</optgroup>';
        $set .= '</select>';
        $set .= '</form>';
              
  Return $set;
}


 function popgen_check_script_file( $file_name, $catid='', $dest_dir, $file_type ) {

 $orignal_file = XOOPS_ROOT_PATH . '/modules/popgen/templates/include/'.$file_name.'/'.$file_type.'_0.'.$file_type;
 $target_file  = XOOPS_ROOT_PATH . '/'.$dest_dir.$file_name.'_'.$catid.'.'.$file_type;
 $edited_file  = XOOPS_ROOT_PATH . '/'.$dest_dir.$file_name.'_0.'.$file_type;

    if( file_exists( $orignal_file ) && !file_exists( $edited_file ) ) { copy( $orignal_file, $edited_file );  }  // Backup original file for edition

    if( file_exists( $orignal_file ) && !file_exists( $target_file ) && !file_exists( $edited_file ) ) {     // Create a new file if no files in cache
      // Open file to read  
        $handle = fopen ($orignal_file, "rb");
        $data = fread ($handle, filesize ($orignal_file));
        fclose ($handle);
        
        $data = ereg_replace('{id}', $catid, $data);
        $data = ereg_replace('{xoops_url}', XOOPS_URL, $data);
        
      
      // Open target file to write
       	$handle = fopen($target_file, 'w+');
		if ($handle) {
			fwrite($handle, $data);
                }
        fclose ($handle);
    }

    if( !file_exists( $target_file ) && file_exists( $edited_file ) ) {     // Use edited file to generate target file
      // Open file to read
        $handle = fopen ($edited_file, "rb");
        $data = fread ($handle, filesize ($edited_file));
        fclose ($handle);
        
        $data = ereg_replace('{id}', $catid, $data);
        $data = ereg_replace('{xoops_url}', XOOPS_URL, $data);

      // Open target file to write
       	$handle = fopen($target_file, 'w+');
		if ($handle) {
			fwrite($handle, $data);
                }
        fclose ($handle);
    }


   if( file_exists( $target_file ) ) {  // Use target file if exists
       $target_file = ereg_replace(XOOPS_ROOT_PATH, '', $target_file); 
       return $target_file; 
       } else { 
       return False;
       }
 }


function popgen_tpl_rename( $file )
{
            $value = str_replace('include/','',$file);
            $value = str_replace('.css','',$value);
            $value = str_replace('.html','',$value);
            $file_name = str_replace('popgen_','',$value);
            $value = str_replace('_',' ',$file_name);
            $name  = @constant(strtoupper('_MI_POPGEN_MODE_' . $value));
            
            $data['file']      = $file;
            $data['file_name'] = $file_name;
            $data['name']      = $name?$name:ucfirst($value);

Return $data;
}

function popgen_define( $name='', $prefix='' ) {
  Global $xoopsModule;
  $prefix = $prefix=='none'?'':$prefix;
  $define_name   = str_replace( '_', ' ',  $name);
  $constant_name = str_replace( ' ', '_',  $name); 

  Return constant( strtoupper( $prefix . '_popgen_' . $constant_name) )?constant( strtoupper( $prefix . '_popgen_' . $constant_name) ):ucfirst( $define_name ) . ' *';
}

// Check url and if on local, wether the destination file exists or not
function popgen_clean_url( $url='', $total=0 )
{
  $urls = array();
  $urls = explode('|', $url);
  $i=0;$ii=0;
  
  // Répertoire ou fichier?
  foreach($urls as $url) {
   // Supprimer les espace superflus
         $url = trim($url);
   // Nettoyer l'url des erreurs d'encodage
        $strip = '\\';               $replace[$strip]        = '/';
        $xoops_url = XOOPS_URL.'/';  $replace[$xoops_url]   = '';
        $url = strtr($url, $replace);

  // Vérifier si l'url redirige vers un répertoire ou un fichier
        $pathinfo = pathinfo($url);
//        if( isset($pathinfo['extension']) ) { $url = $pathinfo['dirname']; }
        $dir = isset($pathinfo['extension'])?0:1;

  // Vérifier que l'url est conforme à l'utilisation
         if(substr($url, -1, 1)!= '/' && substr($url, -1, 1)!= '#' && $dir) {$url = $url.'/';} //   echo $url.' | ';
         if(substr($url, -1, 1)== '/' && !$dir) {$url = substr($url, 0, -1);} //   echo $url.' | ';
         if(substr($url,  0, 1)== '/') {$url = substr($url, 1);}    //   echo $url.' | ';
         
  // Compiler les réulstats
         $urls[$i++] = $url;
}
    // Vérifier le nombre d'occurences
         $count=count($urls); 
         $dif=$total-$count;
         for($ii;$ii<=$dif;$ii++) {
           $urls[$i++]='';
         }
         $url = implode('|', $urls);
   return $url;
}

	/**
	 * Resize a Picture to some given dimensions
	 *
	 * @author GIJOE
	 * @param string $src_path	Picture's source
	 * @param string $dst_path	Picture's destination
	 * @param integer $param_width Maximum picture's width
	 * @param integer $param_height	Maximum picture's height
	 */
	function popgen_resizePicture( $src_path , $dst_path, $param_width , $param_height, $keep_original = false)
	{
		if( ! is_readable( $src_path ) ) {
			return 0 ;
		}

		list( $width , $height , $type ) = getimagesize( $src_path ) ;
		switch( $type ) {
			case 1 : // GIF
				if(!$keep_original) {
					@rename( $src_path, $dst_path ) ;
				} else {
					@copy( $src_path, $dst_path ) ;
				}
				return 2 ;
			case 2 : // JPEG
				$src_img = imagecreatefromjpeg( $src_path ) ;
				break ;
			case 3 : // PNG
				$src_img = imagecreatefrompng( $src_path ) ;
				break ;
			default :
				if(!$keep_original) {
					@rename( $src_path, $dst_path ) ;
				} else {
					@copy( $src_path, $dst_path ) ;
				}
				return 2 ;
		}

		if($param_width > 0 && $param_height > 0) {
			if( $width > $param_width || $height > $param_height ) {
				if( $width / $param_width > $height / $param_height ) {
					$new_w = $param_width ;
					$scale = $width / $new_w ;
					$new_h = intval( round( $height / $scale ) ) ;
				} else {
					$new_h = $param_height ;
					$scale = $height / $new_h ;
					$new_w = intval( round( $width / $scale ) ) ;
				}
				$dst_img = imagecreatetruecolor( $new_w , $new_h ) ;
				imagecopyresampled( $dst_img , $src_img , 0 , 0 , 0 , 0 , $new_w , $new_h , $width , $height ) ;
			}
		}

		if( isset( $dst_img ) && is_resource( $dst_img ) ) {
			switch( $type ) {
				case 2 : // JPEG
					imagejpeg( $dst_img , $dst_path ) ;
					imagedestroy( $dst_img ) ;
					break ;
				case 3 : // PNG
					imagepng( $dst_img , $dst_path ) ;
					imagedestroy( $dst_img ) ;
					break ;
			}
		}

		imagedestroy( $src_img );
		if( ! is_readable( $dst_path ) ) {
			if(!$keep_original) {
				@rename( $src_path , $dst_path ) ;
			} else {
				@copy( $src_path , $dst_path ) ;
			}
			return 3 ;
		} else {
			if(!$keep_original) {
				@unlink( $src_path ) ;
			}
			return 1 ;
		}
	}
	
function popgen_make_thumbs( $thumb_list, $image_list, $thumb_dir, $image_dir ) { 
Global $xoopsModuleConfig, $image_max_size;
    $diff = array_diff($image_list, $thumb_list);
  if( $diff ) {
    foreach( $diff as $file ) {  echo $image_dir . $file;
             popgen_resizePicture( $image_dir . $file,  $thumb_dir . $file, $image_max_size[0], $image_max_size[1], true);
    }

  }

}

?>