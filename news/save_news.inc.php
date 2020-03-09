<?php

$title = $news->escape($_POST['title']);
$category = $news->clearInt($_POST['category']);
$description = $news->escape($_POST['description']);
$source = $news->escape($_POST['source']);

if(empty($title) || empty($category) || empty($description) || empty($source)):
  $errMsg = "Заполните все поля формы!";


else:
  $res = $news->saveNews($title, $category, $description, $source);
  if($res):
    header('Location: '.$_SERVER['PHP_SELF']);
  else:
    $errMsg = "Произошла ошибка при добавлении новости";
  endif;

endif;