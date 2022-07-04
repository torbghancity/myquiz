<?php
    require ("./connection.php");
    require ("header.php");

    $error="";
    if(isset($_POST["login"])){
        $username = htmlspecialchars($_POST["username"]);
        $pass = htmlspecialchars($_POST["password"]);

        $sql = "SELECT * FROM registration WHERE username = '$username' AND password = '$pass';";
        $user=mysqli_query($conn,$sql);
        
        if(mysqli_num_rows($user)>0){
            $token = random_int(10000000000, 99999999999999);
            $id_user = mysqli_fetch_assoc ($user);

            setcookie("user_token", $token);

            $sql = 
                "UPDATE `registration` SET `id_token`= '$token' WHERE `id`= '$id_user[id]';";
            mysqli_query($conn,$sql);
            $error="انجام شد";
        }else{
            $error="در تکمیل موارد دقت کنید";
        }
    }
?>

<form action="./login.php" method="post" class="row g-3 needs-validation" novalidate >
    <input type="hidden" name="login">
    <div class="col-md-4">
        <label for="validationCustomUsername" class="form-label">Username</label>
        <div class="input-group has-validation">
            <input type="text" name="username" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
        </div>
    </div>
    <div class="col-md-4">
        <label for="validationCustomUsername" class="form-label">Password</label>
        <div class="input-group has-validation">
            <input type="password" name="password" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
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