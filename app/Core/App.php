<?php
require_once __DIR__ . '/Router.php';

class App
{
    protected $router;

    public function __construct()
    {
        $this->router = new Router();

        $this->router->get('/login', 'AuthController@login');
        $this->router->post('/login', 'AuthController@loginProcess');
        $this->router->get('/logout', 'AuthController@logout');

        $this->router->get('/admin/dashboard', 'DashboardController@index');
        $this->router->get('/dashboard', 'DashboardController@index');

        $this->router->get('/pengaduan', 'PengaduanController@index');
        $this->router->get('/pengaduan/create', 'PengaduanController@create');
        $this->router->post('/pengaduan/store', 'PengaduanController@store');

        $this->router->run();
    }
}
