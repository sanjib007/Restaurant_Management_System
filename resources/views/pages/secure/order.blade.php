@extends('main-layout.main')


@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 d-flex align-items-center">
            <h1 class="mr-3">Order Manage</h1>
            @can('CancelRequest.View')
              <a href="{{ route('order.cancelRequests') }}" class="btn btn-outline-danger btn-sm" style="border-radius:20px;font-weight:600;">
                <i class="fas fa-exclamation-triangle mr-1"></i> Cancel Requests
                @if(($pendingCancelCount ?? 0) > 0)
                  <span class="badge badge-danger ml-1">{{ $pendingCancelCount }}</span>
                @endif
              </a>
            @endcan
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

        {{-- ─── Shared Search Bar ─── --}}
        <div class="row mb-3">
          <div class="col-md-12">
            <div class="card card-outline card-primary mb-0">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-search mr-2"></i>Search Orders</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body pb-1">
                <form method="GET" action="{{ route('order') }}" id="order-search-form">
                  <div class="row align-items-end">
                    <div class="col-md-4 mb-2">
                      <label class="mb-1" style="font-size:.8rem;font-weight:600;text-transform:uppercase;letter-spacing:.5px;color:#718096;">Order No.</label>
                      <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                          <span class="input-group-text" style="background:#f1f5f9;"><i class="fas fa-hashtag text-muted"></i></span>
                        </div>
                        <input type="text" name="search_order_no" id="search_order_no"
                               class="form-control"
                               placeholder="Search by order number…"
                               value="{{ $searchOrderNo ?? '' }}">
                      </div>
                    </div>
                    <div class="col-md-4 mb-2">
                      <label class="mb-1" style="font-size:.8rem;font-weight:600;text-transform:uppercase;letter-spacing:.5px;color:#718096;">Order Date</label>
                      <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                          <span class="input-group-text" style="background:#f1f5f9;"><i class="fas fa-calendar-alt text-muted"></i></span>
                        </div>
                        <input type="date" name="search_order_date" id="search_order_date"
                               class="form-control"
                               value="{{ $searchOrderDate ?? '' }}">
                      </div>
                    </div>
                    <div class="col-md-4 mb-2 d-flex" style="gap:6px;">
                      <button type="submit" class="btn btn-primary btn-sm flex-fill" style="border-radius:6px;">
                        <i class="fas fa-search mr-1"></i> Search
                      </button>
                      <a href="{{ route('order') }}" class="btn btn-secondary btn-sm flex-fill" style="border-radius:6px;">
                        <i class="fas fa-times mr-1"></i> Clear
                      </a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        {{-- ─── Completed Orders ─── --}}
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Completed Order</h3>
              </div>
              <div class="card-body">
                @if($completedOrderHistory != null)
                <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Customer ID</th>
                      <th>Customer Name</th>
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
                      <td>
                        <span class="badge badge-dark" style="font-size:.8rem;">#{{ $aOrder->user_id }}</span>
                      </td>
                      <td>
                        <strong>{{ $aOrder->user?->name ?? '—' }}</strong><br>
                        <small class="text-muted">{{ $aOrder->user?->email ?? '' }}</small>
                      </td>
                      <td><strong>{{ $aOrder->created_at->format('d M Y, h:i A') }}</strong></td>
                      <td><code>{{ $aOrder->order_number }}</code></td>
                      <td>{{ $aOrder->total_item }} Items</td>
                      <td>{{ $aOrder->order_position }}</td>
                      <td>
                        <span class="badge {{ $aOrder->order_status == 'Completed' ? 'badge-success' : ($aOrder->order_status == 'Cancel' ? 'badge-danger' : 'badge-info') }}">
                          {{ $aOrder->order_status }}
                        </span>
                      </td>
                      <td>
                        <span class="{{ $aOrder->payment_status == 'Paid' ? 'badge badge-primary' : 'badge badge-danger' }}">{{ $aOrder->payment_status }}</span>
                      </td>
                      <td>{{ $aOrder->total_amount }}/-</td>
                      <td>
                        <button onclick="viewOrderDetail({{ $aOrder->id }})" class="btn btn-block bg-gradient-info btn-xs mb-1">
                          <i class="fas fa-eye"></i> View
                        </button>
                        @can('Order.Paid')
                          @if ($aOrder->payment_status == 'Not Paid' && $aOrder->order_status != 'Cancel')
                            <a href="{{ route('order.paid', $aOrder->id) }}" class="btn btn-block bg-gradient-warning btn-xs">Paid</a>
                          @endif
                        @endcan
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                </div>
                @endif
              </div>
              <div class="card-footer clearfix">
                {{ $completedOrderHistory->links() }}
              </div>
            </div>
          </div>
        </div>

        {{-- ─── New Orders ─── --}}
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">New Order</h3>
              </div>
              <div class="card-body">
                @if($newOrderHistory != null)
                <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Customer ID</th>
                      <th>Customer Name</th>
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
                      <td>
                        <span class="badge badge-dark" style="font-size:.8rem;">#{{ $aOrder->user_id }}</span>
                      </td>
                      <td>
                        <strong>{{ $aOrder->user?->name ?? '—' }}</strong><br>
                        <small class="text-muted">{{ $aOrder->user?->email ?? '' }}</small>
                      </td>
                      <td><strong>{{ $aOrder->created_at->format('d M Y, h:i A') }}</strong></td>
                      <td><code>{{ $aOrder->order_number }}</code></td>
                      <td>{{ $aOrder->total_item }} Items</td>
                      <td>{{ $aOrder->order_position }}</td>
                      <td><span class="{{ $aOrder->payment_status == 'Paid' ? 'badge badge-primary' : 'badge badge-danger' }}">{{ $aOrder->payment_status }}</span></td>
                      <td>{{ $aOrder->total_amount }}/-</td>
                      <td>
                        <button onclick="viewOrderDetail({{ $aOrder->id }})" class="btn btn-block bg-gradient-info btn-xs mb-1">
                          <i class="fas fa-eye"></i> View
                        </button>
                        @can('Order.Process')
                          <a href="{{ route('order.process', $aOrder->id) }}" class="btn btn-block bg-gradient-warning btn-xs mb-1">Make Processing</a>
                        @endcan
                        @can('Order.Cancel')
                          <a href="{{ route('order.cancel', $aOrder->id) }}" class="btn btn-block bg-gradient-danger btn-xs">Order Cancel</a>
                        @endcan
                        @if($aOrder->cancelRequest && $aOrder->cancelRequest->status == 'Pending')
                          <a href="{{ route('order.cancelRequests') }}" class="badge badge-warning d-block py-1 mt-1 text-dark" style="font-size:.75rem;">
                            <i class="fas fa-exclamation-circle mr-1"></i>Customer Req Cancel
                          </a>
                        @endif
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                </div>
                @endif
              </div>
              <div class="card-footer clearfix">
                {{ $newOrderHistory->links() }}
              </div>
            </div>
          </div>
        </div>

        {{-- ─── Processing Orders ─── --}}
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Processing Order</h3>
              </div>
              <div class="card-body">
                @if($processingOrderHistory != null)
                <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Customer ID</th>
                      <th>Customer Name</th>
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
                    @foreach ($processingOrderHistory as $aOrder)
                    <tr>
                      <td>
                        <span class="badge badge-dark" style="font-size:.8rem;">#{{ $aOrder->user_id }}</span>
                      </td>
                      <td>
                        <strong>{{ $aOrder->user?->name ?? '—' }}</strong><br>
                        <small class="text-muted">{{ $aOrder->user?->email ?? '' }}</small>
                      </td>
                      <td><strong>{{ $aOrder->created_at->format('d M Y, h:i A') }}</strong></td>
                      <td><code>{{ $aOrder->order_number }}</code></td>
                      <td>{{ $aOrder->total_item }} Items</td>
                      <td>{{ $aOrder->order_position }}</td>
                      <td><span class="{{ $aOrder->payment_status == 'Paid' ? 'badge badge-primary' : 'badge badge-danger' }}">{{ $aOrder->payment_status }}</span></td>
                      <td>{{ $aOrder->total_amount }}/-</td>
                      <td>
                        <button onclick="viewOrderDetail({{ $aOrder->id }})" class="btn btn-block bg-gradient-info btn-xs mb-1">
                          <i class="fas fa-eye"></i> View
                        </button>
                        @can('Order.Complete')
                          <a href="{{ route('order.complete', $aOrder->id) }}" class="btn btn-block bg-gradient-warning btn-xs">Make Complete</a>
                        @endcan
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                </div>
                @endif
              </div>
              <div class="card-footer clearfix">
                {{ $processingOrderHistory->links() }}
              </div>
            </div>
          </div>
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


