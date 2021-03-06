<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Soft-Buy - Responsive Template">
    <meta name="keywords" content="best html5 template, bootstrap, template ,best premium template, best Soft-Buy template, Soft-Buy template">
    <meta name="author" content="shiplu">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>@yield('title')</title>
    
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontEnd/css/bootstrap.min.css')}}" media="all" />
    <!-- icofont css -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontEnd/css/icofont.css')}}" media="all" />
    <!-- carousel css -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontEnd/css/owl.carousel.min.css')}}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontEnd/css/owl.theme.default.min.css')}}" media="all" />
    <!-- animate css -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontEnd/css/animate.min.css')}}" media="all" />
    <!-- counterup css -->
    <link href="{{asset('frontEnd/css/jquery.classycountdown.css')}}" rel="stylesheet" type="text/css">
    
    <!-- query.wm-zoom-1 css -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontEnd/css/jquery.wm-zoom-1.0.min.css')}}" media="all" />
    <!-- flexslider css -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontEnd/css/flexslider.css')}}" media="all" />
    <!-- fonts/stylesheet css -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontEnd/fonts/stylesheet.css')}}" media="all" />
    
    <!-- slicknav css -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontEnd/css/slicknav.min.css')}}" media="all" />
    
    <!-- main css -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontEnd/css/main.css')}}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontEnd/css/style.css')}}" media="all" />
    
    <!-- responsive css -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontEnd/css/responsive.css')}}" media="all" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.css">

 
