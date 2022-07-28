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
                            <li class="breadcrumb-item active">Categories <svg class="breadcrumb-arrow" width="6px"
                                    height="9px">
                                </svg></li>

                        </ol>
                    </nav>
                </div>
                <div class="page-header__title">
                    <h1> Categories </h1>
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
                                        <div class="layout-swit cher">
                                            <div class="layout-switcher__list"><button data-layout="grid-3-sidebar"
                                                    data-with-features="false" title="Grid" type="button"
                                                    class="layout-switcher__button layout-switcher__button--active"><svg
                                                        width="16px" height="16px">
                                                        <use xlink:href="/images/sprite.svg#layout-grid-16x16"></use>
                                                    </svg></button> </div>
                                        </div>
                                    </div>
                                    <div class="view-options__legend">All Categories
                                    </div>
                                    <div class="view-options__divider"></div>
                                </div>
                            </div>

                            <div class="products-view__list products-list" data-layout="grid-3-sidebar"
                                data-with-features="false">
                                <div class="products-list__body">
                                    @foreach ($allCategories as $item)
                                        <div class="products-list__item">
                                            <div class="product-card">
                                                <div class="product-card__image"><a
                                                        href="/categories/{{ $item->id }}"><img
                                                            src="{{ asset('storage/images/thumbnails/' . $item->image) }}"
                                                            alt="no-image"></a></div>
                                                <div class="product-card__info">
                                                    <h3 class="product-card__name"><a
                                                            href="/categories/{{ $item->id }}">{{ $item->name }}</a>
                                                    </h3>
                                                    <div class="product-card__name"> {{strip_tags(substr($item->description, 0, 100))}}...
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                {{-- <ul class="pagination justify-content-center mt-5">
                                    {!! $searchedItem->links() !!}
                                </ul> --}}
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
