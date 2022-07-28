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
                                    <use xlink:href="/images/sprite.svg#arrow-rounded-right-6x9"></use>
                                </svg></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ 'Cart' }}</li>
                        </ol>
                    </nav>
                </div>
                <div class="page-header__title">
                    <h1>{{ 'Add to cart' }}</h1>
                    @if ($message = Session::get('success'))
                        <h6 class=" mt-3 text-success">{{ $message }}</h6>
                    @else
                        @php
                            $message = Session::get('failure');
                        @endphp
                        <h6 class=" mt-3 text-danger">{{ $message }}</h6>
                    @endif
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>

        <div class="cart block">
            <div class="container">
                <table class="cart__table cart-table">
                    <thead class="cart-table__head">
                        <tr class="cart-table__row">
                            <th class="cart-table__column cart-table__column--image">
                                Image
                            </th>
                            <th class="cart-table__column cart-table__column--product">
                                Product
                            </th>
                            <th class="cart-table__column cart-table__column--price">
                                Price
                            </th>
                            <th class="cart-table__column cart-table__column--quantity">
                                Quantity
                            </th>
                            <th class="cart-table__column cart-table__column--total">
                                Total
                            </th>
                            <th class="cart-table__column cart-table__column--remove"></th>
                        </tr>
                    </thead>
                    <tbody class="cart-table__body">
                        @if (count($orders) > 0)
                            @foreach ($orders as $key => $item)
                                <tr class="cart-table__row">
                                    <td class="cart-table__column cart-table__column--image">
                                        <a href="#"><img src="{{ asset('storage/images/thumbnails/' . $item->image) }}"
                                                alt="" /></a>
                                    </td>
                                    <td class="cart-table__column cart-table__column--product">
                                        <a href="/products/{{ $item->product_id }}" class="cart-table__product-name">
                                            {{ $item->prod_name }}</a>
                                        <ul class="cart-table__options">
                                            <li>Color: Yellow</li>
                                            <li>Material: Aluminium</li>
                                        </ul>
                                    </td>
                                    <td class="cart-table__column cart-table__column--price" data-title="Price">
                                        Rs. {{ $item->price }}
                                    </td>
                                    <td class="cart-table__column cart-table__column--quantity" data-title="Quantity">
                                        <div class="input-number">
                                            <form action="{{ route('updateCart') }}" class="changeQuantity" method="post">
                                                @csrf
                                                <input type="hidden" name="product_id" value={{ $item->product_id }}>
                                                <input class="form-control" type="number" min="1" onblur="event.preventDefault();
                                                                                        setTimeout(() => {
                                                                                            this.closest('form').submit();
                                                                                        }, 500);"
                                                    value="{{ $item->quantity }}" name="cart_quantity"
                                                    id={{ $key }} />
                                            </form>
                                        </div>
                                    </td>
                                    <td class="cart-table__column cart-table__column--total" data-title="Total">
                                        Rs. {{ $item->total }}
                                    </td>
                                    <td class="cart-table__column cart-table__column--remove">
                                        <form action={{ route('cart.destroy', $item->product_id) }} method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-light btn-sm btn-svg-icon">
                                                <svg width="12px" height="12px">
                                                    <use xlink:href="images/sprite.svg#cross-12"></use>
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="cart-table__row">
                                <td class="cart-table__column" colspan="6">
                                    No Items In Your Cart.
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                <div class="cart__actions">
                    @php
                        $order_id = Session('order_id');
                    @endphp
                    <div class="cart__buttons">
                        <a href="{{route('shop')}}" class="btn btn-light">Continue Shopping</a>
                        {{-- @if (count($orders) > 0)
                            <form action="{{ route('cart.update', $order_id) }}" method="POST">
                                @csrf
                                @method('put')
                                <input type="hidden" value="1" name="quant">
                                <input type="submit" value="Update Cart" class="btn btn-primary cart__update-button">
                            </form>
                        @endif --}}
                    </div>
                </div>


                @if (count($orders) > 0)
                    @foreach ($order_total as $item)
                        <div class="row justify-content-end pt-5">
                            <div class="col-12 col-md-7 col-lg-6 col-xl-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">Cart Totals</h3>
                                        <table class="cart__totals">
                                            <thead class="cart__totals-header">
                                                <tr>
                                                    <th>Subtotal</th>
                                                    <td> Rs. {{ $item->sub_total }} </td>
                                                </tr>
                                            </thead>
                                            <tbody class="cart__totals-body">
                                                <tr>
                                                    <th>Shipping</th>
                                                    <td>
                                                        Rs. {{ $item->shipping_price }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Discount</th>
                                                    <td>Rs. 0.00</td>
                                                </tr>
                                            </tbody>
                                            <tfoot class="cart__totals-footer">
                                                <tr>
                                                    <th>Total</th>
                                                    <td>Rs. {{ $item->total_price }}</td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        <a class="btn btn-primary btn-xl btn-block cart__checkout-button"
                                            href={{ route('checkout.create') }}>Proceed to checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

    </div>
@endsection
