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
              <li class="breadcrumb-item active">Category Update</li>
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
                          <h3 class="card-title">Item Category</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                          @csrf
                            <div class="card-body">
                            <div class="form-group">
                              <label for="category_name">Food Category</label>
                              <input type="text" name="category_name" value="{{ $category->category_name }}" required class="form-control" id="category_name" placeholder="Enter Food Category">
                              @if ($errors->has('category_name'))
                                <span class="text-danger">{{ $errors->first('category_name') }}</span>
                              @endif
                            </div>
                            <div class="form-group">
                              <label for="category_description">Food Category Details</label>
                              <textarea type="text" name="category_description" class="form-control" id="category_description" required placeholder="Category Details">{{ $category->category_description }}</textarea>
                              @if ($errors->has('category_description'))
                                <span class="text-danger">{{ $errors->first('category_description') }}</span>
                              @endif
                            </div>
                            <div class="form-group">
                              <label for="category_image">Category Image</label>
                              <img src="{{ asset('assets/img/category/'.$category->category_image) }}">
                              <input type="file" name="category_image" class="form-control" id="category_image" placeholder="Upload Image" required>
                              @if ($errors->has('category_image'))
                                <span class="text-danger">{{ $errors->first('category_image') }}</span>
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