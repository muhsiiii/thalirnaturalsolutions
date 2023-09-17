@extends('layouts.header')
@section('header')
@include('layouts.navbar')
@include('layouts.sidebar') 
@include('layouts.cart')
@include('layouts.login')

<!-- <div class="container privacy-policy" style="padding: 5%;">
    <div class="title-with-left">
        <h1 class="text-capitalize mb-2">PRIVACY POLICY</h1>
        
    </div>
</div> -->

<div class="banner-terms-main text-center">
  <h2 class="text-center terms-and-conditions-heading-banner">Privacy policy</h2>
  <span class="text-white"><a class="text-white breadcrumbs-terms-conditions" href="#">HOME / PRIVACY POLICY</a></span>
</div>
<div class="container mt-4">
{!! $settings->privacypolicy ?? '' !!}
</div>



@include('layouts.footer')
@include('layouts.others')
@endsection
