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
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>@yield('title')</title>
    
    <!-- favicon.ico css -->
    <link rel="shortcut icon" type="image/x-icon" href="images/1531649874.ico">
    
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
    
    <!-- responsive css -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontEnd/css/responsive.css')}}" media="all" />
</head>
<body>
    
    
    
    
    <div class="header_top_area" id="home"><!-- start of header_top_area -->
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <div class="logo"><!-- start of logo -->
                        <img src="{{asset('frontEnd/images/a2.png')}}" alt="logo"/>
                    </div><!-- End of logo -->
                </div>
                <div class="col-md-9 col-sm-9 text-right">
                    <div class="header_top_search"><!-- start of header_top_search -->
                        <form action="{{route('search')}}" method="get">
                            @csrf
                            <input type="search" name="search" placeholder="Search" required="">
                            <button type="submit" class="search_btn search_btn_top" aria-label="Left Align">
                                <i class="icofont icofont-search"></i>
                            </button>
                        </form>
                    </div><!-- End of header_top_search -->
                    
                    <div class="header_right_area"><!-- start of header_right_area -->
                        <div class="header_cart"><!-- start of header_cart -->
                            <a href="#"><i class="icofont icofont-shopping-cart"></i></a>
                        </div><!-- End of header_cart -->
                        
                        <div class="myaccount"><!-- start of myaccount -->
                            <a href="#">my account</a>
                        </div><!-- End of myaccount -->
                        
                    </div><!-- End of header_right_area -->
                    
                </div>
            </div>
        </div>
    </div><!-- End of header_top_area -->
    
    <div class="main_menu_area"><!-- start of main_menu_area -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="responsive_menu_wrap"></div>
                    <div class="main_menu"><!-- start of main_menu -->
                        <ul id="navwrap">
                            <li><a href="{{URL::to('/')}}">Home</a></li>
                            @foreach(App\Model\Category::where('parent_id',NULL)->orderBy('name','asc')->get() as $parent_cat)
                            <li><a href="#main-{{$parent_cat->id}}" data-toggle="collapse">{{$parent_cat->name}}</a>
                                <div class="Mega_menu collapse" id="main-{{$parent_cat->id}}">
                                     
                                        
                                    @foreach(App\Model\Category::where('parent_id',$parent_cat->id)->orderBy('name','asc')->get() as $sub_cat)
                                   <ul>
                                        <li><a href="#"><i class="icofont icofont-rounded-right">{{$sub_cat->name}}</i></a></li>
                                        
                                   </ul>
                               @endforeach

                                     
                                </div><!-- End of Mega_menu -->
                            </li>
                           @endforeach
                        </ul>
                    </div><!-- End of main_menu -->
                </div>
            </div>
        </div>
    </div><!-- End of main_menu_area -->
    
    <!-- start of homepage_slider_area -->
    @yield('slider')
    <!-- End of homepage_slider_area -->
    
    
    
    
    
    <!-- start of feature_products_area -->
    @yield('content')
    <!-- End of feature_products_area -->
    
    
    
    
   
    
    
    <div class="service_area"><!-- start of service_area -->
        <div class="container">
            <div class="row">
                <div class="col-md-4 serv">
                    <div class="service_content_area"><!-- start of service_content_area -->
                        <div class="col-md-3">
                            <div class="item text-left">
                                <a href="#"><i class="icofont icofont-car-alt-4"></i></a>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="item_content text-left">
                                <h3>Free delivery</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quis nulla vel est ullamcorper semper. </p>
                            </div>
                        </div>
                    </div><!-- End of service_content_area -->
                </div>
                
                <div class="col-md-4 serv">
                    <div class="service_content_area"><!-- start of service_content_area -->
                        <div class="col-md-3">
                            <div class="item text-left">
                                <a href="#"><i class="icofont icofont-business-man-alt-2"></i></a>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="item_content text-left">
                                <h3>Customer care</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quis nulla vel est ullamcorper semper. </p>
                            </div>
                        </div>                      
                    </div><!-- End of service_content_area -->
                </div>
                
                <div class="col-md-4 serv">
                    <div class="service_content_area"><!-- start of service_content_area -->
                        <div class="col-md-3">
                            <div class="item text-left">
                                <a href="#"><i class="icofont icofont-thumbs-up"></i></a>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="item_content text-left">
                                <h3>good quality</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quis nulla vel est ullamcorper semper. </p>
                            </div>
                        </div>
                    </div><!-- End of service_content_area -->
                </div>
            </div>
        </div>
        <div class="service_area_overlay"></div>
    </div><!-- End of product_slider_area -->
    
    <div class="newletter_area"><!-- start of newletter_area -->
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="newsletter_content"><!-- start of newsletter_content -->
                        <h3>news letter</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div><!-- End of newsletter_content -->
                </div>
                <div class="col-md-7">
                    <div class="newsletter_form"><!-- start of newsletter_form -->
                        <form action="#">
                            <input type="email" placeholder="Email Address here"/>
                            <button class="newsletter_btn form_btn">Subscribe</button>
                        </form>
                    </div><!-- End of newsletter_form -->
                </div>
            </div>
        </div>
    </div><!-- End of newletter_area -->
    
    
    <div class="footer_area"><!-- start of footer_area -->
        <div class="container">
            <div class="row footer_hor">
                <div class="col-md-3">
                    <div class="footer_about_text"><!-- start of footer_about_text -->
                        <div class="footer_title">
                            <h2>About Us</h2>
                            <div class="footer_title_hor"></div>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur imperdiet mauris eget magna consequat ullamcorper. </p>
                        <div class="footer_social_nav">
                            <ul>
                                <li><a href="#"><i class="icofont icofont-social-facebook"></i></a></li>
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
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Clothing</a></li>
                            <li><a href="#">Electronics</a></li>
                            <li><a href="#">Personal care</a></li>
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
                            <li><a href="#">Shipping</a></li>
                            <li><a href="#">Terms & condition</a></li>
                            <li><a href="#">Fags</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Online Shopping</a></li>
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
                            <li><a href="#">Wishlist</a></li>
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
    
    <!-- start-smoth-scrolling -->

    <!-- main.js --> 
    <script src="{{asset('frontEnd/js/main.js')}}"></script>
    
    
    
    
    
</body>
</html>