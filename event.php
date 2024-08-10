<?php
// Démarrer la session pour stocker les événements
session_start();

// Supprimer un événement si le formulaire de suppression est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_event_index"])) {
    $event_index = intval($_POST["delete_event_index"]);
    if (isset($_SESSION["events"][$event_index])) {
        // Supprimer l'événement
        unset($_SESSION["events"][$event_index]);
        // Réindexer le tableau
        $_SESSION["events"] = array_values($_SESSION["events"]);
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body {
    margin: 0;
    background-color: #F8F9F3;
}

.container {
    width: 100%;
    margin: auto;
    overflow: hidden;
}

.logo img {
    width: 50px;
}

.container ul {
    padding: 0;
    margin: 0;
    list-style: none;
    display: flex;
    justify-content: space-between;
}

.container ul li a {
    padding: 16px;
    display: flex;
    text-align: center;
    display: inline;
    font-family: "WWFRegular", "Helvetica Neue", "Arial", sans-serif;
    font-size: 1.385rem;
    font-weight: 400;
    line-height: 2.6rem;
    letter-spacing: 1.29px;
    font-style: normal;
    color: black;
    text-transform: uppercase;
    text-decoration: none;
}

.container ul li a:hover {
    background-color: #555;
}

.log a {
    color: white;
    text-decoration: none;
    border-radius: 5px;
}

.container .menu-icon {
    display: none;
}

@media screen and (max-width: 768px) {
    .container ul {
        max-height: 0;
        display: none;
    }
    .container ul.open {
        display: block;
        max-height: 1000px;
    }
    .container ul li {
        width: 100%;
        float: none;
    }
    .container .menu-icon {
        display: block;
        text-align: center;
        color: white;
        padding: 14px 16px;
        cursor: pointer;
    }
}

.accueil {
    width: 100%;
    height: 100vh;
    background-image: url('assets/accueil.jpg'); /* Chemin vers votre image de fond */
    background-size: cover; /* Couvre toute la zone sans répétition */
    background-repeat: no-repeat; /* Évite la répétition */
    background-position: center; /* Centre l'image */
}

.text {
    font-family: "WWFRegular", "Helvetica Neue", "Arial", sans-serif;
    font-size: 4rem;
    font-weight: 400;
    line-height: 6rem;
    letter-spacing: 4px;
    font-style: normal;
    color: wheat;
    padding-left: 15px;
    text-shadow: 0 2px 20px rgba(0, 0, 0, 0.15);
    text-transform: uppercase;
    width: 60%;
    height: 60%;
    padding-top: 15px;
}

.slogan {
    opacity: 60%;
}

.presentation {
    font-family: "WWFRegular", "Helvetica Neue", "Arial", sans-serif;
    width: 100%;
    height: 125vh;
    padding-top: 60px; /* Ajustez le padding pour laisser de l'espace pour le bouton */
}

.qui {
    text-align: center;
    font-size: 2rem;
    font-weight: 400;
    line-height: 6rem;
    letter-spacing: 4px;
    font-style: normal;
    padding-left: 15px;
    text-shadow: 0 2px 20px rgba(0, 0, 0, 0.15);
    text-transform: uppercase;
    padding-top: 10px;
}

.pres {
    width: 70%;
    margin: 20px auto;
    padding: 20px;
    background: #928565;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.info1 {
    line-height: 2rem;
}

.event-image {
    max-width: 300px;
    max-height: 200px;
    margin-right: 10px;
    vertical-align: middle;
}

.delete-button {
    background-color: red;
    color: white;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
    border-radius: 5px;
    font-size: 0.9rem;
}

.create-event-button {
    background-color: #28a745; /* Couleur verte */
    color: white;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 5px;
    font-size: 1rem;
    text-decoration: none;
    display: inline-block;
    position: absolute; /* Position absolue pour placer le bouton */
    top: 60px; /* Ajustez la position */
    right: 10px; /* Ajustez la position */
    z-index: 1000; /* Assurez-vous que le bouton est au-dessus des autres éléments */
}
</style>
</head>
<body>

<section class="navbar">
    <div class="container">
        <div class="menu-icon">&#9776; Menu</div>
        <ul class="nav">
            <div class="logo"><img src="assets/k&Q.jpg" alt="Logo"></div>
            <ul class="information">
                <li><a href="index3.php">Accueil</a></li>
                <li><a href="index3.php">Projets</a></li>
                <li><a href="event.php">Événements</a></li>
            </ul>
            <ul class="log">
                <li><a href="inscription.php">Inscription</a></li>
                <li><a href="login.php">Connexion</a></li>
            </ul>
        </ul>
    </div>
</section>

<!-- Bouton pour créer un nouvel événement -->
<a href="addevent.php" class="create-event-button">Créer un nouvel événement</a>

<section class="accueil">
    <section class="presentation">
        <div class="qui">
            <h1>Événements du moment</h1>
        </div>
        <div class="pres">
            <div class="info1">
                <?php
                if (isset($_SESSION["events"]) && count($_SESSION["events"]) > 0) {
                    echo "<ul>";
                    foreach ($_SESSION["events"] as $index => $event) {
                        echo "<li>";
                        if (!empty($event["image"])) {
                            echo "<img src='" . htmlspecialchars($event["image"]) . "' alt='Image de l'événement' class='event-image'>";
                        }
                        echo "<strong>" . htmlspecialchars($event["name"]) . "</strong><br>";
                        echo htmlspecialchars($event["date"]);
                        // Formulaire pour supprimer l'événement
                        echo "<form method='post' style='display:inline;'>
                            <input type='hidden' name='delete_event_index' value='$index'>
                            <button type='submit' class='delete-button'>Supprimer</button>
                        </form>";
                        echo "</li>";
                    }
                    echo "</ul>";
                } else {
                    echo "<p>Aucun événement ajouté.</p>";
                }
                ?>
            </div>
        </div>
    </section>
</section>

</body>
</html>
