<?php
require_once __DIR__ . '/../Models/Tanggapan.php';
require_once __DIR__ . '/../Models/Pengaduan.php';

class TanggapanController {
    private $model;
    private $pengaduan;

    public function __construct() {
        $this->model = new Tanggapan();
        $this->pengaduan = new Pengaduan();
    }

    public function index() {
        $tanggapan = $this->model->all();
        require_once __DIR__ . '/../Views/tanggapan/index.php';
    }

    public function create() {
        $id_pengaduan = $_GET['id_pengaduan'];
        $pengaduan = $this->pengaduan->find($id_pengaduan);
        require_once __DIR__ . '/../Views/tanggapan/create.php';
    }

    public function store() {
        $this->model->create($_POST);
        header('Location: /tanggapan');
    }
}
