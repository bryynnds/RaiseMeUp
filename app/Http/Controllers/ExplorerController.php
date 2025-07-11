<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CreatorProfile;
use Illuminate\Support\Facades\Response;

class ExplorerController extends Controller
{
    public function index(Request $request)
    {
        // $creators = CreatorProfile::latest()->get();

        $search = $request->query('search');

        // Ambil parameter role jika ada
        $job = $request->query('job');
        $query = CreatorProfile::query();

        if ($job && strtolower($job) !== 'all') {
            $query->where('job', $job);
        }

        // Filter berdasarkan nickname jika ada
        if ($search) {
            $query->where('nickname', 'like', '%' . $search . '%');
        }

        $creators = $query->latest()->paginate(3); // untuk test

        // AJAX: kembalikan view + info pagination
        if ($request->ajax()) {
            return response()->json([
                'html' => view('components.creator-cards', compact('creators'))->render(),
                'hasMore' => $creators->hasMorePages(),
            ]);
        }

        return view('public.explorer', compact('creators'));
    }
}
