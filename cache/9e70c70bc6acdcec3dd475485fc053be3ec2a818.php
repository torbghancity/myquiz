

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
                                <div class="card-header"><strong>Add Exam</strong></div>
                                <div class="card-body card-block">
                                    <form action="add_exam" method="post">
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
                                        <div class="alert alert-light" role="alert">
                                            <?php echo e($error); ?>

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
                                                
                                                $Counter = 0;
                                                if (!empty($exam_list)){                                                            
                                                    foreach ($exam_list as $exam){
                                                        $Counter = $Counter + 1;
                                                        ?>
                                                        <tr>
                                                            <th scope="row"><?php echo e($Counter); ?></th>
                                                            <td><?php echo e($exam['category']); ?></td>
                                                            <td><?php echo e($exam['exam_time']); ?></td>
                                                            <td>
                                                                <form action="editexam" method="post">
                                                                    <button name='action'>Edit</button>
                                                                    <input type="hidden" name='id' value="<?php echo e($exam['id_category']); ?>">
                                                                </form>
                                                            </td>
                                                            <td>
                                                                <form action="delexam" method="post">
                                                                    <button name='action'>Del</button>
                                                                    <input type="hidden" name='id' value="<?php echo e($exam['id_category']); ?>">
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
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("Layout.main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\html.project\PHP\NewForQuiz\Views/Admin/Exam/home.blade.php ENDPATH**/ ?>