@extends('layouts.header')
@section('header')
@include('layouts.navbar')
@include('layouts.sidebar') 
@include('layouts.cart')
@include('layouts.login')


<div class="banner-terms-main text-center">
  <h2 class="text-center terms-and-conditions-heading-banner">Returns Policy</h2>
  <span class="text-white"><a class="text-white breadcrumbs-terms-conditions" href="#">HOME / RETURN  POLICY</a></span>
</div>
<div class="container mt-4">
      {!! $settings->returnpolicy ?? '' !!}
</div>

@include('layouts.footer')
@include('layouts.others')
@endsection
