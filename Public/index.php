<?php

/*if (isset($_COOKIE["id_token"])){
    header("location:./choice_category.php");
}else{
    header("location:./login.php");
}
*/
// Require composer autoloader
require ("./vendor/autoload.php");

// Create Router instance
$router = new \Bramus\Router\Router();

// Define routes
// ...

$router->match('GET|POST', 'hi', function() { 
    echo "hello";
 });

// Run it!
$router->run();




