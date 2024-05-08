<?php

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
    return view('pages.index');
})->name('pages.index');

Route::get('/about', function () {
    return view('pages.aboutUs');
})->name('pages.aboutUs');

Route::get('/news', function () {
    return view('pages.news');
})->name('pages.news');

Route::get('/products', function () {
    return view('pages.products');
})->name('pages.products');

Route::get('/contact', function () {
    return view('pages.contactUs');
})->name('pages.contactUs');
