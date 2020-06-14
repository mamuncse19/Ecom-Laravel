@extends('layouts.master')
@section('title')
{{$product->title}}
@endsection
@section('content')

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
							<p>
								@if($product->offer_price!=NULL)<del>&#2547; {{$product->price}}</del>
								@endif 
								&#2547; {{$product->price-$product->price*$product->offer_price/100}}
								
							</p>
						</div>
						@if($product->quantity>0)
						<div class="option_area">
							Quatity :
							<input type="text" name="" id="rtdmqty" value="1" style="width: 70px;">
						</div>  <span style="color: green;">Available Qty: {{$product->quantity}} </span>
						@else
						<div class="">
							<p style="color: red">Out of Stock</p>
						</div>  <span style="color: green;">Available Qty: {{$product->quantity}} </span>
						@endif
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
						
						@include('pages.cart-button');
						
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
							  
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
@endsection