<?php

/**
 * Returns media html code
 *
 * @package popgen
 * @author Solo
 * @param string $option	module option's name
 * @param string $module	module's name
 **/

function popgen_media_type( $media_url, $media_type='avi' )
{

$ext = pathinfo( $media_url, PATHINFO_EXTENSION );
$ext = $ext?strtolower( $ext ):$media_type;

    if ( $ext == 'swf' || $ext == 'flv' ) { $media['type'] = 'flash';}
elseif ( $ext == 'mov' ) { $media['type'] = 'mov'; }
elseif ( $ext == 'avi'  OR
	 $ext == 'mpg'  OR
	 $ext == 'mpeg' OR
	 $ext == 'wmv' ) { $media['type'] = 'wmp'; }
elseif ( $ext == 'ram' OR
         $ext == 'rm'  ) { $media['type'] = 'ram'; }
elseif ( $ext == 'mp3' OR
	 $ext == 'wav' OR
	 $ext == 'mid' ) { $media['type'] = 'mp3'; }
elseif ( $ext == 'jpeg' OR 
         $ext == 'jpg' OR 
         $ext == 'gif' OR 
         $ext == 'tif' OR 
         $ext == 'png') { $media['type'] = 'image'; }
  else { $media['type'] = ''; }
  
  	return $media['type'];
}

function popgen_media( $media_url, $thumb_url, $options='', $description='', $style='', $media_type='' )
{
// $media_url = '../..'.$media_url;
// $thumb = '../..'.$thumb;

$ext = pathinfo( $media_url, PATHINFO_EXTENSION ) ;
$ext = $ext?strtolower( $ext ):$media_type;

$ext_thumb = pathinfo( $thumb_url, PATHINFO_EXTENSION ) ;
$ext_thumb = strtolower( $ext_thumb );

$myts =& MyTextSanitizer::getInstance();
$description = $myts->makeTareaData4Show( $description );

if ( $ext == 'swf' )
		{ 
		$media['data'] = popgen_flash( $media_url, $thumb_url, $options, $description, $style );
		$media['type'] = 'flash';
}
elseif ( $ext == 'flv' ) {
		$media['data'] = popgen_media_flv( $media_url, '', $options, $description, $style );
		$media['type'] = 'flash';

} 

elseif ( $ext == 'mov' )
		{ 
		$media['data'] = popgen_mov( $media_url, $thumb_url, $options, $description, $style );
		$media['type'] = 'mov';
		}

elseif ( $ext == 'avi'  OR
	   $ext == 'mpg'  OR
	   $ext == 'mpeg' OR
	   $ext == 'wmv'  ) 
	   { 
	   $media['data'] = popgen_mpg( $media_url, $thumb_url, $options, $description, $style );
	   $media['type'] = 'wmp';
	   }

elseif ( $ext == 'ram' OR
	   $ext == 'rm'  )
		{ 
		$media['data'] = popgen_ram( $media_url, $thumb_url, $options, $description, $style );
		$media['type'] = 'ram';
		}

elseif ( $ext == 'mp3' OR
	   $ext == 'wav' OR
	   $ext == 'mid' )
		{ 
		$media['data'] = popgen_mp3( $media_url, $thumb_url, $options, $description, $style );
		$media['type'] = 'mp3';
	}

elseif ( ($ext == 'jpeg' OR $ext == 'jpg' OR $ext == 'gif' OR $ext == 'tif' OR $ext == 'png')
		AND ($ext_thumb == 'jpeg' OR $ext_thumb == 'jpg' OR $ext_thumb == 'gif' OR $ext_thumb == 'tif' OR $ext_thumb == 'png') )
		{
		$media['data'] = popgen_image( $media_url, $thumb_url, $options, $description, $style );
		$media['type'] = 'image';
		}

elseif ( ($ext == 'jpeg' OR $ext == 'jpg' OR $ext == 'gif' OR $ext == 'tif' OR $ext == 'png')
		AND ($ext_thumb != 'jpeg' AND $ext_thumb != 'jpg' AND $ext_thumb != 'gif' AND $ext_thumb != 'tif' AND $ext_thumb != 'png'))
		{
		$media['data'] = '<div class="errorMsg">ERROR : thumbnail not found!</div>';
		$media['type'] = 'image';
		}	

  else {
	   $media['data'] = '<div class="errorMsg">ERROR : file not found!</div>';
	   $media['type'] = '';
	   }

	return $media;
}

