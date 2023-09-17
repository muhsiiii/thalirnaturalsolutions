@extends('layouts.header')
@section('header')
@include('layouts.navbar')
@include('layouts.cart')
@include('layouts.sidebar') 
@include('layouts.login')
<!-- <div class="container shipping-footer" style="padding: 5%;">
  <div class="col-md-12 row mt-md-4">
    <div class="col-md-12">
      <h1 class="text-capitalize mb-2">Shipping  & Delivery Policy</h1>
      {!! $settings->shippingpolicy ?? '' !!}
    </div>
  </div>
</div> -->
<div class="banner-terms-main text-center">
  <h2 class="text-center terms-and-conditions-heading-banner">Shipping  & Delivery Policy</h2>
  <span class="text-white"><a class="text-white breadcrumbs-terms-conditions" href="#">HOME / SHIPPING  & DELIVERY POLICY</a></span>
</div>
<div class="container mt-4">
{!! $settings->shippingpolicy ?? '' !!}
</div>

@include('layouts.footer')
@include('layouts.others')
@endsection
