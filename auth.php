<?php

function connect(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "online_quiz";

    // Create connection
    $connection = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$connection) {
    die("Connection failed");
    }else{
        return $connection;
    }
}

function login($username,$pass){

    if ($username!= "" || $pass != ""){
        $connection=connect();

        $sql = "SELECT * FROM `user` WHERE `username` = '$username' AND password = '$pass';";
        $result=mysqli_query($connection,$sql);
        
        if(mysqli_num_rows($result)>0){
            $id_user = mysqli_fetch_assoc ($result);
            $user=$id_user["name"];
            $token = random_int(10000000000, 99999999999999);
            setcookie("id_token", $token);

            $sql= "UPDATE `user` SET `id_token`='$token' WHERE `username` = '$username'; ";
            mysqli_query($connection,$sql);

            header("location:./choice_category.php");

        }else{
            return "نام کاربری یا رمز ورود اشتباه است";
        }
    }else{
        return "تمام موارد را با دقت کامل کنید";
    }

}

function find_user($id_token){

    $connection=connect();

    $sql = "SELECT * FROM `user` WHERE `id_token` = '$id_token';";
    $result=mysqli_query($connection,$sql);
    
    if(mysqli_num_rows($result)>0){

        $user = mysqli_fetch_assoc ($result);
        return $user["name"];

    }
}

function logout(){
    setcookie("id_token", "");
    header("location:./login.php");
}