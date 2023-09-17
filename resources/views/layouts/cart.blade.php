
<!-- login sidebar section  -->
<div class="sidecart">
  <?php
  $ordertotal = 0;
  $discount   = 0;
	$total   = 0;
  $shipping_charge = 45;
  ?>
  <div  id="listCart">
    <h5>My Cart ({{$cartCount}})</h5>


    <div class="order-summary">
      <h6 style="font-weight: 600;">Order Summary</h6>
      @if($cartCount > 0)
      @foreach($cartItems as $key => $value)
      <?php $product = App\Http\Controllers\AdminProductsController::getProduct($value->productid);
      $producttotal = $value->quantity * $product->offerprice;
      $ordertotal += $producttotal;
		$producprice = $value->quantity * $product->price;
      $total += $producprice;
      $discount=$total-$ordertotal;

      ?>
      <table style="width: 100%;margin-bottom:15px;">
        <tr>
          <th><img style="width: 100px;border: 1px solid #60B76E;border-radius: 15px;height:100px;" src="{{url($product->image)}}" alt=""></th>
          <th style="padding-left: 6px;" class="position-relative;">
            <p style="padding: 0;margin-top:14px;">{{$product->name}}</p>
            <?php
            $unit = App\Http\Controllers\AdminProductsController::getUnit($value->unitid)
            ?>
            <h6 style="padding-top: 5px;">₹ {{$product->offerprice}}</h6>
            <div style="margin-top: 10px;margin-bottom: 10px;" class="form-groups">
              <div class="input-group">
                <div class="input-group-btn">
                  <button id="down" class="btn btn-default"  onclick="down('1',{{$value->id}},0)"><span class="">-</span></button>
                </div>
                <input style="width: 30px;padding: 0;text-align: center;max-width: 35px;" type="text" id="myNumber{{$value->id}}" class="form-control input-number" value="{{$value->quantity ?? '1'}}" readonly/>
                <div class="input-group-btn">
                  <button id="up" class="btn btn-default" onclick="up('10',{{$value->id}},0)"><span class="">+</span></button>
                </div>
                <a href="javascript:void(0);"  onclick="removeCart({{$value->id}});">
                  <i style="float: right;color:#AE0000;font-size: 15px;margin-left: 10px;margin-top: 5px;" class="ri-delete-bin-5-fill bin"></i>
                </a>
              </div>
            </div>

          </th>
        </tr>
      </table>
      @endforeach
      @else
      <div class="order-summary-col" >
        <h6>
          Your cart is empty!
        </h6>
      </div>
      @endif
    </div>
    @if($cartCount > 0)
    <div class="order-summary">
      <h6>Price Summary</h6>
      <hr>
      <div class="ordrsmry-col">
        <p>Order Total</p>
        <p>₹ {{$ordertotal}}</p>
      </div>
      <hr>
      <div class="ordrsmry-col">
        <p>Shipping<i style="vertical-align: middle;font-size: 16px;margin-left:5px;color:#3298DB;" class="ri-information-line"></i></p>
        <p>₹  45</p>
      </div>

      <hr>
      <div class="ordrsmry-col">
        <p>Discounts</p>
        <p class="grn">₹ {{$discount}}</p>
      </div>
      <hr>
      <div class="ordrsmry-col">
        <p>Grand Total</p>
        <p class="end">₹  {{$ordertotal + $shipping_charge}}</p>
      </div>
      <hr>
      <div style="display: table;margin-left: auto;"class="flex-dv">
      <a href="{{url('/checkout')}}">Continue</a>
      </div>
    </div>
    <!-- <div class="order-summary continuediv">
      <div class="flex-dv">
        <h6>₹ {{$ordertotal + $discount}}</h6>
        <p class="grn">View Details</p>
      </div>
      <div class="flex-dv">
        <a href="{{url('/checkout')}}">Continue</a>
      </div>
    </div> -->
    @endif

  </div>

  <!-- @if($relatedProducts)
  <div class="order-summary">
    <h6>Related product</h6>
    <div class="product-sliders-cart">
      <div class="sliderdvp">
        @foreach($relatedProducts as $key => $value)
        <div class="slideproduct">
          <div class="slidecontnt">
            <img src="{{url($value->image)}}" alt="">
          </div>
          <div class="slidecontnt">
            <p class="sldtext">{{$value->name}}</p>
            <p><span class="grnn">Price:</span>₹ {{$value->offerprice}}</p>
            <a class="view-page" href="{{url('/product/'.$value->id)}}">
              <button class="sldbuynow">BUY NOW</button>
            </a>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
  @endif -->
  <div class="d-inline closse ada" onclick="toggleCartt()" >
    <i style="color: #000;" class="ri-close-circle-line"></i>
  </div>
</div>

<script>
  function functionToExecute() {
    document.querySelector('.sidecart').classList.toggle('open-cart');

  }
  function toggleCartt() {
    document.querySelector('.sidecart').classList.toggle('open-cart');
    if ($(window).width() < 500)
    {
    if(document.querySelector('.sidecart').classList.contains('open-cart'))
       $('html, body').css('overflowY', 'hidden');
    else
       $('html, body').css('overflowY', 'auto');
    }

  }

</script>

<script>
  function up(max,cid,uid) {


    document.getElementById("myNumber"+cid).value = parseInt(document.getElementById("myNumber"+cid).value) + 1;
    if (document.getElementById("myNumber"+cid).value >= parseInt(max)) {
      document.getElementById("myNumber"+cid).value = max;
    }


    changeQuantity(uid, cid);
  }

  function down(min,cid,uid) {
    document.getElementById("myNumber"+cid).value = parseInt(document.getElementById("myNumber"+cid).value) - 1;
    if (document.getElementById("myNumber"+cid).value <= parseInt(min)) {
      document.getElementById("myNumber"+cid).value = min;
    }

    changeQuantity(uid, cid);
  }
</script>

