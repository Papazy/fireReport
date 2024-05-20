<?php
namespace MyApp\Controllers;

use MyApp\Core\BaseController;
use MyApp\Models\Admin;

class AdminController extends BaseController
{

  public function index()
  {
   
    $this->view('admin/index');
   
  }
  public function login() {
    session_start();
    if (isset($_POST['login'])) {
        $uname = $_POST['username'];
        $password = md5($_POST['inputpwd']);

        $adminModel = new Admin();
        $ret = $adminModel->login($uname, $password);

        if ($ret) {
            $_SESSION['aid'] = $ret['ID'];
            header('location: dashboard');
        } else {
            echo "<script>alert('Invalid Details.');</script>";
            $this->index();
        }
    } else {
        $this->index();
    }
}

public function logout() {
    session_start();
    session_destroy();
    header('location: login');
}

  public function show(){

    if (isset($_SESSION['aid'])) {
        $adminModel = new Admin();
        $data = $adminModel->getAll();
        $this->view('admin/dashboard', ['data' => $data]);
    } else {
        header('location: login');
    }
  }

  public function show_add_team(){
    $this->view('admin/fire-control-teams/add-team');
  }

  public function show_manage_team(){
    $this->view('admin/fire-control-teams/manage-teams');
  }

  public function show_manage_site(){
    $this->view('admin/manage-site');
  }


}

