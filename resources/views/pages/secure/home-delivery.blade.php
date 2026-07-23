@extends('main-layout.main')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"><i class="fas fa-truck mr-2 text-primary"></i>Home Delivery</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Home Delivery</li>
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
  @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
  @endif

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      @if(!empty($getAllItem) && count($getAllItem) > 0)
      <form action="{{ route('order.submitOrder') }}" method="POST">
        @csrf
        <input type="hidden" name="order_position" value="home_delivery">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><i class="fas fa-shopping-basket mr-1"></i> Items to Deliver</h3>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Item Image</th>
                    <th>Item Name</th>
                    <th>Item Quentity</th>
                    <th>Price</th>
                    <th>Total Price</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <?php $totalAmount = 0; ?>
                <tbody class="table-border-bottom-0">
                  @foreach ($getAllItem as $aItem)
                    <tr>
                      <td>
                        <a href="{{ asset('assets/img/items/'.$aItem->item_image) }}" data-toggle="lightbox" data-title="{{ $aItem->item_name }}">
                          <img style="width: 100px;" src="{{ asset('assets/img/items/'.$aItem->item_image) }}" class="img-fluid mb-2" alt="{{ $aItem->item_name }}"/>
                        </a>
                      </td>
                      <td><strong>{{ $aItem->item_name }}</strong></td>
                      <td>
                        <div class="input-group input-group-sm" style="max-width:160px;">
                          <input type="text" id="getVal_{{ $aItem->id }}" value="{{ $aItem->totalItem }}" class="form-control">
                          <span class="input-group-append">
                            <button type="button" value="{{ $aItem->id }}" class="btn btn-info btn-flat changeItemQuantity">Change</button>
                          </span>
                        </div>
                      </td>
                      <td class="text-right">{{ $aItem->item_price }}/-</td>
                      <td class="text-right">{{ $aItem->item_price * $aItem->totalItem }}/-</td>
                      <td>
                        <button type="button" value="{{ $aItem->id }}" class="btn btn-danger removeDeliveryItem"><i class="fa fa-times"></i></button>
                      </td>
                    </tr>
                    <?php $totalAmount = $totalAmount + ($aItem->item_price * $aItem->totalItem) ?>
                  @endforeach
                  <tr>
                    <td colspan="4" class="text-right"><b>Total Price</b></td>
                    <td class="text-right"><b>{{ $totalAmount }}/-</b></td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-8">
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-map-marker-alt mr-1"></i> Delivery Information</h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Contact Name <span class="text-danger">*</span></label>
                      <input type="text" name="order_contact_name" value="{{ old('order_contact_name', auth()->user()->name) }}" class="form-control" placeholder="Enter your name" required>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Contact Mobile no. <span class="text-danger">*</span></label>
                      <input type="text" name="order_contact_mobile" value="{{ old('order_contact_mobile') }}" class="form-control" placeholder="Enter mobile number" required>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Full Delivery Address <span class="text-danger">*</span></label>
                      <textarea class="form-control" name="order_contact_address" rows="3" placeholder="House / Road / Area / City ..." required>{{ old('order_contact_address') }}</textarea>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-wallet mr-1"></i> Payment Method</h3>
              </div>
              <div class="card-body p-0">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                    <div class="form-check">
                      <input name="order_payment_method" class="form-check-input" type="radio" value="cashOnDelivery" id="cashOnDelivery" checked />
                      <label class="form-check-label" for="cashOnDelivery"> Cash on delivery </label>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <div class="form-check">
                      <input name="order_payment_method" class="form-check-input" type="radio" value="bkash" id="bkash" />
                      <label class="form-check-label" for="bkash"> Bkash </label>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <div class="form-check">
                      <input name="order_payment_method" class="form-check-input" type="radio" value="nogod" id="nogod" />
                      <label class="form-check-label" for="nogod"> Nogod </label>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <div class="form-check">
                      <input name="order_payment_method" class="form-check-input" type="radio" value="card" id="card" />
                      <label class="form-check-label" for="card"> Card </label>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-truck mr-1"></i> Confirm Delivery Order</button>
              </div>
            </div>
          </div>
        </div>
      </form>
      @else
        <div class="card">
          <div class="card-body text-center py-5">
            <i class="fas fa-truck fa-3x text-muted mb-3"></i>
            <h4 class="text-muted">Your delivery cart is empty.</h4>
            <p class="text-muted mb-4">Add some delicious items from our menu to order home delivery.</p>
            <a href="{{ route('our.menu') }}" class="btn btn-primary"><i class="fas fa-utensils mr-1"></i> Browse Our Menu</a>
          </div>
        </div>
      @endif
    </div>
  </section>
</div>

<script>
  // Remove an item from the delivery cart and stay on this page
  jQuery('body').on('click', '.removeDeliveryItem', function (e) {
    e.preventDefault();
    var id = $(this).val();
    $.ajax({
      type: "get",
      url: '/removeOrder/' + id,
      dataType: "json",
      success: function () { location.reload(); },
      error: function (data) { console.log('Error:', data); }
    });
  });
</script>
@endsection
