

<?php $__env->startSection('Title', 'ورود ادمین'); ?>

<?php $__env->startSection("content"); ?>

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
                                        <form action="doeditexam" method="post">
                                            <div class="form-group">
                                                <label for="company" class=" form-control-label">Edit Exam Category</label>
                                                <input type="text" name="edit_exam" class="form-control" value=<?php echo e($category); ?>>
                                            </div>
                                            <div class="form-group">
                                                <label for="vat" class=" form-control-label">Exam Time In Minute</label>
                                                <input type="text" name="edit_time" class="form-control" value=<?php echo e($exam_time); ?>>
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" name="id" value="<?php echo e($id); ?>">
                                                <button type="submit" name="edit" class="btn btn-lg btn-info btn-success">Edit Exam</button>
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
<?php echo $__env->make("Layout.main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\html.project\PHP\NewForQuiz\Views/Admin/Exam/add_edit_exam.blade.php ENDPATH**/ ?>