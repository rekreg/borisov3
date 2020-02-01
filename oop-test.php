<?php

class Pet {
  public $name;
  public $age = 10;

}

$cat = new Pet();
$dog = new Pet();


$cat->name = "Марта";

echo $cat->name;

