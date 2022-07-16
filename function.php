<?php

use App\Models\Quiz_online;




function redirect($url){
    header("Location: $url");
    exit();
}

