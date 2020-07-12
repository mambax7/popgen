<?php
/**
* XOOPS - PHP Content Management System
* Copyright (c) 2001 - 2006 <http://www.xoops.org/>
*
* Module: multiMenu 2.x
* Licence : GPL
* Authors :
*           - solo (http://www.wolfpackclan.com/wolfactory)
*/
// 2.x

// Common values
$main_val_array =  array( 
// commons
                'IMAGE'        => 'Image',
                'ID'           => 'N°',
                'TITLE'        => 'Titre',
                'ADMIN'        => 'Admin',

                'ONLINE'       => 'Activé',
                'OFFLINE'      => 'Désactivé',
                'HIDDEN'       => 'Caché',
                'HIDE'         => 'Cacher',
                'OPTIONS'      => 'Options',
                'UPDATE'       => 'Mettre à jour',
                'NODATA'       => 'Aucune donnée sélectionnée !',
                'SITEMAP'      => 'Plan du site',
                'DESC'         => 'Description',
                'OFF'          => 'En ligne',
                'ON'           => 'Hors ligne',

                'medias'       => 'Médias',
                'div'          => 'Div',
                'dirselect'    => 'Répertoire de stockage',

                'HELP'         => 'Aide',
                'INDEX'        => 'Index',
                'INDEXDSC'     => 'Index des pages',
                'CREDIT'       => '%s est une creation originale du %s.',
                'QUERIES'      => 'Requêtes',
                'MENU'         => 'Menus',
                'LINK'         => 'Liens',
                'URL'          => 'Url',
                'QUERY'        => 'Requête',
                'BLOCKS'       => 'Blocs & Permissions',
                'IMAGES'       => 'Images',
                'SETTINGS'     => 'Préférences',
                'TEMPLATES'    => 'Templates',
                'UTILS'        => 'Utilitaires',
                'STATUS'       => 'Status',
                'EDIT'         => 'Editer',
                'CLONE'        => 'Cloner',
                'CANCEL'       => 'Annuler',
                'SUBMIT'       => 'Enregistrer',
                'DELETE'       => 'Supprimer',
                'OTHER'        => 'Autre :',
                'CSS'          => 'Feuille de style',

// Admin tab menus
                'SETTINGSDSC'  => '1. Sélectionner les préférences générales du module',
                'TEMPLATESDSC' => '2. Gérer les templates',
                'IMAGESDSC'    => '3. Gérer les images',
                'BLOCKSDSC'    => '4. Activer les blocs et permissions d\'accès',
                'UTILSDSC'     => '5. Utilitaire de clonage du module',
                'HELPDSC'      => '6. Aide sur le module.',

// SQL operations
                'INSERTED'     => 'Données créées avec succès.',
                'UPDATED'      => 'Données mises à jour avec succès.',
                'CONFIRM'      => 'Etes-vous certain de vouloir supprimer :',
                'DELETED'      => 'Données supprimées avec succès !',
                'SUREDELETE'   => 'Etes-vous certain de vouloir supprimer ce lien ?',
                'NOTUPDATED'   => 'Impossible de mettre la Base de donné à jour !',


// Images
                'RESIZE'       => 'Redimensionner',
                'UPLOAD'       => 'Téléverser',
                'NEWIMAGE'     => 'Téléverser une nouvelle image',
                'SERVER_CONF'  => 'Infos configuration serveur',
                'XOOPS_VERSION'=> 'Version XOOPS',
                'GRAPH_GD_LIB_VERSION'      => 'Librairie GD',

                'GIF_SUPPORT'  => 'Support GIF',
                'JPEG_SUPPORT' => 'Support JPG',
                'PNG_SUPPORT'  => 'Support PNG',

                'NORMAL'       => 'Normal',
                'ROUNDED'      => 'Bords arrondis',
                'BW'           => 'Noir & Blanc',
                'SHADOW'       => 'Ombré',
                'GRAD'         => 'Dégradé',
                'INFO'         => 'Texte',
                'CHECK_ALL'    => 'Tout sélectionner',

                'THUMBGEN'     => 'Générateur de vignette',
                'TEXT'         => 'Texte',
                'WIDTH'        => 'Largeur',
                'HEIGHT'       => 'Hauteur',
                'BCKCOLOR'     => 'Couleur de fond',
                'DIR'          => 'Répertoire',
                'UPLOADED'     => 'Fichier téléversé avec succès !',
                'NOTUPLOADED'  => 'Une erreure s\'est produite lors du téléversement du fichier !',
                'NOT_CREATED'  => 'Le répertoire de stockage n\'existe pas !',

// Templates
                'TPL'          => 'Template',
                'SCRIPT'       => 'Script',
                'TEMPLATES'    => 'Templates',

// Queries
                'NEW_QUERY'    => 'Créer une requête dans la Base de donnée',
                'EDIT_QUERY'   => 'Editer une requête',
                'TABLE'        => '[BD] Table',
                'QID'          => '[BD] Champ ID',
                'QSUBJECT'     => '[BD] Champ Sujet',
                'QDESCRIPTION' => '[BD] Champ alternatif',
                'QIMAGE'       => '[BD] Champ image',
                'QIMAGEURL'    => 'Répertoire de stockage des images',
                'QURL'         => 'Adresse des liens<br />
<font style="font-weight:normal;">{id} : valeur du champ id</font>',
                'QWHERE'       => '[BD] Conditions<br />
<font style="font-weight:normal;">{date} : heure courante</font>',
                'QORDER'       => '[BD] Ordre d\'affichage des données',
                'QLIMIT'       => 'Nombre maximum de liens à afficher',
                'TROUBLE'      => 'Signal d\'erreur',
                'NEXT'         => 'Etape suivante...',
                'TABLE_CHECK'  => 'Voir la table',

 // Menus
                'NEW_MENU'     => 'Créer un menu',
                'EDIT_MENU'    => 'Editer un menu',
                'ALT_TITLE'    => 'Texte alternatif',
                'IMAGEDIR'     => 'Répertoire de stockages des images',
// Links
                'NEW_LINK'     => 'Créer un lien',
                'EDIT_LINK'    => 'Editer un lien',
                'TYPE'         => 'Type',
                'WAITING'      => 'En attente...',
                'INFOS'        => 'Infos',
                'INFOBULLE'    => 'Infobulle',
                'IMAGEURL'     => 'Image distante',

                'LINKIN'       => 'Page locale',
                'LINKOUT'      => 'Page distante',
                'PERMANENT'    => 'Permanent',
                'RELATIVE'     => 'Relatif',
                'LINK_PERM'    => 'Permanent',
                'LINK_REL'     => 'Relatif',
                'LINK_IN'      => 'Local',
                'LINK_OUT'     => 'Distant',

                'TOP'          => 'Premier',
                'BOTTOM'       => 'Dernier',

                'TARG_AUTO'    => 'Auto (détecter la meilleure configuration)',
                '_SELF'        => 'Self (ouvrir dans la même page)',
                '_BLANK'       => 'Blank (ouvrir dans une nouvelle page)',

                'SELF'         => 'Ouvrir dans la même page',
                'BLANK'        => 'Ouvrir dans une nouvelle page',

                'LINKTO'       => 'Lier à :',
                'NONE'         => 'Aucun',

// Help

                'MENUCSSH'     => 'Aide sur la feuille de style des menus',
                'LINKCSSH'     => 'Aide sur la feuille de style des liens',
                'SAMPLE'       => 'Exemples',
                'ARTICLE'      => 'Article',

                'MAIN'         => 'Principal',
                'MAINDSC'      => 'Infos générales concernant le module.',
                'SMARTY'       => 'Variables Smarty',
                'SMARTYDSC'    => 'Liste des variables Smarty',
                'HELPS'        => 'Aide',
                'HELPSDSC'     => 'Aide à l\'utilisation du module',
                'TIPSDSC'      => 'Liste des astuces et faits du module.',
                'INTRODUCTION' => 'Intro',
                'KNOW'         => 'Le saviez-vous ?',
                'TIPS'         => 'Astuces',

                'DEVELOPPERS'  => 'Développeurs',
                'INFORMATIONS' => 'Informations',
                'DISCLAIMER'   => 'Avertissement',
                'AUTHOR_WORD'  => 'Le mot de l\'auteur',
                'VERSION_HISTORY' => 'Historique des versions',
                'LANGUAGE_DEFINE' => 'Définitions de langue',
                'FIXES_ITEM'   => 'Variables générales',
                'VARIABLES_ITEM' => 'Variables des liens',

// Utils
                'CLONEDSC'     => 'Utilitaire de clonage du module.',
                'CLONE_NAME'   => 'Nom du clone',
                'CLEAR'        => 'Annuler',
                'TEMPLATE'     => 'Templates',


                'EDITIMENU'    => 'Editer',
                'NEW'          => 'Nouveau Lien',
                'SUBMENU'      => 'Type',
                'SUBMENUEXP'   => '',
                'SUBYES'       => 'Oui',
                'SUBNO'        => 'Non',
                'MAINLINK'     => 'Lien standard',
                'SUBLINK'      => 'Lien secondaire relatif',
                'PERMSUBLINK'  => 'Lien secondaire permanent',
                'TARGET'       => 'Cible',
                'GROUPS'       => 'Groupes',
                'OPERATION'    => 'Fonction',
                'TARG_SELF'    => 'self',
                'TARG_BLANK'   => 'blank',
                'TARG_PARENT'  => 'parent',
                'TARG_TOP'     => 'top'
                 );

// Render defines

 	foreach ( $main_val_array as $item_lg=>$item_val ) {
                 define(strtoupper('_MD_POPGEN_'.$item_lg),$item_val);
	}
	
	
define('_MD_POPGEN_FIELD','Champ');
define('_MD_POPGEN_NULL','Null');
define('_MD_POPGEN_KEY','Clé');
define('_MD_POPGEN_DEFAULT','Defaut');
define('_MD_POPGEN_EXTRA','Extra');
define('_MD_POPGEN_N','N°');
define('_MD_POPGEN_CLOSE','Fermer');
?>