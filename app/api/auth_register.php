<?php

require __DIR__ . '/../../vendor/autoload.php';
header('Content-Type: application/json');

use App\Helper\Helper;
use App\Classes\UserController;


if (!$_SERVER['REQUEST_METHOD'] === 'POST') {
    header('location: login.php');
}

$res = Helper::validateRegForm($_POST, function($param) {
    echo json_encode(['status' => 'error', 'message' => $param]);
    exit;
});

if ($res) {

    

    $auth = new UserController();

    if ($auth->register($_POST)) {

        // Helper::storeUserToSession();

        echo json_encode(['status' => 'success', 'message' => 'Successfuly registered!']);
        exit;
    }

    echo json_encode(['status' => 'error', 'message' => 'Username already taken.']);
}
