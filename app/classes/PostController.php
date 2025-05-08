<?php

namespace App\Classes;
use App\Config\Database;

class PostController extends Database
{
    protected $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    public function fetchAllPosts()
    {
        try {
            $query = "SELECT * FROM posts_tb JOIN users_tb WHERE users_tb.user_id = posts_tb.user_id ORDER BY date_created DESC";

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

            if (empty($POST['title']) || empty($POST['content'])) {
                return;
            }

            $query = "INSERT INTO posts_tb (image, title, subtitle, content, user_id) VALUES (:image, :title, :sub, :content, :user_id)";

            $stmt = $this->conn->prepare($query);

            return $stmt->execute([
                ':image' => $imgPath,
                ':title' => $POST['title'],
                ':sub' => $POST['subtitle'],
                ':content' => $POST['content'],
                ':user_id' => $userID
            ]);
        } catch (\PDOException $err) {
            echo "error:" . $err->getMessage();
        }
    }

    public function deletePost($get)
    {
        try {
            $query = "DELETE FROM posts_tb WHERE post_id = :pid";

            $stmt = $this->conn->prepare($query);

            if ($stmt->execute([':pid' => $get['delid']])) {
                return true;
            }
        } catch (\PDOException $err) {
            echo $err->getMessage();
        }
    }

    public function editPost($post_id, $FILE, $NEW) {
        try {
            $existingPost = $this->getPostByID($post_id);
            
            if (!$existingPost) {
                return false; 
            }

            if (empty($NEW['title']) || empty($NEW['subtitle']) || empty($NEW['content'])) {
                return;
            }
            
            $updateFields = [];
            $params = [':post_id' => $post_id];
            
            if (!empty($FILE['image']['name'])) {
                $img = $FILE['image']['tmp_name'];
                $imgName = $FILE['image']['name'];
                $imgPath = "uploads/" . basename($imgName);
                
                if (move_uploaded_file($img, $imgPath)) {
                    $updateFields[] = "image = :img";
                    $params[':img'] = $imgPath;
                }
            }
            
            if (!empty($NEW['title'])) {
                $updateFields[] = "title = :title";
                $params[':title'] = $NEW['title'];
            }
            
            if (!empty($NEW['subtitle'])) {
                $updateFields[] = "subtitle = :sub";
                $params[':sub'] = $NEW['subtitle'];
            }
            
            if (!empty($NEW['content'])) {
                $updateFields[] = "content = :content";
                $params[':content'] = $NEW['content'];
            }
            
            if (empty($updateFields)) {
                return true; 
            }
            
            $query = "UPDATE posts_tb SET " . implode(", ", $updateFields) . " WHERE post_id = :post_id";
            
            $stmt = $this->conn->prepare($query);
            return $stmt->execute($params);
        } catch (\PDOException $err) {
            echo $err->getMessage();
            return false;
        }
    }
}