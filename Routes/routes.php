<?php

return [
    "/" => "HomeControllers@Home",
    "/exam" => "HomeControllers@ShowExam",
    "/login" => "AuthControllers@HomeLogin",
    "/dologin" => "AuthControllers@DoLogin",
    "/register" => "AuthControllers@HomeRegister",
    "/doregister" => "AuthControllers@DoRegister",
    "/logout" => "AuthControllers@Logout",
    "/storenewtodoItem" => "HomeControllers@store",
    /*
    
    
    "/donetodoItem" => "HomeControllers@done",
    
    "/contact" => "ContactControllers@home",
    "/messagesinsert" => "ContactControllers@insert",
    "/about" => "PublicControllers@about",
    "/test" => "TestControllers@testhome",
    "/mytest" => "TestControllers@test",*/
];