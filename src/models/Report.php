<?php

namespace MyApp\Models;

use MyApp\Core\Database;
use PDO;

class Report extends Database
{
    public function __construct()
    {
        parent::__construct();
        $this->setTableName('tblfirereports');
        $this->setColumn([
            'id',
            'fullName',
            'mobileNumber',
            'location',
            'message',
            'assignTo',
            'status',
            'postingDate',
            'assignTime',
            'assignTme'
        ]);
    }

    public function getAll()
    {
        return $this->get()->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $query = "SELECT * FROM tblreports WHERE id = :id";
        $params = [':id' => $id];
        $stmt = $this->qry($query, $params);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $query = "INSERT INTO tblreports (fullName, mobileNumber, location, message, assignTo, status, postingDate, assignTime, assignTme) 
                  VALUES (:fullName, :mobileNumber, :location, :message, :assignTo, :status, :postingDate, :assignTime, :assignTme)";
        $params = [
            ':fullName' => $data['fullName'],
            ':mobileNumber' => $data['mobileNumber'],
            ':location' => $data['location'],
            ':message' => $data['message'],
            ':assignTo' => $data['assignTo'],
            ':status' => $data['status'],
            ':postingDate' => $data['postingDate'],
            ':assignTime' => $data['assignTime'],
            ':assignTme' => $data['assignTme']
        ];
        return $this->qry($query, $params);
    }

    public function update($id, $data)
    {
        $query = "UPDATE tblreports SET 
                  fullName = :fullName, 
                  mobileNumber = :mobileNumber, 
                  location = :location, 
                  message = :message, 
                  assignTo = :assignTo, 
                  status = :status, 
                  postingDate = :postingDate, 
                  assignTime = :assignTime, 
                  assignTme = :assignTme 
                  WHERE id = :id";
        $params = [
            ':id' => $id,
            ':fullName' => $data['fullName'],
            ':mobileNumber' => $data['mobileNumber'],
            ':location' => $data['location'],
            ':message' => $data['message'],
            ':assignTo' => $data['assignTo'],
            ':status' => $data['status'],
            ':postingDate' => $data['postingDate'],
            ':assignTime' => $data['assignTime'],
            ':assignTme' => $data['assignTme']
        ];
        return $this->qry($query, $params);
    }

    public function delete($id)
    {
        $query = "DELETE FROM tblreports WHERE id = :id";
        $params = [':id' => $id];
        return $this->qry($query, $params);
    }
}
