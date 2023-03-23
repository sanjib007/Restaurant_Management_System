@extends('main-layout.guest')

@section('guestContent')
<style>
  .about {
    color: #e3ce57;
    font-size: 20px;
  }
</style>
<div class="container mt-5">

  <h1 class="text-center">Our Menu</h1>
  <section>

    @foreach ($categories as $aCat)

    <div class="card card-default color-palette-box">
      <div class="card-header">
        <h3 class="card-title">
          <i class="fas fa-tag"></i>
          {{ $aCat->category_name }}
        </h3>
      </div>
      <div class="card-body">
        <div class="col-12">
          <div class="row mt-4">
            @foreach ($aCat->items as $aItem)
              
            <div class="col-sm-3" id="test{{ $aItem->id }}">
              <div class="card" style="width: 16rem;">
                <img style="height: 170px;"
                  src="{{ asset('assets/img/items/'.$aItem->item_image) }}"
                  alt="Photo 1" class="img-fluid" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{ $aItem->item_name }}</h5>
                  <p class="card-text">Price: <span class="about">{{ $aItem->item_price }}/-</span></p>
                  <p class="card-text ellipsis">{{ $aItem->item_description }}</p>
                  <button type="button" value="{{ $aItem->id }}" class="btn btn-default test_click" data-toggle="modal" data-target="#modal-default">
                    Order Now
                  </button>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    @endforeach

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
                <div class="col-sm-6" id="imagediv">
                </div>
                <div class="col-sm-6">
                  <!-- text input -->
                  <div class="form-group">
                    <label id="item_name"></label>
                    <br>
                    <label>Price : <span id="item_price"></span>/-</label>
                    <br>
                    <label>Order Item</label>
                    <input type="text" id="item_id" hidden>
                    <input type="text" id="orderItem" class="form-control" placeholder="How many itme you want?.....">
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
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

  </section>

</div>


@endsection