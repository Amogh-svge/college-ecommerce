    @extends('product-layout')
    @section('main')
        <div class="site__body">
            <div class="page-header">
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
                                <li class="breadcrumb-item">
                                    <a
                                        href="/categories/{{ $currentProduct->categ->id }}">{{ $currentProduct->categ->name }}</a>
                                    <svg class="breadcrumb-arrow" width="6px" height="9px">
                                        <use xlink:href="/images/sprite.svg#arrow-rounded-right-6x9"></use>
                                    </svg>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    {{ $currentProduct->prod_name }}
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="block">
                <div class="container">
                    <div class="product product--layout--standard" data-layout="standard">
                        <div class="product__content">
                            <!-- .product__gallery -->
                            <div class="product__gallery">
                                <div class="product-gallery">
                                    <div class="product-gallery__featured">
                                        <div class="owl-carousel" id="product-image">
                                            <a href="#"><img
                                                    src={{ asset('storage/images/thumbnails/' . $currentProduct->image) }}
                                                    alt="" />
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- .product__gallery / end -->
                            <!-- .product__info -->
                            <div class="product__info">
                                <div class="product__wishlist-compare">
                                    <button type="button" class="btn btn-sm btn-light btn-svg-icon" data-toggle="tooltip"
                                        data-placement="right" title="Wishlist">
                                        <svg width="16px" height="16px">
                                            <use xlink:href="/images/sprite.svg#wishlist-16"></use>
                                        </svg>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-light btn-svg-icon" data-toggle="tooltip"
                                        data-placement="right" title="Compare">
                                        <svg width="16px" height="16px">
                                            <use xlink:href="/images/sprite.svg#compare-16"></use>
                                        </svg>
                                    </button>
                                </div>
                                <h1 class="product__name">
                                    {{ ucwords($currentProduct->prod_name) }}
                                </h1>
                                <div class="product__rating">

                                    <div class="product__rating-stars">
                                        <div class="rating">
                                            <div class="rating__body">
                                                @php
                                                    $total_review = 0;
                                                    foreach ($productAllReview as $key => $item) {
                                                        $total_review += $item->ratings;
                                                    }
                                                    $average = $total_review > 0 ? floor($total_review / count($productAllReview)) : 0;
                                                @endphp
                                                <!-- Review Rating -->
                                                @if ($average <= ($max = 5))
                                                    <!-- Existing Rating -->
                                                    @for ($i = 1; $i <= $average; $i++)
                                                        <svg class="rating__star rating__star--active" width="13px"
                                                            height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="/images/sprite.svg#star-normal">
                                                                </use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="/images/sprite.svg#star-normal-stroke">
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
                                                                    <use xlink:href="/images/sprite.svg#star-normal">
                                                                    </use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="/images/sprite.svg#star-normal-stroke">
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
                                    <div class="product__rating-legend">
                                        {{ count($productAllReview) }} Reviews<span>
                                    </div>
                                </div>
                                <div class="product__description">
                                    {{ ucfirst($currentProduct->short_desc) }}
                                </div>

                                <ul class="product__meta">
                                    <li class="product__meta-availability">
                                        Availability:
                                        <span class="text-success">In Stock</span>
                                    </li>
                                    <li>Brand: <a href="#">Wakita</a></li>
                                </ul>
                            </div>
                            <!-- .product__info / end -->
                            <!-- .product__sidebar -->
                            <div class="product__sidebar">
                                <div class="product__availability">
                                    Availability:
                                    <span class="text-success">In Stock</span>
                                </div>
                                <div class="product__prices">Rs. {{ $currentProduct->price }}</div>
                                <!-- .product__options -->
                                <div class="product__options">
                                    <form action={{ route('cart.store') }} method="POST">
                                        @csrf
                                        <div class="form-group product__option">
                                            <label class="product__option-label" for="product-quantity">Quantity</label>
                                            <div class="product__actions">
                                                <div class="product__actions-item">
                                                    <div class="input-number product__quantity">
                                                        <input id="product-quantity"
                                                            class="input-number__input form-control form-control-lg"
                                                            name="quantity" type="number" min="1"
                                                            value="1" />
                                                        <div class="input-number__add"></div>
                                                        <div class="input-number__sub"></div>
                                                    </div>
                                                </div>
                                                <div class="product__actions-item product__actions-item--addtocart">

                                                    <input type="hidden" name="product_id"
                                                        value="{{ $currentProduct->id }}">
                                                    <button class="btn btn-primary btn-lg"
                                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                                        Add To Cart
                                                    </button>

                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <!-- .product__options / end -->
                            </div>
                            <!-- .product__end -->
                            <div class="product__footer">
                                <div class="product__tags tags">
                                    <div class="tags__list">
                                        <a
                                            href='/categories/{{ $currentProduct->categ->id }}'>{{ $currentProduct->categ->name }}</a>
                                    </div>
                                </div>
                                <div class="product__share-links share-links">
                                    <ul class="share-links__list">
                                        <li class="share-links__item share-links__item--type--like">
                                            <a href="#">Like</a>
                                        </li>
                                        <li class="share-links__item share-links__item--type--tweet">
                                            <a href="#">Tweet</a>
                                        </li>
                                        <li class="share-links__item share-links__item--type--pin">
                                            <a href="#">Pin It</a>
                                        </li>
                                        <li class="share-links__item share-links__item--type--counter">
                                            <a href="#">4K</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-tabs">
                        <div class="product-tabs__list">
                            <a href="#tab-description"
                                class="product-tabs__item product-tabs__item--active">Description</a>
                            <a href="#tab-specification" class="product-tabs__item">Specification</a>
                            <a href="#tab-reviews" class="product-tabs__item">Reviews</a>
                        </div>
                        <div class="product-tabs__content">
                            <div class="product-tabs__pane product-tabs__pane--active" id="tab-description">
                                <div class="typography">
                                    {!! $currentProduct->prod_desc !!}
                                </div>
                            </div>
                            <div class="product-tabs__pane" id="tab-specification">
                                <div class="spec">
                                    <h3 class="spec__header">
                                        Specification
                                    </h3>
                                    <div class="spec__section">
                                        <h4 class="spec__section-title">
                                            General
                                        </h4>

                                        {!! $currentProduct->specification !!}
                                    </div>

                                </div>
                            </div>
                            <div class="product-tabs__pane" id="tab-reviews">
                                <div class="reviews-view">
                                    <div class="reviews-view__list">
                                        <h3 class="reviews-view__header">
                                            Customer Reviews
                                        </h3>

                                        <div class="reviews-list">
                                            @if (count($productReview) > 0)
                                                <ol class="reviews-list__content">
                                                    @foreach ($productReview as $key => $review)
                                                        <li class="reviews-list__item">
                                                            <div class="review">
                                                                <div class="review__avatar">
                                                                    <img src="/images/avatars/avatar-{{$key+1}}.jpg"
                                                                        alt="" />
                                                                </div>
                                                                <div class="review__content">
                                                                    <div class="review__author">
                                                                        {{ $review->userReview->name }}
                                                                    </div>
                                                                    <div class="review__rating">
                                                                        <div class="rating">
                                                                            <div class="rating__body">
                                                                                <!-- Review Rating -->
                                                                                @if ($review->ratings <= ($max = 5))
                                                                                    <!-- Existing Rating -->
                                                                                    @for ($i = 1; $i <= $review->ratings; $i++)
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
                                                                                    @if (!empty(($remaining = $max - $review->ratings)))
                                                                                        <!--Non Existing Remaining Rates -->
                                                                                        @for ($i = 1; $i <= $remaining; $i++)
                                                                                            <svg class="rating__star"
                                                                                                width="13px"
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
                                                                                            <div
                                                                                                class="rating__star rating__star--only-edge">
                                                                                                <div class="rating__fill">
                                                                                                    <div
                                                                                                        class="fake-svg-icon">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="rating__stroke">
                                                                                                    <div
                                                                                                        class="fake-svg-icon">
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
                                                                    <div class="review__text">
                                                                        {{ $review->reviews }}
                                                                    </div>
                                                                    <div class="review__date">
                                                                        {{ Carbon::parse($review->created_at)->isoFormat('LL') }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ol>
                                            @else
                                                <div class="reviews-list__content">
                                                    <h5>
                                                        --- No Reviews ---
                                                    </h5>
                                                </div>
                                            @endif


                                            <div class="reviews-list__pagination">
                                                <ul class="pagination justify-content-center">
                                                    {!! $productReview->links() !!}
                                                </ul>
                                            </div>
                                        </div>


                                    </div>
                                    <form method="POST" action="/review/store" class="reviews-view__form">
                                        @csrf
                                        <h3 class="reviews-view__header">
                                            Write A Review
                                        </h3>
                                        <div class="row">
                                            <div class="col-12 col-lg-9 col-xl-8">
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label for="review-stars">Review
                                                            Stars</label>
                                                        <select id="review-stars" class="form-control" name="ratings">
                                                            @for ($i = 1; $i < 6; $i++)
                                                                <option value='{{ $i }}'
                                                                    {{ $i == old('ratings') ? 'selected' : '' }}>
                                                                    {{ $i }} Stars
                                                                    Rating
                                                                </option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                                <input type="hidden" name="product_id"
                                                    value="{{ $currentProduct->id }}">

                                                <div class="form-group">
                                                    <label for="review-text">Your Review</label>
                                                    <textarea class="form-control" id="review-text" rows="6" name="reviews" required></textarea>
                                                </div>
                                                <div class="form-group mb-0">
                                                    <button type="submit" class="btn btn-primary btn-lg">
                                                        Post Your Review
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if (count($relatedProduct) > 0)
                <!-- .block-products-carousel -->
                <div class="block block-products-carousel" data-layout="grid-4">
                    <div class="container">
                        <div class="block-header">
                            <h3 class="block-header__title">
                                Related Products
                            </h3>
                            <div class="block-header__divider"></div>
                            <div class="block-header__arrows-list">
                                <button class="block-header__arrow block-header__arrow--left" type="button">
                                    <svg width="7px" height="11px">
                                        <use xlink:href="/images/sprite.svg#arrow-rounded-left-7x11"></use>
                                    </svg>
                                </button>
                                <button class="block-header__arrow block-header__arrow--right" type="button">
                                    <svg width="7px" height="11px">
                                        <use xlink:href="/images/sprite.svg#arrow-rounded-right-7x11"></use>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="block-products-carousel__slider">
                            <div class="block-products-carousel__preloader"></div>
                            <div class="owl-carousel">
                                @foreach ($relatedProduct as $item)
                                    <div class="block-products-carousel__column">
                                        <div class="block-products-carousel__cell">
                                            <div class="product-card">
                                                
                                                <div class="product-card__image">
                                                    <a href="/products/{{ $item->id }}"><img
                                                            src={{ asset('storage/images/thumbnails/' . $item->image) }}
                                                            alt="" /></a>
                                                </div>
                                                <div class="product-card__info">
                                                    <div class="product-card__name">
                                                        <a href="/products/{{ $item->id }}">{{ ucwords(strip_tags(substr($item->prod_name, 0, 20))) }}
                                                            @if (strlen($item->prod_name) > 21)
                                                                ...
                                                            @endif
                                                        </a>
                                                    </div>
                                                    <div class="product-card__rating">
                                                        <div class="rating">
                                                            <div class="rating__body">
                                                                @php
                                                                    $total_review = 0;
                                                                    foreach ($item->reviews as $goods) {
                                                                        $total_review += $goods->ratings;
                                                                    }
                                                                    $average = $total_review > 0 ? floor($total_review / count($item->reviews)) : 0;
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
                                                                            <div
                                                                                class="rating__star rating__star--only-edge">
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
                                                        Rs. {{ $item->price }}
                                                    </div>
                                                    <div class="product-card__buttons">
                                                        <form action="{{ route('cart.store') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="product_id"
                                                                value="{{ $item->id }}">
                                                            <input type="hidden" name="quantity" value="1">
                                                            <button class="btn btn-primary product-card__addtocart"
                                                                type="button"
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
                <!-- .block-products-carousel / end -->
            @endif

        </div>
    @endsection
