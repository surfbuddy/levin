<?php

class Image
{
   // -------------------------------------------------------------------------
   //		void processImage ( )
   // -------------------------------------------------------------------------
   function processImage($img_id)
   {
      // files
      $src_file = $_FILES['pic']['tmp_name'];
      if (!$src_file)
         return false;

      // import source image
      $type = $_FILES['pic']['type'];
      if ($type == "image/jpeg" or $type == "image/pjpeg")
         $src_img = imagecreatefromjpeg($src_file);
      else if ($type == "image/gif")
         $src_img = imagecreatefromgif($src_file);
      else if ($type == "image/png")
         $src_img = imagecreatefrompng($src_file);
      else
         return "Not a valid image file";

      // destination file name
      $dest_file = $img_id . ".jpg";

      // get source dimensions
      $src_size = getimagesize($src_file);

      // set destination dimensions
      $dest_size_large = array(640, 640);
      $dest_size_small = array(150, 150);

      // resize calculations
      $scale_large = min($dest_size_large[0] / $src_size[0], $dest_size_large[1] / $src_size[1]);
      $scale_small = min($dest_size_small[0] / $src_size[0], $dest_size_small[1] / $src_size[1]);
      
      $dsl = array($scale_large * $src_size[0], $scale_large * $src_size[1]);
      $dss = array($scale_small * $src_size[0], $scale_small * $src_size[1]);

      // create destination image
      $dest_full = imagecreatetruecolor($dsl[0], $dsl[1]);
      $dest_thumb = imagecreatetruecolor($dss[0], $dss[1]);

      // resample
      imagecopyresampled($dest_full, $src_img, 0,0,0,0, $dsl[0], $dsl[1], $src_size[0], $src_size[1]);
      imagecopyresampled($dest_thumb, $src_img, 0,0,0,0, $dss[0], $dss[1], $src_size[0], $src_size[1]);

      // write destination image to file
      imagejpeg($dest_full, "telegramma/photos/" . $dest_file, 85);
      imagejpeg($dest_thumb, "telegramma/thumbs/" . $dest_file, 95);
      //copy($_FILES['pic']['tmp_name'], "../data/" . $dest_file);
      return true;
   }


   function display($img_id)
   {
      if (Image::exists($img_id))
      {
         $fn = "telegramma/photos/$img_id.jpg";
         list($x, $y) = getimagesize($fn);
         $x += 20; $y +=20;
         echo "<a href='$fn' onclick=\"window.open ('$fn', 'imgwin', 'menubar=0,resizable=0,width=$x,height=$y'); return false;\">\n";
         echo "<img src='telegramma/thumbs/$img_id.jpg' border=0>";
         echo "</a>\n";
      }
      else
      {
         echo "<!-- file " . (int)$img_id . ".jpg not found! -->\n";
      }
   }

   function exists($img_id)
   {
      return !(bool)Image::not_exists($img_id);
   }

   function not_exists($img_id)
   {
      if (!file_exists("telegramma/photos/" . $img_id . ".jpg"))
         return "Photo not found";
      if (!file_exists("telegramma/thumbs/" . $img_id . ".jpg"))
         return "Thumbnail not found";
      else
         return false;
   }


}


?>