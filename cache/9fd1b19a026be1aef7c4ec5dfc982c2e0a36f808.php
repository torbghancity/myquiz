

<?php $__env->startSection('Title', 'ورود ادمین'); ?>

<?php $__env->startSection("content"); ?>

<div class="sufee-login d-flex align-content-center flex-wrap">
    <div class="container">
        <div class="login-content">
            <div class="login-logo" style="color:white">
                <H4>Admin Login</H4>
            </div>
            <div class="login-form">
                <form action="login_admin" method="post" >
                    <div class="form-group">
                        <label>UserName</label>
                        <input type="text" class="form-control" name="username">
                    </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password">
                    </div>
                    <hr>        
                    <button type="submit" name="login" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                </form>
                <div class="alert alert-light" role="alert">
                    <?php echo e($error); ?>

                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("Layout.admin", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\html.project\PHP\NewForQuiz\Views/Admin/Auth/login.blade.php ENDPATH**/ ?>