@extends('main-layout.main')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Profile</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        @if(session('success'))
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ session('success') }}
          </div>
        @endif
        @if($errors->any())
          <div class="alert alert-danger">
            <ul class="mb-0">
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <div class="row">
          <div class="col-lg-4 col-md-5">
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{ asset('assets/img/profile/' . Auth::user()->image) }}"
                       alt="{{ Auth::user()->name }}"
                       style="width:160px;height:160px;object-fit:cover;object-position:center;border:4px solid #fff;box-shadow:0 0 0.75rem rgba(0,123,255,0.15);">
                </div>

                <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
                <p class="text-muted text-center">
                  {{ Auth::user()->roles->pluck('name')->first() ?? 'User' }}
                </p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right">{{ Auth::user()->email }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Member Since</b>
                    <a class="float-right">{{ Auth::user()->created_at ? Auth::user()->created_at->format('d M Y') : '-' }}</a>
                  </li>
                </ul>

                <a href="#uploadForm" class="btn btn-primary btn-block" data-toggle="collapse">
                  <b>{{ Auth::user()->image ? 'Change Profile Image' : 'Upload Profile Image' }}</b>
                </a>

                <div class="collapse mt-3" id="uploadForm">
                  <div class="card card-body p-3">
                    <form action="{{ route('user.imageUpload') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                      <div class="form-group">
                        <label for="user_image">Select image</label>
                        <input type="file" name="user_image" class="form-control" id="user_image" required>
                      </div>
                      <button type="submit" class="btn btn-success btn-block">Upload Image</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">About</h3>
              </div>
              <div class="card-body">
                <strong><i class="fas fa-user-circle mr-2"></i> Role</strong>
                <p class="text-muted">{{ Auth::user()->roles->pluck('name')->first() ?? 'User' }}</p>

                <hr>
                <strong><i class="fas fa-envelope mr-2"></i> Contact</strong>
                <p class="text-muted">{{ Auth::user()->email }}</p>

                <hr>
                <strong><i class="fas fa-calendar-alt mr-2"></i> Account Created</strong>
                <p class="text-muted">{{ Auth::user()->created_at ? Auth::user()->created_at->format('F d, Y') : 'N/A' }}</p>
              </div>
            </div>
          </div>

          <div class="col-lg-8 col-md-7">
            <div class="card card-info card-outline">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#order" data-toggle="tab">Order History</a></li>
                  <li class="nav-item"><a class="nav-link" href="#review" data-toggle="tab">Reviews</a></li>
                  <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">Activity</a></li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="order">
                    @if($orderHistory && $orderHistory->count())
                      <div class="table-responsive">
                        <table class="table table-striped table-hover">
                          <thead>
                            <tr>
                              <th>Date</th>
                              <th>Order No.</th>
                              <th>Total Items</th>
                              <th>Status</th>
                              <th>Total</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($orderHistory as $aOrder)
                              <tr>
                                <td>{{ optional($aOrder->created_at)->format('d M Y') }}</td>
                                <td>{{ $aOrder->order_number }}</td>
                                <td>{{ $aOrder->total_item }} Items</td>
                                <td>
                                  <span class="badge badge-{{ $aOrder->payment_status == 'Paid' ? 'success' : 'secondary' }}">
                                    {{ $aOrder->payment_status }}
                                  </span>
                                </td>
                                <td>{{ number_format($aOrder->total_amount, 2) }}/-</td>
                              </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                      <div class="mt-3">
                        {{ $orderHistory->links() }}
                      </div>
                    @else
                      <div class="text-center py-5">
                        <i class="fas fa-shopping-basket fa-3x text-muted mb-3"></i>
                        <p class="text-muted">No order history available yet.</p>
                      </div>
                    @endif
                  </div>

                  <div class="tab-pane" id="review">
                    @if($reviews && count($reviews))
                      <div class="row">
                        @foreach ($reviews as $aReview)
                          <div class="col-12 mb-3">
                            <div class="card shadow-sm">
                              <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                  <img src="{{ asset('assets/img/profile/'.$aReview->image) }}" alt="{{ $aReview->review_name }}" class="img-circle mr-3" style="width:54px; height:54px; object-fit:cover; object-position:center; border:2px solid #dee2e6;">
                                  <div>
                                    <h5 class="mb-0">{{ $aReview->name }}</h5>
                                    <small class="text-muted">{{ optional($aReview->created_at)->format('d M Y') }}</small>
                                  </div>
                                </div>
                                <p>{{ $aReview->review_text }}</p>
                              </div>
                            </div>
                          </div>
                        @endforeach
                      </div>
                    @else
                      <div class="text-center py-5">
                        <i class="fas fa-comment-alt fa-3x text-muted mb-3"></i>
                        <p class="text-muted">You have not posted any reviews yet.</p>
                      </div>
                    @endif
                  </div>

                  <div class="tab-pane" id="activity">
                    <div class="row">
                      <div class="col-12">
                        <div class="callout callout-info">
                          <h5>Recent Activity</h5>
                          <p>Recent account activity will appear here after you place orders, update your profile, or submit reviews.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>
@endsection