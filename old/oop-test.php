<?php

class User {
  private $props = [];
  public $x = 100;
  public $y = 200;
  
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
  
  function __call($n, $args) {
    echo "Call method $n with args ";
    print_r($args);
  }
  
  static function __callStatic($n, $args) {
    echo "static method $n with args: ". implode(", ", $args);
  }
  
  function __toString() {
    return implode(", ", $this->props);
  }
  
  function toArray() {
    return (array)$this;
  }
  
  function __sleep() {
    return ['x', 'y'];
  } 
  
  function __wakeup() {
    
  }
  
} // end User()


$u1 = new User();
$u1->name = "John";
$u1->age = 25;


$str = serialize($u1);

$obj = unserialize($str);

echo "<pre>";
print_r($obj );
echo "</pre>";
//echo $u1;

//echo $u1::foo(1,2,3);
