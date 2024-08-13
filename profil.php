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
                    <img id="current-profile-pic" src="téléchargement (2).png" alt="Photo de profil actuelle">
                    <div class="overlay">
                        <label for="upload-profile-pic">
                            <span>Changer de photo</span>
                            <input type="file" id="upload-profile-pic" accept="image/*" style="display: none;" onchange="updateProfilePic(event)">
                            <!-- <input type="file" id="upload-profile-pic" accept="image/*"> -->
                        </label>
                    </div>
                </div>
                <form id="phone">
                    <label for="name">Nom :</label>
                    <input type="text" id="nom" name="nom" placeholder="Votre Nom"><br><br>
                    <label for="name">Prenom:</label>
                    <input type="text" id="Prenom" name="Prenom" placeholder="Votre Prenom"><br><br>
                    <label for="email">Email :</label>
                    <input type="email" id="email" name="email" placeholder="Votre email"><br><br>
                    <label for="phone">Téléphone :</label>
                    <input type="tel" id="phone-number" placeholder="Numéro de téléphone">
                    <label for="address">Adresse :</label>
                    <input type="text" id="address" name="address" placeholder="Votre adresse postale"><br><br>
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
                <form>
                    <label for="username">Nom d'utilisateur :</label>
                    <input type="text" id="username" name="username" placeholder="Votre nom d'utilisateur"><br><br>
                    <label for="password">Mot de passe :</label>
                    <input type="password" id="password" name="password" placeholder="Votre mot de passe"><br><br>
                    <label for="confirm-password">Confirmer le mot de passe :</label>
                    <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirmer votre mot de passe"><br><br>
                    <button type="submit">Sauvegarder</button>
                </form>
            </div>
            <div id="preferences" class="section">
                <h2>Préférences de Compte</h2>
                <form>
                    <label for="language">Langue :</label>
                    <select id="language" name="language">
                        <option value="fr">Français</option>
                        <option value="en">Anglais</option>
                        <!-- Ajouter d'autres langues si nécessaire -->
                    </select><br><br>
                    <label for="timezone">Fuseau horaire :</label>
                    <select id="timezone" name="timezone">
                        <!-- Ajouter des options de fuseaux horaires -->
                    </select><br><br>
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
                <button type="button">Renouveler l'adhésion</button>
                <h3>Historique des cotisations</h3>
                <!-- Ajouter un tableau ou une liste des cotisations passées -->
            </div>
            <div id="participation" class="section">
                <h2>Participation et Engagement</h2>
                <h3>Événements passés</h3>
                <!-- Ajouter une liste des événements auxquels l'utilisateur a participé -->
                <h3>Événements à venir</h3>
                <!-- Ajouter une liste des événements futurs auxquels l'utilisateur peut s'inscrire -->
                <button type="button">S'inscrire à un événement</button>
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
    <script>
                function toggleProfileBar() {
                const profileBar = document.getElementById('profile-bar');
                profileBar.classList.toggle('open');
            }

            function showSection(sectionId) {
                const sections = document.querySelectorAll('.section');
                sections.forEach(section => {
                    section.classList.remove('active');
                });
                document.getElementById(sectionId).classList.add('active');
            }

            function logout() {
                // Ajouter la logique de déconnexion ici
                alert("Déconnexion réussie !");
            }

            function deleteAccount() {
                // Ajouter la logique de suppression de compte ici
                if (confirm("Êtes-vous sûr de vouloir supprimer votre compte ?")) {
                    alert("Compte supprimé !");
                }
            }

            function updateProfilePic(event) {
                const input = event.target;
                const file = input.files[0];

                if (file) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        const profilePic = document.getElementById('current-profile-pic');
                        profilePic.src = e.target.result;
                    };

                    reader.readAsDataURL(file);
                }
            }

            // Set the default section to be displayed
            document.addEventListener('DOMContentLoaded', () => {
                showSection('personal-info');
                const profilePic = document.getElementById('profile-pic');
                profilePic.addEventListener('click', () => {
                    document.getElementById('profile-pic-upload').click();
                });
            });
        const phoneNumberInput = document.querySelector("#phone-number");
        const sendCodeButton = document.querySelector("#send-code");

        const iti = window.intlTelInput(phoneNumberInput, {
            initialCountry: "fr",
            autoHideDialCode: false,
            formatOnDisplay: true,
            nationalMode: false,
            preferredCountries: ["fr", "us", "gb"],
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
        });

        phoneNumberInput.addEventListener('input', function() {
            // Filtre le contenu pour n'accepter que les chiffres
            const cleanValue = this.value.replace(/[^0-9]/g, '');
            
            iti.setNumber(`+${cleanValue}`);
            const phoneNumber = iti.getNumber(intlTelInputUtils.numberFormat.NATIONAL).trim();
            this.value = phoneNumber; // Met à jour l'input avec le numéro formaté
            sendCodeButton.disabled = phoneNumber.length === 0;
        });

        sendCodeButton.addEventListener('click', function() {
            const phoneNumber = iti.getNumber();
            alert(`Code de vérification envoyé à ${phoneNumber}`);
        });
    </script>

</body>
</html>
