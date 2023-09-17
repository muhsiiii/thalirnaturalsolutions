
<footer class="bg-light bg-light-mobile  text-lg-start">
  <!-- Grid container -->
  <div class="container mobile-border-btm">
    <div class="row">
      <div class="col-lg-3 col-md-6 mb-md-0">
        <img class="logo" src="{{url('/assets/succ/images/logo.png')}}" alt="">
        <ul class="list-unstyled mb-0">
          <h6 class="text-uppercase mb-0 moble-none paymnt">PAYMENT</h6>
          <ul class="list-unstyled">
            <li class=""><a href="#!" class="pymnt"><img src="{{url('/assets/succ/images/image 22.png')}}" alt=""> 100% Payment Protection, Easy Return Policy</a></li>
            
            <div class="pymnts">
              <li><a href="#"><img src="{{url('/assets/succ/images/image 17.png')}}" alt=""></a></li>
              <li><a href="#"><img src="{{url('/assets/succ/images/image 18.png')}}" alt=""></a></li>
              <li><a href="#"><img src="{{url('/assets/succ/images/image 19.png')}}" alt=""></a></li>
              <li><a href="#"><img src="{{url('/assets/succ/images/image 20.png')}}" alt=""></a></li>
            </div>
          </ul>
        </ul>
      </div>
      <div class="col-lg-3 col-md-6 mb-md-0 moble-none">
        <h5 style="font-size: 17px;" class="text-uppercase mb-0 acnt">My Account</h5>
        <ul class="list-unstyled">
			@if($userid > 0 && $username!="Guest User")
          <li><a  href="{{url('/profile')}}" class="">Profile</a></li>
			@else
			<li><a data-toggle="modal" data-target="#loginModal" class="" style="cursor:pointer;color:grey;">Profile</a></li>
			@endif
          <li><a href="{{url('/orders')}}" class="">Orders</a></li>
          <li><a href="{{url('/blog')}}" class="">Blog</a></li>
          <li><a href="{{url('/address')}}" class="">Address</a></li>
        </ul>
      </div>
      <div class="col-lg-3 col-md-6 mb-md-0 moble-none">
        <h5 style="font-size: 17px;" class="text-uppercase mb-0">About us</h5>
        <ul class="list-unstyled">
          <li><a href="{{'/'}}" class="">Our story</a></li>
          <li><a href="{{url('/privacy-policy')}}" class="">Privacy Policy</a></li>
          <li><a href="{{url('/terms-conditions')}}" class="">Terms & Conditions</a></li>
          <!-- <li><a href="#!" class="">Disclaimer</a></li> -->
        </ul>         
      </div>
      <!--Grid column-->
      <div class="col-lg-3 col-md-6 mb-md-0 moble-none">
        <ul class="list-unstyled mb-0">
          <h5 style="font-size: 17px;" class="text-uppercase mb-0">Information</h5>
          <li>
            <a href="{{url('/contactus')}}" class="">Contact us</a>
          </li>
          <li>
            <a href="{{url('/shipping-delivery-policy')}}" class="">Shipping & Delivery policy</a>
          </li>
          <!-- <li>
            <a href="#!" class="">Explore more</a>
          </li> -->
          <li>
            <a href="{{url('/return-policy')}}" class="">Return policy</a>
          </li>
        </ul>
      </div>
    </div>
    <!--Grid row-->
  </div>
  <!-- Copyright -->
  <ul style="justify-content: center;text-align: center;padding-top: 15px;" class="list-unstyled">
    <h4 class="flow-us">Follow Us on</h4>
    <a  href="{{$settings? $settings->phone  : ''}}" target="_blank">
      <i class="ri-phone-line"></i>
    </a>
    
    <a  href="{{$settings? $settings->whatsappurl : ''}}" target="_blank">
      <i class="ri-whatsapp-line"></i>
    </a>
    <a  href="{{$settings? $settings->instaurl : ''}}" target="_blank">
      <i class="ri-instagram-line"></i>
    </a>
    <a  href="{{$settings? $settings->fburl : ''}}" target="_blank">
      <i class="ri-facebook-circle-line"></i>
    </a>
    <a  href="{{$settings? $settings->youtubeurl : ''}}" target="_blank">
      <i class="ri-youtube-line"></i>
    </a>
  </ul>
  <div class="text-center ftrcpryrgt" style="background-color: rgba(0, 0, 0, 0.2);padding: 15px;display: flex;justify-content: space-evenly;align-items: center;">
    <div class="lft-cprgt">
      ©  Copyright {{date('Y')}} Thalir Natural Solutions. Crafted by <a style="color:#01445E;" href="http://erebsindia.com">ERE Business Solutions</a>
    </div>
    
  </div>
  <!-- Copyright -->
