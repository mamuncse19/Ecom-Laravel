@extends('layouts.master')

@section('title')
Welcome
@endsection

@section('slider')
<div class="homepage_slider_area">
        <div class="homepage_slides owl-carousel">
            <div class="single_slide_item slide_bg_1" style="background-image: url({{asset('frontEnd/images/softbuy.jpg')}});"><!-- start of single_slide_item -->
                <div class="single_item_table">
                    <div class="slide_item_tablecell">
                        <div class="container">
                            <div class="row tex">
                                <div class="slider_text_bg">
                                    <h2>big<span>save</span></h2>
                                </div>
                                <h4>Get flat 10% Cashback</h4><br/>
                                <a href="#" class="soft_buy_btn slide_btn">Shop now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End of single_slide_item -->
            
            <div class="single_slide_item slide_bg_1" style="background-image: url({{asset('frontEnd/images/slider2.jpg')}});"><!-- start of single_slide_item -->
                <div class="single_item_table">
                    <div class="slide_item_tablecell">
                        <div class="container">
                            <div class="row tex">
                                <div class="slider_text_bg">
                                    <h2>big<span>save</span></h2>
                                </div>
                                <h4>Get flat 10% Cashback</h4><br/>
                                <a href="#" class="soft_buy_btn slide_btn">Shop now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End of single_slide_item -->
            
            <div class="single_slide_item slide_bg_1" style="background-image: url({{asset('frontEnd/images/slider3.jpg')}});"><!-- start of single_slide_item -->
                <div class="single_item_table">
                    <div class="slide_item_tablecell">
                        <div class="container">
                            <div class="row tex">
                                <div class="slider_text_bg">
                                    <h2>big<span>save</span></h2>
                                </div>
                                <h4>Get flat 10% Cashback</h4><br/>
                                <a href="#" class="soft_buy_btn slide_btn">Shop now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End of single_slide_item -->
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
                                                <a href="#">
                                                    <h3>Add to cart</h3>
                                                </a>
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
           <div style="margin-top: 20px;">{{$products->links()}}</div>
        </div>

    </div>
 


 @endsection