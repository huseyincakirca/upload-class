<?php


    class SatirAtla{

    				public $string;

    				public function __construct($deger){

              $this->string = $deger;
              return $this->string;

    								}


    				public function atla(){

  		$this->string = explode(' ', $this->string);
  		$count = count($this->string);
  		for($i=2; $i<$count; $i=$i+3){
  						$this->string[$i] = $this->string[$i]. '<hr>';


  						}
    		$this->string = implode(" ", $this->string);
    		return $this->string;


    								}



    				}
