<?php

require ("../connection.php");
require ("../function.php");

$id = $_GET["id1"];
$id_category = $_GET["id"];

$sql= "DELETE FROM `questions` WHERE `id`= '$id' ;";
$result= mysqli_query($conn,$sql);

header("location:./add_edit_question.php?id=".$id_category);
//redirect("add_edit_question.php");