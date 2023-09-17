@extends('admin.layouts.header')

@section('adminheader')
<div class="wrapper">
	@include('admin.layouts.navbar')
	@include('admin.layouts.sidebar')
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		@include('admin.layouts.content-header')
		<div class="row m-10">

      <div class="col-sm-3 mb-10">
        <select id="status" class="form-control select2bs4" style="width:100%;">
          <option value="All">Select Order Status</option>
          <option value="New" @if($status == 'New') selected @endif >New</option>
          <option value="Accepted" @if($status == 'Accepted') selected @endif >Accepted</option>
          <option value="Processing" @if($status == 'Processing') selected @endif >Processing</option>
          <option value="Cancelled" @if($status == 'Cancelled') selected @endif >Cancelled</option>
          <option value="Delivered" @if($status == 'Delivered') selected @endif >Delivered</option>
          <option value="Rejected" @if($status == 'Rejected') selected @endif >Rejected</option>
        </select>
      </div>

      <div class="col-sm-2 mb-10">
        <select id="paytype" class="form-control select2bs4" style="width:100%;">
          <option value="All">Select Order Type</option>
          <option value="CoD" @if($paytype == 'CoD') selected @endif >CoD</option>
          <option value="Online" @if($paytype == 'Online') selected @endif >Online</option>
        </select>
      </div>

      <div class="col-sm-3 mb-10">
        <select id="paystatus" class="form-control select2bs4" style="width:100%;">
          <option value="All">Select Payment Status</option>
          <option value="Success" @if($paystatus == 'Success') selected @endif >Success</option>
          <option value="Pending" @if($paystatus == 'Pending') selected @endif >Pending</option>
          <option value="Failed" @if($paystatus == 'Failed') selected @endif >Failed</option>
        </select>
      </div>

      <div class="col-sm-2 mb-10">
        <input type="text" class="form-control" id="search" placeholder="Search Order Id" value="{{$search}}">
      </div>

      <div class="col-sm-1 mb-10">
        <select id="limit" class="form-control">
          <option value="10" @if($limit == '10') selected @endif >10</option>
          <option value="25" @if($limit == '25') selected @endif >25</option>
          <option value="50" @if($limit == '50') selected @endif >50</option>
          <option value="100" @if($limit == '100') selected @endif >100</option>
        </select>
      </div>

      <div class="col-sm-1 mb-10">
        <input type="button" id="searchBtn" class="btn btn-primary" value="Search">
      </div>
    </div>

    <div class="row m-10">
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">My Orders</h3>
          </div>
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap table-bordered table-extra" id="rtable" style="font-size: 15px !important;">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Customer Details</th>
                  <th>Order Details</th>
                  <th>Products Details</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @if(count($orders) > 0)
                @foreach($orders as $key => $value)
                <tr>
                  <td align="center">{{$value->id}}</td>
                  <td style="white-space: normal !important;word-wrap: break-word !important;">
                    <?php $customer = App\Http\Controllers\AdminCustomerController::get($value->customerid); ?>
                    Name: 
                    <b>{{$customer->name}}</b><br>
                    Number: 
                    <b>{{$customer->phone}}</b><br>
                    Email: 
                    <b>{{$customer->email}}</b><br>
                  
                  </td>
                  <td style="white-space: normal !important;word-wrap: break-word !important;">
                    Amount: <b>₹{{$value->price}}</b><br>
					Delivery Charge: <b>₹{{$value->offerprice-$value->price}}</b><br>
                    Total Amount: <b class="text-success">₹{{$value->offerprice}}</b><br>
                    Payment Type: <b>{{$value->paytype}}</b><br>
                    Order On: 
                    <b>{{ \Carbon\Carbon::parse($value->order_on)->format('d-m-y h:i') }}</b>
                  </td>
                  <td>
                    <table style="width:100%;">
                      <?php
                      $ptotal = 0;
                      $orderItems = App\Http\Controllers\AdminOrderController::getOrtderedItems($value->id);
                      if($orderItems) {
                        foreach ($orderItems as $okey => $items) { ?>
                          <tr>
                            <td style="padding: 0.1rem 0.4rem !important;">{{App\Http\Controllers\AdminProductsController::getName($items->productid)}}({{$items->unit_name}})</td>
                            <td style="padding: 0.1rem 0.4rem !important;" align="right">₹{{$items->amount}}</td>
                            <td style="padding: 0.1rem 0.4rem !important;" align="center">x {{$items->quantity}}</td>
                            <td style="padding: 0.1rem 0.4rem !important;" align="right">
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
                  </td>
                  <td>
                    <small>Order Status:</small><br>
                    @if($value->status == 'Cancelled')
                      <select id="status" class="form-control btn-danger" onchange="changeOrderStatus(this.value, '{{$value->id}}')"  style="max-width:140px; min-width: 100px; padding: 2px; height: auto;">
                        <option value="Cancelled" @if($value->status == 'Cancelled') selected @endif >Cancelled</option>
                      </select>
                    @else
                      <select id="status" class="form-control @if($value->status == 'New') btn-primary @elseif($value->status == 'Accepted') btn-info @elseif($value->status == 'Processing') btn-info @elseif($value->status == 'Delivered') btn-success @elseif($value->status == 'Rejected') btn-danger @endif " onchange="changeOrderStatus(this.value, '{{$value->id}}')"  style="width:140px; padding: 2px; height: auto;">
                        <option value="New" @if($value->status == 'New') selected @endif >New</option>
                        <option value="Accepted" @if($value->status == 'Accepted') selected @endif >Accepted</option>
                        <option value="Processing" @if($value->status == 'Processing') selected @endif >Processing</option>
                        <option value="Delivered" @if($value->status == 'Delivered') selected @endif >Delivered</option>
                        <option value="Rejected" @if($value->status == 'Rejected') selected @endif >Rejected</option>
                      </select>
                    @endif
                    <small>Payment Status:</small><br>
                    <select id="status" class="form-control @if($value->paystatus == 'Success') btn-success @elseif($value->paystatus == 'Pending') btn-info @elseif($value->paystatus == 'Failed') btn-danger @endif " onchange="changePaymentStatus(this.value, '{{$value->id}}')"  style="width:140px; padding: 2px; height: auto;">
                      <option value="Success" @if($value->paystatus == 'Success') selected @endif >Success</option>
                      <option value="Pending" @if($value->paystatus == 'Pending') selected @endif >Pending</option>
                      <option value="Failed" @if($value->paystatus == 'Failed') selected @endif >Failed</option>
                    </select>

                    <a href="{{url('/admin/orders/'.$value->id)}}" class="btn btn-secondary btn-sm mt-1" title="Edit Product" style="color: white; font-size:15px; font-weight: 600; margin:2px; width:140px;">
                      <i class="fa fa-eye" style="font-size:16px"></i> View Details
                    </a>
                  </td>
                </tr>
                @endforeach
                @else
                <tr>
                  <td colspan="11" align="center">No Results Found</td>
                </tr>
                @endif
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
          <div class="card-footer pagination" >
            @if(count($orders) > 0)
        {{$orders->appends(['s' => $status, 'q' => $paytype, 'limit' => $limit, 'paystatus' => $paystatus, 'search' => $search])->links('pagination::bootstrap-4')}}
            @endif
          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
  <!-- /.content-wrapper -->

</div>
@include('admin.layouts.footer')
@include('admin.layouts.js')
@include('admin.layouts.messages')
<style>
 .col-sm-3 {
  padding-right: 5px;
  padding-left: 5px;
}
.btn-group-sm>.btn, .btn-sm {
  padding: .125rem .4rem;
}
</style>
<script type="text/javascript">   
  $('#sshop').select2({
    theme: 'bootstrap4',
    placeholder: "Select Shop",
    ajax: {
      url: '{{url('/ajax/search/shops')}}',
      data: function (params) {
        return params;
      },
      dataType: 'json',
    }
  });

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

  $('#searchBtn').click(function() {
    var shopname = $("#ssuser option:selected").text();
    var url = '{{('/admin/orders')}}?s=' + $('#status').val() + '&q=' + $('#paytype').val() + '&limit=' + $('#limit').val() + '&paystatus=' + $('#paystatus').val() + '&search=' + $('input#search').val();
    window.location.href = url;
  });

  $(function () {
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });
  });
</script>
@endsection
