@extends('backend.master')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Order Details</h3>
            </div>
            <!-- /.card-header -->
            {{-- <div class="card-body"> --}}
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ url('/admin/orders/update/' . $order->id) }}" method="POST" class="form-control">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 card">
                                <div>
                                    <label for="invoiceID">Invoice Number</label>
                                    <input type="text" value="{{ $order->invoiceId }}" class="form-control"
                                        name="invoiceId" readonly>
                                </div>
                                <div class="mt-2">
                                    <label for="c_name">Customer Name</label>
                                    <input type="text" class="form-control" name="c_name" value="{{ $order->c_name }}">
                                </div>
                                <div class="mt-2">
                                    <label for="c_phone">Customer Phone Number</label>
                                    <input type="text" class="form-control" name="c_phone" value="{{ $order->c_phone }}">
                                </div>
                                <div class="mt-2">
                                    <label for="email">Customer Email</label>
                                    <input type="email" class="form-control" name="email" value="{{ $order->email }}">
                                </div>
                                <div class="mt-2">
                                    <label for="address">Customer Address</label>
                                    <textarea name="address" class="form-control">{{ $order->address }}</textarea>
                                </div>
                                <div class="mt-2">
                                    <label for="area">Area</label>
                                    @php
                                        if ($order->area == 80) {
                                            $location = 'Inside Dhaka';
                                        } else {
                                            $location = 'Outside Dhaka';
                                        }
                                    @endphp
                                    <input type="text" class="form-control" name="area" value="{{ $location }}"
                                        readonly>
                                </div>
                                <div class="mt-2 mb-3">
                                    <label for="address">Courier</label>
                                    <select name="courier_name" id="courier_name" class="form-control"
                                        onchange="otherCourier()">
                                        <option selected disabled>Select Courier</option>
                                        <option value="steadfast" @if ($order->courier_name == 'steadfast') selected @endif>
                                            Steadfast</option>
                                        <option value="others" @if ($order->courier_name != 'steadfast') selected @endif>Other
                                        </option>
                                    </select>
                                </div>
                                @if ($order->courier_name != 'steadfast')
                                    <div class="mt-2 mb-3"  id="others_courier">
                                        <label for="others_courier">Other Courier</label>
                                        <textarea name="others_courier" class="form-control">{{ $order->courier_name }}</textarea>
                                    </div>
                                    @else
                                    <div class="mt-2 mb-3" style="display: none" id="others_courier">
                                        <label for="others_courier">Other Courier</label>
                                        <textarea name="others_courier" class="form-control">{{ $order->courier_name }}</textarea>
                                    </div>
                                @endif


                            </div>
                            <div class="col-md-6 card">
                                @foreach ($order->orderDetails as $details)
                                    <img src="{{ asset('backend/images/product/' . $details->product->image) }}"
                                        alt="Category Image" height="100" width="100"> <br>
                                    <strong>Product Name:</strong> {{ $details->product->name }} <br>
                                    <strong>Product Price:</strong> {{ $details->price }} <br>
                                    <strong>Product Quantity:</strong> {{ $details->qty }} <br>
                                @endforeach

                                <div class="mt-2">
                                    <label for="price">Order Price</label>
                                    <input type="text" name="price" class="form-control mt-2"
                                        value="{{ $order->price }}">
                                </div>
                                <button type="submit" class="btn btn-success mt-2">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{-- </div> --}}
            <!-- /.card-body -->
        </div>
    </div>
@endsection

@push('script')
    <script>
        function otherCourier() {
            let courierName = document.getElementById('courier_name').value;

            if (courierName == 'others') {
                document.getElementById('others_courier').style.display = 'inline';
            } else {
                document.getElementById('others_courier').style.display = 'none';
            }

        }
    </script>
@endpush
