<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Product\ProductController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\login\AuthController;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\Request;
use App\Login;
Auth::routes();
Route::prefix('account')->group(function(){
    Route::get('regester',[AuthController::class,'showFormRegester'])->name('account.regester');
    Route::post('regester',[AuthController::class,'regester'])->name('regester');

    Route::get('login',[AuthController::class,'showFormLogin'])->name('account.login');
    Route::post('login',[AuthController::class,'login'])->name('login');

    Route::get('logout/{username?}',[AuthController::class,'logout'])->name('account.logout');


    // Xử lý bên phần profile hồ sơ, đơn hàng mật khẩu
    Route::get('profile',[AuthController::class,'showProfile'])->name('account.profile');
    Route::post('profile',[AuthController::class,'profile'])->name('account.profile');
    Route::post('upLoadFile',[AuthController::class,'upLoadFile'])->name('account.uploadfile');
    //Đơn hàng của ban
    Route::get('checkdonhang',[AuthController::class,'showdonhang'])->name('account.donhang');

    //Đổi mật khẩu
    Route::get('doimatkhau',[AuthController::class,'showdoimatkhau'])->name('account.changepassword');
    Route::post('doimatkhau',[AuthController::class,'handledoimatkhau'])->name('account.changepassword');


});

?>