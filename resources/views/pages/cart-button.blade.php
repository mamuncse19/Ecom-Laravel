
<form method="POST" action="{{route('cart.store')}}">
@csrf

<input type="hidden" name="product_id" value="{{$product->id}}">

<input type="submit" class="product_add_btn product_btn" value="Add to Cart">
</form>