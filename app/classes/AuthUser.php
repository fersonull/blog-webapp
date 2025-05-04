<?php

namespace App\Classes;
use App\Classes\User;
use App\Helper\Helper;

class AuthUser extends User
{
    public function login($cred)
    {

        $userData = $this->userExists($cred['username'], $cred['password']);

        if (!count($userData) > 0) {
            return false;
        }

        Helper::storeUserToSession($userData);

        return true;
    }

    public function register($cred) {
        $userData = $this->userExists($cred['username'], $cred['password']);

        if (count($userData) > 0) {
            return false;
        }

        $query = "INSERT INTO users_tb ";
    }
}