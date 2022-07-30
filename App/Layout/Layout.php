<?php

namespace App\Layout;

use Jenssegers\Blade\Blade;

class Layout
{

    public static function render($name,$parameters=[])
    {
        
        $blade = new Blade(__DIR__ . '/../../Views',__DIR__ . '/../../cache');

        echo $blade->make($name, $parameters)->render();
    
    }
    
}