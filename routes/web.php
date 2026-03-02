<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.website.home');
})->name('web-home');


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
});