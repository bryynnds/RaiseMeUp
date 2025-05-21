<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Str;

class GoogleController extends Controller
{
    // Redirect user ke Google OAuth page
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Callback dari Google setelah login berhasil
    public function handleGoogleCallback()
    {
        try {
            // Ambil data user dari Google
            $googleUser = Socialite::driver('google')->stateless()->user();

            // Cari user berdasarkan email, kalau belum ada buat baru
            $user = User::firstOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'name' => $googleUser->getName(),
                    'google_id' => $googleUser->getId(),
                    // Buat password random karena login pakai Google, password tidak dipakai
                    'password' => bcrypt(Str::random(16)),
                ]
            );

            // Login user tersebut ke aplikasi kita
            Auth::login($user);

            // Redirect ke halaman home setelah login
            return redirect('/home');

        } catch (\Exception $e) {
            // Kalau ada error, redirect ke login dengan pesan error
            return redirect('/login')->with('error', 'Login dengan Google gagal: ' . $e->getMessage());
        }
    }
}
