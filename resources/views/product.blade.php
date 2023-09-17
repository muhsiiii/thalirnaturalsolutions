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
	.faq-question{
	margin-right:10px;}
</style>
@include('layouts.navbar')


<div class="search-box mobli-search">
  <input style="background: none;" class="search-input" type="text" id="searchMob" placeholder="Search Here..">
  <button class="search-btn"><i class="ri-search-line"></i></button>
  <ul class="list-group list-search hide" id="listSearch2" style="z-index: 999; width: inherit;"></ul>
</div>

@include('layouts.sidebar')
@include('layouts.cart')
@include('layouts.login')


<section class="product-single mt-4">
    <h3 class="productheading">{{$product->heading}}</h3>
    <p class="productsubheading">{{$product->sub_heading}}</p>
      <div class = "card-wrapper container-main mt-4">
            <div class = "card">
              <!-- card left -->
              <div class = "product-imgs">
                <div class = "img-display">
                  <div class = "img-showcase">
                    <img src = "{{url($product->image)}}" alt = "shoe image">
                    @if($product->image2 != '')
                      <img src = "{{url($product->image2)}}" alt = "shoe image">
                    @endif
                    @if($product->image3 != '')
                      <img src = "{{url($product->image3)}}" alt = "shoe image">
                    @endif
                    @if($product->image4 != '')
                      <img src = "{{url($product->image4)}}" alt = "shoe image">
                    @endif
					  @if($product->image5 != '')
                      <img src = "{{url($product->image5)}}" alt = "shoe image">
                    @endif
					 <!--  @if($product->image6 != '')
                      <img src = "{{url($product->image6)}}" alt = "shoe image">
                    @endif -->
                  </div>
                </div>
                <div class = "img-select">
                  <div class = "img-item">
                    <a href = "#" data-id = "1">
                    <img src = "{{url($product->image)}}" alt = "image1">
                    </a>
                  </div>
                  @if($product->image2 != '')
                  <div class = "img-item">
                    <a href = "#" data-id = "2">
                      <img src = "{{url($product->image2)}}" alt = "image2">
                    </a>
                  </div>
                  @endif
                  @if($product->image3 != '')
                  <div class = "img-item">
                    <a href = "#" data-id = "3">
                      <img src = "{{url($product->image3)}}" alt = "image3">
                    </a>
                  </div>
                  @endif
                  @if($product->image4 != '')
                  <div class = "img-item">
                    <a href = "#" data-id = "4">
                      <img src = "{{url($product->image4)}}" alt = "image4">
                    </a>
                  </div>
                  @endif
					@if($product->image5 != '')
                  <div class = "img-item">
                    <a href = "#" data-id = "5">
                      <img src = "{{url($product->image5)}}" alt = "image5">
                    </a>
                  </div>
                  @endif
					<!-- @if($product->image6 != '')
                  <div class = "img-item">
                    <a href = "#" data-id = "6">
                      <img src = "{{url($product->image6)}}" alt = "image6">
                    </a>
                  </div>
                  @endif -->
                </div>
              </div>
              <div class="product-detail container-main">
                <h6 class="mobile-left">{{$product->name}}</h6>
                <p class="mobile-left">{{$product->features}}</p>
                <div class="review mobile-left">
                  <img src="{{url('/assets/succ/images/star.png')}}" alt=""> <p>{{number_format($avgRating ?? 0,1)}}</p><img src="{{url('/assets/succ/images/blue-tick.png')}}" alt=""><p>{{count($reviews)}} Reviews</p>
                </div>
                <div class="price-value mobile-left">
                  <h5 class="pric mobile-left mb-0">Price</h5>
                  <h5 class="orginal-price-product mb-0">₹{{$product->offerprice}}</h5>
                  <h5 class="old-price mb-0">₹{{$product->price}}</h5>
                  <?php $offer =  ($product->price - $product->offerprice)/$product->price * 100; ?>
                  <p class="off mb-0">{{round($offer)}} % off</p>
                  <h6 class="hry mobile-left pl-3 mb-0">HURRY UP </h6>
                </div>
                <p class="tax-heading mobile-left">Incl. of all taxes</p>
                <div class="product-logo">
                  <div style="display:block;text-align: center;margin-right: 10px;" class="product-sub">
                    <img src="{{url('/assets/succ/images/dt1.png')}}" alt="">
                    <p class="product-logo-desc" style="text-align:center !important;">Dermatologically <br> Tested</p>
                  </div>
                  <div style="display:block;text-align: center;margin-right: 25px;" class="product-sub">
                    <img src="{{url('/assets/succ/images/toxicfree1.png')}}" alt="">
                    <p class="product-logo-desc" style="text-align:center !important;">100% <br> Natural</p>
                  </div>
                  <div style="display:block;text-align: center;margin-right: 25px;" class="product-sub">
                    <img src="{{url('/assets/succ/images/crueltyfree1.png')}}" alt="">
                    <p class="product-logo-desc" style="text-align:center !important;">Toxic <br> Free</p>
                  </div>
                  <div style="display:block;text-align: center;margin-right: 25px;" class="product-sub">
                    <img src="{{url('/assets/succ/images/natural1.png')}}" alt="">
                    <p class="product-logo-desc" style="text-align:center !important;">Best of <br> Nature</p>
                  </div>


                </div>
                <div class="price-detail-box">
                    <h5 class="pric">Price</h5>
                    <h5>₹ {{$product->offerprice}}</h5>
                    <p>Incl. of all taxes</p>
                    <div class="review">
                        <img src="{{url('/assets/succ/images/star.png')}}" alt=""> <p>{{number_format($avgRating ?? 5,1)}}</p><img src="{{url('/assets/succ/images/blue-tick.png')}}" alt=""><p>{{count($reviews)}} Reviews</p>
                    </div>
                    <label for="">Quantity</label> <br>
                    <button style="width: 26px;border: none;" onclick="decrement()">-</button>
                    <input style="width: 45px;text-align: center;" id=shwQuantity type=number min=1 max=100 value="1">
                    <button style="width: 26px;border: none;" onclick="increment()">+</button>
                    <a  href="javascript:void(0);" onclick="addToCart();"><i class="ri-shopping-cart-2-line"></i> Add to cart</a>
                </div>
              </div>
            </div>
          </div>
          <div style="display: block;" class="product-description card-wrapper container-main">
            <h3 class="underline productdescr" style="text-align: start;">Product <span>Description</span></h3>
            <p style="text-align: justify;">{!! $product->desc ?? '' !!}</p>
      </div>
