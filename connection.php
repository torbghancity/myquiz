<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "online_quiz";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed");
}

