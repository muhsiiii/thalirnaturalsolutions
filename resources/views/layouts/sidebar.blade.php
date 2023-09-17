
<style>
	.sidenav{
		z-index:19;
	}
	.sidebarShadow
	{
	backdrop-filter: blur(4px);
	position:fixed;
	left:0px;
	right:px;
	width:100%;
	top:0px;
	display:none;
	bottom:0px;
	background:#000000a9;
	z-index:9;}
	.pad5 {
  padding-top: 4px!important;
  padding-left: 2px!important;
}
	.f12{
	font-size:14px!important;}

	.same-line{
  display: inline-block;
  vertical-align: middle;
}
	.side-icon
	{
		    margin-top: -5px;
    margin-bottom: -4px;
	    margin-right: 15px!important;
    background: #f5f5f5!important;
    color: #008c16!important;
    padding: 0px!important;
  justify-content: center;
  align-items: center;
		width:36px;
		height:36px;
    border-radius: 8px;}
</style>
<div class="sidebarShadow" id="myShad"></div>
<div id="mySidenav"  class="sidenav collapse">
	<div>
		<div class="profail">
      <div class="user-profail">
        <img src="{{url('/assets/succ/images/Group 13729.png')}}" style="width:50px;" alt="">
      </div>
      @if($userid > 0)
        <div class="user-details">
          <h6 class="m-0">Hi {{$username}} </h6>
        </div>
      @else
        <div class="user-details">
          <h6 class="m-0">Hi Guest</h6>
        </div>
      @endif
    </div>
		<div class="side-pding">
			<div class="btns">
				<a href="{{url('/track')}}" class="nav-link-sidebar" ><i style="padding-right: 20px;" class="ri-pages-line"></i>Track Orders</a>
				<hr>
				@if(count($categories) > 0)
				@foreach($categories as $key => $value)
					<a class="nav-link-sidebar collapsed openable"  data-toggle="collapse" data-target="#submenu1-d{{$value->id}}" >

						<div class="side-icon same-line">
							<img src="{{url($value->image)}}" style="width:18px; margin:8px;">
						</div>
						<span style="clear: left;"></span>
						<span class="">{{$value->name}}</span>

							</a>

				<div class="collapse drpoptns" id="submenu1-d{{$value->id}}" aria-expanded="false">
					<ul style="margin-left: 54px;" class="flex-column nav">
						@php $subcats = getSubcat($value->id); @endphp
            @if(count($subcats) > 0)
              @foreach($subcats as $key => $subcat)
                <li class="nav-item pad5 f12">
                  <a style="background: none;padding: 0; font-weight:300" class="sub-item-nav" href="{{url('/category/'.$value->id.'/'.$subcat->id)}}" >{{$subcat->name}}</a>
                </li>
              @endforeach
            @endif
						 <li class="nav-item pad5 f12">
                  <a style="background: none;padding: 0; font-weight:300" class="sub-item-nav" href="{{url('/category/'.$value->id.'/0')}}" >See all</a>
                </li>
					</ul>
				</div>
				<hr>
				 @endforeach
            @endif

				<a class="nav-link-sidebar collapsed openable" data-toggle="collapse" data-target="#submenu4"><i style="padding-right: 20px;"  class="ri-user-line"></i>Help & Support</a>
				<div class="collapse drpoptns" id="submenu4" aria-expanded="false">
					<ul style="margin-left: 50px;" class="flex-column nav">
							<ul class="flex-column nav">
                <li class="nav-item pad5 f12">
                  <a style="background: none;padding: 0; font-weight:300" class="sub-item-nav" href="{{url('/contactus')}}">Contact Us</a>
                </li>
                <li class="nav-item pad5 f12">
                  <a style="background: none;padding: 0; font-weight:300" class="sub-item-nav" href="{{url('/privacy-policy')}}">Privacy Policy</a>
                </li>
                <li class="nav-item pad5 f12">
                  <a style="background: none;padding: 0; font-weight:300" class="sub-item-nav" href="{{url('/terms-conditions')}}">Terms & Conditions</a>
                </li>
                <li class="nav-item pad5 f12">
                  <a style="background: none;padding: 0; font-weight:300" class="sub-item-nav"  href="{{url('/return-policy')}}">Return Policy</a>
                </li>
                <li class="nav-item pad5 f12">
                  <a style="background: none;padding: 0; font-weight:300" class="sub-item-nav"  href="{{url('/shipping-delivery-policy')}}">Shipping & Delivery Policy</a>
                </li>
							</ul>
					</ul>
				</div>
				<hr>
				<a href="{{url('/blog')}}" class="nav-link-sidebar" ><i style="padding-right: 20px;" class="ri-pages-line"></i>Blog</a>
				<hr>
				<a href="{{url('/about')}}" class="nav-link-sidebar" ><i style="padding-right: 20px;" class="ri-pages-line"></i>About us</a>
				<hr>
			</div>
		</div>
	</div>
</div>

<script>
      function openNav(){

		  $('.drpoptns').removeClass('show');
        var e = document.getElementById("mySidenav");
		  var shad = document.getElementById("myShad");
		   e.style.left='-270px';
        if(e.style.left=='-270px'){

          e.style.left='0px';
			shad.style.display="block";
          document.body.style.overflow="hidden";
        }
    }
    function handleMousePos(event) {
              var mouseClickWidth = event.clientX;
		var shad = document.getElementById("myShad");
              if(mouseClickWidth>=270){
                    document.getElementById("mySidenav").style.left='-270px'
                    document.body.style.overflow="scroll";
				  	shad.style.display="none";
              }
    }
    document.addEventListener("click", handleMousePos);



	$(".openable").click(function (e) {
		var target = $(this).data('target');

            // Close all submenus except the one clicked
            $('.drpoptns').not(target).removeClass('show');
		 $('.openable').not(target).addClass('collapsed');

});

    </script>
