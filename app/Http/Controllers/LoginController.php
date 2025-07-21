<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CreatorProfile;
use App\Models\SupporterProfile;

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

                    if (
                        is_null($profile) ||
                        is_null($profile->nickname) ||
                        is_null($profile->pp_url) ||
                        is_null($profile->fotosampul_url) ||
                        is_null($profile->bio) ||
                        is_null($profile->deskripsi)
                    ) {
                        return redirect('/afterlogin-creator');
                    }

                    return redirect('/home-creator');

                case 'supporter':
                    $profile = $user->supporterProfile;

                    if (
                        !$profile ||
                        !$profile->nickname ||
                        !$profile->pp_url ||
                        !$profile->fotosampul_url ||
                        !$profile->bio
                    ) {
                        return redirect('/afterlogin-supporter');
                    }

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