{{-- ═══════════════════════════════════════════════════════════════
     ORDER DETAIL MODAL
═══════════════════════════════════════════════════════════════ --}}
<div class="modal fade" id="orderDetailModal" tabindex="-1" role="dialog" aria-labelledby="orderDetailModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content" style="border-radius:12px; border:none; overflow:hidden; box-shadow:0 20px 60px rgba(0,0,0,0.25);">

      {{-- Modal Header --}}
      <div class="modal-header text-white" style="background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%); border-bottom:none; padding:20px 28px;">
        <div>
          <h5 class="modal-title mb-1" id="orderDetailModalLabel" style="font-size:1.2rem; font-weight:700; letter-spacing:.5px;">
            <i class="fas fa-receipt mr-2" style="color:#e94560;"></i>
            Order Detail
          </h5>
          <small id="modal-order-number" style="color:#a0aec0; font-size:.82rem;"></small>
        </div>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close" style="opacity:.7;">
          <span aria-hidden="true" style="font-size:1.4rem;">&times;</span>
        </button>
      </div>

      {{-- Modal Body --}}
      <div class="modal-body" style="padding:24px 28px; background:#f8fafc;">

        {{-- Loading Spinner --}}
        <div id="modal-loading" class="text-center py-5" style="display:none;">
          <div class="spinner-border text-primary" role="status" style="width:3rem;height:3rem;">
            <span class="sr-only">Loading...</span>
          </div>
          <p class="mt-3 text-muted">Fetching order details…</p>
        </div>

        {{-- Order Meta Info Cards --}}
        <div id="modal-meta" style="display:none;">
          <div class="row mb-4" id="modal-info-cards">
            <div class="col-6 col-md-3 mb-3">
              <div class="p-3 text-center rounded" style="background:#fff; box-shadow:0 2px 8px rgba(0,0,0,.07);">
                <div style="font-size:.72rem; text-transform:uppercase; letter-spacing:.8px; color:#718096; margin-bottom:4px;">Status</div>
                <span id="modal-order-status" class="badge" style="font-size:.85rem; padding:5px 12px;"></span>
              </div>
            </div>
            <div class="col-6 col-md-3 mb-3">
              <div class="p-3 text-center rounded" style="background:#fff; box-shadow:0 2px 8px rgba(0,0,0,.07);">
                <div style="font-size:.72rem; text-transform:uppercase; letter-spacing:.8px; color:#718096; margin-bottom:4px;">Payment</div>
                <span id="modal-payment-status" class="badge" style="font-size:.85rem; padding:5px 12px;"></span>
              </div>
            </div>
            <div class="col-6 col-md-3 mb-3">
              <div class="p-3 text-center rounded" style="background:#fff; box-shadow:0 2px 8px rgba(0,0,0,.07);">
                <div style="font-size:.72rem; text-transform:uppercase; letter-spacing:.8px; color:#718096; margin-bottom:4px;">Position</div>
                <strong id="modal-position" style="font-size:.95rem;"></strong>
              </div>
            </div>
            <div class="col-6 col-md-3 mb-3">
              <div class="p-3 text-center rounded" style="background:#fff; box-shadow:0 2px 8px rgba(0,0,0,.07);">
                <div style="font-size:.72rem; text-transform:uppercase; letter-spacing:.8px; color:#718096; margin-bottom:4px;">Total Amount</div>
                <strong id="modal-total-amount" style="font-size:1.05rem; color:#0f3460;"></strong>
              </div>
            </div>
          </div>

          {{-- Customer Info --}}
          <div id="modal-customer-info" class="mb-4 p-3 rounded" style="background:#fff; box-shadow:0 2px 8px rgba(0,0,0,.07);">
            <h6 style="font-weight:700; color:#2d3748; border-bottom:2px solid #e94560; padding-bottom:6px; margin-bottom:12px; font-size:.9rem; text-transform:uppercase; letter-spacing:.5px;">
              <i class="fas fa-user-circle mr-1" style="color:#e94560;"></i> Customer Info
            </h6>
            <div class="row" id="modal-customer-rows"></div>
          </div>

          {{-- Items Table --}}
          <div class="rounded overflow-hidden" style="box-shadow:0 2px 8px rgba(0,0,0,.07);">
            <div class="px-3 py-2" style="background: linear-gradient(135deg,#0f3460,#e94560);">
              <h6 class="mb-0 text-white" style="font-weight:700; font-size:.9rem; text-transform:uppercase; letter-spacing:.5px;">
                <i class="fas fa-shopping-cart mr-1"></i> Ordered Items
              </h6>
            </div>
            <table class="table table-hover mb-0" style="background:#fff;">
              <thead style="background:#f1f5f9;">
                <tr>
                  <th style="font-size:.8rem; text-transform:uppercase; letter-spacing:.5px; color:#718096; border-top:none;">#</th>
                  <th style="font-size:.8rem; text-transform:uppercase; letter-spacing:.5px; color:#718096; border-top:none;">Item Name</th>
                  <th style="font-size:.8rem; text-transform:uppercase; letter-spacing:.5px; color:#718096; border-top:none;">Unit Price</th>
                  <th style="font-size:.8rem; text-transform:uppercase; letter-spacing:.5px; color:#718096; border-top:none;">Qty</th>
                  <th style="font-size:.8rem; text-transform:uppercase; letter-spacing:.5px; color:#718096; border-top:none;">Subtotal</th>
                </tr>
              </thead>
              <tbody id="modal-items-body">
              </tbody>
              <tfoot style="background:#f8fafc;">
                <tr>
                  <td colspan="4" class="text-right" style="font-weight:700; color:#2d3748; border-top:2px solid #e2e8f0;">Grand Total</td>
                  <td style="font-weight:700; color:#0f3460; font-size:1.05rem; border-top:2px solid #e2e8f0;" id="modal-grand-total"></td>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>

        {{-- Error State --}}
        <div id="modal-error" class="text-center py-5" style="display:none;">
          <i class="fas fa-exclamation-circle fa-3x text-danger mb-3"></i>
          <p class="text-muted">Failed to load order details. Please try again.</p>
        </div>

      </div>

      {{-- Modal Footer --}}
      <div class="modal-footer" style="background:#f8fafc; border-top:1px solid #e2e8f0; padding:14px 28px;">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal" style="border-radius:6px; padding:7px 20px;">
          <i class="fas fa-times mr-1"></i> Close
        </button>
      </div>
    </div>
  </div>
