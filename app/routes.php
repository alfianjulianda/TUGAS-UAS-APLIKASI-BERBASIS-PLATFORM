<?php

$router->get('/', 'AuthController@login');
$router->get('/login', 'AuthController@login');
$router->post('/login', 'AuthController@loginProcess');
$router->get('/logout', 'AuthController@logout');

$router->get('/dashboard', 'DashboardController@index');

$router->get('/pengaduan', 'PengaduanController@index');
$router->get('/pengaduan/create', 'PengaduanController@create');
$router->post('/pengaduan/store', 'PengaduanController@store');

$router->get('/pengaduan/detail/{id}', 'PengaduanController@detail');
$router->get('/pengaduan/edit/{id}', 'PengaduanController@edit');
$router->post('/pengaduan/update/{id}', 'PengaduanController@update');

$router->get('/pengaduan/delete/{id}', 'PengaduanController@delete');
