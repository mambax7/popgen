<?php
/**
* XOOPS - PHP Content Management System
* Copyright (c) 2001 - 2006 <http://www.xoops.org/>
*
* Module: multiMenu 1.90
* Licence : GPL
* Authors :
*           - solo (http://www.wolfpackclan.com/wolfactory)
*			- herve (http://www.herve-thouzard.com)
*			- blueteen (http://myxoops.romanais.info)
*			- DuGris (http://www.dugris.info)
*/
// 2.x
define("_MD_POPGEN_IMAGE", 	"Image");
define("_MD_POPGEN_ID", 	"N°");
define("_MD_POPGEN_TITLE", 	"Titre");
define("_MD_POPGEN_ADMIN", 	"Admin");
define("_MD_POPGEN_WEIGHT", 	"Poids");
define("_MD_POPGEN_HIDDEN", 	"Caché");
define("_MD_POPGEN_OPTIONS", "Options");
define("_MD_POPGEN_UPDATE",  "Mettre à jour");
define("_MD_POPGEN_NODATA",    "Aucune donnée sélectionnée !");
define("_MD_POPGEN_SITEMAP",    "Plan du site");

// Common
define("_MD_POPGEN_DESC",     "Description");
// define("_MD_POPGEN_CSS",     "Feuille de style");
define("_MD_POPGEN_CANCEL",     "Annuler");
define("_MD_POPGEN_OFF",     "En ligne");
define("_MD_POPGEN_ON",     "Hors ligne");

define("_MD_POPGEN_INSERTED", "Données créées avec succès.");
define("_MD_POPGEN_UPDATED",  "Données mises à jour avec succès.");

define("_MD_POPGEN_HELP",    "Aide");
define("_MD_POPGEN_INDEX",   "Index");
define("_MD_POPGEN_INDEXDSC","Index des pages");
define("_MD_POPGEN_ONLINE",  "Activer");
define("_MD_POPGEN_OFFLINE", "Désactiver");
define("_MD_POPGEN_HIDE",    "Cacher");
define("_MD_POPGEN_CONFIRM",     "Etes-vous certain de vouloir supprimer :");
define("_MD_POPGEN_CREDIT",  "%s est une creation originale du %s.");

// Thumb Gen
define("_MD_POPGEN_RESIZE",     "Redimensionner");
define("_MD_POPGEN_UPLOAD",     "Téléverser");
define("_MD_POPGEN_NEWIMAGE",     "Téléverser une nouvelle image");
define("_MD_POPGEN_SERVER_CONF","Infos configuration serveur");
define("_MD_POPGEN_XOOPS_VERSION",     "Version XOOPS");
define("_MD_POPGEN_GRAPH_GD_LIB_VERSION","Librairie GD");
define("_MD_POPGEN_GIF_SUPPORT",     "Support GIF");
define("_MD_POPGEN_JPEG_SUPPORT",     "Support JPG");
define("_MD_POPGEN_PNG_SUPPORT",     "Support PNG");

define("_MD_POPGEN_NORMAL",     "Normal");
define("_MD_POPGEN_ROUNDED",     "Bords arrondis");
define("_MD_POPGEN_BW",     "Noir & Blanc");
define("_MD_POPGEN_SHADOW",     "Ombré");
define("_MD_POPGEN_GRAD",     "Dégradé");
define("_MD_POPGEN_INFO",     "Texte");
define("_MD_POPGEN_CHECK_ALL",     "Tout sélectionner");

define("_MD_POPGEN_THUMBGEN",     "Générateur de vignette");
define("_MD_POPGEN_TEXT",     "Texte");
define("_MD_POPGEN_WIDTH",     "Largeur");
define("_MD_POPGEN_HEIGHT",     "Hauteur");
define("_MD_POPGEN_BCKCOLOR",     "Couleur de fond");

// Templates
define("_MD_POPGEN_TPL",    "Template");
define("_MD_POPGEN_SCRIPT",    "Script");
define("_MD_POPGEN_TEMPLATES",    "Templates");

