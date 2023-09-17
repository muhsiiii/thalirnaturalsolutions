<div class="col-lg-3 col-md-4 sidebar-menu-ecmrc">
    <div class="order-list">
       <nav>
         <ul>
         	    <li class="selectedLink @if(isset($contentHeader) && $contentHeader == 'myprofile') curentstage @endif" name="home">
                <a style=" @if(isset($contentHeader) && $contentHeader != 'myprofile') color:#A0A0A0; @endif" href="{{url('/profile')}}" class="normallink"><i class="ri-user-line"></i> Profile</a>
              </li>
              <li name="about" class="@if(isset($contentHeader) && $contentHeader == 'orders') curentstage @endif">
                <a style="@if(isset($contentHeader) && $contentHeader != 'orders') color:#A0A0A0; @endif" href="{{url('/myorders')}}" class="normallink"><i class="ri-shopping-cart-2-line"></i> Your Orders</a>
              </li>
              <li name="resume"  class="selectedLink @if(isset($contentHeader) && $contentHeader == 'address') curentstage @endif" >
                <a style="@if(isset($contentHeader) && $contentHeader != 'address') color:#A0A0A0; @endif" href="{{url('/address')}}" class="normallink"><i class="ri-map-pin-user-fill" ></i> Address Book</a>
              </li>
              <li name="contact">
                <a style="@if(isset($contentHeader) && $contentHeader != 'logout') color:#A0A0A0; @endif" href="{{url('/logout')}}"  class="normallink"><i class="ri-logout-circle-line"></i> Logout</a>
              </li>
         </ul>
       </nav>
    </div>
</div>