
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
        <span id="setTotalItem" class="badge badge-danger navbar-badge">6</span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <div id="appendItemData"></div>
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