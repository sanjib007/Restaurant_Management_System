  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    @if (\Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>{!! \Session::get('success') !!}</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    @endif
    @if (\Session::has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>{!! \Session::get('error') !!}</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          @if($getAllItem != null)
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  Your Order List
                </h3>
                <!-- card tools -->
                <div class="card-tools">
                  <button type="button" class="btn btn-primary btn-sm daterange" title="Date range">
                    <i class="far fa-calendar-alt"></i>
                  </button>
                  <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <form action="{{ route('order.submitOrder') }}" method="POST">
                @csrf
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    
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
                              <a href="{{ asset('assets/img/items/'.$aItem->item_image) }}" data-toggle="lightbox" data-title="sample 1 - white">
                                <img style="width: 100px; heig" src="{{ asset('assets/img/items/'.$aItem->item_image) }}" class="img-fluid mb-2" alt="{{ $aItem->item_name }}"/>
                              </a>
                            </td>
                            <td><strong>{{ $aItem->item_name }}</strong></td>
                            <td>
                              <form>
                                <div class="input-group input-group-sm">
                                  <input type="text" id="getVal_{{ $aItem->id }}" value="{{ $aItem->totalItem }}" class="form-control">
                                  <span class="input-group-append">
                                    <button type="button" value="{{ $aItem->id }}" class="btn btn-info btn-flat changeItemQuantity">Change</button>
                                  </span>
                                </div>
                              </form>
                            </td>
                            <td class="text-right">{{ $aItem->item_price }}/-</td>
                            <td class="text-right">{{ $aItem->item_price * $aItem->totalItem }}/-</td>
                            <td>
                              <a href="{{ route('item.deleteRequestedItem', $aItem->id)  }}" class="btn btn-danger"><i class="fa fa-times"></i></a>
                            </td>
                          </tr>
                          <?php $totalAmount = $totalAmount + ($aItem->item_price * $aItem->totalItem) ?>
                        @endforeach
                        <tr>
                          <td colspan="4" class="text-right"><b>Total Price</b></td>
                          <td class="text-right"><b>{{ $totalAmount }}/-</b></td>
                          <td class="text-right"></td>
                        </tr>
                      </tbody>
                    </table>
                    
                  </div>
                  
                  <div class="col-md-12">
                    <div class="row">
                      
                      <div class="col-8">
                        <div class="card card-warning">
                          <div class="card-header">
                            <h3 class="card-title">Information</h3>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            
                              <div class="row">
                                <div class="col-sm-12">
                                  <div class="form-group">
                                    <label>Customer order position</label>
                                    <select class="form-control" name="order_position" id="order_position_select">
                                      <option value="present" checked>Presnet here</option>
                                      <option value="takeaway">Take away</option>
                                      <option value="home_delivery">Home Delivery</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div id="takeaway">
                                <div class="row">
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Contact Name</label>
                                      <input type="text" name="order_contact_name" class="form-control" placeholder="Enter ...">
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Contact Mobile no.</label>
                                      <input type="text" name="order_contact_mobile" class="form-control" placeholder="Enter ...">
                                    </div>
                                  </div>
                                  <div class="col-sm-12">
                                    <div class="form-group">
                                      <label>Full Address</label>
                                      <textarea class="form-control" name="order_contact_address" rows="3" placeholder="Enter ..."></textarea>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div id="present">
                                <div class="row">
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Name</label>
                                      <input type="text" name="order_person_name" value="{{ auth()->user()->name }}" class="form-control" placeholder="Enter ...">
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Mobile no.</label>
                                      <input type="text" name="order_person_mobile" class="form-control" placeholder="Enter ...">
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Total person</label>
                                      <input type="number" name="order_total_person" class="form-control" placeholder="Enter ...">
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Select Table Number</label>
                                      <select name="order_table_no" class="form-control">
                                        <option>Table 1</option>
                                        <option>Table 2</option>
                                        <option>Table 3</option>
                                        <option>Table 4</option>
                                        <option>Table 5</option>
                                      </select>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            
                          </div>
                          <!-- /.card-body -->
                        </div>
                      </div>
                      <div class="col-4">
                        <ul class="list-group">
                          <li class="list-group-item">
                            <div class="form-check">
                              <input name="order_payment_method" class="form-check-input" type="radio" value="cashOnDelivery"
                                id="cashOnDelivery" checked />
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
                    
                    </div>
                  </div>
                
                </div>
              </div>
              <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary btn-block">Pay Now</button>
              </div>
            </form>
            </div>

          </div>
          @endif
        </div>

        <!-- Main row -->
        <div class="row">
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-9 connectedSortable">
            @include('share-layout.order-financial-report')

            {{-- ─── Search Card ─── --}}
            <div class="card card-outline card-primary mb-3">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-search mr-2"></i>Search My Orders</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body pb-1">
                <form method="GET" action="{{ route('home') }}" id="cust-order-search-form">
                  <div class="row align-items-end">
                    <div class="col-md-4 mb-2">
                      <label class="mb-1" style="font-size:.8rem;font-weight:600;text-transform:uppercase;letter-spacing:.5px;color:#718096;">Order No.</label>
                      <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                          <span class="input-group-text" style="background:#f1f5f9;"><i class="fas fa-hashtag text-muted"></i></span>
                        </div>
                        <input type="text" name="search_order_no" id="cust_search_order_no"
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
                        <input type="date" name="search_order_date" id="cust_search_order_date"
                               class="form-control"
                               value="{{ $searchOrderDate ?? '' }}">
                      </div>
                    </div>
                    <div class="col-md-4 mb-2 d-flex" style="gap:6px;">
                      <button type="submit" class="btn btn-primary btn-sm flex-fill" style="border-radius:6px;">
                        <i class="fas fa-search mr-1"></i> Search
                      </button>
                      <a href="{{ route('home') }}" class="btn btn-secondary btn-sm flex-fill" style="border-radius:6px;">
                        <i class="fas fa-times mr-1"></i> Clear
                      </a>
                    </div>
                  </div>
                </form>
              </div>
            </div>

            <!-- Previous Order List card -->
            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">
                  Previous Order List
                </h3>
                <!-- card tools -->
                <div class="card-tools">
                  <button type="button" class="btn btn-primary btn-sm daterange" title="Date range">
                    <i class="far fa-calendar-alt"></i>
                  </button>
                  <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <div class="card-body">
                @if($orderHistory->count() > 0)
                <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Order Date</th>
                      <th>Order No.</th>
                      <th>Total Item</th>
                      <th>Order Status</th>
                      <th>Payment Status</th>
                      <th>Total Amount</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class="table-border-bottom-0">
                    @foreach ($orderHistory as $aOrder)
                      <tr>
                        <td><strong>{{ $aOrder->created_at->format('d M Y, h:i A') }}</strong></td>
                        <td><code>{{ $aOrder->order_number }}</code></td>
                        <td>{{ $aOrder->total_item }} Items</td>
                        <td>
                          <span class="badge {{ $aOrder->order_status == 'Completed' ? 'badge-success' : ($aOrder->order_status == 'Processing' ? 'badge-warning' : ($aOrder->order_status == 'Cancel' ? 'badge-danger' : 'badge-info')) }}">
                            {{ $aOrder->order_status }}
                          </span>
                        </td>
                        <td><span class="badge {{ $aOrder->payment_status == 'Paid' ? 'badge-primary' : 'badge-danger' }}">{{ $aOrder->payment_status }}</span></td>
                        <td>{{ $aOrder->total_amount }}/-</td>
                        <td>
                          <button onclick="viewOrderDetail({{ $aOrder->id }})" class="btn btn-block bg-gradient-info btn-xs mb-1">
                            <i class="fas fa-eye"></i> View
                          </button>
                          @if($aOrder->order_status == 'New')
                            @if($aOrder->cancelRequest)
                              @if($aOrder->cancelRequest->status == 'Pending')
                                <span class="badge badge-warning d-block py-1 mt-1" style="font-size:.75rem;"><i class="fas fa-clock mr-1"></i>Cancel Req: Pending</span>
                              @elseif($aOrder->cancelRequest->status == 'Rejected')
                                <span class="badge badge-danger d-block py-1 mt-1" style="font-size:.75rem;" title="{{ $aOrder->cancelRequest->admin_description }}"><i class="fas fa-times-circle mr-1"></i>Cancel Rejected</span>
                                @if(strtolower($aOrder->order_payment_method) == 'cashondelivery')
                                  <a href="{{ route('order.cancel', $aOrder->id) }}" class="btn btn-block bg-gradient-danger btn-xs mt-1">Order Cancel</a>
                                @else
                                  <button onclick="openCancelModal({{ $aOrder->id }}, '{{ $aOrder->order_number }}')" class="btn btn-block bg-gradient-danger btn-xs mt-1">Request Cancel Again</button>
                                @endif
                              @endif
                            @else
                              @if(strtolower($aOrder->order_payment_method) == 'cashondelivery')
                                <a href="{{ route('order.cancel', $aOrder->id) }}" class="btn btn-block bg-gradient-danger btn-xs">Order Cancel</a>
                              @else
                                <button onclick="openCancelModal({{ $aOrder->id }}, '{{ $aOrder->order_number }}')" class="btn btn-block bg-gradient-danger btn-xs">Order Cancel</button>
                              @endif
                            @endif
                          @endif
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                </div>
                @else
                  <div class="text-center py-4 text-muted">
                    <i class="fas fa-inbox fa-2x mb-2"></i>
                    <p class="mb-0">No orders found matching your search.</p>
                  </div>
                @endif
                {{ $orderHistory->links() }}
              </div>
              <!-- /.card-body-->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
          <!-- Left col -->
          <section class="col-lg-3 connectedSortable">
            <!-- DIRECT CHAT -->
            <div class="card direct-chat direct-chat-primary">
              <div class="card-header">
                <h3 class="card-title">Direct Chat</h3>

                <div class="card-tools">
                  <span title="3 New Messages" class="badge badge-primary">3</span>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" title="Contacts" data-widget="chat-pane-toggle">
                    <i class="fas fa-comments"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages">
                  <!-- Message. Default to the left -->
                  <div class="direct-chat-msg">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-left">Alexander Pierce</span>
                      <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    <img class="direct-chat-img" src="{{asset('assets/dist/img/user1-128x128.jpg')}}"
                      alt="message user image">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                      Is this template really for free? That's unbelievable!
                    </div>
                    <!-- /.direct-chat-text -->
                  </div>
                  <!-- /.direct-chat-msg -->

                  <!-- Message to the right -->
                  <div class="direct-chat-msg right">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-right">Sarah Bullock</span>
                      <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    <img class="direct-chat-img" src="{{asset('assets/dist/img/user3-128x128.jpg')}}"
                      alt="message user image">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                      You better believe it!
                    </div>
                    <!-- /.direct-chat-text -->
                  </div>
                  <!-- /.direct-chat-msg -->

                  <!-- Message. Default to the left -->
                  <div class="direct-chat-msg">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-left">Alexander Pierce</span>
                      <span class="direct-chat-timestamp float-right">23 Jan 5:37 pm</span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    <img class="direct-chat-img" src="{{asset('assets/dist/img/user1-128x128.jpg')}}"
                      alt="message user image">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                      Working with AdminLTE on a great new app! Wanna join?
                    </div>
                    <!-- /.direct-chat-text -->
                  </div>
                  <!-- /.direct-chat-msg -->

                  <!-- Message to the right -->
                  <div class="direct-chat-msg right">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-right">Sarah Bullock</span>
                      <span class="direct-chat-timestamp float-left">23 Jan 6:10 pm</span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    <img class="direct-chat-img" src="{{asset('assets/dist/img/user3-128x128.jpg')}}"
                      alt="message user image">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                      I would love to.
                    </div>
                    <!-- /.direct-chat-text -->
                  </div>
                  <!-- /.direct-chat-msg -->

                </div>
                <!--/.direct-chat-messages-->

                <!-- Contacts are loaded here -->
                <div class="direct-chat-contacts">
                  <ul class="contacts-list">
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="{{asset('assets/dist/img/user1-128x128.jpg')}}"
                          alt="User Avatar">

                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Count Dracula
                            <small class="contacts-list-date float-right">2/28/2015</small>
                          </span>
                          <span class="contacts-list-msg">How have you been? I was...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="{{asset('assets/dist/img/user7-128x128.jpg')}}"
                          alt="User Avatar">

                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Sarah Doe
                            <small class="contacts-list-date float-right">2/23/2015</small>
                          </span>
                          <span class="contacts-list-msg">I will be waiting for...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="{{asset('assets/dist/img/user3-128x128.jpg')}}"
                          alt="User Avatar">

                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Nadia Jolie
                            <small class="contacts-list-date float-right">2/20/2015</small>
                          </span>
                          <span class="contacts-list-msg">I'll call you back at...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="{{asset('assets/dist/img/user5-128x128.jpg')}}"
                          alt="User Avatar">

                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Nora S. Vans
                            <small class="contacts-list-date float-right">2/10/2015</small>
                          </span>
                          <span class="contacts-list-msg">Where is your new...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="{{asset('assets/dist/img/user6-128x128.jpg')}}"
                          alt="User Avatar">

                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            John K.
                            <small class="contacts-list-date float-right">1/27/2015</small>
                          </span>
                          <span class="contacts-list-msg">Can I take a look at...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="{{asset('assets/dist/img/user8-128x128.jpg')}}"
                          alt="User Avatar">

                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Kenneth M.
                            <small class="contacts-list-date float-right">1/4/2015</small>
                          </span>
                          <span class="contacts-list-msg">Never mind I found...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                  </ul>
                  <!-- /.contacts-list -->
                </div>
                <!-- /.direct-chat-pane -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <form action="#" method="post">
                  <div class="input-group">
                    <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                    <span class="input-group-append">
                      <button type="button" class="btn btn-primary">Send</button>
                    </span>
                  </div>
                </form>
              </div>
              <!-- /.card-footer-->
            </div>
            <!--/.direct-chat -->
            <!-- /.card -->
          </section>
          <!-- /.Left col -->

        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <script>
    const el = document.getElementById('order_position_select');
    const present = document.getElementById('present');
    const takeaway = document.getElementById('takeaway');
    present.style.display = 'block';
    takeaway.style.display = 'none';
    el.addEventListener('change', function handleChange(event) {
      if (event.target.value === 'present') {
      present.style.display = 'block';
      takeaway.style.display = 'none';
      } else {
      present.style.display = 'none';
      takeaway.style.display = 'block';
      }
    });
  </script>

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

  function openCancelModal(orderId, orderNo) {
    document.getElementById('cancel_order_id').value = orderId;
    document.getElementById('cancelModalOrderNo').textContent = orderNo ? ('Order #' + orderNo) : ('Order ID: ' + orderId);
    document.getElementById('cancel_reason').value = '';
    $('#cancelRequestModal').modal('show');
  }
</script>

{{-- ══════════ CANCEL REQUEST MODAL ══════════ --}}
<div class="modal fade" id="cancelRequestModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="border-radius:12px;overflow:hidden;border:none;box-shadow:0 20px 60px rgba(0,0,0,.25);">
      <div class="modal-header text-white" style="background:linear-gradient(135deg,#e94560,#c0392b);border-bottom:none;padding:20px 24px;">
        <div>
          <h5 class="modal-title font-weight-bold mb-0">
            <i class="fas fa-exclamation-triangle mr-2"></i>Request Order Cancellation
          </h5>
          <small id="cancelModalOrderNo" style="color:#fcd5ce;font-size:.82rem;"></small>
        </div>
        <button type="button" class="close text-white" data-dismiss="modal"><span>&times;</span></button>
      </div>
      <form method="POST" action="{{ route('order.cancelRequest') }}">
        @csrf
        <input type="hidden" name="order_id" id="cancel_order_id">
        <div class="modal-body" style="background:#f8fafc;padding:24px;">
          <div class="alert alert-info" style="border-radius:8px;font-size:.88rem;">
            <i class="fas fa-info-circle mr-2"></i>
            Since this order was paid via online/card payment, your cancellation request will be sent to the restaurant admin for approval and refund processing.
          </div>
          <div class="form-group mb-0">
            <label class="font-weight-bold" style="font-size:.85rem;text-transform:uppercase;letter-spacing:.5px;color:#718096;">
              Reason for Cancellation <span class="text-danger">*</span>
            </label>
            <textarea name="cancel_reason" id="cancel_reason" class="form-control mt-1" rows="4"
                      placeholder="Please explain why you need to cancel this order…"
                      required minlength="5"></textarea>
          </div>
        </div>
        <div class="modal-footer" style="background:#f8fafc;border-top:1px solid #e2e8f0;">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
            <i class="fas fa-times mr-1"></i>Close
          </button>
          <button type="submit" class="btn btn-danger btn-sm">
            <i class="fas fa-paper-plane mr-1"></i>Submit Request
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

@if(session('need_cancel_request'))
<script>
  document.addEventListener('DOMContentLoaded', function() {
    openCancelModal({{ session('need_cancel_request') }}, '');
  });
</script>
@endif