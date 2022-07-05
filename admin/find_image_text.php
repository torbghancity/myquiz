<?php

require ("../connection.php");
require ("../function.php");

$id1 = $_GET["id1"];
$id = $_GET["id"];

$sql= "SELECT * FROM `questions` WHERE `id`= '$id1' ;";
$result= mysqli_query($conn,$sql);
$question_list=mysqli_fetch_assoc($result);

if(strpos($question_list['opt2'],"opt_images/")!==false){
    header("location:./edit_question_image.php?id1=".$id1."&id=".$id);
}else{
    header("location:./edit_question_text.php?id1=".$id1."&id=".$id);
}