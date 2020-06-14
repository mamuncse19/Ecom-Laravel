@extends('layouts.master');

@section('content')


	<div class="Checkout_area"><!-- start of about_page_title -->	
		<div class="container">
		
			<div class="row">
				<div class="col-md-12">
					<div class="checkout_title">
						<h2>Your Cart</h2>
						<div class="big_hor"></div>
						<div class="small_hor"></div>
					</div><!-- End of login_title -->
				</div><!-- End of col-md-12 -->
			</div><!-- End of row -->
			@php
				$total_product = count(App\Model\Cart::totalCarts());
				@endphp

				@if($total_product>0)
	<div class="row">
		<div class="col-md-12">
			<div class="checkout-right"><!-- start of checkout-right -->	
				<h4>Your shoping cart contains:
					<span>
						{{$total_product}} Products
					</span>
				</h4>
				<div class="table-responsive">
					<table class="timetable_sub">
						<thead>
							<tr>
								<th>SL No.</th>
								<th>Image</th>
								<th>Product Name</th>
								<th>Quality</th>
								<th>Unit Price</th>
								<th>Sub Total Price</th>
								<th>Remove</th>
							</tr>
						</thead>
						<tbody>
							@php
								$total_price = 0;
							@endphp
							@foreach(App\Model\Cart::totalCarts() as $cart )
							<tr class="check1">
								<td class="invertor">{{$loop->index+1}}</td>
								<td class="invertor-image">
									<a href="{{route('singleProduct.show',$cart->product->slug)}}">
										@if($cart->product->images->count() >0 )
										<img src="{{asset('images/product/'.$cart->product->images->first()->image)}}" alt="g" class="img-responsive">
										@endif
									</a>
								</td>
								
								<td class="invertor"><a href="{{route('singleProduct.show',$cart->product->slug)}}">{{$cart->product->title}}</a></td>
								<td class="invertor">
									<div class="quantity">
										<form method="post" action="{{route('cart.update',$cart->id)}}">
												@csrf
											<div class="quantity-select mb-1">
												<span><input type="number" name="product_quantity" class="quantity-input" value="{{$cart->product_quantity}}"></span>
											</div>
											
											<div class="update-quantity"> 
												
												<button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button></div>
                           
											</form>
										</div>

									</div>
								</td>
								<td class="invertor">
									@if($cart->product->offer_price!=NULL)
									&#2547; {{$cart->product->price-$cart->product->price*$cart->product->offer_price/100}}
									@else
									&#2547; {{$cart->product->price}}
									@endif
									</td>
								<td class="invertor">
									@if($cart->product->offer_price!=NULL)
									@php
										$price = $cart->product->price-$cart->product->price*$cart->product->offer_price/100;
										$total_price += $price*$cart->product_quantity;
									@endphp
									&#2547; {{$price*$cart->product_quantity}}</td>
									@else
									@php
										$total_price += $cart->product->price*$cart->product_quantity;
									@endphp
									&#2547; {{$cart->product->price*$cart->product_quantity}}</td>
									@endif
									
								<td class="invertor">
									<div class="check">
										<form method="post" action="{{route('cart.delete',$cart->id)}}">
												@csrf
										<div><button type="submit" style="cursor: pointer;"><i class="icofont icofont-close"></i></button></div>
									</form>
									</div>
								</td>
							</tr>
							@endforeach
							<tr>
								<td colspan="4"></td>
								<td>Total Amount =</td>
								<td colspan="1">&#2547; {{$total_price}}</td>
							</tr>
						</tbody>
					</table>
					<div class="float-right mt-4">
						<a href="{{ route('allProduct.show') }}" class="btn btn-primary">Continue Shopping..</a>
						<a href="{{route('checkouts')}}" class="btn btn-warning">Ceckout</a>
					</div>
				</div>
			</div><!-- End of checkout-right -->
			@else
			<div class="row">
		<div class="col-md-12">
			<div class="checkout-right">
				<div class="alert alert-warning">
					<strong>Your cart has empty</strong>
				</div>
				<a href="{{ route('allProduct.show') }}" class="btn btn-primary">Continue Shopping..</a>
			</div>
			</div>
			</div>
			@endif
			
				
					
				</div>
				
			</div>
		</div>
	</div><!-- End of contactpage_map_area -->	
@endsection