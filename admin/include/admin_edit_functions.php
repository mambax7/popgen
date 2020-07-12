<?php
#################################################################################################################
#                                                                                                               #
#  Admin manager for Xoops 2.0.x	                                                                        #
#  						                                                                #
#  © 2007, Solo ( wolfactory.wolfpackclan.com )                                                                 #
#  Special thanks to Hervé and DuGris for their suggestions     	                                        #
#  Licence : GPL 	         		                                                                #
#                                                                                                               #
#################################################################################################################

if (!defined("XOOPS_ROOT_PATH")) { die("XOOPS root path not defined"); }


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

?>