<?php

namespace App\Models;

class User extends BaseModel
{
    public $name, $username, $pass, $email, $contact;

    public function creat()
    {

        $sql = 
            "INSERT INTO `user`(`name`, `username`, `email`, `contact`, `password`) 
            VALUES ('$this->name','$this->username','$this->email','$this->contact','$this->pass');";
        $result = mysqli_query($this->dbconn,$sql);

        return $result;

    }
    
    public function findby_username($username)
    {
        
        $sql = 
            "SELECT * FROM `user` WHERE `username` = '$username';";
        $result = mysqli_query($this->dbconn,$sql);
        if(mysqli_num_rows($result)>0){
            return false;
        }else{
            return true;
        }

    }

    public function check_user($username,$pass)
    {
        
        $sql = 
            "SELECT * FROM `user` WHERE `username` = '$username' AND `password` = '$pass';";
        $result = mysqli_query($this->dbconn,$sql);
        if(mysqli_num_rows($result)>0){
            $user=mysqli_fetch_assoc($result);
            return $user;
        }else{
            return null;
        }

    }

    public function set_cookie($user)
    {
                  
        $token = random_int(10000000000, 99999999999999);

        setcookie("id_token", $token);

        $sql= "UPDATE `user` SET `id_token`='$token' WHERE `username` = '$user'; ";
        mysqli_query($this->dbconn,$sql);
    
    }

    public function find_user($id_token)
    {

        $sql = "SELECT * FROM `user` WHERE `id_token` = '$id_token';";
        $result=mysqli_query($this->dbconn,$sql);
        
        if(mysqli_num_rows($result)>0){

            $user = mysqli_fetch_assoc ($result);
            return $user["name"];

        }
    }

}