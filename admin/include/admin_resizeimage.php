<?php

// Types d'images utilisés pour le 'switch' un peu plus loin
define('FORMAT_GIF',1);
define('FORMAT_JPEG',2);
define('FORMAT_PNG',3);
define('FORMAT_BMP',4);

// dimensions critiques
define('YMIN',0);
define('YMAX',1000);
define('XMIN',0);
define('XMAX',1000);

// dimensions par défaut
define('DEFAUTX',150);
define('DEFAUTY',150);

function popgen_thumb_resize ( $image_list, $xmax='200', $ymax='150', $thumb='thumb/', $image='', $fond_couleur='#FFFFFF', $force=0 ) {
/*
$xmax => largeur maximale de l'image
$ymax => hauteur maximale de l'image
=> soit une taille en px soit 'none' pour dire qu'on veut garder la même
$thumb => dossier dans lequel doit être créé la miniature : format dossier/ (ne pas oublier le / )
$image => l'image à miniaturiser
$name => le nom de l'image
$fond_couleur => couleur de fond de l'image au format hexadecimal RRR-VVV-BBB
*/

$data['total'] = count($image_list); $count=0; $ii=0;
if( $force==1 ) {
  popgen_delete_files( $thumb );
   } elseif( $force==2 ) {
     Global $extensions;
  popgen_create_dir( $image );
  popgen_move_files( $image, $image.'orig/' );
   }

foreach($image_list as $i=>$image_data) {

$data['count'] = ++$count;
        // on essaie d'ouvrir le fichier uniquement en lecture (pour être sur qu'il existe) :
        $img  = $image.$image_data['image']['file'];
        $thb  = $thumb.$image_data['image']['file'];
        $name = $image_data['image']['file'];

        if(!is_file( $thb ) || $force ) {  // Le fichier n'existe pas ou je force la recréation
        if(++$ii > 10) { Return $data; }
        if(@$file=fopen($img,'r') ) {
        
          // si le fichier a bien été ouvert, on verifie que c'est bien une image
          // getimagesize renvoie plusieurs infos de l'image (dimensions, type etc...) et FALSE
          // si le fichier n'est pas une image :
              if(list($largeur,$hauteur,$extention) = @getimagesize(htmlentities($img))) {
                  // si c'est bien une image, on teste les valeurs voulues pour la miniature
                  // largeur
                  if((isset($xmax) && !empty($xmax) && $xmax>XMIN && $xmax<XMAX)) {
                    $xm=$xmax;
                  } elseif($xmax=='none') {
                  // si la largeur n'est pas definie on garde la même
                     $xm=$largeur;
                  } else {
                     $xm=DEFAUTX; // largeur par defaut (au cas ou)
                  }


                  // hauteur
                  if((isset($ymax) && !empty($ymax) && $ymax>YMIN && $ymax<YMAX)) {
                  $ym=$ymax;
                  } elseif($ymax=='none') {
                  // si la hauteur n'est pas definie on garde la même
                  $ym=$hauteur;
                  } else {
                  $ym=DEFAUTY; // largeur par defaut (au cas ou)
                  }
                  

                  // creation de la miniature :
                      // test de l'extention :
                      if(in_array($extention,array(1,2,3))) {
                      // si l'extention est bonne on continue
                          switch($extention) {
                          case FORMAT_GIF: // GIF
                          $im=imagecreatefromgif($img) or die('probleme de librairie');
                          break;
                          case FORMAT_JPEG: //JPEG
                          $im=imagecreatefromjpeg($img) or die('probleme de librairie');
                          break;
                          case FORMAT_PNG: // PNG
                          $im=imagecreatefrompng($img) or die('probleme de librairie');
                          break;
                          case FORMAT_BMP: //BMP
                          $im=imagecreatefrombmp($img) or die('probleme de librairie');
                          break;
                          }
                      // test des dimensions :
                      // si l'image est trop large ou trop haute
                      if($largeur>$xm || $hauteur>$ym) {
                      // coeficient de proportionnalité (pour garder les proportions dans la reduction de l'image)
                      // la reduction ne se fait que pour des dimensions finales entieres donc on arrondis le resultat
                      if ($largeur && ($largeur > $hauteur)) {
                      // image plus large que haute
                      $nhauteur = ceil(($hauteur * $xm)/$largeur);
                      $nlargeur=$xm;
                      } else {
                      // image plus haute que large
                      $nlargeur = ceil(($largeur *$ym)/$hauteur);
                      $nhauteur=$ym;
                      }
                      } elseif($largeur<$xm || $hauteur<$ym) {
                      if($largeur<=$xm) {
                      $nlargeur=$largeur;
                      $xm=$largeur;
                      }
                      if($hauteur<=$ym) {
                      $nhauteur=$hauteur;
                      $ym=$hauteur;
                      }
                      } else {
                      $nlargeur=$largeur;
                      $nhauteur=$hauteur;
                      }
                      // calcul de la position de l'image sur la miniature (centrée si l'image finale est plus grande)
                      $py=($ym-$nhauteur)/2;
                      $px=($xm-$nlargeur)/2;
                      
                      // miniaturisation

                      // image sur fond de couleur definie par l'utilisateur :
                      if(isset($fond_couleur) && !empty($fond_couleur)) {
                      $src=imagecreatetruecolor($xm,$ym) or die('probleme de librairie');
                      list($fond_rouge,$fond_vert,$fond_bleu) = explode('-',popgen_html2rgb($fond_couleur));
                      $fond=imagecolorallocate($src,$fond_rouge,$fond_vert,$fond_bleu) or die('probleme de librairie');

                      // on dessine un rectangle de la couleur choisit par l'utilisateur (couleur de fond)
                      imagefilledrectangle($src,0,0,$xm,$ym,$fond) or die('probleme de librairie');
                      
                      // on créé la miniature
                      imagecopyresampled($src,$im,$px,$py,0,0,$nlargeur,$nhauteur,$largeur,$hauteur) or die('probleme de librairie');
                      } else {
                      // Aucune couleur de fond definie!
                      return false;
                      }
                  } else {
                  //L'image doit être au format GIF, JPEG ou PNG !
                  return false;
                  }
          } else {
          // Le fichier n'est pas une image !
          return false;
          }
        } else {
        return false;
        }
        // dans le cas ou vous voudriez sauvegarder puis afficher, ne pas inverser cet ordre !
        // sauvegarde de l'image :
        
        $extention==1?imagegif($src,$thumb.$name):'';
        $extention==2?imagejpeg($src,$thumb.$name):'';
        $extention==3?imagepng($src,$thumb.$name):'';
        $extention==4?imagewbmp($src,$thumb.$name):'';
        }
    }

Return $data;
}



