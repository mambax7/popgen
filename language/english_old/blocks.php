<?php
//  ------------------------------------------------------------------------ 	//
//                XOOPS - PHP Content Management System    				//
//                    Copyright (c) 2004 XOOPS.org                       	//
//                       <http://www.xoops.org/>                              //
//                   										//
//                  Authors :									//
//						- solo (www.wolfpackclan.com)         	//
//                  Popgen v1.0								//
//  ------------------------------------------------------------------------ 	//

// Common values
 	$com_val_array =  array( 'option'     => 'Options',
  	                         'settings'   => 'Paramètres',
  	                         'item'      => 'Item',

  	                         'admin'      => 'Admin',
  	                         'edit'      => 'Editer',
  	                         'clone'      => 'Dupliquer'
                                 );

// This block menu values
 	$block_val_array =  array( 'tpl'   => 'Template',
  	                           'tpldsc'=> 'Type d\'affichage du bloc.',
  	                           'ul'=> 'Liste à puce',
  	                           'menu'=> 'Menu principal de Xoops',
  	                           'image'=> 'Images *',
  	                           'extended'=> 'Etendu **',

        	                   'display'      => 'Affichage',
        	                   'displaydsc'      => 'Information à afficher',
        	                   'title'      => 'Titre',
        	                   'logo'      => 'Logo',

  	                           'status'   => 'Status',
  	                           'statusdsc'=> 'Status des pages à afficher.',
  	                           'online'=> 'Activé',
  	                           'hidden'=> 'Caché',
  	                           'offline'=> 'Désactivé',

  	                           'description'=> 'Description',
  	                           'descriptiondsc'=> 'Texte de description à afficher dans le block.',

  	                           'max'=> 'Maximum',
  	                           'maxdsc'=> 'Maximum de lien à afficher.',


                                   'order'=> 'Classer par',
                                   'orderdsc'=> 'Attention : liens principaux et sous-liens seront mélangés.',
                                   'weight'=> 'Poids',
  	                           'titleasc'=> 'Ordre alphabétique',
                                   'titledesc'=> 'Ordre alphabétique inverse',
                                   

  	                           'relative'=> 'forcer les liens relatifs',

  	                           'cols'=> 'Colonnes **',
  	                           'colsdsc'=> 'Nombre de colonnes à afficher.',

  	                           'maxwidth'=> 'Taille des vignettes * **',
  	                           'maxwidthdsc'=> 'Taille d\'affichage des vignettes.<br />
                                     (L-H).',
                                   'pix'=> 'pixels',

  	                           'maxtitle'=> 'Longueur des titres',
  	                           'maxtitledsc'=> 'Longueur maximum des titres de lien.',
                                   'char'=> 'caractères',

  	                           'ext'=> 'Extensions * **',
  	                           'extdsc'=> 'Formats autorisés des images à afficher.',
  	                           'ast'=> '* Menus auxquels s\'appliquent ces paramètres.'
                                 );
                                 
// This item values
 	$block_item_array =  array( 'link'       => 'Liens',
 	                           'description' => 'Description',
 	                           'random'      => 'Aléatoire',
 	                           'latest'      => 'Dernier',
 	                           'popular'     => 'Populaire',
 	                           'slideshow'   => 'Diaporama **',
 	                           'select'      => 'Page',
 	                           'selectdsc'   => 'Choix de la page à afficher.',
 	                           'list'        => 'Liste des menus',
 	                           'maxi'        => 'Nombre de lien',
 	                           'maxdsc'      => 'Nombre maximum de lien principaux à afficher dans le bloc.<br />
                                    Attention : cette fonctionnalité désactive les sous-liens !',
 	                           'all'         => '[Tous]',
 	                           'alt_title'   => 'Infobulles'
                                 );

// Render defines
        $item_val_array = array_merge( $com_val_array,
                                       $block_val_array,
                                       $block_item_array
                                      );

 	foreach ($item_val_array as $item_lg=>$item_val) {
                 define(strtoupper('_MB_POPGEN_'.$item_lg),$item_val);
	}
?>