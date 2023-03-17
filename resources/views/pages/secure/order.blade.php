@extends('main-layout.main')


@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Order Manage</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Order</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Completed Order</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
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
                    <tr>
                      <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>1st March, 2023 07:00:00 PM</strong></td>
                      <td>A-20230301-00005</td>
                      <td>5 Items</td>
                      <td><span class="badge badge-primary">Paid</span></td>
                      <td>400/-</td>
                    </tr>
                    <tr>
                      <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>1st March, 2023 07:00:00 PM</strong></td>
                      <td>A-20230301-00004</td>
                      <td>4 Items</td>
                      <td><span class="badge badge-danger">Not Paid</span></td>
                      <td>400/-</td>
                    </tr>
                    <tr>
                      <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>1st March, 2023 07:00:00 PM</strong></td>
                      <td>A-20230301-00003</td>
                      <td>3 Items</td>
                      <td><span class="badge badge-primary">Paid</span></td>
                      <td>400/-</td>
                    </tr>
                    <tr>
                      <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>1st March, 2023 07:00:00 PM</strong></td>
                      <td>A-20230301-00002</td>
                      <td>6 Items</td>
                      <td><span class="badge badge-primary">Paid</span></td>
                      <td>400/-</td>
                    </tr>
                    <tr>
                      <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>1st March, 2023 07:00:00 PM</strong></td>
                      <td>A-20230301-00001</td>
                      <td>3 Items</td>
                      <td><span class="badge badge-primary">Paid</span></td>
                      <td>400/-</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">New Order</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Order Date</th>
                      <th>Order No.</th>
                      <th>Total Item</th>
                      <th>Payment Status</th>
                      <th>Total Price</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class="table-border-bottom-0">
                    <tr>
                      <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>1st March, 2023 07:00:00 PM</strong></td>
                      <td>A-20230301-00005</td>
                      <td>5 Items</td>
                      <td><span class="badge badge-primary">Paid</span></td>
                      <td>400/-</td>
                      <td><button type="button" class="btn btn-block bg-gradient-warning btn-sm">Make Processing</button></td>
                    </tr>
                    <tr>
                      <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>1st March, 2023 07:00:00 PM</strong></td>
                      <td>A-20230301-00004</td>
                      <td>4 Items</td>
                      <td><span class="badge badge-danger">Not Paid</span></td>
                      <td>400/-</td>
                      <td><button type="button" class="btn btn-block bg-gradient-warning btn-sm">Make Processing</button></td>
                    </tr>
                    <tr>
                      <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>1st March, 2023 07:00:00 PM</strong></td>
                      <td>A-20230301-00003</td>
                      <td>3 Items</td>
                      <td><span class="badge badge-primary">Paid</span></td>
                      <td>400/-</td>
                      <td><button type="button" class="btn btn-block bg-gradient-warning btn-sm">Make Processing</button></td>
                    </tr>
                    <tr>
                      <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>1st March, 2023 07:00:00 PM</strong></td>
                      <td>A-20230301-00002</td>
                      <td>6 Items</td>
                      <td><span class="badge badge-primary">Paid</span></td>
                      <td>400/-</td>
                      <td><button type="button" class="btn btn-block bg-gradient-warning btn-sm">Make Processing</button></td>
                    </tr>
                    <tr>
                      <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>1st March, 2023 07:00:00 PM</strong></td>
                      <td>A-20230301-00001</td>
                      <td>3 Items</td>
                      <td><span class="badge badge-primary">Paid</span></td>
                      <td>400/-</td>
                      <td><button type="button" class="btn btn-block bg-gradient-warning btn-sm">Make Processing</button></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Processing Order</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Order Date</th>
                      <th>Order No.</th>
                      <th>Total Item</th>
                      <th>Payment Status</th>
                      <th>Total Price</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class="table-border-bottom-0">
                    <tr>
                      <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>1st March, 2023 07:00:00 PM</strong></td>
                      <td>A-20230301-00005</td>
                      <td>5 Items</td>
                      <td><span class="badge badge-primary">Paid</span></td>
                      <td>400/-</td>
                      <td><button type="button" class="btn btn-block bg-gradient-warning btn-sm">Make Complete</button></td>
                    </tr>
                    <tr>
                      <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>1st March, 2023 07:00:00 PM</strong></td>
                      <td>A-20230301-00004</td>
                      <td>4 Items</td>
                      <td><span class="badge badge-danger">Not Paid</span></td>
                      <td>400/-</td>
                      <td><button type="button" class="btn btn-block bg-gradient-warning btn-sm">Make Complete</button></td>
                    </tr>
                    <tr>
                      <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>1st March, 2023 07:00:00 PM</strong></td>
                      <td>A-20230301-00003</td>
                      <td>3 Items</td>
                      <td><span class="badge badge-primary">Paid</span></td>
                      <td>400/-</td>
                      <td><button type="button" class="btn btn-block bg-gradient-warning btn-sm">Make Complete</button></td>
                    </tr>
                    <tr>
                      <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>1st March, 2023 07:00:00 PM</strong></td>
                      <td>A-20230301-00002</td>
                      <td>6 Items</td>
                      <td><span class="badge badge-primary">Paid</span></td>
                      <td>400/-</td>
                      <td><button type="button" class="btn btn-block bg-gradient-warning btn-sm">Make Complete</button></td>
                    </tr>
                    <tr>
                      <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>1st March, 2023 07:00:00 PM</strong></td>
                      <td>A-20230301-00001</td>
                      <td>3 Items</td>
                      <td><span class="badge badge-primary">Paid</span></td>
                      <td>400/-</td>
                      <td><button type="button" class="btn btn-block bg-gradient-warning btn-sm">Make Complete</button></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Take away Order</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Order Date</th>
                      <th>Order No.</th>
                      <th>Total Item</th>
                      <th>Payment Status</th>
                      <th>Total Price</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class="table-border-bottom-0">
                    <tr>
                      <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>1st March, 2023 07:00:00 PM</strong></td>
                      <td>A-20230301-00005</td>
                      <td>5 Items</td>
                      <td><span class="badge badge-primary">Paid</span></td>
                      <td>400/-</td>
                      <td><button type="button" class="btn btn-block bg-gradient-warning btn-sm">Make Complete</button></td>
                    </tr>
                    <tr>
                      <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>1st March, 2023 07:00:00 PM</strong></td>
                      <td>A-20230301-00004</td>
                      <td>4 Items</td>
                      <td><span class="badge badge-danger">Not Paid</span></td>
                      <td>400/-</td>
                      <td><button type="button" class="btn btn-block bg-gradient-warning btn-sm">Make Complete</button></td>
                    </tr>
                    <tr>
                      <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>1st March, 2023 07:00:00 PM</strong></td>
                      <td>A-20230301-00003</td>
                      <td>3 Items</td>
                      <td><span class="badge badge-primary">Paid</span></td>
                      <td>400/-</td>
                      <td><button type="button" class="btn btn-block bg-gradient-warning btn-sm">Make Complete</button></td>
                    </tr>
                    <tr>
                      <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>1st March, 2023 07:00:00 PM</strong></td>
                      <td>A-20230301-00002</td>
                      <td>6 Items</td>
                      <td><span class="badge badge-primary">Paid</span></td>
                      <td>400/-</td>
                      <td><button type="button" class="btn btn-block bg-gradient-warning btn-sm">Make Complete</button></td>
                    </tr>
                    <tr>
                      <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>1st March, 2023 07:00:00 PM</strong></td>
                      <td>A-20230301-00001</td>
                      <td>3 Items</td>
                      <td><span class="badge badge-primary">Paid</span></td>
                      <td>400/-</td>
                      <td><button type="button" class="btn btn-block bg-gradient-warning btn-sm">Make Complete</button></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
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
  <!-- /.content-wrapper -->

@stop