<?php
/**
* Module: clone
* Licence : GPL
* Authors :
*           - solo (http://www.wolfpackclan.com)
*/
$def_menu = 'index.php?admin=utils&sub=clone';
                $ops = array(       'op'             =>  '',
                                    'type_clonage'   =>  '',
                                    'clone'          =>  ''
                                    );
// include_once('include/admin_op_retrieve.php');

                foreach( $ops as $op_name=>$op_value ) {

                                  if (!isset($_POST[$op_name])) {
                                      $$op_name       = isset($_GET[$op_name]) ? $_GET[$op_name] : $op_value;
                                      if( eregi('\|', $$op_name) ) {
                                        $operator_array = explode('|', $$op_name);
                                        $$op_name = $operator_array;
                                      }
                                  } else {
                                        $$op_name       = $_POST[$op_name];
                                  }
                  }

function popgen_clone()
	{
		global $xoopsConfig, $modify, $xoopsModuleConfig, $xoopsModule, $xoopsDB, $XOOPS_URL, $type_clonage, $def_menu;
                include_once( XOOPS_ROOT_PATH . '/class/xoopsformloader.php' );
		$sform = new XoopsThemeForm( admin_define( 'clone' ), "op", '?admin=utils&sub=clone' );
		$sform -> setExtra( 'enctype="multipart/form-data"' );
		if ($type_clonage == 'cache')
			{
			$help_display = '<tr><td colspan="2" style="background-color:AntiqueWhite;">'.admin_define( 'clone_trouble' ).'</td></tr>';
			}
			else {$help_display = '';}
		$sform -> addElement( $help_display );
		$sform -> addElement( new XoopsFormText( admin_define( 'clone_name' ), 'clone', 12, 12, '' ), TRUE );
		$button_tray = new XoopsFormElementTray( '', '' );
		$hidden = new XoopsFormHidden( 'op', 'clonemodule' );
		$button_tray -> addElement( $hidden );
		$butt_create = new XoopsFormButton( '', '', _SUBMIT, 'submit' );
		$butt_create->setExtra('onclick="this.form.elements.op.value=\'clonemodule\'"');
		$button_tray->addElement( $butt_create );
		$butt_clear = new XoopsFormButton( '', '', admin_define( 'clear' ), 'reset' );
		$button_tray->addElement( $butt_clear );
		$sform -> addElement( $button_tray );
		$sform -> display();
		unset( $hidden );
	 }//end function utilities


/* create a clone in modules folder */
    function cloneFileFolder($path)
    {
      global $patKeys;
      global $patValues;
      global $safeKeys;
      global $safeValues;
      $newPath = str_replace($patKeys[0], $patValues[0], $path); //full new file path
      chmod(XOOPS_ROOT_PATH.'/modules', 0777);
      if (is_dir($path))
      {
// Create new dir
        mkdir($newPath);

// check all files in dir, and process it
        if ($handle = opendir($path))
        {
          while ($file = readdir($handle))
          {
            if ($file != '.' && $file != '..')
            {
              cloneFileFolder("$path/$file");
            }
          }
          closedir($handle);
        }
      }
      else
      {
        if(preg_match('/(.jpg|.gif|.png|.zip)$/i', $path))
        {
          copy($path, $newPath);
        }
        else
        {
// file, read it
          $content = file_get_contents($path);
          $content = str_replace($safeKeys, $safeValues, $content); // Save 'Editor' values
          $content = str_replace($patKeys, $patValues, $content);   // Rename Clone values
          $content = str_replace($safeValues, $safeKeys, $content);  // Restore 'Editor' values
          file_put_contents($newPath, $content);
        }
      }
              chmod(XOOPS_ROOT_PATH.'/modules', 0444);
    }	 

// Check wether the cloning function is available
// work around for PHP < 5.0.x
    if(!function_exists('file_put_contents'))
		{
		function file_put_contents($filename, $data, $file_append = false)
			{
			$fp = fopen($filename, (!$file_append ? 'w+' : 'a+'));
			if(!$fp)
					{
					trigger_error('file_put_contents cannot write in file.', E_USER_ERROR);
					return;
					}
			fputs($fp, $data);
			fclose($fp);
			}//end function file_put_contents
		}//end if

