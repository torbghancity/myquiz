<?php

if (isset($_COOKIE["id_token"])){
    header("location:./choice_category.php");
}else{
    header("location:./login.php");
}
