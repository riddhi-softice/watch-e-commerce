@extends('web.layouts.app')

@section('content')

    <section class="banner section-dark" style="background: #222;">
        <img src="{{ asset('public/assets/images/demos-img/header_splash.jpg') }}" alt="" width="1920" height="1120">
        <div class="banner-text text-center">
            <h1>Your One-Stop Online Shopping Destination</h1>
            <h5 class="mb-5">Discover the latest products, unbeatable prices, and fast delivery — all in one place. Shop with confidence and enjoy a seamless online shopping experience.</h5>
            <p class="mb-0">
                <a href="#" class="btn btn-primary btn-outline goto-demos">
                    Shop Now <i class="icon-long-arrow-alt-down"></i>
                </a>
            </p>
        </div>
    </section>

    <!-- products types -->
    <section class="section section-demos text-center container-lg">
            <h2>Top Categories You'll Love</h2>
            <p>Explore a wide range of categories — from fashion and electronics to home essentials and more.<br>
            Thousands of happy customers trust us for quality products and great service.</p>
        
        <div class="row demos">
            @foreach ($data['product_type'] as $tValue)
                <div class="iso-item col-sm-6 col-md-4 col-lg-3 homepages">
                    <a href="coming-soon.html" target="_blank">
                        <img src="{{ asset('public/assets/images/demos-img/'.$tValue->type_image) }}" width="500" height="385"
                            class="molla-lz" style="padding-top: 77%" alt="{{ $tValue->type_image }}">
                        <h5>{{ $tValue->name }}</h5>
                    </a>
                </div>
            @endforeach
        </div>
        <h5 class="text-load-more">More New Products Coming Soon ...</h5>
    </section>

    <section class="section section-features">
        <h2 class="text-center">Why Shop With Us</h2>
        <p class="text-center">We offer an unbeatable shopping experience with premium features,<br>designed to make your life easier and shopping more enjoyable.</p>
        <div class="divider-line">
            <div class="container-lg">
                <div class="overflow-hidden">
                    <div class="row">
                        <div class="col-sm-6 col-lg-3">
                            <div class="icon-box">
                                <i class="icon-laptop"></i>
                                <h4>Mobile Friendly</h4>
                                <p>Shop on any device, anytime. Our site is fully responsive and optimized for phones, tablets, and desktops.</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="icon-box">
                                <i class="icon-laptop"></i>
                                <h4>Secure Payments</h4>
                                <p>We use trusted payment gateways to ensure every transaction is safe and protected.</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="icon-box">
                                <i class="icon-laptop"></i>
                                <h4>Fast & Reliable Delivery</h4>
                                <p>Enjoy quick shipping with live tracking and reliable courier partners across India.</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="icon-box">
                                <i class="icon-laptop"></i>
                                <h4>Easy Returns</h4>
                                <p>Hassle-free returns on all eligible items — because your satisfaction is our priority.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section section-support section-dark">
        <div class="container molla-lz text-center" data-oi="{{ asset('public/assets/images/demos-img/support_bg.jpg') }}">
            <h2>Need Help? We're Here for You<span class="fw-400"> 24/7</span></h2>
            <p>Our friendly customer support team is always ready to assist you.<br>Whether you have questions about your order, delivery, or returns — we’ve got you covered.</p>
        </div>
    </section>

    <section class="section section-light section-ready container text-center">
        <h2 class="mb-3">Ready to Shop? Start Your Journey Today!</h2>
        <p>Browse thousands of products, discover great deals, and enjoy fast delivery right to your doorstep.</p>
        <div class="star-rating mb-4 pb-3">
            <i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i>
        </div>
        <p><a class="btn btn-primary btn-outline" href="#"><i class="icon-shopping-cart"></i>Start Shopping</a></p>
    </section>      

@endsection
@yield('javascript')