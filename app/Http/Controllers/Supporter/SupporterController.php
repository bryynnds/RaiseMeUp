<?php

namespace App\Http\Controllers\Supporter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupporterController extends Controller
{
    public function profile()
    {
        $user = Auth::user();

        // Ambil data profil kreator (pastikan relasi supporterProfile tersedia)
        $supporter = $user->supporterProfile;

        return view('supporter.profile', compact('supporter'));
    }
}
