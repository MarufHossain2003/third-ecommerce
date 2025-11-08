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
                            <th>Applicant Name</th>
                            <th>Applicant Phone</th>
                            <th>Applicant Email Id</th>
                            <th>Applicant Address</th>
                            <th>Coures</th>
                            <th>Registration Time</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($applicants as $applicant)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{$applicant->name}}</td>
                                <td>{{ $applicant->phone }}</td>
                                <td>{{ $applicant->email }}</td>
                                <td>{{ $applicant->address }}</td>
                                <td>{{ $applicant->course_name }}</td>
                                <td>{{ $applicant->created_at }}</td>
                                <td>
                                    <a href="{{url('/admin/product/edit/'.$applicant->id)}}" class="btn btn-info">Edit</a>
                                    <a href="{{url('/admin/product/delete/'.$applicant->id)}}" onclick=" return confirm('Are you sure?')" class="btn btn-danger">Delete</a>
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

@push('script')
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endpush
