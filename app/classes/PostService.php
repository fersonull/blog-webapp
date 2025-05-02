<?php

namespace App\Classes;
use App\Config\Database;

class PostService 
{
    private $conn;

    public function __construct()
    {
        $db = new Database;
        $this->conn = $db->connect();
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
}