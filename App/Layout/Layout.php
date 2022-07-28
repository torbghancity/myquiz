<?php

namespace App\Layout;

use Jenssegers\Blade\Blade;


class Layout {

    public static function render($views,$parameters=[])
    {

        $blade = new Blade(__DIR__ .'/../../Views', __DIR__ .'/../../cache');
        
        echo $blade->make($views,$parameters)->render();
        
    }

}