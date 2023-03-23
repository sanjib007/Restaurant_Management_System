@extends('main-layout.main')

@section('content')

@if(Auth::user()->roles->pluck('name')[0] == "admin")
  @include('share-layout.admin-dashboard')
@endif

@if(Auth::user()->roles->pluck('name')[0] == "customer")
  @include('share-layout.customer-dashboard')
@endif

@if(Auth::user()->roles->pluck('name')[0] == "manager")
  @include('share-layout.customer-dashboard')
@endif


@endsection