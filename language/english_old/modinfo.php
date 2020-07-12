<?php
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System    		     //
//                    Copyright (c) 2004 XOOPS.org                           //
//                       <http://www.xoops.org/>                             //
//                   							     //
//                  Authors :						     //
//						- solo (www.wolfpackclan.com)//
//                  Popgen v1.0						     //
//  ------------------------------------------------------------------------ //

// Common values
 	$com_val_array =  array( 'name'        => 'Popgen',
  	                         'dsc'         => 'Module de gestion de menus',
  	                         'clone'       => 'Cloner',
  	                         'submit'      => 'Envoyer',
  	                         'menu'        => 'Menu',
  	                         'link'        => 'Liens',
  	                         'query'        => 'Requêtes',
  	                         'block'        => 'Blocs',
  	                         'utils'        => 'Utilitaires',

  	                         'index'       => 'Index',
  	                         'sitemap'     => 'Plan du site',
  	                         'edit'        => 'Edition',
  	                         'help'        => 'Aide',
  	                         'settings'    => 'Paramètres',
  	                         'item'        => 'Item',
  	                         'meta'        => 'Meta',
  	                         'slideshow'   => 'Diapo',

  	                         'indexdsc'       => 'Paramètres de la page d\'index du module.',
  	                         'editdsc'        => 'Paramètres d\'édition des pages du module.',
  	                         'helpdsc'        => 'Aide du module',
  	                         'settingsdsc'    => 'Liste de tous les paramètres généraux du module',
  	                         'itemdsc'        => 'Paramètres des pages du module.',
  	                         'metadsc'        => 'Paramètres des metas du module.',
  	                         'slideshowdsc'   => 'Paramètres du mode diaporama.',

  	                         'index_dsc'       => 'Retourner à la page d\'accueil du module.',
  	                         'menu_dsc'        => 'Ajouter, supprimer, dupliquer, éditer un menu.',
  	                         'link_dsc'        => 'Ajouter, supprimer, dupliquer, éditer un lien.',
  	                         'query_dsc'       => 'Ajouter, supprimer, dupliquer, éditer une requête dans la base de donnée.',
  	                         'image_dsc'       => 'Ajouter, supprimer, modifier une image.',
  	                         'template_dsc'    => 'Personnaliser les templates, feuilles de style et script d\'un menu.',
  	                         'block_dsc'       => 'Paraméter un bloc.',
  	                         'settings_dsc'    => 'Paramétrer les préférences générales du module.',
  	                         'utils_dsc'       => 'Cloner le module.',
  	                         'help_dsc'        => 'Accéder à l\'aide.'
                                 );

// Modinfo values
 	$pref_val_array =  array( 'mode_clickshow'        => 'Click & Show',
 	                          'mode_galery'           => 'Galerie',
 	                          'mode_panoramic'        => 'Panoramique 360°',
 	                          'mode_rollshow'         => 'Déroulante',
 	                          'mode_scrollshow'       => 'Défilante',
 	                          'mode_slideshow'        => 'Diaporame 1',
 	                          'mode_slideshow_II'     => 'Diaporame 2',
 	                          'mode_slideshow_moz'    => 'Diaporame 3 (Mozilla)',
 	                          'mode_table'            => 'Tableau',
                                  'mode_highslide'        => 'Highslide',
 	                          'mode_test'             => '* Valeurs',

 	                          'image'                 => 'Images',
 	                          'imagedsc'              => 'Afficher les images dans l\index des pages',
 	                          'mode_item_thumb'        => 'Vignettes',
 	                          'mode_item_slideshow'    => 'Diaporama',

 	                          'display_none'           => '- Aucune -',
 	                          'display_images'         => 'Vignettes',
 	                          'display_select'         => 'Boîte de sélection',
 	                          'display_ul'             => 'Liste à puce',
 	                          
 	                          'mode_menu_extended'     => 'Edtendu',
 	                          'mode_menu_image'        => 'Vignettes',
 	                          'mode_menu_select'       => 'Boîte de sélection',
 	                          'mode_menu_menu'         => 'Menu principal',
 	                          'mode_menu_ul'           => 'Liste à puce',

 	                          'mode_list_image'        => 'Images',
 	                          'mode_list_select'       => 'Boîte de sélection',
 	                          'mode_list_ul'           => 'Liste à puce',

 	                          'welcome'                => '',
 	                          'metakeywords'           => '',
 	                          'metadescription'        => '',

 	                          'display_thumb'          => 'Vignette',
 	                          'display_description'    => 'Description',
 	                          'display_admin'          => 'Liens admin',

 	                          'infobulle'              => 'Infobulles',
 	                          'infobulledsc'           => 'Forcer l\'affichage des infobulles',

 	                          'blocks'                 => 'Nombre de blocs',
 	                          'blocksdsc'              => 'Définir le nombre de bloc actifs.',

 	                          'form_dhtml'             => 'DHTML',
 	                          'form_compact'           => 'Compact',
 	                          'form_htmlarea'          => 'HTML',
 	                          'form_koivi'             => 'Koivi',
 	                          'form_inbetween'         => 'Inbetween',
 	                          'form_tinyeditor'        => 'Tiny Editor',
 	                          'form_spaw'              => 'Spaw',
 	                          'form_fck'               => 'FCK Editor',

 	                          'deactivated'            => 'Désactivé',
 	                          'all'                    => 'Tous'
                                 );

