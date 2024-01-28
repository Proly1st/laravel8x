<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CookieController;
use App\Http\Controllers\ProductCartController;
use App\Http\Controllers\QuanLyDonHangController;

use Illuminate\Http\Request;
use App\Http\Controllers\TrangBanHangController;
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



//route index
Route::get('/', [ProductController::class,'index'])->name('products');

//route them categories
Route::post('/addcategory',[ProductController::class,'addCategories'])->name('AddCategory');

//route sua categories
Route::post('/editcategory',[ProductController::class,'editCategories'])->name('editCategory');

// route xoa categories
Route::post('/deletecategory',[ProductController::class,'deleteCategories']);

//route lay du lieu categories
Route::get('/select-categories', [ProductController::class,'showCategories']);

//route view catigori
Route::get('/categories', [ProductController::class,'Categories'])->name('Categories');

//route update status catecory
Route::post('/update-status-category',[ProductController::class,'updateStatusCategory']);


//route them product
Route::post('/addproduct',[ProductController::class,'AddProduct'])->name('addProduct');

//route update product
Route::post('/updateproduct',[ProductController::class,'updateProduct'])->name('update-product');

//route update status product
Route::post('/updatepstatusproduct',[ProductController::class,'updateStatusProduct']);

// route xoa product
Route::post('/deleteproduct',[ProductController::class,'deleteProduct']);

// route lấy dữ liệu product
Route::get('/showproduct',[ProductController::class,'showProduct']);


Route::get('/cookies',[CookieController::class,'index']);

Route::get('/sale',[TrangBanHangController::class,'index'])->name('sale');

//route tim kiem du lieu bang products
Route::get('/search-product', [TrangBanHangController::class,'searchProduct']);


Route::get('/trang-ban-hang',[TrangBanHangController::class,'showProductSale']);

// route hiển thị giao diên giỏ hàng
Route::get('/cart',[ProductCartController::class,'index'])->name('cart');

// route lấy dữ liêu giỏ hàng
Route::get('/showcart',[ProductCartController::class,'showCart']);

// route lấy dữ liêu giỏ hàng
Route::post('/luu-order',[ProductCartController::class,'saveOrder']);



//route view quan ly don hang
Route::get('/order', [QuanLyDonHangController::class,'index'])->name('quanly-donhang');


//route lay du lieu bang order
Route::get('/select-order', [QuanLyDonHangController::class,'showDonHang']);


//route lay du lieu bang order detail
Route::get('/select-orderDetail', [QuanLyDonHangController::class,'getOrderDetail']);

//route tim kiem du lieu bang order
Route::get('/search-order', [QuanLyDonHangController::class,'searchDonHang']);




//  Route::post('/xuLyRandom', [HomeController::class,'Random'] );

//  Route::post('/mangTangDan', [HomeController::class, 'MangTangDan' ]);

//  Route::post('/mangGiamDan',[HomeController::class,'MangGiamDan' ]);

//  Route::post('/tongMang',[HomeController::class,'TongMang']);

//  Route::post('/maxMang',[HomeController::class,'MaxMang']);

//  Route::post('/mangGiong', [HomeController::class,'MangGiong']);

//  Route::post('/mangKhac',  [HomeController::class, 'MangKhac']);

//  Route::post ('/soNguyenTo',[HomeController::class,'SoNguyenTo']);

//  Route::post ('/phanTuLe',[HomeController::class, 'PhanTuLe']);

// Route::get('/call-client2-api', [HomeController::class, 'callApiClient2']);
