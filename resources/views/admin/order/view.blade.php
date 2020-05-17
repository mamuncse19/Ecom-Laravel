@extends('admin.index')
@section('title')
Orders
@endsection
@section('head-nav')
<nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{url('admin/')}}">Dashboard</a>
        <span class="breadcrumb-item active">Order</span>
      </nav>
@endsection
@section('MainContent')
<div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>ES{{$order->id}} Order View</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Order Information</h6>
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
         	<div class="col-md-8" style="color: #2b333e">
         		<p>Order Name: <strong>{{$order->name}}</strong></p>
         		<p>Order Phone: <strong>{{$order->phone_no}}</strong></p>
         		<p>Order Email: <strong>{{$order->email}}</strong></p>
         		<p>Order Shipping Address: <strong>{{$order->shipping_address}}</strong></p>
         	</div>
         	<div class="col-md-4" style="color: #2b333e">
         		@if($order->payment->name == "Cash In")
         		<p>Payment Method Name: <strong>{{$order->payment->name}}</strong></p>
         		@else
         		<p>Payment Method Name: <strong>{{$order->payment->name}}</strong></p>
         		<p>Payment Method TnxId: <strong>{{$order->transaction_id}}</strong></p>
         		@endif
         		
         	</div>
         </div>
         <hr/>
         <h4 style="color: black;">Ordered Items</h4>
         <!-- start of checkout-right -->	
				@if($order->carts->count()>0)
				<div class="table-wrapper">
					<table class="table display responsive nowrap">
						<thead>
							<tr>
								<th class="wd-5p text-center">SL No.</th>
								<th class="wd-20p text-center">Image</th>
								<th class="wd-15p text-center">Product Name</th>
								<th class="wd-15p text-center">Quality</th>
								<th class="wd-15p text-center">Unit Price</th>
								<th class="wd-20p text-center">Sub Total Price</th>
								<th class="wd-10p text-center">Remove</th>
							</tr>
						</thead>
						<tbody>
							@php
								$total_price = 0;
							@endphp
							@foreach($order->carts as $cart )
							<tr class="check1">
								<td class="text-center">{{$loop->index+1}}</td>
								<td class="text-center">
									<a href="{{route('singleProduct.show',$cart->product->slug)}}">
										@if($cart->product->images->count() >0 )
										<img src="{{asset('images/product/'.$cart->product->images->first()->image)}}" style="height: 60px; width: 80px;">
										@endif
									</a>
								</td>
								
								<td class="text-center"><a href="{{route('singleProduct.show',$cart->product->slug)}}">{{$cart->product->title}}</a></td>
								<td class="text-center">
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

									
								</td>
								<td class="text-center">&#2547; {{$cart->product->price}}</td>
								<td class="text-center">
									@php
										$total_price += $cart->product->price*$cart->product_quantity;
									@endphp
									&#2547; {{$cart->product->price*$cart->product_quantity}}</td>
								<td class="text-center">
									<div class="check">
										<form method="post" action="{{route('cart.delete',$cart->id)}}">
												@csrf
										<div><button type="submit" class="btn btn-danger" style="cursor: pointer;">Delete</button></div>
									</form>
									</div>
								</td>
							</tr>
							@endforeach
							<tr>
								<td colspan="4"></td>
								<td class="text-center">Total Amount =</td>
								<td class="text-center">&#2547; {{$total_price}}</td>
							</tr>
						</tbody>
					</table>
					<div class="container">
						<div class="row">
							<form method="post" action="{{route('admin.order.dis-ship-cost-update',$order->id)}}">
								@csrf
								<label>Shipping Cost</label>
                				<input class="" name="shipping_cost" type="number" value="{{$order->shipping_cost}}">
                				<label>Discount</label>
                				<input class="" name="custom_discount" type="number" value="{{$order->custom_discount}}">
                				<button type="submit" class="btn btn-primary">Update</button>
							</form>
						</div>
					</div>
					
				<div style="float: right;">
					<a href="{{route('admin.order.invoice-generate',$order->id)}}" class="btn btn-teal active" target="_blank" >Generate Invoice</a>
				@if($order->is_paid)
				<a href="{{route('admin.order.pay',$order->id)}}" class="btn btn-danger">Cancel Payment</a>
				@else
				<a href="{{route('admin.order.pay',$order->id)}}" class="btn btn-success">Paid Order</a>
				@endif

				@if($order->is_completed)
				<a href="{{route('admin.order.complete',$order->id)}}" class="btn btn-danger">Cancel Order</a>
				@else
				<a href="{{route('admin.order.complete',$order->id)}}" class="btn btn-success">Complete Order</a>
				@endif

				</div>
			</div>
			@else
			<p><strong>Nothing Ordered</strong></p>
			@endif
		</div>
	</div>
       
        
@endsection