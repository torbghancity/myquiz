<?php

namespace App\Models;

class User extends BaseModel
{
    public $username ,$name ,$pass ,$email ,$phone;

    public function creat()
    {

        $sql = 
            "INSERT INTO `user`(`name`, `username`, `email`, `phone`, `password`) 
            VALUES ('$this->name','$this->username','$this->email','$this->phone','$this->pass');";
        $result = mysqli_query($this->dbCon,$sql);

        return $result;

    }

    public function check_user()
    {

        $sql =
            "SELECT * FROM `user` where `username`='$this->username' and `password`='$this->pass' limit 0,1;";
        $result = mysqli_query($this->dbCon, $sql);
        return mysqli_fetch_assoc($result);

    }

    public function updateToken($userId, $token)
    {
        
        $sql = "UPDATE `user` set `id_token` = '$token' where `id` = $userId";
        mysqli_query($this->dbCon, $sql);
        
    }

    public function find_username($username)
    {
        
        $sql = 
            "SELECT * FROM `user` WHERE `username` = '$username';";
        $result = mysqli_query($this->dbCon,$sql);
        if(mysqli_num_rows($result)>0){
            return false;
        }else{
            return true;
        }

    }
    
    public function find_usertoken($token)
    {
        $sql =
            "SELECT * FROM `user` where `id_token`='$token' limit 0,1;";
        $result = mysqli_query($this->dbCon, $sql);
        return mysqli_fetch_assoc($result);
    }

}