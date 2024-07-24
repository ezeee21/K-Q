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
  margin: auto;
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

/* Partie 1*/

/* Article 1 */

.block {
  display: flex;
  flex-wrap: wrap;
  align-items: flex-end;
  padding-left: 20px;
  padding-right: 20px;
  background-image: url(./Images/jpt-hero-desktop_.jpg); 
  background-repeat: no-repeat;
  border-radius: 15px;
  width: 592px;
  height: 590px;
  transition: 0.1s;
}
.part-right{
  margin-right: 10px;
  margin-left: 10px;
  display: flex;
  flex-direction: row;
  justify-content: space-between;
}
.titre {
  margin: 0;
  padding-top: 300px;
  position: static;
  font-size: 2.5rem;
  font-weight: bolder;
  color: white;
  background-color: transparent;
  font-family: "Poppins", sans-serif;
}
.titre-sous-texte {
  margin: 0;
  font-size: 1rem;
  position: static;
  font-size: 1rem;
  color: white;
  opacity: 15px;
  background-color: transparent;
  font-family: "Poppins", sans-serif;
}

/* Article 2 et 3*/

.block-un {
  display: flex;
  align-items: flex-end;
  margin-bottom: 20px;
  margin-left: 10px;
  margin-right: 10px;
  background-image: url(./Images/emma-matelas-carton_\(1\).png);
  width: 592px;
  height: 285px;
  border-radius: 15px;
  transition: 0.1s;

}
.block-deux {
  display: flex;
  align-items: flex-end;
  margin-bottom: 20px;
  margin-left: 10px;
  margin-right: 10px;
  background-image: url(./Images/wework.jpg);
  width: 592px;
  height: 285px;
  border-radius: 15px;
  transition: 0.1s;
}
.second-titre {
  font-size: medium;
  margin: 0;
  padding-left: 20px;
  padding-right: 20px;
  position: static;
  font-size: 2rem;
  font-weight: bolder;
  color: white;
  background-color: transparent;
  font-family: "Poppins", sans-serif;
}
#separation {
  display: flex;
  padding-left: 5%;
  justify-content: flex-start;
  font-family: "Poppins", sans-serif;
  color: white;
  font-size: 40px;
  border-bottom: 5px solid Black;
}

/* Partie 2*/

.information {
  padding-left: 5%;
}
a > .information {
  display: flex;
  margin: 20px;
}
.image-annonce {
  position: static;
  width: 345px;
  height: 225px;
  border-radius: 15px;
}
.block-texte {
  margin-left: 25px;
}
a > .information > .block-texte > .texte {
  font-size: 40px;
  font-weight: bold;
  margin-top: 0px;
  margin-bottom: 10px;
  color: white;
  font-family: "Poppins", sans-serif;
}
a > .information > .block-texte > .sous-texte {
  font-size: 20px;
  margin-top: 10px;
  margin-bottom: 0px;
  color: white;
  font-family: "Poppins", sans-serif;
}

</style>
</head>
<body>

<div class="container">
  <div class="menu-icon">&#9776; Menu</div>
    <ul class="nav">
      <div class="logo"> <img src="assets/k&Q.jpg"></div>
      <ul class="info">
        <li><a href="index.php">Projets</a></li>
        <li><a href="evenement.php">Événements</a></li>
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

<script>  
document.querySelector('.menu-icon').addEventListener('click', function() {
  document.querySelector('.container ul').classList.toggle('open');
});
</script>
 <!--Corps de la page -->
 <section id="page">
      <!-- Premières actualités -->
      <div class="part-un">
      
   
    
          </a>
        </div>
  
      </div>
      <!-- Séparation des actualités -->
      <div>
        <p id="separation">Les derniers événements  </p>
      </div>
      <!-- Secondes actualités -->
      <div class="part-deux">
        <a href="*" target="_blank">
          <div class="information">
            <img class="image-annonce" src="./Images/champs-elysees.jpg" />
            <div class="block-texte">
              <p class="texte">
                Evénement 1
              </p>
              <p class="sous-texte">
                test 1
              </p>
            </div>
          </div>          
        </a>
        <a href="*" target="_blank">
          <div class="information">
            <img class="image-annonce" src="./Images/bitcoin.jpg" />
            <div class="block-texte">
              <p class="texte">
               Evénement 2
              </p>
              <p class="sous-texte">
                test 2
              </p>
            </div>
          </div>
        </a>
        <a href="*" target="_blank">
          <div class="information">
              <img class="image-annonce" src="./Images/chatgpt.jpg" />
              <div class="block-texte">
                <p class="texte">
                  Evenement 3 
                </p>
                <p class="sous-texte">
                 test 3
                </p>
              </div>
          </div>
        </a>
        <a href="*" target="_blank">
          <div class="information">
            
              <img class="image-annonce" src="./Images/sms.jpg" />
              <div class="block-texte">
                <p class="texte">
                  Evenement 4
                </p>
                <p class="sous-texte">
                 test 4
                </p>
              </div>
          </div>
        </a>
        <a href="*" target="_blank">
        
          </div>
        </a>
      </div>
    </section>
</body>
</html>