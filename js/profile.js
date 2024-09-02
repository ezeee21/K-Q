
               document.addEventListener('DOMContentLoaded', () => {
                    // Affiche la section par défaut
                    showSection('personal-info');

                    
                    document.getElementById('adhesion-button').addEventListener('click', function() {
                        window.location.href = 'addhéssion.php';
                    });

                    document.getElementById('event-button').addEventListener('click', function() {
                        window.location.href = 'event.php';
                    });

                    // Gestion de la photo de profil
                    const profilePic = document.getElementById('current-profile-pic');
                    fetch('trait/get_profile_image.php')
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok ' + response.statusText);
                            }
                            return response.json();
                        })
                        .then(data => {
                            console.log('Fetched image:', data.image); // Affiche l'image dans la console
                            profilePic.src = data.image ? data.image : 'téléchargement (2).png';
                        })
                        .catch(error => {
                            console.error('Error fetching profile image:', error);
                        });


                    // Gérer le clic sur l'image de profil pour déclencher l'upload
                    const uploadInput = document.getElementById('upload-profile-pic');
                    profilePic.addEventListener('click', () => {
                        uploadInput.click();
                    });

                    fetch('trait/get_preferences.php')
                    .then(response => response.json())
                    .then(data => {
                        // Cocher les cases en fonction des préférences récupérées
                        if (data.email_notifications == 1) {
                            document.getElementById('email-notifications').checked = true;
                        }
                        if (data.sms_notifications == 1) {
                            document.getElementById('sms-notifications').checked = true;
                        }
                    })
                    .catch(error => {
                        console.error('Erreur:', error);
                    });


                    // Mise à jour de la photo de profil lors de l'upload
                    // uploadInput.addEventListener('change', updateProfilePic);

                    // Gestion de l'input téléphone
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
                });

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

               // Déconnexion automatique lors de la fermeture de la page
                window.addEventListener("beforeunload", function (e) {
                    // Envoi de la requête AJAX pour déconnecter l'utilisateur
                    navigator.sendBeacon("logout.php");
                });

                // Fonction pour la déconnexion manuelle
                function logout() {
                    alert("Déconnexion réussie !");
                    // Requête AJAX pour la déconnexion
                    var xhr = new XMLHttpRequest();
                    xhr.open("POST", "trait/logout.php", true);
                    xhr.send();

                    // Rediriger l'utilisateur vers la page d'accueil ou une page de connexion
                    window.location.href = 'index3.php';
                }

                // Fonction pour la suppression de compte
                function deleteAccount() {
                    if (confirm("Êtes-vous sûr de vouloir supprimer votre compte ?")) {
                        // Requête AJAX pour la suppression de compte
                        var xhr = new XMLHttpRequest();
                        xhr.open("POST", "trait/delete_account.php", true);
                        xhr.send();

                        alert("Compte supprimé !");
                        // Rediriger l'utilisateur après la suppression
                        window.location.href = 'index3.php';
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

                            // Envoi de l'image au serveur pour l'enregistrement
                            const formData = new FormData();
                            formData.append('profile_pic', file);

                            fetch('trait/upload_image.php', {
                                method: 'POST',
                                body: formData
                            })
                            .then(response => response.json())
                            .then(data => {
                                console.log('Image uploaded and saved:', data);
                            })
                            .catch(error => {
                                console.error('Error uploading image:', error);
                            });
                        };

                        reader.readAsDataURL(file);
                    }
                }

               // Ajout du code pour sauvegarder les préférences avec la gestion du token CSRF
                    document.getElementById('preferences-form').addEventListener('submit', function(event) {
                        event.preventDefault(); // Empêche le rechargement de la page

                        // Récupération des valeurs des notifications
                        const emailNotification = document.getElementById('email-notifications').checked ? 1 : 0;
                        const smsNotification = document.getElementById('sms-notifications').checked ? 1 : 0;
                        const csrfToken = document.getElementById('csrf_token').value;

                        // Création d'un objet FormData pour envoyer les données au serveur
                        const formData = new FormData();
                        formData.append('email_notifications', emailNotification);
                        formData.append('sms_notifications', smsNotification);
                        formData.append('csrf_token', csrfToken);

                        // Envoi des données via fetch
                        fetch('trait/save_preferences.php', {
                            method: 'POST',
                            body: formData
                        })
                        .then(response => response.text())
                        .then(data => {
                            // Affichage du résultat
                            alert(data);
                        })
                        .catch(error => {
                            console.error('Erreur:', error);
                            document.getElementById('result').innerText = 'Une erreur est survenue';
                        });
                    });

                    
                                    

          