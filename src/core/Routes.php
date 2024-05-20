<?php
namespace MyApp\Core;

class Routes
{
  public function run()
  {
    $router = new App();
    $router->setDefaultController('DefaultApp');
    $router->setDefaultMethod('index');
    $router->setNamespace('MyApp\Controllers');

    $router->get('/barang', ['BarangController', 'index']);
    $router->get('/barang/index', ['BarangController', 'index']);
    $router->get('/barang/insert', ['BarangController', 'insert']);
    $router->get('/barang/edit/(:id)', ['BarangController', 'edit']);
    $router->post('/barang/insert_data', ['BarangController', 'insert_barang']);
    $router->post('/barang/edit_data', ['BarangController', 'edit_barang']);
    
    $router->get('/kategori', ['KategoriController', 'index']);
    
    $router->get('/reporting', ['HomeController', 'report']);
    $router->post('/report', ['HomeController', 'saveReport']);
    $router->get('/search', ['HomeController', 'search']);
    $router->post('/search-report-result', ['HomeController', 'reportResult']);
    $router->get('/details/(:id)', ['HomeController', 'viewReportDetails']);
    // $router->get('/admin', ['LoginController', 'index']);
    $router->get('/login', ['AdminController', 'index']);
    $router->get('/admin/login', ['AdminController', 'index']);
    $router->get('/logout', ['AdminController', 'logout']);
    $router->post('/admin/login', ['AdminController', 'login']);
    $router->get('/admin/dashboard', ['AdminController', 'show']);

    $router->get('/admin/add-team', ['AdminController', 'show_add_team']);
    $router->get('/admin/manage-teams', ['AdminController', 'show_manage_team']);
    $router->post('/admin/insert-team', ['TeamController', 'insert_team']);
    $router->get('/admin/edit-team/(:id)', ['TeamController', 'edit_team']);
    $router->post('/admin/edit-team', ['TeamController', 'update_team']);

    $router->get('/admin/delete-team/(:id)', ['TeamController', 'delete_team']);

    $router->get('/admin/manage-site', ['AdminController', 'show_manage_site']);
    $router->run();
  }
}