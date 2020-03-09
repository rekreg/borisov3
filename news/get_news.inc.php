<?php

$result = $news->getNews();

if(!$result) {
  $errMsg = "Произошла ошибка при выводе новостной ленты";
} else {
  echo "<pre>";
  print_r($result);
  echo "</pre>";
  
  $title = $result['title'];
  $category = $result['category'];
  $description = $result['description'];
  $source = $result['source'];
  $dt = $result['datetime'];
  
  $html = "<hr>";
  $html .= "<h3>$title</h3>";
  $html .= "<p>$description</p>";
  $html .= "<p>Опубликована: ". date("d.m.Y H:i:s", $dt). "</p>";
  $html .= "<a href='$source'>$source</a>";
 
  $html .= "<hr>";

  echo $html;
  
}
  

  

