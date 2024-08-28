<?php
include '../includes/db.php';

// Exemple de données statiques pour les graphiques
$data = [
    'eventsThisMonth' => 5,
    'newMembersThisWeek' => 10,
    'totalActiveMembers' => 100,
    'months' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    'registrations' => [12, 19, 3, 5, 2, 3, 10, 15, 9, 6, 11, 8],
    'eventNames' => ['Event 1', 'Event 2', 'Event 3', 'Event 4', 'Event 5'],
    'participation' => [50, 60, 70, 80, 90],
    'fundsCollected' => 7000,
    'fundsGoal' => 10000
];

echo json_encode($data);
?>
