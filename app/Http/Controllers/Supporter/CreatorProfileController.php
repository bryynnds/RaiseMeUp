<?php

namespace App\Http\Controllers\Supporter;

use App\Http\Controllers\Controller;
use App\Models\CreatorProfile;
use App\Models\User;
use App\Models\Donation;

class CreatorProfileController extends Controller
{
    public function show($id)
    {
        // Ambil data creator profile dan user-nya
        $creatorProfile = CreatorProfile::with('user')->where('creator_id', $id)->firstOrFail();

        // Hitung jumlah like berdasarkan creator_id
        $likeCount = \App\Models\Like::where('creator_id', $id)->count();

        $jumlahSupport = Donation::where('creator_id', $id)
        ->whereHas('transactions', function ($query) {
            $query->where('status', 'settlement');
        })
        ->count();

        return view('supporter.profile', [
            'creator' => $creatorProfile,
            'user' => $creatorProfile->user,
            'likeCount' => $likeCount, // <- Tambahkan ini
            'jumlahSupport' => $jumlahSupport
        ]);
    }
}
