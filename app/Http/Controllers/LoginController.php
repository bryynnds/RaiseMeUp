<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Coba login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            switch ($user->role) {
                case 'kreator':
                    $profile = $user->creatorProfile;

                    // Cek apakah profil belum lengkap
                    if (
                        is_null($profile->pp_url) ||
                        is_null($profile->fotosampul_url) ||
                        is_null($profile->bio) ||
                        is_null($profile->deskripsi)
                    ) {
                        return redirect('/afterlogin');
                    }

                    return redirect('/home-creator');

                case 'supporter':
                    return redirect('/home-supporter');

                default:
                    return redirect('/home-public');
            }
        }

        // Jika gagal login
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }
}
