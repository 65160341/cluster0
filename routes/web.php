<?php

use App\Http\Controllers\Authenticate;
use App\Http\Controllers\Clicknext_page;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

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


Route::controller(Authenticate::class)->group(function () {
    Route::get('/', 'login')->name('login');
    Route::post('/', 'login_save')->name('login.save');
});

Route::controller(Clicknext_page::class)->middleware('auth.sessions')->prefix('pages')->group(function () {
        Route::get('index', 'index')->name('index');
});
Route::middleware(['auth.sessions'])->group(function () {
    Route::get('index', 'App\Http\Controllers\Clicknext_page@index')->name('index');
});


// Route::get('/test', function () {
//     echo "<h1>test</h1><a href='" . url('/') . "'>HOME " . url('/') . "</a>";
// });

Route::get('/main', function () {
    return view('main');
});

Route::get('/myform', function () {
    return view('myform');
});

Route::get('/formdetail', function () {
    return view('formdetail');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// });

Route::get('/dashboard',[DashboardController::class,'userChart']);


Route::get('/test_sidebar', function () {
    return view('test_sidebar');
});
