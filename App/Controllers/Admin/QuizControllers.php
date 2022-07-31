<?php

namespace App\Controllers\Admin;

use App\Layout\Layout;
use App\Models\Quiz;

class QuizControllers
{

    public function ShowExam()
    {
        $exam = new Quiz;
        $exam_list = $exam->get_all_exam();

        Layout::render('Admin.Quiz.home',["exam_list"=>$exam_list,"error"=>""]);
        
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

        Layout::render('User.Quiz.home',["exam_list"=>$exam_list,"error"=>$error]);
    }

}