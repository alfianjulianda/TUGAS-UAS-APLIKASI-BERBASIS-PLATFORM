<?php

class User
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO(
            "mysql:host=localhost;dbname=sipmas",
            "root",
            ""
        );
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function findByUsername($username)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAll()
    {
        $stmt = $this->db->query("SELECT id, username, role FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}