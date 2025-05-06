<?php
session_start();

require __DIR__ . '/../../vendor/autoload.php';
header('Content-Type: application/json');

use App\Classes\PostController;

$postController = new PostController;

if($postController->uploadPost($_FILES, $_POST, $_SESSION['userData'][0]['user_id'])) {
    echo json_encode(['status' => 'success', 'message' => 'Post uploaded!']);
    exit;
}

echo json_encode(['status' => 'error', 'message' => 'Something went wrong']);
