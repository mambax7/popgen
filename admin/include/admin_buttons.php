<?php
/**
* Module: Admin
* Licence : GPL
* Authors :
*           - solo (http://www.wolfpackclan.com)
*/


function popgen_create_admin_links ( $admin_buttons, $select='0', $status='1',
                                        $icon_dir      = '../images/icon/',
                                        $icon_ext      = '.gif',
                                        $display_mode  = 'button',
                                        $icon_width    = '32',
                                        $prefix        = '',
                                        $style         = 'horizontal',
                                        $color         = 0
                                    ) {
// Display options
$background = $status==1?'Green':'Red';
$background = $status=='2'?'Orange':$background;
$background = $color?$background:'White';
$text_color = $color?'Transparent':'Black';

$style_info = $style=='horizontal'?'list-style: none; display:inline; margin:0px; padding:5px;':'padding:5px;';

$ret=$display_mode=='select'?'<select size="1"
          name="select"
          style="background-color:'.$background.'; color:'.$text_color.';"
          onchange="location=this.options[this.selectedIndex].value">
          <option value=""></option>
          <optgroup label="'.popgen_define( 'edit', $prefix ).' : ">'
:'<nobr><ul>'; $tiddle='';
foreach( $admin_buttons as $name=>$value ) {
                $alt_name = $name;
                $name     = $name=='status'           ?$status==1?'on':'off':$name;
                $name     = $name=='off'&&$status=='2'?'hidden':$name;
                
                $alt_name = $prefix!='none'?popgen_define( $alt_name, $prefix ):$alt_name;

  switch( $display_mode )
  {

// Image mode
  case ( 'image' ):
                if( $value ) {
                $ret .= '<li style="'.$style_info.'"> ' . $tiddle . '
                          <a href="' . $value . '"           title ="' .  $alt_name . '">
                            <img src="' . $icon_dir . $name . $icon_ext . '" alt="' . $alt_name . '" width="' . $icon_width . '" align="absmiddle" />
                          </a>
                          </li>
                          ';
                          $tiddle = $style=='horizontal'?' | ':'';
                }
  break;

// Button mode
  case ( 'button' ):
                if( $value ) {
                $selected = $value==$select?'lightgrey':'white';
                $ret .= '<li style="'.$style_info.'text-align:center; background-color:'.$selected.'; border:1px outset grey; margin:0px;">
                          <a href="' . $value . '"           title ="' .  $alt_name . '">
                            ' .  $alt_name . '
                          </a>
                          </li>
                          ';
                }
  break;

// Button mode
  case ( 'select' ):
                if( !$value ) {
                $ret .= '</optgroup><optgroup label="' . $alt_name . ' : ">
                        ';
                  } else {
                    $selected = $value==$select?' selected':'';
                $ret .= '<option value="' . $value . '"' . $selected . '>' .  $alt_name . '</option>
                        ';
                  }
  break;


  
  // Text mode
default:
                if( $value ) {
                $ret .= '<li style="'.$style_info.'"> ' . $tiddle . '
                          <a href="' . $value . '"           title ="' .  $name . '">
                            ' .  $alt_name . '
                          </a>
                          </li>
                          ';
                $tiddle = $style=='horizontal'?' | ':'';
                }
  break;

  }

}

$ret .= $display_mode=='select'?'</optroup></select>':'</ul></nobr>';
Return $ret;
}

/*
function popgen_define( $name='', $prefix='' ) {
  Global $xoopsModule;

  $define_name   = str_replace( '_', ' ',  $name);
  $constant_name = str_replace( ' ', '_',  $name);

  Return constant( strtoupper( $prefix . '_'. $xoopsModule->dirname() . '_' . $constant_name) )?constant( strtoupper( $prefix . '_'. $xoopsModule->dirname() . '_' . $constant_name) ):ucfirst( $define_name ) . ' *';
}
 */
?>