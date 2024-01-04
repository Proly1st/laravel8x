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

 Route::get('/', [ProductController::class,'index']);

 Route::post('/xuLyRandom', [HomeController::class,'Random'] );

 Route::post('/mangTangDan', [HomeController::class, 'MangTangDan' ]);

 Route::post('/mangGiamDan',[HomeController::class,'MangGiamDan' ]);

 Route::post('/tongMang',[HomeController::class,'TongMang']);

 Route::post('/maxMang',[HomeController::class,'MaxMang']);

 Route::post('/mangGiong', [HomeController::class,'MangGiong']);

 Route::post('/mangKhac',  [HomeController::class, 'MangKhac']);

 Route::post ('/soNguyenTo',[HomeController::class,'SoNguyenTo']);

 Route::post ('/phanTuLe',[HomeController::class, 'PhanTuLe']);

 
Route::get('/call-client2-api', [HomeController::class, 'callApiClient2']);

Route::get('/product', [ProductController::class,'Product'])->name('products');

Route::get('/Categories',[ProductController::class,'Categories'])->name('categories');