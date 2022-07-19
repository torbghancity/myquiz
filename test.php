<?php

use Arrayy\Arrayy;

$arrayy = new Arrayy(['Lars' => ['lastname' => 'Moelleken']]);

$arrayy->get('Lars'); // ['lastname' => 'Moelleken']
$arrayy->get('Lars.lastname'); // 'Moelleken'