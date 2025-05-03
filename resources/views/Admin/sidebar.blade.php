
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
      <a class="sidebar-brand brand-logo" href="{{ url('home') }}"><img src="{{asset("admin/assets")}}/images/logo.svg" alt="logo" /></a>
      <a class="sidebar-brand brand-logo-mini" href="{{ url('home') }}"><img src="{{asset("admin/assets")}}/images/logo-mini.svg" alt="logo" /></a>
    </div>
    <ul class="nav">
      <li class="nav-item profile">
        <div class="profile-desc">
          <div class="profile-pic">
            <div class="count-indicator">
              <img class="img-xs rounded-circle " src="{{asset("assets")}}/images/personal photo2.jpg" alt="">
              <span class="count bg-success"></span>
            </div>
            <div class="profile-name">
              <h5 class="mb-0 font-weight-normal">AlFawakhry</h5>
              <span>Admin</span>
            </div>
          </div>
          <a href="#" id="profile-dropdown" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
          <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
            <a href="#" class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                  <i class="mdi mdi-settings text-primary"></i>
                </div>
              </div>
              <div class="preview-item-content">
                <p class="preview-subject ellipsis mb-1 text-small">Profile</p>
              </div>
            </a>

          </div>
        </div>
      </li>
      <li class="nav-item nav-category">
        <span class="nav-link">Control Panel</span>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="{{ url("home") }}">
          <span class="menu-icon">
            <i class="mdi mdi-speedometer"></i>
          </span>
          <span class="menu-title">@lang('message.Dashboard')</span>
        </a>
      </li>

      <li class="nav-item menu-items">
          <a class="nav-link" data-bs-toggle="collapse" href="#product-menu" aria-expanded="false" aria-controls="product-menu">
            <span class="menu-icon">
              <i class="mdi mdi-cube-outline"></i>
            </span>
            <span class="menu-title">Product</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="product-menu">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item">
                {{-- <i class="mdi mdi-cube-outline"></i> --}}
                <a class="nav-link" href="{{ url('products') }}">{{ trans('message.All Products') }}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('products/create') }}">{{ trans('message.Add Product') }}</a>
              </li>
            </ul>
          </div>
        </li>

      <li class="nav-item menu-items">
          <a class="nav-link" data-bs-toggle="collapse" href="#category-menu" aria-expanded="false" aria-controls="category-menu">
            <span class="menu-icon">
              <i class="mdi mdi-cube-outline"></i>
            </span>
            <span class="menu-title">Category</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="category-menu">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item">
                {{-- <i class="mdi mdi-cube-outline"></i> --}}
                <a class="nav-link" href="{{ url('allcategories') }}">{{ trans('message.All Categories') }}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('addcategory') }}">{{ trans('message.Add Category') }}</a>
              </li>
            </ul>
          </div>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" data-bs-toggle="collapse" href="#user-menu" aria-expanded="false" aria-controls="user-menu">
              <span class="menu-icon">
                <i class="mdi mdi-cube-outline"></i>
              </span>
              <span class="menu-title">User</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="user-menu">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  {{-- <i class="mdi mdi-cube-outline"></i> --}}
                  <a class="nav-link" href="{{ url('allusers') }}">All Users</a>
                </li>

              </ul>
            </div>
          </li>
    </ul>

</nav>
