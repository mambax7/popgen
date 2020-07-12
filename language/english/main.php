<?php
/**
* XOOPS - PHP Content Management System
* Copyright (c) 2001 - 2008 <http://www.xoops.org/>
*
* Module: multiMenu 2.x
* Licence : GPL
* Authors :
*           - solo (http://www.wolfpackclan.com/wolfactory)
*/

// Common values
$com_val_array =  array(         'index'        => 'Index',
  	                         'admin'        => 'Admin',
  	                         'description'  => 'Description',

  	                         'source_code'  => 'Code source',
  	                         'style'        => 'Style',
  	                         'options'      => 'Options',
  	                         'size'         => 'Dimensions',
  	                         'align'        => 'Alignement',
                                 'left'            => 'Gauche',
                                 'center'          => 'Centre',
                                 'right'           => 'Droite',

                                 'uploaded'           => 'Fichier téléversé avec succès !',
                                 'updated'            => 'Fichier mis à jour avec succès !',

  	                         'admins'       => 'Admin',
  	                         'edit'         => 'Editer',
  	                         'clone'        => 'Cloner',
  	                         'submit'       => 'Envoyer',
  	                         'see'          => 'Voir le code',
  	                         'copy'         => 'Copier le code',
  	                         'copy_url'     => 'Copier l\'adresse des',
  	                         'url'          => 'Voir les URL',
  	                         'alt_title'    => 'Alternatif',
  	                         'content'      => 'Contenu',
  	                         'upload'       => 'Téléversement',

  	                         'images'       => 'Images',
  	                         'thumbs'       => 'Vignettes',
  	                         'medias'       => 'Médias',
  	                         'templates'    => 'Templates',
  	                         'blocks'       => 'Blocs',
  	                         'settings'     => 'Paramètres',
  	                         'utils'        => 'Utilitaires',
  	                         'delete'       => 'Supprimer',

  	                         'randname'     => 'Nom aléatoire',
  	                         'thumbwidth'       => 'Largeur',
  	                         'thumbheight'       => 'Hauteur',
  	                         'imagewidth'       => 'Largeur',
  	                         'imageheight'       => 'Hauteur',

  	                         'cols'         => 'Nombre de colonnes',

  	                         'block'        => 'Bloc',
  	                         'help'         => 'Aide',

  	                         'notactive'    => 'Cette page est indisponible.',
  	                         'dir'          => 'Répertoire',
  	                         'anonymous'          => 'Poster en anonyme',
  	                         'multi'          => 'Sélection multiple',
  	                         'media_url'      => 'URL',

  	                         'files'      => 'Fichiers'
                                 );


$div_val_array =  array(
                                  'BORDERS'     => 'Cadres et contours',

                                  'AUTO'        => 'Auto',
                                  'VISIBLE'     => 'Visible',
                                  'HIDDEN'      => 'Caché',
                                  'DOTTED'      => 'Dotted',
                                  'DASHED'      => 'Dashed',
                                  'SOLID'       => 'Solide',
                                  'DOUBLE'      => 'Double',
                                  'GROOVE'      => 'Groove',
                                  'RIDGE'       => 'Ridge',
                                  'INSET'       => 'Inset',
                                  'OUTSET'      => 'Outset',
                                  'SCROLL'      => 'Défilant',
                                  'FIXED'       => 'Fixé',
                                  'NOREPEAT'    => 'Pas de répétition',
                                  'X'           => 'Axe X',
                                  'Y'           => 'Axe Y',
                                  'repeat'      => 'Répétition',
                                  'top'         => 'Haut',
                                  'middle'      => 'Milieu',
                                  'bottom'      => 'Bas',
                                  'absoLute'    => 'Absolue',
                                  'relative'    => 'Relatif',
                                  'def_content' => 'Cumque pertinacius ut legum gnarus accusatorem flagitaret atque sollemnia, doctus id Caesar libertatemque superbiam ratus tamquam obtrectatorem audacem excarnificari praecepit, qui ita evisceratus ut cruciatibus membra deessent, inplorans caelo iustitiam, torvum renidens fundato pectore mansit inmobilis nec se incusare nec quemquam alium passus et tandem nec confessus nec confutatus cum abiecto consorte poenali est morte multatus. et ducebatur intrepidus temporum iniquitati insultans, imitatus Zenonem illum veterem Stoicum qui ut mentiretur quaedam laceratus diutius, avulsam sedibus linguam suam cum cruento sputamine in oculos interrogantis Cyprii regis inpegit.',
                                  'STYLESHEET'  => 'Mode "feuille de style"',
                                  'FIELDSET'    => 'Mode "Fieldset"',
                                  'DIV'         => 'Mode "DIV"',

                                  'FONT'        => 'Police de caractère',
                                  'ITALIC'      => 'Italic',
                                  'SMALL_CAPS'  => 'Petites capitales',
                                  'BOLD'        => 'Gras',
                                  'JUSTIFY'     => 'Justifié',
                                  'LOWERCASE'   => 'Minuscules',
                                  'CAPITALIZE'  => 'Lettre capitale',
                                  'UPPERCASE'   => 'Majuscules',
                                  'OVERLINE'    => 'Surligné',
                                  'LINE_THROUGH'=> 'Barré',
                                  'UNDERLINE'   => 'Souligné',
                                  'BLINK'       => 'Clignotant',
                                  'UNDER_OVERLINE' => 'Sur & souligné',
                                  
                                  'divmode'        => 'DIV',
                                  'fieldsetmode'        => 'Field',
                                  'stylesheetmode'        => 'Feuille de style',
                                  
                                  'overflow'        => 'Dépassement',
                                  'width'        => 'Largeur',
                                  'height'        => 'Hauteur',
                                  'top'        => 'Top',
                                  'left'        => 'Gauche',
                                  'margin'        => 'Marge',
                                  'padding'        => 'Espacement',
                                  'border_style'        => 'Bordure',
                                  'border_width'        => 'Largeur',
                                  'border_color'        => 'Couleur',
                                  'font_family'        => 'Police',
                                  'font_size'        => 'Taille',
                                  'font_style'        => 'Style',
                                  'font_variant'        => 'Variante',
                                  'font_weight'        => 'Poids',
                                  'text_align'        => 'Alignement',
                                  'text_transform'        => 'Transformation',
                                  'text_decoration'        => 'Décoration',
                                  'text_indent'        => 'Espacement',
                                  'vertical_align'        => 'Alignement vertical',
                                  'line_height'        => 'Hauteur de ligne',
                                  'background'        => 'Image de fond',
                                  'background-color'        => 'Couleur de fond',
                                  'background-position'        => 'Position',
                                  'background-repeat'        => 'Répétition',
                                  'background_attachement'        => 'Attaché',
                                  'scrollbar'        => 'Barre de défilement',
                                  'scrollbar_base_color'        => 'Couleur de base',
                                  'scrollbar_3dlight_color'        => 'Effet 3D',
                                  'scrollbar_arrow_color'        => 'Couleur du curseur',
                                  'scrollbar_darkshadow_color'        => 'Ombrage',
                                  'scrollbar_face_color'        => 'Face',
                                  'scrollbar_highlight_color'        => 'Surlignage',
                                  'scrollbar_shadow_color'        => 'Couleur de l\'Ombrage',
                                  'scrollbar_track_color'        => 'Piste'
                                                           );

// Render defines
         $item_val_array = array_merge( $com_val_array,
                                        $div_val_array
                                      );
 foreach ($item_val_array as $item_lg=>$item_val) {
                 define(strtoupper('_POPGEN_'.$item_lg),$item_val);
}
?>