</head>
<body>
    
     <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif

                        @else
                            <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><img src="{{App\Helpers\ImageHelper::getUserImage(Auth::user()->id)}}" style="width:40px; border-radius: 50%;">{{ Auth::user()->first_name }} {{ Auth::user()->last_name}}<span class="caret"></span>
                        </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('user.dashboard') }}">
                                        {{ __('My Dashboard') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                          
                        @endguest
                    </ul>
                </div>
            
        </nav>
    
    
    <div class="header_top_area" id="home"><!-- start of header_top_area -->
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3" style=" padding-top: 0px; margin-top: 0px;">
                    <div class="logo" style=" padding-top: 0px; margin-top: 0px;"><!-- start of logo -->
                        <a href="{{url('/')}}">
                        <img src="{{asset('images/logo/logo.png')}}" alt="logo"/>
                    </a>
                    </div><!-- End of logo -->
                </div>
                <div class="col-md-9 col-sm-9 text-right" style=" padding-top: 0px; margin-top: 0px;">
                    <div class="header_top_search" style=" padding-top: 0px; margin-top: 0px;"><!-- start of header_top_search -->
                        <form action="{{route('search')}}" method="get" style=" padding-top: 0px; margin-top: 0px;">
                            @csrf
                            <input type="search" name="search" placeholder="Search" required="" style=" margin-top: 20px;">
                            <button type="submit" class="search_btn search_btn_top" aria-label="Left Align" style=" margin-top: 20px;" >
                                <i class="icofont icofont-search"></i>
                            </button>
                        </form>
                   
                    
                    <div class="header_right_area" style=" padding-top: 0px; margin-top: 0px;"><!-- start of header_right_area -->
                        <div class="header_cart" style=" padding-top: 0px; margin-top: 20px;"><!-- start of header_cart -->
                            <a href="{{route('carts')}}"><i class="icofont icofont-shopping-cart"></i><span><button class="btn btn-danger" id="totalCartItem" style="position: absolute;">{{App\Model\Cart::totalItem()}}</button></span></a>
                        </div><!-- End of header_cart -->

                        
                    
                </div>
            </div>
        </div>
    </div><!-- End of header_top_area -->
    
    @include('layouts.navBar')
    <!-- End of main_menu_area -->
    
    <!-- start of homepage_slider_area -->
    @yield('slider')
    <!-- End of homepage_slider_area -->
    
    
    
    
    
    <!-- start of feature_products_area -->
    @yield('content')
    <!-- End of feature_products_area -->
    
    
    
    
   
    
    
   
    
    
    
    <div class="footer_area"><!-- start of footer_area -->
        <div class="container">
            <div class="row footer_hor">
                <div class="col-md-3">
                    <div class="footer_about_text"><!-- start of footer_about_text -->
                        <div class="footer_title">
                            <h2>About Us</h2>
                            <div class="footer_title_hor"></div>
                        </div>
                        <p>Coming Soon...</p>
                        <div class="footer_social_nav">
                            <ul>
                                <li><a href="https://www.facebook.com/mamunhossain420" target="_blank"><i class="icofont icofont-social-facebook"></i></a></li>
                                <li><a href="#"><i class="icofont icofont-social-pinterest"></i></a></li>
                                <li><a href="#"><i class="icofont icofont-social-twitter"></i></a></li>
                                <li><a href="#"><i class="icofont icofont-social-google-plus"></i></a></li> 
                            </ul>
                        </div>
                    </div><!-- End of footer_about_text -->
                </div>
                <div class="col-md-3">
                    <div class="footer_title">
                        <h2>Menu</h2>
                        <div class="footer_title_hor"></div>
                    </div>
                    
                    <div class="footer_menu"><!-- start of footer_menu -->
                        <ul>
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li><a href="https://www.facebook.com/mamunhossain420">About</a></li>
                            
                        </ul>
                    </div><!-- End of footer_menu -->
                </div>
                <div class="col-md-3">
                    <div class="footer_title">
                        <h2>Category</h2>
                        <div class="footer_title_hor"></div>
                    </div>
                    
                    <div class="footer_category"><!-- start of footer_category -->
                        <ul>
                            @foreach(App\Model\Category::where('parent_id',NULL)->orderBy('id','asc')->get() as $parent_cat)
                            <li><a href="{{route('categoryWisePorduct.Show',$parent_cat->id)}}">{{$parent_cat->name}}</a>
                                
                            </li>
                           @endforeach
                        </ul>
                    </div><!-- End of footer_category -->
                </div>
                <div class="col-md-3">
                    <div class="footer_title">
                        <h2>My Account</h2>
                        <div class="footer_title_hor"></div>
                    </div>
                    
                    <div class="footer_account"><!-- start of footer_account -->
                        <ul>
                            <li><a href="#">Login</a></li>
                            <li><a href="#">Registration</a></li>
                        </ul>
                    </div><!-- End of footer_account -->
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="footer_copy"><!-- End of footer_copy -->
                        <h4>&copy; {{date('Y')}} Mamun Hossain. All Rights Reserved</h4>
                    </div><!-- start of footer_copy -->
                </div>
            </div>
        </div>
        <a href="#" class="scrollup"><i class="icofont icofont-long-arrow-up"></i></a>
    </div><!-- End of footer_area -->
    
    
    

    
    <!-- =========================
                  SCRIPTS 
    ============================== --> 
    <!-- jquery.js -->
    <script  src="{{asset('frontEnd/js/jquery-2.1.4.min.js')}}"></script>
    
    <!-- Boostrap.js --> 
    <script  src="{{asset('frontEnd/js/bootstrap.min.js')}}"></script>
    <!-- carousel.js --> 
    <script  src="{{asset('frontEnd/js/owl.carousel.min.js')}}"></script>
    <!-- wow.js --> 
    <script  src="{{asset('frontEnd/js/wow.min.js')}}"></script>
    
    <!-- counterup.js --> 
    <script src="{{asset('frontEnd/js/jquery.knob.js')}}"></script>
    <script src="{{asset('frontEnd/js/jquery.throttle.js')}}"></script>
    <script src="{{asset('frontEnd/js/jquery.classycountdown.js')}}"></script>
    <!-- flexslider.js --> 
    <script src="{{asset('frontEnd/js/jquery.flexslider.js')}}"></script>
    <!-- imagezoom.js --> 
    <script src="{{asset('frontEnd/js/imagezoom.js')}}"></script>
    <!-- slicknav.js --> 
    <script src="{{asset('frontEnd/js/jquery.slicknav.min.js')}}"></script>

    <!-- For jQuery Custom script --> 
    @yield('jQuery-script')

    <!-- start-smoth-scrolling -->

    <!-- main.js --> 
    <script src="{{asset('frontEnd/js/main.js')}}"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.js"></script>
    <script>
     @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch(type){
        case 'info':
        toastr.info("{{ Session::get('message') }}");
        break;
         case 'success':
        toastr.success("{{ Session::get('message') }}");
        break;
        case 'warning':
        toastr.warning("{{ Session::get('message') }}");
        break;
        case 'error':
        toastr.error("{{ Session::get('message') }}");
        break;
    }
    @endif
    </script>

    
</body>
</html>