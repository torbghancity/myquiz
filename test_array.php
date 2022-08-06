<?php

use App\Models\Quiz_online;

require ("./vendor/autoload.php");



$exam= new Quiz_online ;


$exam_list = $exam->get_question_id('1350633573');


/* Multidimensional array
$superheroes = array(
    "spider-man" => array(
        "name" => "Peter Parker",
        "email" => "peterparker@mail.com",
    ),
    "super-man" => array(
        "name" => "Clark Kent",
        "email" => "clarkkent@mail.com",
    ),
    "iron-man" => array(
        "name" => "Harry Potter",
        "email" => "harrypotter@mail.com",
    )
);*/
 
/* Printing all the keys and values one by one
$keys = array_keys($superheroes);
for($i = 0; $i < count($superheroes); $i++) {
    echo $keys[$i] . "{<br>";
    foreach($superheroes[$keys[$i]] as $key => $value) {
        echo $key . " : " . $value . "<br>";
    }
    echo "}<br>";
}
?>*/

var_dump(array_column($exam_list, 'question_no'));
exit;
foreach ($exam_list as $user) {

    /*echo "Id: {$user['id']}<br />"
        . "Name: {$user['id_category']}<br />"
        . "Question No: {$user['question_no']}<br />"
       . "Opt1: {$user["opt1"]}<br /><br />"
       . "Opt2: {$user["opt2"]}<br /><br />"
       . "Opt3: {$user["opt3"]}<br /><br />"
       . "Opt4: {$user["opt4"]}<br /><br />"
       . "Answer: {$user["answer"]}<br /><br />";*/
}

