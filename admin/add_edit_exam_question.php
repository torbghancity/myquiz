<?php

require ("header.php");
require ("../connection.php");
require ("../function.php");

?>
        <div class="breadcrumbs">
            <div class="col-sm-6">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Select Exam Category for add & edit Question</h1>
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
                                <div class="col-lg-8">
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
                                                        <th scope="col">Select</th>                                                        
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
                                                                    <td><a href="add_edit_question.php?id= <?php echo $exam_list['id_category'] ?>">Select</a></td>                                                                    
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