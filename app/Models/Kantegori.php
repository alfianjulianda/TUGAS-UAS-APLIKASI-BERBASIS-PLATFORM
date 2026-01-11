<?php

require_once __DIR__ . '/../Core/Database.php';

class Kategori {

    protected $conn;

    public function __construct() {
        $this->conn = Database::connect();
    }

    public function all() {
        return $this->conn->query("SELECT * FROM kategori")->fetchAll();
    }

    public function store($nama) {
        $stmt = $this->conn->prepare("INSERT INTO kategori (nama) VALUES (?)");
        return $stmt->execute([$nama]);
    }
}