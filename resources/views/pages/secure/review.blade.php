  
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
          <div class="col-md-12">
            <div class="media">
              <img src="..." class="mr-3" alt="...">
              <div class="media-body">
                <h5 class="mt-0">Rahim</h5>
                <p>Will you do the same for me? It's time to face the music I'm no longer your muse. Heard it's beautiful, be the judge and my girls gonna take a vote. I can feel a phoenix inside of me. Heaven is jealous of our love, angels are crying from up above. Yeah, you take me to utopia.</p>
              </div>
            </div>
            <div class="media">
              <img src="..." class="mr-3" alt="...">
              <div class="media-body">
                <h5 class="mt-0">Karim</h5>
                <p>Will you do the same for me? It's time to face the music I'm no longer your muse. Heard it's beautiful, be the judge and my girls gonna take a vote. I can feel a phoenix inside of me. Heaven is jealous of our love, angels are crying from up above. Yeah, you take me to utopia.</p>
              </div>
            </div>
            <div class="media">
              <img src="..." class="mr-3" alt="...">
              <div class="media-body">
                <h5 class="mt-0">Mehedi</h5>
                <p>Will you do the same for me? It's time to face the music I'm no longer your muse. Heard it's beautiful, be the judge and my girls gonna take a vote. I can feel a phoenix inside of me. Heaven is jealous of our love, angels are crying from up above. Yeah, you take me to utopia.</p>
              </div>
            </div>
          </div>
          <!--/.col (left) -->
          <div class="col-md-12">
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Review</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form>                  
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Customer review</label>
                        <textarea class="form-control" rows="3" placeholder="Enter your review..."></textarea>
                      </div>
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