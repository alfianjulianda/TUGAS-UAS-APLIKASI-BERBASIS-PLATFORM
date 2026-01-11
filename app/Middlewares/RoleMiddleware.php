<?php

class RoleMiddleware {

    public static function allow(array $roles) {
        if (!isset($_SESSION['user'])) {
            header('Location: /');
exit;
            exit;
        }

        if (!in_array($_SESSION['user']['role'], $roles)) {
            die('Akses ditolak');
        }
    }
}
