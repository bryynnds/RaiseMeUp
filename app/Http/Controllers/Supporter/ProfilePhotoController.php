<?php

namespace App\Http\Controllers\Supporter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfilePhotoController extends Controller
{
    public function updatePhotos(Request $request)
    {
        $user = Auth::user();
        $profile = $user->supporterProfile;

        $data = [];

        if ($request->hasFile('pp_url')) {
            // Hapus lama
            if ($profile->pp_url) {
                $old = str_replace('/storage/', '', $profile->pp_url);
                Storage::disk('public')->delete($old);
            }

            $path = $request->file('pp_url')->store('profile_pictures', 'public');
            $data['pp_url'] = Storage::url($path);
        }

        if ($request->hasFile('fotosampul_url')) {
            if ($profile->fotosampul_url) {
                $old = str_replace('/storage/', '', $profile->fotosampul_url);
                Storage::disk('public')->delete($old);
            }

            $path = $request->file('fotosampul_url')->store('cover_pictures', 'public');
            $data['fotosampul_url'] = Storage::url($path);
        }

        if (!empty($data)) {
            $profile->update($data);
        }

        return redirect('/profile-supporter');
    }
}

