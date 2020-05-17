@extends('layouts.master')

@section('title')
Welcome
@endsection

@section('navbar')
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

                           <li><a href="{{ route('allProduct.show') }}">Shop</a></li>
                        </ul>
                    </div><!-- End of main_menu -->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('slider')
<div class="homepage_slider_area">
        <div class="homepage_slides owl-carousel">
            @foreach(App\Model\Slider::all() as $slider)
             <div class="single_slide_item slide_bg_1" style="background-image: url({{asset('images/slider/'.$slider->image)}});">
                <div class="single_item_table">
                    <div class="slide_item_tablecell">
                        <div class="container">
                            <div class="row tex">
                                <div class="slider_text_bg">
                                    <h2><span>{{$slider->title}}</span></h2>
                                </div>
                                <h4 style="color: red;">{{$slider->text}}</h4><br/>
                                <a href="{{$slider->button_link}}" class="soft_buy_btn slide_btn">{{$slider->button_text}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End of single_slide_item -->

            @endforeach
        </div>
    </div>
@endsection
@section('content')

<div class="feature_products_area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="feature_title"><!-- start of feature_title -->
                        <h2>Feature Products</h2>
                        <div class="big_hor"></div>
                        <div class="small_hor"></div>
                    </div><!-- End of feature_title -->
                </div><!-- End of col-md-12 -->
            </div><!-- End of row -->
    
            <div class="row">
                <div class="col-md-12">
                    <div class="freture_tab_area"><!-- start of freture_tab_area -->
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#Electronics" role="tab"  aria-selected="true">
                                <i class="icofont icofont-lamp"></i>
                                <h4>Latest</h4>
                            </a>
                          </li>
                        
                        </ul>
                        <div class="clearfix"> </div>
                        
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="Electronics" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="tabcontent_grids">
                                @foreach($products as $product)
                                <div class="col-sm-4 col-md-3 item_grids">
                                    <div class="feature_item">
                                        <div class="gerlly_item gerlly">
                                            @if($product->offer_price!=NULL)
                                            <div class="product_new_tag">
                                                <h5>15% Off</h5>
                                            </div>
                                            @endif
                                            <a href="#">
                                                @php $i=1; @endphp
                                                @foreach($product->images as $pro_img)
                                                @if($i>0)
                                                <img src="{{asset('images/product/'.$pro_img->image)}}" alt="a" class="img-responsive"/>
                                                @endif
                                                @php $i--; @endphp
                                                @endforeach

                                            </a>
                                            
                                                <div class="feature_hover">
                                                    <a target="_blank" href="{{route('singleProduct.show',$product->slug)}}">
                                                        <h2>View product</h2>
                                                    </a>
                                                </div>
                                            
                                        </div>
                                            <div class="view_product_caption">
                                                <h4><a href="">{{$product->title}}</a></h4>
                                                <p>@if($product->offer_price!=NULL)<del>&#2547;45.99</del>@endif &#2547; {{$product->price}}</p>
                                                @include('pages.cart-button')
                                            </div>
                                    </div>
                                </div>
                                @endforeach
                                
                
                            </div>
                        </div><!-- End of Electronics Tab -->
                            
                         
                          
                        </div>
                    </div><!-- start of freture_tab_area -->

                </div>
            </div>
          
        </div>

    </div>
 


 @endsection