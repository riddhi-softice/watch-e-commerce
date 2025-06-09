@extends('web.layouts2.app')
@section('content')

<div class="intro-section bg-lighter pt-5 pb-6">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="intro-slider-container slider-container-ratio slider-container-1 mb-2 mb-lg-0">
                    <div class="intro-slider intro-slider-1 owl-carousel owl-simple owl-light owl-nav-inside"
                        data-toggle="owl" data-owl-options='{
                                        "nav": false, 
                                        "responsive": {
                                            "768": {
                                                "nav": true
                                            }
                                        }
                                    }'>

                        <div class="intro-slide">
                            <figure class="slide-image">
                                <picture>
                                    <source media="(max-width: 480px)"
                                        srcset="{{ asset('public/assets/images/slider/slide-1-480w.jpg') }}">
                                    <img src="{{ asset('public/assets/images/slider/slide-1.jpg') }}" alt="Image Desc">
                                </picture>
                            </figure><!-- End .slide-image -->

                            <div class="intro-content">
                                <h3 class="intro-subtitle">Topsale Collection</h3><!-- End .h3 intro-subtitle -->
                                <h1 class="intro-title">Living Room<br>Furniture</h1><!-- End .intro-title -->

                                <a href="category.html" class="btn btn-outline-white">
                                    <span>SHOP NOW</span>
                                    <i class="icon-long-arrow-right"></i>
                                </a>
                            </div><!-- End .intro-content -->
                        </div><!-- End .intro-slide -->

                        <div class="intro-slide">
                            <figure class="slide-image">
                                <picture>
                                    <source media="(max-width: 480px)"
                                        srcset="{{ asset('public/assets/images/slider/slide-2-480w.jpg') }}">
                                    <img src="{{ asset('public/assets/images/slider/slide-2.jpg') }}" alt="Image Desc">
                                </picture>
                            </figure><!-- End .slide-image -->

                            <div class="intro-content">
                                <h3 class="intro-subtitle">News and Inspiration</h3><!-- End .h3 intro-subtitle -->
                                <h1 class="intro-title">New Arrivals</h1><!-- End .intro-title -->

                                <a href="category.html" class="btn btn-outline-white">
                                    <span>SHOP NOW</span>
                                    <i class="icon-long-arrow-right"></i>
                                </a>
                            </div><!-- End .intro-content -->
                        </div><!-- End .intro-slide -->

                        <div class="intro-slide">
                            <figure class="slide-image">
                                <picture>
                                    <source media="(max-width: 480px)"
                                        srcset="{{ asset('public/assets/images/slider/slide-3-480w.jpg') }}">
                                    <img src="{{ asset('public/assets/images/slider/slide-3.jpg') }}" alt="Image Desc">
                                </picture>
                            </figure><!-- End .slide-image -->

                            <div class="intro-content">
                                <h3 class="intro-subtitle">Outdoor Furniture</h3><!-- End .h3 intro-subtitle -->
                                <h1 class="intro-title">Outdoor Dining <br>Furniture</h1><!-- End .intro-title -->

                                <a href="category.html" class="btn btn-outline-white">
                                    <span>SHOP NOW</span>
                                    <i class="icon-long-arrow-right"></i>
                                </a>
                            </div><!-- End .intro-content -->
                        </div><!-- End .intro-slide -->
                    </div><!-- End .intro-slider owl-carousel owl-simple -->

                    <span class="slider-loader"></span><!-- End .slider-loader -->
                </div><!-- End .intro-slider-container -->
            </div><!-- End .col-lg-8 -->
            <div class="col-lg-4">
                <div class="intro-banners">
                    <div class="row row-sm">
                        <div class="col-md-6 col-lg-12">
                            <div class="banner banner-display">
                                <a href="#">
                                    <img src="{{ asset('public/assets/images/banners/home/intro/banner-1.jpg') }}"
                                        alt="Banner">
                                </a>

                                <div class="banner-content">
                                    <h4 class="banner-subtitle text-darkwhite"><a href="#">Clearence</a></h4>
                                    <!-- End .banner-subtitle -->
                                    <h3 class="banner-title text-white"><a href="#">Chairs & Chaises <br>Up to 40%
                                            off</a></h3><!-- End .banner-title -->
                                    <a href="#" class="btn btn-outline-white banner-link">Shop Now<i
                                            class="icon-long-arrow-right"></i></a>
                                </div><!-- End .banner-content -->
                            </div><!-- End .banner -->
                        </div><!-- End .col-md-6 col-lg-12 -->

                        <div class="col-md-6 col-lg-12">
                            <div class="banner banner-display mb-0">
                                <a href="#">
                                    <img src="{{ asset('public/assets/images/banners/home/intro/banner-2.jpg') }}"
                                        alt="Banner">
                                </a>

                                <div class="banner-content">
                                    <h4 class="banner-subtitle text-darkwhite"><a href="#">New in</a></h4>
                                    <!-- End .banner-subtitle -->
                                    <h3 class="banner-title text-white"><a href="#">Best Lighting <br>Collection</a>
                                    </h3><!-- End .banner-title -->
                                    <a href="#" class="btn btn-outline-white banner-link">Discover Now<i
                                            class="icon-long-arrow-right"></i></a>
                                </div><!-- End .banner-content -->
                            </div><!-- End .banner -->
                        </div><!-- End .col-md-6 col-lg-12 -->
                    </div><!-- End .row row-sm -->
                </div><!-- End .intro-banners -->
            </div><!-- End .col-lg-4 -->
        </div><!-- End .row -->

        <div class="mb-6"></div><!-- End .mb-6 -->

        <div class="owl-carousel owl-simple" data-toggle="owl" data-owl-options='{
                "nav": false, 
                "dots": false,
                "margin": 30,
                "loop": false,
                "responsive": {
                    "0": {"items": 2},
                    "420": {"items": 3},
                    "600": {"items": 4},
                    "900": {"items": 5},
                    "1024": {"items": 6}
                }
            }'>

            @foreach ($data['brands'] as $brand)
            <a href="#" class="brand">
                <img src="{{ asset('public/assets/images/brands/' . $brand->logo) }}" alt="{{ $brand->name }}">
            </a>
            @endforeach
        </div><!-- End .owl-carousel -->

    </div><!-- End .container -->
