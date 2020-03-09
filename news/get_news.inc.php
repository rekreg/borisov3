<?php

$items = $news->getNews();

if($items === false):
  $errMsg = "Произошла ошибка при выводе новостной ленты";
elseif(!count($items)):
  $errMsg = "Новостей нет";

else:
  $html = "";
  foreach($items as $item):
    $title = $item['title'];
    $category = $item['category'];
    $description = $item['description'];
    $source = $item['source'];
    $dt = date("d.m.Y H:i:s", $item['datetime']);

    $html .= "<hr>";
    $html .= "<h3>$title</h3>";
    $html .= "<p>";
    $html .= $description;
    $html .= "<br><br>";
    $html .= $category . " | ".$dt;
    $html .= " | <a href='$source'>$source</a>";
    $html .= "</p>";
    $html .= "<p align='right'>";
    $html .= "<a href='news.php?del=".$item['id']."'>Удалить</a>";
    $html .= "</p>";
    

   
  endforeach;
    $html .= "<hr>";
  echo $html;
  
endif;
  

  

