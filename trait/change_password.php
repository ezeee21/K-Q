<?php
session_start();
require_once '../includes/db.php'; // Inclure la connexion à la base de données

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token1']) {
        die('Requête CSRF invalide.');
    }
    $userId = $_SESSION['user_id'];
    $oldPassword = $_POST['old-password'];
    $newPassword = $_POST['new-password'];

    // Vérification du mot de passe actuel
    $stmt = $conn->prepare("SELECT password FROM info WHERE id = ?");
    if ($stmt === false) {
        die('Erreur de préparation de la requête: ' . $conn->error);
    }

    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $stmt->bind_result($hashedPassword);
    $stmt->fetch();
    $stmt->close();

    if (password_verify($oldPassword, $hashedPassword)) {
        // Hashage du nouveau mot de passe
        $newHashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

        // Mise à jour du mot de passe dans la base de données
        $stmt = $conn->prepare("UPDATE info SET password = ? WHERE id = ?");
        if ($stmt === false) {
            die('Erreur de préparation de la requête: ' . $conn->error);
        }

        $stmt->bind_param("si", $newHashedPassword, $userId);

        if ($stmt->execute()) {
            echo "Mot de passe modifié avec succès.";
        } else {
            echo "Erreur lors de la mise à jour du mot de passe.";
        }

        $stmt->close();
    } else {
        echo "L'ancien mot de passe est incorrect.",$oldPassword, $hashedPassword;
    }

    $conn->close();
} else {
    echo "Requête non valide.";
}
?>
