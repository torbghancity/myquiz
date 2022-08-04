<!doctype html>

<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Panel</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="/Public/images/favicon.ico">
    

    <link rel="stylesheet" href="/Public/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Public/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/Public/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="/Public/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="/Public/vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="/Public/assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body>

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand">Admin Panel</a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="login_admin"> <i class="menu-icon fa fa-dashboard"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="exam_admin"> <i class="menu-icon fa fa-close"></i>Add & Edit Exam</a>
                    </li>
                    <li>
                        <a href="selectexam"> <i class="menu-icon fa fa-close"></i>Add & Edit Question</a>
                    </li>
                    <li>
                        <a href="index.html"> <i class="menu-icon fa fa-close"></i>Logout</a>
                    </li>
                    
                </ul>
            </div>
        </nav>
    </aside>

    <div id="right-panel" class="right-panel">

        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">

                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>
                </div>
            </div>

        </header>

@yield("content")

    </div>

<script src="Public/vendors/jquery/dist/jquery.min.js"></script>
<script src="Public/vendors/popper.js/dist/umd/popper.min.js"></script>

<script src="Public/vendors/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="Public/vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js"></script>

<script src="Public/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="Public/assets/js/main.js"></script>
</body>
</html>  