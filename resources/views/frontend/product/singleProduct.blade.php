@extends('layouts.master')
@section('title')
{{$product->title}}
@endsection
@section('content')

<!-- Single Product -->
<div class="page_title">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="top_title">
						<h2>single</h2>
					</div>
					<div class="page_subtitle">
						<ul>
							<li>
								<a href="{{url('/')}}">home</a>
								<span>|</span>
							</li>
							<li class="page_active">single</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div><!-- End of about_page_title -->
	
	
	<div class="product_details_area">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<div class="grid images_3_of_2">
						<div class="flexslider">
							<ul class="slides">
								@foreach($product->images as $img)
								<li data-thumb="{{asset('images/product/'.$img->image)}}">
									<div class="thumb-image"> 
										<img src="{{asset('images/product/'.$img->image)}}" data-imagezoom="true" alt="pro_img" class="img-responsive">
									</div>
								</li>
									
								@endforeach
							</ul>
							<div class="clearfix"></div>
						</div>	
					</div>	
				</div>
       
				<div class="col-md-7">
					<div class="top_right_area">
						<div class="product_content_tile">
							<h3>{{$product->title}}</h3>
							<p>@if($product->offer_price!=NULL)<del>&#2547;45.99</del>@endif &#2547; {{$product->price}}</p>
						</div>
						
						<div class="option_area">
							Quatity :
							<input type="number" name="" value="1" style="width: 70px;">
						</div>  <span style="color: green;">Available Qty: {{$product->quantity}} </span>
						
						<div class="radio_button_area">
							<form action="#" class="product_type">
								Type :
								<br>
								<input type="radio" class="radio_button" id="radio_btn1" name="radio" value="swich">
								<label for="radio_btn1">Casual</label>
								
								<input type="radio" class="radio_button" id="radio_btn2" name="radio" value="swich">
								<label for="radio_btn2">Sneakers</label>
								
								<input type="radio" class="radio_button" id="radio_btn3" name="radio" value="swich">
								<label for="radio_btn3">Formal</label>
							</form>
						</div>
						
						<a href="" class="add_cart_btn add_btn" >Add to cart</a>
							<div class="product_social">
								<h3>Share On:</h3>
								<ul class="product_social_area">
									<li><a href=""><i class="icofont icofont-social-facebook"></i></a></li>
									<li><a href=""><i class="icofont icofont-social-twitter"></i></a></li>
									<li><a href=""><i class="icofont icofont-social-pinterest"></i></a></li>
									<li><a href="#"><i class="icofont icofont-social-linkedin"></i></a></li>
								</ul>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
	<div class="product_tabs_area">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="tab_content">
						<nav>
						  <div class="nav nav-tabs" id="nav-tab" role="tablist">
							<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Description</a>
							<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Brand</a>
							<a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Reviews</a>
						  </div>
						</nav>
						<div class="tab-content" id="nav-tabContent">
							  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
								<div class="tabs_text_area">
									{{$product->description}}
								</div>
							  </div>
							  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
								<div class="tabs_text_area">
									{{$product->brand->name}}
								</div>
							  </div>
							  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
								<div class="tabs_text_area">
									<h2>Lorem ipsum dolor sit amet.</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ut urna a sapien pellentesque consequat at vel metus. Morbi imperdiet augue quam, a varius metus egestas at.</p>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ut urna a sapien pellentesque consequat at vel metus. Morbi imperdiet augue quam, a varius metus egestas at.</p>
								</div>
							  </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
@endsection
