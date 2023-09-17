@extends('layouts.header')
@section('header')
@include('layouts.navbar')

@include('layouts.cart')
@include('layouts.sidebar')
@include('layouts.login')


<div class="search-box mobli-search">
  <input style="background: none;" class="search-input" type="text" id="searchMob" placeholder="Search Here..">
  <button class="search-btn"><i class="ri-search-line"></i></button>
  <ul class="list-group list-search hide" id="listSearch2" style="z-index: 999; width: inherit;"></ul>
</div>


 <h2 style="text-align:center" class="mt-4">Order Details</h2>

 <div class="container-main">
    <div class="row">
      <div class="col-lg-12">
        <div class="productmoblbar">
          <div class="cardss about" data-about>
            <div class="order-lists">
              <div class="top-border">
                <div class="top-border-lft">
                  <h6 style="padding-left: 10px;">Order ID : #{{$orderdetails->id}}</h6>
                </div>
                <div style="display: flex;" class="top-border-rgt">
                  <!-- <a class="cancl" href="#">Cancel Order |</a>
                  <a class="track" href="#">Track Order</a> -->
                </div>
              </div>
              @if(count($orderdetails->orderItems) > 0)
              @foreach($orderdetails->orderItems as $orderItemKey => $orderItem)
                <?php $product = App\Http\Controllers\AdminProductsController::getProduct($orderItem['productid']); 
                ?>
                @if($orderItemKey != 0)
                <hr style="margin-right: 5%; margin-left:5%;">
                @endif
              <div style="width: 100%;padding: 10px 20px;" class="ordermain-div">
                <div class="lft-col-order">
                  <div class="order-product">
                    <img src="{{url($product->image)}}" alt="">
                  </div>
                  <div class="col-profail">
                    <h6 class="prdctname" style="font-weight: 600;">{{$product->name}}</h6>
                    <small>Qty :  {{$orderItem['quantity']}}</small> <br>
                    <small>{{$orderdetails->paytype}}</small>
                    <div class="same-line-txt">
                      <h6 class="grnn">₹ {{$orderItem['offerprice']}}</h6>
                      <h6 style="text-decoration: line-through;color:grey;padding-left: 10px;">₹ {{$orderItem['amount']}}</h6>
                    </div>
                  </div>
                </div>
                @if($orderItemKey == 0)
                  @if($orderdetails->status == 'New')
                    <h6 class="btn btn-primary btn-sm" style="height: 30px;">{{ $orderdetails->status}}</h6>
                  @elseif($orderdetails->status == 'Accepted')
                    <h6 class="btn btn-info btn-sm" style="height: 30px;">{{ $orderdetails->status}}</h6>
                  @elseif($orderdetails->status == 'Processing')
                    <h6 class="order-status-Processing" style="height: 30px;">{{ $orderdetails->status}}</h6>
                  @elseif($orderdetails->status == 'Cancelled')
                    <h6 class="order-status-cancelled" style="height: 30px;">{{ $orderdetails->status}}</h6>
                  @elseif($orderdetails->status == 'Delivered')
                    <h6 class="order-status-deliverd" style="height: 30px;">{{ $orderdetails->status}}</h6>
                  @elseif($orderdetails->status == 'Rejected')
                    <h6 class="order-status-cancelled" style="height: 30px;">{{ $orderdetails->status}}</h6>
                  @endif
                @endif
                
              </div>
              @endforeach
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  

<section class="track-order container-main mt-6">

</section>

@include('layouts.freeshipping') 

@include('layouts.footer')
@include('layouts.others')
@endsection