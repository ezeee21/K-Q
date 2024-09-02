<?php
session_start();

// Détruire la session
session_unset();
session_destroy();

// Réponse HTTP 200
http_response_code(200);
exit();
?>
