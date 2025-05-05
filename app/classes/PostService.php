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
            $query = "SELECT * FROM posts_tb JOIN users_tb WHERE users_tb.user_id = posts_tb.user_id";

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
            $query = "SELECT * FROM posts_tb JOIN users_tb WHERE posts_tb.user_id = users_tb.user_id AND posts_tb.post_id = :post_id";

            $stmt = $this->conn->prepare($query);

            $stmt->execute([':post_id' => $id]);

            return $stmt->fetch();
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
            $query = "SELECT * from posts_tb AS post JOIN users_tb AS users WHERE users.user_id = post.user_id AND users.user_id = :user_id";

            $stmt = $this->conn->prepare($query);

            $stmt->execute([':user_id' => $id]);

            return $stmt->fetchAll();
        } catch (\PDOException $err) {
            echo "Something went wrong: " . $err->getMessage();
        }
    }

    public function uploadPost($FILE, $POST, $userID)
    {
        try {
            $img = $FILE['image']['tmp_name'];
            $imgName = $FILE['image']['name'];

            $imgPath = "uploads/" . basename($imgName);

            if (!move_uploaded_file($img, $imgPath)) {
                return;   
            }

            $query = "INSERT INTO posts_tb (image, title, subtitle, content, tags, user_id) VALUES (:image, :title, :sub, :content, :tags, :user_id)";

            $stmt = $this->conn->prepare($query);

            return $stmt->execute([
                ':image' => $imgPath,
                ':title' => $POST['title'],
                ':sub' => $POST['subtitle'],
                ':content' => $POST['content'],
                ':tags' => '#sample',
                ':user_id' => $userID
            ]);
        } catch (\PDOException $err) {
            echo "error:" . $err->getMessage();
        }
    }
}