<?php

require ("./vendor/autoload.php");

use App\Auth\Auth;
use App\Layout\Layout;


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

Layout::pageheader("ورود");

Layout::render("login",["error"=>$error]);

?>




<?php
Layout::pagefooter();
?>