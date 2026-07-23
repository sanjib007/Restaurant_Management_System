  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><i class="fas fa-truck mr-2 text-success"></i>Delivery Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Delivery</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    @if (\Session::has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{!! \Session::get('success') !!}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
    @endif
    @if (\Session::has('error'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{!! \Session::get('error') !!}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
    @endif

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @php
          $items          = $deliveryOrders ? $deliveryOrders->items() : [];
          $newCount       = collect($items)->where('order_status', 'New')->count();
          $processingCount= collect($items)->where('order_status', 'Processing')->count();
          $completedCount = collect($items)->where('order_status', 'Completed')->count();
        @endphp

        <!-- Small stat boxes (for the current page of orders) -->
        <div class="row">
          <div class="col-lg-4 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $newCount }}</h3>
                <p>New — awaiting pickup</p>
              </div>
              <div class="icon"><i class="fas fa-box"></i></div>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $processingCount }}</h3>
                <p>Out for delivery</p>
              </div>
              <div class="icon"><i class="fas fa-motorcycle"></i></div>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $completedCount }}</h3>
                <p>Delivered</p>
              </div>
              <div class="icon"><i class="fas fa-check-circle"></i></div>
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><i class="fas fa-clipboard-list mr-1"></i> Home Delivery Orders</h3>
          </div>
          <div class="card-body">
            @if($deliveryOrders && $deliveryOrders->count() > 0)
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Order Date</th>
                    <th>Order No.</th>
                    <th>Customer</th>
                    <th>Delivery Address</th>
                    <th>Amount</th>
                    <th>Payment</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($deliveryOrders as $aOrder)
                    <tr>
                      <td><strong>{{ $aOrder->created_at->format('d M Y, h:i A') }}</strong></td>
                      <td><code>{{ $aOrder->order_number }}</code></td>
                      <td>
                        {{ $aOrder->order_contact_name ?: optional($aOrder->user)->name }}
                        <br><small class="text-muted"><i class="fas fa-phone-alt mr-1"></i>{{ $aOrder->order_contact_mobile ?: '—' }}</small>
                      </td>
                      <td style="max-width:220px;"><small>{{ $aOrder->order_contact_address ?: '—' }}</small></td>
                      <td>{{ $aOrder->total_amount }}/-</td>
                      <td>
                        <span class="badge {{ $aOrder->payment_status == 'Paid' ? 'badge-primary' : 'badge-danger' }}">{{ $aOrder->payment_status }}</span>
                        <br><small class="text-muted">{{ $aOrder->order_payment_method }}</small>
                      </td>
                      <td>
                        <span class="badge {{ $aOrder->order_status == 'Completed' ? 'badge-success' : ($aOrder->order_status == 'Processing' ? 'badge-warning' : 'badge-info') }}">
                          {{ $aOrder->order_status }}
                        </span>
                      </td>
                      <td>
                        @if($aOrder->order_status == 'New')
                          @can('Order.Process')
                            <a href="{{ route('order.process', $aOrder->id) }}" class="btn btn-block bg-gradient-info btn-xs mb-1">
                              <i class="fas fa-motorcycle"></i> Start Delivery
                            </a>
                          @endcan
                        @elseif($aOrder->order_status == 'Processing')
                          @can('Order.Complete')
                            <a href="{{ route('order.complete', $aOrder->id) }}" class="btn btn-block bg-gradient-success btn-xs mb-1">
                              <i class="fas fa-check"></i> Mark Delivered
                            </a>
                          @endcan
                          @if($aOrder->payment_status != 'Paid')
                            @can('Order.Paid')
                              <a href="{{ route('order.paid', $aOrder->id) }}" class="btn btn-block bg-gradient-primary btn-xs">
                                <i class="fas fa-money-bill-wave"></i> Mark Paid
                              </a>
                            @endcan
                          @endif
                        @else
                          <span class="text-muted"><i class="fas fa-check-circle text-success"></i> Done</span>
                        @endif
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            {{ $deliveryOrders->links() }}
            @else
              <div class="text-center py-5 text-muted">
                <i class="fas fa-truck-loading fa-3x mb-3"></i>
                <h5>No home-delivery orders right now.</h5>
                <p class="mb-0">New delivery orders placed by customers will appear here.</p>
              </div>
            @endif
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
