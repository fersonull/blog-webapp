<?php

namespace App\Classes;

use App\Config\Database;

class User extends Database
{
    protected $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    public function userExists($username, $password)
    {
        try {
            $query = "SELECT * FROM users_tb WHERE username = :username AND password = :password";

            $stmt = $this->conn->prepare($query);

            $stmt->execute([':username' => $username, ':password' => $password]);

            $result = $stmt->fetchAll();

            return $result;
        } catch (\PDOException $err) {
            echo "Error: " . $err->getMessage();
        }
    }
}
