<?php
// Connection à la base de données
require '../includes/db_connection.php';


// Supprimer, suspendre ou réactiver l'utilisateur
$data = json_decode(file_get_contents('php://input'), true);
$userId = $data['id'];
$action = $data['action'];

if ($action === 'delete') {
    $stmt = $pdo->prepare('DELETE FROM users WHERE id = ?');
    if ($stmt->execute([$userId])) {
        echo json_encode(['message' => 'Utilisateur supprimé avec succès.']);
    } else {
        echo json_encode(['message' => 'Erreur lors de la suppression de l\'utilisateur.']);
    }
} elseif ($action === 'suspend') {
    $stmt = $pdo->prepare('UPDATE users SET suspended = 1 WHERE id = ?');
    if ($stmt->execute([$userId])) {
        echo json_encode(['message' => 'Utilisateur suspendu avec succès.']);
    } else {
        echo json_encode(['message' => 'Erreur lors de la suspension de l\'utilisateur.']);
    }
} elseif ($action === 'unsuspend') {
    $stmt = $pdo->prepare('UPDATE users SET suspended = 0 WHERE id = ?');
    if ($stmt->execute([$userId])) {
        echo json_encode(['message' => 'Suspension levée avec succès.']);
    } else {
        echo json_encode(['message' => 'Erreur lors de la levée de la suspension.']);
    }
} else {
    echo json_encode(['message' => 'Action inconnue.']);
}
?>
