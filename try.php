<?php

function test($var = false) {
  try {
    echo "Start <br>";
    if(!$var)
      throw new Exception("$var is false!");
    echo "Continue <br>";
  } catch (Exception $e) {
    echo "Exception: ". $e->getMessage(). "<br>";
    echo "in file: ". $e->getFile() . "<br>";
    echo "on line: ". $e->getLine() . "<br>";
  }
  echo "The end<br><hr>";
}


test(5 < 3);
//var_dump(test(), test(1));

?>