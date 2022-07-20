<?php

use App\Arrayy\Show;
use App\Layout\Layout;
use App\Models\Quiz_online;

require ("./vendor/autoload.php");


$qu_no=2;

//get exam by id_category

$id_category=$_GET["id"];

$list = new Quiz_online;

$exam_list = $list->get_exam_id($id_category);

//get question by id_category

$question_list = new Show;

$question_list->get_question($id_category,$qu_no);



Layout::render("show_question",["exam_list"=>$exam_list , "question_no"=>$question_list->question_no ,
     "question"=>$question_list->question , "opt1"=>$question_list->opt1 ,
      "opt2"=>$question_list->opt2 , "opt3"=>$question_list->opt3 , "opt4"=>$question_list->opt4]);


?>
