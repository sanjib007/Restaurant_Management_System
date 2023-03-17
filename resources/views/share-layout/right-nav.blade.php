
<!-- Left navbar links -->
<ul class="navbar-nav">
  @if (!Request::is('/'))
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  @endif
  <li class="nav-item d-none d-sm-inline-block">
    <a href="{{ route('welcome') }}" class="nav-link">Home</a>
  </li>
  <li class="nav-item d-none d-sm-inline-block">
    <a href="{{ route('our.menu') }}" class="nav-link">Our Menu</a>
  </li>
  <li class="nav-item d-none d-sm-inline-block">
    <a href="{{ route('contact') }}" class="nav-link">Contact</a>
  </li>
</ul>


<!-- Right navbar links -->
<ul class="navbar-nav ml-auto">
    <!-- Messages Dropdown Menu -->
    
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-comments"></i>
        <span class="badge badge-danger navbar-badge">3</span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <a href="#" class="dropdown-item">
          <!-- Message Start -->
          <div class="media">
            <img src="https://images.pexels.com/photos/103124/pexels-photo-103124.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="User Avatar" class="img-size-50 mr-3 img-circle">
            <div class="media-body">
              <h3 class="dropdown-item-title">
                Chicken Fry
                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
              </h3>
              <p class="text-sm">Price: 100/-</p>
              <p class="text-sm">Item: 5</p>
              <p class="text-sm">Total Price: 500/-</p>
              <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
            </div>
          </div>
          <!-- Message End -->
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <!-- Message Start -->
          <div class="media">
            <img src="https://images.pexels.com/photos/103124/pexels-photo-103124.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="User Avatar" class="img-size-50 img-circle mr-3">
            <div class="media-body">
              <h3 class="dropdown-item-title">
                Egg & Nun
                <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
              </h3>
              <p class="text-sm">Price: 100/-</p>
              <p class="text-sm">Item: 5</p>
              <p class="text-sm">Total Price: 500/-</p>
              <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
            </div>
          </div>
          <!-- Message End -->
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <!-- Message Start -->
          <div class="media">
            <img src="https://images.pexels.com/photos/103124/pexels-photo-103124.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="User Avatar" class="img-size-50 img-circle mr-3">
            <div class="media-body">
              <h3 class="dropdown-item-title">
                Egg & Butter Brade
                <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
              </h3>
              <p class="text-sm">Price: 100/-</p>
              <p class="text-sm">Item: 5</p>
              <p class="text-sm">Total Price: 500/-</p>
              <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
            </div>
          </div>
          <!-- Message End -->
        </a>
        <div class="dropdown-divider"></div>
        <a href="{{ route('home') }}" class="dropdown-item dropdown-footer">Confirm Order</a>
      </div>
    </li>
      @auth
      <li class="nav-item">
          <a href="{{ route('home') }}" class="nav-link">
              <i class="fas fa-home"></i>
          </a>
      </li>
      <li class="nav-item">
          <a href="{{ route('logout') }}" class="nav-link">
              <i class="fas fa-power-off"></i>
          </a>
      </li>            
          
      @else
          <li class="nav-item">
              <a href="{{ route('login') }}" class="nav-link">
                  <i class="fas fa-sign-in-alt"></i>
              </a>
          </li>  
          

          @if (Route::has('register'))
          <li class="nav-item">
              <a href="{{ route('register') }}" class="nav-link">
                  <i class="fas fa-registered"></i>
              </a>
          </li>
          @endif
      @endauth
  </ul>