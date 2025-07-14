<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\CreatorRegisterController;
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
Route::get('/register/supporter', function () {
    return view('public.supporter');
});


// Route Creator
Route::get('/home-creator', function () {
    return view('creator.landing');
});

//Route Register Creator
Route::get('/register/creator', [CreatorRegisterController::class, 'showForm'])
    ->name('creator.register.form');

Route::post('/register/creator', [CreatorRegisterController::class, 'sendOtp'])
    ->name('creator.register.otp');

Route::get('/register/otp', [CreatorRegisterController::class, 'showOtpForm'])
    ->name('otp.form');

/* LANGKAH 2 → verifikasi otp & simpan user (POST) */
Route::post('/register/otp', [CreatorRegisterController::class, 'verifyOtp'])
    ->name('otp.verify');

Route::post('/register/otp/resend', [CreatorRegisterController::class, 'resendOtp'])
    ->name('otp.resend');



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
