<?php
require_once __DIR__ . '/../Core/Database.php';

class Tanggapan {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function all() {
        $stmt = $this->db->pdo->query("SELECT * FROM tanggapan");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->db->pdo->prepare("INSERT INTO tanggapan (id_pengaduan, tgl_tanggapan, tanggapan) VALUES (?, ?, ?)");
        return $stmt->execute([$data['id_pengaduan'], date('Y-m-d'), $data['tanggapan']]);
    }
}
