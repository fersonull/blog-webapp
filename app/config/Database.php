<?php
namespace App\Config;

class Database
{

    private $host = 'localhost';
    private $dbname = 'blog_db';
    private $username = 'root';     
    private $password = '';
    private $conn;

    protected function connect()
    {
        $this->conn = null;

        $dsn = "mysql:host=$this->host;dbname=$this->dbname";

        try {
            $this->conn = new \PDO($dsn, $this->username, $this->password, [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
            ]);

            return $this->conn;
        } catch (\PDOException $err) {
            echo "Error connecting: " . $err->getMessage();
        }
    }
 }