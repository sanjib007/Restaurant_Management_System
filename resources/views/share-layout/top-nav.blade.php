
<style>
  .top-nav-icon {
    width: 42px;
    height: 42px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    color: #495057;
    background: rgba(255,255,255,0.92);
    border: 1px solid rgba(0,0,0,0.08);
    transition: all 0.2s ease;
    margin-left: 0.35rem;
  }
  .top-nav-icon:hover {
    background: #ffffff;
    color: #212529;
    transform: translateY(-1px);
    box-shadow: 0 3px 8px rgba(0,0,0,0.08);
  }
  .navbar-badge-top {
    position: absolute;
    top: 1px;
    right: 6px;
    font-size: 0.65rem;
    min-width: 18px;
    padding: 0 5px;
  }
  .nav-item.dropdown {
    position: relative;
  }
</style>

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
<ul class="navbar-nav ml-auto align-items-center">
    <li class="nav-item dropdown">
      <a class="nav-link top-nav-icon position-relative" data-toggle="dropdown" href="#" title="Cart">
        <i class="fas fa-shopping-cart"></i>
        <span id="setTotalItem" class="badge badge-danger navbar-badge navbar-badge-top">6</span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <div id="appendItemData"></div>
        <a href="{{ route('home') }}" class="dropdown-item dropdown-footer">Confirm Order</a>
      </div>
    </li>
      @auth
      <li class="nav-item">
          <a href="{{ route('home') }}" class="nav-link top-nav-icon" title="Dashboard">
              <i class="fas fa-home"></i>
          </a>
      </li>
      <li class="nav-item">
          <a href="{{ route('logout') }}" class="nav-link top-nav-icon" title="Logout">
              <i class="fas fa-power-off"></i>
          </a>
      </li>            
      @else
          <li class="nav-item">
              <a href="{{ route('login') }}" class="nav-link top-nav-icon" title="Login">
                  <i class="fas fa-sign-in-alt"></i>
              </a>
          </li>  
          @if (Route::has('register'))
          <li class="nav-item">
              <a href="{{ route('register') }}" class="nav-link top-nav-icon" title="Register">
                  <i class="fas fa-registered"></i>
              </a>
          </li>
          @endif
      @endauth
  </ul>