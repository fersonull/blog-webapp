<?php

namespace App\Classes;
use App\Config\Database;

class PostService extends Database
{
    protected $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    public function fetchAllPosts()
    {
        try {
            $query = "SELECT * FROM posts_tb JOIN users_tb";

            $stmt = $this->conn->prepare($query);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\PDOException $err) {
            echo "Error fetching data: " . $err->getMessage();
        }
    }

    public function getPostByID($id)
    {
        try {
            $query = "SELECT * FROM posts_tb JOIN users_tb WHERE posts_tb.post_id = :post_id";

            $stmt = $this->conn->prepare($query);

            $stmt->execute([':post_id' => $id]);

            return $stmt->fetchAll();
        } catch (\PDOException $err) {
            echo "Error fetching data: " . $err->getMessage();
        }
    }

    public function postExist($post_id)
    {
        try {
            $query = "SELECT * from posts_tb";

            $stmt = $this->conn->prepare($query);

            $stmt->execute();

            $result = $stmt->fetchAll();

            foreach ($result as $post) {
                if ($post['post_id'] === (int) $post_id) {
                    return true;
                }
            }
            return false;
        } catch (\PDOException $err) {
            echo "Something went wrong: " . $err->getMessage();
        }
    }

    public function getUserPosts($id)
    {
        try {
            $query = "SELECT * from posts_tb AS post JOIN users_tb AS users WHERE users.user_id = :user_id";

            $stmt = $this->conn->prepare($query);

            $stmt->execute([':user_id' => $id]);

            return $stmt->fetchAll();
        } catch (\PDOException $err) {
            echo "Something went wrong: " . $err->getMessage();
        }
    }
}