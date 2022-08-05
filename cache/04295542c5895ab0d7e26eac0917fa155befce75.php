

<?php $__env->startSection('Title', 'ورود ادمین'); ?>

<?php $__env->startSection("content"); ?>

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
                                        <form action="editquestionimg" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="company" class=" form-control-label">Question</label>
                                                <input type="text" name="question_image" class="form-control" value="<?php echo e($question['question']); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="vat" class=" form-control-label">Opt1 -> </label>    
                                                <img src="<?php echo e($question['opt1']); ?>" alt="opt1" height="50px" width="50px">
                                                <input type="file" name="f_opt1" class="form-control" style="padding-bottom:35px">
                                            </div>
                                            <div class="form-group">
                                                <label for="company" class=" form-control-label">Opt2 -> </label>
                                                <img src="<?php echo e($question['opt2']); ?>" alt="opt2" height="50px" width="50px">
                                                <input type="file" name="f_opt2" class="form-control" style="padding-bottom:35px">
                                            </div>
                                            <div class="form-group">
                                                <label for="vat" class=" form-control-label">Opt3 -> </label>
                                                <img src="<?php echo e($question['opt3']); ?>" alt="opt3" height="50px" width="50px">
                                                <input type="file" name="f_opt3" class="form-control" style="padding-bottom:35px">
                                            </div>
                                            <div class="form-group">
                                                <label for="company" class=" form-control-label">Opt4 -> </label>
                                                <img src="<?php echo e($question['opt4']); ?>" alt="opt4" height="50px" width="50px">
                                                <input type="file" name="f_opt4" class="form-control" style="padding-bottom:35px">
                                            </div>
                                            <div class="form-group">
                                                <label for="vat" class=" form-control-label">Update Answer -> </label>
                                                <img src="<?php echo e($question['answer']); ?>" alt="answer" height="50px" width="50px">
                                                <input type="file" name="f_answer" class="form-control" style="padding-bottom:35px">
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" name="id_category" value="<?php echo e($question['id_category']); ?>">
                                                <input type="hidden" name="id" value="<?php echo e($question['id']); ?>">
                                                <button type="submit" name="update" class="btn btn-lg btn-info btn-success">Update Question</button>
                                            </div>
                                            <div class="alert alert-light" role="alert">
                                                <?php echo e($error); ?>

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
<?php $__env->stopSection(); ?>
<?php echo $__env->make("Layout.main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\html.project\PHP\NewForQuiz\Views/Admin/Question/edit_img_question.blade.php ENDPATH**/ ?>