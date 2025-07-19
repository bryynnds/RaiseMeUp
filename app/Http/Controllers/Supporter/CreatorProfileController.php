<?php

namespace App\Http\Controllers\Supporter;

use App\Http\Controllers\Controller;
use App\Models\CreatorProfile;
use App\Models\User;

class CreatorProfileController extends Controller
{
    public function show($id)
    {
        // Ambil data creator profile dan user-nya
        $creatorProfile = CreatorProfile::with('user')->where('creator_id', $id)->firstOrFail();

        // Hitung jumlah like berdasarkan creator_id
        $likeCount = \App\Models\Like::where('creator_id', $id)->count();

        return view('public.profil', [
            'creator' => $creatorProfile,
            'user' => $creatorProfile->user,
            'likeCount' => $likeCount, // <- Tambahkan ini
        ]);
    }
}
