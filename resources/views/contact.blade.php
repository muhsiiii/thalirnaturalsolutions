@extends('layouts.header')
@section('header')
@include('layouts.navbar')

@include('layouts.cart')
@include('layouts.sidebar')
@include('layouts.login') 

<div class="container" style="padding: 5%;">
  <div class="col-md-12 row mt-md-4">
    <div class="col-md-12">
      <h3 class="text-capitalize mb-2">SIGNUP CASUALS Help Center | 24x7 Customer Care Support </h3>
      <p class="font-15">
      The SIGNUP CASUALS Help Centre page lists out various types of issues that you may have encountered so that there can be quick resolution and you can go back to shopping online. For example, you can get more information regarding order tracking, delivery date changes, help with returns (and refunds), and much more. The SIGNUP CASUALS Help Centre also lists out more information that you may need regarding SIGNUP CASUALS Plus, payment, shopping, and more. The page has various filters listed out on the left-hand side so that you can get your queries solved quickly, efficiently, and without a hassle. You can get the SIGNUP CASUALS Help Centre number or even access SIGNUP CASUALS Help Centre support if you need professional help regarding various topics. The support executive will ensure speedy assistance so that your shopping experience is positive and enjoyable. You can even inform your loved ones of the support page so that they can properly get their grievances addressed as well. Once you have all your queries addressed, you can pull out your shopping list and shop for all your essentials in one place. You can shop during festive sales to get your hands on some unbelievable deals online. 
      </p>
      <p class="mt-3 font-15">
        <b>Get Us</b>
        <br>
        <a href="tel:+91-9562889921"> <i class="fas fa-mobile-alt"></i> +91-9562889921 </a>
        <br>
        <a href="mailto:signupcasuals2021@gmail.com"> <i class="far fa-envelope"></i> signupcasuals2021@gmail.com </a>
      </p>
      <p class="mt-3 font-15">
            <b>Address</b>

            <br>
            Sign up casuals
            <br>
            City centre
            <br>
            Ground floor
            <br>
            Thrissur
            <br>
            Pin:680001
      </p>
    </div>
  </div>
</div>

@include('layouts.footer')
@include('layouts.others')
@endsection
