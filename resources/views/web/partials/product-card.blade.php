@php
    $firstImage = $product->images->get(0);
    $secondImage = $product->images->get(1);
@endphp

<div class="col-6 col-md-4 col-lg-3">
    <div class="product product-11 mt-v3 text-center">
        <figure class="product-media">
            <a href="{{ route('product.show', $product->id) }}">
                <img src="{{ $firstImage ? asset('public/assets/images/demos/demo-2/products/' . $firstImage->path) : asset('no-image.jpg') }}"
                     alt="{{ $product->name }}" class="product-image">
                <img src="{{ $secondImage ? asset('public/assets/images/demos/demo-2/products/' . $secondImage->path) : asset('no-image.jpg') }}"
                     alt="{{ $product->name }}" class="product-image-hover">
            </a>
            <div class="product-action-vertical">
                <a href="#" class="btn-product-icon btn-wishlist"><span>add to wishlist</span></a>
            </div>
        </figure>
        <div class="product-body">
            <h3 class="product-title">
                <a href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a>
            </h3>
            <div class="product-price">${{ $product->price }}</div>
        </div>
        <div class="product-action">
            <a href="{{ route('cart.add', $product->id) }}" class="btn-product btn-cart"><span>add to cart</span></a>
        </div>
    </div>
</div>
