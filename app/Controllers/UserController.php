<?php


require_once __DIR__ . '/../Models/User.php';

class UserController
{
    public function index()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header('Location: /login');
            exit;
        }

        $userModel = new User();
        $users = $userModel->getAll();

        require __DIR__ . '/../Views/user/index.php';
    }
}