<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\StoreController;
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

Route::get('/', [StoreController::class, 'front_page'])->name('store');
Route::get('/checkout', [StoreController::class, 'checkout_page'])->name('checkout');
Route::post('/checkout', [OrderController::class, 'cart_to_processing'])->name('process-checkout');

Route::get('/dashboard', function () {
    return redirect(route('store'));
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

//---------------- ROUTES PUBLIC ----------------------------------------------------------------/

Route::get('/product/{slug}', [ProductController::class, 'show'])->name('show-product');
Route::post('/product/add/{id}', [ProductController::class,'add'])->name('add-product-cart');

//---------------- ROUTES ADMIN INTERFACE -------------------------------------------------------/

Route::get('/admin', function () {
    return view('admin.front-page');
})->name('admin-page');

Route::get('/admin/new-product', [ProductController::class, 'new_form'])->name('new-product-form');
Route::post('/admin/new-product', [ProductController::class, 'create'])->name('create-product');
Route::get('/admin/product-list', [ProductController::class, 'list'])->name('list-product');

Route::get('/admin/new-category', [CategoryController::class, 'new_form_cat'])->name('new-category');
Route::post('/admin/new-category', [CategoryController::class, 'create_cat'])->name('create-category');
Route::get('/admin/categories-list', [CategoryController::class, 'list_category'])->name('list-categories');

Route::get('/admin/new-tag', [TagController::class, 'new_form_tag'])->name('new-tag');
Route::post('/admin/new-tag', [TagController::class, 'create_tag'])->name('create-tag');
Route::get('/admin/tags-list', [TagController::class, 'list_tags'])->name('list-tags');

Route::get('/admin/orders', [OrderController::class, 'list_orders'])->name('list-orders');
Route::post('admin/order/sent', [OrderController::class, 'processing_to_sent'])->name('list-sent');
