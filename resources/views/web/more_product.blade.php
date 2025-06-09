@extends('web.layouts2.app')
@section('content')

<div class="mb-6"></div><!-- End .mb-6 -->

<div class="mb-5"></div><!-- End .mb-6 -->

<div class="container">

    <div class="heading heading-center mb-6">
       
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
        <div class="tab-pane fade" id="top-{{ $category->id }}-tab" role="tabpanel"aria-labelledby="top-{{ $category->id }}-link">
            <div class="row justify-content-center">
                @foreach ($category->products as $product)
                    @include('web.partials.product-card', ['product' => $product])
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
    <!-- .End .tab-pane -->

</div><!-- End .tab-content -->


@endsection
@section('javascript')
@endsection