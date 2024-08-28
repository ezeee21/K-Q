<?php
// Connection à la base de données
require '../includes/db_connection.php';

$data = json_decode(file_get_contents('php://input'), true);

$id = $data['id'];
$role = $data['role'];

$stmt = $pdo->prepare('UPDATE users SET role = ? WHERE id = ?');
$stmt->execute([$role, $id]);

echo json_encode(['message' => 'Rôle mis à jour avec succès']);
?>
