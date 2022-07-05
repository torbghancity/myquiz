<?php
require ("./connection.php");
require ("header.php");

$error="";
if(isset($_POST["register"])){
    $name=htmlspecialchars($_POST["name"]);
    $username = htmlspecialchars($_POST["username"]);
    $email = htmlspecialchars($_POST["email"]);
    $pass = htmlspecialchars($_POST["password"]);
    $pass_rep = htmlspecialchars($_POST["password_rep"]);

    $sql = "SELECT * FROM registration WHERE username = '$username';";
    $user=mysqli_query($conn,$sql);

    if ($name!="" || $username!="" || $email!="" || $pass!=""){
        if(mysqli_num_rows($user)==0){
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

<form action="./register.php" method="post" class="row g-3 needs-validation" novalidate >
    <input type="hidden" name="register">
  <div class="col-md-4">
    <label for="validationCustom01" class="form-label">Name</label>
    <input type="text" name="name" class="form-control" id="validationCustom01" required>
  </div>
  <div class="col-md-4">
    <label for="validationCustomUsername" class="form-label">Username</label>
    <div class="input-group has-validation">
      <input type="text" name="username" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
    </div>
  </div>
  <div class="col-md-4">
    <label for="validationCustomUsername" class="form-label">Email</label>
    <div class="input-group has-validation">
      <input type="text" name="email" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
    </div>
  </div>
  <div class="col-md-4">
    <label for="validationCustomUsername" class="form-label">Password</label>
    <div class="input-group has-validation">
      <input type="password" name="password" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
    </div>
  </div>
  <div class="col-md-4">
    <label for="validationCustomUsername" class="form-label">Password repeat</label>
    <div class="input-group has-validation">
      <input type="password" name="password_rep" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
    </div>
  </div>
  </div>
  <div class="col-12">
    <button class="btn btn-primary" type="submit">Submit form</button>
  </div>
  <div class="alert alert-danger" role="alert">
    <?php echo $error ?>
  </div>
</form>

<?php
require ("footer.php");
?>