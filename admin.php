<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TPro Admin</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/app.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <h2>TPro Admin</h2>
        </div>
        <ul class="sidebar-menu">
            <li id="D" onclick="showSection('Dashboard','D')" class="activ yes">Dashboard</li>
            <h2> App </h2>
            <!-- <li id="F" onclick="showSection('Finances','F')" class="activ ">Finances</li>
            <li id="AD" onclick="showSection('Adherent','AD')" class="activ ">Adherent</li>
            <li id="DE" onclick="showSection('Depenses','DE')" class="activ ">Depenses</li> -->
            <li id="U" onclick="showSection('User','U')" class="activ ">User</li>
            <li id="E" onclick="showSection('Evenement','E')" class="activ ">Evenement</li> 
            <li id="AC" onclick="showSection('Article','AC')" class="activ ">Artcile</li> 
            <li id="C" onclick="showSection('Chat','C')" class="activ ">Chat</li>
            <h2>Data List</h2>
            <li id="S" onclick="showSection('Security','S')" class="activ ">Security</li>
            <li id="A" onclick="showSection('Analytics','A')" class="activ ">Analytics</li>
        </ul>
    </div>
    <div class="content">
        <div id="Dashboard" class="section active">
                <div class="header">
                    <div class="profile">
                        <span>SImonis Stevens </span> <br>
                        <img src="kurosaki_ichigo_by_inferno2446-d4jy0kp.png" alt="Profile">
                    </div>
                </div>
                <div class="stats">
                    <div class="card">
                        <div id="activity-summary"></div>
                    </div>
                    <div class="card">
                        <h3>Orders Received</h3>
                        <canvas id="registrationsChart" width="200" height="150"></canvas>
                    </div>
                    <div class="card">
                        <h3>Avg Sessions</h3>
                        <canvas id="participationChart" width="200" height="150"></canvas>
                    </div>
                    <div class="card">
                        <h3>Support Tracker</h3>
                        <canvas id="fundsChart" width="200" height="150"></canvas>
                    </div>
                </div>
        </div>
        <!-- <div id="Finances" class="section">
        <div class="header">
                <div class="profile">
                    <img src="profile.jpg" alt="Profile">
                    <span>SImonis Stevens </span>
                </div>
            </div>

            <div id="app">
                <h1>Gestion des utilisateurs</h1>
                <p class="phrase">Vous pouvez ajouter de nouveaux utilisateurs ou modifier les permissions existantes.<br>
                Chaque utilisateur peut avoir accès à l'ensemble de l'entreprise ou seulement à des sites spécifiques.</p>
                
 
                <table id="dons-table">
                    <thead>
                        <tr>
                            <th>id_adherent</th>
                            <th>montant</th>
                            <th>date_don</th>
                            <th>methode_paiement</th>
                            <th>destination_fonds</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
             </div>
        </div>
        <div id="Adherent" class="section">
            <div class="header">
                <div class="profile">
                    <img src="profile.jpg" alt="Profile">
                    <span>SImonis Stevens </span>
                </div>
            </div>

            <div id="app">
                <h1>Gestion des utilisateurs</h1>
                <p class="phrase">Vous pouvez ajouter de nouveaux utilisateurs ou modifier les permissions existantes.<br>
                Chaque utilisateur peut avoir accès à l'ensemble de l'entreprise ou seulement à des sites spécifiques.</p>
                
 
                
                <table id="adherent-table">
                    <thead>
                        <tr>
                            <th>nom</th>
                            <th>prenom</th>
                            <th>email</th>
                            <th>date_adhesion</th>
                            <th>type_adhesion</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
             </div>
        </div>
        <div id="Depenses" class="section">
            <div class="header">
                <div class="profile">
                    <img src="profile.jpg" alt="Profile">
                    <span>SImonis Stevens </span>
                </div>
            </div>

            <div id="app">
                <h1>Gestion des utilisateurs</h1>
                <p class="phrase">Vous pouvez ajouter de nouveaux utilisateurs ou modifier les permissions existantes.<br>
                Chaque utilisateur peut avoir accès à l'ensemble de l'entreprise ou seulement à des sites spécifiques.</p>
            
                
                <table id="depense-table">
                    <thead>
                        <tr>
                            <th>description</th>
                            <th>montant</th>
                            <th>date_depense</th>
                            <th>projet_associe</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
             </div>
        </div> -->

        <div id="User" class="section">
            <div class="header">
                <div class="profile">
                    <img src="profile.jpg" alt="Profile">
                    <span>SImonis Stevens </span>
                </div>
            </div>

            <div id="app">
                <h1>Gestion des utilisateurs</h1>
                <p class="phrase">Vous pouvez ajouter de nouveaux utilisateurs ou modifier les permissions existantes.<br>
                Chaque utilisateur peut avoir accès à l'ensemble de l'entreprise ou seulement à des sites spécifiques.</p>
                
                <button id="invite-button">Inviter des utilisateurs</button>
                
                <label for="role-filter">Filtrer par rôle :</label>
                <select id="role-filter">
                    <option value="">Tous les rôles</option>
                    <option value="manager">Manager</option>
                    <option value="user">Utilisateur</option>
                </select>
                
                <table id="users-table">
                    <thead>
                        <tr>
                            <th>NOM</th>
                            <th>EMAIL</th>
                            <th>2FA</th>
                            <th>RÔLE</th>
                            <th>SITES</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
             </div>

                 <!-- Popup for Editing Role -->
             <div id="edit-popup" class="popup">
                <div class="popup-content">
                    <span class="close-btn" id="close-edit-popup">&times;</span>
                    <h2>Modifier le rôle de l'utilisateur</h2>
                    <form id="edit-role-form">
                        <input type="hidden" id="edit-user-id">
                        <label for="edit-role">Nouveau rôle :</label>
                        <select id="edit-role" name="role">
                            <option value="manager">Manager</option>
                            <option value="user">Utilisateur</option>
                        </select>
                        <button type="submit">Enregistrer</button>
                     </form>
                    </div>
              </div>

                <!-- Popup for Deleting/Suspending Account -->
                <div id="delete-popup" class="popup">
                    <div class="popup-content">
                        <span class="close-btn" id="close-delete-popup">&times;</span>
                        <h2>Supprimer/Suspendre le compte</h2>
                        <form id="delete-form">
                            <input type="hidden" id="delete-user-id">
                            <label>Action :</label>
                            <select id="delete-action" name="action">
                                <option value="suspend">Suspendre le compte</option>
                                <option value="unsuspend">Lever la suspension</option>
                                <option value="delete">Supprimer le compte</option>
                            </select>
                            <button type="submit">Confirmer</button>
                        </form>
                    </div>
             </div>
        </div>
        <div id="Evenement" class="section">
                <div class="header">
                        <div class="profile">
                            <img src="profile.jpg" alt="Profile">
                            <span>SImonis Stevens </span>
                        </div>
                    </div>

                    <div id="app">
                            <h1>Gestion des Événements</h1>
                            <p class="phrase">Vous pouvez ajouter de nouveaux événements, ou modifier et supprimer ceux existants.</p>
                            <!-- <button id="event-button">Créer un Événement</button> -->
                            <table id="event-table">
                                <thead>
                                    <tr>
                                        <th>NOM</th>
                                        <th>Description</th>
                                        <th>Date</th>
                                        <th>ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>

                        <!-- Popup pour modifier un événement -->
                        <div id="event-edit-popup" class="popup">
                            <div class="popup-content">
                                <span class="close-btn" id="close-event-edit-popup">&times;</span>
                                <h2>Modifier l'Événement</h2>
                                <form id="edit-event-form">
                                    <input type="hidden" id="edit-event-id">
                                    <label for="edit-event-name">Nom :</label>
                                    <input type="text" id="edit-event-name" required><br>
                                    <label for="edit-event-description">Description :</label>
                                    <textarea id="edit-event-description" required></textarea><br>
                                    <label for="edit-event-date">Date :</label>
                                    <input type="date" id="edit-event-date" required><br>
                                    <button type="submit">Enregistrer</button>
                                </form>
                            </div>
                        </div>

                        <!-- Popup pour supprimer/suspendre un événement -->
                        <div id="event-delete-popup" class="popup">
                            <div class="popup-content">
                                <span class="close-btn" id="close-event-delete-popup">&times;</span>
                                <h2>Supprimer/Suspendre l'Événement</h2>
                                <form id="delete-event-form">
                                    <input type="hidden" id="delete-event-id">
                                    <label>Action :</label>
                                    <select id="delete-event-action" name="action">
                                        <option value="suspend">Suspendre l'Événement</option>
                                        <option value="unsuspend">Lever la Suspension</option>
                                        <option value="delete">Supprimer l'Événement</option>
                                    </select>
                                    <button type="submit">Confirmer</button>
                                </form>
                            </div>
                    </div>
        </div>
        <div id="Article" class="section">
                <div class="header">
                        <div class="profile">
                            <img src="profile.jpg" alt="Profile">
                            <span>SImonis Stevens </span>
                        </div>
                    </div>

                    <div id="app">
                            <h1>Gestion des article</h1>
                            <p class="phrase">Vous pouvez ajouter de nouveaux article, ou modifier et supprimer ceux existants.</p>
                            <table id="article-table">
                                <thead>
                                    <tr>
                                        <th>titre</th>
                                        <th>date_publication</th>
                                        <th>auteur</th>
                                        <th>categorie</th>
                                        <th>contenu</th>
                                        <th>ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>

                        
                        <div id="article-edit-popup" class="popup">
                            <div class="popup-content">
                                <span class="close-btn" id="close-article-edit-popup">&times;</span>
                                <h2>Modifier l'article</h2>
                                <form id="edit-article-form">
                                    <input type="hidden" id="edit-article-id">
                                    <label for="edit-article-title">Titre :</label>
                                    <input type="text" id="edit-article-title" required><br>
                                    <label for="edit-article-date">Date de publication :</label>
                                    <input type="date" id="edit-article-date" required><br>
                                    <label for="edit-article-author">Auteur :</label>
                                    <input type="text" id="edit-article-author" required><br>
                                    <label for="edit-article-category">Categorie :</label>
                                    <input type="text" id="edit-article-category" required><br>
                                    <label for="edit-article-content">Contenu :</label>
                                    <textarea id="edit-article-content" required></textarea><br>
                                    <button type="submit">Enregistrer</button>
                                </form>
                            </div>
                        </div>

                  
                        <div id="article-delete-popup" class="popup">
                            <div class="popup-content">
                                <span class="close-btn" id="close-article-delete-popup">&times;</span>
                                <h2>Supprimer/Suspendre l'article</h2>
                                <form id="delete-article-form">
                                    <input type="hidden" id="delete-article-id">
                                    <label>Action :</label>
                                    <select id="delete-article-action" name="action">
                                        <option value="suspend">Suspendre l'article</option>
                                        <option value="unsuspend">Lever la Suspension</option>
                                        <option value="delete">Supprimer l'article</option>
                                    </select>
                                    <button type="submit">Confirmer</button>
                                </form>
                            </div>
                        </div>

        </div>
        <div id="Chat" class="section"></div>
        <div id="Security" class="section"></div>
        <div id="Analytics" class="section"></div>   
    </div>
    
    <script src="js/scripts.js"></script>
    <!-- <script src="js/finances.js"></script> -->
    <script src="js/app1.js"></script>
    <script src="js/event.js"></script>
    <script src="js/article.js"></script>


</body>
</html>