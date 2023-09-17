@extends('layouts.header')
@section('header')
@include('layouts.navbar')

@include('layouts.cart')
@include('layouts.sidebar') 
@include('layouts.login')


<div class="banner-terms-main text-center">
  <h2 class="text-center terms-and-conditions-heading-banner">About Us</h2>
  <span class="text-white"><a class="text-white breadcrumbs-terms-conditions" href="#">HOME / ABOUT US</a></span>
</div>

<section class="our-story mt-8">
    <div class="container-main">
      <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12 lft-story">
          <div class="bg-story">
          </div>
          <div class="image-story">
            <img src="{{url('/assets/succ/images/Rectangle 96.png')}}" alt="">
          </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
          <p>{!! $settings->aboutus ?? '' !!}</p>
        </div>
      </div>
    </div>
</section>

@include('layouts.achievement') 

@include('layouts.freeshipping') 

@include('layouts.footer')
@include('layouts.others')
@endsection
