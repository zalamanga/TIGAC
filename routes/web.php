<?php

use App\Http\Controllers\ProductVariantController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HeroBannerController;
use App\Http\Controllers\MasterpieceController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PartnershipController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
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

// Route::get('/', function () {
//     $fileProducts = file_get_contents('../public/data/products.json');
//     $data = json_decode($fileProducts, true);
//     $products = $data['products'];

//     return view('pages.index', compact('products'));
// })->name('pages.index');

// Route::get('/about', function () {
//     return view('pages.aboutUs');
// })->name('pages.aboutUs');

// Route::get('/news', function () {
//     return view('pages.news');
// })->name('pages.news');

Route::get('/landing', function () {
    return view('pages.landing');
})->name('pages.landing');

Route::get('/qr', function () {
    return view('pages.qr');
})->name('pages.qr');

// Route::get('/products', function () {
//     $fileProducts = file_get_contents('../public/data/products.json');
//     $data = json_decode($fileProducts, true);
//     $products = $data['products'];

//     return view('pages.products', compact('products'));
// })->name('pages.products');

// Route::get('/products/{id}', function (int $id) {
//     $fileProducts = file_get_contents('../public/data/products.json');
//     $data = json_decode($fileProducts, true);

//     $findIndex = array_search($id, array_column($data['products'], 'id'));

//     $product = $data['products'][$findIndex];

//     return view('pages.productsDetail', compact('product'));
// })->name('pages.products.detail');

// Route::get('/contact', function () {
//     return view('pages.contactUs');
// })->name('pages.contactUs');

// New FRONTEND

Route::name('pages.frontend.')->group(function () {
    Route::get('/', function () {
        return view('pages.frontend.index');
    })->name('index');
    Route::get('/product', function () {
        return view('pages.frontend.product');
    })->name('product');
    Route::get('/program', function () {
        return view('pages.frontend.index');
    })->name('program');
    Route::get('/discover', function () {
        return view('pages.frontend.index');
    })->name('discover');
    Route::get('/vaporistar', function () {
        return view('pages.frontend.index');
    })->name('vaporistar');
    Route::get('/newsletter', function () {
        return view('pages.frontend.index');
    })->name('newsletter');
    Route::get('/partnership', function () {
        return view('pages.frontend.index');
    })->name('partnership');
    Route::get('/contact', function () {
        return view('pages.frontend.contact');
    })->name('contact');
});

// Backend
Route::middleware(['auth'])->group(function () {
    // Admin
    Route::controller(AdminDashboardController::class)->middleware('auth')->group(function () {
        Route::get('/admin', 'index')->name('admin.index');
    });

    // Product Category
    Route::controller(ProductCategoryController::class)->middleware('auth')->group(function () {
        Route::get('/admin/products/categories', 'index')->name('admin.product.product-category.index');
        Route::get('/admin/products/categories/create', 'create')->name('admin.product.product-category.create');
        Route::get('/admin/products/categories/{productCategoryId}/edit', 'edit')->name('admin.product.product-category.edit');
        Route::post('/admin/products/categories/store', 'store')->name('admin.product.product-category.store');
        Route::put('/admin/products/categories/{productCategoryId}/update', 'update')->name('admin.product.product-category.update');
        Route::delete('/admin/products/categories/destroy/{productCategoryId}', 'destroy')->name('admin.product.product-category.destroy');
        Route::put('/admin/products/categories/chagne-active-status/{productCategoryId}', 'changeActiveStatus')->name('admin.product.product-category.change-active-status');
    });

    Route::controller(ProductVariantController::class)->middleware('auth')->group(function () {
        Route::get('/admin/products/variants', 'index')->name('admin.product.product-variant.index');
        Route::get('/admin/products/variants/create', 'create')->name('admin.product.product-variant.create');
        Route::get('/admin/products/variants/detail/{productVariantId}', 'show')->name('admin.product.product-variant.show');
        Route::get('/admin/products/variants/edit/{productVariantId}', 'edit')->name('admin.product.product-variant.edit');
        Route::post('/admin/products/variants/store', 'store')->name('admin.product.product-variant.store');
        Route::put('/admin/products/variants/update/{productVariantId}', 'update')->name('admin.product.product-variant.update');
        Route::delete('/admin/products/variants/destroy/{productVariantId}', 'destroy')->name('admin.product.product-variant.destroy');
    });

    Route::resource('userManagement', UserController::class)->middleware('auth');

    Route::post('/newsletter-upload-image', [NewsletterController::class, 'newsletterUploadImage'])->middleware('auth')->name('newsletter-upload-image');

    Route::prefix('admin')->middleware('auth')->group(function () {
        Route::delete('/products/{productId}/images/{productImagesId}/destroy', [ProductController::class, 'deleteProductImage'])->name('admin.products.images.delete');
        Route::resource('/products', ProductController::class, ['as' => 'admin']);
        Route::resource('/hero-banners', HeroBannerController::class, ['as' => 'admin']);
        Route::resource('/newsletters', NewsletterController::class, ['as' => 'admin']);
        Route::resource('/partnerships', PartnershipController::class, ['as' => 'admin']);
        Route::resource('/contacts', ContactController::class, ['as' => 'admin']);
        Route::resource('/masterpieces', MasterpieceController::class, ['as' => 'admin']);
    });
});
