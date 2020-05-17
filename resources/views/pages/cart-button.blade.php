
<form method="POST" action="{{route('cart.store')}}">
@csrf

<input type="hidden" name="product_id" id="product_id" value="{{$product->id}}">

<input type="button" class="product_add_btn product_btn" id="cart_id" onclick="addToCart({{$product->id}})" value="Add to Cart">
</form>


@section('jQuery-script')


<script>
	$.ajaxSetup({
	  headers: {
	    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	  }
	});

	function addToCart(product_id)
	{
		$.ajax({
			method:"post",
			url:'http://localhost/newEcommerce/public/cart/store',
			dataType:"html",
			data:{"product_id":product_id},
			success:function(data){
				data = JSON.parse(data);
				
			
					 $("#totalCartItem").html(data.totalItem);
					
			}
		});
	}
</script>
@endsection