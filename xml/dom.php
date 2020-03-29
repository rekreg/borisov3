<?php 
  header( "Content-Type: text/html;charset=utf-8");


  $dom = new DomDocument();

  $dom->load("catalog.xml");

  // Получение корневого элемента
  $root = $dom->documentElement;

  $html = "";

/*

 echo "<pre>";
 print_r($root->textContent);
echo "</pre>";
*/



?>
<html>

<head>
  <title>Каталог</title>
</head>

<body>
  <h1>Каталог книг</h1>
  <table border="1" width="100%">
    <tr>
      <th>Автор</th>
      <th>Название</th>
      <th>Год издания</th>
      <th>Цена, руб</th>
    </tr>
    <?php 
      //Парсинг 
      foreach($root->childNodes as $book) {
        if($book->nodeType === 1) {
          $html .= "<tr>";
          foreach($book->childNodes as $item) {
            if($item->nodeType === 1) {
              $html .= "<td>{$item->textContent}</td>";
            } 
          }
          $html .= "</tr>";
        }
      }
    echo $html;
    ?>
  </table>
</body>

</html>
