<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DonationController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\SupporterProfileController;
use App\Http\Controllers\CreatorProfileController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| Route ini otomatis pakai middleware 'api'
*/

Route::get('/ping', function () {
    return response()->json(['message' => 'API is working!']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// 📦 DONATIONS
// Route::apiResource('donations', DonationController::class);

// // 💳 TRANSACTIONS
// Route::apiResource('transactions', TransactionController::class);

// // 🤝 SUPPORTER PROFILES
// Route::apiResource('supporter-profiles', SupporterProfileController::class);

// // 🎨 CREATOR PROFILES
// Route::apiResource('creator-profiles', CreatorProfileController::class);
