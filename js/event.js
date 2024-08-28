document.addEventListener('DOMContentLoaded', function() {
    const createButton = document.getElementById('event-button');
    const eventsTableBody = document.querySelector('#event-table tbody');
    const valeurobj = 1;
    const editPopup = document.getElementById('event-edit-popup');
    const closeEditPopup = document.getElementById('close-event-edit-popup');
    const editEventForm = document.getElementById('edit-event-form');
    const editEventIdInput = document.getElementById('edit-event-id');
    const editEventNameInput = document.getElementById('edit-event-name');
    const editEventDescriptionInput = document.getElementById('edit-event-description');
    const editEventDateInput = document.getElementById('edit-event-date');

    const deletePopup = document.getElementById('event-delete-popup');
    const closeDeletePopup = document.getElementById('close-event-delete-popup');
    const deleteForm = document.getElementById('delete-event-form');
    const deleteEventIdInput = document.getElementById('delete-event-id');
    const deleteActionInput = document.getElementById('delete-event-action');

    let events = [];

    // Fetch event data from the CSV
    function fetchEvents() {
        fetch('csv/cv_evenement.csv')
            .then(response => response.text())
            .then(data => {
                events = parseCSV(data);
                renderEvents();
            })
            .catch(error => console.error('Erreur:', error));
    }

    // Parse CSV data
    function parseCSV(data) {
        const rows = data.split('\n').slice(1); // Skip the header row
        return rows.map(row => {
            const [id, name, description, date, suspension] = row.split(',');
            return { id, name, description, date, suspension: suspension === '1' };
        });
    }

    // Render events
    function renderEvents() {
        eventsTableBody.innerHTML = '';

        events.forEach(event => {
            const row = document.createElement('tr');

            const nameCell = document.createElement('td');
            nameCell.textContent = event.name;
            row.appendChild(nameCell);

            const descriptionCell = document.createElement('td');
            descriptionCell.textContent = event.description;
            row.appendChild(descriptionCell);

            const dateCell = document.createElement('td');
            dateCell.textContent = event.date;
            row.appendChild(dateCell);

            const actionsCell = document.createElement('td');
            actionsCell.innerHTML = `
                <button class="edit-btn" data-id="${event.id}">Edit</button>
                <button class="delete-btn" data-id="${event.id}">Delete</button>`;
            row.appendChild(actionsCell);

            eventsTableBody.appendChild(row);
        });

        // Add event listeners to edit buttons
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', function() {
                const eventId = this.getAttribute('data-id');
                const event = events.find(event => event.id === eventId);
                editEventIdInput.value = event.id;
                editEventNameInput.value = event.name;
                editEventDescriptionInput.value = event.description;
                editEventDateInput.value = event.date;
                editPopup.style.display = 'flex';
            });
        });

        // Add event listeners to delete buttons
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function() {
                const eventId = this.getAttribute('data-id');
                deleteEventIdInput.value = eventId;
                deletePopup.style.display = 'flex';
            });
        });
    }

    // Close the popups
    closeEditPopup.addEventListener('click', function() {
        editPopup.style.display = 'none';
    });

    closeDeletePopup.addEventListener('click', function() {
        deletePopup.style.display = 'none';
    });

    // Handle event edit form submission
    editEventForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const eventId = editEventIdInput.value;
        const newName = editEventNameInput.value;
        const newDescription = editEventDescriptionInput.value;
        const newDate = editEventDateInput.value;

        fetch('trait/update_objet.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ valeur: valeurobj, id: eventId, name: newName, description: newDescription, date: newDate })
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
            editPopup.style.display = 'none';
            fetchEvents(); // Reload events after update
        })
        .catch(error => console.error('Erreur:', error));
    });

    // Handle delete/suspend form submission
    deleteForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const eventId = deleteEventIdInput.value;
        const action = deleteActionInput.value;

        fetch('trait/manage_delete.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({valeur: valeurobj, id: eventId, action: action })
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
            deletePopup.style.display = 'none';
            fetchEvents(); // Reload events after action
        })
        .catch(error => console.error('Erreur:', error));
    });

    // Initialize fetch
    fetchEvents();

    // Create button click handler
    createButton.addEventListener('click', function() {
        window.location.href = 'addevent.php';
    });
});
