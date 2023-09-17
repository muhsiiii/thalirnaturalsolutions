@extends('layouts.header')
@section('header')
@include('layouts.navbar')

<section class="scessfull">
	<div class="container-main">
		<div class="order-successfull">
			<div class="order-successfull-child">
				<div class="modal-body modal-loginform-second modal-third">
					<img style="padding-top: 20px;" src="{{url('/assets/succ/images/Group 346.png')}}" alt="">
					<h3 style="margin-top: 20px;">Order Placed <br> Successfully</h3>
					<p style="color: #8E8E8E;">Order ID : #{{$order->id}}</p>
					<a href="{{url('/')}}">
					<button type="submit">Continue</button>
					</a>
				</div>
			</div>
			<div class="order-successfull-child secndordr">
				<div class="product-list">
					<div class="headeing-product-list">
						<h5>Product</h5>
						<h5>Price</h5>
					</div>
					<hr>
					@if(count($order->orderItems) > 0)
					@foreach($order->orderItems as $key1 => $item)
					<?php $product = App\Http\Controllers\AdminProductsController::getProduct($item->productid); 
                    ?>
					<div class="product-name">
						<div class="product-name-lft">
							<p>{{$product->name}}</p>
						</div>
						<div class="product-price-rgt">
							<p style="width: 64px; text-align: right;">₹ {{$product->offerprice}}</p>
						</div>
					</div>
					<hr>
					@endforeach
					@endif
					<div class="sub-total-price">
						<p>Shipping</p>
						<p >₹ 45</p>
					</div>
					<div class="sub-total-price">
						<h5>Sub total</h5>
						<h5 class="grnn">₹ {{$order->offerprice }}</h5>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@include('layouts.freeshipping') 
@include('layouts.footer')
@include('layouts.others')
@endsection
