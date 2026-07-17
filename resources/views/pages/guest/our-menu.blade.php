@extends('main-layout.guest')

@section('guestContent')
<style>
  .about {
    color: #17a2b8;
    font-size: 1.1rem;
    font-weight: 700;
  }

  .menu-header {
    margin-bottom: 1.75rem;
  }

  .menu-header h1 {
    font-size: 2.6rem;
    margin-bottom: 0.35rem;
    font-weight: 700;
  }

  .menu-header p {
    color: #6c757d;
    font-size: 1rem;
    max-width: 700px;
    margin: 0 auto;
  }

  .menu-tabs {
    margin-bottom: 2rem;
  }

  .nav-pills .nav-link {
    border-radius: 50px;
    padding: 0.8rem 1.4rem;
    font-weight: 600;
    color: #495057;
    border: 1px solid transparent;
  }

  .nav-pills .nav-link.active {
    background-color: #17a2b8;
    color: #ffffff;
    box-shadow: 0 10px 25px rgba(23, 162, 184, 0.18);
  }

  .menu-card {
    border: 1px solid #e9ecef;
    border-radius: 18px;
    overflow: hidden;
    transition: transform 0.25s ease, box-shadow 0.25s ease;
    background-color: #ffffff;
  }

  .menu-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 18px 50px rgba(0, 0, 0, 0.08);
  }

  .menu-card-img {
    width: 100%;
    height: 220px;
    object-fit: cover;
  }

  .menu-card-body {
    padding: 1.25rem;
  }

  .menu-card-body h5 {
    font-size: 1.25rem;
    margin-bottom: 0.5rem;
    font-weight: 700;
  }

  .menu-card-body p {
    margin-bottom: 0.65rem;
  }

  .menu-card-body .ellipsis {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
    min-height: 4.6rem;
    color: #6c757d;
  }

  .menu-card-footer {
    padding: 1rem 1.25rem 1.25rem;
  }

  .menu-buttons {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 0.75rem;
  }

  .menu-action-btn {
    min-height: 44px;
    border-radius: 10px;
    font-weight: 600;
    transition: all 0.2s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
  }

  .menu-action-btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 10px 20px rgba(23, 162, 184, 0.15);
  }

  .menu-buttons .btn {
    width: 100%;
  }

  .menu-buttons .btn i {
    margin-right: 0.35rem;
  }

  .btn-outline-info {
    color: #17a2b8;
    background-color: #ffffff;
    border-color: #17a2b8;
  }

  .btn-outline-info:hover {
    color: #ffffff;
    background-color: #17a2b8;
    border-color: #17a2b8;
  }

  .tab-pane {
    padding-top: 1rem;
  }
