@extends('main-layout.main')

@section('content')

@if(Auth::user()->isAdmin())
  @include('share-layout.admin-dashboard')
@elseif(Auth::user()->hasRole(['customer', 'manager']))
  @include('share-layout.customer-dashboard')
@endif


@endsection