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

<section class="banner">
  <img src="{{url('assets/succ/images/about_thalir 1.png')}}" alt="">
  <div class="content-banner">
    <h2>Track And Order</h2>
  </div>
</section>

<section class="track-order container-main mt-6">
  <h2 class="underline">Track and order</h2>
  <h6>Please enter your tracking number here</h6>
  <form action="{{url('/trackorder')}}" method="POST">
  {!! csrf_field() !!}
  <div class="input-group form-group mb-3">
    <input type="number" class="form-control" placeholder="Order Id" aria-label="Recipient's username" aria-describedby="basic-addon2" required name="orderid">
    <div class="input-group-append">
      <button class="btn btn-outline-secondary" type="submit" >Track </button> 
    </div>
  
  </div>
  </form>
  <p>Enter the tracking code sent on your registered Email/Mobile Number in the shipment confirmation email.</p>
</section>

@include('layouts.freeshipping') 

@include('layouts.footer')
@include('layouts.others')
@endsection