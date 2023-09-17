@extends('layouts.header')
@section('header')
@include('layouts.navbar')

@include('layouts.sidebar')  
@include('layouts.cart')
@include('layouts.login')


<!-- profilebar  -->
<div class="container-main">
    <div style="width: 50%;margin: auto;margin-top: 70px;position: relative;" class="cardss active home profaile-bar-mobl" data-home>
        <div class="profail-adrss">
            <div style="padding-left: 0px !important;" class="col-profail">
            <h6>Name     : {{$user->name}} </h6>
            <h6>Email    : {{$user->email}}</h6>
            <h6>Mobile   : {{$user->phone}}</h6>
            </div>
            <div class="edt-btn">
              <a style="color: #fff;" href="{{url('/profile/edit')}}"><i class="ri-pencil-line"></i></a>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
@include('layouts.others')
@endsection
