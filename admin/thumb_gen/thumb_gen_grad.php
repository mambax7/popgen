<?php

/*	$i = new imagethumbnail_grad();
	$i->open("butterfly.jpg");
	$i->setX(200);
	$i->setColor("FF0000");
	$i->grad();

	header("Content-type: image/jpeg;");
	$i->imagejpeg();
*/

	class imagethumbnail {
	
		var $filename;
		var $x;
		var $y;
		var $image;
		var $thumbnail;

		function imagethumbnail() {

		}
		
		function open($filename) {

			$this->filename = $filename;
			$imageinfo = array();
			$imageinfo = getimagesize($this->filename,$imageinfo);
			
			$this->old_x = $imageinfo[0];
			$this->old_y = $imageinfo[1];
						
			switch ($imageinfo[2]) {
				case "1": $this->image = imagecreatefromgif($this->filename); break;
				case "2": $this->image = imagecreatefromjpeg($this->filename); break;
				case "3": $this->image = imagecreatefrompng($this->filename); break;
			}
			
		}

		function setX($x="") {
			if (isset($x)) { $this->x = $x; }
			return $this->x;
		}

		function setY($y="") {
			if (isset($y)) { $this->y = $y; }
			return $this->y;
		}

		function generate() {

			if ($this->x > 0 and $this->y > 0) {
				$new_x = $this->x;
				$new_y = $this->y;
			} elseif ($this->x > 0 and $this->x != "") {
				$new_x = $this->x;
				$new_y = ($this->x/$this->old_x)*$this->old_y;
			} else {
				$new_x = ($this->y/$this->old_y)*$this->old_x;
				$new_y = $this->y;
			}

			$this->thumbnail = imagecreatetruecolor($new_x,$new_y);
			$white = imagecolorallocate($this->thumbnail,255,255,255);
			imagefill($this->thumbnail,0,0,$white);

			imagecopyresampled ( $this->thumbnail, $this->image, 0, 0, 0, 0, $new_x, $new_y, $this->old_x, $this->old_y);

		}

		function imagegif($filename="") {
			if (!isset($this->thumbnail)) { $this->generate(); }
			imagetruecolortopalette($this->thumbnail,0,256);
			if ($filename=="") {
				imagegif($this->thumbnail);
			} else {
				imagegif($this->thumbnail,$filename);
			}
		}

		function imagejpeg($filename="",$quality=80) {
			if (!isset($this->thumbnail)) { $this->generate(); }
			imagejpeg($this->thumbnail,$filename,$quality);
		}

		function imagepng($filename="") {
			if (!isset($this->thumbnail)) { $this->generate(); }
			if ($filename=="") {
				imagepng($this->thumbnail);
			} else {
				imagepng($this->thumbnail,$filename);
			}
		}

	}

	class imagethumbnail_grad extends imagethumbnail {

		var $info;
		var $color;

		function imagethumbnail_grad() {
			$this->info = "";
			$this->color = "FFFFFF";
		}
		
		function setColor($color="") {
			if (isset($color)) { $this->color = $color; }
			return $this->color;
		}

		function grad() {

			if (!isset($this->thumbnail)) { $this->generate(); }

			$width = imagesx($this->thumbnail);
			$height = imagesy($this->thumbnail);
			$r = hexdec(substr($this->color,0,2));
			$g = hexdec(substr($this->color,2,2));
			$b = hexdec(substr($this->color,4,2));
			
			$temp = imagecreatetruecolor($width,$height);
			$bgcolor = imagecolorallocate($temp,$r,$g,$b);
			imagefill($temp,0,0,$bgcolor);

			$right = recolor(imagecreatefromstring(base64_decode($this->vertical())),$this->color);
			$bottom = recolor(imagecreatefromstring(base64_decode($this->horizontal())),$this->color);

			imagecopy($temp,$this->thumbnail,0,0,0,0,$width,$height);

			imagecopyresampled($temp,$right,0,0,0,0,7,$height,7,279);
			imagecopyresampled($temp,$bottom,0,0,0,0,$width,8,279,8);
			imagecopyresampled($temp,flip($right,1,0),$width-7,0,0,0,7,$height,7,279);
			imagecopyresampled($temp,flip($bottom,0,1),0,$height-7,0,0,$width,8,279,8);

			$this->thumbnail = $temp;


		}

		function vertical() {
		
			$c  = "iVBORw0KGgoAAAANSUhEUgAAAAcAAAEXCAYAAABh8178AAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29m";
			$c .= "dHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAV3SURBVHjaYmRgYOAH4v9A/BeK/wDxPxAGCCBmIKEO";
			$c .= "xLxAzAnELAwQAFL8HyCAQJLuQCwMVcAC1QXS/QcggEAceyD+CsSvgPghVOcvIP4JEEAgSQMg/gTET6ES";
			$c .= "b4H4HRB/BAggkKQiEH+ASryDGs8OxMwAAQSSFIBKvAdibpgEEDMCBBATiIBiJiiG8RkAAoiJAQ8ACCC8";
			$c .= "kgABhFcSIIDwSgIEEF5JgADCKwkQQHglAQIIryRAAOGVBAggvJIAAYRXEiCA8EoCBBBeSYAAwisJEEB4";
			$c .= "JQECCK8kQADhlQQIILySAAGEVxIggPBKAgQQXkmAAMIrCRBAeCUBAgivJEAA4ZUECCC8kgABhFcSIIDw";
			$c .= "SgIEEF5JgADCKwkQQHglAQIIryRAAOGVBAggvJIAAYRXEiCA8EoCBBBeSYAAwisJEEB4JQECCK8kQADh";
			$c .= "lQQIILySAAGEVxIggPBKAgQQXkmAAMIrCRBAeCUBAgivJEAA4ZUECCC8kgABhFcSIIDwSgIEEF5JgADC";
			$c .= "KwkQQHglAQIIryRAAOGVBAggvJIAAYRXEiCA8EoCBBBeSYAAwisJEEB4JQECCK8kQADhlQQIILySAAGE";
			$c .= "VxIggPBKAgQQXkmAAMIrCRBAeCUBAgivJEAA4ZUECCC8kgABhFcSIIDwSgIEEF5JgADCKwkQQHglAQII";
			$c .= "ryRAAOGVBAggvJIAAYRXEiCA8EoCBBBeSYAAwisJEEB4JQECCK8kQADhlQQIILySAAGEVxIggPBKAgQQ";
			$c .= "XkmAAMIrCRBAeCUBAgivJEAA4ZUECCC8kgABhFcSIIDwSgIEEF5JgADCKwkQQHglAQIIryRAAOGVBAgg";
			$c .= "vJIAAYRXEiCA8EoCBBBeSYAAwisJEEB4JQECCK8kQADhlQQIILySAAGEVxIggPBKAgQQXkmAAMIrCRBA";
			$c .= "eCUBAgivJEAA4ZUECCC8kgABhFcSIIDwSgIEEF5JgADCKwkQQHglAQIIryRAAOGVBAggvJIAAYRXEiCA";
			$c .= "8EoCBBBeSYAAwisJEEB4JQECCK8kQADhlQQIILySAAGEVxIggPBKAgQQXkmAAMIrCRBAeCUBAgivJEAA";
			$c .= "4ZUECCC8kgABhFcSIIDwSgIEEF5JgADCKwkQQHglAQIIryRAAOGVBAggvJIAAYRXEiCA8EoCBBBeSYAA";
			$c .= "wisJEEB4JQECCK8kQADhlQQIILySAAGEVxIggPBKAgQQXkmAAMIrCRBAeCUBAgivJEAA4ZUECCC8kgAB";
			$c .= "hFcSIIDwSgIEEF5JgADCKwkQQHglAQIIryRAAOGVBAggvJIAAYRXEiCA8EoCBBBeSYAAwisJEEB4JQEC";
			$c .= "CK8kQADhlQQIILySAAGEVxIggPBKAgQQXkmAAMIrCRBAeCUBAgivJEAA4ZUECCC8kgABhFcSIIDwSgIE";
			$c .= "EF5JgADCKwkQQHglAQIIryRAAOGVBAggvJIAAYRXEiCA8EoCBBBeSYAAwisJEEB4JQECCK8kQADhlQQI";
			$c .= "ILySAAGEVxIggPBKAgQQXkmAAMIrCRBAeCUBAgivJEAA4ZUECCC8kgABhFcSIIDwSgIEEF5JgADCKwkQ";
			$c .= "QHglAQIIryRAAOGVBAggvJIAAYRXEiCA8EoCBBBeSYAAwisJEEB4JQECCK8kQADhlQQIILySAAGEVxIg";
			$c .= "gPBKAgQQXkmAAMIrCRBAeCUBAgivJEAA4ZUECCC8kgABhFcSIIDwSgIEEF5JgADCKwkQQHglAQIIryRA";
			$c .= "AOGVBAggvJIAAYRXEiCA8EoCBBBeSYAAwisJEEB4JQECCK8kQADhlQQIILySAAGEVxIggPBKAgQQXkmA";
			$c .= "AMIrCRBAeCUBAgivJEAA4ZUECCC8kgABhFcSIIDwSgIEEF5JgADCKwkQQHglAQIMALUMGtBC6VemAAAA";
			$c .= "AElFTkSuQmCC";
			
			return $c;
		
		}

		function horizontal() {
		
			$c  = "iVBORw0KGgoAAAANSUhEUgAAARcAAAAICAYAAADTJLsuAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29m";
			$c .= "dHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAADOSURBVHjaYmRgYNAHYgMgdoDSCkAswDAKRsEoGAUU";
			$c .= "AIAAYgLi/1D8D4ph/FEwCkbBKCAbAAQQCxD/BeKfQPwViD8B8QeoHONo8IyCUTAKyAUAAcQCLVg+A/Er";
			$c .= "IH4KFX8PbdWMglEwCkYBWQAggECFyzcgfgPED6Fi74CYe7RwGQWjYBRQAgACiAXaHXoF5b8FYl4gZh/t";
			$c .= "Fo2CUTAKKAEAAcQILUg4oK0VLiifebRwGQWjYBRQAgACiBHa/WGCtmKYRwuWUTAKRgE1AECAAQBwfxdk";
			$c .= "hvh7/AAAAABJRU5ErkJggg==";

			return $c;

		}

	}

	function flip($i,$h=1,$v=0) {
		$width = imagesx($i);
		$height = imagesy($i);
		$temp = imagecreatetruecolortransparent($width,$height);
		if ($h==1) {
			for ($x=0 ; $x<$width ; $x++) {
				imagecopy($temp, $i, $width-$x-1, 0, $x, 0, 1, $height);
			}
		}
		if($v==1) {
			for ($x=0; $x<$height ; $x++) {
				imagecopy($temp, $i, 0, $height-$x-1, 0, $x, $width, 1);
			}
		}
		return $temp;
	}

	function imagecreatetruecolortransparent($x,$y) {
        $i = imagecreatetruecolor($x,$y);
        $b = imagecreatefromstring(base64_decode(blankpng()));
        imagealphablending($i,false);
        imagesavealpha($i,true);
        imagecopyresized($i,$b,0,0,0,0,$x,$y,imagesx($b),imagesy($b));
        return $i;
    }

    function blankpng() {

        $c  = "iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAYAAACM/rhtAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29m";
        $c .= "dHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAADqSURBVHjaYvz//z/DYAYAAcTEMMgBQAANegcCBNCg";
        $c .= "dyBAAA16BwIE0KB3IEAADXoHAgTQoHcgQAANegcCBNCgdyBAAA16BwIE0KB3IEAADXoHAgTQoHcgQAAN";
        $c .= "egcCBNCgdyBAAA16BwIE0KB3IEAADXoHAgTQoHcgQAANegcCBNCgdyBAAA16BwIE0KB3IEAADXoHAgTQ";
        $c .= "oHcgQAANegcCBNCgdyBAAA16BwIE0KB3IEAADXoHAgTQoHcgQAANegcCBNCgdyBAAA16BwIE0KB3IEAA";
        $c .= "DXoHAgTQoHcgQAANegcCBNCgdyBAgAEAMpcDTTQWJVEAAAAASUVORK5CYII=";

        return $c;

    }

	function recolor($image,$color="FFFFFF") {
	
		$c = sscanf($color,"%2x%2x%2x");

		$width = imagesx($image);
		$height = imagesy($image);

		$temp = imagecreatetruecolortransparent($width,$height);
	
		for ($y=0;$y<$height;$y++) {
			for ($x=0;$x<$width;$x++) {
				$rgb = imagecolorat($image,$x,$y);
				$a = ($rgb >> 24) & 0xFF;
				$new = imagecolorallocatealpha($temp,$c[0],$c[1],$c[2],$a);
				imagesetpixel($temp,$x,$y,$new);
			}
		}
		
		return $temp;
		
	}
	
?>