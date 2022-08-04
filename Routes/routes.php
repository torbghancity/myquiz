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
    "/exam_admin" => "Admin@ExamControllers@ShowExam",
    "/add_exam" => "Admin@ExamControllers@AddExam",
    "/delexam" => "Admin@ExamControllers@DelExam",
    "/editexam" => "Admin@ExamControllers@ShowEditExam",
    "/doeditexam" => "Admin@ExamControllers@DoEditExam",
    "/selectexam" => "Admin@QuestionControllers@ShowSelectExam",
    "/question" => "Admin@QuestionControllers@ShowQuestion",
    "/addquestiontext" => "Admin@QuestionControllers@AddQuestionText",
];