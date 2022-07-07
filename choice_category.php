<?php
session_start();
require "header.php";
require ("./connection.php");

$sql= "SELECT * FROM `exam_category` ORDER BY `id` ASC;";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result)>0){
    $error="یکی از آزمونها را انتخاب کنید";
}else{
    $error = "هیچ آزمونی پیدا نشد";
}

?>


<div class="container mt-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-10 col-lg-10">
            <div class="border">
                <div class="question bg-light p-3 border-bottom">
                    <div class="list-group shadow p-3 mb-5 bg-white rounded">
                        <a href="" class="list-group-item list-group-item-action active"> <?php echo $error ; ?> </a>

                        <?php
                            while ($exam_list=mysqli_fetch_assoc($result)) {
                                ?>
                                    <a href="/show_question.php?id=<?php echo $exam_list["id"]; ?>" class="list-group-item list-group-item-action"> <?php echo $exam_list["category"] . " --> زمان آزمون به دقیقه --> " . $exam_list["exam_time"]; ?> </a>
                                <?php
                            }
                        ?>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
require "footer.php";
?>