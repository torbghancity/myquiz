<?php

namespace App\Controllers\User;

use App\Auth\Auth;
use App\Layout\Layout;
use App\Models\User;
use App\Validaition\Valid;

class AuthControllers 
{

    public function HomeLogin()
    {

        Layout::render('User.Auth.login',['error'=>""]);

    }

    public function DoLogin()
    {
        $user=new User;
        $user->username = htmlspecialchars($_POST["username"]);
        $user->pass = htmlspecialchars($_POST["password"]);
        $result=$user->check_user();
        
        if ($result)
        {
            Auth::login($result["id"]);
            redirect("exam");
        }
        else{
            Layout::render('User.Auth.login',['error' => 'کاربری با این مشخصات موجود نمی باشد']);
        }
    }

    public function HomeRegister()
    {
        Layout::render('User.Auth.register',['error'=>""]);
    }

    public function DoRegister()
    {
        $valid=new Valid;

        $result=$valid->Valid_user($_POST['name'] ,$_POST["username"] ,$_POST["email"] 
                    ,$_POST["phone"] ,$_POST["password"] ,$_POST["password_confirmation"]);

        if ($result == "done"){
            redirect("login");
        }else{
            Layout::render('User.Auth.register',['error'=>"$result"]);
        }
    }

    public function Logout(){
        Auth::logout();
        redirect("login");
    }

}