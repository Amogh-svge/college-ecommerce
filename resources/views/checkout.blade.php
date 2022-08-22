@extends('product-layout')
@section('main')
    <!-- site__body start -->
    <div class="site__body">
        <div class="page-header">
            <div class="page-header__container container">
                <div class="page-header__breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a> <svg class="breadcrumb-arrow"
                                    width="6px" height="9px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                                </svg></li>
                            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                        </ol>
                    </nav>
                </div>
                <div class="page-header__title">
                    <h1>Checkout</h1>
                </div>
            </div>
        </div>

        <div class="checkout block">
            <div class="container">
                @if ($order_total != null && $orderItems != null)
                    @if (Auth::check() == 0)
                        <div class="col-12 mb-3">
                            <div class="alert alert-lg alert-primary">Customer should be logged in.
                                <a href="#">Click here to login</a>
                            </div>
                        </div>
                    @endif
                    <form class="row" method="POST" action={{ route('checkout.store') }}>
                        @csrf
                        <div class="col-12 col-lg-6 col-xl-7">
                            <div class="card mb-lg-0">
                                <div class="card-body">
                                    <h3 class="card-title">Billing details</h3>
                                    <div class="form-row">
                                        <div class="form-group col-md-6"><label for="name">Full Name</label>
                                            <input type="text" class="form-control" id="Name" name="Name"
                                                value="{{ old('Name') }}" placeholder="Full Name"
                                                @error('Name') style="border-color: red;" @enderror>
                                            @error('Name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6"><label for="email">Email address</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="Email address" value={{ Auth::user()->email }} readonly
                                                @error('email') style="border-color: red;" @enderror>
                                            @error('email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group"><label for="country">Country</label>
                                        <select id="country" name="country" class="form-control">
                                            <option value="Nepal" selected
                                                @error('country') style="border-color: red;" @enderror>
                                                Nepal</option>
                                        </select>
                                        @error('country')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group"><label for="state">State</label>
                                        <input type="text" class="form-control" id="state" name="state"
                                            placeholder="State" value="{{ old('state') }}"
                                            @error('state') style="border-color: red;" @enderror>
                                        @error('state')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group"><label for="city">Town / City</label> <input type="text"
                                            class="form-control" id="city" name="city" placeholder="Town / City"
                                            value="{{ old('city') }}" @error('city') style="border-color: red;" @enderror>
                                        @error('city')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group"><label for="street_address">Street Address</label>
                                        <input type="text" class="form-control" id="street_address" name="street_address"
                                            value="{{ old('street_address') }}" placeholder="Street Address"
                                            @error('street_address') style="border-color: red;" @enderror>
                                        @error('street_address')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6"><label for="phone">Phone</label>
                                            <input type="tel" class="form-control" id="phone" name="phone"
                                                placeholder="977-0123456789" pattern="[977]{3}-[0-9]{10}"
                                                value="{{ old('phone') }}"
                                                @error('phone') style="border-color: red;" @enderror>
                                            @error('phone')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="card-divider"></div>
                                <div class="card-body">
                                    <div class="form-group"><label for="order_notes">Order notes <span
                                                class="text-muted">(Optional)</span></label>
                                        <textarea id="order_notes" name="order_notes" class="form-control" rows="4">{{ old('order_notes') }}</textarea>
                                    </div>
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
                                            @foreach ($orderItems as $item)
                                                <tr>
                                                    <td>{{ $item->prod_name }} × {{ $item->quantity }}</td>
                                                    <td>Rs. {{ $item->total }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tbody class="checkout__totals-subtotals">

                                            <tr>
                                                <th>Subtotal</th>
                                                <td>Rs. {{ $item->sub_total }}</td>
                                            </tr>
                                            <tr>
                                                <th>Shipping</th>
                                                <td>Rs. {{ $item->shipping_price }}</td>
                                            </tr>
                                        </tbody>
                                        <tfoot class="checkout__totals-footer">
                                            <tr>
                                                <th>Total</th>
                                                <td>Rs. {{ $item->total_price }}</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <div class="payment-methods">
                                        <ul class="payment-methods__list">
                                            <li class="payment-methods__item"><label
                                                    class="payment-methods__item-header"><span
                                                        class="payment-methods__item-radio input-radio"><span
                                                            class="input-radio__body"><input class="input-radio__input"
                                                                name="checkout_payment_method" type="radio" checked> <span
                                                                class="input-radio__circle"></span> </span></span><span
                                                        class="payment-methods__item-title">Cash on
                                                        delivery</span></label>
                                                <div class="payment-methods__item-container">
                                                    <div class="payment-methods__item-description">Pay with
                                                        cash upon delivery.</div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="checkout__agree form-group">
                                        <div class="form-check"><span class="form-check-input input-check"><span
                                                    class="input-check__body"><input class="input-check__input"
                                                        type="checkbox" id="checkout-terms"> <span
                                                        class="input-check__box"></span> <svg class="input-check__icon"
                                                        width="9px" height="7px">
                                                        <use xlink:href="images/sprite.svg#check-9x7"></use>
                                                    </svg> </span></span><label class="form-check-label"
                                                for="checkout-terms">I
                                                have read and agree to the website <a target="_blank"
                                                    href="terms-and-conditions.html">terms and
                                                    conditions</a>*</label></div>
                                    </div><input type="submit" class="btn btn-primary btn-xl btn-block" value="Place Order">
                                </div>
                            </div>
                        </div>
                    </form>
                @else
                    <div class="col-12 mb-3">
                        <div class="alert alert-lg alert-primary">  
                            <center>
                                <i class="fas fa-times-circle fa-3x mb-2" style="color: red;"></i>
                                <h4>No Products Ordered yet!</h4>
                            </center>
                        </div>
                    </div>
                @endif
            </div>
        </div>


    </div>
    <!-- site__body / end -->
@endsection
