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
 	$com_val_array =  array( 
                                 'description'  => 'Description',
                                 'num'          => 'Nombre',
                                 'menu'         => 'Menu',
                                 'redir'        => 'Redirections',
                                 'all'          => 'Tous',
                                 'message'      => 'Message',

                                 'name'        => 'Popgen',
  	                         'dsc'         => 'Module de gestion de menus',
  	                         'clone'       => 'Cloner',
  	                         'submit'      => 'Envoyer',
  	                         'perm'        => 'Blocs & Permissions',
  	                         'block'       => 'Blocs',
  	                         'utils'       => 'Utilitaires',

  	                         'index'       => 'Index',
  	                         'edit'        => 'Edition',
  	                         'help'        => 'Aide',
  	                         'settings'    => 'Paramètres',
  	                         'item'        => 'Item',
  	                         'meta'        => 'Meta',
                                 'templates'   => 'Templates',

  	                         'indexdsc'       => 'Paramètres de la page d\'index du module.',
  	                         'helpdsc'        => 'Aide du module',
  	                         'settingsdsc'    => 'Liste de tous les paramètres généraux du module',
  	                         'templatesdsc'   => 'Gestionnaire de templates',
  	                         'metadsc'        => 'Paramètres des metas du module.',

  	                         'index_dsc'       => 'Retourner à la page d\'accueil du module.',
  	                         'image_dsc'       => 'Ajouter, supprimer, modifier une image.',
  	                         'block_dsc'       => 'Paraméter un bloc.',
  	                         'perm_dsc'        => 'Paramétrer les permissions d\'accès',
  	                         'settings_dsc'    => 'Paramétrer les préférences générales du module.',
  	                         'templates_dsc'   => 'Gestionnaire de templates',
  	                         'utils_dsc'       => 'Cloner le module.',
  	                         'help_dsc'        => 'Accéder à l\'aide.',
  	                         'redir_dsc'       => 'Gestion des redirections'
                                 );

// Modinfo values
 	$pref_val_array =  array(
 	                          'mode_list_image'        => 'Images',
 	                          'mode_list_select'       => 'Boîte de sélection',
 	                          'mode_list_ul'           => 'Liste à puce',

 	                          'welcome'                => '1. Cliquez sur le bouton "Parcourir"
2. Sélectionnez une image (.jpg ou .png) d\'une annonce (ou autre) sur votre disque dur.
3. Cliquez sur "Valider".
4.Attendez le chargement de la page...
|
Deux possibilités :

1. Avec un éditeur wysiwyg, copier-coller le contenu directement dans la page d\'édition, en sélectionnant le contenu à l\'aide votre souris.
2. Pour récupérer le code \'html\' (c-à-d l\'url de l\'image et tout le code qui génère l\'animation :<ul><li>Cliquer sur le "[-] Voir le code";</li><li>Cliquer sur le bouton "<i>Copier le code</i>".</li><li>Copier le code (clique droit de la souris, copier ou CTRL-C) avec Firefox. Sinon, avec Internet Explorer le texte est déjà en mémoire;</li><li>Coller le code tel quel dans l\'éditeur de texte;</li></ul>
|',
 	                          'metakeywords'           => '',
 	                          'metadescription'        => '',

  	                         'max'                     => 'Taille des images',
  	                         'thumb'                   => 'Vignette',
  	                         'url'                     => 'Adresse',
  	                         'code'                    => 'Code',
  	                         'options'                 => 'Options',
  	                         'msg'                     => 'Message',

  	                         'center'                  => 'Centre',
  	                         'left'                    => 'Gauche',
  	                         'right'                   => 'Droite',
  	                         'none'                    => ' ',

  	                         'default_wmp'                  => 'Windows Media Player',
  	                         'default_qt'                    => 'Quick Time',
  	                         'default_ram'                   => 'RAM',
  	                         'default_fl'                    => 'FLV',
  	                         'default_div'                   => 'DIV',
  	                         'div'                           => 'DIV',

  	                         'ddesc'                   => 'Texte par défaut',
  	                         'click'                   => 'Cliquer pour agrandir',
  	                         'imgoptions'              => 'Options des images'
                                 );

