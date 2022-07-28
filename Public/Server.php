<?php

require ("../vendor/autoload.php");

$route = $_SERVER["REQUEST_URI"];

$routes = require ("../Routes/routes.php");


if (isset($routes[$route])){
    
    $act=$routes[$route];
    $act = explode("@",$act);

    $controllername = "\\App\\Controllers\\$act[0]";
    $action = $act[1];

    $controller = new $controllername;
    $controller->$action();
    exit;

}

http_response_code(404);
require "./404.php";
exit;
