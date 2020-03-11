<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>LoginForm</title>

    <!-- vendor css -->
    <link href="{{asset('admin_css_js/lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('admin_css_js/lib/Ionicons/css/ionicons.css')}}" rel="stylesheet">


    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{asset('admin_css_js/css/starlight.css')}}">
  </head>

  <body>

    @guest
    
<div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">

      <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
        <div class="signin-logo tx-center tx-24 tx-bold tx-inverse"><span class="tx-info tx-normal">Admin</span> Login</div>
        <div class="tx-center mg-b-60"></div>

        <form method="post" action="{{ route('admin.login.submit') }}">
            @csrf
        <div class="form-group">
          <input type="text" class="form-control" name="email" placeholder="Enter your email">
        </div><!-- form-group -->
        <div class="form-group">
          <input type="password" class="form-control" name="password" placeholder="Enter your password">
          <a href="" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>
        </div><!-- form-group -->
        <button type="submit" class="btn btn-info btn-block">Sign In</button>

        <div class="mg-t-60 tx-center">Not yet a member? <a href="page-signup.html" class="tx-info">Sign Up</a></div>
        </form>
      </div><!-- login-wrapper -->
    </div><!-- d-flex -->
    @else
<?php
 redirect()->intended(route('admin.dashboard'));
?>
    
    @endguest

    <script src="admin_css_js/lib/jquery/jquery.js"></script>
    <script src="admin_css_js/lib/popper.js/popper.js"></script>
    <script src="admin_css_js/lib/bootstrap/bootstrap.js"></script>

  </body>
</html>
