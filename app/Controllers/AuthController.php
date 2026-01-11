<?php

require_once __DIR__ . '/../Models/Masyarakat.php';

class AuthController
{
    public function login()
    {
        require_once __DIR__ . '/../Views/auth/login.php';
    }

    public function loginProcess()
    {
        $model = new Masyarakat();
        $user = $model->login($_POST['username'], $_POST['password']);

        if ($user) {
            $_SESSION['user'] = $user;

            header('Location: /dashboard');
            exit;
        }

        $_SESSION['error'] = 'Username atau password salah';
        header('Location: /login');
        exit;
    }

    public function logout()
    {
        session_destroy();
        header('Location: /login');
        exit;
    }
}