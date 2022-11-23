<?php

use App\Http\Controllers\Admin\OrderConTroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//Quản lý bên tài khoảng
Route::prefix('admin')->group(function(){
    Route::get('',[AdminController::class,'showDashboard'])->name('admin.show');
    Route::get('showDashboard',[AdminController::class,'showDashboard'])->name('admin.show');

    Route::get('showAccount',[AdminController::class,'showAccount'])->name('admin.account');

    Route::get('showfindmember',[AdminController::class,'showfindmember'])->name('admin.findmember');
    Route::post('showfindmember',[AdminController::class,'handlefindMember'])->name('admin.findmember');

    Route::get('showchangeAccount-{username?}',[AdminController::class,'showchangeAccount'])->name('admin.changeAccount');
    Route::post('showchangeAccount',[AdminController::class,'getChangeaccount'])->name('admin.changeAccount');

    Route::get('showAddAccount',[AdminController::class,'showAddAccount'])->name('admin.showAddAccount');
    Route::post('showAddAccount',[AdminController::class,'getAddAccount'])->name('admin.showAddAccount');
});
//Quản lý bên sản phẩm
Route::prefix('admin')->group(function(){
    Route::get('showAllProduct',[ProductController::class,'showAllProduct'])->name('admin.showAllProduct');


    Route::get('showaddProduct',[ProductController::class,'showAddProduct'])->name('admin.addProduct');
    Route::post('showaddProduct',[ProductController::class,'HandleAddProduct'])->name('admin.addProduct');

    Route::post('showchangeProduct',[ProductController::class,'HandleChangeProduct'])->name('admin.postchangeProduct');
    Route::get('changeProduct-{maSanPham?}',[ProductController::class,'showchangeProduct'])->name('admin.changeProduct');


    Route::post('showCatelory',[ProductController::class,'HandleCatelory'])->name('admin.catelory');
    Route::get('showCatelory',[ProductController::class,'showCatelory'])->name('admin.catelory');

});

//Quản lý Đơn hàng 
Route::prefix('admin')->group(function(){
    Route::get('showAllOrder',[OrderConTroller::class,'showAllOrder'])->name('admin.showAllOrder');
});