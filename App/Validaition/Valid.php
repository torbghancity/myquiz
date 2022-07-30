<?php

namespace App\Validaition;

use App\Models\User;

class Valid
{

    private $username ,$name ,$pass ,$re_pass ,$email ,$tel;

    public function Valid_user($name ,$username ,$email ,$tel ,$pass ,$re_pass)
    {

        $this->name=htmlspecialchars($name);
        $this->username=htmlspecialchars($username);
        $this->email=htmlspecialchars($email);
        $this->tel=htmlspecialchars($tel);
        $this->pass=htmlspecialchars($pass);
        $this->re_pass=htmlspecialchars($re_pass);

        return $this->check_empty();
        
    }

    public function check_empty()
    {
        
        if($this->name==""|| $this->username==""|| $this->email==""|| $this->tel==""|| $this->pass==""){
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
            return $this->check_username();
        }

    }

    public function check_username()
    {
        $user = new  User;

        $check=$user->find_username($this->username);

        if($check){
            
            $user->name = $this->name;
            $user->username = $this->username;
            $user->email = $this->email;
            $user->phone = $this->tel;
            $user->pass = $this->pass;
            $user->creat();
            return "done";
        }else{
            return "نام کاربری قبلا استفاده شده است";
        }
        
    }
}