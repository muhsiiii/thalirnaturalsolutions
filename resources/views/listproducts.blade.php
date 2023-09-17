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


<!-- banner section  -->
<section class="banner">
  <img src="{{url('/assets/succ/images/about_thalir 1.png')}}" alt="">
  <div class="content-banner">
    <h2>CATEGORISE PAGE</h2>
  </div>
</section>

<!-- product category section  -->
@if($categoryproducts)
<section class="products catgry">
        <div class="container-main category">
            <h3>{{$categoryproducts->name ?? ''}}</h3>
            <p>{{$categoryproducts->desc ?? ''}}</p>
            <div class="row grid-row">
              @foreach($categoryproducts->products as $categorykey => $categoryproduct)
              <?php
                  $productAvgRating = App\Http\Controllers\AdminProductsController::getProductAvgRating($categoryproduct->id);
                  $productRatingCount= App\Http\Controllers\AdminProductsController::getProductReviewCount($categoryproduct->id);
                  $productFetaure = explode("|",$categoryproduct->features);
              ?>
              <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                <div class="inner-col-procts">
                  <a class="view-page" href="{{url('/product/'.$categoryproduct->id)}}">
                  <div class="product-img"><img src="{{url($categoryproduct->image)}}" alt=""></div>
                  <p class="product-namee"><b>{{$categoryproduct->name}}</b></p>
                  <h6>{{Helper::wordLim($productFetaure[0],5) ?? ''}}</h6>
                  @if($categoryproduct->offerprice != $categoryproduct->price)
                    <h5 class="text-center mb-0">₹ {{$categoryproduct->offerprice ?? 0}} <del style="color: gray;" class="text-center">₹ {{$categoryproduct->price ?? 0}}</del></h5>
                  @else
                    <h5 class="text-center mb-0">₹ {{$categoryproduct->offerprice ?? 0}}</h5>
                  @endif
                  <?php $offer =  ($categoryproduct->price - $categoryproduct->offerprice)/$categoryproduct->price * 100;    ?>
                  <p class="pb-0 green-text">{{round($offer)}}% off</p>
                  <div class="review">
                    <img src="{{url('/assets/succ/images/star.png')}}" alt=""> <p  style="color:  #A5A5A5;" >{{ number_format($productAvgRating?? 0,1)}} | </p><img src="{{url('/assets/succ/images/blue-tick.png')}}" alt=""><p  style="color:  #A5A5A5;">{{$productRatingCount ?? 0}} Reviews</p>
                  </div>
                  </a>
                  <button onclick="directAddToCart({{$categoryproduct->id}},'{{$categoryproduct->name}}','1')">ADD  TO CART</button>
                </div>
              </div>
              @endforeach
            </div>
            <!-- <a class="view-btn" href="#"></a> -->
        </div>
</section>
@endif


<input type="hidden" id="userid" value="{{$userid ?? '0'}}">

@include('layouts.freeshipping')

@include('layouts.footer')
@include('layouts.others')
@endsection
