@extends('layouts.master')
@section('title')
All Product
@endsection

@section('navbar')

@include('layouts.navBar')

@endsection


@section('content')
@php
	$i = 1;
@endphp
@foreach($products as $pro_image)

@if($i>0)
<style>
	.page_title {
	background-image: url({{ asset('images/product/'.$pro_image->images->first()->image) }});
	height: 400px;
	background-size: cover;
	background-position: center;
	background-color: #ddd;
}

</style>

@endif
@php
	$i--;
@endphp
@endforeach

<div class="page_title">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="top_title">
						<h2>Search for</h2>
					</div>
					<div class="page_subtitle">
						<ul>
							<li>
								<a href="{{url('/')}}">home</a>
								
							</li>
							
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

<div class="product_area">
	<div class="container">
		<div class="row">

			@include('layouts.sideBar')
				<div class="col-md-9 top">
					<div class="product_sect1">

						<div class="product_men">
							<div class="row">
								
@foreach($products as $product)
<div class="col-md-4 col-sm-6 col">
	<div class="thumb-item">
		@php $i=1; @endphp
		@foreach($product->images as $pro_img)
		@if($i>0)
		<img src="{{asset('images/product/'.$pro_img->image)}}" alt="" class="image-front">
		@endif
		@php $i--; @endphp
		@endforeach
			<div class="men-cart">
				<div class="inner-men-cart">
					<a href="{{route('singleProduct.show',$product->slug)}}" class="link-product-add-cart">View Product</a>
				</div>
			</div>
			@if($product->offer_price!=NULL)
			<span class="product-new-top">{{$product->offer_price}}% Off</span>
			@endif
			<div class="product_view_caption">
				<a href="{{route('singleProduct.show',$product->slug)}}">
					<h3>{{$product->title}}</h3>
				</a>
				<h4>
					@if($product->offer_price!=NULL)
					<del>&#2547; {{$product->price}}</del>
					{{$product->price-$product->price*$product->offer_price/100}}
					@else
					&#2547; {{$product->price}}
					@endif
				</h4>
				@include('pages.cart-button')
			</div>
			
	</div>
						</div>
						@endforeach

					</div>
				</div>
			</div>
			<div style="margin-top: 15px;float: right;">
			{{$products->links()}}
		</div>
		</div>
		</div>
	</div>
</div>


@endsection