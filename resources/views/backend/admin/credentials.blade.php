
@extends('backend.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Update Credentials</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ url('/admin/credentials/update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{$authUser->email}}" id="email"
                                        placeholder="Enter email" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="old_password">Old Password</label>
                                    <input type="text" name="old_password" class="form-control" value="" id="old_password"
                                        placeholder="Enter old password" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">New Password</label>
                                    <input type="text" name="password" class="form-control" value="" id="password"
                                        placeholder="Enter new password" required>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Ubdate</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- /.card -->
@endsection


