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
                                <h3 class="card-title">Creat Subcategory</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{url('/admin/sub-category/store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Select Category</label>
                                        <select name="cat_id" id="cat_id" class="form-control" >
                                            <option value="" selected disabled>Select Category</option>
                                            @foreach ($categories as $category)
                                              <option value="{{$category->id}}">{{$category->name}}</option>  
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Subcategory Name</label>
                                        <input type="text" name="name" class="form-control" id="name"
                                            placeholder="Enter Category Name">
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
