<?php

namespace App\Models;

class Question extends BaseModel
{

    public $question ,$answer ,$opt1 ,$opt2 ,$opt3 ,$opt4 ,$id_category;
    public $f_opt1 ,$f_opt2 ,$f_opt3 ,$f_opt4 ,$f_answer;
    public $tmp_opt1 ,$tmp_opt2 ,$tmp_opt3 ,$tmp_opt4 ,$tmp_answer;


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

    public function add_question_img()
    {       
        if ($this->question!="" && $this->f_answer!="" && $this->f_opt1!="" &&
                $this->f_opt2!="" && $this->f_opt3!="" && $this->f_opt4!=""){

            $tm=md5(time());

            $address_set1 = "./opt_images/".$tm.$this->f_opt1;
            $address_db1 = "opt_images/".$tm.$this->f_opt1;
                    
            $address_set2 = "./opt_images/".$tm.$this->f_opt2;
            $address_db2 = "opt_images/".$tm.$this->f_opt2;
                    
            $address_set3 = "./opt_images/".$tm.$this->f_opt3;
            $address_db3 = "opt_images/".$tm.$this->f_opt3;
                    
            $address_set4 = "./opt_images/".$tm.$this->f_opt4;
            $address_db4 = "opt_images/".$tm.$this->f_opt4;
                
            $address_set_answer = "./opt_images/".$tm.$this->f_answer;
            $address_db_answer = "opt_images/".$tm.$this->f_answer;

            move_uploaded_file($this->tmp_opt1,$address_set1);
            move_uploaded_file($this->tmp_opt2,$address_set2);
            move_uploaded_file($this->tmp_opt3,$address_set3);
            move_uploaded_file($this->tmp_opt4,$address_set4);
            move_uploaded_file($this->tmp_answer,$address_set_answer);
    
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
                "INSERT INTO `questions`(`question_no`, `question`, `opt1`, `opt2`, 
                    `opt3`, `opt4`, `answer`, `id_category`) 
                VALUES ('$conter','$this->question','$address_db1','$address_db2',
                    '$address_db3','$address_db4','$address_db_answer','$this->id_category');";
            $result = mysqli_query($this->dbCon,$sql);
            return true;
        }else{
            return false;
        }
    }

    public function get_question_by_category($id_category)
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

    public function del_question($id)
    {
        $sql= "DELETE FROM `questions` WHERE `id`= $id;";
        mysqli_query($this->dbCon,$sql);
    }

    public function get_question_by_id($id)
    {
        $sql = "SELECT * FROM `questions` WHERE `id`= '$id';";
        $result = mysqli_query($this->dbCon,$sql);
        return mysqli_fetch_array($result);
    }

    public function sort_question()
    {
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
    }

    public function edit_img_question($id)
    {
        $tm=md5(time());

        $address_set1 = "./opt_images/".$tm.$this->f_opt1;
        $address_db1 = "opt_images/".$tm.$this->f_opt1;
        
        $address_set2 = "./opt_images/".$tm.$this->f_opt2;
        $address_db2 = "opt_images/".$tm.$this->f_opt2;
        
        $address_set3 = "./opt_images/".$tm.$this->f_opt3;
        $address_db3 = "opt_images/".$tm.$this->f_opt3;
        
        $address_set4 = "./opt_images/".$tm.$this->f_opt4;
        $address_db4 = "opt_images/".$tm.$this->f_opt4;

        $address_set_answer = "./opt_images/".$tm.$this->f_answer;
        $address_db_answer = "opt_images/".$tm.$this->f_answer;
        
        if ($this->question!="" && $this->f_answer!="" && $this->f_opt1!="" && $this->f_opt2!="" && $this->f_opt3!="" && $this->f_opt4!=""){

            move_uploaded_file($this->tmp_opt1,$address_set1);
            move_uploaded_file($this->tmp_opt2,$address_set2);
            move_uploaded_file($this->tmp_opt3,$address_set3);
            move_uploaded_file($this->tmp_opt4,$address_set4);
            move_uploaded_file($this->tmp_answer,$address_set_answer);

            $sql = "UPDATE `questions` SET `question` = '$this->question' , `opt1` = '$address_db1', 
                `opt2` = '$address_db2', `opt3` = '$address_db3', `opt4` = '$address_db4', 
                `answer` = '$address_db_answer' WHERE `id` = $id;";
            mysqli_query($this->dbCon,$sql);
            return true;
        }else{
            return false;
        }
    }

    public function edit_txt_question($id)
    {
        
        if ($this->question!="" && $this->answer!="" && $this->opt1!="" && $this->opt2!="" && $this->opt3!="" && $this->opt4!=""){

            $sql = "UPDATE `questions` SET `question`= '$this->question' , `opt1`= '$this->opt1' , 
                `opt2`= '$this->opt2' , `opt3`= '$this->opt3' , `opt4`= '$this->opt4', 
                `answer`= '$this->answer' WHERE `id`=$id;";
            mysqli_query($this->dbCon,$sql);
            
            return true;
        }else{
            return false;
        }
    }

}