<?php
session_start()
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;  
            background-color: #403644;        
            background-position: center;
            background-size: cover;
            background-attachment: fixed;
            display:flex;
            justify-content:center;
            flex-direction: column;
         
        }
 
        nav {
            background-color: rgb(255,255,255);
            color: white;
            padding: 15px;
        }
        
 
        nav a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            text-align: right;
            
        }
        nav img{
            width:13vw;
            text-align: center;
            margin-top:18px;
        }
        .log{
            margin-top: 13px;
        }
 
        #inscription, #connexion {
            display: inline-block;
            padding: 10px 20px;
            background-color: #FFB6C1;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        #inscription:hover{
            background-color: #D8BFD8;
        }
 
        #connexion:hover{
            background-color: #F0E68C;
        }
 
        #contenu{
            display:flex;
            justify-content: space-between;
        }
 
        #container{
          width:100%;
          display:flex;
          justify-content:center;
          align-items:center;
        }
        #form{
            width:40%;
            height:100vh;
            border-radius:30px;
            background-color:white;
            margin-top: 10vh;
            display:flex;
            flex-direction:column;
            justify-content:center;
            align-items:center;
            
        }
        #resultat{
            background-color:white;
            width: 20%;
            height: 3vh;
            border-radius:30px;
            display:flex;
            justify-content:center;
            align-items:center;
            margin-top:10px;
            margin-left:40vw;
        
        }
        a:focus, a:active {
    text-decoration: none;
    outline: none;
    transition: all 300ms ease 0s;
    -moz-transition: all 300ms ease 0s;
    -webkit-transition: all 300ms ease 0s;
    -o-transition: all 300ms ease 0s;
    -ms-transition: all 300ms ease 0s; }
  
  input, select, textarea {
    outline: none;
    appearance: unset !important;
    -moz-appearance: unset !important;
    -webkit-appearance: unset !important;
    -o-appearance: unset !important;
    -ms-appearance: unset !important; }
  
  input::-webkit-outer-spin-button, input::-webkit-inner-spin-button {
    appearance: none !important;
    -moz-appearance: none !important;
    -webkit-appearance: none !important;
    -o-appearance: none !important;
    -ms-appearance: none !important;
    margin: 0; }
  
  input:focus, select:focus, textarea:focus {
    outline: none;
    box-shadow: none !important;
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    -o-box-shadow: none !important;
    -ms-box-shadow: none !important; }
  
  input[type=checkbox] {
    appearance: checkbox !important;
    -moz-appearance: checkbox !important;
    -webkit-appearance: checkbox !important;
    -o-appearance: checkbox !important;
    -ms-appearance: checkbox !important; }
  
  input[type=radio] {
    appearance: radio !important;
    -moz-appearance: radio !important;
    -webkit-appearance: radio !important;
    -o-appearance: radio !important;
    -ms-appearance: radio !important; }
  
  img {
    max-width: 100%;
    height: auto; }
  
  figure {
    margin: 0; }
  
  p {
    margin-bottom: 0px;
    font-size: 15px;
    color: #777; }
  
  h2 {
    line-height: 1.66;
    margin: 0;
    padding: 0;
    font-weight: bold;
    color: #222;
    font-family: Poppins;
    font-size: 36px; }
  
  .main {
    background: #f8f8f8;
    padding: 150px 0; }
  
  .clear {
    clear: both; }
  
  body {
    font-size: 13px;
    line-height: 1.8;
   
    font-weight: 400;
    font-family: Poppins; }
  
  .container {
    width: 900px;
    background: #fff;
    margin: 0 auto;
    box-shadow: 0px 15px 16.83px 0.17px rgba(0, 0, 0, 0.05);
    -moz-box-shadow: 0px 15px 16.83px 0.17px rgba(0, 0, 0, 0.05);
    -webkit-box-shadow: 0px 15px 16.83px 0.17px rgba(0, 0, 0, 0.05);
    -o-box-shadow: 0px 15px 16.83px 0.17px rgba(0, 0, 0, 0.05);
    -ms-box-shadow: 0px 15px 16.83px 0.17px rgba(0, 0, 0, 0.05);
    border-radius: 20px;
    -moz-border-radius: 20px;
    -webkit-border-radius: 20px;
    -o-border-radius: 20px;
    -ms-border-radius: 20px; }
  
  .display-flex {
    justify-content: space-between;
    -moz-justify-content: space-between;
    -webkit-justify-content: space-between;
    -o-justify-content: space-between;
    -ms-justify-content: space-between;
    align-items: center;
    -moz-align-items: center;
    -webkit-align-items: center;
    -o-align-items: center;
    -ms-align-items: center; }
  
  .display-flex-center {
    justify-content: center;
    -moz-justify-content: center;
    -webkit-justify-content: center;
    -o-justify-content: center;
    -ms-justify-content: center;
    align-items: center;
    -moz-align-items: center;
    -webkit-align-items: center;
    -o-align-items: center;
    -ms-align-items: center; }
  
  .position-center {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    -moz-transform: translate(-50%, -50%);
    -webkit-transform: translate(-50%, -50%);
    -o-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%); }
  
  .signup {
    margin-bottom: 150px; }
  
  .signup-content {
    padding: 75px 0;
    margin-top: 172px;
    margin-bottom: -100px;   
    }  
  
  .signup-form, .signup-image, .signin-form, .signin-image {
    width: 50%;
    overflow: hidden; }
  
  .signup-image {
    margin: 0 55px; }
  
  .form-title {
    margin-bottom: 33px; }
  
  .signup-image {
    margin-top: 45px; }
  
  figure {
    margin-bottom: 50px;
    text-align: center; }
  
  .form-submit {
    display: inline-block;
    background: #6dabe4;
    color: #fff;
    border-bottom: none;
    width: auto;
    padding: 15px 39px;
    border-radius: 5px;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    -o-border-radius: 5px;
    -ms-border-radius: 5px;
    margin-top: 25px;
    cursor: pointer; }
    .form-submit:hover {
      background: #4292dc; }
  
  #signin {
    margin-top: 16px; }
  
  .signup-image-link {
    font-size: 14px;
    color: #222;
    display: block;
    text-align: center; }
  
  .term-service {
    font-size: 13px;
    color: #222; }
  
  .signup-form {
    margin-left: 75px;
    margin-right: 75px;
    padding-left: 34px; }
  
  .register-form {
    width: 100%; }
  
  .form-group {
    position: relative;
    margin-bottom: 25px;
    overflow: hidden; }
    .form-group:last-child {
      margin-bottom: 0px; }
  
  input {
    width: 100%;
    display: block;
    border: none;
    border-bottom: 1px solid #999;
    padding: 6px 30px;
    font-family: Poppins;
    box-sizing: border-box; }
    input::-webkit-input-placeholder {
      color: #999; }
    input::-moz-placeholder {
      color: #999; }
    input:-ms-input-placeholder {
      color: #999; }
    input:-moz-placeholder {
      color: #999; }
    input:focus {
      border-bottom: 1px solid #222; }
      input:focus::-webkit-input-placeholder {
        color: #222; }
      input:focus::-moz-placeholder {
        color: #222; }
      input:focus:-ms-input-placeholder {
        color: #222; }
      input:focus:-moz-placeholder {
        color: #222; }
  
  input[type=checkbox]:not(old) {
    width: 2em;
    margin: 0;
    padding: 0;
    font-size: 1em;
    display: none; }
  
  input[type=checkbox]:not(old) + label {
    display: inline-block;
    line-height: 1.5em;
    margin-top: 6px; }
  
  input[type=checkbox]:not(old) + label > span {
    display: inline-block;
    width: 13px;
    height: 13px;
    margin-right: 15px;
    margin-bottom: 3px;
    border: 1px solid #999;
    border-radius: 2px;
    -moz-border-radius: 2px;
    -webkit-border-radius: 2px;
    -o-border-radius: 2px;
    -ms-border-radius: 2px;
    background: white;
    background-image: -moz-linear-gradient(white, white);
    background-image: -ms-linear-gradient(white, white);
    background-image: -o-linear-gradient(white, white);
    background-image: -webkit-linear-gradient(white, white);
    background-image: linear-gradient(white, white);
    vertical-align: bottom; }
  
  input[type=checkbox]:not(old):checked + label > span {
    background-image: -moz-linear-gradient(white, white);
    background-image: -ms-linear-gradient(white, white);
    background-image: -o-linear-gradient(white, white);
    background-image: -webkit-linear-gradient(white, white);
    background-image: linear-gradient(white, white); }
  
  input[type=checkbox]:not(old):checked + label > span:before {
    content: '\f26b';
    display: block;
    color: #222;
    font-size: 11px;
    line-height: 1.2;
    text-align: center;
    font-family: 'Material-Design-Iconic-Font';
    font-weight: bold; }
  
  .agree-term {
    display: inline-block;
    width: auto; }
  
  label {
    position: absolute;
    left: 0;
    top: 40%;
    filter:blur(1);
    transform: translateY(-50%);
    -moz-transform: translateY(-50%);
    -webkit-transform: translateY(-50%);
    -o-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    color: #222; }
  
  .label-has-error {
    top: 22%; }
  
  label.error {
    position: relative;
    background: url("../images/unchecked.gif") no-repeat;
    background-position-y: 3px;
    padding-left: 20px;
    display: block;
    margin-top: 20px; }
  
  label.valid {
    display: block;
    position: absolute;
    right: 0;
    left: auto;
    margin-top: -6px;
    width: 20px;
    height: 20px;
    background: transparent; }
    label.valid:after {
      font-family: 'Material-Design-Iconic-Font';
      content: '\f269';
      width: 100%;
      height: 100%;
      position: absolute;
      /* right: 0; */
      font-size: 16px;
      color: green; }
  
  .label-agree-term {
    position: relative;
    top: 0%;
    transform: translateY(0);
    -moz-transform: translateY(0);
    -webkit-transform: translateY(0);
    -o-transform: translateY(0);
    -ms-transform: translateY(0); }
  
  .material-icons-name {
    font-size: 18px; }
  
  .signin-content {
    padding-top: 67px;
    padding-bottom: 87px; }
  
  .social-login {
    align-items: center;
    -moz-align-items: center;
    -webkit-align-items: center;
    -o-align-items: center;
    -ms-align-items: center;
    margin-top: 80px; }
  
  .social-label {
    display: inline-block;
    margin-right: 15px; }
  
  .socials li {
    padding: 5px; }
    .socials li:last-child {
      margin-right: 0px; }
    .socials li a {
      text-decoration: none; }
      .socials li a i {
        width: 30px;
        height: 30px;
        font-size: 14px;
        border-radius: 5px;
        -moz-border-radius: 5px;
        -webkit-border-radius: 5px;
        -o-border-radius: 5px;
        -ms-border-radius: 5px;
        transform: translateZ(0);
        -moz-transform: translateZ(0);
        -webkit-transform: translateZ(0);
        -o-transform: translateZ(0);
        -ms-transform: translateZ(0);
        -webkit-transition-duration: 0.3s;
        transition-duration: 0.3s;
        -webkit-transition-property: transform;
        transition-property: transform;
        -webkit-transition-timing-function: ease-out;
        transition-timing-function: ease-out; }
    .socials li:hover a i {
      -webkit-transform: scale(1.3) translateZ(0);
      transform: scale(1.3) translateZ(0); }
  
  .zmdi-facebook {
    background: #3b5998; }
  
  .zmdi-twitter {
    background: #1da0f2; }
  
  .zmdi-google {
    background: #e72734; }
  
  .signin-form {
    margin-right: 90px;
    margin-left: 80px; }
  
  .signin-image {
    margin-left: 110px;
    margin-right: 20px;
    margin-top: 10px; }
  
  @media screen and (max-width: 1200px) {
    .container {
      width: calc( 100% - 30px);
      max-width: 100%; } }
  @media screen and (min-width: 1024px) {
    .container {
      max-width: 1200px; } }
  @media screen and (max-width: 768px) {
    .signup-content, .signin-content {
      flex-direction: column;
      -moz-flex-direction: column;
      -webkit-flex-direction: column;
      -o-flex-direction: column;
      -ms-flex-direction: column;
      justify-content: center;
      -moz-justify-content: center;
      -webkit-justify-content: center;
      -o-justify-content: center;
      -ms-justify-content: center; }
  
    .signup-form {
      margin-left: 0px;
      margin-right: 0px;
      padding-left: 0px;
      /* box-sizing: border-box; */
      padding: 0 30px; }
  
    .signin-image {
      margin-left: 0px;
      margin-right: 0px;
      margin-top: 50px;
      order: 2;
      -moz-order: 2;
      -webkit-order: 2;
      -o-order: 2;
      -ms-order: 2; }
  
    .signup-form, .signup-image, .signin-form, .signin-image {
      width: auto; }
 
    .social-login {
      justify-content: center;
      -moz-justify-content: center;
      -webkit-justify-content: center;
      -o-justify-content: center;
      -ms-justify-content: center; }
  
    .form-button {
      text-align: center; }
  
    .signin-form {
      order: 1;
      -moz-order: 1;
      -webkit-order: 1;
      -o-order: 1;
      -ms-order: 1;
      margin-right: 0px;
      margin-left: 0px;
      padding: 0 30px; }
  
    .form-title {
      text-align: center; } }
  @media screen and (max-width: 400px) {
    .social-login {
      flex-direction: column;
      -moz-flex-direction: column;
      -webkit-flex-direction: column;
      -o-flex-direction: column;
      -ms-flex-direction: column; }
  
    .social-label {
      margin-right: 0px;
      margin-bottom: 10px; }
    }
    </style>
     <nav> <!-- Balise de navigation -->
        <div id="contenu"> <!-- Conteneur de la barre de navigation -->
            <div> <!-- Première partie de la barre de navigation : logo -->
                <a href="indexuser.php"><img class="logo" src="asset/quizzeo.png"> </a><!-- Logo -->
            </div>
        </div>
    </nav>
</head>
<body>
 <?php   
     
     $fichier_csv = 'user.csv';
    
      
     $file = fopen($fichier_csv, 'r');
 
 while (($line = fgetcsv($file)) !== false) {
         if ($line[3] == $_SESSION['id_user']) {
            ?>
                <div id="container">
                    <div id="form">
                        <h2>Modification de Profil</h2>
                        <br>
                        <form action="#" method="post">
                            <div class="form-group">
                                <label for="lastname"> </label><br>
                                <input type="text" id="lastname" name="lastname"  value="<?php echo $line[2]?>"><br><br>
                            </div>
                            <div class="form-group">
                                <label for="firstname"> </label><br>
                                <input type="text" id="firstname" name="firstname"  value="<?php echo $line[1]?>"><br><br>
                            </div>
                             
                            <div class="form-group">
                            <label for="email"> </label><br>
                                <input type="email" id="email" name="email" value="<?php echo $line[5]?>"><br><br>
                            </div>
                            <div class="form-group">
                                <label for="password"></label><br>
                                <input type="text" id="password" name="password" placeholder="Mot de passe" ><br><br>
                            </div>
                            <button type="submit">Enregistrer les modifications</button>
                        
                        </form>
                    </div>
                </div> 
         
  <?php }
  }
  fclose($file);
  ?>
 
 
</body>
</html>
 
<?php
// Vérification de l'existence des variables et assignation de valeurs par défaut si elles ne sont pas définies
if (!isset($lastname) && !isset($firstname) && !isset($email) && !isset($password)) {
  
  $lastname = "";
  $firstname = "";
  $email = "";
  $password = "";
}

// Récupération des valeurs depuis $_POST
$lastname = isset($_POST['lastname']) ? $_POST['lastname'] : $lastname;
$firstname = isset($_POST['firstname']) ? $_POST['firstname'] : $firstname;
$email = isset($_POST['email']) ? $_POST['email'] : $email;
$password = isset($_POST['password']) ? $_POST['password'] : $password;
 
// Chemin vers le fichier CSV
$chemin_fichier = 'user.csv';
 
// Lire le fichier CSV et stocker son contenu dans un tableau
$lignes = file($chemin_fichier);
 
foreach ($lignes as $index => $ligne) {
    $profil = str_getcsv($ligne);
    if ($profil[3] == $_SESSION['id_user']) {
        // Mettre à jour les informations remplies dans le formulaire
        if (!empty($lastname)) {
            $profil[2] = $lastname;
        }
        if (!empty($firstname)) {
            $profil[1] = $firstname;
        }
        if (!empty($password)) {
            $profil[4] = $password;
        }
       
        // Mettre à jour la ligne dans le tableau
        $lignes[$index] = implode(',', $profil) . "\n";
 
        // Écrire les modifications dans le fichier CSV
        file_put_contents($chemin_fichier, $lignes);
        

        ?>
        
         <div id="resultat">
         <?php echo "Profil mis à jour avec succès!";?>
         </div>
         <?php
        exit;
    }
  
}

?>
</div>
 