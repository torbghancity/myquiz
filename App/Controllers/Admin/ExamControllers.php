<?php

namespace App\Controllers\Admin;

use App\Layout\Layout;
use App\Models\Exam;

class ExamControllers
{

    public function ShowExam()
    {
        $exam = new Exam;
        $exam_list = $exam->get_all_exam();

        Layout::render('Admin.Exam.home',["exam_list"=>$exam_list,"error"=>""]);
        
    }

    public function AddExam()
    {
        
        
        $exam = new Exam;
        $exam->category = htmlspecialchars($_POST["add_exam"]);
        $exam->time = htmlspecialchars($_POST["add_time"]);
        $result=$exam->add_exam();

        if ($result){
            redirect("exam_admin");
        }else{
            Layout::render('Admin.Exam.home',["exam_list"=>$exam->get_all_exam(),"error"=>"تمام موارد را با دقت کامل کنید"]);
        }
    }

    public function DelExam()
    {        
        $id=($_POST["id"]);
        $exam = new Exam;
        $exam->del_exam($id);

        redirect("exam_admin");
    }

    public function ShowEditExam()
    {       
        $id=($_POST["id"]);
        $exam = new Exam;
        $result = $exam->find_exam($id);
        
        Layout::render('Admin.Exam.add_edit_exam',["id"=>$id,"category"=>$result["category"],"exam_time"=>$result["exam_time"],"error"=>""]);
    }

    public function DoEditExam()
    {       
        $id = $_POST["id"];
        $exam = new Exam;
        $exam->category = htmlspecialchars($_POST["edit_exam"]);
        $exam->time = htmlspecialchars($_POST["edit_time"]);
        $result=$exam->edit_exam($id);
        if ($result){
            redirect("exam_admin");
        }else{
            Layout::render('Admin.Exam.add_edit_exam',["id"=>$id,"category"=>"","exam_time"=>"","error"=>"در تکمیل موارد دقت کنید"]);
        }
    }
}