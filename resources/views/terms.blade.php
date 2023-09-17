@extends('layouts.header')
@section('header')
@include('layouts.navbar')
@include('layouts.sidebar') 
@include('layouts.cart')
@include('layouts.login')


<div class="banner-terms-main text-center">
  <h2 class="text-center terms-and-conditions-heading-banner">Terms and Conditions</h2>
  <span class="text-white"><a class="text-white breadcrumbs-terms-conditions" href="#">HOME / TERMS AND CONDITIONS</a></span>
</div>
<div class="container terms-footer" style="padding: 5%;">
  <div class="title-with-left">
    {!! $settings->terms ?? '' !!}
  </div>
</div>

@include('layouts.footer')
@include('layouts.others')
@endsection
