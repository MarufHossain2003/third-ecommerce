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
                            <th>Product Image</th>
                            <th>Product Name</th>
                            <th>Category Name</th>
                            <th>Quantity</th>
                            <th>Buy Price</th>
                            <th>Regular Price</th>
                            <th>Discount Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>
                                    <img src="{{url('backend/images/product/'.$product->image)}}" alt="Product Image" height="100" width="100" >
                                </td>
                                <td>{{$product->name}}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->qty }}</td>
                                <td>{{ $product->buy_price }}</td>
                                <td>{{ $product->regular_price }}</td>
                                <td>{{ $product->discount_price }}</td>
                                <td>
                                    <a href="{{url('/admin/product/edit/'.$product->id)}}" class="btn btn-info">Edit</a>
                                    <a href="{{url('/admin/product/delete/'.$product->id)}}" onclick=" return confirm('Are you sure?')" class="btn btn-danger">Delete</a>
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
