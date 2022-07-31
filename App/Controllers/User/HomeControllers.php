<?php

namespace App\Controllers\User;


class HomeControllers
{

    public function Home()
    {
        if(!isset($_COOKIE["id_token"])){
            redirect("login");
        }else{
            redirect("exam");
        }
    }

}