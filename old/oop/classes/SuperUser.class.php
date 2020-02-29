<?php


class SuperUser extends User {
  public $role = "";
  
  public static $SuperUserCount = 0;

  
  function __construct($name, $login, $password, $role){
    
    parent::__construct($name, $login, $password);
    $this->role = $role;
    
    self::$SuperUserCount++;
    parent::$UserCount--;
    
  }
  
  public function showInfo() {
    parent::showInfo();
    echo "Роль: ".$this->role;
    echo "<br>";
  }
  
} // end SuperUser

