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
      <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
        <h3 style="font-weight: 600;color:  #464646;">Billing details</h3>


   <div class="row mt-2">
    <div class="col-sm-12 col-md-6 mb-3">
      <label for="">Name</label>
        <input placeholder="Enter your full name" class="form-control" type="text" id="ch-name" name="ch-name" required>
        <div id="name-span" class="invalid-feedback">Name Required.</div>
    </div>

    <div class="col-sm-12 col-md-6 mb-3">
      <label for="">Mobile number</label>
      <input  placeholder="Enter your mobile number" id="ch-mobile" class="form-control" type="number" name="ch-mobile" required>
      <div id="ch-mobile-error" class="invalid-feedback">Mobile Number Required.</div>
      <div id="ch-mobile-success" class="invalid-feedback" style="color:black;">Mobile Number Required.</div>
  </div>
    
    <div class="col-sm-12 col-md-6 mb-3">
      <label for="">Email ID</label>
        <input  placeholder="Enter your email ID" id="ch-email" class="form-control" type="email" name="ch-email" required>
        <div id="name-span" class="invalid-feedback">Email ID Required.</div>
    </div>

    <div class="col-sm-12 col-md-6 mb-3">
      <label for="">Pincode</label>
      <input  placeholder="Enter your pincode" id="ch-pincode" class="form-control" type="number" name="ch-pincode" min="6" max="6" required>
        <div id="ch-pincode-error" class="invalid-feedback"> 6 Digit Pincode  Required.</div>
    </div>

    <div class="col-sm-12 col-md-6 mb-3">
      <label for="">State</label>
        <input placeholder="Enter your state" id="ch-state" class="form-control" type="text" name="ch-state" required>
        <div id="name-span" class="invalid-feedback">State  Required.</div>
    </div>
    
    <div class="col-sm-12 col-md-6 mb-3">
      <label for="">District</label>
        <input placeholder="Enter your district" id="ch-district" class="form-control" type="text" name="ch-district" required>
        <div id="name-span" class="invalid-feedback">District  Required.</div>
    </div>

    <div class="col-sm-12 col-md-6 mb-3">
      <label for="">City</label>
      <input placeholder="Enter your city" id="ch-city" class="form-control" type="text" name="ch-city" required>
        <div id="name-span" class="invalid-feedback">City  Required.</div>
    </div>

    <div class="col-sm-12 col-md-6 mb-3">
      <label for="">Landmark</label>
      <input  placeholder="Enter your landmark" id="ch-landmark" class="form-control" type="text" name="ch-landmark" required>
        <div id="name-span" class="invalid-feedback">Landmark  Required.</div>
    </div>

    <div class="col-sm-12 col-md-6 mb-3">
      <label for="">House Name / Building / Apartment</label>
      <textarea style="width: 100%; padding: 10px 10px;border-radius: 10px;" name="ch-address" id="ch-address"  placeholder="Enter your House Name / Building / Apartment" class="form-control"></textarea>
      <div id="name-span" class="invalid-feedback">House Name / Building / Apartment  Required.</div>
   </div> 


    <div class="col-sm-12 col-md-6 mb-3">
      <label for="">Order notes (optional)</label>
      <textarea style="width: 100%; padding: 10px 10px;border-radius: 10px;" name="ch-notes" id="ch-notes"  placeholder=" e.g.special notes for delivery" class="form-control"></textarea>
       <div id="name-span" class="invalid-feedback">Order notes Required.</div>
    </div>
    
    <div id="register-box" class="col-sm-12 col-md-12 mb-3">

        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="ch-create" name="ch-create">
          <label class="form-check-label" for="flexCheckDefault" >
            Create an account?
          </label>
        </div>
    
        <span id="password-box" class="row mt-2">
    
          <div class="col-sm-12 col-md-6 mb-3">
            <label for="">Create Password</label>
              <input placeholder="Enter your password" id="ch-password" class="form-control" type="password" name="ch-password" required>
              <div id="name-span" class="invalid-feedback">State  Required.</div>
          </div>
          
          <div class="col-sm-12 col-md-6 mb-3">
            <label for="">Repeat Password</label>
              <input placeholder="Enter your password again" id="ch-confirm" class="form-control" type="password" name="ch-confirm" required>
              <div id="name-span" class="invalid-feedback">District  Required.</div>
          </div>
    
        </span>

    </div>

  </div>
  

      </div>
      <div class="col-lg-1"></div>
      <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12  place-orderpage">
        <h3 class="orderr">Your Order</h3>
        <?php
        $ordertotal = 0;
        $discount   = 0;
		 $total   = 0;
		$shipping_charge   = 45;
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
            <h6>Shipping fee</h6>
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


  function placeOrder() {
    // if ($("input:radio[name='address']").is(":checked")) {
    //   var type = $('input[name="paymenttype"]:checked').val();
    //   window.location.href = "{{ url('/checkout/placeorder/') }}" + '/' + type;
    // } else {
    //   toastr.error('Please Select your Delivery Address!');
    // }


    if(
      $("#ch-mobile").val().length == 10 && $("#ch-name").val().length >2 && $("#ch-email").val().length > 2
      && $("#ch-pincode").val().length == 6 && $("#ch-city").val().length >2 && $("#ch-district").val().length >2 && $("#ch-state").val().length >2 && $("#ch-landmark").val().length >2
    ){
      $.ajax({
          url: "{{url('ajax/create-login')}}", 
          type: 'POST',
          data: {
                 _token: '{{ csrf_token() }}',
                "mobile": $("#ch-mobile").val(),
                "name": $("#ch-name").val(),
                "email": $("#ch-mobile").val(),
                "address": $("#ch-address").val(),
                "pincode": $("#ch-pincode").val(),
                "city": $("#ch-city").val(),
                "district": $("#ch-district").val(),
                "state": $("#ch-state").val(),
                "landmark": $("#ch-landmark").val(),
              },
          success:function(resp){
            response = resp;
            console.log(response.status);
          if(response.status=='01')
          {
                var type = $('input[name="paymenttype"]:checked').val();
                window.location.href = "{{ url('/checkout/placeorder/') }}" + '/' + type;
          }
          else{
            mySnack('error',response.message);
          }
     }
   })
   .done(function() {
     console.log("success");
   });
    }
    else{
            mySnack('error', 'Some required fields are empty');
          }

  }


  $(document).ready(function(){

    $("#register-box").hide();
    $("#password-box").hide();
    var createAccount = false;

  $("#ch-mobile").keyup(function(){
    if($("#ch-mobile").val().length == 10)
    {
      $.ajax({
          url: "{{url('api/check')}}", 
          type: 'POST',
          data: {"phone": $("#ch-mobile").val(),},
          success:function(resp){
            response = $.parseJSON(resp);
            console.log(response.sts);
          if(response.sts=='01')
          {
            $('#ch-mobile-success').show().html('This phone number is registered with us, Please login and enjoy all features');
            $("#register-box").hide();
            createAccount = false;
          }
          else{
            $('#ch-mobile-success').show().html('New to Thalir, Please register with us and enjoy all features');
            $("#register-box").show();
          }
     }
   })
   .done(function() {
     console.log("success");
   });
   
    }
    else
    {
      $('#ch-mobile-success').hide();

    }
  });


  
  $("#ch-pincode").on("input", function(){
        var pincode = $(this).val();
        $("#ch-state").val("");
        $("#ch-district").val("");
        $('#ch-pincode').removeClass('is-invalid');
        if(pincode.length==6)
        {
            $('#ch-district').attr("placeholder", "Fetching...");
            $('#ch-state').attr("placeholder", "Fetching...");
            $("#ch-pincode").prop('disabled', true);

            const pincodeApi = {
                "async": true,
                "url": "https://cycloneapi.com/pincode/?p="+pincode,
                "method": "GET",};

$.ajax(pincodeApi).done(function (response) {

  $('#ch-district').attr("placeholder", "Enter your district");
  $('#ch-state').attr("placeholder", "Enter your state");

    var status = response.status;
    if(status=='01')
    {
        $("#ch-pincode").prop('disabled', false);

        var state = response.state;
        var district = response.district;
        var area = response.area;

        $("#ch-state").val(state);
        $("#ch-district").val(district);
    }else
    {
        $("#ch-pincode").prop('disabled', false);
        $('#ch-pincode').addClass('is-invalid');
        $('#ch-pincode-error').html('This pincode is invalid!');
    }

});
        }else
        {
            $("#ch-pincode").prop('disabled', false);
            $("#ch-state").prop('disabled', false);
            $("#ch-district").prop('disabled', false);
        }
        

    });

   
    $("#ch-create").change(function() {
    if(this.checked) {
      $("#password-box").show();
      createAccount = true;
    }
    else
    {
      $("#password-box").hide();
      createAccount = false;
    }
});





});

</script>
@endsection