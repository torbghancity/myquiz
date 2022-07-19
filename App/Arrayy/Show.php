<?php

namespace App\Arrayy;

use App\Models\Quiz_online;

class Show
{
    public $question_no ,$question ,$opt1 ,$opt2 ,$opt3 ,$opt4 ;

    public function show_question($id_category,$qu_no)
    {

        $question_list = new Quiz_online;

        $question_list = $question_list->get_question_id($id_category);

        $question[] = [array_column($question_list, 'question_no'),array_column($question_list, 'question')];
            
        

        return array_walk($question_list[$qu_no],"$this->myfunction()");

    }

    public function myfunction($value,$key)
    {
        var_dump($value);
        exit;
        switch ($key){
            case "question_no":
                $this->question_no=$value;
                break;
            case "question":
                $this->question=$value;
                break;
            case "opt1":
                $this->opt1=$value;
                break;
            case "opt2":
                $this->opt2=$value;
                break;
            case "opt3":
                $this->opt3=$value;
                break;
            case "opt4":
                $this->opt4=$value;
                break;
        }
        
        
        //echo "The key $key has the value $value<br>";
    }

    

}