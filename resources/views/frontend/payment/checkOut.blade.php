@extends('layouts.master');

@section('content')

<div class="Checkout_area"><!-- start of about_page_title -->	
		<div class="container">
		
			<div class="row">
				<div class="col-md-12">
					<div class="checkout_title">
						<h2>Checkout</h2>
						<div class="big_hor"></div>
						<div class="small_hor"></div>
					</div><!-- End of login_title -->
				</div><!-- End of col-md-12 -->
			</div><!-- End of row -->
			
	<div class="row">
		<div class="col-md-12">
			<div class="checkout-right">
			<div class="container">
				
				<div class="card card-body">
					<h3>Confirm Item</h3>
					<hr>
						<div class="row">
						<div class="col-md-7 border-right">
						@foreach(App\Model\Cart::totalCarts() as $cart )
						<li>{{$cart->product->title}} - {{$cart->product_quantity}} Item - &#2547; {{$cart->product->price}}</li>
						@endforeach
						<a href="{{route('carts')}}" class="mt-5">Change Cart Item</a>
				</div>

				<div class="col-md-5">
					@php
						$total_price = 0;
						@endphp
					@foreach(App\Model\Cart::totalCarts() as $cart )
						@php
							$total_price += $cart->product->price*$cart->product_quantity;
						@endphp
						@endforeach
						<p>Total Price = &#2547; <strong>{{$total_price}}</strong></p>
						<p>Total Price With Shipping Cost = &#2547; <strong>{{$total_price + App\Model\Setting::first()->shipping_cost}}</strong></p>
				</div>
				</div>
				</div>

			</div>
			</div>
			
				<div class="checkout_details"><!-- start of checkout_details -->
					<div class="address_form">
						<div class="card card-body">
						<h4>Shipping Address</h4>
						<hr>
						
						<form action="#" method="post" class="credit-card-form details_form">
						<div class="credit-wrapper sthree">
							<div class="information-wrapper">
								<div class="details_row">
									<label>Full Name</label>
									<div class="details_control control">
										<input type="text" name="name" placeholder="Full name" class="customer_address_name" value="{{Auth::check() ? Auth::user()->first_name.' '.Auth::user()->last_name : ''}}" required="" />
									</div>
									<div class="card_number_grids">
										<div class="card_number_grids_left">
											<div class="control">
												<input type="text" name="number" placeholder="mobile number" required="" />
											</div>
										</div>
										<div class="card_number_grids_right">
											<div class="control">
												<input type="text" name="landmark" placeholder="landmark" required="" />
											</div>
										</div>
										<div class="clear"></div>
									</div>
									<div class="control">
										<input type="text" name="city" placeholder="town/city" required="" />
									</div>
									
									<div class="control">
										<select name="option" class="option_grids">
											<option>Select Address</option>
											<option>Home</option>
											<option>Office</option>
											<option>Commercial</option>
										</select>
									</div>
								</div>
								<button class="submit_btn checkout_btn">Delivery to this Address</button>
							</div>
						</div>
							
						</form>
						
							<div class="checkout_payment">
								<a href="">Make a Payment</a>
							</div>
					</div>
					</div>
				</div><!-- End of checkout_details -->

					
				</div>
				
			</div>
		</div>
	</div><!-- End of contactpage_map_area -->	

@endsection