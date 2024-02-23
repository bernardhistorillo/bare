<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminAccountController;
use App\Http\Controllers\AdminInventoryController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminSubscriberController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/try', [HomeController::class, 'try']);
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/signup-discount', [HomeController::class, 'underConstruction'])->name('underConstruction.index');

Route::middleware(['guest'])->group(function() {
    Route::prefix('login')->group(function () {
        Route::get('/', [AuthenticationController::class, 'index'])->name('login.index');
        Route::post('/submit', [AuthenticationController::class, 'login'])->name('login.submit');
    });

    Route::prefix('register')->group(function () {
        Route::get('/', [AuthenticationController::class, 'registerPage'])->name('register.index');
        Route::post('/submit', [AuthenticationController::class, 'register'])->name('register.submit');
    });
});

Route::middleware(['auth'])->group(function() {
    Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout.index');

    Route::prefix('cart')->group(function () {
        Route::get('/', [CartController::class, 'index'])->name('cart.index');
        Route::post('/store', [CartController::class, 'store'])->name('cart.store');
        Route::post('/updateQuantity', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');
        Route::post('/delete', [CartController::class, 'delete'])->name('cart.delete');
    });

    Route::prefix('checkout')->group(function () {
        Route::get('/', [CheckoutController::class, 'index'])->name('checkout.index');
        Route::post('/checkPromoCode', [CheckoutController::class, 'checkPromoCode'])->name('checkout.checkPromoCode');
        Route::post('/proceedToPayment', [CheckoutController::class, 'proceedToPayment'])->name('checkout.proceedToPayment');

        Route::get('/create-payment', [PaymentController::class, 'createPayment']);
        Route::post('/handle-payment-callback', [PaymentController::class, 'handlePaymentCallback']);
    });

    Route::prefix('orders')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('orders.index');
        Route::get('/checkPayment/{reference}', [OrderController::class, 'checkPayment'])->name('orders.checkPayment');
        Route::get('/cancelPayment/{reference}', [OrderController::class, 'cancelPayment'])->name('orders.cancelPayment');
    });
});

Route::prefix('shop')->group(function () {
    Route::get('/', [ShopController::class, 'index'])->name('shop.index');
    Route::get('/{category}', [ShopController::class, 'category'])->name('shop.category');
    Route::get('/{category}/{product}', [ShopController::class, 'product'])->name('shop.product');

    Route::post('/search', [ShopController::class, 'search'])->name('shop.search');
});

Route::prefix('about')->group(function () {
    Route::get('/', [AboutController::class, 'index'])->name('about.index');
});

Route::prefix('blog')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('blog.index');
});

Route::prefix('contact')->group(function () {
    Route::get('/', [ContactController::class, 'index'])->name('contact.index');
    Route::post('/subscribeEmail', [ContactController::class, 'subscribeEmail'])->name('contact.subscribeEmail');
    Route::post('/sendMessage', [ContactController::class, 'sendMessage'])->name('contact.sendMessage');
});

Route::prefix('admin')->group(function () {
    Route::middleware(['guest'])->group(function() {
        Route::get('/', [LoginController::class, 'index'])->name('admin.login.index');
        Route::post('/login', [LoginController::class, 'login'])->name('admin.login.submit');
    });

    Route::middleware(['auth', 'is_admin'])->group(function() {
        Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');
        Route::post('/changePassword', [LoginController::class, 'changePassword'])->name('admin.changePassword');

        Route::prefix('orders')->group(function () {
            Route::get('/', [AdminOrderController::class, 'index'])->name('admin.orders.index');
            Route::post('/updateStatus', [AdminOrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');
        });

        Route::prefix('inventory')->group(function () {
            Route::get('/', [AdminInventoryController::class, 'index'])->name('admin.inventory.index');
            Route::get('/history', [AdminInventoryController::class, 'history'])->name('admin.inventory.history');

            Route::post('/setInventory', [AdminInventoryController::class, 'setInventory'])->name('admin.inventory.setInventory');
        });

        Route::get('/subscribers', [AdminSubscriberController::class, 'index'])->name('admin.subscribers.index');
        Route::get('/accounts', [AdminAccountController::class, 'index'])->name('admin.accounts.index');
    });
});