// Settings values
 	$sett_val_array =  array( 'banner'                 => 'Bannière',
 	                          'background'             => 'Image de fond',
 	                          'activation'             => 'Pages actives',
 	                          'desc'                   => 'Texte de la page d\'index',
 	                          'display'                => 'Infos affichées',
 	                          'cols'                   => 'Colonnes',
 	                          'item_list'              => 'Liste des pages',
 	                          'maximage'               => 'Image par page',
 	                          'perpage'               =>  'Nombre d\'items par page',

 	                          'thumbmw'                => 'Taille des vignettes',
 	                          'color'                  => 'Couleurs des vignettes',
                                  'thumbstyle'             => 'Bordures des vignettes',

 	                          'imagemw'                => 'Taille des vignettes',

 	                          'main'                   => 'Page d\'accueil',
 	                          'mode'                   => 'Template',
 	                          'template'               => 'Templates',
 	                          'dispsm'                 => 'Affichge des templates',
 	                          'edit_mode'              => 'Activer le mode "Editon de template"',
 	                          'selectmode'             => 'Templates disponibles',
 	                          'text'                   => 'Texte',
 	                          'button'                 => 'Bouton',
 	                          'select'                 => 'Boîte de sélection',
 	                          'buttons'                => 'Boutons admin',
 	                          'buttondsc'              => 'Format d\'affichage des boutons d\'administration.',

 	                          'item_name'              => 'Nom des items',
 	                          'metakeyword'            => 'Mots clés',
 	                          'metadesc'               => 'Meta Description',

 	                          'tip'                    => 'Afficher les astuces',
 	                          'dir'                    => 'Répertoire de stockage',
 	                          'edit_description'       => 'Texte par défaut',
 	                          'wysiwyg'                => 'Editeur de texte',
 	                          'ss'                     => 'Diaporama',
 	                          'urw'                    => 'URL Rewriting'
                                 );

// Settings values
 	$desc_val_array =  array( 'bannerdsc'                 => 'Url de la bannière à afficher sur tout le module.',
 	                          'backgrounddsc'             => 'Url de l\'image de fond à afficher sur tout le module.',
 	                          'activationdsc'             => 'Liste des pages actives.',
 	                          'textdsc'                   => 'Texte à afficher sur la page d\'accueil du module',
 	                          'displaydsc'                => 'Liste des informations à afficher en page d\'accueil du module.',
 	                          'colsdsc'                   => 'Nombre de colonnes souhaitées pour l\'affichage des vignettes.',
 	                          'item_listdsc'              => 'Mode d\'affichage de la liste des autres pages disponibles du module. ',
 	                          'maximagedsc'               => 'Nombre maximum d\'images à afficher par page.',
 	                          'perpagedsc'                => 'Nombre maximum d\'items à afficher par page.',

 	                          'thumbmwdsc'                => 'Défini la largeur et la hauteur des vignettes en px.',
 	                          'imagemwdsc'                => 'Défini la largeur et la hauteur maximum des images en px.',

 	                          'colordsc'                  => 'Défini la couleur de fond des vignettes',
  	                          'thumbstyledsc'             => 'Défini le style des bordure de vignette',

 	                          'maindsc'                   => 'Défini la page d\'accueil par défaut du module. Peut être une url externe ou l\'ID d\'une des pages du module.',
 	                          'modedsc'                   => 'Mode d\'affichage par défaut du module.',
 	                          'dispsmdsc'                 => 'Active ou non la liste de choix des différents modes d\'affichage des pages du module.',
 	                          'selectmodedsc'             => 'Active les différentes modes d\'affichages des pages du module. Attention : tous les modes sont toujours utilisable ! Ce paramètre ne défini que les modes disponibles dans la boîte de sélection des modes disponibles côté utilisateur. ',
 	                          'extdsc'                    => 'Type d\'extention d\'image disponible dans le module.',

 	                          'item_namedsc'              => 'Nom de remplacement pour le terme \'Item\'.',
 	                          'metakeyworddsc'            => 'Mots clés à utiliser par défaut sur l\'ensemble du module.',
 	                          'metadescdsc'               => 'Meta Description à utiliser par défaut sur l\'ensemble du module',

 	                          'dirdsc'                    => 'Répertoire de stockage par défaut utilisé lors de la création d\'une nouvelle page.',
 	                          'edit_descriptiondsc'       => 'Texte par défaut utilisé lors de la création d\'une nouvelle page.',
 	                          'wysiwygdsc'                => 'Défini le type d\'editeur utilisé par le module. Attention : s\'assurer que l\'éditeur est disponible sur le site (voir utilitaires du module). ',
 	                          'ssdsc'                     => 'Paramètre de transition des diaporamas en secondes. [Durée d\'affichage|Temps de transition]',
 	                          'urwdsc'                    => 'Paramètre de l\'url rewriting du module.
                                   <br />Défini le nombre de caractères minimum 
                                   <br />à employer pour générer les mots utilisés dans l\'adresse de la page. '
                                 );

// Render defines
        $item_val_array = array_merge( $com_val_array,
                                       $pref_val_array,
                                       $sett_val_array,
                                       $desc_val_array );

 	foreach ($item_val_array as $item_lg=>$item_val) {
                 define(strtoupper('_MI_POPGEN_'.$item_lg),$item_val);
	}
?>

