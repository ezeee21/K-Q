<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Kings & Queens Association</title>
<style>
/* Styles généraux */
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #2B5D3E;
  color: #333;
}

/* Styles pour le conteneur principal */
.container {
  width: 80%;
  margin: auto;
  overflow: hidden;
}

/* Styles pour l'en-tête */
header {
  background: #28a745;
  color: #fff;
  padding: 20px 0;
  text-align: center;
  position: sticky;
  top: 0;
  z-index: 1000;
}

header .container {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

header .logo {
  height: 50px;
}

/* Styles pour la navigation */
nav ul {
  list-style: none;
  padding: 0;
  margin: 0;
  display: flex;
  justify-content: space-between;
}

nav ul li {
  margin-left: 20px;
}

nav ul li a {
  color: #fff;
  text-decoration: none;
  font-weight: bold;
}

nav ul li a:hover {
  text-decoration: underline;
}

nav .menu-icon {
  display: none;
}

@media screen and (max-width: 768px) {
  nav ul {
    max-height: 0;
    display: none;
    flex-direction: column;
  }
  nav ul.open {
    display: flex;
    max-height: 1000px;
  }
  nav .menu-icon {
    display: block;
    text-align: center;
    color: white;
    padding: 14px 16px;
    cursor: pointer;
  }
}

/* Styles pour le contenu principal */
section {
  width: 80%;
  margin: 20px auto;
  padding: 20px;
  background: #fff;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
  border-bottom: 2px solid #28a745;
  padding-bottom: 10px;
  margin-bottom: 20px;
}

ul {
  list-style: none;
  padding: 0;
}

ul li {
  
  margin-bottom: 10px;
  padding: 15px;
  border-left: 5px solid #28a745;
}

form label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
}

form input, form textarea, form button {
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
}

form button {
  background: #28a745;
  color: #fff;
  border: none;
  cursor: pointer;
  font-size: 16px;
}

form button:hover {
  background: #218838;
}

/* Styles pour le pied de page */
footer {
  background: #333;
  color: #fff;
  text-align: center;
  padding: 20px 0;
}

footer .social-icons {
  margin: 10px 0;
}

footer .social-icons a {
  display: inline-block;
  margin: 0 10px;
}

footer .social-icons img {
  width: 30px;
}

footer p {
  margin: 0;
}
</style>
</head>
<body>

<header>
  <div class="container">
    <img src="logo.png" alt="Logo de Kings & Queens Association" class="logo">
    <nav>
      <div class="menu-icon">&#9776; Menu</div>
      <ul>
        <li><a href="#presentation">Présentation</a></li>
        <li><a href="#objectives">Objectifs</a></li>
        <li><a href="#activities">Activités</a></li>
        <li><a href="#vision">Vision</a></li>
        <li><a href="#contact">Contact</a></li>
        <li><a href="#">Accueil</a></li>
        <li><a href="inscription.php">Inscription</a></li>
        <li><a href="connexion.php">Connexion</a></li>
      </ul>
    </nav>
  </div>
</header>

<section id="presentation" class="container">
  <h2>Présentation de l'association</h2>
  <p>Kings & Queens Association est une organisation à but non lucratif dédiée à sensibiliser et éduquer la jeune génération sur les dangers environnementaux actuels. Notre mission est de fournir des connaissances et des outils nécessaires aux jeunes pour comprendre et agir face aux défis environnementaux auxquels notre planète est confrontée.</p>
</section>

<section id="objectives" class="container">
  <h2>Nos objectifs</h2>
  <ul>
    <li><strong>Sensibilisation :</strong> Informer et éduquer les jeunes sur les différentes menaces environnementales, telles que le changement climatique, la pollution, la déforestation et la perte de biodiversité.</li>
    <li><strong>Éducation :</strong> Organiser des ateliers, des séminaires et des programmes éducatifs pour enseigner les principes de la durabilité, de l'écologie et des pratiques respectueuses de l'environnement.</li>
    <li><strong>Action :</strong> Encourager et soutenir les initiatives locales menées par les jeunes pour protéger et restaurer l'environnement, y compris des projets de nettoyage, de plantation d'arbres et de recyclage.</li>
    <li><strong>Plaidoyer :</strong> Défendre les causes environnementales auprès des décideurs politiques et des entreprises, en donnant une voix aux préoccupations et aux idées des jeunes.</li>
  </ul>
</section>

<section id="activities" class="container">
  <h2>Nos activités</h2>
  <ul>
    <li><strong>Ateliers éducatifs :</strong> Sessions interactives pour comprendre les problèmes environnementaux et découvrir des solutions pratiques.</li>
    <li><strong>Projets communautaires :</strong> Initiatives locales pour impliquer directement les jeunes dans des actions concrètes, comme le nettoyage des plages ou la création de jardins communautaires.</li>
    <li><strong>Conférences et séminaires :</strong> Événements organisés avec des experts pour discuter des défis environnementaux et des innovations durables.</li>
    <li><strong>Programmes scolaires :</strong> Collaboration avec les écoles pour intégrer des modules environnementaux dans les programmes scolaires.</li>
  </ul>
</section>

<section id="vision" class="container">
  <h2>Notre vision</h2>
  <p>Nous croyons fermement que la jeunesse d'aujourd'hui est la clé d'un avenir durable. En les équipant des connaissances et des compétences nécessaires, nous visons à créer une génération de leaders écologiques capables de prendre des décisions informées et de promouvoir un mode de vie respectueux de l'environnement.</p>
</section>

<section id="contact" class="container">
  <h2>Contactez-nous</h2>
  <form action="contact_form.php" method="post">
    <label for="name">Nom:</label>
    <input type="text" id="name" name="name" required>
    
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    
    <label for="message">Message:</label>
    <textarea id="message" name="message" required></textarea>
    
    <button type="submit">Envoyer</button>
  </form>
</section>

<footer>
  <div class="container">
    <p>Suivez-nous sur les réseaux sociaux !</p>
    <div class="social-icons">
      <a href="#"><img src="facebook.png" alt="Facebook"></a>
      <a href="#"><img src="twitter.png" alt="Twitter"></a>
      <a href="#"><img src="instagram.png" alt="Instagram"></a>
    </div>
    <p>&copy; 2024 Kings & Queens Association. Tous droits réservés.</p>
  </div>
</footer>

<script>
document.querySelector('.menu-icon').addEventListener('click', function() {
  document.querySelector('nav ul').classList.toggle('open');
});
</script>

</body>
</html>
