<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Vérification de l'existence des données envoyées via la méthode POST
    if (isset($_POST['mail']) && isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['id']) && isset($_POST['mdp'])) {

        // Nom du fichier CSV
        $file_name = 'user.csv';

        // Ouverture du fichier en mode ajout ('a')
        $file = fopen($file_name, 'a');

        // Vérification si le fichier est vide
        if (filesize($file_name) == 0) {
            // Écriture de l'en-tête du fichier CSV
            fputcsv($file, ['prenom', 'nom', 'id', 'mdp', 'mail', 'Activé']);
        }

        // Écriture des données dans le fichier CSV
        fputcsv($file, [$_POST['prenom'], $_POST['nom'], $_POST['id'], $_POST['mdp'], $_POST['mail'], 'Activé']);

        // Fermeture du fichier
        fclose($file);

        // Redirection vers la page de login
        header('Location: ./connexion.php');
        exit(); // Assurez-vous de terminer le script après la redirection
    } else {
        echo "Toutes les données ne sont pas présentes.";
    }
} else {
    echo "Méthode de requête non valide.";
}
?>
