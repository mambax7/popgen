<?php

/**
 * Returns Random class name
 *
 * @package popgen
 * @author Solo
 * @param string $max	word default size
 **/

// Class generator
function popgen_word_generator( $max=4 )
{

$voyelle  = array('a', 'e', 'i', 'o', 'u');

$voyelle_2  = array('a', 'e', 'i', 'o', 'u', 'am', 'an', 'au', 'ai',
                                           'em', 'en', 'eu', 'ei',
                                           'im', 'in',
                                           'om', 'on', 'ou', 'oi',
                                           'um', 'un',       'ui'
                                           );
$consonne = array('b', 'c', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'p', 'qu', 'r', 's', 't', 'v', 'w', 'x', 'y', 'z'
                                           );

$consonne_2 = array('b', 'c', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'p', 'qu', 'r', 's', 't', 'v', 'w', 'x', 'y', 'z',
                                           'ff', '-',         'll', 'mm', 'nn',  'pp', 'rr', 'ss', 'tt'
                                           );

   $max = rand(1, $max);
   $class_name[0] = $consonne[rand(0,20)];
 for($i=1;$i<=$max;$i++) {

           if($i%2) {

           $v = rand(0,18);
           $c = 1;
           $class_name[$i] = $voyelle_2[rand(0,count($voyelle_2)-$v)] . $consonne[rand(0,count($consonne)-$c)] ;

           } else {

           $v = 1;
           $c = rand(0,16);
           $class_name[$i] = $voyelle[rand(0,count($voyelle)-$v)] . $consonne_2[rand(0,count($consonne_2)-$c)] ;

           }
 }
   $i++;
   $class_name[$i] = $voyelle[rand(0,count($voyelle)-1)];

   $class_name = join('',$class_name);
   
   $triple_consonnes = array("lll", "mmm", "nnn", "ppp", "rrr", "sss", "ttt", "uu", "mnn");
   $double_consonnes = array("l", "m", "n", "p", "r", "s", "t", "u", "mn");
   $class_name= str_replace($triple_consonnes, $double_consonnes, $class_name);

  return $class_name;
}


?>