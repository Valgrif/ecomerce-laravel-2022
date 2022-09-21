<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;
use App\Models\Product;

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

Route::get('/', function () {
    return view('public.front-page', [
        'products' => Product::all(),
    ]);
})->name('store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

//---------------- ROUTES PUBLIC ----------------------------------------------------------------/

Route::get('/product/{slug}', [ProductController::class, 'show'])->name('show-product');

//---------------- ROUTES ADMIN INTERFACE -------------------------------------------------------/

Route::get('/admin', function () {
    return view('admin.front-page');
})->name('admin-page');

Route::get('/admin/new-product', [ProductController::class, 'new_form'])->name('new-product-form');
Route::post('/admin/new-product', [ProductController::class, 'create'])->name('create-product');

Route::get('/admin/new-category', [CategoryController::class, 'new_form_cat'])->name('new-category');
Route::post('/admin/new-category', [CategoryController::class, 'create_cat'])->name('create-category');

Route::get('/admin/new-tag', [TagController::class, 'new_form_tag'])->name('new-tag');
Route::post('/admin/new-tag', [TagController::class, 'create_tag'])->name('create-tag');
