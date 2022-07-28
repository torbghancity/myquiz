<?php

namespace App\Controllers;

use App\Layout\Layout;
use App\Models\User;
use App\Validation\Valid;

class AuthController 
{

    public function ShowRegister()
    {

        $error="";
        Layout::render("register",["error"=>$error]);

    }

    public function DoRegister()
    {

        $valid=new Valid;

        
        $name=htmlspecialchars($_POST["name"]);
        $username = htmlspecialchars($_POST["username"]);
        $contact = htmlspecialchars($_POST["contact"]);
        $email = htmlspecialchars($_POST["email"]);
        $pass = htmlspecialchars($_POST["password"]);
        $re_pass = htmlspecialchars($_POST["password_confirmation"]);
        $error=$valid->register_user($name, $username, $email, $contact, $pass, $re_pass);

        if ($error == "done"){
            Layout::render("login");
        }

        Layout::render("register",["error"=>$error]);

    }

    public function ShowLogin()
    {

        Layout::render("login");

    }

    public function DoLogout()
    {

        setcookie("id_token", "");
        Layout::render("login");

    }


}