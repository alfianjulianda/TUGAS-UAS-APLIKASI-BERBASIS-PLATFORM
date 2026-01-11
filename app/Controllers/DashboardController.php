<?php

require_once __DIR__ . '/../Models/Pengaduan.php';

class DashboardController
{
    private $model;

    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }

        $this->model = new Pengaduan();
    }

    public function index()
    {
        $userId = $_SESSION['user']['id'];
        $role   = $_SESSION['user']['role'];

        if ($role === 'masyarakat') {
            $pengaduan = $this->model->getByUser($userId);
        } else {
            $pengaduan = $this->model->all();
        }

        $pengaduan = is_array($pengaduan) ? $pengaduan : [];

        $total = count($pengaduan);
        $baru = $proses = $selesai = 0;

        foreach ($pengaduan as $p) {
            if ($p['status'] === 'baru') $baru++;
            elseif ($p['status'] === 'diproses') $proses++;
            elseif ($p['status'] === 'selesai') $selesai++;
        }

        require __DIR__ . '/../Views/dashboard/index.php';
    }
}