function popgen_html2rgb($color)
{
    if ($color[0] == '#') {
        $color = substr($color, 1);

        if (strlen($color) == 6) {
            list($r, $g, $b) = array($color[0].$color[1],
                                     $color[2].$color[3],
                                     $color[4].$color[5]);
        } elseif(strlen($color) == 3) {
            list($r, $g, $b) = array($color[0], $color[1], $color[2]);
        } else {
            Return '255-255-255';
        }
        $r = hexdec($r); $g = hexdec($g); $b = hexdec($b);
        $r = $r==0?'01':$r;
        $g = $g==0?'01':$g;
        $b = $b==0?'01':$b;
        
        Return $r.'-'.$g.'-'.$b;

    } else {
        Return '255-255-255';
    }
}


function popgen_delete_files( $dir='', $ext='html' ) {

// Get image list
        //Using the opendir function
        $dir_handle = @opendir($dir);
        if( !$dir_handle ) { echo "Unable to open $dir"; } else {
        // Create file array

        //running the while loop for image
        while ( $file = readdir($dir_handle) )
        {
        if( @!eregi(@pathinfo ( $file, PATHINFO_EXTENSION ), $ext) && pathinfo ( $file, PATHINFO_EXTENSION ) ) {
                              unlink($dir.$file);
              } // if pathinfo
         }// while
        
   //closing the directory
        closedir($dir_handle);
        }
Return true;
}


function popgen_move_files( $dir='', $newdir='', $extensions='jpg' ) {
// Global $extensions;
// Get image list
        //Using the opendir function
        $dir_handle = @opendir($dir);
        if( !$dir_handle ) { echo "Unable to open $dir"; } else {
        // Create file array

        //running the while loop for image
        while ( $file = readdir($dir_handle) )
        {
        if( @!eregi(@pathinfo ( $file, PATHINFO_EXTENSION ), $ext) && pathinfo ( $file, PATHINFO_EXTENSION ) ) {
                              copy($dir.$file, $newdir.$file);

              } // if pathinfo
         }// while
        
   //closing the directory
        closedir($dir_handle);
        }
Return true;
}

function popgen_create_dir( $directory='' )
{
//	$thePath = XOOPS_ROOT_PATH . "/modules/'.$xoopsModule->dirname().'/" . $directory . "/";
$thePath = $directory;

	if(@is_writable($thePath)){
		popgen_chmod($thePath, $mode = 0777);
        Return $thePath;
	} elseif(!@is_dir($thePath)) {
    	        popgen_mkdir($thePath);
        Return $thePath;
	} else {
        Return 0;
        }
}

function popgen_mkdir($target)
{
	// http://www.php.net/manual/en/function.mkdir.php
	// saint at corenova.com
	// bart at cdasites dot com
	$final_target = $target;
	if (is_dir($target) || empty($target)) {
		Return true; // best case check first
	}

	if (file_exists($target) && !is_dir($target)) {
		Return false;
	}

	if (popgen_mkdir(substr($target,0,strrpos($target,'/')))) {
		if (!file_exists($target)) {
			$res = mkdir($target, 0777); // crawl back up & create dir tree
			popgen_chmod($target);
			Global $xoopsModule;
		  $logo_file = XOOPS_ROOT_PATH . '/modules/'.$xoopsModule->dirname().'/images/index.html';
		  copy($logo_file, $final_target.'/index.html');
	  	Return $res;
	  }
	}
    $res = is_dir($target);

	Return $res;
}

function popgen_chmod($target, $mode = 0777)
{
	Return @chmod($target, $mode);
}

?>

