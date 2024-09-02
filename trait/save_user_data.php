<?php
session_start();
$data = json_decode(file_get_contents('php://input'), true);

try {
    require '../includes/config.php';

    // Vérifier si l'utilisateur est authentifié
    if (!isset($_SESSION['user_id'])) {
        http_response_code(403); // Interdit
        echo json_encode(['error' => 'Accès refusé. Veuillez vous connecter.']);
        exit;
    }

    // Vérifier le jeton CSRF
    if (!isset($data['csrf_token']) || $data['csrf_token'] !== $_SESSION['csrf_token']) {
        http_response_code(403); // Interdit
        echo json_encode(['error' => 'Échec de validation CSRF.']);
        exit;
    }

    $user_id = $_SESSION['user_id'];
    $nom = htmlspecialchars($data['nom']);
    $prenom = htmlspecialchars($data['Prenom']);
    $email = htmlspecialchars($data['email']);
    $telephone = htmlspecialchars($data['telephone']);
    $adresse = htmlspecialchars($data['address']);
    $code_postale = htmlspecialchars($data['code_postale']);
    $commune = htmlspecialchars($data['commune']);

    // Préparer la requête pour mettre à jour les informations de l'utilisateur
    $stmt = $pdo->prepare("UPDATE info SET nom = :nom, prenom = :prenom, email = :email, telephone = :telephone, adresse = :adresse , code_postale = :code_postale , commune = :commune WHERE id = :id");
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':telephone', $telephone);
    $stmt->bindParam(':adresse', $adresse);
    $stmt->bindParam(':code_postale', $code_postale);
    $stmt->bindParam(':commune', $commune);
    $stmt->bindParam(':id', $user_id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo json_encode(['success' => 'Données sauvegardées avec succès.']);
    } else {
        $errorInfo = $stmt->errorInfo();
        echo json_encode(['error' => 'Erreur lors de la mise à jour des données utilisateur : ' . $errorInfo[2]]);
    }
} catch (PDOException $e) {
    http_response_code(500); // Erreur interne du serveur
    echo json_encode(['error' => 'Erreur lors de la mise à jour des données utilisateur. Détails: ' . $e->getMessage()]);
}
unset($_SESSION['csrf_token']);
