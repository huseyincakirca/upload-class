<!DOCTYPE html>
<?php
require_once 'Image.php';
    if(isset($_POST['submit'])){

    $foo = new Image($_FILES['image']);
    $foo->yukle(
                   'resim',
                   '20M',
                   'upload/',
                   'jpg',
                   isset($_POST['thumb']) ? $_POST['thumb'] : null,
                   isset($_POST['title']) ? $_POST['title'] : null
     );
    if($foo->sonuc()){
      $result = '<img style="height : 400px;" src="upload/'. $foo->file_dst_name .'" class="img-fluid pull-xs-left" alt="...">';
    }else{
      echo 'Hata Oluştur : '. $foo->error ;
    }
    echo '<pre>';
    print_r($_REQUEST);
    echo '</pre>';
}

 ?>
<!doctype html>
<html lang="en">
  <head>

    <title>Deneme</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-6">
          <form action="" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Başlık Ekle</label>
                    <input type="text" name="title" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Resim Yükleyiniz</label>
                    <input type="file" name="image" class="form-control">
                    <small id="emailHelp" class="form-text text-muted">Resim Ekleyiniz. Formatu (jpeg,jpg,png,webp,vs)</small>
                  </div>
                  <div class="form-group form-check ml-3">
                    <input  type="checkbox" name="thumb" value="thumb" class="form-check-input">
                    <label class="form-check-label">Küçük Resim Eklensin mi?</label>
                  </div>
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
        </div>
        <div class="col-6">
          <?php echo isset($result) ? $result : ''; ?>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>
