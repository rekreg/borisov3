<?php

class Pet {
  public $name;
  public $age = 10;
  
  function say($w) {
    echo "Object said $w";
  }

}

$cat = new Pet();
$dog = new Pet();


$cat->name = "Марта";

echo $cat->name;



