<?php

use App\Classes\User;

require __DIR__ . '/../../vendor/autoload.php';
header('Content-Type: application/json');

use App\Helper\Helper;
use App\Classes\UserController;


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('location: login.php');
}

$res = Helper::validateLoginForm($_POST, function($param) {
    echo json_encode(['status' => 'error', 'message' => $param]);
    exit;
});

if ($res) {

    $auth = new UserController;

    if ($auth->login($_POST)) {

        // Helper::storeUserToSession();

        echo json_encode(['status' => 'success', 'message' => 'Login successful!']);
        exit;
    } else {
        echo json_encode(['status' => 'error', 'message' => 'User not found.']);
        exit;
    }
}
