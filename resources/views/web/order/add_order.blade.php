@extends('web.layouts2.app')
@section('content')

<div class="page-header text-center" 
 style="background-image: url('{{ asset('public/assets/images/page-header-bg.jpg') }}');">
    <div class="container">
        <h1 class="page-title">Checkout<span>Shop</span></h1>
    </div><!-- End .container -->
</div><!-- End .page-header -->

<nav aria-label="breadcrumb" class="breadcrumb-nav">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
             <li class="breadcrumb-item"><a href="{{ url('more-products') }}">Shop</a></li>
            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
        </ol>
    </div><!-- End .container -->
</nav><!-- End .breadcrumb-nav -->

<div class="page-content">
    <div class="checkout">
        <div class="container">

            <form action="{{ route('order.place') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-lg-9">
                        <h2 class="checkout-title" style="margin-top:0">Billing Details</h2><!-- End .checkout-title -->

                        <div class="row">
                            <div class="col-sm-6">
                                <label>First Name *</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name', $data['user_details']['name'] ) }}" required>
                            </div><!-- End .col-sm-6 -->

                            <div class="col-sm-6">
                                <label>Last Name *</label>
                                <input type="text" class="form-control" name="last_name" value="{{ old('last_name', $data['user_details']['last_name'] ) }}" required>
                            </div><!-- End .col-sm-6 -->
                        </div><!-- End .row -->

                        <label>Phone *</label>
                        <input type="tel" class="form-control" name="phone" value="{{ old('phone', $data['user_details']['phone'] ) }}" required>

                        <label>Email address *</label>
                        <input type="email" class="form-control" disabled name="email" value="{{ old('email', $data['user_details']['email'] ) }}" required>

                        <label>Street address *</label>
                        
                        <input type="text" class="form-control" name="street" value="{{ old('street', $data['user_details']['address']['street'] ?? '') }}" placeholder="House number and Street name" required>
                        <!-- <input type="text" class="form-control" placeholder="Appartments, suite, unit etc ..." required> -->

                        <div class="row">
                            <div class="col-sm-6">
                                <label>Town / City *</label>
                                <input type="text" class="form-control" name="city" value="{{ old('city', $data['user_details']['address']['city'] ?? '') }}" required>
                            </div><!-- End .col-sm-6 -->

                            <div class="col-sm-6">
                                <label>State *</label>
                                <input type="text" class="form-control" name="state" value="{{ old('state', $data['user_details']['address']['state'] ?? '') }}" required>
                            </div><!-- End .col-sm-6 -->
                        </div><!-- End .row -->

                        <div class="row">
                            <div class="col-sm-6">
                                <label>Country *</label>
                                <input type="text" class="form-control" name="country" value="{{ old('country', $data['user_details']['address']['country'] ?? '') }}" required>
                            </div><!-- End .col-sm-6 -->
                            <div class="col-sm-6">
                                <label>Postcode / ZIP *</label>
                                <input type="text" class="form-control" name="postal_code" value="{{ old('postal_code', $data['user_details']['address']['postal_code'] ?? '') }}" required>
                            </div><!-- End .col-sm-6 -->
                        </div><!-- End .row -->

                        <label>Order notes (optional)</label>
                        <textarea class="form-control" cols="10" rows="2" name="order_note" placeholder="Notes about your order, e.g. special notes for delivery"></textarea>

                        <input type="hidden" class="form-control" name="product_id" value="{{ $data['product_details']['id'] }}" required>
                        <input type="hidden" class="form-control" name="total" value="{{ $data['product_details']['price'] }}" required>

                    </div><!-- End .col-lg-9 -->

                    <aside class="col-lg-3">
                        <div class="summary">
                            <h3 class="summary-title">Your Order</h3><!-- End .summary-title -->

                            <table class="table table-summary">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><a href="{{ route('product.show',$data['product_details']['id']) }}">{{ $data['product_details']['name'] }}</a></td>
                                        <td>₹{{ number_format($data['product_details']['price'], 2) }}</td>
                                    </tr>
                                    <!-- <tr class="summary-subtotal">
                                        <td>Payable Amount:</td>
                                        <td>$160.00</td>
                                    </tr> -->
                                    <tr>
                                        <td>Shipping:</td>
                                        <td>Free shipping</td>
                                    </tr>
                                    <tr class="summary-total">
                                        <td>Payable Amount:</td>
                                        <td>₹{{ number_format($data['product_details']['price'], 2) }}</td>
                                    </tr><!-- End .summary-total -->
                                </tbody>
                            </table><!-- End .table table-summary -->

                            <div class="accordion-summary" id="accordion-payment">
                                
                                <div class="card">
                                    <div class="card-header" id="heading-3">
                                        <h2 class="card-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-3"
                                                aria-expanded="false" aria-controls="collapse-3">
                                                Cash on delivery
                                            </a>
                                        </h2>
                                    </div><!-- End .card-header -->
                                    <div id="collapse-3" class="collapse" aria-labelledby="heading-3"
                                        data-parent="#accordion-payment">
                                        <div class="card-body">Quisque volutpat mattis eros. Lorem ipsum dolor sit amet,
                                            consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros.
                                        </div><!-- End .card-body -->
                                    </div><!-- End .collapse -->
                                </div><!-- End .card -->

                                <div class="card">
                                    <div class="card-header" id="heading-4">
                                        <h2 class="card-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-4"
                                                aria-expanded="false" aria-controls="collapse-4">
                                                Razor Pay <small class="float-right paypal-link">What is  Razor Pay?</small>
                                            </a>
                                        </h2>
                                    </div><!-- End .card-header -->
                                    <div id="collapse-4" class="collapse" aria-labelledby="heading-4"
                                        data-parent="#accordion-payment">
                                        <div class="card-body">
                                            Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper
                                            suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum.
                                        </div><!-- End .card-body -->
                                    </div><!-- End .collapse -->
                                </div><!-- End .card -->
                              
                            </div><!-- End .accordion -->

                            <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                                <span class="btn-text">Place Order</span>
                                <span class="btn-hover-text">Proceed to Checkout</span>
                            </button>

                        </div><!-- End .summary -->
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </form>

        </div><!-- End .container -->
    </div><!-- End .checkout -->
</div><!-- End .page-content -->

@endsection
@section('javascript')
@endsection