@extends('layouts.header')
@section('header')
@include('layouts.navbar')

@include('layouts.sidebar')  
@include('layouts.cart')
@include('layouts.login')


<div style="margin-top: 50px;" class="box-list container-main">
      <div class="row">
          @include('profile.layouts.sidebar')
          <div class="col-10 lft-page-menu">
            <div style="margin-left: 50px;" class="card active home" data-home>
              @if(count($orders) > 0)
              @foreach($orders as $key => $value)
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="productmoblbar">
                        <div class="cardss about" data-about>
                          <div class="order-lists">
                            <div class="top-border">
                              <div class="top-border-lft">
                                <h6 style="padding-left: 10px;">Order ID : #{{$value->id}}</h6>
                              </div>
                              <div style="display: flex;" class="top-border-rgt">
                                @if($value->status == "New")
                                  <button id="up" class="cancl btn p-0 text-danger b"  onclick="cancelOrder({{$value->id}})"><span class="">Cancel Order</span
                                  ></button>

                                @endif
                                {{-- <a class="track" href="#">Track Order</a> --}}
                              </div>
                            </div>
                            @if(count($value->orderItems) > 0)
                              @foreach($value->orderItems as $orderItemKey => $orderItem)
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
                                    <small>{{$value->paytype}}</small>
                                    <div class="same-line-txt">
                                      <h6 class="grnn">₹ {{$orderItem['offerprice']}}</h6>
                                      <h6 style="text-decoration: line-through;color:grey;padding-left: 10px;">₹ {{$orderItem['amount']}}</h6>
                                    </div>
                                  </div>
                                </div>
                                @if($orderItemKey == 0)
                                  @if($value->status == 'New')
                                    <h6 class="btn btn-primary btn-sm" style="height: 30px;">{{ $value->status}}</h6>
                                  @elseif($value->status == 'Accepted')
                                    <h6 class="btn btn-info btn-sm" style="height: 30px;">{{ $value->status}}</h6>
                                  @elseif($value->status == 'Processing')
                                    <h6 class="order-status-Processing" style="height: 30px;">{{ $value->status}}</h6>
                                  @elseif($value->status == 'Cancelled')
                                    <h6 class="order-status-cancelled" style="height: 30px;">{{ $value->status}}</h6>
                                  @elseif($value->status == 'Delivered')
                                    <h6 class="order-status-deliverd" style="height: 30px;">{{ $value->status}}</h6>
                                  @elseif($value->status == 'Rejected')
                                    <h6 class="order-status-cancelled" style="height: 30px;">{{ $value->status}}</h6>
                                  @endif
                                @endif
                              </div>

                              @endforeach


                            @endif
                            <!-- <div style="width: 100%;padding: 10px 20px;" class="ordermain-div">
                              <div class="lft-col-order">
                                <div class="order-product">
                                  <img src="./images/vitamin-c-oil-moisturizer-with-box-_-ingredients-copy 1.png" alt="">
                                </div>
                                <div class="col-profail">
                                  <h6 class="prdctname" style="font-weight: 600;">Product name</h6>
                                  <small>Qty : 1</small> <br>
                                  <small>COD</small>
                                  <div class="same-line-txt">
                                    <h6 class="grnn">₹ 400</h6>
                                    <h6 style="text-decoration: line-through;color:grey;padding-left: 10px;">₹ 500</h6>
                                  </div>
                                </div>
                              </div>
                              <h6 class="order-status-Processing">Processing</h6>
                            </div> -->
 
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

              @endforeach
          
              @else  
                <div style="text-align:center;">
                  <h3>No Orders Found </h3>
                </div>
              @endif
            </div>
            
        </div>
      </div>
</div>
<br>
<br>
<script>
  function cancelOrder(orderId){
        $.ajax({
          type: "POST",
          url: "{{url('/ajax/order/cancelorder')}}",
          data: {
            _token: '{{ csrf_token() }}',
            orderId: orderId,
          },
          success: function(resp) {
            var obj = JSON.parse(resp);
            if (obj.sts == '01') {
              toastr.success(obj.msg);
              window.location.reload();
              getCart();
            } else {
              toastr.error('Something Went Wrong!');
            }
          }
        });
  }
</script>


@include('layouts.footer')
@include('layouts.others')
@endsection
