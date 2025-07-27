<?php

use App\Http\Controllers\BackendControllers\CategoryController;
use App\Http\Controllers\BackendControllers\ProductsController;
use App\Http\Controllers\FrontendControllers\CartController;
use App\Http\Controllers\FrontendControllers\OrderController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubCategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendControllers\CheckoutController;
use App\Http\Controllers\FrontendControllers\ConfirmationController;

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
Route::get('/welcome', function () {
    return view('welcome');
});


Route::get('/', [PagesController::class, 'index'])->name('index');
Route::get('/shop', [PagesController::class, 'shop'])->name('shop');
Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');



/*  all routs for admin  */

Route::middleware(['auth', 'role:admin'])->group(function () {
    /* Admin dashboard route */
    Route::get('/dashboard', [PagesController::class, 'dashboard'])->name('dashboard');

    /* Admin categories routes  */
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    Route::get('/add_category', [CategoryController::class, 'create'])->name('create_category');
    Route::post('/store_category', [CategoryController::class, 'store'])->name('store_category');
    Route::get('/edit_category/{id}', [CategoryController::class, 'edit'])->name('edit_category');
    Route::put('/update_category/{id}', [CategoryController::class, 'update'])->name('update_category');
    Route::delete('/delete_category/{id}', [CategoryController::class, 'destroy'])->name('delete_category');

    /* Admin Sub categories routes  */
    Route::get('/subcategories', [SubCategoryController::class, 'index'])->name('subcategories');
    Route::get('/add_subcategories', [SubCategoryController::class, 'create'])->name('add_subcategories');
    Route::get('/get_categoriesJson', [SubCategoryController::class, 'getJson'])->name('get_categoriesJson');
    Route::post('/store_subcategories', [SubCategoryController::class, 'store'])->name('store_subcategories');
    Route::get('/edit_subcategories/{subcategory}', [SubCategoryController::class, 'edit'])->name('edit_subcategories');
    Route::put('/update_subcategories/{id}', [SubCategoryController::class, 'update'])->name('update_subcategories');
    Route::delete('/delete_subcategories/{id}', [SubCategoryController::class, 'destroy'])->name('delete_subcategories');

    /*  Admiin Products routes  */
    Route::get('/products', [ProductsController::class, 'index'])->name('products');
    Route::get('/add_products', [ProductsController::class, 'create'])->name('add_products');
    Route::post('/store_products', [ProductsController::class, 'store'])->name('store_products');
    Route::get('/edit_products/{id}', [ProductsController::class, 'edit'])->name('edit_products');
    Route::put('/update_products/{id}', [ProductsController::class, 'update'])->name('update_products');
    Route::delete('/delete_products/{id}', [ProductsController::class, 'destroy'])->name('delete_products');

    /* admin orders route */
    Route::get('/backend_orders', [PagesController::class, 'backend_orders'])->name('backend_orders');
    Route::get('/order_traking', [PagesController::class, 'order_traking'])->name('order_traking');


    Route::get('/coupons', [PagesController::class, 'coupons'])->name('coupons');
    Route::get('/users', [PagesController::class, 'users'])->name('users');
    Route::get('/admin_settings', [PagesController::class, 'admin_settings'])->name('admin_settings');
});


Route::middleware(['auth', 'role:user'])->group(function () {

    /* my account Route */
    Route::get('/myaccount', [PagesController::class, 'myaccount'])->name('myaccount');;

    /* cart route  */
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::patch('/cart/update/{id}', [CartController::class, 'updateQuantity'])->name('cart.update');

    /* check out rote  */
    Route::get('/checkout', [CheckoutController::class, 'showCheckoutForm'])->name('checkout');
    Route::post('/checkout', [OrderController::class, 'placeOrder'])->name('checkout.placeOrder');

    /* confirmation oreder route */
    Route::get('/order-confirmation', [ConfirmationController::class, 'index'])->name('confirmation_order');


    Route::get('/orders', [PagesController::class, 'orders'])->name('orders');
    Route::get('/addresses', [PagesController::class, 'addresses'])->name('addresses');
    Route::get('/add_address', [PagesController::class, 'add_address'])->name('add_address');
    Route::get('/account_details', [PagesController::class, 'account_details'])->name('account_details');
});

require __DIR__ . '/auth.php';
