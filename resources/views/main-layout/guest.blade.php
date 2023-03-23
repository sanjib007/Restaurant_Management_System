<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>RMS</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
  <!-- Ekko Lightbox -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/ekko-lightbox/ekko-lightbox.css') }}">
  <style>
    .ellipsis {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    max-width: 200px;
  }
  </style>

  <style>
    .color-palette {
      height: 35px;
      line-height: 35px;
      text-align: right;
      padding-right: .75rem;
    }

    .color-palette.disabled {
      text-align: center;
      padding-right: 0;
      display: block;
    }

    .color-palette-set {
      margin-bottom: 15px;
    }

    .color-palette span {
      display: none;
      font-size: 12px;
    }

    .color-palette:hover span {
      display: block;
    }

    .color-palette.disabled span {
      display: block;
      text-align: left;
      padding-left: .75rem;
    }

    .color-palette-box h4 {
      position: absolute;
      left: 1.25rem;
      margin-top: .75rem;
      color: rgba(255, 255, 255, 0.8);
      font-size: 12px;
      display: block;
      z-index: 7;
    }
  </style>
  <style>
    * {
    margin: 0; 
	padding: 0;
    }

    .accordian {
	width: 805px; height: 320px;
	overflow: hidden;
	
	/*Time for some styling*/
	margin: 50px auto;
	box-shadow: 0 0 10px 1px rgba(0, 0, 0, 0.35);
	-webkit-box-shadow: 0 0 10px 1px rgba(0, 0, 0, 0.35);
	-moz-box-shadow: 0 0 10px 1px rgba(0, 0, 0, 0.35);
    }

    /*A small hack to prevent flickering on some browsers*/
    .accordian ul {
        width: 1200px;
        /*This will give ample space to the last item to move
        instead of falling down/flickering during hovers.*/
    }

    .accordian li {
	position: relative;
	display: block;
	width: 160px;
	float: left;
	
	border-left: 1px solid #888;
	
	box-shadow: 0 0 25px 10px rgba(0, 0, 0, 0.5);
	-webkit-box-shadow: 0 0 25px 10px rgba(0, 0, 0, 0.5);
	-moz-box-shadow: 0 0 25px 10px rgba(0, 0, 0, 0.5);
	
	/*Transitions to give animation effect*/
	transition: all 0.5s;
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
	/*If you hover on the images now you should be able to 
	see the basic accordian*/
    }

    /*Reduce with of un-hovered elements*/
    .accordian ul:hover li {width: 40px;}
    /*Lets apply hover effects now*/
    /*The LI hover style should override the UL hover style*/
    .accordian ul li:hover {width: 640px;}


    .accordian li img {
        display: block;
    }

    /*Image title styles*/
    .image_title {
        background: rgba(0, 0, 0, 0.5);
        position: absolute;
        left: 0; bottom: 0;	
    width: 640px;	

    }
    .image_title a {
        display: block;
        color: #fff;
        text-decoration: none;
        padding: 20px;
        font-size: 16px;
    }
</style>
</head>
<body class="sidebar-collapse">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav sidebar-dark-primary elevation-4" style="width: 250px;">
      <li class="nav-item">
        <a href="{{ route('home') }}" class="brand-link">
            <img src="{{asset('assets/dist/img/AdminLTELogo.png')}}" alt="RMS Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">RMS</span>
        </a>
      </li>
    </ul>

    @include('share-layout.top-nav')
  </nav>
  <!-- /.navbar -->

  @yield('guestContent')
  
@include('share-layout.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
<!-- notify js -->
<script src="{{ asset('assets/dist/js/notify.min.js') }}"></script>
<!-- Ekko Lightbox -->
<script src="{{ asset('assets/plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>

<!-- myScript-->
<script src="{{ asset('assets/dist/js/myjs.js') }}"></script>
</body>
</html>
