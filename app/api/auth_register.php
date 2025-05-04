<?php

require __DIR__ . '/../../vendor/autoload.php';
header('Content-Type: application/json');

use App\Helper\Helper;
use App\Classes\AuthUser;


if (!$_SERVER['REQUEST_METHOD'] === 'POST') {
    header('location: /blog/login.php');
}

$res = Helper::validateLoginForm($_POST, function($param) {
    echo json_encode(['status' => 'error', 'message' => $param]);
    exit;
});

if ($res) {

    $auth = new AuthUser;

    if ($auth->register($_POST)) {

        // Helper::storeUserToSession();

        echo json_encode(['status' => 'success', 'message' => 'Successfuly registered!']);
        exit;
    }

    echo json_encode(['status' => 'error', 'message' => 'User not found.']);
}
