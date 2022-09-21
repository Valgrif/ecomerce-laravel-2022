<?php

use App\Http\Controllers\ProductController;
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

require __DIR__.'/auth.php';

//---------------- ROUTES PUBLIC ----------------------------------------------------------------/

Route::get('/product/{slug}', [ProductController::class, 'show'])->name('show-product');

//---------------- ROUTES ADMIN INTERFACE -------------------------------------------------------/

Route::get('/admin', function (){
    return view('admin.front-page');
})->name('admin-page');

Route::get('/admin/new-product',[ProductController::class, 'new_form'])->name('new-product-form');
Route::post('/admin/new-product',[ProductController::class, 'create'])->name('create-product');
