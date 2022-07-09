<?php
require ("header.php");
require ("../connection.php");
require ("../function.php");

$error_text="";
$error_image="";

$id_category = $_GET["id"];

$sql = "SELECT * FROM `exam_category` WHERE `id_category`= '$id_category';";
$result = mysqli_query($conn,$sql);
$exam_list = mysqli_fetch_assoc($result);
$category = $exam_list['category'];

//Add question by text

if (isset($_POST["insert_text"])) {
    $question = $_POST["question_text"];
    $answer = $_POST["answer"];
    $opt1 = $_POST["opt1"];
    $opt2 = $_POST["opt2"];
    $opt3 = $_POST["opt3"];
    $opt4 = $_POST["opt4"];
    if ($question!="" && $answer!="" && $opt1!="" && $opt2!="" && $opt3!="" && $opt4!=""){

        $conter = 0 ;
        $sql = "SELECT * FROM `questions` WHERE `id_category`= '$id_category' order by `id` ASC;";
        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result)>0){
            while ($row = mysqli_fetch_assoc($result)){
                $conter = $conter + 1;
                $sql = "UPDATE `questions` SET `question_no` = '$conter' WHERE `id` = $row[id];";
                mysqli_query($conn,$sql);
            }
        }

        $conter = $conter + 1;
        $sql = 
            "INSERT INTO `questions`(`question_no`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `answer`, `id_category`) 
            VALUES ('$conter','$question','$opt1','$opt2','$opt3','$opt4','$answer','$id_category');";
        $result = mysqli_query($conn,$sql);
    }else{
        $error_text="تمام موارد را با دقت پر کنید لطفا";
    }
}

//Add question by image

if (isset($_POST["insert_image"])) {
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

        $conter = 0 ;
        $sql = "SELECT * FROM `questions` WHERE `id_category`= '$id_category' order by `id` ASC;";
        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result)>0){
            while ($row = mysqli_fetch_assoc($result)){
                $conter = $conter + 1;
                $sql = "UPDATE `questions` SET `question_no` = '$conter' WHERE `id` = $row[id];";
                mysqli_query($conn,$sql);
            }
        }

        $conter = $conter + 1;
        $sql = 
            "INSERT INTO `questions`(`question_no`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `answer`, `id_category`) 
            VALUES ('$conter','$question','$address_db1','$address_db2','$address_db3','$address_db4','$address_db_answer','$id_category');";
        $result = mysqli_query($conn,$sql);
    }else{
        $error_image="تمام موارد را با دقت پر کنید لطفا";
    }
}

