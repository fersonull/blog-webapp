<?php

namespace App\Classes;
use App\Config\Database;

class CommentService extends Database
{
    private $conn;

    public function __construct() 
    {
        $this->conn = $this->connect();
    }

    public function getCommentsByPost($pid)
    {
        try {
            $query = "SELECT c.comment_id, c.content, user.username, user.user_id, c.commented_at FROM comments_tb AS c JOIN users_tb AS user ON c.user_id = user.user_id JOIN posts_tb AS posts ON c.post_id = posts.post_id WHERE posts.post_id = :pid";

            $stmt = $this->conn->prepare($query);

            $stmt->execute([':pid' => $pid]);

            return $stmt->fetchAll();
        } catch (\PDOException $err) {
            echo "error: " . $err->getMessage();
        }
    }

}