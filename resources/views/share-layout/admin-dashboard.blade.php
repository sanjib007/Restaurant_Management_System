<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background-color: #f8fafc; min-height: 100vh;">
  <!-- Custom Modern Dashboard Styles -->
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');
    
    .content-wrapper {
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    }
    
    /* Hero Welcome Banner */
    .admin-hero-card {
      background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #334155 100%);
      border-radius: 20px;
      padding: 28px 32px;
      color: #ffffff;
      box-shadow: 0 15px 35px -5px rgba(15, 23, 42, 0.25);
      position: relative;
      overflow: hidden;
      margin-bottom: 28px;
    }
    .admin-hero-card::after {
      content: '';
      position: absolute;
      top: -50%;
      right: -10%;
      width: 350px;
      height: 350px;
      background: radial-gradient(circle, rgba(59,130,246,0.18) 0%, rgba(255,255,255,0) 70%);
      border-radius: 50%;
      pointer-events: none;
    }

    /* Modern KPI Cards */
    .kpi-card {
      background: #ffffff;
      border-radius: 16px;
      padding: 22px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
      border: 1px solid #f1f5f9;
      transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      height: 100%;
      position: relative;
      overflow: hidden;
    }
    .kpi-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
    }
    .kpi-icon-wrapper {
      width: 52px;
      height: 52px;
      border-radius: 14px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.45rem;
    }
    .kpi-value {
      font-size: 1.85rem;
      font-weight: 800;
      color: #0f172a;
      line-height: 1.2;
      margin-top: 14px;
    }
    .kpi-label {
      font-size: 0.82rem;
      font-weight: 600;
      color: #64748b;
      text-transform: uppercase;
      letter-spacing: 0.6px;
      margin-top: 4px;
    }
    .kpi-footer-link {
      font-size: 0.8rem;
      font-weight: 600;
      color: #3b82f6;
      text-decoration: none;
      display: flex;
      align-items: center;
      margin-top: 18px;
      padding-top: 12px;
      border-top: 1px solid #f8fafc;
    }
    .kpi-footer-link:hover {
      color: #1d4ed8;
      text-decoration: none;
    }

    /* Modern Table & Card Styling */
    .dashboard-panel {
      background: #ffffff;
      border-radius: 16px;
      border: 1px solid #f1f5f9;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
      overflow: hidden;
      margin-bottom: 24px;
    }
    .dashboard-panel-header {
      padding: 20px 24px;
      background: #ffffff;
      border-bottom: 1px solid #f1f5f9;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .dashboard-panel-title {
      font-size: 1.1rem;
      font-weight: 700;
      color: #0f172a;
      margin: 0;
      display: flex;
      align-items: center;
    }
    .table-custom th {
      background: #f8fafc;
      color: #64748b;
      font-size: 0.75rem;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.6px;
      border-top: none !important;
      border-bottom: 1px solid #e2e8f0 !important;
      padding: 14px 18px;
    }
    .table-custom td {
      padding: 16px 18px;
      vertical-align: middle;
      border-bottom: 1px solid #f1f5f9;
      color: #334155;
      font-size: 0.9rem;
    }
    .table-custom tr:hover td {
      background-color: #f8fafc;
    }

    /* Status Badges */
    .status-badge {
      padding: 5px 12px;
      border-radius: 20px;
      font-size: 0.76rem;
      font-weight: 700;
      display: inline-flex;
      align-items: center;
    }
    .badge-soft-success { background: #dcfce7; color: #166534; }
    .badge-soft-warning { background: #fef9c3; color: #854d0e; }
    .badge-soft-danger  { background: #fee2e2; color: #991b1b; }
    .badge-soft-info    { background: #e0f2fe; color: #075985; }
  </style>

  <!-- Main content -->
  <section class="content pt-4">
    <div class="container-fluid">
      
      <!-- 1. Premium Hero Welcome Banner -->
      <div class="admin-hero-card d-flex flex-column flex-md-row justify-content-between align-items-md-center">
        <div>
          <span class="badge badge-primary px-3 py-1 mb-2" style="background: rgba(59,130,246,0.25); border: 1px solid rgba(59,130,246,0.4); border-radius: 20px; font-weight: 600; font-size: 0.75rem; letter-spacing: 0.5px;">
            <i class="fas fa-shield-alt mr-1"></i> ADMIN CONTROL CENTER
          </span>
          <h1 class="mb-1 font-weight-bold" style="font-size: 1.8rem; letter-spacing: -0.5px;">Restaurant Overview Dashboard</h1>
          <p class="mb-0 text-light" style="opacity: 0.8; font-size: 0.92rem;">
            <i class="far fa-clock mr-1"></i> {{ now()->format('l, F j, Y') }} — Live order monitoring & revenue analytics.
          </p>
        </div>
        <div class="mt-3 mt-md-0 d-flex flex-wrap align-items-center" style="gap: 12px; z-index: 2;">
          <a href="{{ route('order.cancelRequests') }}" class="btn btn-danger btn-sm px-3 py-2 shadow-sm d-flex align-items-center" style="border-radius: 10px; font-weight: 600;">
            <i class="fas fa-exclamation-triangle mr-2"></i> Cancel Requests
            @if(($pendingCancelCount ?? 0) > 0)
              <span class="badge badge-light ml-2 px-2 py-1" style="color: #dc2626; font-weight:800;">{{ $pendingCancelCount }}</span>
            @else
              <span class="badge badge-light ml-2 px-2 py-1" style="color: #dc2626;">0</span>
            @endif
          </a>
          <a href="{{ route('order') }}" class="btn btn-light btn-sm px-3 py-2 shadow-sm d-flex align-items-center" style="border-radius: 10px; font-weight: 600; color: #0f172a;">
            <i class="fas fa-list-alt mr-2 text-primary"></i> All Orders
          </a>
        </div>
      </div>

      <!-- 2. Live Order KPI Pipeline Stats (4 Cards) -->
      <div class="row mb-4">
        <!-- New Orders -->
        <div class="col-xl-3 col-sm-6 mb-3 mb-xl-0">
          <div class="kpi-card" style="border-top: 4px solid #3b82f6;">
            <div class="d-flex justify-content-between align-items-start">
              <div>
                <div class="kpi-label">New Orders</div>
                <div class="kpi-value">{{ number_format($newOrdersCount ?? 0) }}</div>
              </div>
              <div class="kpi-icon-wrapper" style="background: rgba(59, 130, 246, 0.12); color: #2563eb;">
                <i class="fas fa-cart-plus"></i>
              </div>
            </div>
            <a href="{{ route('order') }}" class="kpi-footer-link">
              <span>Inspect incoming orders</span>
              <i class="fas fa-arrow-right ml-auto"></i>
            </a>
          </div>
        </div>

        <!-- Processing Orders -->
        <div class="col-xl-3 col-sm-6 mb-3 mb-xl-0">
          <div class="kpi-card" style="border-top: 4px solid #10b981;">
            <div class="d-flex justify-content-between align-items-start">
              <div>
                <div class="kpi-label">Kitchen Processing</div>
                <div class="kpi-value">{{ number_format($processingOrdersCount ?? 0) }}</div>
              </div>
              <div class="kpi-icon-wrapper" style="background: rgba(16, 185, 129, 0.12); color: #059669;">
                <i class="fas fa-utensils"></i>
              </div>
            </div>
            <a href="{{ route('order') }}" class="kpi-footer-link" style="color: #10b981;">
              <span>Track active kitchen orders</span>
              <i class="fas fa-arrow-right ml-auto"></i>
            </a>
          </div>
        </div>

        <!-- Takeaway Orders -->
        <div class="col-xl-3 col-sm-6 mb-3 mb-xl-0">
          <div class="kpi-card" style="border-top: 4px solid #f59e0b;">
            <div class="d-flex justify-content-between align-items-start">
              <div>
                <div class="kpi-label">Takeaway Orders</div>
                <div class="kpi-value">{{ number_format($takeawayOrdersCount ?? 0) }}</div>
              </div>
              <div class="kpi-icon-wrapper" style="background: rgba(245, 158, 11, 0.12); color: #d97706;">
                <i class="fas fa-shopping-bag"></i>
              </div>
            </div>
            <a href="{{ route('order') }}" class="kpi-footer-link" style="color: #f59e0b;">
              <span>Manage takeaway packages</span>
              <i class="fas fa-arrow-right ml-auto"></i>
            </a>
          </div>
        </div>

        <!-- Present Customer -->
        <div class="col-xl-3 col-sm-6 mb-3 mb-xl-0">
          <div class="kpi-card" style="border-top: 4px solid #ec4899;">
            <div class="d-flex justify-content-between align-items-start">
              <div>
                <div class="kpi-label">Dine-In Customers</div>
                <div class="kpi-value">{{ number_format($presentCustomerOrdersCount ?? 0) }}</div>
              </div>
              <div class="kpi-icon-wrapper" style="background: rgba(236, 72, 153, 0.12); color: #db2777;">
                <i class="fas fa-chair"></i>
              </div>
            </div>
            <a href="{{ route('order') }}" class="kpi-footer-link" style="color: #ec4899;">
              <span>View occupied tables</span>
              <i class="fas fa-arrow-right ml-auto"></i>
            </a>
          </div>
        </div>
      </div>

      <!-- 3. Order & Financial Revenue Summary Report -->
      @include('share-layout.order-financial-report')

      <!-- 4. Search Filter Panel -->
      <div class="dashboard-panel mb-4">
        <div class="dashboard-panel-header bg-light">
          <h3 class="dashboard-panel-title">
            <i class="fas fa-filter mr-2 text-primary"></i> Filter & Search Customer Orders
          </h3>
          <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="collapse" data-target="#collapseSearchPanel" aria-expanded="true" style="border-radius: 8px;">
            <i class="fas fa-sliders-h mr-1"></i> Toggle Filters
          </button>
        </div>
        <div class="collapse show" id="collapseSearchPanel">
          <div class="p-4">
            <form method="GET" action="{{ route('home') }}" id="order-search-form">
              <div class="row align-items-end">
                <div class="col-lg-3 col-md-6 mb-3">
                  <label class="mb-1 text-muted font-weight-bold" style="font-size: 0.78rem; text-transform: uppercase;">Order Number</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-white border-right-0"><i class="fas fa-hashtag text-muted"></i></span>
                    </div>
                    <input type="text" name="search_order_no" class="form-control border-left-0" placeholder="e.g. ORD-12345" value="{{ $searchOrderNo ?? '' }}" style="border-radius: 0 8px 8px 0;">
                  </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-3">
                  <label class="mb-1 text-muted font-weight-bold" style="font-size: 0.78rem; text-transform: uppercase;">Order Date</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-white border-right-0"><i class="far fa-calendar-alt text-muted"></i></span>
                    </div>
                    <input type="date" name="search_order_date" class="form-control border-left-0" value="{{ $searchOrderDate ?? '' }}" style="border-radius: 0 8px 8px 0;">
                  </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-3">
                  <label class="mb-1 text-muted font-weight-bold" style="font-size: 0.78rem; text-transform: uppercase;">Customer Name / Email</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-white border-right-0"><i class="far fa-user text-muted"></i></span>
                    </div>
                    <input type="text" name="search_customer" class="form-control border-left-0" placeholder="Search customer…" value="{{ $searchCustomer ?? '' }}" style="border-radius: 0 8px 8px 0;">
                  </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-3 d-flex" style="gap: 8px;">
                  <button type="submit" class="btn btn-primary flex-fill font-weight-bold shadow-sm" style="border-radius: 8px; padding: 10px;">
                    <i class="fas fa-search mr-1"></i> Search
                  </button>
                  <a href="{{ route('home') }}" class="btn btn-outline-secondary flex-fill font-weight-bold d-flex align-items-center justify-content-center" style="border-radius: 8px; padding: 10px;">
                    <i class="fas fa-undo mr-1"></i> Reset
                  </a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- 5. Customer Order List Table Panel -->
      <div class="dashboard-panel">
        <div class="dashboard-panel-header">
          <h3 class="dashboard-panel-title">
            <i class="fas fa-receipt mr-2 text-primary"></i> Live Order Activity Stream
          </h3>
          <span class="badge badge-primary px-3 py-2" style="border-radius: 20px; font-size:0.8rem;">
            Total Records: {{ $orderHistory ? $orderHistory->total() : 0 }}
          </span>
        </div>

        <div class="p-0">
          @if($orderHistory != null && $orderHistory->count() > 0)
          <div class="table-responsive">
            <table class="table table-custom mb-0">
              <thead>
                <tr>
                  <th>Customer Info</th>
                  <th>Order Details</th>
                  <th>Dining Type</th>
                  <th>Order Status</th>
                  <th>Payment</th>
                  <th>Total Amount</th>
                  <th class="text-right">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($orderHistory as $aOrder)
                <tr>
                  <!-- Customer Info -->
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="bg-primary text-white font-weight-bold rounded-circle d-flex align-items-center justify-content-center mr-3 shadow-sm" style="width: 42px; height: 42px; font-size: 1rem; flex-shrink: 0;">
                        {{ substr($aOrder->user?->name ?? 'C', 0, 1) }}
                      </div>
                      <div>
                        <div class="font-weight-bold text-dark" style="font-size: 0.95rem;">{{ $aOrder->user?->name ?? 'Guest User' }}</div>
                        <div class="text-muted" style="font-size: 0.78rem;"><i class="far fa-envelope mr-1"></i>{{ $aOrder->user?->email ?? 'N/A' }}</div>
                        <span class="badge badge-light border text-muted mt-1" style="font-size: 0.7rem;">ID: #{{ $aOrder->user_id }}</span>
                      </div>
                    </div>
                  </td>

                  <!-- Order Details -->
                  <td>
                    <div class="font-weight-bold text-primary mb-1" style="font-size: 0.92rem;">
                      <code>{{ $aOrder->order_number }}</code>
                    </div>
                    <div class="text-muted" style="font-size: 0.78rem;">
                      <i class="far fa-clock mr-1"></i>{{ $aOrder->created_at->format('d M Y, h:i A') }}
                    </div>
                    <span class="badge badge-secondary mt-1" style="font-size: 0.72rem; border-radius: 12px;">
                      <i class="fas fa-box-open mr-1"></i>{{ $aOrder->total_item }} Items
                    </span>
                  </td>

                  <!-- Dining Type -->
                  <td>
                    @if(strtolower($aOrder->order_position) == 'present')
                      <span class="badge badge-soft-info px-3 py-2" style="border-radius: 12px; font-weight:600;">
                        <i class="fas fa-chair mr-1"></i> Dine-In Table
                      </span>
                    @else
                      <span class="badge badge-soft-warning px-3 py-2" style="border-radius: 12px; font-weight:600;">
                        <i class="fas fa-shopping-bag mr-1"></i> Takeaway
                      </span>
                    @endif
                  </td>

                  <!-- Order Status -->
                  <td>
                    @php
                      $statusClass = match(strtolower($aOrder->order_status ?? '')) {
                        'completed'  => 'badge-soft-success',
                        'processing' => 'badge-soft-warning',
                        'cancel'     => 'badge-soft-danger',
                        default      => 'badge-soft-info'
                      };
                      $statusIcon = match(strtolower($aOrder->order_status ?? '')) {
                        'completed'  => 'fas fa-check-circle',
                        'processing' => 'fas fa-spinner fa-spin',
                        'cancel'     => 'fas fa-times-circle',
                        default      => 'fas fa-info-circle'
                      };
                    @endphp
                    <span class="status-badge {{ $statusClass }}">
                      <i class="{{ $statusIcon }} mr-1"></i> {{ ucfirst($aOrder->order_status) }}
                    </span>
                  </td>

                  <!-- Payment -->
                  <td>
                    @php
                      $method = $aOrder->order_payment_method;
                      $methodLabel = match(strtolower($method ?? '')) {
                        'cashondelivery' => 'Cash on Delivery',
                        'bkash'          => 'Bkash',
                        'nogod'          => 'Nogod',
                        'card'           => 'Card',
                        default          => ucfirst($method ?? '—'),
                      };
                      $methodIcon = match(strtolower($method ?? '')) {
                        'cashondelivery' => 'fas fa-money-bill-wave',
                        'bkash'          => 'fas fa-mobile-alt',
                        'nogod'          => 'fas fa-mobile-alt',
                        'card'           => 'fas fa-credit-card',
                        default          => 'fas fa-wallet',
                      };
                    @endphp
                    <div class="mb-1">
                      <span class="badge badge-light border text-dark" style="font-size: 0.75rem;">
                        <i class="{{ $methodIcon }} mr-1 text-primary"></i> {{ $methodLabel }}
                      </span>
                    </div>
                    <div>
                      <span class="status-badge {{ $aOrder->payment_status == 'Paid' ? 'badge-soft-success' : 'badge-soft-danger' }}" style="padding: 3px 10px;">
                        {{ $aOrder->payment_status }}
                      </span>
                    </div>
                  </td>

                  <!-- Total Amount -->
                  <td>
                    <div class="font-weight-bold text-dark" style="font-size: 1.05rem;">
                      ৳ {{ number_format($aOrder->total_amount, 2) }}
                    </div>
                  </td>

                  <!-- Actions -->
                  <td class="text-right">
                    <button onclick="viewOrderDetail({{ $aOrder->id }})" class="btn btn-primary btn-sm px-3 shadow-sm font-weight-bold mb-1" style="border-radius: 8px;">
                      <i class="fas fa-eye mr-1"></i> View
                    </button>
                    @if($aOrder->cancelRequest && $aOrder->cancelRequest->status == 'Pending')
                      <a href="{{ route('order.cancelRequests') }}" class="btn btn-outline-danger btn-sm d-block mt-1 font-weight-bold" style="border-radius: 8px; font-size: 0.72rem;">
                        <i class="fas fa-exclamation-circle mr-1"></i> Req Cancel
                      </a>
                    @endif
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="p-3 border-top d-flex justify-content-end">
            {{ $orderHistory->links() }}
          </div>
          @else
          <div class="text-center py-5">
            <div class="mb-3">
              <i class="fas fa-clipboard-list fa-3x text-muted" style="opacity: 0.4;"></i>
            </div>
            <h5 class="font-weight-bold text-dark">No Orders Found</h5>
            <p class="text-muted mb-0">No customer orders match your search filters or none have been placed yet.</p>
          </div>
          @endif
        </div>
      </div>

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

{{-- ═══════════════════ ORDER DETAIL MODAL ═══════════════════ --}}
<div class="modal fade" id="orderDetailModal" tabindex="-1" role="dialog" aria-labelledby="orderDetailModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content" style="border-radius:12px;border:none;overflow:hidden;box-shadow:0 20px 60px rgba(0,0,0,.25);">
      <div class="modal-header text-white" style="background:linear-gradient(135deg,#1a1a2e 0%,#16213e 50%,#0f3460 100%);border-bottom:none;padding:20px 28px;">
        <div>
          <h5 class="modal-title mb-1" id="orderDetailModalLabel" style="font-size:1.2rem;font-weight:700;letter-spacing:.5px;">
            <i class="fas fa-receipt mr-2" style="color:#e94560;"></i> Order Detail
          </h5>
          <small id="modal-order-number" style="color:#a0aec0;font-size:.82rem;"></small>
        </div>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close" style="opacity:.7;">
          <span aria-hidden="true" style="font-size:1.4rem;">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="padding:24px 28px;background:#f8fafc;">
        <div id="modal-loading" class="text-center py-5" style="display:none;">
          <div class="spinner-border text-primary" role="status" style="width:3rem;height:3rem;"><span class="sr-only">Loading...</span></div>
          <p class="mt-3 text-muted">Fetching order details…</p>
        </div>
        <div id="modal-meta" style="display:none;">
          <div class="row mb-4">
            <div class="col-6 col-md-3 mb-3">
              <div class="p-3 text-center rounded" style="background:#fff;box-shadow:0 2px 8px rgba(0,0,0,.07);">
                <div style="font-size:.72rem;text-transform:uppercase;letter-spacing:.8px;color:#718096;margin-bottom:4px;">Status</div>
                <span id="modal-order-status" class="badge" style="font-size:.85rem;padding:5px 12px;"></span>
              </div>
            </div>
            <div class="col-6 col-md-3 mb-3">
              <div class="p-3 text-center rounded" style="background:#fff;box-shadow:0 2px 8px rgba(0,0,0,.07);">
                <div style="font-size:.72rem;text-transform:uppercase;letter-spacing:.8px;color:#718096;margin-bottom:4px;">Payment</div>
                <span id="modal-payment-status" class="badge" style="font-size:.85rem;padding:5px 12px;"></span>
              </div>
            </div>
            <div class="col-6 col-md-3 mb-3">
              <div class="p-3 text-center rounded" style="background:#fff;box-shadow:0 2px 8px rgba(0,0,0,.07);">
                <div style="font-size:.72rem;text-transform:uppercase;letter-spacing:.8px;color:#718096;margin-bottom:4px;">Position</div>
                <strong id="modal-position" style="font-size:.95rem;"></strong>
              </div>
            </div>
            <div class="col-6 col-md-3 mb-3">
              <div class="p-3 text-center rounded" style="background:#fff;box-shadow:0 2px 8px rgba(0,0,0,.07);">
                <div style="font-size:.72rem;text-transform:uppercase;letter-spacing:.8px;color:#718096;margin-bottom:4px;">Total Amount</div>
                <strong id="modal-total-amount" style="font-size:1.05rem;color:#0f3460;"></strong>
              </div>
            </div>
          </div>
          <div id="modal-customer-info" class="mb-4 p-3 rounded" style="background:#fff;box-shadow:0 2px 8px rgba(0,0,0,.07);">
            <h6 style="font-weight:700;color:#2d3748;border-bottom:2px solid #e94560;padding-bottom:6px;margin-bottom:12px;font-size:.9rem;text-transform:uppercase;letter-spacing:.5px;">
              <i class="fas fa-user-circle mr-1" style="color:#e94560;"></i> Customer Info
            </h6>
            <div class="row" id="modal-customer-rows"></div>
          </div>
          <div class="rounded overflow-hidden" style="box-shadow:0 2px 8px rgba(0,0,0,.07);">
            <div class="px-3 py-2" style="background:linear-gradient(135deg,#0f3460,#e94560);">
              <h6 class="mb-0 text-white" style="font-weight:700;font-size:.9rem;text-transform:uppercase;letter-spacing:.5px;">
                <i class="fas fa-shopping-cart mr-1"></i> Ordered Items
              </h6>
            </div>
            <table class="table table-hover mb-0" style="background:#fff;">
              <thead style="background:#f1f5f9;">
                <tr>
                  <th style="font-size:.8rem;text-transform:uppercase;letter-spacing:.5px;color:#718096;border-top:none;">#</th>
                  <th style="font-size:.8rem;text-transform:uppercase;letter-spacing:.5px;color:#718096;border-top:none;">Item Name</th>
                  <th style="font-size:.8rem;text-transform:uppercase;letter-spacing:.5px;color:#718096;border-top:none;">Unit Price</th>
                  <th style="font-size:.8rem;text-transform:uppercase;letter-spacing:.5px;color:#718096;border-top:none;">Qty</th>
                  <th style="font-size:.8rem;text-transform:uppercase;letter-spacing:.5px;color:#718096;border-top:none;">Subtotal</th>
                </tr>
              </thead>
              <tbody id="modal-items-body"></tbody>
              <tfoot style="background:#f8fafc;">
                <tr>
                  <td colspan="4" class="text-right" style="font-weight:700;color:#2d3748;border-top:2px solid #e2e8f0;">Grand Total</td>
                  <td style="font-weight:700;color:#0f3460;font-size:1.05rem;border-top:2px solid #e2e8f0;" id="modal-grand-total"></td>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
        <div id="modal-error" class="text-center py-5" style="display:none;">
          <i class="fas fa-exclamation-circle fa-3x text-danger mb-3"></i>
          <p class="text-muted">Failed to load order details. Please try again.</p>
        </div>
      </div>
      <div class="modal-footer" style="background:#f8fafc;border-top:1px solid #e2e8f0;padding:14px 28px;">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal" style="border-radius:6px;padding:7px 20px;">
          <i class="fas fa-times mr-1"></i> Close
        </button>
      </div>
    </div>
  </div>
</div>

<style>
  #orderDetailModal .modal-content { animation: modalSlideIn .25s ease; }
  @keyframes modalSlideIn { from{transform:translateY(-20px);opacity:0;} to{transform:translateY(0);opacity:1;} }
  #modal-items-body tr { transition: background .15s; }
  #modal-items-body tr:hover { background: #f0f9ff !important; }
</style>

<script>
  const orderDetailUrl = "{{ url('order-detail') }}";
  function viewOrderDetail(orderId) {
    document.getElementById('modal-loading').style.display = 'block';
    document.getElementById('modal-meta').style.display    = 'none';
    document.getElementById('modal-error').style.display   = 'none';
    document.getElementById('modal-order-number').textContent = '';
    $('#orderDetailModal').modal('show');
    fetch(orderDetailUrl + '/' + orderId, { headers:{'Accept':'application/json','X-Requested-With':'XMLHttpRequest'} })
    .then(res => { if(!res.ok) throw new Error(); return res.json(); })
    .then(data => {
      const order = data.order, details = data.details;
      document.getElementById('modal-order-number').textContent = 'Order #' + order.order_number;
      const statusEl = document.getElementById('modal-order-status');
      statusEl.textContent = order.order_status;
      statusEl.className = 'badge ' + (order.order_status==='Completed'?'badge-success':order.order_status==='Processing'?'badge-warning':order.order_status==='Cancel'?'badge-danger':'badge-info');
      const payEl = document.getElementById('modal-payment-status');
      payEl.textContent = order.payment_status;
      payEl.className = 'badge ' + (order.payment_status==='Paid'?'badge-primary':'badge-danger');
      document.getElementById('modal-position').textContent = order.order_position ? order.order_position.charAt(0).toUpperCase()+order.order_position.slice(1) : '—';
      document.getElementById('modal-total-amount').textContent = order.total_amount + '/-';
      const custRows = [];
      if(order.order_position==='present'){
        if(order.order_person_name)   custRows.push(['Customer Name', order.order_person_name]);
        if(order.order_person_mobile) custRows.push(['Mobile', order.order_person_mobile]);
        if(order.order_total_person)  custRows.push(['Total Persons', order.order_total_person]);
        if(order.order_table_no)      custRows.push(['Table No.', order.order_table_no]);
      } else {
        if(order.order_contact_name)    custRows.push(['Contact Name', order.order_contact_name]);
        if(order.order_contact_mobile)  custRows.push(['Mobile', order.order_contact_mobile]);
        if(order.order_contact_address) custRows.push(['Address', order.order_contact_address]);
      }
      if(order.order_payment_method) custRows.push(['Payment Method', order.order_payment_method]);
      const custContainer = document.getElementById('modal-customer-rows');
      custContainer.innerHTML = custRows.map(([l,v])=>`<div class="col-6 col-md-4 mb-2"><div style="font-size:.72rem;text-transform:uppercase;letter-spacing:.6px;color:#718096;">${l}</div><div style="font-weight:600;color:#2d3748;font-size:.9rem;">${v}</div></div>`).join('');
      document.getElementById('modal-customer-info').style.display = custRows.length ? 'block' : 'none';
      const tbody = document.getElementById('modal-items-body');
      let grandTotal = 0;
      if(!details.length){ tbody.innerHTML='<tr><td colspan="5" class="text-center text-muted py-4">No items found for this order.</td></tr>'; }
      else { tbody.innerHTML = details.map((item,idx)=>{ const sub=parseFloat(item.item_price)*parseInt(item.item_quentity); grandTotal+=sub; return `<tr><td style="color:#718096;font-size:.85rem;">${idx+1}</td><td style="font-weight:600;color:#2d3748;">${item.item_name}</td><td style="color:#4a5568;">${parseFloat(item.item_price).toFixed(2)}/-</td><td><span class="badge badge-secondary">&times;${item.item_quentity}</span></td><td style="font-weight:700;color:#0f3460;">${sub.toFixed(2)}/-</td></tr>`; }).join(''); }
      document.getElementById('modal-grand-total').textContent = grandTotal.toFixed(2) + '/-';
      document.getElementById('modal-loading').style.display = 'none';
      document.getElementById('modal-meta').style.display    = 'block';
    })
    .catch(()=>{ document.getElementById('modal-loading').style.display='none'; document.getElementById('modal-error').style.display='block'; });
  }
</script>