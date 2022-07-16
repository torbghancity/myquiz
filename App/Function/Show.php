<?php

namespace App\Function;

use App\Models\Quiz_online;

class Show
{
    function show_question($id_category,$question_no)
{

    $question_list = new Quiz_online;

    $question_list = $question_list->get_question_id($id_category);

    $question = array_column($question_list, 'question');
        
    return $question[$question_no];

}
}