<?php

use App\Layout\Layout;
use App\Validation\Valid;

require ("./vendor/autoload.php");

$valid=new Valid;

$error="";
if(isset($_POST["register"])){
    $name=htmlspecialchars($_POST["name"]);
    $username = htmlspecialchars($_POST["username"]);
    $contact = htmlspecialchars($_POST["contact"]);
    $email = htmlspecialchars($_POST["email"]);
    $pass = htmlspecialchars($_POST["password"]);
    $re_pass = htmlspecialchars($_POST["password_confirmation"]);
    $error=$valid->register_user($name, $username, $email, $contact, $pass, $re_pass);

    if ($error == "done"){
      redirect ("/login.php");
    }

}

Layout::pageheader("ایجاد کاربر");

Layout::render("register",["error"=>$error]);

Layout::pagefooter();
?>