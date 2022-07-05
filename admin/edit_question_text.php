<?php
require ("header.php");
require ("../connection.php");
require ("../function.php");

$id1 = $_GET["id1"];
$id = $_GET["id"];

$error_text="";

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
    $question = $_POST["question"];
    $answer = $_POST["answer"];
    $opt1 = $_POST["opt1"];
    $opt2 = $_POST["opt2"];
    $opt3 = $_POST["opt3"];
    $opt4 = $_POST["opt4"];
    if ($question!="" && $answer!="" && $opt1!="" && $opt2!="" && $opt3!="" && $opt4!=""){

        $sql = "UPDATE `questions` SET `question`= '$question' , `opt1`= '$opt1' , `opt2`= '$opt2' , `opt3`= '$opt3' , `opt4`= '$opt4', `answer`= '$answer' WHERE `id`=$id1;";
        $result = mysqli_query($conn,$sql);

        header("location:./add_edit_question.php?id=".$id);

    }else{

        $error_text="تمام موارد را با دقت پر کنید لطفا";

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
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header"><strong>Update Question by Text</strong></div>
                                        <div class="card-body card-block">
                                            <form action="" method="post">
                                                <div class="form-group">
                                                    <label for="company" class=" form-control-label">Question</label>
                                                    <input type="text" name="question" class="form-control" value="<?php echo $question ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="vat" class=" form-control-label">Opt1</label>
                                                    <input type="text" name="opt1" class="form-control" value="<?php echo $opt1 ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="company" class=" form-control-label">Opt2</label>
                                                    <input type="text" name="opt2" class="form-control" value="<?php echo $opt2 ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="vat" class=" form-control-label">Opt3</label>
                                                    <input type="text" name="opt3" class="form-control" value="<?php echo $opt3 ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="company" class=" form-control-label">Opt4</label>
                                                    <input type="text" name="opt4" class="form-control" value="<?php echo $opt4 ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="vat" class=" form-control-label">Add Answer</label>
                                                    <input type="text" name="answer" class="form-control" value="<?php echo $answer ?>">
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" name="update" class="btn btn-lg btn-info btn-success">Update Question</button>
                                                </div>
                                                <div class="alert alert-danger" role="alert">
                                                    <?php echo $error_text ?>
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