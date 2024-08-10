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
  float: left;
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
  background-image: url('assets/accueil.jpg');
  background-size: cover;
  background-position: center bottom;
  background-repeat: no-repeat;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  text-align: center;
  color: wheat;
}

.text {
  font-family: "WWFRegular", "Helvetica Neue", "Arial", sans-serif;
  font-size: 4rem;
  font-weight: 400;
  line-height: 6rem;
  letter-spacing: 4px;
  font-style: normal;
  text-shadow: 0 2px 20px rgba(0,0,0,0.15);
  text-transform: uppercase;
  width: 60%;
  margin: 0;
  padding-top: 15px;
}

.presentation {
  font-family: "WWFRegular", "Helvetica Neue", "Arial", sans-serif;
  width: 100%;
  padding: 20px 0;
}

.qui {
  font-size: 2rem;
  font-weight: 400;
  line-height: 6rem;
  letter-spacing: 4px;
  font-style: normal;
  text-shadow: 0 2px 20px rgba(0,0,0,0.15);
  text-transform: uppercase;
  padding: 10px;
  margin-top: 20px; /* Ajout de marge entre les divs */
  color: wheat;
}

.pres {
  width: 70%;
  margin: 20px auto;
  padding: 20px;
  background: rgba(146, 133, 101, 0.8); /* Ajout de transparence */
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  color: wheat;
}

.info1 {
  line-height: 2rem;
}

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
  width: 15vw;
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

.addbutton {

    position: top
}
</style>
</head>
<body>

<section class="navbar">
  <div class="container">
    <div class="menu-icon">&#9776; Menu</div>
    <ul class="nav">
      <div class="logo"><img src="assets/k&Q.jpg"></div>
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

<section class="accueil">


  <section class="presentation">
  <div class="addevent">
  
  </body>
  
  <form action="event.php" method="post">
        <label for="event_name">Nom de l'événement :</label>
        <input type="text" id="event_name" name="event_name" required>
        <br>
        <label for="event_name">Description de l'événement:</label>
        <input type="text" id="event_name" name="event_name" required>
        <br>
        <label for="event_date">Date de l'événement :</label>
        <input type="date" id="event_date" name="event_date" required>
        <br>
        <button type="submit" a href="event.php">Ajouter</button>
    </form>
  </section>
</section>

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


function redirectToNewPage() {
            window.location.href = "event.php"; // Remplacez par l'URL de votre nouvelle page
        }
</script>
</body>
</html>