</div><!-- End .bg-lighter -->

<div class="mb-6"></div><!-- End .mb-6 -->

<div class="mb-5"></div><!-- End .mb-6 -->

<div class="container">

    <div class="heading heading-center mb-6">
        <h2 class="title">Recent Arrivals</h2>
        <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="top-all-link" data-toggle="tab" href="#top-all-tab" role="tab"
                    aria-controls="top-all-tab" aria-selected="true">All</a>
            </li>
            @foreach ($data['categories'] as $category)
            <li class="nav-item">
                <a class="nav-link" id="top-{{ $category->id }}-link" data-toggle="tab"
                    href="#top-{{ $category->id }}-tab" role="tab" aria-controls="top-{{ $category->id }}-tab"
                    aria-selected="false">{{ $category->name }}</a>
            </li>
            @endforeach
        </ul>
    </div>
    <!-- End .heading -->

    <div class="tab-content">
        <!-- All Products Tab -->
        <div class="tab-pane fade show active" id="top-all-tab" role="tabpanel" aria-labelledby="top-all-link">
            <div class="row justify-content-center">
                @foreach ($data['all_products'] as $product)
                    @include('web.partials.product-card', ['product' => $product])
                @endforeach
            </div>
        </div>

        <!-- Category Specific Tabs -->
        @foreach ($data['categories'] as $category)
            <div class="tab-pane fade" id="top-{{ $category->id }}-tab" role="tabpanel" aria-labelledby="top-{{ $category->id }}-link">
                <div class="row justify-content-center">
                    @foreach ($category->products as $product)
                        @include('web.partials.product-card', ['product' => $product])
                    @endforeach
                </div>
            </div>
        @endforeach

        @foreach ($data['categories'] as $category)
            <div class="tab-pane fade" id="top-{{ $category->id }}-tab" role="tabpanel"
                aria-labelledby="top-{{ $category->id }}-link" data-category="{{ $category->id }}">
                <div class="product-list-container"></div>
            </div>
        @endforeach


        
    </div>
    <!-- .End .tab-pane -->

    @if ($data['all_products']->hasPages())
        <nav aria-label="Page navigation">
            <ul class="pagination">

                {{-- Prev Button --}}
                @if ($data['all_products']->onFirstPage())
                    <li class="page-item disabled">
                        <a class="page-link page-link-prev" href="#" tabindex="-1" aria-disabled="true">
                            <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>Prev
                        </a>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link page-link-prev" href="{{ $data['all_products']->previousPageUrl() }}" aria-label="Previous">
                            <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>Prev
                        </a>
                    </li>
                @endif

                {{-- Page Numbers --}}
                @foreach ($data['all_products']->getUrlRange(1, $data['all_products']->lastPage()) as $page => $url)
                    <li class="page-item {{ $data['all_products']->currentPage() == $page ? 'active' : '' }}">
                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                    </li>
                @endforeach

                {{-- Page Total --}}
                <li class="page-item-total">of {{ $data['all_products']->lastPage() }}</li>

                {{-- Next Button --}}
                @if ($data['all_products']->hasMorePages())
                    <li class="page-item">
                        <a class="page-link page-link-next" href="{{ $data['all_products']->nextPageUrl() }}" aria-label="Next">
                            Next <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
                        </a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <a class="page-link page-link-next" href="#" aria-disabled="true">
                            Next <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
                        </a>
                    </li>
                @endif

            </ul>
        </nav>
    @endif