</div>

{{-- ─── Modal JavaScript ─── --}}
<style>
  #orderDetailModal .modal-content { animation: modalSlideIn .25s ease; }
  @keyframes modalSlideIn {
    from { transform: translateY(-20px); opacity: 0; }
    to   { transform: translateY(0);     opacity: 1; }
  }
  #modal-items-body tr { transition: background .15s; }
  #modal-items-body tr:hover { background: #f0f9ff !important; }
</style>

<script>
  const orderDetailUrl = "{{ url('order-detail') }}";

  function viewOrderDetail(orderId) {
    // Reset modal
    document.getElementById('modal-loading').style.display = 'block';
    document.getElementById('modal-meta').style.display    = 'none';
    document.getElementById('modal-error').style.display   = 'none';
    document.getElementById('modal-order-number').textContent = '';

    $('#orderDetailModal').modal('show');

    fetch(orderDetailUrl + '/' + orderId, {
      headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' }
    })
    .then(res => {
      if (!res.ok) throw new Error('Network error');
      return res.json();
    })
    .then(data => {
      const order   = data.order;
      const details = data.details;

      // Header
      document.getElementById('modal-order-number').textContent = 'Order #' + order.order_number;

      // Status badges
      const statusEl = document.getElementById('modal-order-status');
      statusEl.textContent = order.order_status;
      statusEl.className   = 'badge ' + (order.order_status === 'Completed' ? 'badge-success' :
                                          order.order_status === 'Processing' ? 'badge-warning' :
                                          order.order_status === 'Cancel'    ? 'badge-danger'  : 'badge-info');

      const payEl = document.getElementById('modal-payment-status');
      payEl.textContent = order.payment_status;
      payEl.className   = 'badge ' + (order.payment_status === 'Paid' ? 'badge-primary' : 'badge-danger');

      // Position & amount
      document.getElementById('modal-position').textContent     = order.order_position ? order.order_position.charAt(0).toUpperCase() + order.order_position.slice(1) : '—';
      document.getElementById('modal-total-amount').textContent = order.total_amount + '/-';

      // Customer info
      const custRows = [];
      if (order.order_position === 'present') {
        if (order.order_person_name)    custRows.push(['Customer Name',  order.order_person_name]);
        if (order.order_person_mobile)  custRows.push(['Mobile',         order.order_person_mobile]);
        if (order.order_total_person)   custRows.push(['Total Persons',  order.order_total_person]);
        if (order.order_table_no)       custRows.push(['Table No.',      order.order_table_no]);
      } else {
        if (order.order_contact_name)   custRows.push(['Contact Name',   order.order_contact_name]);
        if (order.order_contact_mobile) custRows.push(['Mobile',         order.order_contact_mobile]);
        if (order.order_contact_address)custRows.push(['Address',        order.order_contact_address]);
      }
      if (order.order_payment_method)   custRows.push(['Payment Method', order.order_payment_method]);

      const custContainer = document.getElementById('modal-customer-rows');
      custContainer.innerHTML = custRows.map(([label, val]) =>
        `<div class="col-6 col-md-4 mb-2">
           <div style="font-size:.72rem;text-transform:uppercase;letter-spacing:.6px;color:#718096;">${label}</div>
           <div style="font-weight:600;color:#2d3748;font-size:.9rem;">${val}</div>
         </div>`
      ).join('');

      if (custRows.length === 0) {
        document.getElementById('modal-customer-info').style.display = 'none';
      } else {
        document.getElementById('modal-customer-info').style.display = 'block';
      }

      // Items table
      const tbody = document.getElementById('modal-items-body');
      let grandTotal = 0;

      if (details.length === 0) {
        tbody.innerHTML = '<tr><td colspan="5" class="text-center text-muted py-4">No items found for this order.</td></tr>';
      } else {
        tbody.innerHTML = details.map((item, idx) => {
          const subtotal = parseFloat(item.item_price) * parseInt(item.item_quentity);
          grandTotal += subtotal;
          return `<tr>
            <td style="color:#718096;font-size:.85rem;">${idx + 1}</td>
            <td style="font-weight:600;color:#2d3748;">${item.item_name}</td>
            <td style="color:#4a5568;">${parseFloat(item.item_price).toFixed(2)}/-</td>
            <td><span class="badge badge-secondary">&times;${item.item_quentity}</span></td>
            <td style="font-weight:700;color:#0f3460;">${subtotal.toFixed(2)}/-</td>
          </tr>`;
        }).join('');
      }

      document.getElementById('modal-grand-total').textContent = grandTotal.toFixed(2) + '/-';

      // Show content
      document.getElementById('modal-loading').style.display = 'none';
      document.getElementById('modal-meta').style.display    = 'block';
    })
    .catch(() => {
      document.getElementById('modal-loading').style.display = 'none';
      document.getElementById('modal-error').style.display   = 'block';
    });
  }
</script>

@stop