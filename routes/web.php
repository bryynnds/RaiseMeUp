<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\CreatorRegisterController;
use App\Http\Controllers\SupporterRegisterController;
use App\Http\Controllers\LikeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ExplorerController;
use App\Http\Controllers\Supporter\CreatorProfileController;
use App\Http\Controllers\DonationController;

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

Route::get('/explorer-public', [ExplorerController::class, 'index'])->name('explorer-public');

Route::get('/explorer-creator', [ExplorerController::class, 'creatorIndex'])->name('explorer-creator');

Route::get('/creator/{id}', [CreatorProfileController::class, 'show'])->name('creator.public.profile');


// Route::get('/profile', function () {
//     return view('public.profil');
// });


// Route Supporter
Route::get('/home-supporter', function () {
    return view('supporter.landing');
})->name('home_supporter');

Route::get('/explorer-supporter', function () {
    return view('supporter.explorer');
})->name('explorer_supporter');

Route::get('/profile-supporter', function () {
    return view('supporter.profile');
})->name('profile_supporter');

Route::get('/explorer-supporter', [ExplorerController::class, 'supporterIndex'])->name('explorer_supporter');

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
})->name('home_creator');


Route::get('/profile-creator', function () {
    return view('creator.profile');
})->name('profile_creator');


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


//Route ngambil data ke profile creator
Route::get('/supporter/creator/{id}', [CreatorProfileController::class, 'show'])->name('supporter.creator.profile');

//Route Like Logic
Route::post('/like/{creatorId}', [LikeController::class, 'store'])->name('like.creator')->middleware('auth');

Route::get('/api/like-count/{creatorId}', function ($creatorId) {
    $count = \App\Models\Like::where('creator_id', $creatorId)->count();
    return response()->json(['count' => $count]);
});

//Route Donate Logic
Route::post('/donate/snap-token', [\App\Http\Controllers\DonationController::class, 'getSnapToken'])->middleware('auth');

Route::post('/donate/confirm-payment', [DonationController::class, 'handleSuccessTransaction']);




// Route Login logic
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

Route::get('/login', function () {
    return view('public.login');
})->middleware('redirect.role')->name('login'); // Ini pake middleware, biar kalo udah login kaga bisa masuk ke halaman login via url lagi. Tombol Logout ada di Section 2

Route::get('/role', function () {
    return view('public.role');
});

Route::get('/afterlogin', function () {
    return view('public.afterlogin');
});

Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::get('/logout', function () {
    Auth::logout(); // Logout dari Laravel
    session()->flush(); // Bersihin session
    return redirect('/login'); // Arahkan ke halaman login
})->name('logout');

//Route Login Admin Filament
Route::prefix('admin')->middleware('web')->group(function () {
    Route::post('/login', [AdminLoginController::class, 'login']);
});
