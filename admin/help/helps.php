<?php
########################################################
#  Admin version 1.1 pour Xoops 2.0.x	       #
#  						       #
#  © 2005, Solo ( www.wolfpackclan.com/wolfactory )    #
#  						       #
#  Licence : GPL 	         		       #
########################################################
defined( 'XOOPS_ROOT_PATH' )?'':header('Location: ./');

 $i=0;
 $main_val_array=array();
 
 $main_val_array['introduction']  =  array( ''      => 'Voici la liste des aides disponibles au travers du module. Pour visualiser ces aides, cliquer sur <b>[+][Aide]</b> dans les formulaires d\'édition.' );
 $main_val_array['help'] =  $help_val_array;
// $main_val_array['tips']  =  $tips_val_array;

/* $main_val_array['author word'] =  array( ''      => 'Pour activer votre template personalisée :
 1. copier la template dans le répertoire "templates/include/" ;
 2. mettre le module à jour ;
 3. activer la nouvelle template dans les préférences du module.' );
 */


                  echo'<div align="center">';

 //                 echo '<h1>'.admin_define( $sub ).'</h1>';



$i=0;
foreach ( $main_val_array as $items=>$items_val ) {
                  echo '<table cellspacing="1" cellpadding="3" class="outer" width="80%">';
                  echo '<tr>';
                        echo '<th align="left">';
                        echo admin_define( $items );
                        echo '</th>';
                  echo '</tr>';

 	foreach ( $items_val as $item_lg=>$item_val ) {

                 $item_val = explode('</h3>',$item_val);

                 if( $item_lg ) {
                   echo '<tr>';
                        echo '<td class="head">';
                        echo $item_val[0].'</h3>' ;
                        echo '</td>';
                   echo '</tr>';
                   $colspan = '';
                 } else { $colspan = ' colspan="2"'; }
                 echo '<tr>';
                        echo '<td class="even"'.$colspan.'>';
                        $text = isset($item_val[1])?$item_val[1]:$item_val[0];
                        echo $myts->makeTareaData4Show( $text );
                        echo '</td>';
                  echo '</tr>';

	}

                  echo '</table><p />';
}
                  echo'</div><p />';

//                  echo Admin_CloseTable();
?>