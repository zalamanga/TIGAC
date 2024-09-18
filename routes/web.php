<?php

use App\Http\Controllers\ProductVariantController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HeroBannerController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\MasterpieceController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PartnershipController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\VideoHomeBannerController;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
    echo 'ok';
});
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
    Route::get('/', [HomePageController::class, 'index'])->name('index');
    Route::get('/product', [ProductController::class, 'frontEndPage'])->name('product');
    Route::get('/program', [ProgramController::class, 'frontEndPage'])->name('program');
    Route::post('/program', [ProgramController::class, 'store'])->name('program.store');
    Route::resource('/subscriber', SubscriberController::class);
    Route::get('/discover', function () {
        return view('pages.frontend.about');
    })->name('discover');
    Route::get('/vaporistar', function () {
        return view('pages.frontend.vaporistar');
    })->name('vaporistar');
    Route::get('/newsletter', [NewsletterController::class, 'frontEndPage'])->name('newsletter');
    Route::get('/partnership', [PartnershipController::class, 'frontEndPage'])->name('partnership');
    Route::get('/contact', function () {
        return view('pages.frontend.contact');
    })->name('contact');
    Route::get('/find', function () {
        return view('pages.frontend.find');
    })->name('find');
    Route::get('/tcall', function () {
        return view('pages.frontend.tcall');
    })->name('tcall');
    Route::get('/contact', function () {
        return view('pages.frontend.contact');
    })->name('contact');
    Route::get('/about', function () {
        return view('pages.frontend.about');
    })->name('about');
    Route::get('/faq', [FaqController::class, 'frontEndPage'])->name('faq');
    Route::get('/product/{slug}', [ProductController::class, 'productDetailPage'])->name('product.detail');
    Route::get('/consumer-program', function () {
        return view('pages.frontend.consumerProgram');
    })->name('consumer.program');
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
        Route::resource('/programs', ProgramController::class, ['as' => 'admin']);
        Route::resource('/video-home-banners', VideoHomeBannerController::class, ['as' => 'admin']);
        Route::resource('/faqs', FaqController::class, ['as' => 'admin']);
    });
});
