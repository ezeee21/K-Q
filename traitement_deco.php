<?php
session_start();

if (isset($_SESSION['id_user'])) {
    $log_file_name = 'log_login.csv';

    $lines = file($log_file_name);

   
    if ($lines !== false) {
        // Parcourir les lignes à l'envers pour trouver la dernière connexion de l'utilisateur
        for ($i = count($lines) - 1; $i >= 0; $i--) {
            // Convertir la ligne en tableau de données
            $data = str_getcsv($lines[$i]);

            if ($data[1] === $_SESSION['id_user']) {
                $data[2] = "Déconnecté";
                // Réécrire la ligne modifiée dans le tableau
                $lines[$i] = implode(',', $data) . PHP_EOL;
                break; 
            }
        }

        // Écrire le contenu mis à jour dans le fichier
        file_put_contents($log_file_name, implode('', $lines), LOCK_EX);
    }
}

session_unset();
session_destroy();


header('Location: login.php');
?>