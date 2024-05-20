<?php
namespace MyApp\Models;

use MyApp\Core\Database;
use PDO;

class Request extends Database
{
    public function __construct()
    {
        parent::__construct();
        $this->setTableName('tblrequests');
        $this->setColumn([
            'id',
            'requestId',
            'status',
            'remark',
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
            'requestId' => $data['requestId'],
            'status' => $data['status'],
            'remark' => $data['remark'],
            'postingDate' => $data['postingDate']
        ];
        return $this->insertData($table);
    }

    public function update($data)
    {
        $table = [
            'requestId' => $data['requestId'],
            'status' => $data['status'],
            'remark' => $data['remark'],
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