// Options function : convert options into optionnal setting
function popgen_options( $options ) {

if ( $options ) { $option = explode(",", $options);
	foreach ( $option as $parameters ) { 

	$par = explode("=", $parameters);
      $param 	= trim($par[0]);
	$value	= trim($par[1]);

if ( strtolower($value) == 'yes' OR strtolower($value) == 'true' ) { $value = 1; }
if ( strtolower($value) == 'no'  OR strtolower($value) == 'false' ) { $value = 0; }

 	if ( trim($param) == 'align' 	) 	{ $align = $par[1]; }
  elseif ( $param == 'width' 	 	)	{ $image_width 	= $par[1]; }
  elseif ( $param == 'height'  	)	{ $image_height 	= $par[1]; }
  else   {
	   if ( $value == 0 ) { $value = "false"; $ff_value = 0; }
     elseif ( $value == 1 ) { $value = "true";  $ff_value = 1; } 
	}
		$opt.= '<param name="'.$param.'" value="'.$value.'">';
		$ff_opt.= strtolower($param).'="'.$ff_value.'"';
	}
}

return $opt;
}



function popgen_mp3( $media_url, $thumb_url, $options, $description, $style)
{
// Different options 
$opt 		= '';
$ff_opt 	= '';
$align  	= '';
$align_in = '';
$align_out = '';
$media_width = '';
$media_height = '';

if ( $options ) { $option = explode(",", $options);
	foreach ( $option as $parameters ) { 

	$par = explode("=", $parameters);
      $param 	= trim($par[0]);
	$value	= trim($par[1]);

switch( strtolower($value) ) 
			{
                case "yes" :
                case "true" :
                case "1" :
				$value = "true";
				$ff_value = "true";
				break;

                case "no" :
                case "false" :
                case "0" :
				$value = "false";
				$ff_value = "false";
				break;

				default:
                $value = $value;
				$ff_value = $value;
			}

      if ( $param == 'align'  ) { $align  = $par[1]; }
  elseif ( $param == 'width'  ) { $width  = trim($par[1]); $media_width = 'width="'.$width.'"';    $media_style_width='width:'.$width.'px; ';  }
  elseif ( $param == 'height' )	{ $height = trim($par[1]); $media_height = 'height="'.$height.'"'; $media_style_height='height:'.$height.'px; '; }
  else   {
		$opt.= '<param name="'.$param.'" value="'.$value.'">';
		$ff_opt.= strtolower($param).'="'.$ff_value.'" ';
		}
	}
}
	if ( $media_width OR $media_height ) { $media_size = $media_width.' '.$media_height; $media_style_size = $media_style_width.$media_style_height; }
	if ( $align == 'left' ) { 	$align = ' align="left"'; }
	if ( $align == 'right' ) { 	$align = ' align="right"'; }
	if ( $align == 'center' ) { 	$align = ' ';
	$align_in = '<div align="center">'; 
	$align_out = '<br />'.$description.'</a><br /></div>';  }

$sound = $align_in;
$sound .= '<div style="'.$style.' '.$media_style_size.'" >';
$sound .= '<!-- BEGIN wmp -->';
$sound .= '<object';
$sound .= 'ID="player" ';
$sound .= $media_size;
$sound .= $align.'';
$sound .= 'classid="CLSID:22D6F312-B0F6-11D0-94AB-0080C74C7E95"';
$sound .= 'CODEBASE="http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#Version=6,4,5,715" ';
$sound .= 'standby="Loading..." ';
$sound .= 'type="application/x-oleobject">';
$sound .= '<param name="FileName" value="'.$media_url.'">';
$sound .= $opt;
$sound .= '<embed ';
$sound .= 'type="video/x-ms-asf-plugin" ';
$sound .= 'pluginsmyMedia="http://www.microsoft.com/Windows/Downloads/Contents/Products/MediaPlayer/" ';
$sound .= 'src="'.$media_url.'" ';
$sound .= 'name=\"MediaPlayer\" ';
$sound .= $ff_opt;
$sound .= $media_size;
$sound .= $align;
$sound .= '/>';
$sound .= '</embed>';
$sound .= '</object>';
$sound .= '<!-- END wmp -->';
$sound .= '</div>';
$sound .= $align_out;


return $sound;
}

