<?php

namespace App\Models;

class Question extends BaseModel
{

    public $question ,$answer ,$opt1 ,$opt2 ,$opt3 ,$opt4 ,$id_category;

    public function add_question_text()
    {
        
        if ($this->question!="" && $this->answer!="" && $this->opt1!="" &&
                $this->opt2!="" && $this->opt3!="" && $this->opt4!=""){

            $conter = 0 ;
            $sql = "SELECT * FROM `questions` WHERE `id_category`= '$this->id_category' order by `id` ASC;";
            $result = mysqli_query($this->dbCon,$sql);

            if(mysqli_num_rows($result)>0){
                while ($row = mysqli_fetch_assoc($result)){
                    $conter = $conter + 1;
                    $sql = "UPDATE `questions` SET `question_no` = '$conter' WHERE `id` = $row[id];";
                    mysqli_query($this->dbCon,$sql);
                }
            }

            $conter = $conter + 1;
            $sql = 
                "INSERT INTO `questions`(`question_no`, `question`, `opt1`,
                    `opt2`, `opt3`, `opt4`, `answer`, `id_category`) 
                VALUES ('$conter','$this->question','$this->opt1','$this->opt2',
                    '$this->opt3','$this->opt4','$this->answer','$this->id_category');";
            $result = mysqli_query($this->dbCon,$sql);

            return true;
        }else{
            return false;
        }
    }

    public function get_question_by_id($id_category)
    {
        $sql= 
            "SELECT * FROM `questions` WHERE `id_category` = '$id_category' ORDER BY `question_no` ASC;";
        $result = mysqli_query($this->dbCon,$sql);

        $list_question= array();
        while ($row=mysqli_fetch_array($result)){
            $list_question[]=$row;
        }

        return $list_question;
        
    }

}