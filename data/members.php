<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../includes/db.php';

$sql = "SELECT name FROM members";
$result = $conn->query($sql);

$members = [];
while ($row = $result->fetch_assoc()) {
    $members[] = $row;
}

echo json_encode(['members' => $members]);
?>
