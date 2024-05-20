<?php
namespace MyApp\Controllers;

use MyApp\Core\BaseController;
use MyApp\Models\Team;

class TeamController extends BaseController
{
  public function insert_team(){
    $teamModel = new Team();
    $data = [
      'teamName' => $_POST['teamname'],
      'teamLeaderName' => $_POST['teamleadname'],
      'teamLeadMobno' => $_POST['mobilenumber'],
      'teamMembers' => $_POST['teammember'],
      'postingDate' => date('Y-m-d H:i:s', strtotime('+5 hours'))
    ];
    $teamModel->insert($data);
    $this->redirect('/admin/manage-teams');
  }
  public function edit_team($id)
  {
    $teamModel = new Team();
    $data = $teamModel->getById($id);
    $this->view('admin/fire-control-teams/edit-team', ['data' => $data]);
  }

  public function update_team()
  {
    $teamModel = new Team();
    $data = [
      'id' => $_POST['teamid'],
      'teamName' => $_POST['teamname'],
      'teamLeaderName' => $_POST['teamleadname'],
      'teamLeadMobno' => $_POST['mobilenumber'],
      'teamMembers' => $_POST['teammember'],
      'postingDate' => date('Y-m-d H:i:s', strtotime('+5 hours'))
    ];
    $teamModel->update($data);
    $this->redirect('/admin/manage-teams');
  }

  public function delete_team($id)
  {
    $teamModel = new Team();
    $teamModel->delete($id);
    $this->redirect('/admin/manage-teams');
  }

}