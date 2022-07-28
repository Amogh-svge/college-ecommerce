@extends('product-layout')
@section('main')
    <div class="site__body">
        <div class="page-header">
            <div class="page-header__container container">
                <div class="page-header__breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a> <svg class="breadcrumb-arrow" width="6px"
                                    height="9px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                                </svg></li>
                            <li class="breadcrumb-item active" aria-current="page">Checkout-Success</li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>
        <div class="checkout block">
            <div class="container">
                <div class="row">
                    @if ($checkout != null)
                        <div class="col-12 mb-3">
                            <div class="alert alert-lg alert-primary">
                                <center><i class="fas fa-check-circle fa-3x mb-2" style="color: green;"></i>
                                    <h4>Thank you for your purchase !</h4>
                                </center>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-7">
                            <div class="card mb-lg-0">
                                <div class="card-body">
                                    <h3 class="card-title">Billing details</h3>
                                    <p><b>Name:</b> {{ $checkout->Name }}</p>
                                    <p><b>Location:</b>
                                        {{ $checkout->street_address . ', ' . $checkout->city . ', ' . $checkout->country }}
                                    </p>
                                    <p><b>Email:</b> {{ $checkout->email }}</p>
                                    <p><b>Tel:</b> {{ $checkout->phone }}</p>
                                    <h5 class="card-title">Payment Method</h5>
                                    <p>Cash on Delivery</p>
                                </div>
                                <div class="card-divider"></div>
                                <div class="card-body">
                                    <h3 class="card-title">Shipping Details</h3>
                                    <p><b>Shipping
                                            Address:
                                        </b>{{ $checkout->street_address . ', ' . $checkout->city . ', ' . $checkout->country }}
                                    </p>

                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-5 mt-4 mt-lg-0">
                            <div class="card mb-0">
                                <div class="card-body">
                                    <h3 class="card-title">Your Order</h3>
                                    <table class="checkout__totals">
                                        <thead class="checkout__totals-header">
                                            <tr>
                                                <th>Product</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody class="checkout__totals-products">
                                            @foreach ($order as $orders)
                                                <tr>
                                                    <td>{{ $orders->prod_name }} × {{ $orders->quantity }}</td>
                                                    <td>Rs. {{ $orders->total }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tbody class="checkout__totals-subtotals">
                                            <tr>
                                                <th>Subtotal</th>
                                                <td>Rs. {{ $orders->sub_total }}</td>
                                            </tr>
                                            <tr>
                                                <th>Shipping</th>
                                                <td>Rs. 25.00</td>
                                            </tr>
                                        </tbody>
                                        <tfoot class="checkout__totals-footer">
                                            <tr>
                                                <th>Total</th>
                                                <td>Rs. {{ $orders->total_price }}</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <h6>Order Date: {{ Carbon::parse($checkout->created_at)->isoFormat('LL') }}</h6>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-12 mb-3">
                            <div class="alert alert-lg alert-primary">
                                <center>
                                    <i class="fas fa-times-circle fa-3x mb-2" style="color: red;"></i>
                                    <h4>No Products purchased yet!</h4>
                                </center>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
