<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../includes/db.php';

$sql = "SELECT title, date FROM events";
$result = $conn->query($sql);

$events = [];
while ($row = $result->fetch_assoc()) {
    $events[] = $row;
}

echo json_encode(['events' => $events]);
?>
