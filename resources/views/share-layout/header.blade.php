<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
  <img class="animation__shake" src="{{asset('assets/dist/img/AdminLTELogo.png')}}" alt="RMS" height="60" width="60">
</div>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">

  @include('share-layout.top-nav')

</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ route('welcome') }}" class="brand-link">
    <img src="{{asset('assets/dist/img/AdminLTELogo.png')}}" alt="RMS Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8">
    <span class="brand-text font-weight-light">RMS</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
      <div class="image mr-2" style="width:52px; height:52px;">
        <img class="profile-user-img img-fluid img-circle elevation-2"
             src="{{ asset('assets/img/profile/' . Auth::user()->image) }}"
             alt="{{ Auth::user()->name }}"
             style="width:100%; height:100%; object-fit:cover; object-position:center; border:2px solid rgba(255,255,255,0.35);">
      </div>
      <div class="info">
        <a href="#" class="d-block text-white font-weight-semibold" style="font-size:0.95rem; line-height:1.2;">
          {{ Auth::user()->name }}<br>
          <small class="text-light" style="font-size:0.8rem;">{{ Auth::user()->roles->pluck('name')[0] }}</small>
        </a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="{{ route('home') }}" class="nav-link">
            <i class="nav-icon far fa-circle text-warning"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('profile') }}" class="nav-link">
            <i class="nav-icon far fa-circle text-info"></i>
            <p>Profile</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('review') }}" class="nav-link">
            <i class="nav-icon far fa-circle text-info"></i>
            <p>Review</p>
          </a>
        </li>

        @can('Order.View')
        <li class="nav-item">
          <a href="{{ route('order') }}" class="nav-link">
            <i class="nav-icon far fa-circle text-warning"></i>
            <p>Order</p>
          </a>
        </li>
        @endcan
        @can('CancelRequest.View')
        <li class="nav-item">
          <a href="{{ route('order.cancelRequests') }}" class="nav-link">
            <i class="nav-icon far fa-circle text-danger"></i>
            <p>
              Cancel Requests
              @php
                $pendingCancelMenuCount = \App\Models\OrderCancelRequest::where('status', 'Pending')->count();
              @endphp
              @if($pendingCancelMenuCount > 0)
                <span class="right badge badge-danger">{{ $pendingCancelMenuCount }}</span>
              @endif
            </p>
          </a>
        </li>
        @endcan
        @can('Category.View')
        <li class="nav-item">
          <a href="{{ route('item-insert') }}" class="nav-link">
            <i class="nav-icon far fa-circle text-warning"></i>
            <p>Item Insert</p>
          </a>
        </li>
        @endcan
        @can('Slider.View')
        <li class="nav-item">
          <a href="{{ route('slider.index') }}" class="nav-link">
            <i class="nav-icon far fa-circle text-warning"></i>
            <p>Slider Manager</p>
          </a>
        </li>
        @endcan
        @can('User.View')
        <li class="nav-item">
          <a href="{{ route('user') }}" class="nav-link">
            <i class="nav-icon far fa-circle text-warning"></i>
            <p>User Insert</p>
          </a>
        </li>
        @endcan

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>