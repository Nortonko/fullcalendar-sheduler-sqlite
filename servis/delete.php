<?php
require_once 'db.php';

$insert = "DELETE FROM events WHERE id = :id";

$stmt = $db->prepare($insert);

$stmt->bindParam(':id', $_POST['id']);

$stmt->execute();

class Result {}


header('Content-Type: application/json');
echo 1;

?>
