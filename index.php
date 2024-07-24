<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
/* Styles généraux */
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-color:#2B5D3E;
  font-family: Consolas, monaco, monospace; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 400; line-height: 20px;
}

.container {

  width: 100%;
  margin-: auto;
  overflow: hidden;
  
  
}
.logo img{
  width: 50px;
  float 
}

.container ul {
  
  padding: 0;
  margin: 0;
  list-style: none;
  display:flex;
  justify-content:space-between ;
  
}

.container ul li a {
  text-decoration: none;
  color: white;
  padding: 16px;
  display: flex;
  text-align: center;
}

.container ul li a:hover {
  background-color: #555;
}

.log a{
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
.info{
  width: 90%;
  margin: 20px auto;
  padding: 20px;
  background: #fff;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  display:flex;
  justify-content:space-between;
}
.info img{
  width: 30vw;
  align-items:center;
}
.info1{
  width:40%;
}
.photo{
display:flex;
justify-content:center;
}

</style>
</head>
<body>

<div class="container">
  <div class="menu-icon">&#9776; Menu</div>
    <ul class="nav">
      <div class="logo"> <img src="assets/k&Q.jpg"></div>
      <ul class="information">
        <li><a href="#">Projets</a></li>
        <li><a href="#">Événements</a></li>
        <li><a href="#">À propos</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="#">Accueil</a></li>
      </ul>
      <ul class="log">
        <li><a href="inscription.php">Inscription</a></li>
        <li><a href="connexion.php">Connexion</a></li>
      </ul>
    </ul>
</div>

<section class="presentation">
  <div class="info">
    <div class="info1">
    <h2>Présentation de l'association</h2>
      <p>Kings & Queens Association est une organisation à but non lucratif dédiée à sensibiliser et éduquer la jeune génération sur les dangers environnementaux actuels. Notre mission est de fournir des connaissances et des outils nécessaires aux jeunes pour comprendre et agir face aux défis environnementaux auxquels notre planète est confrontée.</p>
    </div>  
    <div class="photo">
        <img src="assets/pollution.jpg">
    </div>
  </div>
</section>

<script>  
document.querySelector('.menu-icon').addEventListener('click', function() {
  document.querySelector('.container ul').classList.toggle('open');
});
</script>

</body>
</html>
