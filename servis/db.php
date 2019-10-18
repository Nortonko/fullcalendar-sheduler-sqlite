<?php

$db_exists = file_exists("bow.sqlite");

$db = new PDO('sqlite:bow.sqlite');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

if (!$db_exists) {
    //create the database
    $db->exec("CREATE TABLE IF NOT EXISTS events (
                        id INTEGER PRIMARY KEY, 
                        title TEXT, 
                        start DATETIME, 
                        end DATETIME,
                        color VARCHAR(7),
                        resource VARCHAR(30))");

        $insert = "INSERT INTO events (title, start, end, color, resource) VALUES (:title, :start, :end, :color, :resource)";
    $stmt = $db->prepare($insert);
 
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':start', $start);
    $stmt->bindParam(':end', $end);
    $stmt->bindParam(':color', $color);
    $stmt->bindParam(':resource', $resource);
 
    foreach ($messages as $m) {
      $title = $m['title'];
      $start = $m['start'];
      $end = $m['end'];
      $color = $m['color'];
      $resource = $m['resource'];
      $stmt->execute();
    }
    
}

?>
