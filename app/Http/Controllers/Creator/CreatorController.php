<?php

namespace App\Http\Controllers\Creator;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Donation;

class CreatorController extends Controller
{
    public function profile()
    {
        $user = Auth::user();

        // Ambil data profil kreator (pastikan relasi creatorProfile tersedia)
        $creator = $user->creatorProfile;

        $likeCount = \App\Models\Like::where('creator_id', $creator->creator_id)->count();

        $jumlahSupport = Donation::where('creator_id', $creator->creator_id)
        ->whereHas('transactions', function ($query) {
            $query->where('status', 'settlement');
        })
        ->count();

        return view('creator.profile', compact('creator', 'likeCount','jumlahSupport'));
    }
}
