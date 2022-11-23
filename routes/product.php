<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Product\ProductController;
use Illuminate\Support\Facades\DB;
use  App\Http\Middleware\AutherMiddleware;
use App\Models\User;
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
Auth::routes();



Route::get('/',function(){

    $api=DB::table('sanphamchitiet')
    ->leftJoin('sanpham','sanphamchitiet.maSanPham','=','sanpham.maSanPham')
    ->orderByRaw('sanphamchitiet.sale DESC')
    ->get();
    return view('layoutMaster.home',compact('api'));
})->name('home');

Route::get('/home',function(){
   
    $api=DB::table('sanphamchitiet')
    ->leftJoin('sanpham','sanphamchitiet.maSanPham','=','sanpham.maSanPham')
    ->orderByRaw('sanphamchitiet.sale DESC')
    ->get();
    return view('layoutMaster.home',compact('api'));
})->name('product.home');


Route::prefix('')->group(function(){
    Route::get('/lienhe',[ProductController::class,'lienhe'])->name('product.lienhe');
    Route::post('/lienhe',[ProductController::class,'addlienhe'])->name('product.lienhe');
    Route::get('/giohang',[ProductController::class,'giohang'])->name('product.giohang');
    Route::get('/thanhtoan',[ProductController::class,'thanhtoan'])->name('product.thanhtoan');
    Route::post('/thanhtoan',[ProductController::class,'donhang'])->name('product.donhang');
    Route::get('/gioithieu',[ProductController::class,'gioithieu'])->name('product.gioithieu');
     Route::get('/thanksyou',[ProductController::class,'checkout'])->name('product.checkout');
     Route::get('/maildonhang/{maThanhToan?}/{listSP?}', [ProductController::class, 'sendmaildonhang'])->name('maildonhang');
     Route::get('/xacthucemail/{maThanhToan?}', [ProductController::class, 'xacthucEmail'])->name('xacthucemail');
});

// route sản phẩm
Route::prefix('sanpham')->group(function(){
    Route::get('all/{category?}',[ProductController::class,'sanpham'])->name('product.sanpham');
    Route::get('loai/chitiet/',[ProductController::class,'sanphamchitiet'])->name('product.gochitiet');
    Route::get('chitiet/{id?}-{status?}-{kind?}-{slug?}',[ProductController::class,'sanphamchitiet'])->name('product.sanphamchitiet');
    Route::get('loai/chitiet/{id?}-{status?}-{kind?}-{slug?}',[ProductController::class,'sanphamchitiet'])->name('product.sanphamchitiet');
    Route::get('loai/{category?}',[ProductController::class,'sanphamtungloai'])->name('product.sanpham.tungloai');
    Route::post('chitiet/{id?}-{status?}-{kind?}-{slug?}',[ProductController::class,'addbinhluan'])->name('product.addBinhLuan');
});
Route::prefix('tintuc')->group(function(){
    Route::get('/',[ProductController::class,'tintuc'])->name('product.tintuc');
    Route::get('chitiet',[ProductController::class,'tintucchitiet'])->name('product.tintucchitiet');
});


