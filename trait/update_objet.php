<?php
// Lire le corps de la requête POST
$data = json_decode(file_get_contents('php://input'), true);
$valeur = $data['valeur'];  // Correction ici

// Récupérer les données de l'événement ou de l'article
if ($valeur == 1) {
    // Mise à jour des événements
    $eventId = $data['id'];
    $newName = $data['name'];
    $newDescription = $data['description'];
    $newDate = $data['date'];

    // Lire le fichier CSV des événements
    $file = '../csv/cv_evenement.csv';
    $lines = file($file);

    // Mise à jour des lignes du fichier CSV
    $updatedLines = [];
    foreach ($lines as $line) {
        $columns = str_getcsv($line);
        if ($columns[0] == $eventId) {
            $columns[1] = $newName;
            $columns[2] = $newDescription;
            $columns[3] = $newDate;
        }
        $updatedLines[] = implode(',', $columns);
    }

    // Sauvegarde des modifications
    file_put_contents($file, implode("\n", $updatedLines));

    echo json_encode(['message' => "Événement mis à jour avec succès."]);
} else {
    // Mise à jour des articles
    $articleId = $data['id'];
    $newTitre = $data['titre'];
    $newDatePublication = $data['date_publication'];
    $newAuteur = $data['auteur'];
    $newCategorie = $data['categorie'];
    $newContenu = $data['contenu'];

    // Lire le fichier CSV des articles
    $file = '../csv/article.csv';
    $lines = file($file);

    // Mise à jour des lignes du fichier CSV
    $updatedLines = [];
    foreach ($lines as $line) {
        $columns = str_getcsv($line);
        if ($columns[0] == $articleId) {
            $columns[1] = $newTitre;
            $columns[2] = $newDatePublication;
            $columns[3] = $newAuteur;
            $columns[4] = $newCategorie;
            $columns[5] = $newContenu;
        }
        $updatedLines[] = implode(',', $columns);
    }

    // Sauvegarde des modifications
    file_put_contents($file, implode("\n", $updatedLines));

    echo json_encode(['message' => "Article mis à jour avec succès."]);
}
?>
