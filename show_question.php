<?php
require "header.php";
require ("./connection.php");

//get exam by id

$id=$_GET["id"];
$sql= "SELECT * FROM `exam_category` WHERE `id` = $id;";
$res_exam = mysqli_query($conn,$sql);
$exam_list = mysqli_fetch_assoc($res_exam);

//get question by exam

$sql= "SELECT * FROM `questions` WHERE `category` = '$exam_list[category]' ORDER BY `question_no` ASC;";
$res_question = mysqli_query($conn,$sql);
$question_list = mysqli_fetch_assoc($res_question);


?>

      <div class="container mt-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-10 col-lg-10">
                <div class="border">
                    <div class="question bg-white p-3 border-bottom">
                        <div class="d-flex flex-row justify-content-between align-items-center mcq">
                            <h4>سوالات آزمون <?php echo $exam_list["category"]; ?></h4>
                          </div>
                    </div>
                    <div class="question bg-white p-3 border-bottom">
                        <div class="d-flex flex-row align-items-center question-title">
                            <h3 class="text-danger"><?php echo $question_list["question_no"] . "-> "; ?></h3>
                            <h5 class="mt-1 ml-2"><?php echo $question_list["question"]; ?></h5>
                        </div>
                        <div class="ans ml-2">
                            <label class="radio"> <input type="radio" name="brazil" value="brazil"> <span><?php echo $question_list["opt1"]; ?></span></label>    
                        </div>
                        <div class="ans ml-2">
                            <label class="radio"> <input type="radio" name="Germany" value="Germany"> <span><?php echo $question_list["opt2"]; ?></span>
                            </label>    
                            </div><div class="ans ml-2">
                            <label class="radio"> <input type="radio" name="Indonesia" value="Indonesia"> <span><?php echo $question_list["opt3"]; ?></span>
                            </label>    
                            </div><div class="ans ml-2">
                            <label class="radio"> <input type="radio" name="Russia" value="Russia"> <span><?php echo $question_list["opt4"]; ?></span>
                            </label>    
                            </div></div>
                    <div class="d-flex flex-row justify-content-between align-items-center p-3 bg-white">
                        <button class="btn btn-primary d-flex align-items-center btn-danger" type="button">
                            <i class="fa fa-angle-left mt-1 mr-1"></i>&nbsp;
                            قبلی
                        </button>
                        <button class="btn btn-primary border-success align-items-center btn-success" type="button">
                            بعدی
                            <i class="fa fa-angle-right ml-2"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
require "footer.php";
?>