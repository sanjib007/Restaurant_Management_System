  
  @extends('main-layout.main')


  @section('content')
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All Customer Review</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Review</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
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
          <!--/.col (left) -->
          <div class="col-md-12 mt-5">
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Review</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{ route('review.insert') }}" method="POST">  
                  @csrf                
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Customer review</label>
                        <textarea class="form-control" rows="3" name="review_text" placeholder="Enter your review..."></textarea>
                      </div>
                      <button type="submit" class="btn bg-gradient-warning btn-lg">Review</button>
                    </div>                    
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
         
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @stop