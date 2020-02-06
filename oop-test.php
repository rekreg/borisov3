<?php

class Pet {
  public $name;
  public $age = 10;
  public $type;
  
  function say($w) {
    echo "{$this->name} said $w <br>";
  }
  
  function functionName(){
    echo "<p>Вызвана функция ".__FUNCTION__."<br>";
  }
  
  function className(){
    echo "<p>Используем класс ".__CLASS__."<br>";
  }
  
  function methodName(){
    echo "<p>Вызван метод ".__METHOD__."<br>";
  }
  
  function __construct($type) {
    $this->type = $type;
    echo "{$type} СОЗДАН! <br>";
  }
  
  function __destruct() {
    //$this->type = $type;
    echo "Удален! <br>";
    
  }
  
   
  

}

$cat = new Pet("cat");
$dog = new Pet("dog");


$cat->name = "Марта";
//echo $cat->name;
$dog->name = "Тузик";
$dog->say("Gav");

$dog->functionName();
$dog->className();
$dog->methodName();