?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Add Question Inside -> <?php echo "<span style='color:red'>" . $category . "</span>"?></h1>
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
                                        <div class="card-header"><strong>Add New Question by Text</strong></div>
                                        <div class="card-body card-block">
                                            <form action="" method="post">
                                                <div class="form-group">
                                                    <label for="company" class=" form-control-label">Question</label>
                                                    <input type="text" name="question_text" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="vat" class=" form-control-label">Opt1</label>
                                                    <input type="text" name="opt1" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="company" class=" form-control-label">Opt2</label>
                                                    <input type="text" name="opt2" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="vat" class=" form-control-label">Opt3</label>
                                                    <input type="text" name="opt3" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="company" class=" form-control-label">Opt4</label>
                                                    <input type="text" name="opt4" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="vat" class=" form-control-label">Add Answer</label>
                                                    <input type="text" name="answer" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" name="insert_text" class="btn btn-lg btn-info btn-success">Add Question</button>
                                                </div>
                                                <div class="alert alert-light" role="alert">
                                                    <?php echo $error_text ?>
                                                </div>
                                            </form>  
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-header"><strong>Add New Question by Image</strong></div>
                                        <div class="card-body card-block">
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="company" class=" form-control-label">Question</label>
                                                    <input type="text" name="question_image" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="vat" class=" form-control-label">Opt1</label>
                                                    <input type="file" name="f_opt1" class="form-control" style="padding-bottom:35px">
                                                </div>
                                                <div class="form-group">
                                                    <label for="company" class=" form-control-label">Opt2</label>
                                                    <input type="file" name="f_opt2" class="form-control" style="padding-bottom:35px">
                                                </div>
                                                <div class="form-group">
                                                    <label for="vat" class=" form-control-label">Opt3</label>
                                                    <input type="file" name="f_opt3" class="form-control" style="padding-bottom:35px">
                                                </div>
                                                <div class="form-group">
                                                    <label for="company" class=" form-control-label">Opt4</label>
                                                    <input type="file" name="f_opt4" class="form-control" style="padding-bottom:35px">
                                                </div>
                                                <div class="form-group">
                                                    <label for="vat" class=" form-control-label">Add Answer</label>
                                                    <input type="file" name="f_answer" class="form-control" style="padding-bottom:35px">
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" name="insert_image" class="btn btn-lg btn-info btn-success">Add Question</button>
                                                </div>
                                                <div class="alert alert-light" role="alert">
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
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Exam Table</strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Question</th>
                                            <th scope="col">Opt1</th>
                                            <th scope="col">Opt2</th>
                                            <th scope="col">Opt3</th>
                                            <th scope="col">Opt4</th>
                                            <th scope="col">Answer</th>                                                         
                                            <th scope="col">Edit</th>                                                         
                                            <th scope="col">Del</th>                                                         
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql = 
                                                "SELECT * FROM `questions` WHERE `id_category` = '$id_category' ORDER BY `question_no` ASC;";
                                            $result = mysqli_query($conn,$sql);
                                            if (mysqli_num_rows($result)>0){                                                            
                                                while ($question_list = mysqli_fetch_assoc($result)){
                                                    ?>
                                                    <tr>
                                                        <th scope="row"><?php echo $question_list['question_no'] ?></th>
                                                        <td><?php echo $question_list['question'] ?></td>
                                                        <td>
                                                            <?php
                                                                
                                                                if(strpos($question_list['opt1'],"opt_images/")!==false){
                                                                    ?>
                                                                    <img src=<?php echo $question_list['opt1']; ?> alt="Opt1" height="50px" width="50px">
                                                                    <?php
                                                                }else{
                                                                    echo $question_list['opt1'];
                                                                }
                                                                  
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                                
                                                                if(strpos($question_list['opt2'],"opt_images/")!==false){
                                                                    ?>
                                                                    <img src=<?php echo $question_list['opt2']; ?> alt="Opt2" height="50px" width="50px">
                                                                    <?php
                                                                }else{
                                                                    echo $question_list['opt2'];
                                                                }
                                                                
                                                            ?>
                                                        </td>
                                                        <td>

                                                            <?php
                                                                
                                                                if(strpos($question_list['opt3'],"opt_images/")!==false){
                                                                    ?>
                                                                    <img src=<?php echo $question_list['opt3']; ?> alt="Opt3" height="50px" width="50px">
                                                                    <?php
                                                                }else{
                                                                    echo $question_list['opt3'];
                                                                }
                                                                  
                                                            ?>

                                                        </td>
                                                        <td>

                                                            <?php
                                                                
                                                                if(strpos($question_list['opt4'],"opt_images/")!==false){
                                                                    ?>
                                                                    <img src=<?php echo $question_list['opt4']; ?> alt="Opt4" height="50px" width="50px">
                                                                    <?php
                                                                }else{
                                                                    echo $question_list['opt1'];
                                                                }
                                                                  
                                                            ?>

                                                        </td>
                                                        <td>

                                                            <?php
                                                                
                                                                if(strpos($question_list['answer'],"opt_images/")!==false){
                                                                    ?>
                                                                    <img src=<?php echo $question_list['answer']; ?> alt="answer" height="50px" width="50px">
                                                                    <?php
                                                                }else{
                                                                    echo $question_list['answer'];
                                                                }
                                                                  
                                                            ?>

                                                        </td>
                                                        <td><a href="find_image_text.php?id1= <?php echo $question_list['id']."&id=".$id_category ?>">Edit</a></td>                                                                    
                                                        <td><a href="delete_question.php?id1= <?php echo $question_list['id']."&id=".$id_category ?>">Del</a></td>                                                                    
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
        
<?php
require "footer.php";
?>