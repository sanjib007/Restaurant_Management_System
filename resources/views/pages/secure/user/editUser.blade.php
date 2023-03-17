@extends('main-layout.main')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>User Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">user</li>
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
                                    <h3 class="card-title">User Insert</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                {{-- <?php dd($user) ?> --}}
                                <form action="{{ route('user.updare', $user[0]->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" id="name" class="form-control"
                                               value="{{ $user[0]->userName }}" placeholder="Full name" required>
                                            @if ($errors->has('name'))
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email address</label>
                                            <input type="email" name="email" id="email" class="form-control"
                                            value="{{ $user[0]->email }}" placeholder="Email" required>
                                            @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="roleName">Role</label>
                                            <select class="form-control select2bs4" name="roleName" style="width: 100%;">
                                                <option value="" selected="selected">Select A Role</option>
                                                @foreach ($roles as $arole)
                                                    <option value="{{ $arole->name }}" {{ $user[0]->roleName ==  $arole->name ? 'selected' : ''}}>{{ $arole->name }}</option>
                                                @endforeach
                                              </select>
                                            @if ($errors->has('roleName'))
                                            <span class="text-danger">{{ $errors->first('roleName') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" name="password" id="password" class="form-control"
                                                placeholder="Password">
                                            @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="confirm_Password">Confirm Password</label>
                                            <input type="password" name="confirm_Password" id="confirm_Password" class="form-control" placeholder="Retype password">
                                            @if ($errors->has('confirm_Password'))
                                            <span class="text-danger">{{ $errors->first('confirm_Password') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            <img src="{{ asset('assets/img/profile/'.$user[0]->image) }}" width="100px" />
                                            <input type="file" value="{{ $user[0]->image }}" name="image" class="form-control" id="image" placeholder="Upload Image">
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