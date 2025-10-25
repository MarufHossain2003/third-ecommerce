@extends('backend.master')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($empolyees as $employee)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>
                                    <img src="{{ asset('backend/images/user/' . $employee->image) }}" alt="Employee Image" style="width: 50px; height: 50px;">
                                </td>
                                <td>{{ $employee->name }}</td>
                                <td>{{ $employee->phone }}</td>
                                <td>{{ $employee->email}}</td>
                                <td>
                                    <a href="{{url('/admin/employee-edit/{id}'.$employee->id)}}" class="btn btn-info">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection

