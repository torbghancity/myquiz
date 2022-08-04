<?php

namespace App\Models;

class Exam extends BaseModel
{
    public $category,$time;

    public function get_all_exam(){
        $sql= 
            "SELECT * FROM `exam_category` ORDER BY `id` ASC;";
        $result = mysqli_query($this->dbCon,$sql);
        $list_exam= array();
        while ($row=mysqli_fetch_array($result)){
            $list_exam[]=$row;
        }

        return $list_exam;
    }

    public function add_exam()
    {
        if ($this->category!="" && $this->time!=""){

            $Counter= random_int(0, 4000000000);
            $sql = 
                "INSERT INTO `exam_category`(`category`, `exam_time`,`id_category`) VALUES ('$this->category','$this->time','$Counter');";
            mysqli_query($this->dbCon,$sql);  
            return true;
        }else{
            return false;
        }
    }

    public function del_exam($id_exam)
    {
        $sql= "DELETE FROM `exam_category` WHERE `id_category`= $id_exam";
        mysqli_query($this->dbCon,$sql);
    }

    public function find_exam($id_exam)
    {
        $sql = "SELECT * FROM `exam_category` WHERE `id_category`= $id_exam;";
        $result = mysqli_query($this->dbCon,$sql);
        return mysqli_fetch_assoc($result);
    }

    public function edit_exam($id)
    {
        if ($this->category!="" && $this->time!=""){
            $sql = 
                "UPDATE `exam_category` SET `category`='$this->category',`exam_time`='$this->time' Where `id_category` = $id;";
            mysqli_query($this->dbCon,$sql);
            return true;
        }else{
            return false;
        }
    }

}