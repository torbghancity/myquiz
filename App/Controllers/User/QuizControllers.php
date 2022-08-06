<?php

namespace App\Controllers\User;

use App\Layout\Layout;
use App\Models\Exam;
use App\Models\Question;

class QuizControllers
{

    public function ShowExam()
    {
        $exam = new Exam;

        $exam_list = $exam->get_all_exam();

        if (count($exam_list)>0){
            Layout::render('User.Quiz.home',["exam_list"=>$exam_list,"logo"=>"یکی از آزمونها را انتخاب کنید","error"=>""]);
        }else{
            Layout::render('User.Quiz.home',["exam_list"=>$exam_list,"logo"=>"هیچ آزمونی پیدا نشد","error"=>""]);
        }
    }

    public function ShowQuiz()
    {
        $exam = new Exam;
        $question = new Question;

        $exam_list = $exam->find_exam($_POST["id_category"]);
        $question = $question->get_question_by_category($_POST["id_category"]);

        if (!empty($question)){
            Layout::render('User.Quiz.show_question',["exam_list"=>$exam_list,"quiz"=>$question]);
        }else{
            Layout::render('User.Quiz.home',["exam_list"=>$exam->get_all_exam(),"logo"=>"یکی از آزمونها را انتخاب کنید","error"=>"متاسفانه سوالات این آزمون هنوز طراحی نشده"]);
        }

    }

    public function DoQuiz()
    {
        
    }

}