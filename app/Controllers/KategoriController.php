<?php

require_once __DIR__ . '/../Models/Kategori.php';

class KategoriController {

    public function index() {
        $model = new Kategori();
        $kategori = $model->all();
        require_once __DIR__ . '/../Views/kategori/index.php';
    }


    public function create() {
        require_once __DIR__ . '/../Views/kategori/create.php';
    }

    public function store() {
        $nama = trim($_POST['nama'] ?? '');

        if ($nama === '') {
          
            die('Nama kategori wajib diisi!');
        }

        $model = new Kategori();
        $model->store($nama);

        header('Location: /kategori');
        exit;
    }
}
