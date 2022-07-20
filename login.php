<?php

use App\Auth\Auth;
use App\Layout\Layout;

require ("./vendor/autoload.php");

$user = new Auth;

$error="";
if(isset($_POST["login"])){
    $username = htmlspecialchars($_POST["username"]);
    $pass = htmlspecialchars($_POST["password"]);

    $error=$user->login($username,$pass);
    
    if ($error=="yes"){
      redirect("./homepage.php");
    }
}


Layout::render("login",["error"=>$error]);

