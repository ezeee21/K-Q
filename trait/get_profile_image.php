<?php
session_start();
header('Content-Type: application/json');

$userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
$image = '';

if ($userId && ($handle = fopen('../csv/image_profile.csv', 'r')) !== FALSE) {
    while (($data = fgetcsv($handle)) !== FALSE) {
        if ($data[0] == $userId) {
            $image = $data[1];
            break;
        }
    }
    fclose($handle);
}

echo json_encode(['image' => $image ?: '']);
?>
