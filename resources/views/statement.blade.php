@extends('product-layout')
@section('main')
    <div class="site__body">
        <div class="page-header__container container">
            <div class="page-header__breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/">Home</a>
                            <svg class="breadcrumb-arrow" width="6px" height="9px">
                                <use xlink:href="/images/sprite.svg#arrow-rounded-right-6x9"></use>
                            </svg>
                        </li>

                        <li class="breadcrumb-item active" aria-current="page">
                            Statement
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="page-header__title">
                <h1>Statement</h1>
            </div>
        </div>
        <div class="block">
            <div class="container">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Accordion -->
                        <a href="#collapseCardExample"
                        style="background: rgb(140, 231, 155);"
                            class="d-flex justify-content-xl-between card-header py-3 " 
                            data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                            <h6 class="m-0 font-weight-bold text-dark"> #1</h6>
                            <h6 class="m-0 font-weight-bold text-dark"> User-id: 2</h6>
                            <h6 class="m-0 font-weight-bold text-dark"> 2057/08/22</h6>
                            <h6 class="m-0 font-weight-bold text-dark">Status: Not Delivered
                            </h6>
                            <h6 class="m-0 font-weight-bold text-dark">Total: Rs. 2500
                            </h6>
                        </a>
                        <!-- Card Content - Collapse -->
                        <div class="collapse " id="collapseCardExample">
                            <div class="card-body">
                                <table class="table table-bordered">
                                        <thead>
                                            <th>Product Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                        </thead>
                                        <tr>
                                            <td>stroyka</td>
                                            <td>quantity: 2</td>
                                            <td>Rs. 2500</td>
                                        </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    {{-- @foreach ($orders as $order)
                                @foreach ($order->orderItem as $item)
                                    <td class="">
                                        <li> <a href="#"
                                                class="wishlist__product-name">{{ $item->product->prod_name }}</a></li>
                                    </td>
                                @endforeach
                        @endforeach --}}

                </table>
            </div>
        </div>

    </div>
@endsection