</section>


  <a class="add-to-cart-mobile"  href="javascript:void(0);" onclick="addToCart();"><i class="ri-shopping-cart-2-line"></i> ADD TO CART</a>


@if(count($benefits) > 0)
  <section class="our-story benifits">
    <div class="container-main">
      <h3 class="underline">Benefits</span></h3>
      <div class="row mt-3">
      @foreach($benefits as $key1 => $benefit)
        @if($key1 % 2 == 0)
        <div class="col-lg-6 col-md-12 col-sm-12 lft-story mb-6">
          <div class="bg-story">
          </div>
          <div class="image-story">
            <img src="{{$benefit->image}}" alt="">
          </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 mb-6 stry-cntnt">
          <h4><span>{{$benefit->title}}</span></h4>
          <p>{{$benefit->desc}}</p>
        </div>
        @else
        <div class="col-lg-6 col-md-12 col-sm-12 mb-6 rgt-benfts">
          <h4><span>{{$benefit->title}}</span></h4>
          <p>{{$benefit->desc}}</p>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 lft-story mb-6 rgt-benfts">
          <div class="bg-story">
          </div>
          <div class="image-story">
            <img src="{{$benefit->image}}" alt="">
          </div>
        </div>
        @endif
      @endforeach
      </div>
    </div>
  </section>
@endif


