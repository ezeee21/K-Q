document.addEventListener('DOMContentLoaded', () => {
    loadOverview();
    loadMembers();
    loadEvents();
});

function loadOverview() {
    fetch('data/overview.php')
        .then(response => response.json())
        .then(data => {
            document.getElementById('activity-summary').innerHTML = `
                <h3>Résumé des Activités Récentes</h3>
                <p>Événements organisés ce mois-ci: ${data.eventsThisMonth}</p>
                <p>Nouveaux membres inscrits cette semaine: ${data.newMembersThisWeek}</p>
                <p>Nombre total de membres actifs: ${data.totalActiveMembers}</p>
            `;

            // Graphique des inscriptions mensuelles
            const ctxRegistrations = document.getElementById('registrationsChart').getContext('2d');
            new Chart(ctxRegistrations, {
                type: 'line',
                data: {
                    labels: data.months,
                    datasets: [{
                        label: 'Inscriptions mensuelles',
                        data: data.registrations,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Graphique de la participation moyenne aux événements
            const ctxParticipation = document.getElementById('participationChart').getContext('2d');
            new Chart(ctxParticipation, {
                type: 'bar',
                data: {
                    labels: data.eventNames,
                    datasets: [{
                        label: 'Participation moyenne',
                        data: data.participation,
                        borderColor: 'rgba(153, 102, 255, 1)',
                        backgroundColor: 'rgba(153, 102, 255, 0.2)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Graphique des fonds collectés par rapport aux objectifs
            const ctxFunds = document.getElementById('fundsChart').getContext('2d');
            new Chart(ctxFunds, {
                type: 'doughnut',
                data: {
                    labels: ['Collectés', 'Objectif restant'],
                    datasets: [{
                        data: [data.fundsCollected, data.fundsGoal - data.fundsCollected],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Support Tracker'
                        }
                    }
                }
            });
        });
}

function loadMembers() {
    fetch('data/members.php')
        .then(response => response.json())
        .then(data => {
            let membersHtml = '<h3>Liste des Membres</h3><ul>';
            data.members.forEach(member => {
                membersHtml += `<li>${member.name}</li>`;
            });
            membersHtml += '</ul>';
            document.getElementById('members-list').innerHTML = membersHtml;
        });
}

function loadEvents() {
    fetch('data/events.php')
        .then(response => response.json())
        .then(data => {
            let eventsHtml = '<h3>Liste des Événements</h3><ul>';
            data.events.forEach(event => {
                eventsHtml += `<li>${event.title} - ${event.date}</li>`;
            });
            eventsHtml += '</ul>';
            document.getElementById('events-list').innerHTML = eventsHtml;
        });
}
function showSection(sectionId,liID) {
    const sections = document.querySelectorAll('.section');
    sections.forEach(section => {
        section.classList.remove('active');
    });
    document.getElementById(sectionId).classList.add('active');

    const li = document.querySelectorAll('.activ');
    li.forEach(lis => {
        lis.classList.remove('yes');
    });
    document.getElementById(liID).classList.add('yes');
}