// Windows Media Player
function popgen_mpg( $media_url, $thumb_url, $options, $description, $style)
{

// Different options 
$opt = '';
$ff_opt = '';
$align = '';
$align_in = '';
$align_out = '';
$media_width = '';
$media_height = '';

if ( $options ) { $option = explode(",", $options);
	foreach ( $option as $parameters ) { 

	$par = explode("=", $parameters);
    $param 	= trim($par[0]);
	$value	= trim($par[1]);

switch( strtolower($value) ) 
			{
                case "yes" :
                case "true" :
                case "1" :
				if ($param == 'playcount') {$value = $value; $ff_value = $value;}
				elseif ($param == 'balance') {$value = $value; $ff_value = $value;}
				elseif ($param == 'rate') {$value = $value; $ff_value = $value;}
				else {$value = "1";	$ff_value = "true";}
				break;

                case "no" :
                case "false" :
                case "0" :
				if ($param == 'playcount') {$value = $value; $ff_value = $value;}
				elseif ($param == 'balance') {$value = $value; $ff_value = $value;}
				elseif ($param == 'rate') {$value = $value; $ff_value = $value;}
				else {$value = "0";	$ff_value = "false";}
				break;

				default:
                $value = $value;
				$ff_value = $value;

			}

      if ( $param == 'align'  ) { $align  = $par[1]; }
  elseif ( $param == 'width'  ) { $width  = trim($par[1]); $media_width = 'width="'.$width.'"';    $media_style_width='width:'.$width.'px; ';  }
  elseif ( $param == 'height' )	{ $height = trim($par[1]); $media_height = 'height="'.$height.'"'; $media_style_height='height:'.$height.'px; '; }
  else   {
		$opt.= '<param name="'.$param.'" value="'.$value.'">';
		$ff_opt.= strtolower($param).'="'.$ff_value.'" ';
		 }	
	}
}
	if ( $media_width OR $media_height ) { $media_size = $media_width.' '.$media_height; $media_style_size = $media_style_width.$media_style_height; }
	if ( $align == 'left' ) { 	$align = ' align="left"'; }
	if ( $align == 'right' ) { 	$align = ' align="right"'; }
	if ( $align == 'center' ) { 	$align = '';
	$align_in = '<div align="center">'; 
	$align_out = '<br />'.$description.'</a><br /></div>';  }


$video = $align_in;
$video .= '<div style="'.$style.' '.$media_style_size.'" >';
$video .= '<!-- BEGIN wmp -->';
$video .= '<object ';
$video .= 'ID="player" ';
$video .= $media_size.' ';
$video .= $align;
$video .= 'classid="CLSID:22D6F312-B0F6-11D0-94AB-0080C74C7E95"';
$video .= '	CODEBASE="http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#Version=5,1,52,701" ';
$video .= 'standby="Loading..." ';
$video .= 'type="application/x-oleobject">';
$video .= '<param name="filename" value="'.$media_url.'">';
$video .= $opt;
$video .= '<embed ';
$video .= 'type="video/x-ms-asf-plugin" ';
$video .= 'pluginsmyMedia="http://www.microsoft.com/Windows/Downloads/Contents/Products/MediaPlayer/" ';
$video .= 'src="'.$media_url.'" ';
$video .= 'name="MediaPlayer" ';
$video .= $ff_opt;
$video .= $media_size;
$video .= ' '.$align;
$video .= '/>';
$video .= '</embed>';
$video .= '</object>';
$video .= '</div>';
$video .= '<!-- END wmp -->';
$video .= $align_out;

return $video;
}

