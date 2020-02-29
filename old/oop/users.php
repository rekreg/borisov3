<?php

function __autoload($name) {
  include "classes/{$name}.class.php";
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

