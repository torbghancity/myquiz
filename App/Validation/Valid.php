<?php

namespace App\Validation;

use App\Models\User;

class Valid
{

    private $name="", $username="", $pass="", $email="", $contact="", $re_pass="";

    public function register_user($name, $username, $email, $contact, $pass, $re_pass)
    {
        $this->name=$name;
        $this->username=$username;
        $this->email=$email;
        $this->contact=$contact;
        $this->pass=$pass;
        $this->re_pass=$re_pass;

        return $this->check_empty();
        
        

    }

    public function check_empty()
    {
        
        if($this->name==""|| $this->username==""|| $this->email==""|| $this->contact==""|| $this->pass==""){
            return "همه موارد رو به دقت پر کنید";
        }else{
            return $this->check_pass();
        }

    }

    public function check_pass()
    {

        if($this->pass != $this->re_pass){
            return "رمز عبور و تکرارش با هم یکسان نیست";
        }else{
            return $this->check_user();
        }

    }

    public function check_user()
    {
        $user = new  User;

        $check=$user->findby_username($this->username);

        if($check){
            
            $user->name = $this->name;
            $user->username = $this->username;
            $user->email = $this->email;
            $user->contact = $this->contact;
            $user->pass = $this->pass;
            $user->creat();
            return "done";
        }else{
            return "نام کاربری قبلا استفاده شده است";
        }
        
    }
}