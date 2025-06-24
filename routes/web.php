<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PagesController::class, 'index'])->name('index');
Route::get('/shop', [PagesController::class, 'shop'])->name('shop');
Route::get('/cart', [PagesController::class, 'cart'])->name('cart');
Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');
Route::get('/watchlist', [PagesController::class, 'watchlist'])->name('watchlist');
Route::get('/orders', [PagesController::class, 'orders'])->name('orders');
Route::get('/orders_details', [PagesController::class, 'orders_details'])->name('orders_details');
Route::get('/addresses', [PagesController::class, 'addresses'])->name('addresses');
Route::get('/add_address', [PagesController::class, 'add_address'])->name('add_address');
Route::get('/checkout', [PagesController::class, 'checkout'])->name('checkout');
Route::get('/confirmation_order', [PagesController::class, 'confirmation_order'])->name('confirmation_order');




Route::get('/myaccount', [PagesController::class, 'myaccount'])->middleware(['auth', 'verified'])->name('myaccount');

Route::get('/welcome', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
