<?php
require ("header.php");
require ("../connection.php");
require ("../function.php");
$error="";

if (isset($_POST["insert"])) {
    $add_exam = $_POST["add_exam"];
    $add_time = $_POST["add_time"];
    if ($add_exam!="" && $add_time!=""){
    $sql = 
        "INSERT INTO `exam_category`(`category`, `exam_time`) VALUES ('$add_exam','$add_time');";
    mysqli_query($conn,$sql);
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
                                        <div class="card-header"><strong>Add Exam</strong></div>
                                        <div class="card-body card-block">
                                            <form action="" method="post">
                                                <div class="form-group">
                                                    <label for="company" class=" form-control-label">New Exam Category</label>
                                                    <input type="text" name="add_exam" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="vat" class=" form-control-label">Exam Time In Minute</label>
                                                    <input type="text" name="add_time" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" name="insert" class="btn btn-lg btn-info btn-success">Add Exam</button>
                                                </div>
                                                <div class="alert alert-danger" role="alert">
                                                    <?php echo $error ?>
                                                </div>
                                            </form>  
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong class="card-title">Exam Table</strong>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Exam</th>
                                                        <th scope="col">Time in Minute</th>
                                                        <th scope="col">Edit</th>
                                                        <th scope="col">Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $sql = 
                                                            "SELECT * FROM `exam_category`;";
                                                        $result = mysqli_query($conn,$sql);
                                                        $Counter = 0;
                                                        if (mysqli_num_rows($result)>0){                                                            
                                                            while ($exam_list = mysqli_fetch_assoc($result)){
                                                                $Counter = $Counter + 1;
                                                                ?>
                                                                <tr>
                                                                    <th scope="row"><?php echo $Counter ?></th>
                                                                    <td><?php echo $exam_list['category'] ?></td>
                                                                    <td><?php echo $exam_list['exam_time'] ?></td>
                                                                    <td><a href="edit_exam.php?id= <?php echo $exam_list['id'] ?>">Edit</a></td>
                                                                    <td><a href="delete_exam.php?id= <?php echo $exam_list['id'] ?>">Delete</a></td>
                                                                </tr> 
                                                                <?php
                                                            }
                                                        }
                                                    ?>    
                                                                                                   
                                                </tbody>
                                            </table>
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