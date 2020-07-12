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
        $i=1;
 	$info_val_array =  array( $i++        => 'Le saviez-vous ?|A l\'origine, popgen était une version améliorée de imenu, développé par un autre belge Linthuin.',
  	                          $i++        => 'Le saviez-vous ?|Dans sa version 1, popgen à connu plus de 9 versions successives. La dernière étant la 1.9.',
  	                          $i++        => 'Le saviez-vous ?|Pour leur majorité, les personnes qui ont contribué à la réalisation de ce modules ne sont pas des développeurs professionnel !',
                                  $i++        => 'Le saviez-vous ?|popgen a été développé avec le logiciel éditeur de texte <a href="http://www.contexteditor.org/" target="_blank">ConTEXT</a>.',
                                  $i++        => 'Le saviez-vous ?|Dans sa première version, popgen s\'écrivait "multiMenu". Le M a été réduit en minuscule pour faciliter le clonage du module. Sur la toile, cela fait toute la différence !',
                                  $i++        => 'Le saviez-vous ?|Le nombre d\'heures consacrées au développement de ce module est incalculable. Depuis sa premières versions, des milliers d\'heures lui ont été consacré...',
                                  $i++        => 'Le saviez-vous ?|Lors de la sortie de multiMenu 1.8, plus de 600 posts ont été publiés à son sujet dans les forums de www.frxoops.org et www.xoops.org.',
                                  $i++        => 'Le saviez-vous ?|Les développeurs qui ont contribué à popgen n\'en ont pas touché un seul franc. C\'est ça l\'open source !',
                                  $i++        => 'Le saviez-vous ?|popgen a été développé pour Xoops 2.x uniquement. On ne retrouve aucun module similaire dans d\'autre CMS.',
                                  $i++        => 'Le saviez-vous ?|Les développeurs de popgen sont majoritairement  francophones et membres actifs de <a href="http://www.frxoops.org" target="_blank">FRXoops</a>.'
                                  );

  	 $tips_val_array =  array(
                                  $i++        => 'Astuce : Revenez nous voir !|Lorsque vous créez un lien externe, assignez lui un target "blank" pour que vos visiteurs reviennent plus facilement !',
  	                          $i++        => 'Astuce : Le mode auto|En mode auto, le paramètre "target" défini automatiquement le mode à adopter si vous créez un lien interne ou externe.',
  	                          $i++        => 'Astuce : En plein dans le mille !|Un target "blank" ouvre le lien dans une nouvelle page. Utilisez-le si vous souhaitez que vos visiteurs retrouvent plus facilement leur chemin.',
  	                          $i++        => 'Astuce : Restez chez nous !|Un target "self" ouvre le lien dans la même page. Le mode de navigation idéal pour rester à l\'intérieur du site.',
  	                          $i++        => 'Astuce : Créez vos propres templates !| ...puis glissez les dans le répertoire "templates/include/", mettez le module à jour, puis activer la nouvelle template dans les préférences du module.',
  	                          $i++        => 'Astuce : Utilisez le cache !|Surtout si vos menus ne font pas appelle à des liens dynamiques (requêtes, liens relatifs, groupes d\'accès), optimisez les temps d\'accès en activant le cache de vos blocs.',
                                  $i++        => 'Astuce : Les CSS|Les feuilles de style permettent de personnaliser l\'affichage des liens et/ou des menus. Pour plus d\'info visitez <a href="http://www.w3.org/Style/CSS/" target="_blank">W3C</a>.',
                                  $i++        => 'Astuce : Menu caché|Un menu caché ne s\'affichera pas dans les pages d\'index du module. Mais est tout aussi accessbile et actif qu\'un menu "activé".',
                                  $i++        => 'Astuce : Templates identiques|Les templates des pages d\'index et des blocs sont identiques. Plus besoin de chipoter à deux endroits pour les modifier.',
                                  $i++        => 'Astuce : Onglet image|Le gestionnaire d\'images vous permet de gérer les illustrations de vos liens et de vos menus. Uniformisez leur format en quelques clics...',
                                  $i++        => 'Astuce : Onglet template|Le gestionnaire de template vous permet d\éditer facilement les templates, feuilles de styles et scripts des menus.',
                                  $i++        => 'Astuce : Onglet requête|Le gestionnaire de requêtes permet de générer des listes de lien dynamiquement à partir de la base de donnée du site. Choisissez la table qui vous intéresse et cliquez sur <b>[-][[BD] Table]</b> pour en savoir plus à son sujet.',
                                  $i++        => 'Astuce : Supprimer|Lorsque vous supprimez un menu, vous supprimez en même temps tous les liens qui lui sont rattachés !',
                                  $i++        => 'Astuce : Auto-correction|Lorsque vous insérez une url avec le nom de domaine de votre site, popgen réécrira automatiquement l\'adresse pour en faire un lien interne.',
                                  $i++        => 'Astuce : Images|N\'utilisez que des images au format .jpg, .jpeg, .gif ou .png. Les autres formats d\'images sont à proscrire sur le web.',
                                  $i++        => 'Astuce : Images|Attention aux images de trop grande taille ! Passez par le gestionnaire d\'images pour les redimensionner au bon format à la volée.',
                                  $i++        => 'Astuce : Faites vos jeux !|Faites un tour par les préférences du module. Réglez les paramètres selon vos choix, et n\'y touchez plus.',
                                  $i++        => 'Astuce : Soyez "Robot Friendly".|Utilisez les textes alternatifs (infobulles) dans vos liens et placez-y vos mots clés.',
                                  $i++        => 'Astuce : Lien permanent|Un lien permanent s\'affichera en toute circonstance... pour peu que lui en donniez la permission.',
                                  $i++        => 'Astuce : Lien relatif|Un lien relatif ne s\'affichera que si le module indiqué dans le lien principal correspond au module de la page en cours.',
                                  $i++        => 'Astuce : Les permissions|Les groupes permettent de définir qui a accès à quel menu et/ou quel lien. Soyez cohérent dans vos choix !',
                                  $i++        => 'Astuce : Besoin de blocs supplémentaires ?|Dans les préférences générales du module, indiquez exactement le nombre qu\'il vous faut, et mettez votre module à jour !',
                                  $i++        => 'Astuce : Besoin de cloner le module ?|Allez voir dans les <a href="index.php?admin=utils">"utilitaires"</a>, et dupliquez votre module en deux clics de souris.',
                                  $i++        => 'Astuce : Requête|Pour créer une nouvelle requête dans la base de donnée, inspirez-vous des requêtes fournies par défaut.',
                                  $i++        => 'Astuce : Ayez de l\'{id}.| Que ce soient pour les requêtes, les feuilles de style ou les scripts, le tag {id} est utile pour référencé le menu en cours.',
                                  $i++        => 'Astuce : Clonage|Vous pouvez cloner un module avec tout ses liens en un seul clic. N\'oubliez pas de modifier son titre !',
                                  $i++        => 'Astuce : Image distante ou locale ?|Préférez les images stockées sur votre serveur. Ce sont les seules sur lesquelles vous ayez un contôle total !',
                                  $i++        => 'Astuce : Image distante|Une image distante peut être hébergée ailleurs que sur votre site. Mais attention aux petites croix rouges si on vient à les renommer, déplacer ou supprimer !',
                                  $i++        => 'Astuce : Image locale|Les images locales sont hébergées sur votre propre serveur. Vous pouvez aussi les redimenssionner à l\'aide du gestionnaire d\'image du module.',
                                  $i++        => 'Astuce : Facilitez la navigation !|Tâchez de respecter la "règle des 3 clics" qui stipule que toute information doît être accessible en moins de 3 clics',
                                  $i++        => 'Astuce : Facilitez la navigation !|Une liste d\'items doit de préférence comporter moins de 7 éléments. Evitez les menus "trop longs".',
                                  $i++        => 'Astuce : Optimisez vos images !|Il convient d\'optimiser au maximum la taille des images, en choisissant un format adapté et un nombre de couleurs le plus petit possible. Il est recommandé de ne pas dépasser 30 à 40 ko maximum par image',
                                  $i++        => 'Astuce : Bien concevoir le menu principal !|A tout moment le visiteur doit pouvoir être en mesure de se repérer dans le site (et retrouver la Home page).',
                                  $i++        => 'Astuce : Uniformisez votre menu !|Les éléments de navigation doivent être situés au même endroit sur toutes les pages, si possible avec une présentation uniforme d\'une page à une autre.',
                                  $i++        => 'Astuce : De bon titres !|Créez des liens privilégiant le texte, aux libellés clairs, sans "devinettes" ou messages cachés, avec une présentation standard.',
                                  $i++        => 'Astuce : Plan du site !|Offrez des pistes vers l\'ensemble des informations disponibles dès la page d\'accueil',
                                  $i++        => 'Astuce : Allez à l\'essentiel !|Les liens les plus importants doivent être fortement mis en valeur (la boutique pour un site de vente en ligne, les nouveautés sur le site, etc.), mais cela n\'interdit pas que la page d\'accueil soit très riche d\'autres liens.',
                                  $i++        => 'Astuce : Evitez les textes en image !|Le texte sous forme d\'image, même si cela permet de mieux en contrôler la présentation, est non seulement rédhibitoire du point de vue du temps de chargement, mais également pour les moteurs de recherche.',
                                  $i++        => 'Astuce : "Keep it simple !"|Le système de navigation doit être simple et intuitif. Inutile de proposer tous les liens sur la page accueil. Une barre de navigation vers les principales rubriques suffit (cela n\'interdit pas, néanmoins, de proposer un système d\'accès rapide sous forme, par exemple, de menu déroulant en Javascript).',
                                  $i++        => 'Astuce : Deux valent mieux qu\'un !|Multipliez les systèmes de navigation alternatifs (Ex: une barre de menu sous forme graphique, avec des effets "rollovers" simples, une barre de navigation texte, etc.) pourvu que ces systèmes soient bien distincts visuellement. Evitez de les grouper tous au même endroit, et répartissez les en tenant compte du parcours de l\'internaute.',
                                  $i++        => 'Astuce : HELP !|Cliquez sur le lien "[+][Aide]" pour afficher l\'aide en ligne dans les formulaires d\'édition.',
                                  $i++        => 'Astuce : Virez-moi !|Pas besoin de ces astuces encombrantes ? Désactivez les dans <a href="index.php?admin=settings&sub=edit">les préférences du module</a>.',
                                  $i++        => 'Astuce : Faites votre choix !|Choisissez vos templates préférées et désactivez les autres dans <a href="index.php?admin=settings&sub=item">les préférences du module</a>.',
                                  $i++        => 'Astuce : Voir le code|Lorsque vous créez ou modifiez un template, visualisez directement le code généré en activant la fonction <b>Activer le mode "Editon de template"</b> les dans <a href="index.php?admin=settings&sub=index">les préférences du module</a>.',
                                  $i++        => 'Astuce : Prenez le bon chemin|En créant un menu, vous avez la possibilité de déterminer le répertoire de stockage des images. Vérifiez que celui-ci est bien ouvert en écriture !',
                                  $i++        => 'Astuce : Changement d\'adresse|Lorsque vous déplacez un lien avec une image d\'un menu à l\'autre, vérifiez bien que le répertoire de stockage du nouveau menu dispose de l\'image.',
                                  $i++        => 'Astuce : A chaque menu son répertoire|En créant un nouveau  menu, ajoutez lui son propre répertoire de stockage (créé automatiquement par le module) pour éviter tout conflit ultérieur.',
                                  $i++        => 'Astuce : Au bon menu le bon bon bloc|Choisissez le bloc qui affichera votre menu dans <a href="index.php?admin=blocks">l\'onglet blocs</a>, et profitez-en pour vérifier les paramètres de groupes du module.'
                                  );

if(!isset($only_data)) {
        $item_val_array = $info_val_array + $tips_val_array;
        $tips_count = count($item_val_array);

// Render defines
        $i=1;
 	foreach ($item_val_array as $item_lg=>$item_val) {
                 define(strtoupper('_TI_POPGEN_'.$item_lg),$item_val);
	}
}
?>