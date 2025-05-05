<?php
session_start();

require __DIR__ . '/../../vendor/autoload.php';
header('Content-Type: application/json');

use App\Classes\PostService;

$postController = new PostService;

if($postController->uploadPost($_FILES, $_POST, $_SESSION['userData'][0]['user_id'])) {
    echo "uploaded";
    exit;
}

echo "mali";
