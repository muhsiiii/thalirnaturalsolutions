@extends('layouts.header')
@section('header')
@include('layouts.navbar')

<section class="section-content padding-y">
  <div class="container">
    <div class="row">
      <aside class="col-md-3 d-none d-xl-block d-md-block d-lg-block">
        <ul class="list-group">
          <li class="list-group-item">
            <small>Hello,</small><br><b>{{$username}}</b>
          </li>
        </ul><br>
        <ul class="list-group">
          <a class="list-group-item" href="{{url('/profile')}}"> My Profile</a>
          <a class="list-group-item" href="{{url('/change')}}"> Change Password</a>
          <a class="list-group-item active" href="{{url('/orders')}}"> Orders </a>
          <a class="list-group-item" href="{{url('/notifications')}}"> Notifications </a>
          <a class="list-group-item" href="{{url('/logout')}}"> Logout </a>
        </ul>
      </aside>

      <header class="header d-xl-none d-lg-none d-md-none" style="width: 100%; border-radius: 5px; margin-bottom: 10px;">
        <nav class="navbar ">
          <button aria-label="Open Mobile Menu" class="open-mobile-menu">
            <i class="fas fa-bars"> &nbsp; <small>Hello,</small>&nbsp;<b>{{$username}}</b></i>
          </button>

          <div class="top-menu-wrapper">
            <ul class="top-menu">
              <li class="mob-block" style="margin-left: 100%;">
                <button aria-label="Close Mobile Menu" class="close-mobile-menu">
                  <i class="fas fa-times"></i>
                </button>
              </li>
              <aside class="col-md-3">
                <!--<ul class="list-group">
               <li class="list-group-item" >
              <small>Hello,</small><b>{{$username}}</b></li>    
              </ul>-->

                <ul class="list-group">
                  <a class="list-group-item" href="{{url('/profile')}}"> My Profile</a>
                  <a class="list-group-item" href="{{url('/change')}}"> Change Password</a>
                  <a class="list-group-item active" href="{{$value->name}}"> Orders </a>
                  <a class="list-group-item" href="{{url('/notifications')}}"> Notifications </a>
                  <a class="list-group-item" href="{{url('/logout')}}"> Logout </a>
                </ul>
              </aside>
            </ul>
          </div>
        </nav>
      </header>

      <aside class="col-md-9">
        <div class="card mb-3">
          <article class="card-body">
            <header class="mb-4">
              <h4 class="card-title">Order ID: #{{$order->id}}</h4>
            </header>
            <div class="row">
              <?php
              $ptotal = 0;
              if ($orderItems) {
                foreach ($orderItems as $okey => $items) { ?>
                  <?php $product = App\Http\Controllers\AdminProductsController::getProduct($items->productid); ?>
                  <div class="col-md-6">
                    <figure class="itemside  mb-3">
                      <div class="aside">
                        <a href="{{url('/product/'.$product->id)}}">
                          <img src="{{url($product->image)}}" class="border img-xs">
                        </a>
                      </div>
                      <figcaption class="info">
                        <p>{{$product->name}}({{$items->unit_name}})</p>
                        <span>₹{{$items->amount}} x {{$items->quantity}} = ₹{{$items->amount * $items->quantity}} </span>
                      </figcaption>
                    </figure>
                  </div>
              <?php }
              } ?>
            </div>
          </article>

          <article class="card-body border-top">
            <dl class="row">
              <dt class="col-sm-10">Total:</dt>
              <dd class="col-sm-2 text-right text-secondary"><strong>₹{{$order->price - 60}}</strong></dd>
              <dt class="col-sm-10">Delivery charge: </dt>
              <dd class="col-sm-2 text-right text-danger"><strong> + ₹60</strong></dd>
              <dt class="col-sm-10">Discount:</dt>
              <dd class="col-sm-2 text-success text-right"><strong> - ₹{{$order->price - $order->offerprice}}</strong></dd>
              <dt class="col-sm-10">Subtotal:</dt>
              <dd class="col-sm-2 text-primary text-right"><strong class="h5">₹{{$order->offerprice}}</strong></dd>
            </dl>
          </article> <!-- card-body.// -->
        </div> <!-- card.// -->
      </aside>

