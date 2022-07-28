@extends('admin.dashboard_layout')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Order History</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary">Orders</h5>
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
                @if (count($items) > 0)
                    @foreach ($items as $key => $item)
                        <div class="card shadow mb-4">
                            <!-- Card Header - Accordion -->
                            <a href="#collapseCardExample{{ $key }}"
                                class="d-flex justify-content-xl-between card-header py-3 bg-gradient-primary"
                                data-toggle="collapse" role="button" aria-expanded="true"
                                aria-controls="collapseCardExample{{ $key }}">
                                <?php
                                $total_order_price = 0;
                                foreach ($item as $object) {
                                    if ($object->id == $key) {
                                        $total_order_price += intval($object->total);
                                    }
                                }
                                ?>

                                @foreach ($item as $order)
                                    @if ($order->id == $key)
                                        <h6 class="m-0 font-weight-bold text-light"> #{{ $order->id }}</h6>
                                        <h6 class="m-0 font-weight-bold text-light"> User-id: {{ $order->id }}</h6>
                                        <h6 class="m-0 font-weight-bold text-light">
                                            {{ Carbon::parse($order->product->created_at)->format('M d Y') }}</h6>
                                        @if ($order->vendor_status == 'not_approved')
                                            <h6 class="m-0 font-weight-bold text-light">Status: Not Delivered
                                            </h6>
                                        @else
                                            <h6 class="m-0 font-weight-bold text-light">Status: Delivered
                                            </h6>
                                        @endif

                                        <h6 class="m-0 font-weight-bold text-light">Total: Rs. {{ $total_order_price }}
                                        </h6>
                                        <?php break; ?>
                                    @endif
                                @endforeach
                            </a>
                            <!-- Card Content - Collapse -->
                            <div class="collapse " id="collapseCardExample{{ $key }}">
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        @foreach ($item as $order)
                                            <tr>
                                                <td>{{ $order->product->prod_name }}</td>
                                                <td>quantity: {{ $order->quantity }}</td>
                                                <td>Rs. {{ $order->total }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="alert alert-info">No History Available</div>
                @endif


            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
