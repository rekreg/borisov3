<?php


const RSS_URL = "http://localhost:8080/borisov3/news/rss.xml";
const FILE_NAME = "news.xml";
const RSS_TTL = 3600;


function download($url, $filename) {
  $file = file_get_contents($url);
  if($file) file_put_contents($filename, $file);
}


  if(!is_file(FILE_NAME))
    download(RSS_URL, FILE_NAME);




?>
<!DOCTYPE html>

<html>
<head>
	<title>Новостная лента</title>
	<meta charset="utf-8" />
</head>
<body>

<h1>Последние новости</h1>
<?php
  
  $xml = simplexml_load_file(FILE_NAME);


  foreach($xml->channel->item as $news) {
    
    echo "<hr>";
    echo $news->title;
    echo "<br>";
    echo $news->link;
    echo "<br>";
    echo $news->category;
    echo "<br>";
    echo $news->pubDate;
    echo "<br>";
    echo $news->description;
    echo "<hr>";
   
    }
  
  if(time() > filemtime(FILE_NAME)+RSS_TTL )
    download(RSS_URL, FILE_NAME);
  
?>
</body>
</html>

