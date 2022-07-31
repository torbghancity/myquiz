<?php

namespace App\Models;

class Admin extends BaseModel
{

    public $username ,$pass;

    public function check_user()
    {

        $sql =
            "SELECT * FROM `admin_login` where `username`='$this->username' and `password`='$this->pass' limit 0,1;";
        $result = mysqli_query($this->dbCon, $sql);
        return mysqli_fetch_assoc($result);

    }

}