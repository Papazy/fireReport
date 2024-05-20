<?php

namespace MyApp\Models;

use MyApp\Core\Database;
use PDO;

class Admin extends Database
{
  

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
    }

    public function getAll()
    {
      return $this->get()->fetchAll(PDO::FETCH_ASSOC);
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
    
}
