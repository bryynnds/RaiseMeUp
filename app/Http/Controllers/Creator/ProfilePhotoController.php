<?php

namespace App\Http\Controllers\Creator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfilePhotoController extends Controller
{
    public function updatePhotos(Request $request)
    {
        $user = Auth::user();
        $profile = $user->creatorProfile;

        $data = [];

        if ($request->hasFile('pp_url')) {
            if ($profile->pp_url) {
                $old = str_replace('/storage/', '', $profile->pp_url);
                Storage::disk('public')->delete($old);
            }

            $path = $request->file('pp_url')->store('creator/profile_pictures', 'public');
            $data['pp_url'] = Storage::url($path);
        }

        if ($request->hasFile('fotosampul_url')) {
            if ($profile->fotosampul_url) {
                $old = str_replace('/storage/', '', $profile->fotosampul_url);
                Storage::disk('public')->delete($old);
            }

            $path = $request->file('fotosampul_url')->store('creator/cover_pictures', 'public');
            $data['fotosampul_url'] = Storage::url($path);
        }

        if (!empty($data)) {
            $profile->update($data);
        }

        return redirect('/profile-creator'); // ganti jika kamu ingin redirect ke halaman lain
    }
}
