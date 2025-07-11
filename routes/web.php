<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\CreatorRegisterController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;

//Ini Boleh dihapus bang nanti, cuman buat preview tailwind doang
use Illuminate\Support\Facades\File;

Route::get('/preview/{folder}/{file}', function ($folder, $file) {
    $viewPath = "public.$folder.$file"; // view('public.namaFolder.namaFile')

    if (!view()->exists($viewPath)) {
        abort(404, 'View not found');
    }

    return view($viewPath);
});


// Menampilkan form
Route::get('/register/creator', [CreatorRegisterController::class, 'showForm'])
    ->name('creator.register.form');

Route::post('/register/creator', [CreatorRegisterController::class, 'sendOtp'])
    ->name('creator.register.otp');

Route::get('/register/supporter', function () {
    return view('public.supporter');
});


Route::get('/register/otp', [CreatorRegisterController::class, 'showOtpForm'])
    ->name('otp.form');

/* LANGKAH 2 → verifikasi otp & simpan user (POST) */
Route::post('/register/otp', [CreatorRegisterController::class, 'verifyOtp'])
    ->name('otp.verify');

// routes/web.php
Route::post('/register/otp/resend', [CreatorRegisterController::class, 'resendOtp'])
    ->name('otp.resend');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/explorer', function () {
    return view('public.explorer');
});

// routes/web.php

Route::get('/home-supporter', function () {
    return view('supporter.landing');
});

Route::get('/home-creator', function () {
    return view('creator.landing');
});

Route::get('/home-public', function () {
    return view('public.landing');
});

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
