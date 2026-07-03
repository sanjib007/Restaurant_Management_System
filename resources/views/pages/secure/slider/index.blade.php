@extends('main-layout.main')

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Slider Manager</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Slider</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add Slider Item</h3>
            </div>
            <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                @if(session('success'))
                <div class="alert alert-success">
                  {{ session('success') }}
                </div>
                @endif
                @if($errors->any())
                <div class="alert alert-danger">
                  <ul class="mb-0">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
                @endif
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}" placeholder="Slide title">
                </div>
                <div class="form-group">
                  <label for="subtitle">Subtitle</label>
                  <textarea name="subtitle" id="subtitle" class="form-control" rows="3" placeholder="Slide subtitle">{{ old('subtitle') }}</textarea>
                </div>
                <div class="form-group">
                  <label for="image">Image</label>
                  <input type="file" name="image" class="form-control" id="image" required>
                </div>
                <div class="form-group">
                  <label for="sort_order">Sort Order</label>
                  <input type="number" name="sort_order" class="form-control" id="sort_order" value="{{ old('sort_order', 0) }}">
                </div>
                <div class="form-group form-check">
                  <input type="hidden" name="is_active" value="0">
                  <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" checked>
                  <label class="form-check-label" for="is_active">Active</label>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save Slider</button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Existing Slides</h3>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Subtitle</th>
                    <th>Order</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($sliders as $slider)
                  <tr>
                    <td>{{ $slider->id }}</td>
                    <td><img src="{{ asset('assets/img/slider/'.$slider->image) }}" alt="slider" width="80"></td>
                    <td>{{ $slider->title }}</td>
                    <td>{{ Str::limit($slider->subtitle, 60) }}</td>
                    <td>{{ $slider->sort_order }}</td>
                    <td>{{ $slider->is_active ? 'Active' : 'Inactive' }}</td>
                    <td>
                      <a href="{{ route('slider.edit', $slider->id) }}" class="btn btn-sm btn-warning">Edit</a>
                      <a href="{{ route('slider.destroy', $slider->id) }}" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection