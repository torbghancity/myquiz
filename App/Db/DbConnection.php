<?php

namespace App\Db;

class DbConnection{
  
  public function connect(){

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "online_quiz";

    // Create connection
    $connection = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$connection) {
      die("Connection failed");
    }
    return $connection;

  }

}

