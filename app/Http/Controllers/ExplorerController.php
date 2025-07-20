<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CreatorProfile;
use Illuminate\Support\Facades\Response;

class ExplorerController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $job = $request->query('job');

        $query = CreatorProfile::query();

        if ($job && strtolower($job) !== 'all') {
            $query->where('job', $job);
        }

        if (!is_null($search) && trim($search) !== '') {
            $query->where('nickname', 'like', '%' . $search . '%');
        }

        $creators = $query->latest()->paginate(3);

        if ($request->ajax()) {
            return response()->json([
                'html' => view('components.creator-cards-public', compact('creators'))->render(),
                'hasMore' => $creators->hasMorePages(),
            ]);
        }

        return view('public.explorer', compact('creators'));
    }

    public function creatorIndex(Request $request)
    {
        $search = $request->query('search');
        $job = $request->query('job');

        $query = CreatorProfile::query();

        if ($job && strtolower($job) !== 'all') {
            $query->where('job', $job);
        }

        if ($search) {
            $query->where('nickname', 'like', '%' . $search . '%');
        }

        $creators = $query->latest()->paginate(3);

        if ($request->ajax()) {
            return response()->json([
                'html' => view('components.creator-cards-creator', compact('creators'))->render(),
                'hasMore' => $creators->hasMorePages(),
            ]);
        }

        return view('creator.explorer', compact('creators'));
    }

    // Add this new method for supporter explorer
    public function supporterIndex(Request $request)
    {
        $search = $request->query('search');
        $job = $request->query('job');

        $query = CreatorProfile::query();

        if ($job && strtolower($job) !== 'all') {
            $query->where('job', $job);
        }

        if ($search) {
            $query->where('nickname', 'like', '%' . $search . '%');
        }

        $creators = $query->latest()->paginate(9); // More items for supporter view

        if ($request->ajax()) {
            return response()->json([
                'html' => view('components.creator-cards-supporter', compact('creators'))->render(),
                'hasMore' => $creators->hasMorePages(),
            ]);
        }

        return view('supporter.explorer', compact('creators'));
    }

    // Optional: Separate method for AJAX if you want different logic
    public function supporterAjax(Request $request)
    {
        return $this->supporterIndex($request);
    }
}
