@if(isset($reportStats))
<div class="card card-outline card-success mb-4 shadow-sm" style="border-radius: 14px; overflow: hidden;">
  <div class="card-header bg-white pt-3 pb-3">
    <div class="d-flex justify-content-between align-items-center flex-wrap">
      <div>
        <h3 class="card-title font-weight-bold mb-1" style="font-size: 1.25rem; color: #1e293b;">
          <i class="fas fa-chart-line mr-2 text-success"></i> Order Count & Revenue Report
        </h3>
        <br/>
        <br/>
        <p class="text-muted mb-0" style="font-size: 0.85rem;">
          {{ Auth::user()->roles->pluck('name')[0] == 'admin' ? 'System-wide overall performance metrics & total revenue check.' : 'Your personal order metrics and total amount spent check.' }}
        </p>
      </div>
      
      <!-- Date Range Filter Form -->
      <form method="GET" action="{{ route('home') }}" class="form-inline mt-2 mt-md-0">
        <!-- Preserve other search parameters if any -->
        @if(request('search_order_no')) <input type="hidden" name="search_order_no" value="{{ request('search_order_no') }}"> @endif
        @if(request('search_order_date')) <input type="hidden" name="search_order_date" value="{{ request('search_order_date') }}"> @endif
        @if(request('search_customer')) <input type="hidden" name="search_customer" value="{{ request('search_customer') }}"> @endif

        <div class="input-group input-group-sm mr-2 mb-1">
          <div class="input-group-prepend">
            <span class="input-group-text font-weight-bold" style="background:#f8fafc;">From</span>
          </div>
          <input type="date" name="report_from_date" class="form-control" value="{{ $reportFromDate ?? '' }}">
        </div>

        <div class="input-group input-group-sm mr-2 mb-1">
          <div class="input-group-prepend">
            <span class="input-group-text font-weight-bold" style="background:#f8fafc;">To</span>
          </div>
          <input type="date" name="report_to_date" class="form-control" value="{{ $reportToDate ?? '' }}">
        </div>

        <button type="submit" class="btn btn-success btn-sm mb-1 mr-1" style="border-radius: 6px; font-weight:600;">
          <i class="fas fa-filter mr-1"></i> Check Range
        </button>
        @if($reportFromDate || $reportToDate)
          <a href="{{ route('home') }}" class="btn btn-outline-secondary btn-sm mb-1" style="border-radius: 6px;">
            <i class="fas fa-undo"></i>
          </a>
        @endif
      </form>
    </div>
  </div>

  <div class="card-body bg-light pt-4 pb-3">
    <div class="row">
      <!-- Today -->
      <div class="col-lg-4 col-md-6 mb-3">
        <div class="p-3 bg-white shadow-sm d-flex align-items-center justify-content-between" style="border-radius: 12px; border-left: 5px solid #3b82f6;">
          <div>
            <span class="text-muted text-uppercase font-weight-bold d-block mb-1" style="font-size: 0.75rem; letter-spacing:0.5px;">Today's Report</span>
            <h4 class="font-weight-bold mb-0" style="color:#1e293b;">৳ {{ number_format($reportStats['today']['money'] ?? 0, 2) }}</h4>
            <small class="text-info font-weight-bold"><i class="fas fa-shopping-bag mr-1"></i> {{ number_format($reportStats['today']['count'] ?? 0) }} Orders Today</small>
          </div>
          <div class="bg-primary text-white d-flex align-items-center justify-content-center shadow-sm" style="width: 50px; height: 50px; border-radius: 12px; font-size:1.3rem; opacity:0.9;">
            <i class="fas fa-calendar-day"></i>
          </div>
        </div>
      </div>

      <!-- Weekly -->
      <div class="col-lg-4 col-md-6 mb-3">
        <div class="p-3 bg-white shadow-sm d-flex align-items-center justify-content-between" style="border-radius: 12px; border-left: 5px solid #10b981;">
          <div>
            <span class="text-muted text-uppercase font-weight-bold d-block mb-1" style="font-size: 0.75rem; letter-spacing:0.5px;">This Week</span>
            <h4 class="font-weight-bold mb-0" style="color:#1e293b;">৳ {{ number_format($reportStats['weekly']['money'] ?? 0, 2) }}</h4>
            <small class="text-success font-weight-bold"><i class="fas fa-shopping-bag mr-1"></i> {{ number_format($reportStats['weekly']['count'] ?? 0) }} Orders This Week</small>
          </div>
          <div class="bg-success text-white d-flex align-items-center justify-content-center shadow-sm" style="width: 50px; height: 50px; border-radius: 12px; font-size:1.3rem; opacity:0.9;">
            <i class="fas fa-calendar-week"></i>
          </div>
        </div>
      </div>

      <!-- Monthly -->
      <div class="col-lg-4 col-md-6 mb-3">
        <div class="p-3 bg-white shadow-sm d-flex align-items-center justify-content-between" style="border-radius: 12px; border-left: 5px solid #f59e0b;">
          <div>
            <span class="text-muted text-uppercase font-weight-bold d-block mb-1" style="font-size: 0.75rem; letter-spacing:0.5px;">This Month</span>
            <h4 class="font-weight-bold mb-0" style="color:#1e293b;">৳ {{ number_format($reportStats['monthly']['money'] ?? 0, 2) }}</h4>
            <small class="text-warning font-weight-bold"><i class="fas fa-shopping-bag mr-1"></i> {{ number_format($reportStats['monthly']['count'] ?? 0) }} Orders This Month</small>
          </div>
          <div class="bg-warning text-white d-flex align-items-center justify-content-center shadow-sm" style="width: 50px; height: 50px; border-radius: 12px; font-size:1.3rem; opacity:0.9;">
            <i class="fas fa-calendar-alt"></i>
          </div>
        </div>
      </div>

      <!-- Yearly -->
      <div class="col-lg-4 col-md-6 mb-3">
        <div class="p-3 bg-white shadow-sm d-flex align-items-center justify-content-between" style="border-radius: 12px; border-left: 5px solid #8b5cf6;">
          <div>
            <span class="text-muted text-uppercase font-weight-bold d-block mb-1" style="font-size: 0.75rem; letter-spacing:0.5px;">This Year ({{ now()->year }})</span>
            <h4 class="font-weight-bold mb-0" style="color:#1e293b;">৳ {{ number_format($reportStats['yearly']['money'] ?? 0, 2) }}</h4>
            <small class="text-purple font-weight-bold" style="color:#8b5cf6;"><i class="fas fa-shopping-bag mr-1"></i> {{ number_format($reportStats['yearly']['count'] ?? 0) }} Orders This Year</small>
          </div>
          <div class="text-white d-flex align-items-center justify-content-center shadow-sm" style="background:#8b5cf6; width: 50px; height: 50px; border-radius: 12px; font-size:1.3rem; opacity:0.9;">
            <i class="fas fa-calendar"></i>
          </div>
        </div>
      </div>

      <!-- Custom Range Check -->
      <div class="col-lg-4 col-md-6 mb-3">
        <div class="p-3 bg-white shadow-sm d-flex align-items-center justify-content-between" style="border-radius: 12px; border-left: 5px solid #ec4899;">
          <div>
            <span class="text-muted text-uppercase font-weight-bold d-block mb-1" style="font-size: 0.75rem; letter-spacing:0.5px;">
              Range Check @if($reportFromDate || $reportToDate) ({{ $reportFromDate ?: 'Start' }} → {{ $reportToDate ?: 'Now' }}) @else (Select Range) @endif
            </span>
            <h4 class="font-weight-bold mb-0" style="color:#1e293b;">৳ {{ number_format($reportStats['custom']['money'] ?? 0, 2) }}</h4>
            <small class="font-weight-bold" style="color:#ec4899;"><i class="fas fa-shopping-bag mr-1"></i> {{ number_format($reportStats['custom']['count'] ?? 0) }} Orders Found</small>
          </div>
          <div class="text-white d-flex align-items-center justify-content-center shadow-sm" style="background:#ec4899; width: 50px; height: 50px; border-radius: 12px; font-size:1.3rem; opacity:0.9;">
            <i class="fas fa-filter"></i>
          </div>
        </div>
      </div>

      <!-- All Time (To Date) -->
      <div class="col-lg-4 col-md-6 mb-3">
        <div class="p-3 bg-white shadow-sm d-flex align-items-center justify-content-between" style="border-radius: 12px; border-left: 5px solid #64748b;">
          <div>
            <span class="text-muted text-uppercase font-weight-bold d-block mb-1" style="font-size: 0.75rem; letter-spacing:0.5px;">All Time (To Date)</span>
            <h4 class="font-weight-bold mb-0" style="color:#1e293b;">৳ {{ number_format($reportStats['all_time']['money'] ?? 0, 2) }}</h4>
            <small class="text-secondary font-weight-bold"><i class="fas fa-shopping-bag mr-1"></i> {{ number_format($reportStats['all_time']['count'] ?? 0) }} Total Orders</small>
          </div>
          <div class="bg-secondary text-white d-flex align-items-center justify-content-center shadow-sm" style="width: 50px; height: 50px; border-radius: 12px; font-size:1.3rem; opacity:0.9;">
            <i class="fas fa-database"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endif
