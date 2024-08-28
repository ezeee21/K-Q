document.addEventListener('DOMContentLoaded', function() {
    const valeurobj = 0;
    const tableConfigs = [
        {
            id: 'article-table', 
            csvFile: 'csv/article.csv', 
            columns: ['id', 'titre', 'date_publication', 'auteur', 'categorie', 'contenu', 'suspension'], 
            columnsToShow: ['titre', 'date_publication', 'auteur', 'categorie', 'contenu']
        }
    ];

    tableConfigs.forEach(config => {
        fetchEventsForTable(config);
    });

    function fetchEventsForTable(config) {
        const tableBody = document.querySelector(`#${config.id} tbody`);

        fetch(config.csvFile)
            .then(response => response.text())
            .then(data => {
                const events = parseCSV(data, config.columns);
                renderEvents(events, tableBody, config.columnsToShow);
            })
            .catch(error => console.error(`Erreur lors du chargement de ${config.csvFile}:`, error));
    }

    function parseCSV(data, columns) {
        const rows = data.split('\n').slice(1); // Skip the header row
        return rows.map(row => {
            const values = row.split(',');
            let event = {};
            columns.forEach((col, index) => {
                event[col] = values[index];
            });
            return event;
        });
    }

    function renderEvents(events, tableBody, columnsToShow) {
        tableBody.innerHTML = '';

        events.forEach(event => {
            const row = document.createElement('tr');

            columnsToShow.forEach(col => {
                const cell = document.createElement('td');
                cell.textContent = event[col];
                row.appendChild(cell);
            });

            const actionsCell = document.createElement('td');
            actionsCell.innerHTML = `
                <button class="edit-btn" data-id="${event.id}">Edit</button>
                <button class="delete-btn" data-id="${event.id}">Delete</button>`;
            row.appendChild(actionsCell);

            tableBody.appendChild(row);
        });

        // Add event listeners to edit buttons
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', function() {
                const eventId = this.getAttribute('data-id');
                const event = events.find(event => event.id === eventId);

                document.getElementById('edit-article-id').value = event.id;
                document.getElementById('edit-article-title').value = event.titre;
                document.getElementById('edit-article-date').value = event.date_publication;
                document.getElementById('edit-article-author').value = event.auteur;
                document.getElementById('edit-article-category').value = event.categorie;
                document.getElementById('edit-article-content').value = event.contenu;

                document.getElementById('article-edit-popup').style.display = 'flex';
            });
        });

        // Add event listeners to delete buttons
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function() {
                const eventId = this.getAttribute('data-id');
                document.getElementById('delete-article-id').value = eventId;
                document.getElementById('article-delete-popup').style.display = 'flex';
            });
        });
    }

    // Close the edit popup
    document.getElementById('close-article-edit-popup').addEventListener('click', function() {
        document.getElementById('article-edit-popup').style.display = 'none';
    });

    // Close the delete popup
    document.getElementById('close-article-delete-popup').addEventListener('click', function() {
        document.getElementById('article-delete-popup').style.display = 'none';
    });

    // Handle article edit form submission
    document.getElementById('edit-article-form').addEventListener('submit', function(e) {
        e.preventDefault();
       
        const articleId = document.getElementById('edit-article-id').value;
        const newTitle = document.getElementById('edit-article-title').value;
        const newDate = document.getElementById('edit-article-date').value;
        const newAuthor = document.getElementById('edit-article-author').value;
        const newCategory = document.getElementById('edit-article-category').value;
        const newContent = document.getElementById('edit-article-content').value;

        fetch('trait/update_objet.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ valeur: valeurobj, id: articleId, titre: newTitle, date_publication: newDate, auteur: newAuthor, categorie: newCategory, contenu: newContent })
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
            document.getElementById('article-edit-popup').style.display = 'none';
            fetchEventsForTable(tableConfigs.find(config => config.id === 'article-table')); // Reload events after update
        })
        .catch(error => console.error('Erreur:', error));
    });

    // Handle article delete/suspend form submission
    document.getElementById('delete-article-form').addEventListener('submit', function(e) {
        e.preventDefault();
        const articleId = document.getElementById('delete-article-id').value;
        const action = document.getElementById('delete-article-action').value;

        fetch('trait/manage_delete.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({valeur: valeurobj, id: articleId, action: action })
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
            document.getElementById('article-delete-popup').style.display = 'none';
            fetchEventsForTable(tableConfigs.find(config => config.id === 'article-table')); // Reload events after action
        })
        .catch(error => console.error('Erreur:', error));
    });

    // Initialize fetch
    tableConfigs.forEach(config => fetchEventsForTable(config));
});
