<?php

class User {
  private $_name;
  private $_age;
  
  function __construct($n, $a) {
    $this->_age = $a;
    $this->_name = $n;
  }
  
  function setName($n){
    $this->_name = strtoupper($n);
  }
  function getName() {return $this->_name; }
  
  function getAge() {return $this->_age; }
  
}


$u1 = new User("Andrey", 36);

//$u1->name = "John";
$u1->setName("john");
echo $u1->getAge();