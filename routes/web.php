<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\ProductController;

Route::get('test', function () {
    return view('web.product_detail');
});

    Route::controller(ProductController::class)->group(function () {

        Route::get('/','home_page');
        Route::get('more-products','more_product')->name('product.more');

        // Route::get('details_page','details_page');
        Route::get('product/show/{id}','details_page')->name('product.show');


        Route::get('/category/{slug}', 'show')->name('category.products');  // details page 



    });