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

    public function addUser($firstname, $lastname, $username, $password) 
    {
        try {
            $query = "INSERT INTO users_tb (firstname, lastname, username, password) VALUES (:fname, :lname, :username, :password)";

            $stmt = $this->conn->prepare($query);

            return $stmt->execute([
                ':fname' => ucfirst($firstname),
                ':lname' => ucfirst($lastname),
                ':username' => $username,
                ':password' => password_hash($password, PASSWORD_DEFAULT)
            ]);

        } catch (\PDOException $err) {
            echo "Error: " . $err->getMessage();
        }
    }

    public function checkUsername($username) 
    {
        try {
            $query = "SELECT * FROM users_tb WHERE username = :username";

            $stmt = $this->conn->prepare($query);

            $stmt->execute([':username' => $username]);

            $result = $stmt->fetchAll();

            if (count($result) > 0) {
                return true;
            }

            return false;
            
        } catch (\PDOException $err) {
            echo "Error: " . $err->getMessage();
        }
    }

    public function userExists($username, $password)
    {
        try {
            $query = "SELECT * FROM users_tb WHERE username = :username";

            $stmt = $this->conn->prepare($query);

            $stmt->execute([':username' => $username]);

            $result = $stmt->fetchAll();

            if($result && password_verify($password, $result[0]['password'])) {
                return $result;
            }

            return false;

        } catch (\PDOException $err) {
            error_log("Error: " . $err->getMessage());
            return;
        }
    }

    public function getUserByID($user) 
    {
        try {
            $query = "SELECT * FROM users_tb WHERE user_id = :user";

            $stmt = $this->conn->prepare($query);

            $stmt->execute([':user' => $user]);

            return $stmt->fetchAll();

        } catch (\PDOException $err) {
            error_log("Error: " . $err->getMessage());
            return;
        }
    }

    public function update($user_id, $FILE)
    {
        try {

            $img = $FILE['image']['tmp_name'];
            $imgName = $FILE['image']['name'];

            $imgPath = "profile/" . basename($imgName);

            if (!move_uploaded_file($img, $imgPath)) {
                return false;
            }

            $query = "UPDATE users_tb SET user_profile = :img WHERE user_id = :user_id";

            $stmt = $this->conn->prepare($query);

            return $stmt->execute([
                ':user_id' => $user_id,
                ':img' => $imgPath
            ]);

        } catch (\PDOException $err) {
            echo $err->getMessage();
            return false;
        }
    }

}
