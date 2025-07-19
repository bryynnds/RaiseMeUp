<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use App\Models\CreatorProfile;

class LikeController extends Controller
{
    public function store(Request $request, $creatorId)
    {
        $user = Auth::user();

        if ($user->role !== 'supporter') {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $existingLike = \App\Models\Like::where('supporter_id', $user->id)
            ->where('creator_id', $creatorId)
            ->first();

        if ($existingLike) {
            $existingLike->delete();
            return response()->json(['message' => 'Unliked']);
        }

        \App\Models\Like::create([
            'supporter_id' => $user->id,
            'creator_id' => $creatorId
        ]);

        return response()->json(['message' => 'Liked']);
    }
}