// Settings values
 	$sett_val_array =  array( 'banner'                 => 'Bannière',
 	                          'bannerdsc'                 => 'Url de la bannière à afficher sur tout le module.',
 	                          'bannerhlp'                 => 'Laisser vide pour ne rien afficher. Format images uniquement (.jpg, .gif, etc.).',

 	                          'background'             => 'Image de fond',
 	                          'backgrounddsc'             => 'Url de l\'image de fond à afficher sur tout le module.',
 	                          'backgroundhlp'             => 'Laisser vide pour ne rien afficher. Format images uniquement (.jpg, .gif, etc.).',

 	                          'display'                 => 'Affichage',
 	                          'displaydsc'                 => 'Informations à afficher par défaut.',
 	                          'dispalyhlp'                 => 'Active ou désactive l\'affichage des infos par défaut(.jpg, .gif, etc.).',

 	                          'prefix'                 => 'Préfix',
 	                          'prefixdsc'                 => 'Préfix du nom de l\'image.',
 	                          'prefixhlp'                 => '',

 	                          'defdesc'                 => 'Description du média',
 	                          'defdescdsc'                 => 'Description par défaut des médias.',
 	                          'defdeschlp'                 => '',

 	                          'mode'                   => 'Mode d\'affichage',
 	                          'modedsc'                   => 'Mode d\'affichage par défaut de la page d\'accueil du module.',

 	                          'desc'                   => 'Texte de la page d\'index',
 	                          'descdsc'                   => 'Texte à afficher sur la page d\'index du module.',
 	                          'deschlp'                   => 'Supporte le hmtl et les codes Xoops (smilies et balises). Laisser vide pour ne rien afficher.',

 	                          'perpage'               =>  'Nombre d\'items par page',
 	                          'perpagedsc'                => 'Nombre maximum d\'items à afficher par page.',
 	                          'perpagehlp'                => 'Détermine le nombre d\'informations à afficher par pages du module (liste de menus, de lien, d\'images, etc.) en partie publique et administrative.',

 	                          'thumbmw'                => 'Taille des vignettes',
 	                          'thumbmwdsc'                => 'Défini la largeur et la hauteur des vignettes en px.',
 	                          'thumbmwhlp'                => '',

 	                          'cols'                   => 'Colonnes',
 	                          'colsdsc'                   => 'Nombre de colonnes par défaut.',

                                  'grps'                   => 'Groupes',
                                  'grpsdsc'                   => 'Sélection des groupes utilisateurs.',

                                  'url'                  => 'Adresse',
                                  'urldsc'                  => 'Adresse de redirection (absolue ou relative)',

                                  'message'                => 'Message',
                                  'messagedsc'                => 'Message de redirection ou de page d\'accueil alternative.',

 	                          'color'                  => 'Couleurs des vignettes',
  	                          'thumb_color'            => 'Couleur des vignettes',
 	                          'colordsc'                  => 'Défini la couleur de fond des vignettes.',
 	                          'colorhlp'                  => '',

 	                          'metakeyword'            => 'Mots clés',
 	                          'metakeyworddsc'            => 'Mots clés à utiliser par défaut sur l\'ensemble du module.',
 	                          'metakeywordhlp'            => '',

 	                          'keywords'            => 'Mots clés',
 	                          'keywordsdsc'            => 'Mots clés à utiliser par défaut sur l\'ensemble du module.',
 	                          'keywordshlp'            => '',

 	                          'metadesc'               => 'Meta Description',
                                  'metadescdsc'               => 'Meta Description à utiliser par défaut sur l\'ensemble du module.',
 	                          'metadeschlp'               => '',
 	                          
 	                          'dir'                    => 'Répertoire de stockage',
                                  'dirdsc'                    => 'Répertoire de stockage par défaut utilisé lors de la création d\'une nouvelle page.',
                                  'dirhlp'                    => '',
 	                          
 	                          'redirsearch'            => 'Redirection sur recherche',
 	                          'search'                 => 'Recherche redirigée',
                                  'redirsearchdsc'            => 'Active la redirection vers la recherche interne.',
                                  'redirsearchhlp'            => 'Activer la redirection des visiteurs en provenance des moteurs de recherche vers la page de recherche interne du site, en affichant les résultats basés sur les mots clés de l\'utilisateur.',
                                  
 	                          'buttons'                => 'Boutons admin',
 	                          'buttonsdsc'                => 'Format d\'affichage des boutons d\'administration.',
 	                          'buttonshlp'                => '',
 	                          'image'                        => 'Images',
 	                          'text'                         => 'Texte',
 	                          'button'                       => 'Bouton',
 	                          'select'                       => 'Boîte de sélection',

 	                          'transition'            => 'Transition',
                                  'transitiondsc'             => 'Paramètre de transition des redirections en secondes.',
                                  'transitionhlp'             => '',

 	                          'style'            => 'Style',
                                  'wmp'             => '[PARAM] Window Media Player',
                                  'qt'             => '[PARAM] Quicktime',

 	                          'ram'            => '[PARAM] RAM',
                                  'flash'             => '[PARAM] Flash',
                                  'align'             => 'Alignement'

                                 );

// Settings values
 	$desc_val_array =  array(

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

