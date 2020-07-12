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
 $main_val_array['developpers'] =  array( 'lead'              => 'Benoît P. (Aka Solo71)',
  	                                  'contributor'       => 'Blueteen',
  	                                  'website'           => 'Comptoir des Medias
                                                                 |http://www.comptoir-des-medias.com',
  	                                  'email'             => ''
                                 );
                                 

 $main_val_array['informations'] =  array( 'release date'      => 'April 2008',
  	                                   'status'            => 'RC1',
  	                                   'demo site'         => 'www.arma.com
                                                                  |http://www.arma-sa.com',
  	                                   'official support site'=> 'FR Xoops
                                                        |http://www.frxoops.org',
  	                                   'bug report'        => 'FR Xoops
                                                        |http://www.frxoops.org',
  	                                   'suggestions'       => 'FR Xoops
                                                        |http://www.frxoops.org'
                                 );

 $main_val_array['disclaimer']  =  array( ''      => 'This module comes as is, without any guarantees whatsoever. 
                                                      Although this module is not beta, it is still under active development. 
                                                      This release can be used in a live website or a production environment, but its use is under your own responsibility, which means the author is not responsible.' );

 $main_val_array['author word'] =  array( ''      => 'The "Comptoir des Medias" would like to thank everyone involved in this project.

A big thanks to Blueteen for their feedback on the module.
Thanks to hsalazar who originally created the admin interface the module is using.
Thanks to GiJoe for the blocks and groups management pages. Your code is very usefull to a lot of developers !
Enjoy Popgen !' );
 
 $main_val_array['version history'] =  array( ''  => '
 => Version 2.0 RC1 (2008-04-01)
==================================

- First public release of the module.' );

//                  echo Admin_OpenTable();

                  echo '<div style="text-align:left; margin:16px;">
                        <img src="../images/popgen_slogo.png"
                             alt="" 
                             hspace="0"
                             vspace="0"
                             align="left" 
                             style="margin-right: 10px;" />
                         
                         <div style=" margin-top: 10px;
                                      color: #33538e; margin-bottom: 4px;
                                      font-size: 18px; line-height: 18px;
                                      font-weight: bold;
                                      display: block;">
                              Popgen version 2.0
                         </div>
                         
                         <div style=" line-height: 16px; 
                                      font-weight: bold;
                                      display: block;">
                              By The "Comptoir des Medias" [<a href="http://www.comptoir-des-medias.com" target="_blank">www.comptoir-des-medias.com</a>]
                         </div>
                         <div style=" line-height: 16px; 
                                      display: block;">
                              GNU General Public License (GPL)
                         </div>

                         </div>';


                  echo'<div align="center">';

 //                 echo '<h1>'.admin_define( $sub ).'</h1>';



$i=0;
foreach ( $main_val_array as $items=>$items_val ) {
                  echo '<table cellspacing="1" cellpadding="3" class="outer" width="80%">';
                  echo '<tr>';
                  if( $item_lg ) {
                        echo '<th colspan="2" align="left">';
                  } else {
                        echo '<th align="left">'; 
                  }
                        echo admin_define( $items );
                        echo '</th>';
                  echo '</tr>';

 	foreach ( $items_val as $item_lg=>$item_val ) {

                 $item_val = explode('|',$item_val);

                        echo '<tr>';
                 if( $item_lg ) {
                        echo '<td class="head" width="25%">';
                        echo $item_lg;
                        echo '</td>';
                 }
                        echo '<td class="even">';
                        $text = isset($item_val[1])?' <a href="' . trim($item_val[1]) . '" target="_blank"> '.$item_val[0].'</a>':$item_val[0];
                        echo $myts->makeTareaData4Show( $text );
                        echo '</td>';
                  echo '</tr>';

	}

                  echo '</table><p />';
}
                  echo'</div><p />';

//                  echo Admin_CloseTable();
?>