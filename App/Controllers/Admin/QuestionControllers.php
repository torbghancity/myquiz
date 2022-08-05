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
        $question_list = $question->get_question_by_category($id_category);

        Layout::render('Admin.Question.add_edit_question',["id_category"=>$exam_list["id_category"],
            "category"=>$exam_list["category"],"question_list"=>$question_list,"error_text"=>"","error_img"=>""]);
    }

    public function AddQuestionText()
    {
        $questionAdd = new Question;
        $questionAdd->question = htmlspecialchars($_POST["question_text"]);
        $questionAdd->answer = htmlspecialchars($_POST["answer"]);
        $questionAdd->opt1 = htmlspecialchars($_POST["opt1"]);
        $questionAdd->opt2 = htmlspecialchars($_POST["opt2"]);
        $questionAdd->opt3 = htmlspecialchars($_POST["opt3"]);
        $questionAdd->opt4 = htmlspecialchars($_POST["opt4"]);
        $questionAdd->id_category = htmlspecialchars($_POST["id_category"]);

        $result = $questionAdd->add_question_text();

        if($result){
            $this->ShowQuestion();
        }else{
            $exam=new Exam;
            $exam_list = $exam->find_exam($questionAdd->id_category);
            Layout::render('Admin.Question.add_edit_question',["id_category"=>$questionAdd->id_category,
                "category"=>$exam_list["category"],"question_list"=>$questionAdd->get_question_by_category($questionAdd->id_category),
                "error_text"=>"لطفا تمام موارد را با دقت کامل کنید","error_img"=>""]);
        }

    }

    public function AddQuestionImg()
    {
        $questionAdd = new Question;
        $questionAdd->question = htmlspecialchars($_POST["question_image"]);
        $questionAdd->f_opt1 = $_FILES["f_opt1"]["name"];
        $questionAdd->f_opt2 = $_FILES["f_opt2"]["name"];
        $questionAdd->f_opt3 = $_FILES["f_opt3"]["name"];
        $questionAdd->f_opt4 = $_FILES["f_opt4"]["name"];
        $questionAdd->f_answer = $_FILES["f_answer"]["name"];
        $questionAdd->id_category = $_POST["id_category"];

        $questionAdd->tmp_opt1 = $_FILES["f_opt1"]["tmp_name"];
        $questionAdd->tmp_opt2 = $_FILES["f_opt2"]["tmp_name"];
        $questionAdd->tmp_opt3 = $_FILES["f_opt3"]["tmp_name"];
        $questionAdd->tmp_opt4 = $_FILES["f_opt4"]["tmp_name"];
        $questionAdd->tmp_answer = $_FILES["f_answer"]["tmp_name"];

        $result = $questionAdd->add_question_img();

        if($result){
            $this->ShowQuestion();
        }else{
            $exam=new Exam;
            $exam_list = $exam->find_exam($questionAdd->id_category);
            Layout::render('Admin.Question.add_edit_question',["id_category"=>$questionAdd->id_category,
                "category"=>$exam_list["category"],"question_list"=>$questionAdd->get_question_by_category($questionAdd->id_category),
                "error_text"=>"","error_img"=>"لطفا تمام موارد را با دقت کامل کنید"]);
        }
    }

    public function DelQuestion()
    {
        $delquestion = new Question;
        $delquestion->del_question($_POST['id']);
        $delquestion->id_category=$_POST['id_category'];
        $delquestion->sort_question();

        $this->ShowQuestion();
    }

    public function FindTextOrImg()
    { 
        $editquestion = new Question;
        $question = $editquestion->get_question_by_id($_POST['id']);

        if(strpos($question['opt1'],"opt_images/")!==false){
            Layout::render('Admin.Question.edit_img_question',["id_category"=>$_POST['id_category'],
                "question"=>$question,"id"=>$_POST['id'],
                "error"=>""]);
        }else{
            Layout::render('Admin.Question.edit_txt_question',["id_category"=>$_POST['id_category'],
                "question"=>$question,"id"=>$_POST['id'],
                "error"=>""]);
        }
        

        /*$editquestion->id_category=$_POST['id_category'];
        $editquestion->sort_question();

        $this->ShowQuestion();*/
    }

    public function EditQuestionImg()
    {
        $question = new Question;
        $question->question = htmlspecialchars($_POST["question_image"]);
        $question->f_opt1 = $_FILES["f_opt1"]["name"];
        $question->f_opt2 = $_FILES["f_opt2"]["name"];
        $question->f_opt3 = $_FILES["f_opt3"]["name"];
        $question->f_opt4 = $_FILES["f_opt4"]["name"];
        $question->f_answer = $_FILES["f_answer"]["name"];
        $question->id_category = $_POST["id_category"];

        $question->tmp_opt1 = $_FILES["f_opt1"]["tmp_name"];
        $question->tmp_opt2 = $_FILES["f_opt2"]["tmp_name"];
        $question->tmp_opt3 = $_FILES["f_opt3"]["tmp_name"];
        $question->tmp_opt4 = $_FILES["f_opt4"]["tmp_name"];
        $question->tmp_answer = $_FILES["f_answer"]["tmp_name"];

        $result = $question->edit_img_question($_POST["id"]);

        

        if($result){
            $this->ShowQuestion();
        }else{
            Layout::render('Admin.Question.edit_img_question',["id_category"=>$_POST['id_category'],
                "question"=>$question->get_question_by_id($_POST['id']),"id"=>$_POST['id'],
                "error"=>"لطفا تمام موارد را با دقت کامل کنید"]);
        }
    }

    public function EditQuestionText()
    {
        $question = new Question;
        $question->question = htmlspecialchars($_POST["question"]);
        $question->answer = htmlspecialchars($_POST["answer"]);
        $question->opt1 = htmlspecialchars($_POST["opt1"]);
        $question->opt2 = htmlspecialchars($_POST["opt2"]);
        $question->opt3 = htmlspecialchars($_POST["opt3"]);
        $question->opt4 = htmlspecialchars($_POST["opt4"]);
        $question->id_category = htmlspecialchars($_POST["id_category"]);

        $result = $question->edit_txt_question($_POST["id"]);

        if($result){
            $this->ShowQuestion();
        }else{
            Layout::render('Admin.Question.edit_txt_question',["id_category"=>$_POST['id_category'],
                "question"=>$question->get_question_by_id($_POST['id']),"id"=>$_POST['id'],
                "error"=>"لطفا تمام موارد را با دقت کامل کنید"]);
        }

    }

}