@extends('web.layouts2.app')

@section('content')
<nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
    <div class="container d-flex align-items-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Products</a></li>
            <li class="breadcrumb-item active" aria-current="page">Default</li>
        </ol>
        <nav class="product-pager ml-auto" aria-label="Product">
            <a class="product-pager-link product-pager-prev" href="#" aria-label="Previous" tabindex="-1">
                <i class="icon-angle-left"></i>
                <span>Prev</span>
            </a>
            <a class="product-pager-link product-pager-next" href="#" aria-label="Next" tabindex="-1">
                <span>Next</span>
                <i class="icon-angle-right"></i>
            </a>
        </nav><!-- End .pager-nav -->
    </div><!-- End .container -->
</nav><!-- End .breadcrumb-nav -->

<div class="page-content">
    <div class="container">
        <div class="product-details-top">
            <div class="row">

                <div class="col-md-6">
                    <div class="product-gallery product-gallery-vertical">
                        <div class="row">
                           
                            {{-- MAIN IMAGE --}}
                                @php
                                    $primaryImage = $product->images->firstWhere('is_primary', 1) ?? $product->images->first();
                                @endphp

                                @if ($primaryImage)
                                <figure class="product-main-image">
                                    <img id="product-zoom"
                                        src="{{ asset('public/assets/images/products/' . $primaryImage->path) }}"
                                        data-zoom-image="{{ asset('public/assets/images/products/' . $primaryImage->path) }}"
                                        alt="Main product image">

                                    <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                        <i class="icon-arrows"></i>
                                    </a>
                                </figure>
                                @endif

                                {{-- GALLERY --}}
                                <div id="product-zoom-gallery" class="product-image-gallery">
                                    @foreach ($product->images as $image)
                                        <a class="product-gallery-item {{ $loop->first ? 'active' : '' }}" href="#"
                                        data-image="{{ asset('public/assets/images/products/' . $image->path) }}"
                                        data-zoom-image="{{ asset('public/assets/images/products/' . $image->path) }}">
                                            <img src="{{ asset('public/assets/images/products/' . $image->path) }}" alt="product image">
                                        </a>
                                    @endforeach
                                </div>

                        </div><!-- End .row -->
                    </div><!-- End .product-gallery -->
                </div><!-- End .col-md-6 -->

                <div class="col-md-6">
                    <div class="product-details">
                        <h1 class="product-title">{{ $product->name }}</h1><!-- End .product-title -->

                        <div class="ratings-container">
                            <div class="ratings">
                                <div class="ratings-val" style="width: {{ ($product->rating ?? 0) * 20 }}%;"></div><!-- End .ratings-val -->
                            </div><!-- End .ratings -->
                            <a class="ratings-text" href="#product-review-link" id="review-link">({{ $product->reviews_count ?? 0 }} Reviews)</a>
                        </div><!-- End .rating-container -->


                        <div class="product-price">
                            ₹{{ number_format($product->price, 2) }}
                        </div><!-- End .product-price -->

                        <div class="product-content">
                            <p>{{ $product->description }}</p>
                        </div><!-- End .product-content -->

                        {{-- Color Dropdown --}}
                        @if(isset($attributeGroups['Color']))
                        <div class="details-filter-row details-row-size">
                            <label for="color">Color:</label>
                            <div class="select-custom">
                                <select name="color" id="color" class="form-control">
                                    <option value="" selected disabled>Select a Color</option>
                                    @foreach($attributeGroups['Color'] as $color)
                                        <option value="{{ strtolower($color) }}">{{ ucfirst($color) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @endif

                        {{-- Size Dropdown --}}
                        @if(isset($attributeGroups['Size']))
                        <div class="details-filter-row details-row-size">
                            <label for="size">Size:</label>
                            <div class="select-custom">
                                <select name="size" id="size" class="form-control">
                                    <option value="" selected disabled>Select a Size</option>
                                    @foreach($attributeGroups['Size'] as $size)
                                        <option value="{{ strtolower($size) }}">{{ strtoupper($size) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @endif
                        
                        <div class="details-filter-row details-row-size">
                            <label for="qty">Qty:</label>
                            <div class="product-details-quantity">
                                <input type="number" id="qty" class="form-control" value="1" min="1" max="10" step="1"
                                    data-decimals="0" required>
                            </div><!-- End .product-details-quantity -->
                        </div><!-- End .details-filter-row -->

                        <div class="product-details-action">
                            <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>

                            <div class="details-action-wrapper">
                                <a href="#" class="btn-product btn-wishlist" title="Wishlist"><span>Add to
                                        Wishlist</span></a>
                                <!-- <a href="#" class="btn-product btn-compare" title="Compare"><span>Add to
                                        Compare</span></a> -->
                            </div><!-- End .details-action-wrapper -->
                        </div><!-- End .product-details-action -->

                        <div class="product-details-footer">
                          
                            <div class="product-cat">
                                <span>Category:</span>
                                <a href="{{ route('category.products', $product->category->slug) }}">
                                    {{ $product->category->name }}
                                </a>
                            </div>


                            <div class="social-icons social-icons-sm">
                                <span class="social-label">Share:</span>
                                <a href="#" class="social-icon" title="Facebook" target="_blank"><i
                                        class="icon-facebook-f"></i></a>
                                <a href="#" class="social-icon" title="Twitter" target="_blank"><i
                                        class="icon-twitter"></i></a>
                                <a href="#" class="social-icon" title="Instagram" target="_blank"><i
                                        class="icon-instagram"></i></a>
                                <a href="#" class="social-icon" title="Pinterest" target="_blank"><i
                                        class="icon-pinterest"></i></a>
                            </div>
                        </div><!-- End .product-details-footer -->
                    </div><!-- End .product-details -->
                </div><!-- End .col-md-6 -->

            </div><!-- End .row -->
        </div><!-- End .product-details-top -->

        <div class="product-details-tab">
            <ul class="nav nav-pills justify-content-center" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab"
                        role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="product-info-link" data-toggle="tab" href="#product-info-tab" role="tab"
                        aria-controls="product-info-tab" aria-selected="false">Additional
                        information</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="product-shipping-link" data-toggle="tab" href="#product-shipping-tab"
                        role="tab" aria-controls="product-shipping-tab" aria-selected="false">Shipping & Returns</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab" role="tab"
                        aria-controls="product-review-tab" aria-selected="false">Reviews ({{ $product->reviews->count() }})</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel"
                    aria-labelledby="product-desc-link">
                    <div class="product-desc-content">
                        {!! $product->long_desc !!}
                    </div><!-- End .product-desc-content -->
                </div><!-- .End .tab-pane -->
                <div class="tab-pane fade" id="product-info-tab" role="tabpanel" aria-labelledby="product-info-link">
                    <div class="product-desc-content">
                        <p>{!! $product->additional_info !!}</p>
                    </div><!-- End .product-desc-content -->
                </div><!-- .End .tab-pane -->
                <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel"
                    aria-labelledby="product-shipping-link">
                    <div class="product-desc-content">
                        {!! $product->shipping_info !!}
                    </div><!-- End .product-desc-content -->
                </div><!-- .End .tab-pane -->


             <div class="tab-pane fade" id="product-review-tab" role="tabpanel"
                aria-labelledby="product-review-link">
                <div class="reviews">
                    <h3>Reviews ({{ $product->reviews->count() }})</h3>

                    @forelse ($product->reviews as $review)
                        <div class="review">
                            <div class="row no-gutters">
                                <div class="col-auto">
                                    <h4><a href="#">{{ $review->user->name ?? 'Anonymous' }}</a></h4>
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: {{ $review->rating * 20 }}%;"></div>
                                        </div>
                                    </div>
                                    <span class="review-date">{{ $review->created_at->diffForHumans() }}</span>
                                </div>
                                <div class="col">
                                    <h4>{{ $review->review_title ?? 'No Title' }}</h4>
                                    <div class="review-content">
                                        <p>{{ $review->comment }}</p>
                                    </div>
                                    <!-- <div class="review-action">
                                        <a href="#"><i class="icon-thumbs-up"></i>Helpful (0)</a>
                                        <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>No reviews yet.</p>
                    @endforelse
                </div>
            </div>
            <!-- .End .tab-pane -->
 
            </div><!-- End .tab-content -->
        </div><!-- End .product-details-tab -->

        <h2 class="title text-center mb-4">You May Also Like</h2><!-- End .title text-center -->

        <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
            data-owl-options='{
                "nav": false, 
                "dots": true,
                "margin": 20,
                "loop": false,
                "responsive": {
                    "0": { "items":1 },
                    "480": { "items":2 },
                    "768": { "items":3 },
                    "992": { "items":4 },
                    "1200": { "items":4, "nav": true, "dots": false }
                }
            }'>

            @foreach($relatedProducts as $related)
            <div class="product product-7 text-center">
                <figure class="product-media">
                    <a href="{{ route('product.show', $related->id) }}">
                        <img src="{{ asset('public/assets/images/demos/demo-2/products/' . $related->firstImage->path) }}" alt="Product image"
                            class="product-image">                          
                    </a>

                    <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                        <a href="#" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                        <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                    </div>

                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                    </div>
                </figure>

                <div class="product-body">
                    <div class="product-cat">
                        <a href="#">{{ $related->category->name ?? 'Category' }}</a>
                    </div>
                    <h3 class="product-title">
                        <a href="{{ route('product.show', $related->id) }}">{{ $related->name }}</a>
                    </h3>
                    <div class="product-price">
                        ₹{{ number_format($related->price, 2) }}
                    </div>
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: {{ ($related->rating ?? 0) * 20 }}%;"></div>
                        </div>
                        <span class="ratings-text">({{ $related->reviews_count ?? 0 }} Reviews)</span>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

    </div><!-- End .container -->
</div><!-- End .page-content -->

<button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

@endsection
@section('javascript')
@endsection