function popgen_flash( $media_url, $thumb_url, $options, $description, $style)
{

// Different options 
// Available Media options
$is_align = '';
$opt = '';
$ff_opt = '';
$media_width = '';
$media_height = '';
$align_in = ''; 
$align_out = '';

if ( $options ) { $option = explode(",", $options);
	foreach ( $option as $parameters ) { 

	$par = explode("=", $parameters);
    $param 	= trim($par[0]);
	$value	= trim($par[1]);

switch( strtolower($value) ) 
			{
                case "yes" :
                case "true" :
                case "1" :
				$value = "1";
				$ff_value = "true";
				break;

                case "no" :
                case "false" :
                case "0" :
				$value = "0";
				$ff_value = "false";
				break;

                default:
                $value = $value;
				$ff_value = $value;

			}
      if ( $param == 'align'  ) { $align  = $par[1]; }
  elseif ( $param == 'width'  ) { $width  = trim($par[1]); $media_width = 'width="'.$width.'"';    $media_style_width='width:'.$width.'px; ';  }
  elseif ( $param == 'height' )	{ $height = trim($par[1]); $media_height = 'height="'.$height.'"'; $media_style_height='height:'.$height.'px; '; }
  else   {
		$opt.= '<param name="'.$param.'" value="'.$value.'">';
		$ff_opt.= strtolower($param).'="'.$ff_value.'" ';
	     }
}
}

if ( $media_width OR $media_height ) { $media_size = $media_width.' '.$media_height;  $media_style_size = $media_style_width.$media_style_height; }
if ( !$media_size ) { 
list($flash_width, $flash_height, $flash_type, $flash_attr) = @getimagesize( $media_url );
$media_size = $flash_attr; 
}

	if ( $align == 'left' ) { 	$align = ' align="left"'; }
	if ( $align == 'right' ) { 	$align = ' align="right"'; }
	if ( $align == 'center' ) { 	$align = '';
	$align_in = '<div align="center">'; 
	$align_out = '<br />'.$description.'</a><br /></div>';  }

$flash = $align_in;
$flash .= '<div style="'.$style.' '.$media_style_size.'" >';
$flash .= '<!-- BEGIN flash -->';
$flash .= '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"';
$flash .= ' codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0" ';
$flash .= $media_size;
$flash .= $align;
$flash .= '><param name="movie" value="'.$media_url.'">';
$flash .= $opt;
$flash .= '<embed src="'.$media_url.'" ';
$flash .= '	pluginsmyMedia="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" ';
$flash .= '	type="application/x-shockwave-flash" ';
$flash .= $media_size;
$flash .= ' '.$ff_opt;
$flash .= $align;
$flash .= '></embed>';
$flash .= '</object>';
$flash .= '<!-- END flash -->';
$flash .= '</div>';
$flash .= $align_out;

return $flash;
}

