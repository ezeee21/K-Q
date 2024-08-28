document.addEventListener('DOMContentLoaded', function() {
    const tableConfigs = [
        { id: 'dons-table', csvFile: 'csv/dons.csv', columns: ['id', 'id_adherent', 'montant', 'date_don', 'methode_paiement', 'destination_fonds'], columnsToShow: ['id_adherent', 'montant', 'date_don', 'methode_paiement', 'destination_fonds'] },
        { id: 'adherent-table', csvFile: 'csv/adherent.csv', columns: ['id', 'nom', 'prenom', 'date_adhesion', 'email', 'telephone'], columnsToShow: ['nom', 'prenom', 'date_adhesion', 'email', 'telephone'] },
        { id: 'depense-table', csvFile: 'csv/depenses.csv', columns: ['id', 'montant', 'date_depense', 'categorie', 'description'], columnsToShow: ['montant', 'date_depense', 'categorie', 'description'] }
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

            // Uncomment this section if you want to add action buttons like edit/delete
            // const actionsCell = document.createElement('td');
            // actionsCell.innerHTML = `
            //     <button class="edit-btn" data-id="${event.id}">Edit</button>
            //     <button class="delete-btn" data-id="${event.id}">Delete</button>`;
            // row.appendChild(actionsCell);

            tableBody.appendChild(row);
        });
    }
});
