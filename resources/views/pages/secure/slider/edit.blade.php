@extends('main-layout.main')

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Slider Item</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('slider.index') }}">Slider</a></li>
            <li class="breadcrumb-item active">Edit</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Slide</h3>
            </div>
            <form action="{{ route('slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" name="title" class="form-control" id="title" value="{{ old('title', $slider->title) }}">
                </div>
                <div class="form-group">
                  <label for="subtitle">Subtitle</label>
                  <textarea name="subtitle" id="subtitle" class="form-control" rows="4">{{ old('subtitle', $slider->subtitle) }}</textarea>
                </div>
                <div class="form-group">
                  <label for="image">Image</label>
                  <input type="file" name="image" class="form-control" id="image">
                  <small class="form-text text-muted">Leave blank to keep the current image.</small>
                  <div class="mt-3">
                    <img src="{{ asset('assets/img/slider/'.$slider->image) }}" alt="current slide" width="240">
                  </div>
                </div>
                <div class="form-group">
                  <label for="sort_order">Sort Order</label>
                  <input type="number" name="sort_order" class="form-control" id="sort_order" value="{{ old('sort_order', $slider->sort_order) }}">
                </div>
                <div class="form-group form-check">
                  <input type="hidden" name="is_active" value="0">
                  <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" {{ $slider->is_active ? 'checked' : '' }}>
                  <label class="form-check-label" for="is_active">Active</label>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update Slider</button>
                <a href="{{ route('slider.index') }}" class="btn btn-secondary">Cancel</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection