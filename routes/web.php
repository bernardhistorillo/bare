<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminSubscriberController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
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
Route::get('/', [HomeController::class, 'underConstruction'])->name('underConstruction.index');
Route::get('/home', [HomeController::class, 'index'])->name('home.index');

Route::middleware(['guest'])->group(function() {
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
});

Route::post('/getUser', [LoginController::class, 'login'])->name('login.submit');

Route::prefix('shop')->group(function () {
    Route::get('/', [ShopController::class, 'index'])->name('shop.index');
    Route::get('/{category}', [ShopController::class, 'category'])->name('shop.category');
    Route::get('/{category}/{product}', [ShopController::class, 'product'])->name('shop.product');

    Route::post('/getProducts', [ShopController::class, 'getProducts'])->name('shop.getProducts');
    Route::post('/updateCart', [ShopController::class, 'updateCart'])->name('shop.updateCart');
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

    Route::middleware(['auth'])->group(function() {
        Route::get('/logout', [LoginController::class, 'logout'])->name('auth.logout');

        Route::get('/subscribers', [AdminSubscriberController::class, 'index'])->name('admin.subscribers.index');
    });
});
