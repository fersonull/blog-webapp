<?php
require __DIR__ . '/../../vendor/autoload.php';

use App\Classes\PostController;

$postController = new PostController;

if ($postController->deletePost($_GET)) {
    $deleted = true;
    header("location: /blog/profile.php");
    exit;
}