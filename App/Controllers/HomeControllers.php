<?php

namespace App\Controllers;

use App\Layout\Layout;
use App\Models\Quiz;

class HomeControllers
{

    public function Home()
    {
        if(!isset($_COOKIE["id_token"])){
            redirect("login");
        }else{
            redirect("exam");
        }

        
    }

    public function ShowExam()
    {
        $exam = new Quiz;

        $exam_list = $exam->get_all_exam();

        if (count($exam_list)>0){
            $error="یکی از آزمونها را انتخاب کنید";
        }else{
            $error = "هیچ آزمونی پیدا نشد";
        }

        Layout::render('Quiz.home',["exam_list"=>$exam_list,"error"=>$error]);
    }

    public function ShowQuestion()
    {
        $exam = new Quiz;

        $exam_list = $exam->get_all_exam();

        if (count($exam_list)>0){
            $error="یکی از آزمونها را انتخاب کنید";
        }else{
            $error = "هیچ آزمونی پیدا نشد";
        }

        Layout::render('Quiz.home',["exam_list"=>$exam_list,"error"=>$error]);
    }

}