<?php
class Database {
    public $pdo;

    public function __construct() {
        $host = 'localhost';   
        $db   = 'sipmas';     
        $user = 'root';         
        $pass = '';             
        $charset = 'utf8mb4';   

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

        try {
            $this->pdo = new PDO($dsn, $user, $pass);

            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "";
        } catch (PDOException $e) {
           
            echo "DSN: $dsn<br>";
            echo "User: $user<br>";
            echo "Password: " . ($pass ? 'ada' : 'kosong') . "<br>";
            echo "Error: " . $e->getMessage();
            exit;
        }
    }
}

// TEST
//$db = new Database();
