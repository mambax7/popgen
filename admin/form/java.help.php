<?php
/**
* XOOPS - PHP Content Management System
* Copyright (c) 2001 - 2006 <http://www.xoops.org/>
*
* Module: multilink 1.90
* Licence : GPL
* Authors :
*           - solo (http://www.wolfpackclan.com/wolfactory)
*/

$drop['in'] = '
               <script language="JavaScript" 
                       type="text/javascript" 
                       src="../script/expandable.js"></script>
               <style type="text/css">
                       td .head     { width: 25%; }
                       td .header a { color:yellow; padding-left:3px; }
               </style>
              ';

function popgen_drop_form( $cat_name, $help_text='', $help_title='Help', $is_open=0  ) {

   $myts =& MyTextSanitizer::getInstance();
   $drop_code = array();

if( $help_text ) {
   $help_link = '<div style="text-align:right;">
            <a title="show/hide"
                    id="'.$cat_name.'_link"
                    href="javascript: void(0);"
                    onclick="toggle(this, \''.$cat_name.'\');">[-]</a>['.$help_title.']</div>
                 ';

   $help_content = '
                 <tr><td colspan="2">
    		         <div id="'.$cat_name.'" style="text-align:left;">
                             ' . $myts->displayTarea($help_text, 1, 1, 1) . '
                         </div>
                 </td></tr></table>

                 <script type="text/javascript" language="javascript">
                         toggle(getObject(\''.$cat_name.'_link\'), \''.$cat_name.'\');
                 </script>
                 <!-- flooble Expandable '.$cat_name.' box end  -->
                  ';

} else { $help_link='';
         $help_content= '</td></tr></table>'; }

    $drop_code['in'] = '
                 <tr><th colspan="2">
    			 <div align="left" class="header">
                 <!-- flooble Expandable '.$cat_name.' box start -->
                 <a title="show/hide"
                    id="select_'.$cat_name.'_link"
                    href="javascript: void(0);"
                    onclick="toggle(this, \'select_'.$cat_name.'\');">[-]</a>['.$cat_name.'] ' . $help_link . '
                 </div>
                 </th></tr>
                 ' . $help_content . '
                 <div id="select_'.$cat_name.'">
                 <table width="100%" class="outer" cellspacing="1">';

    $drop_code['out']  = '</table></div>';

    $drop_code['out'] .= $is_open?'':'<script type="text/javascript" language="javascript">
                              toggle(getObject("select_'.$cat_name.'_link"), "select_'.$cat_name.'");
                      </script>';

    $drop_code['out'] .= '<!-- flooble Expandable '.$cat_name.' box end  -->
                      <table width="100%" class="outer" cellspacing="1">
                      ';

Return $drop_code;

    }



?>