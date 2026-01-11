<?php
require_once __DIR__ . '/../Core/Database.php';

class Pengaduan
{
    private $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->pdo;
    }

    public function all()
    {
        $sql = "SELECT * FROM pengaduan ORDER BY tgl_pengaduan DESC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByUser($userId)
    {
        $sql = "SELECT * FROM pengaduan WHERE user_id = ? ORDER BY tgl_pengaduan DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $sql = "INSERT INTO pengaduan
                (judul, isi_laporan, foto, file_pdf, status, user_id, tgl_pengaduan)
                VALUES (:judul, :isi, :foto, :pdf, :status, :user, :tgl)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':judul' => $data['judul'],
            ':isi'   => $data['isi_laporan'],
            ':foto'  => $data['foto'] ?? null,
            ':pdf'   => $data['file_pdf'] ?? null,
            ':status'=> $data['status'] ?? 'baru',
            ':user'  => $data['user_id'],
            ':tgl'   => date('Y-m-d')
        ]);
    }

    public function find($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM pengaduan WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $data)
    {
        $sql = "UPDATE pengaduan
                SET judul = :judul,
                    isi_laporan = :isi,
                    foto = :foto,
                    file_pdf = :pdf
                WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':judul' => $data['judul'],
            ':isi'   => $data['isi_laporan'],
            ':foto'  => $data['foto'] ?? null,
            ':pdf'   => $data['file_pdf'] ?? null,
            ':id'    => $id
        ]);
    }

    public function updateStatus($id, $data)
    {
        $sql = "UPDATE pengaduan
                SET status = :status,
                    tanggapan = :tanggapan
                WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':status'    => $data['status'],
            ':tanggapan' => $data['tanggapan'] ?? null,
            ':id'        => $id
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM pengaduan WHERE id = ?");
        return $stmt->execute([$id]);
    }
}