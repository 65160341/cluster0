<?php

use App\Http\Controllers\Authenticate;
use App\Http\Controllers\Clicknext_page;
use Illuminate\Http\Request;
use App\Http\Controllers\position_form_Controller;
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

Route::get('/main', function () {
    return view('main');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/', [position_form_Controller::class, 'index']);
Route::post('/store', [position_form_Controller::class, 'store'])->name ('stored_data');
Route::get('/test', function () {
    return view('maintest');
});
Route::get('/test2', function () {
    return view('test2');
});
