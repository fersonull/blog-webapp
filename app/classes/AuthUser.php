<?php

namespace App\Classes;
use App\Config\Database;
// use App\Classes\User;
use App\Helper\Helper;

class AuthUser extends Database
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    public function login($cred)
    {
        // if (!Helper::validateLoginForm($cred)) {
        //     return false;
        // }

        if (!$this->userExists($cred['username'], $cred['password']) > 0) {
            return false;
        }

        return true;
    }
}