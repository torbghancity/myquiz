<?php
require ("header.php");
require ("../connection.php");
require ("../function.php");

$id1 = $_GET["id1"];
$id = $_GET["id"];

$error_image="";

$sql = "SELECT * FROM `questions` WHERE `id`= $id1;";
$result = mysqli_query($conn,$sql);
$question_list = mysqli_fetch_assoc($result);

$question = $question_list['question'];
$opt1 = $question_list['opt1'];
$opt2 = $question_list['opt2'];
$opt3 = $question_list['opt3'];
$opt4 = $question_list['opt4'];
$answer = $question_list['answer'];


if (isset($_POST["update"])) {
    $question = $_POST["question_image"];

    $tm=md5(time());

    $f_name1 = $_FILES["f_opt1"]["name"];
    $address_set1 = "./opt_images/".$tm.$f_name1;
    $address_db1 = "opt_images/".$tm.$f_name1;
    
    $f_name2 = $_FILES["f_opt2"]["name"];
    $address_set2 = "./opt_images/".$tm.$f_name2;
    $address_db2 = "opt_images/".$tm.$f_name2;
    
    $f_name3 = $_FILES["f_opt3"]["name"];
    $address_set3 = "./opt_images/".$tm.$f_name3;
    $address_db3 = "opt_images/".$tm.$f_name3;
    
    $f_name4 = $_FILES["f_opt4"]["name"];
    $address_set4 = "./opt_images/".$tm.$f_name4;
    $address_db4 = "opt_images/".$tm.$f_name4;

    $f_answer = $_FILES["f_answer"]["name"];
    $address_set_answer = "./opt_images/".$tm.$f_answer;
    $address_db_answer = "opt_images/".$tm.$f_answer;
    

    if ($question!="" && $f_answer!="" && $f_name1!="" && $f_name2!="" && $f_name3!="" && $f_name4!=""){
        move_uploaded_file($_FILES["f_opt1"]["tmp_name"],$address_set1);
        move_uploaded_file($_FILES["f_opt2"]["tmp_name"],$address_set2);
        move_uploaded_file($_FILES["f_opt3"]["tmp_name"],$address_set3);
        move_uploaded_file($_FILES["f_opt4"]["tmp_name"],$address_set4);
        move_uploaded_file($_FILES["f_answer"]["tmp_name"],$address_set_answer);

    
        $conter = $conter + 1;
        $sql = "UPDATE `questions` SET `question` = '$question' , `opt1` = '$address_db1', `opt2` = '$address_db2', `opt3` = '$address_db3', `opt4` = '$address_db4', `answer` = '$address_db_answer' WHERE `id` = $id1;";
        mysqli_query($conn,$sql);

        header("location:./add_edit_question.php?id=".$id);

    }else{
        $error_image="تمام موارد را با دقت پر کنید لطفا";
    }
}

?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Update Question</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-header"><strong>Update Question by Image</strong></div>
                                        <div class="card-body card-block">
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="company" class=" form-control-label">Question</label>
                                                    <input type="text" name="question_image" class="form-control" value="<?php echo $question ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="vat" class=" form-control-label">Opt1 -> </label>    
                                                    <img src="<?php echo $opt1 ;?>" alt="opt1" height="50px" width="50px">
                                                    <input type="file" name="f_opt1" class="form-control" style="padding-bottom:35px">
                                                </div>
                                                <div class="form-group">
                                                    <label for="company" class=" form-control-label">Opt2 -> </label>
                                                    <img src="<?php echo $opt2 ?>" alt="opt2" height="50px" width="50px">
                                                    <input type="file" name="f_opt2" class="form-control" style="padding-bottom:35px">
                                                </div>
                                                <div class="form-group">
                                                    <label for="vat" class=" form-control-label">Opt3 -> </label>
                                                    <img src="<?php echo $opt3 ?>" alt="opt3" height="50px" width="50px">
                                                    <input type="file" name="f_opt3" class="form-control" style="padding-bottom:35px">
                                                </div>
                                                <div class="form-group">
                                                    <label for="company" class=" form-control-label">Opt4 -> </label>
                                                    <img src="<?php echo $opt4 ?>" alt="opt4" height="50px" width="50px">
                                                    <input type="file" name="f_opt4" class="form-control" style="padding-bottom:35px">
                                                </div>
                                                <div class="form-group">
                                                    <label for="vat" class=" form-control-label">Update Answer -> </label>
                                                    <img src="<?php echo $answer ?>" alt="answer" height="50px" width="50px">
                                                    <input type="file" name="f_answer" class="form-control" style="padding-bottom:35px">
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" name="update" class="btn btn-lg btn-info btn-success">Update Question</button>
                                                </div>
                                                <div class="alert alert-danger" role="alert">
                                                    <?php echo $error_image ?>
                                                </div>
                                            </form>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>            
            </div>
        </div>

<?php
require "footer.php";
?>