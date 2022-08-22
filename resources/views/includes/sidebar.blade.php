<div class="shop-layout__sidebar">
    <div class="block block-sidebar">
        <div class="block-sidebar__item">
            <div class="widget-filters widget" data-collapse data-collapse-opened-class="filter--opened">
                <h4 class="widget__title">Filters</h4>
                <div class="widget-filters__list">
                    <div class="widget-filters__item">
                        <div class="filter filter--opened" data-collapse-item><button type="button" class="filter__title"
                                data-collapse-trigger>Categories <svg class="filter__arrow" width="12px" height="7px">
                                    <use xlink:href="/images/sprite.svg#arrow-rounded-down-12x7">
                                    </use>
                                </svg></button>
                            <div class="filter__body" data-collapse-content>
                                <div class="filter__container">
                                    <div class="filter-categories">
                                        <ul class="filter-categories__list">
                                            @foreach ($categories as $item)
                                                <li class="filter-categories__item filter-categories__item--parent">
                                                    <svg class="filter-categories__arrow" width="6px" height="9px">
                                                        <use xlink:href="/images/sprite.svg#arrow-rounded-left-6x9">
                                                        </use>
                                                    </svg> <a href="/categories/{{ $item->id }}">{{ $item->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="block-sidebar__item d-none d-lg-block">
            <div class="widget-products widget">
                <h4 class="widget__title">Latest Products</h4>
                <div class="widget-products__list">
                    @foreach ($LatestProducts as $item)
                        <div class="widget-products__item">
                            <div class="widget-products__image"><a href="/products/{{ $item->id }}"><img
                                        src="{{ asset('storage/images/' . $item->image) }}" alt="no-image"></a></div>
                            <div class="widget-products__info">
                                <div class="widget-products__name"><a
                                        href="/products/{{ $item->id }}">{{ $item->prod_name }}</a>
                                </div>
                                <div class="widget-products__prices">Rs. {{ $item->price }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
