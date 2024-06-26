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

  public function password_recovery(){
    $this->view('admin/change-password');
  }

  public function update_password(){
    
    $adminId = $_SESSION['aid'];
    $cpassword = md5($_POST['currentpassword']);
    $newpassword = md5($_POST['newpassword']);
    
    $adminModel = new Admin();
    $row = $adminModel->verifyPassword($adminId, $cpassword);

    if ($row) {
        $adminModel->updatePassword($adminId, $newpassword);
        $status = 1;
        echo '<script>alert("Your password has been successfully changed.");</script>';
    } else {
        $status = 0;
        echo '<script>alert("Your current password is wrong.");</script>';
    }
    $this->view('admin/index');
}

  public function profile(){
    $adminModel = new Admin();
    $data = $adminModel->getById($_SESSION['aid']);
    $this->view('admin/profile', ['data' => $data]);
    
  }
  
  
  public function update_profile(){
    $adminId = $_SESSION['aid'];
    $aname = $_POST['adminname'];
    $mobno = $_POST['mobilenumber'];
    $email = $_POST['email'];
    
    $adminModel = new Admin();
    $result = $adminModel->updateProfile($adminId, $aname, $mobno, $email);
    
    
    if ($result) {
      echo '<script>alert("Profile has been updated")</script>';
    } else {
      echo '<script>alert("Something Went Wrong. Please try again.")</script>';
    }
    $data = $adminModel->getById($_SESSION['aid']);
    $this->view('admin/profile', ['data' => $data]);
    
  }

}






