<?php
require __DIR__ . '/../../vendor/autoload.php';
header('Content-Type: application/json');

use App\Classes\PostController;

$postController = new PostController;

// echo 'deleted';

if ($postController->deletePost($_GET)) {
    echo json_encode(['status' => 'succes', 'message' => 'Deleted successful']);
    exit;
}
