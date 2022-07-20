<?php

use App\Models\Quiz_online;
use Arrayy\Arrayy;

require ("./vendor/autoload.php");

$arrayy = new Quiz_online;

$arrayy = $arrayy->get_question_id(1350633573);


print_r($arrayy); // show all array data
echo "<hr>" . $arrayy[0]['question']; // print the first rows username