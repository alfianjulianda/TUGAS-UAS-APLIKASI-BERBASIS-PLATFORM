<?php

require_once __DIR__ . '/../Middlewares/RoleMiddleware.php';

class LaporanController {

    public function index() {
        RoleMiddleware::allow(['admin','petugas']);

        echo "Halaman laporan";
    }
}
