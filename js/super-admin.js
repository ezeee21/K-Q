document.addEventListener('DOMContentLoaded', function() {
    const inviteButton = document.getElementById('invite-button');
    const usersTableBody = document.querySelector('#admin-table tbody');
    const roleFilter = document.getElementById('role-filter');

    const editPopup = document.getElementById('edit-popup');
    const closeEditPopup = document.getElementById('close-edit-popup');
    const editRoleForm = document.getElementById('edit-role-form');
    const editUserIdInput = document.getElementById('edit-user-id');
    const editRoleInput = document.getElementById('edit-role');

    const deletePopup = document.getElementById('delete-popup');
    const closeDeletePopup = document.getElementById('close-delete-popup');
    const deleteForm = document.getElementById('delete-form');
    const deleteUserIdInput = document.getElementById('delete-user-id');
    const deleteActionInput = document.getElementById('delete-action');

    let users = [];

    // Fetch user data from the backend
    function fetchUsers() {
        fetch('trait/app.php')
            .then(response => response.json())
            .then(data => {
                users = data;
                renderUsers();
            });
    }

    // Render users based on filter
    function renderUsers() {
        const selectedRole = roleFilter.value;
        usersTableBody.innerHTML = '';

        const filteredUsers = selectedRole
            ? users.filter(user => user.role === selectedRole)
            : users;

        filteredUsers.forEach(user => {
            const row = document.createElement('tr');
            
            const nameCell = document.createElement('td');
            nameCell.textContent = user.name;
            row.appendChild(nameCell);
            
            const emailCell = document.createElement('td');
            emailCell.textContent = user.email;
            row.appendChild(emailCell);
            
            const twoFaCell = document.createElement('td');
            twoFaCell.textContent = user.two_fa ? '2FA' : '';
            row.appendChild(twoFaCell);
            
            const roleCell = document.createElement('td');
            roleCell.textContent = user.role;
            row.appendChild(roleCell);
            
            const sitesCell = document.createElement('td');
            sitesCell.textContent = user.sites;
            row.appendChild(sitesCell);
            
            const actionsCell = document.createElement('td');
            actionsCell.innerHTML = `<button class="edit-btn" data-id="${user.id}">Edit</button> <button class="delete-btn" data-id="${user.id}">Delete</button>`;
            row.appendChild(actionsCell);
            
            usersTableBody.appendChild(row);
        });

        // Add event listeners to edit buttons
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', function() {
                const userId = this.getAttribute('data-id');
                const user = users.find(user => user.id == userId);
                editUserIdInput.value = user.id;
                editRoleInput.value = user.role;
                editPopup.style.display = 'flex';
        
            });
        });

        // Add event listeners to delete buttons
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function() {
                const userId = this.getAttribute('data-id');
                deleteUserIdInput.value = userId;
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

    // Handle role edit form submission
    editRoleForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const userId = editUserIdInput.value;
        const newRole = editRoleInput.value;

        fetch('trait/update_user_role.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id: userId, role: newRole })
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
            editPopup.style.display = 'none';
            fetchUsers();
        });
    });

    // Handle delete/suspend form submission
    deleteForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const userId = deleteUserIdInput.value;
        const action = deleteActionInput.value;

        fetch('trait/delete_suspend_user.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id: userId, action: action })
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
            deletePopup.style.display = 'none';
            fetchUsers();
        });
    });

    // Filter users when the role filter changes
    roleFilter.addEventListener('change', function() {
        renderUsers();
    });

    // Initialize fetch
    fetchUsers();

    // Invite button click handler (add your logic here)
    inviteButton.addEventListener('click', function() {
        alert('Invite button clicked!');
        // Add your invite user logic here
    });
});

function toggleSubMenu(submenuId) {
    const submenu = document.getElementById(submenuId);
    const arrow = document.querySelector(`#${submenuId} + span.arrow`);

    if (submenu.style.display === 'block') {
        submenu.style.display = 'none';
        arrow.classList.remove('rotate');
    } else {
        submenu.style.display = 'block';
        arrow.classList.add('rotate');
    }
}

function showSection(sectionId, liID) {
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