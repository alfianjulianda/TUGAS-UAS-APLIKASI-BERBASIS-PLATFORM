<?php

class Auth
{
    public static function check()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }
    }

    public static function user()
    {
        return $_SESSION['user'] ?? null;
    }

    public static function isAdmin()
    {
        return isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin';
    }
}
