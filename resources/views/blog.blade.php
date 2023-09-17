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

<div class="banner-terms-main text-center">
  <h2 class="text-center terms-and-conditions-heading-banner">BLOG</h2>
  <span class="text-white"><a class="text-white breadcrumbs-terms-conditions" href="#">HOME / BLOG</a></span>
</div>
<section class="blog">
        <div class="container-main">
            <div class="row">
                @foreach($blogs as $key => $value)
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="inner-col-blog">
                        <a class="view-page" href="#">
                        <h4>{{$value->type}}</h4>
                        <img src="{{url($value->image)}}" alt="">
                        <h5>{{$value->title}}</h5>
                        <p>{!! $value->content ?? '' !!}</p>
                        <!-- <button class="readmoreblog">Read More</button> -->
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
</section>

@include('layouts.freeshipping')

@include('layouts.footer')
@include('layouts.others')
@endsection
