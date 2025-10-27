
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
                                <h3 class="card-title">Employee Create</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{url('/admin/employee-store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control" id="name"
                                            placeholder="Enter Empolyee Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone (optional)</label>
                                        <input type="text" name="phone" class="form-control" id="phone"
                                            placeholder="Enter Empolyee Phobe Numbre">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address (optional)</label>
                                        <textarea name="address" id="address" class="form-control" placeholder="Employee Address"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" id="email"
                                            placeholder="Enter Empolyee Email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="text" name="password" class="form-control" id="password"
                                            placeholder="Enter Empolyee Password" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Image (optional)</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="image" class="custom-file-input" id="image" accept="image/*">
                                                <label class="custom-file-label" for="image">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <!-- /.card -->
@endsection
