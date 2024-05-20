<?php
namespace MyApp\Models;

use MyApp\Core\Database;
use PDO;

class Team extends Database
{
    public function __construct()
    {
        parent::__construct();
        $this->setTableName('tblteams');
        $this->setColumn([
            'id',
            'teamName',
            'teamLeaderName',
            'teamLeadMobno',
            'teamMembers',
            'postingDate'
        ]);
    }

    public function getAll()
    {
        return $this->get()->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        return $this->get(['id' => $id])->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($data)
    {
        $table = [
            'teamName' => $data['teamName'],
            'teamLeaderName' => $data['teamLeaderName'],
            'teamLeadMobno' => $data['teamLeadMobno'],
            'teamMembers' => $data['teamMembers'],
            'postingDate' => $data['postingDate']
        ];
        return $this->insertData($table);
    }

    public function update($data)
    {
        $table = [
            'teamName' => $data['teamName'],
            'teamLeaderName' => $data['teamLeaderName'],
            'teamLeadMobno' => $data['teamLeadMobno'],
            'teamMembers' => $data['teamMembers'],
            'postingDate' => $data['postingDate']
        ];
        $key = [
            'id' => $data['id']
        ];
        return $this->updateData($table, $key);
    }

    public function delete($id)
    {
        return $this->deleteData(['id' => $id]);
    }
}
