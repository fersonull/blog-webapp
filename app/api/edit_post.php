<?php
session_start();

require __DIR__ . '/../../vendor/autoload.php';
header('Content-Type: application/json');

use App\Classes\PostController;

$postController = new PostController;

if($postController->editPost($_POST['post_id'], $_FILES, $_POST)) {
    echo json_encode(['status' => 'success', 'message' => 'Post updated!']);
    exit;
}

echo json_encode(['status' => 'error', 'message' => 'Missing fields.']);