@if(count($ingredients) > 0)
  <section style="margin-top:15px;" class="integrants">
    <h3 class="underline"><span>Key </span> Ingredients</h3>
    <div class="container-main">
      <div class="row grid-row">
        @foreach($ingredients as $key => $ingredient)
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="inner-col-integrants">
            <img src="{{$ingredient->image}}" alt="">
            <h5>{{$ingredient->name}}</h5>
            <p>{{$ingredient->desc}}</p>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
@endif

@if(count($howtouse) > 0)
  <section class="productusage mt-4 	d-none d-md-block d-lg-block">
    <h3 class="underline mb-4">HOW TO USE</h3>
    <div class="container-main">
      <div class="row" style="align-items: center;">
        @foreach($howtouse as $howtousekey => $use)
        <div class="col-lg-2">
          <h5>STEP {{$use->step}}</h5>
          <div class="inner-col-prdctuse">
            <img src="{{$use->image}}" alt="" style="max-width: 150px; width:100%; border:none;">
          </div>
        </div>
        <div class="col-lg-10">
          <p class="text-justify">{{$use->desc}}</p>
        </div>
        @endforeach
      </div>
    </div>
  </section>
@endif

@if(count($howtouse) > 0)
  <section class="productusage mt-4 	d-block d-md-none d-lg-none">
    <h3 class="underline mb-4">HOW TO USE</h3>
    <div class="container-main">
      <div class="row" style="align-items: center;">
        @foreach($howtouse as $howtousekey => $use)
        <div class="col-12"> <h5>STEP {{$use->step}}</h5></div>
        <div class="col-lg-2 col-md-3 col-4">
          <div class="inner-col-prdctuse">
            <img src="{{$use->image}}" alt="" style="max-width: 150px; width:100%; border:none;">
          </div>
        </div>
        <div class="col-lg-10 col-md-9 col-8">
          <p class="text-justify">{{$use->desc}}</p>
        </div>
        @endforeach
      </div>
    </div>
  </section>
@endif


@if(count($productfaqs) > 0)
<section class="faqs">
   <div class="card-main-faq mt-3 container-main">
<h3 class="smlunderline text-center">FAQ'S</h3>
  <div class="card mt-2">
    <div class="card-body-main" style="">
      <div class="flex flex-column faq-section">
        <div class="row">
          <div class="col-md-12">
            <div id="accordion">

				@foreach($productfaqs as $faqkey => $faq)
              <div class="card">
                <div class="card-header" id="heading-{{$faq->id}}" style="background-color: #EEEEEE;margin-top: 15px;border-bottom: none;border-radius: 10px;">
                  <h5 class="mb-0">
                    <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-{{$faq->id}}" aria-expanded="false" aria-controls="collapse-{{$faq->id}}">
                     <p class="faq-question" >{{$faq->question}}</p>
                    </a>
                  </h5>
                </div>
                <div id="collapse-{{$faq->id}}" class="collapse" data-parent="#accordion" aria-labelledby="heading-{{$faq->id}}">
                  <div class="card-body" style="padding-top: 0px;">
                    <p class="faq-answer">{{$faq->answer}}</p>
                  </div>
                </div>
              </div>

            @endforeach

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
@endif

@if($product->disclaimer != '')
  <section class="desclaimer-product mt-4">
    <h3 class="mb-2 text-center">DISCLAIMER</h3>
    <div class="border-blue"></div>
        <div class="border-grey"></div>
    <div class="container-main">
      <div class="row">
        <div class="col-lg-12">
          {!! $product->disclaimer !!}
        </div>
      </div>
    </div>
  </section>
