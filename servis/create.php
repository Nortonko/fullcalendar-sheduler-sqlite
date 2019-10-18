<?php
require_once 'db.php';

$insert = "INSERT INTO events (title, start, end, color, resource) VALUES (:title, :start, :end, :color, :resource)";

$stmt = $db->prepare($insert);

$stmt->bindParam(':start', $_POST['start']);
$stmt->bindParam(':end', $_POST['end']);
$stmt->bindParam(':title', $_POST['title']);
$stmt->bindParam(':color', $_POST['color']);
$stmt->bindParam(':resource', $_POST['resource']);

$stmt->execute();

class Result {}

$response = new Result();
$response->result = 'OK';
$response->message = 'Created with id: '.$db->lastInsertId();

header('Content-Type: application/json');
echo json_encode($response);

?>
