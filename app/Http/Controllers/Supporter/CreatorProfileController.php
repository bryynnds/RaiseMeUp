<?php

namespace App\Http\Controllers\Supporter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CreatorProfile;
use App\Models\User;
use App\Models\Donation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

        return view('public.profil', [
            'creator' => $creatorProfile,
            'user' => $creatorProfile->user,
            'likeCount' => $likeCount, // <- Tambahkan ini
            'jumlahSupport' => $jumlahSupport
        ]);
    }

    public function profileDonate($id)
    {
        $creatorProfile = CreatorProfile::with('user')->where('creator_id', $id)->firstOrFail();

        $likeCount = \App\Models\Like::where('creator_id', $id)->count();


        $jumlahSupport = Donation::where('creator_id', $id)
            ->whereHas('transactions', function ($query) {
                $query->where('status', 'settlement');
            })
            ->count();

        return view('supporter.profile-donate', [
            'creator' => $creatorProfile,
            'user' => $creatorProfile->user,
            'likeCount' => $likeCount, // <- Tambahkan ini
            'jumlahSupport' => $jumlahSupport
        ]);
    }

    public function updateAfterLogin(Request $request)
    {
        $request->validate([
            'nickname' => 'required|string',
            'bio' => 'required|string',
            'deskripsi' => 'required|string',
            'pp_url' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'fotosampul_url' => 'required|image|mimes:jpg,jpeg,png|max:4096',
        ]);

        $user = Auth::user();
        $profile = $user->creatorProfile;

        // Simpan file
        $ppPath = $request->file('pp_url')->store('profile_pictures', 'public');
        $sampulPath = $request->file('fotosampul_url')->store('cover_pictures', 'public');

        // Update profil
        $profile->update([
            'nickname' => $request->nickname,
            'bio' => $request->bio,
            'deskripsi' => $request->deskripsi,
            'pp_url' => Storage::url($ppPath),
            'fotosampul_url' => Storage::url($sampulPath),
        ]);

        return redirect('/home-creator');
    }
}
