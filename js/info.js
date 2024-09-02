document.addEventListener('DOMContentLoaded', function() {
    fetch('trait/get_user_data.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Erreur HTTP: ' + response.status);
            }
            return response.json();
        })
        .then(data => {
            if (data.error) {
                alert('Erreur: ' + data.error);
            } else {
                document.getElementById('nom').value = data.nom || '';
                document.getElementById('Prenom').value = data.prenom || '';
                document.getElementById('email').value = data.email || '';
                document.getElementById('phone-number').value = data.telephone || '';
                document.getElementById('address').value = data.adresse || '';
                document.getElementById('code_postale').value = data.code_postale || '';
                document.getElementById('commune').value = data.commune || '';
            }
        })
        .catch(error => {
            console.error('Erreur:', error);
            alert('Une erreur est survenue. Veuillez réessayer plus tard.');
        });

    document.querySelector('#phone').addEventListener('submit', function(event) { // Change '#form-id' to the correct form ID
        event.preventDefault(); // Prevent default form submission

        const newnom = document.getElementById('nom').value;
        const newPrenom = document.getElementById('Prenom').value;
        const newemail = document.getElementById('email').value;
        const newphonenumber = document.getElementById('phone-number').value;
        const newaddress = document.getElementById('address').value;
        const newcodepostale = document.getElementById('code_postale').value;
        const newcommune = document.getElementById('commune').value;


        fetch('trait/save_user_data.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                nom: newnom,
                Prenom: newPrenom,
                email: newemail,
                telephone: newphonenumber,
                address: newaddress,
                code_postale: newcodepostale,
                commune: newcommune,
                csrf_token: document.querySelector('input[name="csrf_token"]').value // Add CSRF token here
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                alert('Erreur: ' + data.error);
            } else {
                alert('Données sauvegardées avec succès.');
            }
        })
        .catch(error => {
            console.error('Erreur:', error);
            alert('Une erreur est survenue. Veuillez réessayer plus tard.');
        });
    });
});

document.getElementById('password-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Empêche la soumission par défaut du formulaire
    
    const oldPassword = document.getElementById('old-password').value;
    const newPassword = document.getElementById('new-password').value;
    const confirmPassword = document.getElementById('confirm-password').value;

    // Validation simple côté client
    if (newPassword !== confirmPassword) {
        alert("Les nouveaux mots de passe ne correspondent pas.");
        return;
    }

    // Validation de la complexité du nouveau mot de passe
    if (newPassword.length < 8 || !/[A-Z]/.test(newPassword) || !/[0-9]/.test(newPassword)) {
        alert("Le nouveau mot de passe doit comporter au moins 8 caractères, une majuscule et un chiffre.");
        return;
    }

    // Envoi des données via AJAX
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'trait/change_password.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            if (xhr.responseText.includes("Mot de passe modifié avec succès")) {
                alert(xhr.responseText);
                // Rafraîchir la page après une modification réussie
                window.location.reload();
            } else {
                alert(xhr.responseText); // Affiche le message d'erreur
            }
        }
    };
    
    const data = `old-password=${encodeURIComponent(oldPassword)}&new-password=${encodeURIComponent(newPassword)}&csrf_token=${encodeURIComponent(document.querySelector('[name="csrf_token"]').value)}`;
    xhr.send(data);
});


function togglePasswordVisibility(fieldId) {
    const field = document.getElementById(fieldId);
    const toggleIcon = field.nextElementSibling;
    if (field.type === "password") {
        field.type = "text";
        toggleIcon.textContent = "🙈"; // Icône pour cacher le mot de passe
    } else {
        field.type = "password";
        toggleIcon.textContent = "👁️"; // Icône pour afficher le mot de passe
    }
}



