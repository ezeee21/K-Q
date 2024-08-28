<?php

require '../includes/db_connection.php';

// Fetch users excluding those with the role 'admin'
$sql = 'SELECT * FROM users WHERE role != :role';
$stmt = $pdo->prepare($sql);
$stmt->execute(['role' => 'admin']);
$users = $stmt->fetchAll();

header('Content-Type: application/json');
echo json_encode($users);

?>
