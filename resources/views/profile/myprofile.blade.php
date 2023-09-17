@extends('layouts.header')
@section('header')
@include('layouts.navbar')

@include('layouts.sidebar')  
@include('layouts.cart')
@include('layouts.login')

<div style="margin-top: 50px;" class="box-list container-main">
  <div class="row">
    @include('profile.layouts.sidebar')
    <div class="col-lg-9 col-md-8 lft-page-menu">
      <div  class="card active home profail-select-bar" data-home>
        <div class="profail-adrss">
          <!-- <img src="{{url('/assets/succ/images/profile-user.svg')}}" alt=""> -->
          
          <div class="col-profail">
            <h6>Name       : {{$user->name}}</h6>
            <h6>Email      : {{$user->email}}</h6>
            <h6>Mobile     : {{$user->phone}}</h6>
          </div>
          <div class="edt-btn">
            <a style="color: #fff;" href="{{url('/profile/edit')}}"><i class="ri-pencil-line"></i></a>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</div>

@include('layouts.footer')
@include('layouts.others')
@endsection
