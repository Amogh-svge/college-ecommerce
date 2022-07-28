@extends('product-layout')

@section('main')
    <div class="site__body">
        <div class="page-header">
            <div class="page-header__container container">
                <div class="page-header__breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Search Results</a> <svg class="breadcrumb-arrow"
                                    width="6px" height="9px">
                                    <use xlink:href="/images/sprite.svg#arrow-rounded-right-6x9"></use>
                                </svg></li>
                            <li class="breadcrumb-item active">{{ $searchVal }} <svg class="breadcrumb-arrow" width="6px"
                                    height="9px">
                                </svg></li>

                        </ol>
                    </nav>
                </div>
                <div class="page-header__title">
                    <h1>{{ $searchVal }}</h1>
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
                                    @if (count($searchedItem) != 0)
                                        <div class="view-options__layout">
                                            <div class="layout-switcher">
                                                <div class="layout-switcher__list"><button data-layout="grid-3-sidebar"
                                                        data-with-features="false" title="Grid" type="button"
                                                        class="layout-switcher__button layout-switcher__button--active"><svg
                                                            width="16px" height="16px">
                                                            <use xlink:href="/images/sprite.svg#layout-grid-16x16"></use>
                                                        </svg></button> </div>
                                            </div>
                                        </div>
                                        <div class="view-options__legend">Showing {{ count($searchedItem) }} Results for
                                            "{{ $searchVal }}"</div>
                                        <div class="view-options__divider"></div>
                                    @else
                                        <h3 class=" mt-3 text-secondary">No results Found</h3>
                                    @endif
                                </div>
                            </div>

                            <div class="products-view__list products-list" data-layout="grid-3-sidebar"
                                data-with-features="false">
                                <div class="products-list__body">
                                    @foreach ($searchedItem as $item)
                                        <div class="products-list__item">
                                            <div class="product-card">
                                                <div class="product-card__badges-list">
                                                    <div class="product-card__badge product-card__badge--new">New</div>
                                                </div>
                                                <div class="product-card__image"><a href="product.html"><img
                                                            src="{{ asset('storage/images/thumbnails/' . $item->image) }}"
                                                            alt="no-image"></a></div>
                                                <div class="product-card__info">
                                                    <div class="product-card__name"><a
                                                            href="/products/{{ $item->id }}">{{ ucwords(strip_tags(substr($item->prod_name, 0, 24))) }}
                                                            @if (strlen($item->prod_name) > 26)
                                                                ...
                                                            @endif
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product-card__actions">
                                                    <div class="product-card__prices">Rs. {{ $item->price }}</div>
                                                    <div class="product-card__buttons">
                                                        <form action="{{ route('cart.store') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="product_id"
                                                                value="{{ $item->id }}">
                                                            <input type="hidden" name="quantity" value="2">
                                                            <a class="btn btn-primary product-card__addtocart" type="button"
                                                                href="#"
                                                                onclick="event.preventDefault(); this.closest('form').submit();">
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
                                    {!! $searchedItem->links() !!}
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
