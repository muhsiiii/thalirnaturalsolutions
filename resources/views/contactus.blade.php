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

<!-- <section class="banner">
  <img src="{{url('/assets/succ/images/about_thalir 1.png')}}" alt="">
    <div class="content-banner">
      <h2> Contact Us</h2>
    </div>
</section> -->

<div class="banner-terms-main text-center">
  <h2 class="text-center terms-and-conditions-heading-banner">Contact Us</h2>
  <span class="text-white"><a class="text-white breadcrumbs-terms-conditions" href="#">HOME / CONTACT US</a></span>
</div>

<!-- <section class="contact-us mt-8">
        <div class="container-main">
            <div class="row">
                <div class="col-lg-4">
                    <div class="inner-col-contct">
                        <img src="{{url('/assets/succ/images/home 1.png')}}" alt="">
                        <h5>Office Address</h5>
                        <p>{{$settings->address ?? ''}}</p> 
                        <p>PIN:{{$settings->pincode  ?? ''}}</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="inner-col-contct">
                        <img src="{{url('/assets/succ/images/call 1.png')}}" alt="">
                        <h5>Customer Service</h5>
                        <a href="#">+{{$settings->phone  ?? ''}}</a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="inner-col-contct">
                        <img src="{{url('/assets/succ/images/email 1.png')}}" alt="">
                        <h5>Email</h5>
                        <a href="#">{{$settings->email ?? ''}}</a>
                    </div>
                </div>
            </div>
        </div>
</section> -->
<section class="contact-us mt-8">
        <div class="container-main">
            <div class="row">
                <div class="col-lg-4">
                    <div class="updated-contactus">
                      <h3 class="text-center contact-subhead">SAFETY NOTICE</h3>
                      <P>We care about your safety. If you receive any call or SMS about winning  any free gift we request you not to make any payment and report to our Support Team.</P>
                    </div>
                </div>
                <div class="col-lg-4">
                  <div class="updated-contactus">
                    <h3 class="text-center contact-subhead">TRACK YOUR ORDER</h3>
                    <p>Please visit the following website with your tracking number: www.thalirnaturalsolutions.com If no tracking information is available, please wait a few days while the system updates. we are doing our best to deliver your order as soon as possible. Feel free to email us at <a style="font-weight: 600;" href="mailto:Thalirnaturalsolutions@gmail.com">thalirnaturalsolutions@gmail.com</a> for any questions,grievances, or feedback.Please note responses can be delayed.</p>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="updated-contactus">
                    <h3 class="text-center contact-subhead">CONTACT DETAILS</h3>
                    <p>Thalir Natural Solutions Palakkad, Ernakulam, Kochi 682017 <br>  <a style="font-weight: 600;" href="tel:+8883848782">Phone number : +888-384-8782</a> <br> <a style="font-weight: 600;" href="#">Working Hours-</a>   (10AM - 7PM IST Monday to Saturday)</p>
                  </div>
                </div>
            </div>
        </div>
    </section>
<!--     
<section class="iframe container-main">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.1265438383034!2d76.30672785111832!3d10.877978660245729!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba7d12ab985b283%3A0xbfc072c92da2e143!2sThalir%20Natural%20Solutions!5e0!3m2!1sen!2sin!4v1667289536846!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section> -->

@include('layouts.freeshipping') 
@include('layouts.footer')
@include('layouts.others')
@endsection
