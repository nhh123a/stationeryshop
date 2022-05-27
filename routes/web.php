<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\Products\ProductController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Brand\BrandController;
use App\Http\Controllers\Admin\Users\UserController;
use App\Http\Controllers\Web\WebController;
use App\Http\Controllers\Web\CartController;
use App\Http\Controllers\Web\Menu\MenuWebController;
use App\Http\Controllers\Web\Users\LoginWebController;

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

Route::get('admin/users/login', [LoginController::class,'index'])->name('login');
Route::post('admin/users/login/store', [LoginController::class, 'store'] );
Route::get('admin/users/logout', [LoginController::class,'logout']);

Route::prefix('web')->group(function(){
    Route::get('/', [WebController::class,'index'])->name('main');
    Route::get('/main', [WebController::class,'index'])->name('web');
    Route::get('/category/{id}',[MenuWebController::class,'category']);
    Route::get('/brand/{id}',[MenuWebController::class,'brand']);
    Route::get('/product_details/{id}',[WebController::class,'productdetails']);
    Route::post('/sign-in',[LoginWebController::class,'store']);
    Route::get('/logout',[LoginWebController::class,'logout']);
    Route::get('/addtocart/{id}',[CartController::class,'addtocart']);

    Route::middleware(['auth'])->group(function () {
        Route::get('/cart',[CartController::class,'cart']);
        Route::get('/cart/delete/{id}',[CartController::class,'delete']);
        Route::get('/cart/buy',[CartController::class,'buy']);
    });
});

Route::middleware(['auth'])->group(function () {

    Route::prefix('admin')->group(function(){
        Route::get('/', [MainController::class,'index'])->name('main');
        Route::get('/main', [MainController::class,'index']);

        Route::prefix('product')->group(function(){
            //Route::get('/', [ProductController::class,'index'])->name('product');
            Route::get('list', [ProductController::class,'index'])->name('listproduct');
            Route::get('search', [ProductController::class,'search']);
            Route::get('add',[ProductController::class,'create'] );
            Route::post('store',[ProductController::class,'store'] );
            Route::get('delete/{id}',[ProductController::class,'destroy'] );
            Route::get('edit/{id}',[ProductController::class,'edit'] );
            Route::post('update/{id}',[ProductController::class,'update'] );
        });

        Route::prefix('category')->group(function(){
            Route::get('list', [CategoryController::class,'index'])->name('listcategory');
            Route::get('add',[CategoryController::class,'create'] );
            Route::get('store',[CategoryController::class,'store'] );
            Route::get('delete/{id}',[CategoryController::class,'destroy'] );
            Route::get('edit/{id}',[CategoryController::class,'edit'] );
            Route::post('update/{id}',[CategoryController::class,'update'] );
            Route::get('search', [CategoryController::class,'search']);
        });

        Route::prefix('brand')->group(function(){
            Route::get('list',[BrandController::class,'index'])->name('listbrand');
            Route::get('add',[BrandController::class,'create'] );
            Route::get('store',[BrandController::class,'store'] );
            Route::get('delete/{id}',[BrandController::class,'destroy'] );
            Route::get('edit/{id}',[BrandController::class,'edit'] );
            Route::post('update/{id}',[BrandController::class,'update'] );
            Route::get('search', [BrandController::class,'search']);
        });
        Route::prefix('user')->group(function(){
            Route::get('list',[UserController::class,'index'])->name('listuser');
            Route::get('delete/{id}',[UserController::class,'destroy'] );
            Route::get('search', [UserController::class,'search']);
        });
    });
});