</style>
<div class="container mt-5">

  <div class="menu-header text-center">
    <h1>Our Menu</h1>
    <p>Explore our hand-picked dishes, beautifully presented with full ingredient details and easy ordering.</p>
  </div>

  {{-- ─── Search & Filter Section ─── --}}
  <div class="card mb-4" style="border-radius: 16px; border: 1px solid #e9ecef; box-shadow: 0 8px 30px rgba(0,0,0,0.05); background: #ffffff;">
    <div class="card-body p-4">
      <form method="GET" action="{{ route('our.menu') }}">
        <div class="row align-items-end">
          <div class="col-lg-4 col-md-6 mb-3 mb-lg-0">
            <label class="font-weight-bold mb-1" style="font-size:.82rem;text-transform:uppercase;letter-spacing:.5px;color:#495057;">Search Dish / Item</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text bg-light border-right-0" style="border-radius:10px 0 0 10px;"><i class="fas fa-search text-muted"></i></span>
              </div>
              <input type="text" name="search_name" class="form-control bg-light border-left-0" style="border-radius:0 10px 10px 0;" placeholder="Search by name..." value="{{ $searchName ?? '' }}">
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-3 mb-lg-0">
            <label class="font-weight-bold mb-1" style="font-size:.82rem;text-transform:uppercase;letter-spacing:.5px;color:#495057;">Price Range (৳)</label>
            <div class="d-flex align-items-center">
              <input type="number" step="any" name="min_price" class="form-control bg-light text-center" style="border-radius:10px;" placeholder="Min" value="{{ $minPrice ?? '' }}">
              <span class="mx-2 text-muted font-weight-bold">—</span>
              <input type="number" step="any" name="max_price" class="form-control bg-light text-center" style="border-radius:10px;" placeholder="Max" value="{{ $maxPrice ?? '' }}">
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-3 mb-lg-0">
            <label class="font-weight-bold mb-1" style="font-size:.82rem;text-transform:uppercase;letter-spacing:.5px;color:#495057;">Sort By</label>
            <select name="sort_by" class="form-control bg-light" style="border-radius:10px;">
              <option value="id_desc" {{ ($sortBy ?? '') == 'id_desc' ? 'selected' : '' }}>Default Sorting</option>
              <option value="name_asc" {{ ($sortBy ?? '') == 'name_asc' ? 'selected' : '' }}>Name (A to Z)</option>
              <option value="name_desc" {{ ($sortBy ?? '') == 'name_desc' ? 'selected' : '' }}>Name (Z to A)</option>
              <option value="price_asc" {{ ($sortBy ?? '') == 'price_asc' ? 'selected' : '' }}>Price (Low to High)</option>
              <option value="price_desc" {{ ($sortBy ?? '') == 'price_desc' ? 'selected' : '' }}>Price (High to Low)</option>
            </select>
          </div>
          <div class="col-lg-2 col-md-6 d-flex" style="gap:8px;">
            <button type="submit" class="btn btn-info flex-fill" style="border-radius:10px;font-weight:600;min-height:42px;">
              <i class="fas fa-filter mr-1"></i> Filter
            </button>
            <a href="{{ route('our.menu') }}" class="btn btn-outline-secondary d-flex align-items-center justify-content-center" style="border-radius:10px;width:42px;min-height:42px;" title="Reset Filters">
              <i class="fas fa-redo"></i>
            </a>
          </div>
        </div>
      </form>
    </div>
  </div>

  <div class="menu-tabs">
    <ul class="nav nav-pills justify-content-center" id="menuTab" role="tablist">
      <li class="nav-item" role="presentation">
        <a class="nav-link active" id="tab-all" data-toggle="pill" href="#pane-all" role="tab" aria-controls="pane-all" aria-selected="true">All</a>
      </li>
      @foreach ($categories as $aCat)
      <li class="nav-item" role="presentation">
        <a class="nav-link" id="tab-category-{{ $aCat->id }}" data-toggle="pill" href="#pane-category-{{ $aCat->id }}" role="tab" aria-controls="pane-category-{{ $aCat->id }}" aria-selected="false">{{ $aCat->category_name }}</a>
      </li>
      @endforeach
    </ul>
  </div>

  <div class="tab-content" id="menuTabContent">
    <div class="tab-pane fade show active" id="pane-all" role="tabpanel" aria-labelledby="tab-all">
      <div class="row">
        @php $totalItemsCount = 0; @endphp
        @foreach ($categories as $aCat)
          @foreach ($aCat->items as $aItem)
          @php $totalItemsCount++; @endphp
          <div class="col-12 col-sm-6 col-lg-4 mb-4" id="test{{ $aItem->id }}">
            <div class="menu-card h-100">
              <img src="{{ asset('assets/img/items/'.$aItem->item_image) }}" alt="{{ $aItem->item_name }}" class="menu-card-img">
              <div class="menu-card-body">
                <h5>{{ $aItem->item_name }}</h5>
                <p class="mb-2">Price: <span class="about">{{ $aItem->item_price }}/-</span></p>
                <p class="card-text ellipsis">{{ \Illuminate\Support\Str::limit(strip_tags($aItem->item_description), 80) }}</p>
              </div>
              <div class="menu-card-footer">
                <div class="menu-buttons">
                  <a href="{{ route('item.detail', $aItem->id) }}" class="btn btn-info btn-sm menu-action-btn">
                    <i class="fas fa-eye"></i> View Details
                  </a>
                  <button type="button" value="{{ $aItem->id }}" class="btn btn-outline-info btn-sm menu-action-btn test_click" data-toggle="modal" data-target="#modal-default">
                    <i class="fas fa-shopping-cart"></i> Add to Cart
                  </button>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        @endforeach
        @if($totalItemsCount == 0)
          <div class="col-12 text-center py-5">
            <i class="fas fa-utensils fa-3x text-muted mb-3"></i>
            <h5 class="text-muted font-weight-bold">No dishes found matching your search.</h5>
            <p class="text-muted mb-3">Try adjusting your keyword or price range filter.</p>
            <a href="{{ route('our.menu') }}" class="btn btn-sm btn-info" style="border-radius:20px;padding:6px 18px;">Reset Filters</a>
          </div>
        @endif
      </div>
    </div>

    @foreach ($categories as $aCat)
    <div class="tab-pane fade" id="pane-category-{{ $aCat->id }}" role="tabpanel" aria-labelledby="tab-category-{{ $aCat->id }}">
      <div class="row">
        @if($aCat->items->count() > 0)
          @foreach ($aCat->items as $aItem)
          <div class="col-12 col-sm-6 col-lg-4 mb-4" id="test{{ $aItem->id }}">
            <div class="menu-card h-100">
              <img src="{{ asset('assets/img/items/'.$aItem->item_image) }}" alt="{{ $aItem->item_name }}" class="menu-card-img">
              <div class="menu-card-body">
                <h5>{{ $aItem->item_name }}</h5>
                <p class="mb-2">Price: <span class="about">{{ $aItem->item_price }}/-</span></p>
                <p class="card-text ellipsis">{{ \Illuminate\Support\Str::limit(strip_tags($aItem->item_description), 80) }}</p>
              </div>
              <div class="menu-card-footer">
                <div class="menu-buttons">
                  <a href="{{ route('item.detail', $aItem->id) }}" class="btn btn-info btn-sm menu-action-btn">
                    <i class="fas fa-eye"></i> View Details
                  </a>
                  <button type="button" value="{{ $aItem->id }}" class="btn btn-outline-info btn-sm menu-action-btn test_click" data-toggle="modal" data-target="#modal-default">
                    <i class="fas fa-shopping-cart"></i> Order Now
                  </button>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        @else
          <div class="col-12 text-center py-5">
            <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
            <h5 class="text-muted font-weight-bold">No dishes found in {{ $aCat->category_name }}.</h5>
            <p class="text-muted">Try removing your search keyword or expanding your price range.</p>
          </div>
        @endif
      </div>
    </div>
    @endforeach
  </div>

  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Set Order</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="row">
              <div class="col-sm-6" id="imagediv"></div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label id="item_name"></label>
                  <br>
                  <label>Price : <span id="item_price"></span>/-</label>
                  <br>
                  <label>Order Item</label>
                  <input type="text" id="item_id" hidden>
                  <input type="text" id="orderItem" class="form-control" placeholder="How many item you want?.....">
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" id="orderSubmit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

</div>

@endsection