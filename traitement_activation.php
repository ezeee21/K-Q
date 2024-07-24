<?php
session_start();
if (isset($_POST['action']) && isset($_GET['route'])) {
    $action = $_POST['action'];
    $route = $_GET['route'];

    // Vérifier l'action et la route
    
        // Chemin vers le fichier CSV
        $fichier_csv = 'user.csv';

        // Ouvrir le fichier CSV en mode lecture et écriture
        $file = fopen($fichier_csv, 'r');

        if ($file) {
            // Lire le contenu du fichier CSV dans un tableau
            $tab1 = [];
            while (($data = fgetcsv($file)) !== false) {
                $tab1[] = $data;
            }
            fclose($file);

            // Parcourir le tableau pour trouver et modifier la ligne appropriée
            foreach ($tab1 as $key => $value) {
                if ($value[3] == $route ) { 
                    if($tab1[$key][6]== 'Desactivé'){
                    $tab1[$key][6] = 'Activé';
                    break;
                    }
                    else {
                        $tab1[$key][6] = 'Desactivé';
                        break;
                    }
                }
                
            }

            $file1 = fopen('user.csv', 'w');
            // Écrire les modifications dans le fichier CSV
            foreach ($tab1 as $ligne) {
                fputcsv($file1, $ligne);
            }

            // Fermer le fichier
            fclose($file1);

            // Rediriger l'utilisateur vers user.php après modification
            header('Location: user.php');
            exit; // Assurez-vous d'utiliser exit après header pour arrêter l'exécution du script
        } 
    }

?>
