<?php
/*
	$i = new imagethumbnail_info();
	$i->open("butterfly.jpg");
	$i->setX(200);
	$i->info();

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

	class imagethumbnail_info extends imagethumbnail {

		var $info;
		var $color;

		function imagethumbnail_info() {
			$this->info = "";
			$this->color = "FFFFFF";
		}
		
		function setColor($color="") {
			if (isset($color)) { $this->color = $color; }
			return $this->color;
		}

		function info($text='') {

			if (!isset($this->thumbnail)) { $this->generate(); }
			
			$i_x = imagesx($this->thumbnail);
			$i_y = imagesy($this->thumbnail);
			
                        $r = hexdec(substr($this->color,0,2));
			$g = hexdec(substr($this->color,2,2));
			$b = hexdec(substr($this->color,4,2));
		//	$rgb = imagecolorat($gdCornerSource,$x,$y);
		//	$a = ($rgb >> 24) & 0xFF;

			$image = imagecreatetruecolor($i_x,($i_y+30));
		//	$black = imagecolorallocate($image,0,0,0);
		        $black = imagecolorallocate($image,$r,$g,$b);
			if( $r >= 127 || $g >= 127 || $b >= 127 ) { $white = imagecolorallocate($image,0,0,0); } else { $white = imagecolorallocate($image,255,255,255); }
			imagefill($image,0,0,$black);
			imagecopy($image,$this->thumbnail,0,0,0,0,$i_x,$i_y);
			
			$stringlength = $text?strlen($text)*imagefontwidth(4):strlen($this->old_x." by ".$this->old_y)*imagefontwidth(4);
			
			if( $text ) {
                          imagestring($image,4,($i_x-$stringlength)/2,$i_y+5,$text,$white);
                        } else {
                          imagestring($image,4,($i_x-$stringlength)/2,$i_y+5,$this->old_x." by ".$this->old_y,$white);
                        }
			
			imagedestroy($this->thumbnail);

			$this->thumbnail = $image;

		}

	}
	
?>