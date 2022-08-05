

<?php $__env->startSection('Title', 'ورود ادمین'); ?>

<?php $__env->startSection("content"); ?>

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Add Question Inside -><span style='color:red'><?php echo e($category); ?></span></h1>
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
                                        <form action="addquestiontext" method="post">
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
                                                <input type="hidden" name="id_category" value="<?php echo e($id_category); ?>">
                                                <button type="submit" name="insert_text" class="btn btn-lg btn-info btn-success">Add Question</button>
                                            </div>
                                            <div class="alert alert-light" role="alert">
                                                <?php echo e($error_text); ?>

                                            </div>
                                        </form>  
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header"><strong>Add New Question by Image</strong></div>
                                    <div class="card-body card-block">
                                        <form action="addquestionimage" method="post" enctype="multipart/form-data">
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
                                                <input type="hidden" name="id_category" value="<?php echo e($id_category); ?>">
                                                <button type="submit" name="insert_image" class="btn btn-lg btn-info btn-success">Add Question</button>
                                            </div>
                                            <div class="alert alert-light" role="alert">
                                               <?php echo e($error_img); ?>

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
                                        if (!empty($question_list)){                                                            
                                            foreach($question_list as $question){
                                                ?>
                                                <tr>
                                                    <th scope="row"><?php echo e($question['question_no']); ?></th>
                                                    <td><?php echo e($question['question']); ?></td>
                                                    <td>
                                                        
                                                        <?php if(strpos($question['opt1'],"opt_images/")!==false): ?>
                                                            <img src="<?php echo e($question['opt1']); ?>" alt="Opt1" height="50px" width="50px">
                                                        <?php else: ?>
                                                            <?php echo e($question['opt1']); ?>

                                                        <?php endif; ?>

                                                    </td>
                                                    <td>
                                                        
                                                        <?php if(strpos($question['opt2'],"opt_images/")!==false): ?>
                                                            <img src="<?php echo e($question['opt2']); ?>" alt="Opt2" height="50px" width="50px">
                                                        <?php else: ?>
                                                            <?php echo e($question['opt2']); ?>

                                                        <?php endif; ?>

                                                    </td>
                                                    <td>

                                                        <?php if(strpos($question['opt3'],"opt_images/")!==false): ?>
                                                            <img src="<?php echo e($question['opt3']); ?>" alt="Opt3" height="50px" width="50px">
                                                        <?php else: ?>
                                                            <?php echo e($question['opt3']); ?>

                                                        <?php endif; ?>

                                                    </td>
                                                    <td>

                                                        <?php if(strpos($question['opt4'],"opt_images/")!==false): ?>
                                                            <img src="<?php echo e($question['opt4']); ?>" alt="Opt4" height="50px" width="50px">
                                                        <?php else: ?>
                                                            <?php echo e($question['opt1']); ?>

                                                        <?php endif; ?>

                                                    </td>
                                                    <td>

                                                        <?php if(strpos($question['answer'],"opt_images/")!==false): ?>
                                                            <img src="<?php echo e($question['answer']); ?>" alt="answer" height="50px" width="50px">
                                                        <?php else: ?>
                                                            <?php echo e($question['answer']); ?>

                                                        <?php endif; ?>

                                                    </td>
                                                    <td>
                                                        <form action="findquestion" method="post">
                                                            <input type="hidden" name="id_category" value="<?php echo e($question['id_category']); ?>">
                                                            <input type="hidden" name="id" value="<?php echo e($question['id']); ?>">
                                                            <button type="submit">Edit</button>
                                                        </form>
                                                    </td>                                                                    
                                                    <td>
                                                        <form action="delquestion" method="post">
                                                            <input type="hidden" name="id_category" value="<?php echo e($question['id_category']); ?>">
                                                            <input type="hidden" name="id" value="<?php echo e($question['id']); ?>">
                                                            <button type="submit">Del</button>
                                                        </form>
                                                    </td>                                                                    
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make("Layout.main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\html.project\PHP\NewForQuiz\Views/Admin/Question/add_edit_question.blade.php ENDPATH**/ ?>