// Admin Menus
define("_MD_POPGEN_QUERIES", "Requêtes");
define("_MD_POPGEN_MENU", 	"Menus");
define("_MD_POPGEN_LINK", 	"Liens");
define("_MD_POPGEN_URL", 	"Url");
define("_MD_POPGEN_QUERY",   "Requête");
define("_MD_POPGEN_BLOCKS", 	"Blocs");
define("_MD_POPGEN_IMAGES", 	"Images");
define("_MD_POPGEN_SETTINGS","Préférences");
define("_MD_POPGEN_UTILS", 	"Utilitaires");
define("_MD_POPGEN_STATUS", 	"Status");
define("_MD_POPGEN_EDIT", 	"Editer");
define("_MD_POPGEN_CLONE", 	"Cloner");
define("_MD_POPGEN_DELETE", 	"Supprimer");
define("_MD_POPGEN_OTHER", 	"Autre :");
define("_MD_POPGEN_CSS", 	"Feuille de style");

define("_MD_POPGEN_MENUDSC", 	"1. Créer et administrer les menus");
define("_MD_POPGEN_LINKDSC", 	"2. Créer et assigner les liens");
define("_MD_POPGEN_QUERYDSC", 	"3. Créer une requête dans la base de donnée");
define("_MD_POPGEN_IMAGESDSC", 	"4. Gérer les vignettes");
define("_MD_POPGEN_TEMPLATESDSC",    "5. Editer les feuilles de style et scripts des menus");
define("_MD_POPGEN_BLOCKSDSC", 	"6. Activer et paramétrer les blocs");
define("_MD_POPGEN_SETTINGSDSC",     "7. Sélectionner les préférences générales du module");
define("_MD_POPGEN_UTILSDSC", 	"8. Utilitaire de clonage du module");
define("_MD_POPGEN_HELPDSC",         "9. Aide sur le module.");


