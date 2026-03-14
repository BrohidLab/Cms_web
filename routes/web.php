<?php

use App\Http\Controllers\Admin\AboutPagesController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\ConsultationController;
use App\Http\Controllers\Admin\HomePagesController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Website\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('web-home');
Route::post('/konsultasi', [HomeController::class, 'konsultasi'])->name('konsultasi.store');


Route::get('/user-admin', [AuthController::class, 'index']);
Route::get('/user-admin/register', [AuthController::class, 'register'])->name('register_user');
Route::post('/user-admin/login', [AuthController::class, 'login'])->name('login_user');
Route::post('user-admin/logout',[AuthController::class,'logout'])->middleware('auth')->name('logout_user');

Route::middleware('auth')->group(function () {
    Route::get('user-admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    /*product*/
     Route::prefix('user-admin/product')->name('product.')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/create/{idProduct?}', [ProductController::class, 'create'])->name('create');
        Route::post('/store-product', [ProductController::class, 'storeProduct'])->name('store_product');
        Route::post('/store-product-color', [ProductController::class, 'storeProductColor'])->name('store_product_color');
        Route::post('/store-product-type', [ProductController::class, 'storeProductType'])->name('store_product_type');
        Route::delete('/product-type-delete/{typeId}', [ProductController::class, 'deleteTypeProduct'])->name('delete_product_type');
        Route::put('/update-product/{idProduct}', [ProductController::class, 'updateCreateProduct'])->name('update_product');
        Route::get('/create/{idProduct}/product-type', [ProductController::class, 'createProductType'])->name('create_product_type');
        Route::get('/create/{idProduct}/product-type-color', [ProductController::class, 'productColor'])->name('create_product_color');
        Route::delete('/product/color/{id}', [ProductController::class, 'deleteProductColor'])->name('delete_product_color');

        Route::get('/product/{idProduct}/product-color-image', [ProductController::class, 'createProductImage'])
            ->name('product.create_product_image');
        Route::get('/product/get-colors/{typeId}', 
                [ProductController::class, 'getColorByTypeId']
            )->name('get_color_by_type');
        Route::post('/image/store', [ProductController::class, 'storeProductImage'])->name('store_product_img');
        Route::delete('/product/image/{id}', [ProductController::class, 'deleteProductImage'])->name('delete_product_image');

        Route::get('/product/{idProduct}/gallery',
            [ProductController::class, 'createGallery']
        )->name('create_gallery');

        Route::post('/product/gallery/store',
            [ProductController::class, 'storeGallery']
        )->name('store_gallery');

        Route::delete('/product/gallery/{id}',
            [ProductController::class, 'deleteGallery']
        )->name('delete_gallery');

        Route::get('/product/publish/{id}',
            [ProductController::class, 'publishProduct']
        )->name('publish_product');

    });

    Route::prefix('user-admin/article')->name('article.')->group(function () {
        Route::get('/',[ArticleController::class ,'index'])->name('index');
        Route::get('/create', [ArticleController::class, 'create'])->name('create');
        Route::post('/store', [ArticleController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ArticleController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [ArticleController::class, 'update'])->name('update');
        Route::delete('delete/{id}', [ArticleController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('user-admin/front-pages')->name('front_page.')->group(function () {
        
        /*HomePage*/
        Route::get('/home-pages',[HomePagesController::class ,'index'])->name('homes.index');
        Route::get('/home-pages/upload',[HomePagesController::class ,'upload'])->name('homes.upload');
        Route::post('/home-pages/store',[HomePagesController::class ,'simpan'])->name('homes.store');
        
        /*About Me */
        Route::get('/about-pages',[AboutPagesController::class ,'index'])->name('about.index');
        Route::post('/about-pages',[AboutPagesController::class ,'update'])->name('about.update');

        /*product*/
        Route::get('/product-pages',[AboutPagesController::class ,'prodindex'])->name('product.index');
        Route::post('/product-pages',[AboutPagesController::class ,'produpdate'])->name('product.update');

        /*service*/
        Route::get('/service-pages',[AboutPagesController::class ,'serviceindex'])->name('service.index');
        Route::post('/service-pages',[AboutPagesController::class ,'serviceupdate'])->name('service.update');

        /*suku_cadang*/
        Route::get('/suku-cadang-pages',[AboutPagesController::class ,'cadangindex'])->name('suku_cadang.index');
        Route::post('/suku-cadang-pages',[AboutPagesController::class ,'cadangupdate'])->name('suku_cadang.update');

        /*berita*/
        Route::get('/berita-pages',[AboutPagesController::class ,'beritaindex'])->name('berita.index');
        Route::post('/berita-pages',[AboutPagesController::class ,'beritaupdate'])->name('berita.update');

        /*kontak*/
        Route::get('/kontak-pages',[AboutPagesController::class ,'kontakindex'])->name('kontak.index');
        Route::post('/kontak-pages',[AboutPagesController::class ,'kontakupdate'])->name('kontak.update');
    });

    Route::prefix('user-admin/testimoni')->name('testimoni.')->group(function () {
        Route::get('/',[TestimonialController::class ,'index'])->name('index');
        Route::get('/tambah-ulasan',[TestimonialController::class ,'create'])->name('create');        
        Route::post('/create-ulasan',[TestimonialController::class ,'store'])->name('store');        
        Route::get('/testimonial/{id}/edit', [TestimonialController::class,'edit'])->name('edit');
        Route::put('/testimonial/{id}/update', [TestimonialController::class,'update'])->name('update');
        Route::delete('/testimonial/{id}/delete', [TestimonialController::class,'destroy'])->name('delete');
    });

    Route::prefix('user-admin/Konsultasi')->name('konsultasi.')->group(function () {
        Route::get('/',[ConsultationController::class ,'index'])->name('index');
        
    });
});
