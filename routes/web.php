<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\ProductController;
use App\Http\Controllers\web\CartController;
use App\Http\Controllers\web\RegisterController;
use App\Http\Controllers\web\AccountController;

Route::get('test', function () {
    return view('web.product_detail');
});

    Route::controller(ProductController::class)->group(function () {

        Route::get('/','home_page')->name('home');
        Route::get('more-products','more_product')->name('product.more');

        Route::get('product/show/{id}','details_page')->name('product.show');
        Route::get('/category/{slug}', 'show')->name('category.products');  // details page 
    });   

    Route::middleware(['auth'])->group(function () {

        Route::controller(CartController::class)->group(function () {

            Route::get('addCart/{id}','addToCart')->name('cart.add');
            Route::get('product/cart','showCart')->name('cart.index');
            Route::delete('/cart/{id}','removeItem')->name('cart.remove');
            Route::post('cart/update', 'updateCart')->name('cart.update');

            Route::post('orders', 'orders')->name('orders.index');
            Route::post('addresses', 'addresses')->name('addresses.index');
        });
       
        Route::controller(AccountController::class)->group(function () {

            Route::get('user/dashboard','dashboard')->name('user.dashboard');
            Route::post('update/account','update_account')->name('update.account');
        });
    });

    Route::controller(RegisterController::class)->group(function () {

        Route::post('/register', 'register')->name('user.register');
        // Route::post('/login', 'login')->name('user.login');
        Route::post('/login', 'login')->name('login');
        Route::get('/logout', 'logout')->name('user.logout');
    });