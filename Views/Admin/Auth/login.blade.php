@extends("Layout.admin")

@section('Title', 'ورود ادمین')

@section("content")

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
                    {{$error}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection