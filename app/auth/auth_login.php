<?php

require __DIR__ . '/../../vendor/autoload.php';
use App\Classes\AuthUser;
use App\Helper\Helper;

$auth = new AuthUser;

if (!isset($_POST['login'])) {
    header('location: ../../login.php');
}


if (!$auth->login($_POST)) {
    $err = true;

    require_once '../../login.php';
}