function popgen_media_flv( $media_url, $thumb, $options, $description, $style) {
	// Different options
	// Available Media options
	$is_align = '';
	$opt = '';
	$ff_opt = '';
	$media_width = '';
	$media_height = '';
	$align_in = '';
	$align_out = '';

	if ( $options ) {
    	$option = explode(",", $options);
		foreach ( $option as $parameters ) {
			$par = explode("=", $parameters);
			$param 	= trim($par[0]);
			$value	= trim($par[1]);

			switch( strtolower($value) ) {
                case "yes" :
                case "true" :
                case "1" :
				$value = "1";
				$ff_value = "true";
				break;

                case "no" :
                case "false" :
                case "0" :
				$value = "0";
				$ff_value = "false";
				break;

                default:
                $value = $value;
				$ff_value = $value;
			}

      if ( $param == 'align'  ) { $align  = $par[1]; }
  elseif ( $param == 'width'  ) { $width  = trim($par[1]); $media_width = 'width="'.$width.'"';    $media_style_width='width:'.$width.'px; ';  }
  elseif ( $param == 'height' )	{ $height = trim($par[1]); $media_height = 'height="'.$height.'"'; $media_style_height='height:'.$height.'px; '; }
  else {
				$opt.= '<param name="'.$param.'" value="'.$value.'">';
				$ff_opt.= strtolower($param).'="'.$ff_value.'" ';
	     	}
		}
	}

	if ( $media_width OR $media_height ) {
    	$media_size = $media_width.' '.$media_height;  $media_style_size = $media_style_width.$media_style_height;
    }
	if ( !$media_size ) {
		list($flash_width, $flash_height, $flash_type, $flash_attr) = @getimagesize( $media_url );
		$media_size = $flash_attr;
	}

	if ( $align == 'left' ) {
    	$align = ' align="left"';
    }
	if ( $align == 'right' ) {
    	$align = ' align="right"';
    }
	if ( $align == 'center' ) {
	    $align = '';
		$align_in = '<div align="center">';
		$align_out = '</div>';
    }

	$flash = $align_in;
	$flash .= '<div style="'.$style.' '.$media_style_size.'" >';
	$flash .= '<!-- BEGIN flash -->';
	$flash .= '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"';
	$flash .= ' codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0" ';
	$flash .= $media_size;
	$flash .= $align;
	$flash .= '><param name="movie" value="'.$media_url.'">';
	$flash .= $opt;
	$flash .= '<embed src="'.XOOPS_URL.'/modules/popgen/class/flashplay.swf" ';
	$flash .= 'flashvars="url='.$media_url.'"';
	$flash .= '	pluginsmyMedia="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" ';
	$flash .= '	type="application/x-shockwave-flash" ';
	$flash .= $media_size;
	$flash .= ' '.$ff_opt;
	$flash .= $align;
	$flash .= '></embed>';
	$flash .= '</object>';
	$flash .= '<!-- END flash -->';
	$flash .= '</div>';
	$flash .= $align_out;

	return $flash;
}

// Movie Player
function popgen_mov( $media_url, $thumb_url, $options, $description, $style)
{

// Different options 
// Available Media options

$opt = '';
$ff_opt = '';
$media_width = '';
$media_height = '';
$align_in = ''; 
$align_out = '';

if ( $options ) { $option = explode(",", $options);
	foreach ( $option as $parameters ) { 

	$par = explode("=", $parameters);
    $param 	= trim($par[0]);
	$value	= trim($par[1]);


switch( strtolower($value) ) 
			{
                case "yes" :
                case "true" :
                case "1" :
				$value = "1";
				$ff_value = "true";
				break;

                case "no" :
                case "false" :
                case "0" :
				$value = "0";
				$ff_value = "false";
				break;

                default:
                $value = $value;
				$ff_value = $value;
			}

      if ( $param == 'align'  ) { $align  = $par[1]; }
  elseif ( $param == 'width'  ) { $width  = trim($par[1]); $media_width = 'width="'.$width.'"';    $media_style_width='width:'.$width.'px; ';  }
  elseif ( $param == 'height' )	{ $height = trim($par[1]); $media_height = 'height="'.$height.'"'; $media_style_height='height:'.$height.'px; '; }
 else   {
		$opt.= '<param name="'.$param.'" value="'.$value.'">';
		$ff_opt.= strtolower($param).'="'.$ff_value.'" ';
		 }
	}
}
	if ( $media_width OR $media_height ) { $media_size = $media_width.' '.$media_height;  $media_style_size = $media_style_width.$media_style_height; }
	if ( $align == 'left' ) { 	$align = ' align="left"'; }
	if ( $align == 'right' ) { 	$align = ' align="right"'; }
	if ( $align == 'center' ) { 	$align = '';
	$align_in = '<div align="center">'; 
	$align_out = '<br />'.$description.'</a><br /></div>';  }

$mov = $align_in;
$mov .= '<div style="'.$style.' '.$media_style_size.'" >';
$mov .= '<!-- BEGIN mov -->';
$mov .= '<object ';
$mov .= 'classid="clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B" ';
$mov .= 'codebase="http://www.apple.com/qtactivex/qtplugin.cab" ';
$mov .= $media_size;
$mov .= $align;
$mov .= '>';
$mov .= '<param name="src" value="'.$media_url.'"> ';
$mov .= '<param name="type" value="video/quicktime">';
$mov .= '<param name="pluginsmyMedia" value="http://www.apple.com/quicktime/dowload/"> ';
$mov .= $opt;
$mov .= '<embed src="'.$media_url.'" type="video/quicktime" ';
$mov .= 'pluginsmyMedia="http://www.apple.com/quicktime/dowload/" ';
$mov .= $ff_opt;
$mov .= $media_size;
$mov .= ' '.$align;
$mov .= '/>';
$mov .= '</embed>';
$mov .= '</object>';
$mov .= '<!-- END mov -->';
$mov .= '</div>';
$mov .= $align_out; 

return $mov;
}

