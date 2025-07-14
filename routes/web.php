<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\CreatorRegisterController;
use App\Http\Controllers\SupporterRegisterController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ExplorerController;

//Ini Boleh dihapus bang nanti, cuman buat preview tailwind doang
use Illuminate\Support\Facades\File;

Route::get('/preview/{folder}/{file}', function ($folder, $file) {
    $viewPath = "public.$folder.$file"; // view('public.namaFolder.namaFile')

    if (!view()->exists($viewPath)) {
        abort(404, 'View not found');
    }

    return view($viewPath);
});

//Route Landing Page dan Halaman Public
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home-public', function () {
    return view('public.landing');
})->name('landing');;

Route::get('/explorer', function () {
    return view('public.explorer');
});
Route::get('/explorer', [ExplorerController::class, 'index'])->name('explorer');

Route::get('/profile', function () {
    return view('public.profil');
});


// Route Supporter
Route::get('/home-supporter', function () {
    return view('supporter.landing');
});

// Route Register Supporter
// Route::get('/register/supporter', function () {
//     return view('public.supporter');
// });

Route::get('/register/supporter', [SupporterRegisterController::class, 'showForm'])
    ->name('supporter.register.form');

Route::post('/register/supporter', [SupporterRegisterController::class, 'sendOtp'])
    ->name('supporter.register.otp');

Route::get('/register/otp/supporter', [SupporterRegisterController::class, 'showOtpForm'])
    ->name('supporter.otp.form');

Route::post('/register/otp/supporter', [SupporterRegisterController::class, 'verifyOtp'])
    ->name('supporter.otp.verify');

Route::post('/register/otp/supporter/resend', [SupporterRegisterController::class, 'resendOtp'])
    ->name('supporter.otp.resend');


// Route Creator
Route::get('/home-creator', function () {
    return view('creator.landing');
});

//Route Register Creator
Route::get('/register/creator', [CreatorRegisterController::class, 'showForm'])
    ->name('creator.register.form');

Route::post('/register/creator', [CreatorRegisterController::class, 'sendOtp'])
    ->name('creator.register.otp');

Route::get('/register/otp/creator', [CreatorRegisterController::class, 'showOtpForm'])
    ->name('creator.otp.form');

Route::post('/register/otp/creator', [CreatorRegisterController::class, 'verifyOtp'])
    ->name('creator.otp.verify');

Route::post('/register/otp/creator/resend', [CreatorRegisterController::class, 'resendOtp'])
    ->name('creator.otp.resend');



// Route Login logic
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

Route::get('/login', function () {
    return view('public.login');
})->name('login');

Route::get('/role', function () {
    return view('public.role');
});

Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::get('/logout', function () {
    Auth::logout(); // Logout dari Laravel
    session()->flush(); // Bersihin session
    return redirect('/login'); // Arahkan ke halaman login
})->name('logout');
