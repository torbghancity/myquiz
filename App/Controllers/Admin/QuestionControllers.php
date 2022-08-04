<?php

namespace App\Controllers\Admin;

use App\Layout\Layout;
use App\Models\Exam;
use App\Models\Question;

class QuestionControllers
{

    public function ShowSelectExam()
    {
        $exam = new Exam;
        $exam_list = $exam->get_all_exam();

        Layout::render('Admin.Question.select_exam',["exam_list"=>$exam_list]);
    }

    public function ShowQuestion()
    {
        $id_category = $_POST['id_category'];

        $exam=new Exam;
        $exam_list = $exam->find_exam($id_category);

        $question = new Question;
        $question_list = $question->get_question_by_id($id_category);

        Layout::render('Admin.Question.add_edit_question',["id_category"=>$exam_list["id_category"],
            "category"=>$exam_list["category"],"question_list"=>$question_list,"error_text"=>"","error_img"=>""]);
    }

    public function AddQuestionText()
    {
        $questionAdd = new Question;
        $questionAdd->question = $_POST["question_text"];
        $questionAdd->answer = $_POST["answer"];
        $questionAdd->opt1 = $_POST["opt1"];
        $questionAdd->opt2 = $_POST["opt2"];
        $questionAdd->opt3 = $_POST["opt3"];
        $questionAdd->opt4 = $_POST["opt4"];
        $questionAdd->id_category = $_POST["id_category"];

        $result = $questionAdd->add_question_text();

        if($result){
            $this->ShowQuestion();
        }else{
            $exam=new Exam;
            $exam_list = $exam->find_exam($questionAdd->id_category);
            Layout::render('Admin.Question.add_edit_question',["id_category"=>$questionAdd->id_category,
                "category"=>$exam_list["category"],"question_list"=>$questionAdd->get_question_by_id($questionAdd->id_category),
                "error_text"=>"تمام موارد را با دقت کامل کنید","error_img"=>""]);
        }

    }

}