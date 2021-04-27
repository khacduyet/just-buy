<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE  | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('public/img/favicon.ico') }}">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('public/frontend/admin/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('public/frontend/admin/plugins/ionicons.min.css') }}">
  <!-- icheck bootstrap -->
  <!-- <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('public/frontend/admin/dist/css/adminlte.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="{{ asset('public/frontend/admin/plugins/css.css') }}">

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="{{ Route('postLogin') }}" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}"> 
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" name="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> -->
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('public/frontend/admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('public/frontend/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<!-- <script src="../../dist/js/adminlte.min.js"></script> -->
<script src="{{ asset('public/frontend/admin/dist/js/adminlte.js') }}"></script>

</body>
</html>


    
    <!-- customer login start -->
    <!-- <div class="customer_login mt-45">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="account_form login">
                        <h2>login</h2>
                        <form action="{{ Route('postLogin') }}" method="post">
                            <p>   
                                <label>Username or email <span>*</span></label>
                                <input type="email" id="email" name="email">
                             </p>
                             <p>   
                                <label>Passwords <span>*</span></label>
                                <input type="password" id="password" name="password">
                             </p>  
                             <input type="hidden" name="_token" value="{{csrf_token()}}"> 
                            <div class="login_submit">
                               <a href="#">Lost your password?</a>
                                <label for="remember">
                                    <input id="remember" name="remember" type="checkbox">
                                    Remember me
                                </label>
                                <button type="submit">login</button>   
                            </div>
                        </form>
                     </div>    
                </div>
            </div>
        </div>    
    </div>
 -->