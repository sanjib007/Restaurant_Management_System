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

            <!-- Map card -->
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
                <table class="table">
                  <thead>
                    <tr>
                      <th>Order Date</th>
                      <th>Order No.</th>
                      <th>Total Item</th>
                      <th>Order Status</th>
                      <th>Payment Status</th>
                      <th>Total Amount</th>
                    </tr>
                  </thead>
                  <tbody class="table-border-bottom-0">
                    @foreach ($orderHistory as $aOrder)
                      <tr>
                        <td><i class="text-danger me-3"></i> 
                            <strong>
                              {{ $aOrder->created_at }}
                            </strong>
                        </td>
                        <td>{{ $aOrder->order_number }}</td>
                        <td>{{ $aOrder->total_item }}</td>
                        <td>{{ $aOrder->order_status }}</td>
                        <td>{{ $aOrder->payment_status }}</td>
                        <td>{{ $aOrder->total_amount }}</td>
                      </tr>
                    @endforeach
                    
                  </tbody>
                </table>

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