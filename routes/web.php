<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\applicantsController;
use App\Http\Controllers\Authenticate;
use App\Http\Controllers\C_Information;
use App\Http\Controllers\C_student;
use App\Http\Controllers\Clicknext_page;
use App\Http\Controllers\contactFormController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\MailController;




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
    Route::post('/login_save',  [Authenticate::class, 'login_save']);
});

// Route::controller(Clicknext_page::class)->middleware('auth.sessions')->group(function () {
//         Route::get('/dashboard', 'dashboard')->name('dashboard');
// });
Route::middleware(['auth.sessions'])->group(function () {
    // Route::get('/index', 'App\Http\Controllers\Clicknext_page@index')->name('index');
    Route::get('/dashboard',[DashboardController::class,'userChart'])->name('dashboard');
});


// Route::get('/test', function () {
//     echo "<h1>test</h1><a href='" . url('/') . "'>HOME " . url('/') . "</a>";
// });

Route::get('/main', function () {
    return view('main');
})->name('main');

Route::get('/myform', function () {
    return view('myform');
});

Route::get('/formdetail', function () {
    return view('formdetail');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// });

// Route::get('/dashboard',[DashboardController::class,'userChart']);


Route::get('/test_sidebar', function () {
    return view('test_sidebar');
});

Route::get('/information', function () {
    return view('information');
});


Route::get('/information', [C_Information::class, 'information']);

// Route::get('/selected', function () {
//     return view('selected');
// });


Route::get('/selected', [C_student::class, 'selected'])->name('selected');

// Route::get('/information', [C_student::class, 'information']);
Route::get('/update-selected/{id}', [C_student::class, 'update_selected']);
Route::get('/selected-information', [C_student::class, 'show_selected'])->name('selected_information');
Route::get('/update/{id}', [C_student::class, 'update_status']);
Route::get('/hidden-data',  [C_student::class, 'showHiddenData'])->name('hidden_data');
Route::get('/public-data',  [C_student::class, 'showPublicData'])->name('public_data');


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


// Route::get('/main', function () {
    //     return view('main');
    // });

    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // });
    // Route::get('/', [position_form_Controller::class, 'index']);
    // Route::post('/store', [position_form_Controller::class, 'store'])->name ('stored_data');
    // Route::get('/test', function () {
    //     return view('maintest');
    // });
    // Route::get('/test2', function () {
    //     return view('test2');
    // });

    // Route::get('/', function () {
    //     return redirect('/test');
    // });

Route::get('/createform', [FormController::class, 'indexCreate'])->name('createform.index');
Route::post('/formStore', [FormController::class, 'formStore'])->name('form.store');
Route::delete('/forms/{id}', [FormController::class, 'destroy'])->name('forms.destroy');
Route::get('/forms', [FormController::class, 'indexMyform'])->name('forms.index');
Route::get('/formdetail/{form_id}', [FormController::class, 'show'])->name('formdetail.show');
Route::get('/forms/{id}/edit', [FormController::class, 'edit'])->name('forms.edit');
Route::post('/forms/{id}/update', [FormController::class, 'update'])->name('forms.update');