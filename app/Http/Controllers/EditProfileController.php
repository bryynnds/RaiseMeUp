<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EditProfileController extends Controller
{
    public function update(Request $request)
    {
        $user = Auth::user();
        $profile = $user->creatorProfile;
        $portfolio = $user->portfolio;

        // Validasi ringan
        $request->validate([
            'username' => 'nullable|string|max:255',
            'nickname' => 'nullable|string|max:255',
            'bio' => 'nullable|string|max:500',
            'deskripsi' => 'nullable|string|max:1000',
            'job' => 'nullable|string|max:255',
            'judul' => 'nullable|string|max:255',
            'url' => 'nullable|url|nullable',
            'img' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // 10MB
        ]);

        // === Update users ===
        if ($request->has('username')) {
            $user->name = $request->input('username');
            $user->save();
        }

        // === Update creator_profiles ===
        if ($profile) {
            if ($request->has('nickname')) $profile->nickname = $request->input('nickname');
            if ($request->has('bio')) $profile->bio = $request->input('bio');
            if ($request->has('deskripsi')) $profile->deskripsi = $request->input('deskripsi');
            if ($request->has('job')) $profile->job = $request->input('job');
            $profile->save();
        }

        // === Update portfolios ===
        if ($portfolio) {
            if ($request->has('judul')) $portfolio->judul = $request->input('judul');
            if ($request->has('deskripsi_portfolio')) $portfolio->deskripsi = $request->input('deskripsi_portfolio');
            if ($request->has('tag')) $portfolio->tag = $request->input('tag');
            if ($request->has('url')) $portfolio->url = $request->input('url');

            $portfolio->update([
                'tag' => $request->tag,
            ]);

            $user->creatorProfile->update([
                'job' => $request->job,
            ]);


            // Handle file upload
            if ($request->hasFile('img')) {
                if ($portfolio->img) {
                    $old = str_replace('/storage/', '', $portfolio->img);
                    Storage::disk('public')->delete($old);
                }

                $path = $request->file('img')->store('portfolio', 'public');
                $portfolio->update([
                    'img' => Storage::url($path),
                ]);
            }


            $portfolio->save();
        }

        return redirect()->back()->with('success', 'Profile updated!');
    }
}
