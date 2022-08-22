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
                @foreach ($orders as $key => $item)
                    <div class="card shadow mb-4">
                        <!-- Card Header - Accordion -->
                        <a href="#collapseCardExample{{ $key }}" style="background: #979695d7"
                            class="d-flex justify-content-xl-between card-header py-3 " data-toggle="collapse"
                            role="button" aria-expanded="true" aria-controls="collapseCardExample">
                            <h6 class=" font-weight-bold text-dark card_size_reducer"> #{{ $key + 1 }}</h6>
                            <h6 class=" font-weight-bold text-dark card_size_reducer"> Order_Date:
                                {{ Carbon::parse($item->created_at)->isoFormat('LL') }}</h6>
                            <h6 class=" font-weight-bold text-dark card_size_reducer">Status: Not Delivered
                            </h6>

                            <h6 class=" font-weight-bold text-dark card_size_reducer">Total: Rs. {{ $item->total_price }}
                            </h6>
                        </a>
                        <!-- Card Content - Collapse -->
                        <div class="collapse " id="collapseCardExample{{ $key }}">
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <th>S.N.</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                    </thead>
                                    @foreach ($item->orderItem as $key => $items)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $items->product->prod_name }}</td>
                                            <td>quantity: {{ $items->quantity }}</td>
                                            <td>Rs. {{ $items->product_price }}</td>
                                        </tr>
                                    @endforeach


                                </table>
                            </div>
                        </div>
                    </div>
                @endforeach

                @if (count($orders) == 0)
                    <div class="alert alert-dark" role="alert">
                        No Order History
                    </div>
                @endif
            </div>
        </div>

    </div>
@endsection
