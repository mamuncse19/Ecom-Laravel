


<input type="hidden" name="product_id" id="product_id" value="{{$product->id}}">
<input type="hidden" id="product_qty" value="{{$product->quantity}}">

<input type="button" class="product_add_btn product_btn" id="cart_id" onclick="addToCart({{$product->id}})" value="Add to Cart">


@section('jQuery-script')

 <script>
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

var product_quantity = $("#product_qty").val();

    function addToCart(product_id)
    {
        if(product_quantity>0){
            
        var url = "{{url('/')}}";
        $.ajax({
            method:"post",
            url:url+'/cart/store',
            dataType:"html",
            data:{"product_id":product_id},
            success:function(data){
                data = JSON.parse(data);
                
            
                     $("#totalCartItem").html(data.totalItem);
                    
            }
        });

        }else{
            alert('Sorry!! Product out of stock')
        }
    }

</script>

@endsection
