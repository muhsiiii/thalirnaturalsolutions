@extends('admin.layouts.header')

@section('adminheader')
<div class="wrapper">
  @include('admin.layouts.navbar')
  @include('admin.layouts.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @include('admin.layouts.content-header')

    <div class="row m-10">
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Order ID : {{$order->id}}</h3>
          </div>
          <div class="card-body table-responsive ">
            <div class="row" style="margin: 0px; padding: 0px;">
              <div class="col-md-4">
                <h5><b style="text-decoration: underline;">Customer Details</b></h5>
                <?php 
                $customer = App\Http\Controllers\AdminCustomerController::get($order->customerid); ?>
                Name: 
                <b>{{$customer->name}}</b><br>
                Number: 
                <b>{{$customer->phone}}</b><br>
                Email: 
                <b>{{$customer->email}}</b><br>
                Address: 
                <b>{{$address->address}}</b><br>
                Place: 
                <b>{{$address->city}}, {{$address->district}}, {{$address->state}}</b><br>
                Pincode: 
                <b>{{$address->pincode}}</b><br>
              </div>
              <div class="col-md-4"  style="border-left: 1px solid #aaa;">
                <h5><b style="text-decoration: underline;">Order Details</b></h5>
                Price: <b>₹{{$order->price}}</b><br>
				Delivery Charge: <b>₹{{$order->offerprice-$order->price}}</b><br>
                Total Price: <b class="text-success">₹{{$order->offerprice}}</b><br>
                Order On: <b>{{ \Carbon\Carbon::parse($order->order_on)->format('d-m-y h:i') }}</b><br><br>
                <h5><b style="text-decoration: underline;" class="mt-2">Combo Applied</b></h5>
                <?php
                $noofjeans = $noofphants = $noof550shirts = $noof400shirts = $nooftshirts = $subtotal = 0;
                if($orderItems) {
                  foreach ($orderItems as $okey => $items) {
                    $product = App\Http\Controllers\AdminProductsController::getProduct($items->productid);
                    if($product->subcat_id == 24) {
                      $nooftshirts = $nooftshirts + $items->quantity;
                    }
                    if(($product->subcat_id == 22 || $product->subcat_id == 23) && $product->offerprice == 400) {
                      $noof400shirts = $noof400shirts + $items->quantity;
                    }
                    if(($product->subcat_id == 22 || $product->subcat_id == 23) && $product->offerprice == 550) {
                      $noof400shirts = $noof400shirts + $items->quantity;
                    }
                    if($product->subcat_id == 25 || $product->subcat_id == 26) {
                      $noofphants = $noofphants + $items->quantity;
                    }
                    if($product->subcat_id == 27) {
                      $noofjeans = $noofjeans + $items->quantity;
                    }
                  }
                } ?>
                <table style="width: 100%;">
                  <?php if($nooftshirts > 1) { ?>
                    <?php $nooftshirts = floor($nooftshirts / 2); ?>
                    <tr>
                      <td>2xT-Shirt@299</td>
                      <td> x {{$nooftshirts}}:</td>
                      <th class="text-right text-success">- ₹{{$nooftshirts * 101}}</th>
                    </tr>
                    <?php $subtotal = $subtotal - ($nooftshirts * 101); ?>
                  <?php } ?>
                  <?php if($noof400shirts > 2) { ?>
                    <?php $noof400shirts = floor($noof400shirts / 3); ?>
                    <tr>
                      <td>3xShirt@999</td>
                      <td> x {{$noof400shirts}} :</td>
                      <th class="text-right text-success">- ₹{{$noof400shirts * 201}}</th>
                    </tr>
                    <?php $subtotal = $subtotal - ($noof400shirts * 201); ?>
                  <?php } ?>
                  <?php if($noof550shirts > 1) { ?>
                    <?php $noof550shirts = floor($noof550shirts / 2); ?>
                    <tr>
                      <td>2xShirt@999</td>
                      <td> x {{$noof550shirts}} :</td>
                      <th class="text-right text-success">- ₹{{$noof550shirts * 101}}</th>
                    </tr>
                    <?php $subtotal = $subtotal - ($noof550shirts * 101); ?>
                  <?php } ?>
                  <?php if($noofphants > 1) { ?>
                    <?php $noofphants = floor($noofphants / 2); ?>
                    <tr>
                      <td>2xPhants@999</td>
                      <td>  x {{$noofphants}} :</td>
                      <th class="text-right text-success">- ₹{{$noofphants * 301}}</th>
                    </tr>
                    <?php $subtotal = $subtotal - ($noofphants * 301); ?>
                  <?php } ?>
                  <?php if($noofjeans > 1) { ?>
                    <?php $noofjeans = floor($noofjeans / 2); ?>
                    <tr>
                      <td>2xJeans@999</td>
                      <td> x {{$noofjeans}} :</td>
                      <th class="text-right text-success">- ₹{{$noofjeans * 301}}</th>
                    </tr>
                    <?php $subtotal = $subtotal - ($noofjeans * 301); ?>
                  <?php } ?>
                </table>
              </div>
              <div class="col-md-4" style="border-left: 1px solid #aaa;">
                <h5><b style="text-decoration: underline;">Payment Details</b></h5>
                <div class="row" >
                  <div class="col-md-12" style="margin-top:4px;">Payment Type: <b>{{$order->paytype}}</b></div>
                  <div class="col-md-6" style="margin-top:4px;">Order Status:</div>
                  <div class="col-md-6" style="margin-top:4px;">
                    @if($order->status == 'Cancelled')
                      <select id="status" class="form-control btn-danger" onchange="changeOrderStatus(this.value, '{{$order->id}}')"  style="max-width:140px; min-width: 100px; padding: 2px; height: auto;">
                        <option value="Cancelled" @if($order->status == 'Cancelled') selected @endif >Cancelled</option>
                      </select>
                    @else
                      <select id="status" class="form-control @if($order->status == 'New') btn-primary @elseif($order->status == 'Accepted') btn-info @elseif($order->status == 'Processing') btn-info @elseif($order->status == 'Delivered') btn-success @elseif($order->status == 'Rejected') btn-danger @endif " onchange="changeOrderStatus(this.value, '{{$order->id}}')"  style="max-width:140px; min-width: 100px; padding: 2px; height: auto;">
                        <option value="New" @if($order->status == 'New') selected @endif >New</option>
                        <option value="Accepted" @if($order->status == 'Accepted') selected @endif >Accepted</option>
                        <option value="Processing" @if($order->status == 'Processing') selected @endif >Processing</option>
                        <option value="Delivered" @if($order->status == 'Delivered') selected @endif >Delivered</option>
                        <option value="Rejected" @if($order->status == 'Rejected') selected @endif >Rejected</option>
                      </select>
                    @endif
                  </div>
                  <div class="col-md-6" style="margin-top:4px;">Payment Status:</div>
                  <div class="col-md-6" style="margin-top:4px;">
                    <select id="status" class="form-control @if($order->paystatus == 'Success') btn-success @elseif($order->paystatus == 'Pending') btn-info @elseif($order->paystatus == 'Failed') btn-danger @endif " onchange="changePaymentStatus(this.value, '{{$order->id}}')" style="max-width:140px; min-width: 100px; padding: 4px; height: auto;">
                      <option value="Success" @if($order->paystatus == 'Success') selected @endif >Success</option>
                      <option value="Pending" @if($order->paystatus == 'Pending') selected @endif >Pending</option>
                      <option value="Failed" @if($order->paystatus == 'Failed') selected @endif >Failed</option>
                    </select>
                  </div>
					<br>
					@php
					 $data = json_decode($order->details, true);
					@endphp
					<!-- @foreach($data as $key => $value)
    				
					<div class="col-md-12" style="margin-top:4px;">{{ $key }}: {{ $value }}</b></div>
					@endforeach -->
                  
					
					
					
                </div>
              </div>
            </div>
            <hr>
            <h5><b style="text-decoration: underline;">Ordered Products</b></h5>
            <table class="table table-hover text-nowrap table-bordered">
              <?php
              $ptotal = 0;
              if($orderItems) {
                foreach ($orderItems as $okey => $items) { ?>
                  <?php $product = App\Http\Controllers\AdminProductsController::getProduct($items->productid); ?>
                  <tr>
                    <td align="center">{{$okey + 1}}</td>
                    <td class="">
                      <a href="{{url('/product/'.$product->id)}}">
                        <img src="{{url($product->image)}}" class="border img-sm">
                      </a>
                    </td>
                    <td>{{$product->name}}({{$items->unit_name}})</td>
					  
                    <td align="right">₹{{$items->amount}}</td>
                    <td align="center">x {{$items->quantity}}</td>
                    <td align="right">
                      <?php 
                      $ptotal = $items->quantity * $items->amount;
                      ?>
                      <b>₹{{$ptotal}}</b>
                    </td>
                  </tr> 
                <?php }
              }
              ?>
            </table>
          </div>
          <!-- /.card-body -->
          <div class="card-footer clearfix">
  
          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
  <!-- /.content-wrapper -->

  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Payment Details</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          @if($order->details != '' && $order->txnid != '')
          <table>
            <?php
              $details = json_decode($order->details);
              foreach ($details as $key => $value) { ?>
                <tr>
                  <th>{{$key}}</th>
                  <th>-</th>
                  <th>{{$value}}</th>
                </tr>
              <?php }
            ?>
          </table>
          @endif
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

</div>
@include('admin.layouts.footer')
@include('admin.layouts.js')
@include('admin.layouts.messages')
<script type="text/javascript">
  function changeOrderStatus(status, id) {
    $.ajax({
      type: "GET",
      url: "{{url('/ajax/order/status')}}",
      data : { status:status, id:id },
      success: function(data){
        var obj = JSON.parse(data);
        if(obj.sts == '01') {
          toastr.success (obj.msg);
        } else {
          toastr.error ('Something Went Wrong!');
        }
      }
    });
  }


  function changeOrderDboy(did, id) {
    $.ajax({
      type: "GET",
      url: "{{url('/ajax/order/changedboy')}}",
      data : { did:did, id:id },
      success: function(data){
        var obj = JSON.parse(data);
        if(obj.sts == '01') {
          toastr.success (obj.msg);
          location.reload();
        } else {
          toastr.error ('Something Went Wrong!');
        }
      }
    });
  }


  function changePaymentStatus(status, id) {
    $.ajax({
      type: "GET",
      url: "{{url('/ajax/payment/status')}}",
      data : { status:status, id:id },
      success: function(data){
        var obj = JSON.parse(data);
        if(obj.sts == '01') {
          toastr.success (obj.msg);
        } else {
          toastr.error ('Something Went Wrong!');
        }
      }
    });
  }

  $(function () {
    $('#deliveryboy').select2({
      theme: 'bootstrap4'
    });
  });
</script>
@endsection
