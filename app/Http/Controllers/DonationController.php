<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function index()
    {
        return Donation::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'supporter_id' => 'required|exists:users,id',
            'creator_id' => 'required|exists:users,id',
            'amount' => 'required|numeric',
            'message' => 'nullable|string',
        ]);

        $donation = Donation::create($validated);
        return response()->json($donation, 201);
    }

    public function show($id)
    {
        return Donation::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $donation = Donation::findOrFail($id);

        $validated = $request->validate([
            'amount' => 'sometimes|required|numeric',
            'message' => 'nullable|string',
        ]);

        $donation->update($validated);
        return response()->json($donation);
    }

    public function destroy($id)
    {
        $donation = Donation::findOrFail($id);
        $donation->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
