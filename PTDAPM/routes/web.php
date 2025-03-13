<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DangNhap\TaikhoanController;
use App\Http\Controllers\VanPhongKhoa\VanPhongKhoaController;

Route::get('/', function () {
    return redirect()->route('login.form');
});

Route::get('/dang-nhap', [TaikhoanController::class, 'index'])->name('login.form'); // Trang hiển thị form đăng nhập
Route::post('/dang-nhap', [TaikhoanController::class, 'login'])->name('login.process'); // Xử lý đăng nhập


Route::middleware(['auth'])->group(function () {
    Route::get('/vanphongkhoa/capnhatketqua', [VanPhongKhoaController::class, 'capnhatketqua'])->name('vanphongkhoa.capnhatketqua');
    Route::get('/vanphongkhoa/quanlyphanbien', [VanPhongKhoaController::class, 'quanlyphanbienindex'])->name('vanphongkhoa.quanlyphanbien');
    Route::get('/vanphongkhoa/truycapthongtin', [VanPhongKhoaController::class, 'truyvanthongtin'])->name('vanphongkhoa.truyvanthongtin');
    Route::get('/vanphongkhoa/capnhatlichtrinhbaove', [VanPhongKhoaController::class, 'capnhatlichtrinhbaove'])->name('vanphongkhoa.capnhatlichtrinhbaove');
    Route::get('/vanphongkhoa/ghepdoidetai-hoidong', [VanPhongKhoaController::class, 'ghepdoidetaihoidong'])->name('vanphongkhoa.ghepdoidetaihoidong');
});

// Đăng xuất
Route::post('/dang-xuat', [TaikhoanController::class, 'logout'])->name('logout');