</section>
@include('layouts.footer')
@include('layouts.others')
<style>
  *,
  *::before,
  *::after {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
  }

  body {
    font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    font-size: 1rem;
    line-height: 1.5;
    min-height: 100vh;
  }

  ul {
    list-style: none;
  }

  a {
    text-decoration: none;
    color: inherit;
  }

  img {
    display: block;
    max-width: 100%;
    height: auto;
  }

  a,
  button {
    cursor: default;
  }

  button {
    color: inherit;
    background: transparent;
    border: none;
    outline: none;
  }

  .no-transition {
    transition: none !important;
  }

  .header {
    position: relative;
    padding: 7px;
    background: #ffffff;
    box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.15), 0 2px 1px -5px rgba(0, 0, 0, 0.12), 0 1px 6px 0 rgba(0, 0, 0, 0.2);
  }

  .header .navbar {
    display: flex;
    flex-direction: row;
    flex: 1;
    flex-basis: auto;
    align-items: center;
    justify-content: space-between;
  }

  .header .navbar .top-menu-wrapper {
    color: #221f1f;
  }

  .header .navbar .top-menu-wrapper::before {
    content: "";
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: -1;
    transition: background 0.5s;
  }

  .header .navbar .open-mobile-menu i {
    color: #221f1f;
  }

  .header .navbar .top-menu {
    position: fixed;
    top: 0;
    left: 0;
    bottom: 0;
    z-index: 2;
    transform: translate3d(-100%, 0, 0);
    transition: transform 0.4s cubic-bezier(0.23, 1, 0.32, 1);
  }

  .header .navbar .top-menu {
    display: flex;
    flex-direction: column;
    width: 100%;
    overflow-y: auto;
    padding: 1.5rem 1.5rem;
    background: #ffffff;
  }

  .header .navbar .top-menu-wrapper.show-offcanvas::before {
    background: rgba(0, 0, 0, 0.5);
    z-index: 1;
  }

  .header .navbar .top-menu-wrapper.show-offcanvas .panel,
  .header .navbar .top-menu-wrapper.show-offcanvas .top-menu {
    transform: translate3d(0, 0, 0);
    transition-duration: 0.7s;
  }

  .header .navbar .top-menu-wrapper.show-offcanvas .top-menu {
    transition-delay: 0.2s;
  }

  .header .navbar ul a {
    display: inline-block;
    font-size: 1rem;
    font-weight: 600;
    text-transform: uppercase;
    transition: color 0.35s ease-out;
  }

  .header .navbar ul a:hover {
    color: #d93622;
  }

  .header .navbar .has-dropdown i {
    display: none;
  }

  .header .navbar .sub-menu {
    padding: 0.5rem 1.5rem 0 1.5rem;
  }

  .header .navbar .sub-menu a {
    text-transform: capitalize;
    font-size: 1rem;
    font-weight: 400;
    margin-top: 0rem;
  }

  .header .navbar .top-menu li+li {
    margin-top: 1.3rem;
  }

  .header .navbar .top-menu .mob-block {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 2rem;
  }

  .header .navbar .top-menu .mob-block i {
    color: #221f1f;
  }
</style>

<script>
  const pageHeader = document.querySelector(".header");
  const openMobMenu = document.querySelector(".open-mobile-menu");
  const closeMobMenu = document.querySelector(".close-mobile-menu");
  const topMenuWrapper = document.querySelector(".top-menu-wrapper");
  const isVisible = "is-visible";
  const showOffCanvas = "show-offcanvas";
  const noTransition = "no-transition";
  let resize;

  openMobMenu.addEventListener("click", () => {
    topMenuWrapper.classList.add(showOffCanvas);
  });

  closeMobMenu.addEventListener("click", () => {
    topMenuWrapper.classList.remove(showOffCanvas);
  });

  window.addEventListener("resize", () => {
    pageHeader.querySelectorAll("*").forEach(function(el) {
      el.classList.add(noTransition);
    });
    clearTimeout(resize);
    resize = setTimeout(resizingComplete, 500);
  });

  function resizingComplete() {
    pageHeader.querySelectorAll("*").forEach(function(el) {
      el.classList.remove(noTransition);
    });
  }
</script>
@endsection