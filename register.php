<?php
require ("./connection.php");
require ("header.php");

$error="";
if(isset($_POST["register"])){
    $name=htmlspecialchars($_POST["name"]);
    $username = htmlspecialchars($_POST["username"]);
    $email = htmlspecialchars($_POST["email"]);
    $pass = htmlspecialchars($_POST["password"]);
    $pass_rep = htmlspecialchars($_POST["password_confirmation"]);

    $sql = "SELECT * FROM registration WHERE username = '$username';";
    $result=mysqli_query($conn,$sql);

    if ($name!="" || $username!="" || $email!="" || $pass!=""){
        if(mysqli_num_rows($result)==0){
            if ($pass==$pass_rep){
                $sql = 
                    "INSERT INTO `registration`(`name`, `username`, `email`, `password`) VALUES ('$name','$username','$email','$pass');";
                mysqli_query($conn,$sql);
                header("location:./login.php");
            }else{
                $error="رمز های عبور با هم یکسان نیستن";
            }
        }else{
            $error="نام کاربری از قبل موجود هست";
        }
    }else{
        $error="در تکمیل موارد دقت کنید";
    }
    
}

?>

<section class="vh-200" style="background-color: #6a11cb;">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100" style="padding: 25px">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-10">
              <h2 class="text-uppercase text-center mb-2">ایجاد حساب</h2>

              <form action="" method="post">

                <div class="form-outline mb-1">
                  <label class="form-label" for="form3Example1cg">نام</label>
                  <input type="text" name="name" class="form-control form-control-lg" />                  
                </div>

                <div class="form-outline mb-1">
                  <label class="form-label" for="form3Example1cg">نام کاربری</label>
                  <input type="text" name="username" class="form-control form-control-lg" />                  
                </div>

                <div class="form-outline mb-1">
                  <label class="form-label" for="form3Example3cg">ایمیل</label>
                  <input type="email" name="email" class="form-control form-control-lg" />                  
                </div>

                <div class="form-outline mb-1">
                  <label class="form-label" for="form3Example4cg">رمز عبور</label>
                  <input type="password" name="password" class="form-control form-control-lg" />                  
                </div>

                <div class="form-outline mb-1">
                  <label class="form-label" for="form3Example4cdg">تکرار رمز عبور</label>
                  <input type="password" name="password_confirmation" class="form-control form-control-lg" />                  
                </div>

                <div class="d-flex justify-content-center">
                  <button type="submit" name="register"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">ایجاد حساب</button>
                </div>
                <br>

                <div class="alert alert-light" role="alert">
                  <?php echo $error ?>
                </div>

                <p class="text-center text-muted mt-5 mb-0">اگر قبلا ثبت نام کرده اید؟ <a href="./login.php"
                    class="fw-bold text-body"><u>ورود</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
require ("footer.php");
?>