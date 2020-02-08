<?php

class User {
  
  public $name = "";
  public $login = "";
  public $password;
  
  public function showInfo() {
    $output = "Имя: {$this->name}";
    $output .= "<br>";
    $output .= "Логин: {$this->login}";
    $output .= "<br>";
    $output .= "Пароль: {$this->password}";
    $output .= "<br><hr><br>";

    echo $output;
  }
  
  
  function __construct($name, $login, $password){
    $this->name = $name;
    $this->login = $login;
    $this->password = $password;
    
  }
  
  function __destruct(){
    //unset($this);
    echo "Пользователь ".$this->login. " удалён <br>"; 
  }
  
  
  
  
} // end User


class SuperUser extends User {
  public role = "";
  
  function __construct($name, $login, $password, $role){
    $this->name = $name;
    $this->login = $login;
    $this->password = $password;
    $this->role = $role;
    
  }
  
}


$user1 = new User("Andrew", "Mirco84", "12345");

$user2 = new User("Dima", "Dimon86", "54321");

$user3 = new User("Anatoliy", "Tolyshy", "1949");



$user1->showInfo();
$user2->showInfo();
$user3->showInfo();

