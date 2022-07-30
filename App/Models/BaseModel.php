<?php 

namespace App\Models;

use App\Db\DbConnection;


class BaseModel{

    protected $dbCon;

    public function __construct()
    {
        $dbConnection = new DbConnection;
        $this->dbCon = $dbConnection->connect();    
    }
}