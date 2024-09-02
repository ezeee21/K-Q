<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (isset($_SESSION['user_id'])) {
    // Récupérer l'ID utilisateur
    $userId = $_SESSION['user_id'];

    require_once '../includes/db.php'; // Inclure la connexion à la base de données


    // Supprimer l'utilisateur de la base de données
    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $stmt->close();

    // Fermer la connexion à la base de données
    $conn->close();

    // Détruire la session
    session_unset();
    session_destroy();

    // Réponse HTTP 200
    http_response_code(200);
    exit();
} else {
    // Si l'utilisateur n'est pas connecté
    http_response_code(403);
    exit();
}
?>
