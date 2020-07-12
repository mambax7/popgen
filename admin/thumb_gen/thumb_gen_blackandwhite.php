<?php
        
/*	$i = new imagethumbnail_blackandwhite();
	$i->open("butterfly.jpg");
	$i->setX(100);
	$i->blackandwhite();

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

	class imagethumbnail_blackandwhite extends imagethumbnail {

		function imagethumbnail_blackandwhite() {

		}
		
		function blackandwhite() {

			if (!isset($this->thumbnail)) { $this->generate(); }
			for ($x=0;$x<256;$x++) {
				$palette[$x] = imagecolorallocate($this->thumbnail,$x,$x,$x);
			}
			for ($x=0;$x<imagesx($this->thumbnail);$x++) {
				for ($y=0;$y<imagesy($this->thumbnail);$y++) {
					$rgb = imagecolorat($this->thumbnail,$x,$y);
					$r   = ($rgb >> 16) & 0xFF;
					$g   = ($rgb >> 8) & 0xFF;
					$b   = $rgb & 0xFF;
					$val = (($r*0.299)+($g*0.587)+($b*0.114));
					imagesetpixel($this->thumbnail,$x,$y,$palette[$val]);
				}
			}
		}

	}
	
?>