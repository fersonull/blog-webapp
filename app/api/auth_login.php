<?php
require __DIR__ . '/../../vendor/autoload.php';
use App\Helper\Helper;

header('Content-Type: application/json');

if (!$_SERVER['REQUEST_METHOD'] === 'POST') {
    header('location: /blog/login.php');
}

$res = Helper::validateLoginForm($_POST, function($param) {
    echo json_encode(['message' => $param]);
    exit;
});

if ($res) {
    echo json_encode(['message' => 'success']);
    exit;
}
