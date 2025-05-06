<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// routes/web.php
Route::get('/login', function () {
    return view('login');
});

Route::get('/home', function () {
    return view('home');
});
