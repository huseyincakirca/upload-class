<?php
require_once 'class.upload.php';

/**
 *
 */
class Image extends upload
{
  var $newName,             // Yeni İsim
      $maxSize,             // Maksmum Boyut
      $place,               // Kayıt Edilecek Dosya
      $format,              // Kayıt Biçimleri
      $thumbName,           // Küçük Resim İsmi
      $textAdd,
      $permission;          // Verilen İzinler

  function __construct($file, $lang='tr_TR')
  {
    parent::__construct($file, $lang);
  }
  function yukle($new_name, $max_size, $place, $format, $thumbName=null, $textAdd=null, $permission= array('image/*')){
    if($this->uploaded){
      $this->new_name   = $new_name;
      $this->max_size   = $max_size;
      $this->place      = $place;
      $this->format     = $format;
      $this->thumbName  = $thumbName;
      $this->textAdd   = $textAdd;
      $this->permission = $permission;
      $this->image_resize       = true;
      $this->image_ratio_crop   = true;
      $this->image_x            = 600;
      $this->image_y            = 400;
      $this->image_watermark = 'yeni_son.png';
      $this->image_watermark_position = 'RT';

        if($this->textAdd){
          $this->textAdded();
        }
      $this->imageUpload();

      if($this->thumbName){
        $this->thumb($this->thumbName);
      }
    }
  }

  public function imageUpload(){

    $this->file_new_name_body = $this->new_name;
    $this->file_max_size = $this->max_size;
    $this->allowed = $this->permission;
    $this->image_convert = $this->format;
    $this->process($this->place);

  }

  public function thumb($thumb){
    $this->file_new_name_body = $this->new_name .'_'. $thumb;
    $this->file_max_size = $this->max_size;
    $this->image_resize       = true;
    $this->image_ratio_crop   = true;
    $this->image_x            = 200;
    $this->image_y            = 200;
    $this->process('thumb');

  }

  public function textAdded(){
          $this->skipLine();
          $this->image_text_font = 'foo.ttf';
          $this->image_text = $this->textAdd;
          $this->image_text_background = '#000000';
          $this->image_text_background_opacity = 85;
          $this->image_text_size = 14;
          $this->image_text_x = 5;
          $this->image_text_padding = 15;

  }

  public function skipLine(){

        $this->textAdd = explode(' ', $this->textAdd);
        $count = count($this->textAdd);
            for($i=1; $i<$count; $i=$i+2){
                    $this->textAdd[$i] = $this->textAdd[$i]. "\n";


                }
        $this->textAdd = implode(" ", $this->textAdd);
        return $this->textAdd;
  }

  public function sonuc(){
    if($this->processed){
      return true;
    }else{
      return false;
    }
  }

}





 ?>
