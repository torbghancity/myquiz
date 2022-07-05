<?php

require ("../connection.php");
require ("../function.php");

$id1 = $_GET["id1"];
$id = $_GET["id"];

$sql= "DELETE FROM `questions` WHERE `id`= '$id1' ;";
$result= mysqli_query($conn,$sql);

header("location:./add_edit_question.php?id=".$id);
//redirect("add_edit_question.php");