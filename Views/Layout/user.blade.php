@php
use App\Auth\Auth;
@endphp

<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.rtl.min.css" integrity="sha384-dc2NSrAXbAkjrdm9IYrX10fQq9SDG6Vjz7nQVKdKcJl3pC+k37e7qJR5MVSCS+wR" crossorigin="anonymous">    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Quiz Online - @yield("Title")</title>
</head>
<body>
  
<nav class="navbar navbar-expand-lg bg-light">
      <div class="container-fluid">
        <h3 class="navbar-brand">سوالات آنلاین</h3>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="exam" dideo-checked="true">خانه</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" dideo-checked="true">درباره ما</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" dideo-checked="true">تماس با ما</a>
            </li>
            @php
              if ($userdata = Auth::user()) {
            @endphp
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" dideo-checked="true">
                    {{$userdata["name"]}}
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#" dideo-checked="true">مشخصات</a></li>                
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="logout" dideo-checked="true">خروج</a></li>
                  </ul>
                </li>
            @php
              }else{
            @endphp
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" dideo-checked="true">
                    کاربری
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="login" dideo-checked="true">ورود</a></li>                
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="register" dideo-checked="true">ایجاد حساب</a></li>
                  </ul>
                </li>     
            @php
              }
            @endphp    
          </ul>
        </div>
      </div>
    </nav>

@yield("content")


    <footer class="bg-light text-center text-lg-start">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(55, 0, 255, 0.2);">
          تهیه و تنظیم توسط علیرضا رضایی 
          <a class="text-dark" href="http://torbghancity.blogfa.com/">تربقان</a>
        </div>
        <!-- Copyright -->
      </footer>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>  