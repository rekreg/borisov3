<?php


$o = new Simple();





/*
class Math {
  const PI = M_PI;
  
  static function pow($base, $exp) {
    return $base ** $exp;
  }
}


echo Math::pow(2,3);
*/


/*class A {
  public static $cntA = 0;
  function __construct() {
    ++self::$cntA;
  }
  function __clone() {
    self::__construct();
  }
}


class B extends A {
  public static $cntB = 0;
  function __construct() {
    parent::__construct();
    ++self::$cntB;
    --parent::$cntA;
  }
}


$a = new A();
$b = new A();
$c = new A();
$d = clone $a;
$x = new B(); 
$y = new B();
$z = new B();


echo "A objects: ". A::$cntA . "<br>";
echo "B objects: ". B::$cntB . "<br>";*/