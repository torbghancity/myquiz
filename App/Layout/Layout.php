<?php

namespace App\Layout;

class Layout {
    
    public static function pageheader($pagetitle){

        require (__DIR__ . "/header.php");

    }

    public static function pagefooter(){

        require (__DIR__ . "/footer.php");

    }
}