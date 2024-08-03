<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>

body{
  margin: 0;
  background-color:#F8F9F3;
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

padding: 16px;
display: flex;
text-align: center;
display: inline;
font-family: "WWFRegular","Helvetica Neue","Arial",sans-serif;
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
.accueil{
    width:100%;
    height:100vh;
    background-image:url('assets/accueil.jpg');
    background-size:cover;
    background-position: center bottom;
}
.text{
  font-family: "WWFRegular","Helvetica Neue","Arial",sans-serif;
    font-size: 4rem;
    font-weight: 400;
    line-height: 6rem;
    letter-spacing: 4px;
    font-style: normal;
    color:wheat;
    padding-left: 15px;
    text-shadow: 0 2px 20px rgba(0,0,0,0.15);
    text-transform: uppercase;
    width: 60%;
    height:60%;
    padding-top: 15px;
    }
.slogan{
    opacity: 60%;
}
.presentation{
  font-family: "WWFRegular","Helvetica Neue","Arial",sans-serif;
  width: 100%;
  height:125vh;
}
.qui{
  text-align:center;
  font-size: 2rem;
  font-weight: 400;
  line-height: 6rem;
  letter-spacing: 4px;
  font-style: normal;
  padding-left: 15px;
  text-shadow: 0 2px 20px rgba(0,0,0,0.15);
  text-transform: uppercase;
  padding-top: 10px;
}
.pres{
  width: 70%;
  margin: 20px auto;
  padding: 20px;
  background: #928565;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
.info1{
  line-height: 2rem;
}


.
.info2 {
    width: 80%;
    max-width: 1000px;
    text-align: center;
}

.slider {
    position: relative;
    width: 100%;
    overflow: hidden;
    margin: auto;
}

.slides {
    display: flex;
    transition: transform 1s ease-in-out;
    will-change: transform;
}

.slide {
    min-width: 25%; /* Show 4 profiles at once */
    box-sizing: border-box;
    text-align: center;
    padding: 20px;
}

.slide img {
    border-radius: 50%;
    margin-bottom: 10px;
    width:15vw;
}

button {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: rgba(0,0,0,0.5);
    color: white;
    border: none;
    padding: 10px;
    cursor: pointer;
    border-radius: 50%;
}

button.prev {
    left: 10px;
}

button.next {
    right: 10px;
}

button:hover {
    background-color: rgba(0,0,0,0.8);
}
</style>



<body>
<section class="navbar">
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
      <div class="log">
        <li><a href="inscription.php">Inscription</a></li>
        <li><a href="connexion.php">Connexion</a></li>
      </div>
    </ul>
</div>
</section>

<section class="accueil">
    <div class="text">
        <h1>Kings & Queens</h1>
        <h1 class="slogan">JEUNESSE ENGAGÉE, POUR UNE PLANÈTE SAUVÉE</h1>
</section>

<section class="presentation">
  <div class="qui">
    <h1>Qui sommes-nous ?</h1>
  </div>
  <div class="pres">
    <div class="info1">
    <h2>Présentation de l'association</h2>
      <p>
Kings & Queens Association est une organisation à but non lucratif dédiée à sensibiliser et éduquer la jeune génération sur les dangers environnementaux actuels. Notre mission est de fournir des connaissances et des outils nécessaires aux jeunes pour comprendre et agir face aux défis environnementaux auxquels notre planète est confrontée. <br>

Nous croyons que l'éducation est la clé pour un avenir durable et que chaque jeune a le potentiel de devenir un acteur du changement. À travers nos programmes et initiatives, nous inspirons les jeunes à prendre des mesures concrètes pour protéger notre environnement et promouvoir un mode de vie durable.</p>
    </div>
    <div class="info2">
    <h2>Présentation de l'équipe</h2>
      <p>
      Voici notre équipe dynamique, composée de dirigeants engagés, de trésoriers compétents, de responsables de communication innovants, d'experts en adhésions et en informatique, ainsi que de leaders de projets écologiques.</p>
    </div>
      <div class="slider" onmouseover="pauseSlider()" onmouseout="startSlider()">
          <div class="slides">
              <div class="slide">
                  <img src="assets/Karlson_King.png" alt="Karlson">
                  <h3>KARLSON TABE</h3>
                  <p>Président</p>
              </div>
              <div class="slide">
                  <img src="assets/juliette.webp" alt="Juliette">
                  <h3>JULIETTE CHABRIER</h3>
                  <p>Vice présidente</p>
              </div>
              <div class="slide">
                  <img src="assets/mattéo roue-noel.PNG" alt="Matteo">
                  <h3>MATTEO ROUE-NOËL</h3>
                  <p>Responsable informatique</p>
              </div>
              <div class="slide">
                  <img src="assets/ilan quenum.png" alt="ilan">
                  <h3>ILAN QUENUM</h3>
                  <p>Responsable communication</p>
              </div>
              <div class="slide">
                  <img src="assets/Aby.png" alt="aby">
                  <h3>ABY <br> BA</h3>
                  <p>Commerciale</p>
              </div>
              <div class="slide">
                  <img src="assets/marilyse mukundi.PNG" alt="marilyse">
                  <h3>MARILYSE MUKUNDI</h3>
                  <p>Redactrice ne chef</p>
              </div>
              <div class="slide">
                  <img src="assets/awa correia.PNG" alt="awa">
                  <h3>AWA CORREIA</h3>
                  <p>Redactrice</p>
              </div>
              <div class="slide">
                  <img src="assets/aurelien roux.png" alt="aurelien">
                  <h3>AURELIEN ROUX</h3>
                  <p>Secretaire General</p>
              </div>
              <div class="slide">
                  <img src="assets/Rose.png" alt="rose">
                  <h3>ROSE DA FORTUNA</h3>
                  <p>Secretaire</p>
              </div>
              <div class="slide">
                  <img src="assets/sara magalhaes.png" alt="sara">
                  <h3>SARA MAGALHÄES</h3>
                  <p>Secretaire</p>
              </div>
              <div class="slide">
                  <img src="assets/mohamed.png" alt="MOHAMED">
                  <h3>MOHAMED NGOM</h3>
                  <p>Tresorier en chef</p>
              </div>
              
            <div class="slide">
                  <img src="assets/Maeva mukundi.png" alt="Maeva">
                  <h3>MAEVA MUKUNDI</h3>
                  <p>Tresoriere</p>
              </div>
              <div class="slide">
                  <img src="assets/theo lepage.png" alt="theo">
                  <h3>THEO LEPAGE</h3>
                  <p>Tresorier</p>
              </div>
              <!-- /dupliquer pour l'effet looping -->
              <div class="slide">
                  <img src="assets/Karlson_King.png" alt="Karlson">
                  <h3>KARLSON TABE</h3>
                  <p>Président</p>
              </div>
              <div class="slide">
                  <img src="assets/juliette.webp" alt="Juliette">
                  <h3>JULIETTE CHABRIER</h3>
                  <p>Vice présidente</p>
              </div>
              <div class="slide">
                  <img src="assets/mattéo roue-noel.PNG" alt="Matteo">
                  <h3>MATTEO ROUE-NOËL</h3>
                  <p>Responsable informatique</p>
              </div>
              <div class="slide">
                  <img src="assets/ilan quenum.png" alt="ilan">
                  <h3>ILAN QUENUM</h3>
                  <p>Responsable communication</p>
              </div>
              <div class="slide">
                  <img src="assets/Aby.png" alt="aby">
                  <h3>ABY <br> BA</h3>
                  <p>Commerciale</p>
              </div>
              <div class="slide">
                  <img src="assets/marilyse mukundi.PNG" alt="marilyse">
                  <h3>MARILYSE MUKUNDI</h3>
                  <p>Redactrice ne chef</p>
              </div>
              
          </div>
      </div>
    </div>
</section>
<section class="actu">
</section>

</body>
<script>
let currentIndex = 0;
let slideInterval;

function changeSlide() {
    const slides = document.querySelector('.slides');
    const totalSlides = document.querySelectorAll('.slide').length;

    currentIndex++;

    if (currentIndex >= totalSlides / 2) {
        slides.style.transition = 'none';
        slides.style.transform = 'translateX(0)';
        currentIndex = 0;
        setTimeout(() => {
            slides.style.transition = 'transform 1s ease-in-out'; // Adjusted for smoother transition
            slides.style.transform = `translateX(-${currentIndex * 25}%)`;
        }, 50);
    } else {
        slides.style.transform = `translateX(-${currentIndex * 25}%)`;
    }
}

function startSlider() {
    slideInterval = setInterval(changeSlide, 1000); // Adjusted interval to 1 second
}

function pauseSlider() {
    clearInterval(slideInterval);
}

document.addEventListener('DOMContentLoaded', (event) => {
    startSlider();
});



    </script>

</html>

   

