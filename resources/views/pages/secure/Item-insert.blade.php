@extends('main-layout.main')


@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Item Manage</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Item</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title">Item Category</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('category.insert') }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <div class="card-body">
                            <div class="form-group">
                              <label for="category_name">Food Category</label>
                              <input type="text" name="category_name" class="form-control" id="category_name" placeholder="Enter Food Category">
                            </div>
                            <div class="form-group">
                              <label for="category_description">Food Category Details</label>
                              <textarea type="text" name="category_description" class="form-control" id="category_description" placeholder="Category Details"></textarea>
                            </div>
                            <div class="form-group">
                              <label for="category_image">Category Image</label>
                              <input type="file" name="category_image" class="form-control" id="category_image" placeholder="Upload Image">
                            </div>
                          </div>
                          <!-- /.card-body -->          
                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </form>
                      </div>
                      <!-- /.card -->
                </div>
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Insert Food Category</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          @if($categories != null)
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>Item Category</th>
                                  <th>Detais</th>
                                  <th>Category Image</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody class="table-border-bottom-0">
                                @foreach ($categories as $aCat)
                                  <tr>
                                    <td>{{ $aCat->category_name }}</td>
                                    <td class="ellipsis">{{ $aCat->category_description }}</td>
                                    <td><img style="width: 100px;" src="{{ asset('assets/img/category/'.$aCat->category_image) }}" alt="Item"></td>
                                    <td>
                                      <a href="{{ route('category.edit',$aCat->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>
                                      <a href="{{ route('category.delete',$aCat->id) }}" class="btn btn-danger btn-xs"><i class="fa fa-times"></i></a>
                                    </td>
                                  </tr>
                                @endforeach
                              </tbody>
                            </table>
                          @endif
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                          <ul class="pagination pagination-sm m-0 float-right">
                            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                          </ul>
                        </div>
                      </div>
                      <!-- /.card -->
                </div>
            </div>
          </div>
          <div class="col-md-8">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title">Food Insert</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('item.insert') }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <div class="card-body">
                            <div class="form-group">
                              <label for="item_name">Food Name</label>
                              <input type="text" name="item_name"
                                  class="form-control" id="item_name" placeholder="Enter Food Name"
                                  required>
                              @if ($errors->has('item_name'))
                              <span class="text-danger">{{ $errors->first('item_name') }}</span>
                              @endif
                          </div>
                          <div class="form-group">
                              <label for="item_description">Food Details</label>
                              <textarea type="text" name="item_description" class="form-control"
                                  id="item_description" placeholder="Food Details"
                                  required></textarea>
                              @if ($errors->has('item_description'))
                              <span class="text-danger">{{ $errors->first('item_description') }}</span>
                              @endif
                          </div>
                          <div class="form-group">
                              <label for="item_price">Food Price</label>
                              <input type="text" name="item_price"
                                  class="form-control" id="item_price" placeholder="Enter Food Price"
                                  required>
                              @if ($errors->has('item_price'))
                              <span class="text-danger">{{ $errors->first('item_price') }}</span>
                              @endif
                          </div>
                          <div class="form-group">
                              <label for="category_id">Select Category</label>
                              <select class="form-control" name="category_id" id="category_id" required>
                                  <option value="">Select a Category</option>
                                  @foreach ($categories as $aCat)
                                  <option value="{{ $aCat->id }}">
                                      {{ $aCat->category_name }}</option>
                                  @endforeach
                              </select>
                              @if ($errors->has('category_id'))
                              <span class="text-danger">{{ $errors->first('category_id') }}</span>
                              @endif
                          </div>
                          <div class="form-group">
                              <label for="item_image">Image</label>
                              <input type="file" name="item_image" class="form-control" id="item_image"
                                  placeholder="Upload Image" required>
                              @if ($errors->has('item_image'))
                              <span class="text-danger">{{ $errors->first('item_image') }}</span>
                              @endif
                          </div>
                          </div>
                          <!-- /.card-body -->          
                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </form>
                      </div>
                      <!-- /.card -->
                </div>
                <div class="col-sm-12">
                    {{-- ─── Search Card ─── --}}
                    <div class="card card-outline card-primary mb-3">
                      <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-search mr-2"></i>Search Food Items</h3>
                        <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                          </button>
                        </div>
                      </div>
                      <div class="card-body pb-1">
                        <form method="GET" action="{{ route('item-insert') }}">
                          <div class="row align-items-end">
                            <div class="col-md-5 mb-2">
                              <label class="mb-1" style="font-size:.8rem;font-weight:600;text-transform:uppercase;letter-spacing:.5px;color:#718096;">Food Name</label>
                              <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" style="background:#f1f5f9;"><i class="fas fa-utensils text-muted"></i></span>
                                </div>
                                <input type="text" name="search_food_name" class="form-control"
                                       placeholder="Search by food name…" value="{{ $searchFoodName ?? '' }}">
                              </div>
                            </div>
                            <div class="col-md-4 mb-2">
                              <label class="mb-1" style="font-size:.8rem;font-weight:600;text-transform:uppercase;letter-spacing:.5px;color:#718096;">Category</label>
                              <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" style="background:#f1f5f9;"><i class="fas fa-tags text-muted"></i></span>
                                </div>
                                <select name="search_category" class="form-control">
                                  <option value="">All Categories</option>
                                  @foreach ($categories as $aCat)
                                    <option value="{{ $aCat->id }}" {{ ($searchCategory ?? '') == $aCat->id ? 'selected' : '' }}>
                                      {{ $aCat->category_name }}
                                    </option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                            <div class="col-md-3 mb-2 d-flex" style="gap:6px;">
                              <button type="submit" class="btn btn-primary btn-sm flex-fill" style="border-radius:6px;">
                                <i class="fas fa-search mr-1"></i> Search
                              </button>
                              <a href="{{ route('item-insert') }}" class="btn btn-secondary btn-sm flex-fill" style="border-radius:6px;">
                                <i class="fas fa-times mr-1"></i> Clear
                              </a>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Food Item List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          @if($items->count() > 0)
                          <div class="table-responsive">
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                <th>Food Name</th>
                                <th>Details</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Category</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                              @foreach ($items as $aItem)
                              <tr>
                                <td><strong>{{ $aItem->item_name }}</strong></td>
                                <td class="ellipsis" style="max-width:250px;">{!! strip_tags($aItem->item_description) !!}</td>
                                <td><strong>{{ $aItem->item_price }}/-</strong></td>
                                <td><img style="width: 80px; border-radius:6px; object-fit:cover;" src="{{ asset('assets/img/items/'.$aItem->item_image) }}" alt="Item"></td>
                                <td><span class="badge badge-info">{{ $aItem->category_name }}</span></td>
                                <td>
                                    <a href="{{ route('item.edit', $aItem->id ) }}" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('item.delete', $aItem->id ) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this food item?')"><i class="fa fa-times"></i></a>
                                </td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                          </div>
                          @else
                          <div class="text-center py-5 text-muted">
                            <i class="fas fa-utensils fa-3x mb-3"></i>
                            <p class="mb-0">No food items found matching your search.</p>
                          </div>
                          @endif
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                          {{ $items->links() }}
                        </div>
                      </div>
                      <!-- /.card -->
                </div>
            </div>
            

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @push('scripts')
  <script>
    $(function () {
      $('#item_description').summernote({
        placeholder: 'Food Details',
        height: 200,
      });
    });
  </script>
  @endpush

@stop