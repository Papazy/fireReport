<?php
namespace MyApp\Controllers;

use MyApp\Core\BaseController;
use MyApp\Models\Report;
use PDO;

class HomeController extends BaseController
{

  public function report()
  {

    $this->view('home/reporting');

  }
  public function search()
  {
  
    $this->view('home/search');

  }

  public function saveReport()
  {
    $fullname = $_POST['fullname'];
    $mobilenumber = $_POST['mobilenumber'];
    $location = $_POST['location'];
    $message = $_POST['message'];
    
    $data = [
      'fullname' => $fullname,
      'mobilenumber' => $mobilenumber,
      'location' => $location,
      'message' => $message,
    ];

    $reportModel = new Report();
    $query = "INSERT INTO tblfirereport (fullName, mobileNumber, location, message) VALUES (:fullName, :mobileNumber, :location, :message)";
    $params = [
        ':fullName' => $data['fullname'],
        ':mobileNumber' => $data['mobilenumber'],
        ':location' => $data['location'],
        ':message' => $data['message']
    ];
    $stmt = $reportModel->qry($query, $params);
    if(!$stmt) {
      echo "<script>alert('Failed to save report.');</script>";
      $this->view('home/reporting', $data);
    }else{
      echo "<script>alert('Report has been saved.');</script>";
      $this->view('home/reporting', $data);
    
    }
  }

  public function reportResult()
  {
    $searchdata = $_POST['searchdata'];
    $reportModel = new Report();
    $query = "SELECT * FROM tblfirereport WHERE fullName LIKE '%$searchdata%' OR mobileNumber LIKE '%$searchdata%' OR location LIKE '%$searchdata%'";
    $stmt = $reportModel->qry($query);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $this->view('home/searchResult', ['searchdata' => $searchdata, 'data' => $data]);
}

public function viewReportDetails($id)
{
  $reportModel = new Report();
  $query = "SELECT * FROM tblfirereport WHERE id = :id";
  $params = [':id' => $id];
  $stmt = $reportModel->qry($query, $params);
  $data = $stmt->fetch(PDO::FETCH_ASSOC);
  $this->view('home/details', $data);
}

}