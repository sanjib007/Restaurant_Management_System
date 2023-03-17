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
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">User Role</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="{{ route('role.post') }}" method="POST">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="name">Role name</label>
                                            <input type="text" name="name" class="form-control" id="name"
                                                placeholder="Enter Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Role Details</label>
                                            <textarea type="text" name="description" class="form-control"
                                                id="description" placeholder="Role Description"></textarea>
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
                                    <h3 class="card-title">Insert Food Catagory</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    @if($roles != null)
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Role Name</th>
                                                    <th>Detais</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-border-bottom-0">
                                                @foreach ($roles as $aRole)
                                                <tr>
                                                    <td>{{ $aRole->name }}</td>
                                                    <td>{{ $aRole->description }}</td>
                                                    <td>
                                                        <a href="{{ route('role.edit', $aRole->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                                        <a href="{{ route('role.delete', $aRole->id) }}" class="btn btn-danger"><i class="fa fa-times"></i></a>
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
                                    <h3 class="card-title">User Insert</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="{{ route('register.post') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" id="name" class="form-control"
                                                placeholder="Full name" required>
                                            @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email address</label>
                                            <input type="email" name="email" id="email" class="form-control"
                                                placeholder="Email" required>
                                            @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" name="password" id="password" class="form-control"
                                                placeholder="Password" required>
                                            @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="confirm_Password">Confirm Password</label>
                                            <input type="password" name="confirm_Password" id="confirm_Password" class="form-control" placeholder="Retype password" required>
                                            @if ($errors->has('confirm_Password'))
                                            <span class="text-danger">{{ $errors->first('confirm_Password') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="roleName">Role</label>
                                            <select class="form-control select2bs4" name="roleName" style="width: 100%;">
                                                <option value="" selected="selected">Select A Role</option>
                                                @foreach ($roles as $arole)
                                                    <option value="{{ $arole->name }}">{{ $arole->name }}</option>
                                                @endforeach
                                              </select>
                                            @if ($errors->has('roleName'))
                                            <span class="text-danger">{{ $errors->first('roleName') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            {{-- <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="image" class="custom-file-input" id="image">
                                                    <label class="custom-file-label" for="image"></label>                                                    
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                            </div> --}}
                                            <input type="file" name="image" class="form-control" id="image" placeholder="Upload Image">
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
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
                                    <h3 class="card-title">Users </h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    @if($users != null)
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Role</th>
                                                    <th>Image</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-border-bottom-0">
                                                @foreach ($users as $aUser)
                                                <tr>
                                                    <td>{{ $aUser->userName }}</td>
                                                    <td>{{ $aUser->email }}</td>
                                                    <td>{{ $aUser->roleName }}</td>
                                                    <td>
                                                        <img style="width: 20px;"
                                                            src="{{ asset('assets/img/profile/'.($aUser->image == '' ? 'avatar.png' : $aUser->image)) }}" alt="Item">
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('user.edit', $aUser->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                                        ||
                                                        <a href="{{ route('user.delete', $aUser->id)  }}" class="btn btn-danger"><i class="fa fa-times"></i></a>
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
                                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                                    </ul>
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

@stop