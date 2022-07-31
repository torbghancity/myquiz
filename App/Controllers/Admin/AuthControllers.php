<?php

namespace App\Controllers\Admin;

use App\Layout\Layout;
use App\Models\Admin;
use App\Models\Quiz;

class AuthControllers 
{

    public function HomeLogin()
    {
        Layout::render('Admin.Auth.login',['error'=>""]);
    }

    public function DoLogin()
    {
        
        $admin = new Admin;
        $admin->username = htmlspecialchars($_POST["username"]);
        $admin->pass = htmlspecialchars($_POST["password"]);

        $result=$admin->check_user();
        
        if ($result)
        {
            redirect("exam_admin");
        }
        else{
            Layout::render('Admin.Auth.login',['error' => 'کاربری با این مشخصات موجود نمی باشد']);
        }
    }

    public function HomeRegister()
    {
        
    }

    public function DoRegister()
    {
        
    }

    public function Logout(){
        
    }

}