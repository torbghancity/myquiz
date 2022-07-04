<?php
    require ("../connection.php");
    $error="";
    if(isset($_POST["login_admin"])){
        $username = htmlspecialchars($_POST["username"]);
        $pass = htmlspecialchars($_POST["password"]);

        $sql = "SELECT * FROM `admin_login` WHERE `username` = '$username' AND password = '$pass';";
        $user=mysqli_query($conn,$sql);
        if(mysqli_num_rows($user)>0){
            $token = random_int(10000000000, 99999999999999);
            $id_user = mysqli_fetch_assoc ($user);

            setcookie("user_token", $token);

            $sql = 
                "UPDATE `registration` SET `id_token`= '$token' WHERE `id`= '$id_user[id]';";
            mysqli_query($conn,$sql);
            $error="انجام شد ". $id_user['username'] ;
        }else{
            $error="نام کاربری یا رمز عبور اشتباه است";
        }
    }
?>



<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Login</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.rtl.min.css" integrity="sha384-dc2NSrAXbAkjrdm9IYrX10fQq9SDG6Vjz7nQVKdKcJl3pC+k37e7qJR5MVSCS+wR" crossorigin="anonymous">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo" style="color:white">
                    <H4>Admin Login</H4>
                </div>
                <div class="login-form">
                    <form action="./home.php" method="post" >
                        <div class="form-group">
                            <label>UserName</label>
                            <input type="text" class="form-control" name="username">
                        </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password">
                        </div>
                        <hr>        
                        <button type="submit" name="login_admin" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                    </form>
                    <div class="alert alert-light" role="alert">
                        <?php echo $error ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


</body>

</html>
