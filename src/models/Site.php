<?php
namespace MyApp\Models;

use MyApp\Core\Database;

class Site extends Database
{
  public function __construct(){
    parent::__construct();
    $this->setTableName('tblsite');
    $this->setColumn([
        'id',
        'siteTitle',
        'siteLogo'
    ]);
  }

  public function getAll(){
    return $this->get()->fetchAll();
  }

  public function getById($id){
    return $this->get(['id' => $id])->fetch();
  }
    
  public function insert($data){
    $table = [
        'siteTitle' => $data['siteTitle'],
        'siteLogo' => $data['siteLogo']
    ];
    return $this->insertData($table);
  }
  
  public function update($data){
    $table = [
        'siteTitle' => $data['siteTitle'],
        'siteLogo' => $data['siteLogo']
    ];
    $key = [
        'id' => $data['id']
    ];
    return $this->updateData($table, $key);
  }

}
