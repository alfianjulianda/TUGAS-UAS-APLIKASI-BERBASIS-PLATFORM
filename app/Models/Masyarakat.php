<?php
require_once __DIR__ . '/../Core/Database.php';

class Masyarakat {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function login($username, $password) {
        $stmt = $this->db->pdo->prepare("SELECT * FROM masyarakat WHERE username=?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
}
