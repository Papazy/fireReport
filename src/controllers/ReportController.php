<?php
namespace MyApp\Controllers;

use MyApp\Core\BaseController;
use MyApp\Models\Request;
use MyApp\Models\Report;

class ReportController extends BaseController
{
  public function show_bwdates_report_ds(){
    $this->view('admin/bwdates-report-ds');
  }
  public function show_search_report(){
    $this->view('admin/search-report');
  }

  public function search_report(){
    $requestModel = new Report();
    $searchdata = $_POST['searchdata'];
    $sql = "SELECT * FROM tblfirereport WHERE fullName LIKE :searchdata OR mobileNumber LIKE :searchdata OR location LIKE :searchdata";
    $params = [':searchdata' => '%' . $searchdata . '%'];
    $stmt = $requestModel->qry($sql, $params);
    $data = $stmt->fetchAll();
    $this->view('admin/search-report-result', ['data' => $data]);
  }

  public function search_report_by_date(){
    $requestModel = new Report();
    $fromdate = $_POST['fromdate'];
    $todate = $_POST['todate'];
    $sql = "SELECT * FROM tblfirereport WHERE postingDate BETWEEN :fromdate AND :todate";
    $params = [':fromdate' => $fromdate, ':todate' => $todate];
    $stmt = $requestModel->qry($sql, $params);
    $data = $stmt->fetchAll();
    $this->view('admin/bwdates-report-result', ['data' => $data]);
  }
}