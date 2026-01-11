<?php
require_once __DIR__ . '/../Models/Pengaduan.php';

class PengaduanController
{
    private $model;

    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
        if (!isset($_SESSION['user'])) header('Location: /login') && exit;
        $this->model = new Pengaduan();
    }

    public function index()
    {
        if ($_SESSION['user']['role'] === 'masyarakat') {
            $pengaduan = $this->model->getByUser($_SESSION['user']['id']);
        } else {
            $pengaduan = $this->model->all();
        }
        require __DIR__ . '/../Views/pengaduan/index.php';
    }

    public function create()
    {
        if ($_SESSION['user']['role'] === 'admin') header('Location: /pengaduan') && exit;
        require __DIR__ . '/../Views/pengaduan/create.php';
    }

    public function store()
    {
        if ($_SESSION['user']['role'] === 'admin') header('Location: /pengaduan') && exit;

        $judul = $_POST['judul'] ?? '';
        $isi   = $_POST['isi_laporan'] ?? '';
        if ($judul==='' || $isi==='') header('Location: /pengaduan/create') && exit;

        $foto = $_FILES['foto']['name'] ? time().'_'.$_FILES['foto']['name'] : null;
        $pdf  = $_FILES['file_pdf']['name'] ? time().'_'.$_FILES['file_pdf']['name'] : null;

        if ($foto) move_uploaded_file($_FILES['foto']['tmp_name'], __DIR__ . '/../../public/uploads/' . $foto);
        if ($pdf) move_uploaded_file($_FILES['file_pdf']['tmp_name'], __DIR__ . '/../../public/uploads/' . $pdf);

        $this->model->create([
            'judul'        => $judul,
            'isi_laporan'  => $isi,
            'foto'         => $foto,
            'file_pdf'     => $pdf,
            'user_id'      => $_SESSION['user']['id'],
            'status'       => 'baru'
        ]);

        header('Location: /pengaduan');
        exit;
    }

    public function edit()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) header('Location: /pengaduan') && exit;

        $pengaduan = $this->model->find($id);

        if ($_SESSION['user']['role'] === 'admin') {
            header('Location: /pengaduan') && exit;
        }

        if ($pengaduan['user_id'] != $_SESSION['user']['id']) header('Location: /pengaduan') && exit;

        require __DIR__ . '/../Views/pengaduan/edit.php';
    }

    public function update()
    {
        $id = $_POST['id'] ?? null;
        if (!$id) header('Location: /pengaduan') && exit;

        $pengaduan = $this->model->find($id);

        if ($_SESSION['user']['role'] === 'admin') {
            $this->model->updateStatus($id, [
                'status'    => $_POST['status'],
                'tanggapan' => $_POST['tanggapan'] ?? null
            ]);
            header('Location: /pengaduan') && exit;
        }

        if ($pengaduan['user_id'] != $_SESSION['user']['id']) header('Location: /pengaduan') && exit;

        $foto = $_POST['old_foto'] ?? null;
        $pdf  = $_POST['old_pdf'] ?? null;

        if (!empty($_FILES['foto']['name'])) {
            $foto = time().'_'.$_FILES['foto']['name'];
            move_uploaded_file($_FILES['foto']['tmp_name'], __DIR__.'/../../public/uploads/'.$foto);
        }

        if (!empty($_FILES['file_pdf']['name'])) {
            $pdf = time().'_'.$_FILES['file_pdf']['name'];
            move_uploaded_file($_FILES['file_pdf']['tmp_name'], __DIR__.'/../../public/uploads/'.$pdf);
        }

        $this->model->update($id, [
            'judul'        => $_POST['judul'],
            'isi_laporan'  => $_POST['isi_laporan'],
            'foto'         => $foto,
            'file_pdf'     => $pdf
        ]);

        header('Location: /pengaduan');
        exit;
    }

    public function delete()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) header('Location: /pengaduan') && exit;

        $pengaduan = $this->model->find($id);

        if ($_SESSION['user']['role'] === 'admin') header('Location: /pengaduan') && exit;
        if ($pengaduan['user_id'] != $_SESSION['user']['id']) header('Location: /pengaduan') && exit;

        $this->model->delete($id);
        header('Location: /pengaduan');
        exit;
    }

    public function detail()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) header('Location: /pengaduan') && exit;

        $pengaduan = $this->model->find($id);
        require __DIR__ . '/../Views/pengaduan/detail.php';
    }
}
