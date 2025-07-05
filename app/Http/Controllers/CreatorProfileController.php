<?php

namespace App\Http\Controllers;

use App\Models\CreatorProfile;
use Illuminate\Http\Request;

class CreatorProfileController extends Controller
{
    public function index()
    {
        return CreatorProfile::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'creator_id' => 'required|exists:users,id',
            'bio' => 'nullable|string',
        ]);

        $profile = CreatorProfile::create($validated);
        return response()->json($profile, 201);
    }

    public function show($id)
    {
        return CreatorProfile::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $profile = CreatorProfile::findOrFail($id);

        $validated = $request->validate([
            'bio' => 'nullable|string',
        ]);

        $profile->update($validated);
        return response()->json($profile);
    }

    public function destroy($id)
    {
        $profile = CreatorProfile::findOrFail($id);
        $profile->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
