<?php

namespace MyApp\Models;

use MyApp\Core\Database;
use PDO;

class Admin extends Database
{
  
    private $conn;
    

    public function __construct()
    {
      parent::__construct();
      $this->setTableName('tbladmin');
      $this->setColumn([
        'ID',
        'AdminName',
        'AdminuserName',
        'MobileNumber',
        'Email',
        'Password',
        'AdminRegdate',
        'userRole',
        'isActive',
      ]);

      $this->conn = $this->setConnection();
    }

    public function getAll()
    {
      return $this->get()->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
      return $this->get(['ID' => $id])->fetch(PDO::FETCH_ASSOC);
    }

    public function updateProfile($adminId, $aname, $mobno, $email)
    {
        $sql = "UPDATE tbladmin SET AdminName = :aname, MobileNumber = :mobno, Email = :email WHERE ID = :adminId";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':adminId', $adminId, PDO::PARAM_INT);
        $stmt->bindParam(':aname', $aname, PDO::PARAM_STR);
        $stmt->bindParam(':mobno', $mobno, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function login($username, $password)
    {
        $query = "SELECT ID, AdminName, isActive FROM tbladmin WHERE AdminuserName = :username AND Password = :password";
        $params = [
            ':username' => $username,
            ':password' => $password
        ];
        $stmt = $this->qry($query, $params);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function verifyPassword($adminId, $currentPassword)
    {
        $sql = "SELECT ID FROM tbladmin WHERE ID = :adminId AND Password = :currentPassword";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':adminId', $adminId, PDO::PARAM_INT);
        $stmt->bindParam(':currentPassword', $currentPassword, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updatePassword($adminId, $newPassword)
    {
        $sql = "UPDATE tbladmin SET Password = :newPassword WHERE ID = :adminId";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':adminId', $adminId, PDO::PARAM_INT);
        $stmt->bindParam(':newPassword', $newPassword, PDO::PARAM_STR);
        return $stmt->execute();
    }
    
}
