<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\ProductController;

Route::get('test', function () {
    return view('web.product_detail');
});

    Route::controller(ProductController::class)->group(function () {

        Route::get('/','home_page');
        Route::get('details_page','details_page');
    });