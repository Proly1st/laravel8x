<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

use Illuminate\Http\Request;
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

//route them product
Route::post('/addproduct',[ProductController::class,'AddProduct'])->name('addProduct');

//route update product
Route::post('/updateproduct',[ProductController::class,'updateProduct'])->name('update-product');

// route xoa product
Route::post('/deleteproduct',[ProductController::class,'deleteProduct']);

// route lấy dữ liệu product
Route::get('/showproduct',[ProductController::class,'showProduct']);















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