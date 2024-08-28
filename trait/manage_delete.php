<?php
// Lire le corps de la requête POST
$data = json_decode(file_get_contents('php://input'), true);

// Récupérer les données de l'événement ou de l'article
$eventId = $data['id'];
$action = $data['action'];

// Déterminer le fichier CSV à utiliser en fonction de l'action
$file = '';
$columnIndex = 0;

// Sélectionner le fichier en fonction de l'action (événements ou articles)
if (isset($data['valeur']) && $data['valeur'] == 1) {
    $file = '../csv/cv_evenement.csv'; // Fichier des événements
    $columnIndex = 4; // Index de la colonne "suspension"
} elseif (isset($data['valeur']) && $data['valeur'] == 0) {
    $file = '../csv/article.csv'; // Fichier des articles
    $columnIndex = 5; // Index de la colonne "suspension" (modifié si nécessaire)
} else {
    echo json_encode(['message' => 'Valeur invalide.']);
    exit();
}

// Lire le fichier CSV
$lines = file($file);

// Ouvrir le fichier en écriture
$updatedLines = [];
foreach ($lines as $line) {
    $columns = str_getcsv($line);
    if ($columns[0] == $eventId) {
        if ($action == 'delete') {
            // Ne pas ajouter cette ligne à la nouvelle liste (supprimer l'événement ou l'article)
            continue;
        } elseif ($action == 'suspend') {
            // Mettre la colonne "suspension" à 1
            $columns[$columnIndex] = '1';
        } elseif ($action == 'unsuspend') {
            // Mettre la colonne "suspension" à 0
            $columns[$columnIndex] = '0';
        }
    }
    $updatedLines[] = implode(',', $columns);
}

// Sauvegarder les modifications dans le fichier CSV
file_put_contents($file, implode("\n", $updatedLines));

echo json_encode(['message' => "Action '$action' effectuée avec succès."]);
?>