/* -- Available operations -- */
switch ( $op )
{
  case "clonemodule":
  

// Define Cloning parameters : check clone name
      $clone = trim($clone);
      $clone_orig = $clone;
      if ( function_exists('mb_convert_encoding') ) { $clone = mb_convert_encoding($clone, "", "auto"); }
//    $clone = eregi_replace("[[:digit:]]","", $clone);
      $clone = str_replace('-', 'xyz', $clone);
      $clone = eregi_replace("[[:punct:]]","", $clone);
      $clone = str_replace('xyz', '-', $clone);
      $clone = ereg_replace(' ', '_', $clone);

// Check wether the cloned module exists or not
    if ( $clone && is_dir(XOOPS_ROOT_PATH.'/modules/'.$clone))
		{
        redirect_header( $def_menu, 2, admin_define( 'module_exists' ) );
        }

// Define clone naming parameteres
    $module = $xoopsModule->dirname();
 
    if ( $clone )
		{
		$CLONE  = strtoupper(eregi_replace("-","_", $clone));
		$clone  = strtolower(eregi_replace("-","_", $clone));
		$Clone  = ucfirst($clone_orig);
		$MODULE = strtoupper($module);
		$Module = ucfirst($module);

		$patterns = array(
        // first one must be module directory name
        $module  => $clone,
        $MODULE  => $CLONE,
        $Module => $Clone,
        );
		$patKeys = array_keys($patterns);
	    $patValues = array_values($patterns);

	 // Clone everything but 'Editor' - usefull for edito only
     $safepat = array(
      // Prevent unwilling change for wysiwyg functions
      'editor'  => 'editor',
      'EDITOR'  => 'EDITOR',
      'Editor'  => 'Editor',
     );

    $safeKeys = array_keys($safepat);
    $safeValues = array_values($safepat);

function copy_dir ($dir2copy,$dir_paste) {

  global $patKeys;
  global $patValues;
  global $safeKeys;
  global $safeValues;
  global $clone;
  global $module;

	// On vérifie si $dir2copy est un dossier
	if (is_dir($dir2copy)) {
   
			// Si oui, on l'ouvre
			if ($dh = opendir($dir2copy)) {     

					// On liste les dossiers et fichiers de $dir2copy
					while (($file = readdir($dh)) !== false) {
				   
							// Si le dossier dans lequel on veut coller n'existe pas, on le créé
							if (!is_dir($dir_paste))
								{
								$oldumask = umask(0000);
								mkdir ($dir_paste);
								umask($oldumask);
								}
				   
							// S'il s'agit d'un dossier, on relance la fonction récursive
							if(is_dir($dir2copy.$file) && $file != '..'  && $file != '.')
								copy_dir ( $dir2copy.$file.'/' , $dir_paste.$file.'/' );     
							// S'il sagit d'un fichier, on le copie simplement
							elseif($file != '..'  && $file != '.')
						{
								if (eregi($module,$file)) //je cherche le mot 'edito' dans le nom du fichier
									{
									$filedest = eregi_replace($module, $clone, $file); //si je trouve je remplace par le nom du clone
									copy ( $dir2copy.$file , $dir_paste.$filedest );//et je copie le fichier avec le bon nom
									$file = $filedest;
									}
									else copy ( $dir2copy.$file , $dir_paste.$file );

								if(!preg_match('/(.jpg|.gif|.png|.zip)$/i', $dir_paste.$file))
								{
							  $content = file_get_contents($dir_paste.$file);
							  $content = str_replace($safeKeys, $safeValues, $content); // Save 'Editor' values
							  $content = str_replace($patKeys, $patValues, $content);   // Rename Clone values
							  $content = str_replace($safeValues, $safeKeys, $content);  // Restore 'Editor' values
							  file_put_contents($dir_paste.$file, $content);
								}
						}
					}
			// On ferme $dir2copy
			closedir($dh);
			}
	}       
}

$dir2copy = '../../'.$module.'/';
$dir_paste = '../../../cache/'.$clone.'/';

// Create clone

$module_dir = XOOPS_ROOT_PATH.'/modules';
$fileperm = fileperms($module_dir);
if ( @chmod($module_dir, 0777) )
   {
	cloneFileFolder('../../'.$module);
	chmod(XOOPS_ROOT_PATH.'/modules', $fileperm);
	redirect_header( "../../system/admin.php?fct=modulesadmin&op=install&module=".$clone, 1, admin_define( 'cloned' ) );
	exit();
   }

	copy_dir ($dir2copy,$dir_paste);
	redirect_header( $def_menu.'&type_clonage=cache', 1, admin_define( 'cloned' ) );
	exit();
    }//end "if $clone"
	else {
         redirect_header( $def_menu, 1, admin_define( 'notcloned' ) );
         exit();
         }
    break;

  case "utilities":
  	default:
          popgen_clone();
          echo '<p />';
    break;

}

?>