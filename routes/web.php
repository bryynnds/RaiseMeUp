<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleController;
use Illuminate\Support\Facades\Auth;

//Ini Boleh dihapus bang nanti, cuman buat preview tailwind doang
use Illuminate\Support\Facades\File;

Route::get('/preview/{folder}/{file}', function ($folder, $file) {
    $viewPath = "public.$folder.$file"; // view('public.namaFolder.namaFile')

    if (!view()->exists($viewPath)) {
        abort(404, 'View not found');
    }

    return view($viewPath);
});


Route::get('/register/creator', function () {
    return view('public.creator');
});

Route::get('/register/supporter', function () {
    return view('public.supporter');
});


Route::get('/register/otp', function () {
    return view('public.otp');
});

Route::get('/', function () {
    return view('welcome');
});

// routes/web.php
Route::get('/login', function () {
    return view('login');
});

Route::get('/home-supporter', function () {
    return view('supporter.landing');
});

Route::get('/home-creator', function () {
    return view('creator.landing');
});

Route::get('/home-public', function () {
    return view('public.landing');
});

Route::get('/login', function () {
    return view('public.login');
});

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