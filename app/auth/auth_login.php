<?php

require __DIR__ . '/../../vendor/autoload.php';
use App\Classes\AuthUser;

$auth = new AuthUser;

if (!isset($_POST['login'])) {
    header('location: ../../login.php');
}

if (empty($_POST['username']) || empty($_POST['password'])) {
    $ok = false;
    require '../../login.php';
}

if ($auth->login($_POST)) {
    echo 'success';
} else {
    echo 'mali';
}