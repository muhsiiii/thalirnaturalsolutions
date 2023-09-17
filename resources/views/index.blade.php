@extends('layouts.header')
@section('header')
<style>
		.card-header{
		border-left: solid 3px grey;
	}
.card-body
	{
		padding-top: 23px;margin-top: -10px;border-radius: 0px 0px 10px 10px;border-left: solid 3px #008C16;background: #EEEEEE;margin-bottom: 15px;}
	.faq-answer
	{
	padding-top: 20px;}
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.theme.default.min.css">

@include('layouts.navbar')


<div class="search-box mobli-search">
  <input style="background: none;" class="search-input" type="text" id="searchMob" placeholder="Search Here..">
  <button class="search-btn"><i class="ri-search-line"></i></button>
  <ul class="list-group list-search hide" id="listSearch2" style="z-index: 999; width: inherit;"></ul>
</div>
       

@include('layouts.sidebar')  
@include('layouts.cart')
@include('layouts.login')



<!-- home banner slider -->
<div id="carouselExampleIndicators" style="position: relative;" class="carousel slide slider-banner-home" data-ride="carousel">
  <ol class="carousel-indicators">
    @foreach($banners as $key => $value)
      @if($key == 0)
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      @else
        <li data-target="#carouselExampleIndicators" data-slide-to="{{$key}}"></li>
      @endif
    @endforeach
  </ol>
  
  <div class="carousel-inner">
    @foreach($banners as $key => $value)
      @if($key == 0)
        <div class="carousel-item active">
          <a href="{{$value->url}}">
            <img  class="d-block w-100" src="{{$value->image}}" alt="{{$value->name}}">
          </a>
        </div>
      @else
        <div class="carousel-item">
          <a href="{{$value->url}}">
            <img  class="d-block w-100" src="{{$value->image}}" alt="{{$value->name}}">
          </a>
        </div>
      @endif
    @endforeach
  </div>
</div>

@if($popularsProducts && count($popularsProducts) > 0)
<!-- products secion  -->
<section class="products">
  <div class="container-main mt-4">
    <h3>Best seller</h3>
    {{-- <p class="descrptnproduct">We are recognised as the top provider of Ayurvedic skin care products in the industry. Our high-quality products are designed to be used without causing any negative side effects.You should choose this organic, all-natural skincare line. Made from natural, healthy ingredients, the Thalir Skincare Products are all-natural. This all-natural skincare line is unique and won't be offered by any other companies.</p> --}}
    <div class="row grid-row">
      @foreach($popularsProducts as $key => $value)
        <?php  
        $productAvgRating = App\Http\Controllers\AdminProductsController::getProductAvgRating($value->id); 
        $productRatingCount= App\Http\Controllers\AdminProductsController::getProductReviewCount($value->id); 
        $productFetaure = explode("|",$value->features);
        ?>
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 col-6">
          <div class="inner-col-procts">
            <a class="view-page" href="{{url('/product/'.$value->id)}}">
              <div class="product-img"><img src="{{url($value->image)}}" alt=""></div>
              <p class="product-namee">{{$value->name}}</p>
              <h6>{{Helper::wordLim($productFetaure[0],5) ?? ''}}</h6>
                @if($value->offerprice != $value->price)
                <h5 class="text-center mb-0">₹ {{$value->offerprice ?? 0}} <del style="color: gray;" class="text-center">₹ {{$value->price ?? 0}}</del></h5>
                @else
                <h5 class="mb-0">₹ {{$value->offerprice ?? 0}}</h5>
                @endif
              <?php $offer =  ($value->price - $value->offerprice)/$value->price * 100;    ?>
              <p class="pb-0   offer-discount">{{round($offer)}}% off</p>
              <div class="review">
                <img src="{{url('/assets/succ/images/star.png')}}" alt=""> <p  style="color:  #A5A5A5;" >{{ number_format($productAvgRating?? 0,1)}} | </p><img src="{{url('/assets/succ/images/blue-tick.png')}}" alt=""><p  style="color:  #A5A5A5;">{{$productRatingCount?? 0}} Reviews</p>
              </div>
            </a>
            <button type="button" onclick="directAddToCart({{$value->id}},'{{$value->name}}','1')" class="btn" >ADD  TO CART</button>
          </div>
        </div>
      @endforeach
    </div>
    <!-- <a class="view-btn" href="{{url('/bestsellers/')}}">View All</a>  -->
  </div>
</section>
@endif

@if($categories)
@foreach($categories as $key => $value)
@if(count($value->products) > 0)
<section class="products second btnm-prdcts">
  <div class="container-main">
    <h3>{{$value->name}}</h3>
    <p class="descrptnproduct">{{$value->desc}}</p>
    <div class="row grid-row">
      @foreach($value->products as $categorykey => $categoryproduct)
      <?php  
      $productAvgRating = App\Http\Controllers\AdminProductsController::getProductAvgRating($categoryproduct->id); 
      $productRatingCount= App\Http\Controllers\AdminProductsController::getProductReviewCount($categoryproduct->id); 
      $productFetaure = explode("|",$categoryproduct->features);
      ?>
      <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 col-6">
        <div class="inner-col-procts">
          <a class="view-page" href="{{url('/product/'.$categoryproduct->id)}}">
            <div class="product-img"><img src="{{url($categoryproduct->image)}}" alt=""></div>
            <p class="product-namee"><b>{{$categoryproduct->name ?? ''}}</b></p>
            <h6>{{Helper::wordLim($productFetaure[0],5) ?? ''}}</h6>

            @if($categoryproduct->offerprice != $categoryproduct->price)
              <h5 class="text-center mb-0">₹ {{$categoryproduct->offerprice ?? 0}} <del style="color: gray;" class="text-center">₹ {{$categoryproduct->price ?? 0}}</del></h5>
            @else
              <h5 class="text-center mb-0">₹ {{$categoryproduct->offerprice ?? 0}}</h5>
            @endif
            <?php $offer =  ($categoryproduct->price - $categoryproduct->offerprice)/$categoryproduct->price * 100;    ?>
            <p class="pb-0  offer-discount">{{round($offer)}}% off</p>

            <div class="review">
              <img src="{{url('/assets/succ/images/star.png')}}" alt=""> <p  style="color:  #A5A5A5;" >{{ number_format($productAvgRating?? 0,1)}} | </p><img src="{{url('/assets/succ/images/blue-tick.png')}}" alt=""><p  style="color:  #A5A5A5;">{{ $productRatingCount ?? 0}} Reviews</p>
            </div>
          </a>
          <button type="button" onclick="directAddToCart({{$categoryproduct->id}},'{{$categoryproduct->name}}','1')" class="btn" >ADD  TO CART</button>
        </div>
      </div>
      @endforeach
      
    </div>
    <a class="view-btn" href="{{url('/category/'.$value->id.'/0')}}">View All</a> 
  </div>
</section>
@endif
@endforeach
@endif

<section class="our-story mt-8">
  <div class="container-main">
    <h3 class="underline">Our Story</h3>
    <div class="row mt-3">
      <div class="col-lg-5 col-md-12 col-sm-12">
        <div class="story-bg">
          <img src="{{url('/assets/succ/images/Rectangle 96.png')}}" alt="our story">
        </div>
      </div>
      <div class="col-lg-7 col-md-12 col-sm-12">
        <div class="bg-image-story">
          {!! $settings->ourstory ?? '' !!}
        </div>
      </div>
    </div>
  </div>
</section>


@if(count($shopreviews) > 0)
<section id="testimonial_area " class="section_padding mt-2">
  <h2 class="underline text-center text-customers-say">What Our Customers Say</h2>
  <div class="testimonial-reviews">
    <div class="container-main">
      <div class="row">
        <div class="col-md-12">
          <div class="testmonial_slider_area  owl-carousel owl-carousel owl-theme">
            @foreach($shopreviews as $shopreviewkey => $shopreview)
            <div class="box-area">								
              <p class="content-slider-review text-justify">{{$shopreview->comment}}</p>
              <div class="customer-contnr">
                <img src="{{url($shopreview->image)}}" alt="{{$shopreview->customername}}">
                <div class="custmr-details-review">
                  <h6>{{$shopreview->customername}}</h6>
                  <h6 style="background-color: rgb(109, 165, 35);color: white;padding:0.3rem 0.3rem 0.2rem 0.3rem;border-radius: 8px;width: max-content;text-align: center;display: inline-flex;">
                    {{$shopreview->rating}}<i style="vertical-align: middle;font-size: 15px;margin-left: 2px;" class="ri-star-s-line"></i>
                  </h6>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endif


<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    @foreach($sbanners as $key => $value)
      <div class="carousel-item @if($key ==0) active @endif " >
        <img class="d-block w-100"  src="{{$value->image}}" alt="{{$value->name}}" >
      </div>
    @endforeach
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<!-- <section class="faqs">
  <div class="container-main">
    <h3 class="smlunderline">FAQ'S</h3>
    <div class='faq'>
      <input id='faq-a' type='checkbox'>
      <label for='faq-a'>
        <p class="faq-heading">  What Payment Methods Can I Use?</p>
        <div style="top: -40px;" class='faq-arrow'></div>
          <p class="faq-text">Thalir Natural Solutions supports the following payment options: Cash on Delivery.Debit Card. Credit Card.UPI • Net Banking.</p>
      </label>
      <input id='faq-b' type='checkbox'>
      <label for='faq-b'>
        <p class="faq-heading">How Can I Track My Order?</p>
        <div style="top: -40px;" class='faq-arrow'></div>
          <p class="faq-text">Order updates will be sent to you on regular basis through SMS & Email. You can also track your order here - https://thalirnaturalsolutions.com/order- track, post order dispatch.</p>
      </label>
      <input id='faq-c' type='checkbox'>
      <label for='faq-c'>
        <p class="faq-heading">How to contact Customer Service?</p>
        <div style="top: -40px;" class='faq-arrow'></div>
          <p class="faq-text">Have a problem with your order? Want to know how to use the product you just ordered? Facing any issue? Feel free to reach us for any questions related to your order/product/offers at +918883848782 or drop us an email at Thalirnaturalsolutions@gmail.com</p>
      </label>
      <input id='faq-d' type='checkbox'>
      <label for='faq-d'>
        <p class="faq-heading">What are the Shipping & COD charges?</p>
        <div style="top: -40px;" class='faq-arrow'></div>
          <p class="faq-text">For orders below Rs. 399, Shipping & COD charge of Rs. 40 each will be applicable on orders. We provide an extra 5% OFF up to Rs. 50 on all prepaid orders.</p>
      </label>
  </div>
  </div>
</section> -->
<div class="card-main-faq mt-3 container-main">
<h3 class="smlunderline text-center">FAQ'S</h3>
  <div class="card mt-2">
    <div class="card-body-main" style="">
      <div class="flex flex-column faq-section">
        <div class="row">
          <div class="col-md-12">
            <div id="accordion">
              <div class="card">
                <div class="card-header" id="heading-1" style="background-color: #EEEEEE;margin-top: 15px;border-bottom: none;border-radius: 10px;">
                  <h5 class="mb-0">
                    <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-1" aria-expanded="false" aria-controls="collapse-1">
                     <p class="faq-question">What Payment Methods Can I Use?</p>
                    </a>
                  </h5>
                </div>
                <div id="collapse-1" class="collapse" data-parent="#accordion" aria-labelledby="heading-1">
                  <div class="card-body" style="padding-top: 0px;">
                    <p class="faq-answer">Thalir Natural Solutions supports the following payment options: Cash on Delivery.Debit Card. Credit Card.UPI • Net Banking.</p>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="heading-2" style="background-color: #EEEEEE;margin-top: 15px;border-bottom: none;border-radius: 10px;">
                  <h5 class="mb-0">
                    <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
                      <p class="faq-question">How Can I Track My Order?</p>
                    </a>
                  </h5>
                </div>
                <div id="collapse-2" class="collapse" data-parent="#accordion" aria-labelledby="heading-2">
                  <div class="card-body" style="padding-top: 0px;">
                    <p class="faq-answer">Order updates will be sent to you on regular basis through SMS & Email. You can also track your order here - https://thalirnaturalsolutions.com/order- track, post order dispatch.</p>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="heading-3" style="background-color: #EEEEEE;margin-top: 15px;border-bottom: none;border-radius: 10px;">
                  <h5 class="mb-0">
                    <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-3" aria-expanded="false" aria-controls="collapse-3"> 
                      <p class="faq-question">How to contact Customer Service?</p>
                    </a>
                  </h5>
                </div>
                <div id="collapse-3" class="collapse" data-parent="#accordion" aria-labelledby="heading-3">
                  <div class="card-body" style="padding-top: 0px;">
                  <p class="faq-answer">Have a problem with your order? Want to know how to use the product you just ordered? Facing any issue? Feel free to reach us for any questions related to your order/product/offers at +918883848782 or drop us an email at Thalirnaturalsolutions@gmail.com</p>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="heading-4" style="background-color: #EEEEEE;margin-top: 15px;border-bottom: none;border-radius: 10px;">
                  <h5 class="mb-0">
                    <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-4" aria-expanded="false" aria-controls="collapse-4">
                      <p class="faq-question">What are the Shipping & COD charges?</p>
                    </a>
                  </h5>
                </div>
                <div id="collapse-4" class="collapse" data-parent="#accordion" aria-labelledby="heading-4">
                  <div class="card-body" style="padding-top: 0px;">
                    <p class="faq-answer">For orders below Rs. 399, Shipping & COD charge of Rs. 40 each will be applicable on orders. We provide an extra 5% OFF up to Rs. 50 on all prepaid orders.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<input type="hidden" id="userid" value="{{$userid ?? '0'}}">

@include('layouts.freeshipping') 
@include('layouts.footer')
@include('layouts.others')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js"></script>
<script>
  $('.carousel').carousel({
    interval: 2000
  })
  $(".testmonial_slider_area").owlCarousel({
    autoplay: true,
    slideSpeed:1000,
    items : 3,
    loop:true,
    margin:10,
    nav:false,
    margin: 30,
    center: true,
    dots: true,
    responsive:{
      320:{
        items:1
      },
      767:{
        items:2
      },
      600:{
        items:2
      },
      1000:{
        items:3
      }
    }
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    if ($('.slider-items-slick').length > 0) { // check if element exists
      $('.slider-items-slick').slick({
        infinite: true,
        swipeToSlide: true,
        slidesToShow: 4,
        dots: true,
        slidesToScroll: 2,
        prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-chevron-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="fa fa-chevron-right"></i></button>',
        responsive: [
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2
          }
        },
        {
          breakpoint: 640,
          settings: {
            slidesToShow: 1
          }
        }
        ]
      });
    }
  });
</script>

<!-- scripts  -->
<script type="text/javascript">
  function functionToExecute(){
    document.querySelector('.sidecart').classList.toggle('open-cart');
  }
  function toggleCartt(){
    document.querySelector('.sidecart').classList.toggle('open-cart');
  }
  // toggleCart();
	
};
</script>



@endsection