</footer>
<style>
  .main__menu ul.dropdown li a {
    padding: 2px 18px !important;
  }
  .products .container-main .product-img img {
    width: auto;
  }
  .position-relative {
    position: relative;
  }
  .remove-cart-icon {
    position: absolute;
    top: 0;
    right: 0;
  }
  .adrees-list a {
    width: auto !important;
  }
  .productmoblbar {
    margin-top: 2% !important;
  }
  .navbar .nav-item .actives {
    color: #008C16;
  }
  .navbar .dropdown-toggle.actives {
    color: #008C16;
  }
  .hide {
    display: none !important;
  }
  input[type="radio"] {
    width: 20px;
    height: 30px;
  }
  
  .profail-select-bar{
    width: 60% !important;
  }
  @media only screen and (max-width: 900px) {
    .col, .col-1, .col-10, .col-11, .col-12, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-auto, .col-lg, .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-auto, .col-md, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-auto, .col-sm, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-auto, .col-xl, .col-xl-1, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-auto {
      padding-right: 8px;
      padding-left: 8px;
      padding-top: 8px;
    }
    .grid-row, .row {
      margin-right: 0px;
      margin-left: 0px;
    }
    .sidebar .btns a {
      padding: 0.9rem 1.1rem!important;
    }
    .bg-story.adj-padding {
      margin-bottom: 40px !important;
    }
    .free-shoping .container-main {
      border: 1px solid #FFF;
      padding: 0px !important;
    }
    .free-shoping {
      border: none !important;
      border-top: 10px solid #f1f1f1 !important;
    }
    .container.mobile-border-btm {
      border-bottom: 10px solid #f1f1f1 !important;
    }
    .bg-light-mobile {
      background-color: #FFF !important;
    }
    .adresses .leftadrss {
      margin-right: 0px !important;
    }
    .address {
      margin-top: 40px;
    }
    .place-orderpage {
      margin: 5px !important;
    }
    
    .profail-select-bar{
      width: 100% !important;
    }
  }
  @media only screen and (max-width: 600px) {
    .col, .col-1, .col-10, .col-11, .col-12, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-auto, .col-lg, .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-auto, .col-md, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-auto, .col-sm, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-auto, .col-xl, .col-xl-1, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-auto {
      padding-right: 7px;
      padding-left: 7px;
      padding-top: 7px;
    }
    .sidebar .btns a {
      padding: 0.8rem 1rem!important;
    }
    .bg-story.adj-padding {
      margin-bottom: 30px !important;
    }
    .place-orderpage {
      margin: 4px !important;
    }
  }
  @media only screen and (max-width: 450px) {
    .col, .col-1, .col-10, .col-11, .col-12, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-auto, .col-lg, .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-auto, .col-md, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-auto, .col-sm, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-auto, .col-xl, .col-xl-1, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-auto {
      padding-right: 6px;
      padding-left: 6px;
      padding-top: 6px;
    }
    .sidebar .btns a {
      padding: 0.7rem 0.9rem!important;
    }
    .bg-story.adj-padding {
      margin-bottom: 20px !important;
    }
    .place-orderpage {
      margin: 3px !important;
    }
  }
  @media only screen and (max-width: 350px) {
    .col, .col-1, .col-10, .col-11, .col-12, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-auto, .col-lg, .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-auto, .col-md, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-auto, .col-sm, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-auto, .col-xl, .col-xl-1, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-auto {
      padding-right: 5px;
      padding-left: 5px;
      padding-top: 5px;
    }
    
    .place-orderpage {
      margin: 2px !important;
    }
  }
</style>