@extends('frontend.layout.master')
@section('main')
    <main>
        <style>
            .category-carousel .swiper-slide img {
                width: 124px;
                height: 124px;
                object-fit: cover;
                border-radius: 10px;
            }

            .category-carousel .swiper-slide,
            .subcategory-carousel .swiper-slide {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: start;
                text-align: center;
            }

            .swiper-button-prev,
            .swiper-button-next {
                background: #fff;
                border-radius: 50%;
                width: 40px;
                height: 40px;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                z-index: 10;
            }

            .swiper-button-prev::after,
            .swiper-button-next::after {
                font-size: 16px;
                color: #000;
            }
        </style>

        {{-- Slideshow --}}
        <section class="swiper-container js-swiper-slider swiper-number-pagination slideshow" data-settings='{
                                "autoplay": { "delay": 5000 },
                                "slidesPerView": 1,
                                "effect": "fade",
                                "loop": true
                            }'>
            <div class="swiper-wrapper">
                {{-- Slide 1 --}}
                <div class="swiper-slide">
                    <div class="overflow-hidden position-relative h-100">
                        <div class="slideshow-character position-absolute bottom-0 pos_right-center">
                            <img loading="lazy" src="assets/images/home/demo3/slideshow-character1.png" width="542"
                                height="733" alt="Woman Fashion 1"
                                class="slideshow-character__img animate animate_fade animate_btt animate_delay-9 w-auto h-auto" />
                            <div class="character_markup type2">
                                <p
                                    class="text-uppercase font-sofia mark-grey-color animate animate_fade animate_btt animate_delay-10 mb-0">
                                    Dresses</p>
                            </div>
                        </div>
                        <div
                            class="slideshow-text container position-absolute start-50 top-50 translate-middle text-center">
                            <h6
                                class="text_dash text-uppercase fs-base fw-medium animate animate_fade animate_btt animate_delay-3">
                                New Arrivals</h6>
                            <h2 class="h1 fw-normal mb-0 animate animate_fade animate_btt animate_delay-5">Night Spring</h2>
                            <h2 class="h1 fw-bold animate animate_fade animate_btt animate_delay-5">Dresses</h2>
                            <a href="#" class="btn btn-dark mt-3 animate animate_fade animate_btt animate_delay-7">Shop
                                Now</a>
                        </div>
                    </div>
                </div>

                {{-- Slide 2 --}}
                <div class="swiper-slide">
                    <div class="overflow-hidden position-relative h-100">
                        <div class="slideshow-character position-absolute bottom-0 pos_right-center">
                            <img loading="lazy" src="assets/images/slideshow-character1.png" width="400" height="733"
                                alt="Woman Fashion 2"
                                class="slideshow-character__img animate animate_fade animate_btt animate_delay-9 w-auto h-auto" />
                            <div class="character_markup">
                                <p
                                    class="text-uppercase font-sofia fw-bold animate animate_fade animate_rtl animate_delay-10">
                                    Summer</p>
                            </div>
                        </div>
                        <div
                            class="slideshow-text container position-absolute start-50 top-50 translate-middle text-center">
                            <h6
                                class="text_dash text-uppercase fs-base fw-medium animate animate_fade animate_btt animate_delay-3">
                                New Arrivals</h6>
                            <h2 class="h1 fw-normal mb-0 animate animate_fade animate_btt animate_delay-5">Night Spring</h2>
                            <h2 class="h1 fw-bold animate animate_fade animate_btt animate_delay-5">Dresses</h2>
                            <a href="#" class="btn btn-dark mt-3 animate animate_fade animate_btt animate_delay-7">Shop
                                Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div
                    class="slideshow-pagination slideshow-number-pagination d-flex align-items-center position-absolute bottom-0 mb-5">
                </div>
            </div>
        </section>

        {{-- Categories --}}
        <section class="category-carousel container py-5">
            <h2 class="section-title text-center mb-4">Categories</h2>
            <div class="position-relative">
                <div class="swiper-container js-swiper-slider" data-settings='{
                                        "autoplay": { "delay": 4000 },
                                        "slidesPerView": 6,
                                        "loop": true,
                                        "spaceBetween": 30,
                                        "navigation": {
                                            "nextEl": ".categories-next",
                                            "prevEl": ".categories-prev"
                                        },
                                        "breakpoints": {
                                            "320": { "slidesPerView": 2, "spaceBetween": 10 },
                                            "768": { "slidesPerView": 4, "spaceBetween": 20 },
                                            "1200": { "slidesPerView": 6, "spaceBetween": 30 }
                                        }
                                    }'>
                    <div class="swiper-wrapper">
                        @foreach ($categories as $category)
                            <div class="swiper-slide text-center">
                                <div class="p-3 bg-white shadow rounded">
                                    <img src="{{ asset('images/categories/' . $category->image) }}" alt="{{ $category->name }}"
                                        class="img-fluid mb-2 rounded" width="100" height="100">
                                    <h6 class="mb-0">{{ $category->name }}</h6>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="categories-prev swiper-button-prev"></div>
                <div class="categories-next swiper-button-next"></div>
            </div>
        </section>

        {{-- Subcategories --}}
        <section class="subcategory-carousel container py-5">
            <h2 class="section-title text-center mb-4">Sub Categories</h2>
            <div class="position-relative">
                <div class="swiper-container js-swiper-slider" data-settings='{
                                        "autoplay": { "delay": 4000 },
                                        "slidesPerView": 6,
                                        "loop": true,
                                        "spaceBetween": 30,
                                        "navigation": {
                                            "nextEl": ".subcategories-next",
                                            "prevEl": ".subcategories-prev"
                                        },
                                        "breakpoints": {
                                            "320": { "slidesPerView": 2, "spaceBetween": 10 },
                                            "768": { "slidesPerView": 4, "spaceBetween": 20 },
                                            "1200": { "slidesPerView": 6, "spaceBetween": 30 }
                                        }
                                    }'>
                    <div class="swiper-wrapper">
                        @foreach ($subcategories as $subcategory)
                            <div class="swiper-slide text-center">
                                <div class="p-3 bg-white shadow rounded">
                                    <img src="{{ asset('images/subcategories/' . $subcategory->image) }}"
                                        alt="{{ $subcategory->name }}" class="img-fluid mb-2 rounded" width="100" height="100">
                                    <h6 class="mb-0">{{ $subcategory->name }}</h6>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="subcategories-prev swiper-button-prev"></div>
                <div class="subcategories-next swiper-button-next"></div>
            </div>
        </section>

        {{-- Products --}}
        <section class="products-grid container py-5">
            <h2 class="section-title text-center mb-4">Products</h2>
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="product-card product-card_style3 mb-4">
                            <div class="pc__img-wrapper">
                                <a href="#">
                                    <img loading="lazy" src="{{ asset('images/products/' . $product->image) }}" width="330"
                                        height="400" alt="{{ $product->name }}" class="pc__img">
                                </a>
                            </div>
                            <div class="pc__info position-relative">
                                <h6 class="pc__title"><a href="#">{{ $product->name }}</a></h6>
                                <div class="product-card__price">
                                    <span class="money price text-secondary">{{ $product->price }}</span>
                                </div>
                                <div class="anim_appear-bottom d-none d-sm-flex align-items-center">
                                    <button class="btn btn-sm btn-dark me-2 js-add-cart" data-product-id="{{ $product->id }}">
                                        Add To Cart
                                    </button>
                                    <button class="btn btn-sm btn-outline-secondary me-2 js-quick-view" data-bs-toggle="modal"
                                        data-bs-target="#quickView">Quick View</button>
                                    <button class="btn btn-sm btn-light js-add-wishlist" title="Add To Wishlist">
                                        <svg width="16" height="16" viewBox="0 0 20 20">
                                            <use href="#icon_heart" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="pagination-wrapper mt-4 d-flex justify-content-center">
                {{ $products->links('vendor.pagination.bootstrap-5') }}
            </div>
        </section>
    </main>
@endsection