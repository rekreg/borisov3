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
