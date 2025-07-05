<?php

namespace App\Http\Controllers;

use App\Models\SupporterProfile;
use Illuminate\Http\Request;

class SupporterProfileController extends Controller
{
    public function index()
    {
        return SupporterProfile::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'supporter_id' => 'required|exists:users,id',
            'display_name' => 'required|string|max:255',
            'bio' => 'nullable|string',
        ]);

        $profile = SupporterProfile::create($validated);
        return response()->json($profile, 201);
    }

    public function show($id)
    {
        return SupporterProfile::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $profile = SupporterProfile::findOrFail($id);

        $validated = $request->validate([
            'display_name' => 'sometimes|required|string|max:255',
            'bio' => 'nullable|string',
        ]);

        $profile->update($validated);
        return response()->json($profile);
    }

    public function destroy($id)
    {
        $profile = SupporterProfile::findOrFail($id);
        $profile->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}