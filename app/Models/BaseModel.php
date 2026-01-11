<?php

require_once __DIR__ . '/../Core/Database.php';

class BaseModel {
    protected $conn;

    public function __construct() {
        $this->conn = Database::connect();
    }
}
