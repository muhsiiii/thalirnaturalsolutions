<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="{{url('/admin')}}" class="brand-link">
		<img src="{{asset('/assets/succ/images/logo.png')}}" alt="{{config('app.name', 'M-R')}}-Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text" style="margin-left: 0px;"><b>{{config('app.name', 'M-R')}}</b></span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">

				<!-- Dashboard Side Menus -->
				<li class="nav-item has-treeview">
					<a href="{{url('/admin')}}" class="nav-link @if(isset($contentHeader) && $contentHeader == 'Dashboard') active @endif">
						<i class="nav-icon fa fa-home"></i>
						<p>Dashboard</p>
					</a>
				</li>

        <li class="nav-item has-treeview @if(isset($contentHeader) && $contentHeader == 'Banners') menu-open @endif">
          <a href="#" class="nav-link @if(isset($contentHeader) && $contentHeader == 'Banners') active @endif">
            <i class="nav-icon far fa-image" ></i>
            <p>Banners<i class="right fas fa-angle-left"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/admin/banners/first" class="nav-link  @if(isset($contentSubHeader) && $contentSubHeader == 'First Banners' ) active @endif">
                <i class="far fa-circle nav-icon"></i>
                <p class="fs-15">First Banners</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="/admin/banners/third" class="nav-link  @if(isset($contentSubHeader) && $contentSubHeader == 'First Banners(Mobile)' && isset($contentHeader) == true) active @endif">
                <i class="far fa-circle nav-icon"></i>
                <p class="fs-15">First Banners(Mobile)</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="/admin/banners/second" class="nav-link @if(isset($contentSubHeader) && $contentSubHeader == 'Second Banners' ) active @endif">
                <i class="far fa-circle nav-icon"></i>
                <p class="fs-15">Second Banners</p>
              </a>
            </li>

          </ul>
        </li>

				<li class="nav-item has-treeview">
					<a href="{{url('/admin/category')}}" class="nav-link @if(isset($contentHeader) && $contentHeader == 'Category') active @endif">
						<i class="nav-icon fa fa-th-large"></i>
						<p>Category</p>
					</a>
				</li>

            <li class="nav-item has-treeview">
					<a href="{{url('/admin/subcategory')}}" class="nav-link @if(isset($contentHeader) && $contentHeader == 'SubCategory') active @endif">
						<i class="nav-icon fa fa-th-large"></i>
						<p>SubCategory</p>
					</a>
				</li>

				<li class="nav-item has-treeview">
					<a href="{{url('/admin/products')}}" class="nav-link @if(isset($contentHeader) && $contentHeader == 'Products') active @endif">
						<i class="nav-icon fa fa-boxes"></i>
						<p>Products</p>
					</a>
				</li>

        <li class="nav-item has-treeview">
          <a href="{{url('/admin/orders')}}" class="nav-link @if(isset($contentHeader) && $contentHeader == 'Orders') active @endif">
            <i class="nav-icon fa fa-list-ol"></i>
            <p>
              Orders
              <span class="right badge badge-danger">{{App\Http\Controllers\AdminOrderController::getNew()}}
              </span>
            </p>
          </a>
        </li>

        <li class="nav-item has-treeview">
          <a href="{{url('/admin/customers')}}" class="nav-link @if(isset($contentHeader) && $contentHeader == 'Customers') active @endif">
            <i class="nav-icon fa fa-users"></i>
            <p>Customers</p>
          </a>
        </li>

        <li class="nav-item has-treeview">
          <a href="{{url('/admin/notifications')}}" class="nav-link @if(isset($contentHeader) && $contentHeader == 'Notifications') active @endif">
            <i class="nav-icon fa fa-bell"></i>
            <p>Notifications</p>
          </a>
        </li>

        <li class="nav-item has-treeview hide">
          <a href="{{url('/admin/analytics')}}" class="nav-link @if(isset($contentHeader) && $contentHeader == 'Analytics') active @endif">
            <i class="nav-icon fa fa-chart-line"></i>
            <p>Analytics</p>
          </a>
        </li>

        <li class="nav-item has-treeview">
          <a href="{{url('/admin/blogs')}}" class="nav-link @if(isset($contentHeader) && $contentHeader == 'Blogs') active @endif">
            <i class="nav-icon fa fa-blog"></i>
            <p>Blogs</p>
          </a>
        </li>

        <li class="nav-item has-treeview">
          <a href="{{url('/admin/reviews')}}" class="nav-link @if(isset($contentHeader) && $contentHeader == 'Reviews') active @endif">
            <i class="nav-icon fa fa-star"></i>
            <p>Reviews</p>
          </a>
        </li>

        <li class="nav-item has-treeview">
          <a href="{{url('/admin/settings')}}" class="nav-link @if(isset($contentHeader) && $contentHeader == 'Settings') active @endif">
            <i class="nav-icon fa fa-cogs"></i>
            <p>Settings</p>
          </a>
        </li>

			</ul>
		</nav>
	</div>
</aside>
