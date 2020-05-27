<?php

require_once 'class.upload.php';
  if($_POST){
    $image = new Upload($_FILES['image']);
    if($image->uploaded){
      $image->process('upload');
      if($image->processed){
        echo 'Başarılı';
      }else{
        echo 'Hata Var';
      }
    }
  }



 ?>
 <!DOCTYPE html>
 <html lang="tr" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>


          <form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="image">
            <input type="submit" name="submit" value="Gönder">
          </form>
   </body>
 </html>
