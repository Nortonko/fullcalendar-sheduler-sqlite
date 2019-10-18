<?php
require_once 'db.php';

$stmt = $db->prepare('SELECT * FROM events WHERE NOT ((end <= :start) OR (start >= :end))');

$stmt->bindParam(':start', $_GET['start']);
$stmt->bindParam(':end', $_GET['end']);

$stmt->execute();
$result = $stmt->fetchAll();

class Event {}
$events = array();

foreach($result as $row) {
  $e = new Event();
  $e->id = $row['id'];
  $e->title = $row['title'];
  $e->start = $row['start'];
  $e->end = $row['end'];
  $e->color = $row['color'];
  $e->resourceId = $row['resource'];
  $events[] = $e;
}

header('Content-Type: application/json');
echo json_encode($events);

?>
