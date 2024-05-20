<?php
namespace MyApp\Controllers;

use MyApp\Core\BaseController;
use MyApp\Models\Request;
use MyApp\Models\Report;

class RequestController extends BaseController
{

  public function show_new_requests()
  {
    $requestModel = new Request();
    $sql = "SELECT * FROM tblfirereport WHERE status is NULL";
    $stmt = $requestModel->qry($sql);
    $data = $stmt->fetchAll();
    $this->view('admin/new-requests', ['data' => $data]);
  }

  public function show_all_requests()
  {
    $requestModel = new Request();
    $sql = "SELECT * FROM tblfirereport";
    $stmt = $requestModel->qry($sql);
    $data = $stmt->fetchAll();
    $this->view('admin/all-requests', ['data' => $data]);
  }

  public function show_request_details($id)
  {
    $requestModel = new Request();
    $sql = "SELECT * FROM tblfirereport WHERE id = :id";
    $params = [':id' => $id];
    $stmt = $requestModel->qry($sql, $params);
    $data = $stmt->fetch();
    $this->view('admin/request-details', ['data' => $data]);
  }

  public function assign_request()
  {
    $reportModel = new Report();
    $id = $_POST['requestId'];
    $old_data = $reportModel->getById($id);
    $data = [
            'fullName' => $old_data['fullName'],
            'mobileNumber' => $old_data['mobileNumber'],
            'location' => $old_data['location'],
            'message' => $old_data['message'],
            'assignTo' => $_POST['assignto'],
            'status' => "Assigned",
            'postingDate' => date('Y-m-d H:i:s', strtotime('+5 hours')),
            'assignTime' => date('Y-m-d H:i:s', strtotime('+5 hours')),
            'assignTme' => date('Y-m-d H:i:s', strtotime('+5 hours'))
  ];
    $reportModel->update($id, $data);
    
    $requestModel = new Request();
    $sql = "SELECT * FROM tblfirereport WHERE status is NULL";
    $stmt = $requestModel->qry($sql);
    $data = $stmt->fetchAll();
    $this->view('admin/new-requests', ['data' => $data]);

  }

  public function show_assigned_requests()
  {
    $requestModel = new Request();
    $sql = "SELECT * FROM tblfirereport WHERE status = 'Assigned'";
    $stmt = $requestModel->qry($sql);
    $data = $stmt->fetchAll();
    $this->view('admin/assigned-requests', ['data' => $data]);
  }

  public function update_action()
    {
        if (isset($_POST['takeaction'])) {
            $requestId = $_POST['requestId'];
            $status = $_POST['status'];
            $remark = $_POST['remark'];

            $requestModel = new Request();
            $query = "INSERT INTO tblfiretequesthistory (requestId, status, remark) VALUES (:requestId, :status, :remark)";
            $params = [
                ':requestId' => $requestId,
                ':status' => $status,
                ':remark' => $remark
            ];
            $requestModel->qry($query, $params);

            $query = "UPDATE tblfirereport SET status = :status WHERE id = :requestId";
            $params = [
                ':status' => $status,
                ':requestId' => $requestId
            ];
            $requestModel->qry($query, $params);

            $sql = "SELECT * FROM tblfirereport WHERE status = 'Assigned'";
            $stmt = $requestModel->qry($sql);
            $data = $stmt->fetchAll();
            $this->view('admin/assigned-requests', ['data' => $data]);
        }
    }

    public function show_team_ontheway_requests(){
        $requestModel = new Request();
        $sql = "SELECT * FROM tblfirereport WHERE status = 'Team On the Way'";
        $stmt = $requestModel->qry($sql);
        $data = $stmt->fetchAll();
        $this->view('admin/team-ontheway-requests', ['data' => $data]);
    }

    public function show_workin_progress_requests(){
        $requestModel = new Request();
        $sql = "SELECT * FROM tblfirereport WHERE status = 'Work in Progress'";
        $stmt = $requestModel->qry($sql);
        $data = $stmt->fetchAll();
        $this->view('admin/workin-progress-requests', ['data' => $data]);
    }

    public function show_completed_requests(){
        $requestModel = new Request();
        $sql = "SELECT * FROM tblfirereport WHERE status = 'Completed'";
        $stmt = $requestModel->qry($sql);
        $data = $stmt->fetchAll();
        $this->view('admin/completed-requests', ['data' => $data]);
    }
}