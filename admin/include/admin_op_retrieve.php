<?php
########################################################
#  popgen version 2.x pour Xoops 2.0.x	       #
#  						       #
#  © 2005, Solo ( www.wolfpackclan.com/wolfactory )    #
#  						       #
#  Licence : GPL 	         		       #
########################################################

                foreach( $ops as $op_name=>$op_value ) {

                                  if (!isset($_POST[$op_name])) {
                                      $$op_name       = isset($_GET[$op_name]) ? $_GET[$op_name] : $op_value;
                                      if( eregi('\|', $$op_name) ) {
                                        $operator_array = explode('|', $$op_name);
                                        $$op_name = $operator_array;
                                      }
                                  } else {
                                        $$op_name       = $_POST[$op_name];
                                  }
                  }
?>