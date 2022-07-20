<?php

namespace App\Arrayy;

use App\Models\Quiz_online;

class Show
{
    public $question_no ,$question ,$opt1 ,$opt2 ,$opt3 ,$opt4 ;

    public function get_question($id_category,$qu_no)
    {
        
        $question_list = new Quiz_online;
        $question_list = $question_list->get_question_id($id_category);

        $this->question_no = $question_list[$qu_no]["question_no"];
        $this->question = $question_list[$qu_no]["question"];
        $this->opt1 = $question_list[$qu_no]["opt1"];
        $this->opt2 = $question_list[$qu_no]["opt2"];
        $this->opt3 = $question_list[$qu_no]["opt3"];
        $this->opt4= $question_list[$qu_no]["opt4"];

    }

}