@php
use App\SubCategory;
function getSubcat($catId)
	{
		$cats = SubCategory::where('cat_id',$catId)->get();

		return $cats;
	}

@endphp
@include('layouts.promotionbanner')

<!-- header section  -->
<header>
  <div>
    <ul class="navbar-links">
      <nav class="navbar">
        <div id="play-button" onclick="openNav()"><i class="ri-menu-line menu"></i></div>
        <a href="{{url('/')}}" class="navbar-logo"><img style="margin-right: 20px;" src="{{url('/assets/succ/images/logo.png')}}" alt="logo"></a>
        <div class="search-box">
          <input class="search-input" type="text" placeholder="Search here.." id="search" autocomplete="off">
          <button class="search-btn"><i class="ri-search-line"></i></button>
          <ul class="list-group list-search hide" id="listSearch" style="z-index: 999;"></ul>
        </div>
        <li class="nav-item"><a class="nav-link @if(isset($title) && $title == 'Home') actives @endif d-mob-none" href="{{url('/')}}">Home</a></li>
        <li class="nav-item"><a class="nav-link @if(isset($title) && $title == 'About Us') actives @endif d-mob-none" href="{{url('/about')}}">About us</a></li>
		  @if(count($categories) > 0)
		  @foreach($categories as $key => $value)
        <li class="dropdown">
          <a href="#" class="dropdown-toggle d-mob-none" data-toggle="dropdown">{{$value->name}}<b class="caret"></b></a>
          @php $subcats = getSubcat($value->id); @endphp
            @if(count($subcats) > 0)

          <ul class="dropdown-menu drpdwn multi-column columns-3">
            <div class="row">
              @foreach($subcats as $key => $subcat)
              <div class="col-sm-12">
                <ul class="multi-column-dropdown adarshjose  {{$key == 0 ? '':''}}">
                  <li><a href="{{url('/category/'.$value->id.'/'.$subcat->id)}}">{{$subcat->name}}<a></li>
                  </ul>
                </div>
                @endforeach

			  <div class="col-sm-12">
                <ul class="multi-column-dropdown adarshjose  {{$key == 0 ? '':''}}">
                  <li><a href="{{url('/category/'.$value->id.'/0')}}">See all<a></li>
                  </ul>
                </div>

              </div>
            </ul>
            @endif



          </li>
			@endforeach
			@endif
          <li class="nav-item"><a class="nav-link @if(isset($title) && $title == 'Blog') actives @endif " href="{{url('/blog')}}">Blog</a></li>
          <li class="dropdown hlpsprt d-mob-none">
            <a href="#" class="dropdown-toggle  @if(isset($title) && $title == 'Help & Support') actives @endif  d-mob-none" data-toggle="dropdown">Help & Support<b class="caret"></b></a>
            <ul class="dropdown-menu multi-column columns-3">
              <div class="row">
                <div class="col-sm-12">
                  <ul class="multi-column-dropdown">
                    <li><a href="{{url('/contactus')}}">Contact Us</a></li>
                    <li><a href="{{url('/privacy-policy')}}">Privacy Policy</a></li>
                    <li><a href="{{url('/shipping-delivery-policy')}}">Shipping & Delivery Policy</a></li>
                    <li><a href="{{url('/return-policy')}}">Return Policy</a></li>
                    <li><a href="{{url('/terms-conditions')}}">Terms & Conditions</a></li>
                  </ul>
                </div>
              </div>
            </ul>
          </li>
          <li class="nav-item"><a class="nav-link  @if(isset($title) && $title == 'Track Orders') actives @endif " href="{{url('/track')}}">Track Orders </a></li>


          <li class="cart-mobl" onclick="toggleCartt()">
            <a style="color: #008C16;" class="menuicon" >

            <i style="margin-right: 5px;cursor:pointer;" class="ri-shopping-cart-line"></i> <span class="counter bg-danger" id="cartCounticon">{{$cartCount}}</span>

            </a>
          </li>



          <!-- updated 14/03 -->
          @if($userid > 0 && $username!="Guest User")
          <li>
            <div class="widget-header dropdown">
              <a style="display:flex;align-items: center;" href="#" data-toggle="dropdown" class="dropdown-toggle" data-offset="20,10" aria-expanded="false">
                <div class="icon icon-sm rounded-circle border ">
                  <!-- <i class="fa fa-user"></i> -->
                  <i style="vertical-align: middle;padding:4px;" class="ri-user-3-line"></i>
                  <!-- <i style="margin-right: 5px;" class="ri-shopping-cart-line"></i> -->
                </div>
                <span class="sr-only">Profile actions</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right after-login" aria-labelledby="navbarDropdown" x-placement="bottom-end" style="position: absolute; margin-top: 17px;margin-left: -160px;">
                <a href="{{url('/profile')}}" class="dropdown-item"><b>{{$username}}</b></a>
                <hr class="dropdown-divider">
                <a class="dropdown-item" href="{{url('/profile')}}">My Profile</a>
                <a class="dropdown-item" href="{{url('/orders')}}">My Orders</a>
                <a class="dropdown-item" href="{{url('/address')}}">My Address Book</a>
                <hr class="dropdown-divider">
                <a class="dropdown-item" href="{{url('/logout')}}">Log Out</a>
              </div>
            </div>
          </li>
          @else
          <!-- <li class="login-mobl" data-toggle="modal" data-target="#loginModal" >
            <a  style="color: #008C16;" href="#">
              <i style="margin-right: 5px;vertical-align: middle;" class="ri-user-3-line"></i>Login
            </a>
          </li> -->
          <!-- updated 14/03 -->
          <li class="login-mobl btn btn-success" style="padding: 4px 14px ;" data-toggle="modal" data-target="#loginModal" >
                <a  style="color: #ffffff;" href="#">
                  Login
                </a>
              </li>
          @endif
        </ul>
      </nav>
    </div>
  </header>


