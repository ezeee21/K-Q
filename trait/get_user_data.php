<?php
require '../includes/config.php';
session_start();

// Vérifiez si l'utilisateur est authentifié
if (!isset($_SESSION['user_id'])) {
    http_response_code(403); // Interdit
    echo json_encode(['error' => 'Accès refusé. Veuillez vous connecter.']);
    exit;
}

$user_id = $_SESSION['user_id'];

try {
    // Préparer la requête pour obtenir les informations de l'utilisateur
    $stmt = $pdo->prepare("SELECT nom, prenom, email, telephone, adresse , code_postale , commune FROM info WHERE id = :id");
    $stmt->bindParam(':id', $user_id, PDO::PARAM_INT);
    $stmt->execute();

    // Renvoyer les résultats sous forme de JSON
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérifier si l'utilisateur existe
    if ($user) {
        // Sanitization des données avant de les envoyer au client
        $user = array_map('htmlspecialchars', $user);
        echo json_encode($user);
    } else {
        http_response_code(404); // Non trouvé
        echo json_encode(['error' => 'Utilisateur non trouvé.']);
    }
} catch (PDOException $e) {
    http_response_code(500); // Erreur interne du serveur
    echo json_encode(['error' => 'Erreur lors de la récupération des données utilisateur.']);
}
?>
