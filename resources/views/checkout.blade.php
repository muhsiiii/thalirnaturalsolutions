@extends('layouts.header')
@section('header')
@include('layouts.navbar')

<div class="search-box mobli-search">
  <input style="background: none;" class="search-input" type="text" id="searchMob" placeholder="Search Here..">
  <button class="search-btn"><i class="ri-search-line"></i></button>
  <ul class="list-group list-search hide" id="listSearch2" style="z-index: 999; width: inherit;"></ul>
</div>

@include('layouts.sidebar')
@include('layouts.cart')
@include('layouts.login')

<section class="address">
  <div class="container-main">
    <div class="row">
      <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
        <h6 style="font-weight: 600;color:  #464646;">Your Addresses</h6>
        @foreach($addresses as $address)
        <div class="adresses">
          <div class="leftadrss">
            <input type="radio" id="{{$address->id}}" id="address" name="address" value="{{$address->id}}" onclick="setDefault({{$address->id}})" @if(isset($address->default_address) && $address->default_address == '1') checked @endif>
          </div>
          <div class="cntr-adrss">
            <label for="{{$address->id}}">
              <h6>{{$address->name}}</h6>
              <h6>{{$address->mobile}}, {{$address->phone}}</h6>
              <h6>{{$address->address}},{{$address->landmark}}, {{$address->city}}, {{$address->district}}, {{$address->state}}, {{$address->pincode}}</h6>
            </label>
          </div>
          <div class="rgt-adrss">
          </div>
        </div>
        @endforeach
        <div style="float: left;" class="adrees-list">
          <a style="display: block;margin-top: 30px;margin-bottom: 30px" class="adrss-new" href="{{url('/address/create')}}"><img src="{{url('/assets/succ/images/plus.png')}}" alt=""> Add new address</a>
        </div>
      </div>
      <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12  place-orderpage">
        <h3 class="orderr">Your Order</h3>
        <?php
        $ordertotal = 0;
        $discount   = 0;
		  $total=0;
		$shipping_charge = 45;
        ?>
        <div class="product-list">
          <div class="heading-product-list product-subtotal">
            <h5>Product</h5>
            <h5>Sub Total</h5>
          </div>
          <hr>
          @if($cartCount > 0)
          @foreach($cartItems as $key => $value)
          <?php $product = App\Http\Controllers\AdminProductsController::getProduct($value->productid);
          $producttotal = $value->quantity * $product->offerprice;
          $ordertotal += $producttotal;
			$producprice = $value->quantity * $product->price; 
      $total += $producprice; 
      $discount=$total-$ordertotal;
          ?>
          <div class="product-name">
            <div class="product-name-lft">
              <p>{{$product->name}} x {{$value->quantity}}</p>
            </div>
            <div class="product-price-rgt">
              <p>₹ {{$product->offerprice*$value->quantity}}</p>
            </div>
          </div>
          <hr>
          @endforeach
          @else
          <div>
            <p>Your cart is empty!</p>
          </div>
          <hr>
          @endif
          <div class="sub-total-price">
            <h6>Order Total</h6>
            <h6 class="">₹ {{$ordertotal}}</h6>
          </div>
          <div class="sub-total-price">
            <h6>Shipping</h6>
			  <h6 class="">₹ 45</h6>
          </div>
          <div class="sub-total-price">
            <h6>Discounts</h6>
            <h6 class="">₹ {{$discount}}</h6>
          </div>
          <div class="sub-total-price">
            <h5>Subtotal</h5>
            <h5 class="grnn">₹ {{$ordertotal + $shipping_charge}}</h5>
          </div>
        </div>
        <!-- <div class="product-list-two">
          <form action="">
            <input type="radio" id="codorder" name="paymenttype" value="COD">
             <label for="codorder">Cash on delivery</label><br>
            <input type="radio" id="onlineorder" name="paymenttype" value="online" checked>
             <label for="onlineorder"> Cash credit/Debit/Net Banking</label><br>
          </form>
          <hr>
          <p style="text-align: center;">Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our privacy policy.</p>
          <button onclick="placeOrder()">Place Order</button>
        </div> -->
        <!-- updated 14/03  -->
        <div class="product-list-two">
              <form action="">
              <input style="width: 15px;height: 15px;" type="radio" id="codorder" name="paymenttype" value="COD" onclick="myFunction()">
              <label for="codorder">Cash on delivery</label><br>
                <div id="cashdiv" style="display:none;">
                  <p class="cash-on-delivery-text mb-0">Did you know? The COD service is available to you through the Indian Postal Service. NB: The postman will be charged 5% of the total bill when the product is delivered. Products are usually delivered in 3-7 working days.</p>
                </div>
                <input style="width: 15px;height: 15px;" type="radio" id="onlineorder" name="paymenttype" value="online" checked onclick="myFunctioncredit()">
                <label for="onlineorder"> Cash credit/Debit/Net Banking</label><br>
                <div id="creditdiv" style="display:none;">
                  <p class="cash-on-delivery-text mb-0">Pay secure, Products are usually delivered in 3-7 working days.</p>
                </div>  
              </form>
              <hr>
              <p style="text-align: center;">Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our <a class="grnn" href="{{url('/privacy-policy')}}">privacy policy.</a></p>
              <button onclick="placeOrder()">Place Order</button>
        </div>
      </div>
    </div>
  </div>
</section>
<input type="hidden" id="userid" value="{{$userid ?? '0'}}">
@include('layouts.freeshipping')
@include('layouts.footer')
@include('layouts.others')

    <!-- radio button select show div div script  -->
    <script>
       var cashdiv = document.getElementById("cashdiv");
       var creditdiv = document.getElementById("creditdiv");
      function myFunction() {
        if (cashdiv.style.display === "none") {
          cashdiv.style.display = "block";
          creditdiv.style.display = "none";
        } else {
          cashdiv.style.display = "none";
        }
      }
      function myFunctioncredit() {
        if (creditdiv.style.display === "none") {
          creditdiv.style.display = "block";
          cashdiv.style.display = "none";
        } else {
          creditdiv.style.display = "none";
        }
      }
    </script>
<script>
  function placeOrder() {
    if ($("input:radio[name='address']").is(":checked")) {
      var type = $('input[name="paymenttype"]:checked').val();
      window.location.href = "{{ url('/checkout/placeorder/') }}" + '/' + type;
    } else {
      toastr.error('Please Select your Delivery Address!');
    }

  }

  function setDefault(addressid) {
    $('#loader').show();
    $.ajax({
      type: "POST",
      url: "{{ route('setDefaultAddress') }}",
      data: {
        _token: '{{ csrf_token() }}',
        addressid: addressid
      },
      success: function(resp) {
        $('#loader').hide();
        window.location.reload();
        var obj = JSON.parse(resp);
        if (obj.sts == '01') {

        }
      }
    });
  }
</script>
@endsection