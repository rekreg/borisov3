<?php

class User {
  private $props = [];
  
  function __set($n, $v) {
    if($n == "name" or $n == "age")
      $this->props[$n] = $v;
    else
      throw new Exception("Error set!");
  }
  
  function __get($n) {
    if($n == "name" or $n == "age")
      return $this->props[$n];
    else
      throw new Exception("Error set!");
  }
  
}


$u1 = new User();
$u1->name = "John";

echo $u1->name;
