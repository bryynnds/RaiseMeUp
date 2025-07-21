<?php

namespace App\Http\Controllers\Supporter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditProfileSupporterController extends Controller
{
    public function update(Request $request)
    {
        $user = Auth::user();
        $supporterProfile = $user->supporterProfile;

        // Validasi fleksibel (semua opsional)
        $validated = $request->validate([
            'username' => 'nullable|string|max:255',
            'display_name' => 'nullable|string|max:255',
            'bio' => 'nullable|string|max:1000',
        ]);

        // Update user.name jika diisi
        if ($request->filled('username')) {
            $user->name = $request->input('username');
            $user->save();
        }

        // Update supporter_profiles jika diisi
        $updates = [];
        if ($request->filled('display_name')) {
            $updates['nickname'] = $request->input('display_name');
        }
        if ($request->filled('bio')) {
            $updates['bio'] = $request->input('bio');
        }

        if (!empty($updates)) {
            $supporterProfile->update($updates);
        }

        return redirect('/profile-supporter')->with('success', 'Profile updated successfully.');
    }
}

