<?php

function writeline($string)
{
   $line = date("Y-m-d h:i:sa ") . $string . "\n";
   $this->open();
   $res = fwrite ( $this->handle, $line );
   $this->close();
   return $res;
}



class Data
{
   function findImage($id)
   {
      $comments = file_get_contents("telegramma/data/comments");
      return strstr($comments, $images);
   }

   function getNewImageID()
   {
      do
      {
         $id = rand(1000000,9999999);
      }
      while (Data::findImage($id));
      //$fh = fopen ("telegramma/data/images", "a+");
      //fwrite($fh, $id . "\n");
      //fclose($fh);
      return $id;
   }

   function writeComment($name, $img, $comment)
   {
      $fh = fopen ("telegramma/data/comments", "a+");
      $comment = str_replace("\r\n", "<br>", $comment);
      fwrite($fh, "-.--.- " . $img . "|" . time() . "|" . $name . "|" . $comment . "\x0d\x0a");
      fclose($fh);
   }

   function getComments($str)
   {
      return explode("-.--.-", $str);
   }

   function getComment($str)
   {
      $arr = explode("|", $str);
      $arr[1] = date("d/m/Y", $arr[1]);
      return $arr;
   }

}


?>