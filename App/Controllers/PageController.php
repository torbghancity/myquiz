<?php

namespace App\Controllers;

use App\Layout\Layout;
use App\Models\Quiz_online;

class PageController 
{

    public function ShowHome()
    {

        $exam = new Quiz_online;

        $exam_list = $exam->get_all_exam();

        if (count($exam_list)>0){
            $error="یکی از آزمونها را انتخاب کنید";
        }else{
            $error = "هیچ آزمونی پیدا نشد";
        }

        Layout::render("homepage",["exam_list"=>$exam_list,"error"=>$error]);

    }

}