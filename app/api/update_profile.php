<?php
session_start();

require __DIR__ . '/../../vendor/autoload.php';
header('Content-Type: application/json');

use App\Classes\UserController;

$userController = new UserController;

if($userController->updateProfile($_SESSION['userData'][0]['user_id'], $_FILES)) {
    echo json_encode(['status' => 'success', 'message' => 'Profile updated!']);
    exit;
}

echo json_encode(['status' => 'error', 'message' => 'Something went wrong.']);
