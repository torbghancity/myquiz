

<?php $__env->startSection('Title', 'انتخاب سوالات'); ?>

<?php $__env->startSection("content"); ?>

<section class="vh-100 gradient-custom">
  <div class="container py-2 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-10 text-center">

            <div class="mb-md-15 mt-md-8 pb-10">

                <h2 class="fw-bold mb-2 text-uppercase">ورود</h2>
                <p class="text-white-50 mb-5">لطفا نام کاربری و رمز عبور خود را وارد کنید!</p>
                <form action="/dologin" method="post" class="row g-3 needs-validation" novalidate >
                    <div class="form-outline form-white mb-4">
                        <input type="text" name="username" class="form-control form-control-lg" />
                        <label class="form-label" for="typeEmailX">نام کاربری</label>
                    </div>

                    <div class="form-outline form-white mb-4">
                        <input type="password" name="password" class="form-control form-control-lg" />
                        <label class="form-label" for="typePasswordX">رمز عبور</label>
                    </div>

                    <button class="btn btn-outline-light btn-lg px-5" type="submit" name="login">ورود</button>
                </form>
                <br>
                <div class="alert alert-black" role="alert">
                    <?php echo e($error); ?>

                </div>
            </div>
            
            <div>
                <p class="mb-0">اگر ثبت نام نکرده اید? <a href="register" class="text-white-50 fw-bold">ثبت نام کنید</a>
                </p>
            </div>
                

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("Layout.user", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\html.project\PHP\NewForQuiz\Views/User/Auth/login.blade.php ENDPATH**/ ?>