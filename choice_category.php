<?php

require ("./vendor/autoload.php");

use App\Layout\Layout;
use App\Models\Quiz_online;

Layout::pageheader("انتخاب سوالات");

$exam = new Quiz_online;

$exam_list = $exam->get_all_exam();

if (count($exam_list)>0){
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
                            foreach($exam_list as $list){
                                ?>
                                    <a href="/show_question.php?id=<?php echo $list["id_category"]; ?>" class="list-group-item list-group-item-action"> <?php echo $list["category"] . " --> زمان آزمون به دقیقه --> " . $list["exam_time"]; ?> </a>
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
Layout::pagefooter();
?>