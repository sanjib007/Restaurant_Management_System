@extends('main-layout.guest')

@section('guestContent')
<style>
  .about {
    color: #e3ce57;
    font-size: 20px;
  }

  .detail-description img {
    max-width: 100%;
    height: auto;
  }

  .detail-description table {
    width: 100%;
    border-collapse: collapse;
  }

  .detail-description th,
  .detail-description td {
    border: 1px solid #dee2e6;
    padding: 0.75rem;
  }

  .detail-description thead th {
    background: #f8f9fa;
  }
</style>
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-lg-10">
      <div class="card shadow-sm mb-4">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="{{ asset('assets/img/items/'.$item->item_image) }}" alt="{{ $item->item_name }}" class="img-fluid h-100" style="object-fit: cover; min-height: 320px; width: 100%;">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <h2 class="card-title">{{ $item->item_name }}</h2><br/> 
              <p class="text-muted mb-3">Price: <strong>{{ $item->item_price }}/-</strong></p>
              <p class="mb-4">Here is the full description of this food item. Scroll down for the complete detail content, including ingredients, preparation notes, and any additional formatting.</p>
              <button type="button" value="{{ $item->id }}" class="btn btn-primary test_click mr-2" data-toggle="modal" data-target="#modal-default">
                Add to Cart
              </button>
              <a href="{{ route('our.menu') }}" class="btn btn-outline-secondary">Back to Menu</a>
            </div>
          </div>
        </div>
      </div>
      <div class="card shadow-sm">
        <div class="card-header bg-white">
          <h5 class="mb-0">Description</h5>
        </div>
        <div class="card-body detail-description">
          {!! $item->item_description !!}
        </div>
      </div>
    </div>
  </div>
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
                <input type="text" id="orderItem" class="form-control" placeholder="How many items do you want?">
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="orderSubmit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection
