<?php

namespace App\Auth;

use App\Models\User;

class Auth
{

    public function login($username,$pass){

        if ($username!= "" || $pass != ""){

            $user=new User;

            $result=$user->check_user($username,$pass);

            if($result!=null){
                $user->set_cookie($username);
                return "yes";

            }else{
                return "نام کاربری یا رمز ورود اشتباه است";
            }
        }else{
            return "تمام موارد را با دقت کامل کنید";
        }

    }

    public function find_user($id_token){

        $sql = "SELECT * FROM `user` WHERE `id_token` = '$id_token';";
        $result=mysqli_query($this->dbconn,$sql);
        
        if(mysqli_num_rows($result)>0){

            $user = mysqli_fetch_assoc ($result);
            return $user["name"];

        }
    }

    public function logout(){
        setcookie("id_token", "");
        header("location:./login.php");
    }


}

