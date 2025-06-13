<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\ProductController;
use App\Http\Controllers\web\OrderController;
use App\Http\Controllers\web\CartController;
use App\Http\Controllers\web\RegisterController;
use App\Http\Controllers\web\AccountController;
use App\Http\Controllers\web\RazorpayPaymentController;

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\TwoFactorAuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController as admin_product;

Route::get('test', function () {
    return view('web.12');
});

Route::get('about', function () {
    return view('web.pages.about');
});
Route::get('terms-and-conditions', function () {
    return view('web.pages.terms-and-conditions');
});
Route::get('shipping-delivery-policy', function () {
    return view('web.pages.shipping-delivery-policy');
});
Route::get('cancellation-refund-policy', function () {
    return view('web.pages.cancellation-refund-policy');
});
Route::get('contact-us', function () {
    return view('web.pages.contact-us');
});
Route::get('privacypolicy', function () {
    return view('web.pages.privacypolicy');
});

    Route::controller(ProductController::class)->group(function () {

        Route::get('/','home_page')->name('home');
        Route::get('more-products','more_product')->name('product.more');

        Route::get('product/show/{id}','details_page')->name('product.show');
       
    });   

    Route::middleware(['auth'])->group(function () {

        Route::controller(OrderController::class)->group(function () { 
            Route::get('addOrder/{id}','addOrder')->name('order.add');
            Route::post('place/order','placeOrder')->name('order.place');
            
            Route::get('orders/history', 'orderHistory')->name('orders.history');  // order page 
        });

        Route::controller(AccountController::class)->group(function () {

            Route::get('user/dashboard','dashboard')->name('user.dashboard');
            Route::post('update/account','update_account')->name('update.account');

            Route::get('/logout', 'logout')->name('user.logout');
        });
    });

    Route::controller(RegisterController::class)->group(function () {
   
        Route::get('sign-in', function () {
            return view('web.sign-in');
        })->name('sign-in');

        Route::post('/register', 'register')->name('user.register');
        Route::post('/login', 'login')->name('login');
    });
    
Route::get('razorpay-payment', [RazorpayPaymentController::class, 'index']);
Route::post('razorpay-payment', [RazorpayPaymentController::class, 'store'])->name('razorpay.payment.store');

// ****************************************** ADMIN ROUTES ************************************************* //
Route::prefix('admin')->group(function () {

    Route::group(['middleware' => ['admin']], function() {
        Route::get('2fa/setup', [TwoFactorAuthController::class, 'show2faForm'])->name('2fa.form');
        Route::post('2fa/setup', [TwoFactorAuthController::class, 'setup2fa'])->name('2fa.setup');
        Route::get('2fa/verify', [TwoFactorAuthController::class, 'showVerifyForm'])->name('2fa.verifyForm');
        Route::post('2fa/verify', [TwoFactorAuthController::class, 'verify2fa'])->name('2fa.verify');
    });

    // Optional: Also prefix login routes if admin login is separate
    Route::get('login', [AuthController::class, 'index'])->name('admin.login');
    Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');

    Route::middleware(['2fa','session.timeout','admin'])->group(function () {

        Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
        Route::get('account_setting', [AuthController::class, 'account_setting'])->name('account_setting');
        Route::post('account_setting_change', [AuthController::class, 'account_setting_change'])->name('post.account_setting');
        Route::get('logout', [AuthController::class, 'logout'])->name('logout');
        
        Route::resource('products', admin_product::class);

        Route::resource('users', UserController::class);
        Route::get('get_order_list', [UserController::class, 'get_order_list'])->name('get_order_list');

    });

});
