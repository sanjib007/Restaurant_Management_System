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
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Item Insert</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="{{ route('item.update', $item->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="item_name">Food Name</label>
                                            <input type="text" value="{{ $item->item_name }}" name="item_name"
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
                                                required>{{ $item->item_description }}</textarea>
                                            @if ($errors->has('item_description'))
                                            <span class="text-danger">{{ $errors->first('item_description') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="item_price">Food Price</label>
                                            <input type="text" value="{{ $item->item_price }}" name="item_price"
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
                                                <option value="{{ $aCat->id }}"
                                                    {{ $aCat->id == $item->category_id ? 'selected':'' }}>
                                                    {{ $aCat->category_name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('category_id'))
                                            <span class="text-danger">{{ $errors->first('category_id') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="item_image">Image</label>
                                            <img src="{{ asset('assets/img/items/'.$item->item_image) }}"
                                                width="100px" />
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

@stop