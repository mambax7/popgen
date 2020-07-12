<?php
########################################################
#  Admin version 1.1 pour Xoops 2.0.x	       #
#  						       #
#  © 2005, Solo ( www.wolfpackclan.com/wolfactory )    #
#  						       #
#  Licence : GPL 	         		       #
########################################################
defined( 'XOOPS_ROOT_PATH' )?'':header('Location: ./');

	if (file_exists('../language/' . $xoopsConfig['language'] . '/tips.php')) {
                $only_data = 1;
		include ('../language/' . $xoopsConfig['language'] . '/tips.php');
	} else {
                $only_data = 1;
		include ('../../language/english/tips.php');
	}

 $i=0;
 $main_val_array=array();
 
 $main_val_array['settings']  =  $settings_val_array;
 $main_val_array['know']      =  $info_val_array;
 $main_val_array['tips']      =  $tips_val_array;

 $main_val_array['article']   =  array( ''          => '<h3 style="text-align:center;">10 conseils pour faciliter l\'accès à vos contenus</h3>
Par Jean-Marc Hardy – <a href="http://www.redaction.be/exemples/contenus_profonds_sept_06.htm" target="_blank">Redaction.be</a> septembre 2006

Vous gérez un portail d\'information ? Vous êtes responsables de l\'intranet d\'une grande entreprise ? Très vite, la masse de documents risque de vous imposer un véritable défi, vous contraignant d\'adopter une architecture à plusieurs étages. Voici 10 idées pour permettre à vos visiteurs de trouver l\'aiguille dans la botte de foin.
Sommaire de l\'article :

   <ol><li style="list-style-type:decimal;">Multiplier les logiques d\'accès</li><li style="list-style-type:decimal;">Utiliser des métadonnées</li><li style="list-style-type:decimal;">Optimiser le moteur de recherche</li><li style="list-style-type:decimal;">Intégrer un sentier de navigation</li><li style="list-style-type:decimal;">Prévoir une carte du site</li><li style="list-style-type:decimal;">Proposer des menus déroulants</li><li style="list-style-type:decimal;">Offrir des raccourcis</li><li style="list-style-type:decimal;">Alterner les contenus en vitrine</li><li style="list-style-type:decimal;">Personnaliser l\'accès à l\'information</li><li style="list-style-type:decimal;">Créer des sous-sites</li>
</ol><ol><li style="list-style-type:decimal;"><b>Multiplier les logiques d\'accès</b>

Le point de départ est d\'adopter une catégorisation efficace de l\'information. Des rubriques aux intitulés intuitifs. Des regroupements cohérents. Une imbrication logique.

Et rien ne vous empêche de proposer différentes logiques d\'accès à l\'information.
</li>

<li style="list-style-type:decimal;"><b>Utiliser des métadonnées</b>

Une autre façon de faciliter l\'accès à vos contenus, c\'est de les qualifier à l\'aide de métadonnées.

Les métadonnées permettent par exemple d\'identifier : les thèmes concernés, l\'auteur, la date de publication,...

Grâce aux métadonnées, un visiteur pourra, par exemple, obtenir la liste des articles publiés entre janvier 2004 et janvier 2005, ou bien tous les articles écrits par un auteur particulier, ou encore tous les articles traitant d\'un thème précis et publiés les six derniers mois.
</li>

<li style="list-style-type:decimal;"><b>Optimiser le moteur de recherche</b>

Le moteur de recherche par mot clé reste une solution pour détecter des contenus profonds.

Entendons-nous bien : il s\'agit du moteur de recherche interne, propre à votre site web, à ne pas confondre avec un moteur global tel que Google.

L\'utilité du moteur de recherche par mot clé est parfois surestimée. Bien souvent, à peine 10% des visiteurs d\'un site web y ont recours. Et pas toujours avec succès. Cependant, pour des recherches portant sur des termes précis, le moteur par mot clé demeure une arme redoutable.
</li>

<li style="list-style-type:decimal;"><b>Intégrer un sentier de navigation</b>

Le sentier de navigation aide les visiteurs à se situer dans un site profond.

Le sentier de navigation est également appelé "fil d\'Ariane" ou "breadcrumb trail" (traduisez : "sentier de pain d\'épices") par les ergonomes... allusion aux contes pour enfants tel Le Petit Poucet. En effet, le sentier de navigation permet de retrouver son chemin dans une forêt de contenus, avec, en permanence, la possibilité de remonter d\'un ou plusieurs niveaux.
</li>

<li style="list-style-type:decimal;"><b>Prévoir une carte du site</b>

La carte du site ("site map") permet aux visiteurs qui le souhaitent d\'obtenir une vision panoramique des contenus, avec un accès direct vers la plupart des pages du site.

Attention ! La carte de votre site exige une mise à jour constante. Mieux vaut en automatiser l\'indexation.

Notez que la plupart des outils que nous avons énumérés jusqu\'à présent, moteur de recherche, sentier de navigation et carte du site, ne conviennent qu\'aux sites à gros volume.

<ul><li>Si votre site web ne contient qu\'une vingtaine de pages, la carte du site n\'a pas vraiment de raison d\'être.</li>
<li>Si votre site tient sur deux niveaux, le sentier de navigation perd de son intérêt.</li>
<li>En-deça d\'une centaine de pages, le moteur de recherche risque d\'être une frustration plutôt qu\'une aide. Face à un volume de contenu trop maigre, de nombreuses recherches risquent, en effet, de n\'aboutir à aucun résultat.
</li></ul>

<li style="list-style-type:decimal;"><b>Proposer des menus déroulants</b>

Certains menus dévoilent leurs sous-rubriques au passage de la souris. L\'utilisateur a la possibilité de plonger directement vers des contenus profonds.

Cette forme de navigation n\'est pas sans risque sur le plan de l\'ergonomie :

<ul><li>le menu ne réagit pas toujours instantanément (certains utilisateurs ne réalisent pas qu\'il s\'agit de menus déroulants) ;</li>
<li>l\'utilisation de ce type de menus demande beaucoup d\'adresse ; certaines personnes sont agacées lorsqu\'elles dérapent en tentant de faire leur choix (en particulier, comme dans notre exemple, lorsque le menu contient plusieurs niveaux) ;</li>
<li>certains menus déroulants posent des problèmes de compatibilité technique (par exemple, un menu fonctionnera avec le navigateur Internet Explorer, mais pas avec Mozilla Firefox) ; nous conseillons le recours aux feuilles de style (langage CSS) plutôt que l\'utilisation du Javascript.</li></ul>

Mis à part ces obstacles, somme toute gérables, les menus déroulants offrent le gros avantage de proposer un accès direct aux contenus profonds sans encombrer l\'interface.
</li>

<li style="list-style-type:decimal;"><b>Offrir des raccourcis</b>

Il peut être utile de proposer à vos visiteurs, indépendamment de votre architecture thématique, un accès direct vers les contenus clés de votre site.

"Quick links", "Top links", "Contenus les plus populaires", "Articles les plus visités",... quelle que soit la terminologie utilisée, l\'idée reste toujours la même : offrir des raccourcis vers les contenus à forte popularité ou à forte valeur ajoutée, afin que ces derniers ne se perdent pas dans la masse.
</li>

<li style="list-style-type:decimal;"><b>Alterner les contenus en vitrine </b>

La page d\'accueil de votre site a pour mission de mettre en valeur la richesse de vos contenus. Tout comme la vitrine d\'un magasin, elle constitue un espace très exposé qui permet de faire étalage de vos meilleurs produits.

Si vous possédez un site web particulièrement volumineux et profond, il peut être judicieux de faire remonter en surface, à tour de rôle, différents contenus.

Rien ne vous empêche de profiter de la conjoncture ou d\'effets saisonniers pour mettre en valeur tel ou tel contenu. Par exemple, pendant la période des fêtes de fin d\'année, le site de la gendarmerie attirera l\'attention de ses visiteurs sur les risques de l\'abus d\'alcool au volant et renverra vers certaines tristes statistiques en la matière.
</li>

<li style="list-style-type:decimal;"><b>Personnaliser l\'accès à l\'information</b>

Certains sites web suggèrent des articles à leurs visiteurs, en fonction de leur origine géographique ou en fonction de leur comportement lors de visites précédentes.

Par exemple, lorsque je me rends chez mon libraire virtuel Amazon, il m\'accueille comme ceci :

Ensuite, il me soumet quelques "recommandations" de lectures en fonction de mes achats ou consultations précédentes...
</li>

<li style="list-style-type:decimal;"><b>Créer des sous-sites</b>

Si vous gérez le site d\'une grande multinationale ou d\'une institution d\'envergure, il arrivera un moment où, quels que soient vos efforts de catégoriser efficacement vos contenus, la masse d\'information sera telle qu\'il vous sera quasiment impossible de proposer un système de navigation simple.

Je ne partage pas la règle des trois clics, règle pseudo-scientifique qui voudrait que tous les contenus d\'un site web soient accessibles en trois clics maximum. La clarté des options de navigation prime largement sur le nombre de clics.

En revanche, il peut être très utile de créer plusieurs espaces d\'information distincts. 

Le gros avantage, en termes d\'ergonomie, c\'est que chaque sous-site dispose d\'un système de navigation et de recherche autonome. Le visiteur se sentira moins noyé.

Du point de vue du référencement, la stratégie des sous-sites s\'avère également intéressante. Elle permet une indexation plus précise et des renvois d\'un site vers l\'autre.

Si vous créez des sous-sites, vous veillerez à leur donner un air de famille graphique, de même que vous les ferez chapeauter par un site coupole.
</ol>         ' );


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
                        echo '<th colspan="2" align="left">';
                        echo admin_define( $items );
                        echo '</th>';
                  echo '</tr>';

 	foreach ( $items_val as $item_lg=>$item_val ) {

                 $item_val = explode('|',$item_val);
                 $title = explode(':',$item_val[0]);

                        echo '<tr>';
                 if( $item_lg || $item_lg == '0' ) {
                   $title = isset($title[1])?$title[1]:$title[0];
                   $title = isset($item_val[2])?'<a href="'.$item_val[2].'" target="blank">'.$title.'</a>':$title;
                        echo '<td class="head" width="30%">';
                        echo $item_lg.'. ' . $title ;
                        echo '</td>';
                        $colspan = '';
                 } else { $colspan = ' colspan="2"'; }

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