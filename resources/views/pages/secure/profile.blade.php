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
                       src="{{ asset('assets/img/profile/'.Auth::user()->image) }}"
                       alt="{{ Auth::user()->name }}">
                  @else  
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{ asset('assets/img/profile/'.Auth::user()->image) }}"
                       alt="User profile picture">
                  @endif                 
                  <form class="mt-2" id="showUpload" action="{{ route('user.imageUpload') }}" method="Post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <input hidden name="user_id" value="{{ Auth::user()->id }}">
                      <input type="file" name="user_image" class="form-control" id="user_image"
                          placeholder="Upload Image" required>
                      @if ($errors->has('user_image'))
                      <span class="text-danger">{{ $errors->first('user_image') }}</span>
                      @endif 
                      <button type="submit" class="btn btn-block bg-gradient-warning btn-xs mt-3">Upload Image</button>
                      <button type="button" id="cancelUpload" class="btn btn-block bg-gradient-danger btn-xs">Cancel</button>
                  </div>
                  </form>
                  <button type="button" id="uploadImage" class="btn btn-block bg-gradient-warning btn-xs m-2">
                    {{ Auth::user()->image != null ? 'Change Image' : 'Upload Image' }}
                  </button>
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
                    @if($orderHistory!= null)                
                <table class="table">
                  <thead>
                    <tr>
                      <th>Order Date</th>
                      <th>Order No.</th>
                      <th>Total Item</th>
                      <th>Payment Status</th>
                      <th>Total Price</th>
                    </tr>
                  </thead>
                  <tbody class="table-border-bottom-0">
                   
                    @foreach ($orderHistory as $aOrder)
                    <tr>
                      <td><strong>{{ $aOrder->created_at }}</strong></td>
                      <td>{{ $aOrder->order_number }}</td>
                      <td>{{ $aOrder->total_item }} Items</td>
                      <td><span class="{{ $aOrder->payment_status == 'Paid' ? 'badge badge-primary' : 'badge badge-primary' }}">{{ $aOrder->payment_status }}</span></td>
                      <td>{{ $aOrder->total_amount }}/-</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {{ $orderHistory->links() }}
                @endif
    
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="review">
                    
                    <div class="row">
                      @if($reviews != null)
                      <div class="col-md-12">
                      @foreach ($reviews as $aReview)
                        <div class="media">
                          <img style="width: 50px;" src="{{ asset('assets/img/profile/'.$aReview->image) }}" class="mr-3" alt="{{ $aReview->review_name }}">
                          <div class="media-body">
                            <h5 class="mt-0">{{ $aReview->name }}</h5>
                            <p>{{ $aReview->review_text }}</p>
                          </div>
                        </div>
                      @endforeach
                      </div>
                      @endif
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