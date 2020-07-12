<?php

/*	$i = new imagethumbnail_corners();
	//$i = new imagethumbnail_dropshadow();
	//$i = new imagethumbnail_blackandwhite();
	$i->open("butterfly.jpg");
	$i->setX(100);
	//$i->setY(100);
	$i->clipcorners();

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

	class imagethumbnail_corners extends imagethumbnail {

		var $radius;
		var $color;

		function imagethumbnail_corners() {
			$this->radius = 10;
			$this->color = "FFFFFF";
		}
		
		function setRadius($radius="") {
			if (isset($radius)) { $this->radius = $radius; }
			return $this->radius;
		}
		
		function setColor($color="") {
			if (isset($color)) { $this->color = $color; }
			return $this->color;
		}

		function clipcorners() {

			if (!isset($this->thumbnail)) { $this->generate(); }
			
			$i_x = imagesx($this->thumbnail);
			$i_y = imagesy($this->thumbnail);
			$xrad = $this->radius;
			$yrad = $this->radius;
			$r = hexdec(substr($this->color,0,2));
			$g = hexdec(substr($this->color,2,2));
			$b = hexdec(substr($this->color,4,2));

			$gdCornerSource = imagecreatefromstring(base64_decode($this->cornerpng()));
			$gdCorner_x = imagesx($gdCornerSource);
			$gdCorner_y = imagesy($gdCornerSource);

			$gdCorner1 = imagecreatefromstring(base64_decode($this->blankpng()));
			$gdCorner2 = imagecreatefromstring(base64_decode($this->blankpng()));
			$gdCorner3 = imagecreatefromstring(base64_decode($this->blankpng()));
			$gdCorner4 = imagecreatefromstring(base64_decode($this->blankpng()));

			for ($y=0;$y<imagesy($gdCornerSource);$y++) {
				for ($x=0;$x<imagesx($gdCornerSource);$x++) {

					$rgb = imagecolorat($gdCornerSource,$x,$y);
					$a = ($rgb >> 24) & 0xFF;
					$colour = imagecolorallocatealpha($gdCorner1,$r,$g,$b,$a);
					imagesetpixel($gdCorner1,$x,$y,$colour);
					$colour = imagecolorallocatealpha($gdCorner2,$r,$g,$b,$a);
					imagesetpixel($gdCorner2,$gdCorner_x-$x,$y,$colour);
					$colour = imagecolorallocatealpha($gdCorner3,$r,$g,$b,$a);
					imagesetpixel($gdCorner3,$gdCorner_x-$x,$gdCorner_y-$y,$colour);
					$colour = imagecolorallocatealpha($gdCorner4,$r,$g,$b,$a);
					imagesetpixel($gdCorner4,$x,$gdCorner_y-$y,$colour);

				}
			}

			imagecopyresampled($this->thumbnail,$gdCorner1,0,0,0,0,$xrad,$yrad,$gdCorner_x,$gdCorner_y);
			imagecopyresampled($this->thumbnail,$gdCorner2,$i_x-$xrad,0,0,0,$xrad,$yrad,$gdCorner_x,$gdCorner_y);
			imagecopyresampled($this->thumbnail,$gdCorner3,$i_x-$xrad,$i_y-$yrad,0,0,$xrad,$yrad,$gdCorner_x,$gdCorner_y);
			imagecopyresampled($this->thumbnail,$gdCorner4,0,$i_y-$yrad,0,0,$xrad,$yrad,$gdCorner_x,$gdCorner_y);

		}

		//Base64 encoded corner PNG image

		function cornerpng() {

			$c  = "iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAYAAACM/rhtAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29m";
			$c .= "dHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAIBSURBVHjaYmRgYPjPMHDgOhTfAuJ7QPwYiJ8D8Rsg";
			$c .= "/gjE3wECiIXODnoIxEeB+AQQnwLic/////+NTwNAANHDgaCQ2AnEu4B4L9BBD0jRDBBAtHTgHSDeAMSb";
			$c .= "gI46TK4hAAFECwfeB+IVQLwK6LALlBoGEEAM0ExCDfwdiGcAsRXQYQzUwgABRC0HHgTiGGo6DIYBAohS";
			$c .= "B/4D4slArEkLx4EwQABR4kBQWsunlcNgGCCAyHXgSSAOobXjQBgggMhx4G4gdqSH40AYIIBIdeB2ILag";
			$c .= "l+NAGCCAGEgMObo6DoQBAoiBhDTnSG/HgTBAADEQmVtDBsJxIAwQQExE1DITgArXDFR7DCCACIXg5IEK";
			$c .= "ORgGCCB8IXgIiKcxDDAACCBcDvwBxLOBPrg+0A4ECCBcDlwIdNwShkEAAAKICUd7bhHDIAEAAYTNgSuA";
			$c .= "oXdssDgQIICYsDTTVzEMIgAQQOgO3ECtZjq1AEAAMaH1vjYxDDIAEEDIDtxJSe+LVgAggJAduIthEAKA";
			$c .= "AGJC6vHvHYwOBAggmAOPktrjpxcACCCYA08wDFIAEEAwB54arA4ECCAm6PDXucHqQIAAAjuQ0BDYQAKA";
			$c .= "AGKCDh4OWgAQQEzQkc1BCwACiAk67DpoAUAAMUHHhActAAggJuiA9aAFAAHEBG3FDFoAEEBM0JHRQQsA";
			$c .= "AgwAlTI79UaGSUQAAAAASUVORK5CYII=";

			return $c;

		}

		//Base64 encoded 127 alpha PNG image

		function blankpng() {

			$c  = "iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAYAAACM/rhtAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29m";
			$c .= "dHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAADqSURBVHjaYvz//z/DYAYAAcTEMMgBQAANegcCBNCg";
			$c .= "dyBAAA16BwIE0KB3IEAADXoHAgTQoHcgQAANegcCBNCgdyBAAA16BwIE0KB3IEAADXoHAgTQoHcgQAAN";
			$c .= "egcCBNCgdyBAAA16BwIE0KB3IEAADXoHAgTQoHcgQAANegcCBNCgdyBAAA16BwIE0KB3IEAADXoHAgTQ";
			$c .= "oHcgQAANegcCBNCgdyBAAA16BwIE0KB3IEAADXoHAgTQoHcgQAANegcCBNCgdyBAAA16BwIE0KB3IEAA";
			$c .= "DXoHAgTQoHcgQAANegcCBNCgdyBAgAEAMpcDTTQWJVEAAAAASUVORK5CYII=";

			return $c;

		}
	}
	
?>