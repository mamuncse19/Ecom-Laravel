@extends('layouts.master')
@section('title')
{{$search}}
@endsection
@section('content')
<div class="page_title">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="top_title">
						<h2>Search for {{$search}}</h2>
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
					@php $a = count($products) @endphp
								<div class="product_slides owl-carousel owl-theme">
								<h5>({{$a}}) Products found</h5>
								
								</div>
								<hr>
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
			<span class="product-new-top">Offer</span>
			@endif
			<div class="product_view_caption">
				<a href="{{route('singleProduct.show',$product->slug)}}">
					<h3>{{$product->title}}</h3>
				</a>
				<h4>$35.00
					@if($product->offer_price!=NULL)
					<del>$55.00</del>
					@endif
				</h4>
				<a href="#" class="product_add_btn product_btn">Add to Cart</a>
			</div>
			
	</div>
						</div>
						@endforeach

					</div>
				</div>
			</div>
			<div>
			{{$products->links()}}</div>
		</div>
		</div>
	</div>
</div>


@endsection