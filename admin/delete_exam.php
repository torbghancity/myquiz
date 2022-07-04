<?php

require ("../connection.php");
require ("../function.php");

$id = $_GET["id"];
$sql= "DELETE FROM `exam_category` WHERE `id`= $id";
$result= mysqli_query($conn,$sql);

redirect("home.php");