// query.php
define("_MD_POPGEN_NEW_QUERY","Créer une requête dans la Base de donnée");
define("_MD_POPGEN_EDIT_QUERY","Editer une requête");
define("_MD_POPGEN_TABLE", 	"[BD] Table");
define("_MD_POPGEN_QID", 	"[BD] Champ ID");
define("_MD_POPGEN_QSUBJECT","[BD] Champ Sujet");
define("_MD_POPGEN_QDESCRIPTION", 	"[BD] Champ alternatif");
define("_MD_POPGEN_QIMAGE", 	"[BD] Champ image");
define("_MD_POPGEN_QIMAGEURL","Répertoire de stockage des images");
define("_MD_POPGEN_QURL", 	"Adresse des liens<br />
<font style='font-weight:normal;'>{id} : valeur du champ id</font>");
define("_MD_POPGEN_QWHERE", 	"[BD] Conditions<br />
<font style='font-weight:normal;'>{date} : heure courante</font>");
define("_MD_POPGEN_QORDER", 	"[BD] Ordre d'affichage des données");
define("_MD_POPGEN_QLIMIT", 	"Nombre maximum de liens à afficher");
define("_MD_POPGEN_TROUBLE", "Signal d'erreur");
define("_MD_POPGEN_NEXT", "Etape suivante...");
define("_MD_POPGEN_TABLE_CHECK", "Voir la table");

// menu.php
define("_MD_POPGEN_NEW_MENU", "Créer un menu");
define("_MD_POPGEN_EDIT_MENU", "Editer un menu");
define("_MD_POPGEN_ALT_TITLE","Texte alternatif");
define("_MD_POPGEN_IMAGEDIR", "Répertoire de stockages des images");


// link.php
define("_MD_POPGEN_NEW_LINK","Créer un lien");
define("_MD_POPGEN_EDIT_LINK","Editer un lien");
define("_MD_POPGEN_TYPE","Type");
define("_MD_POPGEN_WAITING","En attente...");
define("_MD_POPGEN_INFOS","Infos");
define("_MD_POPGEN_INFOBULLE","Infobulle");
define("_MD_POPGEN_IMAGEURL","Image distante");

define("_MD_POPGEN_LINKIN","Page locale");
define("_MD_POPGEN_LINKOUT","Page distante");
define("_MD_POPGEN_PERMANENT","Permanent");
define("_MD_POPGEN_RELATIVE","Relatif");
define("_MD_POPGEN_LINK_PERM","Permanent");
define("_MD_POPGEN_LINK_REL","Relatif");
define("_MD_POPGEN_LINK_IN","Local");
define("_MD_POPGEN_LINK_OUT","Distant");

define("_MD_POPGEN_TOP","Premier");
define("_MD_POPGEN_BOTTOM","Dernier");

define("_MD_POPGEN_TARG_AUTO","Auto");
define("_MD_POPGEN__SELF","Self (ouvrir dans la même page)");
define("_MD_POPGEN__BLANK","Blank (ouvrir dans une nouvelle page)");

define("_MD_POPGEN_SELF","Self (ouvrir dans la même page)");
define("_MD_POPGEN_BLANK","Blank (ouvrir dans une nouvelle page)");

define("_MD_POPGEN_LINKTO","Lier à :");
define("_MD_POPGEN_NONE","Aucun");

define("_MD_POPGEN_DELETED",     "Données supprimées avec succès !");

// Images
define("_MD_POPGEN_DIR",         "Répertoire");
define("_MD_POPGEN_UPLOADED",    "Fichier téléversé avec succès !");
define("_MD_POPGEN_NOTUPLOADED", "Une erreure s'est produite lors du téléversement du fichier !");
define("_MD_POPGEN_NOT_CREATED", "Le répertoire de stockage n'existe pas !");

// Help
define("_MD_POPGEN_MENUCSSH",     "Aide sur la feuille de style des menus");
define("_MD_POPGEN_LINKCSSH",     "Aide sur la feuille de style des liens");
define("_MD_POPGEN_SAMPLE",       "Exemples");

define("_MD_POPGEN_MAIN",     "Principal");
define("_MD_POPGEN_MAINDSC",     "Infos générales concernant le module.");
define("_MD_POPGEN_SMARTY",     "Variables Smarty");
define("_MD_POPGEN_SMARTYDSC",     "Liste des variables Smarty");
define("_MD_POPGEN_HELPS",     "Aide");
define("_MD_POPGEN_HELPSDSC",     "Aide à l'utilisation du module");
define("_MD_POPGEN_TIPSDSC",     "Liste des astuces et faits du module.");
define("_MD_POPGEN_INTRODUCTION",     "Intro");
define("_MD_POPGEN_KNOW",     "Le saviez-vous ?");
define("_MD_POPGEN_TIPS",     "Astuces");

define("_MD_POPGEN_DEVELOPPERS",     "Développeurs");
define("_MD_POPGEN_INFORMATIONS",     "Informations");
define("_MD_POPGEN_DISCLAIMER",     "Avertissement");
define("_MD_POPGEN_AUTHOR_WORD",     "Le mot de l'auteur");
define("_MD_POPGEN_VERSION_HISTORY",     "Historique des versions");
define("_MD_POPGEN_LANGUAGE_DEFINE",     "Définitions de langue");
define("_MD_POPGEN_FIXES_ITEM",     "Variables générales");
define("_MD_POPGEN_VARIABLES_ITEM",     "Variables des liens");

// Clone
define("_MD_POPGEN_CLONEDSC",     "Utilitaire de clonage du module.");
define("_MD_POPGEN_CLONE_NAME",     "Nom du clone");
define("_MD_POPGEN_CLEAR",     "Annuler");
define("_MD_POPGEN_TEMPLATE",	"Templates");

// 1.x
define("_MD_POPGEN_EDITIMENU", 	"Editer");
define("_MD_POPGEN_NEW",		"Nouveau Lien");
define("_MD_POPGEN_SUBMENU",	"Type");
define("_MD_POPGEN_SUBMENUEXP",	"");
define("_MD_POPGEN_SUBYES",	"Oui");
define("_MD_POPGEN_SUBNO",		"Non");
define("_MD_POPGEN_MAINLINK",	"Lien standard");
define("_MD_POPGEN_SUBLINK",	"Lien secondaire relatif");
define("_MD_POPGEN_PERMSUBLINK",	"Lien secondaire permanent");
define("_MD_POPGEN_NOTE",		"Note");
define("_MD_POPGEN_TARGET",	"Cible");
define("_MD_POPGEN_GROUPS",	"Groupes");
define("_MD_POPGEN_OPERATION",	"Fonction");
define("_MD_POPGEN_UP",		"Monter");
define("_MD_POPGEN_DOWN",		"Descendre");
define("_MD_POPGEN_TARG_SELF",	"self");
define("_MD_POPGEN_TARG_BLANK",	"blank");
define("_MD_POPGEN_TARG_PARENT",	"parent");
define("_MD_POPGEN_TARG_TOP",	"top");
define("_MD_POPGEN_SUREDELETE",	"Etes-vous certain de vouloir supprimer ce lien ?");
define("_MD_POPGEN_NOTUPDATED",	"Impossible de mettre la Base de donné à jour !");
define("_MD_POPGEN_SUBMIT", 	"Enregistrer");
define("_MD_POPGEN_CATEGORY",	"Categorie");
define("_MD_POPGEN_NOTES",		"

<b><u>Exemples</u> :</b><br /><br />
<u>URL absolue</u> : <i>".XOOPS_URL."/modules/multiMenu/index.php</i><br />
<u>URL relative</u> : <i>modules/multiMenu/</i><br /><br />
<table><tr><td><img src='../images/attention.png' /></td><td>Pour que les liens relatifs puissent fonctionner,<br />il est nécessaire de toujours ajouter un ' / ' (slash)<br />à la fin des liens pointants vers un répertoire !</td><tr></table><br />
<br />
Vous pouvez utiliser les tags suivant dans l'url de l'image :<ul>
<li>{theme} ce qui affichera le nom du thème courant.</li><br />
Par exemple  : http://www.monsite.com/themes/{theme}/test.gif<br />
Nous donnerait en lien d'image : http://www.monsite.com/themes/default/test.gif<br /><br />
<li>{module} ce qui affichera le module courant.</li><br />
Par exemple  : http://www.monsite.com/modules/{module}/images/test.gif<br />
Nous donnerait en lien d'image : http://www.monsite.com/module/multiMenu/images/test.gif<br /><br />
</ul><p />
Vous pouvez utiliser les tags suivants dans le titre :
<li>{pm_new} ce qui affichera le nombre de message(s) privé(s) non lu(s).</li></ul>
<li>{pm_readed} ce qui affichera le nombre de message(s) privé(s) lu(s).</li></ul>
<li>{pm_total} ce qui affichera le nombre de message(s) privé(s) au total.</li></ul>
<br />
Un exemple pour le titre : Vous avez {pm_new} nouveaux PM.<br />
Et on peut indiquer le lien vers la boîte de messagerie privée.<br>
<br />
<li>{alt} ce qui affichera une description personnalisée pour les attributs alt et title.</li></ul><br>
Un exemple pour le Titre : Discussions{alt}Accès aux forums<br />
Tout le texte se trouvant après la balise {alt}, sera utilisé pour renseigner les attributs alt et title.<br />
Si vous n'utilisez pas cette balise, ces attributs utiliseront simplement le libellé du Titre.<br/>
Et si vous notez cette balise, sans mettre de texte après, les balises title et alt resteront vides.<br /><br />
Vous pouvez utiliser le tag suivant dans le titre et les liens:<br /><br />
<li>{user_id} permet de récupérer l'id du membre connecté, et de l'utiliser dans des liens ou des titres.</li></ul><br>
Exemple : pour créer un lien vers le compte du membre connecté : userinfo.php?uid={user_id}<br />
<br />
");

define("_MD_POPGEN_PREFERENCES", "Préférences");
define("_MD_POPGEN_GOING",		"Quand multiMenu devient dynamique");

define("_MD_POPGEN_BLOCK_LINK",	"Liste des blocs visibles");

define("_MD_POPGEN_GUIDET_GENERAL",	"Général");
define("_MD_POPGEN_GUIDET_PREF",		"Préférences");
define("_MD_POPGEN_GUIDET_INDEX",	"Index");
define("_MD_POPGEN_GUIDET_BLOCKS",	"Blocs");
define("_MD_POPGEN_GUIDET_MENU",		"Tableau des options");
define("_MD_POPGEN_GUIDET_TEMPLATE", "Créer un template personnalisé");

define("_MD_POPGEN_OPTIONS_BLOCKOPTIONS", 	"Options de blocs");
define("_MD_POPGEN_OPTIONS_FORMAT", 	"Format");
define("_MD_POPGEN_OPTIONS_LINKS", "Lien");
define("_MD_POPGEN_OPTIONS_TITLE", "Titre");
define("_MD_POPGEN_OPTIONS_PICTURES", "Images");
define("_MD_POPGEN_OPTIONS_ANSET", "Paramètres d'animation");
define("_MD_POPGEN_OPTIONS_RANLINKS", "Liens aléatoires");
define("_MD_POPGEN_OPTIONS_TPL", "Templates");
define("_MD_POPGEN_OPTIONS_NUM", "N°");
define("_MD_POPGEN_OPTIONS_MENU", "Menu");
define("_MD_POPGEN_OPTIONS_DESC", "Description");
define("_MD_POPGEN_OPTIONS_COLUMNS", "Colonnes");
define("_MD_POPGEN_OPTIONS_TYPE", "Type");
define("_MD_POPGEN_OPTIONS_ORDER", "Ordre");
define("_MD_POPGEN_OPTIONS_DISPHI", "Afficher/Masquer");
define("_MD_POPGEN_OPTIONS_MAXLENGHT", "Longueur Max");
define("_MD_POPGEN_OPTIONS_MAXWIDTH", "Largeur Max");
define("_MD_POPGEN_OPTIONS_WIDTH", "Largeur");
define("_MD_POPGEN_OPTIONS_HEIGHT", "Hauteur");
define("_MD_POPGEN_OPTIONS_COLOR", "Couleur");
define("_MD_POPGEN_OPTIONS_SPEED", "Vitesse");
define("_MD_POPGEN_OPTIONS_NUMBER", "Nombre");
define("_MD_POPGEN_OPTIONS_INTHEME", "Dans le thème");
define("_MD_POPGEN_OPTIONS_COMP", "Compatibilité");

define("_MD_POPGEN_OPTIONS_SELBOX", "[Boite de sélection Box]");
define("_MD_POPGEN_OPTIONS_DROPDOWN", "[Déroulant]");
define("_MD_POPGEN_OPTIONS_ORDERED", "Numéroté");
define("_MD_POPGEN_OPTIONS_LIST", "[Liste à puce]");
define("_MD_POPGEN_OPTIONS_SLIDING", "Diaporama");
define("_MD_POPGEN_OPTIONS_SCROLLING", "Défilant");
define("_MD_POPGEN_OPTIONS_PICTURE", "[Image]");
define("_MD_POPGEN_OPTIONS_CONTEXT", "Contextuel");
define("_MD_POPGEN_OPTIONS_CONTEXT2", "Contextuel2");
define("_MD_POPGEN_OPTIONS_TREE", "Arborescent");
define("_MD_POPGEN_OPTIONS_TABHORIZ", "Lien Horizontal");
define("_MD_POPGEN_OPTIONS_DROPDOWNHORIZ", "Déroulant Horizontal");
define("_MD_POPGEN_OPTIONS_DROPDOWNHORIZCSS", "Déroulant Horizontal CSS");
define("_MD_POPGEN_OPTIONS_DROPDOWNVERT", "Déroulant Vertical");
define("_MD_POPGEN_OPTIONS_DROPDOWNVERT2", "Déroulant Vertical2");
define("_MD_POPGEN_OPTIONS_DROPDOWNVERTCSS", "Déroulant Vertical CSS");
define("_MD_POPGEN_OPTIONS_SWITCHVERT", "Switch Vertical");
define("_MD_POPGEN_OPTIONS_PRINCMEN", "[Menu]");

define("_MD_POPGEN_OPTIONS_DESC1", "Semblable au menu principal de Xoops");
define("_MD_POPGEN_OPTIONS_DESC2", "Ouvre et ferme les sous-menus (compatible noscript)");
define("_MD_POPGEN_OPTIONS_DESC3", "Menu déroulant dynamique vertical");
define("_MD_POPGEN_OPTIONS_DESC31", "Menu déroulant dynamique vertical 2");
define("_MD_POPGEN_OPTIONS_DESC32", "Menu déroulant dynamique vertical CSS");
define("_MD_POPGEN_OPTIONS_DESC4", "Menu déroulant dynamique horizontal");
define("_MD_POPGEN_OPTIONS_DESC41", "Menu déroulant dynamique horizontal pur CSS");
define("_MD_POPGEN_OPTIONS_DESC5", "Affiche/Masque les sous-menus dynamiquement");
define("_MD_POPGEN_OPTIONS_DESC6", "Menu contextuel : clic droit dans la page");
define("_MD_POPGEN_OPTIONS_DESC61", "Menu contextuel : clic droit dans la page. Liens secondaires gérés. Html désactivé");
define("_MD_POPGEN_OPTIONS_DESC62", "Menu arborescent : type explorateur Windows");
define("_MD_POPGEN_OPTIONS_DESC7", "Menu composé d'une image");
define("_MD_POPGEN_OPTIONS_DESC8", "Menu composé d'images défilantes (haut/bas)");
define("_MD_POPGEN_OPTIONS_DESC9", "Menu sous forme de diaporama d'images");
define("_MD_POPGEN_OPTIONS_DESC10", "Liste standard de liens non classés");
define("_MD_POPGEN_OPTIONS_DESC11", "Liste de liens classés");
define("_MD_POPGEN_OPTIONS_DESC12", "Menu défilant de liens non classés");
define("_MD_POPGEN_OPTIONS_DESC13", "Diaporama de liens");
define("_MD_POPGEN_OPTIONS_DESC14", "Menu déroulant");
define("_MD_POPGEN_OPTIONS_DESC15", "Boite de sélection standard");

define("_MD_POPGEN_OPTIONS_TYPE2", "Pas d'url sur le lien principal");
define("_MD_POPGEN_OPTIONS_TYPE21", "Pas d'url sur le lien principal contenant des sous-liens");
define("_MD_POPGEN_OPTIONS_TYPE8", "Pas de distinction");
define("_MD_POPGEN_OPTIONS_TYPE14_15", "Les catégories séparent les menus");

define("_MD_POPGEN_OPTIONS_NOPICT", "Pas d'images");

define("_MD_POPGEN_OPTIONS_WIDTH3", "Largeur et emplacement (gauche/droite) du menu déroulant");
define("_MD_POPGEN_OPTIONS_WIDTH4", "Largeur du menu déroulant");
define("_MD_POPGEN_OPTIONS_WIDTH9", "Largeur de bloc");

define("_MD_POPGEN_OPTIONS_HEIGHT9", "Hauteur de bloc");

define("_MD_POPGEN_OPTIONS_IE", "IE");
define("_MD_POPGEN_OPTIONS_FF", "IE");
define("_MD_POPGEN_OPTIONS_IEFF", "IE &amp; FF");
define("_MD_POPGEN_OPTIONS_IEMARQUEE", "IE (Marquee)");

//conseils pour l'utilisation des menus

define("_MD_POPGEN_OPTIONS_TIPS", "Vous pouvez cliquer sur le nom de certains menus pour accéder aux conseils d'utilisation.");

define("_MD_POPGEN_OPTIONS_SWITCHVERT_TITLE_TIPS", "Menu Switch Vertical");
define("_MD_POPGEN_OPTIONS_SWITCHVERT_DESC_TIPS", "
<br />
<li>Ne pas mettre de liens sur les liens principaux, qui servent à dérouler le sous-menu.<br />
Ils seraient de toute façon inefficaces.</li><br />
<li>Un seul sous-menu est visible à la fois. Un clic sur un autre lien principal ferme le sous-menu précédement ouvert.</li><br />
<br />
");

define("_MD_POPGEN_OPTIONS_DROPDOWNVERT_TITLE_TIPS", "Menu Déroulant Vertical");
define("_MD_POPGEN_OPTIONS_DROPDOWNVERT_DESC_TIPS", "
<br />
<li>Si vous utilisez ce menu dans la colonne de droite de votre site, vous devez définir une largeur de bloc négative dans les options de blocs, pour que le menu se déroule du bon côté.</li><br /><br />
<li>La couleur de fond du sous-menu se définit dans les options de bloc du menu.</li><br /><br />
<li>Le paramétrage de l'emplacement du sous-menu (hauteur, éloignement par rapport au menu principal...), se fait dans le template de ce menu. Pensez à mettre à jour vos templates en cas de modification.</li><br />
<br />
");

define("_MD_POPGEN_OPTIONS_DROPDOWNVERT2_TITLE_TIPS", "Menu Déroulant Vertical 2");
define("_MD_POPGEN_OPTIONS_DROPDOWNVERT2_DESC_TIPS", "
<br />
<li>Ce menu s'utilise dans les colonnes de droite ou de gauche. Il ne faut pas indiquer de largeur de bloc négative contrairement à d'autres menus.</li><br /><br />
<li>Les flèches indiquant qu'un sous-menu est présent, sont toujours orientées vers la droite.</li><br /><br />
<li>Vous pouvez utiliser des images, qui seront placées avant les titres. Taille limitée à 16px*16px.</li><br /><br />
<li>Vous pouvez changer l'apparence du menu, en modifiant la feuille de style :<br /> <i>script/07/style/mm_vertical2.css</i></li><br /><br />
Un exemple de présentation différente est disponible dans le dossier :<br />
<i>script/07/style_classic/mm_vertical2.css</i>
<br />
");

define("_MD_POPGEN_OPTIONS_DROPDOWNVERTCSS_TITLE_TIPS", "Menu Déroulant Vertical CSS");
define("_MD_POPGEN_OPTIONS_DROPDOWNVERTCSS_DESC_TIPS", "
<br />
<li>Menu en pur code CSS.</li><br /><br />
<li>La taille des menus est gérée dans le template.</li><br /><br />
<li>La gestion des couleur se fait dans les feuilles de style correspondantes.</li><br />
- script/09/flyout_ie.css (pour internet explorer)</li><br />
- script/09/flyout.css (pour firefox)</li><br /><br />
<li>Les flèches indiquant qu'un sous-menu est présent ne sont pas gérées.</li><br /><br />
<li>Indiquez une valeur négative dans les options du menu (largeur de bloc) lorsque vous voulez l'utiliser à droite sur votre site.</li><br />

<br />
");

define("_MD_POPGEN_OPTIONS_DROPDOWNHORIZ_TITLE_TIPS", "Menu Déroulant Horizontal");
define("_MD_POPGEN_OPTIONS_DROPDOWNHORIZ_DESC_TIPS", "
<br />
<li>La taille et la couleur de ce menu sont gérées dans le template.</li>
<br />
");

define("_MD_POPGEN_OPTIONS_DROPDOWNHORIZCSS_TITLE_TIPS", "Menu Déroulant Horizontal CSS");
define("_MD_POPGEN_OPTIONS_DROPDOWNHORIZCSS_DESC_TIPS", "
<br />
<li>Menu en pur code CSS.</li><br /><br />
<li>L'apparence de ce menu est gérée dans les feuilles de style :</li><br />
<i>script/08/basic_dd_ie.css</i> (pour internet explorer)<br />
<i>script/08/basic_dd.css</i> (pour firefox)<br /><br />
<li>Les flèches indiquant qu'un sous-menu est présent ne sont pas gérées.</li>
<br />
");

define("_MD_POPGEN_OPTIONS_CONTEXT_TITLE_TIPS", "Menu contextuel");
define("_MD_POPGEN_OPTIONS_CONTEXT_DESC_TIPS", "
<br />
<li>Apparaît en faisant un clic droit sur la page.</li><br /><br />
<li>Les sous-liens apparaissent simplement décalés.</li><br /><br />
<li>L'apparence de ce menu est gérée dans la feuille de style :</li><br />
<i>script/05/context_menu.css</i><br /><br />
<br />
");

define("_MD_POPGEN_OPTIONS_CONTEXT2_TITLE_TIPS", "Menu contextuel 2");
define("_MD_POPGEN_OPTIONS_CONTEXT2_DESC_TIPS", "
<br />
<li>Apparaît en faisant un clic droit sur la page.</li><br /><br />
<li>Les sous-liens apparaissent dans un sous-menu déroulant au passage de la souris sur un lien standard.</li><br /><br />
<li>Les images sont limitées à 16px*16px.</li><br /><br />
<li>L'apparence de ce menu est gérée dans la feuille de style :</li><br />
<i>/script/06/style/mm_context2.css</i><br /><br />
Un exemple de présentation différente est disponible dans le dossier :<br />
<i>script/06/style_classic/mm_context2.css</i>
<br />
");

define("_MD_POPGEN_OPTIONS_TREEMENU_TITLE_TIPS", "Menu Arborescent");
define("_MD_POPGEN_OPTIONS_TREEMENU_DESC_TIPS", "
<br />
<li> Tous les liens standards et secondaires (permanents et relatifs) sont pris en compte.</li><br />
<li> Les liens de type catégorie et note servent à créer un nouveau menu dans le même bloc.</li><br />
<li> Les cookies sont utilisés, ce qui permet de conserver au fur et à mesure du surf,<br />
le positionnement des menus (ouvert/fermé).</li><br />
<li> Pour changer rapidement l'aspect des icônes 'dossier ouvert/fermé', il suffit de remplacer ces fichiers par ceux de votre choix.</li><br />
<li> Même chose pour l'icône représentant la petite feuille (sous-liens).</li><br />
<li> Vous pouvez aussi personnaliser chaque lien avec une image différente, en indiquant une image de votre choix lors de la création du lien.</li><br />
<li> Par défaut, les menus principaux (créés avec les catégories) sont ouverts (les sous-menus sont fermés)</li><br />
<li> Vous pouvez définir une url pour les liens standards comportant des sous-menus, en cliquant dessus, cela aura pour effet d'ouvrir la page web configurée, et d'ouvrir le menu.</li><br />
<li> Vous pouvez ainsi définir des liens secondaires relatifs, qui n'apparaîtront que si vous cliquez sur le lien, sinon, en cliquant simplement sur la croix déroulant le menu, vous ne verrez que les menus secondaires permanents.</li><br />
<li> Selon que vous indiquerez une valeur positive ou négative, pour la largeur de bloc, dans les options du menu, ce menu arborescent se lira de gauche à droite (par défaut), ou de droite à gauche.</li><br />
<li> Des jeux d'images de couleur noir et blanche sont fournis avec ce menu. Afin de rester lisible selon vos thèmes. Vous devrez mettre à jour le template pour utiliser la bonne couleur d'images. (ou simplement inverser le nom des dossiers contenant les images.</li><br />
<li> Si vous proposez à vos visiteurs, le choix entre plusieurs thèmes de couleurs sombres et foncées, en modifiant le template de ce menu, il sera possible d'automatiser l'affichage du menu avec les images dans la bonne couleur.</li><br />
Voir l'aide sur la création de templates personnalisés, et plus précisément la variable smarty : <{&#36;block.css_file}><br /><br />
<b>Il y a quelques contraintes :</b><br /><br />
<li> Chaque menu doit commencer par 2 liens standards.</li><br />
");

// Version 1.9
define("_MD_POPGEN_UPDATE_MODULE", "Mise à jour du module");

define("_MD_POPGEN_MAKE_UPDATE", "La mise à jour du module n'a pas été effectuée : ");
define("_MD_POPGEN_MAKE_UPGRADE", "Une nouvelle version de multiMenu est disponible en téléchargement à cette adresse : <br /><br />");
define("_MD_POPGEN_NO_UPGRADE", "Vous avez la dernière version !!!");

define("_MD_POPGEN_UPGRADE_DB","<font color='#CC0000'>Mise à jour des tables</font>");
define("_MD_POPGEN_UPGRADE_TABLE","Mise à jour de la table : ");
define("_MD_POPGEN_SUPPORTLINKS","supporte les url absolues et relatives");

define("_MD_POPGEN_NEWVERSION", "<font color='#009900'>Nouvelle version</font>");
?>