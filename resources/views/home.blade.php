@extends('product-layout')

@section('main')
    <div class="site__body">
        <!-- .main-slideshow -->
        <div class="block-slideshow block-slideshow--layout--with-departments block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12  offset-lg-1">
                        <div class="block-slideshow__body">
                            <div class="owl-carousel ">
                                <div class="block-slideshow__slide" href="#">
                                    <div class="block-slideshow__slide-image block-slideshow__slide-image--desktop"
                                        style="background-image: url('images/slides/pic1.png');">
                                    </div>
                                    <div class="block-slideshow__slide-image block-slideshow__slide-image--mobile"
                                        style="background-image: url('images/slides/pic1-half.png');">
                                    </div>
                                    <div class="block-slideshow__slide-content">
                                        <div class="block-slideshow__slide-title" style="color:whitesmoke">
                                            Get Exciting Offers<br />
                                            on
                                        </div>
                                        <div class="block-slideshow__slide-text" style="color:whitesmoke">
                                            Laptops, Desktops, Headsets,<br />
                                            Mobile-Phones.
                                        </div>
                                        <div class="block-slideshow__slide-button">
                                            <a href="/products/23" class="btn btn-primary btn-lg">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-slideshow__slide" href="#">
                                    <div class="block-slideshow__slide-image block-slideshow__slide-image--desktop"
                                        style="background-image: url('images/slides/pic2.png');">
                                    </div>
                                    <div class="block-slideshow__slide-image block-slideshow__slide-image--mobile"
                                        style="background-image: url('images/slides/pic2-half.png');">
                                    </div>
                                    <div class="block-slideshow__slide-content">
                                        <div class="block-slideshow__slide-title">
                                            Pandora Ryzen
                                        </div>
                                        <div class="block-slideshow__slide-text">
                                            AMD Ryzen 7 5700U
                                            AN ULTRA THIN AND <br> PORTABLE LAPTOP” <br />WITH 14 FULL HD IPS DISPLAY.
                                        </div>
                                        <div class="block-slideshow__slide-button">
                                            <span class="btn btn-primary btn-lg">Shop Now</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-slideshow__slide" href="#">
                                    <div class="block-slideshow__slide-image block-slideshow__slide-image--desktop"
                                        style=" background-image: url('images/slides/pic3.png');">
                                    </div>
                                    <div class="block-slideshow__slide-image block-slideshow__slide-image--mobile"
                                        style="background-image: url('images/slides/pic3-half.png');">
                                    </div>
                                    <div class="block-slideshow__slide-content">
                                        <div class="block-slideshow__slide-title">
                                            Exclusive Deals on<br />Laptops and Tablets
                                        </div>
                                        <div class="block-slideshow__slide-text">
                                            Save upto 20% off on Laptops
                                            <br />and Computers.
                                        </div>
                                        <div class="block-slideshow__slide-button">
                                            <span class="btn btn-primary btn-lg">Shop Now</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end main-slideshow -->


        <!-- Latest Products Slides -->
        <div class="block block-products-carousel " data-layout="grid-5">
            <div class="container">
                <div class="block-header">
                    <h3 class="block-header__title">
                        Latest Products
                    </h3>
                    <div class="block-header__divider"></div>

                </div>
                <div class="block-products-carousel__slider">
                    <div class="block-products-carousel__preloader"></div>
                    <div class="owl-carousel">
                        @foreach ($latestProduct as $items)
                            <div class="block-products-carousel__column">

                                <div class="block-products-carousel__cell">

                                    <div class="product-card">

                                        <div class="product-card__badges-list">
                                            <div class="product-card__badge product-card__badge--new">
                                                New
                                            </div>
                                        </div>
                                        <div class="product-card__image">

                                            <a href="/products/{{ $items->id }}"><img
                                                    src={{ $items->image != null ? asset('storage/images/thumbnails/' . $items->image) : 'public/images/products/product-1.jpg' }}
                                                    alt="" /></a>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__name">
                                                <a href="/products/{{ $items->id }}">{{ ucwords(strip_tags(substr($items->prod_name, 0, 20))) }}
                                                    @if (strlen($items->prod_name) > 23)
                                                        ...
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="product-card__category">
                                                <a
                                                    href="/categories/{{ $items->category_id }}"><b>{{ ucwords($items->categ->name) }}</b></a>
                                            </div>
                                            <div class="product-card__rating">
                                                <div class="rating">
                                                    <div class="rating__body">
                                                        @php
                                                            $total_review = 0;
                                                            foreach ($items->reviews as $item) {
                                                                $total_review += $item->ratings;
                                                            }
                                                            
                                                            $average = $total_review > 0 ? floor($total_review / count($items->reviews)) : 0;
                                                        @endphp
                                                        <!-- Review Rating -->
                                                        @if ($average <= ($max = 5))
                                                            <!-- Existing Rating -->
                                                            @for ($i = 1; $i <= $average; $i++)
                                                                <svg class="rating__star rating__star--active"
                                                                    width="13px" height="12px">
                                                                    <g class="rating__fill">
                                                                        <use xlink:href="/images/sprite.svg#star-normal">
                                                                        </use>
                                                                    </g>
                                                                    <g class="rating__stroke">
                                                                        <use
                                                                            xlink:href="/images/sprite.svg#star-normal-stroke">
                                                                        </use>
                                                                    </g>
                                                                </svg>
                                                                <div
                                                                    class="rating__star rating__star--only-edge rating__star--active">
                                                                    <div class="rating__fill">
                                                                        <div class="fake-svg-icon">
                                                                        </div>
                                                                    </div>
                                                                    <div class="rating__stroke">
                                                                        <div class="fake-svg-icon">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endfor
                                                            <!-- End of Existing Rating -->
                                                            @if (!empty(($remaining = $max - $average)))
                                                                <!--Non Existing Remaining Rates -->
                                                                @for ($i = 1; $i <= $remaining; $i++)
                                                                    <svg class="rating__star" width="13px" height="12px">
                                                                        <g class="rating__fill">
                                                                            <use
                                                                                xlink:href="/images/sprite.svg#star-normal">
                                                                            </use>
                                                                        </g>
                                                                        <g class="rating__stroke">
                                                                            <use
                                                                                xlink:href="/images/sprite.svg#star-normal-stroke">
                                                                            </use>
                                                                        </g>
                                                                    </svg>
                                                                    <div class="rating__star rating__star--only-edge">
                                                                        <div class="rating__fill">
                                                                            <div class="fake-svg-icon">
                                                                            </div>
                                                                        </div>
                                                                        <div class="rating__stroke">
                                                                            <div class="fake-svg-icon">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endfor
                                                                <!-- End of Non Existing Rates -->
                                                            @endif
                                                        @endif
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__availability">
                                                Availability:
                                                <span class="text-success">In Stock</span>
                                            </div>
                                            <div class="product-card__prices">
                                                Rs {{ number_format($items->price, 2, '.', '') }}
                                            </div>
                                            <div class="product-card__buttons">
                                                <form action="{{ route('cart.store') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $items->id }}">
                                                    <input type="hidden" name="quantity" value="1">
                                                    <button class="btn btn-primary product-card__addtocart" type="button"
                                                        onclick="event.preventDefault(); this.closest('form').submit();"
                                                        href="#">
                                                        Add To Cart
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- End Latest Products Slides -->


        <!--All Products Block-->
        <div class="block">
            <div class="container">
                <div class="block-header">
                    <h3 class="block-header__title">
                        All Products
                    </h3>
                    <div class="block-header__divider"></div>
                    <ul class="block-header__groups-list">
                        <li>
                            <a href="{{ route('shop') }}" class="block-header__group block-header__group--active"
                                style="cursor: pointer;">
                                View All
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-12">
                    <div class="products-view">
                        <div class="products-view__list products-list" data-layout="grid-4-full">
                            <div class="products-list__body">
                                @foreach ($allproducts as $items)
                                    <div class="products-list__item">
                                        <div class="product-card">
                                            <div class="product-card__badges-list">
                                                <div class="product-card__badge product-card__badge--new">New</div>
                                            </div>
                                            <div class="product-card__image"><a href="/products/{{ $items->id }}"><img
                                                        src="{{ asset('storage/images/thumbnails/' . $items->image) }}"
                                                        alt="no-image"></a></div>
                                            <div class="product-card__info">
                                                <div class="product-card__name">
                                                    <a href="/products/{{ $items->id }}">{{ ucwords(strip_tags(substr($items->prod_name, 0, 24))) }}
                                                        @if (strlen($items->prod_name) > 26)
                                                            ...
                                                        @endif
                                                    </a>
                                                </div>
                                                <div class="product-card__category">
                                                    <a
                                                        href="/categories/{{ $items->categ->id }}"><b>{{ ucwords($items->categ->name) }}</b></a>
                                                </div>

                                                <!--Rating Section-->
                                                <div class="product-card__rating">
                                                    <div class="rating">
                                                        <div class="rating__body">
                                                            @php
                                                                $total_review = 0;
                                                                foreach ($items->reviews as $item) {
                                                                    // print_r($item) ;
                                                                    $total_review += $item->ratings;
                                                                }
                                                                $average = $total_review > 0 ? floor($total_review / count($items->reviews)) : 0;
                                                            @endphp
                                                            <!-- Review Rating -->
                                                            @if ($average <= ($max = 5))
                                                                <!-- Existing Rating -->
                                                                @for ($i = 1; $i <= $average; $i++)
                                                                    <svg class="rating__star rating__star--active"
                                                                        width="13px" height="12px">
                                                                        <g class="rating__fill">
                                                                            <use
                                                                                xlink:href="/images/sprite.svg#star-normal">
                                                                            </use>
                                                                        </g>
                                                                        <g class="rating__stroke">
                                                                            <use
                                                                                xlink:href="/images/sprite.svg#star-normal-stroke">
                                                                            </use>
                                                                        </g>
                                                                    </svg>
                                                                    <div
                                                                        class="rating__star rating__star--only-edge rating__star--active">
                                                                        <div class="rating__fill">
                                                                            <div class="fake-svg-icon">
                                                                            </div>
                                                                        </div>
                                                                        <div class="rating__stroke">
                                                                            <div class="fake-svg-icon">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endfor
                                                                <!-- End of Existing Rating -->
                                                                @if (!empty(($remaining = $max - $average)))
                                                                    <!--Non Existing Remaining Rates -->
                                                                    @for ($i = 1; $i <= $remaining; $i++)
                                                                        <svg class="rating__star" width="13px"
                                                                            height="12px">
                                                                            <g class="rating__fill">
                                                                                <use
                                                                                    xlink:href="/images/sprite.svg#star-normal">
                                                                                </use>
                                                                            </g>
                                                                            <g class="rating__stroke">
                                                                                <use
                                                                                    xlink:href="/images/sprite.svg#star-normal-stroke">
                                                                                </use>
                                                                            </g>
                                                                        </svg>
                                                                        <div class="rating__star rating__star--only-edge">
                                                                            <div class="rating__fill">
                                                                                <div class="fake-svg-icon">
                                                                                </div>
                                                                            </div>
                                                                            <div class="rating__stroke">
                                                                                <div class="fake-svg-icon">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endfor
                                                                    <!-- End of Non Existing Rates -->
                                                                @endif
                                                            @endif
                                                        </div>
                                                    </div>

                                                </div>
                                                <!--End rating section-->
                                            </div>
                                            <div class="product-card__actions">
                                                <div class="product-card__prices">Rs. {{ $items->price }}</div>
                                                <div class="product-card__buttons">
                                                    <form action="{{ route('cart.store') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="product_id"
                                                            value="{{ $items->id }}">
                                                        <input type="hidden" name="quantity" value="1">
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
                    </div>
                </div>
            </div>
        </div>
        <!--End of All Products Block-->

        <!--Categories Block-->
        <div class="block block--highlighted block-categories block-categories--layout--compact">
            <div class="container">
                <div class="block-header">
                    <h3 class="block-header__title">
                        Popular Categories
                    </h3>
                    <div class="block-header__divider"></div>
                    <ul class="block-header__groups-list">
                        <li>
                            <a type="button" href="{{ route('allCategories') }}"
                                class="block-header__group block-header__group--active" style="cursor: pointer;">
                                All
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="block-categories__list">
                    @foreach ($categoriesItem as $item)
                        <div class="block-categories__item category-card category-card--layout--compact p-2">
                            <div class="category-card__body">
                                <div class="category-card__image">
                                    <a href="/categories/{{ $item->id }}"><img
                                            src={{ asset('storage/images/thumbnails/' . $item->image) }}
                                            alt="no-image" /></a>
                                </div>
                                <div class="category-card__content">
                                    <div class="category-card__name">
                                        <a href="/categories/{{ $item->id }}">{{ $item->name }}</a>
                                    </div>

                                    <div class="category-card__products">
                                        {{ count($item->productReturner) }} Products
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!--End Categories Block-->

    </div>
@endsection
