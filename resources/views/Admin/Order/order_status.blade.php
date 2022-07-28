@extends('admin.dashboard_layout')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Order_Status</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Orders</h6>
                @if ($message = Session::get('success'))
                    <h6 class=" mt-3 text-success">{{ $message }}</h6>
                @else
                    @php
                        $message = Session::get('failure');
                    @endphp
                    <h6 class=" mt-3 text-danger">{{ $message }}</h6>
                @endif
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                            <tr>
                                <th>S.N</th>
                                <th>User_id</th>
                                <th>UserName</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Order_id</th>
                            </tr>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>S.N</th>
                                <th>User_id</th>
                                <th>UserName</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Order_id</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            @foreach ($pending_orders as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->user_id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->prod_name }}</td>
                                    <td>Rs. {{ $item->product_price }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>Rs. {{ $item->total }}</td>
                                    <td><a href="#"><i class="fas fa-check fa-lg mr-2"
                                                style="color:rgb(49, 197, 49);"></i></a>|<a href="#"><i
                                                class="fas fa-times fa-lg ml-2" style="color:red;"></i></a></td>
                                    @if ($item->order_id == session('previous_order_id'))
                                        <td>{{ $item->order_id }}</td>
                                    @else
                                        <td>{{ $item->order_id }}</td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