function popgen_ram( $media_url, $thumb_url, $options, $description, $style)
{

// Different options 
// Options generator
$opt = '';
$ff_opt = '';
$media_width = '';
$media_height = '';
$align_in = ''; 
$align_out = ''; 

if ( $options ) { $option = explode(",", $options);
	foreach ( $option as $parameters ) { 

	$par = explode("=", $parameters);
      $param 	= trim($par[0]);
	$value	= trim($par[1]);

switch( strtolower($value) ) 
			{
                case "yes" :
                case "true" :
                case "1" :
				$value = "1";
				$ff_value = "true";
				break;

                case "no" :
                case "false" :
                case "0" :
				$value = "0";
				$ff_value = "false";
				break;

                default:
                $value = $value;
				$ff_value = $value;
			}

      if ( $param == 'align'  ) { $align  = $par[1]; }
  elseif ( $param == 'width'  ) { $width  = trim($par[1]); $media_width = 'width="'.$width.'"';    $media_style_width='width:'.$width.'px; ';  }
  elseif ( $param == 'height' )	{ $height = trim($par[1]); $media_height = 'height="'.$height.'"'; $media_style_height='height:'.$height.'px; '; }
 else   {
		$opt.= '<param name="'.$param.'" value="'.$value.'">';
		$ff_opt.= strtolower($param).'="'.$ff_value.'" ';}
	}
}
	if ( $media_width OR $media_height ) { $media_size = $media_width.' '.$media_height;  $media_style_size = $media_style_width.$media_style_height; }
	if ( $align == 'left' ) { 	$align = ' align="left"'; }
	if ( $align == 'right' ) { 	$align = ' align="right"'; }
	if ( $align == 'center' ) { 	$align = '';
	$align_in = '<div align="center">'; 
	$align_out = '<br />'.$description.'</a><br /></div>';  }

$ram = $align_in;
$ram .= '<div style="'.$style.' '.$media_style_size.'" >';
$ram .= '<!-- BEGIN ram/rm -->';
$ram .= '<object ';
$ram .= 'id="RVOCX" ';
$ram .= 'classid="clsid:CFCDAA03-8BE4-11cf-B84B-0020AFBBCCFA" ';
$ram .= $media_size;
$ram .= $align;
$ram .= '>';
$ram .= $opt;
$ram .= '<param name="src" value="'.$media_url.'"/>';
$ram .= '<embed type="audio/x-pn-realaudio-plugin" src="';
$ram .= $media_url.'" ';
$ram .= $media_size;
$ram .= $align;
$ram .= ' '.$ff_opt;
$ram .= '/>';
$ram .= '</embed>';
$ram .= '</object>';
$ram .= '<!-- END ram/rm -->';
$ram .= '</div>';
$ram .= $align_out; 

return $ram;
}

