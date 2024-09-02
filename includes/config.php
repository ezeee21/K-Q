<?php
$host = '192.168.1.176';
$dbname = 'association';
$username = 'root';
$password = 'azerty';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    http_response_code(500); // Erreur interne du serveur
    echo json_encode(['error' => 'Erreur de connexion à la base de données.']);
    exit;
}
