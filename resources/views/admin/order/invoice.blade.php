<html>
<head>
  <title>Invoice - {{ $order->id }}</title>

  <link rel="stylesheet" href="{{asset('admin_css_js/invoice/admin_style.css')}}">
  <style>
  .content-wrapper{
    background: #FFF;
  }
  .invoice-header {
    background: #f7f7f7;
    padding: 10px 20px 10px 20px;
    border-bottom: 1px solid gray;
}
.invoice-header img {
    
    padding-top: 20px;
    
}
.invoice-right-top h3 {
    padding-right: 20px;
    margin-top: 20px;
    color: #ec5d01;
    font-size: 55px!important;
    font-family: serif;
}
.invoice-left-top {
    border-left: 3px solid #ec5d00;
    padding-left: 20px;
    padding-top: 20px;
}
thead {
        background: #ec5d01;
        color: #FFF;
    }

    .authority h5 {
        margin-top: -10px;
        color: #ec5d01;
        /*text-align: center;*/
    }
    .thanks h4 {
        color: #ec5d01;
        font-size: 25px;
        font-weight: normal;
        font-family: serif;
        margin-top: 20px;
    }
    .site-address p {
          line-height: 6px;
          font-weight: 300;
      }
</style>
</head>
<body>

  <div class="content-wrapper">

    <div class="invoice-header">
      <div class="float-left site-logo">
        <img src="{{ asset('images/logo/logo.png') }}" alt="" style="height: 80px; width: 130px;">
      </div>
      <div class="float-right site-address">
        <h4>bizeller Ltd.</h4>
        <p>Mamaplex, Gulsan-1, Dhaka</p>
        <p>Phone: <a href="">01723663924</a></p>
        <p>Email: <a href="mailto:info@bizeller.com">info@bizeller.com</a></p>
      </div>
      <div class="clearfix"></div>
    </div>

    <div class="invoice-description">
      <div class="invoice-left-top float-left">
        <h6>Invoice to</h6>
         <h3>{{ $order->name }}</h3>
         <div class="address">
          <p>
            <strong>Address: </strong>
            {{ $order->shipping_address }}
          </p>
           <p>Phone: {{ $order->phone_no }}</p>
           <p>Email: <a href="mailto:{{ $order->email }}">{{ $order->email }}</a></p>
         </div>
      </div>
      <div class="invoice-right-top float-right">
        <h3>Invoice #{{ $order->id }}</h3>
         <p>
           {{ $order->created_at }}
         </p>
      </div>
      <div class="clearfix"></div>
    </div>

    <div class="">
    
        <h3>Products</h3>

        @if ($order->carts->count() > 0)
        <table class="table table-bordered table-stripe">
          <thead>
            <tr>
              <th>No.</th>
              <th>Product Title</th>
              <th>Product Quantity</th>
              <th>Unit Price</th>
              <th>Sub total Price</th>
            </tr>
          </thead>
          <tbody>
            @php
            $total_price = 0;
            $offer_price = 0;
            @endphp
            @foreach ($order->carts as $cart)
            <tr>
              <td>
                {{ $loop->index + 1 }}
              </td>
              <td>
                <a href="{{ route('singleProduct.show',$cart->product->slug) }}">{{ $cart->product->title }}</a>
              </td>
              <td>
                {{ $cart->product_quantity }}
              </td>
              <td>
                {{ $cart->product->price }} Taka
              </td>
              <td>
                @php
                $total_price += $cart->product->price * $cart->product_quantity;
                $offer_price += ($cart->product->price*$cart->product->offer_price/100) * $cart->product_quantity;
                @endphp
                {{ $cart->product->price * $cart->product_quantity }} Taka
              </td>
            </tr>
            @endforeach
            <tr>
              <td colspan="3"></td>
              <td>
                Sub-Total:
              </td>
              <td colspan="2">
                <strong>  {{ $total_price }} Taka</strong>
              </td>
            </tr>
             <tr>
              <td colspan="3"></td>
              <td>
                Offer Price:
              </td>
              <td colspan="2">
                <strong>  {{ $offer_price }} Taka</strong>
              </td>
            </tr>
            <tr>
              <td colspan="3"></td>
              <td>
                Discount:
              </td>
              <td colspan="2">
                <strong>  {{ $order->custom_discount }} Taka</strong>
              </td>
            </tr>
            <tr>
              <td colspan="3"></td>
              <td>
                Shipping Cost:
              </td>
              <td colspan="2">
                <strong>  {{ $order->shipping_cost }} Taka</strong>
              </td>
            </tr>
            <tr>
              <td colspan="3"></td>
              <td>
                Total Amount:
              </td>
              <td colspan="2">
                <strong>  {{ $total_price + $order->shipping_cost - $order->custom_discount - $offer_price }} Taka</strong>
              </td>
            </tr>
          </tbody>
        </table>
        @endif

        <div class="thanks mt-3">
          <h4>Thank You for Your Shopping..!!</h4>
        </div>

        <div class="authority float-right mt-5">
            <p>-----------------------------------</p>
            <h5>Authority Signature:</h5>
          </div>
          <div class="clearfix"></div>

  </div>

</body>
</html>