// Function to display image popup
function popgen_image( $image_url, $thumb_url, $options, $description, $style)
{
// Options generator
$opt = '';
$ff_opt = '';
$plus = '';
$align = '';
$activate = '';
$popcode = '';
$thumb_width = '';
$thumb_height = '';

if ( $options ) { $option = explode(",", $options);
	foreach ( $option as $parameters ) {
	$par = explode("=", $parameters);
      $param = trim($par[0]);
      $value = trim($par[1]);
	   if ( $par[1] == '0' ) { $value = "no"; }
     elseif ( $par[1] == '1' ) { $value = "yes"; }

    if ( $param == 'activate'  ) 	{ $activate = $par[1]; }
elseif ( $param == 'align' 	 )	{ $align 	= $par[1]; }
elseif ( $param == 'width' 	 )	{ $thumb_width 	= $par[1]; }
elseif ( $param == 'height' 	 )	{ $thumb_height = $par[1]; }
elseif ( $param == 'scrollbars' AND $par[1] == '1' )	{ $plus = 20; $opt.= $param.'=yes, '; }
  else { $opt.= trim($param).'='.$value.', '; }
	}
}
$root_image_url = ereg_replace(XOOPS_URL, XOOPS_ROOT_PATH, $image_url);
$root_thumb_url = ereg_replace(XOOPS_URL, XOOPS_ROOT_PATH, $thumb_url);
// Check pictures
if ( !isset($image_width) ) { list( $image_width, $image_height, $image_type, $image_attr ) = @getimagesize( $root_image_url );

  if ( $thumb_url ) { list($thumbs_width, $thumbs_height, $thumb_type, $thumb_attr) = @getimagesize( $root_thumb_url ); }
else { $thumb_url = $image_url; $thumb_type = $image_type; }

} else { $thumbs_width = $thumb_width; }

if ( $image_width ) {
// Define popup window size
	$image_width 	= $image_width  + 20 + $plus;
	$image_height   = $image_height + 20 + $plus;

// Define popup window position
	$lpos = 600 - $image_width; if ( $lpos < 0 ) { $lpos = 0; } 
	$tpos = 400 - $image_height; if ( $tpos < 0 ) { $tpos = 0; } 

// Define thumb position and check size
	if ( $thumb_width AND $thumbs_width >= $thumb_width ) 	{ $thumb_width = ' width="'.$thumb_width.'"'; } else { $thumb_width = ''; }
        if ( $thumb_height AND $thumbs_height >= $thumb_height ){ $thumb_height = ' height="'.$thumb_height.'"'; } else { $thumb_height = ''; }
	$align_in = ''; $align_out = '</a>';
	if ( $align == 'left' ) { 	$align = ' align="left"'; }
	if ( $align == 'right' ) { 	$align = ' align="right"'; }
	if ( $align == 'center' ) { 	$align = '';
						$align_in = '<div align="center">'; 
						$align_out = '<br />'.$description.'</a>
</div>';  }

// Alt tag text
	$alt = strip_tags( $description );

// Create code
if ( $activate == "onload") {
$popcode = "
<script type='text/javascript'>
<!--
function popup(mylink, windowname)
{
if (! window.focus)return true;
var href;
if (typeof(mylink) == 'string')
   href=mylink;
else
   href=mylink.href;
window.open(href, windowname, 'width=".$image_width.", height=".$image_height.", ".$opt."left=".$lpos.", top=".$tpos."');
return false;
}
//-->
</SCRIPT>
<img src=\"".$thumb_url."\"".$align."".$thumb_width."".$thumb_height." alt=\"".$alt."\" onLoad=\"popup('".$image_url."', 'ad')\" style=\"".$style."\" />
";

} elseif ( $activate == "onmouse")  {

$popcode  = $align_in;
$popcode .= "<a href=\"#\" onMouseOver=\"pop=window.open('".$image_url."', 'PopUp', 'width=".$image_width.", height=".$image_height.", ".$opt."left=".$lpos.", top=".$tpos."', 'false'); return true;\" onMouseOut=\" pop.window.close(); return true;\" title=\"".$alt."\">";
$popcode .= "<img src=\"".$thumb_url."\"".$align."".$thumb_width."".$thumb_height." alt=\"".$alt."\" style=\"".$style."\" />";
$popcode .= $align_out;

} else {

$popcode = $align_in;
$popcode .= "<a onclick=\"pop=window.open('', 'wclose', 'width=".$image_width.", height=".$image_height.", dependent=yes, ".$opt."left=".$lpos.", top=".$tpos."', 'false'); pop.focus(); \" href=\"".$image_url."\" target=\"wclose\" title=\"".$alt."\">";
$popcode .= "<img src=\"".$thumb_url."\"".$align."".$thumb_width."".$thumb_height." alt=\"".$alt."\" style=\"".$style."\" />";
$popcode .= $align_out;
}

 } // Does images and thumb exist


return $popcode;
}

?>