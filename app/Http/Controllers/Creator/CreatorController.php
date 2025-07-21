<?php

namespace App\Http\Controllers\Creator;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\Portfolio;
use App\Models\CreatorProfile;

class CreatorController extends Controller
{
    public function profile()
    {
        $user = Auth::user();

        // Ambil data profil kreator (pastikan relasi creatorProfile tersedia)
        $creator = $user->creatorProfile;

        $portfolio = $user->portfolio; // karena relasi hasOne

        $likeCount = \App\Models\Like::where('creator_id', $creator->creator_id)->count();

        $jumlahSupport = Donation::where('creator_id', $creator->creator_id)
            ->whereHas('transactions', function ($query) {
                $query->where('status', 'settlement');
            })
            ->count();

        $jobList = ['Illustrator', 'Musisi', 'Streamer', 'Penulis']; // bisa dari DB kalau perlu
        $tagList = ['Digital Art', 'Music', '3D Art', 'Web Development', 'Writing', 'Photography', 'Animation', 'UI/UX Design']; // sama

        return view('creator.profile', compact('creator', 'likeCount', 'jumlahSupport', 'portfolio', 'tagList', 'jobList'));
    }
}
