<?php

namespace App\Classes;
use App\Config\Database;

class AuthUser extends Database
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    public function login($cred)
    {
        if ($this->userExists($cred['username'], $cred['password']) > 0) {
            // TODO: form validation logic here

            return true;
        }

        return false;
    }
}