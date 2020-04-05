<?php

require "INewsDB.class.php";

class NewsDB implements INewsDB {
  const DB_NAME = "../news.db";
  const ERR_PROPERTY = "Wrong property name";
  const RSS_NAME = "rss.xml";
  const RSS_TITLE = "Новостная лента";
  const RSS_LINK = "http://localhost:8080/borisov3/news/news.php";
  private $_db;
  
  function __construct(){
    $this->_db = new SQLite3(self::DB_NAME);
   
    if(!filesize(self::DB_NAME)) {
       
      try {
        $sql = "CREATE TABLE msgs(
                  id INTEGER PRIMARY KEY AUTOINCREMENT,
                  title TEXT,
                  category INTEGER,
                  description TEXT,
                  source TEXT,
                  datetime INTEGER
                )";
        if(!$this->_db->exec($sql))
          throw new Exception("CREATE MSGS ERROR");

        $sql = "CREATE TABLE category(
                  id INTEGER,
                  name TEXT
                )";
        if(!$this->_db->exec($sql))
          throw new Exception("CREATE CATEGORY ERROR");

        $sql = "INSERT INTO category(id, name)
                SELECT 1 as id, 'Политика' as name
                UNION SELECT 2 as id, 'Культура' as name
                UNION SELECT 3 as id, 'Спорт' as name ";
        if(!$this->_db->exec($sql))
          throw new Exception("INSERT MSGS ERROR");
    } catch(Exception $e) {
        die($e->getMessage());
    } // end try
    
    }
  }
  
  function __destruct() {
    unset($this->_db);
  }
  
  function __get($name){
    if($name == "db")
      return $this->_db;
    throw new Exception(self::ERR_PROPERTY);
  }
  
  function __set($name, $value){
    throw new Exception(self::ERR_PROPERTY);
  }
  /**
	 *	Добавление новой записи в новостную ленту
	 *	
	 *	@param string $title - заголовок новости
	 *	@param string $category - категория новости
	 *	@param string $description - текст новости
	 *	@param string $source - источник новости
	 *	
	 *	@return boolean - результат успех/ошибка
	*/
  function saveNews($title, $category, $description, $source){
    $dt = time();
    $sql = "INSERT INTO msgs (title, category, description, source, datetime) VALUES ('$title', '$category', '$description', '$source', $dt)";
    
    $result = $this->_db->exec($sql);
    if(!$result)
      return false;
    else
      $this->createRss();
    return true;
  }
  
  function db2Arr($data) {
    $arr = [];
    while($row = $data->fetchArray(SQLITE3_ASSOC))
      $arr[] = $row;
    return $arr;
  }
  
  function getNews(){
    
    $sql = "SELECT msgs.id as id, title, category.name as category, description, source, datetime";
    $sql .= " FROM msgs, category";
    $sql .= " WHERE category.id = msgs.category";
    $sql .= " ORDER BY msgs.id DESC";
    
    $items = $this->_db->query($sql);
    if(!$items)
      return false;
    return $this->db2Arr($items);
    
  }
  
  function deleteNews($id){
    $sql = "DELETE FROM msgs WHERE id ={$id}";
    return $this->_db->exec($sql);
  }
  
  function escape($data) {
    return $this->_db->escapeString(trim(strip_tags($data)));
  }
  
  function clearInt($num) {
    return abs((int) $num);
  }
  
  
  private function createRss() {
    $dom = new DOMDocument("1.0", "utf-8");
    $dom->formatOutput = true;
    $dom->preserveWhiteSpace = false;
    $rss = $dom->createElement("rss");
    $version = $dom->createAttribute("version");
    $version->value = '2.0';
    $rss->appendChild($version);
    $dom->appendChild($rss);
    $channel = $dom->createElement("channel");
    
    $title = $dom->createElement("title", self::RSS_TITLE);
    $link = $dom->createElement("link", self::RSS_LINK);
    $channel->appendChild($title);
    $channel->appendChild($link);
    $rss->appendChild($channel);
    
    $lenta = $this->getNews();
    if(!$lenta) return false;
      foreach($lenta as $news) {
        $item = $dom->createElement("item");
        $title = $dom->createElement("title", $news['title']);
        $category = $dom->createElement("category", $news['category']);

        $description = $dom->createElement("description");
        $cdata = $dom->createCDATASection($news['description']);
        $description->appendChild($cdata);
        $linkText = self::RSS_LINK. '?id='. $news['id'];
        $link = $dom->createElement("link", $linkText);
        $dt = date('r', $news['datetime']);
        $pubDate = $dom->createElement("pubDate", $dt);
        $item->appendChild($title);
        $item->appendChild($link);
        $item->appendChild($description);
        $item->appendChild($pubDate);
        $item->appendChild($category);
        $channel->appendChild($item);
      }
    $dom->save(self::RSS_NAME);
  }
  
} // end class NewsDB 


 