


@extends('backend.master')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Cancelled Order List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Invoice Number</th>
                            <th>Product</th>
                            <th>Customer Info</th>
                            <th>Order Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cancelledOrders as $order)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $order->invoiceId }}</td>
                                <td>
                                    @foreach ($order->orderDetails as $details)
                                    <img src="{{ asset('backend/images/product/' . $details->product->image) }}" alt="Category Image" height="100" width="100"> <br>
                                        <strong>Product Name:</strong> {{ $details->product->name }} <br>
                                        <strong>Product Price:</strong> {{ $details->price }} <br>
                                        <strong>Product Quantity:</strong> {{ $details->qty }} <br>
                                    @endforeach
                                </td>
                                <td>
                                    <strong>Customer Name:</strong>{{ $order->c_name }}<br>
                                    <strong>Customer Phone:</strong>{{ $order->c_phone }}<br>
                                    <strong>Customer Address:</strong>{{ $order->address }}
                                </td>
                                <td>{{ $order->status }}</td>
                                <td>
                                    <a href="{{url('/admin/orders/status-confirmed/'.$order->id)}}" class="btn btn-primary">Confirm</a>
                                    <a href="{{url('/admin/orders/status-pending/'.$order->id)}}" class="btn btn-primary">Pending</a> {{-- not working this code --}}
                                    <a href="{{url('/admin/orders/status-delivered/'.$order->id)}}" class="btn btn-success">Delivered</a>
                                    <a href="{{url('/admin/orders/details/'.$order->id)}}" class="btn btn-info">Details</a>

                                 
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