@endif
<br/>

  <!-- review and ratings section  -->
  <section class="ratings">
    <div class="container-main">
      <div class="row grid-row">
        <div class="col-lg-6">
          <div class="main-div-rview">
            <div style="width: 50%;" class="lft-reviw">
              <h4>Ratings & Reviews</h4>
              <h4>{{number_format($avgRating ?? 0,1)}} <i style="vertical-align: bottom;" class="ri-star-line"></i> </h4>
              <h5 style="padding-top: 10px;">{{$ratings['totalcount'] ?? 0}} Ratings & </h5>
              <h5>{{count($reviews)}} Reviews</h5>
            </div>
            <div style="width: 50%;" class="lft-reviw">
              <label for="file">5 <i style="vertical-align: middle;font-size: 12px;" class="ri-star-line"></i></label>
              <progress style="background: #008C16;vertical-align: middle;height: 10px;border-radius: 9px;" id="file"
                value="{{$ratings['fivestarCount'] != 0 ? ( $ratings['fivestarCount']/  $ratings['totalcount']  ) * 100 : 0 }}" max="100"> </progress> <small>{{$ratings['fivestarCount']}}</small> <br>
              <label for="file">4 <i style="vertical-align: middle;font-size: 12px;" class="ri-star-line"></i></label>
              <progress style="background: #008C16;vertical-align: middle;height: 10px;border-radius: 9px;" id="file"
                value="{{ $ratings['fourstarCount'] != 0 ? ( $ratings['fourstarCount'] / $ratings['totalcount']  ) * 100  : 0}}" max="100"> </progress> <small>{{$ratings['fourstarCount']}}</small> <br>
              <label for="file">3 <i style="vertical-align: middle;font-size: 12px;" class="ri-star-line"></i></label>
              <progress style="background: #008C16;vertical-align: middle;height: 10px;border-radius: 9px;" id="file"
                value="{{ $ratings['threestarCount'] != 0 ? ($ratings['threestarCount'] / $ratings['totalcount'] ) * 100  : 0}}" max="100"> </progress> <small>{{$ratings['threestarCount']}}</small> <br>
                <label for="file">2 <i style="vertical-align: middleop;font-size: 12px;" class="ri-star-line"></i></label>
              <progress style="background: #008C16;vertical-align: middle;height: 10px;border-radius: 9px;" id="file"
                value="{{ $ratings['twostarCount'] != 0 ? ($ratings['twostarCount'] / $ratings['totalcount'] ) * 100  : 0}}" max="100"> </progress> <small>{{$ratings['twostarCount']}}</small> <br>
                <label for="file">1 <i style="vertical-align: middle;font-size: 12px;" class="ri-star-line"></i></label>
              <progress style="background: #008C16;vertical-align: middle;height: 10px;border-radius: 9px;margin-left:5px;" id="file"
                value="{{ $ratings['onestarCount'] != 0 ? ($ratings['onestarCount'] / $ratings['totalcount'] ) * 100  : 0}}" max="100"> </progress> <small>{{$ratings['onestarCount']}}</small> <br>

                <!-- <label for="file">2 <i style="vertical-align: top;font-size: 12px;" class="ri-star-line"></i></label>
              <progress style="background: red;vertical-align: middle;height: 10px;border-radius: 9px;" id="file"
                value="{{$ratings['twostarCount'] != 0 ? ( $ratings['twostarCount']  /  $ratings['totalcount'] ) * 100 : 0 }}" max="100"> </progress> <small>{{$ratings['twostarCount']}}</small> <br>
              <label for="file">1 <i style="vertical-align: top;font-size: 12px;" class="ri-star-line"></i></label>
              <progress style="background: red;vertical-align: middle;height: 10px;border-radius: 9px;" id="file"
                value="{{$ratings['onestarCount'] != 0 ? ( $ratings['onestarCount']/  $ratings['totalcount']   ) * 100 : 0 }}" max="100"> </progress> <small>{{$ratings['onestarCount']}}</small> <br> -->
            </div>
          </div>

        </div>
        <div class="col-lg-6">
          <h5 data-toggle="modal" onclick="setDefaultRating()"  id ="revwbtn" class="revwbtn">Rate product</h5>
        </div>
        @if(count($reviews) > 0)
        <div class="col-lg-12">
          @foreach($reviews as $reviewskey => $review)
          <div class="main-div-cmnt">
            <div class="reviewcomnt">
              <div class="reviewrname">
                <h4>{{ \Illuminate\Support\Str::ucfirst(substr($review->customername ?? '', 0,1)) }}</h4>
              </div>
              <div class="reviewratng">
                <h6>{{$review->customername}} |<span> {{ \Carbon\Carbon::parse($review->created_at)->format('M d, Y') }}</span></h6>
                <div class="review-star">
                  <h6>{{$review->rating ?? '0'}}<i style="vertical-align: bottom;" class="ri-star-s-line"></i></h6>
                </div>
              </div>
            </div>
            {{$review->comment ?? ''}}
          </div>
          @endforeach
        </div>
      </div>
      @endif
    </div>
  </section>
  <div class="modal fade" id="ratingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div
        style="background: #ffff;width: 95%;border-radius: 20px;padding: 20px 25px;border: 1px solid #008C16;margin: auto;"
        class="modal-content">
        <div class="modal-body modal-loginform">
          <div style="float: right;margin-top: -25px;" class="d-inline clossse" class="d-inline clossse" class="close" data-dismiss="modal" aria-label="Close"  onclick="toggleCartttt()"><i
              class="ri-close-circle-line"></i></div>
          <h6>Submit Review</h6>
          <form action="{{url('/review/'.$product->id)}}" method="POST" autocomplete="off" id="reviewForm">
          {!! csrf_field() !!}
          <div class="rating-box">
            <div class="rating-container">
              <input type="radio" name="rating" value="5" id="star-5"> <label for="star-5">&#9733;</label>

              <input type="radio" name="rating" value="4" id="star-4"> <label for="star-4">&#9733;</label>

              <input type="radio" name="rating" value="3" id="star-3"> <label for="star-3">&#9733;</label>

              <input type="radio" name="rating" value="2" id="star-2"> <label for="star-2">&#9733;</label>

              <input type="radio" name="rating" value="1" id="star-1"> <label for="star-1">&#9733;</label>
            </div>
          </div>
            <input style="background: #ECECEC;border:none;padding-left:20px;outline: none;" placeholder="Name"
              type="text" id="name" name="name">
            <textarea
              style="width: 100%;min-height: 200px;margin-bottom: 15px;border: none;background: #ECECEC;border-radius: 10px;padding-left: 20px;padding-top: 20px;outline: none;"
              id="comment" placeholder="Message" name="comment" rows="" cols=""></textarea>
            <button style="cursor: pointer;" type="submit" >Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>


