@extends('layouts.master')

@section('title')
Welcome
@endsection

@section('navbar')
@include('layouts.navBar')
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
                                <a href="{{$slider->button_link}}" target="_blank" class="soft_buy_btn slide_btn">{{$slider->button_text}}</a>
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
                    <div class="freture_tab_area"><!-- start of freture_tab_area -->
                       
                        
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="Electronics" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="tabcontent_grids">
                                @foreach($products as $product)
                                <div class="col-sm-4 col-md-3 item_grids">
                                    <div class="feature_item">
                                        <div class="gerlly_item gerlly">
                                            @if($product->offer_price!=NULL)
                                            <div class="product_new_tag">
                                                <h5>{{$product->offer_price}}% Off</h5>
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
                                                <p>@if($product->offer_price!=NULL)<del>&#2547;{{$product->price}}</del>
                                                    &#2547; {{$product->price-$product->price*$product->offer_price/100}}
                                                    @else &#2547; {{$product->price}}@endif</p>
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