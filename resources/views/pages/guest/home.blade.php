@extends('main-layout.guest')

@section('guestContent')

<!-- Content Wrapper. Contains page content -->
<div class="container">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="{{ asset('assets/img/slider/1.jpg') }}" alt="First slide">
              <div class="carousel-caption d-none d-md-block">
              <h5>Your First Choice</h5>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor.</p>
              </div>
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('assets/img/slider/2.jpg') }}" alt="Second slide">
              <div class="carousel-caption d-none d-md-block">
              <h5>Your First Choice</h5>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor.</p>
              </div>
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('assets/img/slider/3.jpg') }}" alt="Third slide">
              <div class="carousel-caption d-none d-md-block">
              <h5>Your First Choice</h5>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor.</p>
              </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
          

        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content m-4">
    <div class="container-fluid">
      <!-- COLOR PALETTE -->
      <div class="card card-default color-palette-box">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fas fa-tag"></i>
            Restaurent Management System
          </h3>
        </div>
        <div class="card-body">
          <div class="col-12">
            <p>Welcome to our Restaurant Management System!</p>
            <p>
              At our restaurant, we strive to provide an unforgettable dining experience
               for our customers. Our goal is to make sure that each customer feels welcome
                and appreciated from the moment they walk through our doors. We understand 
                that managing a restaurant can be a daunting task, which is why we have designed 
                a comprehensive system to help streamline the process. Our system allows you to 
                manage all aspects of your restaurant, from seating and orders to payments and accounting.
                Thank you for choosing our Restaurant Management System! We are confident that it will make
                running your restaurant easier and more efficient. If you have any questions, please do not hesitate to contact us.

                We look forward to serving you and your guests!
            </p>

            <p>
              We hope you find our system helpful and easy to use. If you have any questions
               or need assistance, please don't hesitate to reach out to us.
            </p>

              <p>Thank you for choosing our Restaurent Management System!</p>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

      <div class="row">
        <div class="col-md-12 text-center">
          <h5>people's thinking about Restaurant </h5>

          <p>People typically think of restaurants as places to go out to eat with friends and family, 
            to celebrate special occasions, or to simply enjoy a meal away from home. People often consider
             restaurants for the quality of food, atmosphere, and service. For many people, going to a 
             restaurant is a way to enjoy a unique culinary experience or to try something new. 
             People may also think of restaurants as a way to support their local economy and to 
             enjoy a night out with friends or family.</p>
        </div>
        <div class="col-md-12">
          <div class="accordian">
            <ul>
            <li>
              <div class="image_title">
                <a href="#">Club Sandwich</a>
              </div> 
              <a href="#">
                <img src="https://images.pexels.com/photos/1600711/pexels-photo-1600711.jpeg?auto=compress&cs=tinysrgb&w=640&h=320&dpr=1"/>
              </a>
            </li>
            <li>
              <div class="image_title">
                <a href="#">Brown Soup </a>
              </div>
              <a href="#">
                <img src="https://images.pexels.com/photos/539451/pexels-photo-539451.jpeg?auto=compress&cs=tinysrgb&w=640&h=320&dpr=1"/>
              </a>
            </li>
            <li>
              <div class="image_title">
                <a href="#">Fries and Burger on Plate</a>
              </div>
              <a href="#">
                <img src="https://images.pexels.com/photos/70497/pexels-photo-70497.jpeg?auto=compress&cs=tinysrgb&w=640&h=320&dpr=1"/>
              </a>
            </li>
            <li>
              <div class="image_title">
                <a href="#">Pasta With Tomato and Basil</a>
              </div>
              <a href="#">
                <img src="https://images.pexels.com/photos/1279330/pexels-photo-1279330.jpeg?auto=compress&cs=tinysrgb&w=640&h=320&dpr=1"/>
              </a>
            </li>
            <li>
              <div class="image_title">
                <a href="#">Vegetable Salad on Plate
                </a>
              </div>
              <a href="#">
                <img src="https://images.pexels.com/photos/1640777/pexels-photo-1640777.jpeg?auto=compress&cs=tinysrgb&w=640&h=320&dpr=1"/>
              </a>
            </li>
          </ul>
        </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <h5 class="mb-2">Our Restaurent</h5>
      <div class="card card-success">
        <div class="card-body">
          <div class="row">
            <div class="col-md-12 col-lg-6 col-xl-4">
              <div class="card mb-2 bg-gradient-dark">
                <img class="card-img-top" src="{{ asset('assets/dist/img/photo1.png') }}" alt="Dist Photo 1">
                <div class="card-img-overlay d-flex flex-column justify-content-end">
                  <h5 class="card-title text-primary text-white">Card Title</h5>
                  <p class="card-text text-white pb-2 pt-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor.</p>
                  <a href="#" class="text-white">Last update 2 mins ago</a>
                </div>
              </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xl-4">
              <div class="card mb-2">
                <img class="card-img-top" src="{{ asset('assets/dist/img/photo2.png') }}" alt="Dist Photo 2">
                <div class="card-img-overlay d-flex flex-column justify-content-center">
                  <h5 class="card-title text-white mt-5 pt-2">Card Title</h5>
                  <p class="card-text pb-2 pt-1 text-white">
                    Lorem ipsum dolor sit amet, <br>
                    consectetur adipisicing elit <br>
                    sed do eiusmod tempor.
                  </p>
                  <a href="#" class="text-white">Last update 15 hours ago</a>
                </div>
              </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xl-4">
              <div class="card mb-2">
                <img class="card-img-top" src="{{ asset('assets/dist/img/photo1.png') }}" alt="Dist Photo 3">
                <div class="card-img-overlay">
                  <h5 class="card-title text-primary">Card Title</h5>
                  <p class="card-text pb-1 pt-1 text-white">
                    Lorem ipsum dolor <br>
                    sit amet, consectetur <br>
                    adipisicing elit sed <br>
                    do eiusmod tempor. </p>
                  <a href="#" class="text-primary">Last update 3 days ago</a>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 col-lg-6 col-xl-4">
              <div class="card mb-2 bg-gradient-dark">
                <img class="card-img-top" src="{{ asset('assets/dist/img/photo1.png') }}" alt="Dist Photo 1">
                <div class="card-img-overlay d-flex flex-column justify-content-end">
                  <h5 class="card-title text-primary text-white">Card Title</h5>
                  <p class="card-text text-white pb-2 pt-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor.</p>
                  <a href="#" class="text-white">Last update 2 mins ago</a>
                </div>
              </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xl-4">
              <div class="card mb-2">
                <img class="card-img-top" src="{{ asset('assets/dist/img/photo2.png') }}" alt="Dist Photo 2">
                <div class="card-img-overlay d-flex flex-column justify-content-center">
                  <h5 class="card-title text-white mt-5 pt-2">Card Title</h5>
                  <p class="card-text pb-2 pt-1 text-white">
                    Lorem ipsum dolor sit amet, <br>
                    consectetur adipisicing elit <br>
                    sed do eiusmod tempor.
                  </p>
                  <a href="#" class="text-white">Last update 15 hours ago</a>
                </div>
              </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xl-4">
              <div class="card mb-2">
                <img class="card-img-top" src="{{ asset('assets/dist/img/photo1.png') }}" alt="Dist Photo 3">
                <div class="card-img-overlay">
                  <h5 class="card-title text-primary">Card Title</h5>
                  <p class="card-text pb-1 pt-1 text-white">
                    Lorem ipsum dolor <br>
                    sit amet, consectetur <br>
                    adipisicing elit sed <br>
                    do eiusmod tempor. </p>
                  <a href="#" class="text-primary">Last update 3 days ago</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
        </div>
      </div>
      <!-- /.row -->

      <!-- END TYPOGRAPHY -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection