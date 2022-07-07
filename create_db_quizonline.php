<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE online_quiz";
if ($conn->query($sql) === TRUE) {

    // Create connection
    $conn->select_db("online_quiz");
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    
    // sql to create tables
    $sql = "CREATE TABLE IF NOT EXISTS admin_login (
    id INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL);

    INSERT INTO admin_login (`username`, `password`) VALUES
          ('admin','admin');

    CREATE TABLE IF NOT EXISTS exam_category (
        id INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        category VARCHAR(50) NOT NULL,
        exam_time VARCHAR(50) NOT NULL);

    CREATE TABLE IF NOT EXISTS questions (
        id INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        question_no VARCHAR(50) NOT NULL,
        question VARCHAR(200) NOT NULL,
        opt1 VARCHAR(200) NOT NULL,
        opt2 VARCHAR(200) NOT NULL,
        opt3 VARCHAR(200) NOT NULL,
        opt4 VARCHAR(200) NOT NULL,
        category VARCHAR(50) NOT NULL,
        answer VARCHAR(200) NOT NULL);

    CREATE TABLE IF NOT EXISTS registration (
        id INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(250) NOT NULL,
        username VARCHAR(250) NOT NULL,
        password VARCHAR(250) NOT NULL,
        id_token VARCHAR(100) NULL,
        email VARCHAR(100) NOT NULL);";

    if (mysqli_multi_query($conn, $sql)) {
      echo "Table registration created successfully <br>";
    } else {
        die ("Error creating table: " . mysqli_error($conn));
    }
    header("location:./");
} else {
    die ("Error creating database: " . $conn->error);
}