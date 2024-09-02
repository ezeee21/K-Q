<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['profile_pic'])) {
    $file = $_FILES['profile_pic'];
    $uploadDir = 'C:\xampp\htdocs\K-Q\assets/';
    $chemin = "assets/";
    $fileName = uniqid() . '_' . basename($_SESSION['user_id'].'_'.$file['name']);
    $filePath = $chemin . $fileName;

    if (move_uploaded_file($file['tmp_name'], $uploadDir . $fileName)) {
        $csvFile = '../csv/image_profile.csv';
        $userId = $_SESSION['user_id']; // Remplacez par l'ID utilisateur actuel
        $updated = false;
        $oldFilePath = null;

        // Lire le fichier CSV et mettre à jour l'entrée si l'utilisateur existe déjà
        $rows = [];
        if (($handle = fopen($csvFile, 'r')) !== FALSE) {
            while (($data = fgetcsv($handle)) !== FALSE) {
                if ($data[0] == $userId) {
                    $oldFilePath = $data[1]; // Sauvegarder l'ancien chemin de l'image
                    $data[1] = $filePath; // Met à jour l'image de l'utilisateur
                    $updated = true;
                }
                $rows[] = $data;
            }
            fclose($handle);
        }

        // Si l'utilisateur n'était pas dans le fichier, ajoutez une nouvelle ligne
        if (!$updated) {
            $rows[] = [$userId, $filePath];
        }

        // Écrire les données mises à jour dans le fichier CSV
        $handle = fopen($csvFile, 'w');
        foreach ($rows as $row) {
            fputcsv($handle, $row);
        }
        fclose($handle);

        // Supprimer l'ancienne image si elle existe et est différente de la nouvelle
        if ($oldFilePath && file_exists($uploadDir . basename($oldFilePath)) && $oldFilePath !== $filePath) {
            unlink($uploadDir . basename($oldFilePath));
        }

        // Assurez-vous que la sortie est bien au format JSON
        echo json_encode(['status' => 'success', 'image' => $filePath]);
    } else {
        echo json_encode(['status' => 'error']);
    }
}
?>
