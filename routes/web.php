<?php

use App\Http\Controllers\Authenticate;
use App\Http\Controllers\Clicknext_page;
use App\Http\Controllers\applicantsController;
use App\Http\Controllers\contactFormController;
use App\Http\Controllers\MailController;
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

Route::get('/form', [applicantsController::class, 'index']);
Route::post('/form', [applicantsController::class, 'store']);
Route::resource('form', applicantsController::class);

Route::post('/vertify', [MailController::class, 'submitApplication'])->name('application.submit');

Route::get('/privacy', function () {
    return view('form.Privacy');
});

Route::get('/singleForm', function () {
    return view('single.singleForm');
});


Route::get('/contact', function () {
    return view('contactForm.contact');
});

Route::post('/contact/save', [contactFormController::class, 'store']);