<!-- /.content-wrapper -->
@if (Request::is('/'))
<div class="container">

  <div class="row">
    <div class="col-md-6">
      <div class="card card-warning">
        <div class="card-header">
          <h3 class="card-title">Customer Feedback</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <form>
            <div class="row">
              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control" placeholder="Enter ...">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Mobile</label>
                  <input type="text" class="form-control" placeholder="Enter ...">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <!-- textarea -->
                <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                </div>
              </div>
              <div class="col-sm-12">
                <button type="button" class="btn btn-primary btn-block">SUBMIT</button>
              </div>
            </div>
          </form>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- ./col -->
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fas fa-text-width"></i>
            Restaurent Address
          </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <dl class="row">
            <dt class="col-sm-4">Address: </dt>
            <dd class="col-sm-8">4 No. Nobendra Nath Basak Lane, Nawabpur, Dhaka.</dd>
            <dt class="col-sm-4">Mobile:</dt>
            <dd class="col-sm-8">+88 01756 307427</dd>
            <dt class="col-sm-4">Email:</dt>
            <dd class="col-sm-8">loton1984@gmail.com</dd>
          </dl>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- ./col -->
  </div>

</div>
@endif
<footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>