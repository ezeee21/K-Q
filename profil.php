<?php
session_start();
$_SESSION['user_id']=2; 



function generateCsrfToken() {
    // Génère un jeton CSRF
    return bin2hex(random_bytes(32));
}

// Générer un jeton CSRF s'il n'existe pas déjà
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = generateCsrfToken();
}

if (empty($_SESSION['csrf_token1'])) {
    $_SESSION['csrf_token1'] = generateCsrfToken();
}

if (empty($_SESSION['csrf_token2'])) {
    $_SESSION['csrf_token2'] = generateCsrfToken();
}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de Compte d'Association</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>

</head>
<body>
    <style> 
                  body {
              font-family: Arial, sans-serif;
              margin: 0;
              padding: 0;
              background-color: #f4f4f4;
              display: flex;
              justify-content: center; 
              align-items: center;
              height: 100vh;
              overflow: hidden; /* Empêche le défilement de la page */
          }

          .container {
              display: flex;
              flex-direction: row;
              width: 80%;
              max-width: 1200px;
              height: 80vh;
              background-color: white;
              box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
              border-radius: 10px;
              overflow: hidden;
          }

          .sidebar {
              width: 25%;
              background-color: #333;
              color: white;
              padding: 20px;
              box-sizing: border-box;
              overflow-y: hidden; /* Barre de défilement cachée par défaut */
          }

          .sidebar:hover {
              overflow-y: auto; /* Barre de défilement visible au survol */
          }

          .sidebar ul {
              list-style-type: none;
              padding: 0;
          }

          .sidebar li {
              padding: 15px;
              cursor: pointer;
              border-bottom: 1px solid #444;
          }

          .sidebar li:hover {
              background-color: #555;
          }

          .content {
              width: 75%;
              padding: 20px;
              box-sizing: border-box;
              overflow-y: hidden; /* Barre de défilement cachée par défaut */
          }

          .content:hover {
              overflow-y: auto; /* Barre de défilement visible au survol */
          }

          .section {
              display: none;
          }

          .section.active {
              display: block;
          }

          form {
              display: flex;
              flex-direction: column;
          }

          form label {
              margin-top: 10px;
          }

          form input, form select, form button {
              margin-top: 5px;
              padding: 8px;
              border-radius: 5px;
              border: 1px solid #ccc;
          }

          .profile-picture {
              width: 150px;
              height: 150px;
              position: relative;
              overflow: hidden;
              border-radius: 50%;
              margin: 0 auto;
              cursor: pointer;
              border: 3px solid #fff;
              box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
          }

          .profile-picture img {
              width: 100%;
              height: 100%;
              object-fit: cover;
          }

          .overlay {
              position: absolute;
              top: 0;
              left: 0;
              width: 100%;
              height: 100%;
              background-color: rgba(0, 0, 0, 0.6);
              display: flex;
              justify-content: center;
              align-items: center;
              opacity: 0;
              transition: opacity 0.3s ease;
          }

          .overlay:hover {
              opacity: 1;
          }

          .overlay label {
              color: #fff;
              text-align: center;
              cursor: pointer;
          }

          .overlay input {
              display: none;
          }

         .phone input {
            height: 40px;
            font-size: 16px;
            padding: 5px;
            margin: 5px;
            width: 250px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .phone button {
            height: 40px;
            font-size: 16px;
            color: white;
            background-color: #4CAF50;
            border: none;
            border-radius: 4px;
            padding: 5px 10px;
            cursor: pointer;
            margin-top: 10px;
        }
        .phone button:disabled {
            background-color: #cccccc;
            cursor: not-allowed;
        }

        .password-wrapper {
                position: relative;
                display: inline-block;
                width: 100%;
            }

            .password-wrapper input {
                width: calc(100% - 30px); /* Ajuste la largeur de l'input pour laisser de la place à l'icône */
                padding-right: 30px; /* Assure que le texte n'est pas caché derrière l'icône */
            }

            .toggle-password {
                position: absolute;
                right: 10px;
                top: 50%;
                transform: translateY(-50%);
                cursor: pointer;
                font-size: 18px;
                color: #666;
            }

            .toggle-password:hover {
                color: #000;
            }


            




    </style>
    <div class="container">
            <div class="sidebar">
                <ul>
                    <li onclick="showSection('personal-info')">Informations Personnelles</li>
                    <!-- <li onclick="showSection('profile-photo')">Photo de Profil</li> -->
                    <li onclick="showSection('login-info')">Informations de Connexion</li>
                    <li onclick="showSection('preferences')">Préférences de Compte</li>
                    <li onclick="showSection('membership')">Adhésion et Cotisations</li>
                    <li onclick="showSection('participation')">Participation et Engagement</li>
                    <li onclick="showSection('activity-history')">Historique d'Activité</li>
                    <li onclick="showSection('security')">Sécurité et Confidentialité</li>
                    <li onclick="showSection('support')">Support et Assistance</li>
                    <li onclick="showSection('logout-delete')">Déconnexion et Suppression de Compte</li>
                    <li onclick="showSection('social-integration')">Réseaux Sociaux et Intégrations</li>
                    <li onclick="showSection('communications')">Communications de l'Association</li>
                </ul>
            </div>
        <div class="content">
            <div id="personal-info" class="section active">
                <h2>Informations Personnelles</h2>
                <div class="profile-picture">
                    <img id="current-profile-pic" src="" alt="Photo de profil actuelle">
                    <div class="overlay">
                        <label for="upload-profile-pic">
                            <span>Changer de photo</span>
                            <input type="file" id="upload-profile-pic" accept="image/*" style="display: none;" onchange="updateProfilePic(event)">
                            <!-- <input type="file" id="upload-profile-pic" accept="image/*"> -->
                        </label>
                    </div>
                </div>
                <!-- Change le mode d'envoie php par js comme dans le code app.js pour demain  -->
                <form id="phone">
                    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8'); ?>">
                    
                    <label for="name">Nom :</label>
                    <input type="text" id="nom" name="nom" placeholder="Votre Nom"><br><br>

                    <label for="name">Prenom:</label>
                    <input type="text" id="Prenom" name="Prenom" placeholder="Votre Prenom"><br><br>

                    <label for="email">Email :</label>
                    <input type="email" id="email" name="email" placeholder="Votre email"><br><br>

                    <label for="phone">Téléphone :</label>
                    <input type="tel" id="phone-number" name="telephone" placeholder="Numéro de téléphone"><br><br>

                    <label for="address">Adresse :</label>
                    <input type="text" id="address" name="address" placeholder="Votre adresse postale"><br><br>

                    <label for="code_postale">Code Postal :</label>
                    <input type="text" id="code_postale" name="code_postale" placeholder="Votre code postale"><br><br>

                    <label for="code_postale">Commune :</label>
                    <input type="text" id="commune" name="commune" placeholder="Votre commune"><br><br>

                    <button type="submit">Sauvegarder</button>
                </form>

            </div>
            <!-- <div id="profile-photo" class="section">
                <h2>Photo de Profil</h2>
                <div class="profile-pic-container">
                    <img src="default-profile.png" id="profile-pic" class="profile-pic" alt="Photo de profil">
                    <input type="file" id="profile-pic-upload" accept="image/*" style="display: none;" onchange="updateProfilePic(event)">
                </div>
            </div> -->
            <div id="login-info" class="section">
                <h2>Informations de Connexion</h2>
                <form id="password-form">
                    <label for="username">Nom d'utilisateur :</label>
                    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token1'], ENT_QUOTES, 'UTF-8'); ?>">

                    <input type="text" id="username" name="username" value="<?php echo $_SESSION['user_id']; ?>" readonly><br><br>
                    
                    <label for="old-password">Ancien Mot de passe :</label>
                    <div class="password-wrapper">
                        <input type="password" id="old-password" name="old-password" placeholder="Votre mot de passe actuel" required>
                        <span class="toggle-password" onclick="togglePasswordVisibility('old-password')">👁️</span>
                    </div><br><br>
                    
                    <label for="new-password">Nouveau Mot de passe :</label>
                    <div class="password-wrapper">
                        <input type="password" id="new-password" name="new-password" placeholder="Votre nouveau mot de passe" required>
                        <span class="toggle-password" onclick="togglePasswordVisibility('new-password')">👁️</span>
                    </div><br><br>
                    
                    <label for="confirm-password">Confirmer le Nouveau mot de passe :</label>
                    <div class="password-wrapper">
                        <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirmer votre nouveau mot de passe" required>
                        <span class="toggle-password" onclick="togglePasswordVisibility('confirm-password')">👁️</span>
                    </div><br><br>
                    
                    <button type="submit">Sauvegarder</button>
                </form>
            </div>



            <div id="preferences" class="section">
                <h2>Préférences de Compte</h2>
                <form>
                    <!-- <label for="language">Langue :</label>
                    <select id="language" name="language">
                        <option value="fr">Français</option>
                        <option value="en">Anglais</option> -->
                        <!-- Ajouter d'autres langues si nécessaire
                    </select><br><br>
                    <label for="timezone">Fuseau horaire :</label>
                    <select id="timezone" name="timezone"> -->
                        <!-- Ajouter des options de fuseaux horaires -->
                    <!-- </select><br><br> -->
                    <input type="hidden" id="csrf_token" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token2'], ENT_QUOTES, 'UTF-8'); ?>">

                            <label for="notifications">Notifications :</label><br>
                            <input type="checkbox" id="email-notifications" name="notifications" value="email">
                            <label for="email-notifications">Email</label><br>
                            <input type="checkbox" id="sms-notifications" name="notifications" value="sms">
                            <label for="sms-notifications">SMS</label><br>
                            <button type="submit">Sauvegarder</button>
                </form>
            </div>
            <div id="membership" class="section">
                <h2>Adhésion et Cotisations</h2>
                <p>Statut de l'adhésion : Actif</p>
                <p>Date de renouvellement : 01/01/2025</p>
                <button id="adhesion-button">Renouveler l'adhésion</button>
                <h3>Historique des cotisations</h3>
                <!-- Ajouter un tableau ou une liste des cotisations passées -->
            </div>

            <div id="participation" class="section">
                <h2>Participation et Engagement</h2>
                <h3>Événements passés</h3>
                <!-- Ajouter une liste des événements auxquels l'utilisateur a participé -->
                <h3>Événements à venir</h3>
                <!-- Ajouter une liste des événements futurs auxquels l'utilisateur peut s'inscrire -->
                <button id="event-button">S'inscrire à un événement</button>
            </div>
            <div id="activity-history" class="section">
                <h2>Historique d'Activité</h2>
                <!-- Ajouter une liste ou un tableau des activités récentes de l'utilisateur sur le site -->
            </div>
            <div id="security" class="section">
                <h2>Sécurité et Confidentialité</h2>
                <form>
                    <label for="2fa">Authentification à deux facteurs :</label>
                    <input type="checkbox" id="2fa" name="2fa"><br><br>
                    <button type="submit">Sauvegarder</button>
                </form>
                <h3>Appareils connectés</h3>
                <!-- Ajouter une liste des appareils connectés -->
            </div>
            <div id="support" class="section">
                <h2>Support et Assistance</h2>
                <p>Si vous avez des questions ou des problèmes, veuillez contacter notre support :</p>
                <p>Email : support@association.com</p>
                <p>Téléphone : 01 23 45 67 89</p>
                <!-- Ajouter un formulaire de feedback ou de rapport de problèmes si nécessaire -->
            </div> 
            <div id="logout-delete" class="section">
                <h2>Déconnexion et Suppression de Compte</h2>
                <button type="button" onclick="logout()">Déconnexion</button><br><br>
                <button type="button" onclick="deleteAccount()">Supprimer le compte</button>
            </div>
            <div id="social-integration" class="section">
                <h2>Réseaux Sociaux et Intégrations</h2>
                <form>
                    <label for="facebook">Facebook :</label>
                    <input type="text" id="facebook" name="facebook" placeholder="Lien vers votre profil Facebook"><br><br>
                    <label for="twitter">Twitter :</label>
                    <input type="text" id="twitter" name="twitter" placeholder="Lien vers votre profil Twitter"><br><br>
                    <!-- Ajouter d'autres réseaux sociaux si nécessaire -->
                    <button type="submit">Sauvegarder</button>
                </form>
            </div>
            <div id="communications" class="section">
                <h2>Communications de l'Association</h2>
                <h3>Newsletters</h3>
                <!-- Ajouter une liste des newsletters reçues -->
                <form>
                    <label for="subscribe-newsletter">S'abonner à la newsletter :</label>
                    <input type="checkbox" id="subscribe-newsletter" name="subscribe-newsletter"><br><br>
                    <button type="submit">Sauvegarder</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"></script>
    <script src="js/profile.js"></script>
    <script src="js/info.js"></script>

</body>
</html>
