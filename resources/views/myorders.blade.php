@extends('layouts.header')
@section('header')
@include('layouts.navbar')
<section class="section-content padding-y">
  <div class="container">
    <div class="row">
      <aside class="col-md-3 d-none d-xl-block d-md-block d-lg-block">
        <ul class="list-group">
          <li class="list-group-item" >
          <small>Hello,</small><br><b>{{$username}}</b></li>
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
        <ul class="list-group">
          <a class="list-group-item" href="{{url('/profile')}}"> My Profile</a>
          <a class="list-group-item" href="{{url('/change')}}"> Change Password</a>
          <a class="list-group-item active" href="{{url('/orders')}}"> Orders </a>
          <a class="list-group-item" href="{{url('/notifications')}}"> Notifications </a>
          <a class="list-group-item" href="{{url('/logout')}}"> Logout </a>
        </ul>
      </aside>
      </ul>
      </div>
    </nav>
  </header>

      <div class="col-md-9">
        @if(count($orders) > 0)
          @foreach($orders as $key => $value)
            <article class="card card-body mb-2">
              <div class="row align-items-center">
                <div class="col-md-4 col-8">
                  <figure class="itemside">
                    <figcaption class="info">
                      <a href="{{url('/orders/'.$value->id)}}" class="title">
                        <p style="font-size: 17px;"><b class="text-muted">Order ID: #{{$value->id}}</b></p>
                      </a>
                      <span class="text-muted"><small>Payment Type: {{$value->paytype}}</small> </span><br>
                      <span class="text-muted">
                        @if($value->paystatus == 'Success')
                          <small>Payment Status: <span class="text-success">{{$value->paystatus}}</span></small>
                        @elseif($value->paystatus == 'Failed')
                          <small>Payment Status: <span class="text-danger">{{$value->paystatus}}</span></small>
                        @else
                          <small>Payment Status: {{$value->paystatus}}</small>
                        @endif
                      </span><br>
                    </figcaption>
                  </figure> 
                </div>
                <div class="col-md-3 col-4"> 
                  <span class="text-muted"><small>Amount: ₹{{$value->price}}</small> </span><br>
                  <span class="text-muted"><small>Discount:  ₹{{$value->price - $value->offerprice}}</small></span><br>
                  <span class="text-muted"><small>Total:  ₹{{$value->offerprice}}</small></span>
                </div>
                <div class="col-md-5 col-12 ">
                  <p style="font-size: 15px; margin: 0px;">
                    @if($value->paystatus == 'Failed')
                      <i class="fas fa-circle text-danger" ></i>&nbsp;
                      Payment Failled!
                    @else
                      @if($value->status == 'New')
                        <i class="fas fa-circle text-muted" ></i>&nbsp;
                        Order Placed
                      @elseif($value->status == 'Accepted')
                        <i class="fas fa-circle text-info" ></i>&nbsp;
                        Order Accepted
                      @elseif($value->status == 'Processing')
                        <i class="fas fa-circle" style="color: #007bff!important;"></i>&nbsp;
                        Order Processing
                      @elseif($value->status == 'Cancelled')
                        <i class="fas fa-circle text-warning" ></i>&nbsp;
                        Order Cancelled
                      @elseif($value->status == 'Delivered')
                        <i class="fas fa-circle text-success" ></i>&nbsp;
                        Order Delivered
                      @elseif($value->status == 'Rejected')
                        <i class="fas fa-circle text-danger" ></i>&nbsp;
                        Order Cancelled
                      @endif
                    @endif
                  </p>
                  <small  class="">
                    @if($value->paystatus == 'Failed')
                      Payment Failed. Try Ordering again.
                    @else
                      @if($value->status == 'New')
                        Your Order has been Placed.
                      @elseif($value->status == 'Accepted')
                        Your Order will be Delivered Soon.
                      @elseif($value->status == 'Processing')
                        Your item has been Shipped and will be Delivered Soon.
                      @elseif($value->status == 'Cancelled')
                        Your Cancellation Request Accepted.
                      @elseif($value->status == 'Delivered')
                        Your Order has been Delivered.
                      @elseif($value->status == 'Rejected')
                        Your Order is Rejected by SignUpCasuals.
                      @endif
                    @endif
                  </small><br>
                  <small  class="">
                    <a href="{{url('/orders/'.$value->id)}}" class="title" style="color:blue; text-decoration: underline;">View More</a>
                  </small>
                </div>
              </div>
            </article>
          @endforeach
        @else
          <tr>
            <td colspan="5" align="center">No Orders Found</td>
          </tr>
        @endif
      </div>
    </div>

  </div>
</section>
@include('layouts.footer')
@include('layouts.others')
<script type="text/javascript">
</script>
<style>
  *,*::before,*::after {
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
  a,button {
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
  .header .navbar .top-menu li + li {
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