@include('layouts.freeshipping')

<input type="hidden" id="userid" value="{{$userid ?? '0'}}">

@include('layouts.footer')
@include('layouts.others')
<style>
  .img-showcase img {
      min-width: 100%;
      min-height: 80%;
  }
</style>

<!-- producr singl click  -->
<script  type="text/javascript">
    const imgs = document.querySelectorAll('.img-select a');
    const imgBtns = [...imgs];
    //let imgId = 1;

    imgBtns.forEach((imgItem) => {
        imgItem.addEventListener('click', (event) => {
            event.preventDefault();
            imgId = imgItem.dataset.id;
			//alert(imgId);
            slideImage(imgId);
        });
    });

    function slideImage(imgId){
        const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;

        document.querySelector('.img-showcase').style.transform = `translateX(${- (imgId - 1) * displayWidth}px)`;
    }

    window.addEventListener('resize', slideImage);
</script>

  <script type="text/javascript">
    $(document).ready(function() {
    if ($('.slider-items-slick').length > 0) { // check if element exists
      $('.slider-items-slick').slick({
        infinite: true,
        swipeToSlide: true,
        slidesToShow: 5,
        dots: true,
        slidesToScroll: 1,
        prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-chevron-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="fa fa-chevron-right"></i></button>',
        responsive: [{
          breakpoint: 768,
          settings: {
            slidesToShow: 1
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

<script type="text/javascript">

function setDefaultRating() {

        $.ajax({
          type: "POST",
          url: "{{url('/ajax/setdefaultrating')}}",
          data: {
            _token: '{{ csrf_token() }}',
            productid: '{{$product->id}}',
          },
          success: function(resp) {
            var obj = JSON.parse(resp);
            if (obj.sts == '01') {
              $("#ratingModal").modal()
              $('#name').val(obj.customername);
              $('#comment').val(obj.comment);
              $('input:radio[name=rating]').val([obj.rating]).attr('checked', true);

            } else {
              toastr.error('Something Went Wrong!');
            }
          }
        });


}



    function increment() {
      document.getElementById('shwQuantity').stepUp();
    }

    function decrement() {
      document.getElementById('shwQuantity').stepDown();
    }

  $('#shwQuantity').blur(function() {
    if ($('#shwQuantity').val() > {{$product->stock_avalible}}) {
      $('#shwQuantity').val({{$product->stock_avalible}})
    }
    if ($('#shwQuantity').val() < 1) {
      $('#shwQuantity').val(1)
    }
  })

  function buyNow() {
    if ($('#userid').val() > 0) {
      if ($('#selSize').val() > 0) {
        $.ajax({
          type: "POST",
          url: "{{url('/ajax/addtocart')}}",
          data: {
            _token: '{{ csrf_token() }}',
            productid: '{{$product->id}}',
            productname: '{{$product->name}}',
            quantity: $('#shwQuantity').val(),
            unitid: 0
          },
          success: function(resp) {
            var obj = JSON.parse(resp);
            if (obj.sts == '01') {
              toastr.success(obj.msg);
              $.ajax({
                type: "POST",
                url: "{{url('/ajax/cartcount')}}",
                data: {
                  _token: '{{ csrf_token() }}',
                },
                success: function(count) {
                  $('#cartCount').html(count);
                  $('#cartCounticon').html(count);
                  window.location.href = "{{url('/checkout')}}";
                }
              });
            } else {
              toastr.error('Something Went Wrong!');
            }
          }
        });
      } else {
        toastr.error('Please Select Product Size!');
      }
    } else {
      toastr.error('Please Login to Buy Product.');
    }
  }

  function addToCart() {
    if ($('#userid').val() > 0) {
      // if ($('#selSize').val() > 0) {
        $.ajax({
          type: "POST",
          url: "{{url('/ajax/addtocart')}}",
          data: {
            _token: '{{ csrf_token() }}',
            productid: '{{$product->id}}',
            productname: '{{$product->name}}',
            quantity: $('#shwQuantity').val(),
            unitid: 0
          },
          success: function(resp) {
            var obj = JSON.parse(resp);
            if (obj.sts == '01') {
              toastr.success(obj.msg);

              getCart();
              $.ajax({
                type: "POST",
                url: "{{url('/ajax/cartcount')}}",
                data: {
                  _token: '{{ csrf_token() }}',
                },
                success: function(count) {
                  $('#cartCounticon').html(count);
                  $('#cartCount').html(count);
                }
              });
            }
            if (obj.sts == '02') {
                toastr.error('maximum limit 10 items!');
            }

             else if (obj.sts == '00') {
              toastr.error('Something Went Wrong!');
            }
          }
        });
      // } else {
      //   toastr.error('Please Select Product Size!');
      // }
    } else {
      toastr.error('Please Login to Add Product to Cart.');
    }
  }

  $('#selSize').change(function() {
    $.ajax({
      type: "POST",
      url: "{{url('/ajax/getsizedetails')}}",
      data: {
        _token: '{{ csrf_token() }}',
        unitid: $('#selSize').val()
      },
      success: function(resp) {
        var obj = JSON.parse(resp);
        if (obj.sts == '01') {
          $('#price').html('₹ ' + obj.price);
          $('#offer').html(obj.offer + '% Off');
          $('#offerprice').html('₹ ' + obj.offerprice);
        }
      }
    });
  })
</script>

@endsection
