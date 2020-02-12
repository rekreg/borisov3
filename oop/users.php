<?php

class User {
  
  public $name = "";
  public $login = "";
  public $password = "";
  
  public static $UserCount = 0;
  
  public function showInfo() {
    $output = "Имя: {$this->name}";
    $output .= "<br>";
    $output .= "Логин: {$this->login}";
    $output .= "<br>";
    $output .= "Пароль: {$this->password}";
    $output .= "<br>";

    echo $output;
  }
  
  
  function __construct($name, $login, $password){
    $this->name = $name;
    $this->login = $login;
    $this->password = $password;
    
    self::$UserCount++;
    
  }
  
  function __destruct(){
    //unset($this);
    echo "Пользователь ".$this->login. " удалён <br>"; 
    
  }
  
  
  
  
} // end User


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
  
}


$user1 = new User("Andrew", "Mirco84", "12345", "МегаМастер");
$user2 = new User("Dima", "Dimon86", "54321");
$user3 = new User("Anatoliy", "Tolyshy", "1949");

$user4 = new SuperUser("Andrew", "Mirco84", "12345", "МегаМастер");
$user5 = new SuperUser("Dima", "Dimon86", "54321", "МегаЧел");


echo "Всего обычных пользователей: ".User::$UserCount;
echo "<br>";
echo "Всего супер-пользователей: ".SuperUser::$SuperUserCount;
echo "<br>";


//$user1->showInfo();
/*
$user2->showInfo();
$user3->showInfo();
*/

