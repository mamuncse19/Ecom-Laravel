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
			@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
	<div class="row">
		<div class="col-md-12">
			<div class="checkout-right">
			<div class="container">
				
				<div class="card">
					<h3 class="card-header">Confirm Item</h3>
						<div class="row ml-2 mt-3 mb-4">
						<div class="col-md-7 border-right">
						<ol class="ml-3">
						@foreach(App\Model\Cart::totalCarts() as $cart )
						<li>{{$cart->product->title}} - {{$cart->product_quantity}} Item - @if($cart->product->offer_price!=NULL)
                                    &#2547; {{$cart->product->price-$cart->product->price*$cart->product->offer_price/100}}
                                    @else
                                    &#2547; {{$cart->product->price}}
                                    @endif
                                </li>
						@endforeach
					</ol>
						
						<a href="{{route('carts')}}">Change Cart Item</a>
				</div>

				<div class="col-md-5">
					@php
						$total_price = 0;
						@endphp
					@foreach(App\Model\Cart::totalCarts() as $cart )
						@if($cart->product->offer_price!=NULL)
                                    @php
                                        $total_price += $cart->product->price-$cart->product->price*$cart->product->offer_price/100;
                                    @endphp
                                    @else
                                    @php
                                        $total_price += $cart->product->price*$cart->product_quantity;
                                    @endphp
                                    @endif
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
						
						<div class="card mb-3">
                <h3 class="card-header">{{ __('Shipping Address') }}</h3>

                <div class="card-body">
                    <form method="POST" action="{{ route('checkout.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Receiver Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::check() ? Auth::user()->first_name.' '.Auth::user()->last_name : '' }}">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::check() ? Auth::user()->email : '' }}">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone_no" class="col-md-4 col-form-label text-md-right">{{ __('Phone No') }}</label>

                            <div class="col-md-6">
                                <input id="phone_no" type="text" class="form-control @error('phone_no') is-invalid @enderror" name="phone_no" value="{{ Auth::check() ? Auth::user()->phone_no : '' }}" required>

                                @error('phone_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                   
                        <div class="form-group row">
                            <label for="message" class="col-md-4 col-form-label text-md-right">{{ __('Message') }}(Optional)</label>

                            <div class="col-md-6">
                                <textarea id="message" class="form-control @error('message') is-invalid @enderror" name="message"></textarea>

                                @error('message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="shipping_address" class="col-md-4 col-form-label text-md-right">{{ __('Shipping Address') }}</label>

                            <div class="col-md-6">
                                <textarea id="shipping_address" class="form-control @error('shipping_address') is-invalid @enderror" name="shipping_address"  required>{{ Auth::check() ? Auth::user()->shipping_address : '' }}</textarea>

                                @error('shipping_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="payment_method" class="col-md-4 col-form-label text-md-right">{{ __('Payment Method') }}</label>

                            <div class="col-md-6">
                                <select class="form-control @error('payment_method') is-invalid @enderror" name="payment_method_id" id="payment_id" required>
                                    <option value="-1">Please Select Payment Method</option>
                                    @foreach($payment_methods as $key => $payment_method)

                                    <option value="{{$payment_method->short_name}}">{{$payment_method->name}}</option>
                                    @endforeach
                                </select>

                                @error('payment_method')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                               
                                		@foreach($payment_methods as $payment_method)
                                		
                                		@if($payment_method->short_name == "cash_in")
                                		 <div class="payment" id="payment_{{$payment_method->short_name}}">
                                	<div class="card card-body mt-2 alert alert-success">
                                		<h4>Just click order button </h4>
                                		</div>
                                    </div>
                                    @else
                                    <div class="payment" id="payment_{{$payment_method->short_name}}">
                                	<div class="card card-body mt-2 mb-0 alert alert-success text-center">
                                		<h5>A/C Name: {{$payment_method->name}}</h5>
                                		<p>A/C Number: <strong>{{$payment_method->a_c_no}}</strong></p>
                                		<p>A/C Type: <strong>{{$payment_method->type}}</strong></p><hr>
                                		<p>Please send the above money to this number and write your transaction code below:</p>
                                		
                                    </div>
                                    </div>
                                		@endif
                                		@endforeach
                                		<div class="payment" id="transaction_id">
                                			<div class="card card-body alert alert-success text-center">
                                			<input type="text" name="transaction_id" placeholder="Enter transaction code">
                                		</div>
                                		</div>
                                		
                                	
                                		
                            </div>
                        </div>

                       

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Order Now') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
							<div class="checkout_payment">
								<a href="">Make a Payment</a>
							</div>
					
					</div>
				</div><!-- End of checkout_details -->

					
				</div>
				
			</div>
		</div>
	</div><!-- End of contactpage_map_area -->	

@endsection

@section('jQuery-script')

<script>
	
	$(document).ready(function(){
		$("#payment_id").on("change",function(){
			var payment_name = $("#payment_id option:selected").val();
			if(payment_name=="cash_in")
			{
				$("#payment_cash_in").removeClass('payment');
				$("#payment_bkash").addClass('payment');
				$("#payment_rocket").addClass('payment');
				$("#transaction_id").addClass('payment');
			}

			else if(payment_name=="bkash"){
				$("#payment_cash_in").addClass('payment');
				$("#payment_bkash").removeClass('payment');
				$("#payment_rocket").addClass('payment');
				$("#transaction_id").removeClass('payment');
			}
			else if(payment_name=="rocket"){
				$("#payment_cash_in").addClass('payment');
				$("#payment_bkash").addClass('payment');
				$("#payment_rocket").removeClass('payment');
				$("#transaction_id").removeClass('payment');
			}
		});
	});

</script>

@endsection