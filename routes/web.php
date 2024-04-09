<?php

use App\Http\Controllers\Authenticate;
use App\Http\Controllers\C_Information;
use App\Http\Controllers\UserController;
use App\Http\Controllers\C_student;
use App\Http\Controllers\Clicknext_page;
use App\Models\P_Password;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Route::controller(Authenticate::class)->group(function () {
//     Route::get('login', 'login')->name('login');
//     Route::post('login', 'login_save')->name('login.save');
// });

// Route::controller(Clicknext_page::class)->prefix('pages')->group(function () {
//     Route::get('index', 'index')->name('index');
// });


// Route::get('/test', function () {
//     echo "<h1>test</h1><a href='" . url('/') . "'>HOME " . url('/') . "</a>";
// });

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

Route::get('/main-password', [UserController::class, 'index']); // แสดงหน้าผู้ใช้ homepage
Route::get('/change-password/{id}', [UserController::class, 'edit']); // การเรียกฟอร์มแก้ไขข้อมูลผู้ใช้ || edit-user
Route::put('update-user/{id}', [UserController::class, 'update']);