</div><!-- End .tab-content -->

<!-- <div class="more-container text-center">
    <a href="#" class="btn btn-outline-darker btn-more"><span>Load more products</span><i class="icon-long-arrow-down"></i></a>
</div>End .more-container -->

<div class="container">
    <hr>
    <div class="row justify-content-center">
        <div class="col-lg-4 col-sm-6">
            <div class="icon-box icon-box-card text-center">
                <span class="icon-box-icon">
                    <i class="icon-rocket"></i>
                </span>
                <div class="icon-box-content">
                    <h3 class="icon-box-title">Payment & Delivery</h3><!-- End .icon-box-title -->
                    <p>Free shipping for orders over $50</p>
                </div><!-- End .icon-box-content -->
            </div><!-- End .icon-box -->
        </div><!-- End .col-lg-4 col-sm-6 -->

        <div class="col-lg-4 col-sm-6">
            <div class="icon-box icon-box-card text-center">
                <span class="icon-box-icon">
                    <i class="icon-rotate-left"></i>
                </span>
                <div class="icon-box-content">
                    <h3 class="icon-box-title">Return & Refund</h3><!-- End .icon-box-title -->
                    <p>Free 100% money back guarantee</p>
                </div><!-- End .icon-box-content -->
            </div><!-- End .icon-box -->
        </div><!-- End .col-lg-4 col-sm-6 -->

        <div class="col-lg-4 col-sm-6">
            <div class="icon-box icon-box-card text-center">
                <span class="icon-box-icon">
                    <i class="icon-life-ring"></i>
                </span>
                <div class="icon-box-content">
                    <h3 class="icon-box-title">Quality Support</h3><!-- End .icon-box-title -->
                    <p>Alway online feedback 24/7</p>
                </div><!-- End .icon-box-content -->
            </div><!-- End .icon-box -->
        </div><!-- End .col-lg-4 col-sm-6 -->
    </div><!-- End .row -->

    <div class="mb-2"></div><!-- End .mb-2 -->
</div><!-- End .container -->

