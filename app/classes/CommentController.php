<?php

namespace App\Classes;
use App\Config\Database;

class CommentController extends Database
{
    private $conn;

    public function __construct() 
    {
        $this->conn = $this->connect();
    }

    public function getCommentsByPost($pid)
    {
        try {
            $query = "SELECT c.comment_id, c.content, user.username, user.user_id, c.commented_at, DATE_FORMAT(c.commented_at, '%b %d, %Y | %h:%i %p') as date FROM comments_tb AS c JOIN users_tb AS user ON c.user_id = user.user_id JOIN posts_tb AS posts ON c.post_id = posts.post_id WHERE posts.post_id = :pid ORDER BY c.commented_at DESC";

            $stmt = $this->conn->prepare($query);

            $stmt->execute([':pid' => $pid]);

            return $stmt->fetchAll();
        } catch (\PDOException $err) {
            echo "error: " . $err->getMessage();
            return false;
        }
    }

    public function addComment($post_id, $user_id, $content) 
    {
        if (empty($content)) {
            return false;
        }

        try {
            $query = "INSERT INTO comments_tb (user_id, post_id, content) VALUES (:uid, :pid, :content)";

            $stmt = $this->conn->prepare($query);

            return $stmt->execute([
                ':pid' => $post_id,
                ':uid' => $user_id,
                ':content' => $content
            ]);
        } catch (\PDOException $err) {
            echo "error: " . $err->getMessage();
            return false;
        }
    }

}