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
                @if($completedOrderHistory!= null)                
                <table class="table">
                  <thead>
                    <tr>
                      <th>Order Date</th>
                      <th>Order No.</th>
                      <th>Total Item</th>
                      <th>Order Position</th>
                      <th>Order Status</th>
                      <th>Payment Status</th>
                      <th>Total Price</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class="table-border-bottom-0">
                   
                    @foreach ($completedOrderHistory as $aOrder)
                    <tr>
                      <td><strong>{{ $aOrder->created_at }}</strong></td>
                      <td>{{ $aOrder->order_number }}</td>
                      <td>{{ $aOrder->total_item }} Items</td>
                      <td>{{ $aOrder->order_position }}</td>
                      <td>{{ $aOrder->order_status }}</td>
                      <td>
                        <span class="{{ $aOrder->payment_status == 'Paid' ? 'badge badge-primary' : 'badge badge-danger' }}">{{ $aOrder->payment_status }}</span>
                      </td>
                      <td>{{ $aOrder->total_amount }}/-</td>
                      <td>
                        @if ($aOrder->payment_status == 'Not Paid' && $aOrder->order_status != 'Cancel')
                          <a href="{{ route('order.paid', $aOrder->id) }}" class="btn btn-block bg-gradient-warning btn-xs">Paid</a>
                        @endif
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                @endif
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                {{ $completedOrderHistory->links() }}
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
                @if($newOrderHistory!= null)                
                <table class="table">
                  <thead>
                    <tr>
                      <th>Order Date</th>
                      <th>Order No.</th>
                      <th>Total Item</th>
                      <th>Order Position</th>
                      <th>Payment Status</th>
                      <th>Total Price</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class="table-border-bottom-0">
                   
                    @foreach ($newOrderHistory as $aOrder)
                    <tr>
                      <td><strong>{{ $aOrder->created_at }}</strong></td>
                      <td>{{ $aOrder->order_number }}</td>
                      <td>{{ $aOrder->total_item }} Items</td>
                      <td>{{ $aOrder->order_position }}</td>
                      <td><span class="{{ $aOrder->payment_status == 'Paid' ? 'badge badge-primary' : 'badge badge-danger' }}">{{ $aOrder->payment_status }}</span></td>
                      <td>{{ $aOrder->total_amount }}/-</td>
                      <td>
                        <a href="{{ route('order.process', $aOrder->id) }}" class="btn btn-block bg-gradient-warning btn-xs">Make Processing</a>
                        <a href="{{ route('order.cancel', $aOrder->id) }}" class="btn btn-block bg-gradient-danger btn-xs">Order Cancel</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                @endif
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                {{ $newOrderHistory->links() }}
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
                @if($processingOrderHistory!= null)                
                <table class="table">
                  <thead>
                    <tr>
                      <th>Order Date</th>
                      <th>Order No.</th>
                      <th>Total Item</th>
                      <th>Order Position</th>
                      <th>Payment Status</th>
                      <th>Total Price</th>
                      <th>Action/th>
                    </tr>
                  </thead>
                  <tbody class="table-border-bottom-0">
                   
                    @foreach ($processingOrderHistory as $aOrder)
                    <tr>
                      <td><strong>{{ $aOrder->created_at }}</strong></td>
                      <td>{{ $aOrder->order_number }}</td>
                      <td>{{ $aOrder->total_item }} Items</td>
                      <td>{{ $aOrder->order_position }}</td>
                      <td><span class="{{ $aOrder->payment_status == 'Paid' ? 'badge badge-primary' : 'badge badge-danger' }}">{{ $aOrder->payment_status }}</span></td>
                      <td>{{ $aOrder->total_amount }}/-</td>
                      <td><a href="{{ route('order.complete', $aOrder->id) }}" class="btn btn-block bg-gradient-warning btn-xs">Make Complete</a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                @endif
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                {{ $processingOrderHistory->links() }}
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