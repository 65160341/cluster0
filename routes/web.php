<?php

use App\Http\Controllers\C_Information;
use App\Http\Controllers\UserController;
use App\Http\Controllers\P_Password;
use Illuminate\Support\Facades\Route;

Route::get('/main-password', function () {
    return view('main-password');
});

Route::get('/change-password', function () {
    return view('change-password');
});


Route::get('/information', function () {
    return view('information');
});


Route::get('/information', [C_Information::class, 'information']);
Route::post('/main-password', [P_Password::class, 'store']); // ส่งข้อมูล เพื่อบันทึกลงในฐานข้อมูล || add-user
Route::get('/main-password', [P_Password::class, 'index']); // แสดงหน้าผู้ใช้ homepage
Route::get('/change-password/{id}', [P_Password::class, 'edit']); // การเรียกฟอร์มแก้ไขข้อมูลผู้ใช้ || edit-user
Route::put('update-user/{id}', [P_Password::class, 'update']);
