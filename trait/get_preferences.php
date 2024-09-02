<?php
session_start();

require_once '../includes/db.php'; // Inclure la connexion à la base de données

// Vérification si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    die("Erreur: utilisateur non connecté.");
}

// Récupération de l'ID de l'utilisateur depuis la session
$user_id = intval($_SESSION['user_id']); // Assurez-vous que l'ID est un entier

// Récupération des préférences de l'utilisateur
$sql = "SELECT email_notifications, sms_notifications FROM preferences WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($email_notifications, $sms_notifications);
$stmt->fetch();
$stmt->close();
$conn->close();

// Renvoyer les préférences au format JSON
echo json_encode([
    'email_notifications' => $email_notifications,
    'sms_notifications' => $sms_notifications
]);
?>
