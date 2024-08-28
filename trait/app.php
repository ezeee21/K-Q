<?php
require '../includes/db_connection.php';
// Fetch users
$stmt = $pdo->query('SELECT * FROM users');
$users = $stmt->fetchAll();

header('Content-Type: application/json');
echo json_encode($users);



?>
