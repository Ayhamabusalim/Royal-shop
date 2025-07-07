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

            .category-carousel .swiper-slide {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: start;
                text-align: center;
            }
        </style>
        <section class="swiper-container js-swiper-slider swiper-number-pagination slideshow" data-settings='{
                                                                    "autoplay": {
                                                                      "delay": 5000
                                                                    },
                                                                    "slidesPerView": 1,
                                                                    "effect": "fade",
                                                                    "loop": true
                                                                  }'>
            <div class="swiper-wrapper">
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
                        <div class="slideshow-text container position-absolute start-50 top-50 translate-middle">
                            <h6
                                class="text_dash text-uppercase fs-base fw-medium animate animate_fade animate_btt animate_delay-3">
                                New Arrivals</h6>
                            <h2 class="h1 fw-normal mb-0 animate animate_fade animate_btt animate_delay-5">Night Spring
                            </h2>
                            <h2 class="h1 fw-bold animate animate_fade animate_btt animate_delay-5">Dresses</h2>
                            <a href="#"
                                class="btn-link btn-link_lg default-underline fw-medium animate animate_fade animate_btt animate_delay-7">Shop
                                Now</a>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="overflow-hidden position-relative h-100">
                        <div class="slideshow-character position-absolute bottom-0 pos_right-center">
                            <img loading="lazy" src="assets/images/slideshow-character1.png" width="400" height="733"
                                alt="Woman Fashion 1"
                                class="slideshow-character__img animate animate_fade animate_btt animate_delay-9 w-auto h-auto" />
                            <div class="character_markup">
                                <p
                                    class="text-uppercase font-sofia fw-bold animate animate_fade animate_rtl animate_delay-10">
                                    Summer
                                </p>
                            </div>
                        </div>
                        <div class="slideshow-text container position-absolute start-50 top-50 translate-middle">
                            <h6
                                class="text_dash text-uppercase fs-base fw-medium animate animate_fade animate_btt animate_delay-3">
                                New Arrivals</h6>
                            <h2 class="h1 fw-normal mb-0 animate animate_fade animate_btt animate_delay-5">Night Spring
                            </h2>
                            <h2 class="h1 fw-bold animate animate_fade animate_btt animate_delay-5">Dresses</h2>
                            <a href="#"
                                class="btn-link btn-link_lg default-underline fw-medium animate animate_fade animate_btt animate_delay-7">Shop
                                Now</a>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="overflow-hidden position-relative h-100">
                        <div class="slideshow-character position-absolute bottom-0 pos_right-center">
                            <img loading="lazy" src="assets/images/slideshow-character2.png" width="400" height="690"
                                alt="Woman Fashion 2"
                                class="slideshow-character__img animate animate_fade animate_rtl animate_delay-10 w-auto h-auto" />
                        </div>
                        <div class="slideshow-text container position-absolute start-50 top-50 translate-middle">
                            <h6
                                class="text_dash text-uppercase fs-base fw-medium animate animate_fade animate_btt animate_delay-3">
                                New Arrivals</h6>
                            <h2 class="h1 fw-normal mb-0 animate animate_fade animate_btt animate_delay-5">Night Spring
                            </h2>
                            <h2 class="h1 fw-bold animate animate_fade animate_btt animate_delay-5">Dresses</h2>
                            <a href="#"
                                class="btn-link btn-link_lg default-underline fw-medium animate animate_fade animate_btt animate_delay-7">Shop
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
        <div class="container mw-1620 bg-white border-radius-10">
            <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>
            <section class="category-carousel container">
    <h2 class="section-title text-center mb-3 pb-xl-2 mb-xl-4">Categories</h2>
    <div class="position-relative">
        <div class="swiper-container js-swiper-slider" data-settings='{
            "autoplay": { "delay": 4000 },
            "slidesPerView": 6,
            "spaceBetween": 30,
            "loop": true,
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
                        <div class="border rounded shadow-sm p-3 bg-white">
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

<section class="subcategory-carousel container mt-5">
    <h2 class="section-title text-center mb-3 pb-xl-2 mb-xl-4">Sub Categories</h2>
    <div class="position-relative">
        <div class="swiper-container js-swiper-slider" data-settings='{
            "autoplay": { "delay": 4000 },
            "slidesPerView": 6,
            "spaceBetween": 30,
            "loop": true,
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
                        <div class="border rounded shadow-sm p-3 bg-white">
                            <img src="{{ asset('images/subcategories/' . $subcategory->image) }}" alt="{{ $subcategory->name }}"
                                class="img-fluid mb-2 rounded" width="100" height="100">
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



            <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>


            <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>



            <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>

            <section class="products-grid container">
                <h2 class="section-title text-center mb-3 pb-xl-3 mb-xl-4">Products</h2>

                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-6 col-md-4 col-lg-3">



                            <div class="product-card product-card_style3 mb-3 mb-md-4 mb-xxl-5">
                                <div class="pc__img-wrapper">
                                    <a href="#">
                                        <img loading="lazy" src="{{ asset('images/products/' . $product->image) }}" width="330"
                                            height="400" alt="Cropped Faux leather Jacket" class="pc__img">
                                    </a>
                                </div>

                                <div class="pc__info position-relative">
                                    <h6 class="pc__title"><a href="#l">{{$product->image}} </a></h6>
                                    <div class="product-card__price d-flex align-items-center">
                                        <span class="money price text-secondary">{{$product->price}}</span>
                                    </div>

                                    <div
                                        class="anim_appear-bottom position-absolute bottom-0 start-0 d-none d-sm-flex align-items-center bg-body">
                                        <button
                                            class="btn-link btn-link_lg me-4 text-uppercase fw-medium js-add-cart js-open-aside"
                                            data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
                                        <button class="btn-link btn-link_lg me-4 text-uppercase fw-medium js-quick-view"
                                            data-bs-toggle="modal" data-bs-target="#quickView" title="Quick view">
                                            <span class="d-none d-xxl-block">Quick View</span>
                                            <span class="d-block d-xxl-none"><svg width="18" height="18" viewBox="0 0 18 18"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <use href="#icon_view" />
                                                </svg></span>
                                        </button>
                                        <button class="pc__btn-wl bg-transparent border-0 js-add-wishlist"
                                            title="Add To Wishlist">
                                            <svg width="16" height="16" viewBox="0 0 20 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <use href="#icon_heart" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="pagination-wrapper mt-4 d-flex justify-content-center">
                        {{ $products->links('vendor.pagination.bootstrap-5') }}
                    </div>


                </div>


            </section>
        </div>

        <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>

    </main>
@endsection