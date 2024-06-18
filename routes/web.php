<?php

use App\Http\Controllers\AdminDashboardController;
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

Route::get('/', function () {
    $fileProducts = file_get_contents('../public/data/products.json');
    $data = json_decode($fileProducts, true);
    $products = $data['products'];

    return view('pages.index', compact('products'));
})->name('pages.index');

Route::get('/about', function () {
    return view('pages.aboutUs');
})->name('pages.aboutUs');

Route::get('/news', function () {
    return view('pages.news');
})->name('pages.news');

Route::get('/products', function () {
    $fileProducts = file_get_contents('../public/data/products.json');
    $data = json_decode($fileProducts, true);
    $products = $data['products'];

    return view('pages.products',compact('products'));
})->name('pages.products');

Route::get('/products/{id}', function (int $id) {
    $fileProducts = file_get_contents('../public/data/products.json');
    $data = json_decode($fileProducts, true);

    $findIndex = array_search($id, array_column($data['products'], 'id'));

    $product = $data['products'][$findIndex];

    return view('pages.productsDetail', compact('product'));
})->name('pages.products.detail');

Route::get('/contact', function () {
    return view('pages.contactUs');
})->name('pages.contactUs');

// Backend
Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin.index')->middleware('auth');

Route::get('/admin/products', function () {
    return "Product List";
})->name('admin.product');

Route::get('/admin/products/categories', function () {
    return "Product Category List";
})->name('admin.product.category');