<div class="blog-posts pt-7 pb-7" style="background-color: #fafafa;">
    <div class="container">
        <h2 class="title-lg text-center mb-3 mb-md-4">From Our Blog</h2><!-- End .title-lg text-center -->

        <div class="owl-carousel owl-simple carousel-with-shadow" data-toggle="owl" data-owl-options='{
                            "nav": false, 
                            "dots": true,
                            "items": 3,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":1
                                },
                                "600": {
                                    "items":2
                                },
                                "992": {
                                    "items":3
                                }
                            }
                        }'>
            <article class="entry entry-display">
                <figure class="entry-media">
                    <a href="single.html">
                        <img src="{{ asset('public/assets/images/blog/home/post-1.jpg') }}" alt="image desc">
                    </a>
                </figure><!-- End .entry-media -->

                <div class="entry-body pb-4 text-center">
                    <div class="entry-meta">
                        <a href="#">Nov 22, 2018</a>, 0 Comments
                    </div><!-- End .entry-meta -->

                    <h3 class="entry-title">
                        <a href="single.html">Sed adipiscing ornare.</a>
                    </h3><!-- End .entry-title -->

                    <div class="entry-content">
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit.<br>Pelletesque
                            aliquet nibh necurna. </p>
                        <a href="single.html" class="read-more">Read More</a>
                    </div><!-- End .entry-content -->
                </div><!-- End .entry-body -->
            </article><!-- End .entry -->

            <article class="entry entry-display">
                <figure class="entry-media">
                    <a href="single.html">
                        <img src="{{ asset('public/assets/images/blog/home/post-2.jpg') }}" alt="image desc">
                    </a>
                </figure><!-- End .entry-media -->

                <div class="entry-body pb-4 text-center">
                    <div class="entry-meta">
                        <a href="#">Dec 12, 2018</a>, 0 Comments
                    </div><!-- End .entry-meta -->

                    <h3 class="entry-title">
                        <a href="single.html">Fusce lacinia arcuet nulla.</a>
                    </h3><!-- End .entry-title -->

                    <div class="entry-content">
                        <p>Sed pretium, ligula sollicitudin laoreet<br>viverra, tortor libero sodales leo, eget blandit
                            nunc tortor eu nibh. Nullam mollis justo. </p>
                        <a href="single.html" class="read-more">Read More</a>
                    </div><!-- End .entry-content -->
                </div><!-- End .entry-body -->
            </article><!-- End .entry -->

            <article class="entry entry-display">
                <figure class="entry-media">
                    <a href="single.html">
                        <img src="{{ asset('public/assets/images/blog/home/post-3.jpg') }}" alt="image desc">
                    </a>
                </figure><!-- End .entry-media -->

                <div class="entry-body pb-4 text-center">
                    <div class="entry-meta">
                        <a href="#">Dec 19, 2018</a>, 2 Comments
                    </div><!-- End .entry-meta -->

                    <h3 class="entry-title">
                        <a href="single.html">Quisque volutpat mattis eros.</a>
                    </h3><!-- End .entry-title -->

                    <div class="entry-content">
                        <p>Suspendisse potenti. Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae
                            luctus metus libero eu augue. </p>
                        <a href="single.html" class="read-more">Read More</a>
                    </div><!-- End .entry-content -->
                </div><!-- End .entry-body -->
            </article><!-- End .entry -->
        </div><!-- End .owl-carousel -->
    </div><!-- container -->

    <div class="more-container text-center mb-0 mt-3">
        <a href="blog.html" class="btn btn-outline-darker btn-more"><span>View more articles</span><i
                class="icon-long-arrow-right"></i></a>
    </div><!-- End .more-container -->
</div>

<div class="cta cta-display bg-image pt-4 pb-4" style="background-image: url({{ asset('public/assets/images/backgrounds/cta/bg-6.jpg);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-9 col-xl-8">
                <div class="row no-gutters flex-column flex-sm-row align-items-sm-center">
                    <div class="col">
                        <h3 class="cta-title text-white">Sign Up & Get 10% Off</h3><!-- End .cta-title -->
                        <p class="cta-desc text-white">Molla presents the best in interior design</p>
                        <!-- End .cta-desc -->
                    </div><!-- End .col -->

                    <div class="col-auto">
                        <a href="login.html" class="btn btn-outline-white"><span>SIGN UP</span><i
                                class="icon-long-arrow-right"></i></a>
                    </div><!-- End .col-auto -->
                </div><!-- End .row no-gutters -->
            </div><!-- End .col-md-10 col-lg-9 -->
        </div><!-- End .row -->
    </div><!-- End .container -->
</div><!-- End .cta -->

@endsection
@section('javascript')
<script src="{{ asset('public/assets/js/jquery.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $('.nav-link').on('click', function (e) {
            e.preventDefault();

            const categoryId = $(this).attr('id').split('-')[1];
            const tabSelector = '#top-' + categoryId + '-tab';

            loadCategoryProducts(categoryId, tabSelector);
        });

        // Load category products with pagination
        function loadCategoryProducts(categoryId, tabSelector, page = 1) {
            $.get('/category-products/' + categoryId + '?page=' + page, function (data) {
                $(tabSelector + ' .product-list-container').html(data);

                // Re-bind click event after loading new pagination
                $(tabSelector + ' .pagination a').on('click', function (e) {
                    e.preventDefault();
                    const pageUrl = $(this).attr('href');
                    const newPage = new URL(pageUrl).searchParams.get("page");
                    loadCategoryProducts(categoryId, tabSelector, newPage);
                });
            });
        }
    });
</script>
@endsection
