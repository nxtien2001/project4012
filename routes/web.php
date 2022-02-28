<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\InvoiceController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ResignterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PhotosController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WishlistController;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('search', [HomeController::class, 'getSearch'])->name('getSearch');
Route::get('/danh-muc/{slug}/{id}.html', [HomeController::class, 'category'])->name('category');
Route::get('/chi-tiet-san-pham/{slug}/{id}.html', [HomeController::class, 'detail'])->name('productDetail');
Route::post('/chi-tiet-san-pham/{slug}/{id}.html', [HomeController::class, 'postComment']);
Route::get('/chi-tiet-bai-viet/{slug}.html', [HomeController::class, 'post'])->name('post');

//LOGIN
Route::get('login', [LoginController::class, 'getLoginForm'])->name('login');
Route::post('login',  [LoginController::class, 'login'])->name('auth.login');
Route::get('logout',  [LoginController::class, 'logout'])->name('auth.logout');

//ĐĂNG KÍ
Route::get('/dang-ky', [ResignterController::class, 'getResign'])->name('getResign');
Route::post('/dang-ky', [ResignterController::class, 'postResign'])->name('postResign');

//GIỎ HÀNG
Route::get('/add-cart/{id}', [CartController::class, 'AddCart'])->name('AddCart');

Route::group([
    'middleware' => ['check_login'],
], function () {

    //SẢN PHẨM YÊU THÍCH
    Route::get('/addToWishlist/{id}', [WishlistController::class, 'addtowishlist'])->name('addtowishlist');
    Route::get('/show-Wishlist', [WishlistController::class, 'wishPage'])->name('wishPage');
    Route::get('/wishlist/delete/{id}', [WishlistController::class, 'destroy'])->name('destroy');

    Route::get('/show-cart', [CartController::class, 'ShowCart'])->name('ShowCart');
    Route::get('/update-cart', [CartController::class, 'UpdateCart'])->name('UpdateCart');
    Route::get('/delete-cart', [CartController::class, 'DeleteCart'])->name('DeleteCart');
    Route::get('/thanh-toan', [CartController::class, 'getFormPay'])->name('getFormPay');
    Route::post('/dat-hang', [CartController::class, 'getSaveInfo'])->name('getSaveInfo');
    Route::get('/thanh-cong', [CartController::class, 'thanhcong'])->name('thanhcong');
});

Route::group([
    'middleware' => ['check_login'],
], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index')->middleware('check_admin');
    //USER
    Route::group([
        'prefix' => 'admin',
        'as' => 'admin.',
        'middleware' => ['check_admin'],
    ], function () {
        //UER
        Route::group([
            'prefix' => 'users',
            'as' => 'users.',
        ], function () {
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::get('/create', [UserController::class, 'create'])->name('create-user');
            Route::post('/store', [UserController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [UserController::class, 'update'])->name('update');
            Route::get('/{id}', [UserController::class, 'show'])->name('show');
            Route::post('/delete/{id}', [UserController::class, 'delete'])->name('delete');
        });

        //CATEGORY
        Route::group([
            'prefix' => 'categories',
            'as' => 'categories.',
            'middleware' => ['check_admin'],
        ], function () {
            Route::get('/', [CategoryController::class, 'index'])->name('index');
            Route::get('/create', [CategoryController::class, 'create'])->name('create');
            Route::post('/store', [CategoryController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [CategoryController::class, 'update'])->name('update');
            Route::get('/{id}', [CategoryController::class, 'show'])->name('show');
            Route::post('/delete/{id}', [CategoryController::class, 'delete'])->name('delete');
        });

        //PRODUCT
        Route::group([
            'prefix' => 'products',
            'as' => 'products.',
            'middleware' => ['check_admin'],
        ], function () {
            Route::get('/', [ProductController::class, 'index'])->name('index');
            Route::get('/create', [ProductController::class, 'create'])->name('create');
            Route::post('/store', [ProductController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [ProductController::class, 'update'])->name('update');
            Route::get('/{id}', [ProductController::class, 'show'])->name('show');
            Route::post('/delete/{id}', [ProductController::class, 'delete'])->name('delete');
            Route::get('/activePro/{pro_id}', [ProductController::class, 'activePro'])->name('activePro');
            Route::get('/unactivePro/{pro_id}', [ProductController::class, 'unactivePro'])->name('unactivePro');
        });

        //HÓA ĐƠN
        Route::group([
            'prefix' => 'invoices',
            'as' => 'invoices.',
            'middleware' => ['check_admin'],
        ], function () {
            Route::get('/', [InvoiceController::class, 'index'])->name('index');
            Route::get('/export/{id}', [InvoiceController::class, 'exportPDF'])->name('export');
            Route::get('/{id}', [InvoiceController::class, 'show'])->name('show');
            Route::post('/delete/{id}', [InvoiceController::class, 'delete'])->name('delete');
            Route::get('/cho-duyet/{invoice_id}', [InvoiceController::class, 'choduyet'])->name('choduyet');
            Route::get('/dang-xu-ly/{invoice_id}', [InvoiceController::class, 'dangxuly'])->name('dangxuly');
            Route::get('/dang-giao-hang/{invoice_id}', [InvoiceController::class, 'danggiaohang'])->name('danggiaohang');
            Route::get('/da-giao-hang/{invoice_id}', [InvoiceController::class, 'dagiaohang'])->name('dagiaohang');
            Route::get('/da-huy/{invoice_id}', [InvoiceController::class, 'dahuy'])->name('dahuy');
            Route::get('/chuyen-hoan/{invoice_id}', [InvoiceController::class, 'chuyenhoan'])->name('chuyenhoan');
        });

        //Thuộc tính
        Route::group([
            'prefix' => 'attributes',
            'as' => 'attributes.',
            'middleware' => ['check_admin'],
        ], function () {
            Route::get('/', [AttributeController::class, 'index'])->name('index');
            Route::get('/create', [AttributeController::class, 'create'])->name('create');
            Route::post('/store', [AttributeController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [AttributeController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [AttributeController::class, 'update'])->name('update');
            Route::post('/delete/{id}', [AttributeController::class, 'delete'])->name('delete');
        });

        //Bài viết
        Route::group([
            'prefix' => 'posts',
            'as' => 'posts.',
            'middleware' => ['check_admin'],
        ], function () {
            Route::get('/', [PostController::class, 'index'])->name('index');
            Route::get('/create', [PostController::class, 'create'])->name('create');
            Route::post('/store', [PostController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [PostController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [PostController::class, 'update'])->name('update');
            Route::get('/{id}', [PostController::class, 'show'])->name('show');
            Route::post('/delete/{id}', [PostController::class, 'delete'])->name('delete');
            Route::get('/activePost/{post_id}', [PostController::class, 'activePost'])->name('activePost');
            Route::get('/unactivePost/{post_id}', [PostController::class, 'unactivePost'])->name('unactivePost');
        });

        //COMMENT
        Route::group([
            'prefix' => 'comments',
            'as' => 'comments.',
            'middleware' => ['check_admin'],
        ], function () {
            Route::get('/', [CommentController::class, 'index'])->name('index');
            Route::post('/delete/{id}', [CommentController::class, 'delete'])->name('delete');
        });
    });
});
