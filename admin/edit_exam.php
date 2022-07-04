<?php
require ("header.php");
require ("../connection.php");
require ("../function.php");

$id = $_GET["id"];
$sql = "SELECT * FROM `exam_category` WHERE `id`= $id;";
$result = mysqli_query($conn,$sql);
$exam_list = mysqli_fetch_assoc($result);
$category = $exam_list['category'];
$exam_time = $exam_list['exam_time'];
$error="";

if (isset($_POST["edit"])) {
    $edit_exam = $_POST["edit_exam"];
    $edit_time = $_POST["edit_time"];
    if ($edit_exam!="" && $edit_time!=""){
        $sql = 
            "UPDATE `exam_category` SET `category`='$edit_exam',`exam_time`='$edit_time' WHERE `id`=$id;";
        $result=mysqli_query($conn,$sql);
        redirect("home.php");
    }else{
        $error="تمام موارد را با دقت پر کنید لطفا";
    }
}


?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Add Exam</h1>
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
                                        <div class="card-header"><strong>Edit Exam</strong></div>
                                        <div class="card-body card-block">
                                            <form action="" method="post">
                                                <div class="form-group">
                                                    <label for="company" class=" form-control-label">Edit Exam Category</label>
                                                    <input type="text" name="edit_exam" class="form-control" value=<?php echo $category ?>>
                                                </div>
                                                <div class="form-group">
                                                    <label for="vat" class=" form-control-label">Exam Time In Minute</label>
                                                    <input type="text" name="edit_time" class="form-control" value=<?php echo $exam_time ?>>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" name="edit" class="btn btn-lg btn-info btn-success">Edit Exam</button>
                                                </div>
                                                <div class="alert alert-danger" role="alert">
                                                    <?php echo $error ?>
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