<?php

namespace App\Layout;

use Jenssegers\Blade\Blade;


class Layout {
    
    public static function pageheader($pagetitle){

        require (__DIR__ . "/header.php");

    }

    public static function pagefooter(){

        require (__DIR__ . "/footer.php");

    }

    public static function render($views,$parameters)
    {

      
        $blade = new Blade(__DIR__ .'/../../Views', __DIR__ .'/../../cache');
        
        echo $blade->make($views,$parameters)->render();
    }

}