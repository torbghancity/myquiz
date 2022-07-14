<?php

namespace App\Models;

class Quiz_online extends BaseModel
{

    function get_all_exam(){
        $sql= 
            "SELECT * FROM `exam_category` ORDER BY `id` ASC;";
        $result = mysqli_query($this->dbconn,$sql);
        $list_exam= array();
        while ($row=mysqli_fetch_array($result)){
            $list_exam[]=$row;
        }

        return $list_exam;
    }

    function get_all_question()
    {
        $sql= 
            "SELECT * FROM `exam_category` ORDER BY `id` ASC;";
        $result = mysqli_query($this->dbconn,$sql);
        $list_exam= array();
        while ($row=mysqli_fetch_array($result)){
            $list_exam[]=$row;
        }

        return $list_exam;
    }

    function get_exam_id($id_category)
    {
        $sql= 
            "SELECT * FROM `exam_category` WHERE `id_category` = '$id_category';";
        $result = mysqli_query($this->dbconn,$sql);


        return mysqli_fetch_assoc($result);
    }

    function get_question_id($id_category)
    {
        $sql= 
            "SELECT * FROM `questions` WHERE `id_category` = '$id_category' ORDER BY `question_no` ASC;";
        $result = mysqli_query($this->dbconn,$sql);

        $list_question= array();
        while ($row=mysqli_fetch_array($result)){
            $list_question[]=$row;
        }

        return $list_question;
    }

}

