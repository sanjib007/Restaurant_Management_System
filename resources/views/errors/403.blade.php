@extends('main-layout.main')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center" style="min-height: 70vh;">
                <div class="col-md-7 text-center">
                    <div class="error-page">
                        <h2 class="headline text-danger" style="font-size: 5rem; font-weight: 700;">403</h2>
                        <div class="error-content mt-3">
                            <h3 class="mb-3">
                                <i class="fas fa-exclamation-triangle text-warning"></i>
                                Access Denied
                            </h3>
                            <p class="text-muted">
                                {{ $exception->getMessage() ?: 'You do not have the required permission to access this page.' }}
                            </p>
                            <p class="text-muted">
                                Please contact your administrator if you believe this is a mistake.
                            </p>

                            <div class="mt-4">
                                <a href="javascript:history.back()" class="btn btn-secondary mr-2">
                                    <i class="fas fa-arrow-left"></i> Go Back
                                </a>
                                <a href="{{ route('home') }}" class="btn btn-primary">
                                    <i class="fas fa-home"></i> Dashboard
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
