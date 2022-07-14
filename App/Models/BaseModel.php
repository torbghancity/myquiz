<?php

namespace App\Models;

use App\Db\DbConnection;

class BaseModel{
    protected $dbconn;
    public function __construct()
    {
        $dbconnection = new DbConnection;
        $this->dbconn = $dbconnection->connect(); 
        
        
    }
}
