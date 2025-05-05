<?php

namespace App\Classes;
use App\Classes\User;
use App\Helper\Helper;

class AuthUser extends User
{
    public function login($cred)
    {

        $userData = $this->userExists($cred['username'], $cred['password']);

        if (!$userData) {
            return false;
        }

        Helper::storeUserToSession($userData);

        return true;
    }

    public function register($cred) {
        $userData = $this->checkUsername($cred['username']);

        if ($userData) {
            return false;
        }

        $this->addUser($cred['firstname'], $cred['lastname'], $cred['username'], $cred['password']);

        return true;
        
    }
}