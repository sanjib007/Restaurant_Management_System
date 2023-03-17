@extends('main-layout.main')

@section('content')

<!-- Content Header (Page header) -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  @if (Auth::user()->roles->pluck('name')[0] == 'admin')
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{ asset('assets/dist/img/user1-128x128.jpg') }}"
                       alt="User profile picture">
                  @else  
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{ asset('assets/dist/img/user6-128x128.jpg') }}"
                       alt="User profile picture">
                  @endif                 
                  
                </div>

                <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
                 
                <p class="text-muted text-center">{{ Auth::user()->roles->pluck('name')[0] }}</p>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#order" data-toggle="tab">Order History</a></li>
                  <li class="nav-item"><a class="nav-link" href="#review" data-toggle="tab">Review</a></li>
                  <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">Activity</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="order">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Order Date</th>
                          <th>Order No.</th>
                          <th>Total Item</th>
                        </tr>
                      </thead>
                      <tbody class="table-border-bottom-0">
                        <tr>
                          <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>1st March, 2023 07:00:00
                              PM</strong></td>
                          <td>A-20230301-00001</td>
                          <td>3 Items</td>
                        </tr>
                        <tr>
                          <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>1st March, 2023 07:00:00
                              PM</strong></td>
                          <td>A-20230301-00001</td>
                          <td>3 Items</td>
                        </tr>
                        <tr>
                          <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>1st March, 2023 07:00:00
                              PM</strong></td>
                          <td>A-20230301-00001</td>
                          <td>3 Items</td>
                        </tr>
                      </tbody>
                    </table>
    
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="review">
                    
                    <div class="media">
                      <img src="..." class="mr-3" alt="...">
                      <div class="media-body">
                        <h5 class="mt-0">{{ Auth::user()->name }}</h5>
                        <p>Will you do the same for me? It's time to face the music I'm no longer your muse. Heard it's beautiful, be the judge and my girls gonna take a vote. I can feel a phoenix inside of me. Heaven is jealous of our love, angels are crying from up above. Yeah, you take me to utopia.</p>
                      </div>
                    </div>
                    <div class="media">
                      <img src="..." class="mr-3" alt="...">
                      <div class="media-body">
                        <h5 class="mt-0">{{ Auth::user()->name }}</h5>
                        <p>Will you do the same for me? It's time to face the music I'm no longer your muse. Heard it's beautiful, be the judge and my girls gonna take a vote. I can feel a phoenix inside of me. Heaven is jealous of our love, angels are crying from up above. Yeah, you take me to utopia.</p>
                      </div>
                    </div>
                    <div class="media">
                      <img src="..." class="mr-3" alt="...">
                      <div class="media-body">
                        <h5 class="mt-0">{{ Auth::user()->name }}</h5>
                        <p>Will you do the same for me? It's time to face the music I'm no longer your muse. Heard it's beautiful, be the judge and my girls gonna take a vote. I can feel a phoenix inside of me. Heaven is jealous of our love, angels are crying from up above. Yeah, you take me to utopia.</p>
                      </div>
                    </div>

                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="activity">
                    
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>




  @stop