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

 $main_val_array['introduction']  =  array( ''      => 'Ce module permet de générer des listes de lien ou menus manuellement ou automatiquement.

Voici les variables de template disponibles pour vos templates personnalisées.

2 types de variables : <ul>
<li><b>les variables fixes</b>
<i>Ces variables sont pour la plupart définies par défaut, ou dans les préférences du module.</i>
</li>
<li><b>les variables dynamiques </b>
<i>Ces variables sont définies en fonction du contenu de chaque menu, ou des pages créées par l\'utilisateur. 
Elles sont valables aussi bien pour les pages de contenu du module que des blocs.</i></li>
</ul>' );

 $main_val_array['language_define'] =  array(
                                  '<{$index}>'        => 'Index',
                                  '<{$other}>'        => 'Autre',
                                  '<{$sourcecode}>'   => 'Code source'
                                   );


 $main_val_array['fixes_item'] =  array(
                                  '<{$id}>'            => '[MENU] id du menu.|1',
                                  '<{$css_link}>'      => '[MENU] Lien pointant vers le fichier CSS du menu en cours.|http:&#47;&#47;[..]/popgen_my_menu.css',
                                  '<{$script_link}>'   => '[MENU] Lien pointant vers le fichier de script .JS du menu en cours.|http:&#47;&#47;[..]/popgen_my_menu.js',
                                  '<{$menu}>'          => '[MENU] id du menu.|1',
                                  '<{$status}>'        => '[MENU] Status du menu en cours (0 : Hors ligne, 1 : en ligne, 2 : caché).|1',
                                  '<{$title}>'         => '[MENU] Titre du menu en cours.|Menu Utilisateur',
                                  '<{$css}>'           => '[MENU] Feuille de style du menu.|popgen_1 {color:Red;}',
                                  '<{$description}>'   => '[MENU] Description du menu en cours.|Voici le menu utilisateur.',

                                  '<{$data_list}>'     => 'Liste des données générées par le lien. Liste complète ci-dessous.|Array',
                                  '<{$ii}>'            => 'Nombre total de liens.|10',
                                  '<{$i}>'             => 'Nombre de liens total par colonne (chiffre arrondi à l\'unité).|5',
                                  '<{$i_main}>'        => 'Nombre de liens principaux (sans les liens secondaires) par colonne (chiffre arrondi à l\'unité).|3',
                                  '<{$mode}>'          => 'Mode ou template de la page en cours (ou défini par défaut dans les préférences du module).|include/popgen_ul.html',
                                  '<{$module}>'        => 'Répertoire du module (ex : popgen)|popgen',
                                  '<{$banner}>'        => 'Code html de la bannière du module.|&lt;img src="http:&#47;&#47;[..]/banner.gif" /&gt;',
                                  '<{$admin}>'         => 'Liens admin.|',

                                  '<{$banner_url}>'    => '[PREF] URL de la bannière du module.|http:&#47;&#47;[..]/banner.gif',
                                  '<{$background}>'    => '[PREF] URL de l\'Image de fond du module.|http:&#47;&#47;[..]/background_image.gif',
                                  '<{$image_width}>'   => '[PREF] Largeur par défaut des images.|160',
                                  '<{$image_height}>'  => '[PREF] Hauteur par défaut des images.|160',
                                  '<{$edit_mode}>'     => '[PREF] Activation ou nom du mode "édition" (affichage du code source du menu par défaut).|1',
                                  '<{$cols}>'          => '[PREF] Nombre de colonnes.|3',
                                  '<{$duration}>'      => '[PREF] Durée en millisecondes.|1000',
                                  '<{$transition}>'    => '[PREF] Transition en millisecondes.|1000',
                                  '<{$item_list}>'     => '[PREF] Mode d\'affichage de la liste des menus disponibles.|1',
                                  '<{$item}>'          => '[PREF] Nom générique des "items".|Menus',
                                  '<{$item_display_selectmode}>'   => '[PREF] Mode d\'affichage des templates disponibles des menus.|ul.html'
                                   );


 $main_val_array['variables_item'] =  array(
                                  '<{item.id}>'          => 'ID du lien.|2',
                                  '<{$item.pid}>'        => 'ID du lien parent (principal).|1',
                                  '<{$item.catid}>'      => 'ID du menu.|1',
                                  '<{$item.type}>'       => 'Type de lien (permanent ou relatif).|permanent',
                                  '<{$item.status}>'     => 'Status du lien en cours (0 : Hors ligne ou 1 : en ligne).|1',
                                  '<{$item.weight}>'     => 'Poids du lien.|100',

                                  '<{$item.title}>'      => 'Titre du lien.|Accueil',
                                  '<{$item.alt_title}>'  => 'Balise alternative (ou texte complémentaire).|Page d\'accueil du site',
                                  '<{$item.query}>'      => 'Requête liée à ce lien.|news',
                                  '<{$item.target}>'     => 'Cible du lien (target="_blank" ou code popgen pour une image).|_blank',
                                  '<{$item.css}>'        => 'Définitions CSS (pas de class, ni ID).|color:Red;',
                                  '<{$item.link_status}>'=> 'Type de lien (top, link ou sublink).|link',
                                  '<{$item.num}>'        => 'Numéro du lien en cours.|1',
                                  '<{$item.num_main}>'   => 'Numéro du lien principal en cours.|1'
                                 );

$main_val_array['author word'] =  array( ''      => 'Pour activer votre template personalisée :
 1. copier la template dans le répertoire "templates/include/" ;
 2. mettre le module à jour ;
 3. activer la nouvelle template dans les préférences du module.' );

?>