@extends('layouts.header')
@section('header')
@include('layouts.navbar')


<section class="section-content padding-y bg">
  <div class="container">

    <!-- ============================ COMPONENT 1 ================================= -->
    <div class="card">
      <div class="row no-gutters">
        <div id="carousel1_indicator" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carousel1_indicator" data-slide-to="0" class="active"></li>
            <li data-target="#carousel1_indicator" data-slide-to="1"></li>
            <li data-target="#carousel1_indicator" data-slide-to="2"></li>
            <li data-target="#carousel1_indicator" data-slide-to="3"></li>
          </ol>
          <div class="carousel-inner">
            @if($product->image != '')
            <div class="carousel-item active">
              <a href="{{url($product->image)}}">
                <img class="d-block w-100" src="{{url($product->image)}}" alt="First slide">
              </a>
            </div>
            @endif
            @if($product->image2 != '')
            <div class="carousel-item">
              <a href="{{url($product->image2)}}">
                <img class="d-block w-100" src="{{url($product->image2)}}" alt="First slide">
              </a>
            </div>
            @endif
            @if($product->image3 != '')
            <div class="carousel-item">
              <a href="{{url($product->image3)}}">
                <img class="d-block w-100" src="{{url($product->image3)}}" alt="First slide">
              </a>
            </div>
            @endif
            @if($product->image4 != '')
            <div class="carousel-item">
              <a href="{{url($product->image4)}}">
                <img class="d-block w-100" src="{{url($product->image4)}}" alt="First slide">
              </a>
            </div>
            @endif
          </div>
          <a class="carousel-control-prev" href="#carousel1_indicator" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carousel1_indicator" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        <main class="col-md-6 border-left">
          <article class="content-body">

            <h3 class="title">{{$product->name}}</h3>
            <h6 class="title text-muted">
              @if(isset($subCategory[$product->subcat_id])){{$subCategory[$product->subcat_id]}}@endif</h6>

              <div class="mb-3">
                <var class="price h4" id="offerprice">₹ {{$product->offerprice}}</var>
                <del class="price-old" id="price">₹ {{$product->price}}</del>
                <?php $offer =  ($product->price - $product->offerprice)/$product->price * 100;    ?>
                <b class="label-rating text-success" id="offer"> {{round($offer)}}% Off </b>
              </div>
              <p>{{$product->desc}}</p>
              <hr>
              @if($unitsCount > 0 && $product->status == 'Available' && $product->stock_avalible > 0)
              <div class="row">
                <div class="form-group col-md-12 flex-grow-0">
                  <label>Quantity</label><br>
                  <div class="input-group mb-3 input-spinner">
                    <div class="input-group-append">
                      <button class="btn btn-light" type="button" id="button-minus"
                      style="z-index: 0;"> − </button>
                    </div>
                    <input type="text" class="form-control" value="1" id="shwQuantity">
                    <div class="input-group-prepend">
                      <button class="btn btn-light" type="button" id="button-plus"
                      style="z-index: 0;"> + </button>
                    </div>
                  </div>
                  @if($product->stock_avalible < 3)
                    <br><span class="text-danger">Only {{$product->stock_avalible}} Remaning!</span>
                  @endif
                </div>

                <div class="form-group col-md-12 flex-grow-0">
                  <label>Select Size</label>
                  <div class="mt-2">
                    <select class="form-control" style="max-width: 200px;" id="selSize">
                      <option value=""> Select Size </option>
                      @foreach($units as $key => $value)
                      @if($value->status == 'Enabled')
                      <option value="{{$value->id}}"> {{$value->name}} </option>
                      @else
                      <option value="{{$value->id}}" disabled> {{$value->name}} </option>
                      @endif
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
              <br>
              <a href="javascript:void(0);" style="font-size:9px;" class="btn  btn-primary" onclick="buyNow();"><i class="fas fa-bolt"></i> &nbsp; Buy now
              </a>
              <a href="javascript:void(0);" style="width:56%;font-size:10px;" class="btn  btn-outline-primary" onclick="addToCart();">
                <span class="text">Add to cart</span><i class="fas fa-shopping-cart"></i>
              </a>
              @else
              <div class="row">
                <div class="form-group col-md-12 flex-grow-0">
                  <label>Quantity</label><br>
                  <div class="input-group mb-3 input-spinner">
                    <div class="input-group-append">
                      <button class="btn btn-light" type="button" id="button-minus"
                      style="z-index: 0;"> − </button>
                    </div>
                    <input type="text" class="form-control" value="1" id="shwQuantity">
                    <div class="input-group-prepend">
                      <button class="btn btn-light" type="button" id="button-plus"
                      style="z-index: 0;"> + </button>
                    </div>
                  </div>
                </div>

                <div class="form-group col-md-12 flex-grow-0">
                  <label>Select Size</label>
                  <div class="mt-2">
                    <select class="form-control" style="max-width: 200px;" id="selSize">
                      <option value=""> Select Size </option>
                    </select>
                  </div>
                </div>
              </div>
              <br>
              <h5 class="text-danger">Out of Stock!</h5>
              @endif
            </article>
          </main>
        </div>
      </div>

    </div>
  </section>

  @if($similarProducts)
  <section class="section-content padding-y">
    <div class="container container-extra">
      <header class="section-heading">
        <a href="{{url('/products')}}" class="btn btn-link float-right mycolor">View All</a>
        <h4>Similar Products</h4>
      </header>

      <div class="slider-items-slick row" data-slick='{"slidesToShow": 5, "slidesToScroll": 1}'>
        @foreach($similarProducts as $key => $value)
        <div class="item-slide p-2">
          <figure class="card card-product-grid mb-0">
            <div class="img-wrap">
              <a href="{{url('/product/'.$value->id)}}" class="img-wrap">
                <img src="{{url($value->image)}}" al>
              </a>
            </div>
            <figcaption class="info-wrap wrap-adjust">
              <p class="text-muted">@if(isset($category[$value->cat_id])){{$category[$value->cat_id]}}@endif
              </p>
              <a href="{{url('/product/'.$value->id)}}" class="title">{{$value->name}}</a>
              <div class="price-wrap mt-2">
                <span class="price">₹ {{$value->offerprice}}</span>
                <del class="price-old">₹ {{$value->price}}</del>
                <?php $offer =  ($value->price - $value->offerprice)/$value->price * 100;    ?>
                <b class="label-rating text-success"> <small><b>{{round($offer)}}% Off</b></small> </b>
              </div>
            </figcaption>
          </figure>
        </div>
        @endforeach
      </div>

      <br><br>
    </div>
  </section>
  @endif

  <input type="hidden" id="userid" value="{{$userid ?? '0'}}">
  @include('layouts.footer')
  @include('layouts.others')

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
        responsive: [{
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

    $('#button-plus').click(function() {
      if ($('#shwQuantity').val() < {{$product->stock_avalible}}) {
        var val = Number($('#shwQuantity').val()) + 1;
        $('#shwQuantity').val(val);
      }
    })

    $('#button-minus').click(function() {
      if ($('#shwQuantity').val() > 1) {
        var val = Number($('#shwQuantity').val()) - 1;
        $('#shwQuantity').val(val);
      }
    })

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
              unitid: $('#selSize').val()
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
        if ($('#selSize').val() > 0) {
          $.ajax({
            type: "POST",
            url: "{{url('/ajax/addtocart')}}",
            data: {
              _token: '{{ csrf_token() }}',
              productid: '{{$product->id}}',
              productname: '{{$product->name}}',
              quantity: $('#shwQuantity').val(),
              unitid: $('#selSize').val()
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
