<?php
session_start();

require_once '../includes/db.php'; // Inclure la connexion à la base de données


// Vérification si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    die("Erreur: utilisateur non connecté.");
}

// Vérification du jeton CSRF
if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token2']) {
    die("Erreur: token CSRF invalide.");
}

// Récupération de l'ID de l'utilisateur depuis la session
$user_id = intval($_SESSION['user_id']);

// Récupération et validation des données POST
$email_notifications = isset($_POST['email_notifications']) ? 1 : 0;
$sms_notifications = isset($_POST['sms_notifications']) ? 1 : 0;

// Mise à jour des préférences dans la base de données
$sql = "UPDATE preferences SET email_notifications = ?, sms_notifications = ? WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iii", $email_notifications, $sms_notifications, $user_id);

if ($stmt->execute()) {
    echo "Préférences sauvegardées avec succès";
} else {
    echo "Erreur: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
