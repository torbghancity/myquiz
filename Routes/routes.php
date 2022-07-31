<?php

return [
    "/" => "User@HomeControllers@Home",
    "/exam" => "User@QuizControllers@ShowExam",
    "/login" => "User@AuthControllers@HomeLogin",
    "/dologin" => "User@AuthControllers@DoLogin",
    "/register" => "User@AuthControllers@HomeRegister",
    "/doregister" => "User@AuthControllers@DoRegister",
    "/logout" => "User@AuthControllers@Logout",
    "/admin" => "Admin@AuthControllers@HomeLogin",
    "/login_admin" => "Admin@AuthControllers@DoLogin",
    "/exam_admin" => "Admin@QuizControllers@ShowExam",
    
    
    
    /*
    
    
    
    "/storenewtodoItem" => "HomeControllers@store",
    "/contact" => "ContactControllers@home",
    "/messagesinsert" => "ContactControllers@insert",
    "/about" => "PublicControllers@about",
    "/test" => "TestControllers@testhome",
    "/mytest" => "User@TestControllers@test",*/
];