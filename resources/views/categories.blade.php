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
                            <li class="breadcrumb-item">
                                <a href="/categories">Categories</a> <svg class="breadcrumb-arrow" width="6px"
                                    height="9px">
                                    <use xlink:href="/images/sprite.svg#arrow-rounded-right-6x9"></use>
                                </svg>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $cat_id->name }}</li>
                        </ol>
                    </nav>
                </div>
                <div class="page-header__title">
                    <h1>{{ $cat_id->name }}</h1>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="shop-layout shop-layout--sidebar--start">

                <div class="shop-layout__content">
                    <div class="block">
                        <div class="products-view">
                            <div class="products-view__options">
                                <div class="view-options">
                                    <div class="view-options__layout">
                                        <div class="layout-switcher">
                                            <div class="layout-switcher__list"> <button data-layout="list"
                                                    data-with-features="false" title="List" type="button"
                                                    class="layout-switcher__button"><svg width="16px" height="16px">
                                                        <use xlink:href="/images/sprite.svg#layout-list-16x16"></use>
                                                    </svg></button></div>
                                        </div>
                                    </div>
                                    <div class="view-options__legend">Showing {{ count($AllProducts) }} Products</div>
                                    <div class="view-options__divider"></div>

                                </div>
                            </div>

                            <div class="products-view__list products-list" data-layout="list" data-with-features="false">
                                <div class="products-list__body">
                                    @foreach ($AllProducts as $item)
                                        <div class="products-list__item">
                                            <div class="product-card">
                                                <div class="product-card__badges-list">
                                                    <div class="product-card__badge product-card__badge--new">New</div>
                                                </div>
                                                <div class="product-card__image"><a href="/products/{{ $item->id }}"><img
                                                            src="{{ asset('storage/images/' . $item->image) }}"
                                                            alt="no-image"></a></div>
                                                <div class="product-card__info">
                                                    <div class="product-card__name"><a
                                                            href="/products/{{ $item->id }}"><b>{{ $item->prod_name }}</b></a>
                                                    </div>

                                                    <div class="product-card__features-list">
                                                        {{ $item->short_desc }}

                                                    </div>
                                                </div>
                                                <div class="product-card__actions">
                                                    <div class="product-card__availability">Availability: <span
                                                            class="text-success">In Stock</span></div>
                                                    <div class="product-card__prices">Rs. {{ $item->price }}</div>
                                                    <div class="product-card__buttons">
                                                        <form action="{{ route('cart.store') }}"
                                                            class="btn btn-primary product-card__addtocart product-card__addtocart--list"
                                                            method="post">
                                                            @csrf
                                                            <input type="hidden" name="product_id"
                                                                value="{{ $item->id }}">
                                                            <input type="hidden" name="quantity" value="1">
                                                            <a type="button"
                                                                onclick="event.preventDefault(); this.closest('form').submit();"
                                                                href="#" style="color: rgb(39, 30, 30)">
                                                                Add To Cart
                                                            </a>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <ul class="pagination justify-content-center mt-5">
                                    {!! $AllProducts->links() !!}
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>

                <!--sidebar-->
                @include('includes/sidebar')
                <!--sidebar end-->
            </div>

        </div>

    </div>
@endsection
